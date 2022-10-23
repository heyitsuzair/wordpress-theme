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
        $this->setup_hooks();
    }

    protected function setup_hooks()
    {
        /**
         * Actions
         */

        add_action('after_setup_theme', [$this, 'setupTheme']);
    }

    public function setupTheme()
    {
        add_theme_support('title-tag');

        add_theme_support('custom-logo', [
            'header-text' => ['site-title', 'site-description'],
            'height' => 100,
            'width' => 400,
            'flex-height' => true,
            'flex-width' => true,
        ]);

        add_theme_support('custom-background', [
            'default-color' => 'white',
            'default-image' => '',
            'default-repeat'  => 'no-repeat',
            'default-position-x'  => 'center',
        ]);

        add_theme_support('post-thumbnails');

        add_theme_support('customize-selective-refresh-widgets');

        add_theme_support('automatic-feed-links');

        add_theme_support('html5', [
            'search_form',
            'comment-form',
            'gallery',
            'caption',
            'script',
            'style'
        ]);

        add_theme_support('wp-block-styles');

        add_theme_support('align-wide');

        add_image_size('featured-thumbnail', 350, 233, true);

        /**
         * Add The Path For The Custom Editor Style
         */

        add_editor_style('assets/build/css/editor.css');

        // Removing Core Block Patterns
        remove_theme_support('core-block-patterns');

        global $content_width;

        if (!isset($content_width)) {
            $content_width = 1240;
        }
    }
}