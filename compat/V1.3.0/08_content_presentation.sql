

--
-- Structure de la table `content_type_presentation`
--

CREATE TABLE IF NOT EXISTS `content_type_presentation` (
  `vid` int(10) unsigned NOT NULL DEFAULT '0',
  `nid` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`vid`),
  KEY `nid` (`nid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



--
-- Structure de la table `content_field_presentation_upload_files`
--

CREATE TABLE IF NOT EXISTS `content_field_presentation_upload_files` (
  `vid` int(10) unsigned NOT NULL DEFAULT '0',
  `nid` int(10) unsigned NOT NULL DEFAULT '0',
  `delta` int(10) unsigned NOT NULL DEFAULT '0',
  `field_presentation_upload_files_fid` int(11) DEFAULT NULL,
  `field_presentation_upload_files_list` tinyint(4) DEFAULT NULL,
  `field_presentation_upload_files_data` text,
  PRIMARY KEY (`vid`,`delta`),
  KEY `nid` (`nid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


--
-- Contenu de la table `variable`
--
REPLACE INTO `variable` (`name`, `value`) VALUES
('comment_anonymous_presentation', 'i:0;'),
('comment_controls_presentation', 's:1:"3";'),
('comment_default_mode_presentation', 's:1:"4";'),
('comment_default_order_presentation', 's:1:"1";'),
('comment_default_per_page_presentation', 's:2:"50";'),
('comment_form_location_presentation', 's:1:"1";'),
('comment_presentation', 's:1:"2";'),
('comment_preview_presentation', 's:1:"0";'),
('comment_subject_field_presentation', 's:1:"0";'),
('comment_upload_images_presentation', 's:4:"none";'),
('comment_upload_presentation', 's:1:"0";'),
('content_extra_weights_presentation', 'a:11:{s:5:"title";s:1:"0";s:10:"body_field";s:1:"1";s:20:"revision_information";s:2:"12";s:6:"author";s:1:"7";s:7:"options";s:1:"8";s:16:"comment_settings";s:2:"11";s:4:"menu";s:1:"5";s:8:"taxonomy";s:1:"3";s:4:"path";s:1:"9";s:8:"workflow";s:1:"6";s:9:"nodewords";s:1:"4";}'),
('content_profile_use_presentation', 'i:0;'),
('enable_revisions_page_presentation', 'i:1;'),
('fivestar_feedback_presentation', 'i:1;'),
('fivestar_labels_enable_presentation', 'i:1;'),
('fivestar_labels_presentation', 'a:11:{i:0;s:13:"Cancel rating";i:1;s:4:"Poor";i:2;s:4:"Okay";i:3;s:4:"Good";i:4;s:5:"Great";i:5;s:7:"Awesome";i:6;s:20:"Give it @star/@count";i:7;s:20:"Give it @star/@count";i:8;s:20:"Give it @star/@count";i:9;s:20:"Give it @star/@count";i:10;s:20:"Give it @star/@count";}'),
('fivestar_position_presentation', 's:5:"below";'),
('fivestar_position_teaser_presentation', 's:6:"hidden";'),
('fivestar_presentation', 'i:1;'),
('fivestar_stars_presentation', 's:1:"5";'),
('fivestar_style_presentation', 's:7:"average";'),
('fivestar_text_presentation', 's:4:"none";'),
('fivestar_title_presentation', 'i:0;'),
('fivestar_unvote_presentation', 'i:1;'),
('form_build_id_presentation', 's:37:"form-82ffeff9b91692ea9cb1988b14cd7214";'),
('language_content_type_presentation', 's:1:"0";'),
('new_revisions_presentation', 's:1:"0";'),
('node_options_presentation', 'a:3:{i:0;s:6:"status";i:1;s:8:"revision";i:2;s:19:"revision_moderation";}'),
('og_content_type_usage_presentation', 's:7:"omitted";'),
('og_max_groups_presentation', 's:0:"";'),
('pathauto_node_presentation_pattern', 's:27:"elibrary/[type]/[title-raw]";'),
('revisioning_auto_publish_presentation', 'i:1;'),
('show_diff_inline_presentation', 'i:0;'),
('show_preview_changes_presentation', 'i:1;'),
('subscriptions_default_workflow_presentation', 'a:6:{s:5:"n_new";s:5:"n_new";s:7:"n_unpub";s:7:"n_unpub";s:5:"n_pub";s:5:"n_pub";s:5:"c_new";s:5:"c_new";s:7:"c_unpub";s:7:"c_unpub";s:5:"c_pub";s:5:"c_pub";}'),
('subscriptions_workflow_presentation', 'a:6:{i:0;s:5:"n_new";i:1;s:7:"n_unpub";i:2;s:5:"n_pub";i:3;s:5:"c_new";i:4;s:7:"c_unpub";i:5;s:5:"c_pub";}'),
('upload_presentation', 's:1:"0";'),
('workflow_presentation', 'a:1:{i:0;s:4:"node";}');



CREATE TABLE IF NOT EXISTS `content_field_publisher` (
  `vid` int(10) unsigned NOT NULL DEFAULT '0',
  `nid` int(10) unsigned NOT NULL DEFAULT '0',
  `field_publisher_value` longtext,
  PRIMARY KEY (`vid`),
  KEY `nid` (`nid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `content_field_publication_date` (
  `vid` int(10) unsigned NOT NULL DEFAULT '0',
  `nid` int(10) unsigned NOT NULL DEFAULT '0',
  `field_publication_date_value` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`vid`),
  KEY `nid` (`nid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


INSERT INTO content_field_publisher (vid,nid,field_publisher_value)
SELECT vid, nid, field_publisher_value
FROM content_type_document;

INSERT INTO content_field_publication_date (vid,nid,field_publication_date_value)
SELECT vid, nid, field_publication_date_value
FROM content_type_document;

ALTER TABLE `content_type_document`
  DROP `field_publication_date_value`,
  DROP `field_publisher_value`;
