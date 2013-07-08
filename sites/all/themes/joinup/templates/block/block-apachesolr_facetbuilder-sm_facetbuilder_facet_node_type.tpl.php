<?php // $Id: block.tpl.php,v 0.1 2010/01/19 15:44:36 sebastien.millart Exp $ 

/**
 * @defgroup block
 * @ingroup templates
 * 
 * @file
 * Facet of Apache Solr - Node type
 * @ingroup block
 */
?>

<!-- BEGIN of the Template: block-apachesolr_facetbuilder-sm_facetbuilder_facet_node_type.tpl.php

	Title:		<?php ($block -> subject) ? print $block -> subject : print '(no title)'; ?>,
	Module:		<?php print $block -> module; ?>,
	Delta:		<?php print $block -> delta; ?>,
	Region:		<?php print $block -> region; ?>,
	Block ID:	<?php print $block_id; ?>.
		
-->

<?php
	//https://webgate.ec.europa.eu/CITnet/jira/browse/ISAICP-726
	//Keep the node type facet collapsed**: We suggest not hiding the ‘node type’ facet when accessing the advanced search from the semantic asset main page on Joinup. The ‘node type’ should be displayed but collapsed and with the semantic asset release box already checked.
	if ($_GET['hidden_type'] == 1) {
			print '
		<script type="text/javascript">
			var cookieSt 		= $.cookie("collapsiblock");
			var cookieString 	= "{ ";
			var cookieParts 	= [];
			if (cookieSt) {
				var st = Drupal.parseJson(cookieSt);			
				$.each(st, function (id, setting) {
					if (id == "block-' .$block->module .'-'. $block->delta .'") {
						cookieParts[cookieParts.length] = \' "\' + id + \'": 0\';
					}
				});
			} else {
				var id = "block-' .$block->module .'-'. $block->delta .'";
				cookieParts[0] = \' "\' + id + \'": 0\';
			}
			
			cookieString += cookieParts.join(", ") + " }";
			$.cookie("collapsiblock", cookieString, {
			  path: Drupal.settings.basePath
			  });
			  
		</script>';
	}
?>


<div id="block-<?php print $block -> module .'-'. $block -> delta; ?>" class="block<?php if ($block_class): print ' ' . $block_class; endif; ?> clearfix">
	<?php if (!empty($block -> subject)): ?>
		<<?php print $heading_type; ?><?php if ($accessibility_class): print $accessibility_class; endif; ?>><?php print $block -> subject; ?></<?php print $heading_type; ?>>
	<?php endif;?>
	<div class="content">
		<?php print $block -> content; ?>
	</div>
</div>
<!-- END of the Template: block-apachesolr_facetbuilder-sm_facetbuilder_facet_node_type.tpl.php -->

