<?php

// $Id: template.php,v 0.23 2011/01/19 09:52:54 sebastien.millart Exp $


define('MENU_MYPAGE', 'menu-9771');
define('MENU_ELIBRARY', 'menu-505');
define('MENU_NEWS', 'menu-498');
define('MENU_EVENT', 'menu-506');
define('MENU_COMMUNITY', 'menu-9693');
define('MENU_SOFTWARE', 'menu-9755');
define('MENU_ASSET', 'menu-496');
define('MENU_HOME', 'menu-7780');
define('MENU_CATALOGUE', 'menu-14034');

//ISAICP-882
// Modify <dc:creator> to full name; <guid> to permanent link (/node); <link> to permanent link (/node)

function joinup_preprocess_views_view_row_rss(&$vars) {
	global $base_url;
	
	$node = node_load($vars['row']->nid);
	$params = array(
			'type' => 'profile',
			'uid' => $node->uid,
	);
	$node_user = node_load($params);
	$name = $node_user->field_firstname[0]['value'];
	$name .= " ";
	$name .= $node_user->field_lastname[0]['value'];

	$item = &$vars['row'];
	$elementCount = count($item->elements);
	
	$item->link = $base_url."/node/".$vars['row']->nid;
	
	for($i=0; $i < $elementCount; $i++) {		
		if ($item->elements[$i]['key'] == 'dc:creator') {
			$item->elements[$i]['value'] = $name;
		}
		if ($item->elements[$i]['key'] == 'guid') {
			$item->elements[$i]['value'] = $base_url."/node/".$vars['row']->nid;
			$item->elements[$i]['attributes'] = "";
		}	
	}
	$vars['link'] =$item->link;
	$vars['item_elements'] = empty($item->elements) ? '' : format_xml_elements($item->elements);
}

/**
 *
 * @param type $link
 * @return type
 */
function joinup_menu_item_link($link) {
    //https://webgate.ec.europa.eu/CITnet/jira/browse/ISAICP-797
    //Change url from advanced search table show the are shown active
    if('search/apachesolr_search/' == $link['href']){
        $link['href'] = 'search/apachesolr_search';
    }
    if('search/user/' == $link['href']){
        $link['href'] = 'search/user';
    }
    if ($link['href'] == 'user/login') {
        $link['localized_options']['query'] = drupal_get_destination();
    }
	//print_r($link);die();
	if(arg(0) == 'node' and is_numeric(arg(1))){
        if('repository' == db_result(db_query("SELECT type FROM node WHERE nid=%d", arg(1)))){
            if('catalogue/repository' == $link['link_path']){
			
              //echo  $link['localized_options']['attributes']['class'] = 'active';
            }
        }
    }

    //https://webgate.ec.europa.eu/CITnet/jira/browse/ISAICP-840
    //Remove links from footer-menu  first level entries with children
    if('menu-footer' == $link['menu_name']){
        if(1 == $link['has_children'] and 1 == $link['depth']){
            return '<strong class="'. $link['menu_name'].'-title">' . $link['title'] . '</strong>';
        }
    }
    return theme_menu_item_link($link);
}

/**
 * Override or insert variables into the "page.tpl.php" templates.
 *
 * @param $vars
 *   An array of variables to pass to the theme template.
 *
 * @see page.tpl.php
 * @ingroup phptemplate
 */
function joinup_preprocess_page(&$vars) {
    //Set Javascript controller for Google Analytics
    global $base_url;
    //https://webgate.ec.europa.eu/CITnet/jira/browse/ISAICP-445
    //Add base path to script path
    //Include google analytics js in the page header
    $domain = $_SERVER['HTTP_HOST'];
    if($domain=='joinup.ec.europa.eu'){ //Production
      drupal_add_js(base_path() .  path_to_theme() . '/scripts/ga/ga.js');
      $vars['scripts'] = drupal_get_js();	
    }elseif($domain=='webgate.acceptance.ec.europa.eu'){ //Acceptance	
      drupal_add_js(base_path() . path_to_theme() . '/scripts/ga/ga-acceptance.js');
      $vars['scripts'] = drupal_get_js();	
    }
    //END - Set Javascript controller for Google Analytics

    //https://webgate.ec.europa.eu/CITnet/jira/browse/ISAICP-841
    //Load css and js for the whats new home block
    if( true === drupal_is_front_page()){
        drupal_add_js(path_to_theme() . '/scripts/whatsnew.js');
        drupal_add_css(path_to_theme() . '/styles/default/whatsnew.css');
        $vars['styles'] = drupal_get_css();
        $vars['scripts'] = drupal_get_js();
        if(true == module_exists('isa_jquery_noconflict')){
          isa_jquery_noconflict_include_jquery();
        }
    }
    //https://webgate.ec.europa.eu/CITnet/jira/browse/ISAICP-841
    //Show global header title
    $vars['global_header_title'] = variable_get('global_site_header','');
    //create hook_js_alter to allow to change javascripts
    // don't use $vars['scripts'], use hook_js_alter
    //https://webgate.ec.europa.eu/CITnet/jira/browse/ISAICP-841
    //Load general css layout depending on the page and structure
    $vars['extra_layout_css'] = '';
    if(!$vars['left']){
        $vars['extra_layout_css'] .= ' layout-noleft';
    }
    if(!$vars['right']){
        $vars['extra_layout_css'] .= ' layout-noright';
    }
    if( true === drupal_is_front_page() ){
         $vars['extra_layout_css'] .= ' layout-home';
    }
    if("search" == arg(0) and "apachesolr_search" == arg(1)){
         $vars['extra_layout_css'] .= ' layout-search';
    }
    //https://webgate.ec.europa.eu/CITnet/jira/browse/ISAICP-797
    //Set diferent classs for content, user and issues pages
    if("search" == arg(0) and "apachesolr_search" == arg(1)){
         $vars['extra_layout_content_css'] .= ' layout-content-apache_search';
    }
    if("search" == arg(0) and "user" == arg(1)){
         $vars['extra_layout_content_css'] .= ' layout-content-user';
    }
    if("search" == arg(0) and "issues" == arg(1)){
         $vars['extra_layout_content_css'] .= ' layout-content-issues';
    }
    $javascript = drupal_add_js();
    drupal_alter('js', $javascript);
    $vars['scripts'] = drupal_get_js('header', $javascript);

    // change path of stylesheet for virtual forge
    joinup_change_css_for_vf($vars);

    $path = $_GET['q'];
    $args = explode('/', $path);
    $last_arg = $args[count($args) - 1];
    if ((isset($_GET['recommended']) || $last_arg == 'recommended') && user_is_anonymous()) {
        $vars['content'] = variable_get('anonymous_connect_text', 'You should be logged in to display this page');
    }

    //set the page title and navigator title on users pages
    if ($args[0] == 'user' && is_numeric($args[1]) && $args[2] != 'subscriptions') {
        $username = strip_tags(theme('username', $args[1]));
        $vars['title'] = $username;
        $vars['head_title'] = $username . ' | ' . variable_get('site_name', 'Joinup');
    }

    $vars['tabs2'] = menu_secondary_local_tasks();
    // Prepare Site Identity ($site_identity variable) for the Header region.
    $alt_text = t('Go to the home page');
    $site_html = '<span class="accessibility-info">' . variable_get('site_name', 'Joinup') . '.</span>';
    $theme_setting = variable_get('theme_' . variable_get('theme_default', 'joinup') . '_settings', 'theme_joinup_settings');
    $logo = $theme_setting['logo_path'];
    // Test if the logo or the site HTML exists.
    if ($logo || $site_html) {
        // If the logo exists.
        if ($logo) {
            // Create a themed image for the logo.
            $logo_image = theme_image($logo, $alt_text, '', array('id' => 'logo'), FALSE);
            // Create a themed link arround the logo image which point to the front page.
            $image_link = l($logo_image, '<front>', array('attributes' => array('title' => $alt_text), 'html' => TRUE));
            // Set the $site_identity variable with the $site_html and $image_link values.
            $vars['site_identity'] = $site_html . $image_link;
        }
        // If not
        else {
            // Set the $site_identity variable with a hypertext link to the front page arround the $site_html value only.
            $vars['site_identity'] = l($site_html, '<front>', array('attributes' => array('title' => $alt_text), 'html' => TRUE));
        }
    }

    // Define the colspan values depending of the visibility of different regions
    if ($vars['left'] && $vars['content']) {
        $vars['right_colspan'] = '5';
    } else {
        if ($vars['left']) {
            $vars['right_colspan'] = '13';
        } elseif ($vars['content']) {
            $vars['right_colspan'] = '5';
        } else {
            $vars['right_colspan'] = '16';
        }
    }

    if ($vars['right'] && $vars['content']) {
        $vars['left_colspan'] = '3';
    } else {
        if ($vars['right']) {
            $vars['left_colspan'] = '11';
        } elseif ($vars['content']) {
            $vars['left_colspan'] = '3';
        } else {
            $vars['left_colspan'] = '16';
        }
    }

    if ($vars['right'] && $vars['left']) {
        $vars['content_colspan'] = '8';
    } else {
        if ($vars['right']) {
            $vars['content_colspan'] = '11';
        } elseif ($vars['left']) {
            $vars['content_colspan'] = '13';
        } else {
            $vars['content_colspan'] = '16';
        }
    }

    // Get the URL path to hide the heading 2 for several content type homepages.
    if (module_exists('path')) {
        $path_alias = drupal_get_path_alias($_GET['q']);
        $alias_parts = explode('/', $path_alias);
        $node = menu_get_object();
        if ($node) {
            $node_type = $node->type;
            $node_type_group = '';

            if (isset($alias_parts[2])) {
                $node_page = $alias_parts[2];
            }
            if (!$node) {
                $node_type_group = $alias_parts[0];
            }

            if ((( $node_type == ISA_COMMUNITY_TYPE || $node_type == ISA_PROJECT_TYPE || $node_type_group == ISA_ASSET_TYPE || $node_type_group == ISA_SOFTWARE_TYPE || $node_type_group == ISA_COMMUNITY_TYPE) && ($node_page == 'description' || $node_page == 'home'))
                    || $node_type == 'dashboard' || $node_type == 'federatedproject'
                    || $node_type == 'federatedforge' || $node_type == ISA_DOCUMENT_TYPE
                    || $node_type == 'advertisement'
                    || $node_type == ISA_PRESENTATION_TYPE
                    || $node_type == ISA_CASE_TYPE || $node_type == ISA_EVENT_TYPE
                    || $node_type == ISA_FACTSHEET_TYPE || $node_type == ISA_VIDEO_TYPE
                    || $node_type == ISA_NEWS_TYPE || $node_type == ISA_BLOG_TYPE
                    || $node_type == ISA_WIKI_TYPE || $node_type == ISA_FEDERATED_PROJECT_TYPE
                    || $node_type == ISA_ISSUE_TYPE || $node_type == ISA_PROJECT_RELEASE_TYPE
                    || $node_type == ISA_IMAGE_TYPE || $node_type == ISA_FEDERATED_FORGE_TYPE
                    || $node_type == ISA_NEWSLETTER_TYPE || ($node_type == 'people' && is_numeric($alias_parts[1]) && empty($alias_parts[2]))) {
                $vars['title'] = '';
            }
        }
    }

    //set collapsed to fieldset (for filters)
    $vars['filter_collapsed'] = 'collapsed';
    if (arg(2) == 'members' && isset($_GET['field_lastname_value'])) {
        $vars['filter_collapsed'] = '';
    }

    if (isa_toolbox_is_in_virtual_forge()) {
        joinup_rewrite_primary_links_vf($vars['primary_links']);
    }
    // SGS : enable primary links in isa-icp theme settings
    //precare solution to get the active menu, before we find why the $vars['primary_links'] is empty
    //$vars['primary_links'] = menu_primary_links();
    //context_get_plugin('reaction', 'menu')->execute($vars);
    joinup_set_active_primary_links($vars);

    if (variable_get('message_status', 1) == 0 && variable_get('message_text', "") != "") {

        $message .= "<div class=\"messages infobox\">\n";
        $message .= variable_get('message_text', "test");
        $message .= "</div>\n";
		
		$vars['messages'] = $message.$vars['messages'];
    }


}

/**
 * change path of stylesheet for virtual forge
 *
 * @param type $vars
 */
function joinup_change_css_for_vf(&$vars) {
    $tid = isa_toolbox_is_in_virtual_forge();
    if ($tid) {
        $term = taxonomy_get_term($tid);
        $vf_name = $term->name;
        $css = drupal_add_css();
        foreach ($css as $media => $value) {
            if (isset($value['theme'])) {
                foreach ($value['theme'] as $css_path => $preprocess) {
                    $css_new_path = preg_replace('#default#', $vf_name, $css_path);
                    $css[$media]['theme'][$css_new_path] = $preprocess;
                    unset($css[$key]['theme'][$css_path]);
                }
            }
        }
        $vars['css'] = $css;
        $vars['styles'] = drupal_get_css($css);
    }
}

/**
 *
 * @param string $primary_links
 */
function joinup_rewrite_primary_links_vf(&$primary_links) {
    foreach ($primary_links as $id => $value) {
        if (strpos($id, MENU_HOME) !== FALSE) {
            $primary_links[$id]['href'] = 'vf-' . $value['href'];
        } elseif (strpos($id, MENU_COMMUNITY) === FALSE && strpos($id, MENU_SOFTWARE) === FALSE
                && strpos($id, MENU_ASSET) === FALSE && strpos($id, MENU_MYPAGE) === FALSE) {
            unset($primary_links[$id]);
        }
    }
}

/**
 *
 * @param type $vars
 */
function joinup_set_active_primary_links(&$vars) {

    $path = $_GET['q'];
    $path = explode('/', $path);

    if ($path[0] == 'node' || $path[0] == 'comment' /* && is_numeric($path[1]) */) {
      $nid = variable_get('current_group', isa_toolbox_get_community_nid());
        if ($nid || $_GET['q'] == 'node/add/project-project') {

            if ($nid) {
                $group = node_load($nid);
                $type = strtoupper($group->group_type);
                if ($group->group_type == ISA_REPOSITORY_TYPE) {
                    $type = 'ASSET';
                }
            } else {
                $type = ($_GET['type'] == 'OSS') ? 'SOFTWARE' : 'ASSET';
            }
            $vars['primary_links'][constant('MENU_' . $type)]['attributes']['class'] .= ' active';
        } else {
            $node = menu_get_object();
            if (!$node) {
                if ($path[0] == 'comment' && is_numeric($path[2])) {
                    if ($path[1] == 'edit') {
                        $comment = _comment_load($path[2]);
                        $node = node_load($comment->nid);
                    } else {
                        $node = node_load($path[2]);
                    }
                }
            }
            if ($path[1] == 'add') {
                $type = $path[2];
            } else {
                $type = $node->type;
            }
            if ($type == ISA_CASE_TYPE) {
                switch (isa_toolbox_get_case_type($node)) {
                    case 1 : $type = ISA_SOFTWARE_TYPE;
                        break;
                    case 2 : $type = ISA_SOFTWARE_TYPE;
                        break;
                }
            }

            switch ($type) {
                case ISA_NEWS_TYPE:
                case ISA_BLOG_TYPE:
                case ISA_NEWSLETTER_TYPE:
                    if (!isset($vars['primary_links'][MENU_NEWS . ' active'])) {
                        $vars['primary_links'][MENU_NEWS]['attributes']['class'] .= ' active';
                    }
                    break;
                case ISA_DOCUMENTATION_TYPE:
                case ISA_DISTRIBUTION_TYPE:
                case ISA_LICENCE_TYPE:
                case ISA_ITEM_TYPE:
                case ISA_PUBLISHER_TYPE:
                case ISA_CONTACT_POINT_TYPE:
                case ISA_REPOSITORY_TYPE:
                case ISA_ASSET_RELEASE_TYPE:
                case 'asset-release':
                    if (!isset($vars['primary_links'][MENU_ASSET . ' active'])) {
                        $vars['primary_links'][MENU_ASSET]['attributes']['class'] .= ' actives';
                    }
                    break;
                case ISA_CASE_TYPE:
                case ISA_DOCUMENT_TYPE:
                case ISA_PRESENTATION_TYPE:
                case ISA_VIDEO_TYPE:
                case ISA_FACTSHEET_TYPE:
                    if (!isset($vars['primary_links'][MENU_ELIBRARY . ' active'])) {
                        $vars['primary_links'][MENU_ELIBRARY]['attributes']['class'] .= ' active';
                    }
                    break;
                case ISA_EVENT_TYPE:
                    if (!isset($vars['primary_links'][MENU_EVENT . ' active'])) {
                        $vars['primary_links'][MENU_EVENT]['attributes']['class'] .= ' active';
                    }
                    break;
                case ISA_STUDY_TYPE:
                    if (!isset($vars['primary_links'][MENU_SOFTWARE . ' active'])) {
                        $vars['primary_links'][MENU_SOFTWARE]['attributes']['class'] .= ' active';
                    }
                    break;
                //wiki not in a group is a license wizard
                case ISA_WIKI_TYPE:
                case ISA_SOFTWARE_TYPE:
                    if (!isset($vars['primary_links'][MENU_SOFTWARE . ' active'])) {
                        $vars['primary_links'][MENU_SOFTWARE]['attributes']['class'] .= ' active';
                    }
                    break;
            }
        }
    }
}

/**
 * Theme function for rendering the relevant nodes into a block.
 *
 * This is provided so that an item list is the default, however a themer can
 * easily override this to make a teaser list or table.
 *
 * @param $nodes
 *   Associative array where the key is the node id and the value is the node title
 * @param $header
 *   Optional string to display at the top of the block
 */
function joinup_relevant_content_block($nodes, $header = FALSE, $delta = NULL) {
    $output = "";
    $output .= "<div class='right-sidebar-colspans-5'>";
    $output .= "<div class='view-content'>";
    $i = 0;	
    foreach ($nodes as $node) {
        $node = node_load($node['nid']);
        if ($i++ % 2 == 0) {
            $output .= "<div class='odd clearfix'>";
        } else {
            $output .= "<div class='even clearfix'>";
        }

        // print a div around "created | country"
        isa_toolbox_get_user_country($node);
        $output .= "<div class='colspan-5'>";
        $output .= "<span class='field field-created'>" . date('d F Y', $node->created) . "</span>";
        if (isset($node->country) && $node->country != '') {
            $output .= "<span class='field field-country'> | " . $node->country . "</span>";
        }
        $output .= "</div>";

        // print node title with a link to the node
        $output .= "<div class='colspan-5 field field-title'>";
        $output .= "<strong>" . l($node->title, 'node/' . $node->nid) . "</strong>";
        $output .= "</div>";

        $output .= "</div>";
    }
    $output .= "</div>";
    $output .= "</div>";
    return $output;
}

/**
 * Override or insert variables into the "block.tpl.php" templates.
 *
 * @param $vars
 *   An array of variables to pass to the theme template.
 *
 * @see block.tpl.php
 * @ingroup phptemplate
 */
function joinup_preprocess_block(&$vars) {
    // Create the block object.
    $block = $vars['block'];

	// Changes title for Multistep block to the node help field
	if ($block->module == 'multistep') {
		$type = $block->delta;
		$type = node_get_types('type', $type);
		$block->subject = strip_tags($type->help);
	}

	$vars['block_class'] = '';
	$vars['accessibility_class'] = '';
	// Set the block class depending on the content type.
	if ($block->subject) {
		$vars['block_class'] = str_replace(array(" ", "'"), array('-', ''), strtolower($block->subject));
	}
	// Set the accessibility class depending on the block type.
	if ($block->module == 'search' || $block->module == 'user' || $block->module == 'menu') {
		$vars['accessibility_class'] = ' class="accessibility-info"';
	}
	// Change block menu news content
	if ($block->module == 'menu' && $block->delta == 'menu-news-menu') {
		$block->content = drupal_get_form('joinup_menu_news_form');
	}
	// Change block menu news content
	if ($block->module == 'menu' && $block->delta == 'menu-elibrary') {
		$block->content = drupal_get_form('joinup_menu_elibrary_form');
	}

	//Change title of block related content
	if ($block->subject == 'Relevant Content') {
		$block->subject = strip_tags('Related Content');
	}

	if ($block->context == 'search_page') {
		$vars['block_class'] = 'block_apachesolr_search';
	}

	// Set the block heading depending on the homepage and several regions.
	($block->region == 'highlight' || $block->region == 'header') ? $vars['heading_type'] = 'h2' : $vars['heading_type'] = 'h3';
        //https://webgate.ec.europa.eu/CITnet/jira/browse/ISAICP-841
        //Remove titles from blocks
        $titles_to_remove =  array('home_carousel-block_1', 'Advertisement-block_1');
        if(in_array($block->delta, $titles_to_remove)){
            unset($vars['block']->subject);
        }

}

/**
 * Process variables for maintenance-page.tpl.php.
 *
 * The $variables array contains the following arguments:
 * - $results
 * - $type
 *
 * @see maintenance-page.tpl.php
 * @see maintenance-page-offline.tpl.php
 */
function joinup_preprocess_maintenance_page(&$variables) {
  global $conf;
  $variables['global_header_title'] = $conf['global_site_header'];
  $variables['breadcrumb'] = l($variables['site_name'], '<front>');
}

/**
 * Override or insert variables into the "node.tpl.php" templates.
 *
 * @param $vars
 *   An array of variables to pass to the theme template.
 *
 * @see node.tpl.php
 * @see template.node.inc
 * @ingroup phptemplate
 */
function joinup_preprocess_node(&$vars) {
    $theme = variable_get('theme_default', NULL);
    $theme_path = drupal_get_path('theme', $theme);
    include_once $theme_path . '/includes/template.node.inc';
    _joinup_preprocess_node($vars);
}

/**
 * Return a themed breadcrumb trail.
 *
 * @param
 *   An array containing the breadcrumb links.
 *
 * @return
 *   A string containing the breadcrumb output.
 *
 * @see page.tpl.php
 */

/**
 * prepare text
 */

function format_text($string){
	$new_string = $string;
	$new_string = str_replace('-', ' ', $new_string);
	$new_string = str_replace('_', ' ', $new_string);
	$new_string = urldecode($new_string);
	$new_string = ucfirst($new_string);
	return $new_string;
}

function fromat_url($url)
{
	$new_url = $url;
	$new_url = urldecode($new_url);
	return $new_url;
}

/**
 * Override theme_breadcrumb().
 */
function joinup_breadcrumb($breadcrumb) {
	global $user;
	$breadcrumb = array();
	$normal_path = trim($_GET['q'], '/');
	$normal_path_parts = explode('/', $normal_path);
	$normal_path_begin = implode('/', array($normal_path_parts[0],
			$normal_path_parts[1]));
	$path_alias = drupal_get_path_alias($normal_path);
	$path_alias_parts = explode('/', $path_alias);
	$referer_uri = referer_uri();

	$i = 0;
	$last = count($path_alias_parts) - 1;

	array_push($breadcrumb, l('Joinup', '<front>'));

	/*print_r($referer_uri);
	echo "<p>";

	print_r($path_alias);
	echo "<p>";

	print_r($path_alias_parts);
	echo "<p>";*/

	switch($path_alias_parts[0]){
		case 'homepage':
			//array_push($breadcrumb, l('Joinup', '<front>'));
			break;
		case 'community':
			array_push($breadcrumb, l('Communities', 'community/all'));
			if($last == 1){
				switch($path_alias_parts[1]){
					case 'all':
						array_push($breadcrumb, l('Find Community', 'community/all'));
						break;
					case 'mine':
						array_push($breadcrumb, l('My Communities', 'community/mine'));
						break;
					case 'recommended':
						array_push($breadcrumb, l('Recommended', 'community/recommended'));
						break;
					case 'editor':
						array_push($breadcrumb, l("Editor's choice", 'community/editor'));
						break;
				}
			}elseif($last > 1){
				switch ($path_alias_parts[2]){
					case 'home':
						array_push($breadcrumb, l(format_text($path_alias_parts[1]), 'community/' .$path_alias_parts[1] . '/home'));
						array_push($breadcrumb, l('Welcome', 'community/' . $path_alias_parts[1] . '/home'));
						break;
					case 'description':
						array_push($breadcrumb, l(format_text($path_alias_parts[1]), 'community/' . $path_alias_parts[1] . '/home'));
						array_push($breadcrumb, l(format_text($path_alias_parts[2]), 'community/' .$path_alias_parts[1] . '/' . $path_alias_parts[2]));
						break;
					case 'members':
						array_push($breadcrumb, l(format_text($path_alias_parts[1]), 'community/' . $path_alias_parts[1] . '/home'));
						array_push($breadcrumb, l('Members list', 'community/' .$path_alias_parts[1] . '/' . $path_alias_parts[2]));
						break;
					case 'metrics':
						array_push($breadcrumb, l(format_text($path_alias_parts[1]), 'community/' . $path_alias_parts[1] . '/home'));
						array_push($breadcrumb, l(format_text($path_alias_parts[2]), 'community/' .$path_alias_parts[1] . '/' . $path_alias_parts[2]));
						break;
					case 'highlights':
						switch($path_alias_parts[3]){
							case 'asset':
								array_push($breadcrumb, l(format_text($path_alias_parts[1]), 'community/' . $path_alias_parts[1] . '/home'));
								array_push($breadcrumb, l('Semantic assets', 'community/' .$path_alias_parts[1] . '/' . $path_alias_parts[2] . '/' . $path_alias_parts[3] . '/' . $path_alias_parts[4]));
								break;
							case 'software':
								array_push($breadcrumb, l(format_text($path_alias_parts[1]), 'community/' . $path_alias_parts[1] . '/home'));
								array_push($breadcrumb, l('Software', 'community/' .$path_alias_parts[1] . '/' . $path_alias_parts[2] . '/' . $path_alias_parts[3] . '/' . $path_alias_parts[4]));
								break;
							case 'community':
								array_push($breadcrumb, l(format_text($path_alias_parts[1]), 'community/' . $path_alias_parts[1] . '/home'));
								array_push($breadcrumb, l('Communities', 'community/' .$path_alias_parts[1] . '/' . $path_alias_parts[2] . '/' . $path_alias_parts[3] . '/' . $path_alias_parts[4]));
								break;
						}
						break;
					case 'forum':
						array_push($breadcrumb, l(format_text($path_alias_parts[1]), 'community/' . $path_alias_parts[1] . '/home'));
						array_push($breadcrumb, l('Forums', 'community/' .$path_alias_parts[1] . '/' . $path_alias_parts[2] . '/' . $path_alias_parts[3]));
						if($last > 2){
							$breadcrumb = array();
							$breadcrumb = joinup_breadcrumb_oldfunction($breadcrumb);
						}
						break;
					case 'newsandblog':
						array_push($breadcrumb, l(format_text($path_alias_parts[1]), 'community/' . $path_alias_parts[1] . '/home'));
						array_push($breadcrumb, l('News', 'community/' .$path_alias_parts[1] . '/' . $path_alias_parts[2] . '/' . $path_alias_parts[3]));
						break;
					case 'event':
						array_push($breadcrumb, l(format_text($path_alias_parts[1]), 'community/' . $path_alias_parts[1] . '/home'));
						array_push($breadcrumb, l('Events', 'community/' .$path_alias_parts[1] . '/' . $path_alias_parts[2] . '/' . $path_alias_parts[3]));
						break;
					case 'elibrary':
						array_push($breadcrumb, l(format_text($path_alias_parts[1]), 'community/' . $path_alias_parts[1] . '/home'));
						array_push($breadcrumb, l('e-Library', 'community/' .$path_alias_parts[1] . '/' . $path_alias_parts[2] . '/' . $path_alias_parts[3]));
						break;
					case 'news':
						$breadcrumb = array();
						$breadcrumb = joinup_breadcrumb_oldfunction($breadcrumb);
						break;
					case 'document':
						$breadcrumb = array();
						$breadcrumb = joinup_breadcrumb_oldfunction($breadcrumb);
						break;
					case 'wiki':
						$breadcrumb = array();
						$breadcrumb = joinup_breadcrumb_oldfunction($breadcrumb);
						break;
				}
			}//end of community
			break;
		case 'catalogue':
			array_push($breadcrumb, l('Semantic assets', 'catalogue/all'));
			if($last == 1){
				switch($path_alias_parts[1]){
					case 'all':
						array_push($breadcrumb, l('Catalogue', 'catalogue/all'));
						break;
				}
			}
			if($last >= 1){
				switch($path_alias_parts[1]){
					case 'asset_release':
						array_push($breadcrumb, l('Catalogue', 'catalogue/all'));
						if((strpos($referer_uri,'/catalogue/repository/') !== false)){
							array_pop($breadcrumb);
							array_push($breadcrumb, l('Federated repositories', 'catalogue/repository'));
							$referer_uri_parts = explode('/', $referer_uri);
							//Refered page asset name
							$j=0;
							$end =count($referer_uri_parts) - 1;
							$array_asset = '';
							while($j<=$end){
								if($referer_uri_parts[$j] == 'repository'){
									++$j;
									while($j<=$end){
										$array_asset .= "/" . $referer_uri_parts[$j];
										++$j;
									}
								}else{
									++$j;
								}
							}
							$publisher_name = '';
							$j=2;
							$end =count($path_alias_parts) - 1;
							while($j<=$end){
								$publisher_name .= "/" . $path_alias_parts[$j];
								++$j;
							}
							array_push($breadcrumb, l(format_text(substr($array_asset, 1)), 'catalogue/repository' . $array_asset));
						}
						array_push($breadcrumb, l(format_text($path_alias_parts[2]), 'catalogue/asset_release/' . $path_alias_parts[2]));
						$_SESSION['breadcrumb'] = $breadcrumb;
						break; //end asset release
					case 'distribution':
						if((strpos($referer_uri,'/asset_release/') !== false)){
							$referer_uri_parts = explode('/', $referer_uri);
							//Refered page asset name
							$j=0;
							$end =count($referer_uri_parts) - 1;
							$array_asset = '';
							while($j<=$end){
								if($referer_uri_parts[$j] == 'asset_release'){
									++$j;
									while($j<=$end){
										$array_asset .= "/" . $referer_uri_parts[$j];
										++$j;
									}
								}else{
									++$j;
								}
							}
							//Distribution name
							$j=0;
							$end =count($path_alias_parts) - 1;
							$array_distribution = '';
							while($j<=$end){
								if($path_alias_parts[$j] == 'distribution'){
									++$j;
									while($j<=$end){
										$array_distribution .= "/" . $path_alias_parts[$j];
										++$j;
									}
								}else{
									++$j;
								}
							}

							$distribution_name = array_pop($referer_uri_parts);
							array_push($breadcrumb, l('Catalogue', 'catalogue/all'));
							array_push($breadcrumb, l(format_text(substr($array_asset, 1)), $referer_uri));
							array_push($breadcrumb, l(format_text(substr($array_distribution, 1)), 'catalogue/distribution' . $array_distribution));
							$_SESSION['breadcrumb'] = $breadcrumb;
						}else{
							$old_breadcrumb = $_SESSION['breadcrumb'];
							if(strpos($old_breadcrumb[4], '/distribution/')){
								$breadcrumb = $old_breadcrumb;
							}else{
								array_push($breadcrumb, l('Catalogue', 'catalogue/all'));
								//array_push($breadcrumb, l('Distribution', 'catalogue/distribution/all'));
								array_push($breadcrumb, l(format_text($path_alias_parts[2]), $path_alias));
							}
						}
						break; //end distribution
					case 'repository':
						array_push($breadcrumb, l('Federated repositories', 'catalogue/repository'));
						if($path_alias_parts[2] && $path_alias_parts[2] != 'all'){
							array_push($breadcrumb, l(format_text($path_alias_parts[2]), $path_alias));
						}
						break;
					case 'publisher':
						if((strpos($referer_uri,'/repository/') !== false)){
							$referer_uri_parts = explode('/', $referer_uri);
							//Refered page asset name
							$j=0;
							$end =count($referer_uri_parts) - 1;
							$array_project = '';
							while($j<=$end){
								if($referer_uri_parts[$j] == 'repository'){
									++$j;
									while($j<=$end){
										$array_project .= "/" . $referer_uri_parts[$j];
										++$j;
									}
								}else{
									++$j;
								}
							}
							$publisher_name = '';
							$j=2;
							$end =count($path_alias_parts) - 1;
							while($j<=$end){
								$publisher_name .= "/" . $path_alias_parts[$j];
								++$j;
							}
							array_push($breadcrumb, l('Federated repositories', 'catalogue/repository'));
							array_push($breadcrumb, l(format_text(substr($array_project, 1)), 'catalogue/repository' . $array_project));
							array_push($breadcrumb, l(format_text(substr($publisher_name, 1)), $path_alias));

						}elseif((strpos($referer_uri,'/distribution/') !== false)){
							$referer_uri_parts = explode('/', $referer_uri);
							//Refered page asset name
							$j=0;
							$end =count($referer_uri_parts) - 1;
							$array_asset = '';
							while($j<=$end){
								if($referer_uri_parts[$j] == 'distribution'){
									++$j;
									while($j<=$end){
										$array_asset .= "/" . $referer_uri_parts[$j];
										++$j;
									}
								}else{
									++$j;
								}
							}
							$publisher_name = '';
							$j=2;
							$end =count($path_alias_parts) - 1;
							while($j<=$end){
								$publisher_name .= "/" . $path_alias_parts[$j];
								++$j;
							}
							array_push($breadcrumb, l('Catalogue', 'catalogue/all'));
							array_push($breadcrumb, l(format_text(substr($array_asset, 1)), 'catalogue/distribution' . $array_asset));
							array_push($breadcrumb, l(format_text(substr($publisher_name, 1)), $path_alias));
						}
						elseif((strpos($referer_uri,'/asset_release/') !== false)){
							$referer_uri_parts = explode('/', $referer_uri);
							//Refered page asset name
							$j=0;
							$end =count($referer_uri_parts) - 1;
							$array_asset = '';
							while($j<=$end){
								if($referer_uri_parts[$j] == 'asset_release'){
									++$j;
									while($j<=$end){
										$array_asset .= "/" . $referer_uri_parts[$j];
										++$j;
									}
								}else{
									++$j;
								}
							}
							$publisher_name = '';
							$j=2;
							$end =count($path_alias_parts) - 1;
							while($j<=$end){
								$publisher_name .= "/" . $path_alias_parts[$j];
								++$j;
							}
							array_push($breadcrumb, l('Catalogue', 'catalogue/all'));
							array_push($breadcrumb, l(format_text(substr($array_asset, 1)), 'catalogue/asset_release' . $array_asset));
							array_push($breadcrumb, l(format_text(substr($publisher_name, 1)), $path_alias));
						}
						break;
					case 'licence':
						if((strpos($referer_uri,'/distribution/') !== false)){
							/*$referer_uri_parts = explode('/', $referer_uri);
							//Refered page asset name
							$j=0;
							$end =count($referer_uri_parts) - 1;
							$array_asset = '';
							while($j<=$end){
								if($referer_uri_parts[$j] == 'distribution'){
									++$j;
									while($j<=$end){
										$array_asset .= "/" . $referer_uri_parts[$j];
										++$j;
									}
								}else{
									++$j;
								}
							}*/
							$old_breadcrumb = $_SESSION['breadcrumb'];
							$breadcrumb = $old_breadcrumb;

							$publisher_name = '';
							$j=2;
							$end =count($path_alias_parts) - 1;
							while($j<=$end){
								$publisher_name .= "/" . $path_alias_parts[$j];
								++$j;
							}
							//array_push($breadcrumb, l('Catalogue', 'catalogue/all'));
							//array_push($breadcrumb, l(format_text(substr($array_asset, 1)), 'catalogue/distribution' . $array_asset));
							array_push($breadcrumb, l(format_text(substr($publisher_name, 1)), $path_alias));
						}
						else{
							array_push($breadcrumb, l('Catalogue', 'catalogue/all'));
							array_push($breadcrumb, l('Licence', 'catalogue/licence/all'));
							array_push($breadcrumb, l(format_text($path_alias_parts[2]), $path_alias));
						}
						break;
				}

			}
			break;//end of Catalogue
		case'asset':
			//$breadcrumb = array();
			//$breadcrumb = joinup_breadcrumb_oldfunction($breadcrumb);

			array_push($breadcrumb, l('Semantic assets', 'catalogue/all'));

			if($last == 1){
				switch($path_alias_parts[1]){
					case 'recommended':
						array_push($breadcrumb, l('Recommended', 'asset/recommended'));
						break;
					case 'i_use':
						array_push($breadcrumb, l('Assets I use', 'asset/i_use'));
						break;
					case 'editor':
						array_push($breadcrumb, l("Editor's choice", 'asset/editor'));
						break;
					case 'all':
						array_push($breadcrumb, l('Projects', 'asset/all'));
						break;
				}
			}
			if($last > 1){
				array_push($breadcrumb, l('Projects', 'asset/all'));
				switch ($path_alias_parts[2]){
					case 'home':
						array_push($breadcrumb, l(format_text($path_alias_parts[1]), 'asset/' .$path_alias_parts[1] . '/home'));
						array_push($breadcrumb, l('Welcome', 'asset/' . $path_alias_parts[1] . '/home'));
						break;
					case 'description':
						array_push($breadcrumb, l(format_text($path_alias_parts[1]), 'asset/' . $path_alias_parts[1] . '/home'));
						array_push($breadcrumb, l(format_text($path_alias_parts[2]), 'asset/' .$path_alias_parts[1] . '/' . $path_alias_parts[2]));
						break;
					case 'members':
						array_push($breadcrumb, l(format_text($path_alias_parts[1]), 'asset/' . $path_alias_parts[1] . '/home'));
						array_push($breadcrumb, l(format_text($path_alias_parts[2]), 'asset/' .$path_alias_parts[1] . '/' . $path_alias_parts[2]));
						break;
					case 'issue':
						array_push($breadcrumb, l(format_text($path_alias_parts[1]), 'asset/' . $path_alias_parts[1] . '/home'));
						array_push($breadcrumb, l(format_text($path_alias_parts[2]), 'asset/' .$path_alias_parts[1] . '/' . $path_alias_parts[2] . '/all'));
						if($last==3){
							array_push($breadcrumb, l(format_text($path_alias_parts[3]), 'asset/' .$path_alias_parts[1] . '/' . $path_alias_parts[2] . '/' . $path_alias_parts[3]));
						}
						break;
					case 'asset_release':
						array_push($breadcrumb, l(format_text($path_alias_parts[1]), 'asset/' . $path_alias_parts[1] . '/home'));
						array_push($breadcrumb, l(format_text($path_alias_parts[2]), 'asset/' .$path_alias_parts[1] . '/' . $path_alias_parts[2] . '/all'));
						if($last==3){
							array_push($breadcrumb, l(format_text($path_alias_parts[3]), 'asset/' .$path_alias_parts[1] . '/' . $path_alias_parts[2] . '/' . $path_alias_parts[3]));
						}
						break;
					case 'metrics':
						array_push($breadcrumb, l(format_text($path_alias_parts[1]), 'asset/' . $path_alias_parts[1] . '/home'));
						array_push($breadcrumb, l(format_text($path_alias_parts[2]), 'asset/' .$path_alias_parts[1] . '/' . $path_alias_parts[2]));
						break;
					case 'highlights':
						switch($path_alias_parts[3]){
							case 'asset':
								array_push($breadcrumb, l(format_text($path_alias_parts[1]), 'asset/' . $path_alias_parts[1] . '/home'));
								array_push($breadcrumb, l('Semantic assets', 'asset/' .$path_alias_parts[1] . '/' . $path_alias_parts[2] . '/' . $path_alias_parts[3] . '/' . $path_alias_parts[4]));
								break;
							case 'software':
								array_push($breadcrumb, l(format_text($path_alias_parts[1]), 'asset/' . $path_alias_parts[1] . '/home'));
								array_push($breadcrumb, l('Software', 'asset/' .$path_alias_parts[1] . '/' . $path_alias_parts[2] . '/' . $path_alias_parts[3] . '/' . $path_alias_parts[4]));
								break;
							case 'community':
								array_push($breadcrumb, l(format_text($path_alias_parts[1]), 'asset/' . $path_alias_parts[1] . '/home'));
								array_push($breadcrumb, l('Communities', 'asset/' .$path_alias_parts[1] . '/' . $path_alias_parts[2] . '/' . $path_alias_parts[3] . '/' . $path_alias_parts[4]));
								break;
						}
						break;
					case 'forum':
						array_push($breadcrumb, l(format_text($path_alias_parts[1]), 'asset/' . $path_alias_parts[1] . '/home'));
						array_push($breadcrumb, l('Forums', 'asset/' .$path_alias_parts[1] . '/' . $path_alias_parts[2] . '/' . $path_alias_parts[3]));
						if($last==3){
							array_push($breadcrumb, l(format_text($path_alias_parts[3]), $path_alias));
						}
						break;
					case 'newsandblog':
						array_push($breadcrumb, l(format_text($path_alias_parts[1]), 'asset/' . $path_alias_parts[1] . '/home'));
						array_push($breadcrumb, l('News', 'asset/' .$path_alias_parts[1] . '/' . $path_alias_parts[2] . '/' . $path_alias_parts[3]));
						break;
					case 'news':
						array_push($breadcrumb, l(format_text($path_alias_parts[1]), 'asset/' . $path_alias_parts[1] . '/home'));
						array_push($breadcrumb, l('News', 'asset/' .$path_alias_parts[1] . '/' .'newsandblog/all'));
						array_push($breadcrumb, l(format_text($path_alias_parts[3]), $path_alias));
						break;
					case 'event':
						array_push($breadcrumb, l(format_text($path_alias_parts[1]), 'asset/' . $path_alias_parts[1] . '/home'));
						array_push($breadcrumb, l('Events', 'asset/' .$path_alias_parts[1] . '/' . $path_alias_parts[2] . '/' . $path_alias_parts[3]));
						if($last==3){
							array_push($breadcrumb, l(format_text($path_alias_parts[3]), $path_alias));
						}
						break;
					case 'elibrary':
						array_push($breadcrumb, l(format_text($path_alias_parts[1]), 'asset/' . $path_alias_parts[1] . '/home'));
						array_push($breadcrumb, l('e-Library', 'asset/' .$path_alias_parts[1] . '/' . $path_alias_parts[2] . '/' . $path_alias_parts[3]));
						break;
					case 'document':
						array_push($breadcrumb, l(format_text($path_alias_parts[1]), 'asset/' . $path_alias_parts[1] . '/home'));
						array_push($breadcrumb, l('e-Library',  'asset/' . $path_alias_parts[1] . '/elibrary/all'));
						array_push($breadcrumb, l(format_text($path_alias_parts[3]), $path_alias));
						break;
					case 'experts':
						array_push($breadcrumb, l(format_text($path_alias_parts[1]), 'asset/' . $path_alias_parts[1] . '/home'));
						array_push($breadcrumb, l('Experts', $path_alias));
						break;
				}
			}
			/*if($last == 1){
				switch ($path_alias_parts[1]){
					case 'experts':
						array_push($breadcrumb, l('Experts', $path_alias));
						break;
				}
			}*/
			break;//end of Project
		case 'metrics':
			array_push($breadcrumb, l(format_text($path_alias_parts[0]), $path_alias_parts[0]));
			break;//end of metrics
		case 'page':
			switch($path_alias_parts[1]){
				case 'about_us':
					array_push($breadcrumb, l(format_text($path_alias_parts[1]), $path_alias));
					break;
				case 'osor.eu':
					array_push($breadcrumb, l(format_text($path_alias_parts[1]), $path_alias));
					break;
				case 'semic.eu':
					array_push($breadcrumb, l(format_text($path_alias_parts[1]), $path_alias));
					break;
				case 'our_services':
					array_push($breadcrumb, l(format_text($path_alias_parts[1]), $path_alias));
					break;
				case 'legal-notice':
					array_push($breadcrumb, l(format_text($path_alias_parts[1]), $path_alias));
					break;
				case 'get_involved':
					array_push($breadcrumb, l(format_text($path_alias_parts[1]), $path_alias));
					break;
				case 'widget':
					array_push($breadcrumb, l(format_text($path_alias_parts[1]), $path_alias));
					break;
				case 'widget_asset':
					array_push($breadcrumb, l(format_text($path_alias_parts[1]), $path_alias));
					break;

			}
			break;//end of page/about us
		case 'help':
			array_push($breadcrumb, l(format_text($path_alias_parts[0]), $path_alias));
			break;//end of help
		case 'help_topics':
			array_push($breadcrumb, l('FAQ', $path_alias));
			break;//end of help
		case 'contexthelp_faq':
			array_push($breadcrumb, l('FAQ', 'help_topics'));
			array_push($breadcrumb, l(format_text($path_alias_parts[1]), $path_alias));
			break;//end of FAQ
		case 'sitemap':
			array_push($breadcrumb, l(format_text($path_alias_parts[0]), $path_alias));
			break;//end of Sitemap
		case 'partners':
			array_push($breadcrumb, l(format_text($path_alias_parts[0]), $path_alias));
			break;//end of Partners
		case 'glossary':
			array_push($breadcrumb, l(format_text($path_alias_parts[0]), $path_alias));
			break;//end of Glossary home
		case 'category':
			if($path_alias_parts[1] == 'glossary'){
				array_push($breadcrumb, l(format_text($path_alias_parts[1]), 'glossary'));
				array_push($breadcrumb, l(format_text($path_alias_parts[2]), $path_alias));
			}
			break;//end of Glossary tems
		case 'search':
			array_push($breadcrumb, l('Advanced search', $path_alias));
			break;//end of Search
		case 'newsletter':
			array_push($breadcrumb, l(format_text($path_alias_parts[0]), 'news/newsletter'));
			array_push($breadcrumb, l(format_text($path_alias_parts[1]), $path_alias));
			break;//end of Search
		case 'federated_forge':
			array_push($breadcrumb, l(format_text($path_alias_parts[0]), 'software/federated_forge'));
			array_push($breadcrumb, l(format_text($path_alias_parts[1]), $path_alias));
			break;//end of Search
		case 'federated_project':
			array_push($breadcrumb, l(format_text($path_alias_parts[0]), 'software/federated_forge'));
			array_push($breadcrumb, l(format_text($path_alias_parts[1]), $path_alias));
			break;//end of
		case 'software':
			$text = $path_alias_parts[1];
			if($text == 'all' || $text == 'federated_forge' ||  $text == 'my_oss' || $text == 'i_use' ||
					 $text == 'recommended' || $text == 'editor' || $text == 'license-wizard' || $text == 'page'){
				array_push($breadcrumb, l('Software', 'software/all'));
				if($last == 1){
					switch($path_alias_parts[1]){
						case 'all':
							array_push($breadcrumb, l('Software projects', 'software/all'));
							break;
						case 'federated_forge':
							array_push($breadcrumb, l('Federated Repositories', 'software/federated_forge'));
							break;
						case 'my_oss':
							array_push($breadcrumb, l("My Software Projects", 'software/my_oss'));
							break;
						case 'i_use':
							array_push($breadcrumb, l('Software I use', 'software/i_use'));
							break;
						case 'recommended':
							array_push($breadcrumb, l('Recommended', 'software/recommended'));
							break;
						case 'editor':
							array_push($breadcrumb, l("Editor's choice", 'software/editor'));
							break;
					}
				}
				elseif($last > 1){
					switch($path_alias_parts[1]){
						case 'license-wizard':
							array_push($breadcrumb, l('License Wizard', 'software/license-wizard/home'));
							if($path_alias_parts[2] && $path_alias_parts[2] != 'home'){
								array_push($breadcrumb, l(format_text($path_alias_parts[2]), $path_alias));
							}
							break;
						case 'page':
							switch($path_alias_parts[2]){
								case 'eupl':
									array_push($breadcrumb, l('EUPL', 'software/page/eupl'));
									if($path_alias_parts[3]){
										array_push($breadcrumb, l(format_text($path_alias_parts[3]), $path_alias));
									}
									break;
								default:
									array_push($breadcrumb, l(format_text($path_alias_parts[2]), $path_alias));
									break;
							}
							break;
					}
				}
			}else{
				$breadcrumb = array();
				$breadcrumb = joinup_breadcrumb_oldfunction($breadcrumb);
			}
			break;//end of
		case 'admin':
			$breadcrumb = array();
			$breadcrumb = joinup_breadcrumb_oldfunction($breadcrumb);
			break;//end of
		case 'node':
			$breadcrumb = array();
			$breadcrumb = joinup_breadcrumb_oldfunction($breadcrumb);
			break;//end of
		case 'elibrary':
			$breadcrumb = array();
			$breadcrumb = joinup_breadcrumb_oldfunction($breadcrumb);
			break;//end of
		case 'news':
			$breadcrumb = array();
			$breadcrumb = joinup_breadcrumb_oldfunction($breadcrumb);
			break;//end of
		case 'event':
			$breadcrumb = array();
			$breadcrumb = joinup_breadcrumb_oldfunction($breadcrumb);
			break;//end of
		case 'people':
			$breadcrumb = array();
			$breadcrumb = joinup_breadcrumb_oldfunction($breadcrumb);
			break;//end of
	}
        //https://webgate.ec.europa.eu/CITnet/jira/browse/ISAICP-796
        //Remove echo <p>
	//print_r($breadcrumb);
	return implode(' &#62; ', $breadcrumb);
}


function joinup_breadcrumb_oldfunction($breadcrumb) {
    global $user;
    // if you cannot find a path in the menu router, then try to add some suffixes
    $suffixes = array('all', 'home');
    $primary_links = menu_primary_links();
    //print_r($primary_links);
   // echo "<p>";
    $breadcrumb = array();
    $normal_path = trim($_GET['q'], '/');
    $normal_path_parts = explode('/', $normal_path);
    $normal_path_begin = implode('/', array($normal_path_parts[0],
        $normal_path_parts[1]));
    $path_alias = drupal_get_path_alias($normal_path);
    $referer_uri = referer_uri();

    /*print_r($referer_uri);
    echo "<p>";

    print_r($path_alias);
    echo "<p>";*/
    if (strpos($path_alias, 'node/') === 0
            || strpos($path_alias, 'user/') === 0) {
        $path_alias_begin = drupal_get_path_alias($normal_path_begin);
        $path_alias_end = implode('/', array_slice($normal_path_parts, 2));
        if ($path_alias_end == '') {
            $path_alias = $path_alias_begin;
        } else {
            $path_alias = implode('/', array($path_alias_begin, $path_alias_end));
        }
    } else {
        $path_alias = drupal_get_path_alias($normal_path);
    }
    $path_alias_parts = explode('/', $path_alias);

    //Cases of My page / people
    if ($path_alias_parts[0] == 'people') {
        if ($path_alias_parts[1] == 'dashboard' ||
                $path_alias_parts[1] === $user->uid) {
            $path_alias_parts[0] = 'people/mypage';
        }
    }
// Case of search pages
    if ($path_alias_parts[0] == 'search' && $path_alias_parts[1] == 'apachesolr_search') {
        $path_alias_parts = array();
        $path_alias_parts[0] = 'search';
    }
// Case for resert password page
    if ($path_alias_parts[0] == 'user' && $path_alias_parts[1] == 'reset') {
        unset($path_alias_parts[4]);
        unset($path_alias_parts[2]);
        unset($path_alias_parts[3]);
    }

    // $i is the number of path parts we use for the current breadcrumb path
    $i = 0;
    $last = count($path_alias_parts) - 1;

    // foreach breadcrumb path, generated the corresponding title and linkA
    foreach ($path_alias_parts as $key => $value) {
        ++$i;
        $part_title = '';
        $part_path = implode('/', array_slice($path_alias_parts, 0, $i));
        if ($value == 'page') {
            --$last;
            continue;
        }
        //$part_path = 'people/mypage';
        // try to find a item in the menu router
        $menu_item = menu_get_item($part_path);

        // try to find a item with a suffix in the menu router
        if (!$menu_item) {
            $modified = false;
            foreach ($suffixes as $key2 => $value2) {
                $menu_item = menu_get_item($part_path . '/' . $value2);
                //specific case for News & blogs in groups
                $menu_item2 = menu_get_item($part_path . 'andblog/' . $value2);
                if ($menu_item) {
                    $part_path .= '/' . $value2;
                    $modified = true;
                    break;
                } elseif ($menu_item2) {
                    $part_path .= 'andblog/' . $value2;
                    $part_title = 'News';
                    $modified = true;
                    break;
                }
            }
            // case for federated project
            // federated forge >> federated forge title >> federated project title
            if ($path_alias_parts[0] == 'federated_project') {

                $node = menu_get_object();
                if ($value == 'federated_project') {
                    $federated_forge = node_load($node->field_fed_project_forge[0]['nid']);
                    $breadcrumb[] = l('Federated forges', 'software/federated_forge');
                    $breadcrumb[] = l($federated_forge->title, $federated_forge->path);
                    ++$last;
                    continue;
                } elseif ($value == 'description') {
                    $part_path = $node->path;
                }
            }
            // case for document and wiki in a group:
            // group >> group name >> Elibrary >> item title
            if (($value == "document" || $value == "wiki" || $value == "legaldocument" ) && isset($path_alias_parts[2]) && ($path_alias_parts[2] == 'legaldocument' || $path_alias_parts[2] == 'wiki' || $path_alias_parts[2] == 'document')) {
                $group_types = array(ISA_COMMUNITY_TYPE, ISA_SOFTWARE_TYPE, ISA_ASSET_TYPE);
                if (in_array($path_alias_parts[0], $group_types)) {
                    $node = menu_get_object();
                    if ($node) {
                        $group = node_load(array_shift($node->og_groups));
                    }
                    if (!$group) {
                        $group = node_load(variable_get('current_group', isa_toolbox_get_community_nid()));
                    }
                    $short_name = isa_links_get_group_short_name($group);
                    $breadcrumb[] = l('e-Library', "{$group->group_type}/{$short_name}/elibrary/all");
                    continue;
                }
            }
            // case for blogs :
            // home >> blog >> blog_title >> edit/delete
            if ($value == 'blog') {
                $node = menu_get_object();
                $breadcrumb[] = l('Blogs', "news/blog");
                continue;
            }
            // case for topic :
            // forums >> forum name >> topic item
            if ($value == 'topic') {
                $node = menu_get_object();
                $group = node_load(array_shift($node->og_groups));
                $short_name = isa_links_get_group_short_name($group);
                $breadcrumb[] = l('Forums', "{$group->group_type}/{$short_name}/forum/all");
                foreach ($node->taxonomy as $key => $taxo) {
                    if ($taxo->vid == variable_get('forum_vid', -1)) {
                        $breadcrumb[] = l("{$taxo->name}", "{$group->group_type}/{$short_name}/forum/{$taxo->name}");
                        $last++;
                    }
                }
                continue;
            }
            // case when view/delete/edit group :
            // group >> group title >> description (>> edit/delete)
            // if no define part title here the breadcrumb display group >> group title >> group title
            $part_path_exp = explode('/', $part_path);
            if ((isset($part_path_exp[2]) && $part_path_exp[2] == 'description') && !isset($part_path_exp[3]) && $part_path_exp[0] != 'federated_project') {
                $part_title = ucfirst($value);
            }
            // check the path is not in the next part of breadcrumb
            if ($modified && $i > 1 && $part_path == implode('/', array_slice($path_alias_parts, 0, $i + 1))) {
                --$last;
                continue;
            }
            // check the path is valid (user/% is valid
            // even if there is no people/% entry in the menu router)
            if (!$menu_item && $i != $last && !(menu_get_item(drupal_get_normal_path($part_path)))) {
                if (//($normal_path_parts[2] == 'delete' || $normal_path_parts[2] == 'edit')&&
                        ($value == 'edit' || $value == 'delete' || $value == 'workflow')) {
                    //$part_title = ucfirst($normal_path_parts[2]);
                    //$part_path = $_GET['q'];
                } else {
                    --$last;
                    continue;
                }
            }
        }
        // use the primary links titles for the first part of breadcrumb
        if ($i == 1) {
            foreach ($primary_links as $key3 => $value3) {
                if ($value3['href'] == $part_path) {
                    $part_title = $value3['title'];// Comunities #############
                    switch($value3['title']){
                    	case 'Home':
                    		$part_title = '';
                    		break;
                    }
                    break;
                }
            }
            // manage pages beginning with 'admin' and similar
            if ($part_title == ''){
            	if($path_alias_parts[0] == 'asset'){
            		$part_title = "Projects";
            		array_push($breadcrumb, l('Semantic assets', 'catalogue/all'));
            	}elseif($path_alias_parts[0] == 'catalogue'){
            		$part_title = "Catalogue";
            		array_push($breadcrumb, l('Semantic assets', 'catalogue/all'));
            	}
            	else{
            		$part_title = ucfirst($path_alias_parts[0]); // Primer  ([0] => Asset) *****************
            	}
            }

            //print_r($path_alias_parts);
            //echo "<p>";
        }
        else {
            if ($value == 'home') {
                //groups homepage
                $breadcrumb[] = l(ucfirst($path_alias_parts[1]), $path_alias);
                $last++;
            } else {
                // if a menu item exists, try to get a view title
                if ($menu_item) {
                    $part_title = isa_toolbox_get_view_title($menu_item); //Find comunities ###########
                }
                $menu_item = menu_get_item(drupal_lookup_path('source', $part_path));
// otherwise, get the page title from the path and add a capital letter
                if ($menu_item && $part_title == '') {
                    if ($menu_item['title'] == 'European Union Public Licence (EUPL)') {
                        // only display 'eupl', else it's too long for breadcrumb
                        $part_title = 'EUPL';
                    } elseif ($part_title == '') {
                        $part_title = $menu_item['title']; // nombre de distribucion  3 (ADMS.SW 1.00 )***************
                    }
                } elseif ($part_title == '') {
                	if($value == 'repository'){
                		//array_push($breadcrumb, l('Federated repositories', 'catalogue/repository/all'));
                		$part_title = 'Federated repositories';
                		$part_path = 'catalogue/repository/all';
                	}//elseif($value == 'asset_release'){
                		//$part_title = 'Federated repositories';
                	//	$part_path = 'catalogue/repository/all';
                //	}
                	else{
                		$part_title = ucfirst($value); // before title ( [1] Adms_foss [2] => Asset_release  )***************
                	}
                }
            }
        }
        $breadcrumb[] = l($part_title, $part_path);


    }
    //print_r($breadcrumb);****************************************************
    //die();

    //'node add' cases to not display Node >> Add in the breadcrumb
    if ($path_alias_parts[0] == 'node' && $path_alias_parts[1] == 'add') {
        $breadcrumb = array();
        $nid = $_GET['gids'][0];
        if (!$nid) {
            $nid = variable_get('current_group', isa_toolbox_get_community_nid());
        }
        if ($nid) {
            $node = node_load($nid);
            foreach ($primary_links as $key3 => $value3) {
                if ($value3['href'] == "{$node->group_type}/all") {
                    $part_title = $value3['title'];
                    break;
                }
            }
            $breadcrumb[] = l(ucfirst($part_title), "{$node->group_type}/all");
            $short_name = isa_links_get_group_short_name($node);
            $breadcrumb[] = l(ucfirst($short_name), "{$node->group_type}/{$short_name}/home");
        } else {
            $breadcrumb[$last] = $part_title;
        }
    } elseif ($path_alias_parts[0] == 'toboggan') {
        array_pop($breadcrumb);
        $last--;
    }


    if (count($breadcrumb) > 1) {
        //unlink all admin paths if user is not administrator
        if ($normal_path_parts[0] == 'admin' && !isa_toolbox_is_omnipotent()) {
            foreach ($breadcrumb as $key => $item) {
                $breadcrumb[$key] = strip_tags($item);
            }
        } elseif ($normal_path_parts[0] == 'user') {
            //if on a user/* page, set the last breadcrumb part to firstname and lastname
            if (is_numeric($normal_path_parts[1])) {
                if (!isset($normal_path_parts[2])) {
                    global $user;
                    //throw out the uid from the breadcrumb
                    if ($user->uid != $normal_path_parts[1]) {
                        unset($breadcrumb[$last]);
                    }
                } elseif ($normal_path_parts[2] == 'contact') {
                    $breadcrumb[$last] = t('Contact');
                } elseif ($normal_path_parts[2] == 'edit') {
                    if (isset($normal_path_parts[3])) {
                        unset($breadcrumb[$last]);
                        --$last;
                        if ($normal_path_parts[3] == 'profile') {
                            $breadcrumb[$last] = t('Edit profile');
                        } elseif ($normal_path_parts[3] == 'newsletter') {
                            $breadcrumb[$last] = t('My newsletters');
                        }
                    } else {
                        $breadcrumb[$last] = t('Edit account');
                    }
                }
                $breadcrumb[1] = theme('username', $normal_path_parts[1]);
            }
        } elseif ($normal_path_parts[0] == 'people' && is_numeric($normal_path_parts[1])) {
            //replace uid by user firstname & lastname
            $breadcrumb[1] = theme('username', $normal_path_parts[1]);
        } else {
            // if drupal_get_title tells us about a more precise title, then use it
            $drupal_title = drupal_get_title();
            if ($drupal_title != '') {
                if (isset($path_alias_parts[2]) && $path_alias_parts[2] != 'description'
                        && $normal_path_parts[2] != 'edit' && $normal_path_parts[2] != 'delete' && $normal_path_parts[2] != 'workflow') {
                    $breadcrumb[$last] = $drupal_title;
                }
            }
        }

        array_unshift($breadcrumb, l('Joinup', '<front>'));

        $breadcrumb[count($breadcrumb) - 1] = strip_tags($breadcrumb[count($breadcrumb) - 1]);
    } else {
        $breadcrumb = array();
        //$breadcrumb[0] = l('Home', '<front>');
        $drupal_title = drupal_get_title();
        if ($drupal_title != '') {
        	if($drupal_title == 'Home'){
        		array_unshift($breadcrumb, l('Joinup', '<front>'));
        	}else {
        		switch($drupal_title){
        			case 'Search':
        				array_unshift($breadcrumb, l('Joinup', '<front>'));
        				array_push($breadcrumb, l('Advanced search', 'search/apachesolr_search'));
        				break;
        		}
        		if($drupal_title != 'Search'){
        			$breadcrumb[0] = $drupal_title;
        		}

        	}

        }
    }


    // special case when breadcrumb like Homme>>Catalogue>>Asset_release>>Description
    if ( //(joinup_title_is_in_breadcrumb(t("Home"), 0, $breadcrumb)===1) &&
    (joinup_title_is_in_breadcrumb(t("Catalogue"), 1, $breadcrumb)===1)

    ) {
        if (joinup_title_is_in_breadcrumb("Asset_release", 2, $breadcrumb)===1)
            unset ($breadcrumb[2]);
    } // replace Asset_release by Asset release in link title
    else if ( (joinup_title_is_in_breadcrumb("Asset_release", sizeof($breadcrumb)-2, $breadcrumb)===1)){
        $word = $breadcrumb[sizeof($breadcrumb)-2];
        $count = null;
        $word =  preg_replace('#Asset_release#', 'Asset release', $word, -1, $count);
        $breadcrumb[sizeof($breadcrumb)-2] = $word;
    }//replace Asset_release by Asset release in link title (with edit)
    else if ( (joinup_title_is_in_breadcrumb("Asset_release", sizeof($breadcrumb)-3, $breadcrumb)===1)){
        $word = $breadcrumb[sizeof($breadcrumb)-3];
        $count = null;
        $word =  preg_replace('#Asset_release#', 'Asset release', $word, -1, $count);
        $breadcrumb[sizeof($breadcrumb)-3] = $word;
    }

    return $breadcrumb;
    //return implode(' &#62; ', $breadcrumb);
}
/**
 * return 1 if title is in link of breadcrumb at the specified index 0 otherwise
 * @param type $title
 * @param type $index
 * @param type $breadcrumb
 * @return type
 */
function joinup_title_is_in_breadcrumb($title, $index, $breadcrumb) {
    $returnValue = 0;
    $matches = null;
    $returnValue = preg_match("#\\>$title\\<#", $breadcrumb[$index], $matches);
    return $returnValue;
}

/**
 * Theme preprocess function for field.tpl.php.
 *
 * The $variables array contains the following arguments:
 * - $node
 * - $field
 * - $items
 * - $teaser
 * - $page
 *
 * @see field.tpl.php
 *
 * TODO : this should live in theme/theme.inc, but then the preprocessor
 * doesn't get called when the theme overrides the template. Bug in theme layer ?
 */
function joinup_preprocess_content_field(&$variables) {
    $element = $variables['element'];
    $field = content_fields($element['#field_name'], $element['#node']->type);

    $variables['node'] = $element['#node'];
    $variables['field'] = $field;
    $variables['items'] = array();

    if ($element['#single']) {
        // Single value formatter.
        foreach (element_children($element['items']) as $delta) {
            $variables['items'][$delta] = $element['items'][$delta]['#item'];
            // Use isset() to avoid undefined index message on #children when field values are empty.
            $variables['items'][$delta]['view'] = isset($element['items'][$delta]['#children']) ? $element['items'][$delta]['#children'] : '';
        }
    } else {
        // Multiple values formatter.
        // We display the 'all items' output as $items[0], as if it was the
        // output of a single valued field.
        // Raw values are still exposed for all items.
        foreach (element_children($element['items']) as $delta) {
            $variables['items'][$delta] = $element['items'][$delta]['#item'];
        }
        $variables['items'][0]['view'] = $element['items']['#children'];
    }

    $variables['teaser'] = $element['#teaser'];
    $variables['page'] = $element['#page'];

    $field_empty = TRUE;

    foreach ($variables['items'] as $delta => $item) {
        if (!isset($item['view']) || (empty($item['view']) && (string) $item['view'] !== '0')) {
            $variables['items'][$delta]['empty'] = TRUE;
        } else {
            $field_empty = FALSE;
            $variables['items'][$delta]['empty'] = FALSE;
        }
    }

    $ok = TRUE;

//  if ($element['#field_name']){
//      if (in_array($element['#field_name'], $element['#node']->show_email['fields'])) {
//        $ok = $element['#node']->show_email['check'];
//      }
//
//      if (in_array($element['#field_name'], $element['#node']->show_organization['fields'])) {
//        $ok = $element['#node']->show_organization['check'];
//      }
//
//      if (in_array($element['#field_name'], $element['#node']->show_address['fields'])) {
//        $ok = $element['#node']->show_organization['check'];
//        if ($ok)
//          $ok = $element['#node']->show_address['check'];
//      }
//
//      if (in_array($element['#field_name'], $element['#node']->show_profile['fields'])) {
//        $ok = $element['#node']->show_profile['check'];
//      }
//
//      $preferences = array('field_email_visibility', 'field_organization_visibility', 'field_address_visibility', 'field_profile_visibility');
//      if (in_array($element['#field_name'], $preferences)) {
//        $ok = FALSE;
//      }
//  }


    if ($ok) {
        $additions = array(
            'field_type' => $field['type'],
            'field_name' => $field['field_name'],
            'field_type_css' => strtr($field['type'], '_', '-'),
            'field_name_css' => strtr($field['field_name'], '_', '-'),
            'label' => check_plain(t($field['widget']['label'])),
            'label_display' => $element['#label_display'],
            'field_empty' => $field_empty,
            'template_files' => array(
                'content-field',
                'content-field-' . $element['#field_name'],
                'content-field-' . $element['#node']->type,
                'content-field-' . $element['#field_name'] . '-' . $element['#node']->type,
            ),
        );
        $variables = array_merge($variables, $additions);
    }
    else
        $variables = array();
}

/**
 * Format a fieldgroup using a 'fieldset'.
 *
 * Derived from core's theme_fieldset, with no output if the content is empty.
 */
function joinup_fieldgroup_fieldset($element) {
    $children = $element['#children'];
    $children = strip_tags($children);
    $children = trim($children);
    if (empty($children))
        $element['#children'] = $children;

    if (empty($element['#children']) && empty($element['#value'])) {
        return '';
    }

    if ($element['#collapsible']) {
        drupal_add_js('misc/collapse.js');

        if (!isset($element['#attributes']['class'])) {
            $element['#attributes']['class'] = '';
        }

        $element['#attributes']['class'] .= ' collapsible';
        if ($element['#collapsed']) {
            $element['#attributes']['class'] .= ' collapsed';
        }
    }
    return '<fieldset' . drupal_attributes($element['#attributes']) . '>' . ($element['#title'] ? '<legend>' . $element['#title'] . '</legend>' : '') . (isset($element['#description']) && $element['#description'] ? '<div class="description">' . $element['#description'] . '</div>' : '') . (!empty($element['#children']) ? $element['#children'] : '') . (isset($element['#value']) ? $element['#value'] : '') . "</fieldset>\n";
}

function joinup_help() {
    $trial = menu_get_active_trail();
    $multiforms = array('news');
    $menu = $trial[1];
    $ok = TRUE;
    if (isset($menu['map'])) {
        foreach ($menu['map'] as $value) {
            if (in_array($value, $multiforms)) {
                $ok = FALSE;
            }
        }
    }

    if ($ok) {
        $help = menu_get_active_help();
        return '<div class="help">' . $help . '</div>';
    }
}

// Function to update appearance of user name (First name + Last name)
function joinup_username($objects, $options = array()) {
    $uid = is_numeric($objects) ? $objects : $objects->uid;

    $myprofile = content_profile_load('profile', $uid);
    if (!$myprofile) {
        // Could it be the anonymous user?
        if ($uid === 0) {
            return variable_get('anonymous', t('Anonymous'));
        }
        // we now need the Drupal username:
        // we avoid user_load because we just need the name and it is rather hard
        // to predict whether or not it will end up loading half the database...
        if (is_numeric($objects)) {
            $name = db_result(db_query('SELECT name FROM {users} WHERE uid = %d', $uid));
        } else {
            $name = $objects->name;
        }
        if (!drupal_strlen(trim($name))) {
            return variable_get('anonymous', t('Anonymous'));
        }
        return $name;
    } else {
        $username = "{$myprofile->field_firstname[0]['value']} {$myprofile->field_lastname[0]['value']}";
        $username = mb_convert_case($username, MB_CASE_TITLE, "UTF-8");
        //$maxlen = 16;
        //if (strlen($username) > $maxlen)
        //  $username = substr($username, 0, $maxlen - 3) . "...";
        return l($username, "user/{$uid}", array('html' => TRUE));
    }
}

/**
 * Definition of the select form for news menu
 * @param type $form_state
 * @return string
 */
function joinup_menu_elibrary_form($form_state) {
    $menu_items_news = menu_tree_all_data('menu-elibrary');
    foreach ($menu_items_news as $key => $value) {
        $menu_news[$value['link']['link_path']] = $value['link']['link_title'];
    }

    $form['list_menu'] = array(
        '#type' => 'select',
        '#title' => t('Content to display'),
        '#options' => $menu_news,
    );
    $form['list_menu']['#default_value'] = arg(0) . '/' . arg(1);

    $form['submit'] = array(
        '#type' => 'submit',
        '#value' => t('Apply')
    );

    return $form;
}

/**
 * Manage submit button for news menu
 *
 * @param type $form
 * @param type $form_state
 */
function joinup_menu_elibrary_form_submit($form, &$form_state) {
    $res = $form_state['values']['list_menu'];
    drupal_goto($res);
}

/**
 * Definition of the select form for news menu
 */
function joinup_menu_news_form($form_state) {
    $menu_items_news = menu_tree_all_data('menu-news-menu');
    foreach ($menu_items_news as $key => $value) {
        $menu_news[$value['link']['link_path']] = $value['link']['link_title'];
    }

    $form['list_menu'] = array(
        '#type' => 'select',
        '#title' => t('Content to display'),
        '#options' => $menu_news,
    );
    $form['list_menu']['#default_value'] = arg(0) . '/' . arg(1);

    $form['submit'] = array(
        '#type' => 'submit',
        '#value' => t('Apply')
    );

    return $form;
}

/**
 * Manage submit button for news menu
 * @param type $form
 * @param type $form_state
 */
function joinup_menu_news_form_submit($form, &$form_state) {
    $res = $form_state['values']['list_menu'];
    drupal_goto($res);
}

/**
 * Implementation of theme_preprocess_comment
 */
function joinup_preprocess_comment(&$vars) {
    $uid = $vars['comment']->uid;
    $profile = content_profile_load('profile', $uid);
    $picture = isa_toolbox_picture_fix($profile, 'profile_photo_small');
    $poster = user_load($uid);
    $name = joinup_username($poster);

    $created = date('F d, Y \a\t G:i', $vars['comment']->timestamp);
    $vars['comment']->created = $created;
    $vars['comment']->picture = $picture;
    $vars['comment']->name = $name;
    $vars['user_company_name'] = $profile->field_company_name['0']['value'];


// set the taxonomy term for users
    ///joinup_set_terms_in_vars($vars, $profile);
    isa_toolbox_create_taxonomy_list($profile, array(variable_get('country_vid', NULL)));
    $country = taxonomy_vocabulary_load(variable_get('country_vid', NULL));
    $vars['user_countries'] = $profile->taxonomy_terms[$country->name];


    $groups = $vars['node']->og_groups;
    $group_id = array_shift(array_keys($groups));
    if (og_is_group_member($group_id, FALSE, $uid)) {
        $user = user_load($uid);
        $group = node_load($group_id);
        if ($group->uid == $uid) {
            $joined_group = $group->created;
        } else {
            $joined_group = $user->og_groups[$group_id]['created'];
        }
        $vars['joined_group'] = date("d/m/Y", $joined_group);
    }
}

/**
 * Override or insert variables into the "box.tpl.php" templates.
 *
 * @param $vars
 *   An array of variables to pass to the theme template.
 *
 * @see box.tpl.php
 * @ingroup phptemplate
 */
function joinup_preprocess_box(&$vars) {
    // Get the node type using the page URL to create a new template file called "box-topic.tpl.php".
    if (module_exists('path')) {
        $path_alias = drupal_get_path_alias($_GET['q']);
        $alias_parts = explode('/', $path_alias);
        $alias_parts_reverse = array_reverse($alias_parts);
        if ($alias_parts_reverse[1]) {
            $node_type = $alias_parts_reverse[1];
        }
        if ($node_type == ISA_LEGALDOCUMENT_TYPE) {
            $vars['title'] = t('Sign the document');
            $vars['template_files'][] = 'comment-wrapper-' . $node_type;
        } elseif ($node_type == 'topic') {
            $vars['template_file'] = 'box-' . $node_type;
            $uid = $vars['user']->uid;
            $profile = content_profile_load('profile', $uid);
            $picture = isa_toolbox_picture_fix($profile, 'profile_photo_small');
            $poster = user_load($uid);
            //joinup_set_terms_in_vars($vars, $profile);
            isa_toolbox_create_taxonomy_list($profile, array(variable_get('country_vid', NULL)));
            $country = taxonomy_vocabulary_load(variable_get('country_vid', NULL));
            $vars['user_countries'] = $profile->taxonomy_terms[$country->name];
            $vars['user_picture'] = $picture;
            $vars['user_name'] = joinup_username($poster);
            $vars['user_company_name'] = $profile->field_company_name['0']['value'];
            $vars['title'] = t('Post new reply');
            $group_id = isa_toolbox_get_community_nid();
            if (og_is_group_member($group_id, FALSE, $uid)) {
                $user = user_load($uid);
                $group = node_load($group_id);
                if ($group->uid == $uid) {
                    $joined_group = $group->created;
                } else {
                    $joined_group = $user->og_groups[$group_id]['created'];
                }
                $vars['joined_group'] = date("d/m/Y", $joined_group);
            }
        } elseif ($node_type == 'issue') {
            $vars['template_file'] = 'box-project_' . $node_type;
            $uid = $vars['user']->uid;
            $profile = content_profile_load('profile', $uid);
            $picture = isa_toolbox_picture_fix($profile, 'profile_photo_small');
            $poster = user_load($uid);
            $vars['user_picture'] = $picture;
            $vars['user_name'] = joinup_username($poster);
        } elseif ($vars['title'] != 'Search results' && $node_type != 'subscriptions') {
            $uid = $vars['user']->uid;
            $profile = content_profile_load('profile', $uid);
            $picture = isa_toolbox_picture_fix($profile, 'profile_photo_small');
            $vars['user_picture'] = $picture;
        }
    }
}

/**
 * Override theme_apachesolr_breadcrumb_uid to return the user firstname + lastname instead of username
 * @param <numeric> $uid
 * @return <string> formated user firstname & lastname
 */
function joinup_apachesolr_breadcrumb_uid($field) {
    return strip_tags(theme('username', $field['#value']));
}

/**
 * Override or insert variables into the "simplenews-newsletter-body.tpl.php" templates.
 *
 * @param $vars
 *   An array of variables to pass to the theme template.
 *
 */
function joinup_preprocess_simplenews_newsletter_body(&$variables) {
    $content = variable_get('newsletters_mail_body', '...');
    $content = token_replace($content, 'node', $variables['node']);
    $variables['content'] = $content;
}

function joinup_preprocess_simplenews_newsletter_footer(&$variables) {
    $content = variable_get('newsletters_mail_footer', '...');
    if ($variables['key'] == 'test') {
        $content .= '- - -' . t('This is a test version of the newsletter.', array(), $variables['language']->language) . '- - -';
    }
    $content = token_replace($content, 'node', $variables['node']);
    $variables['content'] = $content;
}

/*
 * Implementation of theme_form_element
 * Deleted the colon ':' after elements title
 */

function joinup_form_element($element, $value) {

    // This is also used in the installer, pre-database setup.
    $t = get_t();

    //change the class of the checkbox for the asset release search
    if ($element['#id'] != 'edit-current-checkbox') {
        $output = '<div class="form-item"';
    } else { //change the class of the checkbox for the asset release search
        $output = '<div class="current-checkbox"';
    }


    if (!empty($element['#id'])) {
        $output .= ' id="' . $element['#id'] . '-wrapper"';
    }
    $output .= ">\n";
    $required = !empty($element['#required']) ? '<span class="form-required" title="' . $t('This field is required.') . '">*</span>' : '';

    if (!empty($element['#title'])) {
        $title = $element['#title'];
        if (!empty($element['#id'])) {
            $output .= ' <label for="' . $element['#id'] . '">' . $t('!title !required', array('!title' => filter_xss_admin($title), '!required' => $required)) . "</label>\n";
        } else {
            $output .= ' <label>' . $t('!title !required', array('!title' => filter_xss_admin($title), '!required' => $required)) . "</label>\n";
        }
    }

    $output .= " $value\n";

    if (!empty($element['#description'])) {
        $output .= ' <div class="description">' . $element['#description'] . "</div>\n";
    }

    $output .= "</div>\n";

    return $output;
}

/**
 * Use to customize "submitted by" information of a node
 *
 * @param type $comment
 * @return type
 */
function joinup_comment_submitted($comment) {
    $node = node_load($comment->nid);
    if ($node->type == ISA_LEGALDOCUMENT_TYPE) {
        $user = user_load($comment->uid);
        $user_profile = content_profile_load('profile', $comment->uid);
        return t('!username @email@companysigned the document : "@comment_agree"', array(
                    '!username' => theme('username', $comment),
                    '@email' => (isa_toolbox_check_visibility($user_profile, 'email') && !empty($user->mail)) ? '(' . $user->mail . ') ' : '',
                    '@company' => (isa_toolbox_check_visibility($user_profile, 'company') && !empty($user_profile->field_company_name[0]['value'])) ? '(' . $user_profile->field_company_name[0]['value'] . ') ' : '',
                    '@comment_agree' => $comment->subject,
                ));
    }
    return t('Posted by !username on @datetime', array(
                '!username' => theme('username', $comment),
                '@datetime' => format_date($comment->timestamp, 'custom', 'F d, Y \a\t G:i'),
            ));
}

/**
 *
 * @param type $node
 * @return type
 */
function joinup_node_submitted($node) {
    if ($node->type == ISA_TOPIC_TYPE) {
        return t('Posted by !username on @datetime', array(
                    '!username' => theme('username', $node),
                    '@datetime' => format_date($node->created, 'custom', 'F d, Y \a\t G:i'),
                ));
    } elseif ($node->type == ISA_FEDERATED_PROJECT_TYPE) {
        return t('Created on @datetime', array(
                    '@datetime' => format_date($node->created, 'custom', 'F d, Y'),
                ));
    } else {
        return t('Submitted by !username on @datetime', array(
                    '!username' => theme('username', $node),
                    '@datetime' => format_date($node->created, 'custom', 'F d, Y'),
                ));
    }
}

/**
 * Theme a "you can't post comments" notice.
 *
 * @param $node
 *   The comment node.
 * @ingroup themeable
 */
function joinup_comment_post_forbidden($node) {
    global $user;
    static $authenticated_post_comments;

    if (!$user->uid) {
        if (!isset($authenticated_post_comments)) {
            // We only output any link if we are certain, that users get permission
            // to post comments by logging in. We also locally cache this information.
            $authenticated_post_comments = array_key_exists(DRUPAL_AUTHENTICATED_RID, user_roles(TRUE, 'post comments') + user_roles(TRUE, 'post comments without approval'));
        }

        if ($authenticated_post_comments) {
            // We cannot use drupal_get_destination() because these links
            // sometimes appear on /node and taxonomy listing pages.
            if (variable_get('comment_form_location_' . $node->type, COMMENT_FORM_SEPARATE_PAGE) == COMMENT_FORM_SEPARATE_PAGE) {
                $destination = 'destination=' . rawurlencode("comment/reply/$node->nid#comment-form-title");
            } else {
                $destination = 'destination=' . rawurlencode("node/$node->nid#comment-form-title");
            }

            if (variable_get('user_register', 1)) {
                // Users can register themselves.
                return t('<a id="login-required" href="@login">Login</a> or <a id="register-required" href="@register">register</a> to post comments', array('@login' => url('user/login', array('query' => $destination)), '@register' => url('user/register', array('query' => $destination))));
            } else {
                // Only admins can add new users, no public registration.
                return t('<a href="@login">Login</a> to post comments', array('@login' => url('user/login', array('query' => $destination))));
            }
        }
    }
}

/**
 *
 * @param type $node
 * @return type
 */
function joinup_prepare_vote_rating($node) {
    $vote = fivestar_get_votes('node', $node->nid);
    $rate = round($vote['average']['value'] / 20, 2);
    $tot_vote = $vote['count']['value'];
    $tot_vote = isset($tot_vote) ? $tot_vote : 0;
    return t('Rating:<strong> ') . $rate . '/5 </strong> (' . t('based on ') . $tot_vote . t(' votes') . ')';
}

/**
 * if the user has not permission Administer User override theme user administration overview.
 *
 */
function joinup_user_admin_account($form) {
    if (!user_access('administer users') && user_access('manage users')) {

        // remove Operations column
        unset($form['operations']);

        // Overview table:
        $header = array(
            theme('table_select_header_cell'),
            array('data' => t('Username'), 'field' => 'u.name'),
            array('data' => t('Status'), 'field' => 'u.status'),
            t('Roles'),
            array('data' => t('Member for'), 'field' => 'u.created', 'sort' => 'desc'),
            array('data' => t('Last access'), 'field' => 'u.access'),
                //t('Operations')
        );

        $output = drupal_render($form['options']);
        if (isset($form['name']) && is_array($form['name'])) {

            foreach (element_children($form['name']) as $key) {
                $rows[] = array(
                    drupal_render($form['accounts'][$key]),
                    drupal_render($form['name'][$key]),
                    drupal_render($form['status'][$key]),
                    drupal_render($form['roles'][$key]),
                    drupal_render($form['member_for'][$key]),
                    drupal_render($form['last_access'][$key]),
                    drupal_render($form['operations'][$key]),
                );
            }
        } else {
            $rows[] = array(array('data' => t('No users available.'), 'colspan' => '7'));
        }

        $output .= theme('table', $header, $rows);
        if ($form['pager']['#value']) {
            $output .= drupal_render($form['pager']);
        }

        $output .= drupal_render($form);

        return $output;
    } elseif (user_access('administer users')) {
        return theme_user_admin_account($form);
    }
}

/**
 * Process variables for search-results.tpl.php.
 *
 * The $variables array contains the following arguments:
 * - $results
 * - $type
 *
 * @see search-results.tpl.php
 */
function joinup_preprocess_search_result(&$variables) {
    //Add some variables to display in the results page
    $result = $variables['result'];
    $result_node = $result['node'];
    $node = node_load($result_node->nid);
    $result_node->username = l(strip_tags(theme('username', $node->uid)), 'people/' . $node->uid);
    $result_node->creation_date = date('d F Y', $node->created);
    $result_node->teaser = $node->teaser;
    //https://webgate.ec.europa.eu/CITnet/jira/browse/ISAICP-857
    //Show filtered solr result body
    $page_config = _isa_apachesolr_this_page_config();
    if(is_array($page_config)){
        $keys = trim(_isa_apachesolr_search_get_keys(count(explode("/", $_GET['q']))));
        $result_node->body =  str_replace('...' , '' , $result_node->body);
        $keys ? $result_node->body =  "..". strip_tags($result_node->body,'<strong>') : $result_node->body = truncate_utf8(strip_tags($node->body), 200, FALSE, TRUE) ;
    }
    //logo
    $theme = variable_get('theme_default', NULL);
    $theme_path = drupal_get_path('theme', $theme); 
    if ($node->type == 'profile') {
        if (!is_null($node->field_photo[0])) {
            $path = $node->field_photo[0]['filepath'];
        } else {
            $path = $theme_path . "/images/logo/user.png";
        }
    } else {
        $path = $theme_path . "/images/logo/{$node->type}.png";
        // https://webgate.ec.europa.eu/CITnet/jira/browse/ISAICP-800
        // https://webgate.ec.europa.eu/CITnet/jira/browse/ISAICP-726
        // use the Repository logo for Semantic Asset Release in advanced search results (Apache Solr)
        switch($node->type) {
          case 'asset_release':
            // default logo: same as repository default logo
            $path = isa_toolbox_default_imagefield('field_repository_logo', ISA_REPOSITORY_TYPE);
            $path = $path['filepath'];
            // use (non-default) repository logo, if exists
            if ($node->og_groups && is_array($node->og_groups) && count($node->og_groups)) {
              foreach($node->og_groups as $og_id) {
                $_repository = node_load($og_id);
                if ($_repository && 'repository'==$_repository->type &&
                    $_repository->field_repository_logo && $_repository->field_repository_logo[0] && $_repository->field_repository_logo[0]['filepath']) {
                  $path = $_repository->field_repository_logo[0]['filepath'];
                  break;
                }
              }
            }
            break;
        }
    }
    $picture = theme_imagecache('profile_photo', $path, $node->type);
    $result_node->picture = $picture;

    //https://webgate.ec.europa.eu/CITnet/jira/browse/ISAICP-797
    //Show downloads links only it the is any release
    //if it is a release, we display the download link
    if ($node->type == ISA_PROJECT_TYPE) {
        $release_id = isa_toolbox_get_last_release($node->nid);
        $release = NULL;
        if ($release_id) {
            $release = node_load($release_id);
            $attributes = array(
                //https://webgate.ec.europa.eu/CITnet/jira/browse/ISAICP-974
                //Link to the distribution section 
                'fragment' => 'download-links',
                'attributes' => 
                    array('class' => "action-buttons download")
                );
            $result_node->download = l("Download", $release->path, $attributes);
        }
    }
    if ($node->type == ISA_ASSET_RELEASE_TYPE) {
        //Display the version
        $result_node->version = $node->field_asset_version[0]['value']['field_language_textfield_name'][0]['value'];
        $attributes = array(
            //https://webgate.ec.europa.eu/CITnet/jira/browse/ISAICP-950
            //Link to the distribution section 
            'fragment' => 'download-links',
            'attributes' => 
                array('class' => "action-buttons download")
            );
        $result_node->download = l("Download", $node->path, $attributes);
    }

    $variables['node'] = $result_node;
}

/**
 * Specific theme for field which need to have a edit remove links
 * @global type $base_url
 * @param type $element
 * @return type
 */
function joinup_textfield($element) {
    global $base_url;
    // dsk($element);
    //indicate here field you want to add links edit and remove
    $customfield =
            array(
                //"edit-field-asset-name",
                "edit-field-asset-distribution",
                "edit-field-asset-contact-point",
                "edit-field-asset-item",
                "edit-field-asset-publisher",
                "edit-field-asset-metadata-publisher",
                "edit-field-asset-homepage-doc",
                "edit-field-asset-documentation",
                "edit-field-asset-related-doc",
                "edit-field-asset-webpage-doc",
                "edit-field-asset-node-reference",
                "edit-field-distribution-publisher",
                "edit-field-distribution-licence",
                "edit-field-repository-publisher",
    );

    $size = empty($element['#size']) ? '' : ' size="' . $element['#size'] . '"';
    $maxlength = empty($element['#maxlength']) ? '' : ' maxlength="' . $element['#maxlength'] . '"';
    $class = array('form-text');
    $extra = '';
    $output = '';

    if ($element['#autocomplete_path'] && menu_valid_path(array('link_path' => $element['#autocomplete_path']))) {
        drupal_add_js('misc/autocomplete.js');
        $class[] = 'form-autocomplete';
        $extra = '<input class="autocomplete" type="hidden" id="' . $element['#id'] . '-autocomplete" value="' . check_url(url($element['#autocomplete_path'], array('absolute' => TRUE))) . '" disabled="disabled" />';
    }
    _form_set_class($element, $class);

    if (isset($element['#field_prefix'])) {
        $output .= '<span class="field-prefix">' . $element['#field_prefix'] . '</span> ';
    }

	///for the specified field add suffix
	static $popups;
	if(!isset($popups['count'])){
		$popups['count'] = -1;
	}
	$regex = implode('|', $customfield);
	if (preg_match("/^(".$regex.")/", $element['#id'])){

		if(!isset($popups['fields'][$element["#parents"]['0']])) {
			$popups['count']++;
		}

		$popups['fields'][$element["#parents"]['0']] = isset($popups['fields'][$element["#parents"][0]])
			? ++$popups['fields'][$element["#parents"][0]]
			: 1;

		$displayElement = "none";
		$popuppath = "#";
		if ($element["#value"] != "") {
			$displayElement = "inline";
			//find nid
			$matches_nid = null;
			$returnValue = preg_match('/nid:([0-9]+)/', $element["#value"], $matches_nid);
			if ($matches_nid) {
				$popuppath = "$base_url/node/$matches_nid[1]/edit";
			}
		}
		//check the id of the element wich must have edit remove link to
		//send to javascript
		if (strpos($element['#id'], '-nid-nid')) {
			$element_id = str_replace('-nid-nid', '', $element['#id']);

			$lenght = strlen(strstr(strrev($element_id), '-'));
			$element_id = substr($element_id, 0, $lenght);
		}
		$my_settings = array(
			'element_id' => $element_id,
			'base_url' => $base_url
		);
		drupal_add_js(array('isa_toolbox' => $my_settings), 'setting');

		if (!empty($popuppath)) {
			$popuppath .= '&destination='.$_GET['q'];
		}

		$element['#field_suffix'] = '<a href="' . $popuppath . '" class="popups-form popups-reference popups-reference-'.$popups['count'].'" rel="'. $element['#id'] .'" style="display:' . $displayElement . '"   >Edit</a>
        <a href="#" id="' . $element['#id'] . '_remove' . '" onclick="clearTextFieldBefore(this,\'' . $element['#id'] . '\');return false;" style="display:' . $displayElement . '" >Remove</a>  ';
	}


    $output .= '<input type="text"' . $maxlength . ' name="' . $element['#name'] . '" id="' . $element['#id'] . '"' . $size . ' value="' . check_plain($element['#value']) . '"' . drupal_attributes($element['#attributes']) . ' />';

    if (isset($element['#field_suffix'])) {
        $output .= ' <span class="field-suffix">' . $element['#field_suffix'] . '</span>';
    }

    //Unset the * on the form
    if ($element['#field_name'] == 'field_identifier_content') {
        $element['#required'] = FALSE;
    }

//  dsk($output);
	$element['#validated'] = TRUE;

    return theme('form_element', $element, $output) . $extra;
}

/**
 * Specific theme for select fields
 * @global type $base_url
 * @param type $element
 * @return type
 */
function joinup_select($element) {
    //Unset the * on the form
    if ($element['#title'] == 'Relationship Type') {
        $element['#required'] = FALSE;
    }
    $select = '';
    $size = $element['#size'] ? ' size="' . $element['#size'] . '"' : '';
    _form_set_class($element, array('form-select'));
    $multiple = $element['#multiple'];
    return theme('form_element', $element, '<select name="' . $element['#name'] . '' . ($multiple ? '[]' : '') . '"' . ($multiple ? ' multiple="multiple" ' : '') . drupal_attributes($element['#attributes']) . ' id="' . $element['#id'] . '" ' . $size . '>' . form_select_options($element) . '</select>');
}

global $specific_fields;
$specific_fields = array(
    array("field" => "field_asset_alternative_name", "button_name" => "Add another alternative name"),
    array("field" => "field_asset_contact_point", "button_name" => "Add another contact point"),
    array("field" => "field_asset_description", "button_name" => "Add another description"),
    array("field" => "field_asset_distribution", "button_name" => "Add another distribution"),
    array("field" => "field_asset_documentation", "button_name" => "Add another main documentation"),
    array("field" => "field_asset_homepage_doc", "button_name" => "Add another homepage"),
    array("field" => "field_asset_identifier", "button_name" => "Add another identifier"),
    array("field" => "field_asset_item", "button_name" => "Add another item"),
    array("field" => "field_asset_last_modification", "button_name" => "Add another lat modification"),
    array("field" => "field_asset_metadata_date", "button_name" => "Add another metadata date"),
    array("field" => "field_asset_metadata_publisher", "button_name" => "Add another metadata publisher"),
    array("field" => "field_asset_name", "button_name" => "Add another translated name"),
    array("field" => "field_asset_node_reference", "button_name" => "Add another reference"),
    array("field" => "field_asset_publisher", "button_name" => "Add another publisher"),
    array("field" => "field_asset_related_doc", "button_name" => "Add another related documentation"),
    array("field" => "field_asset_temporal_coverage", "button_name" => "Add another temporal coverage"),
    array("field" => "field_asset_webpage_doc", "button_name" => "Add another related web page"),
    array("field" => "field_publisher_name", "button_name" => "Add another name"),
    array("field" => "field_licence_name", "button_name" => "Add another name"),
    array("field" => "field_licence_description", "button_name" => "Add another description"),
    array("field" => "field_contact_point_name", "button_name" => "Add another name"),
    array("field" => "field_contact_point_address", "button_name" => "Add another address"),
    array("field" => "field_contact_point_telephone", "button_name" => "Add another telephone"),
    array("field" => "field_contact_point_mail", "button_name" => "Add another mail"),
    array("field" => "field_contact_point_web_page", "button_name" => "Add another web page"),
    array("field" => "field_documentation_title", "button_name" => "Add another title"),
    array("field" => "field_item_label", "button_name" => "Add another label"),
    array("field" => "field_item_description", "button_name" => "Add another description"),
    array("field" => "field_repository_publisher", "button_name" => "Add another publisher"),
    array("field" => "field_repository_name", "button_name" => "Add another repository name"),
    array("field" => "field_repository_description", "button_name" => "Add another description"),
    array("field" => "field_repository_url", "button_name" => "Add another URL"),
    array("field" => "field_repository_schema", "button_name" => "Add another schema"),
        //array("field" => "field_documentation_access_url", "button_name" => "Add another access URL"),
        //array("field" => "field_documentation_access_url1", "button_name" => "Add another file"),
);

/**
 * specific theming for button in multiple flexified change to add more item to add more "param"
 * @param type $element
 */
function joinup_flexifield_multiple_values($element) {
    global $specific_fields;
    _common_multiple_value($element, $specific_fields);
    return theme_flexifield_multiple_values($element);
}

function joinup_content_multiple_values($element) {
    global $specific_fields;
    _common_multiple_value($element, $specific_fields);
    return theme_content_multiple_values($element);
}

function _common_multiple_value(&$element, $specific_fields) {
    foreach ($specific_fields as $field) {

        if ($element["#field_name"] == $field['field']) {
            $element[$field['field'] . "_add_more"]["#value"] = t($field['button_name']);
        }
    }
}


/**
 *
 * @param type $display
 * @return type
 */
function joinup_status_messages($display = NULL) {
  _joinup_exclude_message( array(
      'No posts in this group.',
      'No public posts in this group.'
      ),
  'status');

  return theme_status_messages($display);
}

/**
 *
 * @param type $messages
 * @param type $type
 * @param type $international
 */
function _joinup_exclude_message($messages, $type = "status", $international = TRUE) {
  $messageArr = drupal_set_message();
  $positions = NULL;
  if (count($messageArr) > 0) {
    foreach($messages as $message){
      if($international) {
        $message = t($message);
      }
      $positions = array_keys(preg_grep( sprintf('/%s/', $message) , $messageArr[$type]));
      foreach($positions as $position) {
        if(isset($_SESSION['messages'][$type][intval($position)])) {
          unset($_SESSION['messages'][$type][intval($position)]);
        }
        if (count($_SESSION['messages'][$type])==0) {
          unset($_SESSION['messages'][$type]);
        }
      }
    }
  }
}


function joinup_apachesolr_facet_list($items, $display_limit = 0, $delta = '') {
  "created" == $delta ? krsort($items) : FALSE;
  apachesolr_js();
  // theme('item_list') expects a numerically indexed array.
  $items = array_values($items);
  // If there is a limit and the facet count is over the limit, hide the rest.
  if (($display_limit > 0) && (count($items) > $display_limit)) {
    // Split items array into displayed and hidden.
    $hidden_items = array_splice($items, $display_limit);
    foreach ($hidden_items as $hidden_item) {
      if (!is_array($hidden_item)) {
        $hidden_item = array('data' => $hidden_item);
      }
      $hidden_item['class'] = isset($hidden_item['class']) ? $hidden_item['class'] . ' apachesolr-hidden-facet' : 'apachesolr-hidden-facet';
      $items[] = $hidden_item;
    }
  }
  $admin_link = '';
  if (user_access('administer search')) {
    $admin_link = l(t('Configure enabled filters'), 'admin/settings/apachesolr/enabled-filters');
  }
  return theme('item_list', $items, NULL, 'ul', array('class' => 'apachesolr-facet-list')) . $admin_link;
}

/**
 * Implementation of hook_theme().
 */
function joinup_theme($existing, $type, $theme, $path) {	
	//personalize polls
	$hooks['advpoll_voting_binary_form']=array(
	'template' => 'templates/advpoll/advpoll-display-binary-form',
            'file' => 'modes/binary.inc',
			'render element'=>'form',
            'arguments' => array(
                'form' => NULL,
            )        		
	);
	
	return $hooks;
}
/**
 * Returns the themed image to show in recommended view
 * 
 * @param int $fid
 * @param string $node_type
 * @param int $nid
 */ 
function joinup_render_recommended_img($fid,$node_type,$nid){
    $file = field_file_load($fid);
    if(0 == $file['fid']){
        return '';
    }
    $path = $file['filepath'];
    $filename = $file['filename'];
    if(imageapi_image_open($path)){
        imagecache_create_path('profile_photo', $path);
        $preset = imagecache_preset_by_name('profile_photo');
        $dst = imagecache_create_path('profile_photo', $path);
        imagecache_build_derivative($preset['actions'], $path, $dst);
        $img = base_path() ."sites/default/files/imagecache/profile_photo/".$filename;
        return "<img src='$img'>";
    }
    return '';
}
