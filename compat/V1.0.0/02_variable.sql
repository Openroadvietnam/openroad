--
-- Contenu de la table `variable`
--

INSERT INTO `variable` (`name`, `value`) VALUES
('xmlsitemap_batch_limit', 's:3:"100";'),
('xmlsitemap_path', 's:10:"xmlsitemap";'),
('xmlsitemap_lastmod_format', 's:12:"Y-m-d\\TH:i\\Z";'),
('xmlsitemap_developer_mode', 'i:0;'),
('xmlsitemap_frontpage_priority', 's:3:"0.5";'),
('xmlsitemap_frontpage_changefreq', 's:5:"86400";'),
('xmlsitemap_minimum_lifetime', 's:5:"86400";'),
('xmlsitemap_xsl', 'i:1;'),
('xmlsitemap_prefetch_aliases', 'i:1;'),
('xmlsitemap_chunk_size', 's:4:"auto";'),
('xmlsitemap_settings_taxonomy_term_27', 'a:2:{s:6:"status";s:1:"1";s:8:"priority";s:3:"0.5";}'),
('xmlsitemap_settings_menu_link_primary-links', 'a:2:{s:6:"status";s:1:"1";s:8:"priority";s:3:"0.5";}'),
('xmlsitemap_settings_menu_link_secondary-links', 'a:2:{s:6:"status";s:1:"1";s:8:"priority";s:3:"0.5";}');


-- For the nodewords module
INSERT INTO `variable` (`name`, `value`) VALUES
('nodewords_admin_edit', 'a:20:{s:11:"description";s:11:"description";s:8:"abstract";i:0;s:9:"canonical";i:0;s:9:"copyright";i:0;s:8:"keywords";i:0;s:13:"revisit-after";i:0;s:6:"robots";i:0;s:14:"dc.contributor";i:0;s:10:"dc.creator";i:0;s:7:"dc.date";i:0;s:14:"dc.description";i:0;s:12:"dc.publisher";i:0;s:8:"dc.title";i:0;s:8:"location";i:0;s:8:"shorturl";i:0;s:23:"alexa_verification_code";i:0;s:21:"bing_webmaster_center";i:0;s:22:"google_webmaster_tools";i:0;s:19:"yahoo_site_explorer";i:0;s:22:"yandex_webmaster_tools";i:0;}'),
('nodewords_admin_use_default_value_abstract', 's:5:"empty";'),
('nodewords_admin_use_default_value_alexa_verification_code', 's:5:"empty";'),
('nodewords_admin_use_default_value_bing_webmaster_center', 's:5:"empty";'),
('nodewords_admin_use_default_value_canonical', 's:5:"empty";'),
('nodewords_admin_use_default_value_copyright', 's:5:"empty";'),
('nodewords_admin_use_default_value_dc.contributor', 's:5:"empty";'),
('nodewords_admin_use_default_value_dc.creator', 's:5:"empty";'),
('nodewords_admin_use_default_value_dc.date', 's:5:"empty";'),
('nodewords_admin_use_default_value_dc.description', 's:5:"empty";'),
('nodewords_admin_use_default_value_dc.publisher', 's:5:"empty";'),
('nodewords_admin_use_default_value_dc.title', 's:5:"empty";'),
('nodewords_admin_use_default_value_description', 's:5:"empty";'),
('nodewords_admin_use_default_value_google_webmaster_tools', 's:5:"empty";'),
('nodewords_admin_use_default_value_keywords', 's:5:"empty";'),
('nodewords_admin_use_default_value_location', 's:5:"empty";'),
('nodewords_admin_use_default_value_revisit-after', 's:5:"empty";'),
('nodewords_admin_use_default_value_robots', 's:5:"empty";'),
('nodewords_admin_use_default_value_shorturl', 's:5:"empty";'),
('nodewords_admin_use_default_value_yahoo_site_explorer', 's:5:"empty";'),
('nodewords_admin_use_default_value_yandex_webmaster_tools', 's:5:"empty";'),
('nodewords_base_url', 's:0:"";'),
('nodewords_description_generation_source', 's:1:"2";'),
('nodewords_enable_tokens', 'i:1;'),
('nodewords_filter_modules_output', 'a:2:{s:12:"imagebrowser";i:0;s:10:"img_assist";i:0;}'),
('nodewords_filter_regexp', 's:0:"";'),
('nodewords_global_keywords_1', 's:0:"";'),
('nodewords_global_keywords_2', 's:0:"";'),
('nodewords_head', 'a:20:{s:11:"description";s:11:"description";s:8:"abstract";i:0;s:9:"canonical";i:0;s:9:"copyright";i:0;s:8:"keywords";i:0;s:13:"revisit-after";i:0;s:6:"robots";i:0;s:14:"dc.contributor";i:0;s:10:"dc.creator";i:0;s:7:"dc.date";i:0;s:14:"dc.description";i:0;s:12:"dc.publisher";i:0;s:8:"dc.title";i:0;s:8:"location";i:0;s:8:"shorturl";i:0;s:23:"alexa_verification_code";i:0;s:21:"bing_webmaster_center";i:0;s:22:"google_webmaster_tools";i:0;s:19:"yahoo_site_explorer";i:0;s:22:"yandex_webmaster_tools";i:0;}'),
('nodewords_keyword_vids', 'a:0:{}');

-- fivestar for content type video
INSERT INTO `variable` (`name`, `value`) VALUES
('fivestar_feedback_video', 'i:1;'),
('fivestar_labels_enable_video', 'i:1;'),
('fivestar_labels_video', 'a:11:{i:0;s:13:"Cancel rating";i:1;s:4:"Poor";i:2;s:4:"Okay";i:3;s:4:"Good";i:4;s:5:"Great";i:5;s:7:"Awesome";i:6;s:20:"Give it @star/@count";i:7;s:20:"Give it @star/@count";i:8;s:20:"Give it @star/@count";i:9;s:20:"Give it @star/@count";i:10;s:20:"Give it @star/@count";}'),
('fivestar_position_teaser_video', 's:6:"hidden";'),
('fivestar_position_video', 's:5:"below";'),
('fivestar_stars_video', 's:1:"5";'),
('fivestar_style_video', 's:7:"average";'),
('fivestar_text_video', 's:4:"none";'),
('fivestar_title_video', 'i:0;'),
('fivestar_unvote_video', 'i:1;'),
('fivestar_video', 'i:1;');

-- Jira 93
UPDATE `variable` SET `value` =  's:1:"1";' WHERE `name` = 'comment_upload_project_issue';

-- MAJ module content_lock
INSERT INTO `variable` (`name`, `value`) VALUES
('content_lock_unload_js_message', 's:49:"If you proceed, ALL of your changes will be lost.";');

-- Nodewords
INSERT INTO `variable` (`name`, `value`) VALUES
('nodewords_list_repeat', 'i:0;'),
('nodewords_list_robots_index_follow', 's:16:"noindex,nofollow";'),
('nodewords_list_robots_value', 'a:4:{s:9:"noarchive";i:0;s:5:"noodp";i:0;s:9:"nosnippet";i:0;s:6:"noydir";i:0;}'),
('nodewords_max_size', 's:3:"350";'),
('nodewords_ui_edit', 'a:14:{s:8:"abstract";i:0;s:9:"canonical";i:0;s:9:"copyright";i:0;s:11:"description";i:0;s:8:"keywords";i:0;s:13:"revisit-after";i:0;s:6:"robots";i:0;s:14:"dc.contributor";i:0;s:10:"dc.creator";i:0;s:7:"dc.date";i:0;s:14:"dc.description";i:0;s:8:"dc.title";i:0;s:8:"location";i:0;s:8:"shorturl";i:0;}'),
('nodewords_ui_use_default_value_abstract', 's:5:"empty";'),
('nodewords_ui_use_default_value_canonical', 's:5:"empty";'),
('nodewords_ui_use_default_value_copyright', 's:5:"empty";'),
('nodewords_ui_use_default_value_dc.contributor', 's:5:"empty";'),
('nodewords_ui_use_default_value_dc.creator', 's:5:"empty";'),
('nodewords_ui_use_default_value_dc.date', 's:5:"empty";'),
('nodewords_ui_use_default_value_dc.description', 's:5:"empty";'),
('nodewords_ui_use_default_value_dc.title', 's:5:"empty";'),
('nodewords_ui_use_default_value_description', 's:5:"empty";'),
('nodewords_ui_use_default_value_keywords', 's:5:"empty";'),
('nodewords_ui_use_default_value_location', 's:5:"empty";'),
('nodewords_ui_use_default_value_revisit-after', 's:5:"empty";'),
('nodewords_ui_use_default_value_robots', 's:5:"empty";'),
('nodewords_ui_use_default_value_shorturl', 's:5:"empty";'),
('nodewords_use_alt_attribute', 'i:1;');


-- other variables
UPDATE `variable` SET `value` =  's:384:"<p>Dear [recipient-firstname],</p>\r\n<div>\r\n<p>User [field_firstname-formatted] [field_lastname-formatted] has created a new document &quot;[title]&quot; in [isa_group_type] [ogname].</p>\r\n<p>To reach this document, click on following link : [isa_node_link]</p>\r\n<p><span class="Apple-style-span"><span class="Apple-style-span">[site-name] </span></span>Team</p>\r\n</div>\r\n<p>&nbsp;</p>";' WHERE `name` = 'community_create_document_to_facilitators_mail_body';
UPDATE `variable` SET `value` =  's:340:"<p>Dear [recipient-firstname],</p>\r\n<p>User [field_firstname-formatted] [field_lastname-formatted] has created news &quot;[title]&quot; in [isa_group_type] [ogname].</p>\r\n<p>To reach this news, click on following link : [isa_node_link]</p>\r\n<p><span class="Apple-style-span"><span class="Apple-style-span">[site-name]</span></span> Team</p>";' WHERE `name` = 'community_create_news_to_facilitators_mail_body';
UPDATE `variable` SET `value` =  's:384:"<p>Dear [recipient-firstname],</p>\r\n<div>\r\n<p>User [field_firstname-formatted] [field_lastname-formatted] has created a new forum topic &quot;[title]&quot; in [isa_group_type] [ogname].</p>\r\n<p>To reach this topic, click on following link : [isa_node_link]</p>\r\n<p><span class="Apple-style-span"><span class="Apple-style-span">[site-name] </span></span>Team</p>\r\n</div>\r\n<p>&nbsp;</p>";' WHERE `name` = 'community_create_topic_to_facilitators_mail_body';
UPDATE `variable` SET `value` =  's:386:"<p>Dear [recipient-firstname],</p>\r\n<div>\r\n<p>User [field_firstname-formatted] [field_lastname-formatted] has created a new wiki page &quot;[title]&quot; in [isa_group_type] [ogname].</p>\r\n<p>To reach this wiki page, click on following link : [isa_node_link]</p>\r\n<p><span class="Apple-style-span"><span class="Apple-style-span">[site-name]</span></span> Team</p>\r\n</div>\r\n<p>&nbsp;</p>";' WHERE `name` = 'community_create_wiki_to_facilitators_mail_body';
UPDATE `variable` SET `value` =  'a:11:{s:5:"title";s:2:"-1";s:10:"body_field";s:1:"0";s:20:"revision_information";s:1:"5";s:6:"author";s:1:"6";s:7:"options";s:1:"7";s:16:"comment_settings";s:1:"8";s:4:"menu";s:1:"3";s:8:"taxonomy";s:1:"1";s:4:"path";s:1:"9";s:8:"workflow";s:1:"4";s:9:"nodewords";s:2:"10";}' WHERE `name` = 'content_extra_weights_case';
UPDATE `variable` SET `value` =  'i:1;' WHERE `name` = 'contexthelp_help_button_in_theme';
UPDATE `variable` SET `value` =  'b:0;' WHERE `name` = 'drupal_http_request_fails';
UPDATE `variable` SET `value` =  's:885:"<p>Dear [recipient-firstname],</p>\r\n<p>[author_firstname] [author_lastname] has invited you to join the [isa_group_type] <em>[title]</em> on [site-name].</p>\r\n<p>[invite_message]</p>\r\n<p>About the [isa_group_type] <em>[title]</em>: [group_abstract].</p>\r\n<p>To join this [isa_group_type] click on the following link [isa_node_link]</p>\r\n<p>As a member, you will be able to participate actively in the activities of this [isa_group_type]. You will be able to create and highlight content, such as blogs, news items, events, useful software or semantic asset and participate in the discussion forums and wikis of the community. You will be automatically notified of any activities and new content.</p>\r\n<p>For a complete list of advantages of membership, click here [about_us_link].</p>\r\n<p>You want to report a spam? You can send us an email to [site-mail].</p>\r\n<p>[site-name] Team</p>";' WHERE `name` = 'invite_group_mail_body';
UPDATE `variable` SET `value` =  's:12:"Join [title]";' WHERE `name` = 'invite_group_mail_title';
UPDATE `variable` SET `value` =  's:803:"<p>Dear future user,</p>\r\n<p>[author_firstname] [author_lastname]&nbsp; <span class="Apple-style-span"><span class="Apple-style-span">(</span></span>[profile_company]<span class="Apple-style-span"><span class="Apple-style-span">) wants to invite you to join [site-name].</span></span></p>\r\n<p>[invite_message]</p>\r\n<p><span class="Apple-style-span"><span class="Apple-style-span"> Follow this link to register on </span></span><span class="Apple-style-span"><span class="Apple-style-span">[site-name] :&nbsp; [invite_link] </span></span></p>\r\n<p>For a complete list of advantages of membership, click here [about_us_link].</p>\r\n<p>You want to report a spam? You can send us an email to [site-mail].</p>\r\n<p><span class="Apple-style-span"><span class="Apple-style-span">[site-name] Team</span></span></p>";' WHERE `name` = 'invite_joinup_mail_body';
UPDATE `variable` SET `value` =  's:35:"Join the new collaboration platform";' WHERE `name` = 'invite_joinup_mail_title';
UPDATE `variable` SET `value` =  'a:65:{i:0;s:14:"misc/jquery.js";i:1;s:14:"misc/drupal.js";i:2;s:12:"misc/form.js";i:3;s:64:"sites/all/modules/contributed/heartbeat/modules/shouts/shouts.js";i:4;s:72:"sites/all/modules/contributed/modified/jquery_ui/jquery.ui/ui/ui.core.js";i:5;s:77:"sites/all/modules/contributed/modified/jquery_ui/jquery.ui/ui/ui.accordion.js";i:6;s:66:"sites/all/modules/contributed/modified/contexthelp/jquery.modal.js";i:7;s:65:"sites/all/modules/contributed/modified/contexthelp/contexthelp.js";i:8;s:62:"sites/all/modules/contributed/modified/fivestar/js/fivestar.js";i:9;s:38:"sites/all/modules/contributed/og/og.js";i:10;s:72:"sites/all/modules/contributed/views_slideshow/js/jquery.cycle.all.min.js";i:11;s:100:"sites/all/modules/contributed/views_slideshow/contrib/views_slideshow_singleframe/views_slideshow.js";i:12;s:103:"sites/all/modules/contributed/views_slideshow/contrib/views_slideshow_thumbnailhover/views_slideshow.js";i:13;s:70:"sites/all/modules/custom/isa_multiple_digest/js/isa_multiple_digest.js";i:14;s:101:"sites/all/modules/custom/isa_release_multiple_files/js/isa_release_multiple_files_dynamic_newfiles.js";i:15;s:52:"sites/all/modules/contributed/heartbeat/heartbeat.js";i:16;s:54:"sites/all/modules/contributed/admin_menu/admin_menu.js";i:17;s:19:"misc/jquery.form.js";i:18;s:55:"sites/all/modules/contributed/modified/popups/popups.js";i:19;s:19:"misc/tableselect.js";i:20;s:19:"misc/tableheader.js";i:21;s:77:"sites/all/modules/contributed/modified/jquery_ui/jquery.ui/ui/ui.draggable.js";i:22;s:77:"sites/all/modules/contributed/modified/jquery_ui/jquery.ui/ui/ui.droppable.js";i:23;s:76:"sites/all/modules/contributed/modified/jquery_ui/jquery.ui/ui/ui.sortable.js";i:24;s:80:"sites/all/modules/contributed/modified/context/plugins/context_reaction_block.js";i:25;s:20:"misc/autocomplete.js";i:26;s:56:"sites/all/themes/isa_icp/scripts/plugins/jquery.cycle.js";i:27;s:40:"sites/all/themes/isa_icp/scripts/init.js";s:10:"refresh:bs";s:7:"waiting";s:10:"refresh:bg";s:7:"waiting";s:10:"refresh:hr";s:7:"waiting";s:10:"refresh:cs";s:7:"waiting";s:10:"refresh:da";s:7:"waiting";s:10:"refresh:nl";s:7:"waiting";s:10:"refresh:et";s:7:"waiting";s:10:"refresh:fi";s:7:"waiting";s:10:"refresh:fr";s:7:"waiting";s:10:"refresh:de";s:7:"waiting";s:10:"refresh:el";s:7:"waiting";s:10:"refresh:hu";s:7:"waiting";s:10:"refresh:ic";s:7:"waiting";s:10:"refresh:ga";s:7:"waiting";s:10:"refresh:it";s:7:"waiting";s:10:"refresh:lv";s:7:"waiting";s:10:"refresh:lt";s:7:"waiting";s:10:"refresh:mk";s:7:"waiting";s:10:"refresh:mt";s:7:"waiting";s:10:"refresh:nb";s:7:"waiting";s:10:"refresh:nn";s:7:"waiting";s:10:"refresh:ot";s:7:"waiting";s:10:"refresh:pl";s:7:"waiting";s:13:"refresh:pt-pt";s:7:"waiting";s:10:"refresh:ro";s:7:"waiting";s:10:"refresh:sr";s:7:"waiting";s:10:"refresh:sk";s:7:"waiting";s:10:"refresh:sl";s:7:"waiting";s:10:"refresh:es";s:7:"waiting";s:10:"refresh:sv";s:7:"waiting";s:10:"refresh:tr";s:7:"waiting";i:28;s:67:"sites/all/modules/contributed/modified/fckeditor/fckeditor.utils.js";i:29;s:16:"misc/textarea.js";i:30;s:17:"misc/tabledrag.js";i:31;s:55:"sites/all/modules/contributed/token/jquery.treeTable.js";i:32;s:44:"sites/all/modules/contributed/token/token.js";i:33;s:16:"misc/collapse.js";}' WHERE `name` = 'javascript_parsed';
UPDATE `variable` SET `value` =  's:1:"0";' WHERE `name` = 'language_content_type_profile';
UPDATE `variable` SET `value` =  'a:35:{i:0;i:127;i:1;i:125;i:2;i:63;i:3;i:62;i:4;i:61;i:5;i:60;i:6;i:59;i:7;i:58;i:8;i:57;i:9;i:56;i:10;i:47;i:11;i:46;i:12;i:44;i:13;i:31;i:14;i:30;i:15;i:29;i:16;i:28;i:17;i:27;i:18;i:24;i:19;i:23;i:20;i:22;i:21;i:21;i:22;i:15;i:23;i:14;i:24;i:13;i:25;i:12;i:26;i:11;i:27;i:10;i:28;i:7;i:29;i:6;i:30;i:5;i:31;i:4;i:32;i:3;i:33;i:2;i:34;i:1;}' WHERE `name` = 'menu_masks';
UPDATE `variable` SET `value` =  's:8:"Joinup: ";' WHERE `name` = 'prefix_subject_mail_title';
UPDATE `variable` SET `value` =  'a:6:{i:2;s:18:"authenticated user";i:6;s:13:"administrator";i:14;s:24:"clearing process manager";i:16;s:6:"expert";i:5;s:6:"member";i:3;s:9:"moderator";}' WHERE `name` = 'roles';
UPDATE `variable` SET `value` =  's:6:"Joinup";' WHERE `name` = 'site_name';
UPDATE `variable` SET `value` =  's:6:"Joinup";' WHERE `name` = 'site_slogan';
UPDATE `variable` SET `value` =  's:101:"<p>JoinUp is currently under maintenance. We should be back shortly. Thank you for your patience.</p>";' WHERE `name` = 'site_offline_message';
UPDATE `variable` SET `value` =  's:61:"jpg jpeg gif png txt doc xls pdf ppt pps odt ods odp zip docx";' WHERE `name` = 'upload_extensions_default';
UPDATE `variable` SET `value` =  's:136:"Dear [recipient-firstname],\r\n\r\nYour account has been reactivated. You are now able to connect again to the !site platform.\r\n\r\n!site Team";' WHERE `name` = 'user_mail_status_activated_body';
UPDATE `variable` SET `value` =  'a:32:{i:1;s:20:"event_comment_update";i:2;s:20:"event_comment_delete";i:3;s:18:"event_comment_view";i:5;s:23:"event_comment_unpublish";i:8;s:18:"event_node_presave";i:9;s:15:"event_node_view";i:10;s:17:"event_node_delete";i:11;s:10:"event_init";i:12;s:10:"event_cron";i:13;s:26:"event_taxonomy_term_insert";i:14;s:26:"event_taxonomy_term_update";i:15;s:17:"event_user_insert";i:16;s:17:"event_user_update";i:17;s:15:"event_user_view";i:18;s:17:"event_user_delete";i:20;s:17:"event_user_logout";i:21;s:28:"event_flag_flagged_bookmarks";i:22;s:30:"event_flag_unflagged_bookmarks";i:23;s:32:"event_flag_flagged_editor_choice";i:24;s:34:"event_flag_unflagged_editor_choice";i:27;s:37:"event_flag_flagged_i_use_this_project";i:28;s:39:"event_flag_unflagged_i_use_this_project";i:29;s:28:"event_heartbeat_comment_post";i:30;s:37:"event_heartbeat_related_comment_post_";i:31;s:16:"event_shout_post";i:32;s:20:"event_og_user_insert";i:33;s:22:"event_og_user_approved";i:35;s:37:"event_userpoints_event_points_awarded";i:37;s:28:"event_workflow_comment_added";i:41;s:24:"event_og_become_co_admin";i:42;s:55:"rules_heartbeat_when_user_edit_a_page_log_user_activity";i:43;s:11:"rules_set_1";}' WHERE `name` = 'rules_inactive_sets';
UPDATE `variable` SET `value` =  'a:15:{s:11:"toggle_logo";i:1;s:11:"toggle_name";i:1;s:13:"toggle_slogan";i:0;s:14:"toggle_mission";i:1;s:14:"toggle_favicon";i:1;s:20:"toggle_primary_links";i:1;s:22:"toggle_secondary_links";i:1;s:12:"default_logo";i:0;s:9:"logo_path";s:47:"sites/all/themes/isa_icp/images/logo/joinup.png";s:11:"logo_upload";s:0:"";s:15:"default_favicon";i:0;s:12:"favicon_path";s:49:"/sites/all/themes/isa_icp/images/logo/favicon.ico";s:14:"favicon_upload";s:0:"";s:23:"popups_content_selector";s:15:"#content-region";s:12:"popups_theme";s:7:"isa_icp";}' WHERE `name` = 'theme_isa_icp_settings';
UPDATE `variable` SET `value` =  'a:1:{s:82:"sites/all/modules/contributed/modified/captcha/image_captcha/fonts/Tuffy/Tuffy.ttf";s:82:"sites/all/modules/contributed/modified/captcha/image_captcha/fonts/Tuffy/Tuffy.ttf";}' WHERE `name` = 'image_captcha_fonts';
UPDATE `variable` SET `value` =  's:65:"zip gz tar bz2 rar tgz tar.gz dmg rpm deb exe xsd xml xmi txt rdf";' WHERE `name` = 'project_release_file_extensions';
UPDATE `variable` SET `value` =  'a:20:{s:11:"description";s:11:"description";s:8:"keywords";s:8:"keywords";s:8:"abstract";i:0;s:9:"canonical";i:0;s:9:"copyright";i:0;s:13:"revisit-after";i:0;s:6:"robots";i:0;s:14:"dc.contributor";i:0;s:10:"dc.creator";i:0;s:7:"dc.date";i:0;s:14:"dc.description";i:0;s:12:"dc.publisher";i:0;s:8:"dc.title";i:0;s:8:"location";i:0;s:8:"shorturl";i:0;s:23:"alexa_verification_code";i:0;s:21:"bing_webmaster_center";i:0;s:22:"google_webmaster_tools";i:0;s:19:"yahoo_site_explorer";i:0;s:22:"yandex_webmaster_tools";i:0;}' WHERE `name` = 'nodewords_admin_edit';