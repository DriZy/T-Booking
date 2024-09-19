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
define('TBOOKING_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('TBOOKING_VERSION', '1.0.0');

// Include required files
require_once(TBOOKING_PLUGIN_DIR . 'includes/tbooking-settings.php');
require_once(TBOOKING_PLUGIN_DIR . 'includes/tbooking-woocommerce.php');
require_once(TBOOKING_PLUGIN_DIR . 'includes/tbooking-woocommerce-hooks.php');

// Load textdomain for translation
add_action('plugins_loaded', 'tbooking_load_textdomain');
/**
 * Load plugin textdomain for translations.
 *
 * @package T-Booking
 * @since 1.0.0
 */
function tbooking_load_textdomain() {
    load_plugin_textdomain('tbooking', false, dirname(plugin_basename(__FILE__)) . '/languages/');
}

// Activation and deactivation hooks
register_activation_hook(__FILE__, 'tbooking_activate');
register_deactivation_hook(__FILE__, 'tbooking_deactivate');

/**
 * Plugin activation callback.
 *
 * @package T-Booking
 * @since 1.0.0
 */
function tbooking_activate() {
    // Add default options or create necessary tables
    tbooking_default_options();
}

/**
 * Plugin deactivation callback.
 *
 * @package T-Booking
 * @since 1.0.0
 */
function tbooking_deactivate() {
    // Clean up on deactivation
    delete_option('tbooking_airbnb_api_key');
}

/**
 * Add default options for the plugin.
 *
 * @package T-Booking
 * @since 1.0.0
 */
function tbooking_default_options() {
    add_option('tbooking_min_days', 2);
    add_option('tbooking_max_days', 30);
    add_option('tbooking_airbnb_api_key', '');
}
