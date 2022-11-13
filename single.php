<?php get_header(); ?>

<main class="atypic-main">
    <div class="atypic-single">
        <h1 class="text-2xl text-center font-semibold underline decoration-dotted decoration-yellow-500 decoration-[5px]">
            <?php the_title(); ?>
        </h1>
        <div>
            <p class="text-lg text-yellow-500 italic font-semibold text-center"><?php echo get_the_date(); ?></p>
        </div>
        <?php if (has_post_thumbnail()) {
            the_post_thumbnail("full", ["class" => "w-full self-center mb-2"]);
        } ?>
        <div class="flex gap-3 py-1 text-black font-semibold flex-wrap justify-center">
            <?php
            // Styles : index.scss
            $tags = get_the_tag_list("", "", "", get_the_ID());
            echo $tags;
            ?>
       
        </div>
        <?php the_content(); ?>
        <?php //This will call wpDiscuz insteed of classic comments template thanks to the plugin behavior.

comments_template(); ?> 
    </div>
</main>

<?php get_footer(); ?>
