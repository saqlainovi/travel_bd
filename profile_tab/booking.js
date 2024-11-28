document.addEventListener('DOMContentLoaded', function () {
    const bookingForm = document.getElementById('booking-form');
    const modal = document.getElementById('confirmation-modal');
    const modalContent = document.querySelector('.modal-content');
    const bookingDetails = document.getElementById('booking-details');
    const closeModalBtn = document.querySelector('.close');
    const confirmBookingBtn = document.querySelector('.confirm-btn');

    // Handle form submission
    bookingForm.addEventListener('submit', function (event) {
        event.preventDefault();

        const packageSelected = document.getElementById('package-select').value;
        const travelDate = document.getElementById('travel-date').value;
        const travelers = document.getElementById('travelers').value;

        // Display booking details in modal
        bookingDetails.innerHTML = `
            <p><strong>Package:</strong> ${packageSelected}</p>
            <p><strong>Travel Date:</strong> ${travelDate}</p>
            <p><strong>Number of Travelers:</strong> ${travelers}</p>
        `;

        // Show modal
        modal.style.display = 'flex';
    });

    // Close modal when 'X' is clicked
    closeModalBtn.addEventListener('click', function () {
        modal.style.display = 'none';
    });

    // Confirm booking and redirect
    confirmBookingBtn.addEventListener('click', function () {
        alert('Booking Confirmed!');
        modal.style.display = 'none';
        // Redirect to booking confirmation page (if needed)
        // window.location.href = 'confirmation-page.html';
    });

    // Close modal when clicking outside the modal content
    window.addEventListener('click', function (event) {
        if (event.target == modal) {
            modal.style.display = 'none';
        }
    });
});
