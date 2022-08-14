<?php get_header() ?>

<main id="atypic-main" class="flex py-5 px-1 bg-cover" >
    <div class="atypic-main-left-laurel self-center w-0 sm:visible md:w-1/5">
        <img class="w-full" src="<?php echo get_template_directory_uri() ?>/build/images/laurel-single.svg">
    </div>
    <div class="p-5 md:w-3/5"><?php the_content() ?></div>
    <div class="atypic-main-right-laurel self-center w-0 md:visible md:w-1/5">
        <img class="w-full -scale-x-100" src="<?php echo get_template_directory_uri() ?>/build/images/laurel-single-right.svg">
    </div>
</main>

<?php get_footer() ?>