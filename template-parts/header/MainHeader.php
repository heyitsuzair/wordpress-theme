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
echo '<pre>';
var_dump($header_menus);

wp_die();
?>

<nav class="navbar navbar-expand-lg bg-dark">
    <div class="container-fluid">
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
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link text-light active" aria-current="page" href="#">Home</a>
                </li>

            </ul>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>