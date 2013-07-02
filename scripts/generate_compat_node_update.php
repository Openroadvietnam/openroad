<?php

  ini_set('memory_limit', '400M');
require_once './includes/bootstrap.inc';
require_once('./sites/all/modules/contributed/pathauto/pathauto.inc');
drupal_bootstrap(DRUPAL_BOOTSTRAP_FULL);

$uid = 'node_update'.uniqid(date('dmy'));
$ext = ".sql";
$myFile = $uid.$ext;
$fh = fopen($myFile, 'a') or die("can't open file");

$sql = "SELECT nid,body FROM `node_revisions` where nid in (2648,19412,19410,19414,19418,19410,2567,9190,2647);";

$req = db_query($sql);

while($node = db_fetch_array($req)){

$data =  "UPDATE `node_revisions` SET `body` = '".str_replace("'","\'",$node['body']) ."' WHERE `node_revisions`.`nid` = ".$node['nid'].";\r\n\r\n";


fwrite($fh, $data);

}

fclose($fh);

echo "it\s ok ?\r\n";
