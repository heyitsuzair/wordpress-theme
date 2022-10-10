<?php

/**
 * Enqueue Theme Assets
 *
 * @package Aquila
 */

namespace AQUILA_THEME\Inc;

use AQUILA_THEME\Inc\Traits\Singleton;

class Assets
{
    use Singleton;


    protected function __construct()
    {

        $this->setup_hooks();
    }

    protected function setup_hooks()
    {
        /**
          @Actions
         */

        add_action('wp_enqueue_scripts', [$this, 'registerStyles']);
        add_action('wp_enqueue_scripts', [$this, 'registerScripts']);
    }

    public function registerStyles()
    {
        // wp_enqueue_style('stylesheet-1', get_template_directory_uri() . '/main.css', ['stylesheet-2']);

        /**
         * CSS Registration
         * @package aquila
         */

        wp_register_style('stylesheet-2', get_stylesheet_uri(), [], filemtime(AQUILA_DIR_PATH . '/style.css'), 'all');
        wp_register_style('bootstrap_css', AQUILA_DIR_URI . '/assets/libraries/bootstrap/bootstrap.min.css', [], false, 'all');

        /**
         * CSS Enqueue
         * @package aquila
         */

        wp_enqueue_style('stylesheet-2');
        wp_enqueue_style('bootstrap_css');
    }

    public function registerScripts()
    {
        /**
         * JavaScript Registration
         * @package aquila
         */

        wp_register_script('script-1', AQUILA_DIR_URI . '/assets/js/index.js', ['jquery'], filemtime(AQUILA_DIR_PATH . '/assets/js/index.js'), true);
        wp_register_script('bootstrap_js', AQUILA_DIR_URI . '/assets/libraries/bootstrap/bootstrap.bundle.min.js', ['jquery'], false, true);

        /**
         * JavaScript Enqueue
         * @package aquila
         */

        wp_enqueue_script('script-1');
        wp_enqueue_script('bootstrap_js');
    }
}