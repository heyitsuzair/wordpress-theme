<?php

/**
 * Theme Functions
 * @package aquila
 */

function aquila_enqueue_scripts()
{
    // wp_enqueue_style('stylesheet-1', get_template_directory_uri() . '/main.css', ['stylesheet-2']);

    wp_enqueue_style('stylesheet-2', get_stylesheet_uri(), [], filemtime(get_template_directory() . '/style.css'), 'all');
}
add_action('wp_enqueue_scripts', 'aquila_enqueue_scripts');