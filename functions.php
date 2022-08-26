<?php

require_once(get_template_directory().'/class-tgm-plugin-activation.php');

//http://tgmpluginactivation.com/
function atypic_register_required_plugins(){
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

add_action('tgmpa_register', 'atypic_register_required_plugins');

function change_default_jquery()
{
    if (site_url() !== 'http://testing.local') {
        wp_dequeue_script('jquery');
        wp_deregister_script('jquery');
    }
}

add_filter( 'show_admin_bar', '__return_false' );
add_filter('wp_enqueue_scripts', 'change_default_jquery', PHP_INT_MAX);


function atypique_features()
{
    register_nav_menus(array(
        'main_menu' => __('Main Menu', 'atypique'),
        'footer_menu' => __('Footer Menu', 'atypique')
    ));

    add_theme_support('custom-logo');
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'title-tag' );
}

add_action('after_setup_theme', 'atypique_features');

function atypic_styles()
{
    //wp_enqueue_style('normalize_styles', get_theme_file_uri('/normalize.css'));
    wp_enqueue_style('tailwind_styles', get_theme_file_uri('/style.css'));
    wp_enqueue_style( 'dashicons' );
    wp_enqueue_style('index_css', get_theme_file_uri('/build/css/index.css'));
    wp_enqueue_style('header_css', get_theme_file_uri('/build/css/header.css'));
    wp_enqueue_style('footer_css', get_theme_file_uri('/build/css/footer.css'));
    wp_enqueue_style('home_css', get_theme_file_uri('/build/css/home.css'));
    wp_enqueue_style('main_css', get_theme_file_uri('/build/css/main.css'));
    wp_enqueue_style('single_css', get_theme_file_uri('/build/css/single.css'));
}

add_action('wp_enqueue_scripts', 'atypic_styles');
