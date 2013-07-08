<?php

ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', dirname(__FILE__) . '/error_log.txt');
error_reporting(E_ALL & ~E_NOTICE);
//ini_set('memory_limit', '400M');
include_once './includes/bootstrap.inc';
drupal_bootstrap(DRUPAL_BOOTSTRAP_FULL); 
echo "bootstrap loaded\n";


// delete image cache images
$presets = imagecache_presets();
array_walk($presets,function($val){
	$presetdir = realpath(file_directory_path() .'/imagecache/'. $val['presetname']);
	if (is_dir($presetdir)) {
		_imagecache_recursive_delete($presetdir);
	}
}); 
echo "image caches deleted\n";


// variable settings


variable_set('header_block_search_title','Advanced search');
variable_set('header_block_search_description','');
echo "saved search header texts\n";


variable_set('header_block_news_list_title','News');
variable_set('header_block_news_list_description','<p>Create, read and comment news on interoperability solutions for public administrations</p>');
echo "saved news header texts\n";


variable_set('asset_validated_mail_body','<p>Dear&nbsp;[recipient-firstname],</p>
<p>Your asset release [isa_node_link] has been published and is now available on [site-name].</p>
<p>Thank you for sharing information on [site-name].</p>');
variable_set('user_mail_password_reset_body',"Dear [recipient-firstname],

A request to reset the password for your account with the username of: !username has been made at !site.

You may now log in to !uri_brief by clicking on this link or copying and pasting it in your browser:
!login_url

This is a one-time login, so it can be used only once. It expires after one day and nothing will happen if it's not used.

After logging in, you will be redirected to !edit_uri so you can change your password.");
echo "saved email texts\n";


$subscriptions_send_intervals = Array('1' => 'Instant. notification','3600' => 'Hourly','86400' => 'Daily','604800' => 'Weekly');
variable_set('subscriptions_send_intervals', $subscriptions_send_intervals);
echo "saved subscription short text options\n";


variable_set('site_404','page_not_found');
echo "saved site_404\n";


$htmLawed_format_2 = array(
	'config'=>"'safe'=>1, 'elements'=>'a, div, span, p, h1, h2, h3, h4, h5, h6,strong, em, u, abbr, acronym, address, bdo, blockquote, cite, q, code, ins, del, dfn, kbd, pre, samp, var, br, img, area, map, legend, table, tr, td, th, tbody, thead, tfoot, col, colgroup, caption, ul, ol, li, dl, dt, dd, hr', 'deny_attribute'=>'id, style'",
	'spec'=>'', 
	'help'=>'<p>Tags allowed: a, em, u, strong, cite, code, ol, ul, li, dl, dt, dd</p>'
);
variable_set('htmLawed_format_2', $htmLawed_format_2);
echo "saved htmllawed filter setting\n";


variable_set('project_release_file_extensions','<all>');
echo "saved project_release file extensions\n";


variable_set('fivestar_colors','{s:3:"on1";s:7:"#ffbf00";s:3:"on2";s:7:"#f5d000";s:6:"hover1";s:7:"#ffbf00";s:6:"hover2";s:7:"#027ac6";s:4:"off1";s:7:"#cccccc";s:4:"off2";s:7:"#dfdfdf";s:5:"matte";s:7:"#ffffff";}');
variable_set('fivestar_color_type','solid');
variable_set('fivestar_widget','sites/all/modules/contributed/modified/fivestar/widgets/basic/basic.css');
echo "saved fivestars settings\n";


$initial = variable_get('apachesolr_facet_query_initial_limits',0);
$initial['apachesolr_facetbuilder']['sm_facetbuilder_facet_node_type'] = 20;
variable_set('apachesolr_facet_query_initial_limits',$initial);
$limit = variable_get('apachesolr_facet_query_limits',0);
$limit['apachesolr_facetbuilder']['sm_facetbuilder_facet_node_type'] = 50;
variable_set('apachesolr_facet_query_limits',$limit);
echo "saved apachesolr node_type facet settings\n";


echo "done\n";
