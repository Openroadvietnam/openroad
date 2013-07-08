--
-- Structure de la table `content_field_case_documentation`
--

CREATE TABLE IF NOT EXISTS `content_field_case_documentation` (
  `vid` int(10) unsigned NOT NULL default '0',
  `nid` int(10) unsigned NOT NULL default '0',
  `delta` int(10) unsigned NOT NULL default '0',
  `field_case_documentation_fid` int(11) default NULL,
  `field_case_documentation_list` tinyint(4) default NULL,
  `field_case_documentation_data` text,
  PRIMARY KEY  (`vid`,`delta`),
  KEY `nid` (`nid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
