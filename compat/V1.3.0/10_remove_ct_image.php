<?php

ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', dirname(__FILE__) . '/error_log.txt');
error_reporting(E_ALL & ~E_NOTICE);
ini_set('memory_limit', '400M');
require_once './includes/bootstrap.inc';
drupal_bootstrap(DRUPAL_BOOTSTRAP_FULL);


$res = db_query("select nid from node where node.type = 'image'");

//deletes nodes
while ($node = db_fetch_object($res)){
  node_delete ($node->nid);
}

// deletes content type image
node_type_delete('image');
node_types_rebuild();
menu_rebuild();



variable_del ('comment_upload_images_image');
variable_del ('content_extra_weights_image');
variable_del ('enable_revisions_page_image');
variable_del ('comment_anonymous_image');
variable_del ('comment_controls_image');
variable_del ('comment_default_mode_image');
variable_del ('comment_default_order_image');
variable_del ('comment_default_per_page_image');
variable_del ('comment_form_location_image');
variable_del ('comment_image');
variable_del ('comment_preview_image');
variable_del ('comment_subject_field_image');
variable_del ('content_profile_use_image');
variable_del ('language_content_type_image');
variable_del ('og_max_groups_image');


