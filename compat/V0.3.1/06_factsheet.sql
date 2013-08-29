--
-- Database: `isa`
--

-- --------------------------------------------------------

--
-- Table structure for table `content_field_factsheet_upload_files`
--

CREATE TABLE IF NOT EXISTS `content_field_factsheet_upload_files` (
  `vid` int(10) unsigned NOT NULL default '0',
  `nid` int(10) unsigned NOT NULL default '0',
  `delta` int(10) unsigned NOT NULL default '0',
  `field_factsheet_upload_files_fid` int(11) default NULL,
  `field_factsheet_upload_files_list` tinyint(4) default NULL,
  `field_factsheet_upload_files_data` text,
  PRIMARY KEY  (`vid`,`delta`),
  KEY `nid` (`nid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


--
-- Table structure for table `content_type_factsheet`
--

CREATE TABLE IF NOT EXISTS `content_type_factsheet` (
  `vid` int(10) unsigned NOT NULL default '0',
  `nid` int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (`vid`),
  KEY `nid` (`nid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





