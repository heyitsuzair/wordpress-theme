<?php

/** Single Post Page File 
 * 
 * 
 * @package aquila
 */

get_header();
?>



<div class="primary">
    <main id="main" class="site-main mt-5" role="main">
        <?php
        if (have_posts()) {
        ?>
        <div class="container">

            <?php
                if (is_home() && !is_front_page()) {

                ?>
            <header class="mb-5">
                <h1 class="page-title">
                    <?php echo single_post_title(); ?>
                </h1>
            </header>
            <?php
                }

                while (have_posts()) : the_post();

                    get_template_part('./template-parts/content');
                endwhile;
            } else {
                get_template_part('./template-parts/content-none');
            }
            ?>

        </div>
    </main>
</div>

<?php
get_footer();
?>