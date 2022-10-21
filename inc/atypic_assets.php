<?php

namespace AtypicTheme\Functions;

//Front office styles
function atypic_styles()
{
    //Loaded from top to bottom in HTML too
    wp_enqueue_style("dashicons");
    wp_enqueue_style(
        "tailwind_styles",
        get_theme_file_uri("/assets/scss/build/style.min.css"),
    );
    wp_enqueue_style(
        "index_css",
        get_theme_file_uri("/assets/scss/build/index.min.css"),
    );
    wp_enqueue_style(
        "header_css",
        get_theme_file_uri("/assets/scss/build/header.min.css"),
    );
    wp_enqueue_style(
        "footer_css",
        get_theme_file_uri("/assets/scss/build/footer.min.css"),
    );
    wp_enqueue_style(
        "home_css",
        get_theme_file_uri("/assets/scss/build/home.min.css"),
    );

    wp_enqueue_script(
        "atypic_bundle",
        get_template_directory_uri() . "/assets/js/build/bundle.js",
    );
}

add_action("wp_enqueue_scripts", "\AtypicTheme\Functions\atypic_styles");

//Back office scripts
function add_editor_styles()
{
    wp_enqueue_style(
        "tailwind_styles",
        get_theme_file_uri("/assets/scss/build/style.min.css"),
    );
}
add_action("admin_init", "\AtypicTheme\Functions\add_editor_styles");
