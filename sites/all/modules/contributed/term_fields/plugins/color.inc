<?php

/**
 * @file
 * Plugin definition for Term Fields color fields.
 */

/**
 * Builds a color field form.
 * 
 * @see term_fields_term_fields_forms_api().
 * @ingroup forms
 */
function term_fields_color_field_form($field, $values, &$main_form, &$form_state) {
  $form = array();
  
  $default_value = isset($values[$field->fid .'_value']) ?
    $values[$field->fid .'_value'] :
    (isset($field->options['default']['value']) ? $field->options['default']['value'] : '');
  
  switch ($field->widget) {
  
    case 'colorpicker':
      $form['value'] = array(
        '#type' => 'colorpicker_textfield',
        '#default_value' => '#'. $default_value,
      );
      break;
    
    case 'jquery_colorpicker':
      $form['value'] = array(
        '#type' => 'colorpicker',
        '#default_value' => $default_value,
      );
      break;
  }
  
  $form['value']['#title'] = check_plain($field->title);
  $form['value']['#description'] = filter_xss_admin($field->description);
  $form['value']['#required'] = $field->required;
  
  return $form;
}

/**
 * Provides information about database storage.
 * 
 * @see term_fields_term_fields_api().
 */
function term_fields_color_storage($field) {
  $columns = array();
  
  $columns[$field->fid .'_value'] = array(
    'type' => 'varchar',
    'length' => 6,
    'not null' => FALSE,
  );
  
  return $columns;
}

/**
 * Gets Views data.
 * 
 * @see term_fields_term_fields_api().
 */
function term_fields_color_views_data($field) {
  $data = array();
  
  $data[$field->fid .'_value'] = array(
    'title' => term_fields_views_format_title($field),
    'help' => term_fields_views_format_help($field),
    'field' => array(
       'handler' => 'term_fields_handler_field',
       'term_fields_field_name' => $field->fid,
    ),
    'filter' => array(
      'handler' => 'views_handler_filter_string',
      'allow empty' => TRUE,
    ),
  );
  
  return $data;
}

/**
 * Saves a field.
 * 
 * @see term_fields_term_fields_api().
 */
function term_fields_color_field_save($field, $values) {
  return array($field->fid .'_value' => (isset($values['value']) ? ltrim($values['value'], '#') : ''));
}

/**
 * Display a color field.
 * 
 * @see term_fields_term_fields_api().
 */
function term_fields_color_field_display($field, $values) {
  if (! isset($values[$field->fid .'_value'])) {
    return NULL;
  }
  
  if (! strlen($values[$field->fid .'_value'])) {
    return '';
  }
  
  if (! empty($field->options['add_sharp'])) {
    $values[$field->fid .'_value'] = '#'. $values[$field->fid .'_value'];
  }
  
  return check_plain($values[$field->fid .'_value']);
}

/**
 * Builds a color field settings form.
 * 
 * @see term_fields_term_fields_forms_api()
 * @see term_fields_color_settings_form_submit()
 * @ingroup forms
 */
function term_fields_color_settings_form($field, $values, &$main_form, &$form_state) {
  $form = array();
  
  $form['add_sharp'] = array(
    '#type' => 'checkbox',
    '#title' => t('Add a sharp character before the color code'),
    '#default_value' => ! empty($field->options['add_sharp']),
  );
  
  return $form;
}

/**
 * Submit handler for a date field settings form.
 *
 * Removes useless entries from the options array.
 * 
 * @see term_fields_term_fields_forms_api()
 * @see term_fields_color_settings_form()
 */
function term_fields_color_settings_form_submit($field, $values, &$form, &$form_state) {
  if (! empty($form_state['values']['options']['default']['value'])) {
    $form_state['values']['options']['default']['value'] = ltrim($form_state['values']['options']['default']['value'], '#');
  }
}
