<?php

/** Main Header File
 * 
 * 
 * @package aquila
 */


namespace AQUILA_THEME\Inc;

use AQUILA_THEME\Inc\Traits\Singleton;

class Menus
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

        add_action('init', [$this, 'registerMenus']);
    }

    public function registerMenus()
    {
        register_nav_menus(
            [
                'aquila_header_menu' => esc_html('Header Menu', 'aquila'),
                'aquila_footer_menu' => esc_html('Footer Menu', 'aquila')
            ]
        );
    }

    public function getMenuId($location)
    {
        // Get All The Locations Available In Site

        $locations = get_nav_menu_locations();

        // Get The Object Id By Location
        $menu_id = $locations[$location];

        return !empty($menu_id) ? $menu_id : "";
    }

    /**
     * Get all child menus that has given parent menu id.
     *
     * @param array   $menu_array Menu array.
     * @param integer $parent_id Parent menu id.
     *
     * @return array Child menu array.
     */

    public function get_child_menu_items($menu_array, $parent_id)
    {
        $child_menus = [];

        if (!empty($menu_array) && is_array($menu_array)) {
            foreach ($menu_array as $menu) {
                if (intval($menu->menu_item_parent) === $parent_id) {
                    array_push($child_menus, $menu);
                }
            }
        }

        return $child_menus;
    }
}