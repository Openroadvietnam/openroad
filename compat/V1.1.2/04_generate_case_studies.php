<?php

ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', dirname(__FILE__) . '/04_generate_case_studies.log');
error_reporting(E_ALL);
ini_set('memory_limit', '400M');
require_once './includes/bootstrap.inc';
require_once('./sites/all/modules/contributed/pathauto/pathauto.inc');
drupal_bootstrap(DRUPAL_BOOTSTRAP_FULL);

//retrieve latest nodes
$sql = "SELECT node. * , node_revisions . *
FROM node, term_node, term_data, node_revisions
WHERE node.nid = term_node.nid
AND node.nid = node_revisions.nid
AND status = 1
AND term_data.tid = term_node.tid
AND term_data.name = 'software case study'";
$req = db_query($sql);
$matches_concat = "";
$check = array();

$uid = 'file_mig_case_studies' . uniqid(date('dmy'));
$ext = ".csv";
$myFile = $uid . $ext;
$fh = fopen($myFile, 'a') or die("can't open file");
$data = "fid;old_path;filename;newpath;node_id\r\n";
global $base_url;
$j = 0;
while ($node = db_fetch_array($req)) {
  $matches = null;
  //find all source from link or image
  $rv = preg_match_all("/(img|src|href)=(\"|')[^\"'>]+/", $node['body'], $matches);

  $returnBody = preg_replace('/(\/system\/files\/case_studies|files\/osor\/case_studies)\//', '../../sites/default/files/studies/', $node['body'], -1, $count);

  //create node content type
  $newNode = (object) NULL;
  $newNode->type = 'study';
  $newNode->title = str_replace("'", "\'", $node['title']);
  $newNode->uid = 1;
  $newNode->created = strtotime('now');
  $newNode->changed = strtotime('now');
  $newNode->status = 1;
  $newNode->language = 'en';
  //replace source file
  $newNode->body = str_replace("'", "\'", $returnBody);
  $newNode->field_type_study[0]['value'] = 'case_studies_study';
  node_save($newNode);
  //copy each files in good dest
  $i = 0;  

  $arr_sql = array();
  foreach ($matches[0] as $key => $m) {
    //if (!in_array($m, $check) && $m != "" && substr($m, 0, 11) != 'href="http:' && substr($m, 0, 7) != 'href="#' && $m != "" && substr($m, 0, 12) != 'href="https:' && preg_match('/servlets/', $m, $mtcs) == 0 && preg_match('/mailto/', $m, $mtcs) == 0 && preg_match('/#/', $m, $mtcs) == 0 && preg_match('/@/', $m, $mtcs) == 0 && preg_match('/www\./', $m, $mtcs) == 0) {

    if (preg_match('/(system\/files\/case_studies|files\/osor\/case_studies)\//', $m, $mtcs) != 0) {
      $m = str_replace(array('src="', 'href="'), "", $m);
      if (substr($m, 0, 3) != '../') {
        //add a / at the begening if necesite
        if (substr($m, 0, 1) != "/")
          $m = "/" . $m;

        //add files in files table
        $exp = explode("/", $m);
        $fname = $exp[sizeof($exp) - 1];
        $filepath = "sites/default/files/studies/$fname";
        $filename = $fname;
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

        $sql = "REPLACE  INTO `content_field_document_study` (vid ,	nid ,	delta ,	field_document_study_fid ,	field_document_study_list ,	field_document_study_data ) VALUES ({$newNode->vid},{$newNode->nid}, {$i} ,{$file->fid} , 0,NULL);";
        $arr_sql[] = $sql;    
        $data.= $file->fid.";".$m.";".$file->filename.";".$file->filepath.";".$newNode->nid."\r\n"; 
        $i++;
      }
    }
  }
  foreach ($arr_sql as $value) {
    db_query($value);
  }
  $sql = "UPDATE node set status = 0 where nid = ".$node['nid'];
  db_query($sql);
}

fwrite($fh, $data);
fclose($fh);