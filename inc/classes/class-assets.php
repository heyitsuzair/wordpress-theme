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
        add_action('enqueue_block_assets', [$this, 'registerBlockAssets']);
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

        wp_register_style('index.scss', AQUILA_BUILD_CSS_URI . '/index.css', ['bootstrap_css'], filemtime(AQUILA_BUILD_CSS_DIR_PATH . '/index.css'), 'all');

        /**
         * CSS Enqueue
         * @package aquila
         */

        wp_enqueue_style('bootstrap_css');
        wp_enqueue_style('stylesheet-2');
        wp_enqueue_style('index.scss');
    }

    public function registerScripts()
    {
        /**
         * JavaScript Registration
         * @package aquila
         */

        wp_register_script('index.js', AQUILA_BUILD_JS_URI . '/index.js', ['jquery'], filemtime(AQUILA_BUILD_JS_DIR_PATH . '/index.js'), true);

        wp_register_script('bootstrap_js', AQUILA_DIR_URI . '/assets/libraries/bootstrap/bootstrap.bundle.min.js', ['jquery'], false, true);

        /**
         * JavaScript Enqueue
         * @package aquila
         */

        wp_enqueue_script('index.js');
    }

    public function registerBlockAssets()
    {
        $assets_config_file = sprintf('%s/assets.php', AQUILA_BUILD_PATH);

        if (!file_exists($assets_config_file)) return;

        $asset_config = require_once $assets_config_file;

        if (empty($asset_config['js/editor.js'])) return;

        $editor_assets = $asset_config['js/editor.js'];

        $js_dependencies = !empty($editor_assets['dependencies']) ? $editor_assets['dependencies'] : [];
        $version = !empty($editor_assets['version']) ? $editor_assets['version'] : filemtime($assets_config_file);

        // theme gutenberg block js
        if (is_admin()) {
            wp_enqueue_script('aquila-block-js', AQUILA_BUILD_JS_URI . '/block.js', $js_dependencies, $version, true);
        }

        // theme gutenberg block css
        $css_dependenices = ['wp-block-library-theme', 'wp-block-library'];

        wp_enqueue_style('aquila-block-css', AQUILA_BUILD_CSS_URI . '/block.css', $css_dependenices, filemtime(AQUILA_BUILD_CSS_DIR_PATH . '/block.css'), 'all');
    }
}