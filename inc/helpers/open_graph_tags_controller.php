<?php

namespace AtypicTheme\Helpers;

class OG_Controller
{
    public static function get_the_title()
    {
        is_front_page() ? bloginfo("name") : wp_title("");
    }

    public static function get_the_description()
    {
        is_front_page()
            ? bloginfo("description")
            : (get_the_excerpt()
                ? print get_the_excerpt()
                : "Description manquante");
    }

    public static function get_the_url()
    {
        echo "//" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
    }

    public static function get_the_image()
    {
        $custom_logo_id = get_theme_mod("custom_logo");
        $image = wp_get_attachment_image_src($custom_logo_id, "full");

        echo has_post_thumbnail() ? get_the_post_thumbnail_url() : $image[0];
    }
}
