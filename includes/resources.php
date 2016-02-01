<?php
/********** Resources Post types ***********/


add_action('init', 'wp_resources_init');

function wp_resources_init(){

	$labels = array(
	'name' => _x('Resources', 'post type general name'),
	'singular_name' => _x('Resources', 'post type singular name'),
	'add_new' => _x('Add New', 'Resources'),
	'add_new_item' => __('Add New Resources'),
	'edit_item' => __('Edit Resources'),
	'new_item' => __('New Resources'),
	'all_items' => __('All Resources'),
	'view_item' => __('View Resources'),
	'search_items' => __('Search Resources'),
	'not_found' =>  __('No Resources found'),
	'not_found_in_trash' => __('No Resources found in Trash'), 
	'parent_item_colon' => '',
	'menu_name' => 'Resources'

	);
	$args = array(
	'labels' => $labels,
	'public' => true,
	'publicly_queryable' => true,
	'show_ui' => true, 
	'show_in_menu' => true, 
	'query_var' => true,
	'rewrite' => array(
			'slug' => 'startup-resources'
			),
	'capability_type' => 'page',
	'has_archive' => true, 
	'hierarchical' => false,
	'menu_position' => null,
	'supports' => array('title','editor','excerpt','thumbnail','page-attributes')
	); 
	register_post_type('startup_resources',$args);
	
	
  	register_taxonomy(
		"resources_organisations", 
		array("startup_resources"), 
		array("hierarchical" => true, 
		"label" => "Organisations", 
		"singular_label" => "Organisations", 
		"rewrite" => true,
		"sort" => true,
		"args" => array("orderby" => "term_order"))
	); 
	register_taxonomy(
		"resources_topics", 
		array("startup_resources"), 
		array("hierarchical" => true, 
		"label" => "Topics", 
		"singular_label" => "Topics", 
		"rewrite" => true,
		"sort" => true,
		"args" => array("orderby" => "term_order"))
	);
	register_taxonomy(
		"resources_tips", 
		array("startup_resources"), 
		array("hierarchical" => true, 
		"label" => "Tips", 
		"singular_label" => "Tips", 
		"rewrite" => true,
		"sort" => true,
		"args" => array("orderby" => "term_order"))
	);
}

?>