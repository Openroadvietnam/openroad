<?php
// $Id: node.tpl.php,v 1.4.2.1 2009/08/10 10:48:33 goba Exp $

/**
* @file
*
* Theme implementation to display a node release.
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
 * @see _joinup_preprocess_project_release()
*  @ingroup nodes
*/
?>

<div id="node-<?php print $node->nid; ?>" class="node<?php if ($sticky) { print ' sticky'; } ?><?php if (!$status) { print ' node-unpublished'; } ?> node-type-<?php print $node->type; ?> clear-block">
	<div class="node-content">
		<?php if ($page): ?>
			<div class="field field-submitted"><?php print $submitted; ?></div>
			<div class="field field-vote-rating"><?php print $vote_rating; ?></div>
			<div class="field field-title">
				<h2><?php print $title; ?></h2>
			</div>
		<?php else: ?>
			<h3 class="project-release"><?php print l($title, $node->path); ?></h3>
			<div class="field field-submitted"><?php print $submitted; ?></div>
		<?php endif; ?>
        <?php print $field_release_component_rendered; ?>
		<div class="field field-project-release-files">
			<?php 
				//https://webgate.ec.europa.eu/CITnet/jira/browse/ISAICP-974
                //Link to the distribution section 
			?>
			<h3  class="page-subtitle-content download-link"><a name="download-links"><?php print t('Distributions'); ?></a></h3>
			<?php print views_embed_view('project_release_files', 'block_1', $node->nid); ?>
		</div>
		<div class="field field-content-body"><?php print $node->content['body']['#value']; ?></div>
		<?php if ($page) : ?>
			<?php if (isset($documents)) : ?>
				<div class="field field-documentation">
					<h3><?php print t('Documentation'); ?></h3>
					<ul>
						<?php foreach ($documents as $key => $value): ?>
							<?php if ($value): ?>
								<li><?php print $value; ?></li>
							<?php endif; ?>
						<?php endforeach; ?>
					</ul>
				</div>
			<?php endif; ?>
                
                        <?php ?>
                <?php if ($taxonomy_terms && !empty ($taxonomy_terms)):?>
                  <div id="node-information" class="box information">
                    <h3 class="page-subtitle-content"><?php print t('Information'); ?></h3>
                      <div class="odd nodes-row-first nodes-row-last clearfix">
                        <dl class="colspans-2-5 push-1 last fields">
                            <?php foreach ($taxonomy_terms as $vocab => $terms): ?>
                              <?php if ($terms): ?>
                                          <dt class="field field-taxonomy-<?php print strtolower($vocab); ?>-term"><?php print t($vocab); ?>:</dt>
                                          <dd class="field field-taxonomy-<?php print strtolower($vocab); ?>-description"><?php print $terms; ?></dd>
                                  <?php endif; ?>
                            <?php endforeach; ?>
                        </dl>
                      </div>
                  </div>
                <?php endif; ?>
		<?php endif; ?>
	</div>
</div>

