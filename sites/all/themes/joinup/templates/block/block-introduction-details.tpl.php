<?php
// $Id: block-introduction-details.tpl.php
/**
 * @file block-introduction-details.tpl.php
 *
 * Theme implementation to display introduction details.
 *
 * Available variables:
 * $node->title       : General title
 * $node->picture     : Default picture
 * $node->description : General description
 * $node->rating      : Fire Stars rating
 * $node->taxonomy_terms : Taxonomies
 * $node->group_status   : Group status (moderated or public)
 * $node->user_status    : User status (is a member or not)
 *
 * @see hook_block_introduction_details()
 * @ingroup block
 * 
 */
//print_R($node);
$flags = flag_get_counts('node', $node->nid);
?>
<div id="introduction" class="details clearfix">
	<?php
		//https://webgate.ec.europa.eu/CITnet/jira/browse/ISAICP-841
		//Remove image from header message
	?>
    <div id="introduction-fields" class="clearfix">               
        <div id="introduction-title" class="clearfix">		
			<?php if (file_exists($node->field_project_soft_logo[0]['filepath'])) {
				echo theme_imagecache('community_logo', $node->field_project_soft_logo[0]['filepath'], $node->title);			
				$class = 'detail-options';
			} else {	
				//Show community logo
				if (file_exists($node->field_community_logo[0]['filepath'])) {
					echo theme_imagecache('community_logo', $node->field_community_logo[0]['filepath'], $node->title);			
					$class = 'detail-options';
				}else{				
					$class = 'detail-options full';
				}
			}?>
			<div class="<?php echo $class?>">
				<h2 class="page-title"><?php print $node->title; ?></h2>
				<?php				
					if ($node->highlights_description) {?>
						<div class="page-subtitle"><?php print $node->highlights_description; ?></div>
					<?}
				?>
				<div class="detail-options-title">
					<div class="detail-options-title-left">
						<?php $block = module_invoke('isa_links', 'block', 'view', 'download_button'); echo $block['content'];?>						
							<?php if ($node->rating): ?>
								<div class="bracket">(</div>
								<div class="field field-rating"><?php echo $node->rating;?></div>	
								<div class="bracket">)</div>								
							<?php endif; ?>						
					</div>				
					<?php if (isset($flags['editor_choice']) and $flags['editor_choice'] == 1 ): ?>
					  <div class="detail-data-choice-editor"><?php echo t("Editor's choice"); ?></div>
					<?php endif; ?>
					  <?php if (isset($node->user_status)): ?>
					<div class="clearboth field <?php print $node->user_status['css_class']?>" title="<?php print $node->user_status['value']; ?>"><strong><?php print $node->user_status['value']; ?></strong></div>
					<?php endif; ?>
				</div>
			</div>
        </div>
        <div class="fields fields-details-after-rating">	
          <?php if (isset($node->taxonomy_terms)): ?>
              <?php foreach($node->taxonomy_terms as $vocab => $terms): ?>
                  <?php if ($terms): ?>
                      <div class="field field-taxonomy">
                          <p><label><?php print ucfirst(t($vocab)); ?>:</label>&nbsp;<?php print $terms; ?></p>
                      </div>
                  <?php endif; ?>
              <?php endforeach; ?>
          <?php endif; ?>
      </div>
    </div>
</div>