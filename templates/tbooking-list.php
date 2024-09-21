<?php
/**
 * Template Name: Booking List
 */

defined('ABSPATH') || exit;

get_header();
?>

<div class="tbooking-list">
    <h1 class="text-center text-2xl font-bold">Available Booking Services</h1>
    <ul id="service-list" class="my-4 space-y-2">
        <?php
        $services = get_posts(['post_type' => 'booking_service', 'numberposts' => -1]);
        foreach ($services as $service) {
            echo '<li class="border p-4 rounded shadow hover:bg-gray-200">';
            echo '<h2 class="text-lg font-semibold">' . esc_html($service->post_title) . '</h2>';
            echo '<p>' . esc_html($service->post_excerpt) . '</p>';
            echo '<button data-id="' . esc_attr($service->ID) . '" class="book-button bg-blue-500 text-white py-2 px-4 rounded">Book Now</button>';
            echo '</li>';
        }
        ?>
    </ul>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const buttons = document.querySelectorAll('.book-button');
        buttons.forEach(button => {
            button.addEventListener('click', function() {
                const serviceId = this.getAttribute('data-id');
                alert('Booking service with ID: ' + serviceId);
                // Implement booking functionality here
            });
        });
    });
</script>

<style>
    .tbooking-list {
        /* Custom styles based on theme */
        background-color: var(--background-color);
        color: var(--text-color);
    }
</style>

<?php get_footer(); ?>
