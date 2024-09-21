<?php
/**
 * Template Name: T-Booking Form
 */
?>

<form id="tbooking-form" class="space-y-4">
    <div>
        <label for="tbooking_service" class="block">Select Service</label>
        <select name="tbooking_service" id="tbooking_service" required class="border p-2 rounded">
            <?php
            $services = get_posts(['post_type' => 'booking_service', 'numberposts' => -1]);
            foreach ($services as $service) {
                echo '<option value="' . esc_attr($service->ID) . '">' . esc_html($service->post_title) . '</option>';
            }
            ?>
        </select>
    </div>

    <div>
        <label for="tbooking_period" class="block">Booking Period</label>
        <input type="datetime-local" name="tbooking_period" id="tbooking_period" required class="border p-2 rounded">
    </div>

    <div>
        <label for="tbooking_name" class="block">Your Name</label>
        <input type="text" name="tbooking_name" id="tbooking_name" required class="border p-2 rounded">
    </div>

    <div>
        <label for="tbooking_email" class="block">Your Email</label>
        <input type="email" name="tbooking_email" id="tbooking_email" required class="border p-2 rounded">
    </div>

    <button type="submit" class="bg-blue-500 text-white p-2 rounded tbooking_submit">Book Now</button>
</form>
