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

	$labels     = array(
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

add_action(
	'acf/include_fields',
	function() {
		if ( ! function_exists( 'acf_add_local_field_group' ) ) {
			return;
		}

		acf_add_local_field_group(
			array(
				'key'                   => 'group_5bb4d0e63f567',
				'title'                 => 'Documents &amp; Resources',
				'fields'                => array(
					array(
						'key'               => 'field_5910c35285033',
						'label'             => 'Primary Section',
						'name'              => 'primary_section',
						'aria-label'        => '',
						'type'              => 'radio',
						'instructions'      => 'Please select what, if applicable, the primary section this content belongs in. Note: some content does not belong to just one section (e.g. "FAQ"); or it serves as a sectional overview. If that is the case, please select \'none\' and then check the appropriate options under “Affiliated Section".',
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => array(
							'width' => '',
							'class' => '',
							'id'    => '',
						),
						'choices'           => array(
							'none'          => 'none',
							'ehirb'         => 'eHIRB (Pre-2018 Common Rule)',
							'ehirb-revised' => 'eHIRB (Revised Common Rule)',
							'participants'  => 'Participants',
							'members'       => 'Members',
							'investigators' => 'Investigators',
							'about'         => 'About',
						),
						'allow_null'        => 0,
						'other_choice'      => 0,
						'default_value'     => '',
						'layout'            => 'vertical',
						'return_format'     => 'value',
						'save_other_choice' => 0,
					),
					array(
						'key'                       => 'field_5910bfea38e61',
						'label'                     => 'Affiliated Section',
						'name'                      => 'affiliated_section',
						'aria-label'                => '',
						'type'                      => 'checkbox',
						'instructions'              => 'If document or resource is cross-section (e.g. FAQ) or also belongs in another category, please check any affiliated sections.',
						'required'                  => 0,
						'conditional_logic'         => 0,
						'wrapper'                   => array(
							'width' => '',
							'class' => '',
							'id'    => '',
						),
						'choices'                   => array(
							'ehirb'         => 'eHIRB (Pre-2018 Common Rule)',
							'ehirb-revised' => 'eHIRB (Revised Common Rule)',
							'participants'  => 'Participants',
							'investigators' => 'Investigators',
							'members'       => 'Members',
							'about'         => 'About',
						),
						'allow_custom'              => 0,
						'default_value'             => array(),
						'layout'                    => 'vertical',
						'toggle'                    => 0,
						'return_format'             => 'value',
						'save_custom'               => 0,
						'custom_choice_button_text' => 'Add new choice',
					),
					array(
						'key'               => 'field_56f2991bc66e4',
						'label'             => 'eHirb Category',
						'name'              => 'ehirb_category',
						'aria-label'        => '',
						'type'              => 'select',
						'instructions'      => 'This is for Pre-2018 Common Rule. If this document is eHIRB related, please choose if it is an Application, Consent Form, or Further Study Actions. If none of the above, do not select anything.',
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => array(
							'width' => '',
							'class' => '',
							'id'    => '',
						),
						'choices'           => array(
							'applications' => 'Applications',
							'consent'      => 'Consent Forms',
							'actions'      => 'Further Study Actions (FSAs)',
						),
						'default_value'     => false,
						'allow_null'        => 1,
						'multiple'          => 0,
						'ui'                => 0,
						'return_format'     => 'value',
						'ajax'              => 0,
						'placeholder'       => '',
					),
					array(
						'key'               => 'field_5c51bf600e727',
						'label'             => 'eHirb Category: Revised Common Rule',
						'name'              => 'ehirb_category_revised_common_rule',
						'aria-label'        => '',
						'type'              => 'select',
						'instructions'      => 'This is for Revised Common Rule. If this document is eHIRB related, please choose if it is an Application, Consent Form, or Further Study Actions. If none of the above, do not select anything.',
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => array(
							'width' => '',
							'class' => '',
							'id'    => '',
						),
						'choices'           => array(
							'applications' => 'Applications',
							'consent'      => 'Consent Forms',
							'actions'      => 'Further Study Actions (FSAs)',
						),
						'default_value'     => false,
						'allow_null'        => 1,
						'multiple'          => 0,
						'ui'                => 0,
						'return_format'     => 'value',
						'ajax'              => 0,
						'placeholder'       => '',
					),
					array(
						'key'               => 'field_56e18668713af',
						'label'             => 'Document Upload',
						'name'              => 'document_upload',
						'aria-label'        => '',
						'type'              => 'file',
						'instructions'      => '',
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => array(
							'width' => '',
							'class' => '',
							'id'    => '',
						),
						'library'           => 'all',
						'return_format'     => 'url',
						'min_size'          => 0,
						'max_size'          => 0,
						'mime_types'        => '',
					),
					array(
						'key'               => 'field_56e30c9f59b29',
						'label'             => 'Resource Link',
						'name'              => 'resource_link',
						'aria-label'        => '',
						'type'              => 'text',
						'instructions'      => 'Please enter the external or internal link of the resource.	Do NOT include "http://"',
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => array(
							'width' => '',
							'class' => '',
							'id'    => '',
						),
						'default_value'     => '',
						'placeholder'       => '',
						'prepend'           => '',
						'append'            => '',
						'formatting'        => 'none',
						'maxlength'         => '',
					),
				),
				'location'              => array(
					array(
						array(
							'param'    => 'post_type',
							'operator' => '==',
							'value'    => 'documents',
						),
					),
				),
				'menu_order'            => 0,
				'position'              => 'normal',
				'style'                 => 'default',
				'label_placement'       => 'top',
				'instruction_placement' => 'label',
				'hide_on_screen'        => '',
				'active'                => true,
				'description'           => '',
				'show_in_rest'          => false,
			)
		);
	}
);

