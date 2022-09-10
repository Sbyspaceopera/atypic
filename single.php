<?php get_header() ?>

<main id="atypic-main" class="flex py-5 px-1">
    <div class="atypic-single p-5 md:w-3/5">
        <h1 class="text-2xl text-center font-semibold underline decoration-dotted decoration-yellow-500">
            <?php the_title();?>
        </h1>
        <p class="text-sm italic text-blue-500 font-semibold text-center"><?php echo get_the_date() ?></p>
        <div class="flex gap-3 py-1 text-black font-semibold flex-wrap justify-center">
            <?php
            // Styles : index.scss
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
</main>

<?php get_footer() ?>