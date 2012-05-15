<?php

ini_set('memory_limit', '400M');
require_once './includes/bootstrap.inc';
require_once('./sites/all/modules/contributed/pathauto/pathauto.inc');
drupal_bootstrap(DRUPAL_BOOTSTRAP_FULL);

//retrieve latest nodes
$sql = "SELECT * FROM `node` join `node_revisions` on node.nid = node_revisions.nid where node.type = 'page' and node.nid in (2047,19399,19401,19402,19403,19404,19405,19406,19407,19408)";

$req = db_query($sql);

//var_dump($results);
$uid = 'node_add' . uniqid(date('dmy'));
$ext = ".php";
$myFile = $uid . $ext;
$fh = fopen($myFile, 'a') or die("can't open file");
fwrite($fh, "<?php ");
$require = "
	ini_set('display_errors', 1);
	ini_set('log_errors', 1);
	ini_set('error_log', dirname(__FILE__) . '/error_log.txt');
	error_reporting(E_ALL);
	ini_set('memory_limit', '400M');
require_once './includes/bootstrap.inc';
	require_once('./sites/all/modules/contributed/pathauto/pathauto.inc');
	drupal_bootstrap(DRUPAL_BOOTSTRAP_FULL);";
fwrite($fh, $require);

while ($node = db_fetch_array($req)) {

  $path = 'node/' . $node['nid'];
  $sql_path = "SELECT * 
 FROM `url_alias` 
 where `src` = '$path'";
  $req_path = db_query($sql_path);
  $row_path = db_fetch_array($req_path);
  $node['path'] = $row_path['dst'];
  $pdf = "";
  $matches = null;
  $rv = preg_match('/\\/(.*)\\.pdf/', $node['body'], $matches);
  if (sizeof($matches) > 0) {
    $exp = explode("/", $matches[0]);
    $pdf = $exp[sizeof($exp) - 1];
  }
  
  $body = $node['body'];
  $count = null;
  $returnValue = preg_replace('/href="(.*)' . $pdf . '"/', 'href="sites/default/files/studies/' . $pdf . '"', $body, -1, $count);
  if ($count > 0)
    $body = $returnValue;
  $data .= "
	
	\$newNode = (object) NULL;  
	\$newNode->type = 'study';
	\$newNode->title = '" . str_replace("'", "\'", $node['title']) . "';
	\$path = '{$node['path']}';	
	\$newNode->uid = 1;
	\$newNode->created = strtotime('now');
	\$newNode->changed = strtotime('now');
	\$newNode->status = 1;
	\$newNode->language = 'en';
	\$newNode->body = '" . str_replace("'", "\'", $body) . "';
  
  \$filepath = './sites/default/files/studies/$pdf';     
  \$filename = '$pdf';  
  // Begin building file object.
  \$file = new stdClass();
  \$file->timestamp = strtotime('now');
  \$file->uid = 1;
  \$file->status = FILE_STATUS_TEMPORARY;  
  \$file->filename = \$filename;
  \$file->filepath = \$filepath;
  \$file->filemime = module_exists('mimedetect') ? mimedetect_mime(\$file) : file_get_mimetype(\$file->filename);
  \$file->source = 'field_file_save_file';  
  \$file->filesize = filesize(\$filepath);
  drupal_write_record('files', \$file);
  // Let modules add additional properties to the yet barebone file object.
  foreach (module_implements('file_insert') as \$module) {
    \$function =  \$module .'_file_insert';
    \$function(\$file);
  }
	node_save(\$newNode);	   
  \$sql = \"UPDATE `content_field_document_study` SET `vid` = \$newNode->vid, `nid` = \$newNode->nid, `delta` = 0 ,`field_document_study_fid` = \$file->fid , `field_document_study_list` = 1  where `nid` =  \$newNode->nid   \";
	db_query(\$sql);
  \$sql = \"UPDATE `content_type_study` SET `field_type_study_value` = 'guidelines_study'  where `nid` =  \$newNode->nid    \";
	db_query(\$sql);     
	\$nid = \$newNode->nid;
	\$sql = \"UPDATE `url_alias` SET `dst` = '\".\$path.\"' WHERE `src` = 'node/\".\$nid.\"'\";
	db_query(\$sql);
	/** ===================================================================================================== */";
}

fwrite($fh, $data);
fclose($fh);

echo "it's ok ?\r\n";
