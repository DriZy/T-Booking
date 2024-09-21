<?php
/**
 * Class TBooking_Post_Types
 *
 * Registers custom post types for the T-Booking plugin.
 *
 * @package T-Booking
 * @since 1.0.0
 */
class TBooking_Post_Types {

    /**
     * TBooking_Post_Types constructor.
     *
     * Adds the action to register custom post types.
     */
    public function __construct() {
        add_action('init', array($this, 'register_post_types'));
    }

    /**
     * Registers the custom post types.
     *
     * Registers the 'service' post type with various settings.
     */
    public function register_post_types() {
        $labels = array(
            'name' => __('Services', 'tbooking'),
            'singular_name' => __('Service', 'tbooking')
        );

        $args = array(
            'labels' => $labels,
            'public' => true,
            'has_archive' => true,
            'supports' => array('title', 'editor', 'thumbnail'),
            'show_in_menu' => true,
            'menu_position' => 5,
            'rewrite' => array('slug' => 'services'),
        );

        register_post_type('service', $args);
    }
}