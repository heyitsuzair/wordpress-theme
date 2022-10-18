<?php

/**
 * Cover Block Pattern
 *
 * @package Aquila
 */

$cover_style = sprintf('<img
 class="wp-block-cover__image-background wp-image-18" alt=""
 src="%s"
data-object-fit="cover" />', esc_url(AQUILA_BUILD_IMG_URI . '/patterns/cover.png'));
?>

<!-- wp:cover {"url":"<?php echo esc_url(AQUILA_BUILD_IMG_URI . '/patterns/cover.png') ?>","id":18,"dimRatio":50,"isDark":false,"align":"wide"} -->
<div class="wp-block-cover alignwide is-light"><span aria-hidden="true"
        class="wp-block-cover__background has-background-dim"></span>
    <?php echo $cover_style; ?>
    <div class="wp-block-cover__inner-container">
        <!-- wp:paragraph {"align":"center","placeholder":"Write title…","fontSize":"large"} -->
        <p class="has-text-align-center has-large-font-size">My Block Pattern</p>
        <!-- /wp:paragraph -->
    </div>
</div>
<!-- /wp:cover -->