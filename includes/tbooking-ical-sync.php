<?php
/**
 * Sync iCal from Airbnb using Airbnb API key.
 *
 * @package T-Booking
 * @since 1.0.0
 */
function tbooking_sync_airbnb_ical() {
    $api_key = get_option('tbooking_airbnb_api_key');
    if (empty($api_key)) {
        return;
    }

    // Assume the Airbnb API or iCal URL is derived from the key
    $ical_url = 'https://api.airbnb.com/v2/calendar/sync?key=' . esc_attr($api_key);

    $response = wp_remote_get($ical_url);
    if (is_wp_error($response)) {
        return;
    }

    $ical_data = wp_remote_retrieve_body($response);

    // Process the iCal data and integrate with WooCommerce bookings
    // Parsing can be done with a library like iCalcreator or a custom function
    // ...
}
add_action('init', 'tbooking_sync_airbnb_ical');


/**
 * Export iCal for WooCommerce bookings to sync with Airbnb.
 *
 * @package T-Booking
 * @since 1.0.0
 */
function tbooking_export_ical() {
    header('Content-Type: text/calendar; charset=utf-8');
    header('Content-Disposition: attachment; filename="tbooking-bookings.ics"');

    echo "BEGIN:VCALENDAR\n";
    echo "VERSION:2.0\n";
    echo "PRODID:-//T-Booking//NONSGML v1.0//EN\n";

    // Example: Fetch WooCommerce bookings and add to the calendar
    $bookings = get_woocommerce_bookings(); // Implement this to fetch WooCommerce bookings
    foreach ($bookings as $booking) {
        echo "BEGIN:VEVENT\n";
        echo "UID:" . uniqid() . "\n";
        echo "DTSTART:" . gmdate('Ymd\THis\Z', strtotime($booking->start)) . "\n";
        echo "DTEND:" . gmdate('Ymd\THis\Z', strtotime($booking->end)) . "\n";
        echo "SUMMARY:" . __('Booking for', 'tbooking') . " " . $booking->product_name . "\n";
        echo "END:VEVENT\n";
    }

    echo "END:VCALENDAR";
    exit;
}
add_action('init', 'tbooking_export_ical');
