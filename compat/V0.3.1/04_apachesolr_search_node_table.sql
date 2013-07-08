CREATE TABLE IF NOT EXISTS `apachesolr_search_node` (
  `nid` int(10) unsigned NOT NULL,
  `status` int(11) NOT NULL default '1',
  `changed` int(11) NOT NULL default '0',
  PRIMARY KEY  (`nid`),
  KEY `changed` (`changed`,`status`)
);
