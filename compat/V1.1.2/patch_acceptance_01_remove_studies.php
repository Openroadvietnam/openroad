<?php
ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', dirname(__FILE__) . '/patch_acceptance_01_remove_studies.log');
error_reporting(E_ALL);
ini_set('memory_limit', '400M');
require_once './includes/bootstrap.inc';
drupal_bootstrap(DRUPAL_BOOTSTRAP_FULL);

$sql = "UPDATE node SET status=1 WHERE nid IN (SELECT term_node.nid
FROM term_node
LEFT JOIN term_data on term_data.tid = term_node.tid
WHERE term_data.name = 'software case study')";
db_query($sql);

global $user;
$user = user_load(1);

$sql = "SELECT nid FROM node WHERE type='study'";
$req = db_query($sql);
while ($node = db_fetch_array($req)) {
  node_delete($node['nid']);
}

$sql = "DELETE FROM `files` WHERE  filepath LIKE ('%sites/default/files/studies%')";
db_query($sql);


?>
