<?php

ini_set('memory_limit', '400M');
ini_set('error_log', dirname(__FILE__) . '/error_log.txt');
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('log_errors', 1);
require_once './includes/bootstrap.inc';
drupal_bootstrap(DRUPAL_BOOTSTRAP_FULL);

//create the new ml_project table
$sql = "CREATE TABLE IF NOT EXISTS `ml_group` (
  `lid` int(11) NOT NULL,
  `nid` int(11) NOT NULL,
  `principal` binary(1) NOT NULL default '0',
  PRIMARY KEY  (`lid`,`nid`)
);";
db_query($sql);

//retrieve all mailing lists
$sql = "SELECT lid, name FROM `mailman_lists`";

$req = db_query($sql);
while ($ml = db_fetch_array($req)) {
  $nid = get_parent_nid(strtok($ml['name'],'-'));
  //insert the new entry in ml_project table.
  $sql = "INSERT INTO {ml_group} (nid, lid, principal) VALUES (%d,%d,%d);";
  $principal = (strtok('-')) ? 0 : 1;
  db_query($sql, $nid, $ml['lid'], $principal);
}



function get_parent_nid($shortname) {
  $num_rows_func = $GLOBALS['db_type'] . '_num_rows';

  $project_query = 'SELECT nid FROM {project_projects} WHERE LOWER(uri) = LOWER(\'%s\') ORDER BY nid DESC';
  $project_res = db_query_range($project_query, $shortname, 0, 1);
  if ($project_res && $num_rows_func($project_res)) {
    return db_result($project_res);
  }

  $community_query = 'SELECT nid FROM {content_type_community} WHERE LOWER(field_community_short_name_value) = LOWER(\'%s\') ORDER BY nid DESC';
  $community_res = db_query_range($community_query, $shortname, 0, 1);
  if ($community_res && $num_rows_func($community_res)) {
    return db_result($community_res);
  }
  return FALSE;
}