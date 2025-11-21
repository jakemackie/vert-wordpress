<?php

// Temporary
function vert_custom_enqueue_styles() {
    wp_enqueue_style( 'vert-custom-style', get_stylesheet_uri(), array(), wp_get_theme()->get('Version') );
}
add_action( 'wp_enqueue_scripts', 'vert_custom_enqueue_styles' );

// Custom post types
require_once get_template_directory() . '/includes/custom-post-types.php';