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
 * 
 *  @ingroup nodes
 */
?>
<div id="node-<?php print $node->nid; ?>" class="node<?php if ($sticky) { print ' sticky'; } ?><?php if (!$status) { print ' node-unpublished'; } ?> node-type-<?php print $node->type; ?> clear-block">
	<div class="node-content">  
	<?php
		if ( 1 == $node->field_show_title[0][value] ) {	?>
		<div class="advertising-title">  	
			<h3>
			<?php print $node->field_top_title[0][value]; ?>
			
			</h3>
		</div>
		<?php 
		}
		?>
			<div class="views-field-field-image-fid">
			<?php if ($node->field_advertisement_url[0]['url']) { ?>
				<a href="<?php print $node->field_advertisement_url[0]['url']; ?>" target="_blank">
				<?php print $node->field_image[0]['view'];
				?></a>
			<?php
			}else {
				print $node->field_image[0]['view'] ;
			}?>	
			</div>  
				<div class="views-field-title">
				<h4>
				<?php print $node->title;	?>	</h4>  
			</div>			           
			<?php
					if ($node->content['body']['#value']) {
					?>
			<div class="views-field-body">
					<?php                                                                              
					   $title_lenght = strlen($node->title);
					   if($title_lenght < 25){//One line title
									  $body_lenght = 178;
					   }else{
							  if($title_lenght < 50){//Two lines title
											 $body_lenght = 145;
							  }else{//Three lines title
											 $body_lenght = 110;
							  }
					   }
					   $alter = array( 'max_length' => $body_lenght,
								  'html' => TRUE,
								  'ellipsis' => TRUE
							   );
					   print views_trim_text($alter, $node->content['body']['#value']);
								   ?>
					</div>
								   <?php                                 
					}                                           
			?>                                        

	    <?php if($node->field_advertisement_url[0]['view'] ): ?>
		<div class="node-advertising-url"><a href="<?php print $node->field_advertisement_url[0]['url']; ?>" target="_blank">
		<?php
			print t('Read more');
		?>
		</a>
		</div>		
            <?php endif; ?>
	                
	</div>
</div>