<?php
    use Atypic\Helpers\OG_Controller;
    require_once(get_template_directory().'/includes/open_graph_tags_controller.php');
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> >

<head>
    <meta charset="<?php bloginfo('charset') ?>">
    <meta name="description" content="<?php bloginfo('description') ?>" >
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="og:title" content="<?php OG_Controller::get_the_title() ?>" />
    <meta property="og:description" content="<?php OG_Controller::get_the_description()  ?>" />
    <meta property="og:url" content="<?php OG_Controller::get_the_url() ?>" />
    <?php wp_head(); ?>
</head>

<body class="h-full  w-full">
    <header class="min-h-[10vh] border-dashed border-t-0 border-r-0 border-l-0 border-b-4 atypic-header bg-white w-full p-3 sm:p-5 flex items-center justify-between">
            <div class="flex gap-1 flex-wrap justify-center sm:gap-3">
                <div class="w-12 sm:w-20 invert flex">
                        <?php the_custom_logo(); ?>
                </div>
                <a class="justify-end self-end text-left text-4xl sm:text-6xl text-black underline decoration-dotted decoration-yellow-500" href="<?php echo home_url() ?>">
                    <h1><?php echo get_bloginfo('name'); ?></h1>
                </a>
            </div>
            <div class="skew-x-[-5deg] inline-block group hover:block self-center sm:self-end">
                    <span class="bg-black text-yellow-500 dashicons dashicons-arrow-down-alt2"></span>
                    <?php
                    wp_nav_menu(array(
                        "theme_location" => "main_menu",
                        "container" => "nav",
                        "container_class" =>"atypic-nav-menu right-0",
                    ));
                    ?>
            </div>
    </header>