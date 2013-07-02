


ALTER TABLE `content_type_project_project` ADD `field_project_legal_doc_creation_value` INT( 11 ) NULL DEFAULT NULL ;

UPDATE `content_type_project_project` SET `field_project_legal_doc_creation_value` = 1;