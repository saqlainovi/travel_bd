let slideIndex = 0;
const slides = document.querySelectorAll('.slide');

function showSlides() {
    // Hide all slides
    for (let i = 0; i < slides.length; i++) {
        slides[i].classList.remove('active');
    }
    
    // Increment slideIndex
    slideIndex++;
    
    // Reset to first slide if at the end
    if (slideIndex > slides.length) {
        slideIndex = 1;
    }
    
    // Show current slide
    slides[slideIndex - 1].classList.add('active');
}

// Start automatic slideshow
function startSlideshow() {
    showSlides(); // Show first slide immediately
    setInterval(showSlides, 1000); // Change image every 1 second
}

// Initialize when document is loaded
document.addEventListener('DOMContentLoaded', function() {
    startSlideshow();
}); 