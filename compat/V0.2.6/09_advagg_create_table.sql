--
-- Database: `isa`
--

-- --------------------------------------------------------

--
-- Table structure for table `advagg_bundles`
--

CREATE TABLE IF NOT EXISTS `advagg_bundles` (
  `bundle_md5` varchar(32) NOT NULL default '',
  `filename_md5` varchar(32) NOT NULL default '',
  `counter` int(11) NOT NULL default '0',
  `porder` int(11) NOT NULL default '0',
  `root` int(11) NOT NULL default '0',
  `timestamp` int(11) NOT NULL default '0',
  PRIMARY KEY  (`bundle_md5`,`filename_md5`),
  KEY `root` (`root`),
  KEY `timestamp` (`timestamp`),
  KEY `counter` (`counter`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `advagg_files`
--

CREATE TABLE IF NOT EXISTS `advagg_files` (
  `filename` text NOT NULL,
  `filename_md5` varchar(32) NOT NULL default '',
  `checksum` varchar(32) NOT NULL default '',
  `filetype` varchar(8) NOT NULL default '',
  `counter` int(11) NOT NULL default '0',
  PRIMARY KEY  (`filename_md5`),
  KEY `checksum` (`checksum`),
  KEY `filetype` (`filetype`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cache_advagg`
--

CREATE TABLE IF NOT EXISTS `cache_advagg` (
  `cid` varchar(255) NOT NULL default '',
  `data` longblob,
  `expire` int(11) NOT NULL default '0',
  `created` int(11) NOT NULL default '0',
  `headers` text,
  `serialized` smallint(6) NOT NULL default '0',
  PRIMARY KEY  (`cid`),
  KEY `expire` (`expire`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cache_advagg_bundle_reuse`
--

CREATE TABLE IF NOT EXISTS `cache_advagg_bundle_reuse` (
  `cid` varchar(255) NOT NULL default '',
  `data` longblob,
  `expire` int(11) NOT NULL default '0',
  `created` int(11) NOT NULL default '0',
  `headers` text,
  `serialized` smallint(6) NOT NULL default '0',
  PRIMARY KEY  (`cid`),
  KEY `expire` (`expire`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cache_advagg_files_data`
--

CREATE TABLE IF NOT EXISTS `cache_advagg_files_data` (
  `cid` varchar(255) NOT NULL default '',
  `data` longblob,
  `expire` int(11) NOT NULL default '0',
  `created` int(11) NOT NULL default '0',
  `headers` text,
  `serialized` smallint(6) NOT NULL default '0',
  PRIMARY KEY  (`cid`),
  KEY `expire` (`expire`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
