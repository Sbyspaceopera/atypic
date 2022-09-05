<footer class="atypic-footer w-full h-15 p-3 bg-black text-white flex justify-between felx-wrap">
    <div class="w-[5rem] min-w-[4rem] border-r-2 pr-2 border-r-yellow-500 flex items-center content-center justify-center">
        <?php the_custom_logo(); ?>
    </div>
    <?php
    wp_nav_menu(array(
        "theme_location" => "footer_menu",
        "container" => "nav",
        "container_class" => "text-lg sm:text-xl"
    ));
    ?>
    <div class="flex items-center content-center flex-wrap gap-2 border-l-2 border-yellow-500 pl-2">
        <a href="https://github.com/Sbyspaceopera"><img class="w-[3rem] invert saturate-200" src="<?php echo get_template_directory_uri() ?>/build/images/GitHub-Mark-120px-plus.png"></a>
        <a href="https://www.linkedin.com/in/sebastiencorbisier/"><span class="dashicons dashicons-linkedin"></span></a>
        <a href="https://www.instagram.com/aiwillreplaceinflucencers/"><span class="dashicons dashicons-instagram"></span></a>
        <a href="https://tournesol.app/"><img class="w-[3rem]" src="https://tournesol.app/svg/LogoSmall.svg"></a>
    </div>
</footer>

<?php wp_footer(); ?>
</body>

</html>