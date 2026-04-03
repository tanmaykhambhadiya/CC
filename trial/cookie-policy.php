<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="LOGO for website (circular).png" type="image/x-icon">
    <link rel="icon" type="image/x-icon" href="LOGO for website (circular).png">
    <link rel="shortcut icon" href="LOGO for website (circular).png" type="image/x-icon">
    <title>Concert Circle - Cookie Policy</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700;900&display=swap" rel="stylesheet">
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

/* Improved header styling */
header {
    background-color: rgba(0, 0, 0, 0.9);
    backdrop-filter: blur(15px);
    -webkit-backdrop-filter: blur(15px);
    padding: 15px 0;
    position: fixed;
    width: 100%;
    z-index: 100;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.4);
    transition: all 0.3s ease;
}

.header-container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    max-width: 1400px;
    margin: 0 auto;
    padding: 0 20px;
}

/* Logo improvements */
.logo-container {
    display: flex;
    align-items: center;
    cursor: pointer;
    transition: transform 0.3s ease;
    padding: 10px 0;
}

.logo-container:hover {
    transform: scale(1.05);
}

.svg-logo {
    width: 60px;
    height: 60px;
    transition: all 0.3s ease;
}

.logo-text {
    font-weight: 900;
    font-size: 1.5rem;
    margin-left: 15px;
    color: #ffd700;
    transition: color 0.3s ease;
    letter-spacing: 1px;
}

.logo-container:hover .logo-text {
    color: #d269e6;
}

/* Navigation improvements */
nav ul {
    display: flex;
    list-style: none;
    gap: 15px;
}

nav a {
    color: white;
    text-decoration: none;
    font-weight: 600;
    transition: all 0.3s;
    padding: 10px 18px;
    border-radius: 25px;
    font-size: 1rem;
    letter-spacing: 0.5px;
}

nav a:hover {
    background: linear-gradient(45deg, rgba(210, 105, 230, 0.2), rgba(255, 49, 49, 0.2));
    color: #ffd700;
    transform: translateY(-2px);
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

/* Footer improvements */
footer {
    background-color: rgba(0, 0, 0, 0.95);
    padding: 80px 0 30px;
    position: relative;
}

.footer-container {
    max-width: 1400px;
    margin: 0 auto;
    padding: 0 20px;
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 50px;
}

.footer-about {
    color: #bbb;
    line-height: 1.8;
    margin-bottom: 25px;
}

.footer-title {
    font-size: 1.3rem;
    font-weight: bold;
    margin-bottom: 25px;
    color: #ffd700;
    position: relative;
    padding-bottom: 10px;
}

.footer-title::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    width: 40px;
    height: 3px;
    background: linear-gradient(90deg, #4ddde0, #d269e6);
    border-radius: 2px;
}

.footer-links li {
    margin-bottom: 18px;
    transition: all 0.3s;
}

.footer-links a {
    color: #bbb;
    text-decoration: none;
    transition: all 0.3s;
    position: relative;
    padding-left: 15px;
}

.footer-links a::before {
    content: '›';
    position: absolute;
    left: 0;
    color: #d269e6;
    font-size: 1.2rem;
    transition: all 0.3s;
}

.footer-links a:hover {
    color: #ffd700;
    padding-left: 20px;
}

.footer-links a:hover::before {
    left: 5px;
}

.copyright {
    text-align: center;
    color: #888;
    padding-top: 40px;
    margin-top: 60px;
    border-top: 1px solid rgba(255, 255, 255, 0.1);
    font-size: 0.9rem;
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
    
    nav ul {
        display: none;
        position: absolute;
        top: 80px;
        left: 0;
        width: 100%;
        background-color: rgba(0, 0, 0, 0.95);
        flex-direction: column;
        padding: 15px;
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
        z-index: 99;
        border-radius: 0 0 15px 15px;
    }
    
    nav ul.active {
        display: flex;
    }
    
    nav a {
        padding: 15px;
        display: block;
        border-radius: 10px;
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
    
    footer {
        padding: 60px 0 20px;
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
     
    <header>
        <div class="header-container">
            <div class="logo-container">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1600 1200" class="svg-logo" role="img" aria-label="Concert Circle Logo">
                    <!-- Same SVG code as above -->
                </svg>
                <div class="logo-text">CONCERT CIRCLE</div>
            </div>
            <nav>
                <div class="mobile-menu-toggle"><i class="fas fa-bars"></i></div>
                <ul>
                    <li><a href="events.php">Events</a></li>
                    <li><a href="communities.php">Communities</a></li>
                    <li><a href="aboutus.php">About</a></li>
                    <li><a href="contact.php">Contact</a></li>
                    <li><a href="blogs.php">Blogs</a></li>
                    <li><a href="services.php">Services</a></li>
                    <li><a href="store.php">Store</a></li>
                </ul>
            </nav>
            <div class="user-menu">
                <a href="profile.html" class="user-icon">JS</a>
            </div>
        </div>
    </header>
    
    <main class="main-content">
        <section class="featured-section">
            <h2 class="section-title">Cookie Policy</h2>
            <div class="community-container" style="max-width: 800px;">
                <p style="margin-bottom: 20px; color: #ddd; line-height: 1.6;">
                    This Cookie Policy explains how Concert Circle uses cookies and similar technologies to enhance your experience on our website.
                </p>
                <h3 style="color: #ffd700; margin: 20px 0 10px;">What Are Cookies?</h3>
                <p style="color: #ddd; line-height: 1.6;">
                    Cookies are small text files stored on your device when you visit a website. They help us remember your preferences, analyze site usage, and provide personalized content.
                </p>
                <h3 style="color: #ffd700; margin: 20px 0 10px;">Types of Cookies We Use</h3>
                <ul style="color: #ddd; line-height: 1.6; margin-left: 20px;">
                    <li><strong>Essential Cookies:</strong> Necessary for the website to function properly.</li>
                    <li><strong>Analytics Cookies:</strong> Help us understand how visitors interact with our site.</li>
                    <li><strong>Preference Cookies:</strong> Store your settings and preferences.</li>
                    <li><strong>Marketing Cookies:</strong> Used to deliver relevant advertisements.</li>
                </ul>
                <h3 style="color: #ffd700; margin: 20px 0 10px;">Managing Cookies</h3>
                <p style="color: #ddd; line-height: 1.6;">
                    You can control cookies through your browser settings. Disabling cookies may affect your experience on our site. For more information, contact us at <a href="mailto:info@concertcircle.com" style="color: #52bdfb;">info@concertcircle.com</a>.
                </p>
            </div>
        </section>
    </main>
    
    <footer>
        <!-- Same footer code as above -->
    </footer>
    
    <script src="https://kit.fontawesome.com/your-fontawesome-kit.js" crossorigin="anonymous"></script>
    <script>
        // Same JavaScript code as above for mobile menu toggle
    </script>
</body>
</html>