CREATE TABLE IF NOT EXISTS `apachesolr_attachments_files` (
  `fid` int(10) unsigned NOT NULL,
  `nid` int(10) unsigned NOT NULL default '0',
  `removed` int(10) unsigned default '0',
  `sha1` varchar(40) NOT NULL default '',
  `body` longtext,
  PRIMARY KEY  (`fid`),
  KEY `nid` (`nid`),
  KEY `removed` (`removed`)
);
