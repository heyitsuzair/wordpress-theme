<?php

/**
 * Theme Functions
 * @package aquila
 */

if (!defined('AQUILA_DIR_PATH')) {
    define('AQUILA_DIR_PATH', untrailingslashit(get_template_directory()));
}

require_once AQUILA_DIR_PATH . './inc/helpers/autoloader.php';

function aquila_get_theme_instance()
{
    \AQUILA_THEME\Inc\AQUILA_THEME::get_instance();
}

aquila_get_theme_instance();



function aquila_enqueue_scripts()
{
    // wp_enqueue_style('stylesheet-1', get_template_directory_uri() . '/main.css', ['stylesheet-2']);

    /**
     * CSS Registration
     * @package aquila
     */

    wp_register_style('stylesheet-2', get_stylesheet_uri(), [], filemtime(get_template_directory() . '/style.css'), 'all');
    wp_register_style('bootstrap_css', get_template_directory_uri() . '/assets/libraries/bootstrap/bootstrap.min.css', [], false, 'all');

    /**
     * CSS Enqueue
     * @package aquila
     */

    wp_enqueue_style('stylesheet-2');
    wp_enqueue_style('bootstrap_css');

    /**
     * JavaScript Registration
     * @package aquila
     */

    wp_register_script('script-1', get_template_directory_uri() . '/assets/js/index.js', ['jquery'], filemtime(get_template_directory() . '/assets/js/index.js'), true);
    wp_register_script('bootstrap_js', get_template_directory_uri() . '/assets/libraries/bootstrap/bootstrap.bundle.min.js', ['jquery'], false, true);

    /**
     * JavaScript Enqueue
     * @package aquila
     */

    wp_enqueue_script('script-1');
    wp_enqueue_script('bootstrap_js');
}
add_action('wp_enqueue_scripts', 'aquila_enqueue_scripts');