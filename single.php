<?php get_header() ?>

<main id="atypic-main" class="flex py-5 px-1" >
    <div class="atypic-main-left-laurel self-center w-0 sm:visible md:w-1/5">
        <?php get_template_part('assets/svg/laurel', 'single-left.svg') ?>
    </div>
    <div class="p-5 md:w-3/5"><?php the_content() ?></div>
    <div class="atypic-main-right-laurel self-center w-0 md:visible md:w-1/5">
        <?php get_template_part('assets/svg/laurel', 'single-right.svg') ?>
    </div>
</main>

<?php get_footer() ?>