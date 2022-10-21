<?php

/**
 * Blocks Assets
 *
 * @package Aquila
 */

namespace AQUILA_THEME\Inc;

use AQUILA_THEME\Inc\Traits\Singleton;

class Blocks
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
        add_action('block_categories_all', [$this, 'addBlockCategories']);
    }

    public function addBlockCategories($categories)
    {
        $category_slug = wp_list_pluck($categories, 'slug');

        $result = in_array('aquila', $category_slug, true) ? $categories : array_merge($categories, [
            [
                'slug' => 'aquila',
                'title' => __('Aquila Blocks', 'aquila'),
                'icon' => 'table-row-after'
            ]
        ]);

        return $result;
    }
}