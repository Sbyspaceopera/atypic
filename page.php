<?php get_header() ?>

<main id="atypic-main" class="flex py-5">
    <div class="w-0 sm:visible sm:w-1/5">
        <img class="-translate-x-1.5 w-full" src="<?php echo get_template_directory_uri() ?>/assets/images/Steren_Twisted_Branch_4.svg">
    </div>
    <div class="p-5 md:w-3/5"><?php the_content() ?></div>
    <div class="w-0 md:visible sm:w-1/5">
        <img class="translate-x-1.5 w-full -scale-x-100" src="<?php echo get_template_directory_uri() ?>/assets/images/Steren_Twisted_Branch_4.svg">
    </div>
</main>

<?php get_footer() ?>