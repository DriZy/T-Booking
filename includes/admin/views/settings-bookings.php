<?php
/**
 * Template Name: T-Booking Bookings List
 */
?>
<h2><?php _e('Bookings Overview', 'tbooking'); ?></h2>

<form method="get" action="">
    <input type="hidden" name="page" value="tbooking-bookings">
    <label for="filter_status"><?php _e('Filter by Status:', 'tbooking'); ?></label>
    <select name="filter_status" id="filter_status">
        <option value=""><?php _e('All', 'tbooking'); ?></option>
        <option value="pending" <?php selected($_GET['filter_status'], 'pending'); ?>><?php _e('Pending', 'tbooking'); ?></option>
        <option value="confirmed" <?php selected($_GET['filter_status'], 'confirmed'); ?>><?php _e('Confirmed', 'tbooking'); ?></option>
        <option value="cancelled" <?php selected($_GET['filter_status'], 'cancelled'); ?>><?php _e('Cancelled', 'tbooking'); ?></option>
    </select>

    <label for="filter_date"><?php _e('Filter by Date:', 'tbooking'); ?></label>
    <input type="date" name="filter_date" value="<?php echo isset($_GET['filter_date']) ? esc_attr($_GET['filter_date']) : ''; ?>">

    <input type="submit" value="<?php _e('Filter', 'tbooking'); ?>" class="button">
</form>

<table class="wp-list-table widefat fixed striped">
    <thead>
    <tr>
        <th><?php _e('Booking ID', 'tbooking'); ?></th>
        <th><?php _e('Customer Name', 'tbooking'); ?></th>
        <th><?php _e('Status', 'tbooking'); ?></th>
        <th><?php _e('Date', 'tbooking'); ?></th>
        <th><?php _e('Total Price', 'tbooking'); ?></th>
        <th><?php _e('Actions', 'tbooking'); ?></th>
    </tr>
    </thead>
    <tbody>
    <?php
    $args = array(
        'post_type' => 'booking',
        'posts_per_page' => -1,
    );

    if (isset($_GET['filter_status']) && !empty($_GET['filter_status'])) {
        $args['meta_query'][] = array(
            'key' => 'booking_status',
            'value' => sanitize_text_field($_GET['filter_status']),
        );
    }

    if (isset($_GET['filter_date']) && !empty($_GET['filter_date'])) {
        $args['meta_query'][] = array(
            'key' => 'booking_date',
            'value' => sanitize_text_field($_GET['filter_date']),
        );
    }

    $bookings = new WP_Query($args);

    if ($bookings->have_posts()) {
        while ($bookings->have_posts()) {
            $bookings->the_post();
            ?>
            <tr>
                <td><?php the_ID(); ?></td>
                <td><?php the_field('customer_name'); ?></td>
                <td><?php the_field('booking_status'); ?></td>
                <td><?php the_field('booking_date'); ?></td>
                <td><?php the_field('total_price'); ?></td>
                <td>
                    <a href="<?php echo get_edit_post_link(); ?>" class="button button-primary"><?php _e('View', 'tbooking'); ?></a>
                </td>
            </tr>
            <?php
        }
    } else {
        ?>
        <tr>
            <td colspan="6"><?php _e('No bookings found', 'tbooking'); ?></td>
        </tr>
        <?php
    }
    wp_reset_postdata();
    ?>
    </tbody>
</table>
