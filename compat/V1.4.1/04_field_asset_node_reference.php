<?php

ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', dirname(__FILE__) . '/error_log.txt');
error_reporting(E_ALL & ~E_NOTICE);
//ini_set('memory_limit', '400M');
require_once './includes/bootstrap.inc';
drupal_bootstrap(DRUPAL_BOOTSTRAP_FULL);

// https://webgate.ec.europa.eu/CITnet/jira/browse/ISAICP-653
// Propose Semantic Asset (release) form does not follow the technical specifications. 
// Change configuration of flexi-field applied to the field field_asset_node_reference, so that initially only one field (instead of 4 currently) is displayed in the form

// target field
$field_name = 'field_asset_node_reference';
$type_name = 'asset_release';

// get configuration
$query = "SELECT widget_settings FROM content_node_field_instance WHERE field_name='%s' AND type_name='%s'";
$config_str = db_result(db_query($query, $field_name, $type_name));

// remove the "default_value" component
$config_arr = unserialize($config_str);
$config_arr['default_value'] = null;
$config_str = serialize($config_arr);

// save changes
$query = "UPDATE content_node_field_instance SET widget_settings='%s' where field_name='%s' AND type_name='%s'";
db_query($query, $config_str, $field_name, $type_name);

?>