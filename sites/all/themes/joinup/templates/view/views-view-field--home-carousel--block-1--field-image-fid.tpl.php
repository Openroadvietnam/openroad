<?php
// $Id: views-view-field.tpl.php,v 1.1 2008/05/16 22:22:32 merlinofchaos Exp $
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
    //https://webgate.ec.europa.eu/CITnet/jira/browse/ISAICP-841
    //Trim title and body of revolving banner block
    $title_lenght = strlen($row->node_title);
    if($title_lenght < 25){//One line title
        $body_lenght = 125;
    }else{
        if($title_lenght < 50){//Two lines title
            $body_lenght = 100;
        }else{
            if($title_lenght < 75){//Three lines title
                $body_lenght = 75;
            }else{//Four lines title
                $body_lenght = 50;                
            }
        }
    }
    $alter = array( 'max_length' => $body_lenght,
                    'html' => TRUE
                );
    $body = views_trim_text($alter, $row->node_revisions_body);
    $title_length_limit = 100;
?>
<?php if(1 == $row->node_data_field_carousel_top_title_field_carousel_overlay_value): ?>
    <div class="views-carousel-overlay">
        <em class="views-carousel-overlay-top_title"><?php echo $row->node_data_field_carousel_top_title_field_carousel_top_title_value?></em>
        <h3 class="views-carousel-overlay-title"><?php echo truncate_utf8($row->node_title, $title_length_limit, FALSE, FALSE)?></h3>
        <?php
            //https://webgate.ec.europa.eu/CITnet/jira/browse/ISAICP-841
            //Trim title and body of revolving banner block
        ?>
        <div class="views-carousel-overlay-body"><?php echo $body?></div>
        <div class="views-carousel-overlay-link rounded-box">
			<div class="rounded-box-wrapper">
				<div><?php echo l($row->node_data_field_carousel_top_title_field_carousel_url_title, $row->node_data_field_carousel_top_title_field_carousel_url_url)?></div>
			</div>
			<div class='corner topLeft'></div>
			<div class='corner topRight'></div>
			<div class='corner bottomLeft'></div>
			<div class='corner bottomRight'></div>
		</div>
    </div>
<?php endif; ?>
<a href="<?php echo $row->node_data_field_carousel_top_title_field_carousel_url_url?>"><?php print $output; ?></a>