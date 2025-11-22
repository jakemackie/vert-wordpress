<?php

function set_block_id($block , $override_slug = false) {

    if( !is_array($block) ) {
        return uniqid();
    }

    $name = '';
    $block_id = '';
    $name_isolated = '';
    $final_id = uniqid();

    if( array_key_exists('name', $block) ) {
        $name = $block['name'];
        $name_array = explode('/', $name);
        $name_isolated = end($name_array);
    }

    if($override_slug) {
        $name_isolated = $override_slug;
    }

    if( array_key_exists('id', $block) ) {
        $block_id = $block['id'];
    }

    if($name_isolated && $block_id) {
        // If we have both ID and name
        $final_id = "{$name_isolated}_{$block_id}";
    } elseif($name_isolated) {
        // If we have name only
        $final_id = "{$name_isolated}_{$final_id}";
    } elseif($block_id) {
        $final_id = $block_id;
    }

    return $final_id;
}

/**
 * @param array $block The block data
 * @param bool $mobile Whether to set the padding for mobile
 * @param array $breakpoints The breakpoints for the block e.g ["md", "lg"]
 */
function get_block_spacing($block, $mobile=false, $breakpoint = "xl") {
    $block_spacing = "";

    /*
        We don't need to do this on the admin side, Gutenberg will handle it in a wrapper div 
    */
    if (
        !is_array($block) || 
        !isset($block["style"]["spacing"]) ||
        is_admin()
    ) {
        return $block_spacing;
    }

    $spacing_data = $block["style"]["spacing"];
    $classes = [];

    // Define allowed scaled sizes based on your spacingSizes JSON
    $allowed_scaled_sizes = [
        "xs",
        "sm",
        "md",
        "lg",
        "xl",
        "2xl",
        "3xl"
    ];

    foreach ($spacing_data as $spacing_type => $spacing_values) {
        foreach ($spacing_values as $side => $value) {
            // Break down Gutenberg string
            $spacing_value_parts = explode("|", $value);
            
            // Get last piece (our slug)
            $spacing_value = end($spacing_value_parts);

            // Add the desktop class
            if ($mobile) {
                $desktop_class = "{$breakpoint}:{$spacing_type}-{$side}-{$spacing_value}";
                $classes[] = $desktop_class;

                // Check if the current spacing_value can be scaled
                if (isset($allowed_scaled_sizes[$spacing_value])) {
                    $mobile_spacing_value = $allowed_scaled_sizes[$spacing_value];
                    $mobile_class = "{$spacing_type}-{$side}-{$mobile_spacing_value}";
                    $classes[] = $mobile_class;
                }

            } else {
                $desktop_class = "{$spacing_type}-{$side}-{$spacing_value}";
                $classes[] = $desktop_class;
            }
        }
    }

    // Remove duplicate classes to avoid redundancy, just in case.
    $classes = array_unique($classes);

    return implode(" ", $classes);
}
