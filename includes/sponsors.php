<?php
/********** Sponsors Post types ***********/


add_action('init', 'wp_sponsors_init');

function wp_sponsors_init(){

	$labels = array(
	'name' => _x('Sponsors', 'post type general name'),
	'singular_name' => _x('Sponsors', 'post type singular name'),
	'add_new' => _x('Add New', 'Sponsor'),
	'add_new_item' => __('Add New Sponsor'),
	'edit_item' => __('Edit Sponsor'),
	'new_item' => __('New Sponsor'),
	'all_items' => __('All Sponsors'),
	'view_item' => __('View Sponsor'),
	'search_items' => __('Search Sponsors'),
	'not_found' =>  __('No Sponsors found'),
	'not_found_in_trash' => __('No Sponsors found in Trash'), 
	'parent_item_colon' => '',
	'menu_name' => 'Sponsors'

	);
	$args = array(
	'labels' => $labels,
	'public' => true,
	'publicly_queryable' => true,
	'show_ui' => true, 
	'show_in_menu' => true, 
	'query_var' => true,
	'rewrite' => array(
			'slug' => 'startup-sponsors'
			),
	'capability_type' => 'post',
	'has_archive' => true, 
	'hierarchical' => false,
	'menu_position' => null,
	'supports' => array('title','editor','excerpt')
	); 
	register_post_type('startup_sponsors',$args);
}
?>