<?php

/**
 * Bootstraps the Theme.
 *
 * @package Aquila
 */

namespace AQUILA_THEME\Inc;

use AQUILA_THEME\Inc\Traits\Singleton;

class AQUILA_THEME
{
    use Singleton;


    protected function __construct()
    {

        /**
         @get_instance(): To Load Classes
         */

        Assets::get_instance();
        Menus::get_instance();
        Meta_Boxes::get_instance();
        Sidebars::get_instance();
        Block_Patterns::get_instance();
        Blocks::get_instance();
        Loadmore_Post::get_instance();
        Loadmore_Single::get_instance();
        Register_Post_Types::get_instance();
        Register_Taxonomy::get_instance();
        Archive_Settings::get_instance();
        Theme_Support::get_instance();
    }
}