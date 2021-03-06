<?php
// $Id: node.tpl.php,v 1.4.2.1 2009/08/10 10:48:33 goba Exp $

/**
 * @file
 *
 * Theme implementation to display a profile.
 *
 * Available variables:
 * - $title: the (sanitized) title of the node.
 * - $content: Node body or teaser depending on $teaser flag.
 * - $picture: The authors picture of the node output from
 *   theme_user_picture().
 * - $date: Formatted creation date (use $created to reformat with
 *   format_date()).
 * - $links: Themed links like "Read more", "Add new comment", etc. output
 *   from theme_links().
 * - $name: Themed username of node author output from theme_username().
 * - $node_url: Direct url of the current node.
 * - $terms: the themed list of taxonomy term links output from theme_links().
 * - $submitted: themed submission information output from
 *   theme_node_submitted().
 *
 * Other variables:
 * - $node: Full node object. Contains data that may not be safe.
 * - $type: Node type, i.e. story, page, blog, etc.
 * - $comment_count: Number of comments attached to the node.
 * - $uid: User ID of the node author.
 * - $created: Time the node was published formatted in Unix timestamp.
 * - $zebra: Outputs either "even" or "odd". Useful for zebra striping in
 *   teaser listings.
 * - $id: Position of the node. Increments each time it's output.
 *
 * Node status variables:
 * - $teaser: Flag for the teaser state.
 * - $page: Flag for the full page state.
 * - $promote: Flag for front page promotion state.
 * - $sticky: Flags for sticky post setting.
 * - $status: Flag for published status.
 * - $comment: State of comment settings for the node.
 * - $readmore: Flags true if the teaser content of the node cannot hold the
 *   main body content.
 * - $is_front: Flags true when presented in the front page.
 * - $logged_in: Flags true when the current user is a logged-in member.
 * - $is_admin: Flags true when the current user is an administrator.
 *
 * @see joinup_preprocess_node()
 * @see _joinup_preprocess_profile()
 * @ingroup nodes
 * 
 */
$user = user_load($node->uid);
drupal_add_css(drupal_get_path('theme', 'joinup').'/styles/default/tableofcontents.css');
//https://webgate.ec.europa.eu/CITnet/jira/browse/ISAICP-834
?>



<div id="node-<?php print $node->nid; ?>" class="node<?php if ($sticky) { print ' sticky'; } ?><?php if (!$status) { print ' node-unpublished'; } ?> clear-block">
	<div class="node-content">
		<div id="node-kudos-profile" class="kudos-profile">
			<h3 class="accessibility-info"><?php print t('Kudos &amp; Profile Status'); ?></h3>
			<dl>
				<dt class="field field-kudos-term accessibility-info"><?php print t('Kudos'); ?></dt>
				<dd class="field field-kudos-description"><span class="accessibility-info"><?php print t('Currently received'); ?>:</span> <?php print $kudos ?> <span class="accessibility-info"><?php print t('Kudos'); ?></span></dd>
				<dt class="field field-completed-profile-term"><span class="accessibility-info"><?php print t('Profile Status'); ?></span></dt>
				<dd class="field field-completed-profile-progress-bar"><span class="progress-bar" style="width:<?php print $node->field_completed_profile[0]['value']; ?>%;">&nbsp;</span></dd>
				<dd class="field field-completed-profile-description"><?php print $node->field_completed_profile[0]['value']; ?>%</dd>
			</dl>
		</div>
		<div id="node-personal-data" class="box personal-data">
			<h3 class="page-subtitle-content"><?php print t('Personal data'); ?></h3>
			<div class="odd nodes-row-first nodes-row-last clearfix">
				<div class="colspan-2 first fields">
					<div class="field field-picture"><?php print $node->picture; ?></div>
				</div>
				<dl class="colspans-2-4 last fields">
					<dt class="field field-users-name-term"><?php print t('Name'); ?>:</dt>
					<dd class="field field-users-name-description"><strong><?php print $node->field_firstname[0]['value'] . ' ' . $node->field_lastname[0]['value']; ?></strong></dd>
					
                    <?php if (isa_toolbox_check_visibility($node, 'country') && !empty($node->country)): ?>
                    <dt class="field field-location-term"><?php print t('Location'); ?>:</dt>
					<dd class="field field-country-description"><?php print $node->country ?></dd>
                    <?php endif; ?>

                    <?php if (isa_toolbox_check_visibility($node, 'email') && !empty($user->mail)): ?>
                            <dt class="field field-profile-email-term"><?php print t('Email'); ?>:</dt>
                            <dd class="field field-profile-email-description"><?php print isa_toolbox_protect_email($user->mail) ?></dd>
                    <?php endif; ?>

					<dt class="field field-created-term"><?php print t('Member for'); ?>:</dt>
					<dd class="field field-created-description"><?php print $created ?></dd>
                    <?php if (count($taxonomy_terms) > 0): ?>
						<?php foreach ($taxonomy_terms as $term_name => $term_values): ?>
                            <?php if ((isa_toolbox_check_visibility($node, 'keywords') && ($term_name) == "Keywords") || (isa_toolbox_check_visibility($node, 'profile') && $term_name != "Keywords")): ?>
                              <dt class="field field-taxonomy-<?php print strtolower($term_name); ?>-term"><?php print $term_name; ?>:</dt>
                              <dd class="field field-taxonomy-<?php print strtolower($term_name); ?>-description"><?php print $term_values; ?></dd>
                            <?php endif; ?>
						<?php endforeach; ?>
					<?php endif; ?>
				</dl>
			</div>
		</div>
		<?php 
		//https://webgate.ec.europa.eu/CITnet/jira/browse/ISAICP-834
		if((isa_toolbox_check_visibility($node, 'facebook') && isset($node->field_facebook[0]['url'])) 
			|| (isa_toolbox_check_visibility($node, 'twitter') && isset($node->field_twitter[0]['url'])) 
			|| (isa_toolbox_check_visibility($node, 'linkedin') && isset($node->field_linkedin[0]['url']))){	
		?>
		<div id="node-social-networks" class="box social-networks">
			<h3 class="page-subtitle-content"><?php print t('Social Networks'); ?></h3>
			<div class="odd nodes-row-first nodes-row-last clearfix">
				<dl class="colspans-2-4 last fields">
				
				    <?php //if (isa_toolbox_check_visibility($node, 'field_facebook') && !empty($node->field_facebook)): ?>
				    <?php if(isa_toolbox_check_visibility($node, 'facebook') && isset($node->field_facebook[0]['url'])): ?>
					<dt class="field field-users-facebook-term"><?php print t('Facebook'); ?>:</dt>
					<dd class="field field-users-facebook-description"><a href="<?php print $node->field_facebook[0]['url'] ?>" target="_blank"><img src="<?php echo base_path(). path_to_theme() ?>/images/icons/social/facebook.png" /></a> <a href="<?php print $node->field_facebook[0]['url'] ?>" target="_blank"><?php print $node->field_facebook[0]['display_title'] ?></a></dd>
					<?php endif; ?>
					
                    <?php //if (isa_toolbox_check_visibility($node, 'field_twitter') && !empty($node->field_twitter)): ?>
                    <?php if(isa_toolbox_check_visibility($node, 'twitter') && isset($node->field_twitter[0]['url'])): ?>
                    <dt class="field field-users-twitter-term"><?php print t('Twitter'); ?>:</dt>
					<dd class="field field-users-twitter-description"><a href="<?php print $node->field_twitter[0]['url'] ?>" target="_blank"><img src="<?php echo base_path(). path_to_theme() ?>/images/icons/social/twitter.png" /></a> <a href="<?php print $node->field_twitter[0]['url'] ?>" target="_blank"><?php print $node->field_twitter[0]['display_title'] ?></a></dd>
                    <?php endif; ?>

                    <?php //if (isa_toolbox_check_visibility($node, 'field_linkedin') && !empty($node->field_linkedin)): ?>
                    <?php if(isa_toolbox_check_visibility($node, 'linkedin') && isset($node->field_linkedin[0]['url'])): ?>
                    <dt class="field field-users-linkedin-term"><?php print t('Linkedin'); ?>:</dt>
					<dd class="field field-users-linkedin-description"><a href="<?php print $node->field_linkedin[0]['url'] ?>" target="_blank"><img src="<?php echo base_path(). path_to_theme() ?>/images/icons/social/linkedin.png" /></a> <a href="<?php print $node->field_linkedin[0]['url'] ?>" target="_blank"><?php print $node->field_linkedin[0]['display_title'] ?></a></dd>
                    <?php endif; ?>

				</dl>
			</div>
		</div>
		<?php } ?>
		
		<?php 
		//https://webgate.ec.europa.eu/CITnet/jira/browse/ISAICP-834
		if(isa_toolbox_check_visibility($node, 'professional_profile') && (isset($node->field_professional_profile[0]['value']))){	
		?>
		<div id="node-professional_profile" class="box professional_profile">
			<h3 class="page-subtitle-content"><?php print t('Professional profile'); ?></h3>
			<div class="odd nodes-row-first nodes-row-last clearfix">				
			    <?php //if (isa_toolbox_check_visibility($node, 'field_professional_profile') && !empty($node->field_professional_profile)): ?>
			    <?php if(isset($node->field_professional_profile)): ?>
				<p class="field field-users-professional_profile-description"><?php print $node->field_professional_profile[0]['value'] ?></p>
                <?php endif; ?>
			</div>
		</div>
		<?php } ?>
		
		
  <?php if (isa_toolbox_check_visibility($node, 'company') && ($node->field_company_name[0]['value'] || $node->field_street[0]['value'] || $node->field_number[0]['value'] || $node->field_zipcode[0]['value'] ||
          $node->field_city[0]['value'] || $node->field_company_country[0]['value'] || $node->field_company_phone[0]['value'] || $node->field_company_type[0]['value'] || $node->field_company_scope[0]['value'])): ?>
		<div id="node-organization-company" class="box organization-company">
			<h3 class="page-subtitle-content"><?php print t('Organization/Company'); ?></h3>
			<div class="odd nodes-row-first nodes-row-last clearfix">
				<dl class="colspans-2-4 push-2 last fields">
					<?php if ($node->field_company_name[0]['value']): ?>
                      <dt class="field field-company-name-term"><?php print t('Organization'); ?>:</dt>
                      <dd class="field field-company-name-description"><strong><?php print $node->field_company_name[0]['value']; ?></strong></dd>
					<?php endif; ?>
					<?php if ($node->field_street[0]['value'] || $node->field_number[0]['value'] || $node->field_zipcode[0]['value'] || $node->field_city[0]['value'] || $node->field_company_country[0]['value']): ?>
						<dt class="field field-address-term"><?php print t('Address'); ?>:</dt>
						<dd class="field field-address-description">
							<address>
								<?php print $node->field_street[0]['value'].', '.$node->field_number[0]['value']; ?><br />
								<?php print $node->field_zipcode[0]['value'].' '.$node->field_city[0]['value']; ?><br />
								<?php print $node->field_company_country[0]['value']; ?>
							</address>
						</dd>
					<?php endif; ?>
					<?php if ($node->field_company_phone[0]['value']): ?>
						<dt class="field field-company-phone-term"><?php print t('Phone'); ?>:</dt>
						<dd class="field field-company-phone-description"><?php print $node->field_company_phone[0]['value']; ?></dd>
					<?php endif; ?>
                    <?php if ($node->field_company_type[0]['value']): ?>      
                      <dt class="field field-company-type-term"><?php print t('Type'); ?>:</dt>
                      <dd class="field field-company-type-description"><?php print $node->field_company_type[0]['value']; ?></dd>
					<?php endif; ?>
                    <?php if ($node->field_company_scope[0]['value']): ?>   
                      <dt class="field field-company-scope-term"><?php print t('Scope'); ?>:</dt>
                      <dd class="field field-company-scope-description"><?php print $node->field_company_scope[0]['value']; ?></dd>
                     <?php endif; ?>
				</dl>
			</div>
		</div>	
<?php endif; ?>
<?php
if (isa_toolbox_check_visibility($node, 'linkedin') && isset($node->field_linkedin[0]['url'])){
$linkedin_url = $node->field_linkedin[0]['url'];
 if (!is_null($linkedin_url)) {
	if(strpos($linkedin_url,'company')){
		$linkedin_type = "IN/CompanyProfile";
	}else{
		$linkedin_type = "IN/MemberProfile";
	}
?>
<div class="flo-right">
	<div class="socialHeader linkedin">
		<a href="<?php print $linkedin_url;?>" target="_blank">Linkedin</a>
	</div>
	<div class="socialContent">
		<script src="https://platform.linkedin.com/in.js" type="text/javascript"></script>
		<script type="<?php print $linkedin_type;?>" data-id="<?php print($linkedin_url);?>" data-format="inline"></script>
	</div>
</div>
<?php
}
}
?>		
 <?php if (isset($field_profile_cv_rendered)): ?>
        <div class="field field-documentation">
          <h3 class="page-subtitle-content"><?php print t('Curriculum Vitae'); ?></h3>
          <?php print $field_profile_cv_rendered; ?>
          </div>
         <?php endif; ?>
	</div>
</div>
