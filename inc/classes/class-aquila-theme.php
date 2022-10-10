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
    }
}