<?php
/**
 * Create admin menu for T-Booking plugin.
 *
 * @package T-Booking
 * @author Tabi Idris
 * @since 1.0.0
 */
function tbooking_create_admin_menu() {
    add_menu_page(
        __('T-Booking', 'tbooking'),
        __('T-Booking', 'tbooking'),
        'manage_options',
        'tbooking-admin',
        'tbooking_view_all_bookings_page',
        'dashicons-calendar-alt',
        7
    );

    add_submenu_page(
        'tbooking-admin',
        __('All Bookings', 'tbooking'),
        __('All Bookings', 'tbooking'),
        'manage_options',
        'tbooking-all-bookings',
        'tbooking_view_all_bookings_page'
    );

    add_submenu_page(
        'tbooking-admin',
        __('Settings', 'tbooking'),
        __('Settings', 'tbooking'),
        'manage_options',
        'tbooking-settings',
        'tbooking_view_settings_page'
    );
}
add_action('admin_menu', 'tbooking_create_admin_menu');
