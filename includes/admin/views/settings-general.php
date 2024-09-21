<?php
/**
 * Template Name: T-Booking General Settings
 */
?>
<h2><?php _e('General Settings', 'tbooking'); ?></h2>
<p><?php _e('Manage general plugin settings here.', 'tbooking'); ?></p>
<table class="form-table">
    <tr>
        <th scope="row">
            <label for="tbooking_min_days"><?php _e('Minimum Booking Duration', 'tbooking'); ?></label>
        </th>
        <td>
            <input type="number" name="tbooking_min_days" id="tbooking_min_days" value="<?php echo esc_attr(get_option('tbooking_min_days', 2)); ?>" class="small-text">
        </td>
    </tr>
    <tr>
        <th scope="row">
            <label for="tbooking_max_days"><?php _e('Maximum Booking Duration', 'tbooking'); ?></label>
        </th>
        <td>
            <input type="number" name="tbooking_max_days" id="tbooking_max_days" value="<?php echo esc_attr(get_option('tbooking_max_days', 30)); ?>" class="small-text">
        </td>
    </tr>
    <tr>
        <th scope="row">
            <label for="tbooking_currency"><?php _e('Currency', 'tbooking'); ?></label>
        </th>
        <td>
            <input type="text" name="tbooking_currency" id="tbooking_currency" value="<?php echo esc_attr(get_option('tbooking_currency', 'USD')); ?>" class="regular-text">
        </td>
    </tr>
    <tr>
        <th scope="row">
            <label for="tbooking_currency_symbol"><?php _e('Currency Symbol', 'tbooking'); ?></label>
        </th>
        <td>
            <input type="text" name="tbooking_currency_symbol" id="tbooking_currency_symbol" value="<?php echo esc_attr(get_option('tbooking_currency_symbol', '$')); ?>" class="small-text">
        </td>
    </tr>
    <tr>
        <th scope="row">
            <label for="tbooking_email"><?php _e('Email Address', 'tbooking'); ?></label>
        </th>
        <td>
            <input type="email" name="tbooking_email" id="tbooking_email" value="<?php echo esc_attr(get_option('tbooking_email')); ?>" class="regular-text">
        </td>
    </tr>
</table>