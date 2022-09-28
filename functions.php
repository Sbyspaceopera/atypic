<?php

namespace AtypicTheme\Functions;

//Core classes namespace import
use WP_REST_Response;
use WP_REST_Server;
use WP_REST_Request;

require_once(get_template_directory() .'/includes/class-tgm-plugin-activation.php');
require_once(get_template_directory().'/includes/atypic_post_types.php');
require_once(get_template_directory().'/includes/atypic_custom_fields.php');
require_once(get_template_directory().'/includes/atypic_allowed_blocks.php');

//http://tgmpluginactivation.com/
//Plugins dependencies
function atypic_register_required_plugins()
{
    $plugins = array(
        array(
            'name' => 'wpDiscuz',
            'slug' => 'wpdiscuz',
            'required' => true,
            'force_activation' => true,
        ),
        array(
            'name' => 'CMB2',
            'slug' => 'cmb2',
            'required' => true,
            'force_activation' => true,
        ),
        array(
            'name' => 'Highlighting Code Block',
            'slug' => 'highlighting-code-block',
            'required' => true,
            'force_activation' => true,
        )
    );

    $config = array(
        'dismissable' => false,
        'is_automatic' => true
    );

    tgmpa($plugins, $config);
}
add_action('tgmpa_register', '\AtypicTheme\Functions\atypic_register_required_plugins');


//Remove jquery in the frontend
/*function change_default_jquery()
{
    if (!is_admin()) {
        wp_dequeue_script('jquery');
        wp_deregister_script('jquery');
    }
}

add_filter('wp_enqueue_scripts', '\AtypicTheme\Functions\change_default_jquery', PHP_INT_MAX);*/

//Hide admin bar in the frontend
add_filter('show_admin_bar', '__return_false');

//WordPress features and support
function atypique_features()
{
    register_nav_menus(array(
        'main_menu' => __('Main Menu', 'atypique'),
        'footer_menu' => __('Footer Menu', 'atypique')
    ));

    add_theme_support('custom-logo');
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');
}

add_action('after_setup_theme', '\AtypicTheme\Functions\atypique_features');

//Front office styles
function atypic_styles()
{
    //Loaded from top to bottom in HTML too
    wp_enqueue_style('dashicons');
    wp_enqueue_style('tailwind_styles', get_theme_file_uri('/scss/build/style.min.css'));
    wp_enqueue_style('index_css', get_theme_file_uri('/scss/build/index.min.css'));
    wp_enqueue_style('header_css', get_theme_file_uri('/scss/build/header.min.css'));
    wp_enqueue_style('footer_css', get_theme_file_uri('/scss/build/footer.min.css'));
    wp_enqueue_style('home_css', get_theme_file_uri('/scss/build/home.min.css'));

    wp_enqueue_script('test', get_template_directory_uri().'/js/build/bundle.js');
}

add_action('wp_enqueue_scripts', '\AtypicTheme\Functions\atypic_styles');

//Back office styles
function add_editor_styles() {
    wp_enqueue_style('tailwind_styles', get_theme_file_uri('/scss/build/style.min.css'));
}
add_action( 'admin_init', '\AtypicTheme\Functions\add_editor_styles' );

//Blocks
function atypic_blocks(){
    //Not a priority
    //register_block_type(__DIR__.'/build/atypic-header');
    register_block_type(__DIR__.'/build/gallery');

    
}

add_action('init', '\AtypicTheme\Functions\atypic_blocks');

//Custom REST routes
function atypic_rest_routes(){
    
    //Custom logo route
    function get_the_logo_url(){
        $custom_logo_id = get_theme_mod('custom_logo');
        $url= wp_get_attachment_image_src($custom_logo_id, 'full')[0];
        
        $response = new WP_REST_Response($url);
        $response->set_status(200);
        return $response;
    }
    
    register_rest_route('atypic/v1','/logo', array(
        "methods" => WP_REST_Server::READABLE,
        "callback" =>"\AtypicTheme\Functions\get_the_logo_url",
        "permission_callback" => '__return_true'
    ));

    //Custom menu route
    function get_the_menu(WP_REST_Request $request){
        $menu_name = $request->get_param('menu_name');

        $menu = wp_get_nav_menu_items($menu_name);

        $response = new WP_REST_Response($menu);
        $response->set_status(200);

        return $response;
    }

    register_rest_route('atypic/v1', '/menu', array(
        "methods" => WP_REST_Server::READABLE,
        "callback" => "\AtypicTheme\Functions\get_the_menu",
        "permission_callback" => '__return_true'
    ));
}

add_action('rest_api_init', '\AtypicTheme\Functions\atypic_rest_routes');