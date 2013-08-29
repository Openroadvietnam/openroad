ALTER TABLE `content_type_profile` DROP `field_profile_email_value`;
DELETE FROM `content_node_field_instance` WHERE field_name = 'field_profile_email' AND type_name = 'profile';
DELETE FROM `content_group_fields` WHERE `type_name` = 'profile' AND `group_name` = 'group_personal' AND `field_name` = 'field_profile_email';
