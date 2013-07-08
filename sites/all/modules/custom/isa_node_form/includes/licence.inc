<?php
/**
 * @file
 *
 * @ingroup isa_node_form
 *
 */


/**
 *
 * Validation function for licence_form
 *
 * @param array $form An associative array containing the structure of the form.
 * @param array $form_state A keyed array containing the current state of the form.
 *
 * @see isa_node_form_form_alter
 *
 */
function _licence_form_validate(&$form, &$form_state) {
  //Validate the translations
  isa_node_form_validate_translations($form_state, 'field_licence_name', 'name', TRUE);
  isa_node_form_validate_translations($form_state, 'field_licence_description', 'description', TRUE);
}