<?php get_header(); ?>

<main class="atypic-main" >
    <div class="atypic-page">
        <h2 class="text-center mt-0 border-solid border-y-2 border-x-0 border-atypic-primary"><?php the_title(); ?></h2>
        <?php if (has_post_thumbnail()) {
            the_post_thumbnail("large", ["class" => "w-full self-center mb-2"]);
        } ?>
        <?php the_content(); ?>
    </div>
</main>

<?php get_footer(); ?>
