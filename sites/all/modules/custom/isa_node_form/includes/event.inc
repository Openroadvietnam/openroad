<?php

/**
 * @file
 * 
 * @ingroup isa_node_form
 * 
 */

/**
 * Form alter for the asset release form
 * 
 * @param array $form Nested array of form elements that comprise the form.
 * @param array $form_state A keyed array containing the current state of the form. The arguments that drupal_get_form() was originally called with are available in the array $form_state['build_info']['args'].
 * @param string $form_id String representing the name of the form itself. Typically this is the name of the function that generated the form.
 * 
 * @see isa_node_form_form_alter
 */
function _event_form_alter(&$form, &$form_state, $form_id) {
  $form['group_event_information']['title'] = $form['title'];
  $form['group_event_information']['body_field'] = $form['body_field'];
  $form['group_event_information']['body_field']['body']['#title'] = t('Description');
  $form['group_event_information']['body_field']['body']['#required'] = TRUE;
  $form['group_event_information']['#access'] = TRUE;
  unset($form['body_field'], $form['title']);

  //field name of the date
  $form['group_event_information']['field_event_dates']['#pre_render'] = array('isa_node_form_date_label');

  $form['taxonomy'][variable_get('country_vid', 26)]['#weight'] = -7;
  $form['taxonomy'][variable_get('scope_vid', 45)]['#weight'] = -6;
  $form['taxonomy'][variable_get('languages_vid', 29)]['#weight'] = -5;
  $form['taxonomy'][variable_get('domains_vid', 27)]['#weight'] = -4;
  $form['taxonomy'][variable_get('free_event_vid', 59)]['#weight'] = -3;
  $form['taxonomy'][variable_get('open_event_vid', 60)]['#weight'] = -2;
  $form['taxonomy'][variable_get('organisation_type_vid', 63)]['#weight'] = -1;
  $form['taxonomy'][variable_get('keywords_vid', 28)]['#weight'] = 0;

  $form['taxonomy'][variable_get('free_event_vid', 59)]['#ahah'] = array(
    'path' => 'node_form/dynamic_form',
    'wrapper' => 'fees-description',
    'event' => 'change',
    'effect' => 'fade');
  //Move the field in the taxonomy fieldset
  $form['taxonomy']['field_event_fees_description'] = $form['field_event_fees_description'];
  unset($form['field_event_fees_description']);
  $form['taxonomy']['field_event_fees_description']['#weight'] = -2.5;
  $form['taxonomy']['field_event_fees_description']['#prefix'] = '<div id="fees-description">&nbsp;';
  $form['taxonomy']['field_event_fees_description']['#suffix'] = '</div>';
  //Display the field
  if ($form['taxonomy'][variable_get('free_event_vid', 59)]['#default_value'][0] == 1575) {
    $form['taxonomy']['field_event_fees_description'][0]['#access'] = TRUE;
    $form['taxonomy']['field_event_fees_description'][0]['#required'] = TRUE;
  }
  //Don't display the field
  else {
    $form['taxonomy'][variable_get('free_event_vid', 59)]['#suffix'] = '<div id="fees-description">&nbsp;</div>';
    $form['taxonomy']['field_event_fees_description'][0]['#access'] = FALSE;
    $form['taxonomy']['field_event_fees_description'][0]['#required'] = FALSE;
  }
  $form['field_event_rating']['#access'] = FALSE;
  $form['#validate'][] = '_event_form_validate';

  isa_node_form_alter_og_audience_form($form, $form_state, $form_id);
}

/**
 *
 * Validation function for event form
 * 
 * @param array $form An associative array containing the structure of the form.
 * @param array $form_state A keyed array containing the current state of the form.
 * 
 * @see isa_node_form_form_alter
 * 
 */
function _event_form_validate(&$form, &$form_state) {

  //Update form_state for the submission of moved field in taxonomy fieldset
    $form_state['values']['field_event_fees_description'] = $form_state['values']['taxonomy']['field_event_fees_description'];
	unset($form_state['values']['taxonomy']['field_event_fees_description']);
}

function _event_node_form_ahah(&$form, &$form_state, $form_id) {
  //Modify the form
  
  if ($_POST['taxonomy'][variable_get('free_event_vid', 59)] == 1575) {
    $form['taxonomy']['field_event_fees_description'][0]['#required'] = TRUE;
    $form['taxonomy']['field_event_fees_description'][0]['#access'] = TRUE;
  } else {
    $form['taxonomy']['field_event_fees_description'][0]['#default_value']['value'] = '';
    $form['taxonomy']['field_event_fees_description'][0]['#access'] = FALSE;
    $form['taxonomy']['field_event_fees_description'][0]['#required'] = FALSE;
  }
  
  form_set_cache($form_build_id, $form, $form_state);
  $form += array(
    '#post' => $_POST,
    '#programmed' => FALSE,
  );
  $form = form_builder($form_id, $form, $form_state);
  if( $_POST['taxonomy'][variable_get('free_event_vid', 59)] == 1575 ){
    return drupal_render($form['taxonomy']['field_event_fees_description']);
  }
  return '&nbsp;';
}
