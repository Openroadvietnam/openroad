<?php

// Remove from the database :
// - nodes except page, profile, contexthelp_faq, study, contexthelp and wiki of license wizard
// - users, except anonymous (uid = 0) and admin (uid = 1)
// - newsletters
// - activity log
//
// Before start this script it is preferable to disable wathdogs (comment line 1262 of bootstrap.inc)

ini_set('display_errors',0);
//ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', dirname(__FILE__) . '/clean_database_error.log');
error_reporting(E_ALL);
ini_set('memory_limit', '400M');
require_once './includes/bootstrap.inc';
drupal_bootstrap(DRUPAL_BOOTSTRAP_FULL);

// load admin user for permissions
global $user;
$user = user_load ('1');

// replace email adress (if user has subscribe to content)
$sql_mail = "UPDATE users SET mail = 'atostest57+script_clean_database@gmail.com' WHERE users.uid != 0 ";
db_query($sql_mail);

////////////////////
//  DELETE NODES  //
////////////////////
$sql = "
  SELECT *
  FROM node n
  WHERE type NOT IN ('study', 'page','profile','contexthelp_faq','contexthelp')";

$req = db_query($sql);

$i = 0;
while($node = db_fetch_array($req)){
  if ($node['type'] == 'wiki'){
    $row_path = NULL;
    $path = 'node/'.$node['nid'];
    $sql_path = "SELECT * FROM url_alias where src = '$path'";
    $req_path =  db_query($sql_path);
    $row_path = db_fetch_array($req_path);

    if (strpos($row_path['dst'],'software/license-wizard' ) === FALSE){
      $i++;
      //print $node['nid'].'</br>';
      node_delete($node['nid']);
    }  
  }else{
    $i++;
    node_delete($node['nid']);
  }
  if (($i % 100) == 0){
    echo "-";
  }
  
}

echo "-------------------------------------- \r\n";
echo $i." nodes deleted. \r\n";


////////////////////
//  DELETE USERS  //
////////////////////

$sql = "
  SELECT uid
  FROM users n
  WHERE uid NOT IN ('0','1','2')";
$i = 0;
$req = db_query($sql);
while($user = db_fetch_array($req)){
  $i++;
  user_delete (array (),$user['uid']);
  if (($i % 100) == 0){
    echo "-";
  }
}

echo $i." users deleted. \r\n";


//////////////////////////
//  DELETE NEWSLETTERS  //
//////////////////////////
$i = 0;
foreach (taxonomy_get_tree(variable_get('simplenews_vid', '')) as $term) {
  $i++;
  $tid = $term->tid;
  taxonomy_del_term($tid);
  variable_del('simplenews_from_name_'. $tid);
  variable_del('simplenews_from_address_'. $tid);
  isa_multiple_digest_delete($tid);
  if (($i % 10) == 0){
    echo "-";
  }
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

$sql="DELETE FROM url_alias WHERE dst LIKE 'category/keywords%' AND src LIKE 'taxonomy/term%'";
db_query($sql);
$sql="DELETE FROM term_hierarchy WHERE tid NOT IN (select tid from term_data)";
db_query($sql);

echo ("Truncated tables listhandler, mailman_lists, mailman_users,repositories_management, qa_answer,mailhandler,
  ml_management, media_youtube_node_data, media_youtube_metadata, project_release_file, history, watchdog,
  userpoints,userpoints_txn, votingapi_cache, votingapi_vote, node_comment_statistics, search_dataset
  search_index, search_node_links, search_total, cache* \r\nTerms of keywords taxonomy are deleted\r\n");
echo "-------------------------------------- \r\n";

// remove drupal_set_messages
if (isset ($_SESSION) && isset ($_SESSION['messages'])){
  unset ($_SESSION['messages']);
}