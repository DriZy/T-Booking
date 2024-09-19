<?php

/**
 * Settings view template.
 *
 * This template displays the settings page for the T-Booking plugin.
 *
 * @package T-Booking
 * @since 1.0.0
 */
?>

<div class="wrap">
    <h1><?php _e('T-Booking Settings', 'tbooking'); ?></h1>
    <form method="post" action="options.php">
        <?php
        settings_fields('tbooking_settings_group');
        do_settings_sections('tbooking-settings');
        submit_button();
        ?>
    </form>

    <h2><?php _e('Configurations', 'tbooking'); ?></h2>
    <table class="form-table">
        <tr>
            <th><?php _e('Base Configurations', 'tbooking'); ?></th>
            <td>
                <!-- Add more configuration fields as needed -->
                <input type="text" name="tbooking_basic_config" value="<?php echo esc_attr(get_option('tbooking_basic_config')); ?>" />
            </td>
        </tr>

        <tr>
            <th><?php _e('Airbnb API Key', 'tbooking'); ?></th>
            <td>
                <input type="text" name="tbooking_airbnb_api_key" value="<?php echo esc_attr(get_option('tbooking_airbnb_api_key')); ?>" />
            </td>
        </tr>

        <!-- Add fields for other settings such as styling, calendar, WooCommerce, maps, etc. -->

    </table>
</div>
