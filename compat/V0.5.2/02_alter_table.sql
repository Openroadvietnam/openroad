
/* Alter table content_type_profile for CV field*/
ALTER TABLE `content_type_profile` ADD `field_profile_cv_fid` INT( 11 ) NULL ;
ALTER TABLE `content_type_profile` ADD `field_profile_cv_list` TINYINT( 4 ) NULL ;
ALTER TABLE `content_type_profile` ADD `field_profile_cv_data` TEXT NULL ;