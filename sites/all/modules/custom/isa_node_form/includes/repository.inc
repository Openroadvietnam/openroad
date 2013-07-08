<?php

define('REPOSITORY_HARVEST_MODE_MANUAL', '0');
define('REPOSITORY_HARVEST_MODE_AUTOMATIC', '1');

/**
 * @file
 * 
 * @ingroup isa_node_form
 * 
 */

/**
 *
 * Validation function for repository_form 
 * 
 * @param array $form An associative array containing the structure of the form.
 * @param array $form_state A keyed array containing the current state of the form.
 * 
 * @see isa_node_form_form_alter
 * 
 */
function _repository_form_validate(&$form, &$form_state) {
  if ($form_state['values']['field_repository_harvestmethod'][0]['value'] !== $form['group_repository_harvest']['field_repository_harvestmethod']['#default_value'][0]['value']) {
    $form_state['#force_rebuild'] = $form_state['rebuild'] = TRUE;
    $form['#cache'] = NULL;
  }
  // Check the required element
  if ($form_state['values']['field_repository_harvestmethod'][0]['value'] == REPOSITORY_HARVEST_MODE_AUTOMATIC) {
    $url = $form_state['values']['field_repository_harvesturl'][0]['value'];
    $freq = $form_state['values']['field_repository_harvestfreq'][0]['value'];

    if (empty($url)) {
      form_set_error('field_repository_harvesturl',
        t('The field <b>Harvest URL</b> is mandatory for the automatic mode.'));
    }
    if ($freq == '') {
      form_set_error('field_repository_harvestfreq',
        t('The field <b>Harvest Frequency</b> is mandatory for the automatic mode.'));
    }
  } else {
    // https://webgate.ec.europa.eu/CITnet/jira/browse/ISAICP-708
    // Manual selected: Harvest URL and Harvest Frequency cannot be selected/filled in. Automatic selected: Harvest URL and Harvest Frequency should be mandatory field.
    $form['group_repository_harvest']['field_repository_harvesturl'][0]['#required'] = FALSE;
  }
  if ($form['group_repository_harvest']['field_repository_harvesturl'][0]['#required'] && isset($form_state['values']['field_repository_harvesturl'][0]['value'])) {
    $url = $form_state['values']['field_repository_harvesturl'][0]['value'];
    if (!empty($url)) {
      //correspond to RFC 1738
      if (!link_validate_url($url, true)) {
        form_set_error('field_repository_harvesturl',
          t('The Harvest URL (%url) is not valid (not formatted according to RFC 1738).',
            array('%url' => $url)));
      }
      //don't return a 4xx or 5xx error
      $url_check = drupal_http_request($url);
      if (($url_check->code >= 400 && $url_check->code <= 600) || ($url_check->code < 0)) {

        form_set_error('field_repository_harvesturl',
          t('The url %url is not valid (return a %code error).',
            array('%url' => $url, '%code' => $url_check->code)));
      }
    }
  }

  // Validate the url
  if (isset($form_state['values']['field_repository_url'][0])) {
    foreach ($form_state['values']['field_repository_url'] as $url) {
      if (!is_array($url) || empty($url['url'])) {
        continue;
      }
      $url = $url['url'];

      //correspond to RFC 1738
      if (!link_validate_url($url)) {
        form_set_error('field_repository_url',
          t('The repository URL (%url) is not valid (not formatted according to RFC 1738).',
            array('%url' => $url)));
      }
      /* We don't need to check the availability of this URL */
    }
  }
  // Validate the URI
  if (!valid_url($form_state['values']['field_id_uri'][0]['value'])) {
    form_set_error('field_id_uri',
      t('The URI (%uri) is not valid (not formatted according to RFC 3986).',
        array('%uri' => $form_state['values']['field_id_uri'][0]['value'])));
  }
  //Validate the email
  if (isset($form_state['values']['field_repository_contact_email'])) {
    if (!empty($form_state['values']['field_repository_contact_email'][0]['value']) && !isa_toolbox_valid_email_adress($form_state['values']['field_repository_contact_email'][0]['value'],
        TRUE)) {
      form_set_error('field_repository_contact_email',
        t('The contact mail %contact_mail is not valid.',
          array('%contact_mail' => $form_state['values']['field_repository_contact_email'][0]['value'])));
    }
  }
  //Validate the translations
  isa_node_form_validate_translations($form_state, 'field_repository_name', 'name', TRUE);
  isa_node_form_validate_translations($form_state, 'field_repository_description', 'description',
    TRUE);
  isa_node_form_validate_translations($form_state, 'field_repository_schema', 'supported schema',
    FALSE);

  //set a message when one or more selected publisher is not validated
  $warning_publisher = 0;

  foreach ($form_state['values']['field_repository_publisher'] as $publisher) {
    if (is_array($publisher)) {
      if (isset($publisher['nid'])) {
        $node = node_load($publisher['nid']);
        if (workflow_node_current_state($node) != ISA_SID_COMMUNITY_VALIDATED) {
          //if the publisher is not in validated state
          $warning_publisher++;
        }
      }
    }
  }
  //set a message if one or more publisher is not validated
  if ($warning_publisher > 1) {
    drupal_set_message('Several publishers should be approved by the moderators');
  } elseif ($warning_publisher > 0) {
    drupal_set_message('One publisher should be approved by the moderators');
  }
}

/**
 * Form alter for the repository form
 * 
 * @param array $form Nested array of form elements that comprise the form.
 * @param array $form_state A keyed array containing the current state of the form. The arguments that drupal_get_form() was originally called with are available in the array $form_state['build_info']['args'].
 * @param string $form_id String representing the name of the form itself. Typically this is the name of the function that generated the form.
 * 
 * @see isa_node_form_form_alter
 */
function _repository_form_alter(&$form, &$form_state, $form_id) {
  if (arg(1) == 'add') {
    drupal_set_title(t('Create Federated Repository'));
  }
  
  $form['body_field']['body']['#weight'] = 38;
  $form['taxonomy'][variable_get('geographic_coverage_vid', 26)]['#required'] = FALSE;
  $form['taxonomy'][variable_get('domains_vid', 27)]['#required'] = FALSE;
  isa_node_form_alter_language_field($form);
  // modify access of og_desctiption
  $form['og_description']['#access'] = FALSE;

  // only moderated adhesion
  $form['og_selective']['#default_value'] = '1';
  $form['og_selective']['#type'] = 'hidden';

  //change the message of og_selective
  //$form['og_selective']['#description'] = 
  // t('If you select "moderated", 
  // users become member after community facilitator has approved the membership request.');
  $form['og_selective']['#description'] = '';
  // remove og register & og directory
  unset($form['og_register']);
  unset($form['og_directory']);
  // field "private group"
  $form['og_private']['#type'] = 'hidden';
  $form['og_private']['#default_value'] = '0';

  unset($form['field_asset_last_modification']);

  //Delete the third level of themes taxonomy
  foreach ($form['taxonomy'][variable_get('domains_vid', 27)]['#options'] as $key => $option) {
    $value = array_values($option->option);
    if (substr($value[0], 0, 2) == '--') {
      unset($form['taxonomy'][variable_get('domains_vid', 27)]['#options'][$key]);
    }
  }

  //Unset the delete button if the repository cannot be deleted
  if (!isa_toolbox_menu_access_node_delete($form['#node'])) {
    unset($form['buttons']['delete']);
  }
  
  //https://webgate.ec.europa.eu/CITnet/jira/browse/ISAICP-644
  //Changed fields labels and help text
  for ($i = 0; $i < count($form['field_repository_publisher']); $i ++) {
	if (isset($form['field_repository_publisher'][$i])) {
		$form['field_repository_publisher'][$i]['#title'] = t('Select an already registered publisher.');  
		$form['field_repository_publisher'][$i]['#suffix'] = t('Start typing a publisher name. The field will be expanded and offer a list of suggestions.');  
	}
  }
   global $base_path;
  $form['field_repository_publisher']['#prefix'] = '<div class="popups-reference-0"><div id="field-repository-publisher-items">';
  $form['field_repository_publisher']['#suffix'] = '</div><div> <a href="'.$base_path.'node/add/publisher?destination='.$_GET['q'].'" class="popups-reference-0 popups-reference" rel="popups-reference-0">' . t('Register a new Publisher') . '</a></div></div>';
  $form['field_repository_publisher']['field_repository_publisher_add_more']['#suffix'] = '<br>' . t('To register a new publisher, click on the link below.') . '<br>';
  $form['field_repository_publisher']['field_repository_publisher_add_more']['#prefix'] = t('If you want to add another registered publisher, click the button below "Add another publisher"') . '<br>';
		  
  //Add the title on child of node reference (for the error message)
  // Add the AHAH support for the Harvest Mode
  //$form['group_repository_harvest']['field_repository_harvestmethod']['#ahah'] = array(
  $form['group_repository_harvest']['field_repository_harvestmethod']['#ahah'] = array(
    'path' => 'node_form/dynamic_form',
    'wrapper' => 'harvest-fields',
    'event' => 'click',
    'method' => 'replace',
    'effect' => 'fade');

  $form['group_repository_harvest']['field_repository_harvestmethod']['#prefix'] = '<div id="harvest-fields">';
  $form['group_repository_harvest']['field_repository_harvestfreq']['#suffix'] = '</div>';
  
  if (!isset($form_state['#force_rebuild'])) {
    if (!isset($form['#node']) || !isset($form['#node']->field_repository_harvestmethod) ||
      $form['#node']->field_repository_harvestmethod[0]['value'] == REPOSITORY_HARVEST_MODE_MANUAL) {
      $form['group_repository_harvest']['field_repository_harvesturl'][0]['#required'] = FALSE;
      $form['group_repository_harvest']['field_repository_harvestfreq']['#required'] = FALSE;
    } else {
      $form['group_repository_harvest']['field_repository_harvesturl'][0]['#required'] = TRUE;
      $form['group_repository_harvest']['field_repository_harvestfreq']['#required'] = TRUE;
    }
  } else {
    if (!isset($form_state['values']) || $form_state['values']['field_repository_harvestmethod'][0]['value'] != '1') {
      $form['group_repository_harvest']['field_repository_harvesturl'][0]['#required'] = FALSE;
      $form['group_repository_harvest']['field_repository_harvestfreq']['#required'] = FALSE;
    } else {
      $form['group_repository_harvest']['field_repository_harvesturl'][0]['#required'] = TRUE;
      $form['group_repository_harvest']['field_repository_harvestfreq']['#required'] = TRUE;
    }
  }
  // https://webgate.ec.europa.eu/CITnet/jira/browse/ISAICP-708
  // Manual selected: Harvest URL and Harvest Frequency cannot be selected/filled in. Automatic selected: Harvest URL and Harvest Frequency should be mandatory field.
  $form['#after_build']['_repository_node_form_after_build'] = '_repository_node_form_after_build';

  // https://webgate.ec.europa.eu/CITnet/jira/browse/ISAICP-733
  // contributor agreement for contributed metadata ("Propose your federated repository" and "Propose your asset release", edit mode)
  $end_text = variable_get('group_propose_contributed_metadata_agreement_information', FALSE);
  if ($end_text) {
    $form['buttons']['#prefix'] = token_replace($end_text, 'global');
  }
  //$form['#submit'][] = "_repository_node_manage_harvestmode";
}

/**
 * This method consists in checking depending on the harvest mode which fields must be added
 * and if they become required
 * @param type $form
 * @param type $form_state
 * @param type $form_id
 * @return string 
 */
function _repository_node_form_ahah(&$form, &$form_state, $form_id) {
  if ($form_state['post']['field_repository_harvestmethod']['value'] === REPOSITORY_HARVEST_MODE_MANUAL) {
    $form['group_repository_harvest']['field_repository_harvesturl'][0]['#required'] = FALSE;
    $form['group_repository_harvest']['field_repository_harvestfreq']['#required'] = FALSE;
  } else {
    $form['group_repository_harvest']['field_repository_harvesturl'][0]['#required'] = TRUE;
    $form['group_repository_harvest']['field_repository_harvestfreq']['#required'] = TRUE;
  }
  // https://webgate.ec.europa.eu/CITnet/jira/browse/ISAICP-708
  // Manual selected: Harvest URL and Harvest Frequency cannot be selected/filled in. Automatic selected: Harvest URL and Harvest Frequency should be mandatory field.
  $form['#after_build']['_repository_node_form_after_build'] = '_repository_node_form_after_build';
  //Modify the form
  form_set_cache($form_build_id, $form, $form_state);
  $form += array(
    '#post' => $_POST,
    '#programmed' => FALSE,
  );
  $form = form_builder($form_id, $form, $form_state);
 
  $elements = array(
    $form['group_repository_harvest']['field_repository_harvestmethod'],
    $form['group_repository_harvest']['field_repository_harvesturl'],
    $form['group_repository_harvest']['field_repository_harvestfreq'],
  );
  return drupal_render($elements);
}

/**
 * Add/remove de disabled/readonly attribute to Harvest URL and Harvest Frequency
 * @param type $form
 * @param type $form_state
 * @return form 
 */
function _repository_node_form_after_build($form, &$form_state) {
// https://webgate.ec.europa.eu/CITnet/jira/browse/ISAICP-708
// Manual selected: Harvest URL and Harvest Frequency cannot be selected/filled in. Automatic selected: Harvest URL and Harvest Frequency should be mandatory field.
  // Note: disabled means that the value will not be posted,
  // so a change from auto (with values entered/selected for the url and frequency) to manual and back to auto will make that the entered values be lost.
  // Use readonly instead of disabled if the value of the url field has to be maintained (but probably the field will not look like disabled to the user). This
  // effect will not work for the frequency (input of type select)
  if (!isset($form['group_repository_harvest']['field_repository_harvesturl'][0]['value']['#attributes'])) {
    $form['group_repository_harvest']['field_repository_harvesturl'][0]['value']['#attributes'] = array();
  }
  if ($form['group_repository_harvest']['field_repository_harvesturl'][0]['#required']) {
    unset($form['group_repository_harvest']['field_repository_harvesturl'][0]['value']['#attributes']['readonly']);
  } else {
    $form['group_repository_harvest']['field_repository_harvesturl'][0]['value']['#attributes']['readonly'] = 'readonly';
  }
  if (!isset($form['group_repository_harvest']['field_repository_harvestfreq']['value']['#attributes'])) {
    $form['group_repository_harvest']['field_repository_harvestfreq']['value']['#attributes'] = array();
  }
  if ($form['group_repository_harvest']['field_repository_harvestfreq']['#required']) {
    unset($form['group_repository_harvest']['field_repository_harvestfreq']['value']['#attributes']['disabled']);
  } else {
    $form['group_repository_harvest']['field_repository_harvestfreq']['value']['#attributes']['disabled'] = 'disabled';
  }
  return $form;
}

/**
 * This action is done for the repository management.
 * It removes the existing harvest actions.
 */
function _repository_harvest_remove($node) {
  //drupal_set_message('Execute isa_workflow_repository_harvest_remove on node ' . $node->nid);
  // Remove all remaining files
  $query = "SELECT task_id, action, p2, filepath 
    FROM repositories_management
      INNER JOIN files ON p2 = fid
    WHERE p1 = '%s';";
  $result = db_query($query, $node->nid, 'todo');

  while ($row = db_fetch_object($result)) {
    // If it is a file
    if (!empty($row->filepath)) {
      if (is_file($row->filepath)) {
        file_delete($row->filepath);
      }
      $query = "DELETE FROM {files} WHERE fid = %d;";
      db_query($query, $row->p2);
    }
  }
  $query = "DELETE FROM {repositories_management} WHERE p1 = '%s';";
  db_query($query, $node->nid);
}

/**
 * This action is done for the repository management.
 * It insert or delete data into the repositories_management table 
 * in order to treat the metadata associated to the node
 */
function _repository_harvest($node) {
  // Check the status of the repository
  $states = workflow_get_states(workflow_get_workflow_for_type($node->type));
  $sids = array_keys($states, 'validated');
  if (!in_array(workflow_node_current_state($node), $sids)) {
    return;
  }

  // drupal_set_message('Execute isa_workflow_repository_harvest on node ' . $node->nid);
  // If we do not touch the harvest method it should not be called.
  $query = "SELECT vid, 
      field_repository_harvestmethod_value AS method, 
      field_repository_harvesturl_value AS url, 
      field_repository_harvestfreq_value AS frequency
    FROM {content_type_repository}
    WHERE nid = %d ORDER BY vid DESC LIMIT 1, 2";
  $result = db_query($query, $node->nid);

  // I create this to improve the readability
  $harvestInfo = new stdClass();
  $harvestInfo->method = $node->field_repository_harvestmethod[0]['value'];
  $harvestInfo->url = $node->field_repository_harvesturl[0]['value'];
  $harvestInfo->frequency = $node->field_repository_harvestfreq[0]['value'];

  // Check if we already have a release
  if ($prev = db_fetch_object($result)) {
    if ($prev->method != $harvestInfo->method) {
      // Tout est � mettre � jour donc je supprime tout
      _repository_harvest_remove($node);
    } else {
      if ($prev->url != $harvestInfo->url) {
        // Je ne mets � jour que l'URL de l'action 'adms_harvest'
        $query = "UPDATE {repositories_management} SET p2 = '%s' 
            WHERE p1 = '%s' AND action = 'adms_harvest' AND state = 'todo';";
        db_query($query, $harvestInfo->url, $node->nid);
      }
      if ($prev->frequency != $harvestInfo->frequency) {
        // Je ne mets � jour que la fr�quence de l'action 'adms_harvest'
        $query = "UPDATE {repositories_management} SET p3 = '%s' 
            WHERE p1 = '%s' AND action = 'adms_harvest' AND state = 'todo';";
        db_query($query, $harvestInfo->frequency, $node->nid);
      }
      return;
    }
  }
  if ($harvestInfo->method == REPOSITORY_HARVEST_MODE_AUTOMATIC) {
    // Je cree une ligne en automatique
    $query = "INSERT INTO {repositories_management} (repository, action, p1, p2, p3)
    VALUES ('%s', 'adms_harvest', '%s', '%s', '%s')";
    $result = db_query($query, $node->title, $node->nid, $harvestInfo->url, $harvestInfo->frequency
    );
  }
}