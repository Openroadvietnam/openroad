<?php

/**
 * @file
 * 
 * @ingroup isa_node_form
 * 
 */

/**
 *
 * Validation function for asset_release_form
 *
 * @param array $form An associative array containing the structure of the form.
 * @param array $form_state A keyed array containing the current state of the form.
 *
 * @see isa_node_form_form_alter
 *
 */
function _asset_release_form_validate(&$form, &$form_state) {
    //Validate the translations
    isa_node_form_validate_translations($form_state, 'field_asset_name', 'name', TRUE);
    isa_node_form_validate_translations($form_state, 'field_asset_alternative_name', 'alternative name', FALSE);
    isa_node_form_validate_translations($form_state, 'field_asset_description', 'description', TRUE);

    //Validate the distribution(cardinality [0:1] to asset release
    isa_node_form_validate_distribution($form_state, 'field_asset_distribution', 'distribution');
}

/**
 * Form alter for the asset release form
 * 
 * @param array $form Nested array of form elements that comprise the form.
 * @param array $form_state A keyed array containing the current state of the form. The arguments that drupal_get_form() was originally called with are available in the array $form_state['build_info']['args'].
 * @param string $form_id String representing the name of the form itself. Typically this is the name of the function that generated the form.
 * 
 * @see isa_node_form_form_alter
 */
function _asset_release_form_alter(&$form, &$form_state, $form_id) {
    //Set the publiser as required
    $form['field_asset_publisher']['#required'] = TRUE;
    $form['field_asset_publisher'][0]['#required'] = TRUE;
    $form['taxonomy'][variable_get('geographic_coverage_vid', 26)]['#required'] = FALSE;
    $form['taxonomy'][variable_get('domains_vid', 27)]['#required'] = FALSE;
    isa_node_form_alter_og_audience_form($form, $form_state, $form_id);
    unset($form['field_asset_last_modification']);
    //Add the title on child of node reference (for the error message)
    $form['field_asset_publisher'][0]['#title'] = $form['field_asset_publisher']['#title'];
    $form['field_asset_distribution'][0]['#title'] = $form['field_asset_distribution']['#title'];
    $form['field_asset_contact_point'][0]['#title'] = $form['field_asset_contact_point']['#title'];
    $form['field_asset_item'][0]['#title'] = $form['field_asset_item']['#title'];
    $form['field_asset_metadata_publisher'][0]['#title'] = $form['field_asset_metadata_publisher']['#title'];
    $form['field_asset_homepage_doc'][0]['#title'] = $form['field_asset_homepage_doc']['#title'];
    $form['field_asset_documentation'][0]['#title'] = $form['field_asset_documentation']['#title'];
    $form['field_asset_related_doc'][0]['#title'] = $form['field_asset_related_doc']['#title'];
    $form['field_asset_webpage_doc'][0]['#title'] = $form['field_asset_webpage_doc']['#title'];
    // https://webgate.ec.europa.eu/CITnet/jira/browse/ISAICP-653
    // removed title for field asset_node_reference as requested by PwC (it is enough with the text in the "grey bar" above)
    
    /**
     * @see customize.js
     * append a suffix on autocomplete field, append by javasscrip links edit and remove 
     */
//  global $base_url;
//  $form['field_asset_distribution'][0]['#suffix'] = "<div  style='display:none'   id='asset_distribution_edit_remove' ><a href='#' id='field_asset_distribution_popups_edit' class='popups-form' >Edit</a> <a href='#'  Onclick=' $(\"#asset_distribution_edit_remove\").hide();$(\"#edit-field-asset-distribution-0-nid-nid\").val(\"\") ;return false;'        id='field_asset_distribution_remove'  >Remove</a></div>";
//  drupal_add_js('jQuery(document).ready(function () { append_edit_remove("#edit-field-asset-distribution-0-nid-nid","#asset_distribution_edit_remove","#field_asset_distribution_popups_edit","'.$base_url.'/node/"); });', 'inline');
//  
//  $form['field_asset_contact_point'][0]['#suffix'] = "<div  style='display:none'   id='asset_contact_point_edit_remove' ><a href='#' id='field_asset_contact_point_popups_edit' class='popups-form' >Edit</a> <a href='#'  Onclick=' $(\"#asset_contact_point_edit_remove\").hide();$(\"#edit-field_asset-contact-point-0-nid-nid\").val(\"\") ;return false;'        id='field_asset_contact_point_remove'  >Remove</a></div>";
//  drupal_add_js('jQuery(document).ready(function () { append_edit_remove("#edit-field-asset-contact-point-0-nid-nid","#asset_contact_point_edit_remove","#field_asset_contact_point_popups_edit","'.$base_url.'/node/"); });', 'inline');
//  
//  $form['field_asset_item'][0]["#suffix"] = "<div  style='display:none'   id='asset_item_edit_remove' ><a href='#' id='field_asset_item_popups_edit' class='popups-form' >Edit</a> <a href='#'  Onclick=' $(\"#asset_edit_edit_remove\").hide();$(\"#edit-field-asset-item-0-nid-nid\").val(\"\") ;return false;'        id='field_asset_item_remove'  >Remove</a></div>";
//  drupal_add_js('jQuery(document).ready(function () { append_edit_remove("#edit-field-asset-item-0-nid-nid","#asset_item_edit_remove","#field_asset_item_popups_edit","'.$base_url.'/node/"); });', 'inline');
//  

  // https://webgate.ec.europa.eu/CITnet/jira/browse/ISAICP-733
  // contributor agreement for contributed metadata ("Propose your federated repository" and "Propose your asset release", edit mode)
  $end_text = variable_get('group_propose_contributed_metadata_agreement_information', FALSE);
  if ($end_text) {
    $form['buttons']['#prefix'] = token_replace($end_text, 'global');
  }
}