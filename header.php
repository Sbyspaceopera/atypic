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
        <div class="h-full w-full flex">
                <div class="w-3/4 h-full bg-black/75 rounded-tr-full rounded-br-full p-5">
                    <div class="w-1/4 border-r-4 border-r-yellow-500 pr-5">
                            <?php the_custom_logo(); ?>
                    </div>
                    <h1 class="pl-2">| <?php echo get_bloginfo('name'); ?></h1>
                    <?php
                    wp_nav_menu(array(
                        "theme_location" => "main_menu",
                        "container" => "nav"
                    ));
                    ?>
                </div>
                
        </div>
    </header>