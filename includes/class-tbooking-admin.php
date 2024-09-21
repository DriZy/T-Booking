<?php

/**
 * Class TBooking_Admin
 *
 * Handles the admin settings and menu for the T-Booking plugin.
 *
 * @package T-Booking
 * @since 1.0.0
 */
class TBooking_Admin
{

    /**
     * TBooking_Admin constructor.
     *
     * Adds actions for admin menu and settings registration.
     */
    public function __construct()
    {
        add_action('admin_menu', array($this, 'tbooking_add_admin_menu'));
        add_action('admin_init', array($this, 'tbooking_register_settings'));
        add_action('admin_enqueue_scripts', array($this, 'tbooking_enqueue_admin_scripts'));

    }

    /**
     * Adds the admin menu and submenu pages.
     */
    public function tbooking_add_admin_menu()
    {
        add_menu_page(
            __('TBooking', 'tbooking'),
            __('TBooking', 'tbooking'),
            'manage_options',
            'tbooking-settings',
            array($this, 'tbooking_settings_page'),
            'dashicons-calendar-alt'
        );
        add_submenu_page(
            'tbooking-settings',
            __('Settings', 'tbooking'),
            __('Settings', 'tbooking'),
            'manage_options',
            'tbooking-settings',
            array($this, 'tbooking_settings_page')
        );

        add_submenu_page(
            'tbooking-settings',
            __('Bookings', 'tbooking'),
            __('Bookings', 'tbooking'),
            'manage_options',
            'tbooking-bookings',
            array($this, 'tbooking_bookings_page')
        );
    }

    /**
     * Registers the settings for the T-Booking plugin.
     */
    public function tbooking_register_settings()
    {
        $this->tbooking_register_settings_groups();
        $this->tbooking_general_styles();
    }

    public function tbooking_register_settings_groups()
    {
        register_setting('tbooking_settings_group', 'tbooking_google_calendar_status');
        register_setting('tbooking_settings_group', 'tbooking_google_client_id');
        register_setting('tbooking_settings_group', 'tbooking_google_client_secret');
        register_setting('tbooking_settings_group', 'tbooking_publish_pending');

        // Airbnb Config
        register_setting('tbooking_settings_group', 'tbooking_airbnb_client_id');
        register_setting('tbooking_settings_group', 'tbooking_airbnb_client_secret');

        // Post Types
        register_setting('tbooking_settings_group', 'tbooking_enabled_post_types');

    }

//    /**
//     * Callback function for the WooCommerce integration setting.
//     */
//    public function woocommerce_integration_callback() {
//        $enabled = get_option('tbooking_woocommerce_integration', 'yes');
//        echo '<input type="checkbox" name="tbooking_woocommerce_integration" value="yes" ' . checked($enabled, 'yes', false) . '>';
//    }

    /**
     * Displays the settings page.
     */
    public function tbooking_settings_page() {
        $active_tab = isset($_GET['tab']) ? $_GET['tab'] : 'general';

        ?>
        <div class="wrap">
            <h1><?php esc_html_e('T-Booking Settings', 'tbooking'); ?></h1>
            <h2 class="nav-tab-wrapper">
                <a href="?page=tbooking-settings&tab=general" class="nav-tab <?php echo $active_tab === 'general' ? 'nav-tab-active' : ''; ?>"><?php _e('General', 'tbooking'); ?></a>
                <a href="?page=tbooking-settings&tab=google_calendar" class="nav-tab <?php echo $active_tab === 'google_calendar' ? 'nav-tab-active' : ''; ?>"><?php _e('Google Calendar', 'tbooking'); ?></a>
                <a href="?page=tbooking-settings&tab=post_types" class="nav-tab <?php echo $active_tab === 'post_types' ? 'nav-tab-active' : ''; ?>"><?php _e('Post Types', 'tbooking'); ?></a>
                <a href="?page=tbooking-settings&tab=airbnb" class="nav-tab <?php echo $active_tab === 'airbnb' ? 'nav-tab-active' : ''; ?>"><?php _e('Airbnb', 'tbooking'); ?></a>
                <a href="?page=tbooking-settings&tab=payment" class="nav-tab <?php echo $active_tab === 'payment' ? 'nav-tab-active' : ''; ?>"><?php _e('Payment', 'tbooking'); ?></a>
                <a href="?page=tbooking-settings&tab=styles" class="nav-tab <?php echo $active_tab === 'styles' ? 'nav-tab-active' : ''; ?>"><?php _e('Styles', 'tbooking'); ?></a>
            </h2>

            <form method="post" action="options.php">
                <?php
                settings_fields('tbooking_settings_group');

                // Load the appropriate template based on the selected tab
                switch ($active_tab) {
                    case 'google_calendar':
                        include TBOOKING_PLUGIN_PATH . 'includes/admin/views/settings-google-calendar.php';
                        break;
                    case 'post_types':
                        include TBOOKING_PLUGIN_PATH . 'includes/admin/views/settings-post-types.php';
                        break;
                    case 'airbnb':
                        include TBOOKING_PLUGIN_PATH . 'includes/admin/views/settings-airbnb.php';
                        break;
                    case 'payment':
                        include TBOOKING_PLUGIN_PATH . 'includes/admin/views/settings-payment.php';
                        break;
                    case 'styles':
                        include TBOOKING_PLUGIN_PATH . 'includes/admin/views/settings-styles.php';
                        break;
                    default:
                        include TBOOKING_PLUGIN_PATH . 'includes/admin/views/settings-general.php';
                        break;
                }

                submit_button();
                ?>
            </form>
        </div>
        <?php
    }

    /**
     * Displays the bookings page.
     */
    public function tbooking_bookings_page() {
        include TBOOKING_PLUGIN_PATH. 'includes/admin/views/settings-bookings.php';
    }


    /**
     * Displays the general style settings.
     */
    public function tbooking_general_styles()
    {
        register_setting('tbooking_settings_group', 'background_color');
        register_setting('tbooking_settings_group', 'text_color');

        add_settings_section('tbooking_settings_section', 'Booking Colors', null, 'tbooking-settings');

        add_settings_field('background_color', 'Background Color', [$this, 'background_color_callback'], 'tbooking-settings', 'tbooking_settings_section');
        add_settings_field('text_color', 'Text Color', [$this, 'text_color_callback'], 'booking-settings', 'tbooking_settings_section');
    }

    /**
     * Callback function for the background color setting.
     */
    public function background_color_callback() {
        $color = get_option('background_color', '#ffffff');
        echo '<input type="text" name="background_color" value="' . esc_attr($color) . '" class="color-picker" />';
    }

    /**
     * Callback function for the text color setting.
     */
    public function text_color_callback() {
        $color = get_option('text_color', '#000000');
        echo '<input type="text" name="text_color" value="' . esc_attr($color) . '" class="color-picker" />';
    }

    public function tbooking_enqueue_admin_scripts() {
        wp_enqueue_style('wp-color-picker');
        wp_enqueue_script('wp-color-picker');
    }
}