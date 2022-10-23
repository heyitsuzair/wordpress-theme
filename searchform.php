<?php

/** Custom Search Form File
 * 
 * 
 * @package aquila
 */

?>

<form method="GET" action="<?php esc_url(home_url('/')); ?>" class="d-flex" role="search">
    <input class="form-control me-2" type="search"
        placeholder="<?php echo esc_attr_x('Search', 'placeholder', 'aquila') ?>" aria-label="Search"
        value="<?php the_search_query() ?>" name="s">
    <button class="btn btn-outline-success"
        type="submit"><?php echo esc_attr_x('Search', 'submit button', 'aquila') ?></button>
    e
</form>