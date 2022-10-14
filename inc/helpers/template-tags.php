<?php
// function get_the_post_custom_thumbnail($post_id, $size = 'featured-large', $additional_attr = [])
// {
//     $custom_thumbnail = '';

//     if ($post_id === null) {
//         $post_id = get_the_ID();
//     }

//     if (has_post_thumbnail($post_id)) {
//         $default_attr = [
//             'loading' => 'lazy'
//         ];
//         $attributes = array_merge($additional_attr, $default_attr);

//         $custom_thumbnail = wp_get_attachment_image(get_post_thumbnail_id($post_id), $size, false, $additional_attr);
//     }

//     return $custom_thumbnail;
// }

// function the_post_custom_thumbnail($post_id, $size = 'featured-large', $additional_attr = [])
// {
//     echo get_the_post_thumbnail($post_id, $size, $additional_attr);
// }

function aquila_posted_on()
{
    $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

    // Post Is Modified 
    if (get_the_time('U') !== get_the_modified_time('U')) {
        $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
    }

    $time_string = sprintf(
        $time_string,
        esc_attr(get_the_date(DATE_W3C)),
        esc_attr(get_the_date()),
        esc_attr(get_the_modified_date(DATE_W3C)),
        esc_attr(get_the_modified_date()),
    );

    $posted_on = sprintf(esc_html_x('Posted On %s', 'post date', 'aquila'), '<a href="' . esc_url(get_the_permalink()) . '" rel="bookmark">' . $time_string . '</a>');

    echo '<span class="posted-on text-secondary">' . $posted_on . '</span>';
}