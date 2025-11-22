<?php

function acf_blocks_load() {

    $blocks = get_blocks();

    foreach ( $blocks as $block ) {

        $block_json_path = get_theme_file_path( "/blocks/{$block}/block.json" );

        if ( file_exists( $block_json_path ) ) {

            register_block_type(
                $block_json_path,
                [
                    'attributes' => [
                        'unique_id' => [
                            'type'    => 'string',
                            'default' => '',
                        ],
                    ],
                    'render_callback' => function( $attributes, $content, $block ) {

                        // Ensure unique ID per instance
                        if ( empty( $attributes['unique_id'] ) ) {
                            $attributes['unique_id'] = uniqid( 'blk_' );
                        }

                        // ACF style: $block is NOT always WP_Block, never rely on $block->context

                        // Let ACF handle rendering, but allow template usage
                        // Add ID via wrapper attributes (ACF uses $block['id'])
                        if ( is_array( $block ) ) {
                            $block['id'] = $attributes['unique_id'];
                        }

                        // Return rendered content
                        return $content;
                    }
                ]
            );
        }
    }
}

add_action("init","acf_blocks_load", 5);
