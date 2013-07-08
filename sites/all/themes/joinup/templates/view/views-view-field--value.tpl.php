<?php
// $Id: views-view-field.tpl.php,v 1.1 2008/05/16 22:22:32 merlinofchaos Exp $
 /**
  * 
  * @file
  * 
  * 
  * This template is used to print a single field in a view. It is not
  * actually used in default Views, as this is registered as a theme
  * function which has better performance. For single overrides, the
  * template is perfectly okay.
  *
  * Variables available:
  * - $view: The view object
  * - $field: The field handler object that can process the input
  * - $row: The raw SQL result that can be used
  * - $output: The processed output that will normally be used.
  *
  * When fetching output from the $row, this construct should be used:
  * $data = $row->{$field->field_alias}
  *
  * The above will guarantee that you'll always get the correct data,
  * regardless of any changes in the aliasing that might happen if
  * the view is modified.
  * 
  * @ingroup views
  */
?>
<?php 
$result = str_replace('_', '-', $field -> field_alias);
$search = array('-field', 'node-');
$class = str_replace($search, '', $result);
$node = node_load($row->nid);
$type = isa_toolbox_get_node_type_name($node);
$stars = 5;
$numeric_rating = $row->votingapi_cache_node_percent_vote_average_value/(100/$stars);

print '<div class="field field-'.$class.'" title="This '.$type.' is rated as '.$numeric_rating.'/'.$stars.'">'.$output.'</div>'; ?>