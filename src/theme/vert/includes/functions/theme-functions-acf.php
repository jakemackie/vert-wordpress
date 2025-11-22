<?php

// Function to get the options directories from the options folder
function get_acf_field_groups(){
    $options = [];

    //check directory exists 
    if(!is_dir(get_theme_file_path()."/acf-json/")){
        return($options);
    }

    //obtain blocks from directory, strip out any funny business
    $options = scandir(get_theme_file_path() . "/acf-json/");
    $options = array_values(array_diff($options, ["..", ".", ".DS_Store", "_base-block"]));
    return($options);
}
