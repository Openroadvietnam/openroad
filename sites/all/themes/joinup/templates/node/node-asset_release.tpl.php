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
 * @see _joinup_preprocess_asset_release()
 * @ingroup nodes
 */

global $base_url;
?>
<div id="node-<?php print $node->nid; ?>" class="node<?php
if ($sticky) {
print ' sticky';
}
if (!$status) {
print t(' node-unpublished');
}
?> node-type-<?php print $node->type; ?> clear-block">
  <div class="node-content">
    <?php if ($page): ?>
      <?php if ($flags_view): ?>
      <div class="field field-flags-view"><?php print $flags_view; ?></div>
      <?php endif; ?>
      <?php 
			//https://webgate.ec.europa.eu/CITnet/jira/browse/ISAICP-806
			//Deleted Created by and date 
		?>
      <div class="field field-vote-rating"><?php print $vote_rating; ?></div>
      <div class="field field-i-use-this-project"><?php print $i_use_this_asset; ?></div>

      <div class="field field-content-body">
        <h3 class="page-subtitle-content"><?php print t('Description'); ?></h3>
        <div class='field-item'><?php print $description; ?></div>
      </div>


      <?php if (isset($distributions)): ?>
	    <?php 
			//https://webgate.ec.europa.eu/CITnet/jira/browse/ISAICP-757
			//Add a title 'Files': It could be made clearer that this table contains information about the distribution linked to the asset by adding the title "Distributions" 
		?>
		<div class="field field-content-body">
       <h3  class="page-subtitle-content download-link"><a name="download-links"><?php print t('Distributions'); ?></a></h3>
      </div>
			<?php 
			//https://webgate.ec.europa.eu/CITnet/jira/browse/ISAICP-757
			//Remove the column 'Size': in the 3-column table with the list of SemanticAssetDistributions, we will not often have information on the file size. This column can be removed.
			//Replace 'Name' by 'Download file' in the table header: In the 3-column table with the list of SemanticAssetDistributions, it is not clear where to download the file. Therefore, the column header should read 'Download file'.
			?>
      <table>
        <tr>			
          <th><?php print t('Download file'); ?></th>        
          <th><?php print t('Description'); ?></th>
        </tr>
        <?php foreach ($distributions as $distribution): ?>
        <tr>
          <td><?php print $distribution['link']; ?></td>      
          <td><?php print "{$distribution['description']} {$distribution['linkd']}"; ?></td>
        </tr>
        <?php endforeach; ?>
      </table>
      <?php endif; ?>
			<?php 
			//https://webgate.ec.europa.eu/CITnet/jira/browse/ISAICP-757
			//Replace 'Know more' by 'Additional Information': The title of the fold/unfold section with 'Know more' should now read 'Additional Information'.			
			?>
      <div>
        <h4 class="togglable"><?php print t('Additional Information') .
        '<img class="collapsed" src="' . $base_url . '/' . path_to_theme(). '/images/forms/fieldset/menu-collapsed-blue.png"
          alt="Know more information" title="Know more information"/>
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
      <?php if (isset($disclaimer)): ?>
      <div class="form-item"><div class="description"><?php print $disclaimer?></div></div>
      <?php endif; ?>

    <?php else:
   /** ----------- TEASER ---------------*/?>
      <div class="odd nodes-row-first nodes-row-last clearfix">
        <dl class="align-left">
          <dt class="field field-title-term"><?php print t('Title'); ?>:</dt>
          <dd class="field field-title-description"><?php print $title; ?></dd>
          <?php if (!empty($field_id_uri_rendered)): ?>
            <dt class="field field-uri-term"><?php print t('ID (URI)'); ?>:</dt>
            <dd class="field field-uri-description"><?php print $field_id_uri_rendered; ?></dd>
          <?php endif; ?>
          <?php if (!empty($repository_origin)): ?>
            <dt class="field field-origin-term"> <?php print $repository_origin['label']; ?></dt>
            <dd class="field field-origin-description"> <?php print $repository_origin['value']; ?> </dd>
          <?php endif; ?>
          <?php if (!empty($field_asset_distribution_rendered)): ?>
            <dt class="field field-distribution-term"> <?php print t('Distribution'); ?></dt>
            <dd class="field field-distribution-description"> <?php print $field_asset_distribution_rendered ?> </dd>
          <?php endif; ?>
        </dl>
      </div>
    <?php endif; ?>

  </div>
</div>