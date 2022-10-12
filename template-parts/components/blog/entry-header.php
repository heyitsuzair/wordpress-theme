<?php

/** Template for post entry header
 * 
 * 
 * @package aquila
 */
?>

<?php
$post_id = get_the_ID();
$has_post_thumbnail = get_the_post_thumbnail();
?>

<header class="entry-header">
    <?php
    if ($has_post_thumbnail) :
    ?>
    <div class="entry-image mb-3">
        <a href=<?php echo esc_url(get_permalink()); ?>>
            <?php
                the_post_thumbnail('featured-thumbnail');
                ?>
        </a>
    </div>
    <?php
    endif
    ?>
</header>