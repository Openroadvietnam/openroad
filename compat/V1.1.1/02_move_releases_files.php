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
  //$files[$file->fid] = $file;
    if (strpos($file->filepath, 'sites/default/files/project/') === FALSE) {
    //copy the file in /files/project/
    $newfilepath = 'sites/default/files/project/' . $file->filename;

    if (copy($file->filepath, $newfilepath)) {
      // delete file in /file/
      unlink($file->filepath);
      
      //change the filepath in the database
      $sql1 = "UPDATE `files` SET `filepath` = '%s' WHERE `files`.`fid` = %d LIMIT 1 ";
      $req1 = db_query($sql1, $newfilepath, $file->fid);
    } else {
      echo "the file copy of $file->filepath failed...\n";
    }
  }
}
