<?php

/**
 * @file
 * Plugin definition for Term Fields file fields.
 */

/**
 * Builds a file field form.
 * 
 * @see term_fields_term_fields_forms_api().
 * @see Upload module
 * @ingroup forms
 */
function term_fields_file_field_form($field, $values, &$main_form, &$form_state) {
  // Do not render anything if we are in the field configuration form.
  if (! array_key_exists('#id', $main_form)) {
    return array();
  }
  
  $form = array(
    '#type' => 'fieldset',
    '#title' => check_plain($field->title),
    '#description' => filter_xss_admin($field->description),
  );
  
  $form['wrapper'] = array(
    '#prefix' => '<div id="field-'. strtr($field->fid, '_', '-') .'-file-wrapper">',
    '#suffix' => '</div>',
  );
  
  // Make sure necessary directories for upload.module exist and are
  // writable before displaying the attachment form.
  $path = file_directory_path() .'/term_fields';
  $temp = file_directory_temp();
  // Note: pass by reference
  if (!file_check_directory($path, FILE_CREATE_DIRECTORY) || !file_check_directory($temp, FILE_CREATE_DIRECTORY)) {
    $form['#description'] =  t('File attachments are disabled. The file directories have not been properly configured.');
    if (user_access('administer site configuration')) {
      $form['#description'] .= ' '. t('Please visit the <a href="@admin-file-system">file system configuration page</a>.', array('@admin-file-system' => url('admin/settings/file-system')));
    }
    else {
      $form['#description'] .= ' '. t('Please contact the site administrator.');
    }
  }
  else {
    $file = NULL;
    
    // Try to handle the case when JS is disabled and there are some
    // validation errors on the form, and an action was performed to
    // the file upload field.
    // @todo how to get the parents dynamically?
    if (! empty($form_state['values']['fields'][$field->fid]['wrapper']['fid'])) {
      $file = (object) $form_state['values']['fields'][$field->fid]['wrapper'];
    }
    elseif (! empty($values[$field->fid .'_fid'])) {
      $file = term_fields_file_get_file($values[$field->fid .'_fid']);
    }
    
    if ($file && ! empty($field->options['alt'])) {
      $file->alt = isset($values[$field->fid .'_alt']) ? $values[$field->fid .'_alt'] : '';
    }
    
    $form['wrapper'] += term_fields_file_upload_form($field, $file);
    $form['update'] = array(
      '#type' => 'submit',
      '#value' => t('Update'),
      '#ahah' => array(
        'path' => 'term-fields/ahah/file/'. $field->fid,
        'wrapper' => 'field-'. strtr($field->fid, '_', '-') .'-file-wrapper',
        'progress' => array('type' => 'bar', 'message' => t('Please wait...')),
        'method' => 'replace',
        'effect' => 'fade',
      ),
    );
    
    $main_form['#attributes']['enctype'] = 'multipart/form-data';
  }
  
  return $form;
}

/**
 * Sub-form builder for file upload.
 */
function term_fields_file_upload_form($field, $file = NULL) {
  $form = array();
  
  if ($file) {
    $form['fid'] = array('#type' => 'value', '#value' => $file->fid);
    $form['filepath'] = array('#type' => 'value', '#value' => $file->filepath);
    $form['filename'] = array('#type' => 'value', '#value' => $file->filename);
    
    $form['file'] = array(
      '#type' => 'item',
      '#title' => t('Current file'),
      '#value' => l($file->filename, $file->filepath),
      '#weight' => 0,
    );
    
    if (isset($file->alt)) {
      $form['alt'] = array(
        '#type' => 'textfield',
        '#title' => t('Alternate text'),
        '#default_value' => $file->alt,
        '#maxlength' => 255,
      );
    }
    
    $form['delete'] = array(
      '#type' => 'checkbox',
      '#title' => t('Delete uploaded file'),
    );
  }
  else {
    $form['fid'] = $form['filepath'] = $form['filename'] = array('#type' => 'value', '#value' => NULL);
    $limits = $field->options + term_fields_file_settings_default($field->widget);
    $description = array();
    
    if (! empty($limits['allowed_extensions'])) {
      $description[] = t('Only files with the following extensions may be uploaded: %extensions. ', array('%extensions' => strtr($limits['allowed_extensions'], array('|' => ', '))));
    }
    
    if (! empty($limits['max_size'])) {
      $description[] = t('The maximum upload size is %filesize.', array('%filesize' => format_size($limits['max_size'] * 1024 * 1024)));
    }
    
    $form['file'] = array(
      '#type' => 'file',
      '#title' => t('Attach new file'),
      '#name' => 'files[term_fields_'. $field->fid .']',
      '#size' => 40,
      '#description' => implode(' ', $description),
    );
  }
  
  return $form;
}

/**
 * Validates a field.
 * 
 * @see term_fields_term_fields_forms_api().
 */
function term_fields_file_field_form_validate($field, $values, &$form, &$form_state) {
  $values['#parents'][] = 'wrapper';
  
  if (! empty($values['wrapper']['delete'])) {
    foreach (array('fid', 'filepath', 'filename', 'alt') as $key) {
      $form_element = $values;
      $form_element['#parents'][] = $key;
      form_set_value($form_element, NULL, $form_state);
    }
    
    return;
  }
  
  if (! empty($_FILES['files']['name']['term_fields_'. $field->fid])) {
    $validators = array();
    
    if (! empty($field->options['allowed_extensions'])) {
      $validators['file_validate_extensions'] = array($field->options['allowed_extensions']);
    }
    
    if (! empty($field->options['max_size'])) {
      $validators['file_validate_size'] = array($field->options['max_size'] *1024 * 1024);
    }
    
    // Save new file uploads.
    if (user_access('upload term files') && ($file = file_save_upload('term_fields_'. $field->fid, $validators, file_directory_path() .'/term_fields'))) {
      foreach (array('fid', 'filepath', 'filename') as $key) {
        $form_element = $values;
        $form_element['#parents'][] = $key;
        form_set_value($form_element, $file->{$key}, $form_state);
      }
    }
  }
}
                                 
/**
 * Saves a field.
 * 
 * @see term_fields_term_fields_api().
 */
function term_fields_file_field_save($field, $values) {
  $save = array(
    $field->fid .'_fid' => NULL,
    $field->fid .'_alt' => NULL,
  );
  
  if (! empty($values['wrapper']['fid']) && ($file = term_fields_file_get_file($values['wrapper']['fid']))) {
    $save[$field->fid .'_fid'] = $values['wrapper']['fid'];
    
    if ($file->status !== FILE_STATUS_PERMANENT) {
      db_query("UPDATE {files} SET status = %d WHERE fid = %d", FILE_STATUS_PERMANENT, $values['wrapper']['fid']);
    }
    
    if (! empty($field->options['alt'])) {
      $save[$field->fid .'_alt'] = isset($values['wrapper']['alt']) ? $values['wrapper']['alt'] : '';
    }
  }
  
  // Remove old value if necessary.
  $old_values = term_fields_get_fields_values($values['#term']);
  
  if (! empty($old_values[$field->fid .'_fid']) && (empty($values['wrapper']['fid']) || $values['wrapper']['fid'] != $old_values[$field->fid .'_fid'])) {
    if ($file = term_fields_file_get_file($old_values[$field->fid .'_fid'])) {
      if (module_exists('filefield')) {
        module_load_include('inc', 'filefield', 'field_file');
        $count = field_file_references($file);
      }
      else {
        $count = term_fields_file_references($file);
      }
      
      if (! $count) {
        file_delete($file->filepath);
        db_query('DELETE FROM {files} WHERE fid = %d', $file->fid);
      }
    }
  }
  
  return $save;
}

/**
 * Display a file field.
 * 
 * @see term_fields_term_fields_api().
 */
function term_fields_file_field_display($field, $values) {
  if (! isset($values[$field->fid .'_value']) || ! ($file = term_fields_file_get_file($values[$field->fid .'_fid']))) {
    return NULL;
  }
  
  if ($field->widget === 'image') {
    if (! empty($field->options['alt'])) {
      $alt = isset($values[$field->fid .'_alt']) ? check_plain($values[$field->fid .'_alt']) : '';
    }
    else {
      $alt = check_plain($values['#term']->name);
    }
    
    return theme('image', $file->filepath, $alt, '');
  }
  
  return l($file->filename, $file->filepath);
}

/**
 * Provides information about database storage.
 * 
 * @see term_fields_term_fields_api().
 */
function term_fields_file_storage($field) {
  $columns = array();
  
  $columns[$field->fid .'_fid'] = array(
    'type' => 'int',
    'unsigned' => TRUE,
    'not null' => FALSE,
  );
  
  if (! empty($field->options['alt'])) {
    $columns[$field->fid .'_alt'] = array(
      'type' => 'varchar',
      'length' => 255,
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
function term_fields_file_views_data($field) {
  $data = array();
  
  $data[$field->fid .'_fid'] = array(
    'title' => term_fields_views_format_title($field),
    'help' => term_fields_views_format_help($field),
    'field' => array(
       'handler' => 'views_handler_field', // @todo create a specific handler
       'term_fields_field_name' => $field->fid,
    ),
    'relationship' => array(
      'handler' => 'views_handler_relationship',
      'base' => 'files',
      'base field' => 'fid',
      'label' => t('File'),
    ),
  );
  
  return $data;
}

/**
 * Builds a file field settings form.
 * 
 * @see term_fields_term_fields_forms_api()
 * @see term_fields_file_settings_form_validate()
 * @ingroup forms
 */
function term_fields_file_settings_form($field, $values, &$main_form, &$form_state) {
  $form = array();
  $default = $field->options + term_fields_file_settings_default($field->widget);
  
  $form['allowed_extensions'] = array(
    '#type' => 'textfield',
    '#title' => t('Allowed file extensions'),
    '#description' => t('Allowed file extensions, separated by a space and without leading dot.'),
    '#default_value' => $default['allowed_extensions'],
    '#pre_render' => array('term_fields_file_settings_pre_render_extensions'),
  );

  $form['max_size'] = array(
    '#type' => 'textfield',
    '#title' => t('Maximum file size per upload'),
    '#description' => t('Your PHP settings limit the maximum file size per upload to %size.', array('%size' => format_size(term_fields_file_php_max_filesize()))),
    '#default_value' => $default['max_size'],
    '#size' => 1,
    '#required' => TRUE,
    '#element_validate' => array('_element_validate_integer_positive'),
    '#field_suffix' => t('MB'),
  );
  
  if ($field->widget === 'image') {
    $form['alt'] = array(
      '#type' => 'checkbox',
      '#title' => t('Display a field for alternate text'),
      '#default_value' => $default['alt'],
    );
  }
  
  return $form;
}

/**
 * Validates a file field settings form.
 * 
 * @see term_fields_term_fields_forms_api()
 * @see term_fields_file_settings_form()
 */
function term_fields_file_settings_form_validate($field, $values, &$form, &$form_state) {
  $error_elt = implode('][', $values['#parents']);
  $form_parent = $form;
  
  while ($key = array_shift($values['#parents'])) {
    $form_parent = $form_parent[$key];
  }
  
  // Format extensions for the file_validate_extensions() function.
  $extensions = array_unique(array_filter(array_map('trim', explode(',', $values['allowed_extensions']))));
  form_set_value($form_parent['allowed_extensions'], implode('|', $extensions), $form_state);
  
  if ($values['max_size'] != '' && (!is_numeric($values['max_size']) || intval($values['max_size']) != $values['max_size'] || $values['max_size'] < 0)) {
    form_set_error($error_elt .'][max_size', t('%name must be a positive integer.', array('%name' => $element['#title'])));
  }
  elseif (($values['max_size'] * 1024 * 1024) > term_fields_file_php_max_filesize()) {
    form_set_error($error_elt .'][max_size', t('%name exceeds the limit defined by PHP settings.', array('%name' => $element['#title'])));
  }
}

/**
 * Nice display for allowed extensions.
 * 
 * Inspirated from _filefield_widget_settings_extensions_value().
 */
function term_fields_file_settings_pre_render_extensions($element) {
  $element['#value'] = implode(', ', array_filter(array_map('trim', explode('|', str_replace(array('.', ','), array('', '|'), $element['#value'])))));
  return $element;
}

/**
 * Gets the field default settings.
 */
function term_fields_file_settings_default($widget) {
  $default = array('allowed_extensions' => 'txt', 'max_size' => 1, 'alt' => 0);
  
  if ($widget === 'image') {
    $default['allowed_extensions'] = 'png|gif|jpg|jpeg';
  }
  
  return $default;
}

/**
 * Gets PHP settings maximum filesize.
 */
function term_fields_file_php_max_filesize() {
  static $max_size;
  
  if (! isset($max_size)) {
    $max_size = max(array_map('parse_size', array(
      ini_get('upload_max_filesize'),
      ini_get('post_max_size'),
    )));
  }
  
  return $max_size;
}

/**
* Gets the file from database.
*/
function term_fields_file_get_file($fid) {
  return db_fetch_object(db_query("SELECT * FROM {files} WHERE fid = %d", $fid));
}                           

/**
 * AHAH callback for uploads and deletions.
 * 
 * @see filefield_js()
 */
function term_fields_ahah_file($field) {
  if (empty($_POST['form_build_id'])) {
    // Invalid request.
    drupal_set_message(t('An unrecoverable error occurred. The uploaded file likely exceeded the maximum file size (@size) that this server supports.', array('@size' => format_size(term_fields_file_php_max_filesize()))), 'error');
    print drupal_to_js(array('data' => theme('status_messages')));
    exit;
  }
  
  // Build the new form.
  $form_state = array('values' => $_POST);
  $form_build_id = $_POST['form_build_id'];
  $form = form_get_cache($form_build_id, $form_state);

  if (!$form) {
    // Invalid form_build_id.
    drupal_set_message(t('An unrecoverable error occurred. This form was missing from the server cache. Try reloading the page and submitting again.'), 'error');
    print drupal_to_js(array('data' => theme('status_messages')));
    exit;
  }
  
  $form_id = reset($form['#parameters']);
  $form = form_builder($form_id, $form, $form_state);
  
  if (! isset($form_state['values']['fields'][$field->fid]['wrapper'])) {
    $form_state['values']['fields'][$field->fid]['wrapper'] = array();
  }
  
  if (isset($_POST['fields'][$field->fid]['wrapper'])) {
    $form_state['values']['fields'][$field->fid]['wrapper'] = array_merge($form_state['values']['fields'][$field->fid]['wrapper'], $_POST['fields'][$field->fid]['wrapper']);
  }
  
  if (! empty($form_state['storage']['fields'][$field->fid])) {
    $form_state['values']['fields'][$field->fid]['wrapper'] += $form_state['storage']['fields'][$field->fid];
  }
  
  $values = $form_state['values']['fields'][$field->fid];
  $values['#parents'] = array('fields', $field->fid);
  
  term_fields_file_field_form_validate($field, $values, $form, $form_state);
  
  $file = ! empty($form_state['values']['fields'][$field->fid]['wrapper']['fid']) ? (object) $form_state['values']['fields'][$field->fid]['wrapper'] : NULL;
  $form_element = term_fields_file_upload_form($field, $file);
  
  $form['fields'][$field->fid]['wrapper'] = array_merge($form['fields'][$field->fid]['wrapper'], $form_element);
  $form_state['storage']['fields'][$field->fid] = $form_state['values']['fields'][$field->fid]['wrapper'];
  
  // Do not store the 'delete' value.
  if (isset($form_state['storage']['fields'][$field->fid]['delete'])) {
    unset($form_state['storage']['fields'][$field->fid]);
  }
  
  form_set_cache($_POST['form_build_id'], $form, $form_state);
  
  $form_element += array(
    '#post' => $_POST,
    '#programmed' => FALSE,
    '#tree' => TRUE,
    '#parents' => array('fields', $field->fid, 'wrapper'),
  );
  
  $form_state = array('submitted' => FALSE);
  $form_element = form_builder('upload_js', $form_element, $form_state);
  
  $output = theme('status_messages') . drupal_render($form_element);

  // For some reason, file uploads don't like drupal_json() with its manual
  // setting of the text/javascript HTTP header. So use this one instead.
  print drupal_to_js(array('status' => TRUE, 'data' => $output));
  exit;
}
