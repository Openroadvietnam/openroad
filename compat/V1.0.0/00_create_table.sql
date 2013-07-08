--
-- Structure de la table `xmlsitemap`
--

CREATE TABLE IF NOT EXISTS `xmlsitemap` (
  `id` int(10) unsigned NOT NULL default '0',
  `type` varchar(32) NOT NULL default '',
  `subtype` varchar(128) NOT NULL default '',
  `loc` varchar(255) NOT NULL default '',
  `language` varchar(12) NOT NULL default '',
  `access` tinyint(4) NOT NULL default '1',
  `status` tinyint(4) NOT NULL default '1',
  `status_override` tinyint(4) NOT NULL default '0',
  `lastmod` int(10) unsigned NOT NULL default '0',
  `priority` float default NULL,
  `priority_override` tinyint(4) NOT NULL default '0',
  `changefreq` int(10) unsigned NOT NULL default '0',
  `changecount` int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (`id`,`type`),
  KEY `loc` (`loc`),
  KEY `access_status_loc` (`access`,`status`,`loc`),
  KEY `type_subtype` (`type`,`subtype`),
  KEY `language` (`language`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `xmlsitemap_sitemap`
--

CREATE TABLE IF NOT EXISTS `xmlsitemap_sitemap` (
  `smid` varchar(64) NOT NULL,
  `context` text NOT NULL,
  `updated` int(10) unsigned NOT NULL default '0',
  `links` int(10) unsigned NOT NULL default '0',
  `chunks` int(10) unsigned NOT NULL default '0',
  `max_filesize` int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (`smid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


