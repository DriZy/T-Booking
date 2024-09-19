<?php

/**
 * View all bookings page.
 *
 * @package T-Booking
 * @since 1.0.0
 */
function tbooking_view_all_bookings_page() {
    // Fetch bookings (replace with actual WooCommerce bookings retrieval)
    $bookings = get_all_woocommerce_bookings(); // Placeholder function

    // Load the bookings view template
    include(TBOOKING_PLUGIN_DIR . 'includes/templates/bookings-view.php');
}


/**
 * View individual booking details.
 *
 * @package T-Booking
 * @since 1.0.0
 *
 * @param int $booking_id Booking ID.
 */
function tbooking_view_booking_details_page($booking_id) {
    // Fetch booking details by ID (replace with actual function)
    $booking = get_woocommerce_booking_by_id($booking_id); // Placeholder function

    // Load the booking details view template
    include(TBOOKING_PLUGIN_DIR . 'includes/templates/booking-details.php');
}



///**
// * Get all WooCommerce bookings.
// *
// * @return array The WooCommerce bookings.
// */
//function get_all_woocommerce_bookings() {
//    // Placeholder function to fetch WooCommerce bookings
//    return array();
//}

/**
 * Example function to fetch WooCommerce bookings (to be replaced with real data).
 *
 * @package T-Booking
 * @since 1.0.0
 *
 * @return array List of bookings.
 */
function get_all_woocommerce_bookings() {
    // Fetch from WooCommerce bookings
    return [
        [
            'id' => 1,
            'product' => 'Room A',
            'customer' => 'John Doe',
            'date' => '2024-09-19',
            'status' => 'confirmed',
        ],
        // Add more bookings here...
    ];
}
