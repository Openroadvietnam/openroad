<?php
/**
 * @file
 * 
 * @ingroup isa_node_form
 * 
 */


/**
 *
 * Validation function for publisher_form
 *
 * @param array $form An associative array containing the structure of the form.
 * @param array $form_state A keyed array containing the current state of the form.
 *
 * @see isa_node_form_form_alter
 *
 */
function _publisher_form_validate(&$form, &$form_state) {
  //Validate the translations
  isa_node_form_validate_translations($form_state, 'field_publisher_name', 'name', TRUE);
}


/**
 * Form alter for the publisher form
 * 
 * @param array $form Nested array of form elements that comprise the form.
 * @param array $form_state A keyed array containing the current state of the form. The arguments that drupal_get_form() was originally called with are available in the array $form_state['build_info']['args'].
 * @param string $form_id String representing the name of the form itself. Typically this is the name of the function that generated the form.
 * 
 * @see isa_node_form_form_alter
 */
function _publisher_form_alter (&$form, &$form_state, $form_id){
  $form['body_field']['#access'] = FALSE; 
}