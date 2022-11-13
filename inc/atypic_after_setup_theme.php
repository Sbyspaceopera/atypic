<?php

namespace AtypicTheme\Functions;

/**
 * This will handle the opt-out wordpress features
 */
function atypic_features()
{
    register_nav_menus([
        "main_menu" => __("Main Menu", "atypic"),
        "footer_menu" => __("Footer Menu", "atypic"),
    ]);

    add_theme_support("custom-logo");
    add_theme_support("post-thumbnails");
    add_theme_support("title-tag");
}

add_action("after_setup_theme", "\AtypicTheme\Functions\atypic_features");
