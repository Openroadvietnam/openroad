
-- ########################
-- # CONTENT TYPE LICENCE #
-- ########################

CREATE TABLE IF NOT EXISTS `content_field_licence_description` (
  `vid` int(10) unsigned NOT NULL DEFAULT '0',
  `nid` int(10) unsigned NOT NULL DEFAULT '0',
  `delta` int(10) unsigned NOT NULL DEFAULT '0',
  `field_licence_description_type` varchar(32) DEFAULT NULL,
  `field_licence_description_value` longtext,
  `field_licence_description_item_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`vid`,`delta`),
  KEY `nid` (`nid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Structure de la table `content_field_licence_name`
--

CREATE TABLE IF NOT EXISTS `content_field_licence_name` (
  `vid` int(10) unsigned NOT NULL DEFAULT '0',
  `nid` int(10) unsigned NOT NULL DEFAULT '0',
  `delta` int(10) unsigned NOT NULL DEFAULT '0',
  `field_licence_name_type` varchar(32) DEFAULT NULL,
  `field_licence_name_value` longtext,
  `field_licence_name_item_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`vid`,`delta`),
  KEY `nid` (`nid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Structure de la table `content_type_licence`
--

CREATE TABLE IF NOT EXISTS `content_type_licence` (
  `vid` int(10) unsigned NOT NULL DEFAULT '0',
  `nid` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`vid`),
  KEY `nid` (`nid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- variable for the licence content type
REPLACE INTO `variable` (`name`, `value`) VALUES
('comment_anonymous_licence', 'i:0;'),
('comment_controls_licence', 's:1:"3";'),
('comment_default_mode_licence', 's:1:"2";'),
('comment_default_order_licence', 's:1:"1";'),
('comment_default_per_page_licence', 's:2:"10";'),
('comment_form_location_licence', 's:1:"1";'),
('comment_licence', 's:1:"2";'),
('comment_preview_licence', 's:1:"1";'),
('comment_subject_field_licence', 's:1:"0";'),
('comment_upload_images_licence', 's:4:"none";'),
('comment_upload_licence', 's:1:"0";'),
('content_extra_weights_licence', 'a:11:{s:5:"title";s:2:"45";s:10:"body_field";s:2:"47";s:20:"revision_information";s:2:"54";s:6:"author";s:2:"55";s:7:"options";s:2:"56";s:16:"comment_settings";s:2:"58";s:4:"menu";s:2:"53";s:8:"taxonomy";s:2:"50";s:4:"path";s:2:"57";s:8:"workflow";s:2:"52";s:9:"nodewords";s:2:"51";}'),
('content_profile_use_licence', 'i:0;'),
('enable_revisions_page_licence', 'i:0;'),
('fivestar_feedback_licence', 'i:1;'),
('fivestar_labels_enable_licence', 'i:1;'),
('fivestar_labels_licence', 'a:11:{i:0;s:13:"Cancel rating";i:1;s:4:"Poor";i:2;s:4:"Okay";i:3;s:4:"Good";i:4;s:5:"Great";i:5;s:7:"Awesome";i:6;s:20:"Give it @star/@count";i:7;s:20:"Give it @star/@count";i:8;s:20:"Give it @star/@count";i:9;s:20:"Give it @star/@count";i:10;s:20:"Give it @star/@count";}'),
('fivestar_licence', 'i:1;'),
('fivestar_position_licence', 's:5:"below";'),
('fivestar_position_teaser_licence', 's:6:"hidden";'),
('fivestar_stars_licence', 's:1:"5";'),
('fivestar_style_licence', 's:7:"average";'),
('fivestar_text_licence', 's:4:"none";'),
('fivestar_title_licence', 'i:0;'),
('fivestar_unvote_licence', 'i:1;'),
('form_build_id_licence', 's:37:"form-cbc91c5529b531df3c1077e3bddad2bd";'),
('language_content_type_licence', 's:1:"0";'),
('licence_type_vid', 's:2:"75";'),
('new_revisions_licence', 's:1:"0";'),
('node_options_licence', 'a:4:{i:0;s:6:"status";i:1;s:7:"promote";i:2;s:8:"revision";i:3;s:19:"revision_moderation";}'),
('og_content_type_usage_licence', 's:7:"omitted";'),
('og_max_groups_licence', 's:0:"";'),
('pathauto_node_licence_pattern', 's:28:"catalogue/[type]/[title-raw]";'),
('popups_reference_show_add_link_field_distribution_licence', 'i:1;'),
('revisioning_auto_publish_licence', 'i:1;'),
('show_diff_inline_licence', 'i:0;'),
('show_preview_changes_licence', 'i:1;'),
('subscriptions_default_workflow_licence', 'a:6:{s:5:"n_new";s:5:"n_new";s:7:"n_unpub";s:7:"n_unpub";s:5:"n_pub";s:5:"n_pub";s:5:"c_new";s:5:"c_new";s:7:"c_unpub";s:7:"c_unpub";s:5:"c_pub";s:5:"c_pub";}'),
('subscriptions_workflow_licence', 'a:6:{i:0;s:5:"n_new";i:1;s:7:"n_unpub";i:2;s:5:"n_pub";i:3;s:5:"c_new";i:4;s:7:"c_unpub";i:5;s:5:"c_pub";}'),
('unique_field_comp_licence', 's:4:"each";'),
('unique_field_fields_licence', 'a:1:{i:0;s:12:"field_id_uri";}'),
('unique_field_scope_licence', 's:4:"type";'),
('unique_field_show_matches_licence', 'a:0:{}'),
('upload_licence', 's:1:"0";'),
('workflow_licence', 'a:1:{i:0;s:4:"node";}');

-- ##############################
-- # CONTENT TYPE CONTACT POINT #
-- ##############################


--
-- Structure de la table `content_field_contact_point_address`
--

CREATE TABLE IF NOT EXISTS `content_field_contact_point_address` (
  `vid` int(10) unsigned NOT NULL DEFAULT '0',
  `nid` int(10) unsigned NOT NULL DEFAULT '0',
  `delta` int(10) unsigned NOT NULL DEFAULT '0',
  `field_contact_point_address_value` longtext,
  `field_contact_point_address_format` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`vid`,`delta`),
  KEY `nid` (`nid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Structure de la table `content_field_contact_point_mail`
--

CREATE TABLE IF NOT EXISTS `content_field_contact_point_mail` (
  `vid` int(10) unsigned NOT NULL DEFAULT '0',
  `nid` int(10) unsigned NOT NULL DEFAULT '0',
  `delta` int(10) unsigned NOT NULL DEFAULT '0',
  `field_contact_point_mail_value` longtext,
  PRIMARY KEY (`vid`,`delta`),
  KEY `nid` (`nid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Structure de la table `content_field_contact_point_telephone`
--

CREATE TABLE IF NOT EXISTS `content_field_contact_point_telephone` (
  `vid` int(10) unsigned NOT NULL DEFAULT '0',
  `nid` int(10) unsigned NOT NULL DEFAULT '0',
  `delta` int(10) unsigned NOT NULL DEFAULT '0',
  `field_contact_point_telephone_value` longtext,
  PRIMARY KEY (`vid`,`delta`),
  KEY `nid` (`nid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Structure de la table `content_field_contact_point_web_page`
--

CREATE TABLE IF NOT EXISTS `content_field_contact_point_web_page` (
  `vid` int(10) unsigned NOT NULL DEFAULT '0',
  `nid` int(10) unsigned NOT NULL DEFAULT '0',
  `delta` int(10) unsigned NOT NULL DEFAULT '0',
  `field_contact_point_web_page_url` varchar(2048) DEFAULT NULL,
  `field_contact_point_web_page_title` varchar(255) DEFAULT NULL,
  `field_contact_point_web_page_attributes` mediumtext,
  PRIMARY KEY (`vid`,`delta`),
  KEY `nid` (`nid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


--
-- Structure de la table `content_field_contact_point_name`
--

CREATE TABLE IF NOT EXISTS `content_field_contact_point_name` (
  `vid` int(10) unsigned NOT NULL DEFAULT '0',
  `nid` int(10) unsigned NOT NULL DEFAULT '0',
  `delta` int(10) unsigned NOT NULL DEFAULT '0',
  `field_contact_point_name_value` longtext,
  PRIMARY KEY (`vid`,`delta`),
  KEY `nid` (`nid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Structure de la table `content_type_contact_point`
--

CREATE TABLE IF NOT EXISTS `content_type_contact_point` (
  `vid` int(10) unsigned NOT NULL DEFAULT '0',
  `nid` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`vid`),
  KEY `nid` (`nid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- variable for the contact point type
REPLACE INTO `variable` (`name`, `value`) VALUES
('comment_anonymous_contact_point', 'i:0;'),
('comment_contact_point', 's:1:"2";'),
('comment_controls_contact_point', 's:1:"3";'),
('comment_default_mode_contact_point', 's:1:"2";'),
('comment_default_order_contact_point', 's:1:"1";'),
('comment_default_per_page_contact_point', 's:2:"10";'),
('comment_form_location_contact_point', 's:1:"1";'),
('comment_preview_contact_point', 's:1:"0";'),
('comment_subject_field_contact_point', 's:1:"0";'),
('comment_upload_contact_point', 's:1:"0";'),
('comment_upload_images_contact_point', 's:4:"none";'),
('content_extra_weights_contact_point', 'a:10:{s:5:"title";s:2:"29";s:10:"body_field";s:2:"33";s:20:"revision_information";s:2:"40";s:6:"author";s:2:"41";s:7:"options";s:2:"42";s:16:"comment_settings";s:2:"44";s:4:"menu";s:2:"38";s:4:"path";s:2:"43";s:8:"workflow";s:2:"39";s:9:"nodewords";s:2:"37";}'),
('content_profile_use_contact_point', 'i:0;'),
('enable_revisions_page_contact_point', 'i:1;'),
('fivestar_contact_point', 'i:1;'),
('fivestar_feedback_contact_point', 'i:1;'),
('fivestar_labels_contact_point', 'a:11:{i:0;s:13:"Cancel rating";i:1;s:4:"Poor";i:2;s:4:"Okay";i:3;s:4:"Good";i:4;s:5:"Great";i:5;s:7:"Awesome";i:6;s:20:"Give it @star/@count";i:7;s:20:"Give it @star/@count";i:8;s:20:"Give it @star/@count";i:9;s:20:"Give it @star/@count";i:10;s:20:"Give it @star/@count";}'),
('fivestar_labels_enable_contact_point', 'i:1;'),
('fivestar_position_contact_point', 's:5:"below";'),
('fivestar_position_teaser_contact_point', 's:6:"hidden";'),
('fivestar_stars_contact_point', 's:1:"5";'),
('fivestar_style_contact_point', 's:7:"average";'),
('fivestar_text_contact_point', 's:4:"none";'),
('fivestar_title_contact_point', 'i:0;'),
('fivestar_unvote_contact_point', 'i:1;'),
('form_build_id_contact_point', 's:37:"form-cf9c078465c4dd4ce1ac36b4f7c2ef1c";'),
('language_content_type_contact_point', 's:1:"0";'),
('new_revisions_contact_point', 's:1:"0";'),
('node_options_contact_point', 'a:3:{i:0;s:6:"status";i:1;s:7:"promote";i:2;s:8:"revision";}'),
('og_content_type_usage_contact_point', 's:7:"omitted";'),
('og_max_groups_contact_point', 's:0:"";'),
('pathauto_node_contact_point_pattern', 's:28:"catalogue/[type]/[title-raw]";'),
('popups_reference_show_add_link_field_asset_contact_point', 'i:1;'),
('revisioning_auto_publish_contact_point', 'i:0;'),
('show_diff_inline_contact_point', 'i:0;'),
('show_preview_changes_contact_point', 'i:1;'),
('subscriptions_default_workflow_contact_point', 'a:6:{s:5:"n_new";s:5:"n_new";s:7:"n_unpub";s:7:"n_unpub";s:5:"n_pub";s:5:"n_pub";s:5:"c_new";s:5:"c_new";s:7:"c_unpub";s:7:"c_unpub";s:5:"c_pub";s:5:"c_pub";}'),
('subscriptions_workflow_contact_point', 'a:6:{i:0;s:5:"n_new";i:1;s:7:"n_unpub";i:2;s:5:"n_pub";i:3;s:5:"c_new";i:4;s:7:"c_unpub";i:5;s:5:"c_pub";}'),
('unique_field_comp_contact_point', 's:4:"each";'),
('unique_field_fields_contact_point', 'a:0:{}'),
('unique_field_scope_contact_point', 's:4:"type";'),
('unique_field_show_matches_contact_point', 'a:0:{}'),
('upload_contact_point', 's:1:"0";'),
('workflow_contact_point', 'a:1:{i:0;s:4:"node";}');

-- ##############################################
-- # CONTENT TYPE LANGUAGE TEXTFIELD & TEXTAREA #
-- ##############################################

--
-- Structure de la table `content_type_language_textarea`
--

CREATE TABLE IF NOT EXISTS `content_type_language_textarea` (
  `vid` int(10) unsigned NOT NULL DEFAULT '0',
  `nid` int(10) unsigned NOT NULL DEFAULT '0',
  `field_language_textarea_name_value` longtext,
  PRIMARY KEY (`vid`),
  KEY `nid` (`nid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Structure de la table `content_type_language_textfield`
--

CREATE TABLE IF NOT EXISTS `content_type_language_textfield` (
  `vid` int(10) unsigned NOT NULL DEFAULT '0',
  `nid` int(10) unsigned NOT NULL DEFAULT '0',
  `field_language_textfield_name_value` longtext,
  PRIMARY KEY (`vid`),
  KEY `nid` (`nid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Structure de la table `content_field_language_textfield_lang`
--

CREATE TABLE IF NOT EXISTS `content_field_language_textfield_lang` (
  `vid` int(10) unsigned NOT NULL DEFAULT '0',
  `nid` int(10) unsigned NOT NULL DEFAULT '0',
  `field_language_textfield_lang_value` longtext,
  PRIMARY KEY (`vid`),
  KEY `nid` (`nid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

REPLACE INTO `variable` (`name`, `value`) VALUES
('comment_anonymous_language_textarea', 'i:0;'),
('comment_controls_language_textarea', 's:1:"3";'),
('comment_default_mode_language_textarea', 's:1:"4";'),
('comment_default_order_language_textarea', 's:1:"1";'),
('comment_default_per_page_language_textarea', 's:2:"50";'),
('comment_form_location_language_textarea', 's:1:"0";'),
('comment_language_textarea', 's:1:"0";'),
('comment_preview_language_textarea', 's:1:"1";'),
('comment_subject_field_language_textarea', 's:1:"1";'),
('comment_upload_images_language_textarea', 's:4:"none";'),
('comment_upload_language_textarea', 's:1:"0";'),
('content_extra_weights_language_textarea', 'a:10:{s:5:"title";s:2:"-5";s:10:"body_field";s:1:"0";s:20:"revision_information";s:2:"20";s:6:"author";s:2:"20";s:7:"options";s:2:"25";s:16:"comment_settings";s:2:"30";s:4:"menu";s:2:"-2";s:4:"path";s:2:"30";s:8:"workflow";s:2:"10";s:9:"nodewords";s:2:"10";}'),
('content_profile_use_language_textarea', 'i:0;'),
('enable_revisions_page_language_textarea', 'i:1;'),
('language_content_type_language_textarea', 's:1:"0";'),
('new_revisions_language_textarea', 's:1:"0";'),
('node_options_language_textarea', 'a:2:{i:0;s:6:"status";i:1;s:7:"promote";}'),
('og_content_type_usage_language_textarea', 's:7:"omitted";'),
('og_max_groups_language_textarea', 's:0:"";'),
('revisioning_auto_publish_language_textarea', 'i:0;'),
('show_diff_inline_language_textarea', 'i:0;'),
('show_preview_changes_language_textarea', 'i:1;'),
('subscriptions_default_workflow_language_textarea', 'a:6:{s:5:"n_new";s:5:"n_new";s:7:"n_unpub";s:7:"n_unpub";s:5:"n_pub";s:5:"n_pub";s:5:"c_new";s:5:"c_new";s:7:"c_unpub";s:7:"c_unpub";s:5:"c_pub";s:5:"c_pub";}'),
('subscriptions_workflow_language_textarea', 'a:6:{i:0;s:5:"n_new";i:1;s:7:"n_unpub";i:2;s:5:"n_pub";i:3;s:5:"c_new";i:4;s:7:"c_unpub";i:5;s:5:"c_pub";}'),
('upload_language_textarea', 's:1:"0";'),
('workflow_language_textarea', 'a:1:{i:0;s:4:"node";}'),
('comment_anonymous_language_textfield', 'i:0;'),
('comment_controls_language_textfield', 's:1:"3";'),
('comment_default_mode_language_textfield', 's:1:"4";'),
('comment_default_order_language_textfield', 's:1:"1";'),
('comment_default_per_page_language_textfield', 's:2:"50";'),
('comment_form_location_language_textfield', 's:1:"0";'),
('comment_language_textfield', 's:1:"0";'),
('comment_preview_language_textfield', 's:1:"1";'),
('comment_subject_field_language_textfield', 's:1:"1";'),
('comment_upload_images_language_textfield', 's:4:"none";'),
('comment_upload_language_textfield', 's:1:"0";'),
('content_extra_weights_language_textfield', 'a:10:{s:5:"title";s:2:"-5";s:10:"body_field";s:2:"-3";s:20:"revision_information";s:1:"1";s:6:"author";s:1:"0";s:7:"options";s:1:"2";s:16:"comment_settings";s:1:"3";s:4:"menu";s:2:"-4";s:4:"path";s:1:"4";s:8:"workflow";s:2:"-1";s:9:"nodewords";s:2:"-2";}'),
('content_profile_use_language_textfield', 'i:0;'),
('enable_revisions_page_language_textfield', 'i:1;'),
('language_content_type_language_textfield', 's:1:"0";'),
('new_revisions_language_textfield', 's:1:"0";'),
('node_options_language_textfield', 'a:2:{i:0;s:6:"status";i:1;s:7:"promote";}'),
('og_content_type_usage_language_textfield', 's:7:"omitted";'),
('og_max_groups_language_textfield', 's:0:"";'),
('revisioning_auto_publish_language_textfield', 'i:0;'),
('show_diff_inline_language_textfield', 'i:0;'),
('show_preview_changes_language_textfield', 'i:1;'),
('subscriptions_default_workflow_language_textfield', 'a:6:{s:5:"n_new";s:5:"n_new";s:7:"n_unpub";s:7:"n_unpub";s:5:"n_pub";s:5:"n_pub";s:5:"c_new";s:5:"c_new";s:7:"c_unpub";s:7:"c_unpub";s:5:"c_pub";s:5:"c_pub";}'),
('subscriptions_workflow_language_textfield', 'a:6:{i:0;s:5:"n_new";i:1;s:7:"n_unpub";i:2;s:5:"n_pub";i:3;s:5:"c_new";i:4;s:7:"c_unpub";i:5;s:5:"c_pub";}'),
('upload_language_textfield', 's:1:"0";'),
('workflow_language_textfield', 'a:1:{i:0;s:4:"node";}');


-- ###########################
-- # CONTENT TYPE REPOSITORY #
-- ###########################

-- --------------------------------------------------------

--
-- Structure de la table `content_field_repository_description`
--

CREATE TABLE IF NOT EXISTS `content_field_repository_description` (
  `vid` int(10) unsigned NOT NULL DEFAULT '0',
  `nid` int(10) unsigned NOT NULL DEFAULT '0',
  `delta` int(10) unsigned NOT NULL DEFAULT '0',
  `field_repository_description_type` varchar(32) DEFAULT NULL,
  `field_repository_description_value` longtext,
  `field_repository_description_item_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`vid`,`delta`),
  KEY `nid` (`nid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `content_field_repository_name`
--

CREATE TABLE IF NOT EXISTS `content_field_repository_name` (
  `vid` int(10) unsigned NOT NULL DEFAULT '0',
  `nid` int(10) unsigned NOT NULL DEFAULT '0',
  `delta` int(10) unsigned NOT NULL DEFAULT '0',
  `field_repository_name_type` varchar(32) DEFAULT NULL,
  `field_repository_name_value` longtext,
  `field_repository_name_item_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`vid`,`delta`),
  KEY `nid` (`nid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `content_field_repository_publisher`
--

CREATE TABLE IF NOT EXISTS `content_field_repository_publisher` (
  `vid` int(10) unsigned NOT NULL DEFAULT '0',
  `nid` int(10) unsigned NOT NULL DEFAULT '0',
  `delta` int(10) unsigned NOT NULL DEFAULT '0',
  `field_repository_publisher_nid` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`vid`,`delta`),
  KEY `nid` (`nid`),
  KEY `field_repository_publisher_nid` (`field_repository_publisher_nid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


--
-- Structure de la table `content_field_repository_schema`
--

CREATE TABLE IF NOT EXISTS `content_field_repository_schema` (
  `vid` int(10) unsigned NOT NULL DEFAULT '0',
  `nid` int(10) unsigned NOT NULL DEFAULT '0',
  `delta` int(10) unsigned NOT NULL DEFAULT '0',
  `field_repository_schema_type` varchar(32) DEFAULT NULL,
  `field_repository_schema_value` longtext,
  `field_repository_schema_item_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`vid`,`delta`),
  KEY `nid` (`nid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


--
-- Structure de la table `content_field_repository_url`
--

CREATE TABLE IF NOT EXISTS `content_field_repository_url` (
  `vid` int(10) unsigned NOT NULL DEFAULT '0',
  `nid` int(10) unsigned NOT NULL DEFAULT '0',
  `delta` int(10) unsigned NOT NULL DEFAULT '0',
  `field_repository_url_url` varchar(2048) DEFAULT NULL,
  `field_repository_url_title` varchar(255) DEFAULT NULL,
  `field_repository_url_attributes` mediumtext,
  PRIMARY KEY (`vid`,`delta`),
  KEY `nid` (`nid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `content_type_repository`
--
CREATE TABLE IF NOT EXISTS `content_type_repository` (
  `vid` int(10) unsigned NOT NULL DEFAULT '0',
  `nid` int(10) unsigned NOT NULL DEFAULT '0',
  `field_repository_harvestmethod_value` int(11) DEFAULT NULL,
  `field_repository_harvesturl_value` longtext,
  `field_repository_harvestfreq_value` int(11) DEFAULT NULL,
  `field_repository_logo_fid` int(11) DEFAULT NULL,
  `field_repository_logo_list` tinyint(4) DEFAULT NULL,
  `field_repository_logo_data` text,
  PRIMARY KEY (`vid`),
  KEY `nid` (`nid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



REPLACE INTO `variable` (`name`, `value`) VALUES
('comment_anonymous_repository', 'i:0;'),
('comment_controls_repository', 's:1:"3";'),
('comment_default_mode_repository', 's:1:"2";'),
('comment_default_order_repository', 's:1:"1";'),
('comment_default_per_page_repository', 's:2:"10";'),
('comment_form_location_repository', 's:1:"1";'),
('comment_preview_repository', 's:1:"0";'),
('comment_repository', 's:1:"2";'),
('comment_subject_field_repository', 's:1:"0";'),
('comment_upload_images_repository', 's:4:"none";'),
('comment_upload_repository', 's:1:"0";'),
('content_extra_weights_repository', 'a:18:{s:26:"og_user_roles_default_role";s:2:"48";s:5:"title";s:2:"35";s:10:"body_field";s:2:"37";s:20:"revision_information";s:2:"55";s:6:"author";s:2:"56";s:7:"options";s:2:"57";s:16:"comment_settings";s:2:"58";s:4:"menu";s:2:"45";s:8:"taxonomy";s:2:"44";s:4:"path";s:2:"59";s:14:"og_description";s:2:"47";s:12:"og_selective";s:2:"46";s:11:"og_register";s:2:"49";s:12:"og_directory";s:2:"52";s:11:"og_language";s:2:"51";s:8:"workflow";s:2:"54";s:10:"og_private";s:2:"50";s:9:"nodewords";s:2:"53";}'),
('content_profile_use_repository', 'i:0;'),
('date:repository:full:field_asset_last_modification_fromto', 's:4:"both";'),
('date:repository:full:field_asset_last_modification_multiple_from', 's:0:"";'),
('date:repository:full:field_asset_last_modification_multiple_number', 's:0:"";'),
('date:repository:full:field_asset_last_modification_multiple_to', 's:0:"";'),
('date:repository:full:field_asset_last_modification_show_repeat_rule', 's:4:"show";'),
('date:repository:teaser:field_asset_last_modification_fromto', 's:4:"both";'),
('date:repository:teaser:field_asset_last_modification_multiple_from', 's:0:"";'),
('date:repository:teaser:field_asset_last_modification_multiple_number', 's:0:"";'),
('date:repository:teaser:field_asset_last_modification_multiple_to', 's:0:"";'),
('date:repository:teaser:field_asset_last_modification_show_repeat_rule', 's:4:"show";'),
('enable_revisions_page_repository', 'i:1;'),
('fivestar_feedback_repository', 'i:1;'),
('fivestar_labels_enable_repository', 'i:1;'),
('fivestar_labels_repository', 'a:11:{i:0;s:13:"Cancel rating";i:1;s:4:"Poor";i:2;s:4:"Okay";i:3;s:4:"Good";i:4;s:5:"Great";i:5;s:7:"Awesome";i:6;s:20:"Give it @star/@count";i:7;s:20:"Give it @star/@count";i:8;s:20:"Give it @star/@count";i:9;s:20:"Give it @star/@count";i:10;s:20:"Give it @star/@count";}'),
('fivestar_position_repository', 's:5:"below";'),
('fivestar_position_teaser_repository', 's:6:"hidden";'),
('fivestar_repository', 'i:1;'),
('fivestar_stars_repository', 's:1:"5";'),
('fivestar_style_repository', 's:7:"average";'),
('fivestar_text_repository', 's:4:"none";'),
('fivestar_title_repository', 'i:0;'),
('fivestar_unvote_repository', 'i:1;'),
('form_build_id_repository', 's:37:"form-36af07706f3cc2ea63a4bee6013afaec";'),
('language_content_type_repository', 's:1:"0";'),
('new_revisions_repository', 's:1:"0";'),
('node_options_repository', 'a:2:{i:0;s:6:"status";i:1;s:8:"revision";}'),
('og_content_type_usage_repository', 's:5:"group";'),
('og_max_groups_repository', 's:0:"";'),
('pathauto_node_repository_pattern', 's:28:"catalogue/[type]/[title-raw]";'),
('popups_reference_show_add_link_field_repository_publisher', 'i:1;'),
('repository_deleted_mail_author_body', 's:209:"<p>Dear [field_firstname-formatted],</p>\r\n<p>The [isa_group_type] &quot;[title]&quot; has been deleted by the moderator for the following reason:</p>\r\n<p>[workflow-current-state-log-entry]</p>\r\n<p>&nbsp;</p>\r\n";'),
('repository_deleted_mail_author_title', 's:47:"The [isa_group_type] "[title]" has been deleted";'),
('repository_postponed_deletion_mail_author_body', 's:207:"<p>Dear [recipient-firstname],</p>\r\n<div>\r\n	<p>The deletion of the [type] [isa_node_link] has been postponed for the following reason.</p>\r\n	<p>[workflow-current-state-log-entry]</p>\r\n</div>\r\n<p>&nbsp;</p>\r\n";'),
('repository_postponed_deletion_mail_author_title', 's:42:"Deletion of [type] item has been postponed";'),
('repository_rejected_deletion_mail_author_body', 's:205:"<p>Dear [recipient-firstname],</p>\r\n<div>\r\n	<p>The deletion of the [type] [isa_node_link] has been refused for the following reason.</p>\r\n	<p>[workflow-current-state-log-entry]</p>\r\n</div>\r\n<p>&nbsp;</p>\r\n";'),
('repository_rejected_deletion_mail_author_title', 's:41:"Deletion of [type] item has been rejected";'),
('repository_request_deletion_mail_author_body', 's:381:"<p>Dear [recipient-firstname],</p>\r\n<p>Your [isa_group_type] [group_url] has been requested for deletion. It requires the validation from site moderator, before it will be deleted.</p>\r\n<p>You will receive another message when the [isa_group_type] is deleted, rejected for deletion or postponed for deletion.</p>\r\n<p>Thank you for sharing information on the [site-name] site.</p>\r\n";'),
('repository_request_deletion_mail_author_title', 's:62:"[isa_group_type] has been requested for deletion to moderators";'),
('repository_request_deletion_mail_moderator_body', 's:280:"<p>Dear [recipient-firstname],</p>\r\n<p>User [author_linked] wants to delete [type] &quot;[isa_node_link]&quot;.</p>\r\n<p>The deletion of this content requires your validation.&nbsp;Please click on the link below to reach the validation or denial form.</p>\r\n<p>[node-edit-url]</p>\r\n";'),
('repository_request_deletion_mail_moderator_title', 's:41:"Approval request deletion for [type] item";'),
('revisioning_auto_publish_repository', 'i:0;'),
('show_diff_inline_repository', 'i:0;'),
('show_preview_changes_repository', 'i:1;'),
('subscriptions_default_workflow_repository', 'a:6:{s:5:"n_new";s:5:"n_new";s:7:"n_unpub";s:7:"n_unpub";s:5:"n_pub";s:5:"n_pub";s:5:"c_new";s:5:"c_new";s:7:"c_unpub";s:7:"c_unpub";s:5:"c_pub";s:5:"c_pub";}'),
('subscriptions_workflow_repository', 'a:6:{i:0;s:5:"n_new";i:1;s:7:"n_unpub";i:2;s:5:"n_pub";i:3;s:5:"c_new";i:4;s:7:"c_unpub";i:5;s:5:"c_pub";}'),
('unique_field_comp_repository', 's:4:"each";'),
('unique_field_fields_repository', 'a:1:{i:0;s:12:"field_id_uri";}'),
('unique_field_scope_repository', 's:4:"type";'),
('unique_field_show_matches_repository', 'a:0:{}'),
('upload_repository', 's:1:"0";'),
('workflow_repository', 'a:1:{i:0;s:4:"node";}');


-- #####################
-- # CONTENT TYPE ITEM #
-- #####################
--
-- Structure de la table `content_field_item_description`
--

CREATE TABLE IF NOT EXISTS `content_field_item_description` (
  `vid` int(10) unsigned NOT NULL DEFAULT '0',
  `nid` int(10) unsigned NOT NULL DEFAULT '0',
  `delta` int(10) unsigned NOT NULL DEFAULT '0',
  `field_item_description_type` varchar(32) DEFAULT NULL,
  `field_item_description_value` longtext,
  `field_item_description_item_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`vid`,`delta`),
  KEY `nid` (`nid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Structure de la table `content_field_item_label`
--

CREATE TABLE IF NOT EXISTS `content_field_item_label` (
  `vid` int(10) unsigned NOT NULL DEFAULT '0',
  `nid` int(10) unsigned NOT NULL DEFAULT '0',
  `delta` int(10) unsigned NOT NULL DEFAULT '0',
  `field_item_label_type` varchar(32) DEFAULT NULL,
  `field_item_label_value` longtext,
  `field_item_label_item_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`vid`,`delta`),
  KEY `nid` (`nid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Structure de la table `content_type_item`
--

CREATE TABLE IF NOT EXISTS `content_type_item` (
  `vid` int(10) unsigned NOT NULL DEFAULT '0',
  `nid` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`vid`),
  KEY `nid` (`nid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


REPLACE INTO `variable` (`name`, `value`) VALUES
('comment_anonymous_item', 'i:0;'),
('comment_controls_item', 's:1:"3";'),
('comment_default_mode_item', 's:1:"2";'),
('comment_default_order_item', 's:1:"1";'),
('comment_default_per_page_item', 's:2:"10";'),
('comment_form_location_item', 's:1:"1";'),
('comment_item', 's:1:"2";'),
('comment_preview_item', 's:1:"0";'),
('comment_subject_field_item', 's:1:"0";'),
('comment_upload_images_item', 's:4:"none";'),
('comment_upload_item', 's:1:"0";'),
('content_extra_weights_item', 'a:10:{s:5:"title";s:2:"11";s:10:"body_field";s:2:"14";s:20:"revision_information";s:2:"20";s:6:"author";s:2:"19";s:7:"options";s:2:"21";s:16:"comment_settings";s:2:"22";s:4:"menu";s:2:"16";s:4:"path";s:2:"23";s:8:"workflow";s:2:"18";s:9:"nodewords";s:2:"17";}'),
('content_profile_use_item', 'i:0;'),
('enable_revisions_page_item', 'i:1;'),
('fivestar_feedback_item', 'i:1;'),
('fivestar_item', 'i:1;'),
('fivestar_labels_enable_item', 'i:1;'),
('fivestar_labels_item', 'a:11:{i:0;s:13:"Cancel rating";i:1;s:4:"Poor";i:2;s:4:"Okay";i:3;s:4:"Good";i:4;s:5:"Great";i:5;s:7:"Awesome";i:6;s:20:"Give it @star/@count";i:7;s:20:"Give it @star/@count";i:8;s:20:"Give it @star/@count";i:9;s:20:"Give it @star/@count";i:10;s:20:"Give it @star/@count";}'),
('fivestar_position_item', 's:5:"below";'),
('fivestar_position_teaser_item', 's:6:"hidden";'),
('fivestar_stars_item', 's:1:"5";'),
('fivestar_style_item', 's:7:"average";'),
('fivestar_text_item', 's:4:"none";'),
('fivestar_title_item', 'i:0;'),
('fivestar_unvote_item', 'i:1;'),
('form_build_id_item', 's:37:"form-4ecf2bd7f8d8714e105c2de142070da2";'),
('heartbeat_show_time_grouped_items', 'i:1;'),
('language_content_type_item', 's:1:"0";'),
('new_revisions_item', 's:1:"0";'),
('node_options_item', 'a:2:{i:0;s:6:"status";i:1;s:7:"promote";}'),
('og_content_type_usage_item', 's:7:"omitted";'),
('og_max_groups_item', 's:0:"";'),
('pathauto_node_item_pattern', 's:28:"catalogue/[type]/[title-raw]";'),
('popups_reference_show_add_link_field_asset_item', 'i:1;'),
('revisioning_auto_publish_item', 'i:0;'),
('show_diff_inline_item', 'i:0;'),
('show_preview_changes_item', 'i:1;'),
('subscriptions_default_workflow_item', 'a:6:{s:5:"n_new";s:5:"n_new";s:7:"n_unpub";s:7:"n_unpub";s:5:"n_pub";s:5:"n_pub";s:5:"c_new";s:5:"c_new";s:7:"c_unpub";s:7:"c_unpub";s:5:"c_pub";s:5:"c_pub";}'),
('subscriptions_workflow_item', 'a:6:{i:0;s:5:"n_new";i:1;s:7:"n_unpub";i:2;s:5:"n_pub";i:3;s:5:"c_new";i:4;s:7:"c_unpub";i:5;s:5:"c_pub";}'),
('unique_field_comp_item', 's:4:"each";'),
('unique_field_fields_item', 'a:1:{i:0;s:12:"field_id_uri";}'),
('unique_field_scope_item', 's:4:"type";'),
('unique_field_show_matches_item', 'a:0:{}'),
('upload_item', 's:1:"0";'),
('workflow_item', 'a:1:{i:0;s:4:"node";}');



-- ##########################
-- # CONTENT TYPE PUBLISHER #
-- ##########################
--
-- Structure de la table `content_field_publisher_name`
--

CREATE TABLE IF NOT EXISTS `content_field_publisher_name` (
  `vid` int(10) unsigned NOT NULL DEFAULT '0',
  `nid` int(10) unsigned NOT NULL DEFAULT '0',
  `delta` int(10) unsigned NOT NULL DEFAULT '0',
  `field_publisher_name_type` varchar(32) DEFAULT NULL,
  `field_publisher_name_value` longtext,
  `field_publisher_name_item_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`vid`,`delta`),
  KEY `nid` (`nid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


--
-- Structure de la table `content_field_publisher`
--

CREATE TABLE IF NOT EXISTS `content_field_publisher` (
  `vid` int(10) unsigned NOT NULL DEFAULT '0',
  `nid` int(10) unsigned NOT NULL DEFAULT '0',
  `field_publisher_value` longtext,
  PRIMARY KEY (`vid`,`nid`),
  KEY `nid` (`nid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `content_type_publisher`
--

CREATE TABLE IF NOT EXISTS `content_type_publisher` (
  `vid` int(10) unsigned NOT NULL DEFAULT '0',
  `nid` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`vid`),
  KEY `nid` (`nid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


REPLACE INTO `variable` (`name`, `value`) VALUES
('comment_anonymous_publisher', 'i:0;'),
('comment_controls_publisher', 's:1:"3";'),
('comment_default_mode_publisher', 's:1:"2";'),
('comment_default_order_publisher', 's:1:"1";'),
('comment_default_per_page_publisher', 's:2:"10";'),
('comment_form_location_publisher', 's:1:"1";'),
('comment_preview_publisher', 's:1:"0";'),
('comment_publisher', 's:1:"2";'),
('comment_subject_field_publisher', 's:1:"0";'),
('comment_upload_images_publisher', 's:4:"none";'),
('comment_upload_publisher', 's:1:"0";'),
('content_extra_weights_publisher', 'a:11:{s:5:"title";s:2:"11";s:10:"body_field";s:2:"15";s:20:"revision_information";s:2:"18";s:6:"author";s:2:"19";s:7:"options";s:2:"20";s:16:"comment_settings";s:2:"21";s:4:"menu";s:2:"14";s:8:"taxonomy";s:2:"13";s:4:"path";s:2:"22";s:8:"workflow";s:2:"16";s:9:"nodewords";s:2:"17";}'),
('content_profile_use_publisher', 'i:0;'),
('enable_revisions_page_publisher', 'i:1;'),
('fivestar_feedback_publisher', 'i:1;'),
('fivestar_labels_enable_publisher', 'i:1;'),
('fivestar_labels_publisher', 'a:11:{i:0;s:13:"Cancel rating";i:1;s:4:"Poor";i:2;s:4:"Okay";i:3;s:4:"Good";i:4;s:5:"Great";i:5;s:7:"Awesome";i:6;s:20:"Give it @star/@count";i:7;s:20:"Give it @star/@count";i:8;s:20:"Give it @star/@count";i:9;s:20:"Give it @star/@count";i:10;s:20:"Give it @star/@count";}'),
('fivestar_position_publisher', 's:5:"below";'),
('fivestar_position_teaser_publisher', 's:6:"hidden";'),
('fivestar_publisher', 'i:1;'),
('fivestar_stars_publisher', 's:1:"5";'),
('fivestar_style_publisher', 's:7:"average";'),
('fivestar_text_publisher', 's:4:"none";'),
('fivestar_title_publisher', 'i:0;'),
('fivestar_unvote_publisher', 'i:1;'),
('form_build_id_publisher', 's:37:"form-ab07640c11f375a44cf2d309571eb47c";'),
('language_content_type_publisher', 's:1:"0";'),
('new_revisions_publisher', 's:1:"0";'),
('nodewords_admin_use_default_value_dc.publisher', 's:5:"empty";'),
('node_options_publisher', 'a:4:{i:0;s:6:"status";i:1;s:7:"promote";i:2;s:8:"revision";i:3;s:19:"revision_moderation";}'),
('og_content_type_usage_publisher', 's:7:"omitted";'),
('og_max_groups_publisher', 's:0:"";'),
('pathauto_node_publisher_pattern', 's:28:"catalogue/[type]/[title-raw]";'),
('popups_reference_show_add_link_field_asset_metadata_publisher', 'i:1;'),
('popups_reference_show_add_link_field_asset_publisher', 'i:1;'),
('popups_reference_show_add_link_field_repository_publisher', 'i:1;'),
('publisher_type_vid', 's:2:"72";'),
('revisioning_auto_publish_publisher', 'i:0;'),
('show_diff_inline_publisher', 'i:0;'),
('show_preview_changes_publisher', 'i:1;'),
('subscriptions_default_workflow_publisher', 'a:6:{s:5:"n_new";s:5:"n_new";s:7:"n_unpub";s:7:"n_unpub";s:5:"n_pub";s:5:"n_pub";s:5:"c_new";s:5:"c_new";s:7:"c_unpub";s:7:"c_unpub";s:5:"c_pub";s:5:"c_pub";}'),
('subscriptions_workflow_publisher', 'a:6:{i:0;s:5:"n_new";i:1;s:7:"n_unpub";i:2;s:5:"n_pub";i:3;s:5:"c_new";i:4;s:7:"c_unpub";i:5;s:5:"c_pub";}'),
('unique_field_comp_publisher', 's:4:"each";'),
('unique_field_fields_publisher', 'a:1:{i:0;s:12:"field_id_uri";}'),
('unique_field_scope_publisher', 's:4:"type";'),
('unique_field_show_matches_publisher', 'a:0:{}'),
('upload_publisher', 's:1:"0";'),
('workflow_publisher', 'a:1:{i:0;s:4:"node";}');



-- #############################
-- # CONTENT TYPE DISTRIBUTION #
-- #############################

--
-- Structure de la table `content_field_distribution_description`
--

CREATE TABLE IF NOT EXISTS `content_field_distribution_description` (
  `vid` int(10) unsigned NOT NULL DEFAULT '0',
  `nid` int(10) unsigned NOT NULL DEFAULT '0',
  `delta` int(10) unsigned NOT NULL DEFAULT '0',
  `field_distribution_description_type` varchar(32) DEFAULT NULL,
  `field_distribution_description_value` longtext,
  `field_distribution_description_item_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`vid`,`delta`),
  KEY `nid` (`nid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `content_field_distribution_licence`
--

CREATE TABLE IF NOT EXISTS `content_field_distribution_licence` (
  `vid` int(10) unsigned NOT NULL DEFAULT '0',
  `nid` int(10) unsigned NOT NULL DEFAULT '0',
  `delta` int(10) unsigned NOT NULL DEFAULT '0',
  `field_distribution_licence_nid` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`vid`,`delta`),
  KEY `nid` (`nid`),
  KEY `field_distribution_licence_nid` (`field_distribution_licence_nid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `content_field_distribution_name`
--

CREATE TABLE IF NOT EXISTS `content_field_distribution_name` (
  `vid` int(10) unsigned NOT NULL DEFAULT '0',
  `nid` int(10) unsigned NOT NULL DEFAULT '0',
  `delta` int(10) unsigned NOT NULL DEFAULT '0',
  `field_distribution_name_type` varchar(32) DEFAULT NULL,
  `field_distribution_name_value` longtext,
  `field_distribution_name_item_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`vid`,`delta`),
  KEY `nid` (`nid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `content_field_distribution_publisher`
--

CREATE TABLE IF NOT EXISTS `content_field_distribution_publisher` (
  `vid` int(10) unsigned NOT NULL DEFAULT '0',
  `nid` int(10) unsigned NOT NULL DEFAULT '0',
  `delta` int(10) unsigned NOT NULL DEFAULT '0',
  `field_distribution_publisher_nid` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`vid`,`delta`),
  KEY `nid` (`nid`),
  KEY `field_distribution_publisher_nid` (`field_distribution_publisher_nid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `content_type_distribution`
--

CREATE TABLE IF NOT EXISTS `content_type_distribution` (
  `vid` int(10) unsigned NOT NULL DEFAULT '0',
  `nid` int(10) unsigned NOT NULL DEFAULT '0',
  `field_distribution_access_url_fid` int(11) DEFAULT NULL,
  `field_distribution_access_url_list` tinyint(4) DEFAULT NULL,
  `field_distribution_access_url_data` text,
  `field_distribution_access_url1_url` varchar(2048) DEFAULT NULL,
  `field_distribution_access_url1_title` varchar(255) DEFAULT NULL,
  `field_distribution_access_url1_attributes` mediumtext,
  PRIMARY KEY (`vid`),
  KEY `nid` (`nid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

REPLACE INTO `variable` (`name`, `value`) VALUES
('comment_anonymous_distribution', 'i:0;'),
('comment_controls_distribution', 's:1:"3";'),
('comment_default_mode_distribution', 's:1:"2";'),
('comment_default_order_distribution', 's:1:"1";'),
('comment_default_per_page_distribution', 's:2:"10";'),
('comment_distribution', 's:1:"2";'),
('comment_form_location_distribution', 's:1:"1";'),
('comment_preview_distribution', 's:1:"0";'),
('comment_subject_field_distribution', 's:1:"0";'),
('comment_upload_distribution', 's:1:"0";'),
('comment_upload_images_distribution', 's:4:"none";'),
('content_extra_weights_distribution', 'a:11:{s:5:"title";s:2:"25";s:10:"body_field";s:2:"28";s:20:"revision_information";s:2:"40";s:6:"author";s:2:"39";s:7:"options";s:2:"41";s:16:"comment_settings";s:2:"42";s:4:"menu";s:2:"36";s:8:"taxonomy";s:2:"35";s:4:"path";s:2:"43";s:8:"workflow";s:2:"38";s:9:"nodewords";s:2:"37";}'),
('content_profile_use_distribution', 'i:0;'),
('date:distribution:full:field_asset_last_modification_fromto', 's:4:"both";'),
('date:distribution:full:field_asset_last_modification_multiple_from', 's:0:"";'),
('date:distribution:full:field_asset_last_modification_multiple_number', 's:0:"";'),
('date:distribution:full:field_asset_last_modification_multiple_to', 's:0:"";'),
('date:distribution:full:field_asset_last_modification_show_repeat_rule', 's:4:"show";'),
('date:distribution:teaser:field_asset_last_modification_fromto', 's:4:"both";'),
('date:distribution:teaser:field_asset_last_modification_multiple_from', 's:0:"";'),
('date:distribution:teaser:field_asset_last_modification_multiple_number', 's:0:"";'),
('date:distribution:teaser:field_asset_last_modification_multiple_to', 's:0:"";'),
('date:distribution:teaser:field_asset_last_modification_show_repeat_rule', 's:4:"show";'),
('enable_revisions_page_distribution', 'i:1;'),
('fivestar_distribution', 'i:1;'),
('fivestar_feedback_distribution', 'i:1;'),
('fivestar_labels_distribution', 'a:11:{i:0;s:13:"Cancel rating";i:1;s:4:"Poor";i:2;s:4:"Okay";i:3;s:4:"Good";i:4;s:5:"Great";i:5;s:7:"Awesome";i:6;s:20:"Give it @star/@count";i:7;s:20:"Give it @star/@count";i:8;s:20:"Give it @star/@count";i:9;s:20:"Give it @star/@count";i:10;s:20:"Give it @star/@count";}'),
('fivestar_labels_enable_distribution', 'i:1;'),
('fivestar_position_distribution', 's:5:"below";'),
('fivestar_position_teaser_distribution', 's:6:"hidden";'),
('fivestar_stars_distribution', 's:1:"5";'),
('fivestar_style_distribution', 's:7:"average";'),
('fivestar_text_distribution', 's:4:"none";'),
('fivestar_title_distribution', 'i:0;'),
('fivestar_unvote_distribution', 'i:1;'),
('form_build_id_distribution', 's:37:"form-56dc63fffb2fdfa33e0747c29421350e";'),
('language_content_type_distribution', 's:1:"0";'),
('new_revisions_distribution', 's:1:"0";'),
('node_options_distribution', 'a:2:{i:0;s:6:"status";i:1;s:7:"promote";}'),
('og_content_type_usage_distribution', 's:7:"omitted";'),
('og_max_groups_distribution', 's:0:"";'),
('pathauto_node_distribution_pattern', 's:28:"catalogue/[type]/[title-raw]";'),
('popups_reference_show_add_link_field_asset_distribution', 'i:1;'),
('popups_reference_show_add_link_field_distribution_licence', 'i:1;'),
('revisioning_auto_publish_distribution', 'i:0;'),
('show_diff_inline_distribution', 'i:0;'),
('show_preview_changes_distribution', 'i:1;'),
('subscriptions_default_workflow_distribution', 'a:6:{s:5:"n_new";s:5:"n_new";s:7:"n_unpub";s:7:"n_unpub";s:5:"n_pub";s:5:"n_pub";s:5:"c_new";s:5:"c_new";s:7:"c_unpub";s:7:"c_unpub";s:5:"c_pub";s:5:"c_pub";}'),
('subscriptions_workflow_distribution', 'a:6:{i:0;s:5:"n_new";i:1;s:7:"n_unpub";i:2;s:5:"n_pub";i:3;s:5:"c_new";i:4;s:7:"c_unpub";i:5;s:5:"c_pub";}'),
('unique_field_comp_distribution', 's:4:"each";'),
('unique_field_fields_distribution', 'a:1:{i:0;s:12:"field_id_uri";}'),
('unique_field_scope_distribution', 's:4:"type";'),
('unique_field_show_matches_distribution', 'a:0:{}'),
('upload_distribution', 's:1:"0";'),
('workflow_distribution', 'a:1:{i:0;s:4:"node";}');




-- #############################
-- # CONTENT TYPE DOCUMENTATION #
-- #############################

--
-- Structure de la table `content_field_documentation_title`
--

CREATE TABLE IF NOT EXISTS `content_field_documentation_title` (
  `vid` int(10) unsigned NOT NULL DEFAULT '0',
  `nid` int(10) unsigned NOT NULL DEFAULT '0',
  `delta` int(10) unsigned NOT NULL DEFAULT '0',
  `field_documentation_title_type` varchar(32) DEFAULT NULL,
  `field_documentation_title_value` longtext,
  `field_documentation_title_item_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`vid`,`delta`),
  KEY `nid` (`nid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Structure de la table `content_field_documentation`
--

CREATE TABLE IF NOT EXISTS `content_field_documentation` (
  `vid` int(10) unsigned NOT NULL DEFAULT '0',
  `nid` int(10) unsigned NOT NULL DEFAULT '0',
  `delta` int(10) unsigned NOT NULL DEFAULT '0',
  `field_documentation_fid` int(11) DEFAULT NULL,
  `field_documentation_list` tinyint(4) DEFAULT NULL,
  `field_documentation_data` text,
  PRIMARY KEY (`vid`,`delta`),
  KEY `nid` (`nid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


--
-- Structure de la table `content_type_documentation`
--

CREATE TABLE IF NOT EXISTS `content_type_documentation` (
  `vid` int(10) unsigned NOT NULL DEFAULT '0',
  `nid` int(10) unsigned NOT NULL DEFAULT '0',
  `field_documentation_access_url_fid` int(11) DEFAULT NULL,
  `field_documentation_access_url_list` tinyint(4) DEFAULT NULL,
  `field_documentation_access_url_data` text,
  `field_documentation_access_url1_url` varchar(2048) DEFAULT NULL,
  `field_documentation_access_url1_title` varchar(255) DEFAULT NULL,
  `field_documentation_access_url1_attributes` mediumtext,
  PRIMARY KEY (`vid`),
  KEY `nid` (`nid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



REPLACE INTO `variable` (`name`, `value`) VALUES
('comment_anonymous_documentation', 'i:0;'),
('comment_controls_documentation', 's:1:"3";'),
('comment_default_mode_documentation', 's:1:"2";'),
('comment_default_order_documentation', 's:1:"1";'),
('comment_default_per_page_documentation', 's:2:"10";'),
('comment_documentation', 's:1:"2";'),
('comment_form_location_documentation', 's:1:"1";'),
('comment_preview_documentation', 's:1:"0";'),
('comment_subject_field_documentation', 's:1:"0";'),
('comment_upload_documentation', 's:1:"0";'),
('comment_upload_images_documentation', 's:4:"none";'),
('content_extra_weights_documentation', 'a:10:{s:5:"title";s:2:"10";s:10:"body_field";s:2:"16";s:20:"revision_information";s:2:"20";s:6:"author";s:2:"19";s:7:"options";s:2:"21";s:16:"comment_settings";s:2:"22";s:4:"menu";s:2:"15";s:4:"path";s:2:"23";s:8:"workflow";s:2:"18";s:9:"nodewords";s:2:"17";}'),
('content_profile_use_documentation', 'i:0;'),
('enable_revisions_page_documentation', 'i:1;'),
('fivestar_documentation', 'i:1;'),
('fivestar_feedback_documentation', 'i:1;'),
('fivestar_labels_documentation', 'a:11:{i:0;s:13:"Cancel rating";i:1;s:4:"Poor";i:2;s:4:"Okay";i:3;s:4:"Good";i:4;s:5:"Great";i:5;s:7:"Awesome";i:6;s:20:"Give it @star/@count";i:7;s:20:"Give it @star/@count";i:8;s:20:"Give it @star/@count";i:9;s:20:"Give it @star/@count";i:10;s:20:"Give it @star/@count";}'),
('fivestar_labels_enable_documentation', 'i:1;'),
('fivestar_position_documentation', 's:5:"below";'),
('fivestar_position_teaser_documentation', 's:6:"hidden";'),
('fivestar_stars_documentation', 's:1:"5";'),
('fivestar_style_documentation', 's:7:"average";'),
('fivestar_text_documentation', 's:4:"none";'),
('fivestar_title_documentation', 'i:0;'),
('fivestar_unvote_documentation', 'i:1;'),
('form_build_id_documentation', 's:37:"form-1e2c68f62c371f797b4b1f3cf273dc9e";'),
('language_content_type_documentation', 's:1:"0";'),
('nature_of_documentation_vid', 's:2:"55";'),
('new_revisions_documentation', 's:1:"0";'),
('node_options_documentation', 'a:2:{i:0;s:6:"status";i:1;s:7:"promote";}'),
('og_content_type_usage_documentation', 's:7:"omitted";'),
('og_max_groups_documentation', 's:0:"";'),
('pathauto_node_documentation_pattern', 's:0:"";'),
('popups_reference_show_add_link_field_asset_documentation', 'i:1;'),
('revisioning_auto_publish_documentation', 'i:0;'),
('show_diff_inline_documentation', 'i:0;'),
('show_preview_changes_documentation', 'i:1;'),
('subscriptions_default_workflow_documentation', 'a:6:{s:5:"n_new";s:5:"n_new";s:7:"n_unpub";s:7:"n_unpub";s:5:"n_pub";s:5:"n_pub";s:5:"c_new";s:5:"c_new";s:7:"c_unpub";s:7:"c_unpub";s:5:"c_pub";s:5:"c_pub";}'),
('subscriptions_workflow_documentation', 'a:6:{i:0;s:5:"n_new";i:1;s:7:"n_unpub";i:2;s:5:"n_pub";i:3;s:5:"c_new";i:4;s:7:"c_unpub";i:5;s:5:"c_pub";}'),
('unique_field_comp_documentation', 's:4:"each";'),
('unique_field_fields_documentation', 'a:1:{i:0;s:12:"field_id_uri";}'),
('unique_field_scope_documentation', 's:4:"type";'),
('unique_field_show_matches_documentation', 'a:0:{}'),
('upload_documentation', 's:1:"0";'),
('workflow_documentation', 'a:1:{i:0;s:4:"node";}');





-- ##############################
-- # CONTENT TYPE ASSET RELEASE #
-- ##############################


--
-- Structure de la table `content_field_asset_alternative_name`
--

CREATE TABLE IF NOT EXISTS `content_field_asset_alternative_name` (
  `vid` int(10) unsigned NOT NULL DEFAULT '0',
  `nid` int(10) unsigned NOT NULL DEFAULT '0',
  `delta` int(10) unsigned NOT NULL DEFAULT '0',
  `field_asset_alternative_name_type` varchar(32) DEFAULT NULL,
  `field_asset_alternative_name_value` longtext,
  `field_asset_alternative_name_item_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`vid`,`delta`),
  KEY `nid` (`nid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `content_field_asset_contact_point`
--

CREATE TABLE IF NOT EXISTS `content_field_asset_contact_point` (
  `vid` int(10) unsigned NOT NULL DEFAULT '0',
  `nid` int(10) unsigned NOT NULL DEFAULT '0',
  `delta` int(10) unsigned NOT NULL DEFAULT '0',
  `field_asset_contact_point_nid` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`vid`,`delta`),
  KEY `nid` (`nid`),
  KEY `field_asset_contact_point_nid` (`field_asset_contact_point_nid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `content_field_asset_description`
--

CREATE TABLE IF NOT EXISTS `content_field_asset_description` (
  `vid` int(10) unsigned NOT NULL DEFAULT '0',
  `nid` int(10) unsigned NOT NULL DEFAULT '0',
  `delta` int(10) unsigned NOT NULL DEFAULT '0',
  `field_asset_description_type` varchar(32) DEFAULT NULL,
  `field_asset_description_value` longtext,
  `field_asset_description_item_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`vid`,`delta`),
  KEY `nid` (`nid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `content_field_asset_distribution`
--

CREATE TABLE IF NOT EXISTS `content_field_asset_distribution` (
  `vid` int(10) unsigned NOT NULL DEFAULT '0',
  `nid` int(10) unsigned NOT NULL DEFAULT '0',
  `delta` int(10) unsigned NOT NULL DEFAULT '0',
  `field_asset_distribution_nid` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`vid`,`delta`),
  KEY `nid` (`nid`),
  KEY `field_asset_distribution_nid` (`field_asset_distribution_nid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `content_field_asset_documentation`
--

CREATE TABLE IF NOT EXISTS `content_field_asset_documentation` (
  `vid` int(10) unsigned NOT NULL DEFAULT '0',
  `nid` int(10) unsigned NOT NULL DEFAULT '0',
  `delta` int(10) unsigned NOT NULL DEFAULT '0',
  `field_asset_documentation_nid` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`vid`,`delta`),
  KEY `nid` (`nid`),
  KEY `field_asset_documentation_nid` (`field_asset_documentation_nid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


--
-- Structure de la table `content_field_asset_homepage_doc`
--

CREATE TABLE IF NOT EXISTS `content_field_asset_homepage_doc` (
  `vid` int(10) unsigned NOT NULL DEFAULT '0',
  `nid` int(10) unsigned NOT NULL DEFAULT '0',
  `delta` int(10) unsigned NOT NULL DEFAULT '0',
  `field_asset_homepage_doc_nid` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`vid`,`delta`),
  KEY `nid` (`nid`),
  KEY `field_asset_homepage_doc_nid` (`field_asset_homepage_doc_nid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


--
-- Structure de la table `content_field_asset_identifier`
--

CREATE TABLE IF NOT EXISTS `content_field_asset_identifier` (
  `vid` int(10) unsigned NOT NULL DEFAULT '0',
  `nid` int(10) unsigned NOT NULL DEFAULT '0',
  `delta` int(10) unsigned NOT NULL DEFAULT '0',
  `field_asset_identifier_type` varchar(32) DEFAULT NULL,
  `field_asset_identifier_value` longtext,
  `field_asset_identifier_item_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`vid`,`delta`),
  KEY `nid` (`nid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `content_field_asset_item`
--

CREATE TABLE IF NOT EXISTS `content_field_asset_item` (
  `vid` int(10) unsigned NOT NULL DEFAULT '0',
  `nid` int(10) unsigned NOT NULL DEFAULT '0',
  `delta` int(10) unsigned NOT NULL DEFAULT '0',
  `field_asset_item_nid` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`vid`,`delta`),
  KEY `nid` (`nid`),
  KEY `field_asset_item_nid` (`field_asset_item_nid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Structure de la table `content_field_asset_last_modification`
--

CREATE TABLE IF NOT EXISTS `content_field_asset_last_modification` (
  `vid` int(10) unsigned NOT NULL DEFAULT '0',
  `nid` int(10) unsigned NOT NULL DEFAULT '0',
  `field_asset_last_modification_value` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`vid`),
  KEY `nid` (`nid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Structure de la table `content_field_asset_metadata_date`
--

CREATE TABLE IF NOT EXISTS `content_field_asset_metadata_date` (
  `vid` int(10) unsigned NOT NULL DEFAULT '0',
  `nid` int(10) unsigned NOT NULL DEFAULT '0',
  `delta` int(10) unsigned NOT NULL DEFAULT '0',
  `field_asset_metadata_date_value` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`vid`,`delta`),
  KEY `nid` (`nid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Structure de la table `content_field_asset_metadata_publisher`
--

CREATE TABLE IF NOT EXISTS `content_field_asset_metadata_publisher` (
  `vid` int(10) unsigned NOT NULL DEFAULT '0',
  `nid` int(10) unsigned NOT NULL DEFAULT '0',
  `delta` int(10) unsigned NOT NULL DEFAULT '0',
  `field_asset_metadata_publisher_nid` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`vid`,`delta`),
  KEY `nid` (`nid`),
  KEY `field_asset_metadata_publisher_nid` (`field_asset_metadata_publisher_nid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


--
-- Structure de la table `content_field_asset_name`
--

CREATE TABLE IF NOT EXISTS `content_field_asset_name` (
  `vid` int(10) unsigned NOT NULL DEFAULT '0',
  `nid` int(10) unsigned NOT NULL DEFAULT '0',
  `delta` int(10) unsigned NOT NULL DEFAULT '0',
  `field_asset_name_type` varchar(32) DEFAULT NULL,
  `field_asset_name_value` longtext,
  `field_asset_name_item_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`vid`,`delta`),
  KEY `nid` (`nid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Structure de la table `content_field_asset_node_reference`
--

CREATE TABLE IF NOT EXISTS `content_field_asset_node_reference` (
  `vid` int(10) unsigned NOT NULL DEFAULT '0',
  `nid` int(10) unsigned NOT NULL DEFAULT '0',
  `delta` int(10) unsigned NOT NULL DEFAULT '0',
  `field_asset_node_reference_type` varchar(32) DEFAULT NULL,
  `field_asset_node_reference_value` longtext,
  `field_asset_node_reference_item_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`vid`,`delta`),
  KEY `nid` (`nid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Structure de la table `content_field_asset_publisher`
--

CREATE TABLE IF NOT EXISTS `content_field_asset_publisher` (
  `vid` int(10) unsigned NOT NULL DEFAULT '0',
  `nid` int(10) unsigned NOT NULL DEFAULT '0',
  `delta` int(10) unsigned NOT NULL DEFAULT '0',
  `field_asset_publisher_nid` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`vid`,`delta`),
  KEY `nid` (`nid`),
  KEY `field_asset_publisher_nid` (`field_asset_publisher_nid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


--
-- Structure de la table `content_field_asset_related_doc`
--

CREATE TABLE IF NOT EXISTS `content_field_asset_related_doc` (
  `vid` int(10) unsigned NOT NULL DEFAULT '0',
  `nid` int(10) unsigned NOT NULL DEFAULT '0',
  `delta` int(10) unsigned NOT NULL DEFAULT '0',
  `field_asset_related_doc_nid` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`vid`,`delta`),
  KEY `nid` (`nid`),
  KEY `field_asset_related_doc_nid` (`field_asset_related_doc_nid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Structure de la table `content_field_asset_temporal_coverage`
--

CREATE TABLE IF NOT EXISTS `content_field_asset_temporal_coverage` (
  `vid` int(10) unsigned NOT NULL DEFAULT '0',
  `nid` int(10) unsigned NOT NULL DEFAULT '0',
  `delta` int(10) unsigned NOT NULL DEFAULT '0',
  `field_asset_temporal_coverage_value` varchar(20) DEFAULT NULL,
  `field_asset_temporal_coverage_value2` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`vid`,`delta`),
  KEY `nid` (`nid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Structure de la table `content_field_asset_webpage_doc`
--

CREATE TABLE IF NOT EXISTS `content_field_asset_webpage_doc` (
  `vid` int(10) unsigned NOT NULL DEFAULT '0',
  `nid` int(10) unsigned NOT NULL DEFAULT '0',
  `delta` int(10) unsigned NOT NULL DEFAULT '0',
  `field_asset_webpage_doc_nid` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`vid`,`delta`),
  KEY `nid` (`nid`),
  KEY `field_asset_webpage_doc_nid` (`field_asset_webpage_doc_nid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `content_type_asset_release`
--

CREATE TABLE IF NOT EXISTS `content_type_asset_release` (
  `vid` int(10) unsigned NOT NULL DEFAULT '0',
  `nid` int(10) unsigned NOT NULL DEFAULT '0',
  `field_asset_version_note_type` varchar(32) DEFAULT NULL,
  `field_asset_version_note_value` longtext,
  `field_asset_version_note_item_id` int(10) unsigned DEFAULT NULL,
  `field_asset_version_type` varchar(32) DEFAULT NULL,
  `field_asset_version_value` longtext,
  `field_asset_version_item_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`vid`),
  KEY `nid` (`nid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

REPLACE INTO `variable` (`name`, `value`) VALUES
('asset_release_asset_validated_mail_author_body', 's:305:"<p>&nbsp;</p>\r\n<div>\r\n	Dear [recipient-firstname],</div>\r\n<div>\r\n	Your asset release [isa_node_link] has been accepted and published.</div>\r\n<div>\r\n	It is now visible for any registered or not users on the [site-name] site.</div>\r\n<div>\r\n	Thank you for sharing information on the [site-name] site.</div>\r\n";'),
('asset_release_asset_validated_mail_author_title', 's:37:"Your asset release has been published";'),
('asset_release_asset_validated_mail_moderator_body', 's:199:"<p>&nbsp;</p>\r\n<p>Dear [recipient-firstname],</p>\r\n<p>User [author_linked] has validated the following content:</p>\r\n<p>[isa_node_link]</p>\r\n<p>Click on the link below to view this new content.</p>\r\n";'),
('asset_release_asset_validated_mail_moderator_title', 's:28:"[isa_node_type] item created";'),
('asset_release_blacklisted_mail_author_body', 's:229:"<p>&nbsp;</p>\r\n<p>Dear&nbsp;<span>[recipient-firstname],</span></p>\r\n<p>The&nbsp;[type] &quot;[title]&quot;&nbsp;has been added to blacklist by the moderator for the following reason:</p>\r\n<p><span>[comment_deletion]</span></p>\r\n";'),
('asset_release_blacklisted_mail_author_title', 's:41:"The [type] "[title]" has been blacklisted";'),
('asset_release_reject_request_deletion_mail_author_body', 's:365:"<p>&nbsp;</p>\r\n<div>\r\n	<p>Dear&nbsp;<span>[recipient-firstname]</span>,</p>\r\n	<div>\r\n		<p>The&nbsp;<span class="il">deletion</span>&nbsp;of the&nbsp;<span>[type] &quot;[isa_node_link]&quot;</span>&nbsp;has been refused for the following reason.</p>\r\n		<p><span>[workflow-current-state-log-entry]</span></p>\r\n	</div>\r\n	<p>&nbsp;</p>\r\n</div>\r\n<p>The Joinup Team</p>\r\n";'),
('asset_release_reject_request_deletion_mail_author_title', 's:56:"Joinup: Deletion of asset release item has been rejected";'),
('asset_release_reject_request_deletion_mail_moderator_body', 's:42:"<p>moderator reject request deletion</p>\r\n";'),
('asset_release_reject_request_deletion_mail_moderator_title', 's:33:"moderator reject request deletion";'),
('asset_release_request_deletion_mail_author_body', 's:629:"<p>&nbsp;</p>\r\n<div>\r\n	<p>Dear&nbsp;<span>[recipient-firstname]</span><span>,</span></p>\r\n	<p>Your asset release&nbsp;<span>&quot;[isa_node_link]&quot;</span>&nbsp;has been&nbsp;<span class="il">requested</span>&nbsp;for&nbsp;<span class="il">deletion</span>. It requires the validation from site moderator, before it will be&nbsp;<span class="il">deleted</span>.</p>\r\n	<p>You will receive another message when the asset release is&nbsp;<span class="il">deleted or</span>&nbsp;rejected for&nbsp;<span class="il">deletion</span>.</p>\r\n	<p>Thank you for sharing information on the Joinup site.</p>\r\n</div>\r\n<p>The Joinup Team</p>\r\n";'),
('asset_release_request_deletion_mail_moderator_title', 's:56:"Joinup: Approval request deletion for asset release item";'),
('asset_release_deleted_mail_author_body', 's:228:"<p>Dear&nbsp;<span>[recipient-firstname],</span></p>\r\n<p>The Asset Release &quot;[title]&quot; (and all its distributions) has been deleted by the moderator for the following reason:</p>\r\n<p><span>[comment_deletion]</span></p>\r\n";'),
('asset_release_deleted_mail_author_title', 's:44:"The Asset Release "[title]" has been deleted";'),
('asset_release_request_deletion_mail_author_title', 's:67:"Joinup: asset release has been requested for deletion to moderators";'),
('asset_release_request_deletion_mail_moderator_body', 's:304:"<p>&nbsp;</p>\r\n<p>Dear [recipient-firstname],</p>\r\n<p>User [author_linked] wants to delete [isa_node_type] &quot;[isa_node_link]&quot;.</p>\r\n<p>The deletion of this content requires your validation.&nbsp;Please click on the link below to reach the validation or denial form.</p>\r\n<p>[node-edit-url]</p>\r\n";'),
('comment_anonymous_asset_release', 'i:0;'),
('comment_asset_release', 's:1:"2";'),
('comment_controls_asset_release', 's:1:"3";'),
('comment_default_mode_asset_release', 's:1:"2";'),
('comment_default_order_asset_release', 's:1:"1";'),
('comment_default_per_page_asset_release', 's:2:"10";'),
('comment_form_location_asset_release', 's:1:"1";'),
('comment_preview_asset_release', 's:1:"0";'),
('comment_subject_field_asset_release', 's:1:"0";'),
('comment_upload_asset_release', 's:1:"0";'),
('comment_upload_images_asset_release', 's:4:"none";'),
('content_extra_weights_asset_release', 'a:12:{s:5:"title";s:2:"59";s:10:"body_field";s:2:"62";s:20:"revision_information";s:2:"87";s:6:"author";s:2:"88";s:7:"options";s:2:"89";s:16:"comment_settings";s:2:"91";s:4:"menu";s:2:"85";s:8:"taxonomy";s:2:"71";s:4:"path";s:2:"90";s:10:"og_nodeapi";s:2:"84";s:8:"workflow";s:2:"92";s:9:"nodewords";s:2:"86";}'),
('content_profile_use_asset_release', 'i:0;'),
('date:asset_release:full:field_aset_metadata_date_fromto', 's:4:"both";'),
('date:asset_release:full:field_aset_metadata_date_multiple_from', 's:0:"";'),
('date:asset_release:full:field_aset_metadata_date_multiple_number', 's:0:"";'),
('date:asset_release:full:field_aset_metadata_date_multiple_to', 's:0:"";'),
('date:asset_release:full:field_aset_metadata_date_show_repeat_rule', 's:4:"show";'),
('date:asset_release:full:field_asset_last_modification_fromto', 's:4:"both";'),
('date:asset_release:full:field_asset_last_modification_multiple_from', 's:0:"";'),
('date:asset_release:full:field_asset_last_modification_multiple_number', 's:0:"";'),
('date:asset_release:full:field_asset_last_modification_multiple_to', 's:0:"";'),
('date:asset_release:full:field_asset_last_modification_show_repeat_rule', 's:4:"show";'),
('date:asset_release:full:field_asset_metadata_date_fromto', 's:4:"both";'),
('date:asset_release:full:field_asset_metadata_date_multiple_from', 's:0:"";'),
('date:asset_release:full:field_asset_metadata_date_multiple_number', 's:0:"";'),
('date:asset_release:full:field_asset_metadata_date_multiple_to', 's:0:"";'),
('date:asset_release:full:field_asset_metadata_date_show_repeat_rule', 's:4:"show";'),
('date:asset_release:full:field_asset_temporal_coverage_fromto', 's:4:"both";'),
('date:asset_release:full:field_asset_temporal_coverage_multiple_from', 's:0:"";'),
('date:asset_release:full:field_asset_temporal_coverage_multiple_number', 's:0:"";'),
('date:asset_release:full:field_asset_temporal_coverage_multiple_to', 's:0:"";'),
('date:asset_release:full:field_asset_temporal_coverage_show_repeat_rule', 's:4:"show";'),
('date:asset_release:teaser:field_aset_metadata_date_fromto', 's:4:"both";'),
('date:asset_release:teaser:field_aset_metadata_date_multiple_from', 's:0:"";'),
('date:asset_release:teaser:field_aset_metadata_date_multiple_number', 's:0:"";'),
('date:asset_release:teaser:field_aset_metadata_date_multiple_to', 's:0:"";'),
('date:asset_release:teaser:field_aset_metadata_date_show_repeat_rule', 's:4:"show";'),
('date:asset_release:teaser:field_asset_last_modification_fromto', 's:4:"both";'),
('date:asset_release:teaser:field_asset_last_modification_multiple_from', 's:0:"";'),
('date:asset_release:teaser:field_asset_last_modification_multiple_number', 's:0:"";'),
('date:asset_release:teaser:field_asset_last_modification_multiple_to', 's:0:"";'),
('date:asset_release:teaser:field_asset_last_modification_show_repeat_rule', 's:4:"show";'),
('date:asset_release:teaser:field_asset_metadata_date_fromto', 's:4:"both";'),
('date:asset_release:teaser:field_asset_metadata_date_multiple_from', 's:0:"";'),
('date:asset_release:teaser:field_asset_metadata_date_multiple_number', 's:0:"";'),
('date:asset_release:teaser:field_asset_metadata_date_multiple_to', 's:0:"";'),
('date:asset_release:teaser:field_asset_metadata_date_show_repeat_rule', 's:4:"show";'),
('date:asset_release:teaser:field_asset_temporal_coverage_fromto', 's:4:"both";'),
('date:asset_release:teaser:field_asset_temporal_coverage_multiple_from', 's:0:"";'),
('date:asset_release:teaser:field_asset_temporal_coverage_multiple_number', 's:0:"";'),
('date:asset_release:teaser:field_asset_temporal_coverage_multiple_to', 's:0:"";'),
('date:asset_release:teaser:field_asset_temporal_coverage_show_repeat_rule', 's:4:"show";'),
('enable_revisions_page_asset_release', 'i:1;'),
('fivestar_asset_release', 'i:1;'),
('fivestar_feedback_asset_release', 'i:1;'),
('fivestar_labels_asset_release', 'a:11:{i:0;s:13:"Cancel rating";i:1;s:4:"Poor";i:2;s:4:"Okay";i:3;s:4:"Good";i:4;s:5:"Great";i:5;s:7:"Awesome";i:6;s:20:"Give it @star/@count";i:7;s:20:"Give it @star/@count";i:8;s:20:"Give it @star/@count";i:9;s:20:"Give it @star/@count";i:10;s:20:"Give it @star/@count";}'),
('fivestar_labels_enable_asset_release', 'i:1;'),
('fivestar_position_asset_release', 's:5:"below";'),
('fivestar_position_teaser_asset_release', 's:6:"hidden";'),
('fivestar_stars_asset_release', 's:1:"5";'),
('fivestar_style_asset_release', 's:7:"average";'),
('fivestar_text_asset_release', 's:4:"none";'),
('fivestar_title_asset_release', 'i:0;'),
('fivestar_unvote_asset_release', 'i:1;'),
('form_build_id_asset_release', 's:37:"form-50aa576c54e2f1e01acbf29fc8abacb8";'),
('language_content_type_asset_release', 's:1:"0";'),
('new_revisions_asset_release', 's:1:"0";'),
('node_options_asset_release', 'a:3:{i:0;s:6:"status";i:1;s:7:"promote";i:2;s:8:"revision";}'),
('og_content_type_usage_asset_release', 's:19:"group_post_standard";'),
('og_max_groups_asset_release', 's:0:"";'),
('pathauto_node_asset_release_pattern', 's:0:"";'),
('revisioning_auto_publish_asset_release', 'i:0;'),
('show_diff_inline_asset_release', 'i:0;'),
('show_preview_changes_asset_release', 'i:1;'),
('subscriptions_default_workflow_asset_release', 'a:6:{s:5:"n_new";s:5:"n_new";s:7:"n_unpub";s:7:"n_unpub";s:5:"n_pub";s:5:"n_pub";s:5:"c_new";s:5:"c_new";s:7:"c_unpub";s:7:"c_unpub";s:5:"c_pub";s:5:"c_pub";}'),
('subscriptions_workflow_asset_release', 'a:6:{i:0;s:5:"n_new";i:1;s:7:"n_unpub";i:2;s:5:"n_pub";i:3;s:5:"c_new";i:4;s:7:"c_unpub";i:5;s:5:"c_pub";}'),
('unique_field_comp_asset_release', 's:4:"each";'),
('unique_field_fields_asset_release', 'a:1:{i:0;s:12:"field_id_uri";}'),
('unique_field_scope_asset_release', 's:4:"type";'),
('unique_field_show_matches_asset_release', 'a:0:{}'),
('upload_asset_release', 's:1:"0";'),
('workflow_asset_release', 'a:1:{i:0;s:4:"node";}');

REPLACE INTO `variable` (`name`, `value`) VALUES
('comment_anonymous_asset_node_reference', 'i:0;'),
('comment_asset_node_reference', 's:1:"2";'),
('comment_controls_asset_node_reference', 's:1:"3";'),
('comment_default_mode_asset_node_reference', 's:1:"4";'),
('comment_default_order_asset_node_reference', 's:1:"1";'),
('comment_default_per_page_asset_node_reference', 's:2:"50";'),
('comment_form_location_asset_node_reference', 's:1:"0";'),
('comment_preview_asset_node_reference', 's:1:"1";'),
('comment_subject_field_asset_node_reference', 's:1:"1";'),
('comment_upload_asset_node_reference', 's:1:"0";'),
('comment_upload_images_asset_node_reference', 's:4:"none";'),
('content_extra_weights_asset_node_reference', 'a:11:{s:5:"title";s:2:"-5";s:10:"body_field";s:2:"-3";s:20:"revision_information";s:1:"1";s:6:"author";s:1:"0";s:7:"options";s:1:"2";s:16:"comment_settings";s:1:"3";s:4:"menu";s:2:"-4";s:4:"path";s:1:"4";s:11:"attachments";s:1:"5";s:8:"workflow";s:2:"-1";s:9:"nodewords";s:2:"-2";}'),
('content_profile_use_asset_node_reference', 'i:0;'),
('enable_revisions_page_asset_node_reference', 'i:1;'),
('form_build_id_asset_node_reference', 's:37:"form-5de0193d30645ce87c13e5f6d5dc80ae";'),
('language_content_type_asset_node_reference', 's:1:"0";'),
('new_revisions_asset_node_reference', 's:1:"0";'),
('node_options_asset_node_reference', 'a:2:{i:0;s:6:"status";i:1;s:7:"promote";}'),
('og_content_type_usage_asset_node_reference', 's:7:"omitted";'),
('og_max_groups_asset_node_reference', 's:0:"";'),
('popups_reference_show_add_link_field_asset_node_reference_node', 'i:1;'),
('revisioning_auto_publish_asset_node_reference', 'i:0;'),
('show_diff_inline_asset_node_reference', 'i:0;'),
('show_preview_changes_asset_node_reference', 'i:1;'),
('subscriptions_default_workflow_asset_node_reference', 'a:6:{s:5:"n_new";s:5:"n_new";s:7:"n_unpub";s:7:"n_unpub";s:5:"n_pub";s:5:"n_pub";s:5:"c_new";s:5:"c_new";s:7:"c_unpub";s:7:"c_unpub";s:5:"c_pub";s:5:"c_pub";}'),
('subscriptions_workflow_asset_node_reference', 'a:6:{i:0;s:5:"n_new";i:1;s:7:"n_unpub";i:2;s:5:"n_pub";i:3;s:5:"c_new";i:4;s:7:"c_unpub";i:5;s:5:"c_pub";}'),
('unique_field_comp_asset_node_reference', 's:4:"each";'),
('unique_field_fields_asset_node_reference', 'a:0:{}'),
('unique_field_scope_asset_node_reference', 's:4:"type";'),
('unique_field_show_matches_asset_node_reference', 'a:0:{}'),
('upload_asset_node_reference', 's:1:"1";'),
('workflow_asset_node_reference', 'a:1:{i:0;s:4:"node";}');




-- ###########################
-- # CONTENT TYPE IDENTIFIER #
-- ###########################

--
-- Structure de la table `content_type_identifier`
--

CREATE TABLE IF NOT EXISTS `content_type_identifier` (
  `vid` int(10) unsigned NOT NULL DEFAULT '0',
  `nid` int(10) unsigned NOT NULL DEFAULT '0',
  `field_identifier_content_value` longtext,
  `field_identifier_scheme_value` longtext,
  `field_identifier_scheme_version_value` longtext,
  `field_identifier_scheme_agency_value` longtext,
  PRIMARY KEY (`vid`),
  KEY `nid` (`nid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- --------------------------------------------------------

--
-- Structure de la table `content_type_asset_node_reference`
--

CREATE TABLE IF NOT EXISTS `content_type_asset_node_reference` (
  `vid` int(10) unsigned NOT NULL DEFAULT '0',
  `nid` int(10) unsigned NOT NULL DEFAULT '0',
  `field_asset_node_reference_node_nid` int(10) unsigned DEFAULT NULL,
  `field_asset_node_relationship_value` longtext,
  PRIMARY KEY (`vid`),
  KEY `nid` (`nid`),
  KEY `field_asset_node_reference_node_nid` (`field_asset_node_reference_node_nid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



REPLACE INTO `variable` (`name`, `value`) VALUES
('comment_anonymous_identifier', 'i:0;'),
('comment_controls_identifier', 's:1:"3";'),
('comment_default_mode_identifier', 's:1:"4";'),
('comment_default_order_identifier', 's:1:"1";'),
('comment_default_per_page_identifier', 's:2:"50";'),
('comment_form_location_identifier', 's:1:"0";'),
('comment_identifier', 's:1:"0";'),
('comment_preview_identifier', 's:1:"1";'),
('comment_subject_field_identifier', 's:1:"1";'),
('comment_upload_identifier', 's:1:"0";'),
('comment_upload_images_identifier', 's:4:"none";'),
('content_extra_weights_identifier', 'a:10:{s:5:"title";s:2:"-5";s:10:"body_field";s:2:"-3";s:20:"revision_information";s:1:"0";s:6:"author";s:1:"1";s:7:"options";s:1:"2";s:16:"comment_settings";s:1:"4";s:4:"menu";s:2:"-4";s:4:"path";s:1:"3";s:8:"workflow";s:2:"-1";s:9:"nodewords";s:2:"-2";}'),
('content_profile_use_identifier', 'i:0;'),
('enable_revisions_page_identifier', 'i:1;'),
('language_content_type_identifier', 's:1:"0";'),
('new_revisions_identifier', 's:1:"0";'),
('node_options_identifier', 'a:2:{i:0;s:6:"status";i:1;s:7:"promote";}'),
('og_content_type_usage_identifier', 's:7:"omitted";'),
('og_max_groups_identifier', 's:0:"";'),
('revisioning_auto_publish_identifier', 'i:0;'),
('show_diff_inline_identifier', 'i:0;'),
('show_preview_changes_identifier', 'i:1;'),
('subscriptions_default_workflow_identifier', 'a:6:{s:5:"n_new";s:5:"n_new";s:7:"n_unpub";s:7:"n_unpub";s:5:"n_pub";s:5:"n_pub";s:5:"c_new";s:5:"c_new";s:7:"c_unpub";s:7:"c_unpub";s:5:"c_pub";s:5:"c_pub";}'),
('subscriptions_workflow_identifier', 'a:6:{i:0;s:5:"n_new";i:1;s:7:"n_unpub";i:2;s:5:"n_pub";i:3;s:5:"c_new";i:4;s:7:"c_unpub";i:5;s:5:"c_pub";}'),
('upload_identifier', 's:1:"0";'),
('workflow_identifier', 'a:1:{i:0;s:4:"node";}');



-- ####################
-- # CONTENT FIELD ID #
-- ####################

CREATE TABLE IF NOT EXISTS `content_field_id_uri` (
  `vid` int(10) unsigned NOT NULL DEFAULT '0',
  `nid` int(10) unsigned NOT NULL DEFAULT '0',
  `field_id_uri_value` longtext,
  PRIMARY KEY (`vid`),
  KEY `nid` (`nid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- #############################
-- # CONTENT LANGUAGE MULTIPLR #
-- #############################

--
-- Structure de la table `content_field_language_multiple`
--

CREATE TABLE IF NOT EXISTS `content_field_language_multiple` (
  `vid` int(10) unsigned NOT NULL DEFAULT '0',
  `nid` int(10) unsigned NOT NULL DEFAULT '0',
  `delta` int(10) unsigned NOT NULL DEFAULT '0',
  `field_language_multiple_value` longtext,
  PRIMARY KEY (`vid`,`delta`),
  KEY `nid` (`nid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Structure de la table `content_field_metadata_language_multiple`
--

CREATE TABLE IF NOT EXISTS `content_field_metadata_language_multiple` (
  `vid` int(10) unsigned NOT NULL DEFAULT '0',
  `nid` int(10) unsigned NOT NULL DEFAULT '0',
  `delta` int(10) unsigned NOT NULL DEFAULT '0',
  `field_metadata_language_multiple_value` longtext,
  PRIMARY KEY (`vid`,`delta`),
  KEY `nid` (`nid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;