<?php

/**
 * Page template
 *
 * @package Aquila
 */

use AQUILA_THEME\Inc\Loadmore_Post;

get_header();

$loadmore_posts = Loadmore_Post::get_instance();

?>

<div class="container">
    <h1 class="mb-4">Loadmore/Infinite Scroll Demo</h1>
    <?php $loadmore_posts->post_script_load_more(); ?>
</div>

<?php get_footer(); ?>