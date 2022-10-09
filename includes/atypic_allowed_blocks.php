<?php

namespace AtypicTheme\Functions;

function atypic_allowed_block_types($allowed_block_types, $editor_context) {
    // Limit blocks in 'gallery' post type
    if($editor_context->post->post_type == 'atypic_gallery') {
        // Return an array containing the allowed block types
        return array();
    }
    
}
add_filter('allowed_block_types_all', 'AtypicTheme\Functions\atypic_allowed_block_types', 10, 2);