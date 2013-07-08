<?php

/**
 * @file
 * Plugin definition for Term Fields date fields.
 */

/**
 * Builds a date field form.
 * 
 * @see term_fields_term_fields_forms_api().
 * @ingroup forms
 */
function term_fields_date_field_form($field, $values, &$main_form, &$form_state) {
  $form = array();
  
  // Do not render anything if we are in the field configuration form.
  if (! array_key_exists('#id', $main_form)) {
    return $form;
  }
  
  $from_field = 'value';
  $to_field = 'value2';
  $tz_field = 'timezone';
  
  // Builds an array of default values mixed with default settings.
  $default = $values + $field->options + term_fields_date_settings_default();
  
  foreach (array($from_field, $to_field, $tz_field) as $key) {
    $default[$key] = ! empty($default["{$field->fid}_$key"]) ? $default["{$field->fid}_$key"] : $default["default_$key"];
  }
  
  if ($default['todate'] != 'required' && !empty($default[$to_field]) && $default[$to_field] == $default[$from_field]) {
    $default[$to_field] = '';
  }
  
  if (is_array($timezone = date_get_timezone($default['tz_handling'], $default[$tz_field]))) {
    $timezone = $timezone['timezone'];
  }
  
  if (! empty($default['input_format_custom'])) {
    $format = $default['input_format_custom'];
  }
  elseif (! empty($default['input_format']) && $default['input_format'] !== 'site-wide') {
    $format = $default['input_format'];
  }
  else {
    $format = variable_get('date_format_short', 'm/d/Y - H:i');
  }

  $form[$from_field] = array(
    '#title' => t('@title', array('@title' => $field->title)),
    '#required' => $field->required,
    '#default_value' => $default[$from_field],
    '#date_timezone' => $timezone,
    '#date_format' => date_limit_format($format, $default['granularity']),
    '#date_text_parts' => $default['text_parts'],
    '#date_increment' => $default['increment'],
    '#date_year_range' => $default['year_range'],
    '#date_label_position' => $default['label_position'],
    '#weight' => 0,
  );
  
  $form[$from_field]['#date_title'] = $form[$from_field]['#title'];
    
  switch ($field->widget) {
    case DATE_ISO:
    case DATE_DATETIME:
      
      if ($default['use_text']) {
        $form[$from_field]['#type'] = 'date_text';
      }
      else {
        // From/to selectors with lots of parts will look better if displayed 
        // on two rows instead of in a single row.
        if (!empty($default['todate']) && count($default['granularity']) > 3) {
          $form[$from_field]['#attributes'] = array('class' => 'date-clear');
        }
        $form[$from_field]['#type'] = 'date_select';
      }
      
      break;
      
    case 'date_popup':
      $form[$from_field]['#type'] = 'date_popup';
      break;
  }
  
  $description = array();
  
  if (! empty($field->description)) {
    $description[] = filter_xss_admin($field->description);
  }
  
  // If this field uses the 'To', add matching element
  // for the 'To' date, and adapt titles to make it clear which
  // is the 'From' and which is the 'To'.
  if (!empty($default['todate'])) {
    $form['#title'] = $form[$from_field]['#title'];
    $form[$from_field]['#title']  = t('From date');
    $form[$to_field] = $form[$from_field];
    $form[$to_field]['#title'] = t('To date');
    $form[$to_field]['#default_value'] = $default[$to_field];
    $form[$to_field]['#required'] = FALSE;
    $form[$to_field]['#weight'] = 1;
    
    $t_args = array('@field_name' => $form['#title']);
    $form[$from_field]['#date_title'] = t('@field_name From date', $t_args);
    $form[$to_field]['#date_title'] = t('@field_name To date', $t_args);
    
    if ($field->widget != 'date_popup' && empty($default['use_text'])) {
      $description[] = t("Empty 'To date' values will use the 'From date' values.");
    }
  }
  
  $form['#fieldset_description'] = implode(' ', $description);
  
  if ($default['tz_handling'] == 'date') {
    $form[$tz_field] = array(
      '#type' => 'date_timezone',
      '#default_value' => $timezone,
      '#weight' => 2,
    );  
  }
  else {
    $form[$tz_field] = array('#type' => 'value', '#value' => $timezone);
  }
  
  return $form;
}

/**
 * Validates a field.
 * 
 * @see term_fields_term_fields_forms_api().
 * 
 * Inpired by date_combo_validate() from date module.
 */
function term_fields_date_field_form_validate($field, $values, &$form, &$form_state) {
  $error_elt = implode('][', $values['#parents']);
  $date_type = term_fields_date_get_type($field);
  $t_args = array('%field' => $field->title, '%fid' => $field->fid);
  
  $from_field = 'value';
  $to_field = 'value2';
  $tz_field = 'timezone';
  $offset_field = 'offset';
  $offset_field2 = 'offset2';
  
  $posted = $form['#post'];
  
  // Allow to use form_set_value() if necessary.
  $element = $form;
  
  foreach ($values['#parents'] as $parent) {
    if (isset($posted[$parent]) && isset($element[$parent])) {
      $posted = $posted[$parent];
      $element = $element[$parent];
    }
    else {
      $posted = NULL;
      break;
    }                        
  }
  
  // Something went wrong at this point...
  if (is_null($posted)) {
    form_set_error($error_elt .']['. $from_field, t('An error occured while saving the field %field. If this error persists, please contact a site administrator.', $t_args));
    watchdog('term_fields', 'The posted values are not valid for the date field %field (fid: %fid).', $t_args, WATCHDOG_CRITICAL);
    return;
  }
  
  $errors = array();
  
  // Check for empty 'From date', which could either be an empty
  // value or an array of empty values, depending on the widget.
  $empty = TRUE;
  
  if (!empty($values[$from_field])) {
    if (! is_array($values[$from_field])) {
      $empty = FALSE;
    }
    else {
      foreach ($values[$from_field] as $key => $value) {
        if (!empty($value)) {
          $empty = FALSE;
          break;
        }
      }
    }
  }
  
  if ($empty) {
    term_fields_date_element_empty($element, $form_state);
    
    if (! $field->options['required']) {
      return;
    }
  }
  // Don't look for further errors if errors are already flagged
  // because otherwise we'll show errors on the nested elements
  // more than once.
  elseif (!form_get_errors()) {
                
    // Check todate input for blank values and substitute in fromdate
    // values where needed, then re-compute the todate with those values.
    if ($field->options['todate']) {
      $merged_date = array();
      $to_date_empty = TRUE;
      
      foreach ($posted[$to_field] as $part => $value) {
        $to_date_empty = $to_date_empty && empty($value) && !is_numeric($value);
        $merged_date[$part] = empty($value) && !is_numeric($value) ? $posted[$from_field][$part] : $value;
        if ($part == 'ampm' && $merged_date['ampm'] == 'pm' && $merged_date['hour'] < 12) {
          $merged_date['hour'] += 12;
        }
        elseif ($part == 'ampm' && $merged_date['ampm'] == 'am' && $merged_date['hour'] == 12) {
          $merged_date['hour'] -= 12;
        }
      }
              
      // If all date values were empty and a date is required, throw 
      // an error on the first element. We don't want to create 
      // duplicate messages on every date part, so the error will 
      // only go on the first.  
      if ($to_date_empty && $field->options['todate'] == 'required') {
        $errors[] = t('Some value must be entered in the To date.');
      }
      
      $element[$to_field]['#value'] = $merged_date;

      // Call the right function to turn this altered user input into
      // a new value for the todate.
      $values[$to_field] = $merged_date;
    }
    else {
      $values[$to_field] = $values[$from_field];
    }
    
    $from_date = term_fields_date_input_value($field, $element[$from_field]);
    if (!empty($field->options['todate'])) {
      $to_date = term_fields_date_input_value($field, $element[$to_field]);
    }
    else {
      $to_date = $from_date;
    }
    
    // Neither the from date nor the to date should be empty at this point
    // unless they held values that couldn't be evaluated.
    if (! $field->required && (empty($from_date) || empty($to_date))) {
      $values = term_fields_date_element_empty($element, $form_state);
      $errors[] = t('The dates are invalid.');
    }
    elseif (!empty($field->options['todate']) && $from_date > $to_date) {
      form_set_value($element[$to_field], $to_date, $form_state);
      $errors[] = t('The To date must be greater than the From date.');
    }
    else {
      // Convert input dates back to their UTC values and re-format to ISO
      // or UNIX instead of the DATETIME format used in element processing.
      $timezone = $values[$tz_field];
      $timezone_db = date_get_timezone_db($field->options['tz_handling']);
      
      $from_date = date_make_date($from_date, $timezone);
      $values[$offset_field] = date_offset_get($from_date);
      
      $to_date = date_make_date($to_date, $timezone);
      $test_from = date_format($from_date, 'r');
      $test_to = date_format($to_date, 'r');
      
      $values[$offset_field2] = date_offset_get($to_date);
      date_timezone_set($from_date, timezone_open($timezone_db));
      date_timezone_set($to_date, timezone_open($timezone_db));
      $values[$from_field] = date_format($from_date, date_type_format($date_type));
      $values[$to_field] = date_format($to_date, date_type_format($date_type));
      
      // Test a roundtrip back to the original timezone to catch
      // invalid dates, like 2AM on the day that spring daylight savings
      // time begins in the US.
      date_timezone_set($from_date, timezone_open($timezone));
      date_timezone_set($to_date, timezone_open($timezone));
      
      if ($test_from != date_format($from_date, 'r')) {
        $errors[] = t('The From date is invalid.');
      }
      if ($test_to != date_format($to_date, 'r')) {
        $errors[] = t('The To date is invalid.');
      }
      if (empty($errors)) {
        form_set_value($element, $values, $form_state);
      }
    }
  }
  
  if (! empty($errors)) {
    form_set_error($error_field, format_plural(count($errors), 'There is an error in field %field: !errors.', 'There are errors in field %field: !errors.', $t_args + array('!errors' => theme('item_list', $errors))));      
  }
  
  // Don't try to validate if there were any errors before this point
  // since the element won't have been munged back into a date.
  if (!form_get_errors()) {
    $process = array($from_field);
    
    if ($field->options['todate']) {
      $process[] = $to_field;
    }
    
    foreach ($process as $processed) {
      $error_field = $error_elt .']['. $processed;
      
      if ($field->widget != 'date_popup' && empty($field->options['use_text'])) {
        $error_field .= '][year';
      }
      
      if ($processed == $from_field && $field->options['todate']
        && !date_is_valid($values[$from_field], $date_type, $field->options['granularity'])
        && (date_is_valid($values[$to_field], $date_type, $field->options['granularity']))) {
        form_set_error($error_field, t("A 'From date' date is required for field %field.", $t_args));
      }
      
      if ($processed == 'value2'
        && $field->options['todate'] == 'required' && ($field->required
        && date_is_valid($values[$from_field], $date_type, $field->options['granularity'])
        && !date_is_valid($values[$to_field], $date_type, $field->options['granularity']))) {
        form_set_error($error_field, t("A 'To date' is required for field %field.", $t_args));
      }
    }
  }
}

/**
 * Saves a field.
 * 
 * @see term_fields_term_fields_api().
 */
function term_fields_date_field_save($field, $values) {
  $save = array();
  
  // Special case for ISO dates which may have been given artificial values for
  // some date parts to make them into valid dates.
  if (! empty($values['value']) && term_fields_date_get_type($field) === DATE_ISO) {
    $values['value'] = date_limit_value($values['value'], $field->options['granularity'], DATE_ISO);
    
    if ($field->options['todate']) {
      $values['value2'] = date_limit_value($values['value2'], $field->options['granularity'], DATE_ISO);
    }
  }
  
  $save[$field->fid .'_value'] = isset($values['value']) ? $values['value'] : '';
  
  // Save timezone and offset.
  if ($field->options['tz_handling'] === 'date') {
    $save[$field->fid .'_timezone'] = isset($values['timezone']) ? $values['timezone'] : '';
    $save[$field->fid .'_offset'] = isset($values['offset']) ? $values['offset'] : '';
  }
  
  if ($field->options['todate']) {
    $save[$field->fid .'_value2'] = isset($values['value2']) ? $values['value2'] : '';
    
    if ($field->options['tz_handling'] === 'date') {
      $save[$field->fid .'_offset2'] = isset($values['offset']) ? $values['offset2'] : '';
    }
  }
  
  return $save;
}

/**
 * Provides information about database storage.
 * 
 * @see term_fields_term_fields_api().
 */
function term_fields_date_storage($field) {
  $columns = array();
  
  if (term_fields_date_get_type($field) == DATE_ISO) {
    $columns[$field->fid .'_value'] = array('type' => 'varchar', 'length' => 20, 'not null' => FALSE);
  }
  else {
    $columns[$field->fid .'_value'] = array('type' => 'datetime', 'not null' => FALSE);
  }
  
  if ($field->options['tz_handling'] === 'date') {
    $columns[$field->fid .'_timezone'] = array('type' => 'varchar', 'length' => 50, 'not null' => FALSE);
    $columns[$field->fid .'_offset'] = array('type' => 'int', 'not null' => FALSE);
  }
  
  if ($field->options['todate']) {
    $columns[$field->fid .'_value2'] = $columns['value'];
    
    if ($field->options['tz_handling'] === 'date') {
      $columns[$field->fid .'_offset2'] = $columns['offset2'];
    }
  }
  
  return $columns;
}

/**
 * Gets Views data.
 * 
 * @see term_fields_term_fields_api().
 */
function term_fields_date_views_data($field) {
  $data = array();
  
  $data[$field->fid .'_value'] = array(
    'title' => term_fields_views_format_title($field),
    'help' => term_fields_views_format_help($field),
    'field' => array(
      // @todo some work needed there...
      'handler' => 'term_fields_handler_field_date',
      'term_fields_field_name' => $field->fid,
    ),
    'argument' => array(
      'handler' => 'views_handler_argument_numeric',
    ),
    'filter' => array(
      'handler' => 'views_handler_filter_date',
    ),
    'sort' => array(
      'handler' => 'views_handler_sort_date',
    ),
  );
  
  return $data;
}

/**
 * Display a date field.
 * 
 * @see term_fields_term_fields_api().
 */
function term_fields_date_field_display($field, $values) {
  if (! isset($values[$field->fid .'_value'])) {
    return NULL;
  }
  
  // @todo implement this...
  return;
}

/**
 * Builds a date field settings form.
 * 
 * @see term_fields_term_fields_forms_api()
 * @see term_fields_date_settings_form_validate()
 * @see term_fields_date_settings_form_submit()
 * @ingroup forms
 * 
 * Adapted from the date module (CCK date field).
 */
function term_fields_date_settings_form($field, $values, &$main_form, &$form_state) {
  // This avoids to duplicate the date_data_loss_warning(), theme_date_text_parts()
  // and date_timezone_handling_options() functions.
  module_load_include('inc', 'date', 'date_admin');
  
  $default = $field->options + term_fields_date_settings_default();
  
  // Ensure granularity has no empty values.
  $granularity = array_filter($default['granularity']);
  
  $form['default_value'] = array(
    '#type' => 'select',
    '#title' => t('Default value'),
    '#default_value' => $default['default_value'],
    '#options' => array('blank' => t('Blank'), 'now' => t('Now'), 'strtotime' => t('Relative')),
    '#description' => t("A default value to use for this field. If you select 'Relative', add details below."),
  );
  
  $form['default_value2'] = array(
    '#type' => 'select',
    '#title' => t('Default value for To date'),
    '#default_value' => $default['default_value2'],
    '#options' => array('same' => t('Same as From date'), 'blank' => t('Blank'), 'now' => t('Now'), 'strtotime' => t('Relative')),
    '#description' => t("A default value to use for this field. If you select 'Relative', add details below."),
  );
  
  $form['default_value_code'] = array('#type' => 'value', '#value' => '');
  $form['default_value_code2'] = array('#type' => 'value', '#value' => '');
  
  $form['default_custom'] = array(
    '#type' => 'fieldset',
    '#title' => t('Customize Default Value'),
    '#description' => '<p>' . t("The custom value for a Relative default should be something that describes a time by reference to the current day using strtotime, like '+90 days' (90 days from the day the field is created) or '+1 Saturday' (the next Saturday). See !strtotime for more details.", array('!strtotime' => l(t('strtotime'), 'http://www.php.net/manual/en/function.strtotime.php'))) . '</p>',
    '#collapsible' => TRUE,
    '#collapsed' => TRUE,
  );
  
  $form['default_custom']['default_value_code'] = array(
    '#type' => 'textfield',
    '#title' => t('Custom value for From date'),
    '#default_value' => $default['default_value_code'],
  );

  $form['default_custom']['default_value_code2'] = array(
    '#type' => 'textfield',
    '#title' => t('Custom value for To date'),
    '#default_value' => $default['default_value_code2'],
  );

  if ($field->widget == 'date_popup' && module_exists('date_popup')) {
    $formats = date_popup_formats();
    $default_format = array_shift($formats);
  }
  else {
    // example input formats must show all possible date parts, so add seconds.
    $formats = str_replace('i', 'i:s', array_keys(date_get_formats('short')));
    $formats = drupal_map_assoc($formats);
    $default_format = str_replace('i', 'i:s', variable_get('date_format_short', 'm/d/Y - H:i'));
  }
  
  $options = array();
  $now = date_example_date();
  foreach ($formats as $f) {
    $options[$f] = date_format_date($now, 'custom', $f);
  }
  
  $form['input_format'] = array(
    '#type' => 'select',
    '#title' => t('Input format'),
    '#default_value' => !empty($default['input_format']) ? $default['input_format'] : $default_format,
    '#options' => $options,
    '#description' => t('Set the order and format for the date parts in the input form. The format will be adapted to remove values not in the granularity for this field.'),
  );
  
  // Specific options that are not available for the Date Popup module.
  if ($field->widget != 'date_popup') {
    $form['input_format_custom'] = array(
      '#type' => 'textfield', 
      '#title' => t('Custom input format'),
      '#default_value' => $default['input_format_custom'],
      '#description' => t("The custom format, if provided, will override the input format selected above. The custom format, if provided, will override the selected display or input options. Define a php date format string like 'm-d-Y H:i' (see <a href=\"@link\">http://php.net/date</a> for more details).", array('@link' => 'http://php.net/date')),
    );
    
    $form['use_text'] = array(
      '#type' => 'checkbox',
      '#title' => t('Textfield display'),
      '#description' => t('Use a single text field instead of multiple composants.'),
      '#default_value' => $default['use_text'],
    );
    
    $form['label_position'] = array(
      '#type' => 'radios',
      '#title' => t('Position of date part labels'),
      '#options' => array('above' => t('Above'), 'within' => t('Within'), 'none' => t('None')),
      '#default_value' => $default['label_position'],
      '#description' => t("The location of date part labels, like 'Year', 'Month', or 'Day'. 'Above' will display them as titles above each date part. 'Within' will insert the label as the first option in the select list and in blank textfields. 'None' will not label any of the date parts. The exact text in the label is controlled by themes like 'date_part_label_year' and 'date_part_label_month'."),
    );
    
    $form['text_parts'] = array('#type' => 'value', '#value' => array());
    $form['advanced'] = array(
      '#tree' => TRUE,
      '#type' => 'fieldset',
      '#title' => t('Customize Date Parts'),
      '#collapsible' => TRUE,
      '#collapsed' => TRUE,
    );
    
    $form['advanced']['text_parts'] = array(
      '#theme' =>'date_text_parts',
    );
    
    foreach (date_granularity_names() as $key => $value) {
      $form['advanced']['text_parts'][$key] = array(
        '#type' => 'radios',
        '#default_value' => in_array($key, $default['text_parts']) ? 1 : 0,
        '#options' => array(0 => '', 1 => ''),
      );
    }
  }
  
  $form['year_range'] = array(
    '#type' => 'textfield',
    '#title' => t('Years back and forward'),
    '#default_value' => $default['year_range'] ? $default['year_range'] : '-3:+3',
    '#size' => 10,
    '#maxsize' => 10,
    '#description' => t('Number of years to go back and forward in the year selection list, default is -3:+3.'),
  );
  
  $form['increment'] = array(
    '#type' => 'select',
    '#title' => t('Time increment'),
    '#default_value' => $default['increment'],
    '#options' => array(1 => 1, 5 => 5, 10 => 10, 15 => 15, 30 => 30),
    '#description' => t('Increment the minute and second fields by this amount.'),
  );  

  $description = array();
  $description[] = t("Display a matching second date field as a 'To date'. If marked 'Optional' field will be presented but not required. If marked 'Required' the 'To date' will be required if the 'From date' is required or filled in.");
  $description[] = date_data_loss_warning('To date');
  $form['todate'] = array(
    '#type' => 'radios',
    '#title' => t('To Date'),
    '#options' => array('' => t('Never'), 'optional' => t('Optional'), 'required' => t('Required')),
    '#description' => implode('<br />', $description),
    '#default_value' => $default['todate'],
  );
  
  $form['granularity'] = array(
    '#type' => 'select',
    '#title' => t('Granularity'),
    '#default_value' => $granularity,
    '#options' => date_granularity_names(),
    '#multiple' => TRUE,
    '#description' => t('Set the date elements to be stored (at least a year is required).'),
  );
  
  $format_types = array();  
  foreach (date_get_format_types('', TRUE) as $name => $info) {
    $format_types[$name] = $info['title'];
  }
  
  $form['default_format'] = array(
    '#type' => 'select', 
    '#title' => t('Default Display'),
    '#default_value' => $default['default_format'],
    '#options' => $format_types,
    '#description' => t('Select a default format type to be used for the date display. Visit the <a href="@date-time-page">Date and time date format page</a> to add and edit format types.', array('@date-time-page' => url('admin/settings/date-time/formats'))),
  );

  $tz_handling = $default['tz_handling'] ? $default['tz_handling'] : (date_has_time($granularity) ? 'site' : 'none');

  $description = array();
  $description[] = t('Select the timezone handling method to be used for this date field.');
  $description[] = date_data_loss_warning('Time zone handling');
  $form['tz_handling'] = array(
    '#type' => 'select',
    '#title' => t('Time zone handling'),
    '#default_value' => $tz_handling,
    '#options' => date_timezone_handling_options(),
    '#description' => implode('<br />', $description),
  );
  
  return $form;
}

/**
 * Validates a date field settings form.
 * 
 * @see term_fields_term_fields_forms_api()
 * @see term_fields_date_settings_form()
 * @see term_fields_date_settings_form_submit()
 */
function term_fields_date_settings_form_validate($field, $values, &$form, &$form_state) {
  $error_elt = implode('][', $values['#parents']);
  $form_parent = $form;
  
  while ($key = array_shift($values['#parents'])) {
    $form_parent = $form_parent[$key];
  }
  
  if ($field->widget == 'date_popup' && module_exists('date_popup')) {
    // Only a limited set of formats is available for the Date Popup module
    if (!empty($values['input_format_custom']) || !in_array($values['input_format'], date_popup_formats())) {
      form_set_value($form_parent['input_format_custom'], NULL, $form_state);
      form_set_value($form_parent['input_format'], DATE_FORMAT_DATETIME, $form_state);
    }
  }

  // Munge the table display for text parts back into an array of text parts.
  if (is_array($values['advanced']['text_parts'])) {
    form_set_value($form_parent['text_parts'], array_keys(array_filter($values['advanced']['text_parts'])), $form_state);
  }
  
  if ($values['default_value'] == 'strtotime') {
    if (! @strtotime($values['default_custom']['default_value_code'])) {
      form_set_error($error_elt .'][default_custom][default_value_code', t('The Strtotime default value is invalid.'));
    }
    else {
      form_set_value($form_parent['default_value_code'], $values['default_custom']['default_value_code'], $form_state);
    }
  }
  if ($values['default_value2'] == 'strtotime') {
    if (! @strtotime($values['default_custom']['default_value_code2'])) {
      form_set_error($error_elt .'][default_custom][default_value_code2', t('The Strtotime default value for the To Date is invalid.'));
    }
    else {
      form_set_value($form_parent['default_value_code2'], $values['default_custom']['default_value_code2'], $form_state);
    }
  }
  
  // We do not need to check if field widget is date_popup, since the 'use_text' option is
  // not displayed on the configuration form and is NULL.
  if (empty($values['use_text']) && !date_range_valid($values['year_range'])) {
    form_set_error($error_elt .'][default_custom][year_range', t('Years back and forward must be in the format -9:+9.'));
  }
}

/**
 * Submit handler for a date field settings form.
 *
 * Removes useless entries from the options array.
 * 
 * @see term_fields_term_fields_forms_api().
 * @see term_fields_date_settings_form()
 * @see term_fields_date_settings_form_validate()
 */
function term_fields_date_settings_form_submit($field, $values, &$form, &$form_state) {
  foreach (array('default_custom', 'advanced') as $$key) {
    if (isset($form_state['values']['options'][$key])) {
      unset($form_state['values']['options'][$key]);
    }
  }
}

/**
 * Gets the date type of the field.
 * 
 * @see date_is_valid()
 */
function term_fields_date_get_type($field) {
  return $field->widget === 'date_popup' ? DATE_ISO : $field->widget;
}

/**
 * Tries to extract a date value from user input. 
 */
function term_fields_date_input_value($field, $element) {
  $callback = 'date_select_input_value';
  
  if ($field->widget == 'date_popup') {
    $callback = 'date_popup_input_value';
  }
  elseif (! empty($field->options['use_text'])) {
    $callback = 'date_text_input_value';
  }
  
  return $callback($element);
}

/**
 * @see date_element_empty() from date module.
 */
function term_fields_date_element_empty($element, &$form_state) {
  $values = array('value' => NULL, 'value2' => NULL, 'timezone' => NULL, 'offset' => NULL, 'offset2' => NULL);
  form_set_value($element, $values, $form_state);
  return $values;
}

/**
 * Gets the field default settings.
 */
function term_fields_date_settings_default() {
  return array(
    'use_text' => FALSE,
    'granularity' => array('year', 'month', 'day', 'hour', 'minute'),
    'default_value' => 'blank',
    'default_value_code' => '',
    'default_value2' => 'same',
    'default_value_code2' => '',
    'default_timezone' => date_default_timezone_name(),
    'default_format' => 'medium',
    'input_format' => '',
    'input_format_custom' => '',
    'increment' => 1,
    'year_range' => '-3:+3',
    'label_position' => 'above',
    'tz_handling' => '',
    'text_parts' => array(),
    'todate' => '',
  );
}
