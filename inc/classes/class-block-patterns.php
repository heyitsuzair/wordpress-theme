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

            /**
             * Cover Pattern
             */

            $cover_content = $this->getPatternContent('template-parts/patterns/cover');

            register_block_pattern(
                'aquila/cover',
                [
                    'title'       => __('Aquila Cover', 'aquila'),
                    'description' => _x('Aquila Cover Block With Image And Text', 'aquila'),
                    'categories' => ['cover'],
                    'content'     => $cover_content,
                ]
            );

            /**
             * Two Columns Pattern
             */

            $columns_content = $this->getPatternContent('template-parts/patterns/two_columns');

            register_block_pattern(
                'aquila/two_columns',
                [
                    'title'       => __('Aquila Columns', 'aquila'),
                    'description' => _x('Aquila Two Columns', 'aquila'),
                    'categories' => ['columns'],
                    'content'     => $columns_content,
                ]
            );
        }
    }

    public function getPatternContent($template_path)
    {
        ob_start();

        get_template_part($template_path);

        $pattern_content = ob_get_contents();

        ob_end_clean();

        return $pattern_content;
    }

    public function registerPatternsCategories()
    {
        $pattern_categories = [
            'cover' => __('Cover', 'aquila'),
            'columns' => __('Columns', 'aquila'),
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