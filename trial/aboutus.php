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
    <!-- <link rel="stylesheet" href="CSS/events.css"> -->
    <link rel="stylesheet" href="aboutus.css">
    <link rel="stylesheet" href="footer.css">

    
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
</head>
        </head>
<body>
    <div class="static-background" aria-hidden="true"></div>
    <div class="video-background" id="video-container" aria-hidden="true">
        <video autoplay muted loop playsinline id="bg-video">
            <source src="3.mp4" type="video/mp4">
        </video>
    </div>
    <?php include 'header.php'; ?>
    <div class="container">
        
        
        <main>
            <h1>About <span class="gradient-text">Us</span></h1>
            
            <div class="contact-content">
                <div class="contact-info">
                    <div class="info-item">
                        <div class="info-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                            </svg>
                        </div>
                        <div class="info-text">
                            <h3>Our Mission</h3>
                            <p>Unifying the Concert Experience</p>
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
                                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                <polyline points="22,6 12,13 2,6"></polyline>
                            </svg>
                        </div>
                        <div class="info-text">
                            <h3>Contact Us</h3>
                            <p><a href="mailto:info@concertcircle.com">info@concertcircle.com</a></p>
                        </div>
                    </div>
                </div>
                
                <div class="contact-form" style="text-align: left;">
                    <p>At Concert Circle, we believe the magic of a concert transcends the stage. We've created more than just a digital marketplace—we've built a community-driven platform that transforms your entire concert experience.</p>
                    
                    <h3 style="margin-top: 1rem; margin-bottom: 1rem;">Our Platform Offers:</h3>
                    <ul style="padding-left: 20px; margin-bottom: 1rem;">
                        <li><strong>Connect:</strong> A vibrant community where music lovers unite</li>
                        <li><strong>Discover:</strong> Exclusive events, venues, and merchandise</li>
                        <li><strong>Plan:</strong> Comprehensive event information to simplify your journey</li>
                        <li><strong>Experience:</strong> End-to-end support for your concert adventure</li>
                        <li><strong>Travel & Stay:</strong> Tailored booking for concert destinations</li>
                        <li><strong>Navigate:</strong> Local transportation and logistical support</li>
                    </ul>
                    
                    <p>Designed by fans, for fans, Concert Circle amplifies the excitement of live music through community and convenience. From the moment you decide to attend an event until you return home, we're with you every step of the way.</p>
                    
                    <p>Join us. Be part of the circle.</p>
                </div>
            </div>
            
            
        </main>
        
        <?php include 'footer.php'; ?>
    </div>

    <script>
         
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
    </script>
</body>
</html>