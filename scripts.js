let slideIndex = 0;
const slides = document.querySelectorAll('.carousel-slide');

function showSlides() {
    slides.forEach((slide, index) => {
        slide.style.display = index === slideIndex ? 'block' : 'none';
    });
}

function moveSlide(n) {
    slideIndex = (slideIndex + n + slides.length) % slides.length;
    showSlides();
}

function autoChangeSlides() {
    slideIndex = (slideIndex + 1) % slides.length; // Move to the next slide
    showSlides();
}

// Automatically change slides every 5 seconds
setInterval(autoChangeSlides, 2500);

document.addEventListener('DOMContentLoaded', showSlides);
// Redirect to Payment Page when Proceed to Booking is clicked
document.getElementById('proceed-to-booking').addEventListener('click', function () {
    // Redirect to payment.html
    window.location.href = 'payment.html';
});
