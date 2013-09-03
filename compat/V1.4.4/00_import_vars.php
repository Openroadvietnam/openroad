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

/////////////////////////////////////////////VARIABLE
//TEXT
$contact_form_categories_terms = Array('TECH' => 'Technical problems/bug reporting', 'USAGE' => 'Questions on usage', 'FEATURE' => 'Feature requests', 'LEGAL' => 'Questions on legal issues', 'ABUSE' => 'Abusive content', 'OTHER' => 'other');
variable_set('contact_form_categories_terms', $contact_form_categories_terms);
echo "New category in the contact form\n";


$contact_form_categories_help = "<p><strong>Technical problems/bug reporting</strong> : Error messages, platform's services don't work or similar technical problems.</p><p><strong>Feature requests</strong> : problems related to the use of platform's services or proposal for improving and/or introducing new services.</p><p><strong>Questions on legal issues</strong>: Depending on your specific project and message below, a JOINUP legal expert will provide you opinions related to open source licensing (which free/open source licence could you use), combining/linking, distribution, procurement, possible exceptions etc. Disclaimer: This is a free of charge JOINUP service, delivered “as is” based on received information. Opinions are not an official position of the European Commission. Opinions should not be assimilated to a formal legal consultation from a private lawyer to his client.</p><p><strong>Abusive content</strong>: 
Select this option to report an inappropiate content.</p>";
variable_set('contact_form_categories_help', $contact_form_categories_help);
echo "Help text in the contact form\n";