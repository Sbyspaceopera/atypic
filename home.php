<?php get_header() ?>

<main class="container bg-blue-100">
    <h1><?php wp_title('|', true,'left'); ?></h1>
    <?php the_content() ?>
</main>

<?php get_footer() ?>