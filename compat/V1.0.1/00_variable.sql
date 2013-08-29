-- release_rejected_mail_body
UPDATE `variable` SET `value` = 's:231:"<p>Dear [recipient-firstname],</p>\r\n<div>\r\n	<p>Your request maturity for the release &quot;[title]&quot; has been refused for the following reason:</p>\r\n	<p>[workflow-current-state-log-entry]</p>\r\n	<p>[site-name] Team</p>\r\n</div>\r\n";' WHERE `name`  = 'release_rejected_mail_body' LIMIT 1 ;

-- Sizes for upload files
DELETE FROM `variable` WHERE name IN ('upload_usersize_14', 'upload_usersize_16', 'upload_usersize_2', 'upload_usersize_3', 'upload_usersize_5', 'upload_usersize_6', 'upload_usersize_9');
DELETE FROM `variable` WHERE name IN ('upload_uploadsize_14', 'upload_uploadsize_16', 'upload_uploadsize_2', 'upload_uploadsize_3', 'upload_uploadsize_5', 'upload_uploadsize_6', 'upload_uploadsize_9');
REPLACE INTO `variable` (name, value) VALUES ('upload_uploadsize_default', 's:2:"10";'), ('upload_usersize_default', 's:3:"200";');

-- JIRA 114
INSERT INTO `variable` (`name`, `value`) VALUES
('content_create_blog_to_moderators_mail_body', 's:286:"<p>Dear [recipient-firstname],</p>\r\n<div>\r\n	<p>User [field_firstname-formatted] [field_lastname-formatted] has created a new blog post &quot;[title]&quot;.</p>\r\n	<p>To reach this blog post, click on following link : [isa_node_link]</p>\r\n	<p>[site-name] Team</p>\r\n</div>\r\n<p>&nbsp;</p>\r\n";'),
('content_create_blog_to_moderators_mail_title', 's:13:"New blog post";'),
('content_create_comment_to_moderators_mail_body', 's:290:"<p>Dear [recipient-firstname],</p>\r\n<div>\r\n	<p>User [field_firstname-formatted] [field_lastname-formatted] has post a new comment &quot;[comment-title]&quot;.</p>\r\n	<p>To reach this comment, click on following link : [isa_comment_link]</p>\r\n	<p>[site-name] Team</p>\r\n</div>\r\n<p>&nbsp;</p>\r\n";'),
('content_create_comment_to_moderators_mail_title', 's:11:"New comment";');



-- diff
UPDATE `variable`  SET `value` = 'a:1:{s:17:"apachesolr_search";a:12:{s:3:"uid";s:3:"uid";s:4:"type";s:4:"type";s:9:"im_vid_36";s:9:"im_vid_36";s:9:"im_vid_26";s:9:"im_vid_26";s:9:"im_vid_30";s:9:"im_vid_30";s:9:"im_vid_27";s:9:"im_vid_27";s:9:"im_vid_38";s:9:"im_vid_38";s:9:"im_vid_28";s:9:"im_vid_28";s:9:"im_vid_33";s:9:"im_vid_33";s:9:"im_vid_34";s:9:"im_vid_34";s:9:"im_vid_31";s:9:"im_vid_31";s:9:"im_vid_32";s:9:"im_vid_32";}}' WHERE `name` = 'apachesolr_enabled_facets';
UPDATE `variable`  SET `value` = 'b:0;' WHERE `name` = 'drupal_http_request_fails' ; 

DELETE FROM `variable` WHERE `name` = '_rid' LIMIT 1;
DELETE FROM `variable` WHERE `name` = '' AND `value` = 	's:0:"";' LIMIT 1;

UPDATE `variable`  SET `value` = 's:28:"no-reply@joinup.ec.europa.eu";' WHERE `value` = 's:37:"dlfr-ce-drupal-isa.ext@atosorigin.com";' OR `value` = 's:19:"joinup@ec.europa.eu";' ;