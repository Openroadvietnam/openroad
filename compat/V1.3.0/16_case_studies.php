<?php

ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', dirname(__FILE__) . '/error_log.txt');
error_reporting(E_ALL & ~E_NOTICE);
ini_set('memory_limit', '400M');
require_once './includes/bootstrap.inc';
require_once './sites/all/modules/contributed/pathauto/pathauto.inc';
require_once './sites/all/modules/contributed/pathauto/pathauto_node.inc';
drupal_bootstrap(DRUPAL_BOOTSTRAP_FULL);

global $user;
$user = user_load(1);

//Rename tables (content type renamed)
db_query("RENAME TABLE content_type_case TO content_type_case_epractice");
db_query("RENAME TABLE content_type_study TO content_type_case");

node_type_update_nodes('case', 'case_epractice');
node_type_update_nodes('study', 'case');

//Insert the vid into the variables table
variable_set('case_type_vid', 67);
//Update the automatic aliases
variable_set('pathauto_node_case_pattern', '[isa_path_cases]/[title-raw]');
//Insert taxonomy terms in the vocabulary
$term = array(
    'vid' => 67, // Voacabulary ID
    'name' => 'General case study', // Term Name
);
taxonomy_save_term($term);
$term = array(
    'vid' => 67, // Voacabulary ID
    'name' => 'Open source case study', // Term Name
);
taxonomy_save_term($term);
$term = array(
    'vid' => 67, // Voacabulary ID
    'name' => 'Guideline', // Term Name
);
taxonomy_save_term($term);

//Save the tid
$case_study_term = array_pop(taxonomy_get_term_by_name('Open source case study'));
variable_set('case_open_source_tid', $case_study_term->tid);
$guideline_term = array_pop(taxonomy_get_term_by_name('Guideline'));
variable_set('case_guideline_tid', $guideline_term->tid);

//Update the views with correct tid
$view = views_get_view('Studies');
$view->display['page_1']->display_options['filters']['term_node_tid_depth']['value'] = array($guideline_term->tid => $guideline_term->tid);
$view->display['page_2']->display_options['filters']['term_node_tid_depth']['value'] = array($case_study_term->tid => $case_study_term->tid);
$view->save();

//Existing cases migration
$sql = "SELECT n.nid FROM {node} n WHERE type = '%s'";
$results = db_query($sql, 'case');
while ($result = db_fetch_object($results)) {
  $node = node_load($result->nid);
  switch ($node->field_type_study[0]['value']) {
    case 'case_studies_study' : $node->taxonomy[] = $case_study_term;
      break;
    case 'guidelines_study' : $node->taxonomy[] = $guideline_term;
      break;
    default: break;
  }
  workflow_execute_transition($node, 4);
  pathauto_node_update_alias($node, 'update');
  node_save($node);
}

// Comment activation for existing cases
db_query("UPDATE `node` SET `comment` = '2' WHERE `node`.`type` ='case';");