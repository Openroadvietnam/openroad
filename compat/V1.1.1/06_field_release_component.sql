ALTER TABLE `content_type_project_release` 
ADD `field_release_component_value` LONGTEXT CHARACTER SET utf8 COLLATE utf8_general_ci NULL ;


/* Only for test the migration, these table are in dbscript
 INSERT INTO `content_node_field` (`field_name`, `type`, `global_settings`, `required`, `multiple`, `db_storage`, `module`, `db_columns`, `active`, `locked`) VALUES
('field_release_component', 'text', 'a:4:{s:15:"text_processing";i:0;s:10:"max_length";s:0:"";s:14:"allowed_values";s:0:"";s:18:"allowed_values_php";s:0:"";}', 0, 0, 1, 'text', 'a:1:{s:5:"value";a:5:{s:4:"type";s:4:"text";s:4:"size";s:3:"big";s:8:"not null";b:0;s:8:"sortable";b:1;s:5:"views";b:1;}}', 1, 0);

INSERT INTO `content_node_field_instance` (`field_name`, `type_name`, `weight`, `label`, `widget_type`, `widget_settings`, `display_settings`, `description`, `widget_module`, `widget_active`) VALUES
('field_release_component', 'project_release', 18, 'Component', 'autocomplete_widgets_flddata', 'a:6:{s:4:"size";s:2:"60";s:18:"autocomplete_match";s:8:"contains";s:17:"autocomplete_case";s:1:"0";s:12:"i18n_flddata";i:0;s:13:"default_value";a:1:{i:0;a:2:{s:5:"value";s:0:"";s:14:"_error_element";s:55:"default_value_widget][field_release_component][0][value";}}s:17:"default_value_php";N;}', 'a:9:{s:5:"label";a:2:{s:6:"format";s:5:"above";s:7:"exclude";i:0;}s:6:"teaser";a:2:{s:6:"format";s:7:"default";s:7:"exclude";i:0;}s:4:"full";a:2:{s:6:"format";s:7:"default";s:7:"exclude";i:0;}i:4;a:2:{s:6:"format";s:7:"default";s:7:"exclude";i:0;}i:2;a:2:{s:6:"format";s:7:"default";s:7:"exclude";i:0;}i:3;a:2:{s:6:"format";s:7:"default";s:7:"exclude";i:0;}s:11:"email_plain";a:2:{s:6:"format";s:7:"default";s:7:"exclude";i:0;}s:10:"email_html";a:2:{s:6:"format";s:7:"default";s:7:"exclude";i:0;}s:5:"token";a:2:{s:6:"format";s:7:"default";s:7:"exclude";i:0;}}', '', 'autocomplete_widgets', 1);
*/