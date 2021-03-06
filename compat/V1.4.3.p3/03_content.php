<?php

ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', dirname(__FILE__) . '/error_log.txt');
error_reporting(E_ALL & ~E_NOTICE);
//ini_set('memory_limit', '400M');
include_once './includes/bootstrap.inc';
drupal_bootstrap(DRUPAL_BOOTSTRAP_FULL); 
echo "bootstrap loaded\n";


// create page node
$google_page = new stdClass();
$google_page->type = 'page';
$google_page->uid = 1;
$google_page->status = 1;
$google_page->created = time();
$google_page->changed = time();
$google_page->title = 'Disclaimer google analytics';
$google_page->body = ' <p>This website uses Google Analytics, a web analytics service provided by Google, Inc. (&quot;Google&quot;). Google Analytics uses &quot;cookies&quot;, which are text files placed on your computer to help the website analyse how visitors use the site. The information generated by the cookie about your use of the website
 (including your IP address) will be transmitted to and stored by Google on servers in the United States . Google will use this information for the purpose of evaluating your use of the website, compiling reports on website activity for website operators and providing other services relating to website activity and internet usage. Google may also transfer this information to third parties where required to do so by law, or where such third parties process the information on Google&#39;s behalf. Google will not associate your IP address with any other data held by Google. You may refuse the use of cookies by selecting the appropriate settings on your browser, however please note that if you do this you may not be able to use the full functionality of this website. By using this website, you consent to the processing of data about you by Google in the manner and for the purposes set out above.</p>';
node_save($google_page);
$item = array(
  'link_path' => 'node/' . $google_page->nid,
  'link_title' => 'Analytics Disclaimer',
  'menu_name' => 'secondary-links',
  'plid' => 0,
  'hidden' => 0
);
menu_link_save($item);
menu_link_delete(15905);
echo "page node created\n";


echo "done\n";
