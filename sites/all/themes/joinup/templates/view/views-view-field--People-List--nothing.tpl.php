<?php
// $Id: views-view-field.tpl.php,v 1.1 2008/05/16 22:22:32 merlinofchaos Exp $
 /**
  * @file
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

// Displays domains if user accept to show her domains (this is an option in edit profile)
// for $row->keywords see template "views-view-field--People-List--tid-1.tpl.php"
print '<div class="field field-unknown">';
if (isa_toolbox_check_visibility(node_load($row->nid), 'profile')){
  if (isa_toolbox_check_visibility(node_load($row->nid), 'keywords')) {
    print $output;
  }
  else {
    print strstr($output, '| Keywords', TRUE);
  }
}
else {
  if (isa_toolbox_check_visibility(node_load($row->nid), 'keywords')) {
    print 'Keywords: ' . $row->keywords;
  }
}
print '</div>';
?>
