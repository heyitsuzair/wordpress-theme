<?php

/**
 * Register Meta Boxes
 *
 * @package Aquila
 */

namespace AQUILA_THEME\Inc;

use AQUILA_THEME\Inc\Traits\Singleton;

class Meta_Boxes
{
    use Singleton;

    public function __construct()
    {
        $this->setup_hooks();
    }

    public function setup_hooks()
    {

        /**
         * Actions
         */

        add_action('add_meta_boxes', [$this, 'addMetaBoxes']);
    }

    public function addMetaBoxes()
    {
        $screens = ['post'];
        foreach ($screens as $screen) {
            add_meta_box(
                'hide-page-title',                 // Unique ID
                __('Hide Page Title', 'aquila'),      // Box title
                [$this, 'customMetaBoxHtml'],  // Content callback, must be of type callable
                $screen, // Post type
                'side' // Context (Where To Show)
            );
        }
    }
    public function customMetaBoxHtml($post)
    {
        $value = get_post_meta($post->ID, '_hide_page_title', true);
?>
<label for="aquila_field"><?php esc_html_e('Hide Page Title', 'aquila'); ?></label>
<select name="aquila_field" id="aquila-field" class="postbox">
    <option value=""><?php esc_html_e('Select', 'aquila'); ?></option>
    <option value="yes" <?php selected($value, 'yes'); ?>><?php esc_html_e('Yes', 'aquila'); ?></option>
    <option value="no" <?php selected($value, 'no'); ?>><?php esc_html_e('No', 'aquila'); ?></option>
</select>
<?php

    }
}