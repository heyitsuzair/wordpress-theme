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
        add_action('save_post', [$this, 'savePost']);
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
        /**
         * Use Nonce Verification
         */

        wp_nonce_field(plugin_basename(__FILE__), 'hide_title_meta_box_nonce');
?>
<label for="aquila_field"><?php esc_html_e('Hide Page Title', 'aquila'); ?></label>
<select name="aquila_hide_title_field" id="aquila-field" class="postbox">
    <option value=""><?php esc_html_e('Select', 'aquila'); ?></option>
    <option value="yes" <?php selected($value, 'yes'); ?>><?php esc_html_e('Yes', 'aquila'); ?></option>
    <option value="no" <?php selected($value, 'no'); ?>><?php esc_html_e('No', 'aquila'); ?></option>
</select>
<?php

    }

    public function savePost($post_id)
    {
        /**
        First @param on array_key_exists is the "name" attribute of field from which data is coming in our case it is select with name="aquila_hide_title_field"
        Second @param of update_post_meta is "meta_key" that you have to put when you called "get_post_meta". Its Second Param is "meta_key"
         */

        /**
         * When Post is saved or updated we get $_POST available
         * Check If Current User Is Authorized To Do This
         */

        if (!current_user_can('edit_posts')) return;

        /**
         * Check If The Nonce Value We Received Is Same We Created
         */

        if (!isset($_POST['hide_title_meta_box_nonce']) || !wp_verify_nonce($_POST['hide_title_meta_box_nonce'], plugin_basename(__FILE__))) return;

        if (array_key_exists('aquila_hide_title_field', $_POST)) {
            update_post_meta(
                $post_id,
                '_hide_page_title',
                $_POST['aquila_hide_title_field']
            );
        }
    }
}
