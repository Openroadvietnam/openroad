<?php 

/**
 * @defgroup block
 * @ingroup templates
 * 
 * @file
 * Default theme implementation for blocks.
 * @ingroup block
 */
?>

<!-- BEGIN of the Template: block-isa_apachesolr.tpl.php

	Title:		<?php ($block -> subject) ? print $block -> subject : print $block -> title; ?>,
	Module:		<?php print $block -> module; ?>,
	Delta:		<?php print $block -> delta; ?>,
	Region:		<?php print $block -> region; ?>,
	Block ID:	<?php print $block_id; ?>.
	
-->

<div id="block-<?php print $block -> bid; ?>" class="block<?php if ($block_class): print ' ' . $block_class; endif; ?> clearfix">	
	<?php if (!empty($block -> subject) || !empty($block -> title) ): ?>
		<<?php print $heading_type; ?><?php if ($accessibility_class): print $accessibility_class; endif; ?>><?php ($block -> subject) ? print $block -> subject : print $block -> title; ?></<?php print $heading_type; ?>>
	<?php endif;?>
	<div class="content">
		<?php print $block -> content; ?>
	</div>
</div>

<!-- END of the Template: block-isa_apachesolr.tpl.php -->

