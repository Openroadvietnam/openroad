<?php

ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', dirname(__FILE__) . '/error_log.txt');
error_reporting(E_ALL & ~E_NOTICE);
ini_set('memory_limit', '400M');
require_once './includes/bootstrap.inc';
require_once './sites/all/modules/contributed/pathauto/pathauto.inc';
drupal_bootstrap(DRUPAL_BOOTSTRAP_FULL);

// info logging
$info_log = dirname(__FILE__) . '/'.basename(__FILE__).'.info_log.txt';
$rec_step = 10;
$j=0;

function get_triggered_emails($workflow_relations) {
  $target_wf = join(',',array_unique(array_values($workflow_relations)));
  $sql = "SELECT * FROM trigger_assignments WHERE op IN (SELECT CONCAT('workflow-asset_release-',tid) FROM workflow_transitions WHERE target_sid IN (%s))";
  $res = db_query($sql, $target_wf);
  while ($result = db_fetch_array($res)) {
    $results[] = $result;
  }
  return $results;
}
function unassign_triggered_emails($triggered_emails) {
  foreach($triggered_emails as $t) {
    $sql = "DELETE FROM {trigger_assignments} WHERE hook = '%s' AND op = '%s' AND aid = '%s' AND weight = %d";
    db_query($sql, $t);
  }
}
function assign_triggered_emails($triggered_emails) {
  foreach($triggered_emails as $t) {
    $sql = "INSERT INTO {trigger_assignments} VALUES ('%s', '%s', '%s', %d)";
    db_query($sql, $t);
  }
}


$workflow_relations = array(17=>40, 18=>41, 16=>39, 19=>38, 24=>39);

$triggered_emails = get_triggered_emails($workflow_relations);
unassign_triggered_emails($triggered_emails);

//Select all project releases which are not software releases
$sql =  'SELECT node.nid, project_release_nodes.pid '.
        'FROM node node '.
        'LEFT JOIN project_release_nodes project_release_nodes ON (project_release_nodes.nid=node.nid) '.
        'LEFT JOIN content_field_project_common_type content_field_project_common_type ON (content_field_project_common_type.nid=project_release_nodes.pid) '.
        'LEFT JOIN node gnode ON (gnode.nid=project_release_nodes.pid) '.
        "WHERE node.type = '%s' ".
        'AND (content_field_project_common_type.field_project_common_type_value<>1 OR content_field_project_common_type.field_project_common_type_value IS NULL) '.
        'AND (gnode.vid=content_field_project_common_type.vid OR gnode.vid=content_field_project_common_type.vid IS NULL)';
$results = db_query($sql, 'project_release');
$num = mysql_num_rows($results);
error_log(date('Y-m-d H:i:s')." Will transform $num nodes from type 'project_release' to type 'asset_release'", 3, $info_log);

while ($result = db_fetch_array($results)) {
  $release_node = node_load($result['nid']);
  if ($result['pid']) {
    $group_node = node_load($result['pid']);
  } else {
    $group_node = (object) NULL;
  }
  //create a new asset_release node
  $asset_release = (object) NULL;
  $asset_release->type = 'asset_release';
  $asset_release->language = 'en';
  $asset_release->body = $release_node->body;
  $asset_release->teaser = $release_node->teaser;
  $asset_release->title = $release_node->title;
  $asset_release->uid = $release_node->uid;
  $asset_release->created = $release_node->created;
  $asset_release->changed = $release_node->changed;
  $asset_release->status = $release_node->status;
  $asset_release->field_asset_version[0]['value'] = $release_node->project_release['version'];
  $asset_release->field_asset_version_note[0]['value'] = $group_node->title . ' v' . $release_node->project_release['version'];
  $asset_release->og_groups = array($release_node->project_release['pid'] => $release_node->project_release['pid']);

  //Retrieve theme & geographic coverage from the group
  if ($group_node && $group_node->taxonomy) {
    foreach ($group_node->taxonomy as $key => $taxo) {
      if ($taxo->vid == variable_get('domains_vid', 27) || $taxo->vid == variable_get('country_vid', 26)) {
        $asset_release->taxonomy[$key] = $taxo;
      }
    }
  }
  
  //create a distribution node for each file
  foreach ($release_node->project_release['files'] as $file) {
	$distribution = (object) NULL;
	$distribution->type = 'distribution';
	$distribution->language = 'en';
	$distribution->title = pathauto_cleanstring($file->filename);
	$distribution->uid = $release_node->uid;
	$distribution->created = $release_node->created;
	$distribution->changed = $release_node->changed;
	$distribution->status = $release_node->status;
	$distribution->field_distribution_access_url[0] = (array) $file;
	node_save($distribution);
	//associate the distribution to the asset release
	$asset_release->field_asset_distribution[] = array('nid' => intval($distribution->nid));
  }
  
  //create a documentation node for each document
  foreach ($release_node->field_release_document as $document) {
	$documentation = (object) NULL;
	$documentation->type = 'documentation';
	$documentation->language = 'en';
	$documentation->title = pathauto_cleanstring($document['filename']);;
	$documentation->uid = $release_node->uid;
	$documentation->created = $release_node->created;
	$documentation->changed = $release_node->changed;
	$documentation->status = $release_node->status;
	$documentation->field_documentation_access_url[0] = (array) $document;
	node_save($documentation);
	//associate the documentation to the asset release
	$asset_release->field_asset_documentation[] = array('nid' => intval($documentation->nid));;
  }
 
  node_save($asset_release);

  //Retrieve comments
  $sql = "INSERT INTO {comments} (pid, nid, uid, subject, comment, hostname, timestamp, status, format, thread, name, mail, homepage)
          SELECT pid, %d, uid, subject, comment, hostname, timestamp, status, format, thread, name, mail, homepage
          FROM {comments} WHERE nid = %d";
  db_query($sql, $asset_release->nid, $release_node->nid);
  //Retrieve fivestar
  $sql = "INSERT INTO {votingapi_vote} (content_type, content_id, value, value_type, tag, uid, timestamp, vote_source)
          SELECT content_type, %d, value, value_type, tag, uid, timestamp, vote_source
          FROM {votingapi_vote} WHERE content_type = %d";
  db_query($sql, $asset_release->nid, $release_node->nid);

  //retrieve the workflow
  $old_workflow = $release_node->_workflow;
  workflow_execute_transition($asset_release,$workflow_relations[$old_workflow], '', true);
  
  // log to file every $rec_step iterations
  $j++;
  if ($j%$rec_step==0) {
    $pct=sprintf('%.1f',100*$j/$num);
    $str="\n".date('Y-m-d H:i:s')." $j/$num ($pct%)";
    error_log($str, 3, $info_log);
  }
}
assign_triggered_emails($triggered_emails);
error_log("\n".date('Y-m-d H:i:s')." Finished", 3, $info_log);

?>
