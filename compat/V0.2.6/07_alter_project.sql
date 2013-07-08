--
-- Structure de la table `content_type_project_release`
--
CREATE TABLE IF NOT EXISTS `content_type_project_release` (
  `vid` int(10) unsigned NOT NULL default '0',
  `nid` int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (`vid`),
  KEY `nid` (`nid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

