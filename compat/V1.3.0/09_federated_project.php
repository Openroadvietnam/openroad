<?php

ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', dirname(__FILE__) . '/error_log.txt');
error_reporting(E_ALL);
ini_set('memory_limit', '400M');
require_once './includes/bootstrap.inc';
drupal_bootstrap(DRUPAL_BOOTSTRAP_FULL);



$sql = "SELECT *  FROM `content_type_federated_project` 
INNER JOIN node using(nid)
WHERE `field_fed_project_forge_nid` IS NULL";

$res = db_query($sql);

while ($node = db_fetch_object($res)) {
  if (isset ($node->tnid) && !empty ($node->tnid)){
    $node_origin = node_load($node->tnid);
    $forge_nid = $node_origin->field_fed_project_forge['0']['nid'];
    $forge = node_load($forge_nid);
    if ($forge){
      $sql = "UPDATE content_type_federated_project SET field_fed_project_forge_nid = %d WHERE nid=%d AND vid=%d";
      db_query($sql,$forge_nid,$node->nid,$node->vid);
    }
  }
}

