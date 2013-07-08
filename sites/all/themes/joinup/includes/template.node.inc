<?php




/**
 * Add pseudo-field date-of-creation based on node created time.
 * The pseudo-field is inserted before the "date of last modification" field
 * The pseudo-field is not inserted if the "date of last modification" field is not found
 *
 * @param $vars
 *   An array of variables to pass to the theme template.
 *
 * @see node.tpl.php
 * @see template.php
 */
function _joinup_add_field_date_created(&$vars) {
  // https://webgate.ec.europa.eu/CITnet/jira/browse/ISAICP-744
  // insert a new field with the date of creation, before field_asset_last_modification, so that they will appear in that order in the page
  $vars['fields'] = array_values($vars['fields']);  // to force indexing based on 0 (0,1,2...)
  $_date_mod_pos = array_search('field_asset_last_modification',$vars['fields']);
  if (false!==$_date_mod_pos) {
    array_splice($vars['fields'], $_date_mod_pos, 0, array('date_created'));
    // define the data for the new field
    $vars['date_created'] = array(
      'label' => 'Date of creation',  // the template will wrap the string with the t() function
      'value' => date(variable_get('date_format_joinup_date_format','j M Y - H:i'),$vars['node']->created)    // not using drupal's format_date to avoid time-zone adjustments
    );
  }
}


/**
 * Override or insert variables into the "node.tpl.php" templates.
 *
 * @param $vars
 *   An array of variables to pass to the theme template.
 *
 * @see node.tpl.php
 * @see template.php
 */
function _joinup_preprocess_node(&$vars) {
  $function_name = '_joinup_preprocess_' . $vars['node']->type;
  if (function_exists($function_name)) {  
    $function_name($vars);
  }
  // don't display $submitted, flag and rating if he's wiki licence wizard
  if ($vars['node']->type == ISA_WIKI_TYPE && isa_toolbox_is_license_wizard_wiki($vars['node'])) {
    unset($vars['submitted']);
  } else {

    // Prepare flag to display
    // machine name for flags you want displayed
    $flags_to_display = array('editor_choice', 'call_for_review');
    $flags_counts = flag_get_counts('node', $vars['node']->nid);
    if ($flags_counts) {
      $flags = '';
      foreach ($flags_counts as $flag_name => $count) {
        if (in_array($flag_name, $flags_to_display)) {
          $flag = flag_get_flag($flag_name);
          $flag_class = str_replace(array(" ", "'"), array('-', ''), strtolower($flag->title));
          $flags .= '<div class="' . $flag_class . '" title="' . $flag->title . '">' . $flag->title . '</div>';
        }
      }
      if ($flags) {
        $vars ['flags_view'] = $flags;
      }
    }
    $statistics_counter = $vars['node']->links['statistics_counter']['title'];
    // Prepare vote rating display
    if (variable_get('fivestar_title_' . $vars['node']->type, -1) != -1) {
      $vars['vote_rating'] = joinup_prepare_vote_rating($vars['node']);
      if ($statistics_counter) {
        $vars['vote_rating'] .= ' | ' . $statistics_counter;
      }
    } else {
      $vars['vote_rating'] = $statistics_counter;
    }
    //Prepare a title linked to the node
    $vars['title_link'] = l($vars['title'], $vars['path']);
  }
  $vars['date_creation'] = date("d M Y - H:i", $vars['node']->created);
  $vars['date_modification'] = date("d M Y - H:i", $vars['node']->changed);
}

/**
 * Override or insert variables into the "node-publisher.tpl.php" template.
 *
 * @param array $vars
 *   An array of variables to pass to the theme template.
 *
 * @see node-publisher.tpl.php
 * @see _joinup_preprocess_node
 */
function _joinup_preprocess_publisher(&$vars) {
  $node = $vars ['node'];

  $exclude = array(
    'field_publisher_description',
    'field_publisher_name');

  $language_textfields = array(array('field_name', 'field_publisher_name', 'title'));
  _joinup_prepare_template($language_textfields, $vars, $exclude);

  //Prepare taxonomies
  $include = array(
    variable_get("publisher_type_vid", 72),
  );
  isa_toolbox_create_taxonomy_list($node, $include, FALSE, TRUE);
  foreach ($node->taxonomy_terms as $vocab => $terms) {
    $voc = str_replace(' ', '', strtolower($vocab));
    $vars['taxonomy_terms_' . $voc]['label'] = $vocab;
    $vars['taxonomy_terms_' . $voc]['value'] = $terms;
    $vars['fields'][] = 'taxonomy_terms_' . $voc;
  }
}

/**
 * Override or insert variables into the "node-licence.tpl.php" template.
 *
 * @param array $vars
 *   An array of variables to pass to the theme template.
 *
 * @see node-licence.tpl.php
 * @see _joinup_preprocess_node
 */
function _joinup_preprocess_licence(&$vars) {
  $node = $vars ['node'];

  $exclude = array(
    'field_licence_description',
    'field_licence_name');

  $language_textfields = array(array('description', 'field_licence_description', 'body'),
    array('field_name', 'field_licence_name', 'title'));
  _joinup_prepare_template($language_textfields, $vars, $exclude);

  //Prepare taxonomies
  $include = array(
    variable_get("licence_type_vid", 75),
  );
  isa_toolbox_create_taxonomy_list($node, $include, FALSE, TRUE);
  foreach ($node->taxonomy_terms as $vocab => $terms) {
    $voc = str_replace(' ', '', strtolower($vocab));
    $vars['taxonomy_terms_' . $voc]['label'] = $vocab;
    $vars['taxonomy_terms_' . $voc]['value'] = $terms;
    $vars['fields'][] = 'taxonomy_terms_' . $voc;
  }
}

/**
 * Override or insert variables into the "node-distribution.tpl.php" template.
 *
 * @param array $vars
 *   An array of variables to pass to the theme template.
 *
 * @see node-distribution.tpl.php
 * @see _joinup_preprocess_node
 */
function _joinup_preprocess_distribution(&$vars) {
  $node = $vars ['node'];
  variable_set('filefield_icon_theme', 'joinup');
  $exclude = array(
    'field_distribution_description',
    'field_distribution_name',);

  //Display only the access url or the file
  if (isset($node->field_distribution_access_url1[0]['url'])) {
    $exclude[] = 'field_distribution_access_url';
  }
  else {
    $exclude[] = 'field_distribution_access_url1';
  }
  $language_textfields = array(array('description', 'field_distribution_description', 'body'),
    array('field_name', 'field_distribution_name', 'title'));
  _joinup_prepare_template($language_textfields, $vars, $exclude);

  //Prepare taxonomies
  $include = array(
    variable_get("file_format_vid", 73),
    variable_get("status_vid", 69),
    variable_get("representation_technique_vid", 70),
  );
  isa_toolbox_create_taxonomy_list($node, $include, FALSE, TRUE);
  foreach ($node->taxonomy_terms as $vocab => $terms) {
    $voc = str_replace(' ', '', strtolower($vocab));
    $vars['taxonomy_terms_' . $voc]['label'] = $vocab;
    $vars['taxonomy_terms_' . $voc]['value'] = $terms;
    $vars['fields'][] = 'taxonomy_terms_' . $voc;
  }
  // https://webgate.ec.europa.eu/CITnet/jira/browse/ISAICP-744
  // insert a new field with the date of creation, before field_asset_last_modification, so that they will appear in that order in the page
  _joinup_add_field_date_created($vars);
}

/**
 * Override or insert variables into the "node-item.tpl.php" template.
 *
 * @param array $vars
 *   An array of variables to pass to the theme template.
 *
 * @see node-item.tpl.php
 * @see _joinup_preprocess_node
 */
function _joinup_preprocess_item(&$vars) {
  $node = $vars ['node'];

  $exclude = array(
    'field_item_description',
    'field_item_label');

  $language_textfields = array(array('description', 'field_item_description', 'body'),
    array('field_name', 'field_item_label', 'title'));
  _joinup_prepare_template($language_textfields, $vars, $exclude);
}

/**
 * Override or insert variables into the "node-contact_point.tpl.php" template.
 *
 * @param array $vars
 *   An array of variables to pass to the theme template.
 *
 * @see node-contact_point.tpl.php
 * @see _joinup_preprocess_node
 */
function _joinup_preprocess_contact_point(&$vars) {
  _joinup_prepare_template(array(), $vars, $exclude);
}

/**
 * Override or insert variables into the "node-documentation.tpl.php" template.
 *
 * @param array $vars
 *   An array of variables to pass to the theme template.
 *
 * @see node-contact_point.tpl.php
 * @see _joinup_preprocess_node
 */
function _joinup_preprocess_documentation(&$vars) {
  $node = $vars ['node'];
//https://webgate.ec.europa.eu/CITnet/jira/browse/ISAICP-653
//Only show the field with data
  if (isset($node->field_documentation_access_url[0]['fid']) && $node->field_documentation_access_url[0]['fid']>0){
	$exluir = 'field_documentation_access_url1';
  } elseif (isset($node->field_documentation_access_url1[0]['url']) && $node->field_documentation_access_url1[0]['url'] != ''){
	$exluir = 'field_documentation_access_url';
  }
  $exclude = array('field_documentation_title', $exluir);
  $language_textfields = array(array('field_name', 'field_documentation_title', 'title'));
  _joinup_prepare_template($language_textfields, $vars, $exclude);
}

/**
 * Override or insert variables into the "node-asset_release.tpl.php" template.
 *
 * @param array $vars
 *   An array of variables to pass to the theme template.
 *
 * @see node-asset_release.tpl.php
 * @see _joinup_preprocess_node
 */
function _joinup_preprocess_asset_release(&$vars) {
  $node = $vars ['node'];
  $exclude = array(
    'field_asset_description',
    'field_asset_distribution',
    'field_asset_name',
    'field_asset_node_reference');
  $language_textfields = array(array('description', 'field_asset_description', 'body'),
    array('field_name', 'field_asset_name', 'title'));
  _joinup_prepare_template($language_textfields, $vars, $exclude);

  // Append the version number to the title
  if (!empty($node->field_asset_version[0]['value']['field_language_textfield_name'][0]['value'])) {
    drupal_set_title("{$vars['title']}&nbsp;{$node->field_asset_version[0]['value']['field_language_textfield_name'][0]['value']}");
  }

  // Prepare the distributions
  foreach ($node->field_asset_distribution as $item) {
    $item = node_load($item['nid']);
    $dist = array();
    if (isset($item->field_distribution_access_url[0])) {
      // field_distribution_access_url ==> File
      $dist = array(
        'title' => $item->field_distribution_access_url[0]['filename'],
        'url' => file_create_url($item->field_distribution_access_url[0]['filepath']),
        'size' => _isa_toolbox_render_file_size($item->field_distribution_access_url[0]['filesize']),
        //https://webgate.ec.europa.eu/CITnet/jira/browse/ISAICP-950
        //Avoid error creating link with l() below
        'options' => array()
      );
    } else if (isset($item->field_distribution_access_url1[0])) {
      // field_distribution_access_url1 ==> URL
      $dist['title'] = $item->title;
      $dist['url'] = $item->field_distribution_access_url1[0]['url'];
      $dist['type'] = 'url';
      $dist['nid'] = $item->nid;
      $dist['options']['attributes'] = array(
        'class' => 'asset-external-download nid-' . $node->nid . ' did-' . $item->nid
      );
      $dist['size'] = t('N/A');
    } else {
      continue;
    }

    // Construction of the link to the file/url
    $dist['link'] = l($dist['title'], $dist['url'],$dist['options']);
    // Construct of the link to the Distribution
    $dist['linkd'] = l('more', "node/{$item->nid}");

    // Setting up the description
    foreach ($item->field_distribution_description as $sub) {
      $lang = $sub['value']["field_language_textfield_lang"][0]['value'];
      if ($lang == $lang_req) {
        $dist['description'] = $sub['value']["field_{$sub['type']}_name"][0]['value'];
      }
    }
    if ($lang_req == 'en' || empty($dist['description'])) {
      $dist['description'] = $item->body;
    }
    if (count($dist) > 0) {
      $vars['distributions'][] = $dist;
    }
  }

  //Prepare repository of origin
  $groups = og_get_node_groups($node);
  foreach ($groups as $key => $value) {
    $group = node_load($key);
    if ($group->group_type == 'repository') {
      $vars['fields'][] = 'repository_origin';
      $vars['repository_origin'] = array(
        'label' => t('Repository of origin'),
        'value' => l($value, 'node/' . $key),
      );
    }
  }

  //Prepare reference to another asset
  $vars['reference_nodes'] = array();
  foreach ($vars['field_asset_node_reference'] as $reference) {
    if (is_array($reference)) {
      $nid = $reference['value']['field_asset_node_reference_node'][0]['nid'];
    }
    if (!empty($nid)) {
      $node_reference = node_load($nid);
      $title_version = $node_reference->title . ' ' . $node_reference->field_asset_version[0]['value']['field_language_textfield_name'][0]['value'];
      $link = l($title_version, 'node/' . $nid);
      $relationship = $reference['value']['field_asset_node_relationship'][0]['value'];
      //Retrieve the label of relationship type
      if (!isset($tab_links[$relationship]['label'])) {
        $sql = " SELECT global_settings FROM content_node_field WHERE field_name = '%s' AND type = 'text' ";
        $global_settings = unserialize(db_result(db_query($sql, 'field_asset_node_relationship')));
        $allowed_values_explode = explode("\n", $global_settings['allowed_values']);
        foreach ($allowed_values_explode as $allowed_value) {
          $allowed_value_explode = explode("|", $allowed_value);
          if ($allowed_value_explode[0] == $relationship) {
            $relationship_value = trim($allowed_value_explode[1]);
          }
        }
        $tab_links[$relationship]['label'] = $relationship_value;
      }
      $tab_links[$relationship]['value'][] = $link;
      $tab_links[$relationship]['ids'][] = $nid;
    }
  }
  foreach ($tab_links as $id => $value) {
    $ids = implode(', ', $value['ids']);
    $vars['field_asset_node_reference_' . $id]['value'] = implode(', ', $value['value']);
    $vars['field_asset_node_reference_' . $id]['label'] = $value['label'];
    $vars['field_asset_node_reference_' . $id]['value'] .= "<div id=field_asset_node_reference_'{$id}_button' style='display:inline;'>" .
      ctools_ajax_image_button(
        isa_ajax_get_image('collapsed'),
        "isa_ajax/nojs/teaser_expand/field_asset_node_reference_{$id}/{$ids}/lang={$lang_req}",
        t('expand')) .
      '</div>';
    $vars['fields'][] = 'field_asset_node_reference_' . $id;
  }

  //Prepare taxonomies
  $include = array(
    variable_get("country_vid", NULL),
    variable_get("domains_vid", NULL),
    variable_get("keywords_vid", NULL),
    variable_get("asset_type_vid", 68),
    variable_get("interoperability_level_vid", 67),
    variable_get("status_vid", 69),
  );
  isa_toolbox_create_taxonomy_list($node, $include, FALSE, TRUE);
  foreach ($node->taxonomy_terms as $vocab => $terms) {
    $voc = str_replace(' ', '', strtolower($vocab));
    $vars['taxonomy_terms_' . $voc]['label'] = $vocab;
    $vars['taxonomy_terms_' . $voc]['value'] = $terms;
    $vars['fields'][] = 'taxonomy_terms_' . $voc;
  }

  //Prepare flag
  $flags = flag_get_counts('node', $node->nid);
  if (isset($flags['i_use_this_asset'])) {
    if ($flags['i_use_this_asset'] == 1) {
      $vars['i_use_this_asset'] = '<strong>1</strong> ' . t('person uses this asset release');
    } else {
      $vars['i_use_this_asset'] = '<strong>' . $flags['i_use_this_asset'] . '</strong> ' . t('people uses this asset release');
    }
  }

  // https://webgate.ec.europa.eu/CITnet/jira/browse/ISAICP-732
  // disclaimer to be included at the page bottom of every (federated) asset release (in read mode)
  if (isset($vars['repository_origin'])) {
    $disclaimer = variable_get('group_federated_asset_release_disclaimer_information', FALSE);
    if ($disclaimer) {
      $vars['disclaimer'] = token_replace($disclaimer, 'global');
    }
  }
  // https://webgate.ec.europa.eu/CITnet/jira/browse/ISAICP-744
  // insert a new field with the date of creation, before field_asset_last_modification, so that they will appear in that order in the page
  _joinup_add_field_date_created($vars);

  //https://webgate.ec.europa.eu/CITnet/jira/browse/ISAICP-950
  //Count external downloads in asset release
  if('asset_release' == $node->type){//Add javascript to count in the asset_release views
      $settings = array(
        'isa_private_files' => array(
          'linkClass' => 'asset-external-download',
          'target' => base_path() . 'system/count_asset_external_downloads',
          )
        );
      drupal_add_js($settings, 'setting');
      drupal_add_js(drupal_get_path('module', 'isa_private_files') . '/js/count_asset_release_download.js');
  }
}

/**
 * Override or insert variables into the "node-profile.tpl.php" templates.
 *
 * @param array $vars
 *   An array of variables to pass to the theme template.
 *
 * @see _joinup_preprocess_node
 */
function _joinup_preprocess_profile(&$vars) {
  $node = $vars['node'];
  $vars['kudos'] = l(userpoints_get_current_points($vars['uid']), isa_toolbox_get_kudos_page(),
    array('attributes' => array('title' => t('What are kudos?'), 'class' => 'popups')));
  $vars['created'] = format_interval(time() - $vars['node']->created, 2);
  isa_toolbox_get_user_country($vars['node']);

  $include = array(
    variable_get("languages_vid", NULL),
    variable_get("domains_vid", NULL),
    variable_get("keywords_vid", NULL));
  isa_toolbox_create_taxonomy_list($node, $include);
  $vars['taxonomy_terms'] = $node->taxonomy_terms;
  drupal_set_title($vars['node']->field_firstname[0]['value']
    . ' '
    . $vars['node']->field_lastname[0]['value']);
}

/**
 * Override or insert variables into the "node-project.tpl.php" templates.
 *
 * @param array $vars
 *   An array of variables to pass to the theme template.
 *
 * @see _joinup_preprocess_node
 */
function _joinup_preprocess_project_project(&$vars) {
  global $base_url;
  $node = $vars['node'];
  //og remove $vars['submitted'] (og.module l 449), but is useful
  $vars['submitted'] = theme('node_submitted', $node);
  // https://webgate.ec.europa.eu/CITnet/jira/browse/ISAICP-600
  // Obtain name of principal mailing list, if any
  $mailing_list = isa_ml_get_principal_mailing_list($node->nid);
  if ($mailing_list) {
    $vars['mailing_list'] = isa_toolbox_protect_email(isa_ml_get_principal_mailing_list($node->nid) . '@' . variable_get('isa_ml_domain', NULL));
  }

//maven url
  if ($vars['field_project_display_maven'][0]['value']) {
    $maven_url = str_replace('@shortname@', $node->project['uri'],
      variable_get('maven_url', $base_url . '/nexus'));
    $vars['maven_url'] = l($maven_url, $maven_url);
  }
  // SVN
  if ($vars['field_project_display_svn']['0']['value']) {
    $svn_url = str_replace('@shortname@', $node->project['uri'],
      variable_get('svn_url', $base_url . '/joinup-svn/@shortname@'));
    $vars['svn_url'] = l($svn_url, $svn_url);
  }

  // WebDAV & WebDir
  $web_directory = isa_toolbox_get_web_directory(array('nid' => $node->nid));
  if ($web_directory) {
    if (og_is_group_member($node->nid, TRUE)) {
      $webdav_url = str_replace('@shortname@', $node->project['uri'],
        variable_get('webdav_url', $base_url . '/joinup-webdav/@shortname@'));
      $vars['webdav_url'] = l($webdav_url, $webdav_url);
    }
    if (isset($web_directory[0]) && $web_directory[0]->public_access == WEB_DIR_PUBLIC_ACCESS_ENABLED) {
      if ($web_directory[0]->state == WEB_DIR_STATUS_TODO) {
        $vars['webdir_url'] = t('The web directory is being create');
      } elseif ($web_directory[0]->state == WEB_DIR_STATUS_DONE) {

        $webdir_url = str_replace('@shortname@', $node->project['uri'],
          variable_get('webdir_url', $base_url . '/site/@shortname@'));
        $vars['webdir_url'] = l($webdir_url, $webdir_url);
      } elseif ($web_directory[0]->state == WEB_DIR_STATUS_FAILED) {
        if (og_is_group_admin($node)) {
          $vars['webdir_url'] = t('The web directory creation is failed, you can <a href="@contact-form">contact</a> the site administrator',
            array('@contact-form' => url('contact')));
        }
      }
    }
  }
  if ($node->tnid == 0) {
    $flags = flag_get_counts('node', $node->nid);
  } else {
    $flags = flag_get_counts('node', $node->tnid);
  }
  if (isset($flags['i_use_this_project'])) {
    if ($flags['i_use_this_project'] == 1) {
      $vars['i_use_this_project'] = '<strong>1</strong> ' . t('person uses this project');
    } else {
      $vars['i_use_this_project'] = '<strong>' . $flags['i_use_this_project'] . '</strong> ' . t('people uses this project');
    }
  }

  if ($node->group_type == ISA_SOFTWARE_TYPE) {
    _joinup_preprocess_software($vars);
  } elseif ($node->group_type == ISA_ASSET_TYPE) {
    _joinup_preprocess_asset($vars);
  }
}

function _joinup_preprocess_software(&$vars) {
  global $base_url;
  $node = $vars['node'];
  $default_language = variable_get('language_default', NULL);
  $default_language = $default_language->language;
  if ($node->language != $default_language) {
    $vars['node']->content['og_mission']['#value'] = str_replace('<p>',
      "<p lang='" . $node->language . "'>", $vars['node']->content['og_mission']['#value']);
    $vars['node']->field_project_soft_features['0']['value'] = str_replace('<p>',
      "<p lang='" . $node->language . "'>", $vars['node']->field_project_soft_features['0']['value']);
    $vars['node']->field_project_soft_future_plans['0']['value'] = str_replace('<p>',
      "<p lang='" . $node->language . "'>",
      $vars['node']->field_project_soft_future_plans['0']['value']);
    $vars['node']->field_project_soft_get_involved['0']['value'] = str_replace('<p>',
      "<p lang='" . $node->language . "'>",
      $vars['node']->field_project_soft_get_involved['0']['value']);
    $vars['node']->field_project_soft_public_admin['0']['value'] = str_replace('<p>',
      "<p lang='" . $node->language . "'>",
      $vars['node']->field_project_soft_public_admin['0']['value']);
  }

  // use node-software.tpl.php for displays software
  array_push($vars['template_files'], 'node-' . $node->group_type);
  $vocabulary_include = array(
    variable_get("domains_vid", NULL),
    variable_get("keywords_vid", NULL),
    variable_get("development_status_vid", NULL),
    variable_get("intended_audience_vid", NULL),
    variable_get("license_vid", NULL),
    variable_get("natural_language_vid", NULL),
    variable_get("operating_system_vid", NULL),
    variable_get("programming_language_vid", NULL),
    variable_get("categories_vid", NULL),
  );
  isa_toolbox_create_taxonomy_list($node, $vocabulary_include);
  // sort the taxonomy terms
  foreach ($vocabulary_include as $key => $value) {
    $vocab = taxonomy_vocabulary_load($value);
    if (isset($node->taxonomy_terms[$vocab->name])) {
      $vars['taxonomy_terms'][$vocab->name] = $node->taxonomy_terms[$vocab->name];
    }
  }
  $more_links = array();
  foreach ($node->field_project_soft_more_lin as $key => $value) {
    if (!empty($value['view'])) {
      $more_links[] = $value['view'];
    }
  }
  $vars['more_links'] = implode(", ", $more_links);

  if (user_access('administer nodes')) {
    $vars['edit_link'] = l('Edit this software', "node/{$node->nid}/edit");
  }
  //joinup_set_terms_in_vars($vars, $node);
}

function _joinup_preprocess_asset(&$vars) {
  global $base_url;
  $node = $vars['node'];
  $default_language = variable_get('language_default', NULL);
  $default_language = $default_language->language;
  if ($node->language != $default_language) {
    $vars['node']->content['og_mission']['#value'] = str_replace('<p>',
      "<p lang='" . $node->language . "'>", $vars['node']->content['og_mission']['#value']);
  }
  // use node-asset.tpl.php for displayes asset temlplate
  array_push($vars['template_files'], 'node-' . $node->group_type);

  $vocabulary_include = array(
    variable_get("domains_vid", NULL),
    variable_get("keywords_vid", NULL),
    variable_get("license_vid", NULL),
    variable_get("natural_language_vid", NULL),
    variable_get("represented_countries_vid", NULL),
    variable_get("asset_status_vid", NULL),
  );
  isa_toolbox_create_taxonomy_list($node, $vocabulary_include);

  // sort the taxonomy terms
  foreach ($vocabulary_include as $key => $value) {
    $vocab = taxonomy_vocabulary_load($value);
    if (isset($node->taxonomy_terms[$vocab->name])) {
      $vars['taxonomy_terms'][$vocab->name] = $node->taxonomy_terms[$vocab->name];
    }
  }
  if (user_access('administer nodes')) {
    $vars['edit_link'] = l('Edit this asset', "node/{$node->nid}/edit");
  }
}

/**
 * Override or insert variables into the "node-federated_project.tpl.php" templates.
 *
 * @param array $vars
 *   An array of variables to pass to the theme template.
 *
 * @see _joinup_preprocess_node
 */
function _joinup_preprocess_federated_project(&$vars) {
  $node = $vars['node'];
  $default_language = variable_get('language_default', NULL);
  $default_language = $default_language->language;
  if ($node->tnid == 0) {
    $flags = flag_get_counts('node', $node->nid);
  } else {
    $flags = flag_get_counts('node', $node->tnid);
  }
  if (isset($flags['i_use_this_project'])) {
    $vars['i_use_this_project'] = '<strong>' . $flags['i_use_this_project'] . '</strong> ' . t('people uses this project');
  } else {
    $vars['i_use_this_project'] = t('No people using this project');
  }
  if ($node->language != $default_language) {
    $vars['node']->content['body']['#value'] = str_replace('<p>',
      "<p lang='" . $node->language . "'>", $vars['node']->content['body']['#value']);
    $vars['node']->field_project_soft_features['0']['value'] = str_replace('<p>',
      "<p lang='" . $node->language . "'>", $vars['node']->field_project_soft_features['0']['value']);
    $vars['node']->field_project_soft_future_plans['0']['value'] = str_replace('<p>',
      "<p lang='" . $node->language . "'>",
      $vars['node']->field_project_soft_future_plans['0']['value']);
    $vars['node']->field_project_soft_get_involved['0']['value'] = str_replace('<p>',
      "<p lang='" . $node->language . "'>",
      $vars['node']->field_project_soft_get_involved['0']['value']);
    $vars['node']->field_project_soft_public_admin['0']['value'] = str_replace('<p>',
      "<p lang='" . $node->language . "'>",
      $vars['node']->field_project_soft_public_admin['0']['value']);
  }

  $vars['translations'] = isa_toolbox_get_translations_list($node->nid);
  $vocabulary_include = array(
    variable_get("development_status_vid", NULL),
    variable_get("intended_audience_vid", NULL),
    variable_get("license_vid", NULL),
    variable_get("natural_language_vid", NULL),
    variable_get("operating_system_vid", NULL),
    variable_get("programming_language_vid", NULL),
    variable_get("keywords_vid", NULL),
  );
  isa_toolbox_create_taxonomy_list($node, $vocabulary_include);
  // sort the taxonomy terms
  foreach ($vocabulary_include as $key => $value) {
    $vocab = taxonomy_vocabulary_load($value);
    if (isset($node->taxonomy_terms[$vocab->name])) {
      $vars['taxonomy_terms'][$vocab->name] = $node->taxonomy_terms[$vocab->name];
    }
  }
  $more_links = array();

  foreach ($node->field_project_soft_more_links as $key => $value) {
    if (!empty($value['view'])) {
      $more_links[] = $value['view'];
    }
  }
  $vars['more_links'] = implode(", ", $more_links);
}

/**
 * Override or insert variables into the "node-federated_forge.tpl.php" templates.
 *
 * @param array $vars
 *   An array of variables to pass to the theme template.
 *
 * @see _joinup_preprocess_node
 */
function _joinup_preprocess_federated_forge(&$vars) {
  $node = $vars['node'];
  // Reload the cached node
  $url = $node->field_forges_homepage['0']['url'];
  if (substr($url, 0, 5) != 'http:') {
    $url = 'http://' . $url;
  }
  //$vars['homepage']['url'] = l($node->field_forges_homepage['0']['title'], $url, array('external' => TRUE, 'abbsolute' => TRUE));
}

/**
 * Override or insert variables into the "node-community.tpl.php" templates.
 *
 * @param array $vars
 *   An array of variables to pass to the theme template.
 *
 * @see _joinup_preprocess_node
 */
function _joinup_preprocess_community(&$vars) {
  $node = $vars['node'];
  $community_shortname = $vars['field_community_short_name']['0']['value'];
  $vars['submitted'] = theme('node_submitted', $node);
  // https://webgate.ec.europa.eu/CITnet/jira/browse/ISAICP-600
  // Obtain name of principal mailing list, if any
  $mailing_list = isa_ml_get_principal_mailing_list($node->nid);
  if ($mailing_list) {
    $vars['mailing_list'] = isa_toolbox_protect_email(isa_ml_get_principal_mailing_list($node->nid) . '@' . variable_get('isa_ml_domain', NULL));
  }  
  if (user_access('administer nodes')) {
    $vars['edit_link'] = l('Edit this community', "node/{$node->nid}/edit");
  }
  $vocabulary_include = array(
    variable_get("domains_vid", NULL),
    variable_get("keywords_vid", NULL),
  );
  isa_toolbox_create_taxonomy_list($node, $vocabulary_include);

  // sort the taxonomy terms
  foreach ($vocabulary_include as $key => $value) {
    $vocab = taxonomy_vocabulary_load($value);
    if (isset($node->taxonomy_terms[$vocab->name])) {
      $vars['taxonomy_terms'][$vocab->name] = $node->taxonomy_terms[$vocab->name];
    }
  }
}

/**
 * Override or insert variables into the "node-topic.tpl.php" templates.
 *
 * @param array $vars
 *   An array of variables to pass to the theme template.
 *
 * @see _joinup_preprocess_node
 */
function _joinup_preprocess_topic(&$vars) {
  $node = $vars['node'];
  $profile = content_profile_load('profile', $vars['uid']);
  $picture = $profile->picture;
  $vars['picture'] = $picture;
  $vars['user_company_name'] = $profile->field_company_name['0']['value'];
  $vars['postnumber'] = isa_toolbox_get_users_topics_count($node->uid);

  //set the taxonomy terms for user
  isa_toolbox_create_taxonomy_list($profile, array(variable_get('country_vid', NULL)));
  $country = taxonomy_vocabulary_load(variable_get('country_vid', NULL));
  if (isset($profile->taxonomy_terms[$country->name])) {
    $vars['user_countries'] = $profile->taxonomy_terms[$country->name];
  }
  //set the taxonomy terms for community
  isa_toolbox_create_taxonomy_list($node,
    array(variable_get('domains_vid', NULL), variable_get('forum_vid', NULL), variable_get('languages_vid',
      NULL)));
  $domains = taxonomy_vocabulary_load(variable_get('domains_vid', NULL));
  $vars['domains'] = $node->taxonomy_terms[$domains->name];
  $languages = taxonomy_vocabulary_load(variable_get('languages_vid', NULL));
  $vars['languages'] = $node->taxonomy_terms[$languages->name];

  $forum = taxonomy_vocabulary_load(variable_get('forum_vid', NULL));
  if (isset($node->taxonomy_terms[$forum->name])) {
    $gid = $vars['og_groups'];
    $gid = array_shift($gid);
    $group = node_load($gid);

    foreach ($node->taxonomy as $tid => $value) {
      if ($value->vid == variable_get('forum_vid', NULL)) {
        $forum_name = $value->name;
      }
    }
    $group_short_name = isa_links_get_group_short_name($group);
    $vars['forum'] = l($node->taxonomy_terms[$forum->name],
      "$group->group_type/$group_short_name/forum/$forum_name");
  }
  $keywords = taxonomy_vocabulary_load(variable_get('keywords_vid', NULL));
  if (isset($node->taxonomy_terms[$keywords->name])) {
    $vars['keywords'] = $node->taxonomy_terms[$keywords->name];
  }
  //set the taxonomy term for topic
  isa_toolbox_create_taxonomy_list($node);
  $domains = taxonomy_vocabulary_load(variable_get('domains_vid', NULL));
  if (isset($node->taxonomy_terms[$domains->name])) {
    $vars['domains'] = $node->taxonomy_terms[$domains->name];
  }
  $languages = taxonomy_vocabulary_load(variable_get('languages_vid', NULL));
  if (isset($node->taxonomy_terms[$languages->name])) {
    $vars['languages'] = $node->taxonomy_terms[$languages->name];
  }
  //set the taxonomy term for user
  //joinup_set_terms_in_vars($vars, $node);
  //add highlight link
  $hl[] = $node->links['hl_link'];
  $vars['highlight_link'] = theme_links($hl);
  //add subscription link
  $sub[] = $node->links['subscription_link'];
  $vars['subscription_link'] = theme_links($sub);
  //add statistics reads
  $statistic = statistics_get($node->nid);
  $vars['statistic_counter'] = $statistic['totalcount'];
  //$vars['highlight_link'] =  $node->links['statistics_counter']['title'];

  $group = $vars['og_groups'];
  $group_id = array_shift(array_keys($group));
  if (og_is_group_member($group_id, FALSE, $vars['uid'])) {
    $user = user_load($vars['uid']);
    $group = node_load($group_id);
    if ($group->uid == $vars['uid']) {
      $joined_group = $group->created;
    } else {
      $joined_group = $user->og_groups[$group_id]['created'];
    }
    $vars['joined_group'] = date("d/m/Y", $joined_group);
  }
}

/**
 * Override or insert variables into the "node-document.tpl.php" templates.
 *
 * @param array $vars
 *   An array of variables to pass to the theme template.
 *
 * @see _joinup_preprocess_node
 */
function _joinup_preprocess_document(&$vars) {
  $node = $vars['node'];

  // Document categories
  $vocabulary_include = array(
    variable_get("nature_of_documentation_vid", NULL),
    variable_get("document_license_vid", NULL),
    variable_get("country_vid", NULL),
    variable_get("domains_vid", NULL),
    variable_get("keywords_vid", NULL)
  );
  isa_toolbox_create_taxonomy_list($node, $vocabulary_include, TRUE);
  // Sort the taxonomy terms
  foreach ($vocabulary_include as $key => $value) {
    $vocab = taxonomy_vocabulary_load($value);
    if (isset($node->taxonomy_terms[$vocab->name])) {
      $vars['taxonomy_terms'][$vocab->name] = $node->taxonomy_terms[$vocab->name];
    }
  }
  // Document Information
  $vars['document_info'] = array(
    'Publication date' => date('d F Y', strtotime($node->field_publication_date['0']['value'])),
    'Publisher' => $node->field_publisher['0']['value'],
    'ISBN Number' => $node->field_isbn['0']['value'],
    'Description of license' => $node->field_description_of_license['0']['value']
  );
  $vars['original_url']['url'] = $node->field_original_url['0']['url'];
  $vars['original_url']['title'] = $node->field_original_url['0']['title'];
  $vars['email_contact'] = $node->field_email['0']['value'];
}

/**
 * Override or insert variables into the "node-document.tpl.php" templates.
 *
 * @param array $vars
 *   An array of variables to pass to the theme template.
 *
 * @see _joinup_preprocess_node
 */
function _joinup_preprocess_presentation(&$vars) {
  $node = $vars['node'];

  // Document categories
  $vocabulary_include = array(
    variable_get("nature_of_documentation_vid", NULL),
    variable_get("document_license_vid", NULL),
    variable_get("country_vid", NULL),
    variable_get("domains_vid", NULL),
    variable_get("keywords_vid", NULL)
  );
  isa_toolbox_create_taxonomy_list($node, $vocabulary_include, TRUE);
  // Sort the taxonomy terms

  foreach ($vocabulary_include as $key => $value) {
    $vocab = taxonomy_vocabulary_load($value);


    if (isset($node->taxonomy_terms[$vocab->name])) {
      $vars['taxonomy_terms'][$vocab->name] = $node->taxonomy_terms[$vocab->name];
    }
  }
  // Document Information
  $vars['presentation_info'] = array(
    'Publication date' => date('d F Y', strtotime($node->field_publication_date['0']['value'])),
    'Publisher' => $node->field_publisher['0']['value']
  );
  $vars['original_url']['url'] = $node->field_original_url['0']['url'];
  $vars['original_url']['title'] = $node->field_original_url['0']['title'];
  $vars['email_contact'] = $node->field_email['0']['value'];
}

/**
 * Override or insert variables into the "node-case.tpl.php" templates.
 *
 * @param array $vars
 *   An array of variables to pass to the theme template.
 *
 * @see _isa_icp_preprocess_node
 */
function _joinup_preprocess_case(&$vars) {
  $node = $vars['node'];

  // Document categories
  $vocabulary_include = array(
    variable_get("domains_vid", NULL),
  );
  isa_toolbox_create_taxonomy_list($node, $vocabulary_include);
  // Sort the taxonomy terms
  foreach ($vocabulary_include as $key => $value) {
    $vocab = taxonomy_vocabulary_load($value);
    if (isset($node->taxonomy_terms[$vocab->name])) {
      $vars['taxonomy_terms'][$vocab->name] = $node->taxonomy_terms[$vocab->name];
    }
  }
}

/**
 * Override or insert variables into the "node-case_epractice.tpl.php" templates.
 *
 * @param array $vars
 *   An array of variables to pass to the theme template.
 *
 * @see _joinup_preprocess_node
 */
function _joinup_preprocess_case_epractice(&$vars) {
  $node = $vars['node'];

  // Document categories
  $vocabulary_include = array(
    variable_get("country_vid", NULL),
    variable_get("initiative_type_vid", NULL),
    variable_get("scope_vid", NULL),
    variable_get("case_status_vid", NULL),
    variable_get("service_type_vid", NULL),
    variable_get("overall_implementation_approach_vid", NULL),
    variable_get("technology_choice_vid", NULL),
    variable_get("funding_source_vid", NULL),
    variable_get("implementation_cost_vid", NULL),
    variable_get("yearly_cost_vid", NULL),
    variable_get("return_investment_vid", NULL),
    variable_get("keywords_vid", NULL),
  );
  isa_toolbox_create_taxonomy_list($node, $vocabulary_include);
  // Sort the taxonomy terms
  foreach ($vocabulary_include as $key => $value) {
    $vocab = taxonomy_vocabulary_load($value);
    if (isset($node->taxonomy_terms[$vocab->name])) {
      $vars['taxonomy_terms'][$vocab->name] = $node->taxonomy_terms[$vocab->name];
    }
  }
  // Case Information
  $vars['case_info'] = array(
    'Acronym' => $node->field_acronym['0']['value'],
    'Presentation URL' => (!empty($node->field_presentation_url['0']['title'])) ? '<a href="' . $node->field_presentation_url['0']['url'] . '">' . $node->field_presentation_url['0']['title'] . '</a>'
        : '<a href="' . $node->field_presentation_url['0']['url'] . '">' . $node->field_presentation_url['0']['url'] . '</a>',
    'Website URL' => (!empty($node->field_website_url['0']['title'])) ? '<a href="' . $node->field_website_url['0']['url'] . '">' . $node->field_website_url['0']['title'] . '</a>'
        : '<a href="' . $node->field_website_url['0']['url'] . '">' . $node->field_website_url['0']['url'] . '</a>',
    'City/Region' => $node->field_city_region['0']['value'],
    'Start date' => date('d F Y', strtotime($node->field_start_end_date['0']['value'])),
    'End date' => date('d F Y', strtotime($node->field_start_end_date['0']['value2'])),
    'Operational date' => date('d F Y', strtotime($node->field_operational_date['0']['value']))
  );
  // Case long text information
  $vars['case_long_text_info'] = array(
    'Policy context' => array('class' => 'policy', 'text' => $node->field_policy_context['0']['value']),
    'Target users' => array('class' => 'target-user', 'text' => $node->field_target_users['0']['value']),
    'Description of target users and groups' => array('class' => 'target-desc', 'text' => $node->field_desc_target_users_groups['0']['value']),
    'Description of the way to implement the initiative' => array('class' => 'implementation-desc', 'text' => $node->field_desc_implementation['0']['value']),
    'Technology solution' => array('class' => 'tech-solution', 'text' => $node->field_tech_solution['0']['value']),
    'Main results, benefits and impacts' => array('class' => 'benefits', 'text' => $node->field_main_results['0']['value']),
    'Return on investment description' => array('class' => 'investment-desc', 'text' => $node->field_roi_desc['0']['value']),
    'Track record of sharing' => array('class' => 'track-record', 'text' => $node->field_track_record_sharing['0']['value']),
    'Lessons learnt' => array('class' => 'lessons-learnt', 'text' => $node->field_lessons_learnt['0']['value'])
  );
}

/**
 * Override or insert variables into the "node-news.tpl.php" templates.
 *
 * @param array $vars
 *   An array of variables to pass to the theme template.
 *
 * @see joinup_preprocess_node
 */
function _joinup_preprocess_project_issue(&$vars) {
  $node = $vars['node'];
  $project = node_load(array('nid' => $node->project_issue['pid'], 'type' => 'project_project'));
  $release->nid = $node->project_issue['rid'];
  if (module_exists('project_release')) {
    $release = project_release_load($release);
  }
  $assigned = ($node->project_issue['assigned'] && ($account = user_load(array('uid' => $node->project_issue['assigned'])))
        ? $account->name : t('Unassigned'));

  $current_data = array();
  $current_data['pid'] = array(
    'label' => t('Project'),
    'current' => $project->title,
  );
  if (!empty($release->project_release['version'])) {
    $current_data['rid'] = array(
      'label' => t('Version'),
      'current' => $release->project_release['version'],
    );
  }
  $current_data['component'] = array(
    'label' => t('Component'),
    'current' => $node->project_issue['component'],
  );
  $current_data['category'] = array(
    'label' => t('Category'),
    'current' => project_issue_category($node->project_issue['category'], 0,
      $node->project_issue['pid']),
  );
  $current_data['priority'] = array(
    'label' => t('Priority'),
    'current' => project_issue_priority($node->project_issue['priority']),
  );
  $current_data['assigned'] = array(
    'label' => t('Assigned'),
    'current' => $assigned,
  );
  $current_data['sid'] = array(
    'label' => t('Status'),
    'current' => project_issue_state($node->project_issue['sid']),
  );
  $current_data['nid'] = array(
    'label' => t('Identifier'),
    'current' => $node->project_issue['nid'],
  );
  $vars['issue_data'] = $current_data;
}

function _joinup_preprocess_blog(&$vars) {
  _joinup_preprocess_news($vars);
}

function _joinup_preprocess_news(&$vars) {
  $node = $vars['node'];

  //prepare taxonomy
  $vocabulary_include = array(
    variable_get("country_vid", NULL),
    variable_get("domains_vid", NULL),
    variable_get("keywords_vid", NULL),
  );
  isa_toolbox_create_taxonomy_list($node, $vocabulary_include, TRUE);
  //sort taxonomy
  foreach ($vocabulary_include as $key => $value) {
    $vocab = taxonomy_vocabulary_load($value);
    if (isset($node->taxonomy_terms[$vocab->name])) {
      $vars['taxonomy_terms'][$vocab->name] = $node->taxonomy_terms[$vocab->name];
    }
  }

  // prepare author name
  $vars['author'] = theme('username', $node);

  //prepare date created
  $vars['created_view'] = date('d/m/Y - G:i', $node->created);
}

/**
 * Override or insert variables into the "node-factsheet.tpl.php" templates.
 *
 * @param array $vars
 *   An array of variables to pass to the theme template.
 *
 * @see _joinup_preprocess_node
 */
function _joinup_preprocess_factsheet(&$vars) {
  $node = $vars['node'];
  //prepare taxonomy
  $vocabulary_include = array(
    variable_get("domains_vid", NULL),
    variable_get("keywords_vid", NULL),
    variable_get("factsheet_topic_vid", NULL),
    variable_get("country_vid", NULL),
  );
  isa_toolbox_create_taxonomy_list($node, $vocabulary_include);
  // sort the taxonomy terms
  foreach ($vocabulary_include as $key => $value) {
    $vocab = taxonomy_vocabulary_load($value);
    if (isset($node->taxonomy_terms[$vocab->name])) {
      $vars['taxonomy_terms'][$vocab->name] = $node->taxonomy_terms[$vocab->name];
    }
  }
  //prepare link
//  $vars['statistics_counter'] = $node->links['statistics_counter']['title'];
//  unset($node->links['statistics_counter']);
//  $vars['links'] = theme_links($node->links);
}

/**
 * Override or insert variables into the "node-event.tpl.php" templates.
 *
 * @param array $vars
 *   An array of variables to pass to the theme template.
 *
 * @see _joinup_preprocess_event
 */
function _joinup_preprocess_event(&$vars) {
  $node = $vars['node'];

  //prepare link
  $vars['links'] = theme_links($node->links);
  // Document categories
  $vocabulary_include = array(
    variable_get("country_vid", NULL),
    variable_get("keywords_vid", NULL),
    variable_get("domains_vid", NULL),
    variable_get("scope_vid", NULL),
    variable_get("free_event_vid", NULL),
    variable_get("open_event_vid", NULL),
    variable_get("organisation_type_vid", NULL)
  );

  isa_toolbox_create_taxonomy_list($node, $vocabulary_include, TRUE);
  $vars['taxonomy_terms_links'] = array();
  // sort the taxonomy terms
  foreach ($vocabulary_include as $key => $value) {
    $vocab = taxonomy_vocabulary_load($value);
    if (isset($node->taxonomy_terms[$vocab->name])) {
      $vars['taxonomy_terms'][$vocab->name] = $node->taxonomy_terms[$vocab->name];
    }
  }
  $display_website = ($node->field_event_website['0']['title'] != "" && $node->field_event_website['0']['url'] != "");

  // event Information
  $vars['event_info'] = array(
    'Start date' => isa_toolbox_get_timezone_date($node->field_event_dates['0']['value'],
      $node->field_event_dates['0']['timezone']),
    'End date' => isa_toolbox_get_timezone_date($node->field_event_dates['0']['value2'],
      $node->field_event_dates['0']['timezone']),
    'City' => $node->field_event_city['0']['value'],
    'GMap location' => $node->field_event_gmap_location['0']['value'],
    'Organiser' => $node->field_event_organiser['0']['value'],
    //https://webgate.ec.europa.eu/CITnet/jira/browse/ISAICP-747
    //Add query to params
    'Website' => $display_website ? l($node->field_event_website['0']['title'],
        $node->field_event_website['0']['url'], array('query' =>  $node->field_event_website['0']['query'])) : "",
    'Contact email' => isa_toolbox_protect_email($node->field_event_contact_email['0']['value']),
  );
  // Case long text information
  $vars['event_long_text_info'] = array(
    'Venue' => array('class' => 'policy', 'text' => $node->field_event_venue['0']['value']),
    'Address/Location' => array('class' => 'policy', 'text' => $node->field_event_address_location['0']['value']),
    'Agenda' => array('class' => 'policy', 'text' => $node->field_event_agenda['0']['value']),
    'Expected participants' => array('class' => 'policy', 'text' => $node->field_event_exp_participants['0']['value']),
    'Fees description' => array('class' => 'policy', 'text' => $node->field_event_fees_description['0']['value']),
  );
}

function _joinup_preprocess_newsletter(&$vars) {
  $node = $vars['node'];
  $vocabulary_include = array(
    variable_get("newsletter_vid", NULL),
    variable_get("domains_vid", NULL),
  );
  isa_toolbox_create_taxonomy_list($node, $vocabulary_include);
  // Sort the taxonomy terms
  foreach ($vocabulary_include as $key => $value) {
    $vocab = taxonomy_vocabulary_load($value);
    if (isset($node->taxonomy_terms[$vocab->name])) {
      $vars['taxonomy_terms'][$vocab->name] = $node->taxonomy_terms[$vocab->name];
    }
  }
}

/**
 * Override or insert variables into the "node-video.tpl.php" templates.
 *
 * @param array $vars
 *   An array of variables to pass to the theme template.
 *
 * @see _joinup_preprocess_video
 */
function _joinup_preprocess_video(&$vars) {
  $node = $vars['node'];
  $vars['group_description'] = $node->content['body']['#value'];
  //prepare link
  $vars['links'] = theme_links($node->links);
  // Video categories
  $vocabulary_include = array(
    variable_get("domains_vid", NULL),
    variable_get("keywords_vid", NULL)
  );
  isa_toolbox_create_taxonomy_list($node, $vocabulary_include, TRUE);
  // Sort the taxonomy terms
  foreach ($vocabulary_include as $key => $value) {
    $vocab = taxonomy_vocabulary_load($value);
    if (isset($node->taxonomy_terms[$vocab->name])) {
      $vars['taxonomy_terms'][$vocab->name] = $node->taxonomy_terms[$vocab->name];
    }
  }
  // Video Information
  $vars['video'] = $node->field_video_link_to_video[0]['view'];
}

function _joinup_preprocess_wiki(&$vars) {
  $node = $vars['node'];
  $path_alias = explode('/', $vars['node']->path);
  if ($path_alias[1] == 'license-wizard')
    unset($vars['node']->content['fivestar_widget']);
  $vars['description'] = $vars['node']->content['body']['#value'];

  //prepare taxonomy
  $vocabulary_include = array(
    variable_get("country_vid", NULL),
    variable_get("domains_vid", NULL),
    variable_get("keywords_vid", NULL),
  );
  isa_toolbox_create_taxonomy_list($node, $vocabulary_include, TRUE);
  foreach ($vocabulary_include as $key => $value) {
    $vocab = taxonomy_vocabulary_load($value);
    if (isset($node->taxonomy_terms[$vocab->name])) {
      $vars['taxonomy_terms'][$vocab->name] = $node->taxonomy_terms[$vocab->name];
    }
  }
}

function _joinup_preprocess_project_release(&$vars) {
  $node = $vars['node'];
  //prepare taxonomy
  $vocabulary_include = array(
    variable_get("package_vid", 66),
  );
  isa_toolbox_create_taxonomy_list($node, $vocabulary_include, FALSE);
  foreach ($vocabulary_include as $key => $value) {
    $vocab = taxonomy_vocabulary_load($value);
    if (isset($node->taxonomy_terms[$vocab->name])) {
      $vars['taxonomy_terms'][$vocab->name] = $node->taxonomy_terms[$vocab->name];
    }
  }
}

/**
 * Override or insert variables into the "node-repository.tpl.php" templates.
 *
 * @param array $vars
 *   An array of variables to pass to the theme template.
 *
 * @see _joinup_preprocess_node
 */
function _joinup_preprocess_repository(&$vars) {
  global $user;
  $node = $vars['node'];

  $vars['submitted'] = theme('node_submitted', $node);

  //Prepare the logo
  if (isset($node->field_repository_logo['0'])) {
    $path = $node->field_repository_logo['0']['filepath'];
  } else {
    $picture = isa_toolbox_default_imagefield('field_repository_logo', ISA_REPOSITORY_TYPE);
    $path = $picture['filepath'];
  }
  $vars['picture'] = theme_imagecache('community_logo', $path, $node->title);

  $exclude = array(
    "field_repository_description",
    "field_repository_logo",
    "field_repository_name");
  //Don't display the fields related to harvest mode, if the mode is manual.
  if (!$vars['field_repository_harvestmethod'][0]['value']) {
    $exclude[] = 'field_repository_harvestfreq';
    $exclude[] = 'field_repository_harvesturl';
  }

  $language_textfields = array(array('description', 'field_repository_description', 'body'),
    array('field_name', 'field_repository_name', 'title'));
  _joinup_prepare_template($language_textfields, $vars, $exclude);

  //Prepare the report link
  $report_path = file_directory_path() . "/import_metadata/report_{$node->nid}.log";
  if (file_exists($report_path) && (user_access('administer nodes') || $node->uid == $user->uid)) {
    $vars['report_file']['label'] = 'Report file';
    $vars['report_file']['value'] = l('Report file', $report_path,
      array(
      'query' => array(
        'time' => time(),
      )));
    array_unshift($vars['fields'], 'report_file');
  }

  //Prepare taxonomies
  $include = array(
    variable_get("geographic_coverage_vid", NULL), // country_vid
    variable_get("domains_vid", NULL),
  );
  isa_toolbox_create_taxonomy_list($node, $include, FALSE, TRUE);
  foreach ($node->taxonomy_terms as $vocab => $terms) {
    $voc = str_replace(' ', '', strtolower($vocab));
    $vars['taxonomy_terms_' . $voc]['label'] = $vocab;
    $vars['taxonomy_terms_' . $voc]['value'] = $terms;
    $vars['fields'][] = 'taxonomy_terms_' . $voc;
  }
  // https://webgate.ec.europa.eu/CITnet/jira/browse/ISAICP-744
  // insert a new field with the date of creation, before field_asset_last_modification, so that they will appear in that order in the page
  _joinup_add_field_date_created($vars);
}

function _joinup_prepare_template($language_textfields, &$vars, $exclude) {
  $node = $vars['node'];
  $node_origin = node_load($node->nid);
  // Prepare the multilingualism usage
  $lang_req = isa_toolbox_get_lang_in_url();

  // Prepare the textfields with language
  foreach ($language_textfields as $language_textfield) {
    $label = $language_textfield[0];
    $field_origin = $language_textfield[2];
    foreach ($node->{$language_textfield[1]} as $item) {
      $lang = $item['value']['field_language_textfield_lang'][0]['value'];
      if ($lang == $lang_req) {
        $vars[$label] = $item['value']["field_{$item['type']}_name"][0]['value'];
      }
    }
    if ($lang_req == 'en' || empty($vars[$label])) {
      $vars[$label] = $node_origin->{$field_origin};
    }
    if ($field_origin == 'title') {
      drupal_set_title($vars[$label]);
      $vars['title'] = $vars[$label];
    }
  }

  // Add CTools' javascript to the page.
  ctools_include('ajax');
  ctools_include('modal');
  ctools_modal_add_js();

  $fields = array_keys(get_object_vars($node));
  //Avoid php error in watchdog: Warning: Missing argument 2 for {closure}() in {closure}()
  $filter = function( $fieldname, $exclude ) use ($exclude) {
      return preg_match('#^field_.*$#', $fieldname) && !in_array($fieldname, $exclude);
    };  
  $vars['fields'] = array_filter($fields, $filter);
  //Get only the fields which are name field_...
  foreach ($vars['fields'] as $field) {
    $label = content_fields($field);
    $vars[$field]['label'] = $label['widget']['label'];
    if (((!isset($node->{$field}[0]['safe']) || count($node->{$field}[0]['safe']) == 0 )
      && (!isset($node->{$field}[0]['value']))) && (!isset($node->{$field}[0]['fid'])) && (!isset($node->{$field}[0]['view']))) {
	  //https://webgate.ec.europa.eu/CITnet/jira/browse/ISAICP-793
	  //Remove 'To be completed' by an empty string when a fields is missing
      $vars[$field]['value'] = '';
      continue;
    }

    // Prepare the multilingualism usage
    $ids = $links = array();
    $expandable = false;
    foreach ($node->$field as $item) {
      //Get the value corresponding to language
      if ($item['type'] == 'language_textfield') {
        $lang = $item['value']['field_language_textfield_lang'][0]['value'];
        if ($lang == $lang_req) {
          $links[] = $item['value']["field_{$item['type']}_name"][0]['value'];
        }
      } else {
        if (isset($item['value']) || isset($item['url']) || isset($item['fid'])) {
          if ($field != 'field_id_uri') {
            $links[] = $item['view'];
          } else {
            $links[] = l($item['view'], $item['view']);
          }
        } elseif (isset($item['safe']['nid'])) {
          $ids[] = $item['safe']['nid'];
          $links[] = l($item['safe']['title'], "node/{$item['safe']['nid']}");
          $expandable = true;
        }
      }
    }
    //flexifield without value for the selected language
    if (count($links) == 0) {
	  //https://webgate.ec.europa.eu/CITnet/jira/browse/ISAICP-793
	  //Remove 'To be completed' by an empty string when a fields is missing
      $vars[$field]['value'] = '';
      continue;
    }

    $ids = implode(',', $ids);
    $links = implode(', ', $links);
    $vars[$field]['value'] = $links;
    if ($expandable) {
      $vars[$field]['value'] .= "<div id='{$field}_button' style='display:inline;'>" .
        ctools_ajax_image_button(
          isa_ajax_get_image('collapsed'),
          "isa_ajax/nojs/teaser_expand/{$field}/{$ids}/lang={$lang_req}", t('expand')) .
        '</div>';
    }
  }
}