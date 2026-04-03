<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Concert Circle - Ticket Purchase</title>
    <link rel="icon" href="LOGO for website (circular).png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700;900&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
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
    fbq('init', '1535253350790117');
    fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
    src="https://www.facebook.com/tr?id=1535253350790117&ev=PageView&noscript=1"
    /></noscript>
    <!-- End Meta Pixel Code -->
    <style>
        :root {
            --background: hsl(240, 10%, 8%);
            --foreground: hsl(0, 0%, 98%);
            --primary: hsl(280, 85%, 65%);
            --secondary: hsl(240, 10%, 16%);
            --accent: hsl(320, 70%, 60%);
            --concert-purple: hsl(280, 85%, 65%);
            --concert-pink: hsl(320, 70%, 60%);
            --concert-dark: hsl(240, 10%, 8%);
            --concert-card: hsl(240, 10%, 12%);
            --concert-border: hsl(240, 10%, 20%);
            --destructive: hsl(0, 62.8%, 60%);
            --muted: hsl(240, 5%, 65%);
            --border: hsl(240, 10%, 20%);
            --success: hsl(120, 60%, 50%);
            --warning: hsl(45, 90%, 60%);
        }

        body {
            font-family: 'Open Sans', sans-serif;
            background: linear-gradient(135deg, var(--concert-dark), var(--secondary), var(--concert-dark));
            background-size: 200% 200%;
            animation: gradient 15s ease infinite;
            color: var(--foreground);
            min-height: 100vh;
            overflow-x: hidden;
        }

        @keyframes gradient {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .svg-logo {
            height: 30px;
            width: auto;
            margin-right: 4px;
            transition: transform 0.3s ease;
        }

        .svg-logo:hover {
            transform: scale(1.1);
        }

        .logo-container {
            display: flex;
            align-items: center;
            flex: 0 0 auto;
        }

        .logo-text {
            font-family: 'Poppins', sans-serif;
            font-weight: 900;
            font-size: 1.5rem;
            letter-spacing: -0.02em;
            display: flex;
            align-items: center;
        }

        .logo-text .concert {
            color: var(--accent);
        }

        .logo-text .circle {
            color: var(--primary);
            margin-left: 0.25rem;
        }

        .container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 1.5rem;
        }

        header {
            position: sticky;
            top: 0;
            z-index: 50;
            padding: 1rem 0;
            background: hsla(240, 10%, 8%, 0.9);
            backdrop-filter: blur(10px);
            box-shadow: 0 2px 5px hsla(240, 10%, 8%, 0.3);
        }

        .header-content {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .menu-btn {
            background: var(--concert-card);
            border: 1px solid var(--concert-border);
            border-radius: 0.75rem;
            padding: 0.75rem;
            color: var(--foreground);
            cursor: pointer;
            transition: all 0.3s ease;
            display: none;
        }

        .menu-btn:hover {
            background: var(--accent);
            transform: scale(1.1);
        }

        .nav-container {
            display: flex;
            gap: 1.5rem;
        }

        .nav-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.75rem 1.25rem;
            border-radius: 0.75rem;
            text-decoration: none;
            color: var(--muted);
            font-weight: 600;
            font-size: 1.1rem;
            transition: all 0.3s ease;
        }

        .nav-item:hover {
            color: var(--foreground);
            background: hsla(280, 85%, 65%, 0.2);
            transform: translateY(-2px);
        }

        .nav-item.active {
            color: var(--destructive);
            background: hsla(0, 62.8%, 60%, 0.3);
            border: 1px solid var(--destructive);
        }

        .hero {
            padding: 3rem 0 2rem;
            text-align: center;
        }

        .hero-title {
            font-family: 'Poppins', sans-serif;
            font-size: 3rem;
            font-weight: 900;
            background: linear-gradient(135deg, var(--primary), var(--accent));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 1rem;
            text-shadow: 0 2px 4px hsla(240, 10%, 8%, 0.5);
        }

        .purchase-section {
            max-width: 600px;
            margin: 2rem auto;
            background: var(--concert-card);
            border: 1px solid var(--concert-border);
            border-radius: 1.5rem;
            padding: 2rem;
            animation: fadeInUp 0.6s ease forwards;
        }

        .ticket-option {
            margin-bottom: 1.5rem;
            padding: 1rem;
            border: 1px solid var(--concert-border);
            border-radius: 1rem;
            transition: all 0.3s ease;
        }

        .ticket-option:hover {
            border-color: var(--primary);
            transform: translateY(-5px);
            box-shadow: 0 10px 20px hsla(280, 85%, 65%, 0.2);
        }

        .ticket-name {
            font-family: 'Poppins', sans-serif;
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--foreground);
            margin-bottom: 0.5rem;
        }

        .ticket-price {
            font-family: 'Poppins', sans-serif;
            font-size: 1.3rem;
            color: var(--accent);
            margin-bottom: 1rem;
        }

        .ticket-details {
            color: var(--muted);
            font-size: 0.9rem;
            margin-bottom: 1rem;
        }

        .ticket-image {
            width: 100%;
            max-height: 200px;
            object-fit: cover;
            border-radius: 0.75rem;
            margin-bottom: 1rem;
        }

        .ticket-note {
            color: red;
            font-size: 0.9rem;
            margin-bottom: 1rem;
        }

        .purchase-button {
            width: 100%;
            background: linear-gradient(135deg, var(--accent), var(--primary));
            color: var(--concert-dark);
            padding: 1rem 2rem;
            border-radius: 12px;
            font-family: 'Poppins', sans-serif;
            font-weight: 700;
            font-size: 1rem;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            box-shadow: 0 8px 25px hsla(280, 85%, 65%, 0.3);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            border: none;
            cursor: pointer;
        }

        .purchase-button:hover {
            background: linear-gradient(135deg, var(--primary), var(--accent));
            transform: translateY(-2px) scale(1.02);
            box-shadow: 0 15px 35px hsla(280, 85%, 65%, 0.4);
        }

        .purchase-button:disabled {
            background: var(--muted);
            color: var(--concert-dark);
            cursor: not-allowed;
        }

        .popup-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.7);
            z-index: 100;
            align-items: center;
            justify-content: center;
        }

        .popup {
            background: var(--concert-card);
            border: 1px solid var(--concert-border);
            border-radius: 1.5rem;
            padding: 2rem;
            width: 90%;
            max-width: 500px;
            position: relative;
            animation: fadeInUp 0.3s ease forwards;
        }

        .popup-close {
            position: absolute;
            top: 1rem;
            right: 1rem;
            background: none;
            border: none;
            color: var(--muted);
            font-size: 1.5rem;
            cursor: pointer;
            transition: color 0.3s ease;
        }

        .popup-close:hover {
            color: var(--foreground);
        }

        .form-group {
            margin-bottom: 1rem;
        }

        .form-group label {
            display: block;
            font-family: 'Poppins', sans-serif;
            font-weight: 600;
            color: var(--foreground);
            margin-bottom: 0.5rem;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid var(--concert-border);
            border-radius: 0.75rem;
            background: var(--secondary);
            color: var(--foreground);
            font-size: 1rem;
            transition: border-color 0.3s ease;
        }

        .form-group input:focus,
        .form-group select:focus {
            border-color: var(--primary);
            outline: none;
        }

        .submit-btn {
            width: 100%;
            background: linear-gradient(135deg, var(--accent), var(--primary));
            color: var(--concert-dark);
            padding: 1rem;
            border: none;
            border-radius: 0.75rem;
            font-family: 'Poppins', sans-serif;
            font-weight: 700;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .submit-btn:hover {
            background: linear-gradient(135deg, var(--primary), var(--accent));
            transform: translateY(-2px);
        }

        .success-msg, .error-msg {
            display: none;
            text-align: center;
            padding: 1rem;
            border-radius: 0.75rem;
            margin-top: 1rem;
        }

        .success-msg {
            background: var(--success);
            color: var(--concert-dark);
        }

        .error-msg {
            background: var(--destructive);
            color: var(--foreground);
        }

        .bottom-nav {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            background: hsla(240, 10%, 8%, 0.95);
            backdrop-filter: blur(10px);
            display: none;
            justify-content: space-around;
            padding: 0.75rem 0;
            border-top: 1px solid var(--concert-border);
            z-index: 50;
        }

        .bottom-nav-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-decoration: none;
            color: var(--muted);
            font-size: 0.9rem;
            font-weight: 600;
            padding: 0.5rem;
            transition: all 0.3s ease;
        }

        .bottom-nav-item:hover {
            color: var(--foreground);
            background: hsla(280, 85%, 65%, 0.2);
            border-radius: 0.5rem;
        }

        .bottom-nav-item.active {
            color: var(--destructive);
            background: hsla(0, 62.8%, 60%, 0.3);
            border: 1px solid var(--destructive);
            border-radius: 0.5rem;
        }

        .bottom-nav-icon {
            width: 1.5rem;
            height: 1.5rem;
            margin-bottom: 0.25rem;
        }

        .bottom-nav-label {
            font-size: 0.8rem;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @media (min-width: 768px) {
            .svg-logo { height: 40px; }
            .logo-text { font-size: 2rem; }
            .hero-title { font-size: 3.5rem; }
            .popup { padding: 2.5rem; }
            .bottom-nav { display: flex; }
            body { padding-bottom: 80px; }
        }

        @media (min-width: 1024px) {
            .menu-btn { display: none; }
            .nav-container { display: flex; }
            .svg-logo { height: 50px; }
            .logo-text { font-size: 2.5rem; }
            .hero-title { font-size: 4rem; }
            .bottom-nav { display: none; }
            body { padding-bottom: 0; }
        }

        @media (max-width: 767px) {
            .menu-btn { display: block; }
            .nav-container { display: none; }
            .hero-title { font-size: 2.5rem; }
            .bottom-nav { display: flex; }
            body { padding-bottom: 80px; }
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <div class="header-content">
                <div class="logo-container">
                    <a href="index.php" style="text-decoration: none; color: inherit; display: flex; align-items: center;">
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
                            <circle cx="0" cy="0" r="35" stroke="url(#logoGradient)" stroke-width="2" fill="none" opacity="0.6" filter="url(#dynamicGlow)">
                              <animate attributeName="r" values="35;40;35" dur="4s" repeatCount="indefinite" />
                              <animate attributeName="opacity" values="0.6;0.4;0.6" dur="4s" repeatCount="indefinite" />
                            </circle>
                            <circle cx="0" cy="0" r="25" stroke="url(#logoGradient)" stroke-width="2" fill="none" opacity="0.8" filter="url(#dynamicGlow)">
                              <animate attributeName="r" values="25;30;25" dur="3s" repeatCount="indefinite" />
                              <animate attributeName="opacity" values="0.8;0.6;0.8" dur="3s" repeatCount="indefinite" />
                            </circle>
                            <circle cx="0" cy="0" r="15" stroke="url(#logoGradient)" stroke-width="2" fill="none" opacity="1" filter="url(#dynamicGlow)">
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
            <h1 class="hero-title">Ticket Purchase</h1>
        </div>
    </section>

    <div class="container">
        <div class="purchase-section">
            <div class="ticket-option">
                <h2 class="ticket-name">Standard Ticket</h2>
                <p class="ticket-price">₹4,800 - ₹5,000</p>
                <p class="ticket-details">General admission for Travis Scott: Circus Maximus Tour</p>
                <p class="ticket-note">*Prices may vary depending on the timing of the concert.</p>
                <img src="/img/s-1.png" alt="Standard Ticket" class="ticket-image">
                <button class="purchase-button" onclick="showForm('Standard')">Buy Now</button>
            </div>
            <div class="ticket-option">
                <h2 class="ticket-name">Gold Ticket</h2>
                <p class="ticket-price">₹22,000</p>
                <p class="ticket-details">Premium seating for Travis Scott: Circus Maximus Tour</p>
                <p class="ticket-note">*Prices may vary depending on the timing of the concert.</p>
                <img src="/img/s-1.png" alt="Gold Ticket" class="ticket-image">
                <button class="purchase-button" onclick="showForm('Gold')">Buy Now</button>
            </div>

            <div class="popup-overlay" id="popup-overlay">
                <div class="popup">
                    <button class="popup-close" onclick="closeForm()">&times;</button>
                    <h2 class="ticket-name">Purchase Form</h2>
                    <form id="ticketForm" method="POST" action="process_purchase.php">
                        <input type="hidden" id="ticketType" name="ticketType">
                        <div class="form-group">
                            <label for="fullName">Full Name</label>
                            <input type="text" id="fullName" name="fullName" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone Number</label>
                            <input type="tel" id="phone" name="phone" required>
                        </div>
                        <div class="form-group">
                            <label for="concertPlace">Concert Place</label>
                            <select id="concertPlace" name="concertPlace" required>
                                <option value="" disabled selected>Select a location</option>
                                <option value="Mumbai">Mumbai</option>
                                <option value="Delhi">Delhi</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="quantity">Quantity</label>
                            <select id="quantity" name="quantity" required>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select>
                        </div>
                        <button type="submit" class="submit-btn">Submit Purchase</button>
                        <div id="success-msg" class="success-msg">Thank you for your enquiry! We'll get back to you within 24 hours.</div>
                        <div id="error-msg" class="error-msg">Purchase failed. Please try again.</div>
                    </form>
                </div>
            </div>
        </div>
    </div>

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
                <path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21"></path>
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

    <script>
        function showForm(ticketType) {
            document.getElementById('ticketType').value = ticketType + " Ticket";
            document.getElementById('fullName').value = '';
            document.getElementById('email').value = '';
            document.getElementById('phone').value = '';
            document.getElementById('concertPlace').value = '';
            document.getElementById('quantity').value = '1';
            document.getElementById('success-msg').style.display = 'none';
            document.getElementById('error-msg').style.display = 'none';
            document.getElementById('popup-overlay').style.display = 'flex';
        }

        function closeForm() {
            document.getElementById('popup-overlay').style.display = 'none';
        }

        document.getElementById('ticketForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const form = this;
            const formData = new FormData(form);

            fetch(form.action, {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    document.getElementById('success-msg').style.display = 'block';
                    document.getElementById('error-msg').style.display = 'none';
                    setTimeout(closeForm, 2000);
                } else {
                    document.getElementById('error-msg').style.display = 'block';
                    document.getElementById('success-msg').style.display = 'none';
                }
            })
            .catch(() => {
                document.getElementById('error-msg').style.display = 'block';
                document.getElementById('success-msg').style.display = 'none';
            });
        });

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

        const urlParams = new URLSearchParams(window.location.search);
        if (urlParams.get('success')) {
            showForm('');
            document.getElementById('success-msg').style.display = 'block';
            setTimeout(closeForm, 2000);
        } else if (urlParams.get('error')) {
            showForm('');
            document.getElementById('error-msg').style.display = 'block';
        }
    </script>
</body>
</html>