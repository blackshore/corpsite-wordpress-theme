<?php

if ( ! function_exists('talent') ) {

// Register Custom Post Type
function talent() {

$labels = array(
'name'                => _x( 'Talents', 'Post Type General Name', 'text_domain' ),
'singular_name'       => _x( 'Talent', 'Post Type Singular Name', 'text_domain' ),
'menu_name'           => __( 'Talents', 'text_domain' ),
'parent_item_colon'   => __( 'Parent talent:', 'text_domain' ),
'all_items'           => __( 'All talents', 'text_domain' ),
'view_item'           => __( 'View talent', 'text_domain' ),
'add_new_item'        => __( 'Add New Talent', 'text_domain' ),
'add_new'             => __( 'Add New', 'text_domain' ),
'edit_item'           => __( 'Edit Talent', 'text_domain' ),
'update_item'         => __( 'Update Talent', 'text_domain' ),
'search_items'        => __( 'Search Talent', 'text_domain' ),
'not_found'           => __( 'Talent not found', 'text_domain' ),
'not_found_in_trash'  => __( 'Talent not found in Trash', 'text_domain' ),
);
$args = array(
'label'               => __( 'talent', 'text_domain' ),
'description'         => __( 'Talent page', 'text_domain' ),
'labels'              => $labels,
'supports'            => array( 'title', 'editor', 'excerpt', 'thumbnail', 'custom-fields', 'page-attributes', ),
'taxonomies'          => array( 'category', 'post_tag' ),
'hierarchical'        => false,
'public'              => true,
'show_ui'             => true,
'show_in_menu'        => true,
'show_in_nav_menus'   => true,
'show_in_admin_bar'   => true,
'menu_position'       => 5,
'menu_icon'           => 'dashicons-video-alt2',
'can_export'          => true,
'has_archive'         => true,
'exclude_from_search' => false,
'publicly_queryable'  => true,
'capability_type'     => 'page',
);
register_post_type( 'talent', $args );

}

// Hook into the 'init' action
add_action( 'init', 'talent', 0 );

}