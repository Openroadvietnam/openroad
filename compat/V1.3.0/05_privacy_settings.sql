-- Jira 401
ALTER TABLE `content_type_profile` ADD `field_company_visibility_value` int(11) DEFAULT 1;
ALTER TABLE `content_type_profile` ADD `field_country_visibility_value` int(11) DEFAULT 1;
ALTER TABLE `content_type_profile` ADD `field_keywords_visibility_value` int(11) DEFAULT 1;

ALTER table content_type_profile modify field_email_visibility_value int(11);
ALTER table content_type_profile modify field_profile_visibility_value int(11);

UPDATE content_type_profile SET field_email_visibility_value = 1 WHERE field_email_visibility_value IS NULL;
UPDATE content_type_profile SET field_profile_visibility_value = 1 WHERE field_profile_visibility_value IS NULL;