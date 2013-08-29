
-- JIRA 272 -> variable for module 'public and private files'
REPLACE INTO `variable` (`name`, `value`) VALUES
('public_and_private_files_path', 's:27:"sites/default/files/project";');
UPDATE `variable` SET `value` = 's:1:"1";'
WHERE `name`  = 'file_downloads' LIMIT 1 ;


-- JIRA 118 : A registered user is not able to add a comment on a video
UPDATE `variable` SET `value` = 's:1:"2";'
WHERE `name`  = 'comment_video' LIMIT 1 ;
UPDATE `variable` SET `value` = 's:1:"0";'
WHERE `name`  = 'comment_preview_video' LIMIT 1 ;
UPDATE `variable` SET `value` = 's:1:"0";'
WHERE `name`  = 'comment_subject_field_video' LIMIT 1 ;

-- Template mails
REPLACE INTO `variable` (`name`, `value`) VALUES
('contact_page_mail_body', 's:259:"<p>Dear all,</p>\r\n<p><em>[contact_firsname] [contact_lastname] ([contact_page_company][contact_email]) has sent you a message on<span class="Apple-converted-space"> </span>[site-name]</em></p>\r\n<p>Message:</p>\r\n<p>[contact_body]</p>\r\n<p>[site-name] Team</p>\r\n";'),
('new_pending_revision_mail_body', 's:358:"<p>Dear [recipient-firstname],</p>\r\n<p>User [field_firstname-formatted] [field_lastname-formatted] has updated the following content.</p>\r\n<p>Title: [title]</p>\r\n<p>The publication of this content requires your validation.&nbsp;Please click on the link below to reach the validation or denial form.</p>\r\n<p>[node_revisions_url]</p>\r\n<p>[site-name] Team</p>\r\n";'),
('new_pending_revision_title', 's:40:"Approval request for [isa_node_type] item updated";'),
('delete_pending_revision_mail_body', 's:164:"<p>Dear [recipient-firstname],</p><p>User [field_firstname-formatted] [field_lastname-formatted] has deleted your revision for : [title]</p><p>ISA-ICP&nbsp;Team</p>";'),
('delete_pending_revision_title', 's:32:"Revision for [isa_node_type] item deleted";');

REPLACE INTO `variable` (`name`, `value`) VALUES
('comment_default_mode_video', 's:1:"2";'),
('preprocess_css', 's:1:"1";');