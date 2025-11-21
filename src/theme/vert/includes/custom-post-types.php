<?php

function register_team_member_post_type() {
    $args = [
        'labels' => [
            'name' => 'Team Members',
            'singular_name' => 'Team Member',
            'add_new' => 'Add New Team Member',
            'add_new_item' => 'Add New Team Member',
            'edit_item' => 'Edit Team Member',
            'new_item' => 'New Team Member',
            'view_item' => 'View Team Member',
            'all_items' => 'All Team Members',
            'search_items' => 'Search Team Members',
            'not_found' => 'No team members found',
            'not_found_in_trash' => 'No team members found in trash',
            'menu_name' => 'Team Members',
        ],
        'public' => true,
        'has_archive' => true,
        'rewrite' => ['slug' => 'team-members'],
        'show_in_rest' => false, // Enable Gutenberg editor
        "supports" => ['title', 'thumbnail', 'custom-fields'],
        'menu_icon' => 'dashicons-groups',
    ];
    
    register_post_type('team_member', $args);
}

add_action('init', 'register_team_member_post_type');