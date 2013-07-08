<?php

/**
 * @file
 * Plugin definition for Term Fields list fields.
 */

/**
 * Builds a list field form.
 * 
 * @see term_fields_term_fields_forms_api()
 * @ingroup forms
 */
function term_fields_list_field_form($field, $values, &$main_form, $form_state) {
  $form = array();
  $field->options += array('options' => array());
  
  // Do not render anything if there are no options.
  if ($field->options['options']) {
    switch ($field->widget) {
      case 'radio':
        $options = $field->required ? array() : array('' => t('None'));
        $options += $field->options['options'];
        
        if (count($options) > 1) {
          $form['value'] = array(
            '#type' => 'radios',
            '#options' => $options,
          );
        }
        else {
          list($key, ) = each($options);
          $form['value'] = array(
            '#type' => 'radio',
            '#return_value' => $key,
          );
        }
        
        break;
        
      case 'select':
        $form['value'] = array(
          '#type' => 'select',
          '#options' => $field->required ? $field->options['options'] : array('' => t('<none>')) + $field->options['options'],
          // Term fields do not currently support multiple values.
          '#multiple' => FALSE,
        );
        break;
    }
    
    $form['value']['#title'] = check_plain($field->title);
    $form['value']['#default_value'] = isset($values[$field->fid .'_value']) ? $values[$field->fid .'_value'] : (isset($field->options['default']['value']) ? $field->options['default']['value'] : '');
    $form['value']['#description'] = filter_xss_admin($field->description);
    $form['value']['#required'] = $field->required;
  }
  
  return $form;
}
     
/**
 * Provides information about database storage.
 * 
 * @see term_fields_term_fields_api()
 */
function term_fields_list_storage($field) {
  return array($field->fid .'_value' => array('type' => 'varchar', 'length' => 255, 'not null' => FALSE));
}

/**
 * Gets Views data.
 * 
 * @see term_fields_term_fields_api().
 */
function term_fields_list_views_data($field) {
  $data = array();
  
  $data[$field->fid .'_value'] = array(
    'title' => term_fields_views_format_title($field),
    'help' => term_fields_views_format_help($field),
    'field' => array(
       'handler' => 'term_fields_handler_field',
       'term_fields_field_name' => $field->fid,
    ),
    'argument' => array(
      'handler' => 'views_handler_argument_string',
    ),
    'filter' => array(
      'handler' => 'views_handler_filter_string',
      'allow empty' => TRUE,
    ),
    'sort' => array(
      'handler' => 'views_handler_sort',
    ),
  );
  
  return $data;
}

/**
 * Saves a field.
 * 
 * @see term_fields_term_fields_api()
 */
function term_fields_list_field_save($field, $values) {
  return array($field->fid .'_value' => isset($values['value']) ? $values['value'] : NULL);
}

/**
 * Display a list field.
 * 
 * @see term_fields_term_fields_api().
 */
function term_fields_list_field_display($field, $values) {
  if (! isset($values[$field->fid .'_value']) || empty($field->options['options']) || ! array_key_exists($values[$field->fid .'_value'], $field->options['options'])) {
    return NULL;
  }
  
  return check_plain($field->options['options'][$values[$field->fid .'_value']]);
}

/**
 * Builds a list field settings form.
 * 
 * @see term_fields_term_fields_forms_api()
 * @see term_fields_list_settings_form_validate()
 * @see term_fields_list_settings_form_submit()
 * @ingroup forms
 */
function term_fields_list_settings_form($field, $values, &$main_form, &$form_state) {
  $form = array();
  $form['options'] = array(
    '#type' => 'textarea',
    '#title' => t('Allowed values list'),
    '#description' => t('The possible values this field can contain. Enter one value per line, in the format key|label. The key is the value that will be stored in the database, and it must match the field storage type (text). The label is optional, and the key will be used as the label if no label is specified.'),
    '#default_value' => isset($field->options['options']) ? term_fields_list_options2string($field->options['options']) : '',
  );
  
  return $form;
}

/**
 * Validates a list field settings form.
 * 
 * @see term_fields_term_fields_forms_api()
 * @see term_fields_list_settings_form()
 * @see term_fields_list_settings_form_submit()
 */
function term_fields_list_settings_form_validate($field, $values, &$form, &$form_state) {
  $error_elt = implode('][', $values['#parents']);
  
  if (!$options = term_fields_list_options2array($values['options'])) {
    form_set_error($error_elt .'][options', t('You have to specify some options for this field.'));
    return;
  }
  
  // Check if there are duplicates in values (case-insensitive).
  if ($diff = array_diff_key($options, array_intersect_key($options, array_unique(array_map('drupal_strtolower', $options))))) {
    $diff = array_unique($diff);
    $message = format_plural(count($diff), 'The value %values appears several times and may confuse the user.', 'The values %values appear several times and may confuse the user.', array('%values' => implode(', ', $diff)));
    form_set_error($error_elt .'][options', $message);
  }
  
  // Check length of keys. drupal_strlen() is not used intentionally.
  if ($too_large = array_unique(array_filter(array_keys($options), create_function('$key', 'return strlen($key) > 255;')))) {
    $message = format_plural(count($diff), 'The following key %keys exceeds 255 bytes.', 'The following keys %keys exceed 255 bytes.', array('%keys' => implode(', ', $too_large)));
    form_set_error($error_elt .'][options', $message);
  }
}

/**
 * Submit handler for a list field settings form.
 *
 * Stores the options as an array to avoid extra process when displaying field
 * form element.
 * 
 * @see term_fields_term_fields_forms_api().
 * @see term_fields_list_settings_form()
 * @see term_fields_list_settings_form_validate()
 */
function term_fields_list_settings_form_submit($field, $values, &$form, &$form_state) {
  $form_state['values']['options']['options'] = term_fields_list_options2array($form_state['values']['options']['options']);
}

/**
 * Expands a list of options from string.
 * 
 * Code inspirated by content module.
 */
function term_fields_list_options2array($string) {
  $options = array();
  
  foreach (array_filter(array_map('trim', explode("\n", $string)), 'strlen') as $opt) {
    // Sanitize the user input with a permissive filter.
    $opt = filter_xss($opt, explode('|', TERM_FIELDS_ALLOWED_TAGS));
    if (strpos($opt, '|') !== FALSE) {
      list($key, $value) = explode('|', $opt);
      $options[$key] = (isset($value) && $value !=='') ? $value : $key;
    }
    else {
      $options[$opt] = $opt;
    }
  }
  
  return $options;
}

/**
 * Converts an array of options to a string.
 */
function term_fields_list_options2string($array) {
  $options = array();
  
  foreach ($array as $key => $value) {
    $options[] = "$key|$value";
  }
  
  return implode("\n", $options);
}
