<?php

/** Footer File
 * 
 * 
 * @package aquila
 */
?>
<footer id="site-footer" class="bg-light p-4">
    <div class="container color-gray">
        <div class="row">
            <section class="col-lg-4 col-md-6 col-sm-12">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quos
                eos magnam fugit voluptatibus quasi explicabo quibusdam tenetur provident recusandae deleniti!</section>
            <section class="col-lg-4 col-md-6 col-sm-12">
                <?php
                if (is_active_sidebar('sidebar-2')) {
                ?>
                <aside>
                    <?php dynamic_sidebar('sidebar-2') ?>
                </aside>
                <?php
                }
                ?>
            </section>
            <section class="col-lg-4 col-md-6 col-sm-12">
                <ul class="d-flex">
                    <li class="list-unstyled">
                        <a href="//fb.com/uzair.354123" title="Facebook">
                            <svg width="48">
                                <use href="#icon-facebook"></use>
                            </svg>
                        </a>
                    </li>
                    <li class="list-unstyled">
                        <a href="//linkedin.com/in/uzair-dev" title="Linkedin">
                            <svg width="48">
                                <use href="#icon-linkedin"></use>
                            </svg>
                        </a>
                    </li>
                    <li class="list-unstyled">
                        <a href="//twitter.com/uzair354123" title="Twitter">
                            <svg width="48">
                                <use href="#icon-twitter"></use>
                            </svg>
                        </a>
                    </li>
                </ul>
            </section>
        </div>
    </div>

</footer>
</div>
</div>
<?php
get_template_part('template-parts/content', 'svgs');
wp_footer();
?>
</body>

</html>