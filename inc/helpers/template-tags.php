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

    $posted_on = sprintf(esc_html_x('Posted On %s', 'post date', 'aquila'), '<a class="td-none" href="' . esc_url(get_the_permalink()) . '" rel="bookmark">' . $time_string . '</a>');

    echo '<span class="posted-on text-secondary">' . $posted_on . '</span>';
}

function aquila_posted_by()
{
    $byline = sprintf(esc_html_x(' By %s', 'post author', 'aquila'), '<span class="author vcard"><a href=' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '>' . esc_html(get_the_author()) . '</a></span>');

    echo '<span class="byline text-secondary">' . $byline . '</span>';
}

function aquila_the_excerpt($trim_char_count = 0)
{
    if (!has_excerpt() || $trim_char_count === 0) {
        the_excerpt();
        return;
    }

    $excerpt = wp_strip_all_tags(get_the_excerpt());

    $excerpt = substr($excerpt, 0, $trim_char_count);
    $excerpt = substr($excerpt, 0, strrpos($excerpt, ''));

    echo $excerpt . ' [...]';
}

function aquila_excerpt_more($more = '')
{
    if (!is_single()) {
        $more = sprintf('<button class="mt-4 btn btn-info"><a class="td-none aquila-read-more text-light" href="%1$s">%2$s</a></button>', esc_url(get_permalink(get_the_ID())), __('Read More', 'aquila'));
    }

    return $more;
}