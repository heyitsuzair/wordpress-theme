<?php

/** Template for Post Footer
 * 
 *  To Be Used Inside WordPress "The Loop"
 * 
 * @package aquila
 */
?>

<?php
$the_post_id = get_the_ID();
$article_terms = wp_get_post_terms($the_post_id, ['category', 'post_tag']);

if (empty($article_terms) || !is_array($article_terms)) return;
?>

<div class="entry-footer mb-4">
    <?php
    foreach ($article_terms as $article_term) {

    ?>
    <button class="btn border border-secondary mb-2 mr-2 mt-2">
        <a class="entry-footer-link text-black-50 td-none" href="<?php echo esc_url(get_term_link($article_term)); ?>">
            <?php echo esc_html($article_term->name) ?>
        </a>
    </button>
    <?php
    }
    ?>
</div>