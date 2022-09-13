<footer class="atypic-footer border-solid border-b-0 border-r-0 border-l-0 border-t-4 border-white w-full h-15 p-3 bg-black text-white flex justify-between felx-wrap min-h-[10vh]">

    <div class="skew-x-[-5deg] relative inline-block group hover:block self-center">
        <?php
        wp_nav_menu(array(
            "theme_location" => "main_menu",
            "container" => "nav",
            "container_class" => "atypic-nav-menu-bottom bottom-[100%]",
        ));
        ?>
        <span class="bg-white rotate-180 text-yellow-500 dashicons dashicons-menu"></span>
    </div>

    <div class="flex items-center content-center flex-wrap gap-2">
        <a target="_blank" href="https://github.com/Sbyspaceopera"><img class="w-[3rem] invert saturate-200" src="<?php echo get_template_directory_uri() ?>/build/images/GitHub-Mark-120px-plus.png"></a>
        <a target="_blank" href="https://www.linkedin.com/in/sebastiencorbisier/"><span class="dashicons dashicons-linkedin"></span></a>
        <a target="_blank" href="https://www.instagram.com/aiwillreplaceinflucencers/"><span class="dashicons dashicons-instagram"></span></a>
        <a target="_blank" href="https://tournesol.app/"><img class="w-[3rem]" src="https://tournesol.app/svg/LogoSmall.svg"></a>
        <div class="w-[3rem] invert flex items-center content-center justify-center">
            <?php the_custom_logo(); ?>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>

</html>