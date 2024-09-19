<?php
/**
 * T-Booking Settings
 *
 * This file contains the code for creating and managing the admin settings page for the T-Booking plugin.
 *
 * @package T-Booking
 * @author Tabi Idris
 */

add_action('admin_menu', 'tbooking_create_admin_menu');

/**
 * Create the admin menu for T-Booking settings.
 */
function tbooking_create_admin_menu() {
    add_menu_page(
        __('T-Booking Settings', 'tbooking'), // Page title
        __('T-Booking', 'tbooking'), // Menu title
        'manage_options', // Capability
        'tbooking-settings', // Menu slug
        'tbooking_admin_settings_page', // Function to display the page content
        'dashicons-admin-settings', // Icon
        75 // Position
    );
}

/**
 * Display the content of the T-Booking admin settings page.
 */
function tbooking_admin_settings_page() {
    ?>
    <div class="wrap">
        <h1><?php _e('T-Booking Settings', 'tbooking'); ?></h1>
        <form method="post" action="options.php">
            <?php
            settings_fields('tbooking_settings_group'); // Output security fields for the registered setting "tbooking_settings_group"
            do_settings_sections('tbooking-settings'); // Output setting sections and their fields
            submit_button(); // Output save settings button
            ?>
        </form>
    </div>
    <?php
}

/**
 * Register settings, sections, and fields for the T-Booking plugin.
 */
add_action('admin_init', 'tbooking_register_settings');
function tbooking_register_settings() {
    // Register settings
    register_setting('tbooking_settings_group', 'tbooking_min_days');
    register_setting('tbooking_settings_group', 'tbooking_max_days');
    register_setting('tbooking_settings_group', 'tbooking_airbnb_api_key');

    // Add settings section
    add_settings_section('tbooking_main_section', __('Booking Settings', 'tbooking'), null, 'tbooking-settings');

    // Add settings fields
    add_settings_field(
        'tbooking_min_days',
        __('Minimum Booking Days', 'tbooking'),
        'tbooking_min_days_callback',
        'tbooking-settings',
        'tbooking_main_section'
    );

    add_settings_field(
        'tbooking_max_days',
        __('Maximum Booking Days', 'tbooking'),
        'tbooking_max_days_callback',
        'tbooking-settings',
        'tbooking_main_section'
    );

    add_settings_field(
        'tbooking_airbnb_api_key',
        __('Airbnb API Key', 'tbooking'),
        'tbooking_airbnb_api_key_callback',
        'tbooking-settings',
        'tbooking_main_section'
    );
}

/**
 * Callback function to display the minimum booking days field.
 */
function tbooking_min_days_callback() {
    $min_days = get_option('tbooking_min_days');
    echo "<input type='number' name='tbooking_min_days' value='" . esc_attr($min_days) . "' />";
}

/**
 * Callback function to display the maximum booking days field.
 */
function tbooking_max_days_callback() {
    $max_days = get_option('tbooking_max_days');
    echo "<input type='number' name='tbooking_max_days' value='" . esc_attr($max_days) . "' />";
}

/**
 * Callback function to display the Airbnb API key field.
 */
function tbooking_airbnb_api_key_callback() {
    $api_key = get_option('tbooking_airbnb_api_key');
    echo "<input type='text' name='tbooking_airbnb_api_key' value='" . esc_attr($api_key) . "' />";
}