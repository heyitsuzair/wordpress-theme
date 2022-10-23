<?php

/** Main Header File
 * 
 * 
 * @package aquila
 */

use AQUILA_THEME\Inc\Menus;

?>

<?php
$menu_class = Menus::get_instance();

// passing theme location
$header_menu_id = $menu_class->getMenuId('aquila_header_menu');

$header_menus = wp_get_nav_menu_items($header_menu_id);

?>

<nav class="navbar navbar-expand-lg bg-dark">
    <div class="container">
        <a class="navbar-brand text-light" href="#"><?php
                                                    if (function_exists('the_custom_logo')) {
                                                        the_custom_logo();
                                                    } else {
                                                        get_the_title();
                                                    }
                                                    ?></a>
        <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <?php
            if (!empty($header_menus) && is_array($header_menus)) {
            ?>
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <?php
                    foreach ($header_menus as $menu) {
                        if (!$menu->menu_item_parent) {
                            $child_menu_items = $menu_class->get_child_menu_items($header_menus, $menu->ID);
                            $has_children = !empty($child_menu_items) && is_array($child_menu_items);

                            if (!$has_children) {
                    ?>

                <li class="nav-item">
                    <a class="nav-link text-light"
                        href="<?php echo esc_url($menu->url); ?>"><?php echo esc_html($menu->title); ?></a>
                </li>
                <?php
                            } else {
                            ?>
                <li class="nav-item dropdown">
                    <a class="nav-link text-light dropdown-toggle" href="<?php echo esc_url($menu->url); ?>"
                        role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <?php echo esc_html($menu->title); ?>
                    </a>
                    <ul class="dropdown-menu">

                        <?php
                                        foreach ($child_menu_items as $menu_item) {
                                        ?>

                        <li><a class="dropdown-item"
                                href="<?php echo esc_url($menu_item->url) ?>"><?php echo esc_html($menu_item->title) ?></a>
                        </li>
                    </ul>
                </li>
                <?php
                                        }
                                    }
                                }
                            }
                ?>
            </ul>
            <?php
            }
            ?>

            <?php get_search_form(); ?>
            <!-- <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form> -->
        </div>
    </div>
</nav>