<?php
namespace AtypicTheme\Functions;

//Gallery Post Type
function atypic_custom_post_type()
{
    register_post_type("atypic_gallery", [
        "labels" => [
            "name" => __("Galleries", "atypic"),
            "singular_name" => __("Gallery", "atypic"),
            "add_new_item" => __("Add New Gallery", "atypic"),
            "edit_item" => __("Edit Gallery", "atypic"),
            "all_items" => __("All Galleries", "atypic"),
        ],
        "public" => true,
        "has_archive" => true,
        "menu_icon" => "dashicons-images-alt2",
        "show_in_rest" => true,
        "show_in_menu" => true,
        "rewrite" => ["slug" => "galleries"],
        "supports" => ["title", "editor", "excerpt", "custom-fields"],
    ]);
}
add_action("init", "\AtypicTheme\Functions\atypic_custom_post_type");
