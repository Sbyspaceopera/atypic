<?php

namespace AtypicTheme\Functions;

//Blocks
function atypic_blocks()
{
    register_block_type(__DIR__ . "/../build/gallery");
}
add_action("init", "\AtypicTheme\Functions\atypic_blocks");

//Assets
function atypic_components()
{
    wp_enqueue_script(
        "atypic-components",
        get_template_directory_uri() . "/assets/js/build/bundle.js",
    );
    wp_enqueue_style(
        "tailwind_styles",
        get_theme_file_uri("/assets/scss/build/style.min.css"),
    );
}
add_action(
    "enqueue_block_editor_assets",
    "\AtypicTheme\Functions\atypic_components",
);

//Allowed blocks
function atypic_allowed_block_types($allowed_block_types, $editor_context)
{
    // Limit blocks in 'gallery' post type
    if (isset($editor_context->post->post_type) && $editor_context->post->post_type === "atypic_gallery") {
        // Return an array containing the allowed block types
        return [];
    }
}
add_filter(
    "allowed_block_types_all",
    "AtypicTheme\Functions\atypic_allowed_block_types",
    10,
    2,
);
