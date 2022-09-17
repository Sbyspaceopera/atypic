<header class="min-h-[15vh] z-10 sticky top-0 border-solid border-t-0 border-r-0 border-l-0 border-b-4 atypic-header bg-white w-full p-3 sm:p-5 flex items-center justify-between">
            <div class="flex gap-1 flex-wrap justify-center sm:gap-3">
                <div class="w-12 sm:w-20 flex">
                <?php has_custom_logo() ? the_custom_logo() : "" ?>
                </div>
                <a class="justify-end self-end text-left text-4xl sm:text-6xl text-black underline decoration-dotted decoration-yellow-500" href="<?php echo home_url() ?>">
                    <h1 class="font-title"><?php echo get_bloginfo('name'); ?></h1>
                </a>
            </div>

            <div class="skew-x-[-5deg] inline-block group hover:block self-center">
                    <span class="bg-black text-yellow-500 dashicons dashicons-menu"></span>
                    <?php
                    wp_nav_menu(array(
                        "theme_location" => "main_menu",
                        "container" => "nav",
                        "container_class" =>"atypic-nav-menu-top right-0",
                    ));
                    ?>
            </div>
    </header>