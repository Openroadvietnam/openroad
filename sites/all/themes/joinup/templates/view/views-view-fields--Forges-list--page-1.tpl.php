<?php
// $Id: views-view-fields.tpl.php,v 1.6 2008/09/24 22:48:21 merlinofchaos Exp $
/**
 * @file views-view-fields.tpl.php
 * Default simple view template to all the fields as a row.
 *
 * - $view: The view in use.
 * - $fields: an array of $field objects. Each one contains:
 *   - $field->content: The output of the field.
 *   - $field->raw: The raw data for the field, if it exists. This is NOT output safe.
 *   - $field->class: The safe class id to use.
 *   - $field->handler: The Views field handler object controlling this field. Do not use
 *     var_export to dump this object, as it can't handle the recursion.
 *   - $field->inline: Whether or not the field should be inline.
 *   - $field->inline_html: either div or span based on the above flag.
 *   - $field->separator: an optional separator that may appear before a field.
 * - $row: The raw result object from the query, with all data it fetched.
 *
 * @ingroup views_templates
 * 
 * https://webgate.ec.europa.eu/CITnet/jira/browse/ISAICP-946
 * Federated forges - outdated descriptions and missing translations 
 */

 if(count($row)){
	?><div class="federated-forge-list"><?php
			?><div class="field views-field-title"><?php
				print l(
						$row->node_title,
						'node/'.$row->nid
					);
			?></div><?php
			
			/* number of projects */
			?><div class="field views-field-nid"><?php
			$nb_fed_proj = isa_toolbox_get_federated_projects_count_from_federated_forge($row->nid);
			print $nb_fed_proj . ' project(s)';
			?></div><br class="clear" /><?php
			
			/* picture */
			if($row->node_data_field_forges_logo_field_forges_logo_fid>0){
				$noPicture = false;
				?><div class="views-field-field-forges-logo-fid"><?php
				$picture = field_file_load($row->node_data_field_forges_logo_field_forges_logo_fid);
				$path = $picture['filepath'];
				$picture = theme_imagecache('community_logo', $path);
				print l(
					$picture,
					'node/'.$row->nid,
						array('html' => TRUE, 'class' => 'imagecache imagecache-community_logo imagecache-linked imagecache-community_logo_linked')
				);
				?></div><?php
			} else {
				$noPicture = true;
			}
					
			
				
		?><div class="<?php print ($noPicture)?'full ':'';?>details-info"><?php
				
				?><div class="field views-field-body"><?php
					$threepoints = (strlen($row->node_revisions_body)>200)?'...':'';
					print substr(strip_tags($row->node_revisions_body), 0, 200) . $threepoints;
				?></div><?php	
				
		?></div><br class="clear" /><?php
	/* node type */
				?><div class="views-field-type"><?php
					$node_type = isa_toolbox_get_node_type_name(node_load($row->nid));
					print $node_type;
				?></div><?php
				
				/* node_changed */
				?><div class="views-field-changed"><?php
					print t('| Last updated: ') . date("d F Y", $row->node_changed);
					?></div><?php
		?></div><?php
	}			
?>
