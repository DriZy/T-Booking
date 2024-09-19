<?php
/**
 * Template for displaying all bookings.
 *
 * This template displays a list of all bookings in a table format.
 *
 * @package T-Booking
 * @since 1.0.0
 */

?>

<div class="wrap">
    <h1><?php _e('All Bookings', 'tbooking'); ?></h1>
    <table class="wp-list-table widefat fixed striped">
        <thead>
        <tr>
            <th><?php _e('Booking ID', 'tbooking'); ?></th>
            <th><?php _e('Product', 'tbooking'); ?></th>
            <th><?php _e('Customer', 'tbooking'); ?></th>
            <th><?php _e('Date', 'tbooking'); ?></th>
            <th><?php _e('Status', 'tbooking'); ?></th>
            <th><?php _e('Action', 'tbooking'); ?></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($bookings as $booking): ?>
            <tr>
                <td><?php echo esc_html($booking['id']); ?></td>
                <td><?php echo esc_html($booking['product']); ?></td>
                <td><?php echo esc_html($booking['customer']); ?></td>
                <td><?php echo esc_html($booking['date']); ?></td>
                <td><?php echo esc_html($booking['status']); ?></td>
                <td><a href="?page=tbooking-all-bookings&booking_id=<?php echo esc_html($booking['id']); ?>"><?php _e('View', 'tbooking'); ?></a></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>