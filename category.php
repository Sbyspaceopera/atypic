<?php get_header(); ?>

<main class="atypic-main">
    <div class="atypic-category p-0 sm:rounded-t-lg">
        <header class="w-full sm:rounded-t-lg">
            <h1 class="text-center text-atypic-primary text-3xl bg-black mt-0 p-3 sm:rounded-t-lg"><?php single_cat_title(); ?></h1>
            <div class="border-2 border-x-0 border-t-0 border-dashed border-atypic-primary">
                <span class="text-center font-semibold center italic semi-bold border-2 border-x-0 border-t-0 border-dashed border-atypic-primary"><?php echo category_description(); ?></span>
            </div>
        </header>

        <main class="px-3 sm:px-8">
            <?php
            $wp_query = new WP_Query([
                "cat" => get_cat_ID(get_query_var("cat")),
            ]);
            while ($wp_query->have_posts()):
                the_post(); ?>
                <h3 class="text-center text-2xl font-semibold">
                    <a class="text-black underline decoration-atypic-primary decoration-dotted" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </h3>

                <div class="flex text-black justify-center font-semibold flex-wrap gap-3">
                    <?php
                    $tags = get_the_tag_list("", "", "", get_the_ID());
                    echo $tags;
                    ?>
                </div>
                <p>
                    <?php echo wp_trim_words(get_the_content(), 35); ?>
                </p>
                <div class="flex justify-between items-center">
                    <a class="text-blue-500 underline font-semibold" href="<?php echo get_permalink(
                        $post->ID,
                    ); ?>">Lire la suite</a>
                    <p class="text-sm italic font-semibold text-blue-500"><?php echo get_the_date(); ?></p>
                </div>
                <?php if (
                    $wp_query->current_post + 1 !=
                    $wp_query->post_count
                ) {
                    echo "<hr>";
                } ?>
            <?php
            endwhile;
            wp_reset_postdata();
            ?>
        </main>
    </div>
</main>

<?php get_footer(); ?>
