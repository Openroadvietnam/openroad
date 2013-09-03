<?php
// $Id: node.tpl.php,v 1.4.2.1 2009/08/10 10:48:33 goba Exp $

/**
 * @defgroup nodes
 * @ingroup templates
 *
 * @file
 *
 * Default theme implementation for node.
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
 * @see _joinup_preprocess_repository()
 * @ingroup nodes
 */
global $base_url;
?>
<div id="node-<?php print $node->nid; ?>" class="node<?php
if ($sticky) {
  print ' sticky';
}
?><?php
if (!$status) {
  print ' node-unpublished';
}
?> node-type-<?php print $node->type; ?> clear-block">
	<div class="node-content">	
	<div class="field field-repository-picture"><?php print $picture; ?></div>
	<div class="detail-options clearfix">
		<div class="field field-title"><h2><?php print $title ?></h2></div>
		<?php if ($flags_view): ?>
			<div class="field field-flags-view"><?php print $flags_view; ?></div>
		<?php endif; ?>
      <div class="field field-submitted"><?php print $submitted; ?></div>
      <div class="field field-vote-rating"><?php print $vote_rating; ?></div>
	</div>
      <div class="field field-repository-content field-content-body">
        <h3 class="page-subtitle-content"><?php print t('Description'); ?></h3>
        <div class='field-item'><?php print $description; ?></div>
      </div>

	<br class="clear" />
      <div><?php
		//https://webgate.ec.europa.eu/CITnet/jira/browse/ISAICP-793
		//Change 'Know More' label 'Additional information'
	  ?>
        <h4 class="togglable"><?php print t('Additional information') .
        '<img class="collapsed" src="' . $base_url . '/' . path_to_theme(). '/images/forms/fieldset/menu-collapsed-blue.png"
          alt="Additional information" title="Additional information"/>
        <img class="expanded" src="' . $base_url . '/' . path_to_theme(). '/images/forms/fieldset/menu-expanded-blue.png"
          alt="Hide more information" title="Hide more information"/>' ; ?></h4>
        <div class="toggle-wrapper" style="display:none;">
          <?php foreach ($fields as $field): ?>
            <div class="field box">
              <h5 style="display:inline;"><?php print t(${$field}['label']); ?>:</h5>
              <?php print ${$field}['value']; ?>
              <div id="<?php print $field; ?>" ></div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
	  <?php
		// https://webgate.ec.europa.eu/CITnet/jira/browse/ISAICP-909
		// User request - Federated repository page
		// The list of asset releases should be by default "unfolded". 
	  ?>
      <div class="toggable-asset-repository">
        <h4 class="togglable-expanded"><?php print t('Asset releases') .
        '<img class="collapsed" src="' . $base_url . '/' . path_to_theme(). '/images/forms/fieldset/menu-collapsed-blue.png"
          alt="Additional information" title="Additional information"/>
        <img class="expanded" src="' . $base_url . '/' . path_to_theme(). '/images/forms/fieldset/menu-expanded-blue.png"
          alt="Hide more information" title="Hide more information"/>' ; ?></h4>
          <div class="toggle-wrapper" style="display:block;">
			<?php
		// https://webgate.ec.europa.eu/CITnet/jira/browse/ISAICP-909
		// User request - Federated repository page
		// 2. We should also add a button with direct link to the facetted search from the repository page
		$params = array(
                    'query' => array(
                                'retain-filters' 		=> 1,
                                'hidden_type' 			=> 1,
								'filters'				=> 'sm_facetbuilder_facet_node_type:"facet_node_type:facet_24" is_repository_origin:'.$node->nid,
                            ),
                    'attributes' => array('id' => 'advanced_search_link')
                );
		$default = '';
		?>
	  
	  <div id="advanced-search-repository" class="form-item">
		<?php print l(t('Explore this repository'),'search/apachesolr_search/' . $default, $params);?>
	  </div>

			<?php print views_embed_view('asset_release', 'block_1', $node->nid); ?>
          </div>
      </div>
  </div>
</div>