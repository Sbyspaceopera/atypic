<?php get_header(); ?>

<main id="atypic-main" class="flex py-5 md:px-1 atypic-home">
    <div class="atypic-main-left-laurel self-center w-0 md:visible md:w-1/5 md:px-1">
        <?php get_template_part('assets/svg/laurel', 'single-left.svg') ?>
    </div>

    <div class="md:w-3/5 w-full flex flex-col gap-5 justify-around">
        <?php
        $decColors = ['decoration-yellow-500', 'decoration-sky-500', 'decoration-lime-500', 'decoration-red-500', 'decoration-purple-500'];
        $textColors = ['text-yellow-500', 'text-sky-500', 'text-lime-500', 'text-red-500', 'text-purple-500'];

        $categories = get_categories(array(
            'orderby' => 'date',
            'order' => 'DESC',
            'parent' => 0,
        ));

        if ($categories) {
            foreach ($categories as $key => $category) {
        ?>
                <section class="w-full xl:grid grid-cols-3 grid-rows-2 shadow-lg rounded-tl-xl rounded-tr-xl xl:rounded-xl">
                    <header class="flex flex-col justify-center rounded-tl-xl rounded-tr-xl xl:rounded-tr-none xl:rounded-bl-xl xl:rounded-tl-xl w-full bg-no-repeat bg-center bg-cover col-span-1 row-span-2 p-1" style="background-image: linear-gradient(to bottom, rgba(0,0,0,0.75), rgba(0,0,0,0.75)), url(<?php echo get_template_directory_uri() ?>/build/images/300930rgsdl.jpg)">
                        <h2 class="font-semibold <?php echo $textColors[$key] ?> text-2xl text-white text-center">
                            <a href="<?php echo get_category_link($category->term_id) ?>"><?php echo $category->name ?></a>
                        </h2>
                        <p class="text-white text-xl text-center"><?php echo $category->description ?></p>
                    </header>
                    <main class="flex flex-col justify-around gap-2 col-span-2 row-span-2 p-2 xl:rounded-tr-xl xl:rounded-br-xl">
                            <?php
                            $posts = get_posts(array(
                                'numberposts' => 2,
                                'category' => $category->term_id,
                            ));

                            foreach ($posts as $key_post=>$post) { ?>

                                <h3 class="underline <?php echo $decColors[$key] ?> text-xl font-semibold">
                                    <a href="<?php echo get_permalink($post->ID) ?>"><?php echo $post->post_title ?></a>
                                </h3>

                                <div class="flex py-1 text-black text-xs font-semibold flex-wrap gap-2">
                                    <?php
                                    $tags = get_the_tag_list('', '', '', $post->ID);
                                    echo $tags;
                                    ?>
                                </div>
                                <p>
                                    <?php echo wp_trim_words($post->post_content, 35) ?>
                                </p>
                                <div class="flex justify-between items-center">
                                    <a class="text-blue-500 underline font-semibold" href="<?php echo get_permalink($post->ID) ?>">Lire la suite</a>
                                    <p class="text-sm italic text-blue-500"><?php echo get_the_date() ?></p>
                                </div>
                            <?php
                                if($key_post === 0){
                                    echo '<hr>';
                                }

                            }

                            ?>
                    </main>
                </section>
        <?php
            }
        }

        ?>

    </div>

    <div class="atypic-main-right-laurel self-center w-0 md:visible md:w-1/5 md:px-1">
        <?php get_template_part('assets/svg/laurel', 'single-right.svg') ?>
    </div>
</main>

<?php get_footer() ?>