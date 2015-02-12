<?php

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
}

require get_stylesheet_directory() . '/theme-core/theme-register-posttypes.php';
load_template( trailingslashit( get_stylesheet_directory() ) . 'theme-core/ot-custom-meta-boxes.php' ); // Load Page/Post options.
