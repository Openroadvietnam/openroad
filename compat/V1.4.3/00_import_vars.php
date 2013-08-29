<?php

ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', dirname(__FILE__) . '/error_log.txt');
error_reporting(E_ALL & ~E_NOTICE);
//ini_set('memory_limit', '400M');
require_once './includes/bootstrap.inc';
drupal_bootstrap(DRUPAL_BOOTSTRAP_FULL);
/////////////////////////////////////////////ADD PAGE CONTENT
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
/////////////////////////////////////////////VARIABLE
//STATIC TEXT
variable_set('header_block_search_title','Advanced search');
variable_set('header_block_search_description','');
//TEXT MAILS
variable_set('asset_validated_mail_body','<p>Dear&nbsp;[recipient-firstname],</p>
<p>Your asset release [isa_node_link] has been published and is now available on [site-name].</p>
<p>Thank you for sharing information on [site-name].</p>
<p>The Joinup Team</p>');
variable_set('user_mail_password_reset_body',"<p>Dear [recipient-firstname],</p>
<p>A request to reset the password for your account with the username of: !username has been made at !site.</p>
<p>You may now log in to !uri_brief by clicking on this link or copying and pasting it in your browser:</p>
<p>!login_url</p>
<p>This is a one-time login, so it can be used only once. It expires after one day and nothing will happen if it's not used.</p>
<p>After logging in, you will be redirected to !edit_uri so you can change your password.</p>");
//FIVESTARS
variable_set('fivestar_widget', 'sites/all/modules/contributed/modified/fivestar/widgets/basic/basic.css');
//404
variable_set('site_404','page_not_found');
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
content_field_instance_create($field) ;