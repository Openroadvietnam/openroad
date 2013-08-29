<?php // $Id: block.tpl.php,v 0.1 2010/01/19 15:44:36 sebastien.millart Exp $ 

/**
 * @defgroup block
 * @ingroup templates
 * 
 * @file
 * Default theme implementation for blocks.
 * @ingroup block
 */
//print_R($block);
?>

<!-- BEGIN of the Template: block.tpl.php

	Title:		<?php ($block -> subject) ? print $block -> subject : print '(no title)'; ?>,
	Module:		<?php print $block -> module; ?>,
	Delta:		<?php print $block -> delta; ?>,
	Region:		<?php print $block -> region; ?>,
	Block ID:	<?php print $block_id; ?>.
		
-->
<?php 
if (!empty($block -> subject)){
	$block -> subject = isa_toolbox_parse_titles($block -> subject);
}
?>
<div id="block-<?php print $block -> module .'-'. $block -> delta; ?>" class="block relevant-content clearfix">
 	<?php if (!empty($block -> subject)): ?>
		<?php echo $block -> subject ?>
	<?php endif;?>
	<div class="content">
		<?php print $block -> content; ?>
	</div>
</div>



