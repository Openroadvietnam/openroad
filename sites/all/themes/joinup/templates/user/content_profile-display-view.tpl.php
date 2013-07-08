<?php
// $Id: content_profile-display-view.tpl.php,v 1.1.2.2 2009/01/04 11:46:29 fago Exp $

/**
 * @file
 *
 * Theme implementation to display a content-profile.
 * 
 * @ingroup user
 */
?>

<div>
  <?php if (isset($tabs)) : ?>
    <ul class="tabs content-profile">
      <?php foreach ($tabs as $tab) : ?>
        <?php if ($tab): ?>
          <li><?php print $tab; ?></li>
        <?php endif; ?>
      <?php endforeach; ?>
    </ul>
  <?php endif; ?>
  <?php if (isset($node->nid) && isset($content)): ?>
    <?php print $content ?>
  <?php endif; ?>
</div>