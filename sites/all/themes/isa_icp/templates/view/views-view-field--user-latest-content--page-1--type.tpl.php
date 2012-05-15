<?php
// $Id: views-view-field--elibrary-view--type.tpl.php,v 1.0 2011/05/18 15:11:32 smilart Exp $
 /**
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
  */
  global $base_url;
 $theme = variable_get ('theme_default', NULL);
 $theme_path = drupal_get_path('theme', $theme);
 $path = $base_url .'/'.$theme_path.'/images/logo/'.$output . '.png';
?>


<div class="field field-data-<?php print $output;?>-image">

<img width="70" height="70" alt="<?php print $output; ?>" title="<?php print $output; ?>" src="<?php print $path?>" />


</div>
