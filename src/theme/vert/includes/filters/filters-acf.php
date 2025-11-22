<?php

//Load ACF field groups for blocks and options pages
function load_acf_field_groups($paths) {
    $blocks 	= get_blocks();
    $options	= get_acf_field_groups();
    
    //clear out the default path where acf saves field groups
    $paths = [];

    foreach($blocks as $block) {
        $paths[] = get_theme_file_path("/blocks/{$block}");
    }

    foreach($options as $option){
        $paths[] = get_theme_file_path("/acf-json/{$option}");
    }

    return($paths);
}

add_filter("acf/settings/load_json", "load_acf_field_groups", 1);
