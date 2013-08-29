<?php

/**
 * @file
 * Plugin definition for Term Fields text fields.
 */

/**
 * Builds a text field form.
 * 
 * @see term_fields_term_fields_forms_api().
 * @ingroup forms
 */
function term_fields_text_field_form($field, $values, &$main_form, &$form_state) {
  $form = array();
  
  // Builds an array of default values mixed with default settings.
  $default = $values + $field->options + term_fields_text_settings_default();
  
  foreach (array('value' => '', 'format' => FILTER_FORMAT_DEFAULT) as $key => $default_value) {
    if (! isset($default[$field->fid .'_'. $key])) {
      $default[$field->fid .'_'. $key] = isset($field->options['default'][$key]) ? $field->options['default'][$key] : $default_value;
    }
  }
  
  switch ($field->widget) {
    case 'textfield':
      $form['value'] = array(
        '#type' => 'textfield',
        '#size' => $default['size'],
        '#max_length' => $default['max_length'],
      );
      break;
      
    case 'textarea':
      $form['value'] = array(
        '#type' => 'textarea',
        '#rows' => $default['rows'],
        '#cols' => $default['cols'],
        '#resizable' => $default['not_resizable'],
      );
      
      if ($default['text_processing']) {
        // Differenciate admin form from term edit form.
        // @todo should we pass an array of parent elements to this function?
        $parents = array_key_exists('#id', $main_form) ? array('fields', $field->fid, 'format') : array('options', 'default', 'format');
        $form['format'] = filter_form($default[$field->fid .'_format'], NULL, $parents);
      }
      break;
  }
  
  $form['value']['#title'] = check_plain($field->title);
  $form['value']['#default_value'] = $default[$field->fid .'_value'];
  $form['value']['#description'] = filter_xss_admin($field->description);
  $form['value']['#required'] = $field->required;
  
  return $form;
}

/**
 * Validates a field.
 * 
 * @see term_fields_term_fields_forms_api().
 */
function term_fields_text_field_form_validate($field, $values, &$form, &$form_state) {
  $values['#parents'][] = 'value';
  
  if (!empty($field->options['max_length']) && drupal_strlen($values['value']) > $field->options['max_length']) {
    form_set_error(implode('][', $values['#parents']), t('Field %field: the value may not be longer than %max characters.', array('%field' => $field->title, '%max' => $field->options['max_length'])));
  }
}

/**
 * Provides information about database storage.
 * 
 * @see term_fields_term_fields_api().
 */
function term_fields_text_storage($field) {
  $columns = array();
  
  // Inspirated by CCK text module: see text_field_settings().
  if (empty($field->options['max_length']) || $field->options['max_length'] > 255) {
    $columns[$field->fid .'_value'] = array(
      'type' => 'text',
      'size' => 'big',
      'not null' => FALSE,
    );
  }
  else {
    $columns[$field->fid .'_value'] = array(
      'type' => 'varchar',
      'length' => $field->options['max_length'],
      'not null' => FALSE,
    );
  }
  
  if ($field->widget === 'textarea' && ! empty($field->options['text_processing'])) {
    $columns[$field->fid .'_format'] = array(
      'type' => 'int',
      'unsigned' => TRUE,
      'not null' => FALSE,
    );
  }
  
  return $columns;
}

/**
 * Gets Views data.
 * 
 * @see term_fields_term_fields_api().
 */
function term_fields_text_views_data($field) {
  $data = array();
  $additional_fields = array();
  
  if ($field->widget === 'textarea' && ! empty($field->options['text_processing'])) {
    $additional_fields['format'] = $field->fid .'_format';
  }
  
  $data[$field->fid .'_value'] = array(
    'title' => term_fields_views_format_title($field),
    'help' => term_fields_views_format_help($field),
    'field' => array(
       'handler' => 'term_fields_handler_field_textarea',
       'additional fields' => $additional_fields,
       'term_fields_field_name' => $field->fid,
    ),
    'filter' => array(
      'handler' => 'views_handler_filter_string',
      'allow empty' => TRUE,
    ),
  );
  
  if ($field->widget === 'textfield') {
    $data[$field->fid .'_value']['field']['handler'] = 'term_fields_handler_field';
    $data[$field->fid .'_value'] += array(
      'sort' => array(
        'handler' => 'views_handler_sort',
      ),
      'argument' => array(
        'handler' => 'views_handler_argument_string',
        'additional fields' => $additional_fields,
      ),
    );
  }
  
  return $data;
}

/**
 * Saves a field.
 * 
 * @see term_fields_term_fields_api().
 */
function term_fields_text_field_save($field, $values) {
  $save = array();
  $save[$field->fid .'_value'] = isset($values['value']) ? $values['value'] : '';

  if (! empty($field->options['text_processing'])) {
    $save[$field->fid .'_format'] = isset($values['format']) ? $values['format'] : FILTER_FORMAT_DEFAULT;
  }  
  
  return $save;
}

/**
 * Display a text field.
 * 
 * @see term_fields_term_fields_api().
 */
function term_fields_text_field_display($field, $values) {
  if (! isset($values[$field->fid .'_value'])) {
    return NULL;
  }
  
  if (! strlen($values[$field->fid .'_value'])) {
    return '';
  }
  
  if (! empty($field->options['text_processing'])) {
    $format = isset($values[$field->fid .'_format']) ? $values[$field->fid .'_format'] : FILTER_FORMAT_DEFAULT;
    return check_markup($values[$field->fid .'_value'], $format);
  }
  
  return check_plain($values[$field->fid .'_value']);
}

/**
 * Builds a text field settings form.
 * 
 * @see term_fields_term_fields_forms_api().
 * @ingroup forms
 */
function term_fields_text_settings_form($field, $values, &$main_form, &$form_state) {
  // A lot of settings below have been adapted from CCK text module: see text_field_settings().
  if (module_exists('content')) {
    module_load_include('inc', 'content', 'includes/content.admin');
  }
  
  $form = array();
  $default = $field->options + term_fields_text_settings_default();
  
  $form['max_length'] = array(
    '#type' => 'textfield',
    '#title' => t('Maximum length'),
    '#default_value' => $default['max_length'],
    '#element_validate' => array('_element_validate_integer_positive'),
    '#description' => t('The maximum length of the field in characters. Leave blank for an unlimited size.'),
  );

  switch ($field->widget) {
    
    case 'textfield':
      $form['size'] = array(
        '#type' => 'textfield',
        '#title' => t('Size of textfield'),
        '#element_validate' => array('_element_validate_integer_positive'),
        '#default_value' => $default['size'],
      );
      
      break;
      
    case 'textarea':
      $form['cols'] = array(
        '#type' => 'textfield',
        '#title' => t('Columns'),
        '#default_value' => $default['cols'],
        '#element_validate' => array('_element_validate_integer_positive'),
        '#required' => TRUE,
      );
      
      $form['rows'] = array(
        '#type' => 'textfield',
        '#title' => t('Rows'),
        '#default_value' => $default['rows'],
        '#element_validate' => array('_element_validate_integer_positive'),
        '#required' => TRUE,
      );
      
      $form['not_resizable'] = array(
        '#type' => 'checkbox',
        '#title' => t('Disallow textarea resizing'),
        '#default_value' => $default['not_resizable'],
      );
      
      $form['text_processing'] = array(
        '#type' => 'radios',
        '#title' => t('Text processing'),
        '#default_value' => $default['text_processing'],
        '#options' => array(0 => t('Plain text'), 1 => t('Filtered text (user selects input format)')),
      );
      
      break;
   
  }
  
  return $form;
}

/**
 * Gets the field default settings.
 */
function term_fields_text_settings_default() {
  return array('max_length' => '', 'size' => '', 'rows' => 5, 'cols' => 60, 'not_resizable' => 0, 'text_processing' => 0);
}
