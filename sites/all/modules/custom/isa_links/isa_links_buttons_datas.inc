<?php

/**
 * @file
 * Defect in this file :
 *
 * -----------------------------------------
 * Button 'subscribe-rss' use different access callback
 *      - 'isa_links_not_add_or_edit_or_workflow_page'
 *      - 'isa_links_is_list'
 *      - 'isa_links_project_is_list_page'
 *      - 'NULL'
 * It's not coherent
 * -----------------------------------------
 *
 * @ingroup isa_links
 *
 *
 */

/**
 * List of all buttons depending on the path
 * The 'propose_your' button must be beforethe 'action' buttons
 * Button parameters :
  'title'       => Title displayed
  'href'        => Link to the new page/popup
  'class'       => CSS class
  'permission'  => button is displayed if the user has this permission
  'access_callback'    => function (defined in this file) which return TRUE if the button must be displayed
  'url_callback'       => return the replacement string for the href
 * If you need a share this button, use : 'share-this' => TRUE,
 * If you need a rating vote, use : 'rate' => array('label' => 'Rate this * item:', 'node' => $node),
 */
function isa_links_buttons_datas() {
  $datas = array(
      'people/*'                  => 'isa_links_get_my_page_buttons()',
      'user/*'                    => 'isa_links_get_my_page_buttons()',
      'people/*/blog'             => 'isa_links_get_my_page_buttons()',
      'homepage'                  => 'isa_links_get_front_page_buttons()',
      'vf-homepage'               => 'isa_links_get_front_page_buttons()',
      'page/*'                    => 'isa_links_get_front_page_buttons()',
      'community/all'             => 'isa_links_get_communities_list_buttons()',
      'community/all/*'           => 'isa_links_get_communities_list_buttons()',
      'community/recommended'     => 'isa_links_get_communities_list_buttons()',
      'community/recommended/*'   => 'isa_links_get_communities_list_buttons()',
      'community/mine'            => 'isa_links_get_communities_list_buttons()',
      'community/mine/*'          => 'isa_links_get_communities_list_buttons()',
      'community/editor'          => 'isa_links_get_communities_list_buttons()',
      'community/editor/*'        => 'isa_links_get_communities_list_buttons()',
      'community/*/members'       => 'isa_links_get_members_pages_buttons("community")',
      'community/*/members/*'     => 'isa_links_get_members_pages_buttons("community")',
      'community/*/news/all'      => 'isa_links_get_communities_list_buttons()',
      'community/*/news/*'        => 'isa_links_get_node_display_buttons("news")',
      'community/*/wiki/*'        => 'isa_links_get_node_display_buttons("wiki")',
      'community/*/document/*'    => 'isa_links_get_node_display_buttons("document")',
      'community/*/topic/*'       => 'isa_links_get_node_display_buttons("topic")',
      'community/*/event/all'     => 'isa_links_get_community_buttons()',
      'community/*/event/*'       => 'isa_links_get_node_display_buttons("event")',
      'community/*/*'             => 'isa_links_get_community_buttons()',
      'asset/all'                 => 'isa_links_get_assets_list_buttons()',
      'asset/all/*'                => 'isa_links_get_assets_list_buttons()',
      'vf-asset/all'              => 'isa_links_get_assets_list_buttons()',
      'asset/recommended'         => 'isa_links_get_assets_list_buttons()',
      'asset/i_use'               => 'isa_links_get_assets_list_buttons()',
      'asset/call_for_comment'    => 'isa_links_get_assets_list_buttons()',
      'asset/editor'              => 'isa_links_get_assets_list_buttons()',
      'asset/recommended/*'       => 'isa_links_get_assets_list_buttons()',
      'asset/i_use/*'             => 'isa_links_get_assets_list_buttons()',
      'asset/call_for_comment/*'  => 'isa_links_get_assets_list_buttons()',
      'asset/editor/*'            => 'isa_links_get_assets_list_buttons()',
      'asset/page/*'              => 'isa_links_get_assets_static_pages_buttons()',
      'asset/experts'             => 'isa_links_get_assets_static_pages_buttons()',
      'asset/experts/*'           => 'isa_links_get_assets_static_pages_buttons()',
      'asset/*/members'           => 'isa_links_get_members_pages_buttons("project")',
      'asset/*/members/*'         => 'isa_links_get_members_pages_buttons("project")',
      'asset/*/news/all'          => 'isa_links_get_project_buttons()',
      'asset/*/news/*'            => 'isa_links_get_node_display_buttons("news")',
      'asset/*/issue/all'         => 'isa_links_get_project_buttons("issue")',
      'asset/*/issue/*'           => 'isa_links_get_issue_buttons()',
      'asset/*/asset_assistant'   => 'isa_links_get_project_buttons()',      
      'asset/*/asset_release/all' => 'isa_links_get_project_buttons("asset_release")',
      'asset/*/release/*/survey'  => 'isa_links_get_project_buttons()',
      'asset/*/asset_release/*'   => 'isa_links_get_node_display_buttons("asset_release")',
      'asset/*/wiki/*'            => 'isa_links_get_node_display_buttons("wiki")',
      'asset/*/topic/*'           => 'isa_links_get_node_display_buttons("topic")',
      'asset/*/document/*'        => 'isa_links_get_node_display_buttons("document")',
      'asset/*/legaldocument/*'   => 'isa_links_get_node_display_buttons("legaldocument")',
      'asset/*/event/all'         => 'isa_links_get_project_buttons()',
      'asset/*/event/*'           => 'isa_links_get_node_display_buttons("event")',
      'asset/*/*'                 => 'isa_links_get_project_buttons()',
      'software/all'              => 'isa_links_get_software_list_buttons()',
      'vf-software/all'           => 'isa_links_get_software_list_buttons()',
      'software/recommended'      => 'isa_links_get_software_list_buttons()',
      'software/i_use'            => 'isa_links_get_software_list_buttons()',
      'software/editor'           => 'isa_links_get_software_list_buttons()',
      'software/my_oss'           => 'isa_links_get_software_list_buttons()',
      'software/all/*'            => 'isa_links_get_software_list_buttons()',
      'software/recommended/*'    => 'isa_links_get_software_list_buttons()',
      'software/i_use/*'          => 'isa_links_get_software_list_buttons()',
      'software/editor/*'         => 'isa_links_get_software_list_buttons()',
      'software/my_oss/*'         => 'isa_links_get_software_list_buttons()',
      'software/federated_forge'  => 'isa_links_get_software_list_buttons("federated_forge")',
      'software/license-wizard/*' => 'isa_links_get_software_list_buttons()',
      'software/page/*'           => 'isa_links_get_software_static_pages_buttons()',
      'software/guidelines'       => 'isa_links_get_software_static_pages_buttons()',
      'software/studies/*'        => 'isa_links_get_node_display_buttons("case")',
      'software/guidelines/*'     => 'isa_links_get_node_display_buttons("case")',
	  // 'software/guidelines/*'     => 'isa_links_get_software_static_pages_buttons()',
      'software/studies'          => 'isa_links_get_software_static_pages_buttons()',
      // 'software/studies/*'        => 'isa_links_get_software_static_pages_buttons()',
      'software/*/members'        => 'isa_links_get_members_pages_buttons("project")',
      'software/*/members/*'      => 'isa_links_get_members_pages_buttons("project")',
      'software/*/news/all'       => 'isa_links_get_news_item_buttons()',
      'software/*/news/*'         => 'isa_links_get_node_display_buttons("news")',
      'software/*/issue/all'      => 'isa_links_get_project_buttons("issue")',
      'software/*/issue/*'        => 'isa_links_get_issue_buttons()',
      'software/*/release/all'    => 'isa_links_get_project_buttons("release")',
      'software/*/release/*/survey' => 'isa_links_get_project_buttons()',
      'software/*/release/*'      => 'isa_links_get_release_buttons()',
      'software/*/wiki/*'         => 'isa_links_get_node_display_buttons("wiki")',
      'software/*/topic/*'        => 'isa_links_get_node_display_buttons("topic")',
      'software/*/document/*'     => 'isa_links_get_node_display_buttons("document")',
      'software/*/legaldocument/*'=> 'isa_links_get_node_display_buttons("legaldocument")',
      'software/*/event/all'      => 'isa_links_get_project_buttons()',
      'software/*/event/*'        => 'isa_links_get_node_display_buttons("event")',
      'software/*/*'              => 'isa_links_get_project_buttons()',
      'federated_forge/*'         => 'isa_links_get_federated_forges_buttons()',
      'federated_project/*/*'     => 'isa_links_get_federated_projects_buttons()',
      'news/newsletter'           => 'isa_links_get_newsletter_list_button()',
      'newsletter/*'              => 'isa_links_get_node_display_buttons("newsletter")',
      'news/blog'                 => 'isa_links_get_blog_post_list_buttons()',
      'news/all'                  => 'isa_links_get_news_all_list_buttons()',
      'news/news'                 => 'isa_links_get_news_list_buttons()',
      'news/recommended'          => 'isa_links_get_news_list_buttons()',
      'news/editor'               => 'isa_links_get_news_list_buttons()',
      'news/*'                    => 'isa_links_get_node_display_buttons("news")',
      'blog/*'                    => 'isa_links_get_node_display_buttons("blog")',
      'node/*/edit'               => 'isa_links_get_edit_buttons()',
      'node/*/edit/releases'      => 'isa_links_get_edit_buttons ()',
      'node/*/revisions'          => 'isa_links_get_edit_buttons()',
      'node/*/revisions/*'        => 'isa_links_get_edit_buttons()',
      'node/*/workflow'           => 'isa_links_get_edit_buttons()',
      'node/*/translate'          => 'isa_links_get_edit_buttons()',
      'node/add/*'                => 'isa_links_get_add_buttons()',
      'help'                      => 'isa_links_get_front_page_buttons()',
      'help_topics'               => 'isa_links_get_node_display_buttons("contexthelp_faq")',
      'contexthelpfaq/*'          => 'isa_links_get_node_display_buttons("contexthelp_faq")',
      'contexthelp_faq/*'         => 'isa_links_get_node_display_buttons("contexthelp_faq")',
      'contexthelp/*'             => 'isa_links_get_node_display_buttons("contexthelp")',
      'contact'                   => 'isa_links_get_front_page_buttons()',
      'sitemap'                   => 'isa_links_get_front_page_buttons()',
      'glossary'                  => 'isa_links_get_front_page_buttons()',
      'glossary/*'                => 'isa_links_get_front_page_buttons()',
      'partners'                  => 'isa_links_get_front_page_buttons()',
      'metrics'                   => 'isa_links_get_front_page_buttons()',
      'category/glossary/*'       => 'isa_links_get_front_page_buttons()',
      'document/*'                => 'isa_links_get_document_buttons()',
      'event/all'                 => 'isa_links_get_event_list_buttons()',
      'event/archives'            => 'isa_links_get_event_list_buttons()',
      'event/recommended'         => 'isa_links_get_event_list_buttons()',
      'event/editor'              => 'isa_links_get_event_list_buttons()',
      'event/*'                   => 'isa_links_get_node_display_buttons("event")',
      'elibrary/case/*'           => 'isa_links_get_node_display_buttons("case")',
      'elibrary/factsheet/*'      => 'isa_links_get_node_display_buttons("factsheet")',
      'elibrary/video/*'          => 'isa_links_get_node_display_buttons("video")',
      'elibrary/document/*'       => 'isa_links_get_node_display_buttons("document")',
      'elibrary/presentation/*'   => 'isa_links_get_node_display_buttons("presentation")',
      'elibrary/factsheet'        => 'isa_links_get_elibrary_list_buttons("factsheet")',
      'elibrary/*'                => 'isa_links_get_elibrary_list_buttons()',
      'comment/reply/*'           => 'isa_links_get_comment_buttons("add")',
      'comment/edit/*'            => 'isa_links_get_comment_buttons("edit")',
      'advertisement/*'           => 'isa_links_get_front_page_buttons()',
      'catalogue/contact_point/all'=>'isa_links_get_catalogue_list_buttons("contact_point")',
      'catalogue/documentation/all'=>'isa_links_get_catalogue_list_buttons("documentation")',
      'catalogue/item/all'        =>'isa_links_get_catalogue_list_buttons("item")',
      'catalogue/publisher/all'   => 'isa_links_get_catalogue_list_buttons("publisher")',
      'catalogue/licence/all'     => 'isa_links_get_catalogue_list_buttons("licence")',
      'catalogue/*'               => 'isa_links_get_catalogue_list_buttons()',

  );
  //If is a solr simple page use do not use the group function
  
  return $datas;
}

/**
 * Return the array of buttons corresponding of the page node/add/*
 * @return array Corresponding buttons
 */
function isa_links_get_add_buttons() {
  $nid = $_GET['gids'][0];
  $path = explode('/', drupal_get_path_alias($_GET['q']));
  if ($nid && is_numeric($nid)) {
    $node = node_load($nid);
    return _isa_links_get_appropriate_buttons($node, $path[2]);
  } else {
    $type = $_GET['type'];
    if ($type) {
      switch ($type) {
        case ISA_ASSET_TYPE:
          return isa_links_get_assets_list_buttons();
        case ISA_SOFTWARE_TYPE:
        case 'OSS':
          return isa_links_get_software_list_buttons();
      }
    } else {
      $nid = variable_get('current_group', isa_toolbox_get_community_nid());
      $node = node_load($nid);
      switch ($path[2]) {
        case ISA_COMMUNITY_TYPE:
          return isa_links_get_communities_list_buttons();
        default:
          $type = str_replace('-', '_', $path[2]);
          return _isa_links_get_appropriate_buttons($node, $type);
      }
    }
  }
}

/**
 * Return the array of buttons corresponding of the page node/edit/*
 * @return array Corresponding buttons
 */
function isa_links_get_edit_buttons() {
  $node = node_load(arg(1));
  return _isa_links_get_appropriate_buttons($node);
}

/**
 * Return the array of buttons corresponding of the comments page (edit, reply,..)
 * @param string $action The type of comment page : add, edit
 * @return array Corresponding buttons
 */
function isa_links_get_comment_buttons($action) {
  if ($action == 'add') {
    $node = node_load(arg(2));
    return _isa_links_get_appropriate_buttons($node);
  } elseif ($action == 'edit') {
    $comment = _comment_load(arg(2));
    if ($comment) {
      $node = node_load($comment->nid);
      return _isa_links_get_appropriate_buttons($node);
    }
  }
}

/**
 * Return the array of buttons corresponding of a node
 * @param node $node
 * @param string $type The type of the node
 * @return array Corresponding buttons
 */
function _isa_links_get_appropriate_buttons($node, $type = NULL) {
  if (!$type) {
    $type = $node->type;
  }
//  if ($type == 'contexthelp-faq') {
//    $type = 'contexthelp_faq';
//  }
  $type = str_replace('-', '_', $type);

  switch ($type) {
    case ISA_WIKI_TYPE:
      if (isa_toolbox_is_license_wizard_wiki($node)) {
        return isa_links_get_software_list_buttons();
      } else {
        return isa_links_get_node_display_buttons($type, TRUE);
      }
      break;
    case ISA_PRESENTATION_TYPE:
    case ISA_NEWSLETTER_TYPE:
    case ISA_NEWS_TYPE:
    case ISA_EVENT_TYPE:
    case ISA_BLOG_TYPE:
    case ISA_TOPIC_TYPE:
    case ISA_DOCUMENT_TYPE:
    case ISA_CASE_TYPE:
    case ISA_VIDEO_TYPE:
    case ISA_FACTSHEET_TYPE:
    case ISA_LEGALDOCUMENT_TYPE:
    case ISA_LICENCE_TYPE:
    case ISA_DISTRIBUTION_TYPE:
    case ISA_DOCUMENTATION_TYPE:
    case ISA_ITEM_TYPE:
    case ISA_PUBLISHER_TYPE:
    case ISA_CONTACT_POINT_TYPE:
    case 'contexthelp_faq':
    case 'contexthelp':
    case ISA_ASSET_RELEASE_TYPE:
    case ISA_REPOSITORY_TYPE:
      return isa_links_get_node_display_buttons($type, TRUE);
    case ISA_ISSUE_TYPE:
    case 'project-issue':
    case 'issue':
      return isa_links_get_issue_buttons($node);
    case ISA_PROJECT_RELEASE_TYPE:
    case 'project-release':
    case 'release':
      return isa_links_get_release_buttons($node);
    case ISA_FEDERATED_FORGE_TYPE:
    case 'federated-forge':
      return isa_links_get_federated_forges_buttons($node);
    case ISA_FEDERATED_PROJECT_TYPE:
    case 'federated-project':
      return isa_links_get_federated_projects_buttons($node);
    case 'page':
    case 'advertisement':
      return isa_links_get_front_page_buttons();
  }

  if ($node->group_type) {
    switch ($node->group_type) {
      case ISA_COMMUNITY_TYPE:
        return isa_links_get_community_buttons();
      case ISA_ASSET_TYPE:
      case ISA_SOFTWARE_TYPE:
        return isa_links_get_project_buttons();
    }
  }
}

/**
 *
 * @param type $group
 * @return type 
 */
function isa_links_get_issue_buttons($group = NULL) {
  if (!$group) {
    $group = node_load(variable_get('current_group', isa_toolbox_get_community_nid()));
  } else {
    // if the param $group is the project issue
    // the function '_isa_links_get_appropriate_buttons' get the project issue node in $group
    if ($group->type == ISA_ISSUE_TYPE) {
      $node = $group;
      $group = node_load(variable_get('current_group', isa_toolbox_get_community_nid()));
    }
  }
  if (!$node) {
    $node = menu_get_object();
  }
  $group_type = isa_toolbox_get_node_type_name($group);
  return array(
    'push' => array(
      isa_links_get_general_button('submit-issue', NULL, $group, NULL,
        "node/add/project-issue/{$group->project['uri']}", 'Create an Issue', NULL, NULL,
        'Create an Issue in your ' . $group_type),
    ),
    'quick_action' => isa_links_get_propose_your_buttons(),
    'action' => array(
      isa_links_get_general_button('asset-assistant', 'isa_links_asset_assistant_access', $node,
        NULL, "asset/{$node->project['uri']}/asset_assistant", 'Asset Assistant', NULL, NULL,
        'Use the asset assistant to generate issues for you'),
    ),
    'links' => array(
      isa_links_get_general_button('issue-categories', 'isa_project_issues_categories_access', NULL,
        NULL, "{$group->group_type}/{$group->project['uri']}/issue/manage_categories",
        'Manage issue categories', NULL, NULL, 'Manage issue categories of this ' . $group_type),
      isa_links_get_general_button('comment-form', 'isa_links_issue_send_comment_access', $node,
        NULL, $node->path, 'Post a comment', NULL, NULL, 'Comment on this issue'),
      isa_links_get_general_button('subscribe popups-form', 'isa_links_subscribe_access', $node,
        NULL, "node/$node->nid/subscribe", 'Subscribe', NULL, 'subscribe to content',
        'Subscribe to content of this issue'),
    ),
    'bottom_action' => array(
      isa_links_get_general_button('propose-your'),
      isa_links_get_general_button('newsletter-subscription', NULL, NULL, NULL),
      'share-this' => TRUE,
    )
  );
}

/**
 *
 * @global object $user
 * @param type $node
 * @return type 
 */
function isa_links_issue_send_comment_access($node) {
  global $user;
  if ($node && isa_links_not_add_or_edit_or_workflow_page() && $user->uid != 0) {
    return TRUE;
  }
  return FALSE;
}

/**
 *
 * @param type $group
 * @return type 
 */
function isa_links_get_release_buttons($group = NULL) {
  if (!$group || $group->type == ISA_PROJECT_RELEASE_TYPE) {
    $group = node_load(variable_get('current_group', isa_toolbox_get_community_nid()));
  }
  $node = menu_get_object();
  $group_type = isa_toolbox_get_node_type_name($group);

  return array(
    'push' => array(
      isa_links_get_general_button('submit-issue', NULL, $group, NULL,
        "node/add/project-issue/{$group->project['uri']}", 'Create an Issue', NULL, NULL,
        'Create an issue in your ' . $group_type),
      isa_links_get_general_button('create-release', NULL, $group, NULL,
        "node/add/project-release/{$group->nid}", 'Create a Release', NULL, NULL,
        'Create a release in your ' . $group_type),
    ),
    'quick_action' => isa_links_get_propose_your_buttons(),
    'bottom_action' => array(
      isa_links_get_general_button('propose-your'),
      'share-this' => TRUE,
      isa_links_get_general_button('newsletter-subscription', NULL, NULL, NULL),
    ),
    'links' => array(
      isa_links_get_general_button('rate', 'isa_links_rate_access', $node, NULL, NULL,
        'Rate this Release:'),
      isa_links_get_general_button('subscribe popups-form', 'isa_links_subscribe_access', $node,
        NULL, "node/$node->nid/subscribe", 'Subscribe', NULL, 'subscribe to content'),
    ),
  );
}

/**
 *
 * @param <type> $node :current node
 * @return <boolean> TRUE if the subscribe link should be accessible
 */
function isa_links_subscribe_access($node) {
  global $user;

  subscriptions_suspended($user->uid, TRUE);
  if (is_numeric($node)) {
    $node = node_load($node);
  }
  // don't display subscribe link if the node isn't validated
  if (!isa_links_node_is_validated($node)) {
    return FALSE;
  }
  //The user need to be a member of the group to subscribe
  $gid = variable_get('current_group', isa_toolbox_get_community_nid());
  if (isset($gid)) {
    $group = node_load($gid);
    return og_is_group_member($group->nid) && isa_links_node_is_validated($group);
  }

  module_invoke_all('subscriptions', 'node_options', $user, $node);
  // don't display the "Subscribe" link for license wizard wiki pages
  $path_alias = explode('/', $node->path);
  if ($path_alias[1] == 'license-wizard') {
    return FALSE;
  }
  if (subscriptions_content_type_is_blocked($node->type) && !user_access('subscribe to all content types')) {
    return FALSE;
  }
  if (isa_links_not_add_or_edit_or_workflow_page() && $node && $user->uid != 0) {
    return TRUE;
  } else {
    return FALSE;
  }
  return FALSE;
}

//https://webgate.ec.europa.eu/CITnet/jira/browse/ISAICP-841
//Modifications in the text titles
/**
 * List of 'propose your' buttons
 */
function isa_links_get_propose_your_buttons() {
  // anonymous user should have access to buttons for create contents
  $buttons = array(
    array(
      'title' => t('News Item'),
      'href' => 'node/add/news',
      //'permission' => 'create news content',
      'access_callback' => 'isa_links_is_not_in_virtual_forge',
      'tooltips' => 'Propose a news item to be added on Joinup',
    ),
    array(
      'title' => t('Community'),
      'href' => 'node/add/community',
      //'permission' => 'create community content',
      'access_callback' => 'isa_links_is_not_in_virtual_forge',
      'tooltips' => 'Propose a community to be added on Joinup',
    ),
    array(
      'title' => t('Software Project'),
      'href' => 'node/add/project-project',
      //'permission' => 'maintain projects',
      'query' => array('type' => 'OSS'),
      'tooltips' => 'Propose your own software to be added on Joinup',
    ),
    array(
      'title' => t('Semantic Asset Project'),
      'href' => 'node/add/project-project',
      //'permission' => 'maintain projects',
      'query' => array('type' => 'asset'),
      'tooltips' => 'Propose your own semantic asset to be added on Joinup',
    ),
    array(
      'title' => t('Federated Repository'),
      'href' => 'node/add/repository',
      'tooltips' => 'Propose your own Federated semantic repository to be added on Joinup',
    ),
    array(
      'title' => t('Semantic Asset Release'),
      'href' => 'node/add/asset-release',
      'tooltips' => 'Propose your own Asset release to be added on Joinup',
    ),
    array(
      'title' => t('Document'),
      'href' => 'node/add/document',
      //'permission' => 'create document content',
      'access_callback' => 'isa_links_is_not_in_virtual_forge',
      'tooltips' => 'Propose a document to be added on Joinup',
    ),
    array(
      'title' => t('Case'),
      'href' => 'node/add/case',
      //'permission' => 'create case content',
      'access_callback' => 'isa_links_is_not_in_virtual_forge',
      'tooltips' => 'Propose a case to be added on Joinup',
    ),
    array(
      'title' => t('Presentation'),
      'href' => 'node/add/presentation',
      //'permission' => 'create presentation content',
      'access_callback' => 'isa_links_is_not_in_virtual_forge',
      'tooltips' => 'Propose a presentation to be added on Joinup',
    ),
    array(
      'title' => t('Event'),
      'href' => 'node/add/event',
      //'permission' => 'create event content',
      'access_callback' => 'isa_links_is_not_in_virtual_forge',
      'tooltips' => 'Propose a event to be added on Joinup',
    ),
    array(
      'title' => t('Licence'),
      'href' => 'node/add/licence',
      //'permission' => 'create event content',
      'access_callback' => 'isa_links_is_not_in_virtual_forge',
      'tooltips' => 'Propose a licence to be added on Joinup',
    ),
    array(
      'title' => t('Publisher'),
      'href' => 'node/add/publisher',
      //'permission' => 'create event content',
      'access_callback' => 'isa_links_is_not_in_virtual_forge',
      'tooltips' => 'Propose a publisher to be added on Joinup',
    ),
    array(
      'title' => t('Federated Forge'),
      'href' => 'node/add/federated-forge',
      'permission' => 'create federated_forge content',
      'access_callback' => 'isa_links_is_not_in_virtual_forge',
      'tooltips' => 'Create a federated forge to be added on Joinup',
    ),
    //ISAICP-890
    //https://webgate.ec.europa.eu/CITnet/jira/browse/ISAICP-890
    //Commenting the array blog, so it does not appear in the list of 'Propose'

   /* array(
      'title' => t('Blog post'),
      'href' => 'node/add/blog',
      //'permission' => 'create blog content',
      'access_callback' => 'isa_links_is_not_in_virtual_forge',
      'tooltips' => 'Create a blog post to be added on Joinup',
    ),*/
    array(
      'title' => t('Factsheet'),
      'href' => 'node/add/factsheet',
      'permission' => 'create factsheet content',
      'access_callback' => 'isa_links_is_not_in_virtual_forge',
      'tooltips' => 'Create a factsheet to be added on Joinup',
    ),
    array(
      'title' => t('Video'),
      'href' => 'node/add/video',
      'permission' => 'create video content',
      'access_callback' => 'isa_links_is_not_in_virtual_forge',
      'tooltips' => 'Create a video to be added on Joinup',
    ),
    array(
      'title' => t('FAQ content'),
      'href' => 'node/add/contexthelp-faq',
      'permission' => 'create contexthelp_faq content',
      'access_callback' => 'isa_links_is_not_in_virtual_forge',
      'tooltips' => 'Create a faq content to be added on Joinup',
    ),
    array(
      'title' => t('Context Help'),
      'href' => 'node/add/contexthelp',
      'permission' => 'create contexthelp content',
      'access_callback' => 'isa_links_is_not_in_virtual_forge',
      'tooltips' => 'Create a context help to be added on Joinup',
    ),
  );

  return $buttons;
}

/**
 * Reusable buttons
 * @param string $class : class of the button
 * @param string $access_callback : access_callback function, if not present don't set
 * @param string $access_arguments : access_arguments function, if not present don't set
 * @param string $url_callback : url_callback function, if not present don't set
 * @param string $href : url to link to, if not present link to /node
 * @param atring $title : Title of the button
 * @param array  $query : query array, if not present don't set
 * @param string $permission : permission needed to display the button
 */
function isa_links_get_general_button($class, $access_callback = NULL, $access_arguments = NULL,
  $url_callback = NULL, $href = 'node', $title = 'TITLE', $query = NULL, $permission = NULL,
  $tooltips = NULL, $target = NULL) {
  switch ($class) {
    case 'propose-your' :
      $button = array(
        'title' => t('Propose your...'),
        'html' => 'TRUE',
        'class' => 'quick-actions',
        //'access_callback' => 'isa_links_user_is_authenticated',
      );
      break;
    case 'comment-form' :
      $button = array(
        'title' => $title,
        'href' => $href,
        'class' => $class,
        'fragment' => 'comment-form-title',
        'permission' => 'post comments',
      );
      break;
    case 'newsletter-subscription' :
      global $user;
      $href = "people/mypage";
      if (isset($user->uid) && $user->uid != 0) {
        $href = "user/$user->uid/edit/newsletter";
      }
      $button = array(
        'title' => 'Subscribe to Newsletter',
        'href' => $href,
        'class' => 'subscribe-newsletter',
        'query' => $query,
        'tooltips' => 'Subscribe to newsletter of ' . variable_get('site_name', 'Joinup'),
      );
      break;
    case 'rate':
      $button = array(
        'label' => t($title),
        'node' => $access_arguments,
        'permission' => 'rate content',
        'class' => $class,
      );
      break;
    default:
      $button = array(
        'title' => $title,
        'href' => $href,
        'class' => $class,
        'query' => $query,
      );
      break;
  }

  if ($access_callback) {
    $button['access_callback'] = $access_callback;
  }
  if ($access_arguments) {
    $button['access_arguments'] = $access_arguments;
  }
  if ($url_callback) {
    $button['url_callback'] = $url_callback;
  }
  if ($permission) {
    $button['permission'] = $permission;
  }
  if ($tooltips) {
    $button['tooltips'] = $tooltips;
  }
  if ($target) {
    $button['target'] = $target;
  }
  return $button;
}

/**
 *
 * @return type 
 */
function isa_links_people_rss_button_access() {
  if (in_array(arg(2), array('recommended', 'blog'))) {
    return TRUE;
  }
  return FALSE;
}

/**
 *   Control access for create a content of '$node' type
 *
 * @param object $node
 * @return boolean
 * recall :
 *
 * to create content in group check :
 * - group workflow
 * - group field 'field_*_*_creation'
 * - group membership
 *
 * to create content in global Joinup:
 * - authenticated user
 * - moderator for some content, so check permission
 *
 */
function isa_links_create_content_access($node) {
  $gid = variable_get('current_group', isa_toolbox_get_community_nid());
  if (!is_object($node)) {
    $type = $node;
  } else {
    $type = $node->type;
  }
  $type = str_replace('-', '_', $type);
  $perm_access = (user_access("create {$type} content") || user_access('administer nodes'));
  if ($gid) {
    $group = node_load($gid);
    if ($group->type == ISA_REPOSITORY_TYPE) {
      return ($group->_workflow == ISA_SID_REPOSITORY_VALIDATED || $group->_workflow == ISA_SID_REPOSITORY_REJECTED_DELETION || $group->_workflow == ISA_SID_REPOSITORY_POSTPONED_DELETION);
    }
    elseif (workflow_get_workflow_for_type($type) && $group->_workflow != ISA_SID_COMMUNITY_VALIDATED) {
      return FALSE;
    }
    $is_member = og_is_group_member($group->nid, TRUE);

    switch ($type) {
      case ISA_DOCUMENT_TYPE:
        $create_content = (($group->type == ISA_COMMUNITY_TYPE && $group->field_community_documents_creati[0]['value'] == 'Activated') ||
          ($group->type == ISA_PROJECT_TYPE && $group->field_project_documents_creation[0]['value'] == 'Activated'));
        break;
      case ISA_NEWS_TYPE:
        $create_content = (($group->type == ISA_COMMUNITY_TYPE && $group->field_community_news_creation[0]['value'] == 'Activated') ||
          ($group->type == 'project_project' && $group->field_project_news_creation[0]['value'] == 'Activated'));
        break;
      case ISA_WIKI_TYPE:
        $create_content = (($group->type == ISA_COMMUNITY_TYPE && $group->field_community_wiki_creation[0]['value'] == 'Activated') ||
          ($group->type == ISA_PROJECT_TYPE && $group->field_project_wiki_creation[0]['value'] == 'Activated'));

        break;
      case ISA_TOPIC_TYPE:
        $create_content = (($group->type == ISA_COMMUNITY_TYPE && $group->field_community_forum_creation[0]['value'] == 'Activated') ||
          ($group->type == ISA_PROJECT_TYPE && $group->field_project_forum_creation[0]['value'] == 'Activated'));
        break;
      case ISA_LEGALDOCUMENT_TYPE:
        $create_content = ($group->type == ISA_PROJECT_TYPE && $group->field_project_legal_doc_creation[0]['value'] == 1);
        break;
      default:
        $create_content = TRUE;
        break;
    }
    return ($is_member && $perm_access && $create_content);
  } else {
    global $user;
    // displays buttons to create content for anonymous user
    // displays only buttons than authenticated user has access
    $perms = permissions_get_permissions_for_role('authenticated user');
    $anonymous_access = ($user->uid === 0) && in_array("create {$type} content", $perms);
    return $perm_access || $anonymous_access;
  }
}

/**
 * Check if a button "request membership" should be displayed.
 * Check if the user is member and if the group is validated.
 * note: don't use og_is_group_member because return false if user already requested membership.
 * 
 * 
 * @param object Node object
 * @return bolean 
 */
function isa_links_request_access($node) {
  global $user;
  if ($user->uid > 0) {
    if (!isa_links_node_is_validated($node)) {
      return FALSE;
    }
    if ($user->uid == $node->uid) {
      return FALSE;
    }
    global $user;
    //note: don't use og_is_group_member because return false if user already requested membership.

    $groups = og_get_subscriptions($user->uid, 0);

    return !isset($groups[$node->nid]);
  } else {
    //return FALSE;
    return TRUE;
  }
}

/**
 * 
 */
function isa_links_highlight_access($node) {
  global $user;
  $state_validated = array(ISA_SID_NEWS_CREATED, ISA_SID_NEWS_PUBLISHED, ISA_SID_NEWS_REQUEST_PUBLICATION, ISA_SID_COMMUNITY_VALIDATED, ISA_SID_NEWS_VALIDATED, ISA_SID_FEDPROJ_PUBLISHED, ISA_SID_RELEASE_CREATED, ISA_SID_RELEASE_REQUESTED, ISA_SID_RELEASE_APPROVED);
  //if (count($user->og_groups) > 0 && ($node->og_selective == 0 || $node->type == ISA_PROJECT_TYPE)) {
  if (count($user->highlight_groups) > 0) { // Checks to see if user is a member of any group
    if (!$node->_workflow || ($node->_workflow && in_array($node->_workflow, $state_validated))) {
      return TRUE;
    }
  }
  return FALSE;
}

/**
 *
 */
function isa_links_get_uid_from_arg1() {
  $uri = explode('/', drupal_get_normal_path($_GET['q']));
  return ($uri[1]);
}

/**
 */
function isa_links_is_my_profile() {
  global $user;
  $uri = explode('/', drupal_get_normal_path($_GET['q']));
  $uid = $uri[1];
  if ($uri[0] == 'user' || $uri[0] == 'people') {
    if (is_numeric($uid) && $uid == $user->uid) {
      return TRUE;
    }
  }
  return FALSE;
}

/**
 */
function isa_links_is_someone_else_profile() {
  $uri = explode('/', drupal_get_normal_path($_GET['q']));
  $nid = $uri[1];
  if (!is_numeric($nid)) {
    return FALSE;
  }
  global $user;
  if ($user->uid == 0) {
    return FALSE;
  }
  return ($nid != $user->uid);
}

/**
 */
function isa_links_user_allows_contact() {
  $uri = explode('/', drupal_get_normal_path($_GET['q']));
  $nid = $uri[1];
  $user = user_load($nid);
  return _contact_user_tab_access($user);
}

/**
 */
function isa_links_people_send_message_button_access() {
  return isa_links_is_someone_else_profile()
    && isa_links_user_allows_contact();
}

/**
 */
function isa_links_get_my_page_buttons($type = NULL) {
  $links = array();
  global $user;
  $path = explode('/', drupal_get_path_alias($_GET['q']));

  $buttons = array(
    'push' => array(
      isa_links_get_general_button('invite-people popups',
        '! isa_links_people_send_message_button_access', NULL, NULL, 'invite', 'Invite People',
        NULL, NULL, 'Invite People on Joinup'),
      isa_links_get_general_button('send-message', 'isa_links_people_send_message_button_access',
        NULL, 'isa_links_get_uid_from_arg1', 'people/%d/contact',
        'Send a personal message to this user'),
    ),
    'quick_action' => isa_links_get_propose_your_buttons(),
    'bottom_action' => array(
      isa_links_get_general_button('propose-your'),
      isa_links_get_general_button('newsletter-subscription', NULL, NULL, NULL),
    ),
    'links' => $links,
  );
  return $buttons;
}

/**
 */
function isa_links_get_front_page_buttons() {
  return array(
    'quick_action' => isa_links_get_propose_your_buttons(),
    'action' => array(
      isa_links_get_general_button('our-services', NULL, NULL, NULL, 'page/our_services',
        'Our services', NULL, NULL, 'Learn more about the services offered by the Joinup platform'),
    ),
  'bottom_action' => array(
      isa_links_get_general_button('propose-your'),
      'share-this' => TRUE,
      isa_links_get_general_button('newsletter-subscription', NULL, NULL, NULL),
    ),
  );
}

/**
 */
function isa_links_get_communities_list_buttons() {
  return array(
    'push' => array(isa_links_get_general_button('propose-community', NULL, NULL, NULL,
        'node/add/community', 'Propose a Community', NULL, NULL,
        'Propose a community to be added on Joinup')),
    'quick_action' => isa_links_get_propose_your_buttons(),
    'action' => array(
      isa_links_get_general_button('subscribe-rss', NULL, NULL, NULL, $_GET['q'] . '/feed',
        'Subscribe to RSS', NULL, NULL, 'Subscribe to the RSS of this page', '_blank'),
    ),
    'bottom_action' =>  array(
      isa_links_get_general_button('propose-your'),
      'share-this' => TRUE,
      isa_links_get_general_button('newsletter-subscription', NULL, NULL, NULL),
    ),
  );
}

/**
 */
function isa_links_get_community_buttons() {
  $nid = variable_get('current_group', isa_toolbox_get_community_nid());
  $node = node_load($nid);
  $path = explode('/', $node->path);
  global $user;
  $editors_choice_flag_properties = _isa_links_get_link_properties($node->nid, 'editor_choice');
  if ($user->uid == 0) {
    $href = "user/login";
    $query['destination'] = "og/subscribe/$nid";
  } else {
    $href = "og/subscribe/$nid";
  }
  if ($node->og_subscription == 0) {
    $push = array(
      isa_links_get_general_button('join-community popups-form-reload', 'isa_links_request_access',
        $node, NULL, $href, 'Join this community', $query, NULL, 'Become a member of this community'),
    );
  } else {
    $push = array(
      isa_links_get_general_button('request-community-membership popups-form-reload',
        'isa_links_request_access', $node, NULL, 'og/subscribe/' . $nid, 'Request to be a member', NULL,
        NULL, 'Request to be a member of this community'),
    );
  }

  return array(
    'push' => $push,
    'quick_action' => isa_links_get_propose_your_buttons(),
    'action' => array(
      isa_links_get_general_button('leave-community popups-form-reload', 'isa_links_leave_group',
        $node, NULL, "og/unsubscribe/{$nid}/{$user->uid}", 'Leave community', NULL, NULL,
        'I no longer want to be a member of this community'),
    ),
    'bottom_action' => array(
      isa_links_get_general_button('propose-your'),
      'share-this' => TRUE,
      isa_links_get_general_button('newsletter-subscription', NULL, NULL, NULL),
      isa_links_get_general_button('subscribe-rss', 'isa_links_is_list', NULL, NULL,
        $_GET['q'] . '/feed', 'Subscribe to RSS', NULL, NULL, 'Subscribe to the RSS of this page', '_blank'),
    ),
    'links' => array(
      isa_links_get_general_button('create-news', 'isa_links_create_content_access', 'news', NULL,
        'node/add/news', 'Create a News Item', array('gids[]' => $nid), NULL,
        'Create a news item in your community'),
      isa_links_get_general_button('create-forum', 'isa_links_create_content_access', 'topic', NULL,
        'node/add/topic', 'Create a Forum Topic', array('gids[]' => $nid), NULL,
        'Create a forum topic in your community'),
      isa_links_get_general_button('create-wiki', 'isa_links_create_content_access', 'wiki', NULL,
        'node/add/wiki', 'Create a Wiki', array('gids[]' => $nid), NULL,
        'Create a wiki in your community'),
      isa_links_get_general_button('create-document', 'isa_links_create_content_access', 'document',
        NULL, 'node/add/document', 'Create a Document', array('gids[]' => $nid), NULL,
        'Create a document in your community'),
      isa_links_get_general_button('create-event', 'isa_links_create_content_access', 'event', NULL,
        'node/add/event', 'Create an Event', array('gids[]' => $nid), NULL,
        'Create an event in your community'),
      isa_links_get_general_button('add-editors-choice', 'isa_links_node_is_validated', $node, NULL,
        $editors_choice_flag_properties['href'], $editors_choice_flag_properties['title'],
        array('destination' => $editors_choice_flag_properties['destination'], 'token' => $editors_choice_flag_properties['token']),
        'Display button add editor choice', $editors_choice_flag_properties['tooltip']),
      isa_links_get_general_button('highlight popups-form', 'isa_links_highlight_access', $node,
        NULL, "hl/{$nid}/edit", 'Highlight this Community', NULL, 'admin highlight',
        'Highlight this community in your communities and projects'),
      isa_ml_subscription_link($node, $user->uid, FALSE),
      isa_links_get_general_button('add-ml', 'isa_ml_access_add_ml', NULL, NULL,
        "community/{$path[1]}/add_ml", 'Add a Mailing List', NULL, NULL,
        'Add a mailing list in your community'),
      isa_links_get_general_button('subscribe popups-form', 'isa_links_subscribe_access', $node,
        NULL, "node/{$nid}/subscribe", 'Subscribe', NULL, 'subscribe to content',
        'Subscribe to content of this community'),
    )
  );
}

/**
 */
function isa_links_get_assets_static_pages_buttons() {
  return array(
    'push' => array(isa_links_get_general_button('propose-asset', NULL, NULL, NULL,
        'node/add/project-project', 'Request to create your Semantic Asset',
        array('type' => 'asset'), NULL, 'Propose your own semantic asset to be added on Joinup')),
    'quick_action' => isa_links_get_propose_your_buttons(),
    'bottom_action' => array(
      isa_links_get_general_button('propose-your'),
      'share-this' => TRUE,
      isa_links_get_general_button('newsletter-subscription', NULL, NULL, NULL),
    )
  );
}

/**
 */
function isa_links_get_assets_list_buttons() {
  return array(
    'push' => array(isa_links_get_general_button('propose-asset', NULL, NULL, NULL,
        'node/add/project-project', 'Propose Semantic Asset',
        array('type' => 'asset'), NULL, 'Propose your own semantic asset to be added on Joinup')),
    'quick_action' => isa_links_get_propose_your_buttons(),
    'bottom_action' => array(
      isa_links_get_general_button('propose-your'),
      'share-this' => TRUE,
      isa_links_get_general_button('newsletter-subscription', NULL, NULL, NULL),
      isa_links_get_general_button('subscribe-rss', 'isa_links_not_add_or_edit_or_workflow_page',
        NULL, NULL, $_GET['q'] . '/feed', 'Subscribe to RSS', NULL, NULL,
        'Subscribe to the RSS of this page', '_blank'),
    )
  );
}

/**
 */
function isa_links_not_add_or_edit_or_workflow_page() {
  if (preg_match('/node\/.*\/edit/', $_GET['q']) ||
    preg_match('/node\/add\/.*/', $_GET['q']) ||
    preg_match('/node\/.*\/workflow/', $_GET['q']) ||
    preg_match('/software\/license-wizard\/.*/', drupal_get_path_alias($_GET['q']))) {
    return FALSE;
  }
  return TRUE;
}

/**
 */
function isa_links_get_software_list_buttons($type = NULL) {
  $buttons = array(
    'quick_action' => isa_links_get_propose_your_buttons(),
    'action' => array(
      isa_links_get_general_button('legal-question', NULL, NULL, NULL, 'contact',
        'Ask a legal question', NULL, NULL,
        'Ask a question about licence issues to the Joinup legal expert'),
    ),
    'bottom_action' => array(
      isa_links_get_general_button('propose-your'),
      'share-this' => TRUE,
      isa_links_get_general_button('newsletter-subscription', NULL, NULL, NULL),
      isa_links_get_general_button('subscribe-rss', 'isa_links_not_add_or_edit_or_workflow_page',
        NULL, NULL, $_GET['q'] . '/feed', 'Subscribe to RSS', NULL, NULL,
        'Subscribe to the RSS of this page', '_blank'),
    ),
  );
  //'Create federated forge button' check permissions.
  /*if ($type == 'federated_forge') {
    $buttons ['push'][] = isa_links_get_general_button('create-federated-forge',
      'isa_links_create_federated_forge', NULL, NULL, 'node/add/federated-forge',
      'Create a Federated Forge', NULL,'create federated_forge content' ,'Create a federated forge to be added on Joinup');
  }*/
  $buttons ['push'][] = isa_links_get_general_button('propose-oss', NULL, NULL, NULL,
    'node/add/project-project', 'Propose your project', array('type' => 'OSS'), NULL,
    'Propose your own software to be added on Joinup');
  return $buttons;
}

/**
 */
function isa_links_get_project_buttons($context_path = NULL) {
  global $user;
  $nid = variable_get('current_group', isa_toolbox_get_community_nid());
  $node = isa_toolbox_get_original_node(node_load($nid));
  $path = explode('/', drupal_get_normal_path($_GET['q']));
  $group_type = isa_toolbox_get_node_type_name($node);
  $release_id = isa_toolbox_get_last_release($node->nid);
  $release = NULL;
  if ($release_id) {
    $release = node_load($release_id);
    $download_link = $release->path;
  } else {
    if ($node->group_type == ISA_ASSET_TYPE) {
      $download_link = ($node->group_type . '/' . $node->project['uri'] . '/asset_release/all');
    } else {
      $download_link = ($node->group_type . '/' . $node->project['uri'] . '/release/all');
    }
  }
  $uri = $path[1];

  $i_use_flag_properties = _isa_links_get_link_properties($node->nid, 'i_use_this_project',
    $node->group_type);

  $call_for_comment_properties = _isa_links_get_link_properties($node->nid, 'call_for_review');
  $editors_choice_flag_properties = _isa_links_get_link_properties($node->nid, 'editor_choice');

  if ($user->uid == 0) {
    $href = "user/login";
    $query['destination'] = "og/subscribe/{$node->nid}";
  } else {
    $href = "og/subscribe/{$node->nid}";
  }	
  //https://webgate.ec.europa.eu/CITnet/jira/browse/ISAICP-853
  //Set software group status if requires facilitator approve
  1 == $node->og_selective ?  $node->group_status = t("Membership of this $group_type must be approved by a facilitator") : $node->group_status = '';
  $buttons = array(
    'push' => array(
	 isa_links_get_general_button('asset-assistant', 'isa_links_asset_assistant_access', $node,
        NULL, "asset/{$node->project['uri']}/asset_assistant", 'Asset Assistant', NULL, NULL,
        'Use the asset assistant to generate issues for you'),
      isa_links_get_general_button('request-' . $node->group_type . '-membership popups-form-reload',
        'isa_links_request_access', $node, NULL, $href, 'Request to be a member of this ' . $group_type,
        $query),
	
    ),
    'quick_action' => isa_links_get_propose_your_buttons(),
    'action' => array(
      isa_links_get_general_button(($i_use_flag_properties['unflag'] ? 'no-' : '') . 'i-use-' . $node->group_type,
        'isa_links_project_use_access', $node, NULL, $i_use_flag_properties['href'],
        $i_use_flag_properties['title'],
        array('destination' => $i_use_flag_properties['destination'], 'token' => $i_use_flag_properties['token']),
        NULL, $i_use_flag_properties['tooltip']),
      isa_links_get_general_button('group-status','isa_links_request_access', $node, NULL, NULL, $node->group_status,''),
	   isa_links_get_general_button('leave-' . $node->group_type . ' popups-form-reload',
        'isa_links_leave_group', $node, NULL, "og/unsubscribe/{$node->nid}/{$user->uid}",
        'Leave this project', NULL, NULL, 'I no longer want to be a member of this ' . $group_type),
     
    ),
	
    'bottom_action' => array(
      isa_links_get_general_button('propose-your'),
      'share-this' => TRUE,
      isa_links_get_general_button('newsletter-subscription', NULL, NULL, NULL),
      isa_links_get_general_button('subscribe-rss', 'isa_links_project_is_list_page', NULL, NULL,
        $_GET['q'] . '/feed', 'Subscribe to RSS', NULL, NULL, 'Subscribe to the RSS of this page', '_blank'),
    ),
    'links' => array(
      isa_links_get_general_button('create-news', 'isa_links_create_content_access', 'news', NULL,
        'node/add/news', 'Create a News Item', array('gids[]' => $node->nid), NULL,
        'Create a news item in your ' . $group_type),
      isa_links_get_general_button('create-forum', 'isa_links_create_content_access', 'topic', NULL,
        'node/add/topic', 'Create a Forum Topic', array('gids[]' => $node->nid), NULL,
        'Create a forum topic in your ' . $group_type),
      isa_links_get_general_button('create-wiki', 'isa_links_create_content_access', 'wiki', NULL,
        'node/add/wiki', 'Create a Wiki', array('gids[]' => $node->nid), NULL,
        'Create a wiki in your ' . $group_type),
      isa_links_get_general_button('create-document', 'isa_links_create_content_access', 'document',
        NULL, 'node/add/document', 'Create a Document', array('gids[]' => $node->nid), NULL,
        'Create a document in your ' . $group_type),
      isa_links_get_general_button('add-editors-choice', 'isa_links_node_is_validated', $node, NULL,
        $editors_choice_flag_properties['href'], $editors_choice_flag_properties['title'],
        array('destination' => $editors_choice_flag_properties['destination'], 'token' => $editors_choice_flag_properties['token']),
        'Display button add editor choice', $editors_choice_flag_properties['tooltip']),
      isa_links_get_general_button('create-event', 'isa_links_create_content_access', 'event', NULL,
        'node/add/event', 'Create an Event', array('gids[]' => $node->nid), NULL,
        'Create an event in your ' . $group_type),
      isa_links_get_general_button('create-legal-document', 'isa_links_create_content_access',
        ISA_LEGALDOCUMENT_TYPE, NULL, 'node/add/legaldocument', 'Create a Legal Document',
        array('gids[]' => $node->nid), NULL, 'Create a legal document in your ' . $group_type),
      isa_links_get_general_button('call-for_comment', 'isa_links_call_for_comment_access', $node,
        NULL, $call_for_comment_properties['href'], $call_for_comment_properties['title'],
        array('destination' => $call_for_comment_properties['destination'], 'token' => $call_for_comment_properties['token']),
        NULL, $call_for_comment_properties['tooltip']),
      isa_links_get_general_button('highlight popups-form', 'isa_links_highlight_access', $node,
        NULL, "hl/{$node->nid}/edit",
        ($node->group_type == 'asset' ? 'Highlight this Semantic Asset' : 'Highlight this Software'),
        NULL, 'admin highlight', 'Highlight this ' . $group_type . ' in your communities and projects'),
      isa_ml_subscription_link($node, $user->uid, TRUE),
      isa_links_get_general_button('add-ml', 'isa_ml_access_add_ml', NULL, NULL,
        "{$node->group_type}/{$path[1]}/add_ml", 'Add a Mailing List', NULL, NULL,
        'Add a mailing list in your ' . $group_type),
      isa_links_get_general_button('subscribe popups-form', 'isa_links_subscribe_access', $node,
        NULL, "node/{$node->nid}/subscribe", 'Subscribe', NULL, 'subscribe to content',
        'Subscribe to content of this ' . $group_type),
    ),
  );
  if ($context_path == "issue") {
    array_unshift($buttons['push'],isa_links_get_general_button('submit-issue', NULL, $node, NULL,
      "node/add/project-issue/{$uri}", 'Create an Issue', NULL, NULL,
      'Create an issue in your ' . $group_type));
  }
  if ($context_path == "release") {
   array_unshift($buttons['push'],isa_links_get_general_button('create-release-package popups-form-reload',
      NULL, $node, NULL, "admin/content/taxonomy/" . variable_get('package_vid', 66) . "/add/term",
      'Create a release package', array('gid' => $node->nid), 'administer taxonomy package',
      'Create a release package for your ' . $group_type));
      array_unshift($buttons['push'],isa_links_get_general_button('create-release', NULL, $node, NULL,
      "node/add/project-release/{$node->nid}", 'Create a release', NULL, NULL,
      'Create a release in your9 ' . $group_type));
     
  }
  if ($context_path == ISA_ASSET_RELEASE_TYPE) {
    array_unshift($buttons['push'],isa_links_get_general_button('create-release-package popups-form-reload',
      NULL, $node, NULL, "admin/content/taxonomy/" . variable_get('package_vid', 66) . "/add/term",
      'Create a release package', array('gid' => $node->nid), 'administer taxonomy package',
      'Create a release package for your ' . $group_type));
	  array_unshift($buttons['push'],isa_links_get_general_button('propose-asset-release', NULL, $node, NULL,
      "node/add/asset-release", 'Create an asset release', array('gids[]' => $node->nid), NULL,
      'Create an asset release in your ' . $group_type));
  }
  if ($node->group_type == ISA_ASSET_TYPE && $context_path != ISA_ASSET_RELEASE_TYPE) {
    $buttons['push'][] =isa_links_get_general_button('export-metadata', NULL, $node, NULL,
      substr($node->path,0,-12).'/rdf', 'Export description metadata', NULL, NULL,
      'Export a description metadata of your asset', '_blank');
  }
  return $buttons;
}

/**
 *
 */
function isa_links_create_federated_forge($node) {
  return user_access('administer nodes') || user_access('create federated_forge content');
}

function isa_links_get_federated_forges_buttons($node) {
  
	return array(
    'push' => array(isa_links_get_general_button('create-federated-forge',
        'isa_links_create_federated_forge', NULL, NULL, 'node/add/federated-forge',
        'Create a Federated Forge', NULL, NULL, 'Create a federated forge to be added on Joinup')),
    'quick_action' => isa_links_get_propose_your_buttons(),
    'bottom_action' => array(
      isa_links_get_general_button('propose-your'),
      'share-this' => TRUE,
      isa_links_get_general_button('newsletter-subscription', NULL, NULL, NULL),
    )
  );
}

/**
 */
function isa_links_get_federated_projects_buttons($node = NULL) {
  if (!$node) {
    $path = explode('/', drupal_get_normal_path($_GET['q']));
    $nid = $path[1];
    $node = node_load($nid);
  } else {
    $nid = $node->nid;
  }
  if ($node->tnid != 0) {
    $i_use_flag_properties = _isa_links_get_link_properties($node->tnid, 'i_use_this_project',
      $node->group_type);
  } else {
    $i_use_flag_properties = _isa_links_get_link_properties($node->nid, 'i_use_this_project',
      $node->group_type);
  }

  //'Create federated forge button'
  $editors_choice_flag_properties = _isa_links_get_link_properties($nid, 'editor_choice');
  $return = array(
    'push' => array(
      isa_links_get_general_button('create-federated-forge', 'isa_links_create_federated_forge',
        NULL, NULL, 'node/add/federated-forge', 'Create a Federated Forge', NULL, NULL,
        'Create a federated forge to be added on Joinup')),
    'quick_action' => isa_links_get_propose_your_buttons(),
    'action' => array(
      isa_links_get_general_button(($i_use_flag_properties['unflag'] ? 'no-' : '') . 'i-use-federated-project',
        'isa_links_project_use_access', $node, NULL, $i_use_flag_properties['href'],
        $i_use_flag_properties['title'],
        array('destination' => $i_use_flag_properties['destination'], 'token' => $i_use_flag_properties['token']),
        NULL, $i_use_flag_properties['tooltip']),
    ),
    'bottom_action' => array(
      isa_links_get_general_button('propose-your'),
      'share-this' => TRUE,
      isa_links_get_general_button('newsletter-subscription', NULL, NULL, NULL),
    ),
  );
  if ($path[2] != 'edit') {
    $return['links'] = array(
      isa_links_get_general_button('add-editors-choice', 'isa_links_node_is_validated', $node, NULL,
        $editors_choice_flag_properties['href'], $editors_choice_flag_properties['title'],
        array('destination' => $editors_choice_flag_properties['destination'], 'token' => $editors_choice_flag_properties['token']),
        'Display button add editor choice', NULL, $tooltips_flag),
      isa_links_get_general_button('highlight popus-form', 'isa_links_highlight_access', $node,
        NULL, "hl/{$nid}/edit", 'Highlight this Federated Project', NULL, 'admin highlight',
        'Highlight this federated project in your communities and projects'),
    );
  }

  return $return;
}

/**
 */
function isa_links_call_for_comment_access($node) {
  if ($node->group_type == ISA_ASSET_TYPE &&
    (user_access('display Call for review quick action') || isa_toolbox_is_omnipotent())) {
    return TRUE;
  }
  return FALSE;
}

/**
 */
function isa_links_project_is_list_page() {
  if ((preg_match('/(asset|software)\/.*\/all/', $_GET['q']) &&
    !preg_match('/(asset|software)\/[^\/]*\/forum\/all/', $_GET['q'])) ||
    preg_match('/(asset|software)\/[^\/]*\/forum\/[IiKkOoMmHh].*/', $_GET['q'])) {
    return TRUE;
  } else {
    return FALSE;
  }
}

/**
 */
function isa_links_user_is_authenticated() {
  global $user;
  return ($user->uid != 0);
}

/**
 */
function isa_links_project_use_access($project) {
  if (($project->_workflow == ISA_SID_COMMUNITY_VALIDATED
    || $project->_workflow == ISA_SID_FEDPROJ_PUBLISHED
    ) &&
    user_access('display I use this project quick action')) {
    return TRUE;
  }
  //return FALSE;
  return true;
}

/**
 */
function isa_links_is_list() {
  $paths = array('community/*/elibrary/all', 'community/*/highlights/*/all', 'community/*/newsandblog/all');
  foreach ($paths as $path) {
    $regexp = '/^(' . preg_replace(array('/(\r\n?|\n)/', '/\\\\\*/', '/(^|\|)\\\\<front\\\\>($|\|)/'),
        array('|', '.*', '\1' . preg_quote(variable_get('site_frontpage', 'node'), '/') . '\2'),
        preg_quote($path, '/')) . ')$/';
    if (preg_match($regexp, $_GET['q'])) {
      return TRUE;
    }
  }
  return FALSE;
}

/**
 */
function _isa_links_get_link_properties($nid, $flag_name, $group_type = NULL) {
  $properties = array();
  $flag = flag_get_flag($flag_name);
  $action = $flag->is_flagged($nid) ? 'unflag' : 'flag';

  // Generate the link URL.
  $link_types = flag_get_link_types();
  $link_type_module = $link_types[$flag->link_type]['module'];
  $link = module_invoke($link_type_module, 'flag_link', $flag, $action, $nid);
  if (isset($link['title']) && empty($link['html'])) {
    $link['title'] = check_plain($link['title']);
  }
  global $user;
  if (($user->uid) == 0) {
    $href = "user/login";
  } else {
    $href = $link['href'];
  }

  $properties['title'] = isset($link['title']) ? $link['title'] : $flag->get_label($action . '_short',
      $nid);
  $properties['href'] = $href;
  $properties['token'] = flag_get_token($nid);
  $properties['destination'] = $_GET['q'];
  $properties['unflag'] = ($action == 'unflag');

  $node = node_load($nid);
  if ($node->type == ISA_PROJECT_TYPE) {
    $node_type = isa_toolbox_get_node_type_name($node);
  } else {
    $all_type = node_get_types();
    $node_type = $all_type[$node->type]->name;
  }

  if ($flag_name == 'editor_choice') {
    if ($properties['unflag']) {
      $properties['tooltip'] = 'Unmark this ' . $node_type . ' as an editor’s choice';
    } else {
      $properties['tooltip'] = 'Mark this ' . $node_type . ' as an editor’s choice';
    }
  } elseif ($flag_name == 'call_for_review') {
    if ($properties['unflag']) {
      $properties['tooltip'] = 'Remove your semantic asset from the call for comments list';
    } else {
      $properties['tooltip'] = 'Put your semantic asset on the call for comments list';
    }
  } elseif ($flag_name == 'i_use_this_project') {
    if ($properties['unflag']) {
      $properties['tooltip'] = 'Unregister me as a user of this ' . $node_type;
    } else {
      $properties['tooltip'] = 'Register me as a user of this ' . $node_type;
    }
  } elseif ($flag_name == 'i_use_this_asset') {
    if ($properties['unflag']) {
      $properties['tooltip'] = 'I use this asset release';
    } else {
      $properties['tooltip'] = 'I no longer use this asset release';
    }
  } else {
    $properties['tooltip'] = $properties['title'];
  }

  return $properties;
}

/**
 */
function isa_links_asset_assistant_access($project) {
  if ($project->_workflow == ISA_SID_COMMUNITY_VALIDATED &&
    (preg_match('/(asset|software)\/.*\/issue\/all/', $_GET['q']) ||
    preg_match('/asset\/.*\/asset_assistant/', $_GET['q'])) &&
    isa_asset_assistant_access_edit_form($project->nid)) {
    return TRUE;
  } else {
    //project issue edition
    $node = menu_get_object();
    if ($node->type == 'project_issue') {
      return TRUE;
    }
  }
  return FALSE;
}

/**
 */
function isa_links_leave_group($node) {
  global $user;
  if ($user->uid == $node->uid) {
    return FALSE;
  }

  if ($node->_workflow == ISA_SID_COMMUNITY_VALIDATED) {
    if (og_is_group_member($node->nid, FALSE)) {
      return TRUE;
    }
  }
  return FALSE;
}

/**
 */
function isa_links_is_news_or_blog_list() {
  $path = $_GET['q'];
  if ($path == 'news/all' ||
    $path == 'news/news' ||
    $path == 'news/blog' ||
    $path == 'news/recommended' ||
    $path == 'news/editor') {
    return TRUE;
  }
  return FALSE;
}

/**
 */
function isa_links_get_software_static_pages_buttons() {
  return array(
    'push' => array(isa_links_get_general_button('propose-oss', NULL, NULL, NULL,
        'node/add/project-project', 'Propose an OSS Project', array('type' => 'OSS'),
        NULL, 'Propose your own software to be added on Joinup')),
    'quick_action' => isa_links_get_propose_your_buttons(),
    'action' => array(
      isa_links_get_general_button('legal-question', NULL, NULL, NULL, 'contact',
        'Ask a legal question', NULL, NULL,
        'Ask a question about licence issues to the Joinup legal expert'),
    ),
    'bottom_action' => array(
      isa_links_get_general_button('propose-your'),
      'share-this' => TRUE,
      isa_links_get_general_button('newsletter-subscription', NULL, NULL, NULL),
    )
  );
}

/**
 */
function isa_links_get_newsletter_list_button() {
  $push = array(isa_links_get_general_button('propose-news', 'isa_links_create_content_access',
      'news', NULL, 'node/add/news', 'Propose a News item', NULL, NULL,
      'Propose a news item to be added on Joinup'));
  $buttons = array(
    'push' => $push,
    'quick_action' => isa_links_get_propose_your_buttons(),
    'action' => array(
      isa_links_get_general_button('subscribe-rss', NULL, NULL, NULL, $_GET['q'] . '/feed',
        'Subscribe to RSS', NULL, NULL, 'Subscribe to the RSS of this page', '_blank'),
    ),
    'bottom_action' => array(
      isa_links_get_general_button('propose-your'),
      'share-this' => TRUE,
      isa_links_get_general_button('newsletter-subscription', NULL, NULL, NULL),
    )
  );
  return $buttons;
}

/**
 */
function isa_links_get_news_list_buttons() {
  global $user;
  $buttons = array(); // create a variable to prevent the case where there is no node
  $gid = variable_get('current_group', isa_toolbox_get_community_nid());
  $node = menu_get_object();
  $node = isa_toolbox_get_original_node($node);
  if ($gid) {
    $node_group = node_load($gid);
    $group_type = isa_toolbox_get_node_type_name($node_group);
  }
  $editors_choice_flag_properties = _isa_links_get_link_properties($node->nid, 'editor_choice');
  if ($gid) {
    $push = array(isa_links_get_general_button('create-news', 'isa_links_create_content_access',
        'news', NULL, 'node/add/news', 'Create a news item', array('gids[]' => $gid), NULL,
        'Create a news item in your'));
  } else {
    $push = array(isa_links_get_general_button('propose-news', 'isa_links_create_content_access',
        'news', NULL, 'node/add/news', 'Propose a News item', NULL, NULL,
        'Propose a news item to be added on Joinup'));
  }
  //there is a no node
  $buttons = array(
    'push' => $push,
    'quick_action' => isa_links_get_propose_your_buttons(),
    'action' => array(
      isa_links_get_general_button('subscribe-rss', NULL, NULL, NULL, $_GET['q'] . '/feed',
        'Subscribe to RSS', NULL, NULL, 'Subscribe to the RSS of this page', '_blank'),
    ),
    'bottom_action' => array(
      isa_links_get_general_button('propose-your'),
      'share-this' => TRUE,
      isa_links_get_general_button('newsletter-subscription', NULL, NULL, NULL),
    )
  );
  return $buttons;
}

//ISAICP-890
//https://webgate.ec.europa.eu/CITnet/jira/browse/ISAICP-890
//Hidding the 'Create a Blog post' button on the news page
/**
 */
function isa_links_get_news_all_list_buttons() {
  return array(
    'push' => array(isa_links_get_general_button('propose-news', 'isa_links_create_content_access',
        'news', NULL, 'node/add/news', 'Propose News', NULL, NULL,
        'Propose a news item to be added on Joinup'),
      //isa_links_get_general_button('create-blog', 'isa_links_create_content_access', 'blog', NULL,
      //  'node/add/blog', 'Create a blog post', NULL, NULL,
        //'Create a blog post to be added on Joinup')
  		),
    'quick_action' => isa_links_get_propose_your_buttons(),
    'action' => array(
      isa_links_get_general_button('subscribe-rss', 'isa_links_is_news_or_blog_list', NULL, NULL,
        $_GET['q'] . '/feed', 'Subscribe to RSS', NULL, NULL, 'Subscribe to the RSS of this page', '_blank'),
    ),
    'bottom_action' => array(
      isa_links_get_general_button('propose-your'),
      'share-this' => TRUE,
      isa_links_get_general_button('newsletter-subscription', NULL, NULL, NULL),
    ),
  );
}

/**
 */
function isa_links_get_blog_post_list_buttons() {
  global $user;
  $buttons = array(); //prevnet the case there is no node
  $node = menu_get_object();
  $node = isa_toolbox_get_original_node($node);
  $editors_choice_flag_properties = _isa_links_get_link_properties($node->nid, 'editor_choice');
  //there is no node
  $buttons = array(
    'push' => NULL //array(isa_links_get_general_button('create-blog', 'isa_links_create_content_access',
        //'blog', NULL, 'node/add/blog', 'Create a blog post', NULL, NULL,
        //'Create a blog post to be added on Joinup'))
  ,
    'quick_action' => isa_links_get_propose_your_buttons(),
    'action' => array(
      isa_links_get_general_button('subscribe-rss', NULL, NULL, NULL, $_GET['q'] . '/feed',
        'Subscribe to RSS', NULL, NULL, 'Subscribe to the RSS of this page', '_blank'),
    ),
    'bottom_action' => array(
      isa_links_get_general_button('propose-your'),
      'share-this' => TRUE,
      isa_links_get_general_button('newsletter-subscription', NULL, NULL, NULL),
    )
  );
  return $buttons;
}

/**
 */
function isa_links_get_event_list_buttons() {
  global $user;
  return array(
    'push' => array(isa_links_get_general_button('propose-event', 'isa_links_create_content_access',
        'event', NULL, 'node/add/event', 'Propose an Event', NULL, NULL,
        'Propose an event to be added on Joinup')),
    'quick_action' => isa_links_get_propose_your_buttons(),
    'bottom_action' => array(
      isa_links_get_general_button('propose-your'),
      'share-this' => TRUE,
      isa_links_get_general_button('newsletter-subscription', NULL, NULL, NULL),
      isa_links_get_general_button('subscribe-rss', NULL, NULL, NULL, $_GET['q'] . '/feed',
        'Subscribe to RSS', NULL, NULL, 'Subscribe to the RSS of this page', '_blank'),
    ),
  );
  return array('action' => array(isa_links_get_general_button('subscribe-rss', NULL, NULL, NULL,
        $_GET['q'] . '/feed', 'Subscribe to RSS', NULL, NULL, 'Subscribe to the RSS of this page'),
      'share-this' => TRUE));
}

/**
 */
function isa_links_get_elibrary_list_buttons($type = NULL) {
  global $user;

  if ($type) {
    // check if node type use workflow
    $workflow = workflow_get_workflow_for_type($type);
    if ($workflow) {
      $button_type = 'propose';
      $tooltips_type = 'Propose your own';
    } else {
      $button_type = 'create';
      $tooltips_type = 'Create a';
    }
    $all_type = node_get_types();
    $type_name = $all_type[$type]->name;
    $push[] = isa_links_get_general_button("$button_type-$type", 'isa_links_create_content_access',
      'factsheet', NULL, "node/add/$type", "Propose a $type_name", NULL, NULL,
      $tooltips_type . ' ' . $type_name . ' to be added on Joinup');
    ;
  }
  $push[] = isa_links_get_general_button('propose-case', 'isa_links_create_content_access', 'case',
    NULL, 'node/add/case', 'Propose a Case', NULL, NULL, 'Propose a case to be added on Joinup');
  $push[] = isa_links_get_general_button('propose-document', 'isa_links_create_content_access',
    'document', NULL, 'node/add/document', 'Propose a Document', NULL, NULL,
    'Propose a document to be added on Joinup');
  $push[] = isa_links_get_general_button('propose-presentation', 'isa_links_create_content_access',
    'presentation', NULL, 'node/add/presentation', 'Propose a Presentation', NULL, NULL,
    'Propose a presentation to be added on Joinup');
  return array(
    'push' => $push,
    'quick_action' => isa_links_get_propose_your_buttons(),
    'bottom_action' => array(
      isa_links_get_general_button('propose-your'),
      'share-this' => TRUE,
      isa_links_get_general_button('newsletter-subscription', NULL, NULL, NULL),
      isa_links_get_general_button('subscribe-rss', NULL, NULL, NULL, $_GET['q'] . '/feed',
        'Subscribe to RSS', NULL, NULL, 'Subscribe to the RSS of this page', '_blank'),
    ),
  );
}

/**
 * Generate buttons list for contents type (display, add, edit):
 * news,topic,wiki,image,document,factsheet,video,newsletter,
 *
 * @global object $user the current user
 * @param string $type machine name of content type
 * @param boolean $edit true if add or edit a node
 * @return array
 */
 
function isa_links_get_node_display_buttons($type, $edit = FALSE) {
  global $user;
  $links = array();
  $push = array();
  $options = array();
  $node = menu_get_object();
  if ($node) {
    $node = isa_toolbox_get_original_node($node);
  } else {
    $node = arg(2);
  }
  $gid = variable_get('current_group', isa_toolbox_get_community_nid());

  $all_type = node_get_types();
  $type_name = $all_type[$type]->name;
  if ($type == ISA_BLOG_TYPE) {
    $type_name = 'blog post';
  }

  // check if node type use workflow
  $workflow = workflow_get_workflow_for_type($type);
  if ($workflow && (!$gid || $type == 'repository' || $type == ISA_ASSET_RELEASE_TYPE)) {
    $button_type = 'propose';
  } else {
    $button_type = 'create';
  }
  if ($type == ISA_EVENT_TYPE) {
    $articles = 'an';
  } else {
    $articles = 'a';
  }
  if ($gid) {
    $group = node_load($gid);
    if ($node->type == ISA_REPOSITORY_TYPE) {
      $tooltip_end = 'to be added on Joinup';
    } else {
      $options = array('gids[]' => $gid);
      $tooltip_end = 'in your ' . $group_type;
    }
    $group_type = isa_toolbox_get_node_type_name($group);
  } else {
    $tooltip_end = 'to be added on Joinup';
  }

  $access_param = $node;
  $access = 'isa_links_create_content_access';
  // --- Create/propose $type ---
  if ($type == 'contexthelp_faq') {
    $push[] = isa_links_get_general_button("{$button_type}-".  str_replace('_', '-',$type), $access, $access_param, NULL, 'node/add/contexthelp-faq', ucfirst($button_type) . ' a ' . $type_name, $options,NULL,'Create a '.$type_name.' to be added on Joinup');
  }
  //ISAICP-890
  //https://webgate.ec.europa.eu/CITnet/jira/browse/ISAICP-890
  //Hidding the 'Create a Blog post' button on the blog page
  else if($type == ISA_BLOG_TYPE){
  	$push = NULL;
  }else {
    $push[] = isa_links_get_general_button("{$button_type}-" . str_replace('_', '-', $type),
      $access, $access_param, NULL, 'node/add/' . str_replace('_', '-', $type),
      ucfirst($button_type) . ' ' . $articles . ' ' . $type_name, $options, NULL,
      ucfirst($button_type) . ' ' . $articles . ' ' . $type_name . ' ' . $tooltip_end);
    if ($node->type == ISA_REPOSITORY_TYPE) {
      $push[] = isa_links_get_general_button('propose-asset-release', NULL, $node, NULL,
        "node/add/asset-release", 'Propose an Asset Release', array('gids[]' => $node->nid), NULL,
        'Create an asset release in your repository');
      if ($node->field_repository_harvestmethod[0]['value'] != 1) {
        $push[] = isa_links_get_general_button('upload-metadata', $access, $node,
          'isa_links_get_uid_from_arg1', "repository/upload-metadata/%d",
          'Upload description metadata', array('destination' => $_GET['q']), 'administer nodes',
          'Upload a description metadata in your repository');
      }
      $push[] = isa_links_get_general_button('export-metadata', NULL, $node, NULL,
        $node->path.'/rdf', 'Export description metadata', NULL, NULL,
        'Export a description metadata of your repository', '_blank');
    }
    if ($node->type == ISA_ASSET_RELEASE_TYPE) {
      $push[] = isa_links_get_general_button('export-metadata', NULL, $node, NULL,
        $node->path.'/rdf', 'Export description metadata', NULL, NULL,
        'Export a description metadata of your asset release', '_blank');
    }
  }
  //ISAICP-890
  //https://webgate.ec.europa.eu/CITnet/jira/browse/ISAICP-890
  //Hidding the 'block-isa_links-buttons_actions' buttons on the blog page
  if (is_object($node) && $type != ISA_BLOG_TYPE) {
    if (user_is_logged_in() && !$edit && isa_links_node_is_validated($node)) {
      // --- Rating ---
      if (variable_get('fivestar_' . $type, 0) == 1) {
        $links['rate'] = isa_links_get_general_button('rate', 'isa_links_rate_access', $node, NULL,
          NULL, t('Rate this ') . $type_name . ':');
      }
      // --- highlight ---
      $highlight = taxonomy_vocabulary_load(variable_get('hl_vid', NULL));
      if (in_array($node->type, $highlight->nodes)) {
        $links[] = isa_links_get_general_button('highlight popups-form',
          'isa_links_highlight_access', $node, NULL, "hl/{$node->nid}/edit",
          t("Highlight this ") . $type_name, NULL, NULL,
          'Highlight this ' . $type_name . ' in your communities and projects');
      }
      // --- flags ---
      $flags = flag_get_flags('node', $type);
      foreach ($flags as $machine_name => $flag) {
        if ($machine_name != 'bookmarks') {
          $flag_properties = _isa_links_get_link_properties($node->nid, $machine_name,
            $node->group_type);
          $access = array_intersect(array_keys($user->roles), $flag->roles);

          if ($access) {
            $class = str_replace("_", '-', $machine_name);
            $links[] = isa_links_get_general_button($class, NULL, NULL, NULL,
              $flag_properties['href'], $flag_properties['title'],
              array('destination' => $flag_properties['destination'], 'token' => $flag_properties['token']),
              NULL, $flag_properties['tooltip']);
          }
        }
      }
      // --- comment ---
      $comment_active = variable_get('comment_' . $type, 0);
      if ($comment_active != 0) {
        if ($type == ISA_TOPIC_TYPE) {
          $title = t('Reply');
        } else {
          $title = t('Post a comment');
        }
        $links[] = isa_links_get_general_button('comment-form', NULL, NULL, NULL, $node->path,
          $title, NULL, 'post comments', 'Comment on this ' . $type_name);
      }

      // --- subscribe ----
      if (!subscriptions_content_type_is_blocked($type)) {
        $links[] = isa_links_get_general_button('subscribe popups-form',
          'isa_links_subscribe_access', $node, NULL, "node/$node->nid/subscribe", 'Subscribe', NULL,
          'subscribe to content', NULL, 'Subscribe to content of this ' . $type_name);
      }
    }
  }
  return array(
    'push' => $push,
    'quick_action' => isa_links_get_propose_your_buttons(),
    'bottom_action' => array(
      isa_links_get_general_button('propose-your'),
      'share-this' => TRUE,
      isa_links_get_general_button('newsletter-subscription', NULL, NULL, NULL),
    ),
    'links' => $links,
  );
}

/**
 */
function isa_links_get_members_pages_buttons($type) {

  $gid = variable_get('current_group', isa_toolbox_get_community_nid());
  $group = node_load($gid);
  $group_type = isa_toolbox_get_node_type_name($group);
  $query = array('gid' => $gid);

  $buttons = array(
    'push' => array(isa_links_get_general_button("invite-people-{$type} popups",
        'isa_links_user_is_authenticated', NULL, NULL, 'invite', 'Invite People', $query, NULL,
        'Invite people in this ' . $group_type)),
    'quick_action' => isa_links_get_propose_your_buttons(),
    'bottom_action' => array(
      isa_links_get_general_button('propose-your'),
      isa_links_get_general_button('newsletter-subscription', NULL, NULL, NULL),
    ),
  );
  return $buttons;
}

/**
 */
function isa_links_rate_access($node) {
  global $user;
  if ($user->uid == $node->uid)
    return FALSE;
  if (isa_links_not_add_or_edit_or_workflow_page() && $user->uid != 0) {
    return TRUE;
  }
  return FALSE;
}

/**
 * Check if the node is in validated state (workflow)
 *
 * @param object $node
 * @return boolean true if the node is validated, else return false
 */
function isa_links_node_is_validated($node) {
  if (!isset($node->_workflow)) {
    $node->_workflow = $node->workflow;
  }
  $group_types = array(ISA_COMMUNITY_TYPE, ISA_ASSET_TYPE, ISA_PROJECT_TYPE);
  if (in_array($node->type, $group_types)) {
    return ($node->_workflow == ISA_SID_COMMUNITY_VALIDATED);
  }
  $state_validated = array(ISA_SID_NEWS_CREATED, ISA_SID_NEWS_PUBLISHED, 
      ISA_SID_NEWS_REQUEST_PUBLICATION, ISA_SID_COMMUNITY_VALIDATED, ISA_SID_NEWS_VALIDATED,
      ISA_SID_FEDPROJ_PUBLISHED, ISA_SID_RELEASE_CREATED, ISA_SID_RELEASE_REQUESTED,
      ISA_SID_RELEASE_APPROVED, ISA_SID_REPOSITORY_VALIDATED, ISA_SID_REPOSITORY_POSTPONED_DELETION,
      ISA_SID_REPOSITORY_REJECTED_DELETION, ISA_SID_REPOSITORY_REQUESTED_DELETION, ISA_SID_ASSET_ASSESSED,
      ISA_SID_ASSET_ASSESSMENT, ISA_SID_ASSET_VALIDATED, ISA_SID_ASSET_REQUEST_DELETED);
  if ($node->_workflow) {
    return in_array($node->_workflow, $state_validated);
  }
  return TRUE;
}

/**
 */
function isa_links_perm() {
  return (
    array(
      'Display button add editor choice', //permission granted to the administrator and moderator roles
    )
    );
}

function isa_links_get_catalogue_list_buttons($type='repository'){
  $node = menu_get_object();
  if ($node) {
    return isa_links_get_node_display_buttons($node->type);
  }
    switch ($type) {
        case 'repository':
            $push = array(isa_links_get_general_button('propose-repository', 'isa_links_create_content_access', 'repository', NULL, 'node/add/repository', 'Propose your repository',NULL,NULL,'Propose a repository to be added on Joinup'));
            break;
        case 'publisher' :
            $push = array(isa_links_get_general_button('propose-publisher', 'isa_links_create_content_access', 'publisher', NULL, 'node/add/publisher', 'Propose a Publisher',NULL,NULL,'Propose a publisher to be added on Joinup'));
            break;
        case 'licence':
            $push = array(isa_links_get_general_button('propose-licence', 'isa_links_create_content_access', 'licence', NULL, 'node/add/licence', 'Propose a Licence',NULL,NULL,'Propose a licence to be added on Joinup'));
            break;
        case 'documentation':
            $push = array(isa_links_get_general_button('create-documentation', 'isa_links_create_content_access', 'documentation', NULL, 'node/add/documentation', 'Create a Documentation',NULL,NULL,'Create a documentation to be added on Joinup'));
            break;
        case 'item':
            $push = array(isa_links_get_general_button('create-item', 'isa_links_create_content_access', 'item', NULL, 'node/add/item', 'Create an Item',NULL,NULL,'Create an item to be added on Joinup'));
            break;
        case 'contact_point':
            $push = array(isa_links_get_general_button('create-contact-point', 'isa_links_create_content_access', 'contact-point', NULL, 'node/add/contact-point', 'Create a Contact-point',NULL,NULL,'Create a contact-point to be added on Joinup'));
            break;
        case 'identifier':
            $push = array(isa_links_get_general_button('propose-identifier', 'isa_links_create_content_access', 'identifier', NULL, 'node/add/identifier', 'Create an Identifier',NULL,NULL,'Create an identifier to be added on Joinup'));
            break;
    }

  $buttons = array(
    'push' => $push,
    'quick_action' => isa_links_get_propose_your_buttons(),
    'bottom_action' => array(
      isa_links_get_general_button('propose-your'),
      'share-this' => TRUE,
      isa_links_get_general_button('newsletter-subscription', NULL, NULL, NULL),
      isa_links_get_general_button('subscribe-rss', NULL, NULL, NULL, $_GET['q'] . '/feed',
        'Subscribe to RSS', NULL, NULL, 'Subscribe to the RSS of this page', '_blank'),
    )
  );
  return $buttons;
}
