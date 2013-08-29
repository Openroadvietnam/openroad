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

<script type="text/javascript">
<!--//--><![CDATA[//><!--
function showResult(){
    if(document.getElementById('advpoll-results')) {
		document.getElementById('advpoll-results').style.display = 'block';
		document.getElementById('advpoll-available-choices').style.display = 'none';
	}    
}
function showPoll(){
    if(document.getElementById('advpoll-available-choices')) {
		document.getElementById('advpoll-results').style.display = 'none';
		document.getElementById('advpoll-available-choices').style.display = 'block';
	}    
}
jQuery(document).ready(function(){
	//https://webgate.ec.europa.eu/CITnet/jira/browse/ISAICP-844
	//Override polls ajax behaviour to add progress git and show thank you message
	//Remove "see results" link  after an ajax vote
	var changePollAjax = function(){
		var attachAjaxSend = function() {
		  jQuery("form.advpoll-vote").each(function() {
		    var thisForm = this;
		    var options = {
		      dataType: "json",
		      success: function(data) {
		        // Remove previous messages
		        jQuery("div.messages").remove(); 
		        
				jQuery('#poll-loading').remove();
		        // Insert response
		        if (data.errors) {
		          jQuery(data.errors).insertBefore(thisForm).fadeIn();
		        }
		        else {
		          jQuery(thisForm).hide();
		          jQuery(data.statusMsgs).insertBefore(thisForm).fadeIn();
		          jQuery(data.response).insertBefore(thisForm);
				  jQuery('#advpoll-thankyou').css('display','block');//Show thank you text
				  jQuery('#advpoll-available-choices .node-advertising-url').remove();//Remove "See results"
		        }

		        // Re-enable the Vote button, in case there was an error message.
		        jQuery(".form-submit", thisForm).removeAttr("disabled");

		      },
		      beforeSubmit: function() {
		        //Add ajax gif to load process
				jQuery('#advpoll-voting-binary-form-0').find('.poll').append('<img id="poll-loading" src="<?php echo base_path() . path_to_theme() . "/images/ajax-loader.gif"?>">')
		        // Disable the Vote button.
		        jQuery(".form-submit", thisForm).attr("disabled", "disabled");
		      }
		    };
		    // Tell the server we are passing the form values with ajax and attach the function
		    jQuery("input.ajax", thisForm).val(true);
		    jQuery(this).ajaxForm(options);
		  });
		};
		jQuery("form.advpoll-vote").unbind();
		attachAjaxSend()
	}	
	changePollAjax();
})
//--><!]]>
</script>
<?php	
	$start_date = $node->start_date;
    $end_date = $node->end_date;
	$active = TRUE;
	
    // Check if poll is closed.
    if (!$node->active) {
        $active = FALSE;
        $status = 'closed';
    }

    if ($active && $start_date > 0) {
        // Check that start date is in the past.
        if (!$active = time() >= $start_date) {
			$active = FALSE;
            $status = 'pending';
        }
    }

    if ($active && ($end_date > 0)) {
        // Check that end date is in the future.
        if (!$active = time() < $end_date) {
			$active = FALSE;
            $status = 'passed';
        }
    }    
?>
<div id="node-<?php print $node->nid; ?>" class="node<?php if ($sticky) { print ' sticky'; } ?><?php if (!$status) { print ' node-unpublished'; } ?> clear-block">

<div class="node-content">  
	<?php
	if ( 1 == $node->field_show_title[0]['value'] ) {	?>
		<div class="advertising-title poll-title">  	
			<h3><?php print $node->field_top_title[0]['value']; ?></h3>
		</div>
		<?php 	
	} 
	if (!$active && $node->voted) {
		$class_box = "poll-box poll-voted";
	} else {
		$class_box = "poll-box";
	}	
	?> 
		
	<div class="<?php print $class_box; ?>">
		<div class="views-field-title"><h4><?php print $node->title ?></h4></div>
		<p><?php print $node->field_question[0]['value'] ?></p>
		
		<p id="advpoll-thankyou" style="display:none;"><strong><?php print t('Thank you for voting.');?></strong></p>
		<?php
		/*
		<?php ($node->voted)?print 'block;' : print 'none;'?>
		if($node->voted) { ?>
		<p><strong>
			<?php print t('Thank you for voting.');?></strong>
		</p>
		<?php } else*/
		if (!$active) {?>
		<p><strong>
			<?php print t('Poll closed');?></strong>
		</p>
		<?php 
		}
		?>
				
		<div class="advpoll-results" id="advpoll-results" style="display:<?php (!$active)? print 'block;' : print 'none;' ?>">
		<?php 
		$poll = advpoll_view_results($node, NULL, NULL);
		print $poll;
		
		if(!$node->voted && $active) { ?>
		<div class="node-advertising-url poll-link-return">
			<a href="javascript:void();" onclick="showPoll();" title="<?php print t('Return to poll'); ?>"><?php print t('Return to poll'); ?></a>
		</div>
		<?php
		} ?>
		</div>
		<div class="advpoll-available-choices" id="advpoll-available-choices" style="display:<?php !$active? print 'none;' : print 'block;' ?>">		
			<div class="vote-choices">				  
			  <?php print $node->content['poll']['#value'] ?>
		   </div>			
			<?php print $form_submit ?>
	 
			<?php if(!$node->voted && $active) { ?>
			<div class="node-advertising-url">
				<a href="javascript:void();" onclick="showResult();"  title="<?php print t('See result'); ?>"><?php print t('See result'); ?> </a>
			</div>							
			<?php
			}
			?>
			 </div>
		</div>	
	</div>
</div>