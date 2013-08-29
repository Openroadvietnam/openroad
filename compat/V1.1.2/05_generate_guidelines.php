<?php

ini_set('memory_limit', '400M');
ini_set('error_log', dirname(__FILE__) . '/05_generate_guidelines.log');
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('log_errors', 1);
require_once './includes/bootstrap.inc';
require_once('./sites/all/modules/contributed/pathauto/pathauto.inc');
drupal_bootstrap(DRUPAL_BOOTSTRAP_FULL);

//retrieve latest nodes
$sql = "SELECT * FROM `node` join `node_revisions` on node.nid = node_revisions.nid where node.type = 'page' and node.nid in (2047,19399,19401,19402,19403,19404,19405,19406,19407,19408)";

$req = db_query($sql);
global $base_url;
while ($node = db_fetch_array($req)) {
  $i = 0;
  $matches = null;
  $count = null;

  $body = $node['body'];

  $returnValue = preg_replace('#\/system\/files\/doc\/|\/system\/files\/guidelines\/#', '/sites/default/files/studies/', $body, -1, $count);
  if ($count > 0) {
    $body = $returnValue;
  }
  $newNode = (object) NULL;
  $newNode->type = 'study';
  $newNode->title = str_replace("'", "\'", $node['title']);
  $newNode->uid = 1;
  $newNode->created = strtotime('now');
  $newNode->changed = strtotime('now');
  $newNode->status = 1;
  $newNode->language = 'en';
  $newNode->body = str_replace("'", "\'", $body);
  $newNode->field_type_study[0]['value'] = 'guidelines_study';
  node_save($newNode);

  $rv = preg_match_all("/(href)=(\"|')[^\"'>]+/", $node['body'], $matches);
  if (sizeof($matches) > 0) {


    foreach ($matches[0] as $key => $m) {
      $exp = explode("/", $m);
      $pdf = "";
      $pdf = $exp[sizeof($exp) - 1];
      if (strpos($pdf, ".pdf") !== NULL){

        $filepath = "sites/default/files/studies/$pdf";
        $filename = "$pdf";
        // Begin building file object.
        $file = new stdClass();
        $file->timestamp = strtotime('now');
        $file->uid = 1;
        $file->status = FILE_STATUS_PERMANENT;
        $file->filename = $filename;
        $file->filepath = $filepath;
        $file->filemime = module_exists('mimedetect') ? mimedetect_mime($file) : file_get_mimetype($file->filename);
        $file->source = 'field_file_save_file';
        $file->filesize = filesize($filepath);
        drupal_write_record('files', $file);
        // Let modules add additional properties to the yet barebone file object.
        foreach (module_implements('file_insert') as $module) {
          $function = $module . '_file_insert';
          $function($file);
        }

        //$sql = "REPLACE INTO `content_field_document_study` SET `vid` = {$newNode->vid}, `nid` = {$newNode->nid}, `delta` =  {$i} ,`field_document_study_fid` = {$file->fid} , `field_document_study_list` = 0  where `nid` =  {$newNode->nid} ";
        $sql = "REPLACE  INTO `content_field_document_study` (vid ,	nid ,	delta ,	field_document_study_fid ,	field_document_study_list ,	field_document_study_data ) VALUES ({$newNode->vid},{$newNode->nid}, {$i} ,{$file->fid} , 0,NULL);";
        db_query($sql);
        $i++;
      }
    }
  }
}
