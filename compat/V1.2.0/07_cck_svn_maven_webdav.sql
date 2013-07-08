ALTER TABLE `content_type_project_project` ADD `field_project_display_svn_value` int(11) default NULL;
ALTER TABLE `content_type_project_project` ADD `field_project_display_maven_value` int(11) default NULL;
ALTER TABLE `content_type_project_project` ADD `field_project_display_webdav_value` int(11) default NULL;


UPDATE `content_type_project_project` SET `field_project_display_svn_value` = 0;
UPDATE `content_type_project_project` SET `field_project_display_maven_value` = 0;
UPDATE `content_type_project_project` SET `field_project_display_webdav_value` = 0;

UPDATE `content_type_project_project` SET `field_project_display_maven_value` = 1 
WHERE nid in (SELECT DISTINCT nid FROM `content_field_project_common_type` WHERE `field_project_common_type_value` = 1);
UPDATE `content_type_project_project` SET `field_project_display_svn_value` = 1 
WHERE nid in (SELECT DISTINCT nid FROM `content_field_project_common_type` WHERE `field_project_common_type_value` = 1);

