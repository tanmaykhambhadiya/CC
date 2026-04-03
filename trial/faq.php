<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="LOGO for website (circular).png" type="image/x-icon">
    <link rel="shortcut icon" href="LOGO for website (circular).png" type="image/x-icon">
    <link rel="icon" type="image/x-icon" href="LOGO for website (circular).png">
    <title>Concert Circle - FAQ</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="navbar.css" type="text/css" />
    <link rel="stylesheet" href="footer.css" type="text/css" />
    <style>
      * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Montserrat', sans-serif;
    background-color: #121212;
    color: #ffffff;
    line-height: 1.6;
}

/* Enhanced responsive layout */
.container {
    width: 100%;
    max-width: 1400px;
    margin: 0 auto;
    padding: 0 20px;
}
/* Hero section improvements */
.hero-section {
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    position: relative;
    padding: 100px 0 60px;
    background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.8)), url('concert-background.jpg');
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
}

.hero-content {
    max-width: 900px;
    padding: 0 20px;
    z-index: 1;
    animation: fadeInUp 1s ease;
}

h1 {
    font-size: 3.5rem;
    font-weight: 900;
    margin-bottom: 1.5rem;
    line-height: 1.2;
    text-shadow: 0 2px 10px rgba(0, 0, 0, 0.5);
}

.gradient-text {
    background: linear-gradient(90deg, #4ddde0, #52bdfb, #d269e6, #ff3131, #ffd700);
    -webkit-background-clip: text;
    background-clip: text;
    color: transparent;
    position: relative;
    display: inline-block;
}

.gradient-text::after {
    content: '';
    position: absolute;
    bottom: -3px;
    left: 0;
    width: 100%;
    height: 4px;
    background: linear-gradient(90deg, #4ddde0, #52bdfb, #d269e6, #ff3131, #ffd700);
    border-radius: 2px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
}

.hero-text {
    font-size: 1.3rem;
    max-width: 700px;
    margin: 0 auto 2.5rem;
    text-shadow: 0 2px 5px rgba(0, 0, 0, 0.5);
}

/* Improved search functionality */
.search-container {
    display: flex;
    max-width: 650px;
    margin: 0 auto;
    position: relative;
}

.search-input {
    flex-grow: 1;
    padding: 18px 25px;
    border: none;
    border-radius: 50px 0 0 50px;
    background-color: rgba(255, 255, 255, 0.95);
    font-size: 1.1rem;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
    transition: all 0.3s;
}

.search-input:focus {
    outline: none;
    background-color: #fff;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.3);
}

.search-btn {
    background: linear-gradient(45deg, #ff3131, #d269e6);
    color: white;
    border: none;
    padding: 18px 35px;
    border-radius: 0 50px 50px 0;
    font-weight: bold;
    font-size: 1.1rem;
    cursor: pointer;
    transition: all 0.3s;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
}

.search-btn:hover {
    background: linear-gradient(45deg, #d269e6, #ff3131);
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
}

/* Enhanced card styles */
.event-card, .community-card, .feature-card {
    background: linear-gradient(145deg, rgba(255, 255, 255, 0.05), rgba(255, 255, 255, 0.1));
    border-radius: 20px;
    overflow: hidden;
    transition: all 0.4s ease;
    border: 1px solid rgba(255, 255, 255, 0.05);
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
}

.event-card:hover, .community-card:hover, .feature-card:hover {
    transform: translateY(-12px);
    box-shadow: 0 20px 30px rgba(0, 0, 0, 0.2);
    border-color: rgba(210, 105, 230, 0.3);
}

.event-image {
    height: 200px;
    position: relative;
    overflow: hidden;
}

.event-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.5s ease;
}

.event-card:hover .event-image img {
    transform: scale(1.1);
}

.event-details, .community-card, .feature-card {
    padding: 25px;
}

/* Section improvements */
.section-title {
    font-size: 2.5rem;
    text-align: center;
    margin-bottom: 50px;
    position: relative;
    padding-bottom: 15px;
    color: #fff;
}

.section-title::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 50%;
    transform: translateX(-50%);
    width: 80px;
    height: 4px;
    background: linear-gradient(90deg, #4ddde0, #d269e6);
    border-radius: 2px;
}

.featured-section, .features-section {
    max-width: 1400px;
    margin: 0 auto;
    padding: 100px 20px;
    position: relative;
}

.community-section {
    background: linear-gradient(rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.8)), url('community-background.jpg');
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
    padding: 100px 0;
}

.community-container {
    max-width: 1400px;
    margin: 0 auto;
    padding: 0 20px;
}

/* CTA section improvements */
.cta-section {
    background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('cta-background.jpg');
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
    padding: 120px 20px;
    text-align: center;
    position: relative;
}

.cta-content {
    max-width: 900px;
    margin: 0 auto;
    position: relative;
    z-index: 2;
}

.cta-title {
    font-size: 3rem;
    font-weight: 900;
    margin-bottom: 25px;
    color: #fff;
    text-shadow: 0 2px 10px rgba(0, 0, 0, 0.5);
}

.cta-text {
    font-size: 1.3rem;
    color: #fff;
    margin-bottom: 40px;
    max-width: 700px;
    margin-left: auto;
    margin-right: auto;
    text-shadow: 0 2px 5px rgba(0, 0, 0, 0.5);
}

.cta-button {
    background: linear-gradient(45deg, #ff3131, #d269e6);
    color: white;
    border: none;
    padding: 18px 40px;
    font-size: 1.2rem;
    font-weight: bold;
    border-radius: 50px;
    cursor: pointer;
    transition: all 0.4s ease;
    text-decoration: none;
    display: inline-block;
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
}

.cta-button:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 30px rgba(0, 0, 0, 0.3);
    background: linear-gradient(45deg, #d269e6, #ff3131);
}

/* Modal improvements */
.event-modal, .community-modal, .signup-modal {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.85);
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 1000;
    opacity: 0;
    visibility: hidden;
    transition: all 0.4s ease;
}

.event-modal.active, .community-modal.active, .signup-modal.active {
    opacity: 1;
    visibility: visible;
}

.event-modal-content, .community-modal-content, .signup-modal-content {
    background: linear-gradient(145deg, #121212, #1a1a1a);
    width: 90%;
    max-width: 900px;
    border-radius: 20px;
    overflow: hidden;
    position: relative;
    transform: scale(0.9);
    transition: transform 0.4s ease;
    box-shadow: 0 25px 50px rgba(0, 0, 0, 0.5);
    border: 1px solid rgba(255, 255, 255, 0.05);
}

.event-modal.active .event-modal-content,
.community-modal.active .community-modal-content,
.signup-modal.active .signup-modal-content {
    transform: scale(1);
}

/* Form improvements */
.form-input {
    width: 100%;
    padding: 15px 20px;
    background-color: rgba(255, 255, 255, 0.1);
    border: 1px solid rgba(255, 255, 255, 0.2);
    border-radius: 10px;
    color: white;
    font-size: 1rem;
    transition: all 0.3s;
}

.form-input:focus {
    outline: none;
    border-color: #52bdfb;
    background-color: rgba(255, 255, 255, 0.15);
    box-shadow: 0 0 10px rgba(82, 189, 251, 0.3);
}

.submit-button {
    width: 100%;
    padding: 16px;
    background: linear-gradient(45deg, #ff3131, #d269e6);
    color: white;
    border: none;
    border-radius: 10px;
    font-weight: bold;
    font-size: 1.1rem;
    cursor: pointer;
    transition: all 0.3s;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
}

.submit-button:hover {
    background: linear-gradient(45deg, #d269e6, #ff3131);
    transform: translateY(-3px);
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
}

/* Animation keyframes */
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes pulse {
    0% {
        transform: scale(1);
    }
    50% {
        transform: scale(1.05);
    }
    100% {
        transform: scale(1);
    }
}

/* Mobile menu improvements */
.mobile-menu-toggle {
    display: none;
    cursor: pointer;
    font-size: 1.5rem;
    color: #fff;
    background: rgba(210, 105, 230, 0.2);
    padding: 10px;
    border-radius: 5px;
    transition: all 0.3s;
}

.mobile-menu-toggle:hover {
    background: rgba(210, 105, 230, 0.4);
}

/* Enhanced responsive design */
@media (max-width: 1200px) {
    h1 {
        font-size: 3rem;
    }
    
    .section-title {
        font-size: 2.2rem;
    }
    
    .cta-title {
        font-size: 2.5rem;
    }
}

@media (max-width: 992px) {
    .event-grid, .community-grid, .features-grid {
        grid-template-columns: repeat(2, 1fr);
    }
    
    .footer-container {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 768px) {
    h1 {
        font-size: 2.5rem;
    }
    
    .hero-text {
        font-size: 1.1rem;
    }
    
    .section-title {
        font-size: 2rem;
    }
    
    .event-grid, .community-grid, .features-grid {
        grid-template-columns: 1fr;
        gap: 25px;
    }
    
    .header-container {
        padding: 0 15px;
    }
    
    .mobile-menu-toggle {
        display: block;
    }
    
    .search-container {
        flex-direction: column;
    }
    
    .search-input {
        border-radius: 10px;
        margin-bottom: 10px;
        width: 100%;
    }
    
    .search-btn {
        border-radius: 10px;
        width: 100%;
    }
    
    .hero-section {
        padding: 120px 0 60px;
    }
    
    .featured-section, .features-section {
        padding: 60px 15px;
    }
    
    .community-section {
        padding: 60px 0;
    }
    
}

@media (max-width: 576px) {
    h1 {
        font-size: 2rem;
    }
    
    .logo-text {
        font-size: 1.2rem;
    }
    
    .svg-logo {
        width: 45px;
        height: 45px;
    }
    
    .hero-text {
        font-size: 1rem;
    }
    
    .section-title {
        font-size: 1.8rem;
        margin-bottom: 30px;
    }
    
    .event-card, .community-card, .feature-card {
        border-radius: 15px;
    }
    
    .footer-container {
        grid-template-columns: 1fr;
        gap: 40px;
    }
    
    .cta-title {
        font-size: 1.8rem;
    }
    
    .cta-text {
        font-size: 1rem;
    }
    
    .cta-button {
        padding: 15px 30px;
        font-size: 1rem;
    }
}

/* User menu enhancements */
.user-menu {
    position: relative;
}

.user-icon {
    width: 45px;
    height: 45px;
    background: linear-gradient(145deg, #d269e6, #52bdfb);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: bold;
    transition: all 0.3s;
    cursor: pointer;
    box-shadow: 0 3px 8px rgba(0, 0, 0, 0.2);
}

.user-icon:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
}

/* Additional visual enhancements */
.static-background {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: -2;
    background-color: #000;
    background-image: linear-gradient(rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.8)), url('concert-background.jpg');
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
}
    </style>
</head>
<body>
    <div class="static-background"></div>
    
    <?php include 'header.php'; ?>
    
    <main class="main-content">
        <section class="featured-section">
            <h2 class="section-title">Frequently Asked Questions</h2>
            <div class="community-container" style="max-width: 800px;">
                <div class="faq-item">
                    <div class="faq-question">What is Concert Circle?</div>
                    <div class="faq-answer">Concert Circle is a platform that connects concert-goers, helps you discover events, and build communities based on shared music interests.</div>
                </div>
                <div class="faq-item">
                    <div class="faq-question">How do I join a community?</div>
                    <div class="faq-answer">Browse our Communities section, find one that matches your interests, and click "Join." You’ll need an account to participate.</div>
                </div>
                <div class="faq-item">
                    <div class="faq-question">Can I create my own event or community?</div>
                    <div class="faq-answer">Yes! Registered users can create events and communities. Visit your profile dashboard to get started.</div>
                </div>
                <div class="faq-item">
                    <div class="faq-question">How do I contact support?</div>
                    <div class="faq-answer">Visit our <a href="support.php" style="color: #52bdfb;">Support page</a> or email us at <a href="mailto:support@concertcircle.com" style="color: #52bdfb;">support@concertcircle.com</a>.</div>
                </div>
                <div class="faq-item">
                    <div class="faq-question">Is Concert Circle free to use?</div>
                    <div class="faq-answer">Basic features are free. We offer premium memberships for additional benefits like group ticket discounts.</div>
                </div>
            </div>
        </section>
    </main>
    
 <?php include 'footer.php'; ?>
    
    <script src="https://kit.fontawesome.com/your-fontawesome-kit.js" crossorigin="anonymous"></script>
    <script>
        // Same JavaScript code as above for mobile menu toggle
    </script>
</body>
</html>