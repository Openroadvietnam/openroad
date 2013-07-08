<?php

/**
 * @file
 * Administration interface for Term Fields module
 */

/**
 * Menu callback: fields administration overview page.
 * 
 * @todo support i18n_strings module (http://drupal.org/node/789286).
 */
function term_fields_admin_overview() {
  $vocabularies = taxonomy_get_vocabularies();
  $header = array(t('Field'), t('Machine name'), t('Module'), t('Type'), t('Widget'), t('Used in'), t('Actions'));
  $rows = array();
  
  foreach (term_fields_get_fields('fields') as $field) {
    $row = array();

    if (term_fields_append_field_info_rows($row, $field, 2)) {
      $vs = array();
      
      foreach (array_intersect_key($vocabularies, $field->vids) as $v) {
        $vs[] = check_plain($v->name);
      }
          
      $row[] = implode(', ', $vs);
      
      $actions = array();
      $actions[] = l(t('delete field (all vocabularies)'), 'admin/content/taxonomy/term_fields/delete/'. $field->fid);
      
      if ($unaffected = array_diff_key($vocabularies, $field->vids)) {
        $items = array();
        
        foreach ($unaffected as $v) {
          $items[] = l(check_plain($v->name), 'admin/content/taxonomy/term_fields/edit/'. $field->fid .'/'. $v->vid);
        }
        
        $actions[] = t('Add to: !vocabularies.', array('!vocabularies' => implode(', ', $items)));
      }
      $row[] = implode('<br />', $actions);
      $rows[] = $row;
    }
    else {
      $rows[] = array(
        'data' => $row,
        'class' => 'error',
      );
    }
  }

  if ($rows) {
    return theme('table', $header, $rows, array('id' => 'term-fields-overview'));
  }
  
  return t('There are no fields defined yet.');
}

/**
 * Fills table columns with field information if available.
 *
 * For the information columns, we check if the field is still supported (module,
 * type, widget). If anything goes wrong, an error message is shown.
 * Field should not be editable nor deletable, since the module that handles this
 * type of field fixes its own issues. Especially deleting field is forbidden, because
 * without storage information some useless columns in {term_fields_term} may not be
 * deleted as expected.
 *  
 * @param &$row
 *   The row to which append the field information.
 * @param $field
 *   The field object.
 * @param $remaining_rows
 *   The number of columns that follow the info ones.
 * @return
 *   TRUE if field settings seems OK, otherwise FALSE.
 */
function term_fields_append_field_info_rows(&$row, $field, $remaining_rows = 0) {
  $field_info = term_fields_get_fields_info($field->type);
  $row[] = check_plain($field->title);
  $row[] = $field->fid;
  
  if (module_exists($field->module)) {
    $row[] = $field->module;
    
    if (! empty($field_info)) {
      $row[] = t($field_info['title']);
      
      if (array_key_exists($field->widget, $field_info['widgets'])) {
        $row[] = t($field_info['widgets'][$field->widget]['title']);
      }
    }
  }
  
  if (count($row) < 5) {
    $error_row = array('data' => t('Field is not correctly defined and will be ignored. Please contact a site administrator.'));
    $colspan = (5 - count($row) + $remaining_rows);
    if ($colspan > 1) {
      $error_row['colspan'] = $colspan;
    }
    $row[] = $error_row;
    return FALSE;
  }
  
  return TRUE;
}

/**
 * Form builder for a vocabulary fields overview form.
 *
 * @see term_fields_vid_overview_form_submit()
 * @ingroup forms
 */
function term_fields_vid_overview_form($form_state, $vid) {
  $form = array('#tree' => TRUE);
  
  if (!$vocabulary = taxonomy_vocabulary_load($vid)) {
    drupal_not_found();
    exit(0);
  }
  
  $form['#vid'] = $vid;
  drupal_set_title(t('Fields overview for vocabulary %name', array('%name' => $vocabulary->name)));
  //$form['#theme'] = 'term_fields_vid_overview_form';
  
  if ($fields = term_fields_vocabulary_fields($vid)) {
    $form['fields'] = array('#fields' => $fields);
    
    foreach ($fields as $field) {
      $form['fields'][$field->fid]['weight'] = array(
        '#type' => 'weight',
        '#delta' => 50,
        '#default_value' => $field->weight,
        '#attributes' => array('class' => 'vocabulary-weight'),
      );
      
      $form['fields'][$field->fid]['required'] = array(
        '#type' => 'checkbox',
        '#default_value' => $field->required,
      );
    }
    
    $form['submit'] = array(
      '#type' => 'submit',
      '#value' => t('Save'),
    );
  }
  else {
    $form['empty'] = array(
      '#type' => 'markup',
      '#value' => t('There are no fields defined yet.'),
    );
  }
  
  return $form;
}

/**
 * Form submission handler for a vocabulary fields overview form.
 *
 * @see term_fields_vid_overview_form()
 */
function term_fields_vid_overview_form_submit($form, &$form_state) {
  $fields = $form['fields']['#fields'];
  $changes = 0;
  
  foreach ($form_state['values']['fields'] as $fid => $values) {
    if ($values['required'] != $fields[$fid]->required || $values['weight'] != $fields[$fid]->weight) {
      $field = array('fid' => $fid, 'vid' => $form['#vid'], 'required' => $values['required'], 'weight' => $values['weight']);
      drupal_write_record('term_fields_instance', $field, array('fid', 'vid'));
      $changes++;
    }
  }
  
  if ($changes) {
    term_fields_get_fields(NULL, TRUE);
  }
  
  drupal_set_message(t('The changes have been saved.'));
}

/**
 * Themes the vocabulary fields overview form as a sortable list of fields.
 * 
 * @ingroup themeable
 * @see term_fields_vid_overview_form()
 * @todo add support for i18n_strings module (http://drupal.org/node/789286).
 */
function theme_term_fields_vid_overview_form($form) {
  $output = '';
  
  if (array_key_exists('fields', $form)) {
    $header = array(t('Field'), t('Machine name'), t('Module'), t('Type'), t('Widget'), t('Required'), t('Weight'), t('Actions'));
    $rows = array();

    foreach (element_children($form['fields']) as $fid) {
      $field = $form['fields']['#fields'][$fid];
      $row = array();
      
      $field_ok = term_fields_append_field_info_rows($row, $field);
      
      $row[] = drupal_render($form['fields'][$fid]['required']);
      $row[] = drupal_render($form['fields'][$fid]['weight']);
      
      // Do not display edit/delete links for wrong fields.
      if ($field_ok) {
        $row[] = implode(' - ', array(
          l(t('edit'), 'admin/content/taxonomy/term_fields/edit/'. $field->fid .'/'. $field->vid),
          l(t('delete'), 'admin/content/taxonomy/term_fields/'. $field->vid .'/delete/'. $field->fid),
        ));
        $rows[] = array(
          'data' => $row,
          'class' => 'draggable',
        );
      }
      else {
        $row[] = '&nbsp;';
        $rows[] = array(
          'data' => $row,
          'class' => 'error',
        );
      }
    }
    
    if ($rows) {
      drupal_add_tabledrag('term-fields-overview', 'order', 'group', 'vocabulary-weight');
      $output = theme('table', $header, $rows, array('id' => 'term-fields-overview'));
    }
  }
  
  return $output . drupal_render($form);
}

/**
 * Form builder for creating a new field.
 *
 * @see term_fields_admin_add_term_form_validate()
 * @see term_fields_admin_add_term_form_submit()
 * @ingroup forms
 */
function term_fields_admin_add_term_form($form_state) {
  $form = array();
  $types = $descriptions = $widgets = $widget_options = array();
  $form['#types'] = term_fields_get_fields_info();
  
  if (! module_exists('date_api')) {
    drupal_set_message(t('The date field type is disabled, because it relies on the Date API module, that may be found !url.', array('!url' => l(t('there'), 'http://drupal.org/project/date', array('attributes' => array('rel' => 'external'))))), 'warning');
  }
  
  foreach ($form['#types'] as $type => $info) {
    $types[$type] = t($info['title']);
    $descriptions[$type] = t($info['description']);
    
    foreach ($info['widgets'] as $key => $widget) {
      $widgets[$type][$key] = array_map('t', $widget);
      $widget_options[$type][$key] = $widgets[$type][$key]['title'];
    }    
  }

  $form['fid'] = array(
    '#type' => 'textfield',
    '#title' => t('Field ID'),
    '#description' => t('The machine-readable name of the field. This name must contain only lowercase letters, numbers, and underscores. This name cannot be changed.'),
    '#required' => TRUE,
    '#maxlength' => 32,
  );
  
  $form['title'] = array(
    '#type' => 'textfield',
    '#title' => t('Title'),
    '#description' => t('A human-readable name to be used as the label for this field.'),
    '#required' => TRUE,
    '#maxlength' => 255,
  );
  
  $form['description'] = array(
    '#type' => 'textarea',
    '#title' => t('Description'),
    '#description' => t('Enter a description of this field to explain what the field is used for.'),
  );
  
  $form['type'] = array(
    '#type' => 'select',
    '#title' => t('Field type'),
    '#options' => array('' => t('Select type')) + $types,
    '#required' => TRUE,
  );
  
  $form['widget'] = array(
    '#type' => 'select',
    '#title' => t('Widget'),
    '#options' => array('' => t('Select widget')) + $widget_options,
    '#description' => t('You have to first select a field type before choosing the widget type.'),
    '#required' => TRUE,
  );
  
  $form['vid'] = array(
    '#type' => 'select',
    '#title' => t('Vocabulary'),
    '#options' => array('' => t('<none>')) + array_map(create_function('$v', 'return check_plain($v->name);'), taxonomy_get_vocabularies()),
    '#description' => t('You can affect this field to an existing vocabulary. This can also be done after, if the targeted vocabulary has not been created yet.'),
  );
  
  drupal_add_js(array('termFields' => array('typeDescriptions' => $descriptions, 'widgetOptions' => $widgets)), 'setting');
  drupal_add_js(drupal_get_path('module', 'term_fields') .'/term_fields.js');
  
  $form['submit'] = array(
    '#type' => 'submit',
    '#value' => t('Save'),
  );

  return $form;
}

/**
 * Form validation handler for the field creation form.
 *
 * @see term_fields_admin_add_term_form()
 * @see term_fields_admin_add_term_form_submit()
 */
function term_fields_admin_add_term_form_validate($form, &$form_state) {
  $values = $form_state['values'];

  // Do not bore user with stuffs that can be automatically corrected.
  if (0 !== strcmp($values['fid'], strtolower($values['fid']))) {
    form_set_value($form['fid'], strtolower($values['fid']), $form_state);
  }
  
  // Check field ID.
  if (!preg_match('~^[a-z]([_\w]*[a-z0-9]$|$)~', $values['fid'])) {
    form_set_error('fid', t('The field ID must contain only lowercase letters, numbers, and underscores. It should also begin by an alphabetic character and cannot finish by an underscore.'));
  }
  else {
    // Currently this should only return 'tid', but allows main schema upgrades
    // without changing following code.
    $schema = drupal_get_schema_unprocessed('term_fields', 'term_fields_term');
    
    $fids = array_keys(term_fields_get_fields('fields'));
    $fids = array_merge($fids, array_keys($schema['fields']));
    
    if (in_array($values['fid'], $fids)) {
      form_set_error('fid', t('The field ID %fid cannot be used. It is either already being used by another field, or is a reserved internal name.', array('%fid' => $values['fid'])));
    }
    
    // Now check for disallowed suffix.
    if ($suffixes = module_invoke_all('term_fields_suffixes')) {
      $match = array();
      if (preg_match('~('. implode('|', array_map('preg_quote', $suffixes)) .')$~', $values['fid'], $match)) {
        form_set_error('fid', t('The field ID %fid ends by %end, which belongs to the disallowed suffixes: @suffixes.', array('%fid' => $values['fid'], '%end' => $match[1], '@suffixes' => implode(', ', $suffixes))));
      }
    }
  }
  
  // Check field widget.
  if (! empty($values['type']) && ! empty($values['widget'])) {
    $widgets = $form['#types'][$values['type']]['widgets'];
    
    // This test could be part of the previous one, but resides there for better code readability.
    if (! array_key_exists($values['widget'], $widgets)) {
      $t_args = array('%type' => $form['#types'][$values['type']]['title'], '@widgets' => implode(', ', array_map(create_function('$widget', 'return $widget["title"];'), $widgets)));
      form_set_error('widget', format_plural(count($widgets), 'The only applicable widget for fields of type %type is: @widgets.', 'The only applicable widgets for fields of type %type are: @widgets.', $t_args));
    }    
  }
}

/**
 * Form submission handler for the field creation form.
 *
 * @see term_fields_admin_add_term_form()
 * @see term_fields_admin_add_term_form_validate()
 */
function term_fields_admin_add_term_form_submit($form, &$form_state) {
  $form_state['redirect'] = 'admin/content/taxonomy/term_fields';
  
  $field = (object) $form_state['values'];
  $field->options = array();
  
  if ($field_info = term_fields_get_fields_info($field->type)) {
    $field->module = $field_info['module'];
  }
  else {
    drupal_set_message(t('An error occured while saving the new field %title (%field). If such error persists, please contact a site administrator.', array('%title' => $field->title, '%field' => $field->fid)), 'error');
    return;
  }
  
  drupal_write_record('term_fields', $field);
  
  // Clear fields database cache.
  term_fields_get_fields(NULL, TRUE);

  if (empty($field->vid)) {
    drupal_set_message(t('The field %title has been created. You can now add it to any existing vocabulary.', array('%title' => $field->title)));
    return;
  }
  
  $form_state['redirect'] = "admin/content/taxonomy/term_fields/edit/$field->fid/$field->vid";
}

/**
 * Form builder for the field configuration form.
 *
 * @see term_fields_admin_field_configure_form_validate()
 * @see term_fields_admin_field_configure_form_submit()
 * @ingroup forms
 */
function term_fields_admin_field_configure_form($form_state, $field, $vocabulary) {
  if (! array_key_exists($vocabulary->vid, $field->vids)) {
    $field->vids[$vocabulary->vid] = array();
  }
  
  $field->vids[$vocabulary->vid] += array('vid' => $vocabulary->vid, 'required' => FALSE, 'weight' => 0);
  
  foreach ($field->vids[$vocabulary->vid] as $name => $value) {
    $field->{$name} = $value;
  }
  
  $form = array(
    '#tree' => TRUE,
    '#field' => $field,
  );
  
  $form['vid'] = array('#type' => 'value', '#value' => $vocabulary->vid);
  $form['fid'] = array('#type' => 'value', '#value' => $field->fid);
  $form['module'] = array('#type' => 'value', '#value' => $field->module);
  $form['type'] = array('#type' => 'value', '#value' => $field->type);
  $form['widget'] = array('#type' => 'value', '#value' => $field->widget);
  
  // Global settings.
  $form['global'] = array(
    '#type' => 'fieldset',
    '#title' => t('Field definition'),
    '#collapsible' => TRUE,
    '#collapsed' => TRUE,
    '#tree' => FALSE,
    '#description' => t('Following settings are common to all vocabularies this field is attached to.'),
  );
  
  $field_info = term_fields_get_fields_info($field->type);
  $form['global']['fid_display'] = array('#type' => 'item', '#title' => t('Field ID'), '#value' => $field->fid);
  $form['global']['type_display'] = array( '#type' => 'item', '#title' => t('Field type'), '#value' => t($field_info['title']));
  $form['global']['widget_display'] = array( '#type' => 'item', '#title' => t('Widget type'), '#value' => t($field_info['widgets'][$field->widget]['title']));
  
  $form['global']['title'] = array(
    '#type' => 'textfield',
    '#title' => t('Title'),
    '#default_value' => check_plain($field->title),
    '#description' => t('A human-readable name to be used as the label for this field.'),
    '#required' => TRUE,
    '#maxlength' => 255,
  );
  
  $form['global']['description'] = array(
    '#type' => 'textarea',
    '#title' => t('Description'),
    '#default_value' => filter_xss_admin($field->description),
    '#description' => t('Enter a description of this field to explain what the field is used for.'),
  );
  
  // Vocabulary scope settings.
  // Settings common to all field types.
  $form['vocabulary'] = array(
    '#type' => 'fieldset',
    '#title' => t('Vocabulary specific settings'),
    '#collapsible' => TRUE,
    '#collapsed' => TRUE,
    '#tree' => FALSE,
    '#description' => t('Following settings are specific to current vocabulary.'),
  );
  
  $form['vocabulary']['required'] = array(
    '#type' => 'checkbox',
    '#title' => t('Required'),
    '#default_value' => ! empty($field->required),
    '#description' => t('This setting may be different for each vocabulary'),
  );
  
  $form['vocabulary']['weight'] = array(
    '#type' => 'weight',
    '#delta' => 50,
    '#title' => t('Weight'),
    '#default_value' => isset($field->weight) ? $field->weight : 0,
    '#description' => t('When displaying fields on term edit form, those with lighter (smaller) weights appear before fields with heavier (larger) weights. Fields with equal weights are sorted alphabetically.'),
  );
  
  // Back to global settings.
  $form['options'] = array(
    '#type' => 'fieldset',
    '#title' => t('Options'),
    '#description' => t('Settings below are common to all vocabularies. Changing them when there are already some stored values may result in the loss of data. Be specially carefull when playing with date fields!'),
  );
  
  $dummy_field = drupal_clone($field);
  $dummy_field->title = t('Default value');
  $dummy_field->required = FALSE;
  
  if (module_hook($field->module, 'term_fields_forms_api')) {
    $hook = $field->module .'_term_fields_forms_api';

    if ($field_form = call_user_func_array($hook, array('field form', &$form, &$form_state, $dummy_field, array()))) {
      $form['options']['default'] = $field_form;
    }
    
    if ($options = call_user_func_array($hook, array('settings form', &$form, &$form_state, $field))) {
      // Use array_merge to allow overriding of the default form element.
      $form['options'] = array_merge($form['options'], $options);
    }
  }
  
  $form['submit'] = array(
    '#type' => 'submit',
    '#value' => t('Save'),
    '#suffix' => l(t('Cancel'), 'admin/content/taxonomy/term_fields/'. $vocabulary->vid),
  );
  
  return $form;
}

/**
 * Form validation handler for the field configuration form.
 *
 * @see term_fields_admin_field_configure_form()
 * @see term_fields_admin_field_configure_form_submit()
 */
function term_fields_admin_field_configure_form_validate($form, &$form_state) {
  $field = (object) $form_state['values'];
  $values = $form_state['values']['options'];
  $values['#parents'] = array('options');
  
  if (module_hook($field->module, 'term_fields_forms_api')) {
    $hook = $field->module .'_term_fields_forms_api';
    call_user_func_array($hook, array('settings validate', &$form, &$form_state, $field, $values));
    
    // Validate the default value if there are no configuration errors and if
    // the default form element was set.
    if (! form_get_errors() && isset($form['options']['default'])) {
      $values = $form_state['values']['options']['default'];
      $values['#parents'] = array('options', 'default');
      call_user_func_array($hook, array('field validate', &$form, &$form_state, $field, $values));
    }
  }
}

/**
 * Form submission handler for the field configuration form.
 *
 * @see term_fields_admin_field_configure_form()
 * @see term_fields_admin_field_configure_form_validate()
 * 
 * @todo When default value is modified, update the terms that have old
 *   default value... But how to know when this behavior is really valid?
 *   Adding a checkbox 'update ' may be a solution.
 *   Same kind of thought: should the default value be stored in the columns
 *   specifications? If so, all storage operations need to be updated...  
 */
function term_fields_admin_field_configure_form_submit($form, &$form_state) {
  // Allow modifications to the $form_state $variables before saving.
  if (module_hook($form_state['values']['module'], 'term_fields_forms_api')) {
    call_user_func_array(
      $form_state['values']['module'] .'_term_fields_forms_api',
      array('settings save', &$form, &$form_state, (object) $form_state['values'], $form_state['values']['options']));
  }
  
  // First save global information.
  $field = (object) $form_state['values'];
  
  // Ensure $field->options is an array.
  if (empty($field->options)) {
    $field->options = array();
  }
  
  // Flag the fiels as instantiated.
  if (empty($form['#field']->instantiated)) {
    $field->instantiated = 1;
  }
  
  drupal_write_record('term_fields', $field, array('fid'));
  
  // Now save the vocabulary specific settings.
  $update = array();
  
  if (db_result(db_query("SELECT COUNT(*) FROM {term_fields_instance} WHERE fid = '%s' AND vid = %d", $field->fid, $field->vid))) {
    $update = array('fid', 'vid');
  }

  drupal_write_record('term_fields_instance', $field, $update);
  
  // Get the old database columns if the field has already been instantiated.
  $old_columns = empty($form['#field']->instantiated) ? array() : module_invoke($field->module, 'term_fields_api', 'storage', $form['#field']);
  
  // Get the new columns if any.
  $columns = module_invoke($field->module, 'term_fields_api', 'storage', $field);
  
  // It is time now to alter the {term_fields_term} schema if necessary.
  $ret = array();
  
  if ($additions = array_diff_key($columns, $old_columns)) {
    foreach ($additions as $name => $column) {
      if (! db_column_exists('term_fields_term', $name)) {
        db_add_field($ret, 'term_fields_term', $name, $column);
      }
    }
  }
  
  if ($deletions = array_diff_key($old_columns, $columns)) {
    foreach ($deletions as $name => $column) {
      if (db_column_exists('term_fields_term', $name)) {
        db_drop_field($ret, 'term_fields_term', $name);
      }
    }
  }
  
  if ($modifications = array_diff_assoc(array_map('serialize', $columns), array_map('serialize', $old_columns + $additions))) {
    foreach ($modifications as $name => $column) {
      $column = unserialize($column);
      
      if (db_column_exists('term_fields_term', $name)) {
        db_change_field($ret, 'term_fields_term', $name, $name, $column);
      }
      else {
        db_add_field($ret, 'term_fields_term', $name, $column);
      }
    }
  }
  
  if ($ret) {
    // Log performed queries.
    term_fields_admin_log_queries($ret);

    // We need to clear the fields cache first, because this
    // is used to retrieve the storage data.
    term_fields_get_fields(NULL, TRUE);
    
    // Clear storage information cache.
    term_fields_get_storage(NULL, TRUE);
    
    // Update Drupal schema.
    drupal_get_schema(NULL, TRUE);
    
    // Clear Views cache.
    if (module_exists('views')) {
      views_invalidate_cache();
    }
  }
  else {
    // Clear fields database cache.
    term_fields_get_fields(NULL, TRUE);
  }
  
  drupal_set_message(t('The changes have been saved.'));
  $form_state['redirect'] = 'admin/content/taxonomy/term_fields/'. $field->vid;
}

/**
 * Form builder for the term field deletion confirm form.
 *
 * @see term_fields_admin_delete_confirm_form_submit()
 * @ingroup forms
 */
function term_fields_admin_delete_confirm_form($form_state, $field, $vocabulary = NULL) {
  $form = array();
  $form['fid'] = array('#type' => 'value', '#value' => $field->fid);
  $form['#field'] = $field;

  $t_args = array('%field' => $field->title);
  $description = 'This will delete the field %field entirely, for all vocabularies it is attached to. If you have any content left in this field, it will be lost. This action cannot be undone.';
  $question = 'Are you sure you want to delete the term field %field?';
  
  if ($vocabulary) {
    $form['vid'] = array('#type' => 'value','#value' => $vocabulary->vid);
    $form['#vocabulary'] = $vocabulary;
    
    $t_args['%vocabulary'] = $vocabulary->name;
    $description = 'The field %field will be removed from vocabulary %vocabulary. Field data are not removed until you delete the field entirely, from the global fields overview dashboard. This action can be undone by attaching this field to the vocabulary %vocabulary again.';
    $question = t('Are you sure you want to delete the term field %fid?', array('%fid' => $fid));
    $question = 'Are you sure you want to remove the term field %field from the vocabulary %vocabulary?';
  }
  
  $path = 'admin/content/taxonomy/term_fields';
  
  return confirm_form($form, t($question, $t_args), $path, t($description, $t_args));
}

/**
 * Form submission handler for the term field deletion confirm form.
 *
 * @see term_fields_admin_delete_confirm_form()
 */
function term_fields_admin_delete_confirm_form_submit($form, &$form_state) {
  global $user;

  $form_state['redirect'] = 'admin/content/taxonomy/term_fields';
  
  $columns = module_invoke($form['#field']->module, 'term_fields_api', 'storage', $form['#field']);
  $values = $form_state['values'];
  $t_args = array('%field' => $form['#field']->title, '@fid' => $form['#field']->fid, '%user' => $user->name);
  
  if (isset($values['vid'])) {
    db_query("DELETE FROM {term_fields_instance} WHERE fid = '%s' AND vid = %d", $values['fid'], $values['vid']);
    
    $t_args['%vocabulary'] = $form['#vocabulary']->name;
    watchdog('term_fields', 'User %user removed the field %field (ID: @fid) from the vocabulary %vocabulary.', $t_args, WATCHDOG_NOTICE);
    drupal_set_message(t('The Field %field has been removed from vocabulary %vocabulary.', $t_args));
    
    // Reset the values for related terms.
    if ($columns) {
      $update = $args = array();
      
      foreach ($columns as $name => $spec) {
        if (array_key_exists('default', $spec)) {
          $update[] = "`$name` = ". db_type_placeholder($spec['type']);
          $args = $spec['default'];
        }
        elseif (empty($spec['not null'])) {
          $update[] = "`$name` = null";
        }
      }
      
      if ($update) {
        db_query("UPDATE {term_fields_term} SET ". implode(', ', $update), $args);
      }
    }
    
    term_fields_get_fields(NULL, TRUE);
    return;
  }
  
  // Allows module that handles this field type to cleanup the database
  // if necessary; 
  module_invoke($form['#field']->module, 'term_fields_api', 'field delete', $form['#field']);
  
  // Drop column(s) from {term_fields_term}.
  if ($columns) {
    $ret = array();
    
    foreach (array_keys($columns) as $name) {
      if (db_column_exists('term_fields_term', $name)) {
        db_drop_field($ret, 'term_fields_term', $name);
      }
    }
    
    // Log performed queries.
    term_fields_admin_log_queries($ret);
  }
  
  // Remove all field instances.
  db_query("DELETE FROM {term_fields_instance} WHERE fid = '%s'", $values['fid']);
  
  // Remove field definition.
  db_query("DELETE FROM {term_fields} WHERE fid = '%s'", $values['fid']);
  
  // Clear database cache (order is important!).
  term_fields_get_fields(NULL, TRUE);
  term_fields_get_storage(NULL, TRUE);
  drupal_get_schema(NULL, TRUE);
  
  watchdog('term_fields', 'User %user removed the field %field (ID: @fid) entirely.', $t_args, WATCHDOG_NOTICE);
  drupal_set_message(t('The Field %field has been entirely removed.', $t_args));
}

/**
 * Logs queries in watchdog, just in case something went wrong.
 * 
 * @param $ret
 *   
 */
function term_fields_admin_log_queries($ret) {
  $items = array();
  
  foreach ($ret as $query) {
    $items[] = ($query['success'] ? 'SUCCESS' : 'ERROR') .': '. $query['query'];
  }
  
  if ($items) {
    watchdog('term_fields', theme('item_list', $items, 'The following queries were executed:'), array(), WATCHDOG_DEBUG);
  }
}
