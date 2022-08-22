<?php get_header() ?>

<main id="atypic-main" class="flex py-5 px-1" >
    <div class="atypic-main-left-laurel self-center w-0 sm:visible md:w-1/5">
        <?php get_template_part('assets/svg/laurel', 'single-left.svg') ?>
    </div>
    <div class="p-5 md:w-3/5">
        <h2 class="text-center text-6xl font-bold">404</h2> 
        <p class="text-center">
            Cette page n'existe pas, retournez plutôt sur
            <a class="underline" href="<?php site_url() ?>"> la page d'acceuil</a> ou servez vous des menus.
        </p>
    </div>
    <div class="atypic-main-right-laurel self-center w-0 md:visible md:w-1/5">
        <?php get_template_part('assets/svg/laurel', 'single-right.svg') ?>
    </div>
</main>

<?php get_footer() ?>