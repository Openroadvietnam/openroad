<?php
/**
 * @file
 *
 * @ingroup isa_node_form
 *
 */

/**
 *
 * Validation function for distribution_form
 *
 * @param array $form An associative array containing the structure of the form.
 * @param array $form_state A keyed array containing the current state of the form.
 *
 * @see isa_node_form_form_alter
 *
 */
function _distribution_form_validate(&$form, &$form_state) {
  $isset_file = isset($form_state['values']['field_distribution_access_url'][0]) && $form_state['values']['field_distribution_access_url'][0]['fid'] != 0;
  $isset_url = isset($form_state['values']['field_distribution_access_url1'][0]) && !empty($form_state['values']['field_distribution_access_url1'][0]['url']); 
 //https://webgate.ec.europa.eu/CITnet/jira/browse/ISAICP-658
// Only save one field: url or file
  $type = $form_state['clicked_button']['#post']['group1_dist'];  
  if ($type == 'url') {
	if ($isset_url) {
		foreach($form_state['values']['field_distribution_access_url1'] as $url) {
		  if (!is_array($url) || empty($url['url'])) {
			continue;
		  }
		  $url_check = drupal_http_request($url['url']);
		  //correspond to RFC 1738
		  if ($url_check->code < 0 || !link_validate_url($url['url'])) {
			form_set_error('field_distribution_access_url1', t('The url (%url) is not valid (not formatted according to RFC 1738).', array('%url' => $url['url'])));
		  }
		  //don't return a 4xx or 5xx error
		  if (($url_check->code >= 400 && $url_check->code <= 600)) {
			form_set_error('field_distribution_access_url1', t('The url %url is not valid (return a %code error).', array('%url' => $url['url'], '%code' => $url_check->code)));
		  }
		}
		if ($form_state['values']['field_distribution_access_url'][0]['fid'] != 0) {								
			$removed_file = field_file_load ($form_state['values']['field_distribution_access_url'][0]['fid']);
			$form_state['values']['field_distribution_access_url'][0]['fid'] = 0;						
			field_file_delete($removed_file);				
		}
	}else{
		form_set_error('field_distribution_access_url1', t('Access URL or file field is required. Please set an URL or upload a file'));
	}   
  }
  //If there is no URL filled, we check if a file was uploaded
  else {
    if (!$isset_file) {
      form_set_error('field_distribution_access_url1', t('Access URL or file field is required. Please set an URL or upload a file'));    
	}else{
		$form_state['values']['field_distribution_access_url1'][0] = "";
	}
  }
  //Validate the translations
  isa_node_form_validate_translations($form_state, 'field_distribution_name', 'name', TRUE);
  isa_node_form_validate_translations($form_state, 'field_distribution_description', 'description', TRUE);

  //set a message when one or more selected licence is not validated
  $warning_licence = 0;
 
  foreach ($form_state['values']['field_distribution_licence'] as $licence) {
    if (is_array($licence)) {
      if(isset($licence['nid'])) {
        $node= node_load($licence['nid']);
        if (workflow_node_current_state($node) != ISA_SID_COMMUNITY_VALIDATED){
          //if the publisher is not in validated state
          $warning_licence ++;
        }
      }
    }
  }
  //set a message if one or more licence is not validated
  if ($warning_licence >1) {
    drupal_set_message('several licences should be approved by the moderators' );
  } elseif ($warning_licence >0) {
    drupal_set_message('one licence should be approved by the moderators' );
  }
  
  //set a message when one or more selected publisher is not validated
  $warning_publisher = 0;
 
  foreach ($form_state['values']['field_distribution_publisher'] as $publisher) {
    if (is_array($publisher)) {
      if(isset($publisher['nid'])) {
        $node= node_load($publisher['nid']);
        if (workflow_node_current_state($node) != ISA_SID_COMMUNITY_VALIDATED){
          //if the publisher is not in validated state
          $warning_publisher ++;
        }
      }
    }
  }
  //set a message if one or more publisher is not validated
  if ($warning_publisher >1) {
    drupal_set_message('several publishers should be approved by the moderators' );
  } elseif ($warning_publisher >0) {
    drupal_set_message('one publisher should be approved by the moderators' );
  }
  

  
}

/**
 * Form alter for the distribution form
 *
 * @param array $form Nested array of form elements that comprise the form.
 * @param array $form_state A keyed array containing the current state of the form. The arguments that drupal_get_form() was originally called with are available in the array $form_state['build_info']['args'].
 * @param string $form_id String representing the name of the form itself. Typically this is the name of the function that generated the form.
 *
 * @see isa_node_form_form_alter
 */
function _distribution_form_alter (&$form, &$form_state, $form_id){
  unset($form['field_asset_last_modification']);
  //Add the title on child of node reference (for the error message)
  $form['field_distribution_publisher'][0]['#title'] = $form['field_distribution_publisher']['#title'];
  $form['field_distribution_licence'][0]['#title'] = $form['field_distribution_licence']['#title'];
}