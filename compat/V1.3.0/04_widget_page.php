<?php

ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', dirname(__FILE__) . '/error_log.txt');
error_reporting(E_ALL & ~E_NOTICE);
ini_set('memory_limit', '400M');
require_once './includes/bootstrap.inc';
drupal_bootstrap(DRUPAL_BOOTSTRAP_FULL);


$newNode = (object) NULL;
$newNode->type = 'page';
$newNode->title = 'Widget JoinUP';
$newNode->uid = 1;
$newNode->created = strtotime("now");
$newNode->changed = strtotime("now");
$newNode->status = 1;
$newNode->language = 'en';
$newNode->body = '<p>Dear All,</p>
<p>The JoinUP team has developed a widget, that can be included in your  website, allowing your visitors to search for projects hosted either by JoinuP. The search results are displayed in English, in a  new window.&nbsp;</p>
<h2>How can I implement it?</h2>
<p>The widget is composed of 3 different parts which are:</p>
<ol>
    <li>The HTML page</li>
    <li>The css file which is entirely customizable (please just leave the JoinUp logo)</li>
    <li>The java script which passes the parameters of the search.</li>
</ol>
<p>In order to make the widget work on your website please follow these simple instructions:</p>
<ol>
    <li>Download the <a href="../sites/default/files/widget/widgetjoinup.zip">zip file</a></li>
    <li>Place the files somewhere in the Document Root of your web server.</li>
    <li>Include the html code, which you can find in the zip file, in your website</li>
    <li>Change the css path, the javascript path and the JoinUP logo path as per your configuration.</li>
</ol>
<div class="block"><strong><code><span class="red">#Change the path to point to your css location</span></code></strong><code><span class="red"><br />
&lt;link href=&quot;css/main.css&quot; rel=&quot;stylesheet&quot; type=&quot;text/css&quot;&gt;  <strong>#Change the path to point to your java-script location</strong><br />
&lt;script src=&quot;js/search.js&quot; type=&quot;text/javascript&quot;&gt;&lt;/script&gt;  &lt;div id=&quot;stylized&quot; class=&quot;myform&quot;&gt;<br />
&lt;b class=&quot;rtop&quot;&gt;&lt;b class=&quot;r1&quot;&gt;&lt;/b&gt;&lt;b class=&quot;r2&quot;&gt;&lt;/b&gt;&lt;b class=&quot;r3&quot;&gt;&lt;/b&gt;&lt;b class=&quot;r4&quot;&gt;&lt;/b&gt;&lt;/b&gt;<br />
&lt;div class=&quot;title&quot;&gt;<br />
&lt;div id=&quot;top&quot;&gt;<br />
<strong>#Change the path to point to your image location</strong><br />
&lt;div&gt;Search on JoinUp &lt;img src=&quot;img/1251192308_zoom in.png&quot; width=&quot;25&quot; height=&quot;25&quot; /&gt;&lt;/div&gt;<br />
&lt;/div&gt;&lt;/div&gt;<br />
&lt;div class=&quot;line&quot;&gt;<br />
&lt;form method=&quot;post&quot; name=&quot;form&quot; class=&quot;margin&quot; id=&quot;form&quot; &gt;<br />
&lt;p align=&quot;center&quot;&gt;<br />
&lt;br /&gt;<br />
Search projects in &lt;a href=&quot;#&quot; title=&quot;JoinUp&quot; onclick=&quot;joinup_popup();&quot;&gt;JoinUp&lt;/a&gt; around Europe  &lt;/p&gt;<br />
&lt;input type=&quot;text&quot; name=&quot;inputbox&quot; id=&quot;inputbox&quot; /&gt;<br />
&lt;button type=&quot;submit&quot; onClick=&quot;testResults(this.form)&quot;&gt;Search&lt;/button&gt;	<br />
&lt;div align=&quot;right&quot;&gt;&lt;a href=&quot;http://www.joinup.ec.europa.eu&quot; title=&quot;JoinUp&quot; target=&quot;_blank&quot;&gt;<br />
<br />
&lt;img src=&quot;JOINUP_LOGO_75_powered.jpg&quot; width=&quot;75&quot; height=&quot;37&quot; border=0/&gt;&lt;/a&gt;<br />
&lt;span class=&quot;style5&quot;&gt;&lt;/span&gt;&lt;/span&gt;&lt;/div&gt;<br />
&lt;div class=&quot;spacer&quot;&gt;&lt;/div&gt;<br />
&lt;/form&gt;<br />
&lt;/div&gt;<br />
&lt;b class=&quot;rbottom&quot;&gt;&lt;b class=&quot;r4&quot;&gt;&lt;/b&gt;&lt;b class=&quot;r3&quot;&gt;&lt;/b&gt;&lt;b class=&quot;r2&quot;&gt;&lt;/b&gt;&lt;b class=&quot;r1&quot;&gt;&lt;/b&gt;&lt;/b&gt;<br />
&lt;/div&gt;	<br />
</span>
<p></p>
<p><code><img alt="widget example" src="../sites/default/files/widget/widget.png" /></code></p>
</div>';
$widget = node_save($newNode);

$nid_widget = $newNode->nid;
$delete_alias = "Delete from `url_alias` where  dst = '%page/widget%'";

//add url alias
$insert_alias = "INSERT INTO `url_alias` (
`pid` ,
`src` ,
`dst` ,
`language`
)
VALUES (
NULL , 'node/{$nid_widget}','page/widget',  'en'
);";
db_query($delete_alias);
db_query($insert_alias);

//add files to page attachment
$sql = "INSERT INTO `files` (`fid`, `uid`, `filename`, `filepath`, `filemime`, `filesize`, `status`, `timestamp`) 
  VALUES (NULL, '1', 'widgetjoinup.zip', 'sites/default/files/widget/widgetjoinup.zip', 'application/zip', '09857', '1', '1330434513');";
db_query($sql);
$fid = db_last_insert_id('files', 'fid');
$sql = "INSERT INTO `upload` (`fid`, `nid`, `vid`, `description`, `list`, `weight`) VALUES ('$fid','$newNode->nid', '$newNode->vid', 'widgetjoinup.zip', '0', '0');";
db_query($sql);

$sql = "INSERT INTO `files` (`fid`, `uid`, `filename`, `filepath`, `filemime`, `filesize`, `status`, `timestamp`) 
  VALUES (NULL, '1', 'widget.png', 'sites/default/files/widget/widget.png', 'image/png', '027461', '1', '1330434513');";
db_query($sql);

$fid = db_last_insert_id('files', 'fid');
$sql = "INSERT INTO `upload` (`fid`, `nid`, `vid`, `description`, `list`, `weight`) VALUES ('$fid','$newNode->nid', '$newNode->vid', 'widget.png', '0', '0');";
db_query($sql);
