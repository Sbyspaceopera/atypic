<footer class="atypic-footer w-full h-15 bg-black text-white flex justify-between p-3 felx-wrap">
    <div class="w-[5rem] min-w-[4rem] border-r-4 border-r-yellow-500 pr-5 flex items-center content-center justify-center">
        <?php the_custom_logo(); ?>
    </div>
    <?php
    wp_nav_menu(array(
        "theme_location" => "footer_menu",
        "container" => "nav"
    ));
    ?>
    <div class="flex items-center content-center flex-wrap gap-2">
        <a href="https://github.com/Sbyspaceopera"><img class="w-[3rem] invert saturate-200" src="<?php echo get_template_directory_uri() ?>/build/images/GitHub-Mark-120px-plus.png"></a>
        <a href="https://www.linkedin.com/in/sebastiencorbisier/"><span class="dashicons dashicons-linkedin"></span></a>
        <a href="https://www.instagram.com/aiwillreplaceinflucencers/"><span class="dashicons dashicons-instagram"></span></a>
    </div>
</footer>

<?php wp_footer(); ?>
</body>

</html>