<!DOCTYPE html>
<html lang="en">

<head>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="LOGO for website (circular).png" type="image/x-icon">
        <link rel="shortcut icon" href="LOGO for website (circular).png" type="image/x-icon">
        <link rel="icon" type="image/x-icon" href="LOGO for website (circular).png">
        <title>About us - Concert Circle India</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;900&display=swap" rel="stylesheet">

        <!-- include stylesheet -->
        <!-- <link rel="stylesheet" href="event.css"> -->
        <link rel="stylesheet" href="navbar.css">
        <link rel="stylesheet" href="events.css">
        <link rel="stylesheet" href="about.css">
        <link rel="stylesheet" href="footer.css">
        <link rel="stylesheet" href="contactus.css">



        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700;900&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">

        
    </head>

<body>
    <!-- Background video with fallback -->
    <div class="static-background" aria-hidden="true"></div>
    <div class="video-background" id="video-container" aria-hidden="true">
        <video autoplay muted loop playsinline id="bg-video">
            <source src="3.mp4" type="video/mp4">
        </video>
    </div>
    <?php include 'header.php' ?>
    <div class="container">

        <main>
            <h1>Get in <span class="gradient-text">Touch</span></h1>
            <p>Have questions about Concert Circle? Want to collaborate? Reach out to us - we'd love to hear from you!</p>

            <div class="contact-content">
                <div class="contact-form">
                    <div id="success-msg" class="success-message" role="alert">
                        Your message has been sent successfully! We'll get back to you soon.
                    </div>
                    <div id="error-msg" class="error-message" role="alert">
                        There was an error sending your message. Please try again.
                    </div>

                    <form id="contact-form" method="post" action="process_contact.php">
                        <div class="form-group">
                            <label for="name">Your Name</label>
                            <input type="text" id="name" name="name" required aria-required="true">
                        </div>

                        <div class="form-group">
                            <label for="email">Your Email</label>
                            <input type="email" id="email" name="email" required aria-required="true">
                        </div>

                        <div class="form-group">
                            <label for="subject">Subject</label>
                            <input type="text" id="subject" name="subject" required aria-required="true">
                        </div>

                        <div class="form-group">
                            <label for="message">Your Message</label>
                            <textarea id="message" name="message" required aria-required="true"></textarea>
                        </div>

                        <button type="submit">Send Message</button>
                    </form>
                </div>

                <div class="contact-info">
                    <div class="info-item">
                        <div class="info-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                <polyline points="22,6 12,13 2,6"></polyline>
                            </svg>
                        </div>
                        <div class="info-text">
                            <h3>Email</h3>
                            <p><a href="mailto:info@concertcircle.com">info@concertcircle.com</a></p>
                        </div>
                    </div>

                    <div class="info-item">
                        <div class="info-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                                <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                                <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                            </svg>
                        </div>
                        <div class="info-text">
                            <h3>Instagram</h3>
                            <p><a href="https://www.instagram.com/concertcircle" target="_blank" rel="noopener">@concertcircle</a></p>
                        </div>
                    </div>

                    <div class="info-item">
                        <div class="info-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                <circle cx="12" cy="10" r="3"></circle>
                            </svg>
                        </div>
                        <div class="info-text">
                            <h3>Location</h3>
                            <p>Vadodara, Gujarat</p>
                        </div>
                    </div>

                    <div class="info-item">
                        <div class="info-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M15.05 5A5 5 0 0 1 19 8.95M15.05 1A9 9 0 0 1 23 8.94m-1 7.98v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                            </svg>
                        </div>
                        <div class="info-text">
                            <h3>Schedule</h3>
                            <p>We respond to inquiries within 24-48 hours</p>
                        </div>
                    </div>
                </div>
            </div>


        </main>

        <?php include 'footer.php' ?>
    </div>

    <script>
        // Check for form submission response
        document.addEventListener('DOMContentLoaded', function() {
            // Form elements
            const contactForm = document.getElementById('contact-form');
            const successMsg = document.getElementById('success-msg');
            const errorMsg = document.getElementById('error-msg');
            const nameInput = document.getElementById('name');
            const emailInput = document.getElementById('email');
            const messageInput = document.getElementById('message');

            // Check URL parameters for form submission status
            const urlParams = new URLSearchParams(window.location.search);
            const status = urlParams.get('status');

            if (status === 'success') {
                successMsg.classList.add('visible');
                contactForm.reset();
                // Clean the URL
                cleanUrl();
            } else if (status === 'error') {
                errorMsg.classList.add('visible');
                // Clean the URL
                cleanUrl();
            }

            // Form validation and submission
            contactForm.addEventListener('submit', function(e) {
                // Reset messages
                successMsg.classList.remove('visible');
                errorMsg.classList.remove('visible');

                // Basic validation
                if (!emailInput.value || !nameInput.value || !messageInput.value) {
                    e.preventDefault();
                    errorMsg.textContent = "Please fill in all required fields.";
                    errorMsg.classList.add('visible');
                    return false;
                }

                // Additional email validation
                const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!emailPattern.test(emailInput.value)) {
                    e.preventDefault();
                    errorMsg.textContent = "Please enter a valid email address.";
                    errorMsg.classList.add('visible');
                    return false;
                }

                // Store submission state
                localStorage.setItem('form_submitted', 'true');
            });

            // Check for stored form submission state
            if (localStorage.getItem('form_submitted') === 'true') {
                successMsg.classList.add('visible');
                contactForm.reset();
                localStorage.removeItem('form_submitted');
                cleanUrl();
            }

            // Helper function to clean URL
            function cleanUrl() {
                if (window.history && window.history.replaceState) {
                    const cleanUrl = window.location.href.split('?')[0];
                    window.history.replaceState({}, document.title, cleanUrl);
                }
            }

            // Video handling
            const video = document.getElementById('bg-video');
            const videoContainer = document.getElementById('video-container');

            if (video && videoContainer) {
                // Check for mobile and reduced motion preference
                const isMobile = window.matchMedia('(max-width: 768px)').matches;
                const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

                if (isMobile && prefersReducedMotion) {
                    videoContainer.style.display = 'none';
                }

                // Error handling for video
                video.addEventListener('error', () => {
                    videoContainer.style.display = 'none';
                });

                // Lazy load video for better performance
                if ('loading' in HTMLImageElement.prototype) {
                    video.setAttribute('loading', 'lazy');
                }
            }

            // Enhance form accessibility
            const formInputs = document.querySelectorAll('input, textarea');
            formInputs.forEach(input => {
                input.addEventListener('invalid', function() {
                    this.setAttribute('aria-invalid', 'true');
                });

                input.addEventListener('input', function() {
                    if (this.validity.valid) {
                        this.removeAttribute('aria-invalid');
                    }
                });
            });
        });
    </script>
</body>

</html>