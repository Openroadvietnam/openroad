<?php
require_once 'lib/task-management.inc.php';
require_once 'lib/python-generation.inc.php';

function doMailingListsCreations() {
	$ml_creations_query = sprintf(
		'SELECT task_id, request_time, ml, action, p1 AS owner_addr, p2 AS list_config, p3 AS initial_members, result_data, state, action_time
		FROM %s
		WHERE action = \'ml_creation\'
		AND state = \'todo\'
		ORDER BY task_id ASC',
		ML_MANAGEMENT_TABLE
	);
	$ml_creations = mysql_query($ml_creations_query);
	if (!$ml_creations) {
		die(sprintf('Unable to fetch mailing lists to create.'."\n"));
	}
	
	while ($ml_creation_request = mysql_fetch_assoc($ml_creations)) {
		// we expect certain parameters to be serialized arrays
		foreach (array('list_config', 'initial_members') as $key) {
			if (strlen($ml_creation_request[$key])) {
				$ml_creation_request[$key] = unserialize($ml_creation_request[$key]);
			}
		}
		doMailingListCreation($ml_creation_request);
	}
}

function doMailingListCreation($ml_creation_request) {
	// Step 0: generate a password for the list administrator
	$admin_password = generateRandomPassword();
	
	// Step 1: create a list
	$ml_creation_cmd = "echo '%s' | %s %s %s %s"; // e.g. echo "y" | newlist <listname> <owner@domain> password
	$ml_creation_cmd = sprintf(
		$ml_creation_cmd,
		'y', // since we generate a random password for each newly created list, we have to warn its owner, so that he knows the password
		ML_NEWLIST_PATH,
		escapeshellarg($ml_creation_request['ml']),
		escapeshellarg($ml_creation_request['owner_addr']),
		escapeshellarg($admin_password) // it would be better to pass the admin-password on stdin instead
	);
	$cmd_status = execute_command($ml_creation_cmd, '2>&1');
	if ($cmd_status['code'] !== 0) {
		taskFailed(ML_MANAGEMENT_TABLE, $ml_creation_request['task_id'], serialize($cmd_status));
		return;
	}
	
	// Step 2: configure the created list
	$final_options = array();
	if (is_array($ml_creation_request['list_config'])) {
		$final_options += $ml_creation_request['list_config'];
	}
	if (is_array($GLOBALS['ml_creation_options'])) {
		$final_options += $GLOBALS['ml_creation_options'];
	}
	$python_final_options = optionsToPython($final_options);
	
	// we launch a config_list process for the newly created list
	$ml_config_cmd = sprintf(
		'%s -i /dev/stdin %s',
		ML_CONFIGLIST_PATH,
		escapeshellarg($ml_creation_request['ml'])
	);
	$cmd_status = execute_command_with_stdin($python_final_options, $ml_config_cmd);
	if ($cmd_status['code'] !== 0) {
		taskFailed(ML_MANAGEMENT_TABLE, $ml_creation_request['task_id'], serialize($cmd_status));
		return;
	}
	
	// Step 3: handle initial subscriptions
	if (count($ml_creation_request['initial_members']) >= 1) {
		$members = implode("\n", $ml_creation_request['initial_members']);
		$ml_members_cmd = sprintf(
			'%s --welcome-msg=n --admin-notify=n -r - %s',
			ML_ADDMEMBERS_PATH,
			escapeshellarg($ml_creation_request['ml'])
		);
		$cmd_status = execute_command_with_stdin($members, $ml_members_cmd);
		if ($cmd_status['code'] !== 0) {
			taskFailed(ML_MANAGEMENT_TABLE, $ml_creation_request['task_id'], serialize($cmd_status));
			return;
		}
	}
	
	// log the work is done
	taskSucceeded(ML_MANAGEMENT_TABLE, $ml_creation_request['task_id']);
}

/**
	Generates a random password; note this function does not aim at generating
	strong passwords.
*/
function generateRandomPassword() {
	$password = '';
	$chars = constant('PASSWORD_CHARS');
	$chars_count = strlen($chars);
	for ($i = 0 ; $i < PASSWORD_LENGTH ; ++ $i) {
		$password .= $chars[mt_rand(0, $chars_count)];
	}
	return $password;
}

/**
	@param $options an array associating config keys with their values
	@return A Python script that can be piped into Mailman's config_list utility.
*/
function optionsToPython($options) {
	$python = '';
	foreach ($options as $key => $value) {
		$python .= sprintf('%s = %s'."\n", $key, valueToPython($value));
	}
	return $python;
}
