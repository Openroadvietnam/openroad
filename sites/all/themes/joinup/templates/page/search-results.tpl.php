<?php
// $Id: search-results.tpl.php,v 1.1 2007/10/31 18:06:38 dries Exp $

/**
 * @file search-results.tpl.php
 * Default theme implementation for displaying search results.
 *
 * This template collects each invocation of theme_search_result(). This and
 * the child template are dependant to one another sharing the markup for
 * definition lists.
 *
 * Note that modules may implement their own search type and theme function
 * completely bypassing this template.
 *
 * Available variables:
 * - $search_results: All results as it is rendered through
 *   search-result.tpl.php
 * - $type: The type of search, e.g., "node" or "user".
 *
 *
 * @see template_preprocess_search_results()
 */
global $pager_page_array, $pager_total_items;
$count = variable_get('apachesolr_rows', 10);
$start = $pager_page_array[0] * $count + 1;
?>
<div id="solr_number_results">
  <?php
    print t('%start to %end of %total results', 
      array(
        '%start' => $start,
        '%end' => $pager_total_items[0] > $start + $count - 1 ? $start + $count - 1  : $pager_total_items[0],
        '%total' => $pager_total_items[0]
      )
    );
  ?>  
</div>
<div class="result-solr-pager">
  <?php print $pager; ?>
</div>
<?php echo _isa_apachesolr_sort_toolbox()?>
<div class="search-results <?php print $type; ?>-results">
  <?php print $search_results; ?>
</div>
<div class="result-solr-pager">
<?php print $pager; ?>
</div>
