--
-- Structure de la table `content_type_image`
--

CREATE TABLE `content_type_image` (
  `vid` int(10) unsigned NOT NULL default '0',
  `nid` int(10) unsigned NOT NULL default '0',
  `field_gallery_image_fid` int(11) default NULL,
  `field_gallery_image_list` tinyint(4) default NULL,
  `field_gallery_image_data` text,
  PRIMARY KEY  (`vid`),
  KEY `nid` (`nid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
