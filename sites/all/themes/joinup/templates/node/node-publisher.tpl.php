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
    <?php if ($page): ?>
      <?php if ($flags_view): ?>
      <div class="field field-flags-view"><?php print $flags_view; ?></div>
      <?php endif; ?>
      <div class="field field-submitted"><?php print $submitted; ?></div>
      <div class="field field-vote-rating"><?php print $vote_rating; ?></div>

      <div>
        <?php foreach ($fields as $field): ?>
          <div class="field box">
            <h5 style="display:inline;"><?php print t(${$field}['label']); ?>:</h5>
            <?php print ${$field}['value']; ?>
            <div id="<?php print $field; ?>" ></div>
          </div>
        <?php endforeach; ?>
      </div>
    <?php else:
   /** ----------- TEASER ---------------*/?>
      <div class="odd nodes-row-first nodes-row-last clearfix">
        <dl class="align-left">
          <dt class="field field-name-term"><?php print t('Name'); ?>:</dt>
          <dd class="field field-name-description"><?php print $title_link; ?></dd>
          <dt class="field field-uri-term"><?php print t('ID (URI)'); ?>:</dt>
          <dd class="field field-uri-description"><?php print $field_id_uri_rendered; ?></dd>
          <?php if ($taxonomy_terms && !empty($taxonomy_terms)): ?>
            <?php foreach ($taxonomy_terms as $vocab => $terms): ?>
              <?php if ($terms): ?>
                <dt class="field field-taxonomy-<?php print strtolower($vocab); ?>-term"><?php print t($vocab); ?>:</dt>
                <dd class="field field-taxonomy-<?php print strtolower($vocab); ?>-description"><?php print $terms; ?></dd>
              <?php endif; ?>
            <?php endforeach; ?>
          <?php endif; ?>
        </dl>
      </div>
    <?php endif; ?>

  </div>
</div>