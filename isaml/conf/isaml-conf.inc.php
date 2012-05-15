<?php
/*
	Common configuration for ISA/Mailing Lists scripts.
*/

// adjust include path - we expect the "isacommon" directory to be a sibling of isaweb/
set_include_path(get_include_path() . PATH_SEPARATOR . dirname(__FILE__) . '/../../isacommon');

// The ISA server is the MySQL database of the ISA Drupal application.
define('ISA_SERVER',        'isadrupalserver');
define('ISA_DB_USERNAME',   'isa');
define('ISA_DB_PASSWORD',   'change me');
define('ISA_DB_NAME',       'isa');

// This directory will host lock files
define('LOCK_DIR', '/tmp');

// Name of the table storing mailing lists operations
// Note this value must include the Drupal table prefix, if any
define('ML_MANAGEMENT_TABLE', 'ml_management');

// Options for password generation
define('PASSWORD_LENGTH', 10);
define('PASSWORD_CHARS', 'abcdefghijklmnopqrstuvwxyz_-%ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789');

// Mailman-related paths
define('ML_NEWLIST_PATH', '/usr/sbin/newlist');
define('ML_CONFIGLIST_PATH', '/usr/sbin/config_list');
define('ML_ADDMEMBERS_PATH', '/usr/sbin/add_members');

// options applied when creating a new mailing list
// note these options may be overidden by those defined in the creation task
$GLOBALS['ml_creation_options'] = array(
	'digest_footer' => '',
	'msg_footer' => '',
    'subscribe_policy' => 0
);
