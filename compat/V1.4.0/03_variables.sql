REPLACE INTO `variable` (`name`, `value`) VALUES
('unique_field_comp_asset_release', 's:4:"each";'),
('unique_field_comp_distribution', 's:4:"each";'),
('unique_field_comp_documentation', 's:4:"each";'),
('unique_field_comp_item', 's:4:"each";'),
('unique_field_comp_licence', 's:4:"each";'),
('unique_field_comp_publisher', 's:4:"each";'),
('unique_field_fields_asset_release', 'a:1:{i:0;s:12:"field_id_uri";}'),
('unique_field_fields_distribution', 'a:1:{i:0;s:12:"field_id_uri";}'),
('unique_field_fields_documentation', 'a:1:{i:0;s:12:"field_id_uri";}'),
('unique_field_fields_item', 'a:1:{i:0;s:12:"field_id_uri";}'),
('unique_field_fields_licence', 'a:1:{i:0;s:12:"field_id_uri";}'),
('unique_field_fields_publisher', 'a:1:{i:0;s:12:"field_id_uri";}'),
('unique_field_scope_asset_release', 's:3:"all";'),
('unique_field_scope_distribution', 's:3:"all";'),
('unique_field_scope_documentation', 's:3:"all";'),
('unique_field_scope_item', 's:3:"all";'),
('unique_field_scope_licence', 's:3:"all";'),
('unique_field_scope_publisher', 's:3:"all";'),
('unique_field_show_matches_asset_release', 'a:0:{}'),
('unique_field_show_matches_distribution', 'a:0:{}'),
('unique_field_show_matches_documentation', 'a:0:{}'),
('unique_field_show_matches_item', 'a:0:{}'),
('unique_field_show_matches_licence', 'a:0:{}'),
('unique_field_show_matches_publisher', 'a:0:{}'),
('publisher_type_vid', 's:2:"72";'),
('file_format_vid', 's:2:"73";'),
('representation_technique_vid', 's:2:"70";'),
('status_vid', 's:2:"69";'),
('licence_type_vid', 's:2:"75";'),
-- Icons theme
('filefield_icon_theme', 's:6:"joinup";'),
-- Email templates
('news_proposal_author_mail_body', 's:528:"<p>Dear [recipient-firstname],</p>\r\n<p>Your [type] entitled &#39;[isa_node_link]&#39; has been submitted. It requires validation by the [site-name] moderator, before it can become visible on [site-name].<br />\r\n	You will receive another an e-mail notifying you when the [type] is validated and published.<br />\r\n	In case your proposal is rejected by the moderator, you will be notified of the reasons, and will have the possibility to update and resubmit your proposal.</p>\r\n<p>Thank you for sharing information on Joinup.</p>\r\n";'),
('asset_approve_assessment_mail_body', 's:214:"<p>Dear&nbsp;[recipient-firstname],</p>\r\n<div>\r\n	<p>Your request assessment for the asset release [isa_node_link] has been approved.</p>\r\n	<p>Thank you for sharing information on the [site-name] site.</p>\r\n</div>\r\n";'),
('asset_approve_assessment_mail_title', 's:40:"Request assessment for has been approved";'),
('asset_proposal_author_mail_body', 's:523:"<p>Dear [recipient-firstname],</p>\r\n<p>Your asset release (title: [isa_node_link]) has been submitted. It requires the validation from site moderator, before it will be visible on the [site-name] site.</p>\r\n<p>You will receive another message when the asset release is accepted and published.</p>\r\n<p>In case it has been refused, you will be notified about the reasons, and eventually the possibility to submit your content again, after some updates.</p>\r\n<p>Thank you for sharing information on the [site-name] site.</p>\r\n";'),
('asset_proposal_author_mail_title', 's:59:"Asset release has been submitted to moderators for approval";'),
('asset_proposal_moderator_mail_body', 's:291:"<p>Dear [recipient-firstname],</p>\r\n<p>User [author_linked] has proposed the following content:</p>\r\n<p>[isa_node_link]</p>\r\n<p>The publication of this content requires your validation.&nbsp;Please click on the link below to reach the validation or denial form.</p>\r\n<p>[node-edit-url]</p>\r\n";'),
('asset_proposal_moderator_mail_title', 's:40:"Approval request for a new asset release";'),
('asset_rejected_mail_body', 's:169:"<p>Dear [recipient-firstname],</p>\r\n<p>Your asset release [title] has been refused and deleted for the following reason.</p>\r\n<p>[workflow-current-state-log-entry]</p>\r\n";'),
('asset_rejected_mail_title', 's:36:"Your asset release has been rejected";'),
('asset_reject_assessment_mail_body', 's:209:"<p>Dear [recipient-firstname],</p>\r\n<div>\r\n	<p>Your request assessment for the asset release [isa_node_link] has been refused for the following reason:</p>\r\n	<p>[workflow-current-state-log-entry]</p>\r\n</div>\r\n";'),
('asset_reject_assessment_mail_title', 's:36:"Request assessment has been rejected";'),
('asset_request_assessment_author_mail_body', 's:289:"<p>Dear [recipient-firstname],</p>\r\n<div>\r\n	<p>Your request assessment on the asset release [isa_node_link] has been submitted. It requires the validation by clearing process manager</p>\r\n	<p>You will receive another message for inform if this request is accepted or refused.</p>\r\n</div>\r\n";'),
('asset_request_assessment_author_mail_title', 's:78:"Request assessment has been submitted to clearing process manager for approval";'),
('asset_request_assessment_cm_mail_body', 's:293:"<p>Dear [recipient-firstname],</p>\r\n<p>User [author_linked] has sent a request assessment for the following asset release:</p>\r\n<div>\r\n	<p>[isa_node_link]</p>\r\n	<p>This request requires your validation.&nbsp;Please click on the link below to reach the approvation or denial form.</p>\r\n</div>\r\n";'),
('asset_request_assessment_cm_mail_title', 's:39:"Approval request for request assessment";'),
('asset_status_vid', 's:2:"43";'),
('asset_suspended_mail_body', 's:167:"<p>Dear [recipient-firstname],</p>\r\n<p>Your asset release [isa_node_link] has been suspended for the following reason.</p>\r\n<p>[workflow-current-state-log-entry]</p>\r\n";'),
('asset_suspended_mail_title', 's:37:"Your asset release has been suspended";'),
('asset_type_vid', 'i:68;'),
('asset_validated_mail_body', 's:267:"<p>Dear&nbsp;[recipient-firstname],</p>\r\n<p>Your asset release [isa_node_link] has been accepted and published.</p>\r\n<p>It is now visible for any registered or not users on the [site-name] site.</p>\r\n<p>Thank you for sharing information on the [site-name] site.</p>\r\n";'),
('asset_validated_mail_title', 's:37:"Your asset release has been published";'),
('community_create_document_to_facilitators_mail_body', 's:246:"<p>Dear [recipient-firstname],</p>\r\n<div>\r\n	<p>User [author_linked] has created a new document in the [group_url] [isa_group_type].</p>\r\n	<p>Click on the following link to access the document:</p>\r\n	<p>[isa_node_link]</p>\r\n</div>\r\n<p>&nbsp;</p>\r\n";'),
('community_create_news_to_facilitators_mail_body', 's:231:"<p>Dear [recipient-firstname],</p>\r\n<div>\r\n	<p>User [author_linked] has created a new news in the [group_url] [isa_group_type].</p>\r\n	<p>Click on the following link to read the news on Joinup:</p>\r\n	<p>[isa_node_link]</p>\r\n</div>\r\n";'),
('community_delete_topic_to_facilitators_mail_body', 's:160:"<p>Dear [recipient-firstname],</p>\r\n<div>\r\n	<p>User [author_linked] has deleted a forum topic &quot;[title]&quot; in [group_url] [isa_group_type].</p>\r\n</div>\r\n";'),
('community_proposal_mail_body', 's:566:"<p>Dear [recipient-firstname],</p>\r\n<p>User [author_linked] wants to start a new [isa_group_type][project_in_vf].</p>\r\n<p>The user enters the following information for the [isa_group_type]:</p>\r\n<p>Title: [group_url]</p>\r\n<p>Description: [community_description]</p>\r\n<p>Themes: [community_domains]</p>\r\n<p>Languages: [community_languages]</p>\r\n<p>Kind of [isa_group_type]: [community_privacy]</p>\r\n<p>The start of the [isa_group_type] requires your validation.&nbsp;Please click on the link below to reach the validation or denial form.</p>\r\n<p>[node-edit-url]</p>\r\n";'),
('community_proposal_vf_mail_body', 's:476:"<p>Dear [recipient-firstname],</p>\r\n<p>User [author_linked] wants to start a new [isa_group_type][project_in_vf].</p>\r\n<p>The user enters the following information for the [isa_group_type]:</p>\r\n<p>Title: [group_url]</p>\r\n<p>Description: [community_description]</p>\r\n<p>Themes: [community_domains]</p>\r\n<p>Languages: [community_languages]</p>\r\n<p>Kind of [isa_group_type]: [community_privacy]</p>\r\n<p>The start of the [isa_group_type] requires validation by a moderator.</p>\r\n";'),
('content_extra_weights_document', 'a:12:{s:5:"title";s:1:"5";s:10:"body_field";s:1:"6";s:20:"revision_information";s:1:"4";s:6:"author";s:1:"9";s:7:"options";s:2:"10";s:16:"comment_settings";s:2:"11";s:4:"menu";s:1:"7";s:8:"taxonomy";s:1:"2";s:4:"path";s:2:"12";s:10:"og_nodeapi";s:2:"13";s:8:"workflow";s:1:"8";s:9:"nodewords";s:2:"10";}'),
('content_extra_weights_presentation', 'a:11:{s:5:"title";s:1:"0";s:10:"body_field";s:1:"1";s:20:"revision_information";s:2:"11";s:6:"author";s:1:"8";s:7:"options";s:1:"9";s:16:"comment_settings";s:1:"7";s:4:"menu";s:1:"5";s:8:"taxonomy";s:1:"3";s:4:"path";s:1:"6";s:8:"workflow";s:2:"12";s:9:"nodewords";s:1:"4";}'),
('content_extra_weights_project_project', 'a:21:{s:26:"og_user_roles_default_role";s:2:"28";s:5:"title";s:2:"12";s:10:"body_field";s:2:"15";s:20:"revision_information";s:2:"22";s:6:"author";s:2:"16";s:7:"options";s:2:"23";s:16:"comment_settings";s:2:"24";s:8:"language";s:1:"1";s:11:"translation";s:2:"21";s:4:"menu";s:2:"14";s:8:"taxonomy";s:2:"26";s:4:"path";s:2:"25";s:14:"og_description";s:1:"2";s:12:"og_selective";s:2:"20";s:11:"og_register";s:2:"19";s:12:"og_directory";s:2:"18";s:11:"og_language";s:1:"0";s:8:"workflow";s:2:"30";s:10:"og_private";s:2:"17";s:9:"nodewords";s:2:"10";s:6:"webdir";s:1:"6";}'),

-- Missing after diff
('header_block_search_description', 's:111:"<p>The advanced search allows you, using the menu on the left, to apply different filters to your search.</p>\r\n";'),
('header_block_search_title', 's:6:"Search";'),
('comment_default_mode_document', 's:1:"2";'),
('date:document:full:field_publication_date_fromto', 's:4:"both";'),
('date:document:full:field_publication_date_multiple_from', 's:0:"";'),
('date:document:full:field_publication_date_multiple_number', 's:0:"";'),
('date:document:full:field_publication_date_multiple_to', 's:0:"";'),
('date:document:full:field_publication_date_show_repeat_rule', 's:4:"show";'),
('date:document:teaser:field_publication_date_fromto', 's:4:"both";'),
('date:document:teaser:field_publication_date_multiple_from', 's:0:"";'),
('date:document:teaser:field_publication_date_multiple_number', 's:0:"";'),
('date:document:teaser:field_publication_date_multiple_to', 's:0:"";'),
('date:document:teaser:field_publication_date_show_repeat_rule', 's:4:"show";'),
('date:presentation:full:field_publication_date_fromto', 's:4:"both";'),
('date:presentation:full:field_publication_date_multiple_from', 's:0:"";'),
('date:presentation:full:field_publication_date_multiple_number', 's:0:"";'),
('date:presentation:full:field_publication_date_multiple_to', 's:0:"";'),
('date:presentation:full:field_publication_date_show_repeat_rule', 's:4:"show";'),
('date:presentation:teaser:field_publication_date_fromto', 's:4:"both";'),
('date:presentation:teaser:field_publication_date_multiple_from', 's:0:"";'),
('date:presentation:teaser:field_publication_date_multiple_number', 's:0:"";'),
('date:presentation:teaser:field_publication_date_multiple_to', 's:0:"";'),
('date:presentation:teaser:field_publication_date_show_repeat_rule', 's:4:"show";'),
('date_format_joinup_date_format', 's:11:"j M Y - H:i";'),
('drupal_http_request_fails', 'b:1;'),
('flag_default_flag_status', 'a:1:{s:13:"abuse_comment";b:1;}'),
('geographic_coverage_vid', 's:2:"26";'),
('interoperability_level_vid', 'i:74;'),
('header_block_catalogue_list_description', 's:82:"<p>Find, choose, re-use and design asset releases for public administrations</p>\r\n";'),
('header_block_catalogue_list_title', 's:27:"Catalogue of asset releases";'),
('language_count', 'i:38;'),
('metadata-file', 's:0:"";'),
('package_vid', 's:2:"66";'),
('pathauto_node_bulkupdate', 'i:0;'),
('pathauto_node_case_pattern', 's:27:"elibrary/[type]/[title-raw]";'),
('popups_reference_show_add_link_field_asset_homepage_doc', 'i:1;'),
('popups_reference_show_add_link_field_asset_next_version', 'i:0;'),
('popups_reference_show_add_link_field_asset_node_reference_node', 'i:1;'),
('popups_reference_show_add_link_field_asset_previous_version', 'i:0;'),
('popups_reference_show_add_link_field_asset_related_asset', 'i:0;'),
('popups_reference_show_add_link_field_asset_related_doc', 'i:1;'),
('popups_reference_show_add_link_field_asset_webpage_doc', 'i:1;'),
('release_approved_mail_body', 's:222:"<p>Dear&nbsp;[recipient-firstname],</p>\r\n<div>\r\n	<p>Your request assessmentfor the release [isa_node_link] has been approved.</p>\r\n	<p>Thank you for sharing information on the [site-name] site.</p>\r\n</div>\r\n<p>&nbsp;</p>\r\n";'),
('unique_field_comp_case', 's:4:"each";'),
('unique_field_comp_case_epractice', 's:4:"each";'),
('unique_field_scope_asset_release', 's:4:"type";'),
('unique_field_scope_case', 's:4:"type";'),
('unique_field_scope_case_epractice', 's:4:"type";'),
('unique_field_scope_distribution', 's:4:"type";'),
('unique_field_scope_asset_node_reference', 's:4:"type";'),
('unique_field_show_matches_asset_node_reference', 'a:0:{}'),
('unique_field_show_matches_case', 'a:0:{}'),
('unique_field_show_matches_case_epractice', 'a:0:{}'),
('use_workflow_buttons_7', 'i:0;'),
('use_workflow_buttons_9', 'i:1;'),

('case_type_vid', 'i:74;'),
('date:distribution:full:field_asset_last_modification_fromto', 's:4:"both";'),
('date:distribution:full:field_asset_last_modification_multiple_from', 's:0:"";'),
('date:distribution:full:field_asset_last_modification_multiple_number', 's:0:"";'),
('date:distribution:full:field_asset_last_modification_multiple_to', 's:0:"";'),
('date:distribution:full:field_asset_last_modification_show_repeat_rule', 's:4:"show";'),
('date:distribution:teaser:field_asset_last_modification_fromto', 's:4:"both";'),
('date:distribution:teaser:field_asset_last_modification_multiple_from', 's:0:"";'),
('date:distribution:teaser:field_asset_last_modification_multiple_number', 's:0:"";'),
('date:distribution:teaser:field_asset_last_modification_multiple_to', 's:0:"";'),
('date:distribution:teaser:field_asset_last_modification_show_repeat_rule', 's:4:"show";'),
('unique_field_scope_documentation', 's:4:"type";'),
('unique_field_scope_item', 's:4:"type";'),
('unique_field_scope_licence', 's:4:"type";'),
('unique_field_scope_publisher', 's:4:"type";'),
('unique_field_scope_documentation', 's:4:"type";'),
('unique_field_scope_item', 's:4:"type";'),
('unique_field_scope_licence', 's:4:"type";'),
('unique_field_scope_publisher', 's:4:"type";'),
('workflow_case_epractice', 'a:1:{i:0;s:4:"node";}'),
('use_workflow_buttons_10', 'i:1;'),

('apachesolr_cron_limit', 's:2:"50";'),
('apachesolr_enabled_facets', 'a:4:{s:17:"apachesolr_search";a:16:{s:3:"uid";s:3:"uid";s:9:"im_vid_68";s:9:"im_vid_68";s:9:"im_vid_36";s:9:"im_vid_36";s:9:"im_vid_30";s:9:"im_vid_30";s:9:"im_vid_26";s:9:"im_vid_26";s:9:"im_vid_38";s:9:"im_vid_38";s:9:"im_vid_74";s:9:"im_vid_74";s:9:"im_vid_28";s:9:"im_vid_28";s:9:"im_vid_33";s:9:"im_vid_33";s:9:"im_vid_75";s:9:"im_vid_75";s:9:"im_vid_34";s:9:"im_vid_34";s:9:"im_vid_31";s:9:"im_vid_31";s:9:"im_vid_66";s:9:"im_vid_66";s:9:"im_vid_32";s:9:"im_vid_32";s:9:"im_vid_69";s:9:"im_vid_69";s:9:"im_vid_27";s:9:"im_vid_27";}s:23:"apachesolr_facetbuilder";a:2:{s:37:"sm_facetbuilder_current_version_facet";s:37:"sm_facetbuilder_current_version_facet";s:31:"sm_facetbuilder_facet_node_type";s:31:"sm_facetbuilder_facet_node_type";}s:24:"apachesolr_nodereference";a:8:{s:38:"is_cck_field_asset_node_reference_node";s:38:"is_cck_field_asset_node_reference_node";s:32:"im_cck_field_asset_contact_point";s:32:"im_cck_field_asset_contact_point";s:31:"im_cck_field_asset_distribution";s:31:"im_cck_field_asset_distribution";s:33:"im_cck_field_distribution_licence";s:33:"im_cck_field_distribution_licence";s:37:"im_cck_field_asset_metadata_publisher";s:37:"im_cck_field_asset_metadata_publisher";s:33:"im_cck_field_repository_publisher";s:33:"im_cck_field_repository_publisher";s:35:"im_cck_field_distribution_publisher";s:35:"im_cck_field_distribution_publisher";s:28:"im_cck_field_asset_publisher";s:28:"im_cck_field_asset_publisher";}s:13:"apachesolr_og";a:1:{s:9:"im_og_gid";s:9:"im_og_gid";}}'),
('apachesolr_facetstyle', 's:10:"checkboxes";'),
('apachesolr_facet_missing', 'a:4:{s:23:"apachesolr_facetbuilder";a:3:{s:30:"sm_facetbuilder_faceted_search";i:1;s:31:"sm_facetbuilder_facet_node_type";i:0;s:37:"sm_facetbuilder_current_version_facet";i:0;}s:17:"apachesolr_search";a:12:{s:9:"im_vid_27";i:0;s:9:"im_vid_28";i:0;s:4:"type";i:0;s:3:"uid";i:0;s:9:"im_vid_36";i:0;s:9:"im_vid_30";i:0;s:9:"im_vid_26";i:0;s:9:"im_vid_38";i:0;s:9:"im_vid_33";i:0;s:9:"im_vid_34";i:0;s:9:"im_vid_32";i:0;s:9:"im_vid_31";i:0;}s:13:"apachesolr_og";a:1:{s:9:"im_og_gid";i:1;}s:24:"apachesolr_nodereference";a:7:{s:32:"im_cck_field_asset_contact_point";i:0;s:37:"im_cck_field_asset_metadata_publisher";i:0;s:33:"im_cck_field_repository_publisher";i:0;s:35:"im_cck_field_distribution_publisher";i:0;s:28:"im_cck_field_asset_publisher";i:0;s:38:"is_cck_field_asset_node_reference_node";i:0;s:33:"im_cck_field_distribution_licence";i:1;}}'),
('apachesolr_facet_query_initial_limits', 'a:4:{s:23:"apachesolr_facetbuilder";a:3:{s:30:"sm_facetbuilder_faceted_search";i:10;s:31:"sm_facetbuilder_facet_node_type";i:20;s:37:"sm_facetbuilder_current_version_facet";i:10;}s:17:"apachesolr_search";a:12:{s:9:"im_vid_27";i:10;s:9:"im_vid_28";i:10;s:4:"type";i:10;s:3:"uid";i:10;s:9:"im_vid_36";i:10;s:9:"im_vid_30";i:10;s:9:"im_vid_26";i:10;s:9:"im_vid_38";i:10;s:9:"im_vid_33";i:10;s:9:"im_vid_34";i:10;s:9:"im_vid_32";i:10;s:9:"im_vid_31";i:10;}s:13:"apachesolr_og";a:1:{s:9:"im_og_gid";i:10;}s:24:"apachesolr_nodereference";a:7:{s:32:"im_cck_field_asset_contact_point";i:10;s:37:"im_cck_field_asset_metadata_publisher";i:10;s:33:"im_cck_field_repository_publisher";i:10;s:35:"im_cck_field_distribution_publisher";i:10;s:28:"im_cck_field_asset_publisher";i:10;s:38:"is_cck_field_asset_node_reference_node";i:10;s:33:"im_cck_field_distribution_licence";i:10;}}'),
('apachesolr_facet_query_limits', 'a:4:{s:23:"apachesolr_facetbuilder";a:2:{s:31:"sm_facetbuilder_facet_node_type";i:20;s:37:"sm_facetbuilder_current_version_facet";i:20;}s:13:"apachesolr_og";a:1:{s:9:"im_og_gid";i:20;}s:17:"apachesolr_search";a:11:{s:9:"im_vid_36";i:20;s:3:"uid";i:20;s:9:"im_vid_27";i:20;s:9:"im_vid_30";i:20;s:9:"im_vid_26";i:20;s:9:"im_vid_38";i:20;s:9:"im_vid_28";i:20;s:9:"im_vid_33";i:20;s:9:"im_vid_34";i:20;s:9:"im_vid_32";i:20;s:9:"im_vid_31";i:20;}s:24:"apachesolr_nodereference";a:7:{s:32:"im_cck_field_asset_contact_point";i:20;s:37:"im_cck_field_asset_metadata_publisher";i:20;s:33:"im_cck_field_repository_publisher";i:20;s:35:"im_cck_field_distribution_publisher";i:20;s:28:"im_cck_field_asset_publisher";i:20;s:38:"is_cck_field_asset_node_reference_node";i:20;s:33:"im_cck_field_distribution_licence";i:20;}}'),
('apachesolr_facet_query_sorts', 'a:4:{s:23:"apachesolr_facetbuilder";a:2:{s:31:"sm_facetbuilder_facet_node_type";s:5:"count";s:37:"sm_facetbuilder_current_version_facet";s:5:"count";}s:13:"apachesolr_og";a:1:{s:9:"im_og_gid";s:5:"count";}s:17:"apachesolr_search";a:11:{s:9:"im_vid_36";s:5:"count";s:3:"uid";s:5:"count";s:9:"im_vid_27";s:5:"count";s:9:"im_vid_30";s:5:"count";s:9:"im_vid_26";s:5:"count";s:9:"im_vid_38";s:5:"count";s:9:"im_vid_28";s:5:"count";s:9:"im_vid_33";s:5:"count";s:9:"im_vid_34";s:5:"count";s:9:"im_vid_32";s:5:"count";s:9:"im_vid_31";s:5:"count";}s:24:"apachesolr_nodereference";a:7:{s:32:"im_cck_field_asset_contact_point";s:5:"count";s:37:"im_cck_field_asset_metadata_publisher";s:5:"count";s:33:"im_cck_field_repository_publisher";s:5:"count";s:35:"im_cck_field_distribution_publisher";s:5:"count";s:28:"im_cck_field_asset_publisher";s:5:"count";s:38:"is_cck_field_asset_node_reference_node";s:5:"count";s:33:"im_cck_field_distribution_licence";s:5:"count";}}'),
('apachesolr_facet_show_children', 'a:4:{s:23:"apachesolr_facetbuilder";a:2:{s:31:"sm_facetbuilder_facet_node_type";i:0;s:37:"sm_facetbuilder_current_version_facet";i:0;}s:13:"apachesolr_og";a:1:{s:9:"im_og_gid";i:0;}s:17:"apachesolr_search";a:11:{s:9:"im_vid_36";i:0;s:3:"uid";i:0;s:9:"im_vid_27";i:0;s:9:"im_vid_30";i:0;s:9:"im_vid_26";i:0;s:9:"im_vid_38";i:0;s:9:"im_vid_28";i:0;s:9:"im_vid_33";i:0;s:9:"im_vid_34";i:0;s:9:"im_vid_32";i:0;s:9:"im_vid_31";i:0;}s:24:"apachesolr_nodereference";a:7:{s:32:"im_cck_field_asset_contact_point";i:0;s:37:"im_cck_field_asset_metadata_publisher";i:0;s:33:"im_cck_field_repository_publisher";i:0;s:35:"im_cck_field_distribution_publisher";i:0;s:28:"im_cck_field_asset_publisher";i:0;s:38:"is_cck_field_asset_node_reference_node";i:0;s:33:"im_cck_field_distribution_licence";i:0;}}'),
('apachesolr_index_comments_with_node', 'b:0;'),
('apachesolr_logging', 'i:1;'),
('apachesolr_og_groupnode', 's:1:"1";'),
('apachesolr_operator', 'a:4:{s:23:"apachesolr_facetbuilder";a:2:{s:37:"sm_facetbuilder_current_version_facet";s:3:"AND";s:31:"sm_facetbuilder_facet_node_type";s:2:"OR";}s:13:"apachesolr_og";a:1:{s:9:"im_og_gid";s:2:"OR";}s:17:"apachesolr_search";a:11:{s:9:"im_vid_36";s:2:"OR";s:9:"im_vid_30";s:2:"OR";s:9:"im_vid_26";s:2:"OR";s:9:"im_vid_38";s:2:"OR";s:9:"im_vid_28";s:2:"OR";s:9:"im_vid_33";s:2:"OR";s:9:"im_vid_34";s:2:"OR";s:9:"im_vid_31";s:2:"OR";s:9:"im_vid_32";s:2:"OR";s:3:"uid";s:2:"OR";s:9:"im_vid_27";s:2:"OR";}s:24:"apachesolr_nodereference";a:7:{s:38:"is_cck_field_asset_node_reference_node";s:2:"OR";s:32:"im_cck_field_asset_contact_point";s:2:"OR";s:33:"im_cck_field_distribution_licence";s:3:"AND";s:37:"im_cck_field_asset_metadata_publisher";s:2:"OR";s:33:"im_cck_field_repository_publisher";s:2:"OR";s:28:"im_cck_field_asset_publisher";s:2:"OR";s:35:"im_cck_field_distribution_publisher";s:2:"OR";}}'),
('apachesolr_rows', 'i:20;'),
('apachesolr_search_browse', 's:7:"results";'),
('apachesolr_search_query_fields', 'a:190:{s:4:"body";s:3:"1.0";s:7:"changed";s:1:"0";s:13:"comment_count";s:1:"0";s:7:"created";s:1:"0";s:6:"entity";s:1:"0";s:4:"hash";s:1:"0";s:2:"id";s:1:"0";s:9:"im_og_gid";s:1:"0";s:9:"im_vid_10";s:1:"0";s:9:"im_vid_13";s:1:"0";s:9:"im_vid_26";s:1:"0";s:9:"im_vid_27";s:1:"0";s:9:"im_vid_28";s:1:"0";s:9:"im_vid_29";s:1:"0";s:9:"im_vid_30";s:1:"0";s:9:"im_vid_31";s:1:"0";s:9:"im_vid_32";s:1:"0";s:9:"im_vid_33";s:1:"0";s:9:"im_vid_34";s:1:"0";s:9:"im_vid_36";s:1:"0";s:9:"im_vid_38";s:1:"0";s:9:"im_vid_43";s:1:"0";s:9:"im_vid_44";s:1:"0";s:9:"im_vid_45";s:1:"0";s:9:"im_vid_46";s:1:"0";s:9:"im_vid_47";s:1:"0";s:9:"im_vid_48";s:1:"0";s:9:"im_vid_50";s:1:"0";s:9:"im_vid_51";s:1:"0";s:9:"im_vid_55";s:1:"0";s:9:"im_vid_56";s:1:"0";s:9:"im_vid_57";s:1:"0";s:9:"im_vid_59";s:1:"0";s:9:"im_vid_60";s:1:"0";s:9:"im_vid_63";s:1:"0";s:9:"im_vid_64";s:1:"0";s:9:"im_vid_66";s:1:"0";s:9:"im_vid_67";s:1:"0";s:9:"im_vid_68";s:1:"0";s:9:"im_vid_69";s:1:"0";s:9:"im_vid_72";s:1:"0";s:9:"im_vid_73";s:1:"0";s:9:"im_vid_75";s:1:"0";s:8:"im_vid_9";s:1:"0";s:15:"is_upload_count";s:1:"0";s:8:"language";s:1:"0";s:22:"last_comment_or_change";s:1:"0";s:8:"moderate";s:1:"0";s:4:"name";s:3:"3.0";s:3:"nid";s:1:"0";s:14:"nodeaccess_all";s:1:"0";s:26:"nodeaccess_q1hcvv_og_admin";s:1:"0";s:31:"nodeaccess_q1hcvv_og_subscriber";s:1:"0";s:33:"nodeaccess_q1hcvv_workflow_access";s:1:"0";s:39:"nodeaccess_q1hcvv_workflow_access_owner";s:1:"0";s:4:"path";s:1:"0";s:10:"path_alias";s:1:"0";s:7:"promote";s:1:"0";s:32:"sis_cck_field_company_visibility";s:1:"0";s:32:"sis_cck_field_country_visibility";s:1:"0";s:30:"sis_cck_field_email_visibility";s:1:"0";s:33:"sis_cck_field_keywords_visibility";s:1:"0";s:32:"sis_cck_field_profile_visibility";s:1:"0";s:40:"sis_cck_field_project_anonymous_download";s:1:"0";s:33:"sis_cck_field_project_common_type";s:1:"0";s:35:"sis_cck_field_project_display_maven";s:1:"0";s:33:"sis_cck_field_project_display_svn";s:1:"0";s:40:"sis_cck_field_project_legal_doc_creation";s:1:"0";s:24:"sis_cck_field_show_title";s:1:"0";s:23:"sis_cck_field_ten_rules";s:1:"0";s:4:"site";s:1:"0";s:30:"sm_cck_field_language_multiple";s:1:"0";s:39:"sm_cck_field_metadata_language_multiple";s:1:"0";s:31:"sm_facetbuilder_facet_node_type";s:1:"0";s:19:"sm_vid_Asset_status";s:1:"0";s:17:"sm_vid_Asset_type";s:1:"0";s:18:"sm_vid_Case_status";s:1:"0";s:16:"sm_vid_Case_type";s:1:"0";s:17:"sm_vid_Categories";s:1:"0";s:25:"sm_vid_ContextHelp_Titles";s:1:"0";s:25:"sm_vid_Development_status";s:1:"0";s:22:"sm_vid_Factsheet_topic";s:1:"0";s:18:"sm_vid_File_format";s:1:"0";s:17:"sm_vid_Free_event";s:1:"0";s:21:"sm_vid_Funding_source";s:1:"0";s:26:"sm_vid_Geographic_coverage";s:1:"0";s:24:"sm_vid_Intended_audience";s:1:"0";s:15:"sm_vid_Keywords";s:1:"0";s:14:"sm_vid_Licence";s:1:"0";s:19:"sm_vid_Licence_type";s:1:"0";s:26:"sm_vid_License_of_document";s:1:"0";s:19:"sm_vid_My_languages";s:1:"0";s:23:"sm_vid_Natural_language";s:1:"0";s:30:"sm_vid_Nature_of_documentation";s:1:"0";s:17:"sm_vid_Newsletter";s:1:"0";s:17:"sm_vid_Open_event";s:1:"0";s:23:"sm_vid_Operating_system";s:1:"0";s:24:"sm_vid_Organisation_type";s:1:"0";s:38:"sm_vid_Overall_implementation_approach";s:1:"0";s:14:"sm_vid_Package";s:1:"0";s:27:"sm_vid_Programming_language";s:1:"0";s:21:"sm_vid_Publisher_type";s:1:"0";s:12:"sm_vid_Scope";s:1:"0";s:13:"sm_vid_Status";s:1:"0";s:24:"sm_vid_Technology_choice";s:1:"0";s:13:"sm_vid_Themes";s:1:"0";s:25:"sm_vid_Type_of_initiative";s:1:"0";s:22:"sm_vid_Type_of_service";s:1:"0";s:12:"sm_vid_forum";s:1:"0";s:16:"sm_vid_highlight";s:1:"0";s:5:"sname";s:1:"0";s:9:"sort_name";s:1:"0";s:44:"sort_ss_cck_field_community_documents_creati";s:1:"0";s:42:"sort_ss_cck_field_community_forum_creation";s:1:"0";s:41:"sort_ss_cck_field_community_news_creation";s:1:"0";s:41:"sort_ss_cck_field_community_wiki_creation";s:1:"0";s:31:"sort_ss_cck_field_company_scope";s:1:"0";s:30:"sort_ss_cck_field_company_type";s:1:"0";s:44:"sort_ss_cck_field_project_documents_creation";s:1:"0";s:40:"sort_ss_cck_field_project_forum_creation";s:1:"0";s:39:"sort_ss_cck_field_project_news_creation";s:1:"0";s:39:"sort_ss_cck_field_project_wiki_creation";s:1:"0";s:28:"sort_ss_cck_field_type_study";s:1:"0";s:10:"sort_title";s:1:"0";s:5:"spell";s:1:"0";s:39:"ss_cck_field_community_documents_creati";s:1:"0";s:37:"ss_cck_field_community_forum_creation";s:1:"0";s:36:"ss_cck_field_community_news_creation";s:1:"0";s:36:"ss_cck_field_community_wiki_creation";s:1:"0";s:26:"ss_cck_field_company_scope";s:1:"0";s:25:"ss_cck_field_company_type";s:1:"0";s:39:"ss_cck_field_project_documents_creation";s:1:"0";s:35:"ss_cck_field_project_forum_creation";s:1:"0";s:34:"ss_cck_field_project_news_creation";s:1:"0";s:34:"ss_cck_field_project_wiki_creation";s:1:"0";s:23:"ss_cck_field_type_study";s:1:"0";s:6:"status";s:1:"0";s:6:"sticky";s:1:"0";s:6:"tags_a";s:1:"0";s:7:"tags_h1";s:3:"5.0";s:10:"tags_h2_h3";s:3:"3.0";s:13:"tags_h4_h5_h6";s:3:"2.0";s:11:"tags_inline";s:3:"1.0";s:14:"taxonomy_names";s:3:"2.0";s:3:"tid";s:1:"0";s:9:"timestamp";s:1:"0";s:5:"title";s:3:"5.0";s:4:"tnid";s:1:"0";s:9:"translate";s:1:"0";s:15:"ts_vid_10_names";s:1:"0";s:15:"ts_vid_13_names";s:1:"0";s:15:"ts_vid_26_names";s:1:"0";s:15:"ts_vid_27_names";s:3:"1.0";s:15:"ts_vid_28_names";s:1:"0";s:15:"ts_vid_29_names";s:1:"0";s:15:"ts_vid_30_names";s:1:"0";s:15:"ts_vid_31_names";s:1:"0";s:15:"ts_vid_32_names";s:1:"0";s:15:"ts_vid_33_names";s:1:"0";s:15:"ts_vid_34_names";s:1:"0";s:15:"ts_vid_36_names";s:1:"0";s:15:"ts_vid_38_names";s:1:"0";s:15:"ts_vid_43_names";s:1:"0";s:15:"ts_vid_44_names";s:1:"0";s:15:"ts_vid_45_names";s:1:"0";s:15:"ts_vid_46_names";s:1:"0";s:15:"ts_vid_47_names";s:1:"0";s:15:"ts_vid_48_names";s:1:"0";s:15:"ts_vid_50_names";s:1:"0";s:15:"ts_vid_51_names";s:1:"0";s:15:"ts_vid_55_names";s:1:"0";s:15:"ts_vid_56_names";s:1:"0";s:15:"ts_vid_57_names";s:1:"0";s:15:"ts_vid_59_names";s:1:"0";s:15:"ts_vid_60_names";s:1:"0";s:15:"ts_vid_63_names";s:1:"0";s:15:"ts_vid_64_names";s:1:"0";s:15:"ts_vid_66_names";s:1:"0";s:15:"ts_vid_67_names";s:1:"0";s:15:"ts_vid_68_names";s:1:"0";s:15:"ts_vid_69_names";s:1:"0";s:15:"ts_vid_72_names";s:1:"0";s:15:"ts_vid_73_names";s:1:"0";s:15:"ts_vid_75_names";s:1:"0";s:14:"ts_vid_9_names";s:1:"0";s:4:"type";s:1:"0";s:9:"type_name";s:1:"0";s:3:"uid";s:1:"0";s:3:"url";s:1:"0";s:3:"vid";s:1:"0";}'),
('apachesolr_type_filter', 'a:1:{s:17:"apachesolr_search";a:10:{s:9:"im_vid_36";i:0;s:9:"im_vid_30";i:0;s:9:"im_vid_26";i:0;s:9:"im_vid_38";i:0;s:9:"im_vid_28";i:0;s:9:"im_vid_33";i:0;s:9:"im_vid_34";i:0;s:9:"im_vid_31";i:0;s:9:"im_vid_32";i:0;s:9:"im_vid_27";i:0;}}'),

('collapsiblock_default_state', 's:1:"2";'),
('collapsiblock_settings', 'a:22:{s:33:"block-apachesolr_search-im_vid_36";s:1:"2";s:27:"block-apachesolr_search-uid";s:1:"2";s:33:"block-apachesolr_search-im_vid_27";s:1:"2";s:63:"block-apachesolr_nodereference-im_cck_field_asset_contact_point";s:1:"2";s:68:"block-apachesolr_nodereference-im_cck_field_asset_metadata_publisher";s:1:"2";s:64:"block-apachesolr_nodereference-im_cck_field_repository_publisher";s:1:"2";s:66:"block-apachesolr_nodereference-im_cck_field_distribution_publisher";s:1:"2";s:59:"block-apachesolr_nodereference-im_cck_field_asset_publisher";s:1:"2";s:36:"block-isa_membership-filters_members";s:1:"2";s:33:"block-apachesolr_search-im_vid_30";s:1:"2";s:33:"block-apachesolr_search-im_vid_26";s:1:"2";s:33:"block-apachesolr_search-im_vid_38";s:1:"2";s:33:"block-apachesolr_search-im_vid_28";s:1:"2";s:33:"block-apachesolr_search-im_vid_33";s:1:"2";s:33:"block-apachesolr_search-im_vid_34";s:1:"2";s:33:"block-apachesolr_search-im_vid_32";s:1:"2";s:33:"block-apachesolr_search-im_vid_31";s:1:"2";s:67:"block-apachesolr_facetbuilder-sm_facetbuilder_current_version_facet";s:1:"2";s:61:"block-apachesolr_facetbuilder-sm_facetbuilder_facet_node_type";s:1:"2";s:29:"block-apachesolr_og-im_og_gid";s:1:"2";s:69:"block-apachesolr_nodereference-is_cck_field_asset_node_reference_node";s:1:"2";s:64:"block-apachesolr_nodereference-im_cck_field_distribution_licence";s:1:"2";}'),
('collapsiblock_slide_speed', 's:3:"300";'),
('collapsiblock_slide_type', 's:1:"2";'),
('theme_settings', 'a:56:{s:11:"toggle_logo";i:1;s:11:"toggle_name";i:1;s:13:"toggle_slogan";i:0;s:14:"toggle_mission";i:1;s:24:"toggle_node_user_picture";i:0;s:27:"toggle_comment_user_picture";i:0;s:13:"toggle_search";i:1;s:14:"toggle_favicon";i:1;s:20:"toggle_primary_links";i:1;s:22:"toggle_secondary_links";i:1;s:30:"toggle_node_info_advertisement";i:1;s:30:"toggle_node_info_asset_release";i:1;s:21:"toggle_node_info_blog";i:1;s:21:"toggle_node_info_case";i:1;s:31:"toggle_node_info_case_epractice";i:1;s:26:"toggle_node_info_community";i:1;s:30:"toggle_node_info_contact_point";i:1;s:28:"toggle_node_info_contexthelp";i:1;s:32:"toggle_node_info_contexthelp_faq";i:1;s:29:"toggle_node_info_distribution";i:1;s:25:"toggle_node_info_document";i:1;s:30:"toggle_node_info_documentation";i:1;s:22:"toggle_node_info_event";i:1;s:26:"toggle_node_info_factsheet";i:1;s:32:"toggle_node_info_federated_forge";i:1;s:34:"toggle_node_info_federated_project";i:1;s:27:"toggle_node_info_identifier";i:1;s:30:"toggle_node_info_project_issue";i:1;s:21:"toggle_node_info_item";i:1;s:30:"toggle_node_info_legaldocument";i:1;s:24:"toggle_node_info_licence";i:1;s:21:"toggle_node_info_news";i:1;s:27:"toggle_node_info_newsletter";i:1;s:21:"toggle_node_info_page";i:0;s:29:"toggle_node_info_presentation";i:1;s:24:"toggle_node_info_profile";i:1;s:32:"toggle_node_info_project_project";i:1;s:32:"toggle_node_info_project_release";i:1;s:26:"toggle_node_info_publisher";i:1;s:27:"toggle_node_info_repository";i:1;s:22:"toggle_node_info_story";i:1;s:22:"toggle_node_info_topic";i:1;s:22:"toggle_node_info_video";i:1;s:21:"toggle_node_info_wiki";i:1;s:37:"toggle_node_info_asset_node_reference";i:1;s:34:"toggle_node_info_language_textarea";i:1;s:35:"toggle_node_info_language_textfield";i:1;s:12:"default_logo";i:1;s:9:"logo_path";s:0:"";s:11:"logo_upload";s:0:"";s:15:"default_favicon";i:1;s:12:"favicon_path";s:0:"";s:14:"favicon_upload";s:0:"";s:19:"collapsiblock_block";s:27:"div.block_apachesolr_search";s:19:"collapsiblock_title";s:13:":header:first";s:21:"collapsiblock_content";s:11:"div.content";}'),


('context_status', 'a:18:{s:19:"multistep_community";b:1;s:14:"multistep_news";b:1;s:10:"forum_list";b:1;s:19:"blog_node_community";b:1;s:18:"people_recommended";b:1;s:11:"assets_list";b:1;s:11:"news_header";b:1;s:14:"node_type_blog";b:1;s:14:"node_type_wiki";b:1;s:18:"node_type_document";b:1;s:5:"topic";b:1;s:19:"node_add_edit_pages";b:1;s:20:"node_revisions_pages";b:1;s:14:"elibrary_nodes";b:1;s:10:"event_node";b:1;s:14:"news_blog_edit";b:1;s:15:"newsletter_edit";b:1;s:28:"catalogue_asset_release_node";b:1;}'),
('pathauto_node_asset_node_reference_pattern', 's:0:"";'),
('pathauto_node_bulkupdate', 'b:0;'),
('pathauto_node_case_epractice_pattern', 's:0:"";'),
('pathauto_node_federated_project_no_pattern', 's:0:"";'),
('pathauto_node_federated_project_sig_pattern', 's:0:"";'),
('pathauto_node_language_textarea_pattern', 's:0:"";'),
('pathauto_node_language_textfield_pattern', 's:0:"";'),
('pathauto_node_legaldocument_pattern', 's:0:"";'),
('pathauto_node_project_project_no_pattern', 's:0:"";'),
('pathauto_node_project_project_sig_pattern', 's:0:"";'),
('project_release_file_extensions', 's:74:"zip gz tar bz2 rar tgz tar dmg rpm deb exe xsd xml xmi txt rdf ear jar war";'),
('unique_field_fields_case', 'a:0:{}'),
('unique_field_fields_case_epractice', 'a:0:{}'),

-- Mail templates
('repository_postponed_deletion_mail_author_body', 's:207:"<p>Dear [recipient-firstname],</p>\r\n<div>\r\n	<p>The deletion of the [type] [isa_node_link] has been postponed for the following reason.</p>\r\n	<p>[workflow-current-state-log-entry]</p>\r\n</div>\r\n<p>&nbsp;</p>\r\n";'),
('repository_postponed_deletion_mail_author_title', 's:42:"Deletion of [type] item has been postponed";'),
('repository_rejected_deletion_mail_author_body', 's:205:"<p>Dear [recipient-firstname],</p>\r\n<div>\r\n	<p>The deletion of the [type] [isa_node_link] has been refused for the following reason.</p>\r\n	<p>[workflow-current-state-log-entry]</p>\r\n</div>\r\n<p>&nbsp;</p>\r\n";'),
('repository_rejected_deletion_mail_author_title', 's:41:"Deletion of [type] item has been rejected";'),
('repository_request_deletion_mail_author_body', 's:381:"<p>Dear [recipient-firstname],</p>\r\n<p>Your [isa_group_type] [group_url] has been requested for deletion. It requires the validation from site moderator, before it will be deleted.</p>\r\n<p>You will receive another message when the [isa_group_type] is deleted, rejected for deletion or postponed for deletion.</p>\r\n<p>Thank you for sharing information on the [site-name] site.</p>\r\n";'),
('repository_request_deletion_mail_author_title', 's:62:"[isa_group_type] has been requested for deletion to moderators";'),
('repository_request_deletion_mail_moderator_body', 's:280:"<p>Dear [recipient-firstname],</p>\r\n<p>User [author_linked] wants to delete [type] &quot;[isa_node_link]&quot;.</p>\r\n<p>The deletion of this content requires your validation.&nbsp;Please click on the link below to reach the validation or denial form.</p>\r\n<p>[node-edit-url]</p>\r\n";'),
('repository_request_deletion_mail_moderator_title', 's:41:"Approval request deletion for [type] item";'),
('repository_deleted_mail_author_body', 's:209:"<p>Dear [field_firstname-formatted],</p>\r\n<p>The [isa_group_type] &quot;[title]&quot; has been deleted by the moderator for the following reason:</p>\r\n<p>[workflow-current-state-log-entry]</p>\r\n<p>&nbsp;</p>\r\n";'),
('repository_deleted_mail_author_title', 's:47:"The [isa_group_type] "[title]" has been deleted";'),
('content_create_comment_to_moderators_mail_body', 's:287:\"<p>Dear [recipient-firstname],</p>\r\n<div>\r\n	<p>User [author_linked] has posted a new comment [comment_group_title]:</p>\r\n	<p>&quot;<em>[comment_teaser]</em>&quot;</p>\r\n	<p>Click on the following link to read the comment on Joinup:</p>\r\n	<p>[isa_comment_link]</p>\r\n</div>\r\n<p>&nbsp;</p>\r\n\";'),
('new_revision_new_revision_mail_moderator_body', 's:227:"<p>&nbsp;</p>\r\n<p>Dear [recipient-firstname],</p>\r\n<p>User [author_linked] has updated the following content:</p>\r\n<p>[isa_node_link]</p>\r\n<p>Click on the link below to view this new revision.</p>\r\n<p>[node_revisions_url]</p>\r\n";'),
('new_revision_new_revision_mail_moderator_title', 's:28:"[isa_node_type] item updated";'),

-- Automatic aliases

('pathauto_node_contact_point_pattern', 's:28:"catalogue/[type]/[title-raw]";'),
('pathauto_node_distribution_pattern', 's:28:"catalogue/[type]/[title-raw]";'),
('pathauto_node_identifier_pattern', 's:28:"catalogue/[type]/[title-raw]";'),
('pathauto_node_item_pattern', 's:28:"catalogue/[type]/[title-raw]";'),
('pathauto_node_licence_pattern', 's:28:"catalogue/[type]/[title-raw]";'),
('pathauto_node_publisher_pattern', 's:28:"catalogue/[type]/[title-raw]";'),
('pathauto_node_repository_pattern', 's:28:"catalogue/[type]/[title-raw]";'),
('pathauto_node_documentation_pattern', 's:28:"catalogue/[type]/[title-raw]";');


DELETE FROM `variable` WHERE `variable`.`name` = 'comment_anonymous_study';
DELETE FROM `variable` WHERE `variable`.`name` = 'comment_controls_study';
DELETE FROM `variable` WHERE `variable`.`name` = 'comment_default_mode_study';
DELETE FROM `variable` WHERE `variable`.`name` = 'comment_default_order_study';
DELETE FROM `variable` WHERE `variable`.`name` = 'comment_default_per_page_study';
DELETE FROM `variable` WHERE `variable`.`name` = 'comment_form_location_study';
DELETE FROM `variable` WHERE `variable`.`name` = 'comment_preview_study';
DELETE FROM `variable` WHERE `variable`.`name` = 'comment_study';
DELETE FROM `variable` WHERE `variable`.`name` = 'comment_subject_field_study';
DELETE FROM `variable` WHERE `variable`.`name` = 'comment_upload_images_study';
DELETE FROM `variable` WHERE `variable`.`name` = 'comment_upload_study';
DELETE FROM `variable` WHERE `variable`.`name` = 'content_extra_weights_study';
DELETE FROM `variable` WHERE `variable`.`name` = 'content_profile_use_study';
DELETE FROM `variable` WHERE `variable`.`name` = 'enable_revisions_page_study';
DELETE FROM `variable` WHERE `variable`.`name` = 'form_build_id_study';
DELETE FROM `variable` WHERE `variable`.`name` = 'language_content_type_study';
DELETE FROM `variable` WHERE `variable`.`name` = 'new_revisions_study';
DELETE FROM `variable` WHERE `variable`.`name` = 'node_options_study';
DELETE FROM `variable` WHERE `variable`.`name` = 'og_content_type_usage_study';
DELETE FROM `variable` WHERE `variable`.`name` = 'og_max_groups_study';
DELETE FROM `variable` WHERE `variable`.`name` = 'pathauto_node_study_pattern';
DELETE FROM `variable` WHERE `variable`.`name` = 'revisioning_auto_publish_study';
DELETE FROM `variable` WHERE `variable`.`name` = 'show_diff_inline_study';
DELETE FROM `variable` WHERE `variable`.`name` = 'show_preview_changes_study';
DELETE FROM `variable` WHERE `variable`.`name` = 'subscriptions_default_workflow_study';
DELETE FROM `variable` WHERE `variable`.`name` = 'subscriptions_workflow_study';
DELETE FROM `variable` WHERE `variable`.`name` = 'upload_study';
DELETE FROM `variable` WHERE `variable`.`name` = 'workflow_study';
DELETE FROM `variable` WHERE `variable`.`name` = 'og_content_type_usage_image';
