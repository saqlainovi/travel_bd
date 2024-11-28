document.addEventListener('DOMContentLoaded', function() {
    let slideIndex = 0;
    let timeoutId = null;
    const slides = document.getElementsByClassName("slide");
    const dots = document.getElementsByClassName("dot");
    
    showSlides();
    
    function showSlides() {
        for (let i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
            dots[i].classList.remove("active");
        }
        slideIndex++;
        if (slideIndex > slides.length) {
            slideIndex = 1;
        }
        slides[slideIndex - 1].style.display = "block";
        dots[slideIndex - 1].classList.add("active");
        timeoutId = setTimeout(showSlides, 1000); // Change slide every 1 second
    }
    
    // Next/previous controls
    document.querySelector('.prev').addEventListener('click', function() {
        clearTimeout(timeoutId);
        slideIndex = slideIndex > 1 ? slideIndex - 2 : slides.length - 1;
        showSlides();
    });
    
    document.querySelector('.next').addEventListener('click', function() {
        clearTimeout(timeoutId);
        showSlides();
    });
    
    // Dot controls
    for (let i = 0; i < dots.length; i++) {
        dots[i].addEventListener('click', function() {
            clearTimeout(timeoutId);
            slideIndex = i;
            showSlides();
        });
    }
}); 