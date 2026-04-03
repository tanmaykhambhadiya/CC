<?php
// filepath: t:\xampp\htdocs\CONCERT\trial\eventdetails.php

// Include database configuration
include 'inc/config.php';

// Get the event ID from the URL
$event_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Check if the event ID is valid
if ($event_id <= 0) {
    die("Invalid event ID.");
}

try {
    // Prepare and execute the SQL query
    $statement = $pdo->prepare("SELECT * FROM event_detail WHERE e_id = ?");
    $statement->execute([$event_id]);
    $event = $statement->fetch(PDO::FETCH_ASSOC);

    // Check if the event exists
    if (!$event) {
        die("Event not found.");
    }
} catch (PDOException $e) {
    die("Database error: " . $e->getMessage());
}

// Prepare image path
$imagePath = !empty($event['image']) ? 'uploads/eventdetails/' . htmlspecialchars($event['image']) : 'uploads/eventdetails/default-event.jpg';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($event['title']); ?></title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="icon" type="image/x-icon" href="LOGO for website (circular).png">
    <style>
        /* Global Styles */
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

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: var(--font-primary);
    line-height: 1.6;
    background-color: var(--bg-dark);
    color: var(--text-light);
}

/* Hero Section */
.hero {
    position: relative;
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    padding: var(--spacing-xl);
    overflow: hidden;
}

.hero::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    /* Use PHP to inject the event image as background */
    background: linear-gradient(rgba(0, 0, 0, 0.45), rgba(0,0,0,0.85)),
        url('<?php echo $imagePath; ?>') center/cover no-repeat;
    background-attachment: fixed;
    z-index: -1;
    filter: blur(10px) brightness(1.1) saturate(1.3);
    animation: heroZoom 20s infinite alternate;
    opacity: 1;
    transition: opacity 0.5s;
}

.hero-content {
    position: relative;
    z-index: 1;
    max-width: var(--container-width);
    margin: 0 auto;
}

.hero-content h1 {
    font-size: var(--font-hero);
    margin-bottom: var(--spacing-xl);
    background: var(--gradient-text);
    -webkit-background-clip: text;
    background-clip: text;
    color: transparent;
    animation: glow 2s ease-in-out infinite alternate;
}

.event-details {
    display: flex;
    gap: var(--spacing-xl);
    justify-content: center;
    flex-wrap: wrap;
}

.detail-item {
    display: flex;
    align-items: center;
    gap: var(--spacing-sm);
    font-size: var(--font-lg);
    background: var(--bg-card);
    padding: var(--spacing-md) var(--spacing-lg);
    border-radius: var(--radius-md);
    box-shadow: var(--shadow-md);
}

.detail-item i {
    background: var(--gradient-primary);
    -webkit-background-clip: text;
    background-clip: text;
    color: transparent;
}

/* Main Content Sections */
main {
    max-width: var(--container-width);
    margin: 0 auto;
    padding: var(--spacing-xl);
}

section {
    margin-bottom: var(--spacing-xxl);
    background: var(--bg-card);
    padding: var(--spacing-xl);
    border-radius: var(--radius-lg);
    box-shadow: var(--shadow-lg);
}

h2 {
    font-size: var(--font-xxl);
    margin-bottom: var(--spacing-xl);
    background: var(--gradient-primary);
    -webkit-background-clip: text;
    background-clip: text;
    color: transparent;
}

/* Venue Section */
.venue-details {
    display: flex;
    align-items: center;
    gap: var(--spacing-md);
    margin-bottom: var(--spacing-xl);
    font-size: var(--font-lg);
}

.venue-details i {
    color: var(--color-accent-blue);
}

/* CTA Section */
.cta-section {
    text-align: center;
    background: var(--gradient-primary);
    color: var(--text-light);
}

.cta-buttons {
    display: flex;
    gap: var(--spacing-md);
    justify-content: center;
    flex-wrap: wrap;
}

.btn {
    display: inline-flex;
    align-items: center;
    gap: var(--spacing-sm);
    padding: var(--spacing-md) var(--spacing-xl);
    border-radius: var(--radius-full);
    text-decoration: none;
    font-weight: bold;
    transition: var(--transition-fast);
    font-size: var(--font-lg);
}

.btn-primary {
    background: var(--gradient-primary-reverse);
    color: var(--text-light);
    box-shadow: var(--shadow-md);
}

.btn-secondary {
    background: transparent;
    color: var(--text-light);
    border: 2px solid var(--text-light);
}

.btn:hover {
    transform: translateY(-3px);
    box-shadow: var(--shadow-lg);
}

/* About Section */
.about-content {
    background: var(--bg-darker);
    padding: var(--spacing-xl);
    border-radius: var(--radius-lg);
    color: var(--text-medium);
}

.about-content p {
    margin-bottom: var(--spacing-md);
}

/* Community Section */
.btn-community {
    background: var(--gradient-primary);
    color: var(--text-light);
}

/* Gallery Section */
.gallery-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: var(--spacing-lg);
    margin-top: var(--spacing-xl);
}

.gallery-image {
    width: 100%;
    height: 300px;
    object-fit: cover;
    border-radius: var(--radius-md);
    transition: var(--transition-fast);
    cursor: pointer;
    box-shadow: var(--shadow-md);
}

.gallery-image:hover {
    transform: scale(1.05);
    box-shadow: var(--shadow-xl);
}

/* Social Section */
.social-section {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: var(--spacing-xl);
}

.social-icons {
    display: flex;
    gap: var(--spacing-md);
    margin-top: var(--spacing-md);
}

.social-icon {
    color: var(--text-medium);
    font-size: var(--font-xl);
    transition: var(--transition-fast);
}

.social-icon:hover {
    background: var(--gradient-text);
    -webkit-background-clip: text;
    background-clip: text;
    color: transparent;
    transform: scale(1.2);
}

/* Footer */
footer {
    background-color: var(--bg-darker);
    padding: var(--spacing-xl);
    margin-top: var(--spacing-xxl);
}

.references ul {
    list-style: none;
}

.references li {
    color: var(--text-dim);
    margin-bottom: var(--spacing-sm);
}

/* Responsive Design */
@media (max-width: 768px) {
    .hero-content h1 {
        font-size: var(--font-xxl);
    }

    .event-details {
        gap: var(--spacing-md);
    }

    .detail-item {
        font-size: var(--font-md);
        width: 100%;
    }

    h2 {
        font-size: var(--font-xl);
    }

    .btn {
        width: 100%;
        justify-content: center;
    }

    .gallery-grid {
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    }
}

/* Animations */
@keyframes heroZoom {
    from {
        transform: scale(1);
    }
    to {
        transform: scale(1.1);
    }
}

@keyframes glow {
    from {
        filter: drop-shadow(0 0 5px var(--color-primary));
    }
    to {
        filter: drop-shadow(0 0 15px var(--color-accent-blue));
    }
}

@keyframes float {
    0% {
        transform: translateY(0);
    }
    50% {
        transform: translateY(-10px);
    }
    100% {
        transform: translateY(0);
    }
}

section {
    animation: fadeIn 0.8s ease-out forwards;
}

@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
} 

.buy-tickets-section {
    background: var(--bg-card); /* Same as venue-section background */
    color: #fff;
    border-radius: 30px;
    box-shadow: var(--shadow-lg);
    margin-bottom: var(--spacing-xxl);
    padding: 60px 30px;
    display: flex;
    justify-content: center;
    align-items: center;
    animation: fadeIn 1s;
}

.buy-tickets-content {
    display: flex;
    align-items: center;
    gap: 50px;
    flex-wrap: wrap;
    width: 100%;
    max-width: 900px;
    margin: 0 auto;
}

.buy-tickets-icon {
    font-size: 6rem;
    background: var(--gradient-primary-reverse);
    -webkit-background-clip: text;
    background-clip: text;
    color: transparent;
    filter: drop-shadow(0 4px 24px rgba(210,105,230,0.3));
    animation: float 3s infinite;
    flex-shrink: 0;
}

.buy-tickets-info {
    flex: 1;
    min-width: 250px;
    text-align: left;
}

.buy-tickets-info h2 {
    font-size: 2.5rem;
    margin-bottom: 18px;
    color: #fff;
    background: none;
    -webkit-background-clip: unset;
    background-clip: unset;
}

.buy-tickets-desc {
    font-size: 1.2rem;
    margin-bottom: 30px;
    color: #f3f3f3;
}

.btn-buy-tickets {
    font-size: 1.3rem;
    padding: 18px 48px;
    border-radius: 40px;
    background: var(--gradient-primary);
    color: #fff;
    box-shadow: 0 4px 18px rgba(210,105,230,0.15);
    border: none;
    transition: background 0.3s, transform 0.2s;
    font-weight: bold;
    letter-spacing: 1px;
}

.btn-buy-tickets:hover {
    background: var(--gradient-primary-reverse);
    color: #fff;
    transform: translateY(-3px) scale(1.04);
    box-shadow: 0 8px 32px rgba(210,105,230,0.25);
}

@media (max-width: 900px) {
    .buy-tickets-content {
        flex-direction: column;
        gap: 30px;
        text-align: center;
    }
    .buy-tickets-info {
        text-align: center;
    }
}
/* Background components */
.video-background {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: -1;
    overflow: hidden;
}

.video-background video {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    min-width: 100%;
    min-height: 100%;
    width: auto;
    height: auto;
    filter: blur(5px) brightness(0.4);
    object-fit: cover;
}

.static-background {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: -2;
    background-color: #000;
    background-image: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('concert-background.jpg');
    background-size: cover;
    background-position: center;
}
    </style>
</head>
<body>
      <div class="static-background" aria-hidden="true"></div>
    <div class="video-background" id="video-container" aria-hidden="true">
        <video autoplay muted loop playsinline id="bg-video">
            <source src="3.mp4" type="video/mp4">
        </video>
    </div>
    <header class="hero">
        <div class="hero-content">
            <div style="display:flex;justify-content:center;align-items:center;">
                <img 
                    src="<?php echo $imagePath; ?>" 
                    alt="<?php echo htmlspecialchars($event['title']); ?>" 
                    class="artist-image"
                    style="
                        width: 100%;
                        max-width: 1200px;
                        height: 600px;
                        border-radius: 40px;
                        margin-bottom: 50px;
                        box-shadow: 0 16px 60px rgba(0,0,0,0.7);
                        object-fit: cover;
                        display: block;
                    "
                >
            </div>
            <h1><?php echo htmlspecialchars($event['title']); ?></h1>
            <div class="event-details">
                <div class="detail-item">
                    <i class="far fa-calendar"></i>
                    <span><?php echo date("D d M Y", strtotime($event['date'])); ?></span>
                </div>
                <div class="detail-item">
                    <i class="far fa-clock"></i>
                    <span><?php echo date("h:i A", strtotime($event['time'])); ?></span>
                </div>
                <div class="detail-item">
                    <i class="fas fa-microphone"></i>
                    <span><?php echo htmlspecialchars($event['language']); ?></span>
                </div>
                <div class="detail-item">
                    <i class="fas fa-music"></i>
                    <span><?php echo htmlspecialchars($event['category']); ?></span>
                </div>
            </div>
        </div>
    </header>

    <main>
        <section class="venue-section">
            <h2>Venue</h2>
            <div class="venue-details">
                <i class="fas fa-map-marker-alt"></i>
                <p><?php echo htmlspecialchars($event['venue_address']); ?></p>
            </div>
            <?php if (!empty($event['venue_link'])): ?>
                <a href="<?php echo htmlspecialchars($event['venue_link']); ?>" target="_blank">View on Map</a>
            <?php endif; ?>
        </section>

        <!-- Buy Tickets Section -->
        <section class="cta-section buy-tickets-section">
            <div class="buy-tickets-content">
                <div class="buy-tickets-icon">
                    <i class="fas fa-ticket-alt"></i>
                </div>
                <div class="buy-tickets-info">
                    <h2>Buy Tickets</h2>
                    <p class="buy-tickets-desc">
                        Secure your spot now for this amazing event! Don’t miss out on the experience.
                    </p>
                    <a 
                        href="<?php echo !empty($event['ticket_link']) ? htmlspecialchars($event['ticket_link']) : '#'; ?>" 
                        class="btn btn-primary btn-buy-tickets"
                        <?php if (empty($event['ticket_link'])) echo 'onclick="alert(\'Tickets not available yet.\');return false;"'; ?>
                        target="_blank"
                    >
                        <i class="fas fa-shopping-cart"></i> Get Your Tickets
                    </a>
                </div>
            </div>
        </section>
        <!-- End Buy Tickets Section -->

        <section class="about-section">
            <h2>About Event</h2>
            <div class="about-content">
                <p><?php echo nl2br(htmlspecialchars($event['about_event'])); ?></p>
            </div>
        </section>

        <?php if (!empty($event['community_link'])): ?>
        <section class="community-section">
            <h2>Join the Community</h2>
            <a href="<?php echo htmlspecialchars($event['community_link']); ?>" class="btn btn-community">Join the circle </a>
        </section>
        <?php endif; ?>

        <section class="social-section">
            <div class="share-event">
                <h3>Share Event</h3>
                <?php if (!empty($event['share_whatsapp_link'])): ?>
                    <a href="<?php echo htmlspecialchars($event['share_whatsapp_link']); ?>" class="social-icon"><i class="fab fa-whatsapp"></i></a>
                <?php endif; ?>
                <?php if (!empty($event['share_instagram_link'])): ?>
                    <a href="<?php echo htmlspecialchars($event['share_instagram_link']); ?>" class="social-icon"><i class="fab fa-instagram"></i></a>
                <?php endif; ?>
                <?php if (!empty($event['share_facebook_link'])): ?>
                    <a href="<?php echo htmlspecialchars($event['share_facebook_link']); ?>" class="social-icon"><i class="fab fa-facebook"></i></a>
                <?php endif; ?>
            </div>
            <div class="follow-artist">
                <h3>Follow Artist</h3>
                <?php if (!empty($event['follow_spotify_link'])): ?>
                    <a href="<?php echo htmlspecialchars($event['follow_spotify_link']); ?>" class="social-icon"><i class="fab fa-spotify"></i></a>
                <?php endif; ?>
                <?php if (!empty($event['follow_instagram_link'])): ?>
                    <a href="<?php echo htmlspecialchars($event['follow_instagram_link']); ?>" class="social-icon"><i class="fab fa-instagram"></i></a>
                <?php endif; ?>
                <?php if (!empty($event['follow_apple_music_link'])): ?>
                    <a href="<?php echo htmlspecialchars($event['follow_apple_music_link']); ?>" class="social-icon"><i class="fab fa-apple"></i></a>
                <?php endif; ?>
            </div>
        </section>

        <footer>
            <div class="references">
                <h3>References:</h3>
                <ul>
                    <?php
                    $references = !empty($event['ref']) ? explode(", ", $event['ref']) : [];
                    foreach ($references as $reference) {
                        echo "<li>" . htmlspecialchars($reference) . "</li>";
                    }
                    ?>
                </ul>
            </div>
        </footer>
    </main>
</body>
</html>
