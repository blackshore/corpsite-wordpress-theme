<?php

add_action( 'wp_enqueue_scripts', 'theme_enqueue_assets' );
function theme_enqueue_assets() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_script(
		'custom-script',
		get_stylesheet_directory_uri() . '/scripts.js',
		array( 'jquery' )
	);
}


require get_stylesheet_directory() . '/theme-core/theme-register-posttypes.php';
load_template( trailingslashit( get_stylesheet_directory() ) . 'theme-core/ot-custom-meta-boxes.php' ); // Load Page/Post options.

/* Hide that aweful Ajax loader in contact form */
add_filter('wpcf7_ajax_loader', 'my_wpcf7_ajax_loader');
function my_wpcf7_ajax_loader () {
	return get_bloginfo('stylesheet_directory') . '/images/blank.png';
}


function add_query_vars_filter( $vars ){
  $vars[] = "story";
  return $vars;
}
add_filter( 'query_vars', 'add_query_vars_filter' );









