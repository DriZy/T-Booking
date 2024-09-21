<?php
/**
 * Template Name: Booking Calendar
 */

defined('ABSPATH') || exit;

get_header();
?>

<div id="tbooking_calendar" class="tbooking-calendar">
    <h1 class="text-center text-2xl font-bold">Booking Calendar</h1>
    <div id="calendar-container" class="my-4"></div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize the calendar using a library like FullCalendar
        const calendarEl = document.getElementById('tbooking_calendar-container');
        const calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            events: '/wp-json/myplugin/v1/bookings', // Replace with your AJAX endpoint
            dateClick: function(info) {
                alert('Date: ' + info.dateStr);
                // Implement booking functionality here
            }
        });
        calendar.render();
    });
</script>

<style>
    .tbooking-calendar {
        /* Custom styles based on theme */
        background-color: var(--background-color);
        color: var(--text-color);
    }
</style>

<?php get_footer(); ?>
