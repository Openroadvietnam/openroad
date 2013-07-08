-- JIRA 150
REPLACE INTO `variable` (`name`, `value`) VALUES
('anonymous_validation_page_not_allowed_desciption', 's:199:"<p>You are not able to download this release.</p>\r\n<p>Indeed, the project owner not allowed the release download for anonymous for this project in order to get valuable feedback from its users.</p>\r\n";');

ALTER TABLE `content_type_project_project` ADD `field_project_anonymous_download_value` int(11) default '0';
