<?php

function directory_filenames_callback(string $directory, array $extensions = [], callable $callback) {
    // Catch Missing Folder
    if(!is_dir($directory)) return;

    // Loop Over Files
    foreach(scandir($directory) as $filename) {
        $seperators = explode(".", $filename);
        $extension = end($seperators);

        // Match Extension and Perform Callback
        if(in_array($extension, $extensions) && $callback)
            $callback($filename);
    }
}

/**
 * Recursively scan the blocks directory to find all blocks
 * 
 * @param string $directory The directory to scan
 * @param string $prefix An optional prefix for nested blocks
 * @return array Array of block names
 */
function scan_blocks_directory($directory, $prefix = '') {
    $blocks = [];
    $excluded = ["..", ".", ".DS_Store", "_base-block", "_unused"];

    // Catch missing folder
    if (!is_dir($directory)) return $blocks;

    foreach (scandir($directory) as $item) {
        if (in_array($item, $excluded)) continue;

        $path = $directory . '/' . $item;

        // Skip if this or any parent directory is _unused
        if (strpos($prefix . '/' . $item, '/_unused/') !== false || $item === '_unused') continue;

        if (is_dir($path)) {
            // Use directory_filenames_callback to check for block.json
            $has_block_json = false;
            directory_filenames_callback($path, ['json'], function($filename) use (&$has_block_json) {
                if ($filename === 'block.json') $has_block_json = true;
            });

            if ($has_block_json) {
                $block_name = $prefix ? $prefix . '/' . $item : $item;
                $blocks[] = $block_name;
            }

            // Recursively scan subdirectories
            $nested_blocks = scan_blocks_directory($path, $prefix ? $prefix . '/' . $item : $item);
            if (!empty($nested_blocks)) {
                $blocks = array_merge($blocks, $nested_blocks);
            }
        }
    }

    return $blocks;
}

function get_blocks() {
    $blocks = [];
    $blocks_dir = get_theme_file_path() . "/blocks/";

    //check directory exists
    if(!is_dir($blocks_dir)) {
        return($blocks);
    }

    // Get blocks recursively
    $blocks = scan_blocks_directory($blocks_dir);
    
    return($blocks);
}
