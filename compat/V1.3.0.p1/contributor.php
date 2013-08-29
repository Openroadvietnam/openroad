<?php

ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', dirname(__FILE__) . '/error_log.txt');
error_reporting(E_ALL);
ini_set('memory_limit', '400M');
require_once './includes/bootstrap.inc';
drupal_bootstrap(DRUPAL_BOOTSTRAP_FULL);


// Create role and grant permission
$role = permissions_create_role('contributor');
variable_set('contributor_rid', $role->rid);
$roles_in_group = variable_get("og_user_roles_roles_project_project");
$roles_in_group[$role->rid] = $role->rid;
variable_set("og_user_roles_roles_project_project", $roles_in_group);

permissions_grant_permissions('developer', array('SCM write into branches', 'SCM write into tags', 'SCM write into trunk'));
$contributor_permissions = permissions_get_permissions_for_role('member');
$contributor_permissions[] = 'SCM write into branches';
permissions_grant_permissions('contributor', $contributor_permissions);