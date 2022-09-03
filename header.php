<!DOCTYPE html>
<html lang="<?php bloginfo('language') ?>">

<head>
    <meta charset="<?php bloginfo('charset') ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>

<body>
    <header class="bg-no-repeat atypic-header bg-cover bg-center" style="background-image: url(https://images.rawpixel.com/image_1000/czNmcy1wcml2YXRlL3Jhd3BpeGVsX2ltYWdlcy93ZWJzaXRlX2NvbnRlbnQvbHIvcGQyMjAtcGRmYW1vdXNwYWludGluZ2V0YzA4MzAwOS1pbWFnZV8zLmpwZw.jpg)">
        <div class="h-full w-full">
                <div class="h-full w-full bg-black/75 rounded-bl-full rounded-br-full flex flex-col items-center justify-evenly">
                    <div class="w-40">
                            <?php the_custom_logo(); ?>
                    </div>
                    <a href="<?php echo home_url() ?>"><h1 class="text-4xl sm:text-6xl underline underline-offset-[6px] decoration-yellow-500 decoration-4"><?php echo get_bloginfo('name'); ?></h1></a>
                    <?php
                    wp_nav_menu(array(
                        "theme_location" => "main_menu",
                        "container" => "nav",
                        "container_class" =>"text-2xl sm:text-4xl",
                    ));
                    ?>
                    <a href="#atypic-main"><span class="dashicons dashicons-arrow-down-alt2 w-5" style="font-size:larger"></span></a>
                </div>   
        </div>
    </header>