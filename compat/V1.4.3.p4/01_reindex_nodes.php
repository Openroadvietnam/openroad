<?php

/**
 * @file
 * Allows reindexing nodes that are passed as arguments to run the script
 */

$DOC_ROOT = dirname(__FILE__);
chdir($DOC_ROOT);
ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', dirname(__FILE__) . '/error_log.txt');
error_reporting(E_ALL & ~E_NOTICE);
//$_SERVER['HTTP_HOST'] = 'joinup-a-dev.everis.int';
//$_SERVER['SCRIPT_NAME'] = '/reindex_nodes.php';
require_once './includes/bootstrap.inc';
drupal_bootstrap(DRUPAL_BOOTSTRAP_FULL);
echo "bootstrap loaded\n";
array_shift($argv);
$count = 0;
array_walk($argv, function($val) use (&$count){
	if(is_numeric($val)){
		bootstrap_solr_set_reindex($val);
		$count++;
	}else{
		$result = db_query("SELECT nid FROM node WHERE type='%s'", $val);
		while ($row = db_fetch_object($result)) {
			bootstrap_solr_set_reindex($row->nid);
			$count++;
		}
	}
});
function bootstrap_solr_set_reindex($nid){
	db_query("DELETE FROM {apachesolr_search_node} WHERE nid=%d", $nid);
	db_query("INSERT INTO  {apachesolr_search_node} (nid, status, changed) VALUES (%d,%d,%d)", $nid, 1, time());
	echo "reindex node: $nid \n";
}
echo "number of nodes to reindex: $count \n";