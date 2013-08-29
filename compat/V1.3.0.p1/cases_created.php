<?php

ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', dirname(__FILE__) . '/error_log.txt');
error_reporting(E_ALL);
ini_set('memory_limit', '400M');
require_once './includes/bootstrap.inc';
drupal_bootstrap(DRUPAL_BOOTSTRAP_FULL);

//Update the created date of migrated node (case_epractice -> case)
$query = "SELECT node.nid, old_node.created FROM node
          INNER JOIN node AS old_node ON node.title = old_node.title AND old_node.type <> 'case'
          WHERE node.type = 'case'";
$res = db_query($query);
while ($result = db_fetch_object($res)) {
  $up = "UPDATE node SET created = %d WHERE nid = %d";
  db_query($up, $result->created, $result->nid);
}