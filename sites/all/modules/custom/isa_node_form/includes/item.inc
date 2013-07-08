<?php
/**
 * @file
 *
 * @ingroup isa_node_form
 *
 */


/**
 *
 * Validation function for item_form
 *
 * @param array $form An associative array containing the structure of the form.
 * @param array $form_state A keyed array containing the current state of the form.
 *
 * @see isa_node_form_form_alter
 *
 */
function _item_form_validate(&$form, &$form_state) {
  //Validate the translations
  isa_node_form_validate_translations($form_state, 'field_item_label', 'label', TRUE);
  isa_node_form_validate_translations($form_state, 'field_item_description', 'description', TRUE);
}