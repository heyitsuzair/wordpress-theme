<?php

/** Main Header File
 * 
 * 
 * @package aquila
 */


namespace AQUILA_THEME\Inc;

use AQUILA_THEME\Inc\Traits\Singleton;

class Menus
{
    use Singleton;


    protected function __construct()
    {

        $this->setup_hooks();
    }

    public function setup_hooks()
    {
        /**
         * Actions
         */

        add_action('init', [$this, 'registerMenus']);
    }

    public function registerMenus()
    {
        register_nav_menus(
            [
                'aquila_header_menu' => esc_html('Header Menu', 'aquila'),
                'aquila_footer_menu' => esc_html('Footer Menu', 'aquila')
            ]
        );
    }
}