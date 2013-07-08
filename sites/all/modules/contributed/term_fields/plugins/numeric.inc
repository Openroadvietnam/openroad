<?php

/**
 * @file
 * Plugin definition for Term Fields numeric fields.
 */

/**
 * Builds a numeric field form.
 * 
 * @see term_fields_term_fields_forms_api().
 * @ingroup forms
 */
function term_fields_numeric_field_form($field, $values, &$main_form, &$form_state) {
  $form = array();
  
  // Builds an array of default values mixed with default settings.
  $default = $values + $field->options + term_fields_numeric_settings_default();
  
  if (! isset($default[$field->fid .'_value'])) {
    $default[$field->fid .'_value'] = isset($field->options['default']['value']) ? $field->options['default']['value'] : '';
  }
  
  switch ($field->widget) {
    case 'textfield':
      $form['value'] = array(
        '#type' => 'textfield',
        '#size' => $default['size'],
      );
      break;

    case 'select':
      // If required options are not filled, do not render this widget.
      if ($default['min'] === '' || $default['max'] === '') {
        return array();
      }
      
      $options = drupal_map_assoc(range($default['min'], $default['max'], $default['step']));
      $form['value'] = array(
        '#type' => 'select',
        '#options' => $field->required ? $options : array('' => t('<none>')) + $options,
      );
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
function term_fields_numeric_field_form_validate($field, $values, &$form, &$form_state) {
  // Checking select list value or empty value is not necessary...
  if ($field->widget === 'select' || ! isset($values['value']) || ! strlen($values['value'])) {
    return;
  }
  
  $t_args = array('%field' => $field->title, '%value' => $values['value']);
  $values['#parents'][] = 'value';
  $error_elt = implode('][', $values['#parents']);
  
  if (! is_numeric($values['value'])) {
    form_set_error($error_elt, t('Field %field: value %value should be numeric.', $t_args));
    return;
  }
  
  // Check range.
  $check_min = strlen($field->options['min']);
  $check_max = strlen($field->options['max']);
  
  if (($check_min && $field->options['min'] > $values['value']) || ($check_max && $field->options['max'] < $values['value'])) {
    $t_args += array('@min' => $field->options['min'], '@max' => $field->options['max']);
    
    if ($check_min && $check_max) { 
      form_set_error($error_elt, t('Field %field: value %value does not range from @min to @max.', $t_args));
    }
    elseif ($check_min) {
      form_set_error($error_elt, t('Field %field: value %value should be greater or equal than @min .', $t_args));
    }
    else {
      form_set_error($error_elt, t('Field %field: value %value should be less or equal than @max .', $t_args));
    }
    
    return;
  }
  
  // Check number format.
  switch ($field->options['format']) {
    case 'decimal':
      $format = ! empty($field->options['scale']) ? '%.'. $field->options['scale'] .'F' : '%d';
      //1.5e-7
      if (strlen(sprintf($format, $values['value'])) < strlen($values['value'])) {
        form_set_error($error_elt, t('Field %field: the maximum number of decimals is %number.', $t_args + array('%number' => $field->options['scale'])));
      }
      elseif (strlen(preg_replace('~[^-+0-9]~', '$1', $values['value'])) > $field->options['precision']) {
        form_set_error($error_elt, t('Field %field: the maximum number of digits is %number.', $t_args + array('%number' => $field->options['precision'])));
      }
      break;
    
    case 'integer':
    default:
      if (!is_numeric($values['value']) || intval($values['value']) != $values['value']) {
        form_set_error($error_elt, t('Field %field: value %value should be an integer.', $t_args));
      }
      break;
  }
}

/**
 * Saves a field.
 * 
 * @see term_fields_term_fields_api().
 */
function term_fields_numeric_field_save($field, $values) {
  return array($field->fid .'_value' => isset($values['value']) ? $values['value'] : NULL);
}

/**
 * Display a numeric field.
 * 
 * @see term_fields_term_fields_api().
 */
function term_fields_numeric_field_display($field, $values) {
  if (! isset($values[$field->fid .'_value'])) {
    return NULL;
  }
  
  if (! strlen($values[$field->fid .'_value'])) {
    return '';
  }
  
  if (! empty($field->options['decimal']) && $field->options['decimal'] !== '.') {
    $values[$field->fid .'_value'] = strtr($values[$field->fid .'_value'], '.', $field->options['decimal']);
  }

  // Check_plain() is not necessary. 
  return $values[$field->fid .'_value'];
}

/**
 * Provides information about database storage.
 * 
 * @see term_fields_term_fields_api()
 */
function term_fields_numeric_storage($field) {
  $columns = array();
  
  if (! isset($field->options['format']) || $field->options['format'] === 'integer') {
    $columns[$field->fid .'_value'] = array(
      'type' => 'int',
      'not null' => FALSE,
    );
  }
  else {
    $columns[$field->fid .'_value'] = array(
      'type' => 'numeric',
      'precision' => $field->options['precision'],
      'scale' => $field->options['scale'],
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
function term_fields_numeric_views_data($field) {
  $data = array();
  
  $data[$field->fid .'_value'] = array(
    'title' => term_fields_views_format_title($field),
    'help' => term_fields_views_format_help($field),
    'field' => array(
       'handler' => 'term_fields_handler_field_numeric',
       'term_fields_field_name' => $field->fid,
    ),
    'argument' => array(
      'handler' => 'views_handler_argument_numeric',
    ),
    'filter' => array(
      'handler' => 'views_handler_filter_numeric',
    ),
    'sort' => array(
      'handler' => 'views_handler_sort',
    ),
  );
  
  return $data;
}

/**
 * Builds a numeric field settings form.
 * 
 * @see term_fields_term_fields_forms_api().
 * @ingroup forms
 */
function term_fields_numeric_settings_form($field, $values, &$main_form, &$form_state) {
  if (module_exists('content')) {
    module_load_include('inc', 'content', 'includes/content.admin');
  }
  
  $form = array();
  $default = $field->options + term_fields_numeric_settings_default();
  
  $form['min'] = array(
    '#type' => 'textfield',
    '#title' => t('Minimum value'),
    '#default_value' => $default['min'],
  );

  $form['max'] = array(
    '#type' => 'textfield',
    '#title' => t('Maximum value'),
    '#default_value' => $default['max'],
  );  
  
  switch ($field->widget) {
    
    case 'textfield':
      $form['min']['#description'] = $form['max']['#description'] = t('Leave this field blank if you do not want range validation.');
    
      $form['size'] = array(
        '#type' => 'textfield',
        '#title' => t('Size of textfield'),
        '#element_validate' => array('_element_validate_integer_positive'),
        '#default_value' => $default['size'],
      );
      
      $form['format'] = array(
        '#type' => 'select',
        '#title' => t('Number format'),
        '#options' => array(
          'integer' => t('Integer'),
          'decimal' => t('Decimal number'),
        ),
        '#default_value' => $default['format'],
        '#required' => TRUE,
      );
      
      // @see number_field_settings() from CCK number module.
      $form['precision'] = array(
        '#type' => 'select',
        '#options' => drupal_map_assoc(range(10, 32)),
        '#title' => t('Precision'),
        '#description' => t('The total number of digits to store in the database, including those to the right of the decimal.'),
        '#default_value' => $default['precision'],
      );
      
      $form['scale'] = array(
        '#type' => 'select',
        '#options' => drupal_map_assoc(range(0, 10)),
        '#title' => t('Scale'),
        '#description' => t('The number of digits to the right of the decimal.'),
        '#default_value' => $default['scale'],
      );
      
      $form['decimal'] = array(
        '#type' => 'select',
        '#options' => array('.' => 'decimal point', ',' => 'comma', ' ' => 'space'),
        '#title' => t('Decimal marker'),
        '#description' => t('The character users will input to mark the decimal point in forms.'),
        '#default_value' => $default['decimal'],
      );
      
      break;
      
    case 'select':
      $form['min']['#required'] = $form['max']['#required'] = TRUE;
      
      $form['step'] = array(
        '#type' => 'textfield',
        '#title' => t('Range step'),
        '#element_validate' => array('_element_validate_integer_positive'),
        '#default_value' => $default['step'],
        '#required' => TRUE,
      );
      
      break;
   
  }
  
  return $form;
}

/**
 * Validates a numeric field settings form.
 * 
 * @see term_fields_term_fields_forms_api().
 */
function term_fields_numeric_settings_form_validate($field, $values, &$form, &$form_state) {
  $min_max_error = FALSE;
  $error_elt = implode('][', $values['#parents']);
  
  foreach (array('min' => t('Minimum value'), 'max' => t('Maximum value')) as $name => $title) {
    if ($values[$name] !== '' && (!is_numeric($values[$name]) || intval($values[$name]) != $values[$name])) {
      form_set_error($error_elt .']['. $name, t('@name should be an integer.', array('@name' => $title)));
      $min_max_error = TRUE;
    }
  }
  
  if (! $min_max_error && $values['min'] !== '' && $values['max'] !== '' && $values['min'] > $values['max']) {
    form_set_error($error_elt .'][min', t('Minimum value should be less than maximum value.'));
  }
  
  if ($field->widget === 'select' && $values['step'] > $values['max']) {
    form_set_error($error_elt .'][step', t('Step exceeds the maximum value.'));
  }
}

/**
 * Gets the field default settings.
 */
function term_fields_numeric_settings_default() {
  return array('size' => '', 'min' => '', 'max' => '', 'step' => 1, 'format' => 'integer', 'precision' => 10, 'scale' => 2, 'decimal' => '.');
}
