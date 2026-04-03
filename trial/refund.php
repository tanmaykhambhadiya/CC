<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Refund Policy for Concert Circle - Our guidelines for ticket and merchandise returns.">
     <link rel="icon" href="LOGO for website (circular).png" type="image/x-icon">
    <link rel="shortcut icon" href="LOGO for website (circular).png" type="image/x-icon">
    <title>Refund Policy - Concert Circle</title>
    <style>
    /* Google Fonts import */
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700;900&display=swap');
    
    /* CSS Reset */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    
    :root {
        --primary-color: #4ddde0;
        --secondary-color: #d269e6;
        --accent-color: #ff3131;
        --highlight-color: #ffd700;
        --dark-bg: rgba(0, 0, 0, 0.7);
        --card-bg: rgba(0, 0, 0, 0.4);
        --border-color: rgba(255, 255, 255, 0.1);
        --input-bg: rgba(255, 255, 255, 0.1);
        --success-bg: rgba(77, 221, 224, 0.2);
        --error-bg: rgba(255, 49, 49, 0.2);
        --transition: all 0.3s ease;
    }
    
    /* Background components */
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
    
    /* Base styles */
    body {
        font-family: 'Montserrat', sans-serif;
        background-color: var(--dark-bg);
        color: #ffffff;
        display: flex;
        flex-direction: column;
        min-height: 100vh;
        align-items: center;
        justify-content: center;
        text-align: center;
        position: relative;
        line-height: 1.6;
    }
    
    .container {
        width: 100%;
        max-width: 1200px;
        padding: 2rem;
        position: relative;
        z-index: 1;
    }
    
    /* Header and navigation */
    header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 1rem 0;
        margin-bottom: 2rem;
        border-bottom: 1px solid var(--border-color);
        width: 100%;
    }
    
    .logo {
        display: flex;
        align-items: center;
        text-decoration: none;
        color: var(--highlight-color);
        font-weight: 900;
        font-size: 1.5rem;
        transition: var(--transition);
    }
    
    .logo:hover {
        transform: scale(1.05);
    }
    
    .logo-icon {
        position: relative;
        width: 40px;
        height: 40px;
        margin-right: 10px;
    }
    
    .circle {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        border-radius: 50%;
        border: 2px solid transparent;
    }
    
    .circle-outer {
        border-color: var(--secondary-color);
        animation: rotate 8s linear infinite;
    }
    
    .circle-middle {
        border-color: var(--accent-color);
        transform: scale(0.85);
        animation: rotate 6s linear infinite reverse;
    }
    
    .circle-inner {
        border-color: var(--primary-color);
        transform: scale(0.7);
        animation: rotate 4s linear infinite;
    }
    
    @keyframes rotate {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }
    }
    
    .circle-middle {
        animation-name: rotate-middle;
    }
    
    @keyframes rotate-middle {
        from { transform: rotate(0deg) scale(0.85); }
        to { transform: rotate(-360deg) scale(0.85); }
    }
    
    .circle-inner {
        animation-name: rotate-inner;
    }
    
    @keyframes rotate-inner {
        from { transform: rotate(0deg) scale(0.7); }
        to { transform: rotate(360deg) scale(0.7); }
    }
    
    nav ul {
        display: flex;
        list-style: none;
        gap: 1.5rem;
    }
    
    nav a {
        color: #fff;
        text-decoration: none;
        font-weight: 600;
        padding: 0.5rem;
        transition: var(--transition);
        position: relative;
    }
    
    nav a:hover {
        color: var(--primary-color);
    }
    
    nav a::after {
        content: '';
        position: absolute;
        width: 0;
        height: 2px;
        bottom: 0;
        left: 50%;
        background: var(--primary-color);
        transition: var(--transition);
        transform: translateX(-50%);
    }
    
    nav a:hover::after {
        width: 100%;
    }
    
    nav a.active {
        color: var(--highlight-color);
    }
    
    nav a.active::after {
        background: var(--highlight-color);
        width: 100%;
    }
    
    /* Typography */
    h1 {
        font-size: 2.5rem;
        font-weight: 900;
        margin-bottom: 1.5rem;
        letter-spacing: 1px;
    }
    
    h2 {
        color: var(--highlight-color);
        margin-top: 1.5rem;
        margin-bottom: 1rem;
        border-bottom: 2px solid var(--primary-color);
        padding-bottom: 0.5rem;
    }
    
    h3 {
        color: var(--primary-color);
        margin-top: 1rem;
        margin-bottom: 0.5rem;
    }
    
    .gradient-text {
        background: linear-gradient(90deg, var(--primary-color), #52bdfb, var(--secondary-color), var(--accent-color), var(--highlight-color));
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
        position: relative;
        display: inline-block;
    }
    
    .gradient-text::after {
        content: '';
        position: absolute;
        bottom: -5px;
        left: 0;
        width: 100%;
        height: 4px;
        background: linear-gradient(90deg, var(--primary-color), #52bdfb, var(--secondary-color), var(--accent-color), var(--highlight-color));
        border-radius: 2px;
    }
    
    p {
        font-size: 1.2rem;
        margin-bottom: 2rem;
        max-width: 800px;
        margin-left: auto;
        margin-right: auto;
    }
    
    ul {
        list-style-type: none;
        padding: 0;
        margin-bottom: 1rem;
    }
    
    ul li {
        background-color: var(--card-bg);
        margin-bottom: 0.5rem;
        padding: 0.75rem;
        border-radius: 5px;
        transition: var(--transition);
    }
    
    ul li:hover {
        background-color: rgba(77, 221, 224, 0.1);
    }
    
    .warning {
        background-color: var(--error-bg);
        border-left: 4px solid var(--accent-color);
        padding: 1rem;
        margin: 1rem 0;
    }
    
    /* Contact form/content area */
    .contact-content {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 2rem;
        margin-top: 3rem;
    }
    
    .contact-form {
        flex: 1;
        min-width: 300px;
        max-width: 600px;
        background-color: var(--card-bg);
        padding: 2rem;
        border-radius: 10px;
        border: 1px solid var(--primary-color);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        transition: var(--transition);
        text-align: left;
    }
    
    .contact-form:hover {
        box-shadow: 0 15px 40px rgba(77, 221, 224, 0.2);
        transform: translateY(-5px);
    }
    
    /* Social media links */
    .social-links {
        display: flex;
        justify-content: center;
        gap: 20px;
        margin: 40px 0;
    }
    
    .social-link {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 50px;
        height: 50px;
        background-color: rgba(255, 255, 255, 0.1);
        border-radius: 50%;
        color: var(--secondary-color);
        font-size: 20px;
        transition: var(--transition);
        position: relative;
        overflow: hidden;
    }
    
    .social-link::before {
        content: '';
        position: absolute;
        width: 100%;
        height: 100%;
        background: radial-gradient(circle, var(--secondary-color), transparent);
        opacity: 0;
        transform: scale(0);
        transition: var(--transition);
    }
    
    .social-link:hover {
        color: white;
        transform: translateY(-5px);
    }
    
    .social-link:hover::before {
        opacity: 0.3;
        transform: scale(1.5);
    }
    
    .social-link svg {
        position: relative;
        z-index: 1;
    }
    
    /* Footer */
    footer {
        margin-top: 4rem;
        padding: 1rem 0;
        color: rgba(255, 255, 255, 0.7);
        border-top: 1px solid var(--border-color);
        width: 100%;
        font-size: 0.9rem;
    }
    
    /* Responsive design */
    @media (max-width: 768px) {
        h1 {
            font-size: 2rem;
        }
        
        header {
            flex-direction: column;
            gap: 1rem;
        }
        
        nav ul {
            gap: 1rem;
        }
        
        .container {
            padding: 1rem;
        }
    }
    
    /* Prefers reduced motion */
    @media (prefers-reduced-motion: reduce) {
        .circle-outer, .circle-middle, .circle-inner {
            animation: none;
        }
        
        .social-link::before {
            display: none;
        }
        
        * {
            transition: none !important;
        }
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
    
    <div class="container">
        <header>
            <a href="index.php" class="logo">
                <div class="logo-icon">
                    <div class="circle circle-outer"></div>
                    <div class="circle circle-middle"></div>
                    <div class="circle circle-inner"></div>
                </div>
                CONCERT CIRCLE
            </a>
            <nav>
                <ul>
                   <li><a href="index.php" class="home-link">Home</a></li>
                   <li><a href="aboutus.php">About Us</a></li>
                   <li><a href="t&c.php">Terms & Conditions</a></li>
                   <li><a href="contact.php">Contact Us</a></li>
                </ul>
            </nav>
        </header>
        
        <main>
            <h1>Refund <span class="gradient-text">Policy</span></h1>
            
            <div class="contact-form">
                <h2>1. Event Tickets Refund Guidelines</h2>
                
                <h3>1.1 Standard Refund Window</h3>
                <ul>
                    <li>Refunds are available up to 7 days before the event date</li>
                    <li>After the 7-day window, no refunds will be processed</li>
                </ul>

                <h3>1.2 Refund Process</h3>
                <ul>
                    <li>Refund requests must be submitted via email to support@concertcircle.com</li>
                    <li>Include your order number, event name, and reason for refund</li>
                    <li>Refunds will be processed within 5-10 business days</li>
                    <li>Original payment method will be credited</li>
                </ul>

                <div class="warning">
                    <h3>1.3 Non-Refundable Circumstances</h3>
                    <p>The following situations are not eligible for refunds:</p>
                    <ul>
                        <li>Requests less than 7 days before the event</li>
                        <li>User error in ticket selection</li>
                        <li>Medical emergencies (travel insurance recommended)</li>
                        <li>Personal schedule conflicts</li>
                    </ul>
                </div>

                <h3>1.4 Event Cancellation or Postponement</h3>
                <ul>
                    <li>Full refund provided if Concert Circle cancels an event</li>
                    <li>Refund or ticket transfer option if event is postponed</li>
                    <li>Refund processed automatically to original payment method</li>
                </ul>

                <h2>2. Merchandise Refund Policy</h2>

                <h3>2.1 Merchandise Returns</h3>
                <ul>
                    <li>Unopened and unused merchandise can be returned within 5 days before event</li>
                    <li>Item must be in original packaging</li>
                    <li>Return shipping costs are responsibility of the customer</li>
                    <li>Refund processed to original payment method</li>
                </ul>

                <h3>2.2 Damaged or Incorrect Items</h3>
                <ul>
                    <li>Notify support within 48 hours of receiving the item</li>
                    <li>Provide photographic evidence</li>
                    <li>Replacement or full refund will be issued</li>
                </ul>

                <h2>3. Contact Information</h2>
                <p>For all refund-related inquiries:</p>
                <ul>
                    <li>Email: support@concertcircle.com</li>
                    <li>Response within 24-48 hours</li>
                </ul>
            </div>
        </main>
        
        <div class="social-links">
            <a href="https://www.instagram.com/concertcircle" target="_blank" rel="noopener" class="social-link" aria-label="Follow us on Instagram">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                    <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                    <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                </svg>
            </a>
            <a href="mailto:support@concertcircle.com" class="social-link" aria-label="Contact us by email">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                    <polyline points="22,6 12,13 2,6"></polyline>
                </svg>
            </a>
        </div>
        
        <footer>
            <p>&copy; 2025 Concert Circle. All rights reserved.</p>
        </footer>
    </div>

    <script>
    // Video background handling (existing code)
const video = document.getElementById('bg-video');
const videoContainer = document.getElementById('video-container');

if (video && videoContainer) {
    // Check for mobile and reduced motion preference
    const isMobile = window.matchMedia('(max-width: 768px)').matches;
    const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    
    if (isMobile || prefersReducedMotion) {
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

// New functionality for refund policy page
document.addEventListener('DOMContentLoaded', () => {
    // Add expandable sections for policy details
    const headings = document.querySelectorAll('h3');
    
    headings.forEach(heading => {
        // Add toggle indicator
        const indicator = document.createElement('span');
        indicator.className = 'toggle-indicator';
        indicator.innerHTML = '&plus;';  // Plus symbol
        heading.prepend(indicator);
        
        // Get the content to toggle
        let content = heading.nextElementSibling;
        const contentToToggle = [];
        
        // Collect all elements until the next heading
        while (content && !content.matches('h2, h3')) {
            contentToToggle.push(content);
            content = content.nextElementSibling;
        }
        
        // Initially collapse all sections except the first one
        if (heading !== headings[0]) {
            contentToToggle.forEach(el => {
                el.style.display = 'none';
            });
        } else {
            indicator.innerHTML = '&minus;';  // Minus symbol for expanded section
        }
        
        // Add click event to toggle content
        heading.style.cursor = 'pointer';
        heading.addEventListener('click', () => {
            const isExpanded = contentToToggle[0].style.display !== 'none';
            
            contentToToggle.forEach(el => {
                el.style.display = isExpanded ? 'none' : '';
            });
            
            indicator.innerHTML = isExpanded ? '&plus;' : '&minus;';
        });
    });
    
    // Add smooth scroll for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            
            const targetId = this.getAttribute('href');
            const targetElement = document.querySelector(targetId);
            
            if (targetElement) {
                window.scrollTo({
                    top: targetElement.offsetTop - 20,
                    behavior: 'smooth'
                });
            }
        });
    });
    
    // Add print functionality
    const main = document.querySelector('main');
    const printButton = document.createElement('button');
    printButton.className = 'print-button';
    printButton.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 6 2 18 2 18 9"></polyline><path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"></path><rect x="6" y="14" width="12" height="8"></rect></svg> Print Policy';
    
    // Add print button after the main heading
    const mainHeading = document.querySelector('h1');
    if (mainHeading && mainHeading.nextElementSibling) {
        main.insertBefore(printButton, mainHeading.nextElementSibling);
    } else if (mainHeading) {
        main.insertBefore(printButton, mainHeading.nextSibling);
    }
    
    // Style the print button
    printButton.style.display = 'inline-flex';
    printButton.style.alignItems = 'center';
    printButton.style.gap = '8px';
    printButton.style.background = '#f5f5f5';
    printButton.style.border = '1px solid #ddd';
    printButton.style.borderRadius = '4px';
    printButton.style.padding = '8px 16px';
    printButton.style.cursor = 'pointer';
    printButton.style.marginBottom = '20px';
    
    // Add print functionality
    printButton.addEventListener('click', () => {
        window.print();
    });
    
    // Add FAQ section
    const faqSection = document.createElement('div');
    faqSection.className = 'faq-section';
    faqSection.innerHTML = `
        <h2>Frequently Asked Questions</h2>
        <div class="faq-item">
            <div class="faq-question">How long does it take to receive my refund?</div>
            <div class="faq-answer">Refunds are typically processed within 5-10 business days. The exact timing depends on your payment provider.</div>
        </div>
        <div class="faq-item">
            <div class="faq-question">Can I get a refund if I can't attend due to illness?</div>
            <div class="faq-answer">Unfortunately, medical emergencies are not covered under our standard refund policy. We recommend purchasing event insurance for such circumstances.</div>
        </div>
        <div class="faq-item">
            <div class="faq-question">What happens if only some members of my group can attend?</div>
            <div class="faq-answer">You can request a partial refund for the tickets that won't be used, as long as it's within the 7-day refund window.</div>
        </div>
        <div class="faq-item">
            <div class="faq-question">Can I transfer my ticket to someone else instead of getting a refund?</div>
            <div class="faq-answer">Yes! Ticket transfers can be done through your account dashboard up until 24 hours before the event.</div>
        </div>
    `;
    
    // Add FAQ section to the end of main content
    main.appendChild(faqSection);
    
    // Style the FAQ items
    const faqItems = document.querySelectorAll('.faq-item');
    faqItems.forEach(item => {
        const question = item.querySelector('.faq-question');
        const answer = item.querySelector('.faq-answer');
        
        // Initial styling
        question.style.fontWeight = 'bold';
        question.style.cursor = 'pointer';
        question.style.padding = '12px';
        question.style.background = '#f5f5f5';
        question.style.borderRadius = '4px';
        question.style.display = 'flex';
        question.style.justifyContent = 'space-between';
        
        // Add toggle indicator
        question.innerHTML += '<span class="faq-toggle">&plus;</span>';
        
        // Initially hide answers
        answer.style.display = 'none';
        answer.style.padding = '12px';
        answer.style.paddingTop = '0';
        
        // Toggle functionality
        question.addEventListener('click', () => {
            const isVisible = answer.style.display !== 'none';
            answer.style.display = isVisible ? 'none' : 'block';
            
            const toggle = question.querySelector('.faq-toggle');
            toggle.innerHTML = isVisible ? '&plus;' : '&minus;';
            
            // Adjust question padding when expanded
            question.style.paddingBottom = isVisible ? '12px' : '12px';
        });
    });
    
    // Add notification system
    const notificationSystem = document.createElement('div');
    notificationSystem.className = 'notification-system';
    notificationSystem.style.position = 'fixed';
    notificationSystem.style.bottom = '20px';
    notificationSystem.style.right = '20px';
    notificationSystem.style.zIndex = '1000';
    document.body.appendChild(notificationSystem);
    
    // Function to show notifications
    window.showNotification = function(message, type = 'info') {
        const notification = document.createElement('div');
        notification.className = `notification ${type}`;
        notification.textContent = message;
        
        // Style the notification
        notification.style.backgroundColor = type === 'error' ? '#f44336' : '#4CAF50';
        notification.style.color = 'white';
        notification.style.padding = '12px 24px';
        notification.style.marginTop = '10px';
        notification.style.borderRadius = '4px';
        notification.style.boxShadow = '0 2px 10px rgba(0,0,0,0.2)';
        notification.style.opacity = '0';
        notification.style.transition = 'opacity 0.3s ease-in-out';
        
        // Add to notification system
        notificationSystem.appendChild(notification);
        
        // Show the notification
        setTimeout(() => {
            notification.style.opacity = '1';
        }, 10);
        
        // Auto-remove after 4 seconds
        setTimeout(() => {
            notification.style.opacity = '0';
            setTimeout(() => {
                notification.remove();
            }, 300);
        }, 4000);
    };
    
    // Add "Contact Support" quick action
    const contactButton = document.createElement('button');
    contactButton.className = 'contact-support-btn';
    contactButton.textContent = 'Contact Support for Refund';
    contactButton.style.display = 'block';
    contactButton.style.margin = '20px auto';
    contactButton.style.padding = '12px 24px';
    contactButton.style.backgroundColor = '#3498db';
    contactButton.style.color = 'white';
    contactButton.style.border = 'none';
    contactButton.style.borderRadius = '4px';
    contactButton.style.cursor = 'pointer';
    
    // Add button after the refund process section
    const refundProcessSection = document.querySelector('h3:contains("1.2 Refund Process")');
    if (refundProcessSection) {
        let targetElement = refundProcessSection.nextElementSibling;
        while (targetElement && targetElement.tagName === 'UL') {
            targetElement = targetElement.nextElementSibling;
        }
        
        if (targetElement) {
            targetElement.parentNode.insertBefore(contactButton, targetElement);
        }
    } else {
        // Fallback: Add to the end of the main content
        main.appendChild(contactButton);
    }
    
    // Contact support button click handler
    contactButton.addEventListener('click', () => {
        const emailLink = 'mailto:support@concertcircle.com?subject=Refund%20Request';
        window.location.href = emailLink;
        showNotification('Opening email client to contact support', 'info');
    });
    
    // Add responsive navigation menu toggle for mobile
    const header = document.querySelector('header');
    const nav = document.querySelector('nav');
    
    const menuToggle = document.createElement('button');
    menuToggle.className = 'menu-toggle';
    menuToggle.innerHTML = '☰';
    menuToggle.style.display = 'none';
    menuToggle.style.background = 'none';
    menuToggle.style.border = 'none';
    menuToggle.style.fontSize = '24px';
    menuToggle.style.cursor = 'pointer';
    menuToggle.style.color = 'inherit';
    
    header.insertBefore(menuToggle, nav);
    
    // Mobile menu functionality
    function handleMobileMenu() {
        if (window.innerWidth <= 768) {
            menuToggle.style.display = 'block';
            nav.style.display = 'none';
            
            menuToggle.addEventListener('click', () => {
                nav.style.display = nav.style.display === 'none' ? 'block' : 'none';
            });
        } else {
            menuToggle.style.display = 'none';
            nav.style.display = 'block';
        }
    }
    
    // Initialize mobile menu and add resize listener
    handleMobileMenu();
    window.addEventListener('resize', handleMobileMenu);
    
    // Fix for the querySelector :contains selector
    // Using a workaround for the above code
    function findRefundProcessSection() {
        const headings = document.querySelectorAll('h3');
        for (let i = 0; i < headings.length; i++) {
            if (headings[i].textContent.includes('1.2 Refund Process')) {
                return headings[i];
            }
        }
        return null;
    }
    
    const refundProcessSectionFixed = findRefundProcessSection();
    if (refundProcessSectionFixed) {
        let targetElement = refundProcessSectionFixed.nextElementSibling;
        // Find the element after the list
        while (targetElement && targetElement.tagName === 'UL') {
            targetElement = targetElement.nextElementSibling;
        }
        
        if (targetElement) {
            targetElement.parentNode.insertBefore(contactButton, targetElement);
        }
    }
});
    </script>
</body>
</html>