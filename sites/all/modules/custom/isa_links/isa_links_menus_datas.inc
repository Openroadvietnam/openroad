<?php
/**
 * @file
 * List of all buttons depending on the path
 *
 * @ingroup isa_links
 */

/**
 * List of all menus depending on the path
 */
function isa_links_menus_datas() {
  $datas = array(
      'page/*'                => 'isa_links_get_info_page_menus()',
      'people/*'              => 'isa_links_get_people_menus()',
      'user/*'                => 'isa_links_get_people_menus()',
      'admin/*'               => 'array(\'Admin\' => isa_links_get_admin_menus())',
      'community/all'         => 'isa_links_get_communities_list_menus()',
      'community/recommended' => 'isa_links_get_communities_list_menus()',
      'community/mine'        => 'isa_links_get_communities_list_menus()',
      'community/editor'      => 'isa_links_get_communities_list_menus()',
      'community/*/*'         => 'isa_links_get_group_menus(ISA_COMMUNITY_TYPE)',
      'asset/all'             => 'isa_links_get_assets_list_menus()',
      'asset/recommended'     => 'isa_links_get_assets_list_menus()',
      'asset/i_use'           => 'isa_links_get_assets_list_menus()',
      'asset/editor'          => 'isa_links_get_assets_list_menus()',
      'asset/call_for_comment' => 'isa_links_get_assets_list_menus()',
      'asset/page/*'          => 'isa_links_get_assets_list_menus()',
      'asset/experts'         => 'isa_links_get_assets_list_menus()',
      'asset/experts/*'       => 'isa_links_get_assets_list_menus()',
      'asset/*/*'             => 'isa_links_get_group_menus(ISA_ASSET_TYPE)',
      'software/all'          => 'isa_links_get_software_list_menus()',
      'software/recommended'  => 'isa_links_get_software_list_menus()',
      'software/i_use'        => 'isa_links_get_software_list_menus()',
      'software/editor'       => 'isa_links_get_software_list_menus()',
      'software/my_oss'       => 'isa_links_get_software_list_menus()',
      'software/federated_forge'  => 'isa_links_get_software_list_menus()',
      'software/license-wizard/*' => 'isa_links_get_software_list_menus()',
      'software/guidelines'   => 'isa_links_get_software_list_menus()',
      'software/guidelines/*' => 'isa_links_get_software_list_menus()',
      'software/studies'      => 'isa_links_get_software_list_menus()',
      'software/studies/*'    => 'isa_links_get_software_list_menus()',
      'software/page/*'       => 'isa_links_get_software_list_menus()',
      'software/*/*'          => 'isa_links_get_group_menus(ISA_SOFTWARE_TYPE)',
      'federated_forge/*'     => 'isa_links_get_software_list_menus()',
      'federated_project/*/*' => 'isa_links_get_software_list_menus()',
      'node/*/edit'           => 'isa_links_get_node_menus()',
      'node/*/edit/releases'  => 'isa_links_get_node_menus()',
      'node/*/revisions'      => 'isa_links_get_node_menus()',
      'node/*/revisions/*'    => 'isa_links_get_node_menus()',
      'node/*/workflow'       => 'isa_links_get_node_menus()',
      'node/*/translate'      => 'isa_links_get_node_menus()',
      'comment/reply/*'       => 'isa_links_get_comment_menus("add")',
      'comment/edit/*'        => 'isa_links_get_comment_menus("edit")',
      'node/add/*'            => 'isa_links_get_add_menus()',
      'help'                  => 'isa_links_get_info_page_menus()',
      'contexthelp/*'         => 'isa_links_get_info_page_menus()',
      'help_topics'           => 'isa_links_get_info_page_menus()',
      'contexthelpfaq/*'      => 'isa_links_get_info_page_menus()',
      'contact'               => 'isa_links_get_info_page_menus()',
      'sitemap'               => 'isa_links_get_info_page_menus()',
      'glossary'              => 'isa_links_get_info_page_menus()',
      'glossary/*'            => 'isa_links_get_info_page_menus()',
      'category/glossary/*'   => 'isa_links_get_info_page_menus()',
      'partners'              => 'isa_links_get_info_page_menus()',
      'metrics'               => 'isa_links_get_info_page_menus()',
      'page/osor.eu'          => 'isa_links_get_info_page_menus()',
      'page/semic.eu'         => 'isa_links_get_info_page_menus()',
      'news/*'                => 'isa_links_get_news_list_menus()',
      'newsletter/*'          => 'isa_links_get_news_list_menus()',
      'blog/*'                => 'isa_links_get_news_list_menus()',
      'event/*'               => 'isa_links_get_event_menus()',
      'elibrary/case/*'       => 'isa_links_get_node_menus()',
      'elibrary/*'            => 'isa_links_get_elibrary_menus()',
      'advertisement/*'       => 'isa_links_get_info_page_menus()',
  );
  return $datas;
}

/**
 */
function isa_links_get_comment_menus($action){
  if ($action == 'add'){
    return isa_links_get_node_menus(arg(2));
  }elseif ($action == 'edit'){
    $comment = _comment_load(arg(2));
    if ($comment){
      return isa_links_get_node_menus($comment->nid);
    }
  }
  
}

/**
 */
function isa_links_get_add_menus() {
  $nid = $_GET['gids'][0];
  if ($nid) {
    //add content to a group
    $node = node_load($nid);
    if ($node->group_type) {
      return isa_links_get_group_menus($node->group_type);
    }
  }
  else {
    //add an asset or a software
    $type = $_GET['type'];
    if ($type) {
      switch ($type) {
        case ISA_ASSET_TYPE:
          return isa_links_get_assets_list_menus();
        case ISA_SOFTWARE_TYPE:
        case 'OSS':
          return isa_links_get_software_list_menus();
      }
    }
    else {
      $path = explode('/', $_GET['q']);
      $nid = variable_get('current_group', isa_toolbox_get_community_nid());
      $node = node_load($nid);
      switch ($path[2]) {
        case ISA_COMMUNITY_TYPE:
          return isa_links_get_communities_list_menus();
        case 'project-issue':
        case 'project-release':
          return isa_links_get_group_menus($node->group_type);
        case 'federated-forge':
        case 'federated-project':
          return isa_links_get_software_list_menus();
        case ISA_NEWSLETTER_TYPE:
          return array('Admin' => isa_links_get_admin_menus());
        default:
          $node = new stdClass;
          $node->type = $path[2];
          return isa_links_get_menus_type($node, 'add');
      }
    }
  }
}

/**
 * return the menu for the node concerning oss or asset
 * @param type $node
 * @return type 
 */
function isa_links_treate_group_page($node) {
  if (isa_toolbox_alias_from_oss_or_asset($node)) {
    $alias = isa_toolbox_alias_from_oss_or_asset($node);
    switch ($alias) {
      case 'oss_on_joinup':        
        return isa_links_get_group_menus(ISA_SOFTWARE_TYPE);
      case 'assets_on_joinup':     
        return isa_links_get_group_menus(ISA_ASSET_TYPE);
      default:
        return NULL;
    }
  }
}

/**
 */
function isa_links_get_node_menus($nid = NULL) {
  $node = (isset($nid)) ? node_load($nid) : menu_get_object();
  if (isset ($node->og_groups) && !empty ($node->og_groups)) {
    $group = node_load(array_shift($node->og_groups));
    if ($group->group_type) {
      return isa_links_get_group_menus($group->group_type);
    }
  }
  else {
    return isa_links_get_menus_type($node, 'edit');
  }
}

/**
 */
function isa_links_get_menus_type($node, $action) {
  if (isset ($node->type)){
    $type = $node->type;
  }
  switch ($type) {
    case ISA_ISSUE_TYPE:
      $node = node_load($node->project_issue['pid']);
      return isa_links_get_group_menus($node->group_type);
    case ISA_PROJECT_RELEASE_TYPE:
      $node = node_load($node->project_release['pid']);
      return isa_links_get_group_menus($node->group_type);
    case ISA_PROJECT_TYPE:
    case ISA_COMMUNITY_TYPE:
      return isa_links_get_group_menus($node->group_type);
    case ISA_FEDERATED_FORGE_TYPE:
    case ISA_FEDERATED_PROJECT_TYPE:
     // for license wizard (is a wiki content)
    case ISA_WIKI_TYPE:
      return isa_links_get_software_list_menus();
    case ISA_EVENT_TYPE:
      return isa_links_get_event_menus();
    case ISA_CASE_TYPE:
      if (isa_toolbox_get_case_type($node) == 1 || isa_toolbox_get_case_type($node) == 2) {
        return isa_links_get_software_list_menus();
      }
      return isa_links_get_elibrary_menus();
    case ISA_VIDEO_TYPE:
    case ISA_FACTSHEET_TYPE:
    case ISA_PRESENTATION_TYPE:
    case ISA_DOCUMENT_TYPE:
      return isa_links_get_elibrary_menus();
    case ISA_NEWSLETTER_TYPE:
    case ISA_NEWS_TYPE:
    case ISA_BLOG_TYPE:
      return isa_links_get_news_list_menus();
    case 'page':
    case 'contexthelp_faq':
    case 'contexthelp-faq':
    case 'contexthelp':
    case 'advertisement':
      if (NULL != isa_links_treate_group_page($node))
        return isa_links_treate_group_page($node);
      else
        return isa_links_get_info_page_menus();
    default:
      $node = node_load(array_shift($node->og_groups_both));
      if ($node) {
        return isa_links_get_group_menus($node->group_type);
      }
  }
}

/**
 */
function isa_links_people_list_menu_access() {
  if (in_array(arg(1), array('all', 'experts', 'moderators', 'recommended'))) {
    return TRUE;
  }
  return FALSE;
}

/**
 */
function isa_links_people_mypage_menu_access() {
  global $user;
  if ((is_numeric(arg(1)) && arg(1) == $user->uid) || arg(1) == 'dashboard') {
    return TRUE;
  }
  return FALSE;
}

/**
 */
function isa_links_people_admin_menu_access() {
  global $user;
  if ((isa_toolbox_is_omnipotent() || user_access('administer nodes') || user_access('access Theme Editor for Default theme')) &&
          ((is_numeric(arg(1)) && arg(1) == $user->uid) ||
          arg(1) == 'dashboard' ||
          strstr($_GET['q'], 'admin/user/user') ||
          strstr($_GET['q'], 'admin/content/taxonomy') ||
          strstr($_GET['q'], 'admin/content/simplenews') ||
          strstr($_GET['q'], 'node/add/newsletter') ||
          strstr($_GET['q'], 'admin/infobox')
          )) {
    return TRUE;
  }
  return FALSE;
}

/**
 */
function isa_links_people_blog_menu_access() {
  global $user;

  if (is_numeric(arg(1)) && arg(1) != $user->uid) {
    return TRUE;
  }
  return FALSE;
}

/**
 */
function isa_links_user_uid() {
  $nid = explode('/', drupal_get_normal_path($_GET['q']));
  if (!is_numeric($nid)) {
    global $user;
    return $user->uid;
  }
  return $nid[1];
}

/**
 */
function isa_links_user_uid_blog() {
  $nid = explode('/', drupal_get_normal_path($_GET['q']));
  return $nid[1];
}

/**
 */
function isa_links_get_assets_list_menus() {
  return array(
      'Semantic asset' => array(
          'menus' => array(
              array(
                  'title' => 'Assets on Joinup',
                  'href' => 'node/2553',
              ),
              array(
                  'title' => 'Find asset',
                  'href' => 'asset/all',
              ),
              array(
                  'title' => 'Recommended',
                  'href' => 'asset/recommended',
              ),
              array(
                  'title' => 'Assets I use',
                  'href' => 'asset/i_use',
              ),
              array(
                  'title' => 'Editor\'s choice',
                  'href' => 'asset/editor',
              ),
          ),
      ),
      'Clearing process' => array(
          'menus' => array(
              array(
                  'title' => 'What is it?',
                  'href' => 'node/2554',
              ),
              array(
                  'title' => 'Call for comment',
                  'href' => 'asset/call_for_comment',
              ),
          ),
      ),
      'Methodologies' => array(
          'menus' => array(
              array(
                  'title' => 'Asset assistant',
                  'href' => 'node/2555',
              ),
              array(
                  'title' => 'Practice aids',
                  'href' => 'node/2556',
              ),
          ),
      ),
      'Partners' => array(
          'menus' => array(
              array(
                  'title' => 'Partner projects',
                  'href' => 'node/2558',
              ),
          ),
      ),
  );
}

/**
 */
function isa_links_get_software_list_menus() {
  return array(
      'Software' => array(
          'menus' => array(
              array(
                  'title' => 'OSS on Joinup',
                  'href' => 'node/2550',
              ),
              array(
                  'title' => 'Find Software',
                  'href' => 'software/all',
              ),
              array(
                  'title' => 'My OSS Projects',
                  'href' => 'software/my_oss',
              ),
              array(
                  'title' => 'Software I use',
                  'href' => 'software/i_use',
              ),
              array(
                  'title' => 'Recommended',
                  'href' => 'software/recommended',
              ),
              array(
                  'title' => 'Editor\'s choice',
                  'href' => 'software/editor',
              ),
          ),
      ),
      'Legal Corner' => array(
          'menus' => array(
              array(
                  'title' => 'License Wizard',
                  'href' => 'node/2048',
              ),
              array(
                  'title' => 'EUPL',
                  'href' => 'node/2567',
              ),
              array(
                  'title' => 'Licence & Comp. agreements',
                  'href' => 'node/19778',
              ),
              array(
                  'title' => 'Licence compatibility',
                  'href' => 'node/19779',
              ),
              array(
                  'title' => 'FAQ',
                  'href' => 'software/page/faq',
              ),
          ),
      ),
      'Methodologies' => array(
          'menus' => array(
              array(
                  'title' => 'Case studies',
                  'href' => 'software/studies',
              ),
              array(
                  'title' => 'Guidelines',
                  'href' => 'software/guidelines',
              ),
          ),
      ),
      'Partners' => array(
          'menus' => array(
              array(
                  'title' => 'OSS Centres',
                  'href' => 'node/2563',
              ),
              array(
                  'title' => 'Federated Forges',
                  'href' => 'software/federated_forge',
              ),
              array(
                  'title' => 'Virtual Forges',
                  'href' => 'node/2568',
              ),
          ),
      ),
  );
}

/**
 */
function isa_links_get_info_page_menus() {
  return array(
      'Information' => array(
          'menus' => array(
              array(
                  'title' => 'About us',
                  'href' => 'node/2551',
              ),
              array(
                  'title' => 'Osor.eu',
                  'href' => 'node/2848',
              ),
              array(
                  'title' => 'Semic.eu',
                  'href' => 'node/2847',
              ),
              array(
                  'title' => 'Our services',
                  'href' => 'node/2549',
              ),
              array(
                  'title' => 'Metrics',
                  'href' => 'metrics',
              ),
              array(
                  'title' => 'Legal notice',
                  'href' => drupal_lookup_path('source', 'page/legal-notice'),
              ),
              array(
                  'title' => 'Get involved',
                  'href' => 'node/2825',
              ),
              array(
                  'title' => 'Help',
                  'href' => 'help',
              ),
              array(
                  'title' => 'FAQ',
                  'href' => 'help_topics',
              ),
              array(
                  'title' => 'Contact',
                  'href' => 'contact',
              ),
              array(
                  'title' => 'Sitemap',
                  'href' => 'sitemap',
              ),
              array(
                  'title' => 'Partners',
                  'href' => 'node/2644',
              ),
              array(
                  'title' => 'Glossary',
                  'href' => 'glossary',
              ),
              array(
                    'title' => 'Widget',
                    'href' => drupal_lookup_path('source', 'page/widget') ,
                ),
          ),
      ),
  );
}

/**
 */
function isa_links_get_people_menus() {
  return array(
      'People' => array(
          'menus' => array(
              array(
                  'title' => 'Browse all',
                  'href' => 'people/all',
              ),
              array(
                  'title' => 'Moderators',
                  'href' => 'people/moderators',
              ),
              array(
                  'title' => 'Recommended',
                  'href' => 'people/recommended',
              ),
          ),
          'access_callback' => 'isa_links_people_list_menu_access',
      ),
      'Profile ' => array(//CAUTION : don't remove the beyond space
          'menus' => array(
              array(
                  'title' => 'My Page',
                  'href' => 'user/%d',
                  'url_callback' => 'isa_links_user_uid',
              ),
              array(
                  'title' => 'My Dashboard',
                  'href' => 'people/dashboard',
                  'url_callback' => 'isa_links_user_uid',
              ),
              array(
                  'title' => 'Recommended',
                  'href' => 'people/%d/recommended',
                  'url_callback' => 'isa_links_user_uid',
              ),
          ),
          'access_callback' => 'isa_links_people_mypage_menu_access',
      ),
      'Admin' => isa_links_get_admin_menus(),
      'Profile' => array(
          'menus' => array(
              array(
                  'title' => 'User\'s Page',
                  'href' => 'user/%d',
                  'url_callback' => 'isa_links_user_uid_blog',
              ),
              array(
                  'title' => 'User\'s Blog',
                  'href' => 'people/%d/blog',
                  'url_callback' => 'isa_links_user_uid_blog',
              ),
          ),
          'access_callback' => 'isa_links_people_blog_menu_access',
      ),
  );
}

/**
 */
function isa_links_get_admin_menus() {
  return array(
      'menus' => array(
          array(
              'title' => t('Manage users'),
              'href' => 'admin/user/user',
              'permission' => 'manage users'
          ),
          array(
              'title' => t('Manage categories'),
              'href' => 'admin/content/taxonomy',
              'permission' => 'administer taxonomy'
          ),
          array(
              'title' => t('Manage newsletters'),
              'href' => 'admin/content/simplenews/users',
              'permission' => 'administer nodes'
          ),
          array(
              'title' => t('Configure newsletters'),
              'href' => 'admin/content/simplenews/types',
              'permission' => 'administer nodes'
          ),
          array(
              'title' => t('Create a Newsletter'),
              'href' => 'node/add/newsletter',
              'permission' => 'administer nodes'
          ),
          array( 
            'title' => t('Edit theme'),
            'href' => 'admin/build/themes/editor/' . variable_get('theme_default', NULL),
            'permission' => 'access Theme Editor for Default theme',  
            'access_callback' => 'isa_toolbox_is_in_virtual_forge',
          ),
          array(
              'title' =>t('Manage infobox'),
              'href'  =>'admin/infobox',
              'permission' =>'administer nodes'
          ),
      ),
      'access_callback' => 'isa_links_people_admin_menu_access',
  );
}

/**
 */
function isa_links_get_communities_list_menus() {
  return array(
      'Communities' => array(
          'menus' => array(
              array(
                  'title' => 'Find Community',
                  'href' => 'community/all',
              ),
              array(
                  'title' => 'My Communities',
                  'href' => 'community/mine',
              ),
              array(
                  'title' => 'Recommended',
                  'href' => 'community/recommended',
              ),
              array(
                  'title' => 'Editor\'s Choice',
                  'href' => 'community/editor',
              ),
          ),
      ),
  );
}

/**
 */
function isa_links_get_event_menus() {
  return array(
      'Events' => array(
          'menus' => array(
              array(
                  'title' => 'Browse upcoming',
                  'href' => 'event/all',
              ),
              array(
                  'title' => 'Browse archives',
                  'href' => 'event/archives',
              ),
              array(
                  'title' => 'Recommended',
                  'href' => 'event/recommended',
              ),
              array(
                  'title' => 'Editor\'s Choice',
                  'href' => 'event/editor',
              ),
          ),
      ),
  );
}

/**
 */
function isa_links_get_elibrary_menus() {
  return array(
      'e-Library' => array(
          'menus' => array(
              array(
                  'title' => 'Browse all',
                  'href' => 'elibrary/all',
              ),
              array(
                  'title' => 'Cases',
                  'href' => 'elibrary/case',
              ),
              array(
                  'title' => 'Presentations',
                  'href' => 'elibrary/presentation',
              ),
              array(
                  'title' => 'Factsheets',
                  'href' => 'elibrary/factsheet',
              ),
              array(
                  'title' => 'Web TV',
                  'href' => 'elibrary/video',
              ),
              array(
                  'title' => 'Documents',
                  'href' => 'elibrary/document',
              ),
              array(
                  'title' => 'Recommended',
                  'href' => 'elibrary/recommended',
              ),
              array(
                  'title' => 'Editor\'s Choice',
                  'href' => 'elibrary/editor',
              ),
          ),
      ),
  );
}

/**
 */
function isa_links_get_news_list_menus() {
  return array(
      'News' => array(
          'menus' => array(
              array(
                  'title' => 'Browse all',
                  'href' => 'news/all',
              ),
              array(
                  'title' => 'News',
                  'href' => 'news/news',
              ),
              array(
                  'title' => 'Blogs',
                  'href' => 'news/blog',
              ),
              array(
                  'title' => 'Recommended',
                  'href' => 'news/recommended',
              ),
              array(
                  'title' => "Editor's choice",
                  'href' => 'news/editor',
              ),
          ),
      ),
      'Newsletter' => array(
          'menus' => array(
              array(
                  'title' => "Archives",
                  'href' => 'news/newsletter',
              ),
          ),
      ),
  );
}

/**
 */
function isa_links_get_group_menus($group_type) {
  $menu_title = ucfirst($group_type);
  if ($menu_title == 'Asset') {
    $menu_title = 'Semantic Asset';
  }

  $group_id = variable_get('current_group', isa_toolbox_get_community_nid());
  $short_name = isa_links_get_group_short_name();

  $cla_tool = NULL;
  $project_issue = NULL;
  $project_release = NULL;
  if ($group_type == 'software' || $group_type == 'asset') {
    $original_group = isa_toolbox_get_original_node(node_load($group_id));
    $short_name = isa_links_get_group_short_name($original_group);
    $project_issue = array('title' => 'Issues',
        'href' => "{$group_type}/{$short_name}/issue/all");
    $project_release = array('title' => 'Releases',
        'href' => "{$group_type}/{$short_name}/release/all");
  }

  return array(
      $menu_title => array(
          'menus' => array(
              array(
                  'title' => 'Welcome',
                  'href' => "{$group_type}/{$short_name}/home",
              ),
              array(
                  'title' => 'Description',
                  'href' => "node/{$group_id}",
              ),
              array(
                  'title' => 'Members list',
                  'href' => "{$group_type}/{$short_name}/members",
              ),
              $cla_tool,
              $project_issue,
              $project_release,
              array(
                  'title' => 'Metrics',
                  'href' => "{$group_type}/{$short_name}/metrics",
              ),
          ),
      ),
      'Highlights' => array(
          'menus' => array(
              array(
                  'title' => 'Semantic Assets',
                  'href' => "{$group_type}/{$short_name}/highlights/asset/all",
              ),
              array(
                  'title' => 'Software',
                  'href' => "{$group_type}/{$short_name}/highlights/software/all",
              ),
              array(
                  'title' => 'Communities',
                  'href' => "{$group_type}/{$short_name}/highlights/community/all",
              ),
          ),
          'permission' => 'access community',
      ),
      'Communications' => array(
          'menus' => array(
              array(
                  'title' => 'Forums',
                  'href' => "{$group_type}/{$short_name}/forum/all",
              ),
              array(
                  'title' => 'News & Blogs',
                  'href' => "{$group_type}/{$short_name}/newsandblog/all",
              ),
              array(
                  'title' => 'Events',
                  'href' => "{$group_type}/{$short_name}/event/all",
              ),
              array(
                  'title' => 'e-Library',
                  'href' => "{$group_type}/{$short_name}/elibrary/all",
              ),
          ),
          'permission' => 'access community',
      ),
  );
}
