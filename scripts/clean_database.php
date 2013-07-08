<?php

// Remove from the database :
// - nodes except page, profile, contexthelp_faq, study, contexthelp and wiki of license wizard
// - users, except anonymous (uid = 0) and admin (uid = 1) and 
// - newsletters
// - activity log
//
// Before start this script it is preferable to disable wathdogs (comment line 1262 of bootstrap.inc)

ini_set('display_errors',0);
//ini_set('display_errors', 1);
//ini_set('error_reporting','E_ALL & ~E_NOTICE');
$date = date ('dmyHi');
ini_set('log_errors', 1);
ini_set('error_log', dirname(__FILE__) . '/clean_database_error_'.$date.'.log');
error_reporting(E_ALL);
ini_set('memory_limit', '400M');

// set HTTP_HOST or drupal will refuse to bootstrap
//$_SERVER['HTTP_HOST'] = 'example.org';
$_SERVER['REQUEST_METHOD'] = '';
$_SERVER['REMOTE_ADDR'] = '127.0.0.1';
require_once './includes/bootstrap.inc';

drupal_bootstrap(DRUPAL_BOOTSTRAP_FULL);

// load admin user for permissions
//$form_values = array ();
//$form_values['name'] = 'admin';
//$form_values['pass'] = 'admin';
//user_authenticate ($form_values);
global $user;
$user = user_load ('1');

////////////////////
//  DELETE NODES  //
////////////////////
$sql = "
  SELECT *
  FROM node n
  WHERE type NOT IN ('page','profile','contexthelp_faq','contexthelp')";

$req = db_query($sql);

$i = 0;
$j = 0;
while($node = db_fetch_array($req)){
  if ($node['type'] == 'wiki'){
    $row_path = NULL;
    $path = 'node/'.$node['nid'];
    $sql_path = "SELECT * FROM url_alias where src = '$path'";
    $req_path =  db_query($sql_path);
    $row_path = db_fetch_array($req_path);

    if (strpos($row_path['dst'],'software/license-wizard' ) === FALSE){
      //print $node['nid'].'</br>';
      clean_database_node_delete($node['nid']);
      $i++;
    }else{
        $j++;
    }
  }else{
    clean_database_node_delete($node['nid']);
    $i++;
  }
  
}

echo "-------------------------------------- \r\n";
echo $i." nodes deleted.".$j."nodes kept \r\n";
echo "-------------------------------------- \r\n";

$sql="TRUNCATE TABLE watchdog ;";
db_query($sql);

////////////////////
//  DELETE USERS  //
////////////////////

$sql = "
  SELECT uid
  FROM users n
  WHERE uid NOT IN ('0','1','2')";
$i = 0;
$req = db_query($sql);
while($usr = db_fetch_array($req)){
  clean_database_user_delete (array (),$usr['uid']);
}

echo $i." users deleted. \r\n";
echo "-------------------------------------- \r\n";

/////////////////////////////
//  DELETE TAXONOMY TERMS  //
/////////////////////////////
$i = 0;
foreach (taxonomy_get_tree(variable_get('simplenews_vid', '')) as $term) {
  $i++;
  $tid = $term->tid;
  taxonomy_del_term($tid);
  variable_del('simplenews_from_name_'. $tid);
  variable_del('simplenews_from_address_'. $tid);
  isa_multiple_digest_delete($tid);
}

echo $i." newsletters deleted. \r\n";
 
////////////////////////////////
//  DELETE ACTIVITY MESSAGES  //
////////////////////////////////

db_query("DELETE FROM {heartbeat_activity}");

echo ("Hearbeat messages is deleted \r\n");
echo "-------------------------------------- \r\n";




/** not delete all files, content type study has files
$sql = 'SELECT * FROM files';
$req = db_query($sql);
$count = 0;
while ($file = db_fetch_object($req)) {
  if (file_exists($file->filepath) == FALSE) {
      $sql1 = "DELETE FROM files WHERE fid = %d";
      $req1 = db_query($sql1, $file->fid);
    $count ++;
    }
}
echo ("$count files deleted from database (table files). \r\n");
echo "-------------------------------------- \r\n";
*/


//$sql="TRUNCATE TABLE `subscriptions_user`";
//db_query($sql);
$sql="TRUNCATE TABLE `heartbeat_translations`";
db_query($sql);
$sql="TRUNCATE TABLE `isa_download_statistics_count`";
db_query($sql);
$sql = "TRUNCATE TABLE apachesolr_search_node;";
db_query ($sql);
$sql = "TRUNCATE TABLE apachesolr_attachments_files;";
db_query ($sql);
$sql = "TRUNCATE TABLE commit_management;";
db_query ($sql);
$sql="TRUNCATE TABLE listhandler;";
db_query($sql);
$sql="TRUNCATE TABLE mailman_lists ;";
db_query($sql);
$sql="TRUNCATE TABLE mailman_users ;";
db_query($sql);
$sql="TRUNCATE TABLE repositories_management ;";
db_query($sql);
$sql="TRUNCATE TABLE qa_answer ;";
db_query($sql);
$sql="TRUNCATE TABLE mailhandler ;";
db_query($sql);
$sql="TRUNCATE TABLE ml_management ;";
db_query($sql);
$sql="TRUNCATE TABLE media_youtube_node_data ;";
db_query($sql);
$sql="TRUNCATE TABLE media_youtube_metadata ;";
db_query($sql);
$sql="TRUNCATE TABLE project_release_file;";
db_query($sql);
$sql="TRUNCATE TABLE history ;";
db_query($sql);
$sql="TRUNCATE TABLE workflow_node_history ;";
db_query($sql);
$sql="TRUNCATE TABLE watchdog ;";
db_query($sql);
$sql="TRUNCATE TABLE userpoints;";
db_query($sql);
$sql="TRUNCATE TABLE userpoints_txn;";
db_query($sql);
$sql="TRUNCATE TABLE votingapi_cache;";
db_query($sql);
$sql="TRUNCATE TABLE votingapi_vote;";
db_query($sql);
$sql="TRUNCATE TABLE node_comment_statistics ;";
db_query($sql);
$sql="TRUNCATE TABLE search_dataset;";
db_query($sql);
$sql="TRUNCATE TABLE search_index;";
db_query($sql);
$sql="TRUNCATE TABLE search_node_links;";
db_query($sql);
$sql="TRUNCATE TABLE search_total;";
db_query($sql);
$sql="TRUNCATE TABLE simplenews_subscriptions;";
db_query($sql);
$sql="TRUNCATE TABLE captcha_sessions;";
db_query($sql);
$sql="TRUNCATE TABLE cache;";
db_query($sql);
$sql="TRUNCATE TABLE cache_admin_menu;";
db_query($sql);
$sql="TRUNCATE TABLE cache_apachesolr;";
db_query($sql);
$sql="TRUNCATE TABLE cache_block;";
db_query($sql);
$sql="TRUNCATE TABLE cache_content;";
db_query($sql);
$sql="TRUNCATE TABLE cache_emfield_xml;";
db_query($sql);
$sql="TRUNCATE TABLE cache_filter;";
db_query($sql);
$sql="TRUNCATE TABLE cache_form;";
db_query($sql);
$sql="TRUNCATE TABLE cache_media_youtube_status;";
db_query($sql);
$sql="TRUNCATE TABLE cache_menu;";
db_query($sql);
$sql="TRUNCATE TABLE cache_page;";
db_query($sql);
$sql="TRUNCATE TABLE cache_project_release;";
db_query($sql);
$sql="TRUNCATE TABLE cache_rules;";
db_query($sql);
$sql="TRUNCATE TABLE cache_views;";
db_query($sql);
$sql="TRUNCATE TABLE cache_views_data";
db_query($sql);

$sql="DELETE FROM term_data WHERE vid in (SELECT vid
FROM vocabulary
WHERE name = 'keywords');";
db_query($sql);

$sql="DELETE FROM term_data WHERE vid in (SELECT vid
FROM vocabulary
WHERE name = 'Virtual forge');";
db_query($sql);

$sql="DELETE FROM url_alias WHERE dst LIKE 'category/keywords%' AND src LIKE 'taxonomy/term%'";
db_query($sql);
$sql="DELETE FROM term_hierarchy WHERE tid NOT IN (select tid from term_data)";
db_query($sql);

echo ("Truncated tables captcha_sessions, apachesolr_search_node, apachesolr_attachments_files, listhandler, mailman_lists, mailman_users,repositories_management, qa_answer,mailhandler,
  ml_management, media_youtube_node_data, media_youtube_metadata, project_release_file, history, watchdog,
  userpoints,userpoints_txn, votingapi_cache, votingapi_vote, node_comment_statistics, search_dataset
  search_index, search_node_links, search_total, cache* \r\nTerms of keywords taxonomy are deleted\r\n");
echo "-------------------------------------- \r\n";

// upd password and users mail (password = '21232f297a57a5a743894a0e4a801fc3' = 'admin')
$sql="UPDATE users SET pass='21232f297a57a5a743894a0e4a801fc3' , mail='admin@admin.com', init='admin@admin.com' WHERE uid = 1 or uid = 2 ";
db_query($sql);

variable_set ('site_mail','admin@admin.com');
variable_set ('simplenews_from_name','admin@admin.com');
variable_set ('simplenews_from_address','admin@admin.com');
variable_set ('simplenews_test_address','admin@admin.com');
variable_set ('subscriptions_site_mail','admin@admin.com');
variable_set ('simplenews_from_name_','admin@admin.com');
variable_set ('svn_url','admin@admin.com');
variable_set ('project_issue_reply_to','admin@admin.com');

// up password and users mail (password = '21232f297a57a5a743894a0e4a801fc3' = 'admin')
$sql="UPDATE users SET pass='21232f297a57a5a743894a0e4a801fc3' , mail='admin@admin.com', init='admin@admin.com' WHERE uid = 1 or uid = 2 ";
db_query($sql);











// remove drupal_set_messages
if (isset ($_SESSION) && isset ($_SESSION['messages'])){
  unset ($_SESSION['messages']);
}



/**
 * Delete a node.
 * 
 * @see node_delete
 *
 */
function clean_database_node_delete ($nid){
    
    $node = node_load($nid, NULL, TRUE);
    db_query('DELETE FROM {node} WHERE nid = %d', $node->nid);
    db_query('DELETE FROM {node_revisions} WHERE nid = %d', $node->nid);
    db_query('DELETE FROM {node_access} WHERE nid = %d', $node->nid);

    // Call the node-specific callback (if any):
    node_invoke($node, 'delete');
    node_invoke_nodeapi($node, 'delete');
    
    // Clear the page and block caches.
    //cache_clear_all();
}

function clean_database_user_delete($edit, $uid) {
  $account = user_load(array('uid' => $uid));
  sess_destroy_uid($uid);

  db_query('DELETE FROM {users} WHERE uid = %d', $uid);
  db_query('DELETE FROM {users_roles} WHERE uid = %d', $uid);
  db_query('DELETE FROM {authmap} WHERE uid = %d', $uid);

  user_module_invoke('delete', $edit, $account);
}
