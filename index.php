<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Concert Circle - Unify Your Concert Experience</title>
    <link rel="icon" href="LOGO for website (circular).png" type="image/x-icon">
    <link rel="shortcut icon" href="/img/LOGO for website (circular).png" type="image/x-icon">
    <link rel="icon" type="image/x-icon" href="/img/LOGO for website (circular).png">
    <link rel="manifest" href="/manifest.json">
    
    <!-- Meta Pixel Code -->
    <script>
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
        n.callMethod.apply(n,arguments):n.queue.push(arguments)};
        if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
        n.queue=[];t=b.createElement(e);t.async=!0;
        t.src=v;s=b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t,s)}(window, document,'script',
        'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '742867645193107');
        fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
        src="https://www.facebook.com/tr?id=742867645193107&ev=PageView&noscript=1"
    /></noscript>
    <!-- End Meta Pixel Code -->
    <link href="index.css" rel="stylesheet">
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700;900&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <div class="container">
            <div class="header-content">
                <div class="logo-container">
                    <a href="https://concertcircle.com" style="text-decoration: none; color: inherit; display: flex; align-items: center;">
                        <svg 
                          xmlns="http://www.w3.org/2000/svg" 
                          viewBox="0 0 100 100" 
                          class="svg-logo"
                          role="img" 
                          aria-label="Concert Circle Logo"
                        >
                          <defs>
                            <linearGradient id="logoGradient" x1="0%" y1="0%" x2="100%" y2="100%">
                              <stop offset="0%" stop-color="#4ddde0" />
                              <stop offset="50%" stop-color="#d269e6" />
                              <stop offset="100%" stop-color="#ff3131" />
                            </linearGradient>
                            <filter id="dynamicGlow">
                              <feGaussianBlur stdDeviation="3" result="coloredBlur" />
                              <feMerge>
                                <feMergeNode in="coloredBlur" />
                                <feMergeNode in="SourceGraphic" />
                              </feMerge>
                            </filter>
                          </defs>
                          <g transform="translate(50, 50)">
                            <circle 
                              cx="0" 
                              cy="0" 
                              r="35" 
                              stroke="url(#logoGradient)" 
                              stroke-width="2" 
                              fill="none" 
                              opacity="0.6" 
                              filter="url(#dynamicGlow)"
                            >
                              <animate attributeName="r" values="35;40;35" dur="4s" repeatCount="indefinite" />
                              <animate attributeName="opacity" values="0.6;0.4;0.6" dur="4s" repeatCount="indefinite" />
                            </circle>
                            <circle 
                              cx="0" 
                              cy="0" 
                              r="25" 
                              stroke="url(#logoGradient)" 
                              stroke-width="2" 
                              fill="none" 
                              opacity="0.8" 
                              filter="url(#dynamicGlow)"
                            >
                              <animate attributeName="r" values="25;30;25" dur="3s" repeatCount="indefinite" />
                              <animate attributeName="opacity" values="0.8;0.6;0.8" dur="3s" repeatCount="indefinite" />
                            </circle>
                            <circle 
                              cx="0" 
                              cy="0" 
                              r="15" 
                              stroke="url(#logoGradient)" 
                              stroke-width="2" 
                              fill="none" 
                              opacity="1" 
                              filter="url(#dynamicGlow)"
                            >
                              <animate attributeName="r" values="15;20;15" dur="2s" repeatCount="indefinite" />
                              <animate attributeName="opacity" values="1;0.7;1" dur="2s" repeatCount="indefinite" />
                            </circle>
                          </g>
                        </svg>
                        <span class="logo-text">
                            <span class="concert">Concert</span>
                            <span class="circle">Circle</span>
                        </span>
                    </a>
                </div>

                <nav class="nav-container">
                    <a href="index.php" class="nav-item">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                            <polyline points="9,22 9,12 15,12 15,22"></polyline>
                        </svg>
                        Home
                    </a>
                    <a href="packages.php" class="nav-item">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"></path>
                        </svg>
                        Packages
                    </a>
                    <a href="geolocation-cc.php" class="nav-item">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M12 2a7 7 0 0 0-7 7c0 5.25 7 13 7 13s7-7.75 7-13a7 7 0 0 0-7-7z"></path>
                            <circle cx="12" cy="9" r="2"></circle>
                        </svg>
                        Geolocation
                    </a>
                    <a href="store.php" class="nav-item">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                            <circle cx="9" cy="9" r="2"></circle>
                            <path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21"></path>
                        </svg>
                        Store
                    </a>
                    <a href="aboutcc.php" class="nav-item">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                        About
                    </a>
                </nav>
            </div>
        </div>
    </header>

    <section class="hero">
        <div class="container">
            <div class="hero-carousel">
                <div class="carousel-slide">
                    <img src="/img/h-1.png" alt="Live event experience" class="carousel-image" loading="lazy">
                    <div class="hero-overlay"></div>
                    <div class="carousel-content">
                        <h2 class="carousel-title">
                            <span class="white">Experience Live Events</span>
                            <span class="tagline-highlight">Like Never Before</span>
                        </h2>
                        <p class="carousel-subtitle">Stop using 10 different apps for your concert plan — we handle it all in one place.</p>
                    </div>
                </div>
                <div class="carousel-slide">
                    <img src="/img/h-2.png" alt="Concert with vibrant purple lights" class="carousel-image" loading="lazy">
                    <div class="hero-overlay"></div>
                    <div class="carousel-content">
                        <h2 class="carousel-title">
                            <span class="white">Discover the</span>
                            <span class="tagline-highlight">Hottest Concerts</span>
                        </h2>
                        <p class="carousel-subtitle">Find epic concert nights that hit harder & last longer</p>
                    </div>
                </div>
                <div class="carousel-slide">
                    <img src="/img/h-3.png" alt="Crowd at a music festival" class="carousel-image" loading="lazy">
                    <div class="hero-overlay"></div>
                    <div class="carousel-content">
                        <h2 class="carousel-title">
                            <span class="white">Flights & Stay?</span>
                            <span class="tagline-highlight">Already Locked</span>
                        </h2>
                        <p class="carousel-subtitle">Touch down, check in, and time to rage, we’ve booked everything.</p>
                    </div>
                </div>
                <div class="carousel-slide">
                    <img src="/img/h-4.png" alt="Hotel room with concert vibe" class="carousel-image" loading="lazy">
                    <div class="hero-overlay"></div>
                    <div class="carousel-content">
                        <h2 class="carousel-title">
                            <span class="white">Cabs & City Vibes?</span>
                            <span class="tagline-highlight">Sorted</span>
                        </h2>
                        <p class="carousel-subtitle">Your rides are ready, and the city’s best spots are already scouted.</p>
                    </div>
                </div>
                <div class="carousel-slide">
                    <img src="/img/h-5.jpg" alt="Local transport at concert city" class="carousel-image" loading="lazy">
                    <div class="hero-overlay"></div>
                    <div class="carousel-content">
                        <h2 class="carousel-title">
                            <span class="white">Find</span>
                            <span class="tagline-highlight">Your Circle</span>
                        </h2>
                        <p class="carousel-subtitle">Circle up with your tribe, plan concert nights & be part of electrifying community</p>
                    </div>
                </div>
                <div class="carousel-slide">
                    <img src="/img/h-6.png" alt="Concert merchandise and crowd" class="carousel-image" loading="lazy">
                    <div class="hero-overlay"></div>
                    <div class="carousel-content">
                        <h2 class="carousel-title">
                            <span class="white">All In One Circle</span>
                        </h2>
                        <p class="carousel-subtitle">Still planning across 10 apps? <span style="color: red;">50 others aren’t.</span></p>
                        <a href="#packages-wrapper" class="explore-button" aria-label="Explore packages" data-scroll-target="packages-wrapper">Explore Packages</a>
                    </div>
                </div>
                
                <div class="carousel-indicators">
                    <span class="carousel-indicator active"></span>
                    <span class="carousel-indicator"></span>
                    <span class="carousel-indicator"></span>
                    <span class="carousel-indicator"></span>
                    <span class="carousel-indicator"></span>
                    <span class="carousel-indicator"></span>
                </div>
            </div>
        </div>
    </section>

    <section class="packages" role="region" aria-label="Concert packages">
    <div class="container">
        <div class="container centered-tagline">
            <h2 class="new-tagline-text">
                <span class="white">Your Concert Experience </span><span class="purple">~ Curated</span>
            </h2>
        </div>
        <div class="packages-carousel">
            <button class="pnav prev" aria-label="Previous package" id="prevBtn">&#8249;</button>
            <div class="packages-wrapper" id="packages-wrapper">
                <div class="packages-slide">
                    <div class="package-card" data-package="ride-to-the-rage">
                        <div class="package-flip">
                            <div class="package-front">
                                <div class="package-image" style="background-image: url('/img/p-1.jpeg');"></div>
                                <h3 class="package-title">Ride to the Rage</h3>
                                <p class="package-description">📍 Travis Scott Concert - Delhi</p>
                                <div class="package-note">✅ For solo or budget fans</div>
                            </div>
                            <div class="package-back">
                                <div class="package-content">
                                    <h3 class="package-title">Ride to the Rage</h3>
                                    <hr class="dashed-line">
                                    <div class="package-details">
                                        <div class="detail-column">
                                            <ul>
                                                <li>3-Star Hotel & Home stays</li>
                                                <li>Airport Pick up & drop</li>
                                                <li>Complimentary Breakfast</li>
                                                <li>Experience Manager Assistance</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="package-footer">
                                        <div class="package-price-right">Starting ₹7,499 per head</div>
                                    </div>
                                    <div class="package-pricing">
                                        <a href="ride-to-the-rage.php" class="package-button" aria-label="Book Ride to the Rage package">Book Now</a>
                                        <a href="tel:+911234567890" class="package-button contact-button" aria-label="Call now for Ride to the Rage package" style="margin-top: 1rem;">Call Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="packages-slide">
                    <div class="package-card" data-package="utopia-circle">
                        <div class="package-flip">
                            <div class="package-front">
                                <div class="package-image" style="background-image: url('/img/p-2.jpeg');"></div>
                                <h3 class="package-title">Utopia Circle</h3>
                                <p class="package-description">📍 Travis Scott Concert - Delhi</p>
                                <div class="package-note">⚡️ For group of 3+ ragers</div>
                            </div>
                            <div class="package-back">
                                <div class="package-content">
                                    <h3 class="package-title">Utopia Circle</h3>
                                    <hr class="dashed-line">
                                    <div class="package-details">
                                        <div class="detail-column">
                                            <ul>
                                                <li>4-star hotel & villa stays for group</li>
                                                <li>Airport Pick-up & Drop-off</li>
                                                <li>Cab transfers throughout the trip</li>
                                                <li>Private Concierge support via WhatsApp</li>
                                                <li>Complimentary breakfast</li>
                                                <li>Early access to merch drops with lucrative discounts </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="package-footer">
                                        <div class="package-price-right">Starting ₹9,999 per head</div>
                                    </div>
                                    <div class="package-pricing">
                                        <a href="utopia-circle-mode.php" class="package-button" aria-label="Book Utopia Circle package">Book Now</a>
                                        <a href="tel:+911234567890" class="package-button contact-button" aria-label="Call now for Utopia Circle package" style="margin-top: 1rem;">Call Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="packages-slide">
                    <div class="package-card" data-package="astro-deluxe">
                        <div class="package-flip">
                            <div class="package-front">
                                <div class="package-image" style="background-image: url('/img/p-3.jpeg');"></div>
                                <h3 class="package-title">Astro Deluxe Drop</h3>
                                <p class="package-description">📍 Travis Scott Concert - Delhi</p>
                                <div class="package-note">⭐ Tailored for the top tier</div>
                            </div>
                            <div class="package-back">
                                <div class="package-content">
                                    <h3 class="package-title">Astro Deluxe Drop</h3>
                                    <hr class="dashed-line">
                                    <div class="package-details">
                                        <div class="detail-column">
                                            <ul>
                                                <li>4.5–5 star luxury hotel or villa stay</li>
                                                <li>Private airport pick-up & drop-off</li>
                                                <li>Curated Local Experience</li>
                                                <li>All cab transfers throughout the stay</li>
                                                <li>Exclusive pre-launch Travis Scott merch drops</li>
                                                <li>Complimentary breakfast</li>
                                                <li>+2 Experiences</li>
                                                
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="package-footer">
                                        <div class="package-price-right">Starting ₹19,999 per head</div>
                                    </div>
                                    <div class="package-pricing" style="margin-top: 1.5rem; display: flex; flex-direction: column; gap: 1.5rem;">
                                        <a href="astro-deluxe-drop.php" class="package-button" aria-label="Book Astro Deluxe Drop package">Book Now</a>
                                        <a href="tel:+911234567890" class="package-button contact-button" aria-label="Call now for Astro Deluxe Drop package">Call Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button class="pnav next" aria-label="Next package" id="nextBtn">&#8250;</button>
        </div>
        <div class="carousel-indicators" id="indicators"></div>
    </div>
</section>

    <section class="stats">
        <div class="container">
            <div class="stats-header">
                <h2 class="stats-title">The Hype Is Real. The Numbers Prove It</h2>
                <p class="stats-subtitle">Join thousands ready to transform their concert experience with Concert Circle.</p>
            </div>
            <div class="stats-grid">
                <div class="stat-card" style="--order: 1;">
                    <div class="stat-value">50+</div>
                    <div class="stat-label">Curated Packages Ready to Roll</div>
                </div>
                <div class="stat-card" style="--order: 2;">
                    <div class="stat-value">1K+</div>
                    <div class="stat-label">Fans in Our Circle Community</div>
                </div>
                <div class="stat-card" style="--order: 3;">
                    <div class="stat-value">25+</div>
                    <div class="stat-label">Cities Plugged into the Experience</div>
                </div>
                <div class="stat-card" style="--order: 4;">
                    <div class="stat-value">98%</div>
                    <div class="stat-label">Pre-launch User Interest & Positive Feedback</div>
                </div>
            </div>
            <a href="travis-details.php" class="cta-button">Book a Call</a>
            <p class="stats-subtitle">Ready to plan your next epic concert experience? Let's talk!</p>
        </div>
    </section>
        
    <section class="community-section">
        <div class="container">
            <div class="community-card">
                <div class="community-content">
                    <h2 class="community-title">Concert Circle Community</h2>
                    <p class="community-description">Circle up with your tribe, plan concert nights & be part of electrifying community</p>
                    <p><span style="color: white;">Join 1K+ Concert Enthusiasts</span></p>
                    <div class="community-cta">
                        <a href="https://chat.whatsapp.com/GkdJgdvoqxm0fvZgJ7ZPa0" class="community-button" aria-label="Join WhatsApp Community" target="_blank">
                            <span class="community-icon">🔘</span>
                            Join Community
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="blogs">
        <div class="container">
            <h1 class="banner-title" style="text-align: center; font-size: 2rem; margin-bottom: 2rem;">Explore Concert Circle Blogs!</h1>
            <div class="blogs-grid">
                <div class="blog-card">
                    <div class="blog-image" style="background-image: url('/img/b-1.png');"></div>
                    <div class="blog-content">
                        <h3 class="blog-title">How to Plan Your Epic Travis Scott Concert Trip in Delhi</h3>
                        <p class="blog-description">Your zero-stress guide to the ultimate concert experience</p>
                        <a href="blog1.php" class="blog-link">Read More</a>
                    </div>
                </div>
                <div class="blog-card">
                    <div class="blog-image" style="background-image: url('/img/b-2.jpg');"></div>
                    <div class="blog-content">
                        <h3 class="blog-title">5 Tips Before Going to a Concert (So You Don't Regret It Later)</h3>
                        <p class="blog-description">Avoid common concert pitfalls with these practical tips to ensure a stress-free, epic experience</p>
                        <a href="blog2.php" class="blog-link">Read More</a>
                    </div>
                </div>
                <div class="blog-card">
                    <div class="blog-image" style="background-image: url('/img/b-3.jpg');"></div>
                    <div class="blog-content">
                        <h3 class="blog-title">We Asked 5 People: What’s Your Top Concert Red Flag?</h3>
                        <p class="blog-description">With whom do you agree the most?</p>
                        <a href="blog3.php" class="blog-link">Read More</a>
                    </div>
                </div>
            </div>
            <div style="text-align: center; margin-top: 2rem;">
                <a href="blogs.php" class="banner-button">News, Hacks and Wildest Concert Stories</a>
            </div>
        </div>
    </section>

    <section class="tagline">
        <div class="container">
            <div class="tagline-content">
                <h2 class="tagline-text">
                    Concert going experience made
                    <br>
                    <span class="tagline-highlight">convenient</span>
                    <span class="tagline-heart">♥</span>
                    <span class="tagline-highlight red">connected</span>
                </h2>
            </div>
        </div>
    </section>

    <nav class="bottom-nav" id="bottomNav">
        <a href="index.php" class="bottom-nav-item">
            <svg class="bottom-nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                <polyline points="9,22 9,12 15,12 15,22"></polyline>
            </svg>
            <span class="bottom-nav-label">Home</span>
        </a>
        <a href="packages.php" class="bottom-nav-item">
            <svg class="bottom-nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"></path>
            </svg>
            <span class="bottom-nav-label">Packages</span>
        </a>
        <a href="geolocation-cc.php" class="bottom-nav-item">
            <svg class="bottom-nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M12 2a7 7 0 0 0-7 7c0 5.25 7 13 7 13s7-7.75 7-13a7 7 0 0 0-7-7z"></path>
                <circle cx="12" cy="9" r="2"></circle>
            </svg>
            <span class="bottom-nav-label">Geolocation</span>
        </a>
        <a href="store.php" class="bottom-nav-item">
            <svg class="bottom-nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                <circle cx="9" cy="9" r="2"></circle>
                <path d="m21 15–3.086–3.086a2 2 0 0 0–2.828 0L6 21"></path>
            </svg>
            <span class="bottom-nav-label">Store</span>
        </a>
        <a href="aboutcc.php" class="bottom-nav-item">
            <svg class="bottom-nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                <circle cx="12" cy="7" r="4"></circle>
            </svg>
            <span class="bottom-nav-label">About</span>
        </a>
    </nav>

    <div class="popup" id="concertPopup" role="dialog" aria-labelledby="popupTitle" aria-hidden="true">
        <button class="close-button" id="closePopupBtn" style="position: absolute; top: 10px; right: 10px; font-size: 16px; width: 24px; height: 24px; line-height: 24px; padding: 0;" aria-label="Close popup">✕</button>
        <h2 id="popupTitle">Save ₹3000 When You Come as a Group!</h2>
        <p>Bring 3+ friends and unlock up to ₹3000 OFF your concert package.</p>
        <p>Enter your details to grab your code:</p>
        <div class="form-group" id="formGroup">
            <input type="text" id="name" placeholder="Full Name ✨" required aria-required="true" aria-label="Full Name">
            <input type="email" id="email" placeholder="Email 📧" required aria-required="true" aria-label="Email Address">
            <input type="tel" id="phone" placeholder="Phone 📱" required aria-required="true" aria-label="Phone Number">
        </div>
        <p class="offer-text">Only 20 Codes Available – Don’t Miss Out!</p>
        <div class="timer-container">
            <svg class="timer-svg" viewBox="0 0 100 100" aria-hidden="true">
                <circle cx="50" cy="50" r="45" stroke-dasharray="283" stroke-dashoffset="0" id="timerCircle"/>
                <text x="50" y="55" text-anchor="middle" class="timer-text" id="timerText">0:20</text>
            </svg>
        </div>
        <button id="joinButton" onclick="showForm()">I’m In - Send Me The Code</button>
    </div>

    <div class="ticket-overlay" id="ticketOverlay"></div>
    <div class="ticket-popup" id="ticketPopup" role="dialog" aria-labelledby="ticketPopupTitle" aria-hidden="true">
        <button class="close-button" id="closeTicketPopupBtn" style="position: absolute; top: 10px; right: 10px; font-size: 16px; width: 24px; height: 24px; line-height: 24px; padding: 0;" aria-label="Close ticket popup">✕</button>
        <div style="display: flex; flex-direction: column; align-items: center; gap: 15px; width: 100%; max-width: 600px; margin: 0 auto;">
            <h2 id="ticketPopupTitle" style="width: 100%; text-align: center;">Going to Travis Scott Concert?</h2>
            <p style="text-align: center;">Upload your ticket → To be 1 of 5 fans who get their ticket <b>100% refunded!</b></p>
            <form action="upload.php" method="post" enctype="multipart/form-data" style="display: flex; flex-direction: column; gap: 10px; width: 100%;">
                <input type="text" name="name" placeholder="Full Name ✨" required aria-required="true" aria-label="Full Name" style="width: 100%;">
                <input type="email" name="email" placeholder="Email 📧" required aria-required="true" aria-label="Email Address" style="width: 100%;">
                <input type="tel" name="phone" placeholder="Phone 📱" required aria-required="true" aria-label="Phone Number" style="width: 100%;">
                <input type="file" name="ticket_photo" accept="image/*" required aria-required="true" aria-label="Ticket Photo" style="width: 100%;">
                <button type="submit" style="margin-top: 10px;">Submit Ticket</button>
            </form>
        </div>
    </div>

    <script>
        // Set active navigation item based on current page
        document.addEventListener('DOMContentLoaded', () => {
            const currentPath = window.location.pathname.split('/').pop() || 'index.php';
            const navItems = document.querySelectorAll('.nav-item, .bottom-nav-item');
            
            navItems.forEach(item => {
                item.classList.remove('active');
                item.removeAttribute('aria-current');
                const href = item.getAttribute('href');
                if (href === currentPath) {
                    item.classList.add('active');
                    item.setAttribute('aria-current', 'true');
                }
            });
        });
            
        // Hero carousel functionality
        const slides = document.querySelectorAll('.carousel-slide');
        const indicators = document.querySelectorAll('.carousel-indicator');
        const progressBar = document.querySelector('.progress-bar');
        const carousel = document.querySelector('.hero-carousel');
        let currentSlide = 0;
        const totalSlides = slides.length;
        let autoPlayInterval;
        let isUserInteracting = false;

        let startX = 0, endX = 0, startY = 0, endY = 0;

        function showSlide(index) {
            slides.forEach((slide, i) => {
                slide.classList.toggle('active', i === index);
            });
            indicators.forEach((indicator, i) => {
                indicator.classList.toggle('active', i === index);
                indicator.setAttribute('aria-selected', i === index);
            });
            currentSlide = index;
            resetProgress();
        }

        function nextSlide() {
            const nextIndex = (currentSlide + 1) % totalSlides;
            showSlide(nextIndex);
        }

        function prevSlide() {
            const prevIndex = (currentSlide - 1 + totalSlides) % totalSlides;
            showSlide(prevIndex);
        }

        function resetProgress() {
            if (progressBar && !isUserInteracting) {
                progressBar.style.transition = 'none';
                progressBar.style.width = '0%';
                setTimeout(() => {
                    progressBar.style.transition = 'width 2s linear';
                    progressBar.style.width = '100%';
                }, 50);
            }
        }

        function startAutoPlay() {
            if (!isUserInteracting) {
                clearInterval(autoPlayInterval);
                autoPlayInterval = setInterval(nextSlide, 2000);
            }
        }

        function pauseAutoPlay() {
            clearInterval(autoPlayInterval);
            if (progressBar) progressBar.style.transition = 'none';
        }

        carousel.addEventListener('touchstart', (e) => {
            startX = e.touches[0].clientX;
            startY = e.touches[0].clientY;
            isUserInteracting = true;
            pauseAutoPlay();
        }, { passive: true });

        carousel.addEventListener('touchend', (e) => {
            endX = e.changedTouches[0].clientX;
            endY = e.changedTouches[0].clientY;
            handleSwipe();
            isUserInteracting = false;
            setTimeout(startAutoPlay, 2000);
        }, { passive: true });

        function handleSwipe() {
            const deltaX = startX - endX;
            const minSwipeDistance = 50;
            if (Math.abs(deltaX) > minSwipeDistance) {
                if (deltaX > 0) nextSlide();
                else prevSlide();
            }
        }

        indicators.forEach((indicator, index) => {
            indicator.addEventListener('click', () => {
                isUserInteracting = true;
                showSlide(index);
                setTimeout(() => { isUserInteracting = false; startAutoPlay(); }, 2000);
            });
        });

        carousel.addEventListener('mouseenter', pauseAutoPlay);
        carousel.addEventListener('mouseleave', () => { isUserInteracting = false; startAutoPlay(); });

        // Initialize
        document.addEventListener('DOMContentLoaded', () => {
            showSlide(0);
            startAutoPlay();
        });
        
        if ('serviceWorker' in navigator) {
          window.addEventListener('load', () => {
            navigator.serviceWorker.register('/sw.js').catch(err => console.log('Service Worker error:', err));
          });
        }

        document.addEventListener('DOMContentLoaded', () => {
            const wrapper = document.getElementById('packages-wrapper');
            const slides = document.querySelectorAll('.packages-slide');

            function updateLayout() {
                if (window.innerWidth < 1024) { // Mobile and tablets (<1024px)
                    slides.forEach(slide => {
                        const back = slide.querySelector('.package-back');
                        const details = back.querySelector('.package-details');
                        const ul = details.querySelector('ul');
                        const items = ul.querySelectorAll('li');
                        const originalItems = Array.from(items);
                        if (items.length > 3) {
                            while (ul.children.length > 3) ul.removeChild(ul.lastChild);
                            const remainingCount = originalItems.length - 3;
                            const more = document.createElement('div');
                            more.className = 'more-experiences';
                            more.textContent = `+${remainingCount} more experiences`;
                            details.appendChild(more);
                        }
                        back.style.height = 'auto';
                        back.style.padding = '10px';
                        details.style.padding = '5px';
                        ul.style.margin = '0';
                        ul.style.padding = '0 0 0 15px';
                        items.forEach(item => {
                            item.style.fontSize = '14px';
                            item.style.margin = '5px 0';
                        });
                        const footer = back.querySelector('.package-footer');
                        footer.style.position = 'relative';
                        footer.style.textAlign = 'right';
                        footer.style.marginTop = '10px';
                        const pricing = back.querySelector('.package-pricing');
                        pricing.style.position = 'relative';
                        pricing.style.textAlign = 'right';
                        pricing.style.marginTop = '5px';
                    });
                } else {
                    slides.forEach(slide => {
                        const back = slide.querySelector('.package-back');
                        back.style.height = '';
                        back.style.padding = '';
                        const details = back.querySelector('.package-details');
                        details.style.padding = '';
                        const ul = details.querySelector('ul');
                        ul.style.margin = '';
                        ul.style.padding = '';
                        const items = ul.querySelectorAll('li');
                        items.forEach(item => {
                            item.style.fontSize = '';
                            item.style.margin = '';
                        });
                        const footer = back.querySelector('.package-footer');
                        footer.style.position = '';
                        footer.style.textAlign = '';
                        const pricing = back.querySelector('.package-pricing');
                        pricing.style.position = '';
                        pricing.style.textAlign = '';
                        const more = slide.querySelector('.more-experiences');
                        if (more) more.remove();
                    });
                }
            }

            updateLayout();
            window.addEventListener('resize', updateLayout);

            class PackagesCarousel {
                constructor() {
                    this.wrapper = document.getElementById('packages-wrapper');
                    this.slides = document.querySelectorAll('.packages-slide');
                    this.prevBtn = document.getElementById('prevBtn');
                    this.nextBtn = document.getElementById('nextBtn');
                    this.indicatorsContainer = document.getElementById('indicators');
                    this.currentIndex = 0;
                    this.totalSlides = this.slides.length;
                    this.slidesPerView = this.getSlidesPerView();
                    this.maxIndex = Math.max(0, this.totalSlides - this.slidesPerView);
                    this.isTransitioning = false;
                    this.autoPlayInterval = null;
                    this.flipInterval = null;
                    this.resizeTimeout = null;
                    this.touchStartX = 0;
                    this.touchStartY = 0;
                    this.isDragging = false;
                    this.init();
                }

                getSlidesPerView() {
                    const width = window.innerWidth;
                    if (width >= 1024) return 3;
                    if (width >= 768) return 2;
                    return 1;
                }

                init() {
                    this.createIndicators();
                    this.updateCarousel();
                    this.bindEvents();
                    this.startAutoFlip();
                    if (window.innerWidth >= 768) {
                        this.startAutoPlay();
                    }
                }

                createIndicators() {
                    this.indicatorsContainer.innerHTML = '';
                    for (let i = 0; i <= this.maxIndex; i++) {
                        const indicator = document.createElement('div');
                        indicator.className = 'carousel-indicator';
                        if (i === 0) indicator.classList.add('active');
                        indicator.addEventListener('click', () => this.goToSlide(i));
                        this.indicatorsContainer.appendChild(indicator);
                    }
                }

                updateCarousel() {
                    if (this.isTransitioning) return;
                    this.isTransitioning = true;
                    const translateX = -this.currentIndex * (100 / this.slidesPerView);
                    this.wrapper.style.transition = 'transform 0.5s cubic-bezier(0.4, 0.0, 0.2, 1)';
                    this.wrapper.style.transform = `translateX(${translateX}%)`;
                    this.slides.forEach((slide, index) => {
                        const isActive = index >= this.currentIndex && index < this.currentIndex + this.slidesPerView;
                        const isCenterActive = index === this.currentIndex + Math.floor(this.slidesPerView / 2);
                        slide.classList.toggle('active', this.slidesPerView === 1 ? index === this.currentIndex : isCenterActive);
                    });
                    this.prevBtn.disabled = this.currentIndex <= 0;
                    this.nextBtn.disabled = this.currentIndex >= this.maxIndex;
                    const indicators = this.indicatorsContainer.querySelectorAll('.carousel-indicator');
                    indicators.forEach((indicator, index) => {
                        indicator.classList.toggle('active', index === this.currentIndex);
                    });
                    setTimeout(() => {
                        this.isTransitioning = false;
                    }, 500);
                }

                goToSlide(index) {
                    if (this.isTransitioning || index === this.currentIndex) return;
                    this.currentIndex = Math.max(0, Math.min(index, this.maxIndex));
                    this.updateCarousel();
                    this.resetAutoPlay();
                }

                next() {
                    if (this.currentIndex < this.maxIndex) {
                        this.goToSlide(this.currentIndex + 1);
                    } else {
                        this.goToSlide(0);
                    }
                }

                prev() {
                    if (this.currentIndex > 0) {
                        this.goToSlide(this.currentIndex - 1);
                    } else {
                        this.goToSlide(this.maxIndex);
                    }
                }

                startAutoFlip() {
                    this.stopAutoFlip();
                    this.flipInterval = setInterval(() => {
                        const cards = document.querySelectorAll('.package-card');
                        cards.forEach(card => {
                            const slide = card.closest('.packages-slide');
                            const slideIndex = Array.from(this.slides).indexOf(slide);
                            const isVisible = slideIndex >= this.currentIndex && slideIndex < this.currentIndex + this.slidesPerView;
                            if (isVisible && !card.matches(':hover')) {
                                card.classList.toggle('flipped');
                            }
                        });
                    }, 3000);
                }

                stopAutoFlip() {
                    if (this.flipInterval) {
                        clearInterval(this.flipInterval);
                        this.flipInterval = null;
                    }
                }

                bindEvents() {
                    this.prevBtn.addEventListener('click', () => {
                        this.prev();
                        this.resetAutoFlip();
                    });
                    this.nextBtn.addEventListener('click', () => {
                        this.next();
                        this.resetAutoFlip();
                    });

                    this.wrapper.addEventListener('touchstart', (e) => {
                        this.touchStartX = e.touches[0].clientX;
                        this.touchStartY = e.touches[0].clientY;
                        this.isDragging = true;
                        this.pauseAutoPlay();
                        this.stopAutoFlip();
                    }, { passive: true });

                    this.wrapper.addEventListener('touchmove', (e) => {
                        if (!this.isDragging) return;
                        const touchX = e.touches[0].clientX;
                        const touchY = e.touches[0].clientY;
                        const deltaX = this.touchStartX - touchX;
                        const deltaY = this.touchStartY - touchY;

                        if (Math.abs(deltaY) > Math.abs(deltaX)) {
                            this.isDragging = false;
                            return;
                        }

                        e.preventDefault();
                    }, { passive: false });

                    this.wrapper.addEventListener('touchend', (e) => {
                        if (!this.isDragging) return;
                        const endX = e.changedTouches[0].clientX;
                        const endY = e.changedTouches[0].clientY;
                        const deltaX = this.touchStartX - endX;
                        const deltaY = this.touchStartY - endY;
                        const minSwipeDistance = 40;

                        if (Math.abs(deltaX) > Math.abs(deltaY) && Math.abs(deltaX) > minSwipeDistance) {
                            if (deltaX > 0) this.next();
                            else this.prev();
                        }

                        this.isDragging = false;
                        if (window.innerWidth >= 768) {
                            this.resetAutoPlay();
                        }
                        this.startAutoFlip();
                    }, { passive: true });

                    this.wrapper.addEventListener('wheel', (e) => {
                        e.preventDefault();
                        if (this.isTransitioning || window.innerWidth < 768) return;
                        const deltaY = e.deltaY;
                        const minScrollDistance = 20;

                        if (Math.abs(deltaY) > minScrollDistance) {
                            if (deltaY > 0) this.next();
                            else this.prev();
                            this.resetAutoFlip();
                        }
                    }, { passive: false });

                    this.wrapper.addEventListener('mouseenter', () => {
                        this.pauseAutoPlay();
                        this.stopAutoFlip();
                    });

                    this.wrapper.addEventListener('mouseleave', () => {
                        if (window.innerWidth >= 768) {
                            this.resetAutoPlay();
                        }
                        this.startAutoFlip();
                    });

                    document.querySelectorAll('.package-card').forEach(card => {
                        card.addEventListener('click', (e) => {
                            e.stopPropagation();
                            card.classList.toggle('flipped');
                            this.stopAutoFlip();
                            setTimeout(() => {
                                this.startAutoFlip();
                            }, 2000);
                        });
                    });

                    window.addEventListener('resize', () => {
                        clearTimeout(this.resizeTimeout);
                        this.resizeTimeout = setTimeout(() => {
                            this.handleResize();
                        }, 100);
                    });
                }

                handleResize() {
                    const newSlidesPerView = this.getSlidesPerView();
                    if (newSlidesPerView !== this.slidesPerView) {
                        this.slidesPerView = newSlidesPerView;
                        this.maxIndex = Math.max(0, this.totalSlides - this.slidesPerView);
                        this.currentIndex = Math.min(this.currentIndex, this.maxIndex);
                        this.createIndicators();
                        this.updateCarousel();
                        this.stopAutoFlip();
                        this.startAutoFlip();
                        if (window.innerWidth < 768) {
                            this.pauseAutoPlay();
                        } else {
                            this.resetAutoPlay();
                        }
                    }
                }

                startAutoPlay() {
                    this.pauseAutoPlay();
                    if (window.innerWidth < 768) return;
                    this.autoPlayInterval = setInterval(() => {
                        this.next();
                    }, 4000);
                }

                pauseAutoPlay() {
                    if (this.autoPlayInterval) {
                        clearInterval(this.autoPlayInterval);
                        this.autoPlayInterval = null;
                    }
                }

                resetAutoPlay() {
                    this.pauseAutoPlay();
                    if (window.innerWidth < 768) return;
                    setTimeout(() => {
                        this.startAutoPlay();
                    }, 2000);
                }

                resetAutoFlip() {
                    this.stopAutoFlip();
                    setTimeout(() => {
                        this.startAutoFlip();
                    }, 1000);
                }
            }

            new PackagesCarousel();
        });

        // Popup functionality
        let timerInterval = null;
        let ticketTimerInterval = null;

        function closePopup() {
            const popup = document.getElementById('concertPopup');
            popup.classList.remove('active');
            popup.setAttribute('aria-hidden', 'true');
            document.querySelector('.nav-container').focus();
            if (timerInterval) {
                clearInterval(timerInterval);
                timerInterval = null;
            }
        }

        function showForm() {
            const formGroup = document.getElementById('formGroup');
            const joinButton = document.getElementById('joinButton');
            formGroup.classList.add('active');
            joinButton.textContent = 'Submit Details';
            joinButton.onclick = submitForm;
            document.getElementById('name').focus();
            if (timerInterval) {
                clearInterval(timerInterval);
                timerInterval = null;
                const timerText = document.getElementById('timerText');
                timerText.textContent = '0:20';
                const timerCircle = document.getElementById('timerCircle');
                timerCircle.setAttribute('stroke-dashoffset', '0');
            }
        }

        function submitForm() {
            const name = document.getElementById('name').value.trim();
            const email = document.getElementById('email').value.trim();
            const phone = document.getElementById('phone').value.trim();

            if (!name || !email || !phone) {
                alert('Please fill all fields.');
                return;
            }

            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email)) {
                alert('Please enter a valid email address.');
                return;
            }

            const phoneRegex = /^[\d\s\-\+\(\)]{10,}$/;
            if (!phoneRegex.test(phone)) {
                alert('Please enter a valid phone number.');
                return;
            }

            const joinButton = document.getElementById('joinButton');
            joinButton.disabled = true;
            joinButton.textContent = 'Submitting...';

            setTimeout(() => {
                try {
                    const userData = {
                        name: name,
                        email: email,
                        phone: phone,
                        timestamp: new Date().toISOString()
                    };
                    localStorage.setItem('concertCircleUser', JSON.stringify(userData));
                    localStorage.setItem('popupSubmitted', 'true');
                    
                    alert('Thank you! Your details have been saved. Check your email for the discount code!');
                    closePopup();
                    window.location.href = 'packages.php';
                } catch (error) {
                    console.error('Error saving data:', error);
                    alert('Something went wrong. Please try again.');
                    joinButton.disabled = false;
                    joinButton.textContent = 'Submit Details';
                }
            }, 1500);
        }

        function showPopup(duration) {
            const popup = document.getElementById('concertPopup');
            popup.classList.add('active');
            popup.setAttribute('aria-hidden', 'false');
            document.getElementById('joinButton').focus();

            let timeLeft = duration / 1000;
            const totalTime = timeLeft;
            const timerCircle = document.getElementById('timerCircle');
            const timerText = document.getElementById('timerText');
            const circumference = 283;

            timerInterval = setInterval(() => {
                timeLeft--;
                const minutes = Math.floor(timeLeft / 60);
                const seconds = timeLeft % 60;
                timerText.textContent = `${minutes}:${seconds < 10 ? '0' : ''}${seconds}`;
                const offset = circumference * (1 - timeLeft / totalTime);
                timerCircle.setAttribute('stroke-dashoffset', offset);
                if (timeLeft <= 0) {
                    clearInterval(timerInterval);
                    timerInterval = null;
                    closePopup();
                }
            }, 1000);

            const closeBtn = document.getElementById('closePopupBtn');
            closeBtn.addEventListener('click', () => {
                closePopup();
            }, { once: true });
        }

        // Ticket Popup functionality
        function showTicketPopup(duration) {
            const popup = document.getElementById('ticketPopup');
            const overlay = document.getElementById('ticketOverlay');
            popup.classList.add('active');
            popup.setAttribute('aria-hidden', 'false');
            overlay.classList.add('active');
            document.querySelector('.ticket-popup input[name="name"]').focus();
        }

        function closeTicketPopup() {
            const popup = document.getElementById('ticketPopup');
            const overlay = document.getElementById('ticketOverlay');
            popup.classList.remove('active');
            popup.setAttribute('aria-hidden', 'true');
            overlay.classList.remove('active');
            document.querySelector('.nav-container').focus();
            if (ticketTimerInterval) {
                clearInterval(ticketTimerInterval);
                ticketTimerInterval = null;
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            const isTicketSubmitted = localStorage.getItem('ticketPopupSubmitted');
            const isPopupSubmitted = localStorage.getItem('popupSubmitted');
            if (!isTicketSubmitted && !isPopupSubmitted) {
                setTimeout(() => {
                    showPopup(20000);
                    showTicketPopup(20000);
                    setInterval(() => {
                        showPopup(25000);
                        showTicketPopup(5000);
                    }, 120000);
                }, 5000);
            }

            document.getElementById('closeTicketPopupBtn').addEventListener('click', closeTicketPopup);
            document.getElementById('closePopupBtn').addEventListener('click', closePopup);
        });

        // Smooth scroll functionality
        function smoothScrollTo(element, duration = 1000) {
            const targetPosition = element.offsetTop - 100;
            const startPosition = window.pageYOffset;
            const distance = targetPosition - startPosition;
            let startTime = null;

            function animation(currentTime) {
                if (startTime === null) startTime = currentTime;
                const timeElapsed = currentTime - startTime;
                const run = ease(timeElapsed, startPosition, distance, duration);
                window.scrollTo(0, run);
                if (timeElapsed < duration) requestAnimationFrame(animation);
            }

            function ease(t, b, c, d) {
                t /= d / 2;
                if (t < 1) return c / 2 * t * t + b;
                t--;
                return -c / 2 * (t * (t - 2) - 1) + b;
            }

            requestAnimationFrame(animation);
        }

        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                e.stopPropagation();
                const targetId = this.getAttribute('href').substring(1);
                const target = document.getElementById(targetId);
                if (target) {
                    const headerOffset = document.querySelector('header')?.offsetHeight || 0;
                    const targetPosition = target.getBoundingClientRect().top + window.pageYOffset - headerOffset - 20;
                    window.scrollTo({
                        top: targetPosition,
                        behavior: 'smooth'
                    });
                }
            });
        });

        // Initialize everything
        document.addEventListener('DOMContentLoaded', function() {
            showSlide(0);
            startAutoPlay();

            document.querySelectorAll('.stat-card, .package-card').forEach(card => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(30px)';
                observer.observe(card);
            });
        });

        // Intersection Observer for animations
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.2 });
    </script>
</body>
</html>