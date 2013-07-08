<?php
// $Id: views-view--block.tpl.php,v 0.00.0.1 2011/02/02 sebastien.millart Exp $
/**
 * @file
 * Main view template
 * @ingroup views
 */
?>

<div class="<?php print $classes; ?>">
	<?php if ($admin_links): ?>
		<div class="views-admin-links views-hide">
			<?php print $admin_links; ?>
		</div>
	<?php endif; ?>
	<?php if ($more): ?>
		<?php print $more; ?>
	<?php endif; ?>
	<?php if ($header): ?>
		<div class="view-header">
			<?php print $header; ?>
		</div>
	<?php endif; ?>
	<?php if ($exposed): ?>
		<div class="view-filters">
			<?php print $exposed; ?>
		</div>
	<?php endif; ?>
	<?php if ($attachment_before): ?>
		<div class="attachment attachment-before">
			<?php print $attachment_before; ?>
		</div>
	<?php endif; ?>
	<?php if ($rows): ?>
		<div class="view-content">
                        <?php
                        //https://webgate.ec.europa.eu/CITnet/jira/browse/ISAICP-841
                        //Show text Top Title in Advertisment/Poll home block
                        ?>
                        <?php if(1 ==$view->result[0]->node_data_field_advertisement_url_field_show_title_value and  $view->result[0]->node_data_field_advertisement_url_field_top_title_value ): ?>
                            <div class="advertising-title"><h3><?php  echo $view->result[0]->node_data_field_advertisement_url_field_top_title_value  ?></h3></div>
                        <?php endif; ?>
			<?php print $rows; ?>
		</div>
	<?php elseif ($empty): ?>
		<div class="view-empty">
			<?php print $empty; ?>
		</div>
	<?php endif; ?>
	<?php if ($pager): ?>
		<?php print $pager; ?>
	<?php endif; ?>
	<?php if ($attachment_after): ?>
		<div class="attachment attachment-after">
			<?php print $attachment_after; ?>
		</div>
	<?php endif; ?>
	<?php if ($footer): ?>
		<div class="view-footer">
			<?php print $footer; ?>
		</div>
	<?php endif; ?>
	<?php if ($feed_icon): ?>
		<div class="feed-icon">
			<?php print $feed_icon; ?>
		</div>
	<?php endif; ?>
</div>
<?php /* class view */ ?>
