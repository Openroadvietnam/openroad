REPLACE INTO `variable` (`name`, `value`) VALUES
-- ISAICP-734
-- ISAICP-779
('asset_proposal_author_mail_body', 's:521:"<p>Dear [recipient-firstname],</p><p>Your asset entitled &#39;[isa_node_link]&#39; has been submitted. It requires validation by the [site-name] moderator, before it can become visible on [site-name].</p><p>You will receive an e-mail notifying you when the asset release is validated and published.</p><p>In case your proposal is rejected by the moderator, you will be notified of the reasons, and will have the possibility to update and resubmit your proposal.</p><p>Thank you for sharing information on [site-name].</p>";'),
-- ISAICP-735
('news_proposal_author_mail_body', 's:508:"<p>Dear [recipient-firstname],</p><p>Your [type] entitled &#39;[isa_node_link]&#39; has been submitted. It requires validation by the [site-name] moderator, before it can become visible on [site-name].<br />You will receive an e-mail notifying you when the [type] is validated and published.<br />In case your proposal is rejected by the moderator, you will be notified of the reasons, and will have the possibility to update and resubmit your proposal.</p><p>Thank you for sharing information on Joinup.</p>";'),
-- ISAICP-732
('group_federated_asset_release_disclaimer_information', 's:344:"<p><strong>Disclaimer</strong><br />The description metadata about this asset release is federated and thus just referenced by the [site-name] platform. Information such as the owner, publisher, and usage rights are only given as an indication. For an authoritative answer, it is imperative to verify the repository of origin, as indicated.</p>";'),
-- ISAICP-733
('group_propose_contributed_metadata_agreement_information', 's:1309:"<p><strong>Contributor agreement</strong></p><p>By submitting this form you contribute description metadata and agree to the below contributor agreement. Please read it carefully.</p><ul><li>You hereby grant the European Union a perpetual, non-exclusive, royaltyfree, world-wide right and licence under any Contributor copyrights in the submitted asset to publish this asset as part of the [site-name] platform under the licence specified by you and stored into the system.</li><li>You hereby assert that you were given the occasion to enter the licensing information and the meta-information tags related to that licenses and accepts that the [site-name] platform may add or change corresponding tags to the asset and its licenses.</li><li>You acknowledge that acceptance into the [site-name] platform is conditioned on the provision of correct licensing information. In case of missing or misleading licensing information related to copyrights and patents the European Commission MAY retract the asset from the [site-name] platform.</li><li>You vouch that you have all rights necessary to license your contribution to this wiki and to the [site-name] platform in a way that does not violate copyright, patent, and trademark rights, contractual obligations, or libel and export control regulations.</li></ul>";'),
-- ISAICP-377
('apachesolr_facetstyle', 's:10:"checkboxes";'),
-- ISAICP-697
('site_mission', 's:110:"<p>Learn from shared experiences and re-use open source software & semantic assets to save time and money.</p>";'),
-- ISAICP-726
('apachesolr_enabled_facets', 'a:5:{s:17:"apachesolr_search";a:24:{s:29:"field_language_textfield_lang";s:36:"ss_cck_field_language_textfield_lang";s:23:"field_language_multiple";s:30:"sm_cck_field_language_multiple";s:3:"uid";s:3:"uid";s:7:"created";s:7:"created";s:9:"im_vid_43";s:9:"im_vid_43";s:9:"im_vid_68";s:9:"im_vid_68";s:9:"im_vid_36";s:9:"im_vid_36";s:9:"im_vid_30";s:9:"im_vid_30";s:9:"im_vid_57";s:9:"im_vid_57";s:9:"im_vid_73";s:9:"im_vid_73";s:9:"im_vid_26";s:9:"im_vid_26";s:9:"im_vid_38";s:9:"im_vid_38";s:9:"im_vid_74";s:9:"im_vid_74";s:9:"im_vid_28";s:9:"im_vid_28";s:9:"im_vid_33";s:9:"im_vid_33";s:9:"im_vid_75";s:9:"im_vid_75";s:9:"im_vid_34";s:9:"im_vid_34";s:9:"im_vid_31";s:9:"im_vid_31";s:9:"im_vid_66";s:9:"im_vid_66";s:9:"im_vid_32";s:9:"im_vid_32";s:9:"im_vid_72";s:9:"im_vid_72";s:9:"im_vid_70";s:9:"im_vid_70";s:9:"im_vid_69";s:9:"im_vid_69";s:9:"im_vid_27";s:9:"im_vid_27";}s:23:"apachesolr_facetbuilder";a:2:{s:37:"sm_facetbuilder_current_version_facet";s:37:"sm_facetbuilder_current_version_facet";s:31:"sm_facetbuilder_facet_node_type";s:31:"sm_facetbuilder_facet_node_type";}s:24:"apachesolr_nodereference";a:8:{s:38:"is_cck_field_asset_node_reference_node";s:38:"is_cck_field_asset_node_reference_node";s:32:"im_cck_field_asset_contact_point";s:32:"im_cck_field_asset_contact_point";s:31:"im_cck_field_asset_distribution";s:31:"im_cck_field_asset_distribution";s:33:"im_cck_field_distribution_licence";s:33:"im_cck_field_distribution_licence";s:37:"im_cck_field_asset_metadata_publisher";s:37:"im_cck_field_asset_metadata_publisher";s:33:"im_cck_field_repository_publisher";s:33:"im_cck_field_repository_publisher";s:35:"im_cck_field_distribution_publisher";s:35:"im_cck_field_distribution_publisher";s:28:"im_cck_field_asset_publisher";s:28:"im_cck_field_asset_publisher";}s:13:"apachesolr_og";a:1:{s:9:"im_og_gid";s:9:"im_og_gid";}s:14:"isa_apachesolr";a:5:{s:10:"im_licence";s:10:"im_licence";s:15:"im_licence_type";s:15:"im_licence_type";s:12:"im_publisher";s:12:"im_publisher";s:17:"im_publisher_type";s:17:"im_publisher_type";s:20:"is_repository_origin";s:20:"is_repository_origin";}}'),
-- ISAICP-709
('group_asset_projects_list_text_information', 's:281:"<h2 style="font-size: 18px; line-height: 25px; ">Find and Reuse Semantic Assets</h2><p>[site-name] is the platform hosted by the European Commission to support and promote metadata management. [site-name] offers a set of services to promote semantic interoperability in Europe.</p>";'),
-- ISAICP-786
('group_federated_repositories_list_text_information', 's:729:"<h2 style="font-size: 18px; line-height: 25px; ">Federated Repositories: one central place to find semantic interoperability assets</h2><p>[site-name] allows you to search for semantic interoperability assets located on different online repositories, the so-called federated repositories. These federated repositories exchange information about their semantic assets with the [site-name] platform, where they are displayed in a format compliant with the Asset Description Metadata Schema (<a href="http://joinup.ec.europa.eu/asset/adms/description">ADMS</a>). As a consequence, a search for semantic assets on [site-name] will also include a listing of the assets hosted on these federated repositories in the search results.</p>";'),
('group_asset_releases_list_text_information', 's:736:"<h2 style="font-size: 18px; line-height: 25px; ">One central place to search for semantic interoperability assets</h2><p>[site-name] allows you to search for semantic interoperability assets located on different online repositories on the web, the so-called federated repositories. These federated repositories automatically exchange information about their semantic assets with the [site-name] platform, where they are displayed in a format compliant with the Asset Description Metadata Schema (<a href="http://joinup.ec.europa.eu/asset/adms/description">ADMS</a>). As a consequence, a search for semantic assets on [site-name] will also include a listing of the assets hosted on these federated repositories in the search results.</p>";'),
-- HtmLawed
('htmLawed_format_2', 'a:3:{s:6:"config";s:312:"''safe''=>1, ''elements''=>''a, div, span, p, h1, h2, h3, h4, h5, h6, strong, em, abbr, acronym, address, bdo, blockquote, cite, q, code, ins, del, dfn, kbd, pre, samp, var, br, img, area, map, legend, table, tr, td, th, tbody, thead, tfoot, col, colgroup, caption, ul, ol, li, dl, dt, dd, hr'', ''deny_attribute''=>''id''";s:4:"spec";s:0:"";s:4:"help";s:70:"<p>Tags allowed: a, em, strong, cite, code, ol, ul, li, dl, dt, dd</p>";}');

-- ISAICP-726
DELETE FROM `variable` WHERE name='group_advanced_search_text_information';
