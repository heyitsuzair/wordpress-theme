<?php

/**
 * Page template
 *
 * @package Aquila
 */

use AQUILA_THEME\Inc\Load_More;
use AQUILA_THEME\Inc\Loadmore_Post;

get_header();

$loadmore_posts = Loadmore_Post::get_instance();

?>

<div class="container">
    <h1 class="mb-4">Loadmore/Infinite Scroll Demo</h1>
    <?php echo do_shortcode('[post_listings]'); ?>
</div>

<?php get_footer(); ?>