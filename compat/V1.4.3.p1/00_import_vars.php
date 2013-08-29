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
//TEXT MAILS
variable_set('asset_validated_mail_body','Dear&nbsp;[recipient-firstname],

Your asset release [isa_node_link] has been published and is now available on [site-name].

Thank you for sharing information on [site-name].');
variable_set('user_mail_password_reset_body',"Dear [recipient-firstname],

A request to reset the password for your account with the username of: !username has been made at !site.

You may now log in to !uri_brief by clicking on this link or copying and pasting it in your browser:
!login_url

This is a one-time login, so it can be used only once. It expires after one day and nothing will happen if it's not used.

After logging in, you will be redirected to !edit_uri so you can change your password.");
echo "text mail changed\n";
//FIVESTARS
variable_set('fivestar_colors','{s:3:"on1";s:7:"#ffbf00";s:3:"on2";s:7:"#f5d000";s:6:"hover1";s:7:"#ffbf00";s:6:"hover2";s:7:"#027ac6";s:4:"off1";s:7:"#cccccc";s:4:"off2";s:7:"#dfdfdf";s:5:"matte";s:7:"#ffffff";}');
variable_set('fivestar_color_type','solid');
variable_set('fivestar_widget','sites/all/modules/contributed/modified/fivestar/widgets/basic/basic.css');
echo "fivestars configure\n";
//Pathc1
variable_set('header_block_news_list_title','News');
echo "news title changed\n";
db_query("UPDATE menu_links SET link_path='node/64064' WHERE mlid=15905"); 
///////CREATE TOP TITLE FIELD IN ADVERTISING CONTENT TYPE
$field  =  array (
    'label' => 'Top title',
    'field_name' => 'field_top_title',
    'type' => 'text',
    'widget_type' => 'text_textfield',
    'change' => 'Change basic information',
    'weight' => '-4',
    'rows' => 5,
    'size' => '60',
    'description' => '',
    'default_value' => 
    array (
      0 => 
      array (
        'value' => '',
        '_error_element' => 'default_value_widget][field_top_title][0][value',
      ),
    ),
    'default_value_php' => '',
    'default_value_widget' => NULL,
    'group' => false,
    'required' => 0,
    'multiple' => '0',
    'text_processing' => '0',
    'max_length' => '100',
    'allowed_values' => '',
    'allowed_values_php' => '',
    'op' => 'Save field settings',
    'module' => 'text',
    'widget_module' => 'text',
    'columns' => 
    array (
      'value' => 
      array (
        'type' => 'varchar',
        'length' => '100',
        'not null' => false,
        'sortable' => true,
        'views' => true,
      ),
    ),
    'display_settings' => 
    array (
      'label' => 
      array (
        'format' => 'above',
        'exclude' => 0,
      ),
      'teaser' => 
      array (
        'format' => 'default',
        'exclude' => 0,
      ),
      'full' => 
      array (
        'format' => 'default',
        'exclude' => 0,
      ),
      4 => 
      array (
        'format' => 'default',
        'exclude' => 0,
      ),
      2 => 
      array (
        'format' => 'default',
        'exclude' => 0,
      ),
      3 => 
      array (
        'format' => 'default',
        'exclude' => 0,
      ),
      'email_plain' => 
      array (
        'format' => 'default',
        'exclude' => 0,
      ),
      'email_html' => 
      array (
        'format' => 'default',
        'exclude' => 0,
      ),
      'token' => 
      array (
        'format' => 'default',
        'exclude' => 0,
      ),
    ),
);
// Need to load the CCK include file where content_field_instance_create() is defined.
module_load_include('inc', 'content', 'includes/content.crud');
$field['type_name'] = 'advertisement';
content_field_instance_delete('field_top_title',$field['type_name'] );
content_field_instance_create($field) ;
echo "done";