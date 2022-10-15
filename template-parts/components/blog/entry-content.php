<?php

/** Template for post entry header
 * 
 *  To Be Used Inside WordPress "The Loop"
 * 
 * @package aquila
 */
?>

<div class="entry-content d-flex flex-column">
    <?php
    if (is_single()) {
        the_content(sprintf(wp_kses(
            __('Continue Reading %s <span class="meta-nav">&rarr;</span>', 'aquila'),
            [
                'span' => [
                    'class' => []
                ],
            ],

        ), the_title('<span class="screen-reader-text">', '</span>', false)));
        wp_link_pages([
            'before' => '<div class="page-links">' . esc_html('Pages:', 'aquila') . '',
            'after' => '</div>',
        ]);
    } else {
        aquila_the_excerpt(50);
        echo aquila_excerpt_more();
    }


    ?>
</div>