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
function _case_form_alter (&$form, &$form_state, $form_id){
  $form['group_case_info']['title'] = $form['title'];
  $form['group_case_info']['body_field'] = $form['body_field'];
  //field name of the date
  $form['group_case_info']['field_start_end_date']['#pre_render'] = array('isa_node_form_date_label');
  unset($form['title']);
  unset($form['body_field']);

  // taxonomy country isn't mandatory
  $form['taxonomy'][variable_get('country_vid', NULL)]['#required'] = 0;
}