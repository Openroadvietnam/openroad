<?php

/**
 * @file
 * Plugin definition for Term Fields choice fields.
 */

/**
 * Builds a choice field form.
 * 
 * @see term_fields_term_fields_forms_api()
 * @ingroup forms
 */
function term_fields_choice_field_form($field, $values, &$main_form, $form_state) {
  $form = array();
  $default = $field->options + term_fields_choice_settings_default();
  $default_value = isset($values[$field->fid .'_value']) ? $values[$field->fid .'_value'] : (isset($field->options['default']['value']) ? $field->options['default']['value'] : 0);
  
  switch ($field->widget) {
    case 'radio':
      $form['value'] = array(
        '#type' => 'radios',
        '#options' => array(
          0 => term_fields_translate('inactive_label', $default['inactive_label'], $field),
          1 => term_fields_translate('active_label', $default['active_label'], $field),
        ),
        '#default_value' => $default_value,
      );
    
      break;
      
    case 'checkbox':
      $form['value'] = array(
        '#type' => 'checkboxes',
        '#options' => array(1 => term_fields_translate('active_label', $default['active_label'], $field)),
        '#default_value' => array($default_value),
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
 * @see term_fields_term_fields_api()
 */
function term_fields_choice_storage($field) {
  return array($field->fid .'_value' => array('type' => 'int', 'not null' => FALSE));
}

/**
 * Gets Views data.
 * 
 * @see term_fields_term_fields_api().
 */
function term_fields_choice_views_data($field) {
  $data = array();
  
  $data[$field->fid .'_value'] = array(
    'title' => term_fields_views_format_title($field),
    'help' => term_fields_views_format_help($field),
    'field' => array(
       'handler' => 'views_handler_field_boolean', // @todo extend the views_handler_field_boolean class
       'term_fields_field_name' => $field->fid,
    ),
    'filter' => array(
      'handler' => 'views_handler_filter_boolean_operator',
      'label' => check_plain($field->title),
      'accept_null' => TRUE,
    ),
  );
  
  return $data;
}

/**
 * Saves a field.
 * 
 * @see term_fields_term_fields_api()
 */
function term_fields_choice_field_save($field, $values) {
  if ($field->widget === 'checkbox') {
    $values['value'] = (int) (! empty($values['value'][1]));
  }
  
  return array($field->fid .'_value' => isset($values['value']) ? $values['value'] : NULL);
}

/**
 * Delete a field.
 * 
 * @see term_fields_term_fields_api()
 */
function term_fields_choice_field_delete($field) {
  if (module_exists('i18nstrings')) {
    i18nstrings_remove_string("term_fields:$field->fid:active_label");
    i18nstrings_remove_string("term_fields:$field->fid:inactive_label");
  }
}

/**
 * Display a choice field.
 * 
 * @see term_fields_term_fields_api().
 */
function term_fields_choice_field_display($field, $values) {
  if (! isset($values[$field->fid .'_value'])) {
    return NULL;
  }
  
  $labels = $field->options + term_fields_choice_settings_default();
  $label = $values[$field->fid .'_value'] ? 'active_label' : 'inactive_label';
  return term_fields_translate($label, $labels[$label], $field);
}

/**
 * Builds a choice field settings form.
 * 
 * @see term_fields_term_fields_forms_api()
 * @see term_fields_list_settings_form_validate()
 * @see term_fields_list_settings_form_submit()
 * @ingroup forms
 */
function term_fields_choice_settings_form($field, $values, &$main_form, &$form_state) {
  $form = array();
  $default = $field->options + term_fields_choice_settings_default();
  
  $form['active_label'] = array(
    '#type' => 'textfield',
    '#title' => t('Active label'),
    '#description' => t('This label corresponds to the active state of the widget.'),
    '#required' => TRUE,
    '#default_value' => $default['active_label'],
  );
  
  $form['inactive_label'] = array(
    '#type' => 'textfield',
    '#title' => t('Inactive label'),
    '#description' => t('This label corresponds to the inactive state of the widget.'),
    '#required' => TRUE,
    '#default_value' => $default['inactive_label'],
  );
  
  if ($field->widget === 'checkbox') {
    $form['active_label']['#description'] .= ' '. t('This label is displayed in front of the checkbox.');
  }
  
  return $form;
}

/**
 * Submit handler for a choice field settings form.
 *
 * Updates translations.
 * 
 * @see term_fields_term_fields_forms_api().
 * @see term_fields_choice_settings_form()
 */
function term_fields_choice_settings_form_submit($field, $values, &$form, &$form_state) {
  if (module_exists('i18nstrings')) {
    i18nstrings_update("term_fields:$field->fid:active_label", $form_state['values']['options']['active_label']);
    i18nstrings_update("term_fields:$field->fid:inactive_label", $form_state['values']['options']['inactive_label']);
  }
  
  if ($field->widget === 'checkbox') {
    $form_state['values']['options']['default']['value'] = (int) (! empty($form_state['values']['options']['default']['value'][1]));
  }
}

/**
 * Gets the field default settings.
 */
function term_fields_choice_settings_default() {
  return array('active_label' => t('Yes'), 'inactive_label' => t('No'));
}
