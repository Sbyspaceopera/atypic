<?php get_header(); ?>

<main class="atypic-main">
    <h2 class="text-white text-center bg-black sm:rounded-xl text-3xl">Derniers articles</h2>
    <div class="atypic-home">
        <?php
        $categories = get_categories([
            "orderby" => "date",
            "order" => "DESC",
            "parent" => 0,
        ]);

        if ($categories) {
            foreach ($categories as $key => $category) { ?>
                <section class="w-full xl:grid grid-cols-3 grid-rows-2 bg-white sm:rounded-xl">
                    <header class="flex flex-col bg-black justify-between sm:rounded-tl-xl sm:rounded-tr-xl xl:rounded-bl-xl xl:rounded-tr-none  w-full bg-no-repeat bg-center bg-cover col-span-1 row-span-2 p-3">
                        <h3 class="font-semibold text-white text-2xl text-center">
                            <a href="<?php echo get_category_link(
                                $category->term_id,
                            ); ?>"><?php echo $category->name; ?></a>
                        </h3>
                        <p class="text-white text-xl text-center"><?php echo $category->description; ?></p>
                        <a class="text-center text-white text-xl underline decoration-atypic-primary decoration-dashed underline-offset-4 decoration-2" href="<?php echo get_category_link(
                            $category->term_id,
                        ); ?>">Tous les articles</a>
                    </header>
                    <main class="flex flex-col justify-around gap-3 col-span-2 row-span-2 p-2.5 sm:rounded-b-xl xl:rounded-bl-none xl:border-4 border-black xl:rounded-r-xl">
                            <?php
                            $posts = get_posts([
                                "numberposts" => 2,
                                "category" => $category->term_id,
                            ]);

                            foreach ($posts as $key_post => $post) {
                                if ($key_post !== 0) {
                                    echo "<hr>";
                                } ?>

                                <h3 class="text-center xl:text-start">
                                    <a class="text-black text-xl font-semibold underline decoration-atypic-primary decoration-dotted decoration-[5px]" href="<?php echo get_permalink(
                                        $post->ID,
                                    ); ?>"><?php echo $post->post_title; ?></a>
                                </h3>

                                <div class="flex justify-center xl:justify-start text-black font-semibold flex-wrap gap-3">
                                    <?php
                                    $tags = get_the_tag_list(
                                        "",
                                        "",
                                        "",
                                        $post->ID,
                                    );
                                    echo $tags;
                                    ?>
                                </div>
                                <p>
                                    <?php echo wp_trim_words(
                                        $post->post_content,
                                        35,
                                    ); ?>
                                </p>
                                <div class="flex justify-between items-center">
                                    <a class="text-black underline font-semibold decoration-atypic-primary decoration-2 underline-offset-2 decoration-dashed" href="<?php echo get_permalink(
                                        $post->ID,
                                    ); ?>">Lire la suite</a>
                                    <p class="text-sm italic font-semibold text-black"><?php echo get_the_date(); ?></p>
                                </div>
                            <?php
                            }
                            ?>
                    </main>
                </section>
        <?php }
        }
        ?>

    </div>
</main>

<?php get_footer(); ?>
