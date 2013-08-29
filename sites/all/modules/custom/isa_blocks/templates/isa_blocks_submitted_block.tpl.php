<?php
/**
 * @file isa_blocks_submitted_block.tpl.php
 * Template for the custom solr sort toolbox
 *
 *  Available variables:
 *      .- $submit_user: user data, incluiding the node profile
 *      .- $roles: user roles in this group
 */
?>
<div class="submitted-og-block">
	<div class="submitted-og-block-title"><h3><?php print t('Submitted by') ?></h3></div>
    <div class="submitted-og-block-body">
       <div class="submitted-og-block-img"><?php echo $submit_user->picture ?></div>
       <div class="submitted-og-block-name"><?php echo l($submit_user->node_profile->field_firstname[0]['value'] . " " . $submit_user->node_profile->field_lastname[0]['value'], 'user/' . $submit_user->uid) ?></div>
       <div class="submitted-og-block-roles"><?php array_walk($roles, function($val){ echo $val . " "; })?></div>
    </div>
</div>