REPLACE INTO `variable` (`name`, `value`) VALUES 
('apachesolr_enabled_facets', 'a:5:{s:17:"apachesolr_search";a:24:{s:29:"field_language_textfield_lang";s:36:"ss_cck_field_language_textfield_lang";s:23:"field_language_multiple";s:30:"sm_cck_field_language_multiple";s:3:"uid";s:3:"uid";s:7:"created";s:7:"created";s:9:"im_vid_43";s:9:"im_vid_43";s:9:"im_vid_68";s:9:"im_vid_68";s:9:"im_vid_36";s:9:"im_vid_36";s:9:"im_vid_30";s:9:"im_vid_30";s:9:"im_vid_57";s:9:"im_vid_57";s:9:"im_vid_73";s:9:"im_vid_73";s:9:"im_vid_26";s:9:"im_vid_26";s:9:"im_vid_38";s:9:"im_vid_38";s:9:"im_vid_74";s:9:"im_vid_74";s:9:"im_vid_28";s:9:"im_vid_28";s:9:"im_vid_33";s:9:"im_vid_33";s:9:"im_vid_75";s:9:"im_vid_75";s:9:"im_vid_34";s:9:"im_vid_34";s:9:"im_vid_31";s:9:"im_vid_31";s:9:"im_vid_66";s:9:"im_vid_66";s:9:"im_vid_32";s:9:"im_vid_32";s:9:"im_vid_72";s:9:"im_vid_72";s:9:"im_vid_70";s:9:"im_vid_70";s:9:"im_vid_69";s:9:"im_vid_69";s:9:"im_vid_27";s:9:"im_vid_27";}s:23:"apachesolr_facetbuilder";a:1:{s:31:"sm_facetbuilder_facet_node_type";s:31:"sm_facetbuilder_facet_node_type";}s:24:"apachesolr_nodereference";a:8:{s:38:"is_cck_field_asset_node_reference_node";s:38:"is_cck_field_asset_node_reference_node";s:32:"im_cck_field_asset_contact_point";s:32:"im_cck_field_asset_contact_point";s:31:"im_cck_field_asset_distribution";s:31:"im_cck_field_asset_distribution";s:33:"im_cck_field_distribution_licence";s:33:"im_cck_field_distribution_licence";s:37:"im_cck_field_asset_metadata_publisher";s:37:"im_cck_field_asset_metadata_publisher";s:33:"im_cck_field_repository_publisher";s:33:"im_cck_field_repository_publisher";s:35:"im_cck_field_distribution_publisher";s:35:"im_cck_field_distribution_publisher";s:28:"im_cck_field_asset_publisher";s:28:"im_cck_field_asset_publisher";}s:13:"apachesolr_og";a:1:{s:9:"im_og_gid";s:9:"im_og_gid";}s:14:"isa_apachesolr";a:6:{s:18:"bs_current_version";s:18:"bs_current_version";s:10:"im_licence";s:10:"im_licence";s:15:"im_licence_type";s:15:"im_licence_type";s:12:"im_publisher";s:12:"im_publisher";s:17:"im_publisher_type";s:17:"im_publisher_type";s:20:"is_repository_origin";s:20:"is_repository_origin";}}'),
('global_site_header','s:69:"Share and reuse interoperability solutions for public administrations";'),
('site_mission','s:0:"";'),
('header_block_homepage_title','s:0:"";'),
('user_mail_password_reset_body', 's:492:"<p>Dear [recipient-firstname]</p>,</p><p>A request to reset the password for your account with the username of: "!username" has been made at !site.</p><p>You may now log in to !uri_brief by clicking on this link or copying and pasting it in your browser:</p><p>!login_url</p><p>This is a one-time login, so it can be used only once. It expires after one day and nothing will happen if it\'s notused.</p><p>After logging in, you will be redirected to !edit_uri so you can change your password.";'),
('asset_release_asset_validated_mail_moderator_body', 's:231:"<p>Dear [recipient-firstname],</p><p>User [author_linked] has created the following semantic asset release:</p><p>[isa_node_link]</p><p>Please click on the link above to view this release. It is now visible for any Joinup user.</p>";');
ALTER TABLE `blocks` CHANGE `delta` `delta` VARCHAR(64) CHARSET utf8 COLLATE utf8_general_ci DEFAULT '0' NOT NULL;
CREATE TABLE `content_type_advertisement` (
  `vid` int(10) unsigned NOT NULL DEFAULT '0',
  `nid` int(10) unsigned NOT NULL DEFAULT '0',
  `field_show_title_value` int(11) DEFAULT NULL,
  `field_advertisement_url_url` varchar(2048) DEFAULT NULL,
  `field_advertisement_url_title` varchar(255) DEFAULT NULL,
  `field_advertisement_url_attributes` mediumtext,
  PRIMARY KEY (`vid`),
  KEY `nid` (`nid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
CREATE TABLE `content_type_home_carousel` (
  `vid` int(10) unsigned NOT NULL DEFAULT '0',
  `nid` int(10) unsigned NOT NULL DEFAULT '0',
  `field_carousel_top_title_value` longtext,
  `field_carousel_url_url` varchar(2048) DEFAULT NULL,
  `field_carousel_url_title` varchar(255) DEFAULT NULL,
  `field_carousel_url_attributes` mediumtext,
  `field_carousel_overlay_value` int(11) DEFAULT NULL,
  PRIMARY KEY (`vid`),
  KEY `nid` (`nid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
CREATE TABLE `content_field_image` (
  `vid` int(10) unsigned NOT NULL DEFAULT '0',
  `nid` int(10) unsigned NOT NULL DEFAULT '0',
  `field_image_fid` int(11) DEFAULT NULL,
  `field_image_list` tinyint(4) DEFAULT NULL,
  `field_image_data` text,
  PRIMARY KEY (`vid`),
  KEY `nid` (`nid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;