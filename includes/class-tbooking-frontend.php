<?php

/**
 * Class TBooking_Frontend
 *
 * Handles the front-end functionality for the T-Booking plugin.
 *
 * @package T-Booking
 * @since 1.0.0
 */
class TBooking_Frontend {

    /**
     * TBooking_Frontend constructor.
     *
     * Adds actions for front-end scripts and booking form shortcode.
     */
    public function __construct() {
        add_action('wp_enqueue_scripts', array($this, 'enqueue_scripts'));
        add_shortcode('tbooking_booking_form', array($this, 'booking_form_shortcode'));
    }

    /**
     * Enqueues front-end scripts and styles.
     */
    public function enqueue_scripts() {
        // Enqueue front-end scripts and styles
    }

    /**
     * Displays the booking form shortcode.
     *
     * @return string The booking form HTML.
     */
    public function booking_form_shortcode() {
        ob_start();
        include(TBOOKING_PLUGIN_PATH . 'templates/booking-form.php');
        return ob_get_clean();
    }

    /**
     * Processes the booking form submission.
     */
    public function process_booking() {
        // Handle booking form submissions
    }
}
