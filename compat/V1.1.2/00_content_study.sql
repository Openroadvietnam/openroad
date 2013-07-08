

--
-- Structure de la table `content_type_study`
--

CREATE TABLE IF NOT EXISTS `content_type_study` (
  `vid` int(10) unsigned NOT NULL DEFAULT '0',
  `nid` int(10) unsigned NOT NULL DEFAULT '0',
  `field_type_study_value` longtext,
  PRIMARY KEY (`vid`),
  KEY `nid` (`nid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Structure de la table `content_field_document_study`
--

CREATE TABLE IF NOT EXISTS `content_field_document_study` (
  `vid` int(10) unsigned NOT NULL default '0',
  `nid` int(10) unsigned NOT NULL default '0',
  `delta` int(10) unsigned NOT NULL default '0',
  `field_document_study_fid` int(11) default NULL,
  `field_document_study_list` tinyint(4) default NULL,
  `field_document_study_data` text,
  PRIMARY KEY  (`vid`,`delta`),
  KEY `nid` (`nid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


--
-- Contenu de la table `variable`
--

INSERT INTO `variable` (`name`, `value`) VALUES
('comment_anonymous_study', 'i:0;'),
('comment_controls_study', 's:1:"3";'),
('comment_default_mode_study', 's:1:"4";'),
('comment_default_order_study', 's:1:"1";'),
('comment_default_per_page_study', 's:2:"50";'),
('comment_form_location_study', 's:1:"0";'),
('comment_preview_study', 's:1:"1";'),
('comment_study', 's:1:"0";'),
('comment_subject_field_study', 's:1:"1";'),
('comment_upload_images_study', 's:4:"none";'),
('comment_upload_study', 's:1:"0";'),
('content_extra_weights_study', 'a:11:{s:5:"title";s:1:"1";s:10:"body_field";s:1:"0";s:20:"revision_information";s:1:"8";s:6:"author";s:1:"7";s:7:"options";s:1:"9";s:16:"comment_settings";s:2:"10";s:4:"menu";s:1:"4";s:4:"path";s:2:"11";s:11:"attachments";s:2:"12";s:8:"workflow";s:1:"6";s:9:"nodewords";s:1:"5";}'),
('content_profile_use_study', 'i:0;'),
('enable_revisions_page_study', 'i:0;'),
('form_build_id_study', 's:37:"form-fa019b21986c0073b108ccc6fd3d8b0c";'),
('language_content_type_study', 's:1:"0";'),
('new_revisions_study', 's:1:"0";'),
('node_options_study', 'a:2:{i:0;s:6:"status";i:1;s:7:"promote";}'),
('og_content_type_usage_study', 's:7:"omitted";'),
('og_max_groups_study', 's:0:"";'),
('revisioning_auto_publish_study', 'i:0;'),
('show_diff_inline_study', 'i:0;'),
('show_preview_changes_study', 'i:0;'),
('subscriptions_default_workflow_study', 'a:6:{s:5:"n_new";s:5:"n_new";s:7:"n_unpub";s:7:"n_unpub";s:5:"n_pub";s:5:"n_pub";s:5:"c_new";s:5:"c_new";s:7:"c_unpub";s:7:"c_unpub";s:5:"c_pub";s:5:"c_pub";}'),
('subscriptions_workflow_study', 'a:6:{i:0;s:5:"n_new";i:1;s:7:"n_unpub";i:2;s:5:"n_pub";i:3;s:5:"c_new";i:4;s:7:"c_unpub";i:5;s:5:"c_pub";}'),
('upload_study', 's:1:"0";');
