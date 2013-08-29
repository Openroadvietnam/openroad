<?php
/**
 * @file
 * 
 * @ingroup isa_node_form
 * 
 */

/**
 *
 * Validation function for contact_point_form 
 * 
 * @param array $form An associative array containing the structure of the form.
 * @param array $form_state A keyed array containing the current state of the form.
 * 
 * @see isa_node_form_form_alter
 * 
 */
function _contact_point_form_validate(&$form, &$form_state) {
  //Validate the email
  if (isset($form_state['values']['field_contact_point_mail'])) {
    foreach (element_children($form_state['values']['field_contact_point_mail']) as $key => $value) {
      $element = $form_state['values']['field_contact_point_mail'][$value];
      if (is_array($element)) {
        if (!empty($element['value']) && !isa_toolbox_valid_email_adress($element['value'])) {
          form_set_error('field_contact_point_mail][' . $value . '][value', t('The e-mail address %mail is not valid.', array('%mail' => $element['value'])));
        }
      }
    }
  }
}

function _contact_point_form_alter (&$form, &$form_state, $form_id){
  //https://webgate.ec.europa.eu/CITnet/jira/browse/ISAICP-888
  //Commeted the next line to make the URI field required (to show the symbol *)
  //$form['field_id_uri'][0]['#required'] = 0;
  $form['body_field']['#access'] = FALSE; 
}