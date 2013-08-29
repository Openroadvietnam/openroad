<?php
ini_set('memory_limit', '400M');
ini_set('error_log', dirname(__FILE__) . '/error_log.txt');
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('log_errors', 1);
require_once './includes/bootstrap.inc';

require_once './sites/all/modules/contributed/pathauto/pathauto.inc';
require_once './sites/all/modules/contributed/pathauto/pathauto_node.inc';
drupal_bootstrap(DRUPAL_BOOTSTRAP_FULL);
// Set the good path
$sql = "REPLACE INTO `variable` (`name`, `value`) VALUES
('pathauto_node_project_release_pattern', %s),
('pathauto_max_bulk_update', %s);"; // increase the number of regeneration
db_query($sql, 's:74:"[isa_group_type]/[isa_short_name]/release/release[project_release_version]";', 's:4:"2000";');

//Delete the path of existing releases
$sql = "DELETE alias FROM {url_alias} AS alias, {project_release_nodes}
        WHERE src = CONCAT('node/',project_release_nodes.nid);";
db_query($sql);
//Regenerate all the path auto
$pattern_types = array_keys(node_get_types('names'));
$query = "SELECT COUNT(n.nid) FROM {node} n LEFT JOIN {url_alias} alias ON CONVERT(CONCAT('node/', CAST(n.nid AS CHAR)) USING utf8) = alias.src WHERE alias.src IS NULL AND n.type = 'project_release'";
$result = db_result(db_query($query));

while ($result > 0) {
  node_pathauto_bulkupdate();
  $result = db_result(db_query($query));
}

$sql = "REPLACE INTO `variable` (`name`, `value`) VALUES
  ('pathauto_max_bulk_update', %s);"; //set the classical number of regeneration
db_query($sql, 's:2:"50";');


?>
