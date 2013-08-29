--
-- Database: `isa`
--

-- --------------------------------------------------------

--
-- Table structure for `content_type_event`
--

CREATE TABLE IF NOT EXISTS `content_type_event` (
  `vid` int(10) unsigned NOT NULL default '0',
  `nid` int(10) unsigned NOT NULL default '0',
  `field_event_dates_value` datetime default NULL,
  `field_event_dates_value2` datetime default NULL,
  `field_event_logo_fid` int(11) default NULL,
  `field_event_logo_list` tinyint(4) default NULL,
  `field_event_logo_data` text,
  `field_event_city_value` longtext,
  `field_event_address_location_value` longtext,
  `field_event_venue_value` longtext,
  `field_event_gmap_location_value` longtext,
  `field_event_organiser_value` longtext,
  `field_event_website_url` varchar(2048) default NULL,
  `field_event_website_title` varchar(255) default NULL,
  `field_event_website_attributes` mediumtext,
  `field_event_contact_email_value` longtext,
  `field_event_portal_url_url` varchar(2048) default NULL,
  `field_event_portal_url_title` varchar(255) default NULL,
  `field_event_portal_url_attributes` mediumtext,
  `field_event_agenda_value` longtext,
  `field_event_exp_participants_value` longtext,
  `field_event_fees_description_value` longtext,
  `field_event_rating_rating` int(10) unsigned default NULL,
  `field_event_rating_target` int(10) unsigned default NULL,
  PRIMARY KEY  (`vid`),
  KEY `nid` (`nid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
