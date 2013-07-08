<?php

/**
 * Path Settings
 *   - Relative path from where you would be running the scripts
 *     (assumed to be your version control root, which may or may not differ
 *     from your web root)
 *   - Do not use trailing slashes
 */

// Location of dbscripts folder
$script_path = './var/www/isa/dbscripts';

// Location of settings.php
$settings_path = '../sites/default/settings.php';

// Location where database dump files will be stored
$dump_path = './database_backups';

// Location of mysql binaries (needs to be set if not in your path)
$mysql = 'mysql';
$mysqldump = 'mysqldump';

// Charset location
$charsets = '/usr/local/share/mysql/charsets';

// Database type (mysql, mysqli)
$dbtype = 'mysqli';


/**
 * Auto Increment IDs Handling
 *
 * DBScripts comes with a method to automatically raise increments of new
 * content within the development branch to be above the production branch.
 * This method may have unexpected results if you are not careful in how you
 * manage using content with auto_increment IDs.  Other external methods may be
 * used, such as a patch to Drupal core, or setting a server-wide MySQL setting
 * for increment_increment and increment_offset -- or any other method you know
 * of.
 *
 * Set to TRUE to use the built-in dbscripts method to raise increments.
 *
 * Set to FALSE to use your own auto_increment handling method.
 */
$raise_increments_on_merge = TRUE;


/**
 * Some versions of MySQL do not set character encoding for column names which
 * can cause unnessisary changes in the version control system.  If this is
 * happening amungst your group of developers, you can set this value to TRUE
 * to avoid the conflicts.  However, it means you cannot have special
 * characters in your column names.
 */
$remove_column_charset = TRUE;


/**
 * Enable debugging
 *
 * This just prints out what dbscripts is doing so you can more easily find the
 * source of an error.  Handy when you have duplicate key issues on restore.
 */
$debugging = TRUE;


/**
 * Filtered tables
 * Some data is not nessisary in some cases and shouldn't be stored
 */

// These tables are always filtered except when 'none' filtering option is used
// always deleted when performing a restore
$tables_filtered =  array(
);

// Tables for 'min' filtering option
// preserved in working space
$tables_filtered_l1 = array(
  'masquerade',
  'sessions',
  'openid_association',
);

// Tables for 'full' filtering option, in addition to 'min'
// preserved in working space
$tables_filtered_l2 =  array(
  'access',
  'accesslog',
  'active_translation',
  'advagg_bundles',
  'advagg_files',
  'advpoll',
  'advpoll_choices',
  'advpoll_electoral_list',
  'apachesolr_attachments_files',
  'apachesolr_search_node',
  'authmap',
  'backup_migrate_destinations',
  'backup_migrate_profiles',
  'backup_migrate_schedules',
  'batch',
  'cache',
  'cache_.*',
  'contact',
  'captcha_sessions',
  'comments',
  'comment_upload',
  'commit_management',
  'content_field_.*',
  'content_lock',
  'content_type_.*',
  'ctools_css_cache',
  'ctools_object_cache',
  'devel_.*',
  'files',
  'flag_content',
  'flag_counts',
  'flexifield_items',
  'flood',
  'freelinking',
  'heartbeat_activity',
  'heartbeat_comments',
  'heartbeat_translations',
  'history',
  'homebox_users',
  'isa_download_external_statics',
  'isa_download_statistics',
  'isa_download_statistics_count',
  'isa_highlight',
  'listhandler',
  'login_security_track',
  'mailhandler',
  'mailman_lists',
  'mailman_users',
  'media_youtube_metadata',
  'media_youtube_node_data',
  'menu_router',
  'ml_management',
  'ml_group',
  'nat',
  'nodewords',
  'nodewords_custom',
  'node',
  'node_access',
  'node_comment_statistics',
  'node_counter',
  'node_revisions',
  'og',
  'og_access_post',
  'og_ancestry',
  'og_uid',
  'og_users_roles',
  'og_users_roles_group',
  'performance_detail',
  'performance_summary',
  'project_issues',
  'project_issue_categories',
  'project_issue_comments',
  'project_issue_projects',
  'project_issue_state',
  'project_package_local_release_item',
  'project_projects',
  'project_release_.*',
  'project_subscriptions',
  'qa_answer',
  'queue',
  'repositories_management',
  'rules_scheduler',
  'search_dataset',
  'search_index',
  'search_node_links',
  'search_total',
  'semaphore',
  'shouts',
  'simplenews_digest_multiple',
  'simplenews_mail_spool',
  'simplenews_newsletters',
  'simplenews_snid_tid',
  'simplenews_subscriptions',
  'subscriptions',
  'subscriptions_last_sent',
  'subscriptions_queue',
  'subscriptions_user',
  'term_autotagging_data',
  'term_data',
  'term_fields_term',
  'term_hierarchy',
  'term_node',
  'term_relation',
  'term_synonym',
  'term_fields_term',
  'upload',
  'url_alias',
  'userpoints',
  'userpoints_txn',
  'users',
  'users_roles',
  'users_developpers',
  'variable',
  'vf.*',
  'views_object_cache',
  'votingapi_.*',
  'votingapi_.*',
  'watchdog',
  'web_directories',
  'workflow_node',
  'workflow_node_history',
  'workflow_scheduled_transition',
  'xmlsitemap',
  'xmlsitemap_sitemap',
  );


/**
 * Classifying Tables
 * Should the data be taken from development, production, or be merged
 */

// Tables that contain content to be merged from both development and
// production
$tables_merge = array(
  'aggregator_category',
  'aggregator_category_feed',
  'aggregator_feed',
  'authmap',
  'autologout',
  'biblio',
  'biblio_contributor',
  'biblio_contributor_data',
  'biblio_duplicates',
  'biblio_keyword',
  'biblio_keyword_data',
  'blogapi_files',
  'book',
  'contact',
  //'content_field_.*',
  //'content_type_.*',
  'draggableviews_collapsed',
  'draggableviews_structure',
  'entrez_hash',
  'feedapi',
  'feedapi_node_item',
  'feedapi_node_item_feed',
  'feedapi_stat',
  'files',
  'flag_content',
  'forum',
  //'image',
  //'image_attach',
  'img_assist_map',
  'languages',
  'legal_accepted',
  'legal_conditions',
  'location_instance',
  'location',
  //'menu_links',
  //'menu_node',
  //'menu_router',
  'nat',
  //'node',
  //'node_access',
  //'node_revisions',
  //'og',
  //'og_access_post',
  //'og_ancestry',
  //'og_notifications',
  //'og_uid',
  //'og_uid_global',
  'parser_common_syndication',
  'path_redirect',
  'privacy',
  //'profile_values',
  //'poll',
  //'poll_choices',
  'search_block',
  'simplenews_newsletters',
  'simplenews_snid_tid',
  'taxonomy_facets_node',
  'taxonomy_facets_term_node',
  'taxonomy_manager_merge',
  //'term_data',
  //'term_hierarchy',
  //'term_node',
  //'term_relation',
  //'term_synonym',
  //'upload',
  //'url_alias',
  //'users',
  //'users_roles',
  'vocabulary',
  'vocabulary_node_types',
  'webform_submissions',
  'webform_submitted_data',
  //'workflow_node',
  //'workflow_node_history',
  //'workflow_transitions',
);

// Tables that contain content to be taken from production
// Will override any data made during development
$tables_override = array(
  'accesslog',
  'aggregator_item',
  'aggregator_category_item',
  'batch',
  'biblioreference_keyword',
  'comments',
  'comment_notify',
  'fivestar_comment',
  'flag_counts',
  'flood',
  'history',
  'invite',
  'invite_notifications',
  'messaging_store',
  'mollom',
  'node_counter',
  'node_comment_statistics',
  'notifications',
  'notifications_event',
  'notifications_fields',
  'notifications_queue',
  'notifications_sent',
  'poll_votes',
  'profile_values',
  'search_dataset',
  'search_index',
  'search_node_links',
  'search_total',
  'simplenews_mail_spool',
  'simplenews_subscriptions',
  'user_import',
  'user_import_errors',
  'user_import_extra',
  'votingapi_vote',
  'watchdog',
  'workflow_scheduled_transition',
);
