<?php
/**
 * Template Name: T-Booking Airbnb Integration
 */
?>
<h2><?php _e('Airbnb Integration', 'tbooking'); ?></h2>
<table class="form-table">
    <tr valign="top">
        <th scope="row"><?php _e('Airbnb Client ID', 'tbooking'); ?></th>
        <td>
            <input type="text" name="tbooking_airbnb_client_id" value="<?php echo esc_attr(get_option('tbooking_airbnb_client_id')); ?>" class="regular-text">
        </td>
    </tr>
    <tr valign="top">
        <th scope="row"><?php _e('Airbnb Client Secret', 'tbooking'); ?></th>
        <td>
            <input type="text" name="tbooking_airbnb_client_secret" value="<?php echo esc_attr(get_option('tbooking_airbnb_client_secret')); ?>" class="regular-text">
        </td>
    </tr>
</table>
