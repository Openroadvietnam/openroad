<?php
require_once './includes/bootstrap.inc';
require_once('./sites/all/modules/contributed/pathauto/pathauto.inc');
drupal_bootstrap(DRUPAL_BOOTSTRAP_FULL);

//retrieve latest nodes
$sql = "SELECT * FROM `node` join `node_revisions` on node.nid = node_revisions.nid
where node.type = 'page' and node.nid in (3067,3068,3070,3071,3072,3073,3074,3075,3076,3077,3078,3079,3080,3081,3082,3083,3084,3086,3087,3088,3089,3090)";

$req = db_query($sql);

while($row = db_fetch_array($req)){
  $results[] = $row;
}

//var_dump($results);
$uid = uniqid(date('dmy'));
$ext = ".php";
$myFile = $uid.$ext;
$fh = fopen($myFile, 'a') or die("can't open file");
fwrite($fh, "<?php ");
$require = "require_once './includes/bootstrap.inc';
	require_once('./sites/all/modules/contributed/pathauto/pathauto.inc');";
fwrite($fh, $require);
foreach($results as $node)
{	
	$data =  "
	drupal_bootstrap(DRUPAL_BOOTSTRAP_FULL);
	\$newNode = (object) NULL;
	\$newNode->type = '{$node['type']}';
	\$newNode->title = '{$node['title']}';	
	\$newNode->path = '{$node['nid']}';	
	\$newNode->uid = 1;\n
	\$newNode->created = strtotime('now');
	\$newNode->changed = strtotime('now');
	\$newNode->status = 1;
	\$newNode->language = 'en';
	\$newNode->body = '".mysql_real_escape_string($node['body'])."';
	node_save(\$newNode);";	
	fwrite($fh, $data);
}
fclose($fh);
