<?php
// Jira 406
ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', dirname(__FILE__) . '/error_log.txt');
error_reporting(E_ALL & ~E_NOTICE);
ini_set('memory_limit', '400M');
require_once './includes/bootstrap.inc';
drupal_bootstrap(DRUPAL_BOOTSTRAP_FULL);

//taxo 1 : country (vid = 26)
//taxo 2 : represented countries (vid = 41) --> moved into taxo 1

//Update the content types associated to the taxo 1
$sql_v_node_types = "UPDATE `vocabulary_node_types` SET `vid` = 26 WHERE vid = 41 AND type = 'project_project';";
db_query($sql_v_node_types);

//Select tid of all terms, by name
$sql = "SELECT taxo1.name, taxo1.tid AS tid1, taxo2.tid AS tid2
          FROM `term_data` AS taxo1
          INNER JOIN `term_data` AS taxo2 ON taxo1.name = taxo2.name AND taxo2.vid =41
          WHERE taxo1.vid =26";
$res = db_query($sql);
while ($term = db_fetch_array($res)) {
  //Update the node tid
  $sql_term_node = "UPDATE `term_node` SET tid = %d WHERE tid = %d";
  db_query($sql_term_node, $term['tid1'], $term['tid2']);
  //Delete the term hierarchy
  $sql_term_hier = "DELETE FROM `term_hierarchy` WHERE tid = %d OR parent = %d";
  db_query($sql_term_hier, $term['tid2'], $term['tid2']);
  //Delete the term data
  $sql_term_data = "DELETE FROM `term_data` WHERE tid = %d";
  db_query($sql_term_data, $term['tid2']);
}

//delete the vocabulary
$sql_voc = "DELETE FROM `vocabulary` WHERE vid = 41";
db_query($sql_voc);

