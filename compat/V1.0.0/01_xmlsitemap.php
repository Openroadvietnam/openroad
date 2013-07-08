<?php 
ini_set('display_errors', 1);
  ini_set('log_errors', 1);
  ini_set('error_log', dirname(__FILE__) . '/error_log.txt');
  error_reporting(E_ALL);
  ini_set('memory_limit', '400M');
  require_once './includes/bootstrap.inc';
  require_once './sites/all/modules/contributed/xmlsitemap/xmlsitemap.module';
  drupal_bootstrap(DRUPAL_BOOTSTRAP_FULL);
	
  db_query("INSERT INTO {xmlsitemap} (type, id, loc, priority, changefreq) VALUES ('frontpage', 0, '', %f, %d)", variable_get('xmlsitemap_frontpage_priority', 1.0), variable_get('xmlsitemap_frontpage_changefreq', XMLSITEMAP_FREQUENCY_DAILY));

  // Insert the default context sitemap.
  $context = array();
  db_query("INSERT INTO {xmlsitemap_sitemap} (smid, context) VALUES ('%s', '%s')", xmlsitemap_sitemap_get_context_hash($context), serialize($context));
  variable_set('xmlsitemap_regenerate_needed', TRUE);
