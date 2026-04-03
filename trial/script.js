// Testimonial Carousel Navigation
document.addEventListener('DOMContentLoaded', function() {
    const testimonialCarousel = document.querySelector('.testimonial-carousel');
    const prevButton = document.querySelector('.testimonial-nav.prev');
    const nextButton = document.querySelector('.testimonial-nav.next');
    
    if (testimonialCarousel && prevButton && nextButton) {
        const scrollAmount = 400; // Adjust this value based on your card width + gap
        
        prevButton.addEventListener('click', () => {
            testimonialCarousel.scrollBy({
                left: -scrollAmount,
                behavior: 'smooth'
            });
        });
        
        nextButton.addEventListener('click', () => {
            testimonialCarousel.scrollBy({
                left: scrollAmount,
                behavior: 'smooth'
            });
        });
        
        // Hide/show navigation buttons based on scroll position
        testimonialCarousel.addEventListener('scroll', () => {
            const isAtStart = testimonialCarousel.scrollLeft === 0;
            const isAtEnd = testimonialCarousel.scrollLeft + testimonialCarousel.clientWidth >= testimonialCarousel.scrollWidth;
            
            prevButton.style.opacity = isAtStart ? '0.5' : '1';
            prevButton.style.pointerEvents = isAtStart ? 'none' : 'auto';
            
            nextButton.style.opacity = isAtEnd ? '0.5' : '1';
            nextButton.style.pointerEvents = isAtEnd ? 'none' : 'auto';
        });
    }
}); 