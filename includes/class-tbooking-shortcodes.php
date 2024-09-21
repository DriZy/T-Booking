<?php

/**
 * Class TBooking_Shortcodes
 *
 * Handles the shortcodes for the T-Booking plugin.
 *
 * @package T-Booking
 * @since 1.0.0
 */
class TBooking_Shortcodes {

    /**
     * TBooking_Shortcodes constructor.
     *
     * Adds the shortcode for the booking form.
     */
    public function __construct() {
        add_shortcode('tbooking_form', array($this, 'render_tbooking_form'));
        add_shortcode('tbooking_calendar', array($this, 'render_tbooking_calendar'));
        add_shortcode('tbooking_list', array($this, 'render_tbooking_list'));
    }

    /**
     * Renders the booking form shortcode.
     *
     * @return string The booking form HTML.
     */
    public function render_tbooking_form() {
        ob_start();
        include(TBOOKING_PLUGIN_PATH . 'templates/tbooking-form.php');
        return ob_get_clean();
    }

    /**
     * Adds the shortcode for the booking calendar.
     *
     * @return string The booking form HTML.
     */
    public function render_tbooking_calendar() {
        ob_start();
        include(TBOOKING_PLUGIN_PATH . 'templates/tbooking-calendar.php');
        return ob_get_clean();
    }

    /**
     * Adds the shortcode for the booking list.
     *
     * @return string The booking list HTML.
     */
    public function render_tbooking_list() {
        ob_start();
        include(TBOOKING_PLUGIN_PATH . 'templates/tbooking-list.php');
        return ob_get_clean();
    }
}
