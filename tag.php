<?php get_header() ?>

<main class="atypic-main text-center">
    <div class="atypic-tag">
        <header class="border-t-0 border-l-0 border-r-0 border-solid border-yellow-500">
            <h2 class="bg-yellow-500 p-0.5 inline text-3xl bottom-0">#<?php single_tag_title(); ?></h2>
        </header>
        <?php
        // Display optional category description
        if (tag_description()) : ?>
            <p class="text-center"><?php echo tag_description(); ?></p>
        <?php endif; ?>
        <div>
            <?php
            $wp_query = new WP_Query(['tag_id' => get_queried_object()->term_id]);
            while ($wp_query->have_posts()) : the_post(); ?>
                <h3 class="text-center text-2xl font-semibold">
                    <a class="text-black underline decoration-yellow-500 decoration-dotted" href="<?php the_permalink() ?>"><?php the_title() ?></a>
                </h3>

                <div class="flex justify-center text-black font-semibold flex-wrap gap-3">
                    <?php
                    $tags = get_the_tag_list('', '', '', get_the_ID());
                    echo $tags;
                    ?>
                </div>
                <p class="text-left">
                    <?php echo wp_trim_words(get_the_content(), 35) ?>
                </p>
                <div class="flex justify-between items-center">
                                    <a class="text-black underline font-semibold decoration-yellow-500 decoration-2 underline-offset-2 decoration-dashed" href="<?php echo get_permalink($post->ID) ?>">Lire la suite</a>
                                    <p class="text-sm italic font-semibold text-black"><?php echo get_the_date() ?></p>
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
</main>

<?php get_footer(); ?>