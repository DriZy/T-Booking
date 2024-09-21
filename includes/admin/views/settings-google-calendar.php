<?php
/**
 * Template Name: T-Booking Google Calendar Settings
 */
?>
<h2><?php _e('Google Calendar Settings', 'tbooking'); ?></h2>
<table class="form-table">
    <tr valign="top">
        <th scope="row"><?php _e('Google Calendar Status', 'tbooking'); ?></th>
        <td>
            <label>
                <input type="checkbox" name="tbooking_google_calendar_status" value="on" <?php checked(get_option('tbooking_google_calendar_status'), 'on'); ?>>
                <?php _e('Enable Google Calendar Sync', 'tbooking'); ?>
            </label>
        </td>
    </tr>
    <tr valign="top">
        <th scope="row"><?php _e('Google Client ID', 'tbooking'); ?></th>
        <td>
            <input type="text" name="tbooking_google_client_id" value="<?php echo esc_attr(get_option('tbooking_google_client_id')); ?>" class="regular-text">
        </td>
    </tr>
    <tr valign="top">
        <th scope="row"><?php _e('Google Client Secret', 'tbooking'); ?></th>
        <td>
            <input type="text" name="tbooking_google_client_secret" value="<?php echo esc_attr(get_option('tbooking_google_client_secret')); ?>" class="regular-text">
        </td>
    </tr>
</table>
