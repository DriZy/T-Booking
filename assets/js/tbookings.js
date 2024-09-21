document.addEventListener('DOMContentLoaded', function () {
    document.documentElement.style.setProperty('--background-color', themeColors.background_color);
    document.documentElement.style.setProperty('--text-color', themeColors.text_color);

    const tbookingForm = document.getElementById('tbooking-form');

    if (tbookingForm) {
        tbookingForm.addEventListener('submit', function (e) {
            e.preventDefault();

            const formData = new FormData(tbookingForm);

            fetch(booking_ajax.ajax_url, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                },
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert(data.data); // Show success message
                    } else {
                        alert('Booking failed!');
                    }
                });
        });
    }
});
