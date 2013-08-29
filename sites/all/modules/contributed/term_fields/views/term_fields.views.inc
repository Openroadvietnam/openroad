<?php

/**
 * @file
 * Views integration for Term fields module.
 */

/**
 * Implements hook_views_data().
 */
function term_fields_views_data() {
  if ($fields = term_fields_get_fields('fields')) {
    $data = array();
    
    $data['term_fields_term']['table'] = array(
      'group' => t('Term fields'),
      'join' => array(
        'term_data' => array(
          'table' => 'term_fields_term',
          'left_field' => 'tid',
          'field' => 'tid'
        ),
        'node' => array(
          'table' => 'term_fields_term',
          'left_table' => 'term_node',
          'left_field' => 'tid',
          'field' => 'tid',
        ),
        'node_revision' => array(
          'table' => 'term_fields_term',
          'left_table' => 'term_node',
          'left_field' => 'tid',
          'field' => 'tid',
        ),
      ),
    );
    
    $data['term_fields_term_term']['table'] = array(
      'group' => t('Term fields'),
      'join' => array(
        'term_data' => array(
          'table' => 'term_fields_term',
          'left_field' => 'tid',
          'field' => 'tid',
        ),
      ),
    );
    
    foreach ($fields as $field) {
      if ($field_data = module_invoke($field->module, 'term_fields_api', 'views data', $field)) {
        $data['term_fields_term'] += $field_data;
      }
    }
    
    return $data;
  }
}

/**
 * Implementation of hook_views_handlers().
 */
function term_fields_views_handlers() {
  return array(
    'info' => array(
      'path' => drupal_get_path('module', 'term_fields') . '/views',
    ),
    'handlers' => array(
      'term_fields_handler_field' => array(
        'parent' => 'views_handler_field',
      ),
      'term_fields_handler_field_textarea' => array(
        'parent' => 'term_fields_handler_field',
      ),
      'term_fields_handler_field_numeric' => array(
        'parent' => 'views_handler_field_numeric',
      ),
      'term_fields_handler_field_date' => array(
        'parent' => 'views_handler_field_date',
      ),
    )
  );
}
