SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


-- --------------------------------------------------------

--
-- Table structure for table `simplenews_mail_spool`
--

CREATE TABLE IF NOT EXISTS `simplenews_mail_spool` (
  `msid` int(10) unsigned NOT NULL auto_increment,
  `mail` varchar(255) NOT NULL default '',
  `nid` int(11) NOT NULL default '0',
  `vid` int(11) NOT NULL default '0',
  `tid` int(11) NOT NULL default '0',
  `status` tinyint(3) unsigned NOT NULL default '0',
  `error` tinyint(4) NOT NULL default '0',
  `timestamp` int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (`msid`),
  KEY `tid` (`tid`),
  KEY `status` (`status`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=102 ;

--
-- Dumping data for table `simplenews_mail_spool`
--


-- --------------------------------------------------------

--
-- Table structure for table `simplenews_newsletters`
--

CREATE TABLE IF NOT EXISTS `simplenews_newsletters` (
  `nid` int(11) NOT NULL default '0',
  `vid` int(11) NOT NULL default '0',
  `tid` int(11) NOT NULL default '0',
  `s_status` tinyint(4) NOT NULL default '0',
  `s_format` varchar(8) NOT NULL default '',
  `priority` tinyint(4) NOT NULL default '0',
  `receipt` tinyint(4) NOT NULL default '0',
  PRIMARY KEY  (`nid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `simplenews_newsletters`
--


-- --------------------------------------------------------

--
-- Table structure for table `simplenews_snid_tid`
--

CREATE TABLE IF NOT EXISTS `simplenews_snid_tid` (
  `snid` int(11) NOT NULL default '0',
  `tid` int(11) NOT NULL default '0',
  PRIMARY KEY  (`snid`,`tid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `simplenews_snid_tid`
--

INSERT INTO `simplenews_snid_tid` VALUES
(2, 1651),
(3, 1651),
(4, 1651),
(11, 1651);

-- --------------------------------------------------------

--
-- Table structure for table `simplenews_subscriptions`
--

CREATE TABLE IF NOT EXISTS `simplenews_subscriptions` (
  `snid` int(11) NOT NULL auto_increment,
  `activated` tinyint(4) NOT NULL default '0',
  `mail` varchar(64) NOT NULL default '',
  `uid` int(11) NOT NULL default '0',
  `language` varchar(12) NOT NULL default '',
  PRIMARY KEY  (`snid`),
  KEY `mail` (`mail`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `simplenews_subscriptions`
--

INSERT INTO `simplenews_subscriptions` VALUES
(2, 1, 'jonathan.pauchet@atosorigin.com', 45, ''),
(3, 1, 'jonathan.pauchet+admin@gmail.com', 46, 'en'),
(11, 1, 'gervais.seb@gmail.com', 22, 'en'),
(4, 1, 'wael.benamor+member@gmail.com', 56, 'en');
