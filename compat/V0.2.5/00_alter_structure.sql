
--
-- Structure de la table `comment_upload`
--

CREATE TABLE IF NOT EXISTS `comment_upload` (
  `fid` int(10) unsigned NOT NULL default '0',
  `nid` int(10) unsigned NOT NULL default '0',
  `cid` int(10) unsigned NOT NULL default '0',
  `description` varchar(255) NOT NULL default '',
  `list` tinyint(3) unsigned NOT NULL default '0',
  `weight` tinyint(4) NOT NULL default '0',
  `legacy_fid` int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (`fid`),
  KEY `cid_fid` (`cid`,`fid`),
  KEY `nid` (`nid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `content_field_project_common_contact`
--

CREATE TABLE IF NOT EXISTS `content_field_project_common_contact` (
  `vid` int(10) unsigned NOT NULL default '0',
  `nid` int(10) unsigned NOT NULL default '0',
  `field_project_common_contact_value` longtext,
  PRIMARY KEY  (`vid`),
  KEY `nid` (`nid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `content_field_project_common_type`
--

CREATE TABLE IF NOT EXISTS `content_field_project_common_type` (
  `vid` int(10) unsigned NOT NULL default '0',
  `nid` int(10) unsigned NOT NULL default '0',
  `field_project_common_type_value` int(11) default NULL,
  PRIMARY KEY  (`vid`),
  KEY `nid` (`nid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `content_field_project_common_using`
--

CREATE TABLE IF NOT EXISTS `content_field_project_common_using` (
  `vid` int(10) unsigned NOT NULL default '0',
  `nid` int(10) unsigned NOT NULL default '0',
  `delta` int(10) unsigned NOT NULL default '0',
  `field_project_common_using_nid` int(10) unsigned default NULL,
  PRIMARY KEY  (`vid`,`delta`),
  KEY `nid` (`nid`),
  KEY `field_project_common_using_nid` (`field_project_common_using_nid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `content_field_project_soft_features`
--

CREATE TABLE IF NOT EXISTS `content_field_project_soft_features` (
  `vid` int(10) unsigned NOT NULL default '0',
  `nid` int(10) unsigned NOT NULL default '0',
  `field_project_soft_features_value` longtext,
  `field_project_soft_features_format` int(10) unsigned default NULL,
  PRIMARY KEY  (`vid`),
  KEY `nid` (`nid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `content_field_project_soft_future_plans`
--

CREATE TABLE IF NOT EXISTS `content_field_project_soft_future_plans` (
  `vid` int(10) unsigned NOT NULL default '0',
  `nid` int(10) unsigned NOT NULL default '0',
  `field_project_soft_future_plans_value` longtext,
  `field_project_soft_future_plans_format` int(10) unsigned default NULL,
  PRIMARY KEY  (`vid`),
  KEY `nid` (`nid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `content_field_project_soft_get_involved`
--

CREATE TABLE IF NOT EXISTS `content_field_project_soft_get_involved` (
  `vid` int(10) unsigned NOT NULL default '0',
  `nid` int(10) unsigned NOT NULL default '0',
  `field_project_soft_get_involved_value` longtext,
  `field_project_soft_get_involved_format` int(10) unsigned default NULL,
  PRIMARY KEY  (`vid`),
  KEY `nid` (`nid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `content_field_project_soft_logo`
--

CREATE TABLE IF NOT EXISTS `content_field_project_soft_logo` (
  `vid` int(10) unsigned NOT NULL default '0',
  `nid` int(10) unsigned NOT NULL default '0',
  `field_project_soft_logo_fid` int(11) default NULL,
  `field_project_soft_logo_list` tinyint(4) default NULL,
  `field_project_soft_logo_data` text,
  PRIMARY KEY  (`vid`),
  KEY `nid` (`nid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `content_field_project_soft_public_admin`
--

CREATE TABLE IF NOT EXISTS `content_field_project_soft_public_admin` (
  `vid` int(10) unsigned NOT NULL default '0',
  `nid` int(10) unsigned NOT NULL default '0',
  `field_project_soft_public_admin_value` longtext,
  `field_project_soft_public_admin_format` int(10) unsigned default NULL,
  PRIMARY KEY  (`vid`),
  KEY `nid` (`nid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `content_field_project_soft_sponsor_logo`
--

CREATE TABLE IF NOT EXISTS `content_field_project_soft_sponsor_logo` (
  `vid` int(10) unsigned NOT NULL default '0',
  `nid` int(10) unsigned NOT NULL default '0',
  `field_project_soft_sponsor_logo_fid` int(11) default NULL,
  `field_project_soft_sponsor_logo_list` tinyint(4) default NULL,
  `field_project_soft_sponsor_logo_data` text,
  PRIMARY KEY  (`vid`),
  KEY `nid` (`nid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `content_type_federated_forge`
--

CREATE TABLE IF NOT EXISTS `content_type_federated_forge` (
  `vid` int(10) unsigned NOT NULL default '0',
  `nid` int(10) unsigned NOT NULL default '0',
  `field_forges_get_involved_value` longtext,
  `field_forges_email_value` longtext,
  `field_forges_logo_fid` int(11) default NULL,
  `field_forges_logo_list` tinyint(4) default NULL,
  `field_forges_logo_data` text,
  `field_forges_homepage_url` varchar(2048) default NULL,
  `field_forges_homepage_title` varchar(255) default NULL,
  `field_forges_homepage_attributes` mediumtext,
  `field_forges_xml_url` varchar(2048) default NULL,
  `field_forges_xml_title` varchar(255) default NULL,
  `field_forges_xml_attributes` mediumtext,
  `field_forges_get_involved_format` int(10) unsigned default NULL,
  PRIMARY KEY  (`vid`),
  KEY `nid` (`nid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `content_type_federated_project`
--

CREATE TABLE IF NOT EXISTS `content_type_federated_project` (
  `vid` int(10) unsigned NOT NULL default '0',
  `nid` int(10) unsigned NOT NULL default '0',
  `field_fed_project_link_url` varchar(2048) default NULL,
  `field_fed_project_link_title` varchar(255) default NULL,
  `field_fed_project_link_attributes` mediumtext,
  `field_fed_project_forge_nid` int(10) unsigned default NULL,
  PRIMARY KEY  (`vid`),
  KEY `nid` (`nid`),
  KEY `field_fed_project_forge_nid` (`field_fed_project_forge_nid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `content_type_profile`
--

ALTER TABLE `content_type_profile` DROP `field_organization_visibility_value`;
ALTER TABLE `content_type_profile` DROP `field_address_visibility_value`;

-- --------------------------------------------------------

--
-- Structure de la table `content_type_project_project`
--

ALTER TABLE `content_type_project_project` DROP `field_project_soft_features_value`;
ALTER TABLE `content_type_project_project` DROP `field_project_soft_future_plans_value`;
ALTER TABLE `content_type_project_project` DROP `field_project_soft_get_involved_value`;
ALTER TABLE `content_type_project_project` DROP `field_project_soft_public_admin_value`;
ALTER TABLE `content_type_project_project` DROP `field_project_common_contact_value`;               
ALTER TABLE `content_type_project_project` DROP `field_project_common_logo_fid`;
ALTER TABLE `content_type_project_project` DROP `field_project_common_logo_list`;
ALTER TABLE `content_type_project_project` DROP `field_project_common_logo_data`;
ALTER TABLE `content_type_project_project` DROP `field_project_soft_sponsor_logo_fid`;
ALTER TABLE `content_type_project_project` DROP `field_project_soft_sponsor_logo_list`;
ALTER TABLE `content_type_project_project` DROP `field_project_soft_sponsor_logo_data`;
ALTER TABLE `content_type_project_project` DROP `field_project_common_type_value`;
ALTER TABLE `content_type_project_project` ADD `field_ten_rules_value` int(11) default NULL;


-- --------------------------------------------------------

--
-- Structure de la table `isa_download_statistics`
--

CREATE TABLE IF NOT EXISTS `isa_download_statistics` (
  `dsid` smallint(5) unsigned NOT NULL auto_increment,
  `pid` int(10) unsigned NOT NULL default '0',
  `nid` int(10) unsigned NOT NULL default '0',
  `fid` int(10) unsigned NOT NULL default '0',
  `uid` int(10) unsigned NOT NULL default '0',
  `timestamp` int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (`dsid`),
  KEY `nid_uid` (`nid`,`uid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

-- --------------------------------------------------------

--
-- Structure de la table `project_issues`
--

CREATE TABLE IF NOT EXISTS `project_issues` (
  `nid` int(10) unsigned NOT NULL default '0',
  `pid` int(10) unsigned NOT NULL default '0',
  `category` varchar(255) NOT NULL default '',
  `component` varchar(255) NOT NULL default '',
  `priority` tinyint(3) unsigned NOT NULL default '0',
  `rid` int(10) unsigned NOT NULL default '0',
  `assigned` int(10) unsigned NOT NULL default '0',
  `sid` int(10) unsigned NOT NULL default '0',
  `original_issue_data` text NOT NULL,
  `last_comment_id` int(11) NOT NULL default '0',
  `db_lock` tinyint(4) NOT NULL default '0',
  PRIMARY KEY  (`nid`),
  KEY `project_issues_pid` (`pid`),
  KEY `project_issues_sid` (`sid`),
  KEY `project_issues_nid_assigned` (`nid`,`assigned`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `project_issue_comments`
--

CREATE TABLE IF NOT EXISTS `project_issue_comments` (
  `nid` int(11) default NULL,
  `cid` int(11) NOT NULL default '0',
  `rid` int(11) NOT NULL default '0',
  `component` varchar(255) NOT NULL default '',
  `category` varchar(255) NOT NULL default '',
  `priority` int(11) NOT NULL default '0',
  `assigned` int(11) NOT NULL default '0',
  `sid` int(11) NOT NULL default '0',
  `pid` int(10) unsigned NOT NULL default '0',
  `title` varchar(255) NOT NULL,
  `timestamp` int(10) unsigned NOT NULL,
  `comment_number` int(11) NOT NULL default '0',
  PRIMARY KEY  (`cid`),
  KEY `nid_timestamp` (`nid`,`timestamp`),
  KEY `comment_number` (`comment_number`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `project_issue_projects`
--

CREATE TABLE IF NOT EXISTS `project_issue_projects` (
  `nid` int(10) unsigned NOT NULL default '0',
  `issues` tinyint(4) NOT NULL default '0',
  `components` text,
  `default_component` varchar(255) NOT NULL default '',
  `help` text,
  `mail_digest` varchar(255) NOT NULL default '',
  `mail_copy` varchar(255) NOT NULL default '',
  `mail_copy_filter` varchar(255) NOT NULL default '',
  `mail_copy_filter_state` varchar(255) NOT NULL default '',
  `mail_reminder` tinyint(4) NOT NULL default '0',
  PRIMARY KEY  (`nid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `project_issue_state`
--

CREATE TABLE IF NOT EXISTS `project_issue_state` (
  `sid` int(10) unsigned NOT NULL auto_increment,
  `name` varchar(64) NOT NULL default '',
  `weight` tinyint(4) NOT NULL default '0',
  `author_has` tinyint(4) NOT NULL default '0',
  `default_query` tinyint(4) NOT NULL default '0',
  PRIMARY KEY  (`sid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

-- --------------------------------------------------------

--
-- Structure de la table `project_subscriptions`
--

CREATE TABLE IF NOT EXISTS `project_subscriptions` (
  `nid` int(10) unsigned NOT NULL default '0',
  `uid` int(10) unsigned NOT NULL default '0',
  `level` tinyint(3) unsigned NOT NULL default '0',
  KEY `project_subscriptions_nid_uid_level` (`nid`,`uid`,`level`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `queue`
--

CREATE TABLE IF NOT EXISTS `queue` (
  `item_id` int(10) unsigned NOT NULL auto_increment,
  `name` varchar(255) NOT NULL default '',
  `data` longtext,
  `expire` int(11) NOT NULL default '0',
  `created` int(11) NOT NULL default '0',
  PRIMARY KEY  (`item_id`),
  KEY `consumer_queue` (`name`,`created`),
  KEY `consumer_expire` (`expire`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

TRUNCATE TABLE `cache`;
