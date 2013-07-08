ALTER TABLE `content_type_profile`
ADD `field_facebook_url` VARCHAR(2048) CHARSET utf8 COLLATE utf8_general_ci NULL,
ADD `field_facebook_title` VARCHAR(255) CHARSET utf8 COLLATE utf8_general_ci NULL,
ADD `field_facebook_attributes` mediumtext CHARSET utf8 COLLATE utf8_general_ci NULL,
ADD `field_twitter_url` VARCHAR(2048) CHARSET utf8 COLLATE utf8_general_ci NULL,
ADD `field_twitter_title` VARCHAR(255) CHARSET utf8 COLLATE utf8_general_ci NULL,
ADD `field_twitter_attributes` mediumtext CHARSET utf8 COLLATE utf8_general_ci NULL,
ADD `field_linkedin_url` VARCHAR(2048) CHARSET utf8 COLLATE utf8_general_ci NULL,
ADD `field_linkedin_title` VARCHAR(255) CHARSET utf8 COLLATE utf8_general_ci NULL,
ADD `field_linkedin_attributes` mediumtext CHARSET utf8 COLLATE utf8_general_ci NULL,
ADD `field_facebook_visibility_value` int(11) NULL,
ADD `field_twitter_visibility_value` int(11) NULL,
ADD `field_linkedin_visibility_value` int(11) NULL,
ADD `field_professional_profile_value` longtext CHARSET utf8 COLLATE utf8_general_ci NULL,
ADD `field_professional_p_visibility_value` int(11);



CREATE TABLE `content_field_image` (
  `vid` int(10) unsigned NOT NULL DEFAULT '0',
  `nid` int(10) unsigned NOT NULL DEFAULT '0',
  `field_image_fid` int(11) DEFAULT NULL,
  `field_image_list` tinyint(4) DEFAULT NULL,
  `field_image_data` text,
  PRIMARY KEY (`vid`),
  KEY `nid` (`nid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `content_field_show_title` (
  `vid` int(10) unsigned NOT NULL DEFAULT '0',
  `nid` int(10) unsigned NOT NULL DEFAULT '0',
  `field_show_title_value` int(11) DEFAULT NULL,
  PRIMARY KEY (`vid`),
  KEY `nid` (`nid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `content_field_top_title` (
  `vid` int(10) unsigned NOT NULL DEFAULT '0',
  `nid` int(10) unsigned NOT NULL DEFAULT '0',
  `field_top_title_value` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`vid`),
  KEY `nid` (`nid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS `content_type_advertisement`;
CREATE TABLE `content_type_advertisement` (
  `vid` int(10) unsigned NOT NULL DEFAULT '0',
  `nid` int(10) unsigned NOT NULL DEFAULT '0',
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



CREATE TABLE IF NOT EXISTS `advpoll` (
  `nid` int(10) unsigned NOT NULL DEFAULT '0',
  `quorum` int(10) unsigned DEFAULT '0',
  `mode` varchar(32) NOT NULL,
  `use_list` int(11) NOT NULL DEFAULT '0',
  `active` int(11) NOT NULL DEFAULT '1',
  `max_choices` int(10) unsigned NOT NULL DEFAULT '0',
  `algorithm` varchar(100) DEFAULT NULL,
  `show_votes` int(11) NOT NULL DEFAULT '1',
  `create_view_block` int(11) NOT NULL DEFAULT '0',
  `start_date` int(11) NOT NULL DEFAULT '0',
  `end_date` int(11) NOT NULL DEFAULT '0',
  `writeins` int(11) NOT NULL DEFAULT '0',
  `show_writeins` int(11) NOT NULL DEFAULT '0',
  `question` varchar(255) NOT NULL DEFAULT '',
  `footer_message` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`nid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `advpoll_choices` (
  `cid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nid` int(10) unsigned NOT NULL DEFAULT '0',
  `label` text NOT NULL,
  `weight` int(10) unsigned NOT NULL,
  `writein` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`cid`),
  KEY `nid` (`nid`,`weight`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `advpoll_electoral_list` (
  `nid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  PRIMARY KEY (`nid`,`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `content_type_advpoll_binary` (
  `vid` int(10) unsigned NOT NULL DEFAULT '0',
  `nid` int(10) unsigned NOT NULL DEFAULT '0',
  `field_question_value` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`vid`),
  KEY `nid` (`nid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



CREATE TABLE IF NOT EXISTS `isa_download_external_statics` (
  `dsid` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Autoincremental key',
  `did` int(11) DEFAULT NULL COMMENT 'Distribution id',
  `nid` int(11) DEFAULT NULL COMMENT 'Node associated to distribution id',
  `uid` int(11) DEFAULT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`dsid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
