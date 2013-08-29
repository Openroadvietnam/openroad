
-- JIRA 243 => better communication of benefits of community membership
REPLACE INTO `variable` (`name`, `value`) VALUES
('membership_benefits_text_community', 's:355:"<p>As a member, you will be able to post community related content, such as news or documents, participate in forum discussions and subscribe to community mailing lists.</p>\r\n<p>As a member, you will also be automatically subscribed to all community related notifications. You can later unsuscribe at any time under the My Page - Subscriptions page.</p>\r\n";'),
('membership_benefits_text_project', 's:502:"<p>As a member, you will be able to post [isa_node_type] related content, such as news or documents, participate in forum discussions and subscribe to [isa_node_type] mailing lists.</p>\r\n<p>As a member, you will also be automatically subscribed to all [isa_node_type] related notifications. You can later unsuscribe at any time under the My Page - Subscriptions page.</p>\r\n<p>As member of a [isa_node_type] project, the facilitator will be able to grant you further rights (e.g. developer right).</p>\r\n";');


-- JIRA 159
REPLACE INTO `variable` (`name`, `value`) VALUES
('group_delete_confirm_information', 's:244:"<p>If you move all posts from a project (asset or software) to a community, all releases and issues will be deleted.<br />\r\n	If you need more information, you can contact administrator by the <a href="[contact_admin_url]">contact form</a></p>\r\n";');

-- JIRA 63
REPLACE INTO `variable` (`name`, `value`) VALUES
('captcha_default_validation', 's:1:"0";');

-- JIRA 344
REPLACE INTO `variable` (`name`, `value`) VALUES
('subscriptions_send_intervals', 'a:4:{i:1;s:27:"Instantaneous notification\r";i:3600;s:7:"Hourly\r";i:86400;s:6:"Daily\r";i:604800;s:7:"Weekly\r";}');

-- JIRA 71 & 73
REPLACE INTO `variable` (`name`, `value`) VALUES
('user_mail_register_no_approval_required_body', 's:439:"Dear [recipient-firstname],\r\n\r\nThank you for registering !site  platform. You may now log in to !login_uri using the following username:\r\n\r\nUsername: !username\r\n\r\nYou must confirm your registration by clicking on this link or copying and pasting it in your browser:\r\n\r\n!login_url\r\n\r\nThis is a one-time login, so it can be used only once.\r\n\r\nAfter logging in, you will be redirected to !edit_uri you must change your password.\r\n\r\n!site Team";'),
('user_mail_register_no_approval_required_subject', 's:29:"Account details for !username";'),
('user_mail_password_reset_body', 's:450:"Dear [recipient-firstname],\r\n\r\nA request to reset the password for your account has been made at !site.\r\n\r\nYou may now log in to !uri_brief by clicking on this link or copying and pasting it in your browser:\r\n\r\n!login_url\r\n\r\nThis is a one-time login, so it can be used only once. It expires after one day and nothing will happen if it''s not used.\r\n\r\nAfter logging in, you will be redirected to !edit_uri so you can change your password.\r\n\r\n!site Team";');
REPLACE INTO `variable` (`name`, `value`) VALUES
('user_change_password_mail_body', 's:154:"<p>Dear [recipient-firstname],</p>\r\n<p>Your password has been correctly changed. You can use it for log in on [site-name] .</p>\r\n<p>[site-name] Team</p>\r\n";'),
('user_change_password_mail_title', 's:30:"Your password has been changed";');
REPLACE INTO `variable` (`name`, `value`) VALUES
('logintoboggan_override_destination_parameter', 'i:1;'),
('logintoboggan_redirect_on_confirm', 's:14:"user/%uid/edit";'),
('community_proposal_author_mail_body', 's:546:"<p>Dear [recipient-firstname],</p>\r\n<p>Your [isa_group_type] (title: [title]) has been submitted. It requires the validation from site moderator, before it will be visible on the [site-name] site.</p>\r\n<p>You will receive another message when the [isa_group_type] is accepted and published.</p>\r\n<p>In case it has been refused, you will be notified about the reasons, and eventually the possibility to submit your content again, after some updates.</p>\r\n<p>Thank you for sharing information on the [site-name] site.</p>\r\n<p>[site-name] Team</p>\r\n";'),
('community_proposal_author_mail_title', 's:62:"[isa_group_type] has been submitted to moderators for approval";'),
('pathauto_node_study_pattern', 's:39:"software/[isa_path_studies]/[title-raw]";');

-- CONTENT TYPE STUDY
REPLACE INTO `variable` (`name`,`value`) VALUES
('content_extra_weights_study', 'a:10:{s:5:"title";s:1:"1";s:10:"body_field";s:1:"2";s:20:"revision_information";s:1:"9";s:6:"author";s:1:"8";s:7:"options";s:2:"10";s:16:"comment_settings";s:2:"11";s:4:"menu";s:1:"5";s:4:"path";s:2:"12";s:8:"workflow";s:1:"7";s:9:"nodewords";s:1:"6";}');

-- MAIL TEMPLATES
REPLACE INTO `variable` (`name`, `value`) VALUES
('community_proposal_vf_mail_body', 's:524:"<p>Dear [recipient-firstname],</p>\r\n<p>[author_firstname]&nbsp;[author_lastname]&nbsp;wants to start a new [isa_group_type][project_in_vf].</p>\r\n<p>The user enters the following information for the [isa_group_type]:</p>\r\n<p>Title: [title]</p>\r\n<p>Description: [community_description]</p>\r\n<p>Domains: [community_domains]</p>\r\n<p>Languages: [community_languages]</p>\r\n<p>Kind of [isa_group_type]: [community_privacy]</p>\r\n<p>The start of the [isa_group_type] requires validation by a moderator.</p>\r\n<p>[site-name] Team</p>\r\n";'),
('community_rejected_vf_mail_body', 's:351:"<p>Dear [recipient-firstname],</p>\r\n<div>\r\n	<p>The [isa_group_type] &quot;[title]&quot;[project_in_vf] created by&nbsp;[author_firstname]&nbsp;[author_lastname]&nbsp;has been refused and deleted by the moderator for the following reason:</p>\r\n	<p>[workflow-current-state-log-entry]</p>\r\n	<p>[site-name] Team</p>\r\n</div>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n";'),
('community_rejected_vf_mail_title', 's:48:"The [isa_group_type] "[title]" has been rejected";'),
('community_suspended_vf_mail_body', 's:311:"<p>Dear [recipient-firstname],</p>\r\n<div>\r\n	<p>The [isa_group_type] &quot;[title]&quot;[project_in_vf] created by&nbsp;[author_firstname]&nbsp;[author_lastname]&nbsp;has been suspended by the moderator for the following reason:</p>\r\n	<p>[workflow-current-state-log-entry]</p>\r\n	<p>[site-name] Team</p>\r\n</div>\r\n";'),
('community_suspended_vf_mail_title', 's:49:"The [isa_group_type] "[title]" has been suspended";'),
('community_validated_vf_mail_body', 's:407:"<p>Dear [recipient-firstname],</p>\r\n<div>\r\n	<p>The&nbsp;[isa_group_type]&nbsp;&quot;[title]&quot; created by&nbsp;[author_firstname]&nbsp;[author_lastname]&nbsp;has been started[project_in_vf].</p>\r\n	<p>This is a [community_privacy] [isa_group_type].</p>\r\n	<p>Click on the following link to go to the [isa_group_type]:</p>\r\n	<p>[community_overview_url]</p>\r\n	<p>[site-name] Team</p>\r\n</div>\r\n<p>&nbsp;</p>\r\n";');

-- CONTENT TYPE EVENT
INSERT INTO `variable` (`name`, `value`) VALUES
('og_content_type_usage_event', 's:19:"group_post_standard";'),
('og_max_groups_event', 's:0:"";'),
('content_extra_weights_event', 'a:12:{s:5:"title";s:2:"-2";s:10:"body_field";s:2:"-1";s:20:"revision_information";s:1:"7";s:6:"author";s:1:"4";s:7:"options";s:1:"8";s:16:"comment_settings";s:2:"10";s:4:"menu";s:1:"6";s:8:"taxonomy";s:1:"1";s:4:"path";s:2:"11";s:10:"og_nodeapi";s:1:"9";s:8:"workflow";s:2:"13";s:9:"nodewords";s:2:"12";}');
