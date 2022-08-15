<?php get_header() ?>

<main id="atypic-main" class="flex py-5 px-1" >
    <div class="atypic-main-left-laurel self-center w-0 sm:visible md:w-1/5">
        <?php get_template_part('assets/svg/laurel', 'single-left.svg') ?>
    </div>

    <div class="p-5 md:w-3/5">
        <?php 
        $categories = get_categories(array(
            'orderby' => 'name',
            'parent' => 0,
            'hide_empty' => false,
        ));

        if($categories){
            foreach($categories as $category){
            ?>
            <div class="bg-blue-100 w-full">
                <section>
                    <header>
                        <h2><?php echo $category->name ?></h2>
                        <p><?php echo $category->description ?></p>
                    </header>
                    <main>
                        <?php 
                        $posts = get_posts(array(
                            'numberposts' => 2,
                            'category' => $category->term_id,
                        ));
                        
                        foreach($posts as $post){ ?>
                            <h3><?php echo $post->post_title ?></h3>
                            <p>
                                <?php echo wp_trim_words($post->post_content) ?>...
                            </p>
                            <a href="<?php echo get_permalink($post->ID) ?>">Lire la suite</a>
                        <?php
                        }

                        ?>
                    </main>
                </section>
            </div>
            <?php
            }        
        }

        ?>
        
    </div>

    <div class="atypic-main-right-laurel self-center w-0 md:visible md:w-1/5">
        <?php get_template_part('assets/svg/laurel', 'single-right.svg') ?>
    </div>
</main>

<?php get_footer() ?>