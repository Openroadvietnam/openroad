<?php
// $Id: views-view.tpl.php,v 1.13.2.2 2010/03/25 20:25:28 merlinofchaos Exp $
/**
 * @file views-view.tpl.php
 * Main view template
 *
 * Variables available:
 * - $classes_array: An array of classes determined in
 *   template_preprocess_views_view(). Default classes are:
 *     .view
 *     .view-[css_name]
 *     .view-id-[view_name]
 *     .view-display-id-[display_name]
 *     .view-dom-id-[dom_id]
 * - $classes: A string version of $classes_array for use in the class attribute
 * - $css_name: A css-safe version of the view name.
 * - $css_class: The user-specified classes names, if any
 * - $header: The view header
 * - $footer: The view footer
 * - $rows: The results of the view query, if any
 * - $empty: The empty text to display if the view is empty
 * - $pager: The pager next/prev links to display, if any
 * - $exposed: Exposed widget form/info to display
 * - $feed_icon: Feed icon to display, if any
 * - $more: A link to view more, if any
 * - $admin_links: A rendered list of administrative links
 * - $admin_links_raw: A list of administrative links suitable for theme('links')
 *
 * @ingroup views_templates
 */
foreach ($view->result as $key => $value){
  switch ($value->node_type) {
    case 'blog':
    case 'news':
        $view->result[$key]->update_message = t('Published');
        $view->result[$key]->date = date("d F Y", $value->node_changed);
      break;
    case 'event':
        $view->result[$key]->update_message= t('Event date');
        $date = new DateTime($value->node_data_field_event_dates_field_event_dates_value);
        $view->result[$key]->date = $date->format("d F Y" );
        $value->img = $value->node_data_field_event_dates_field_event_logo_fid;
      break;
    case 'community':
        $value->img = $value->node_data_field_community_logo_field_community_logo_fid;
      break;
    default:
    case 'federated_forge':
        $value->img = $value->node_data_field_forges_logo_field_forges_logo_fid;
      break;
    case 'federated_project':
    case 'project_project':
        $value->img = $value->node_data_field_project_soft_logo_field_project_soft_logo_fid;
      break;
    default:
        $view->result[$key]->update_message = t('Last update');
        $view->result[$key]->date = date("d F Y", $value->node_created);
      break;
  }
}
?>
<div class="<?php print $classes; ?>">
  <?php if ($admin_links): ?>
    <div class="views-admin-links views-hide">
      <?php print $admin_links; ?>
    </div>
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
    <div class="search-results apachesolr_search-results">
      <?php foreach ($view->result as $key => $value): ?>
      <?php //print_R($value) ?>
        <div class="search-result"> 
          <div class="detail-data-search-solr <?php print $full_title; ?>">
            <div class="title">
              <?php if($value->node_title): ?>
               <?php echo  l($value->node_title,  'node/' . $value->nid) ?>
              <?php endif ?>
            </div>
          </div>
          <div class="detail-data-search-solr-stars">
            <?php echo theme('fivestar_static', $value->votingapi_cache_node_percent_vote_average_value);?>
          </div>
        
        <div class="detail-data-search-solr full">
          <?php if ("" != $img[$key] = joinup_render_recommended_img($value->img,$node_type,$nid))  : ?>
            <div class="colspan-2">
              <?php print  $img[$key] ?>
            </div>
          <?php endif; ?>
          <p class="search-body"><?php echo truncate_utf8(strip_tags($value->node_revisions_teaser),200) ?></p>     
        </div>  

       <p class="search-node-submission <?php echo str_replace("_", "-" , $value->node_type) ?>-icon">
        <?php echo node_get_types('name', $value->node_type) ?>  
        <?php 
          echo  " | ". t('Created by') . " " . l($value->users_name, 'people/' . $value->users_uid)." | ".  $value->update_message  . ": " . $value->date; ?>
        </p>
      </div>
       <?php endforeach; ?>
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

  <?php if ($more): ?>
    <?php print $more; ?>
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

</div> <?php /* class view */ ?>


