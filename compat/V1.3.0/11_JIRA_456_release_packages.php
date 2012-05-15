<?php

ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', dirname(__FILE__) . '/error_log.txt');
error_reporting(E_ALL);
ini_set('memory_limit', '400M');
require_once './includes/bootstrap.inc';
drupal_bootstrap(DRUPAL_BOOTSTRAP_FULL);

$sql = "ALTER TABLE `content_type_project_release` DROP `field_release_component_value`";
db_query($sql);


$association[0] = ISA_PROJECT_TYPE;
$association[1] = variable_get ('package_vid',66);

$result = db_query("SELECT n.nid, n.type, n.title, nr.body FROM {node} n INNER JOIN {node_revisions} nr USING (vid) LEFT JOIN {nat} n1 ON (n.nid = n1.nid AND n1.vid = %d) LEFT JOIN {nat} n2 ON (n.nid = n2.nid AND n2.nid <> n1.nid) WHERE n.type = '%s' AND n1.nid IS NULL", $association[1], $association[0]);
while ($node = db_fetch_object($result)) {
  // Add node title as terms.
  $terms = _nat_add_terms($node, array($association[1]));
  // Save node-term association in the NAT table.
  _nat_save_association($node->nid, $terms);
}
  