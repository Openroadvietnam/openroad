<?php

ini_set('display_errors', 0);
ini_set('log_errors', 1);
ini_set('error_log', dirname(__FILE__) . '/error_log.txt');
error_reporting(E_ALL);
ini_set('memory_limit', '400M');
require_once './includes/bootstrap.inc';
require_once('./sites/all/modules/contributed/pathauto/pathauto.inc');
drupal_bootstrap(DRUPAL_BOOTSTRAP_FULL);

$sql = 'SELECT * FROM `files` INNER JOIN project_release_file on project_release_file.fid = files.fid';
$req = db_query($sql);

while ($file = db_fetch_object($req)) {
  if (file_exists($file->filepath) == FALSE) {
    if (!empty ($file->filename)){
    $fh = fopen($file->filepath, 'a') or die("can't open file");
    //print $file->filename." nexiste pas \n";
    //$fh = fopen('./tmp/'.$file->filename, 'a') or die("can't open file $file->filename\n");
    fwrite($fh, 'fake file');
    fclose($fh);
    }
  } 
}