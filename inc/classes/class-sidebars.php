<?php

/** FIle To Register Sidebars
 * 
 * 
 * @package aquila
 */


namespace AQUILA_THEME\Inc;

use AQUILA_THEME\Inc\Traits\Singleton;

class Sidebars
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

        add_action('widgets_init', [$this, 'registerSidebars']);
    }

    public function registerSidebars()
    {
        register_sidebar([
            'name'          => __('Sidebar', 'aquila'),
            'id'            => 'sidebar-1',
            'description' => __('Main Sidebar', 'aquila'),
            'before_widget' => '<div id="%1$s" class="widget widget-sidebar %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        ]);
        register_sidebar([
            'name'          => __('Footer', 'aquila'),
            'id'            => 'sidebar-2',
            'description' => __('Main Sidebar', 'aquila'),
            'before_widget' => '<div id="%1$s" class="widget footer-sidebar cell column %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        ]);
    }
}