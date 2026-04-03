<?php
// Include the config file
require_once 'inc/config.php';

// Check if 'id' is passed in the URL
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = intval($_GET['id']);

    try {
        // Prepare the SQL query to fetch event details
        $stmt = $pdo->prepare("SELECT * FROM event_detail WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        // Fetch the event details
        $event = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$event) {
            die("<p>Event not found.</p>");
        }
    } catch (PDOException $e) {
        die("<p>Error: " . $e->getMessage() . "</p>");
    }
} else {
    die("<p>Invalid event ID.</p>");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($event['title']); ?> - BookMyShow</title>
     <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="footer.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="LOGO for website (circular).png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<style>

:root {
    --color-primary: #d269e6;
    --color-secondary: #ff3131;
    --color-accent: #ffd700;
    --color-accent-blue: #52bdfb;
    --color-accent-teal: #4ddde0;
    --bg-dark: #121212;
    --bg-darker: #0a0a0a;
    --bg-darkest: #000;
    --bg-card: #1a1a1a;
    --bg-header: rgba(0, 0, 0, 0.9);
    --text-light: #ffffff;
    --text-medium: #ddd;
    --text-muted: #ccc;
    --text-dim: #aaa;
    --text-dimmer: #888;
    --gradient-primary: linear-gradient(45deg, var(--color-secondary), var(--color-primary));
    --gradient-primary-reverse: linear-gradient(45deg, var(--color-primary), var(--color-secondary));
    --gradient-text: linear-gradient(90deg, var(--color-accent-teal), var(--color-accent-blue), var(--color-primary), var(--color-secondary), var(--color-accent));
    --spacing-xs: 5px;
    --spacing-sm: 10px;
    --spacing-md: 15px;
    --spacing-lg: 20px;
    --spacing-xl: 30px;
    --spacing-xxl: 50px;
    --radius-sm: 5px;
    --radius-md: 12px;
    --radius-lg: 15px;
    --radius-xl: 20px;
    --radius-full: 50px;
    --radius-round: 50%;
    --shadow-sm: 0 4px 10px rgba(0, 0, 0, 0.3);
    --shadow-md: 0 5px 15px rgba(0, 0, 0, 0.3);
    --shadow-lg: 0 10px 25px rgba(0, 0, 0, 0.4);
    --shadow-xl: 0 10px 30px rgba(0, 0, 0, 0.5);
    --transition-fast: all 0.3s ease;
    --transition-slow: all 0.5s ease;
    --font-xs: 0.8rem;
    --font-sm: 0.9rem;
    --font-md: 1rem;
    --font-lg: 1.2rem;
    --font-xl: 1.5rem;
    --font-xxl: 2rem;
    --font-hero: 3.5rem;
    --font-primary: 'Montserrat', sans-serif;
    --container-width: 1400px;
    --header-height: 90px;
}

/* Reset & Base */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: var(--font-primary);
    background: var(--bg-darkest);
    color: var(--text-light);
    line-height: 1.6;
}

/* Navigation */
.navbar {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    background: var(--bg-header);
    border-bottom: 1px solid var(--bg-card);
    z-index: 1000;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.nav-container {
    max-width: var(--container-width);
    margin: 0 auto;
    padding: 0 var(--spacing-lg);
    display: flex;
    align-items: center;
    justify-content: space-between;
    height: 60px;
}

.nav-brand {
    font-family: var(--font-primary);
    font-size: 24px;
    font-weight: 700;
}

.brand-text {
    color: var(--text-light);
}

.brand-accent {
    color: var(--color-secondary);
}

.nav-search {
    flex: 1;
    max-width: 500px;
    margin: 0 var(--spacing-xl);
    position: relative;
    display: flex;
    align-items: center;
    background: var(--bg-card);
    border-radius: var(--radius-sm);
    padding: var(--spacing-sm) var(--spacing-md);
    border: 1px solid var(--bg-darker);
}

.nav-search i {
    color: #666;
    margin-right: var(--spacing-sm);
}

.nav-search input {
    flex: 1;
    background: none;
    border: none;
    color: var(--text-light);
    font-size: var(--font-sm);
    outline: none;
}

.nav-search input::placeholder {
    color: var(--text-dim);
}

.nav-actions {
    display: flex;
    align-items: center;
    gap: var(--spacing-lg);
}

.location-selector {
    display: flex;
    align-items: center;
    gap: var(--spacing-xs);
    color: #333;
    cursor: pointer;
    padding: var(--spacing-sm);
    border-radius: var(--radius-sm);
}

.btn-signin {
    background: var(--gradient-primary);
    color: var(--text-light);
    border: none;
    padding: var(--spacing-sm) var(--spacing-lg);
    border-radius: var(--radius-sm);
    font-weight: 500;
    cursor: pointer;
}

.btn-menu {
    background: none;
    border: none;
    color: #333;
    font-size: var(--font-lg);
    cursor: pointer;
    padding: var(--spacing-sm);
}

.nav-menu {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: var(--spacing-sm) var(--spacing-lg);
    border-top: 1px solid #e0e0e0;
    max-width: var(--container-width);
    margin: 0 auto;
}

.menu-items, .menu-secondary {
    display: flex;
    gap: var(--spacing-lg);
}

.menu-item {
    color: #666;
    text-decoration: none;
    padding: var(--spacing-sm) var(--spacing-md);
    border-radius: var(--radius-sm);
    font-weight: 400;
    font-size: 14px;
    transition: var(--transition-fast);
}

.menu-item:hover,
.menu-item.active {
    color: #dc2626;
}

/* Main Container */
.main-container {
    max-width: var(--container-width);
    margin: 140px auto 0;
    padding: 0 var(--spacing-lg);
}

.event-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: var(--spacing-xl);
}

.event-title {
    font-size: 28px;
    font-weight: 700;
    color: var(--text-light);
}

.share-btn {
    background: none;
    border: none;
    color: #666;
    font-size: 18px;
    cursor: pointer;
    padding: var(--spacing-sm);
}

.event-content {
    display: grid;
    grid-template-columns: 2fr 1fr;
    gap: var(--spacing-xxl);
}

/* Event Poster Section */
.event-poster {
    margin-bottom: var(--spacing-xl);
}

.poster-image {
    width: 100%;
    height: 400px;
    border-radius: var(--radius-lg);
    overflow: hidden;
    position: relative;
}

.poster-placeholder {
    width: 100%;
    height: 100%;
    background: var(--gradient-primary);
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    color: white;
    position: relative;
}

.artist-performance {
    text-align: center;
}

.artist-performance i {
    font-size: 60px;
    margin-bottom: 20px;
    display: block;
}

.artist-performance span {
    display: block;
    font-size: 24px;
    font-weight: 700;
    margin-bottom: 5px;
}

.event-tags {
    display: flex;
    gap: var(--spacing-sm);
    margin: var(--spacing-lg) 0;
}

.tag {
    background: var(--bg-card);
    color: var(--text-light);
    padding: var(--spacing-xs) var(--spacing-md);
    border-radius: var(--radius-sm);
    font-size: 12px;
    font-weight: 500;
}

.interest-section {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin: var(--spacing-xl) 0;
}

.interest-count {
    display: flex;
    align-items: center;
    gap: var(--spacing-sm);
    color: var(--color-accent-teal);
    font-weight: 500;
}

.btn-interested {
    background: none;
    border: 2px solid var(--color-primary);
    color: var(--color-primary);
    padding: var(--spacing-sm) var(--spacing-lg);
    border-radius: var(--radius-sm);
    font-weight: 500;
    cursor: pointer;
}

/* Section Styling */
.about-section,
.artists-section,
.m-ticket-section,
.venue-section {
    margin-bottom: var(--spacing-xxl);
}

.about-section h2,
.artists-section h2,
.m-ticket-section h2,
.venue-section h2 {
    font-size: 20px;
    font-weight: 600;
    color: #333;
    margin-bottom: var(--spacing-lg);
}

.about-section p {
    color: #666;
    line-height: 1.6;
    margin-bottom: var(--spacing-md);
}

.read-more {
    background: none;
    border: none;
    color: var(--color-primary);
    cursor: pointer;
    font-weight: 500;
    padding: var(--spacing-xs) 0;
    margin-top: var(--spacing-xs);
}

.read-more:hover {
    color: var(--color-secondary);
}

/* Artist Card */
.artist-card {
    display: flex;
    align-items: center;
    gap: var(--spacing-md);
}

.artist-image {
    width: 80px;
    height: 80px;
    border-radius: var(--radius-lg);
    overflow: hidden;
}

.artist-placeholder {
    width: 100%;
    height: 100%;
    background: #333;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 30px;
}

.artist-info h3 {
    font-size: 16px;
    font-weight: 600;
    color: #333;
    margin-bottom: 2px;
}

.artist-info p {
    font-size: 14px;
    color: #666;
}

/* M-Ticket Section */
.m-ticket-info {
    display: flex;
    align-items: center;
    gap: var(--spacing-md);
    padding: var(--spacing-lg);
    background: #f9f9f9;
    border-radius: var(--radius-sm);
    border: 1px solid #e0e0e0;
}

.m-ticket-info i {
    font-size: 24px;
    color: #dc2626;
}

.m-ticket-info span {
    color: #333;
    font-size: 14px;
}

.learn-how {
    color: #dc2626;
    text-decoration: none;
    font-weight: 500;
    margin-left: var(--spacing-sm);
}

/* Venue Tags */
.venue-tags {
    display: flex;
    gap: var(--spacing-sm);
}

.venue-tag {
    background: #fbbf24;
    color: #333;
    padding: var(--spacing-xs) var(--spacing-md);
    border-radius: var(--radius-sm);
    font-size: 12px;
    font-weight: 500;
}

/* Event Details Sidebar */
.event-details-sidebar {
    position: sticky;
    top: 160px;
    height: fit-content;
}

.event-info-card {
    background: var(--bg-card);
    border: 1px solid var(--bg-darker);
    border-radius: var(--radius-lg);
    padding: var(--spacing-xl);
    margin-bottom: var(--spacing-lg);
}

.info-item {
    display: flex;
    align-items: center;
    gap: var(--spacing-md);
    margin-bottom: var(--spacing-lg);
    color: var(--text-medium);
    font-size: 14px;
}

.info-item i {
    width: 16px;
    color: #333;
}

.info-item:last-child {
    margin-bottom: 0;
}

.pricing-card {
    background: var(--bg-card);
    border: 1px solid var(--bg-darker);
    border-radius: var(--radius-lg);
    padding: var(--spacing-xl);
}

.price-info {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: var(--spacing-lg);
}

.price {
    font-size: 18px;
    font-weight: 600;
    color: var(--text-light);
}

.availability {
    background: #059669;
    color: white;
    padding: var(--spacing-xs) var(--spacing-sm);
    border-radius: var(--radius-sm);
    font-size: 12px;
    font-weight: 500;
}

.btn-book-now {
    width: 100%;
    background: var(--gradient-primary);
    color: var(--text-light);
    border: none;
    padding: var(--spacing-md);
    border-radius: var(--radius-sm);
    font-size: 16px;
    font-weight: 600;
    cursor: pointer;
}

/* Footer Sections */
.footer-sections {
    background: var(--bg-darker);
    color: white;
    padding: var(--spacing-xxl) 0;
    margin-top: var(--spacing-xxl);
}

.about-event-footer {
    max-width: var(--container-width);
    margin: 0 auto;
    padding: 0 var(--spacing-lg);
    margin-bottom: var(--spacing-xxl);
}

.about-event-footer h2 {
    color: var(--color-primary);
    font-size: 24px;
    margin-bottom: var(--spacing-lg);
}

.about-event-footer p {
    color: var(--text-medium);
    line-height: 1.8;
}

.share-follow-section {
    max-width: var(--container-width);
    margin: 0 auto;
    padding: 0 var(--spacing-lg);
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: var(--spacing-xxl);
    margin-bottom: var(--spacing-xxl);
}

.share-event h3,
.follow-artist h3 {
    color: white;
    font-size: 18px;
    margin-bottom: var(--spacing-lg);
}

.share-buttons {
    display: flex;
    gap: var(--spacing-sm);
}

.share-btn-footer {
    width: 40px;
    height: 40px;
    border-radius: var(--radius-round);
    border: none;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 18px;
    background: var(--bg-card);
    transition: var(--transition-fast);
}
.share-btn-footer.facebook { color: #1877f3; }
.share-btn-footer.instagram { color: #e4405f; }
.share-btn-footer.copylink { color: var(--color-accent-blue); }
.share-btn-footer.whatsapp { color: #25d366; }
.share-btn-footer:hover {
    background: var(--gradient-primary);
    color: var(--text-light);
}

/* Follow Buttons */
.follow-buttons {
    display: flex;
    gap: var(--spacing-md);
}
.follow-btn {
    display: flex;
    align-items: center;
    gap: var(--spacing-sm);
    padding: var(--spacing-sm) var(--spacing-lg);
    border-radius: var(--radius-full);
    font-weight: 600;
    text-decoration: none;
    font-size: var(--font-md);
    background: var(--bg-card);
    color: var(--text-light);
    transition: var(--transition-fast);
}
.follow-btn.spotify { color: #1db954; }
.follow-btn.applemusic { color: var(--text-light); background: var(--bg-darkest); }
.follow-btn:hover {
    background: var(--gradient-primary);
    color: var(--text-light);
}

/* Responsive Design */
@media (max-width: 1024px) {
    .event-content {
        grid-template-columns: 1fr;
        gap: var(--spacing-xl);
    }
    
    .event-details-sidebar {
        position: static;
    }
    
    .share-follow-section {
        grid-template-columns: 1fr;
        gap: var(--spacing-xl);
    }
}

@media (max-width: 768px) {
    .nav-container {
        flex-direction: column;
        gap: var(--spacing-md);
        height: auto;
        padding: var(--spacing-md) var(--spacing-lg);
    }
    
    .nav-search {
        order: 2;
        max-width: none;
        margin: 0;
    }
    
    .nav-menu {
        flex-direction: column;
        gap: var(--spacing-sm);
        align-items: center;
    }
    
    .main-container {
        margin-top: 200px;
    }
    
    .event-header {
        flex-direction: column;
        align-items: flex-start;
        gap: var(--spacing-md);
    }
    
    .event-title {
        font-size: 24px;
    }
    
    .interest-section {
        flex-direction: column;
        gap: var(--spacing-md);
        align-items: flex-start;
    }
}

@media (max-width: 480px) {
    .main-container {
        padding: 0 var(--spacing-md);
    }
    
    .event-title {
        font-size: 20px;
    }
    
    .poster-image {
        height: 300px;
    }
    
    .artist-performance i {
        font-size: 40px;
    }
    
    .artist-performance span {
        font-size: 18px;
    }
}

/* Add these styles for the read more functionality */
.about-section p.expanded-content {
    display: none;
    margin-top: var(--spacing-md);
}

.about-section p.expanded-content.show {
    display: block;
}

.read-more {
    background: none;
    border: none;
    color: var(--color-primary);
    cursor: pointer;
    font-weight: 500;
    padding: var(--spacing-xs) 0;
    margin-top: var(--spacing-xs);
}

.read-more:hover {
    color: var(--color-secondary);
}

/* Update venue section styles */
.venue-section {
    margin-bottom: var(--spacing-xl);
}

.venue-section h2 {
    font-size: var(--font-xl);
    font-weight: 600;
    color: var(--text-light);
    margin-bottom: var(--spacing-lg);
}

.venue-details {
    background: var(--bg-card);
    border-radius: var(--radius-lg);
    padding: var(--spacing-xl);
    margin-bottom: var(--spacing-lg);
}

.venue-name {
    font-size: var(--font-lg);
    font-weight: 600;
    color: var(--text-light);
    margin-bottom: var(--spacing-md);
    display: flex;
    align-items: center;
    gap: var(--spacing-sm);
}

.venue-name i {
    color: var(--color-primary);
}

.venue-address {
    color: var(--text-medium);
    line-height: 1.6;
    margin-bottom: var(--spacing-lg);
}

.btn-map {
    display: inline-flex;
    align-items: center;
    gap: var(--spacing-sm);
    padding: var(--spacing-sm) var(--spacing-xl);
    background: var(--gradient-primary);
    color: var(--text-light);
    border: none;
    border-radius: var(--radius-full);
    font-weight: 500;
    cursor: pointer;
    text-decoration: none;
    transition: var(--transition-fast);
}

.btn-map:hover {
    opacity: 0.9;
    transform: translateY(-2px);
}

.venue-facilities {
    display: flex;
    flex-wrap: wrap;
    gap: var(--spacing-sm);
}

.facility-tag {
    background: var(--bg-darker);
    color: var(--text-medium);
    padding: var(--spacing-xs) var(--spacing-md);
    border-radius: var(--radius-full);
    font-size: var(--font-sm);
    display: flex;
    align-items: center;
    gap: var(--spacing-xs);
}

.facility-tag i {
    color: var(--color-accent);
    font-size: var(--font-sm);
}

/* Add community section styles */
.community-section {
    background: var(--bg-card);
    border-radius: var(--radius-lg);
    padding: var(--spacing-xl);
    margin-bottom: var(--spacing-xl);
    text-align: center;
}

.community-section p {
    color: var(--text-medium);
    font-size: var(--font-md);
    line-height: 1.6;
    margin-bottom: var(--spacing-lg);
    max-width: 600px;
    margin-left: auto;
    margin-right: auto;
}

.btn-join-community {
    display: inline-flex;
    align-items: center;
    gap: var(--spacing-sm);
    padding: var(--spacing-sm) var(--spacing-xl);
    background: var(--gradient-primary);
    color: var(--text-light);
    border: none;
    border-radius: var(--radius-full);
    font-weight: 600;
    font-size: var(--font-md);
    cursor: pointer;
    text-decoration: none;
    transition: var(--transition-fast);
}

.btn-join-community:hover {
    opacity: 0.9;
    transform: translateY(-2px);
    box-shadow: var(--shadow-md);
}

.btn-join-community i {
    font-size: var(--font-lg);
}

/* Update the share and follow section styles */
.share-follow-wrapper {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: var(--spacing-xl);
    margin-bottom: var(--spacing-xl);
}

.share-event, .follow-artist {
    background: var(--bg-card);
    border-radius: var(--radius-lg);
    padding: var(--spacing-xl);
}

.share-event h3, .follow-artist h3 {
    color: var(--text-light);
    font-size: var(--font-lg);
    margin-bottom: var(--spacing-lg);
    font-weight: 600;
}

@media (max-width: 768px) {
    .share-follow-wrapper {
        grid-template-columns: 1fr;
        gap: var(--spacing-lg);
    }
}

/* Add styles for the poster image */
.poster-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: var(--radius-lg);
}

.btn-book-now {
    display: inline-block;
    background-color: #6200ea; /* example */
    color: var(--text-light);
    padding: 10px 20px;
    border: none;
    border-radius: 6px;
    text-align: center;
    font-weight: bold;
    cursor: pointer;
    text-decoration: none;
    transition: background-color 0.3s ease;
}

.btn-book-now:hover {
    background-color: #3700b3;
}

</style>
</head>
<body>
    
<?php include 'header.php'; ?>
    <div class="main-container">
            <div class="event-header">
               <h1 class="event-title"><?php echo htmlspecialchars($event['title']); ?></h1>
            </div>
    
            <div class="event-content">
                <!-- Event Poster Section -->
                <div class="event-poster-section">
                    <div class="event-poster">
                        <div class="poster-image">
    <img src="<?php echo htmlspecialchars('uploads/eventdetails/' . $event['image']); ?>" alt="<?php echo htmlspecialchars($event['title']); ?>" />                    </div>
                    </div>
                    
                    <!-- Event Tags -->
                    <div class="event-tags">
                        <span class="tag">Concerts</span>
                        <span class="tag">Music Shows</span>
                    </div>
    
                    <!-- Interest Section -->
                    <!-- <div class="interest-section">
                        <div class="interest-count">
                            <i class="fas fa-thumbs-up"></i>
                            <span>141 are interested</span>
                        </div>
                        <button class="btn-interested">I'm Interested</button>
                    </div> -->
    
                    <!-- About Section -->
                    <div class="about-section">
                        <h2>About The Event</h2>
                        <p class="initial-content"><?php echo htmlspecialchars($event['about_event']); ?></p>
                        <button class="read-more" onclick="toggleReadMore(this)">Read More</button>
                    </div>
    
                    <!-- Journey Section (Insert after About section in eventone.php) -->
<section class="concert-journey-section">
  <div class="journey-container">

    <!-- Glass Hero Title -->
    <div class="concierge-hero">
      <div class="concierge-glass-card">
        <h1 class="blurred-heading">Concert Circle Concierge</h1>
        <p class="clear-subtitle">Your premium path to unforgettable live music experiences</p>
      </div>
    </div>

    <!-- Vertical Timeline (for better simplicity and clarity across devices) -->
    <div class="timeline-vertical">
      <!-- Step 1 -->
      <div class="timeline-vertical-item">
        <div class="step-number">1</div>
        <div class="timeline-title">🎉 Get Onboard – It’s Totally Free</div>
        <div class="timeline-content">
          Kickstart your experience by clicking the “Book a Call” button below. Whether you’re attending solo or vibing with your crew, we’ll help you plan the perfect concert journey — with zero stress and maximum fun.
        </div>
      </div>

      <!-- Step 2 -->
      <div class="timeline-vertical-item">
        <div class="step-number">2</div>
        <div class="timeline-title">📞  Let’s Chat About Your Plans</div>
        <div class="timeline-content">
         Once you’re in, our team will connect with you over WhatsApp or a quick call. We’ll understand your travel preferences, group size, budget, and any special requests — then craft a personalized concert trip itinerary that fits your vibe perfectly.
        </div>
      </div>

      <!-- Step 3 -->
      <div class="timeline-vertical-item">
        <div class="step-number">3</div>
        <div class="timeline-title">🧳 Your Ultimate Concert Experience, Handled</div>
        <div class="timeline-content">
You’ll be matched with your own dedicated Concert Concierge who handles it all — from securing your tickets, arranging travel and accommodation, to dropping local recommendations and organizing post-show hangouts
        </div>
      </div>
    </div>

    <!-- Service Fee Notice + CTA -->
    <div class="service-notice">
      <div class="notice-icon">⚡</div>
      <div class="notice-text">
        <p><strong>Premium Service Notice:</strong> All services provided through Concert Circle's concierge will incur a nominal service fee of 10% per transaction.</p>
      </div>
      <div class="notice-right">
        <a href="Concierge.html" class="cta-button">
          <span class="button-icon">📞</span>
          <span class="button-text">Book a Call</span>
        </a>
      </div>
    </div>

  </div>
</section>

<style>
.concert-journey-section {
  background: #111;
  padding: 3rem 1rem;
  color: #fff;
}

.concierge-glass-card {
  background: rgba(255, 255, 255, 0.05);
  backdrop-filter: blur(10px);
  border-radius: 20px;
  padding: 2rem;
  text-align: center;
  margin-bottom: 3rem;
}

.blurred-heading {
  font-size: 2rem;
  font-weight: 900;
  color: #4ddde0;
  text-shadow: 0 0 10px #4ddde099;
  margin-bottom: 1rem;
}

.clear-subtitle {
  font-size: 1.1rem;
  color: rgba(255, 255, 255, 0.85);
}

.timeline-vertical {
  display: flex;
  flex-direction: column;
  gap: 2rem;
  margin-bottom: 3rem;
}

.timeline-vertical-item {
  background: rgba(255, 255, 255, 0.03);
  border-left: 4px solid #4ddde0;
  padding: 1.5rem;
  border-radius: 12px;
  position: relative;
}

.step-number {
  position: absolute;
  top: -10px;
  left: -20px;
  background: linear-gradient(135deg, #ff3131, #ffd700);
  color: #fff;
  font-weight: bold;
  padding: 0.5rem 1rem;
  border-radius: 50px;
  font-size: 0.9rem;
  box-shadow: 0 0 10px rgba(255, 49, 49, 0.3);
}

.timeline-title {
  font-size: 1.2rem;
  font-weight: 700;
  color: #ffd700;
  margin-bottom: 0.5rem;
  padding-left: 1.5rem;
}

.timeline-content {
  font-size: 1rem;
  padding-left: 1.5rem;
  line-height: 1.6;
  color: rgba(255, 255, 255, 0.9);
}

.timeline-content a {
  color: #4ddde0;
  font-weight: 600;
  text-decoration: none;
  border-bottom: 1px dashed #4ddde0;
}

.timeline-content a:hover {
  color: #d269e6;
}

.service-notice {
  background: rgba(255, 255, 255, 0.05);
  padding: 1.5rem;
  border-radius: 20px;
  text-align: center;
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 1rem;
}

.notice-icon {
  font-size: 2rem;
  color: #ffd700;
}

.notice-text p {
  font-size: 1rem;
  color: rgba(255, 255, 255, 0.9);
  max-width: 600px;
}

.cta-button {
  display: inline-flex;
  align-items: center;
  gap: 0.5rem;
  padding: 0.8rem 1.5rem;
  background: linear-gradient(135deg, #ff3131, #ffd700);
  color: white;
  font-weight: 700;
  text-decoration: none;
  border-radius: 50px;
  transition: 0.3s;
  box-shadow: 0 10px 25px rgba(255, 49, 49, 0.3);
}

.cta-button:hover {
  transform: scale(1.05);
  box-shadow: 0 15px 35px rgba(255, 49, 49, 0.4);
}
</style>

                    <!-- Artists Section -->
                    <div class="artists-section">
                        <h2>Artists</h2>
                        <div class="artist-card">
                            <div class="artist-image">
                                <div class="artist-placeholder">
                                    <i class="fas fa-user"></i>
                                </div>
                            </div>
                            <div class="artist-info">
                                <h3><?php echo htmlspecialchars($event['artist_name']); ?></h3>
                                <p>Music,Voice</p>
                            </div>
                        </div>
                    </div>
    
                    <!-- Add this after the artists section -->
                    <div class="community-section">
                        <p>Step into the official Fan Community to discuss your favorite artist, plan group trips, and find your tribe!</p>
                        <a href="<?php echo htmlspecialchars($event['community_link']); ?>" class="btn-join-community">
                            <i class="fas fa-users"></i>
                            Join Community
                        </a>
                    </div>
    
                    <!-- M-Ticket Section -->
                    <div class="venue-section">
                        <h2>Venue</h2>
                        <div class="venue-details">
                            <div class="venue-name">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div class="venue-address">
                                <p><?php echo htmlspecialchars($event['venue_address']); ?></p>
                            </div>
                            <a href="<?php echo htmlspecialchars($event['venue_link']); ?>" target="_blank" class="btn-map">
                                <i class="fas fa-location-arrow"></i>
                                Get Directions
                            </a>
                        </div>
                    </div>
                </div>
    
                <!-- Event Details Sidebar -->
                 <div class="event-details-sidebar">
                    <div class="event-info-card">
                        <div class="info-item">
                            <i class="far fa-calendar" style="color: var(--color-accent);"></i>
                            <span style="color: var(--text-light);">
                                <?php echo date("l, j F Y", strtotime($event['date'])); ?>
                            </span>
                        </div>
                        <div class="info-item">
                            <i class="far fa-clock" style="color: var(--color-primary);"></i>
                            <span style="color: var(--text-light);">
                                <?php echo date("g:i A", strtotime($event['time'])); ?>
                            </span>
                        </div>
                        <div class="info-item">
                            <i class="fas fa-hourglass-half" style="color: var(--color-secondary);"></i>
                            <span style="color: var(--text-light);"><?php echo htmlspecialchars($event['duration']); ?></span>
                        </div>
                        <div class="info-item">
                            <i class="fas fa-users" style="color: var(--color-accent-teal);"></i>
                            <span style="color: var(--text-light);"><?php echo htmlspecialchars($event['age']); ?></span>
                        </div>
                        <div class="info-item">
                            <i class="fas fa-globe" style="color: var(--color-accent-blue);"></i>
                            <span style="color: var(--text-light);"><?php echo htmlspecialchars($event['language']); ?></span>
                        </div>
                        <div class="info-item">
                            <i class="fas fa-music" style="color: var(--color-accent);"></i>
                            <span style="color: var(--text-light);"><?php echo htmlspecialchars($event['category']); ?></span>
                        </div>
                    </div>
    
                   <div class="pricing-card">
    <a href="<?php echo $event['tickit_link']; ?>" 
       class="btn-book-now" 
       style="color: var(--text-light); text-decoration: none;" 
       target="_blank">
        Book Now
    </a>
</div>

                </div>
                
                
                <div class="share-follow-wrapper">
                    <div class="share-event">
    <h3>Share Event</h3>
    <div class="share-buttons">
        <!-- Facebook Share -->
        <button class="share-btn-footer facebook" title="Share on Facebook"
            onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=' + encodeURIComponent(window.location.href), '_blank')">
            <i class="fab fa-facebook-f"></i>
        </button>

        <!-- General Share (Web Share API) -->
        <button class="share-btn-footer general-share" title="Share"
            onclick="shareEvent()">
 <i class="fas fa-share-alt" style="color: plum;" ></i>
        </button>

        <!-- Copy Link -->
        <button class="share-btn-footer copylink" title="Copy Link"
            onclick="navigator.clipboard.writeText(window.location.href); alert('Link copied!')">
            <i class="fas fa-link" ></i>
        </button>

        <!-- WhatsApp Share -->
        <button class="share-btn-footer whatsapp" title="Share on WhatsApp"
            onclick="window.open('https://api.whatsapp.com/send?text=' + encodeURIComponent(window.location.href), '_blank')">
            <i class="fab fa-whatsapp"></i>
        </button>
    </div>
</div>

<script>
function shareEvent() {
    if (navigator.share) {
        navigator.share({
            title: document.title,
            text: 'Check out this event!',
            url: window.location.href
        }).catch((error) => console.log('Sharing failed:', error));
    } else {
        alert('Sharing is not supported in this browser. Please use the copy link button instead.');
    }
}
</script>

                    <div class="follow-artist">
                        <h3>Follow Artist</h3>
                        <div class="follow-buttons">
                            <a class="follow-btn spotify" href="<?php echo htmlspecialchars($event['follow_spotify_link']); ?>">
                                <i class="fab fa-spotify"></i> Spotify
                            </a>
                            <a class="follow-btn applemusic" href="<?php echo htmlspecialchars($event['follow_apple_music_link']); ?>" target="_blank" title="Follow on Apple Music">
                                <i class="fab fa-apple"></i> Apple Music
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include 'footer.php'; ?>
</body>
</html>
