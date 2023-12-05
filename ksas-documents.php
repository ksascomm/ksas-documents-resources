<?php
/**
 * Plugin Name: KSAS Documents & Resources
 * Plugin URI: https://github.com/ksascomm/ksas_testimonials
 * Description: Creates a custom post type for documents & resources.
 * Version: 1.0
 * Author: Tim Gelles
 * Author URI: mailto:tgelles@jhu.edu
 * License: GPL2
 */

/** Register documents Post Type */
function documents_post_type() {

	$labels = array(
		'name'                  => _x( 'Documents', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Document', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Documents', 'text_domain' ),
		'name_admin_bar'        => __( 'Documents', 'text_domain' ),
		'archives'              => __( 'Document Archives', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Document:', 'text_domain' ),
		'all_items'             => __( 'All Documents', 'text_domain' ),
		'add_new_item'          => __( 'Add New Document', 'text_domain' ),
		'add_new'               => _x( 'Add New Document', 'text_domain' ),
		'new_item'              => __( 'New Document', 'text_domain' ),
		'edit_item'             => __( 'Edit Document', 'text_domain' ),
		'update_item'           => __( 'Update Document', 'text_domain' ),
		'view_item'             => __( 'View Document', 'text_domain' ),
		'search_items'          => __( 'Search Document', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into Document', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Document', 'text_domain' ),
		'items_list'            => __( 'Documents list', 'text_domain' ),
		'items_list_navigation' => __( 'Documents list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter Documents list', 'text_domain' ),
	);
	$taxonomies = array( 'category' );
	$supports   = array( 'title', 'editor' );
	$args       = array(
		'label'               => __( 'Document', 'text_domain' ),
		'description'         => __( 'Documents & Resources', 'text_domain' ),
		'labels'              => $labels,
		'supports'            => $supports,
		'taxonomies'          => $taxonomies,
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-portfolio',
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => false,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'show_in_rest'        => true,
		'capability_type'     => 'post',
	);
	register_post_type( 'documents', $args );

}
add_action( 'init', 'documents_post_type' );
