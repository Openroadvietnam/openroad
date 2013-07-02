<?php
// $Id: anoymous_validation_page.tpl.php

/**
 * @file anoymous_validation_page.tpl.php
 *
 *
 * Available variables:
 * $vars['info_text_login'] : information to login for anonymous user when he want download release
 * $vars['login_link'] : link to login page
 * $vars['info_text_download'] : information about the anonymous download
 * $vars['file_link'] : the file link
 * $node->taxonomy_terms : Community taxonomies
 * $node->vfs : related virtual forges names
 * $node->user_status : Community push link(s)
 * $node->members_count : number of members
 * $node->rating : the fivestar form
 *
 * @see isa_private_files_anonymous_page()
 */
?>

<div class="anonymous-release-file clearfix">
  <div class ="field-text field-text-login">
    <?php
    print $vars['info_text_login'];
    ?>
  </div>
  <div class="field-login ">
  <?php
  print $vars['login_link'];
  ?>
</div>
<div class="field-text field-text-download">
  <?php
  print $vars['info_text_download'];
  ?>
</div>

<div class="field-link">
  <?php
  print $vars['file_link'];
  ?>
</div>
</div>