<?php

ini_set('memory_limit', '400M');
ini_set('error_log', dirname(__FILE__) . '/error_log.txt');
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('log_errors', 1);
require_once './includes/bootstrap.inc';
require_once('./sites/all/modules/contributed/apachesolr/apachesolr.module');
require_once('./sites/all/modules/contributed/apachesolr/apachesolr.admin.inc');
drupal_bootstrap(DRUPAL_BOOTSTRAP_FULL);

//delete index
apachesolr_delete_index();
drupal_set_message(t('The Apache Solr content index has been erased. You must now !run_cron until your entire site has been re-indexed.', array('!run_cron' => l(t('run cron'), 'admin/reports/status/run-cron', array('query' => array('destination' => 'admin/settings/apachesolr/index'))))));

//generate index
apachesolr_rebuild_index_table();
