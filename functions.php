<?php

namespace AtypicTheme\Functions;

require_once(get_template_directory() . '/includes/class-tgm-plugin-activation.php');

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
            'name' => 'Advanced Custom Fields',
            'slug' => 'advanced-custom-fields',
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

//Frontend styles
function atypic_styles()
{
    //Loaded from top to bottom in HTML too
    wp_enqueue_style('dashicons');
    wp_enqueue_style('tailwind_styles', get_theme_file_uri('build/css/style.min.css'));
    wp_enqueue_style('index_css', get_theme_file_uri('/build/css/index.min.css'));
    wp_enqueue_style('header_css', get_theme_file_uri('/build/css/header.min.css'));
    wp_enqueue_style('footer_css', get_theme_file_uri('/build/css/footer.min.css'));
    wp_enqueue_style('home_css', get_theme_file_uri('/build/css/home.min.css'));
}

add_action('wp_enqueue_scripts', '\AtypicTheme\Functions\atypic_styles');
