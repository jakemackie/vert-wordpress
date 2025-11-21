<?php

// Temporary
function vert_theme_styles() {
    // Theme Details (style.css)
    wp_enqueue_style(
        handle: 'vert-wp-style', 
        src: get_stylesheet_uri(),
        ver: wp_get_theme()->get('Version')
    );

    // Tailwind CSS output
    wp_enqueue_style(
        handle: 'tailwindcss',
        src: get_template_directory_uri() . "/assets/css/dist/styles.css",
        ver: wp_get_theme()->get('')
    );
}

add_action(
    hook_name: 'wp_enqueue_scripts', 
    callback: 'vert_theme_styles'
);
