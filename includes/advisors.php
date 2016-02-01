<?php
/********** Advisors Post types ***********/


add_action('init', 'wp_advisors_init');

function wp_advisors_init(){

	$labels = array(
	'name' => _x('Advisors', 'post type general name'),
	'singular_name' => _x('Advisors', 'post type singular name'),
	'add_new' => _x('Add New', 'Advisor'),
	'add_new_item' => __('Add New Advisor'),
	'edit_item' => __('Edit Advisor'),
	'new_item' => __('New Advisor'),
	'all_items' => __('All Advisors'),
	'view_item' => __('View Advisor'),
	'search_items' => __('Search Advisors'),
	'not_found' =>  __('No Advisors found'),
	'not_found_in_trash' => __('No Advisors found in Trash'), 
	'parent_item_colon' => '',
	'menu_name' => 'Advisors'

	);
	$args = array(
	'labels' => $labels,
	'public' => true,
	'publicly_queryable' => true,
	'show_ui' => true, 
	'show_in_menu' => true, 
	'query_var' => true,
	'rewrite' => array(
			'slug' => 'cfe-advisor'
			),
	'capability_type' => 'post',
	'has_archive' => true, 
	'hierarchical' => false,
	'menu_position' => null,
	'supports' => array('title','editor','excerpt','thumbnail')
	); 
	register_post_type('cfe_advisor',$args);
}
?>