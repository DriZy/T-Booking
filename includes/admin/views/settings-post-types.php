
<?php
/**
 * Template Name: T-Booking Post Types Settings
 */
?>
<h2><?php _e('Select Post Types for Booking', 'tbooking'); ?></h2>
<table class="form-table">
    <tr valign="top">
        <th scope="row"><?php _e('Post Types', 'tbooking'); ?></th>
        <td>
            <?php
            $post_types = get_post_types(array('public' => true), 'objects');
            $enabled_post_types = get_option('tbooking_enabled_post_types', array());
            foreach ($post_types as $post_type) {
                ?>
                <label>
                    <input type="checkbox" name="tbooking_enabled_post_types[]" value="<?php echo esc_attr($post_type->name); ?>" <?php checked(in_array($post_type->name, $enabled_post_types)); ?>>
                    <?php echo esc_html($post_type->label); ?>
                </label><br>
                <?php
            }
            ?>
        </td>
    </tr>
</table>
