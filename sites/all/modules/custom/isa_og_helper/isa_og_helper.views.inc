<?php
//Most active block algorithm

/**
 * Implementation of hook_views_data().
 */
function isa_og_helper_views_data() {
	$data['og']['post_count_joinup'] = array(
			'title' => t('Group: Post count Joinup'),
			'field' => array(
					'handler' => 'isa_og_helper_handler_field_og_post_count_joinup',
					'click sortable' => TRUE,
					'help' => t('Number of published posts in a group.'),
					'notafield' => TRUE,
			),
	);
	return $data;
}

/**
 * Implementation of hook_views_handlers().
 */
function isa_og_helper_views_handlers() {
	return array(
			'info' => array(
					'path' => drupal_get_path('module', 'isa_og_helper') . '/handlers',
			),
			'handlers' => array(
					'isa_og_helper_handler_field_og_post_count_joinup' => array(
							'parent' => 'views_handler_field_numeric',
					),
			),
	);
}
