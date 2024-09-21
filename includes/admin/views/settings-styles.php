<?php
/**
 * Template Name: T-Booking Styles Settings
 */
?>
<div class="wrap">
    <h2><?php _e('Styles Settings', 'tbooking'); ?></h2>

    <form method="post" action="options.php">
        <?php
        add_settings_field('text_color', 'Text Color', [$this, 'text_color_callback'], 'tbooking-settings', 'tbooking_settings_section');
        // Output security fields for the registered settings
        settings_fields('tbooking_settings_group');

        // Output setting sections and their fields
        do_settings_sections('tbooking-settings');

        // Submit button?>
    </form>
</div>

<script>
    jQuery(document).ready(function($){
        $('.color-picker').wpColorPicker();
    });
</script>
