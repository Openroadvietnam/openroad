<?php
  ini_set('memory_limit', '400M');
require_once './includes/bootstrap.inc';
require_once('./sites/all/modules/contributed/pathauto/pathauto.inc');
drupal_bootstrap(DRUPAL_BOOTSTRAP_FULL);

//retrieve latest nodes
$sql = "SELECT * FROM `node` join `node_revisions` on node.nid = node_revisions.nid where node.type = 'page' and node.nid in (19866)";

$req = db_query($sql);

//var_dump($results);
$uid = 'node_add'.uniqid(date('dmy'));
$ext = ".php";
$myFile = $uid.$ext;
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

while($node = db_fetch_array($req)){

$path = 'node/'.$node['nid'];
 $sql_path = "SELECT * 
 FROM `url_alias` 
 where `src` = '$path'";
 $req_path =  db_query($sql_path);
 $row_path = db_fetch_array($req_path);
 $node['path'] = $row_path['dst'];


  $data .=  "
	
	\$newNode = (object) NULL;
	\$newNode->type = '{$node['type']}';
	\$newNode->title = '". str_replace("'","\'",$node['title']) ."';
	\$path = '{$node['path']}';	
	\$newNode->uid = 1;
	\$newNode->created = strtotime('now');
	\$newNode->changed = strtotime('now');
	\$newNode->status = 1;
	\$newNode->language = 'en';
	\$newNode->body = '". str_replace("'","\'",$node['body']) ."';
	node_save(\$newNode);	
	\$nid = \$newNode->nid;
	\$sql = \"UPDATE `url_alias` SET `dst` = '\".\$path.\"' WHERE `src` = 'node/\".\$nid.\"'\";
	db_query(\$sql);
	/** ===================================================================================================== */";
}

fwrite($fh, $data);
fclose($fh);

echo "it's ok ?\r\n";
