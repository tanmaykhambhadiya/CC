<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <style>
    /* Critical CSS for above-the-fold content */
    .hero-section {
        height: 100vh;
        position: relative;
        overflow: hidden;
    }
    .featured-carousel {
        height: 100%;
        position: relative;
    }
    .featured-slide {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        opacity: 0;
        transition: opacity 0.5s ease;
    }
    .featured-slide.active {
        opacity: 1;
    }
    .slider-inside-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    </style>
    <title>Concert Circle - Unify Your Concert Experience</title>
    <link rel="icon" href="LOGO for website (circular).png" type="image/x-icon">
    <link rel="shortcut icon" href="LOGO for website (circular).png" type="image/x-icon">
    <link rel="icon" type="image/x-icon" href="LOGO for website (circular).png">
     <link rel="preload" href="index.css" as="style">
     <link rel="preload" href="navbar.css" as="style">
    <link rel="preload" href="footer.css" as="style">
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
    <link rel="preload" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;900&display=swap" as="style">
    
    <link rel="stylesheet" href="index.css" media="print" onload="this.media='all'">
    <link rel="stylesheet" href="navbar.css" media="print" onload="this.media='all'">
    <link rel="stylesheet" href="footer.css" media="print" onload="this.media='all'">
</head>

<body>
    
    <!-- Community Pop-up -->
   <div class="community-popup" id="communityPopup">
        <div class="popup-content">
            <button class="popup-close" id="popupClose">
                <i class="fas fa-times"></i>
            </button>
            
            <div class="popup-header">
                <div class="popup-icon">
                    <i class="fas fa-concierge-bell"></i>
                </div>
                
                <h2 class="popup-title">VIP Concierge Service</h2>
                <p class="popup-subtitle">Make every concert unforgettable with our personalized concierge solutions.</p>
                <p class="popup-subtitle">Let Concert Circle handle the details—so you can focus on the music, the moments, and the fun!</p>
                <p class="popup-tagline">"From planning to memories — we take care of it all!"</p>
            </div>
            
            <div class="popup-features">
                <div class="popup-feature">
                    <i class="fas fa-crown"></i>
                    <span>Local Guide & Exploration</span>
                </div>
                <div class="popup-feature">
                    <i class="fas fa-route"></i>
                    <span>Seamless Travel Planning</span>
                </div>
                <div class="popup-feature">
                    <i class="fas fa-bed"></i>
                    <span>Curated Luxury Stays</span>
                </div>
                <div class="popup-feature">
                    <i class="fas fa-utensils"></i>
                    <span>Exceptional Dining Experiences</span>
                </div>
            </div>
            
            <div class="popup-buttons">
                <a href="Concierge.html" class="popup-cta-btn" target="_blank" id="conciergeService">
                    <i class="fas fa-star"></i>
                    Explore VIP Concierge
                </a>
                
                <div class="popup-divider"></div>
                
                <a href="https://chat.whatsapp.com/GkdJgdvoqxm0fvZgJ7ZPa0" class="popup-secondary-btn" target="_blank" id="joinWhatsApp">
                    <i class="fab fa-whatsapp"></i>
                    Join WhatsApp Community
                </a>
            </div>
            
            <div class="popup-timer">
                <span id="timerText">This popup will close in <span id="countdown">25</span> seconds</span>
                <div class="timer-bar">
                    <div class="timer-progress" id="timerProgress"></div>
                </div>
            </div>
        </div>
    </div>

    <?php include 'header.php' ?>

     <section class="hero-section">
        <div class="featured-carousel">
            <?php
            // Include database connection
            require_once('inc/config.php');

           // New cached code - ADD
            $sliders = getCachedData('sliders', "SELECT * FROM sliders ORDER BY id ASC", $pdo);
            $events = getCachedData('events', "SELECT * FROM homeevent ORDER BY id ASC", $pdo);
            $communities = getCachedData('communities', "SELECT * FROM home_community ORDER BY id ASC", $pdo);
          

            // Display regular slides
            foreach ($sliders as $index => $slider) {
            ?>
            <div class="featured-slide <?php echo $index === 0 ? 'active' : ''; ?>">
                <?php if (!empty($slider['video_url']) || file_exists('3.mp4')) : ?>
                    <video autoplay muted loop playsinline class="slide-background">
                    <source src="3.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
                <?php else : ?>
                <div class="slide-background" style="background-image: url('concert-2527495_1280.jpg');"></div>
                <?php endif; ?>
                <div class="slide-overlay gradient-overlay"></div>
                <div class="featured-slide-content">
                    <div class="featured-slide-image">
                        <img src="uploads/slider/<?php echo htmlspecialchars($slider['image']); ?>" 
     alt="<?php echo htmlspecialchars($slider['title']); ?>" 
     class="slider-inside-image">
                    </div>
                    <div class="featured-slide-text">
                        <h1 class="featured-title"><?php echo htmlspecialchars($slider['title']); ?></h1>
                        <p class="featured-subtitle"><?php echo htmlspecialchars($slider['subtitle']); ?></p>
                        <div class="slide-meta">
                            <?php if (!empty($slider['event_date'])) : ?>
                            <div class="meta-item">
                                <div class="meta-icon"><i class="fas fa-calendar"></i></div>
                                <span><?php echo htmlspecialchars($slider['event_date']); ?></span>
                            </div>
                            <?php endif; ?>
                            <?php if (!empty($slider['location'])) : ?>
                            <div class="meta-item">
                                <div class="meta-icon"><i class="fas fa-map-marker-alt"></i></div>
                                <span><?php echo htmlspecialchars($slider['location']); ?></span>
                            </div>
                            <?php endif; ?>
                        </div>
                        <div class="slide-actions">
                            <a href="<?php echo htmlspecialchars($slider['button_link']); ?>" 
                               class="slide-btn btn-primary">
                               <?php echo htmlspecialchars($slider['button_text'] ?: 'Explore'); ?>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            }

             ?>
           
            <!-- Navigation Arrows -->
            <div class="hero-arrows">
                <button class="hero-arrow left" aria-label="Previous slide">
                    <i class="fas fa-chevron-left"></i>
                </button>
                <button class="hero-arrow right" aria-label="Next slide">
                    <i class="fas fa-chevron-right"></i>
                </button>
            </div>

            <!-- Slide Indicators -->
            <div class="hero-indicators">
                <?php 
                $total_slides = count($sliders);
                for ($i = 0; $i < $total_slides; $i++) : 
                ?>
                <button class="hero-indicator <?php echo $i === 0 ? 'active' : ''; ?>" 
                        data-slide="<?php echo $i; ?>" 
                        aria-label="Go to slide <?php echo $i + 1; ?>">
                </button>
                <?php endfor; ?>
            </div>
        </div>
    </section>

    <!-- Events Carousel Section -->
        <section class="carousel-section" id="events">
        <div class="container">
            <div class="section-header">
                <div class="section-title-wrapper">
                    <h2 class="section-title gradient-text">Upcoming Events</h2>
                    <p class="section-subtitle">Discover and join exciting concerts near you</p>
                </div>
                <a href="events.php" class="view-all-link">
                    <span>View All Events</span>
                    <i class="fas fa-arrow-right"></i>
                </a>
            </div>
            
            <div class="events-grid">
                <?php
                require_once('inc/config.php');

                try {
                    $statement = $pdo->prepare("SELECT * FROM homeevent ORDER BY id ASC");
                    $statement->execute();
                    $events = $statement->fetchAll(PDO::FETCH_ASSOC);

                    if (!empty($events)) {
                        foreach ($events as $event) {
                            ?>
                            <div class="event-card">
                                <div class="event-image-container">
                                    <img src="uploads/homeevent/<?php echo htmlspecialchars($event['image_url']); ?>" 
                                         alt="<?php echo htmlspecialchars($event['title']); ?>" 
                                         class="event-image">
                                    <div class="event-overlay">
                                        <div class="event-quick-info">
                                            <span class="event-date">
                                                <i class="far fa-calendar"></i>
                                                <?php echo htmlspecialchars($event['date_range']); ?>
                                            </span>
                                            <span class="event-location">
                                                <i class="fas fa-map-marker-alt"></i>
                                                <?php echo htmlspecialchars($event['location']); ?>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="event-content">
                                    <div class="event-info">
    <h3 class="event-title"><?php echo htmlspecialchars($event['title']); ?></h3>
    <p class="event-genre"><?php echo htmlspecialchars($event['genre']); ?>  </p>
    
    <p class="event-genre" style="color:goldenrod;">
        <i class="fas fa-star"></i>
        <?php echo htmlspecialchars($event['rating']); ?>
    </p>
</div>

                                    
                                   
                                    <div class="event-actions">
                                        <a href="<?php echo htmlspecialchars($event['link']); ?>" class="join-btn">
                                            <i class="fas fa-plus-circle"></i>
                                           Explore
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    } else {
                        ?>
                        <div class="no-events-message">
                            <i class="fas fa-calendar-times"></i>
                            <h3>No Events Found</h3>
                            <p>Stay tuned for exciting events coming soon!</p>
                        </div>
                        <?php
                    }
                } catch (PDOException $e) {
                    ?>
                    <div class="error-message">
                        <i class="fas fa-exclamation-circle"></i>
                        <h3>Oops! Something went wrong</h3>
                        <p>Unable to load events. Please try again later.</p>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </section>
         
<div class="concierge-hero">
  <div class="concierge-glass-card">
    <h1 class="blurred-heading">Concert Circle Concierge</h1>
    <p class="clear-subtitle">Your premium path to unforgettable live music experiences</p>
  </div>
</div>
  
<div class="timeline-container">
    <div class="timeline-wrapper">
        <div class="timeline-line"></div>
        <div class="timeline-items-container">
            <div class="timeline-item">
                <div class="step-number">1</div>
                <div class="timeline-title">
                    <span class="emoji">🎉</span>
                    <span>Get Onboard – It's Totally Free</span>
                </div>
                <div class="timeline-content">
                    Kickstart your experience by clicking the "Book a Call" button below. Whether you're attending solo or vibing with your crew, we'll help you plan the perfect concert journey — with zero stress and maximum fun.
                </div>
            </div>
            <div class="timeline-item">
                <div class="step-number">2</div>
                <div class="timeline-title">
                    <span class="emoji">📞</span>
                    <span>Let's Chat About Your Plans</span>
                </div>
                <div class="timeline-content">
                    Once you're in, our team will connect with you over WhatsApp or a quick call. We'll understand your travel preferences, group size, budget, and any special requests — then craft a personalized concert trip itinerary that fits your vibe perfectly.
                </div>
            </div>
            <div class="timeline-item">
                <div class="step-number">3</div>
                <div class="timeline-title">
                    <span class="emoji">🧳</span>
                    <span>Your Ultimate Concert Experience, Handled</span>
                </div>
                <div class="timeline-content">
                    You'll be matched with your own dedicated Concert Concierge who handles it all — from securing your tickets, arranging travel and accommodation, to dropping local recommendations and organizing post-show hangouts
                </div>
            </div>
        </div>
    </div>
</div>    
         <!-- Enhanced Service Fee Notice Box -->
  <div class="service-notice">
    <div class="notice-background-effect"></div>
    <div class="notice-content">
      <div class="notice-left">
        <div class="notice-icon">⚡</div>
        <div class="notice-text">
          <span class="notice-highlight">Premium Service Notice:</span>
          <span class="notice-main">All services provided through Concert Circle's concierge will incur a nominal service fee of 10% per transaction.</span>
        </div>
      </div>
       <div class="notice-right">
  <a href="Concierge.html" class="cta-button">
    <span class="button-icon">🕼</span>
    <span class="button-text">Book a call </span>
    <div class="button-glow"></div>
  </a>
</div>

    </div>
  </div>
         
         
         
         
         
    <!-- Communities Section -->
    <section class="communities-section" id="communities">
        <div class="container">
            <div class="communities-header">
                <h2 class="section-title gradient-text">Discover Communities</h2>
                <p class="section-subtitle">Join vibrant communities of music lovers and create unforgettable experiences together</p>
            </div>
            <div class="communities-grid">
                <?php
                require_once('inc/config.php');

                try {
                    $statement = $pdo->prepare("SELECT * FROM home_community ORDER BY id ASC");
                    $statement->execute();
                    $communities = $statement->fetchAll(PDO::FETCH_ASSOC);

                    if (!empty($communities)) {
                        foreach ($communities as $community) {
                            ?>
                            <div class="community-card">
                                <div class="community-image-wrapper">
                                    <img src="uploads/communities/<?php echo htmlspecialchars($community['image_url']); ?>" 
                                         alt="<?php echo htmlspecialchars($community['name']); ?>" 
                                         class="community-image">
                                    <div class="community-overlay">
                                        <div class="community-content">
                                            <h3 class="community-name"><?php echo htmlspecialchars($community['name']); ?></h3>
                                            <div class="community-stats">
                                                <div class="stat">
                                                    <i class="fas fa-users"></i>
                                                    <span><?php echo htmlspecialchars($community['members_count']); ?> members</span>
                                                </div>
                                                <div class="stat">
                                                    <i class="fas fa-star"></i>
                                                    <span>Active Community</span>
                                                </div>
                                            </div>
                                            <a href="https://chat.whatsapp.com/GkdJgdvoqxm0fvZgJ7ZPa0" class="join-community-btn">
                                                explore
                                                <i class="fas fa-arrow-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="community-badge">
                                    <i class="fas fa-certificate"></i>
                                    <span>Featured</span>
                                </div>
                            </div>
                            <?php
                        }
                    } else {
                        ?>
                        <div class="no-communities-message">
                            <i class="fas fa-users-slash"></i>
                            <h3>No Communities Available</h3>
                            <p>Stay tuned! We're building something special for you.</p>
                        </div>
                        <?php
                    }
                } catch (PDOException $e) {
                    ?>
                    <div class="error-message">
                        <i class="fas fa-exclamation-circle"></i>
                        <h3>Oops! Something went wrong</h3>
                        <p>Unable to load communities. Please try again later.</p>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </section>
    <!-- Merchandise Section -->




    <!-- Experience Section -->
    <section class="experience-section" id="experience">
        <div class="container">
            <h2 class="section-title gradient-text">Unify Your Concert Experience</h2>
            <div class="experience-grid">
                <?php
                require_once('inc/config.php');

                try {
                    $statement = $pdo->prepare("SELECT * FROM experience_blocks ORDER BY id ASC");
                    $statement->execute();
                    $blocks = $statement->fetchAll(PDO::FETCH_ASSOC);

                    if (!empty($blocks)) {
                        foreach ($blocks as $block) {
                            // Define features array based on block data
                            $features = [
                                ['icon' => 'fa-users', 'text' => 'Community-driven'],
                                ['icon' => 'fa-shield-alt', 'text' => 'Safe & Secure'],
                                ['icon' => 'fa-star', 'text' => 'Premium Experience']
                            ];
                            ?>
                            <div class="experience-block">
                                <div class="experience-image-wrapper">
                                    <img src="uploads/experience/<?php echo htmlspecialchars($block['image_url']); ?>" 
                                         alt="<?php echo htmlspecialchars($block['title']); ?>" 
                                         class="experience-image">
                                    <div class="experience-overlay"></div>
                                </div>
                                <div class="experience-content">
                                    <h3 class="experience-title"><?php echo htmlspecialchars($block['title']); ?></h3>
                                    <p class="experience-description"><?php echo htmlspecialchars($block['description']); ?></p>
                                    
                                </div>
                            </div>
                            <?php
                        }
                    } else {
                        ?>
                        <div class="no-experience">
                            <i class="fas fa-exclamation-circle"></i>
                            <p>No experience blocks available at the moment</p>
                            <span>Check back soon for exciting updates!</span>
                        </div>
                        <?php
                    }
                } catch (PDOException $e) {
                    ?>
                    <div class="error-message">
                        <i class="fas fa-exclamation-triangle"></i>
                        <p>Failed to load experience blocks</p>
                        <span>Please try again later</span>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </section>

    <!-- Banner Section -->
    <section class="banner-section">
        <div class="container">
            <div class="banner-content-centered">
                <h2 class="banner-gradient-title">Stop settling for ordinary concert nights</h2>
                <p class="banner-subtitle">Join Concert Circle today- find your concert buddy, share rides, split costs & turn every show into exhilarating experience.</p>
                <a href="login.php" class="get-in-btn">GET IN NOW</a>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <!-- <section class="testimonial-section" id="testimonials">
        <div class="container">
            <div class="testimonial-header">
                <h2 class="section-title">What Our Members Say</h2>
            </div>
                <button class="testimonial-nav prev-testimonial">
                    <i class="fas fa-chevron-left"></i>
                </button>
                
            
            <div class="testimonial-slider">
                <div class="testimonial-wrapper">
                    <div class="testimonial-track">
                        <div class="testimonial-card">
                            <div class="testimonial-content">
                                <div class="quote-icon">
                                    <i class="fas fa-quote-left"></i>
                                </div>
                                <p class="testimonial-text">Concert Circle India completely transformed my experience at Arijit Singh's concert in Mumbai. I traveled from Bangalore with six Circle members, and we've already planned our next concert together in Delhi!</p>
                                <div class="testimonial-rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <span class="rating-text">5.0</span>
                                </div>
                            </div>
                            <div class="testimonial-author">
                                <div class="author-image">
                                    <img src="/api/placeholder/60/60" alt="Priya S." class="testimonial-avatar">
                                </div>
                                <div class="author-info">
                                    <h3 class="author-name">Priya S.</h3>
                                    <p class="author-location">
                                        <i class="fas fa-map-marker-alt"></i>
                                        Bangalore, India
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="testimonial-card">
                            <div class="testimonial-content">
                                <div class="quote-icon">
                                    <i class="fas fa-quote-left"></i>
                                </div>
                                <p class="testimonial-text">The group accommodation feature saved us over ₹15,000 when attending the IPL finals in Ahmedabad. Plus, making friends with other cricket fans from across India made the experience even more memorable!</p>
                                <div class="testimonial-rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <span class="rating-text">5.0</span>
                                </div>
                            </div>
                            <div class="testimonial-author">
                                <div class="author-image">
                                    <img src="/api/placeholder/60/60" alt="Rahul M." class="testimonial-avatar">
                                </div>
                                <div class="author-info">
                                    <h3 class="author-name">Rahul M.</h3>
                                    <p class="author-location">
                                        <i class="fas fa-map-marker-alt"></i>
                                        Delhi, India
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="testimonial-card">
                            <div class="testimonial-content">
                                <div class="quote-icon">
                                    <i class="fas fa-quote-left"></i>
                                </div>
                                <p class="testimonial-text">As a solo female traveler, Concert Circle India gave me the confidence to attend Sunburn in Goa. The safety features and knowing I had instant friends who shared my music taste made all the difference.</p>
                                <div class="testimonial-rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                    <span class="rating-text">4.5</span>
                                </div>
                            </div>
                            <div class="testimonial-author">
                                <div class="author-image">
                                    <img src="/api/placeholder/60/60" alt="Aisha K." class="testimonial-avatar">
                                </div>
                                <div class="author-info">
                                    <h3 class="author-name">Aisha K.</h3>
                                    <p class="author-location">
                                        <i class="fas fa-map-marker-alt"></i>
                                        Chennai, India
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="testimonial-card">
                            <div class="testimonial-content">
                                <div class="quote-icon">
                                    <i class="fas fa-quote-left"></i>
                                </div>
                                <p class="testimonial-text">The local recommendations feature helped us discover amazing street food and hidden cafes near the Jawaharlal Nehru Stadium. Concert Circle India turns a single night event into an unforgettable weekend experience in a new city!</p>
                                <div class="testimonial-rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <span class="rating-text">5.0</span>
                                </div>
                            </div>
                            <div class="testimonial-author">
                                <div class="author-image">
                                    <img src="/api/placeholder/60/60" alt="Vikram P." class="testimonial-avatar">
                                </div>
                                <div class="author-info">
                                    <h3 class="author-name">Vikram P.</h3>
                                    <p class="author-location">
                                        <i class="fas fa-map-marker-alt"></i>
                                        Pune, India
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
                <button class="testimonial-nav next-testimonial">
                    <i class="fas fa-chevron-right"></i>
                </button>
        </div>
    </section> -->

    <!-- Footer -->
    <?php include 'footer.php' ?>

    <script>
        // Fixed Community Pop-up Script
document.addEventListener('DOMContentLoaded', function() {
    const popup = document.getElementById('communityPopup');
    const closeBtn = document.getElementById('popupClose');
    const countdownElement = document.getElementById('countdown');
    const timerProgress = document.getElementById('timerProgress');
    const joinButton = document.getElementById('joinWhatsApp');
    
    let countdown = 20;
    let timer;
    let progressTimer;
    
    // Check if popup should be shown (not shown in last 2 hours for testing, 24 hours for production)
    const lastShown = localStorage.getItem('popupLastShown');
    const now = new Date().getTime();
    
    // For testing: 2 hours = 2 * 60 * 60 * 1000
    // For production: 24 hours = 24 * 60 * 60 * 1000
    const twoHoursMs = 2 * 60 * 60 * 1000; // 2 hours for testing
    // const oneDayMs = 24 * 60 * 60 * 1000; // 24 hours for production
    
    console.log('Popup check:', { lastShown, now, timeDiff: lastShown ? (now - parseInt(lastShown)) : 'first visit' });
    
    if (!lastShown || (now - parseInt(lastShown)) > twoHoursMs) {
        console.log('Showing popup...');
        showPopup();
    } else {
        console.log('Popup shown recently, skipping...');
    }
    
    function showPopup() {
        // Store when popup was shown
        localStorage.setItem('popupLastShown', new Date().getTime().toString());
        console.log('Popup timestamp stored');
        
        // Show popup after a shorter delay for testing (5 seconds instead of 30)
        setTimeout(() => {
            console.log('Displaying popup now');
            popup.classList.add('show');
            startCountdown();
            startProgressBar();
        }, 5000); // Reduced from 30000 to 5000 for testing
    }
    
    function hidePopup() {
        console.log('Hiding popup');
        popup.classList.remove('show');
        clearInterval(timer);
        clearInterval(progressTimer);
    }
    
    function startCountdown() {
        console.log('Starting countdown');
        timer = setInterval(() => {
            countdown--;
            countdownElement.textContent = countdown;
            console.log('Countdown:', countdown);
            
            if (countdown <= 0) {
                console.log('Countdown finished, hiding popup');
                hidePopup();
            }
        }, 1000);
    }
    
    function startProgressBar() {
        let progress = 100;
        const decrement = 100 / 20; // 20 seconds
        
        progressTimer = setInterval(() => {
            progress -= decrement;
            timerProgress.style.width = progress + '%';
            
            if (progress <= 0) {
                clearInterval(progressTimer);
            }
        }, 1000);
    }
    
    // Close popup when close button is clicked
    closeBtn.addEventListener('click', function(e) {
        e.preventDefault();
        console.log('Close button clicked');
        hidePopup();
    });
    
    // Close popup when clicking outside
    popup.addEventListener('click', function(e) {
        if (e.target === popup) {
            console.log('Clicked outside popup');
            hidePopup();
        }
    });
    
    // Track WhatsApp join clicks
    joinButton.addEventListener('click', function() {
        console.log('User clicked WhatsApp join button');
        hidePopup();
    });
    
    // Close popup on Escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && popup.classList.contains('show')) {
            console.log('Escape key pressed');
            hidePopup();
        }
    });
    
    // For testing purposes - force show popup (remove this in production)
    // Uncomment the next line to always show popup for testing
    // setTimeout(() => showPopup(), 2000);
});

        // Main carousel script
        document.addEventListener('DOMContentLoaded', function() {
            const mainCarousel = document.querySelector('.featured-carousel');
            const slides = document.querySelectorAll('.featured-slide');
            const indicators = document.querySelectorAll('.hero-indicator');
            const leftArrow = document.querySelector('.hero-arrow.left');
            const rightArrow = document.querySelector('.hero-arrow.right');
            
            let currentIndex = 0;
            const totalSlides = slides.length;
            let autoSlideInterval;
            let isTransitioning = false;

            function updateCarousel(direction = null) {
                if (isTransitioning) return;
                isTransitioning = true;

                // Remove active class from all slides
                slides.forEach(slide => {
                    slide.style.transition = 'opacity 0.5s ease';
                    slide.classList.remove('active');
                });

                // Add active class to current slide
                slides[currentIndex].classList.add('active');

                // Update indicators
                indicators.forEach((indicator, index) => {
                    indicator.classList.toggle('active', index === currentIndex);
                });

                // Add animation class based on direction
                if (direction) {
                    slides[currentIndex].classList.add(`slide-${direction}`);
                }

                setTimeout(() => {
                    isTransitioning = false;
                }, 500);
            }

            function nextSlide() {
                if (isTransitioning) return;
                currentIndex = (currentIndex + 1) % totalSlides;
                updateCarousel('right');
            }

            function prevSlide() {
                if (isTransitioning) return;
                currentIndex = (currentIndex - 1 + totalSlides) % totalSlides;
                updateCarousel('left');
            }

            // Event Listeners
            leftArrow.addEventListener('click', (e) => {
                e.preventDefault();
                prevSlide();
                resetAutoSlide();
            });

            rightArrow.addEventListener('click', (e) => {
                e.preventDefault();
                nextSlide();
                resetAutoSlide();
            });

            // Keyboard navigation
            document.addEventListener('keydown', (e) => {
                if (e.key === 'ArrowLeft') {
                    prevSlide();
                    resetAutoSlide();
                } else if (e.key === 'ArrowRight') {
                    nextSlide();
                    resetAutoSlide();
                }
            });

            function startAutoSlide() {
                autoSlideInterval = setInterval(nextSlide, 5000); // Change slide every 5 seconds
            }

            function resetAutoSlide() {
                clearInterval(autoSlideInterval);
                startAutoSlide();
            }

            // Touch events for mobile
            let touchStartX = 0;
            let touchEndX = 0;

            mainCarousel.addEventListener('touchstart', (e) => {
                touchStartX = e.touches[0].clientX;
            }, { passive: true });

            mainCarousel.addEventListener('touchend', (e) => {
                touchEndX = e.changedTouches[0].clientX;
                handleSwipe();
            }, { passive: true });

            function handleSwipe() {
                const swipeThreshold = 50; // Minimum distance for swipe
                const difference = touchStartX - touchEndX;

                if (Math.abs(difference) > swipeThreshold) {
                    if (difference > 0) {
                        nextSlide(); // Swipe left
                    } else {
                        prevSlide(); // Swipe right
                    }
                    resetAutoSlide();
                }
            }

            // Initialize
            updateCarousel();
            startAutoSlide();

            // Pause auto-slide on hover
            mainCarousel.addEventListener('mouseenter', () => {
                clearInterval(autoSlideInterval);
            });

            mainCarousel.addEventListener('mouseleave', () => {
                startAutoSlide();
            });
        });
    </script>
<script src="https://www.gstatic.com/firebasejs/9.22.2/firebase-app-compat.js"></script>
<script src="https://www.gstatic.com/firebasejs/9.22.2/firebase-auth-compat.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const carousel = document.querySelector('.event-carousel');
            const prevBtn = document.querySelector('.prev-btn');
            const nextBtn = document.querySelector('.next-btn');
            const cardWidth = 280 + 20; // card width + gap

            function scrollCarousel(direction) {
                const scrollAmount = direction === 'next' ? cardWidth : -cardWidth;
                carousel.scrollBy({
                    left: scrollAmount,
                    behavior: 'smooth'
                });
            }

            prevBtn.addEventListener('click', () => scrollCarousel('prev'));
            nextBtn.addEventListener('click', () => scrollCarousel('next'));

            // Hide navigation buttons at scroll limits
            carousel.addEventListener('scroll', () => {
                const isAtStart = carousel.scrollLeft === 0;
                const isAtEnd = carousel.scrollLeft + carousel.clientWidth >= carousel.scrollWidth - 1;
                
                prevBtn.style.opacity = isAtStart ? '0.5' : '1';
                nextBtn.style.opacity = isAtEnd ? '0.5' : '1';
            });
        });
        
    
document.addEventListener('DOMContentLoaded', function() {
    // Lazy load images
    const lazyImages = document.querySelectorAll('.lazy-load');
    const imageObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const img = entry.target;
                img.src = img.dataset.src;
                img.classList.remove('lazy-load');
                observer.unobserve(img);
            }
        });
    });
    
    lazyImages.forEach(img => imageObserver.observe(img));
    
    // Debounce scroll events
    let scrollTimeout;
    function debounce(func, wait) {
        return function executedFunction(...args) {
            const later = () => {
                clearTimeout(scrollTimeout);
                func(...args);
            };
            clearTimeout(scrollTimeout);
            scrollTimeout = setTimeout(later, wait);
        };
    }
    
    // Apply debouncing to scroll events
    window.addEventListener('scroll', debounce(() => {
        // Your existing scroll logic here
    }, 100));
});
    </script>
</body>

</html>

<style>
.hero-arrow {
    background: rgba(255, 0, 0, 0.5); /* Temporary red background to test visibility */
}
</style>