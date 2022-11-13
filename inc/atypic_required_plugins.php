<?php

namespace AtypicTheme\Functions;

require_once get_template_directory() . "/inc/class-tgm-plugin-activation.php";

//http://tgmpluginactivation.com/
//Plugins dependencies
function atypic_register_required_plugins()
{
    $plugins = [
        [
            "name" => "wpDiscuz",
            "slug" => "wpdiscuz",
            "required" => true,
            "force_activation" => true,
        ],
        [
            "name" => "CMB2",
            "slug" => "cmb2",
            "required" => true,
            "force_activation" => true,
        ],
        [
            "name" => "Highlighting Code Block",
            "slug" => "highlighting-code-block",
            "required" => true,
            "force_activation" => true,
        ],
    ];

    $config = [
        "dismissable" => false,
        "is_automatic" => true,
    ];

    tgmpa($plugins, $config);
}
add_action(
    "tgmpa_register",
    "\AtypicTheme\Functions\atypic_register_required_plugins",
);
