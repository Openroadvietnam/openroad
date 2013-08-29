<?php
/**
 * @file
 * 
 * @ingroup isa_node_form
 * 
 */

/**
 * Form alter for the documentation form
 * 
 * @param array $form Nested array of form elements that comprise the form.
 * @param array $form_state A keyed array containing the current state of the form. The arguments that drupal_get_form() was originally called with are available in the array $form_state['build_info']['args'].
 * @param string $form_id String representing the name of the form itself. Typically this is the name of the function that generated the form.
 * 
 * @see isa_node_form_form_alter
 */
function _documentation_form_alter (&$form, &$form_state, $form_id){
    $form['body_field']['#access'] = FALSE;  
}


/**
 *
 * Validation function for documentation_form
 *
 * @param array $form An associative array containing the structure of the form.
 * @param array $form_state A keyed array containing the current state of the form.
 *
 * @see isa_node_form_form_alter
 *
 */
function _documentation_form_validate(&$form, &$form_state) {
  // Validate the url
//https://webgate.ec.europa.eu/CITnet/jira/browse/ISAICP-653
//Only save one field (url or file)
  $type = $form_state['clicked_button']['#post']['group1_doc'];  
   if ($type == 'url') {
		if (isset($form_state['values']['field_documentation_access_url1'][0]) && !empty($form_state['values']['field_documentation_access_url1'][0]['url'])) {
			foreach($form_state['values']['field_documentation_access_url1'] as $url) {
			  if (!is_array($url) || empty($url['url'])) {
				continue;
			  }
			  $url_check = drupal_http_request($url['url']);
			  //correspond to RFC 1738
			  if ($url_check->code < 0 || !link_validate_url($url['url'])) {
				form_set_error('field_documentation_access_url1', t('The url (%url) is not valid (not formatted according to RFC 1738).', array('%url' => $url['url'])));
			  }
			  //don't return a 4xx or 5xx error
			  if (($url_check->code >= 400 && $url_check->code <= 600)) {
				form_set_error('field_documentation_access_url1', t('The url %url is not valid (return a %code error).', array('%url' => $url['url'], '%code' => $url_check->code)));
			  }
			}
			if ($form_state['values']['field_documentation_access_url'][0]['fid'] != 0) {								
				$removed_file = field_file_load ($form_state['values']['field_documentation_access_url'][0]['fid']);
				$form_state['values']['field_documentation_access_url'][0]['fid'] = 0;						
				field_file_delete($removed_file);				
			}		
		}else{
			form_set_error('field_documentation_access_url1', t('Access URL or file field is required. Please set an URL or upload a file'));
		}   		
	}
  //If there is no URL filled, we check if a file was uploaded
  else {
    if (isset($form_state['values']['field_documentation_access_url'][0]) && $form_state['values']['field_documentation_access_url'][0]['fid'] == 0) {
      form_set_error('field_documentation_access_url1', t('Access URL field is required. Please set an URL or upload a file'));
    }else{
		$form_state['values']['field_documentation_access_url1'][0] = "";
	}
  }

  //Validate the translations
  isa_node_form_validate_translations($form_state, 'field_documentation_title', 'title', TRUE);
}
