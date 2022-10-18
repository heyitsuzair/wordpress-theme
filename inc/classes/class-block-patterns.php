<?php

/**
 * Enqueue Theme Assets
 *
 * @package Aquila
 */

namespace AQUILA_THEME\Inc;

use AQUILA_THEME\Inc\Traits\Singleton;

class Block_Patterns
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
        add_action('init', [$this, 'registerPatterns']);
        add_action('init', [$this, 'registerPatternsCategories']);
    }

    public function registerPatterns()
    {
        if (function_exists('register_block_pattern')) {
            register_block_pattern(
                'aquila/cover',
                [
                    'title'       => __('Aquila Cover', 'aquila'),
                    'description' => _x('Aquila Cover Block With Image And Text', 'aquila'),
                    'categories' => ['cover'],
                    'content'     => '<!-- wp:cover {"url":"http://localhost/wordpress_theme/wp-content/uploads/2022/10/1460px-React_logo-1-1-1.png","id":18,"dimRatio":50,"isDark":false,"align":"wide"} -->
                    <div class="wp-block-cover alignwide is-light"><span aria-hidden="true" class="wp-block-cover__background has-background-dim"></span><img class="wp-block-cover__image-background wp-image-18" alt="" src="http://localhost/wordpress_theme/wp-content/uploads/2022/10/1460px-React_logo-1-1-1.png" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:paragraph {"align":"center","placeholder":"Write title…","fontSize":"large"} -->
                    <p class="has-text-align-center has-large-font-size">My Block Pattern</p>
                    <!-- /wp:paragraph --></div></div>
                    <!-- /wp:cover -->',
                ]
            );
        }
    }

    public function registerPatternsCategories()
    {
        $pattern_categories = [
            'cover' => __('Cover', 'aquila'),
            'carousel' => 'Carousel',
        ];
        if (function_exists('register_block_pattern_category')) {
            foreach ($pattern_categories as $category => $label) {
                register_block_pattern_category(
                    $category,
                    ['label' => __($label, 'aquila')]
                );
            }
        }
    }
}