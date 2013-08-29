<?php

ini_set('display_errors', 0);
ini_set('log_errors', 1);
ini_set('error_log', dirname(__FILE__) . '/uninstall_module_errors_log.txt');
error_reporting(E_ALL);
ini_set('memory_limit', '400M');
require_once './includes/bootstrap.inc';
require_once('./includes/install.inc');
drupal_bootstrap(DRUPAL_BOOTSTRAP_FULL);

$disabled_modules = array ('advagg' , 'performance', 'jquery_update' , 'devel_themer', 'coder' );
foreach ($disabled_modules as $value) {
    drupal_uninstall_module($value);
}