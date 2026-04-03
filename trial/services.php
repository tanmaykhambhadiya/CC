<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="LOGO for website (circular).png" type="image/x-icon">
    <link rel="shortcut icon" href="LOGO for website (circular).png" type="image/x-icon">
    <title>Concert Circle - Our Services</title>
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
            overflow-x: hidden;
        }
        
        /* Header styles - reused from main page */
        header {
            background-color: rgba(0, 0, 0, 0.8);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            padding: 15px 0;
            position: fixed;
            width: 100%;
            z-index: 100;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
        }
        
        .header-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
        
        .logo-container {
            display: flex;
            align-items: center;
        }
        
        .logo {
            width: 50px;
            height: 50px;
            position: relative;
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
            border-color: #d269e6;
        }
        
        .circle-middle {
            border-color: #ff3131;
            transform: scale(0.85);
        }
        
        .circle-inner {
            border-color: #4ddde0;
            transform: scale(0.7);
        }
        
        .logo-text {
            font-weight: 900;
            font-size: 1.2rem;
            margin-left: 10px;
            color: #ffd700;
        }
        
        nav ul {
            display: flex;
            list-style: none;
            gap: 20px;
        }
        
        nav a {
            color: white;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s;
            padding: 8px 16px;
            border-radius: 25px;
        }
        
        nav a:hover {
            background-color: rgba(210, 105, 230, 0.3);
            color: #ffd700;
        }
        
        .user-menu {
            position: relative;
            cursor: pointer;
        }
        
        .user-icon {
            width: 40px;
            height: 40px;
            background-color: #d269e6;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
        }
        
        /* Services Page Specific Styles */
        .main-content {
            padding-top: 80px;
            min-height: 100vh;
        }
        
        .services-banner {
            background-color: #9933cc;
            padding: 15px 0;
            text-align: center;
            font-size: 2rem;
            font-weight: 700;
            overflow: hidden;
            position: relative;
        }
        
        .scrolling-text {
            white-space: nowrap;
            animation: scroll 30s linear infinite;
            display: inline-block;
            padding-right: 50px;
        }
        
        @keyframes scroll {
            0% { transform: translateX(0); }
            100% { transform: translateX(-50%); }
        }
        
        .services-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            grid-template-rows: auto auto;
            gap: 0;
        }
        
        .service-image-container {
            grid-column: 1;
            grid-row: 1 / span 2;
            padding: 20px;
            background: linear-gradient(135deg, #b368e6 0%, #9933cc 100%);
            display: grid;
            grid-template-columns: 1fr 1fr;
            grid-template-rows: 1fr 1fr;
            gap: 10px;
        }
        
        .service-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 8px;
        }
        
        .service-block {
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        
        .accommodation {
            background-color: #9933cc;
        }
        
        .travel {
            background-color: #b368e6;
        }
        
        .merch {
            background-color: #b368e6;
        }
        
        .community {
            background-color: #9933cc;
        }
        
        .service-title {
            font-size: 2rem;
            margin-bottom: 20px;
            text-transform: uppercase;
            font-weight: 700;
            letter-spacing: 2px;
        }
        
        .service-description {
            font-size: 1.1rem;
            line-height: 1.6;
        }
        
        /* Footer styles - reused from main page */
        footer {
            background-color: rgba(0, 0, 0, 0.9);
            padding: 60px 0 30px;
        }
        
        .footer-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 40px;
        }
        
        .footer-logo-container {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }
        
        .footer-logo {
            width: 40px;
            height: 40px;
            position: relative;
        }
        
        .footer-logo-text {
            font-weight: 900;
            font-size: 1.2rem;
            margin-left: 10px;
            color: #ffd700;
        }
        
        .footer-about {
            color: #bbb;
            line-height: 1.6;
            margin-bottom: 20px;
        }
        
        .social-links {
            display: flex;
            gap: 15px;
        }
        
        .social-link {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: rgba(255, 255, 255, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s;
        }
        
        .social-link:hover {
            background-color: #d269e6;
            transform: translateY(-3px);
        }
        
        .footer-title {
            font-size: 1.2rem;
            font-weight: bold;
            margin-bottom: 20px;
            color: #fff;
        }
        
        .footer-links {
            list-style: none;
        }
        
        .footer-links li {
            margin-bottom: 15px;
        }
        
        .footer-links a {
            color: #bbb;
            text-decoration: none;
            transition: all 0.3s;
        }
        
        .footer-links a:hover {
            color: #ffd700;
        }
        
        .copyright {
            text-align: center;
            color: #777;
            padding-top: 30px;
            margin-top: 40px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        /* Mobile menu */
        .mobile-menu-btn {
            display: none;
            background: none;
            border: none;
            color: white;
            font-size: 1.5rem;
            cursor: pointer;
        }
        
        @media (max-width: 900px) {
            nav {
                position: fixed;
                top: 80px;
                left: -100%;
                width: 250px;
                height: calc(100vh - 80px);
                background-color: rgba(0, 0, 0, 0.9);
                backdrop-filter: blur(10px);
                -webkit-backdrop-filter: blur(10px);
                transition: left 0.3s ease;
                padding: 20px;
                z-index: 1000;
            }
            
            nav.active {
                left: 0;
            }
            
            nav ul {
                flex-direction: column;
                gap: 15px;
            }
            
            .mobile-menu-btn {
                display: block;
            }
            
            .services-grid {
                grid-template-columns: 1fr;
                grid-template-rows: auto auto auto auto auto;
            }
            
            .service-image-container {
                grid-column: auto;
                grid-row: auto;
            }
            
            .service-block {
                padding: 30px 20px;
            }
            
            .service-title {
                font-size: 1.6rem;
            }
        }
        
        @media (max-width: 600px) {
            .service-image-container {
                grid-template-columns: 1fr;
                grid-template-rows: repeat(4, 1fr);
            }
            
            .service-title {
                font-size: 1.4rem;
            }
            
            .service-description {
                font-size: 1rem;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="header-container">
            <div class="logo-container">
                <div class="logo" role="img" aria-label="Concert Circle Logo">
                    <div class="circle circle-outer"></div>
                    <div class="circle circle-middle"></div>
                    <div class="circle circle-inner"></div>
                </div>
                <div class="logo-text">CONCERT CIRCLE</div>
            </div>
            
            <button class="mobile-menu-btn" aria-label="Toggle menu">☰</button>
            
            <nav>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="events.php">Events</a></li>
                    <li><a href="#communities.php">Communities</a></li>
                    <li><a href="services.php" class="active">Services</a></li>
                    <li><a href="aboutus.php">About</a></li>
                    <li><a href="contact.php">Contact</a></li>
                </ul>
            </nav>
            
            <div class="user-menu">
                <div class="user-icon">CC</div>
            </div>
        </div>
    </header>
    
    <main class="main-content">
        <!-- Top and Bottom Banner with Scrolling Text -->
        <div class="services-banner">
            <div class="scrolling-text">CORE OFFERINGS — CORE OFFERINGS — CORE OFFERINGS — CORE OFFERINGS — CORE OFFERINGS — CORE OFFERINGS — CORE OFFERINGS</div>
        </div>
        
        <!-- Services Grid -->
        <div class="services-grid">
            <!-- Left Column Images -->
            <div class="service-image-container">
                <img src="hotel-room.jpg" alt="Hotel room with bed" class="service-image">
                <img src="airplane-sunset.jpg" alt="Airplane flying at sunset" class="service-image">
                <img src="concert-tshirt.jpg" alt="Person wearing concert t-shirt" class="service-image">
                <img src="concert-friends.jpg" alt="Friends enjoying a concert together" class="service-image">
            </div>
            
            <!-- Accommodation Service -->
            <div class="service-block accommodation">
                <h2 class="service-title">ACCOMODATION</h2>
                <p class="service-description">Partnered hotels and hostels near concert locations.</p>
            </div>
            
            <!-- Travel Service -->
            <div class="service-block travel">
                <h2 class="service-title">TRAVEL & LOCAL LOGISTICS</h2>
                <p class="service-description">Air tickets, train bookings, and bus services to concert venues along with Venue shuttles, parking passes</p>
            </div>
            
            <!-- Merchandise Service -->
            <div class="service-block merch">
                <h2 class="service-title">EXCLUSIVE MERCH</h2>
                <p class="service-description">Exclusive artist merchandise like t-shirts, hoodies & masks.</p>
            </div>
            
            <!-- Community Service -->
            <div class="service-block community">
                <h2 class="service-title">SOCIAL COMMUNITY</h2>
                <p class="service-description">Connect with fellow fans to attend concerts together.</p>
            </div>
        </div>
        
        <!-- Bottom Banner with Scrolling Text -->
        <div class="services-banner">
            <div class="scrolling-text">CORE OFFERINGS — CORE OFFERINGS — CORE OFFERINGS — CORE OFFERINGS — CORE OFFERINGS — CORE OFFERINGS — CORE OFFERINGS</div>
        </div>
    </main>
    
    <footer>
        <div class="footer-container">
            <div>
                <div class="footer-logo-container">
                    <div class="logo footer-logo" role="img" aria-label="Concert Circle Logo">
                        <div class="circle circle-outer"></div>
                        <div class="circle circle-middle"></div>
                        <div class="circle circle-inner"></div>
                    </div>
                    <div class="footer-logo-text">CONCERT CIRCLE</div>
                </div>
                <p class="footer-about">Connecting music lovers across the globe to create unforgettable concert experiences together.</p>
                <div class="social-links">
                    <a href="#" class="social-link" aria-label="Facebook">f</a>
                    <a href="#" class="social-link" aria-label="Twitter">t</a>
                    <a href="#" class="social-link" aria-label="Instagram">i</a>
                    <a href="#" class="social-link" aria-label="YouTube">y</a>
                </div>
            </div>
            
            <div>
                <h3 class="footer-title">Company</h3>
                <ul class="footer-links">
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Careers</a></li>
                    <li><a href="#">Press</a></li>
                    <li><a href="#">Blog</a></li>
                </ul>
            </div>
            
            <div>
                <h3 class="footer-title">Resources</h3>
                <ul class="footer-links">
                    <li><a href="#">Help Center</a></li>
                    <li><a href="#">Community Guidelines</a></li>
                    <li><a href="#">Testimonials</a></li>
                    <li><a href="#">FAQ</a></li>
                </ul>
            </div>
            
            <div>
                <h3 class="footer-title">Legal</h3>
                <ul class="footer-links">
                    <li><a href="#">Terms of Service</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Cookie Policy</a></li>
                    <li><a href="#">Accessibility</a></li>
                </ul>
            </div>
        </div>
        
        <div class="copyright">
            <p>&copy; 2025 Concert Circle. All rights reserved.</p>
        </div>
    </footer>

    <script>
        // Mobile menu toggle
        const mobileMenuBtn = document.querySelector('.mobile-menu-btn');
        const nav = document.querySelector('nav');
        
        mobileMenuBtn.addEventListener('click', () => {
            nav.classList.toggle('active');
        });
        
        // Close mobile menu when clicking outside
        document.addEventListener('click', (e) => {
            if (!nav.contains(e.target) && !mobileMenuBtn.contains(e.target) && nav.classList.contains('active')) {
                nav.classList.remove('active');
            }
        });
    </script>
</body>
</html>