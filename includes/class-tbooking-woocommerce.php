<?php
/**
 * WooCommerce's integration with custom booking settings.
 *
 * This file contains the code for integrating WooCommerce with the custom booking settings
 * defined in the T-Booking plugin.
 *
 * @package T-Booking
 * @subpackage WooCommerce_Integration
 * @author Tabi Idris
 * @since 1.0.0
 */

class TBooking_WooCommerce {

    public function __construct() {
        add_action('woocommerce_checkout_order_processed', array($this, 'process_order'));
    }

    public function process_order($order_id) {
        // Process WooCommerce order and map it to a booking
    }
}


// Check if WooCommerce is active
//if (in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')))) {
//
//    /**
//     * Set the minimum booking duration for WooCommerce bookings.
//     *
//     * @param int $min_duration The current minimum duration.
//     * @return int The modified minimum duration.
//     */
//    add_filter('woocommerce_booking_get_min_duration', 'tbooking_set_min_days');
//    function tbooking_set_min_days($min_duration) {
//        return get_option('tbooking_min_days', 2);
//    }
//
//    /**
//     * Set the maximum booking duration for WooCommerce bookings.
//     *
//     * @param int $max_duration The current maximum duration.
//     * @return int The modified maximum duration.
//     */
//    add_filter('woocommerce_booking_get_max_duration', 'tbooking_set_max_days');
//    function tbooking_set_max_days($max_duration) {
//        return get_option('tbooking_max_days', 30);
//    }
//
//    /**
//     * Add custom payment gateways to WooCommerce.
//     *
//     * @param array $methods The current payment gateways.
//     * @return array The modified payment gateways.
//     */
//    add_filter('woocommerce_payment_gateways', 'tbooking_add_payment_gateways');
//    function tbooking_add_payment_gateways($methods) {
//        if (class_exists('WC_Gateway_Stripe')) {
//            $methods[] = 'WC_Gateway_Stripe';
//        }
//        if (class_exists('WC_Gateway_Paypal')) {
//            $methods[] = 'WC_Gateway_Paypal';
//        }
//        return $methods;
//    }
//}
