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
function _document_form_alter(&$form, &$form_state, $form_id) {

  $form ['body_field']['body']['#required'] = TRUE;
  $form['group_document_information']['title'] = $form['title'];
  $form['group_document_information']['body_field'] = $form['body_field'];
  unset($form['title']);
  unset($form['body_field']);
  return $form;
  isa_node_form_alter_og_audience_form($form, $form_state, $form_id);
}
