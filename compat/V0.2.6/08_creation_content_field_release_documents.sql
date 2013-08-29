CREATE TABLE IF NOT EXISTS `content_field_release_documents` (
  `vid` int(10) unsigned NOT NULL default '0',
  `nid` int(10) unsigned NOT NULL default '0',
  `delta` int(10) unsigned NOT NULL default '0',
  `field_release_documents_fid` int(11) default NULL,
  `field_release_documents_list` tinyint(4) default NULL,
  `field_release_documents_data` text,
  PRIMARY KEY  (`vid`,`delta`),
  KEY `nid` (`nid`)
)
