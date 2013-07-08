-- defect 968 - invite people mails body
UPDATE `variable` SET `value` = 's:896:"<p>Dear [recipient-firstname],</p>\r\n<p>[author_firstname] [author_lastname] has invited you to join the [isa_group_type] <em>[title]</em> on [site-name].</p>\r\n<p>[invite_message]</p>\r\n<p>About the [isa_group_type] <em>[title]</em>: [group_abstract].</p>\r\n<p>To join this [isa_group_type] click on the following link [isa_node_link]</p>\r\n<p>As a member, you will be able to participate actively in the activities of this [isa_group_type]. You will be able to create and highlight content, such as blogs, news items, events, useful software or semantic asset and participate in the discussion forums and wikis of the community. You will be automatically notified of any activities and new content.</p>\r\n<p>For a complete list of advantages of membership, click here [about_us_link].</p>\r\n<p>You want to report a spam? You can send us an email to [contact_admin_link].</p>\r\n<p>[site-name] Team</p>\r\n";' 
WHERE `name`  = 'invite_group_mail_body' LIMIT 1 ;
UPDATE `variable` SET `value` = 's:432:"<p>Dear future user,</p>\r\n<p>[author_firstname] [author_lastname]&nbsp; ([profile_company]) wants to invite you to join [site-name].</p>\r\n<p>[invite_message]</p>\r\n<p>Follow this link to register on [site-name] :&nbsp; [invite_link]</p>\r\n<p>For a complete list of advantages of membership, click here [about_us_link].</p>\r\n<p>You want to report a spam? You can send us an email to [contact_admin_link].</p>\r\n<p>[site-name] Team</p>\r\n";' 
WHERE `name`  = 'invite_joinup_mail_body' LIMIT 1 ;

-- JIRA 122 : A registered user is not able to add a comment on a factsheet 
UPDATE `variable` SET `value` = 's:1:"2";' 
WHERE `name`  = 'comment_factsheet' LIMIT 1 ;
UPDATE `variable` SET `value` = 's:1:"0";' 
WHERE `name`  = 'comment_preview_factsheet' LIMIT 1 ;
UPDATE `variable` SET `value` = 's:1:"0";' 
WHERE `name`  = 'comment_subject_field_factsheet' LIMIT 1 ;

-- JIRA 235 : New theme
REPLACE INTO `variable` (`name`, `value`) VALUES
('theme_joinup_settings', 'a:15:{s:11:"toggle_logo";i:1;s:11:"toggle_name";i:1;s:13:"toggle_slogan";i:0;s:14:"toggle_mission";i:1;s:14:"toggle_favicon";i:1;s:20:"toggle_primary_links";i:1;s:22:"toggle_secondary_links";i:1;s:12:"default_logo";i:0;s:9:"logo_path";s:46:"sites/all/themes/joinup/images/logo/joinup.png";s:11:"logo_upload";s:0:"";s:15:"default_favicon";i:0;s:12:"favicon_path";s:47:"sites/all/themes/joinup/images/logo/favicon.ico";s:14:"favicon_upload";s:0:"";s:23:"popups_content_selector";s:15:"#content-region";s:12:"popups_theme";s:6:"joinup";}'),
('theme_default', 's:6:"joinup";'),
('captcha_add_captcha_description', 'i:1;'),
('captcha_administration_mode', 'i:0;'),
('captcha_allow_on_admin_pages', 'i:0;'),
('captcha_default_challenge', 's:19:"recaptcha/reCAPTCHA";'),
('captcha_default_validation', 's:1:"1";'),
('captcha_description', 's:103:"This question is for testing whether you are a human visitor and to prevent automated spam submissions.";'),
('captcha_description_bg', 's:103:"This question is for testing whether you are a human visitor and to prevent automated spam submissions.";'),
('captcha_description_bs', 's:103:"This question is for testing whether you are a human visitor and to prevent automated spam submissions.";'),
('captcha_description_cs', 's:103:"This question is for testing whether you are a human visitor and to prevent automated spam submissions.";'),
('captcha_description_da', 's:97:"Dette spørgsmål tester hvorvidt du er et menneske og forhindrer automatisk indsendelse af spam.";'),
('captcha_description_de', 's:115:"Diese Frage hat den Zweck zu testen, ob Sie ein menschlicher Benutzer sind und um automatisiertem Spam vorzubeugen.";'),
('captcha_description_el', 's:103:"This question is for testing whether you are a human visitor and to prevent automated spam submissions.";'),
('captcha_description_en', 's:103:"This question is for testing whether you are a human visitor and to prevent automated spam submissions.";'),
('captcha_description_es', 's:119:"Esta pregunta se hace para comprobar que es usted una persona real e impedir el envío automatizado de mensajes basura.";'),
('captcha_description_et', 's:103:"This question is for testing whether you are a human visitor and to prevent automated spam submissions.";'),
('captcha_description_fi', 's:86:"Tämä kysymys esitetään, jotta lomakkeen automatisoitu käyttö voitaisiin estää.";'),
('captcha_description_fr', 's:119:"Cette question permet de s''assurer que vous êtes un utilisateur humain et non un logiciel automatisé de pollupostage.";'),
('captcha_description_ga', 's:103:"This question is for testing whether you are a human visitor and to prevent automated spam submissions.";'),
('captcha_description_hr', 's:103:"This question is for testing whether you are a human visitor and to prevent automated spam submissions.";'),
('captcha_description_hu', 's:95:"A kérdés azt vizsgálja, hogy valós látogató, vagy robot szeretné az űrlapot beküldeni.";'),
('captcha_description_ic', 's:103:"This question is for testing whether you are a human visitor and to prevent automated spam submissions.";'),
('captcha_description_it', 's:90:"Questa domanda serve a verificare che il form non venga inviato da procedure automatizzate";'),
('captcha_description_lt', 's:110:"Šis klausimas yra skirtas įsitikinti, jog jūs esate žmogus, ir sustabdyti automatinį šlamšto siuntimą.";'),
('captcha_description_lv', 's:103:"This question is for testing whether you are a human visitor and to prevent automated spam submissions.";'),
('captcha_description_mk', 's:103:"This question is for testing whether you are a human visitor and to prevent automated spam submissions.";'),
('captcha_description_mt', 's:103:"This question is for testing whether you are a human visitor and to prevent automated spam submissions.";'),
('captcha_description_nb', 's:103:"This question is for testing whether you are a human visitor and to prevent automated spam submissions.";'),
('captcha_description_nl', 's:116:"Deze vraag wordt gebruikt om te testen indien u een menselijke bezoeker bent teneinde spam-inzendingen te vermijden.";'),
('captcha_description_nn', 's:103:"This question is for testing whether you are a human visitor and to prevent automated spam submissions.";'),
('captcha_description_ot', 's:103:"This question is for testing whether you are a human visitor and to prevent automated spam submissions.";'),
('captcha_description_pl', 's:103:"This question is for testing whether you are a human visitor and to prevent automated spam submissions.";'),
('captcha_description_pt-pt', 's:103:"This question is for testing whether you are a human visitor and to prevent automated spam submissions.";'),
('captcha_description_ro', 's:103:"This question is for testing whether you are a human visitor and to prevent automated spam submissions.";'),
('captcha_description_sk', 's:103:"This question is for testing whether you are a human visitor and to prevent automated spam submissions.";'),
('captcha_description_sl', 's:103:"This question is for testing whether you are a human visitor and to prevent automated spam submissions.";'),
('captcha_description_sr', 's:103:"This question is for testing whether you are a human visitor and to prevent automated spam submissions.";'),
('captcha_description_sv', 's:86:"Frågan kontrollerar om du är en människa och används för att hindra spam-robotar.";'),
('captcha_description_tr', 's:103:"This question is for testing whether you are a human visitor and to prevent automated spam submissions.";'),
('captcha_log_wrong_responses', 'i:0;'),
('captcha_persistence', 's:1:"0";'),
('captcha_placement_map_cache', 'a:4:{s:12:"comment_form";a:3:{s:4:"path";a:0:{}s:3:"key";N;s:6:"weight";d:18.89999999999999857891452847979962825775146484375;}s:17:"contact_mail_page";a:3:{s:4:"path";a:0:{}s:3:"key";s:6:"submit";s:6:"weight";N;}s:13:"user_register";a:3:{s:4:"path";a:0:{}s:3:"key";s:6:"submit";s:6:"weight";i:30;}s:17:"contact_mail_user";a:3:{s:4:"path";a:0:{}s:3:"key";s:6:"submit";s:6:"weight";N;}}'),
('captcha_response', 's:6:"3PT46K";'),
('captcha_sid', 'i:272;'),
('captcha_token', 's:32:"89809c9f91f5e073a9c3d6ec8333fd18";'),
('captcha_wrong_response_counter', 'i:33;'),
('image_captcha_background_color', 's:7:"#ffffff";'),
('image_captcha_bilinear_interpolation', 'i:0;'),
('image_captcha_character_spacing', 's:1:"1";'),
('image_captcha_code_length', 's:1:"5";'),
('image_captcha_distortion_amplitude', 's:1:"0";'),
('image_captcha_dot_noise', 'i:0;'),
('image_captcha_file_format', 's:1:"1";'),
('image_captcha_fonts', 'a:1:{s:82:"sites/all/modules/contributed/modified/captcha/image_captcha/fonts/Tuffy/Tuffy.ttf";s:82:"sites/all/modules/contributed/modified/captcha/image_captcha/fonts/Tuffy/Tuffy.ttf";}'),
('image_captcha_fonts_preview_map_cache', 'a:3:{s:32:"7e5dc3c2b21a3598df30dbf52992eb90";O:8:"stdClass":3:{s:8:"filename";s:73:"sites/all/modules/contributed/captcha/image_captcha/fonts/Tuffy/Tuffy.ttf";s:8:"basename";s:9:"Tuffy.ttf";s:4:"name";s:5:"Tuffy";}s:32:"6ffd93867a4d1faf52b551b9596bd950";O:8:"stdClass":3:{s:8:"filename";s:78:"sites/all/modules/contributed/captcha/image_captcha/fonts/Tuffy/Tuffy_Bold.ttf";s:8:"basename";s:14:"Tuffy_Bold.ttf";s:4:"name";s:10:"Tuffy_Bold";}s:32:"fef7339bd4bf24c3aa3b65ce63ec5797";O:8:"stdClass":3:{s:8:"filename";s:73:"sites/all/modules/contributed/captcha/image_captcha/fonts/Tesox/tesox.ttf";s:8:"basename";s:9:"tesox.ttf";s:4:"name";s:5:"tesox";}}'),
('image_captcha_font_size', 's:2:"30";'),
('image_captcha_foreground_color', 's:7:"#000000";'),
('image_captcha_foreground_color_randomness', 's:3:"100";'),
('image_captcha_image_allowed_chars', 's:39:"aAbBCdEeFfGHhijKLMmNPQRrSTtWXYZ23456789";'),
('image_captcha_line_noise', 'i:0;'),
('image_captcha_noise_level', 's:1:"5";'),
('recaptcha_ajax_api', 'i:0;'),
('recaptcha_private_key', 's:40:"6LeXiskSAAAAAOVWvTtoNLQf5jwdGUKkNpFRM8Q_";'),
('recaptcha_public_key', 's:40:"6LeXiskSAAAAAFtJgfM0FGE05WvNhTcXfmYFkQRG";'),
('recaptcha_secure_connection', 'i:0;'),
('recaptcha_tabindex', 's:0:"";'),
('recaptcha_theme', 's:5:"white";');

-- JIRA 89 : mail template when topic is deleted
INSERT INTO `variable` (`name`, `value`) VALUES
('community_delete_topic_to_facilitators_mail_body', 's:237:"<p>Dear [recipient-firstname],</p>\r\n<div>\r\n	<p>User [field_firstname-formatted] [field_lastname-formatted] has deleted a forum topic &quot;[title]&quot; in [isa_group_type] [ogname].</p>\r\n	<p>[site-name] Team</p>\r\n</div>\r\n<p>&nbsp;</p>\r\n";'),
('community_delete_topic_to_facilitators_mail_title', 's:44:"Forum-topic deleted in your [isa_group_type]";');

-- DIFF
REPLACE INTO `variable` (`name`, `value`) VALUES
('user_message_addLetters', 's:42:"Adding both upper and lowercase letters.\r\n";'),
('user_message_addNumbers', 's:15:"Adding numbers.";'),
('user_message_addPunctuation', 's:21:"Adding punctuation.\r\n";'),
('user_message_needsMoreVariation', 's:129:"<p>This password does not include enough variation to be truly secure - you may want to change it for a more secure one by:</p>\r\n";'),
('user_message_needsMoreVariationFooter', 's:116:"<p>If you&#39;d like to keep this password, just ignore this warning. Joinup accepts any passwords you choose.</p>\r\n";'),
('popups_joinup_content_selector', 's:15:"#content-region";'),
('roles', 'a:7:{i:2;s:18:"authenticated user";i:6;s:13:"administrator";i:14;s:24:"clearing process manager";i:9;s:9:"developer";i:16;s:6:"expert";i:5;s:6:"member";i:3;s:9:"moderator";}'),
('rules_inactive_sets', 'a:32:{i:1;s:20:"event_comment_update";i:2;s:20:"event_comment_delete";i:3;s:18:"event_comment_view";i:5;s:23:"event_comment_unpublish";i:8;s:18:"event_node_presave";i:9;s:15:"event_node_view";i:10;s:17:"event_node_delete";i:11;s:10:"event_init";i:12;s:10:"event_cron";i:13;s:26:"event_taxonomy_term_insert";i:14;s:26:"event_taxonomy_term_update";i:15;s:17:"event_user_insert";i:16;s:17:"event_user_update";i:17;s:15:"event_user_view";i:18;s:17:"event_user_delete";i:20;s:17:"event_user_logout";i:21;s:28:"event_flag_flagged_bookmarks";i:22;s:30:"event_flag_unflagged_bookmarks";i:23;s:32:"event_flag_flagged_editor_choice";i:24;s:34:"event_flag_unflagged_editor_choice";i:27;s:37:"event_flag_flagged_i_use_this_project";i:28;s:39:"event_flag_unflagged_i_use_this_project";i:29;s:28:"event_heartbeat_comment_post";i:30;s:37:"event_heartbeat_related_comment_post_";i:31;s:16:"event_shout_post";i:32;s:20:"event_og_user_insert";i:33;s:22:"event_og_user_approved";i:35;s:37:"event_userpoints_event_points_awarded";i:37;s:28:"event_workflow_comment_added";i:41;s:24:"event_og_become_co_admin";i:42;s:55:"rules_heartbeat_when_user_edit_a_page_log_user_activity";i:43;s:11:"rules_set_1";}'),
('apachesolr_enabled_facets', 'a:2:{s:17:"apachesolr_search";a:11:{s:3:"uid";s:3:"uid";s:9:"im_vid_36";s:9:"im_vid_36";s:9:"im_vid_26";s:9:"im_vid_26";s:9:"im_vid_30";s:9:"im_vid_30";s:9:"im_vid_27";s:9:"im_vid_27";s:9:"im_vid_38";s:9:"im_vid_38";s:9:"im_vid_28";s:9:"im_vid_28";s:9:"im_vid_33";s:9:"im_vid_33";s:9:"im_vid_34";s:9:"im_vid_34";s:9:"im_vid_31";s:9:"im_vid_31";s:9:"im_vid_32";s:9:"im_vid_32";}s:23:"apachesolr_facetbuilder";a:2:{s:20:"sm_facetbuilder_test";s:20:"sm_facetbuilder_test";s:31:"sm_facetbuilder_facet_node_type";s:31:"sm_facetbuilder_facet_node_type";}}'),
('apachesolr_facet_missing', 'a:2:{s:23:"apachesolr_facetbuilder";a:2:{s:30:"sm_facetbuilder_faceted_search";i:1;s:31:"sm_facetbuilder_facet_node_type";i:0;}s:17:"apachesolr_search";a:4:{s:9:"im_vid_27";i:0;s:9:"im_vid_28";i:0;s:4:"type";i:0;s:3:"uid";i:0;}}');
