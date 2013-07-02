-- JIRA 386
-- Active comments on existing documents
UPDATE `node` SET `comment` = '2' WHERE `node`.`type` ='document';
-- Active comments on existing releases
UPDATE `node` SET `comment` = '2' WHERE `node`.`type` ='project_release';
-- Active comments on existing wikis, except licence wizard
UPDATE `node` SET `comment` = '2' WHERE `node`.`type` ='wiki' AND nid NOT IN (2048, 2049, 2051, 2059, 2060, 2062, 2063, 2065, 2066, 2067, 2068, 2069, 2070, 2071, 2072, 2073, 2074, 2076, 2077, 2079);

-- Set settings for the comments on documents, releases and wikis.
REPLACE INTO `variable` (`name`, `value`) VALUES
('comment_default_mode_document', 's:1:"4";'),
('comment_default_per_page_document', 's:2:"10";'),
('comment_document', 's:1:"2";'),
('comment_form_location_document', 's:1:"1";'),
('comment_preview_document', 's:1:"0";'),
('comment_subject_field_document', 's:1:"0";'),

('comment_default_mode_project_release', 's:1:"2";'),
('comment_default_per_page_project_release', 's:2:"10";'),
('comment_form_location_project_release', 's:1:"1";'),
('comment_preview_project_release', 's:1:"0";'),
('comment_project_release', 's:1:"2";'),

('comment_default_mode_wiki', 's:1:"2";'),
('comment_default_per_page_wiki', 's:2:"10";'),
('comment_form_location_wiki', 's:1:"1";'),
('comment_subject_field_wiki', 's:1:"0";'),
('comment_wiki', 's:1:"2";');