<?php

namespace AtypicTheme\Helpers;

/**
 * @method static string get_the_title(string $arg)
 */
class OG_Controller
{

    /**
     * @var string Just a test for DocBlock
     */
    private string  $test;

    /**
     * Use to display the right value for Open Graph title. OG is used by third party sites as informations for shared links.
     * 
     * @param string $arg Optional : Retrieves an arbitrary value
     * 
     * @return string The WP site title if it is the front page, otherwise the WP page title
     * 
     * @throws TypeError $arg must be a string
     */
    public static function get_the_title($arg = "")
    {   
        if($arg){
            if($arg !== "1"){
                throw new \TypeError("$arg have to be a string.");
            }
            return $arg;
        }
        
        return is_front_page() ? bloginfo("name") : wp_title("");
    }

    /**
     * Use to display the right value for Open Graph description. OG is used by third party sites as informations for shared links.
     * 
     * @return string The WP site description if this is the front page. Otherwise returns the exerpt if present, or "Missing description" if no exerpt.
     * 
     */
    public static function get_the_description()
    {
        return is_front_page()
            ? bloginfo("description")
            : (get_the_excerpt()
                ? print get_the_excerpt()
                : __("Missing description"));
    }

    /**
     * Use to display the right value for Open Graph url. OG is used by third party sites as informations for shared links.
     * 
     * @return string The current full URL either HTTP or HTTPS.
     * 
     */
    public static function get_the_url()
    {
        return "//" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
    }

    /**
     * Use to display the right value for Open Graph image. OG is used by third party sites as informations for shared links.
     * 
     * @return string The post attachment image url or the site logo url if there is no image attachment.
     * 
     */
    public static function get_the_image()
    {
        $custom_logo_id = get_theme_mod("custom_logo");
        $image = wp_get_attachment_image_src($custom_logo_id, "full");

        return has_post_thumbnail() ? get_the_post_thumbnail_url() : $image[0];
    }

    /**
     * Display Open Graph meta tags to share informations with other sites when they emebed a link from your site.
     * 
     * @return HTML Return meta automated meta tags to put in the html <head>.
     * 
     */
    public static function display_open_graph_meta_tags(){
    ?>
    <meta property="og:title" content="<?php self::get_the_title(); ?>" />
    <meta property="og:description" content="<?php self::get_the_description(); ?>" />
    <meta property="og:url" content="<?php self::get_the_url(); ?>" />
    <?php
    }
}