<?php
/**
 * Template for displaying booking details.
 *
 * This template displays the details of a specific booking.
 *
 * @package T-Booking
 * @since 1.0.0
 */

?>

<div class="wrap">
    <h1><?php _e('Booking Details', 'tbooking'); ?></h1>
    <p><strong><?php _e('Booking ID:', 'tbooking'); ?></strong> <?php echo esc_html($booking['id']); ?></p>
    <p><strong><?php _e('Product:', 'tbooking'); ?></strong> <?php echo esc_html($booking['product']); ?></p>
    <p><strong><?php _e('Customer:', 'tbooking'); ?></strong> <?php echo esc_html($booking['customer']); ?></p>
    <p><strong><?php _e('Date:', 'tbooking'); ?></strong> <?php echo esc_html($booking['date']); ?></p>
    <p><strong><?php _e('Status:', 'tbooking'); ?></strong> <?php echo esc_html($booking['status']); ?></p>
</div>