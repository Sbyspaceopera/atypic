<?php get_header() ?>

<main id="atypic-main" class="flex py-5 px-1">
    <div class="atypic-main-left-laurel self-center w-0 sm:visible md:w-1/5">
        <?php get_template_part('assets/svg/laurel', 'single-left.svg') ?>
    </div>
    <div class="p-5 md:w-3/5">
        <h1 class="text-center">Catégorie : <?php single_cat_title(); ?></h1>
        <?php
        // Display optional category description
        if (category_description()) : ?>
            <p class="text-center"><?php echo category_description(); ?></p>
        <?php endif; ?>
        <div>
            <?php
            $wp_query = new WP_Query(["cat" => get_cat_ID(get_query_var('cat'))]);
            while ($wp_query->have_posts()) : the_post(); ?>
                <h3 class="underline text-xl font-semibold">
                    <a href="<?php the_permalink() ?>"><?php the_title() ?></a>
                </h3>

                <div class="flex py-1 text-black italic text-xs font-semibold flex-wrap gap-2">
                    <?php
                    $tags = get_the_tag_list('', '', '', get_the_ID());
                    echo $tags;
                    ?>
                </div>
                <p>
                    <?php echo wp_trim_words(get_the_content(), 35) ?>
                </p>
                <div class="flex justify-between items-center">
                    <a class="text-blue-500 underline font-semibold" href="<?php echo get_permalink($post->ID) ?>">Lire la suite</a>
                    <p class="text-sm italic text-blue-500"><?php echo get_the_date() ?></p>
                </div>
                <?php
                if ($wp_query->current_post + 1 != $wp_query->post_count) {
                    echo '<hr>';
                }
                ?>
            <?php
            endwhile;
            wp_reset_postdata()
            ?>
        </div>
    </div>
    <div class="atypic-main-right-laurel self-center w-0 md:visible md:w-1/5">
        <?php get_template_part('assets/svg/laurel', 'single-right.svg') ?>
    </div>
</main>

<?php get_footer(); ?>