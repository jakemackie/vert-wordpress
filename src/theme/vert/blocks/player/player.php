<?php

$block_id = set_block_id($block);
$block_classes = new BlockClasses($block);

$template = [
    [
        "core/heading",
        [
            "level" => 2,
            "placeholder" => "Heading Goes Here",
            "fontSize" => "xl"
        ]
    ],
    [
        "core/paragraph",
        [
            "placeholder" => "Paragraph text goes here, click the plus button to choose a inner block to add to this container.",
            "fontSize" => "md"
        ]
    ]
];

$player = get_field("block_player_select");

var_dump($player)

?>

<section
    id="<?php echo $block_id; ?>"
    class="<?php echo $block_classes; ?>"
>
    <InnerBlocks 
        template="<?php echo esc_attr(wp_json_encode($template)); ?>"
    />
</section>
