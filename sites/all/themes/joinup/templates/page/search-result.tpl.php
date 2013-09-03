<?php
// $Id: search-result.tpl.php,v 1.1.2.1 2008/08/28 08:21:44 dries Exp $

/**
 * @file search-result.tpl.php
 * Default theme implementation for displaying a single search result.
 *
 * This template renders a single search result and is collected into
 * search-results.tpl.php. This and the parent template are
 * dependent to one another sharing the markup for definition lists.
 *
 * Available variables:
 * - $url: URL of the result.
 * - $title: Title of the result.
 * - $snippet: A small preview of the result. Does not apply to user searches.
 * - $info: String of all the meta information ready for print. Does not apply
 *   to user searches.
 * - $info_split: Contains same data as $info, split into a keyed array.
 * - $type: The type of search, e.g., "node" or "user".
 * - $result: Contains the search result
 *
 * Default keys within $info_split:
 * - $info_split['type']: Node type.
 * - $info_split['user']: Author of the node linked to users profile. Depends
 *   on permission.
 * - $info_split['date']: Last update of the node. Short formatted.
 * - $info_split['comment']: Number of comments output as "% comments", %
 *   being the count. Depends on comment.module.
 * - $info_split['upload']: Number of attachments output as "% attachments", %
 *   being the count. Depends on upload.module.
 *   
 *
 * Since $info_split is keyed, a direct print of the item is possible.
 * This array does not apply to user searches so it is recommended to check
 * for their existance before printing. The default keys of 'type', 'user' and
 * 'date' always exist for node searches. Modules may provide other data.
 *
 *   <?php if (isset($info_split['comment'])) : ?>
 *     <span class="info-comment">
 *       <?php print $info_split['comment']; ?>
 *     </span>
 *   <?php endif; ?>
 *
 * To check for all available data within $info_split, use the code below.
 *
 *   <?php print '<pre>'. check_plain(print_r($info_split, 1)) .'</pre>'; ?>
 *
 * @see template_preprocess_search_result()
 */
  /*
  kudos<?php echo $node->is_kudos;?><br>
  project_downloads<?php echo $node->is_project_download;?><br>
  hits<?php echo $node->is_page_hits;?><br>
  asset_project<?php echo $node->bs_asset_project;?><br>
  software_project<?php echo $node->bs_software_project;?><br>
  */
isset($node->ss_wellcome_software) ? $wellcome_url = $node->ss_wellcome_software : FALSE;
isset($node->ss_wellcome_community) ? $wellcome_url = $node->ss_wellcome_community : FALSE;
isset($node->ss_wellcome_asset) ? $wellcome_url = $node->ss_wellcome_asset : FALSE; 
//https://webgate.ec.europa.eu/CITnet/jira/browse/ISAICP-797
//Show download number if it's equal to 0
if(is_numeric($node->is_project_download)){
  $downloads = $node->is_project_download;
}else{
  is_numeric($node->is_node_downloads) ? $downloads = $node->is_node_downloads : FALSE;
}
$full_title = "";
$full_description = "";
if(!isset($node->is_rating) && !isset($node->is_editor) ) {
	$full_title = "full";
}	

if(!isset($node->is_project_download) && !isset($node->download) && (!isset($node->kudos) or 'search' == arg(0))) {
	$full_description = "full";
}
$date = new DateTime($node->ds_sort_date);
$date = $date->format("d F Y" );
switch ($node->type) {
  case 'blog':
  case 'news':
       $update_message = t('Published');
    break;
  case 'event':
       $update_message = t('Event date');
    break;
  default:
		//ISAICP-995
		//Wrong label for dates in the newsletter archive page
       $update_message = t('Published');
    break;
}
?>
<div class="search-result"> 
  <div class="detail-data-search-solr <?php print $full_title; ?>">
		<div class="title">
		  <?php if($wellcome_url): ?>
			 <?php echo  l($node->title,  $wellcome_url) ?>
		  <?php else: ?>
			 <a href="<?php print $url; ?>"><?php print $title; ?></a>
		  <?php endif; ?>
		</div>
	</div>
	
	<?php if(isset($node->is_rating)): ?>
    <div class="detail-data-search-solr-stars">
	  <?php echo theme('fivestar_static', $node->is_rating);?>
    </div>
  <?php endif ?>
  <?php if(isset($node->is_editor)): ?>
    <div class="detail-data-search-solr-editor">    
		  <img src="<?php echo base_path() . drupal_get_path('theme', 'joinup') . "/images/links/editors-choice.png"; ?>" alt="<?php echo t('Editor´s choice'); ?>" title="<?php echo t('Editor´s choice'); ?>" />
    </div>
  <?php endif ?>
  
	<div class="detail-data-search-solr <?php print $full_description; ?>">
    <?php if ($node) : ?>	  
  	  <?php if ($node && $node->ss_picture)  : ?>
  		  <div class="colspan-2">
  		  <?php print $node->ss_picture; ?>
  		  </div>
  	  <?php endif; ?>
      <?php 
        //https://webgate.ec.europa.eu/CITnet/jira/browse/ISAICP-857
        //Show filtered solr result body
      ?>
      <p class="search-body"><?php echo $node->body ?></p>      	  
    <?php endif; ?>
  </div>  
  <?php 
        //https://webgate.ec.europa.eu/CITnet/jira/browse/ISAICP-797
        //Show download number only if there is any download available
		
		//https://webgate.ec.europa.eu/CITnet/jira/browse/ISAICP-960
		//The default sort of asset releases in catalogue/all not 'by number of downloads' but by 'date' 
   ?>
  <?php if(is_numeric($downloads) and $node->download and $downloads > 0): ?>
    <div class="detail-data-search-solr-downloads">    
    <?php print  "<strong>" . $downloads . "</strong> " . t('downloads') ?>
    </div>
  <?php endif ?>
  <?php if(isset($node->download)): ?>
    <div class="detail-data-search-solr-down">    
    <?php print $node->download ?>
    </div>
  <?php endif ?>
  <?php if(isset($node->hits) and 1 == 2): ?>
    <div class="detail-data-search-solr-views">    
	  <?php print $node->hits . " " . t('views')?>
    </div>
  <?php endif ?>
  <?php if(isset($node->kudos) and 'search' != arg(0)): ?>
    <div class="detail-data-search-solr-kudos">    
    <?php print $node->kudos . " " .t('kudos') ?>
    </div>
  <?php endif ?>   
  <p class="search-node-submission <?php echo str_replace("_", "-" , $node->type) ?>-icon">
	<?php echo node_get_types('name', $node->type) ?>  
  <?php 
    echo  " | ". t('Created by') . " " . $node->username." | ".  $update_message  . ": " . $date; ?>
  </p>

</div>
