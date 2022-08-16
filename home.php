<?php get_header(); ?>

<main id="atypic-main" class="flex py-5 px-1" >
    <div class="atypic-main-left-laurel self-center w-0 sm:visible md:w-1/5 md:px-1">
        <?php get_template_part('assets/svg/laurel', 'single-left.svg') ?>
    </div>

    <div class="md:w-3/5 w-full flex flex-col justify-around">
        <?php 
        $decColors = ['decoration-yellow-500','decoration-sky-500','decoration-lime-500','decoration-red-500', 'decoration-purple-500'];
        $textColors = ['text-yellow-500','text-sky-500','text-lime-500','text-red-500', 'text-purple-500'];

        $categories = get_categories(array(
            'orderby' => 'name',
            'parent' => 0,
            'hide_empty' => false,
        ));

        if($categories){
            foreach($categories as $key=>$category){
            ?>
                <section class="w-full lg:grid grid-cols-3 grid-rows-2 min-h-[20rem] py-5">
                    <header class="min-h-[5rem] rounded-tl-xl rounded-tr-xl lg:rounded-tr-none lg:rounded-bl-xl border-2 border-black w-full bg-no-repeat bg-center bg-cover col-span-1 row-span-2 p-1" style="background-image: linear-gradient(to bottom, rgba(0,0,0,0.75), rgba(0,0,0,0.75)), url(https://images.rawpixel.com/image_1000/czNmcy1wcml2YXRlL3Jhd3BpeGVsX2ltYWdlcy93ZWJzaXRlX2NvbnRlbnQvbHIvcGQyMjAtcGRmYW1vdXNwYWludGluZ2V0YzA4MzAwOS1pbWFnZV8zLmpwZw.jpg)">
                        <h2 class="font-semibold <?php echo $textColors[$key] ?> text-3xl text-white text-center">
                            <a href="<?php echo get_category_link($category->term_id) ?>"><?php echo $category->name ?></a>
                        </h2>
                        <p class="text-white text-xl"><?php echo $category->description ?></p>
                    </header>
                    <main class="border-2 min-h-[15rem] border-black col-span-2 row-span-2 p-1 lg:rounded-tr-xl lg:rounded-br-xl">
                        <div class="flex flex-col justify-around">
                        <?php 
                        $posts = get_posts(array(
                            'numberposts' => 2,
                            'category' => $category->term_id,
                        ));
                        
                        foreach($posts as $post){ ?>
                            <h3 class="underline <?php echo $decColors[$key] ?> text-2xl">
                                <a href="<?php echo get_permalink($post->ID) ?>"><?php echo $post->post_title ?></a>
                            </h3>
                            <p>
                                <?php echo wp_trim_words($post->post_content,35) ?>
                            </p>
                            <a class="text-blue-500 underline font-semibold" href="<?php echo get_permalink($post->ID) ?>">Lire la suite</a>
                        <?php
                        }

                        ?>
                        </div>
                    </main>
                </section>
            <?php
            }        
        }

        ?>
        
    </div>

    <div class="atypic-main-right-laurel self-center w-0 md:visible md:w-1/5 md:px-1">
        <?php get_template_part('assets/svg/laurel', 'single-right.svg') ?>
    </div>
</main>

<?php get_footer() ?>