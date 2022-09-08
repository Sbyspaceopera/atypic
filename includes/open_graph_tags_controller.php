<?php

namespace Atypic\Helpers;



class OG_Controller{
    public static function get_the_title(){
        is_front_page() ? bloginfo('name') : wp_title('');
    }

    public static function get_the_description(){
        is_front_page() ? bloginfo('description') : (the_excerpt() ? the_excerpt() :  "Description manquante");
    }

    public static function get_the_url(){
        echo "//".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    }

}