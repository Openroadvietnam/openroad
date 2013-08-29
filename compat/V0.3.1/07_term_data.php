<?php

/*
 *
 *
 */
ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', dirname(__FILE__) . '/error_log.txt');
error_reporting(E_ALL);


ini_set('memory_limit', '400M');
require_once './includes/bootstrap.inc';
drupal_bootstrap(DRUPAL_BOOTSTRAP_FULL);

//term list for "newsletter" vocabulary
$newsletter_vid = variable_get ('newsletter_vid',NULL);
$terms [$newsletter_vid] = array ('General newsletter');

// term list for "factsheet topic" vocabulary!
$factsheet_topic_vid = variable_get ('factsheet_topic_vid',NULL);
$terms [$factsheet_topic_vid] = array ('Actors','Areas','The Future of eInclusion','eServices for Administration','Country profile','Digital Literacy and Competences','e-Accessibility','e-Inclusion Challenges','e-Inclusion and Cultural Diversity','eServices for Businesses','eServices for citizens','Geographic digital divide','History','Inclusive eGovernment','ICT & Ageing','Infrastructure','Internal Services','Legal Framework','National infrastructure','Research in Practice','Society','Strategy','Who is who');

$free_event_vid = variable_get ('free_event_vid',NULL);
$terms [$free_event_vid] = array ('No, participants have to pay a fee', 'Yes, participant has no cost');

$open_event_vid = variable_get ('open_event_vid',NULL);
$terms [$open_event_vid] = array ('No, restricted event, only by invitation', 'Yes, event with unrestricted attendance');

$organisation_type_vid = variable_get ('organisation_type_vid',NULL);
$terms [$organisation_type_vid] = array ('Academia', 'Non-profit', 'Private (large enterprise)', 'Private (SME or independent)', 'Public');

foreach ($terms as $vid => $term_list ){
	foreach ($term_list as $key => $term_name){
		$term = array ();
		$term['name'] = $term_name;
		$term['vid'] = $vid;
		taxonomy_save_term ($term);
	}
}