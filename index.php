<?php

/** Main Template File 
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
                ?>

            <?php
                while (have_posts()) : the_post();
                    the_title();
                    the_excerpt();
                endwhile;
                ?>
        </div>
        <?php
        }
        ?>
    </main>
</div>

<?php
get_footer();
?>