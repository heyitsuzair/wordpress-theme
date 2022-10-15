<?php

/** Template for post entry header
 * 
 *  To Be Used Inside WordPress "The Loop"
 * 
 * @package aquila
 */
?>

<div class="entry-meta mb-3">
    <?php
    aquila_posted_on();

    aquila_posted_by();
    ?>
</div>