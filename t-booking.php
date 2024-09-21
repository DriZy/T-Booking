<?php

/**
 * Plugin Name: T-Booking
 * Plugin URI: https://example.com
 * Description: Custom Booking Plugin for WooCommerce with Airbnb API integration.
 * Version: 1.0.0
 * Author: Tabi Idris
 * Author URI: https://github.com/DriZy/
 * License: GPLv2 or later
 * Text Domain: tbooking
 *
 * @package T-Booking
 */


// Security check
if (!defined('ABSPATH')) {
    exit;
}

// Define constants
define('TBOOKING_PLUGIN_PATH', plugin_dir_path(__FILE__));
define('TBOOKING_VERSION', '1.0.0');


// Include necessary files
require_once TBOOKING_PLUGIN_PATH . 'includes/class-tbooking-admin.php';
require_once TBOOKING_PLUGIN_PATH . 'includes/class-tbooking-bookings.php';
require_once TBOOKING_PLUGIN_PATH . 'includes/class-tbooking-post-types.php';
require_once TBOOKING_PLUGIN_PATH . 'includes/class-tbooking-api.php';
require_once TBOOKING_PLUGIN_PATH . 'includes/class-tbooking-frontend.php';
require_once TBOOKING_PLUGIN_PATH . 'includes/class-tbooking-woocommerce.php';
require_once TBOOKING_PLUGIN_PATH . 'includes/class-tbooking-shortcodes.php';


/**
 * Main class for the T-Booking plugin.
 *
 * This class initializes the various components of the T-Booking plugin.
 *
 * @package T-Booking
 * @since 1.0.0
 */
class TBooking {

    /**
     * Constructor.
     *
     * Initializes the classes responsible for different functionalities.
     */
    public function __construct() {
        $this->load_classes();
        add_action('wp_enqueue_scripts', [$this, 'enqueue_scripts']);
        add_action('wp_ajax_handle_booking', [$this, 'handle_booking']);
        add_action('wp_ajax_nopriv_handle_booking', [$this, 'handle_booking']);
    }

    /**
     * Load the required classes.
     *
     * Instantiates the classes responsible for different functionalities.
     */
    private function load_classes() {
        new TBooking_Admin();
        new TBooking_Post_Types();
        new TBooking_Bookings();
        new TBooking_API();
        new TBooking_Frontend();
        new TBooking_WooCommerce();
        new TBooking_Shortcodes();
    }

    /**
     * Enqueue scripts and styles.
     */

    public function enqueue_scripts() {
        wp_enqueue_script('tbooking-script', plugin_dir_url(__FILE__) . 'assets/js/tbookings.js', ['jquery'], null, true);
        wp_enqueue_style('tbooking-style', plugin_dir_url(__FILE__) . 'assets/css/bookings.css');

        // Localize script for theme color settings
        wp_localize_script('tbooking-script', 'themeColors', [
            'background_color' => get_option('background_color', '#ffffff'),
            'text_color' => get_option('text_color', '#000000'),
        ]);
    }

    public function handle_booking() {
        // Handle booking logic here
        // Validate and process the booking information

        wp_send_json_success('Booking successful!');
    }

    /**
     * Activation hook.
     *
     * Code to run during plugin activation.
     */
    public static function activate() {
        // Code to run during activation
    }

    /**
     * Deactivation hook.
     *
     * Code to run during plugin deactivation.
     */
    public static function deactivate() {
        // Code to run during deactivation
    }
}


// Activation and deactivation hooks
register_activation_hook(__FILE__, array('TBooking', 'activate'));
register_deactivation_hook(__FILE__, array('TBooking', 'deactivate'));

// Initialize the plugin
new TBooking();