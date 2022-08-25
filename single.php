<?php get_header() ?>

<main id="atypic-main" class="flex py-5 px-1">
    <div class="atypic-main-left-laurel self-center w-0 sm:visible md:w-1/5">
        <?php get_template_part('assets/svg/laurel', 'single-left.svg') ?>
    </div>
    <div class="p-5 md:w-3/5">
        <h1 class="text-2xl text-center font-semibold">
            <?php the_title();?>
        </h1>
        <p class="text-sm italic text-blue-500 text-center"><?php echo get_the_date() ?></p>
        <div class="flex gap-2 py-1 text-black font-semibold flex-wrap justify-center">
            <?php
            $tags = get_the_tag_list('', '', '', get_the_ID());
            echo $tags;
            ?>
        </div>
        <?php the_content() ?>
        <?php 
            //This will call wpDiscuz insteed of classic comments template thanks to the plugin behavior.
            comments_template() 
        ?> 
    </div>
    <div class="atypic-main-right-laurel self-center w-0 md:visible md:w-1/5">
        <?php get_template_part('assets/svg/laurel', 'single-right.svg') ?>
    </div>
</main>

<?php get_footer() ?>