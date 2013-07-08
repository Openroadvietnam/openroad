
--
-- Structure de la table `content_type_document`
--
CREATE TABLE IF NOT EXISTS `content_type_document` (
  `vid` int(10) unsigned NOT NULL default '0',
  `nid` int(10) unsigned NOT NULL default '0',
  `field_publication_date_value` varchar(20) default NULL,
  `field_publisher_value` longtext,
  `field_isbn_value` longtext,
  `field_description_of_license_value` longtext,
  `field_original_url_url` varchar(2048) default NULL,
  `field_original_url_title` varchar(255) default NULL,
  `field_original_url_attributes` mediumtext,
  PRIMARY KEY  (`vid`),
  KEY `nid` (`nid`)
);

--
-- Structure de la table `content_field_additional_doc_desc`
--
CREATE TABLE IF NOT EXISTS `content_field_additional_doc_desc` (
  `vid` int(10) unsigned NOT NULL default '0',
  `nid` int(10) unsigned NOT NULL default '0',
  `delta` int(10) unsigned NOT NULL default '0',
  `field_additional_doc_desc_value` longtext,
  PRIMARY KEY  (`vid`,`delta`),
  KEY `nid` (`nid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


--
-- Structure de la table `content_field_additional_doc_file`
--
CREATE TABLE IF NOT EXISTS `content_field_additional_doc_file` (
  `vid` int(10) unsigned NOT NULL default '0',
  `nid` int(10) unsigned NOT NULL default '0',
  `delta` int(10) unsigned NOT NULL default '0',
  `field_additional_doc_file_fid` int(11) default NULL,
  `field_additional_doc_file_list` tinyint(4) default NULL,
  `field_additional_doc_file_data` text,
  PRIMARY KEY  (`vid`,`delta`),
  KEY `nid` (`nid`)
);

--
-- Structure de la table `content_field_email`
--
CREATE TABLE IF NOT EXISTS `content_field_email` (
  `vid` int(10) unsigned NOT NULL default '0',
  `nid` int(10) unsigned NOT NULL default '0',
  `field_email_value` longtext,
  PRIMARY KEY  (`vid`),
  KEY `nid` (`nid`)
);

--
-- Structure de la table `content_type_case`
--
CREATE TABLE IF NOT EXISTS `content_type_case` (
  `vid` int(10) unsigned NOT NULL default '0',
  `nid` int(10) unsigned NOT NULL default '0',
  `field_acronym_value` longtext,
  `field_presentation_url_url` varchar(2048) default NULL,
  `field_presentation_url_title` varchar(255) default NULL,
  `field_presentation_url_attributes` mediumtext,
  `field_website_url_url` varchar(2048) default NULL,
  `field_website_url_title` varchar(255) default NULL,
  `field_website_url_attributes` mediumtext,
  `field_city_region_value` longtext,
  `field_start_end_date_value` varchar(20) default NULL,
  `field_start_end_date_value2` varchar(20) default NULL,
  `field_operational_date_value` varchar(20) default NULL,
  `field_policy_context_value` longtext,
  `field_target_users_value` longtext,
  `field_desc_target_users_groups_value` longtext,
  `field_desc_implementation_value` longtext,
  `field_tech_solution_value` longtext,
  `field_main_results_value` longtext,
  `field_roi_desc_value` longtext,
  `field_track_record_sharing_value` longtext,
  `field_lessons_learnt_value` longtext,
  `field_case_logo_fid` int(11) default NULL,
  `field_case_logo_list` tinyint(4) default NULL,
  `field_case_logo_data` text,
  PRIMARY KEY  (`vid`),
  KEY `nid` (`nid`)
);

INSERT INTO `term_data` (`tid`, `vid`, `name`, `description`, `weight`) VALUES
(1320, 46, 'Ended', '', 0),
(1317, 46, 'Implementation', '', 0),
(1314, 46, 'Not applicable / Not available', '', 0),
(1319, 46, 'On hold (not operating)', '', 0),
(1318, 46, 'Operation', '', 0),
(1316, 46, 'Pilot', '', 0),
(1315, 46, 'Research', '', 0),
(1411, 9, 'Documents', '', 0),
(1412, 9, 'Cases', '', 0),
(1430, 9, 'e-Library', '', 0),
(1304, 44, 'Award scheme', '', 0),
(1302, 44, 'Network', '', 0),
(1306, 44, 'Other', '', 0),
(1301, 44, 'Project or service', '', 0),
(1305, 44, 'Promotion/awareness campaign', '', 0),
(1303, 44, 'Strategic initiative', '', 0),
(1307, 45, 'Cross-border', '', 0),
(1311, 45, 'European', '', 0),
(1308, 45, 'International', '', 0),
(1309, 45, 'Local (city or municipality)', '', 0),
(1310, 45, 'National', '', 0),
(1312, 45, 'Pan-European', '', 0),
(1313, 45, 'Regional (sub-national)', '', 0),
(1321, 47, 'Not applicable / Not available', '', 0),
(1322, 47, 'Awareness-raising information', '', 0),
(1323, 47, 'Training and education', '', 0),
(1324, 47, 'Content provision', '', 0),
(1325, 47, 'IT Infrastructures and products', '', 0),
(1326, 47, 'Participation', '', 0),
(1327, 47, 'Inclusive services of general interest', '', 0),
(1328, 47, 'Other', '', 0),
(1329, 48, 'Public administration', '', 0),
(1330, 48, 'Private sector', '', 0),
(1331, 48, 'Non-profit sector', '', 0),
(1332, 48, 'Partnerships between administration and/or private sector and/or non-profit sector', '', 0),
(1333, 50, 'Proprietary technology', '', 0),
(1334, 50, 'Standards-based technology', '', 0),
(1335, 50, 'Mainly (or only) open standards', '', 0),
(1336, 50, 'Accessibility-compliant (minimum WAI AA)', '', 0),
(1337, 50, 'Open source software', '', 0),
(1338, 50, 'Not applicable / Not available', '', 0),
(1339, 51, 'Public funding EU', '', 0),
(1340, 51, 'Public funding national', '', 0),
(1341, 51, 'Public funding regional', '', 0),
(1342, 51, 'Public funding local', '', 0),
(1343, 51, 'Private sector', '', 0),
(1344, 51, 'Charity, voluntary contributions', '', 0),
(1345, 52, 'Not applicable / Not available', '', 0),
(1346, 52, '€1-5,000', '', 0),
(1348, 52, '€15-49,000', '', 0),
(1350, 52, '€300-499,000', '', 0),
(1352, 52, '€1,000,000-5,000,000', '', 0),
(1354, 52, 'Larger than €10,000,000', '', 0),
(940, 34, 'Bosnian', '', 0),
(941, 34, 'Bulgarian', '', 0),
(942, 34, 'Croatian', '', 0),
(945, 34, 'Czech', '', 0),
(943, 34, 'Danish', '', 0),
(944, 34, 'Dutch', '', 0),
(946, 34, 'English', '', 0),
(947, 34, 'Estonian', '', 0),
(948, 34, 'Finnish', '', 0),
(949, 34, 'French', '', 0),
(950, 34, 'German', '', 0),
(951, 34, 'Greek', '', 0),
(952, 34, 'Hungarian', '', 0),
(953, 34, 'Icelandic', '', 0),
(954, 34, 'Irish', '', 0),
(955, 34, 'Italian', '', 0),
(956, 34, 'Latvian', '', 0),
(957, 34, 'Lithuanian', '', 0),
(958, 34, 'Macedonian', '', 0),
(959, 34, 'Maltese', '', 0),
(960, 34, 'Norwegian', '', 0),
(961, 34, 'Other', '', 0),
(962, 34, 'Polish', '', 0),
(963, 34, 'Portuguese', '', 0),
(964, 34, 'Romanian', '', 0),
(965, 34, 'Serbian', '', 0),
(966, 34, 'Sign Language', '', 0),
(967, 34, 'Slovak', '', 0),
(968, 34, 'Slovenian', '', 0),
(969, 34, 'Spanish', '', 0);



ALTER TABLE users
ADD COLUMN `timezone_name` varchar(50) NOT NULL default 'Europe/Luxembourg';

UPDATE menu_links SET link_path = 'node/394' WHERE mlid = 516;