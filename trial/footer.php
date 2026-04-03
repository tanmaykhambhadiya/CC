<?php ?>
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

footer {
    background-color: rgba(0, 0, 0, 0.95);
    padding: 80px 0 30px;
}

.footer-container {
    max-width: var(--container-width);
    margin: 0 auto;
    padding: 0 var(--spacing-lg);
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: var(--spacing-xxl);
}

.footer-column {
    display: flex;
    flex-direction: column;
}

.footer-logo {
    display: flex;
    align-items: center;
    margin-bottom: var(--spacing-lg);
}

.svg-logo {
    width: 60px;
    height: 60px;
    flex-shrink: 0;
}

.footer-logo-text {
    font-weight: 900;
    font-size: var(--font-lg);
    color: var(--color-accent);
    margin-left: var(--spacing-sm);
}

.footer-about {
    color: var(--text-dim);
    line-height: 1.8;
    margin-bottom: var(--spacing-lg);
}

.footer-title {
    font-size: var(--font-lg);
    font-weight: bold;
    margin-bottom: var(--spacing-lg);
    color: var(--color-accent);
    position: relative;
    padding-bottom: var(--spacing-sm);
}

.footer-title::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    width: 40px;
    height: 3px;
    background: linear-gradient(90deg, var(--color-accent-teal), var(--color-primary));
    border-radius: var(--radius-sm);
}

.footer-links {
    list-style: none;
    padding: 0;
    margin: 0;
}

.footer-links li {
    margin-bottom: 18px;
}

.footer-links a {
    color: var(--text-dim);
    text-decoration: none;
    transition: var(--transition-fast);
    position: relative;
    padding-left: 15px;
}

.footer-links a::before {
    content: '›';
    position: absolute;
    left: 0;
    color: var(--color-primary);
    font-size: 1.2rem;
    transition: var(--transition-fast);
}

.footer-links a:hover {
    color: var(--color-accent);
    padding-left: 20px;
}

.social-links {
    display: flex;
    gap: var(--spacing-md);
    margin-top: var(--spacing-lg);
}

.social-link {
    width: 45px;
    height: 45px;
    background-color: rgba(255, 255, 255, 0.1);
    border-radius: var(--radius-round);
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--text-light);
    font-size: 1.2rem;
    transition: var(--transition-fast);
    text-decoration: none;
    flex-shrink: 0;
}

.social-link:hover {
    background-color: var(--color-primary);
    transform: translateY(-3px);
    box-shadow: var(--shadow-md);
}

.social-link i {
    width: 20px;
    height: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.container {
    max-width: var(--container-width);
    margin: 0 auto;
    padding: 0 var(--spacing-lg);
}

.copyright {
    text-align: center;
    color: var(--text-dimmer);
    padding-top: 40px;
    margin-top: 60px;
    border-top: 1px solid rgba(255, 255, 255, 0.1);
    font-size: var(--font-sm);
}

@media (max-width: 768px) {
    .footer-container {
        grid-template-columns: 1fr;
        gap: var(--spacing-xl);
        text-align: center;
    }
    
    .footer-logo {
        justify-content: center;
    }
    
    .social-links {
        justify-content: center;
    }
    
    footer {
        padding: 60px 0 20px;
    }
}
</style>

<!-- Font Awesome for icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<footer>
    <div class="footer-container">
        <div class="footer-column">
            <div class="footer-logo">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 120 120" class="svg-logo" role="img" aria-label="Concert Circle Logo">
                    <defs>
                        <linearGradient id="logoGradient" x1="0%" y1="0%" x2="100%" y2="100%">
                            <stop offset="0%" stop-color="#4ddde0"/>
                            <stop offset="50%" stop-color="#d269e6"/>
                            <stop offset="100%" stop-color="#ff3131"/>
                        </linearGradient>
                        <filter id="dynamicGlow">
                            <feGaussianBlur class="blur" stdDeviation="3" result="coloredBlur"/>
                            <feMerge>
                                <feMergeNode in="coloredBlur"/>
                                <feMergeNode in="SourceGraphic"/>
                            </feMerge>
                        </filter>
                    </defs>
                    <g transform="translate(60, 60)">
                        <g id="circleGroup">
                            <circle cx="0" cy="0" r="45" stroke="url(#logoGradient)" stroke-width="2" fill="none" opacity="0.6" filter="url(#dynamicGlow)">
                                <animate attributeName="r" values="45;49;45" dur="4s" repeatCount="indefinite"/>
                                <animate attributeName="opacity" values="0.6;0.4;0.6" dur="4s" repeatCount="indefinite"/>
                            </circle>
                            <circle cx="0" cy="0" r="36" stroke="url(#logoGradient)" stroke-width="2" fill="none" opacity="0.8" filter="url(#dynamicGlow)">
                                <animate attributeName="r" values="36;40;36" dur="3s" repeatCount="indefinite"/>
                                <animate attributeName="opacity" values="0.8;0.6;0.8" dur="3s" repeatCount="indefinite"/>
                            </circle>
                            <circle cx="0" cy="0" r="27" stroke="url(#logoGradient)" stroke-width="2" fill="none" opacity="1" filter="url(#dynamicGlow)">
                                <animate attributeName="r" values="27;31;27" dur="2s" repeatCount="indefinite"/>
                                <animate attributeName="opacity" values="1;0.7;1" dur="2s" repeatCount="indefinite"/>
                            </circle>
                        </g>
                    </g>
                </svg>
                <span class="footer-logo-text">Concert Circle</span>
            </div>
            <p class="footer-about">Unifying your entire concert going experience</p>
            <div class="social-links">
                <a href="https://www.instagram.com/concertcircle?igsh=MWJnYjV1ZThyODBvZw==" class="social-link" target="_blank" aria-label="Instagram">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="https://chat.whatsapp.com/GkdJgdvoqxm0fvZgJ7ZPa0" class="social-link" target="_blank" aria-label="WhatsApp">
                    <i class="fab fa-whatsapp"></i>
                </a>
            </div>
        </div>
        
        <div class="footer-column">
            <h3 class="footer-title">Explore</h3>
            <ul class="footer-links">
                <li><a href="events.php">All Events</a></li>
                <li><a href="communities.php">Artist Communities</a></li>
                <li><a href="blogs.php">Event Blog</a></li>
            </ul>
        </div>
        
        <div class="footer-column">
            <h3 class="footer-title">Company</h3>
            <ul class="footer-links">
                <li><a href="aboutus.php">About Us</a></li>
                <li><a href="contactus.php">Contact Us</a></li>
            </ul>
        </div>
        
        <div class="footer-column">
            <h3 class="footer-title">Help</h3>
            <ul class="footer-links">
                <li><a href="faq.php">FAQ</a></li>
                <li><a href="concert-safety.php">Safety Center</a></li>
                <li><a href="t&c.php">Terms of Service</a></li>
                <li><a href="privacy.php">Privacy Policy</a></li>
                <li><a href="support.php">Support Center</a></li>
            </ul>
        </div>
    </div>
    
    <div class="container">
        <p class="copyright">© 2025 Concert Circle. All rights reserved.</p>
    </div>
</footer>