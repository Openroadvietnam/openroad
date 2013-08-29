<?php

ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', dirname(__FILE__) . '/error_log.txt');
error_reporting(E_ALL & ~E_NOTICE);
//ini_set('memory_limit', '400M');
//ini_set('memory_limit', '400M');
include_once './includes/bootstrap.inc';
drupal_bootstrap(DRUPAL_BOOTSTRAP_FULL); 
echo "bootstrap loaded\n";
/////////////////////////////////////////////DELETE IMAGE CACHE IMAGES
$presets = imagecache_presets();
array_walk($presets,function($val){
	$presetdir = realpath(file_directory_path() .'/imagecache/'. $val['presetname']);
	if (is_dir($presetdir)) {
		_imagecache_recursive_delete($presetdir);
	}
}); 
echo "image caches deletes\n";
/////////////////////////////////////////////VARIABLE
//TEXT
variable_set('header_block_news_list_description','<p>Create, read and comment news on interoperability solutions for public administrations</p>');
echo "text changed\n";
//TEXT MAILS
variable_set('asset_validated_mail_body','<p>Dear&nbsp;[recipient-firstname],</p>
<p>Your asset release [isa_node_link] has been published and is now available on [site-name].</p>
<p>Thank you for sharing information on [site-name].</p>');

variable_set('user_mail_password_reset_body',"Dear [recipient-firstname],

A request to reset the password for your account with the username of: !username has been made at !site.

You may now log in to !uri_brief by clicking on this link or copying and pasting it in your browser:
!login_url

This is a one-time login, so it can be used only once. It expires after one day and nothing will happen if it's not used.

After logging in, you will be redirected to !edit_uri so you can change your password.");
echo "text mail changed\n";
//CONFIGURATION
variable_set('project_release_file_extensions','<all>');
echo "configuration changed";