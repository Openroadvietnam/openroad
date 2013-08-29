<?php
/* 
 * Update help (table node, node_revision & content_type_contexthelp are filtered)
 * 
 */
ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', dirname(__FILE__) . '/error_log.txt');
error_reporting(E_ALL);


ini_set('memory_limit', '400M');
require_once './includes/bootstrap.inc';
drupal_bootstrap(DRUPAL_BOOTSTRAP_FULL);

// create user account
$pattern_name = 'isa_automatic_federation';
$affected_role = 'member';
$roles = user_roles();

$user = array(
'uid' => 2,
'name' => $pattern_name,
'pass' => $pattern_name,
'mail' => 'dlfr-ce-drupal-isa.ext@atosorigin.com',
'status' => 1,
'init' => 'dlfr-ce-drupal-isa.ext@atosorigin.com',
'roles' => array(array_search($affected_role, $roles) => 1),
);

$existing_user = user_load(array('name' => $user['name']));

if (!$existing_user->uid) {
  $user = user_save(NULL, $user);
}

// create node profile
$newNode = (object) NULL;
$newNode->type = 'profile';
$newNode->title = $pattern_name." profile";
$newNode->uid = 2;
$newNode->created = strtotime("now");
$newNode->changed = strtotime("now");
$newNode->status = 1;
$newNode->language = 'en';
$newNode->comment = 0;
$newNode->promote = 0;
$newNode->moderate = 0;
$newNode->sticky = 0;
$newNode->field_firstname[0]['value'] = 'Isa';
$newNode->field_lastname[0]['value'] = 'Automatic Federation';
$newNode->field_company_name[0]['value'] = 'European Commission';
$newNode->field_company_type[0]['value'] = 'Public';
$newNode->field_company_scope[0]['value'] = 'European';
$newNode->field_profile_email[0]['value'] = 'dlfr-ce-drupal-isa.ext@atosorigin.com';


// save node
node_save($newNode);
