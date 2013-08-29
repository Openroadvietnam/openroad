<?php
/**
 * @file isa_blocks_submitted_block.tpl.php
 * Template for the custom solr sort toolbox
 *
 *  Available variables:
 *      .- $blocks: content to show
 */
?>
<div class="tabbed-blocks">
	<ul>
		<?php foreach ($blocks as $key => $value): ?>
			<li><a href="#tabbed-blocks-<?php echo ++$i ?>"><span class="<?php echo 1 == $i ? "first" : "no-first"?>"><?php echo $value['title'] ?></span></a></li>
		<?php endforeach; ?>
	</ul>
		<?php foreach ($blocks as $key => $value): ?>
			<div id="tabbed-blocks-<?php echo ++$x ?>">
				<?php echo $value['content'] ?>
			</div>
		<?php endforeach; ?>
</div>