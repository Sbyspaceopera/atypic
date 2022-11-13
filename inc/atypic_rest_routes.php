<?php

namespace AtypicTheme\Functions;

//Core classes namespace import
use WP_REST_Response;
use WP_REST_Server;
use WP_REST_Request;

//Custom REST routes
function atypic_rest_routes()
{
    //Custom logo route
    function get_the_logo_url()
    {
        $custom_logo_id = get_theme_mod("custom_logo");
        $url = wp_get_attachment_image_src($custom_logo_id, "full")[0];

        $response = new WP_REST_Response($url);
        $response->set_status(200);
        return $response;
    }

    register_rest_route("atypic/v1", "/logo", [
        "methods" => WP_REST_Server::READABLE,
        "callback" => "\AtypicTheme\Functions\get_the_logo_url",
        "permission_callback" => "__return_true",
    ]);

    //Custom menu route
    function get_the_menu(WP_REST_Request $request)
    {
        $menu_name = $request->get_param("menu_name");

        $menu = wp_get_nav_menu_items($menu_name);

        $response = new WP_REST_Response($menu);
        $response->set_status(200);

        return $response;
    }

    register_rest_route("atypic/v1", "/menu", [
        "methods" => WP_REST_Server::READABLE,
        "callback" => "\AtypicTheme\Functions\get_the_menu",
        "permission_callback" => "__return_true",
    ]);
}
add_action("rest_api_init", "\AtypicTheme\Functions\atypic_rest_routes");
