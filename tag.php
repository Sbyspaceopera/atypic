<?php get_header() ?>

<main id="atypic-main atypic-tag" class="flex py-5 px-1">
    <div class="atypic-main-left-laurel self-center w-0 sm:visible md:w-1/5">
        <?php get_template_part('assets/svg/laurel', 'single-left.svg') ?>
    </div>
    <div class="p-5 md:w-3/5">
        <h1 class="text-center">Tag : <?php single_tag_title(); ?></h1>
        <?php
        // Display optional category description
        if (tag_description()) : ?>
            <p class="text-center"><?php echo tag_description(); ?></p>
        <?php endif; ?>
        <div>
            <?php
            $wp_query = new WP_Query(['tag_id' => get_queried_object()->term_id]);
            while ($wp_query->have_posts()) : the_post(); ?>
                <h3 class="text-center text-xl font-semibold">
                    <a class="text-black underline decoration-yellow-500 decoration-dotted" href="<?php the_permalink() ?>"><?php the_title() ?></a>
                </h3>

                <div class="flex text-black font-semibold flex-wrap gap-3">
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
                    <p class="text-sm italic text-blue-500 font-semibold"><?php echo get_the_date() ?></p>
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