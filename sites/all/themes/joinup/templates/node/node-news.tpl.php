<?php
// $Id: node.tpl.php,v 1.4.2.1 2009/08/10 10:48:33 goba Exp $

/**
* @file
*
* Theme implementation to display a news.
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
* --------- Additional variables ---------
* 
* $group_type : the type of group (software)
*
* -- taxonomie --
* $taxonomy_terms : array of terms by vocabulary name
* $author : author lastname and firstname
* flag_count
*
 * @see joinup_preprocess_node()
 * @see _joinup_preprocess_news()
 * 
*  @ingroup nodes
*/
//Hide block if empty
!empty($node->field_email['0']['view']) || 
!empty($node->field_city['0']['view'])  || 
$node->field_source_url['0']['view']    ||
$taxonomy_terms && !empty ($taxonomy_terms) ? $information = TRUE : $information = FALSE;
?>
<div id="node-<?php print $node->nid; ?>" class="node<?php if ($sticky) { print ' sticky'; } ?><?php if (!$status) { print ' node-unpublished'; } ?> node-type-<?php print $node->type; ?> clear-block">
	<div class="node-content">
		<?php if ($flags_view): ?>
			<div class="field field-flags-view"><?php print $flags_view; ?></div>
		<?php endif; ?> 
		<div class="field field-submitted"><?php print $submitted; ?></div>
		<div class="field field-vote-rating"><?php print $vote_rating; ?></div>
		<div class="field field-title">
			<h2><?php print $title ?></h2>
		</div>
		<div class="field field-content-body"><?php print $node->content['body']['#value']; ?></div>
		
	<?php 
	//https://webgate.ec.europa.eu/CITnet/jira/browse/ISAICP-123
	// A user should be able to report an abuse
	if($node->link_abuse){
		$query = array('query'	=> array(
											'abuse'	=> 'true',
											'page'	=> $node->path,
								));
	?>
		<div class="link-abuse"><?php print l(t('Report abusive content'), 'contact', $query);?></div>
	<?php }?>
			
		<?php 
    if (isset($field_documentation_rendered) and !empty($field_documentation_rendered)): ?>
			<div class="field field-documentation">
				<?php //Hide block if empty ?>
				<h3 class="page-subtitle-content"><?php print t('Documentation'); ?></h3>
                <?php print $field_documentation_rendered ?>
			</div>
		<?php endif; ?>
		<?php //Hide block if empty ?>
		<?php if( TRUE == $information): ?>
			<div id="node-information" class="box information">
				<h3 class="page-subtitle-content"><?php print t('Information'); ?></h3>
				<div class="odd nodes-row-first nodes-row-last clearfix">
					<dl class="colspans-2-5 push-1 last fields">
						<?php if (!empty($node->field_email['0']['view'])): ?>
							<dt class="field field-email-term"><?php print t('Email contact'); ?>:</dt>
							<dd class="field field-email-description"><?php print isa_toolbox_protect_email($node->field_email['0']['view']); ?></dd>
						<?php endif;?>
						<?php if (!empty($node->field_city['0']['view'])): ?>
							<dt class="field field-city-term"><?php print t('City/Location'); ?>:</dt>
							<dd class="field field-city-description"><?php print $node->field_city['0']['view'] ?></dd>
						<?php endif;?>
						<?php if ($node->field_source_url['0']['view']): ?>
							<dt class="field field-source-url-term"><?php print t('Source'); ?>:</dt>
							<dd class="field field-source-url-description"><?php print $node->field_source_url['0']['view']; ?></dd>
						<?php endif;?>
						<?php if ($taxonomy_terms && !empty ($taxonomy_terms)):?>
						  <?php foreach ($taxonomy_terms as $vocab => $terms): ?>
						    <?php if ($terms): ?>
						  	  	<dt class="field field-taxonomy-<?php print strtolower($vocab); ?>-term"><?php print t($vocab); ?>:</dt>
								<dd class="field field-taxonomy-<?php print strtolower($vocab); ?>-description"><?php print $terms; ?></dd>
							<?php endif; ?>
						  <?php endforeach; ?>
						<?php endif; ?>
					</dl>
				</div>
			</div>
		<?php endif; ?>
		<?php if (!empty($node->comment_count)): ?>
			<h3 class="page-subtitle-content"><?php print t('Comments'); ?></h3>
		<?php endif;?>
	</div>
</div>
