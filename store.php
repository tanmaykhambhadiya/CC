<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Concert Circle - Store</title>
    <link rel="icon" href="LOGO for website (circular).png" type="image/x-icon">
    <link rel="shortcut icon" href="LOGO for website (circular).png" type="image/x-icon">
    <link rel="icon" type="image/x-icon" href="LOGO for website (circular).png">
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
        fbq('init', '742867645193107');
        fbq('track', 'PageView');
        </script>
        <noscript><img height="1" width="1" style="display:none"
        src="https://www.facebook.com/tr?id=742867645193107&ev=PageView&noscript=1"
        /></noscript>
        <!-- End Meta Pixel Code -->
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

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
            animation: fadeInUp 1s ease forwards;
        }

        .hero-subtitle {
            font-size: 1.5rem;
            color: var(--muted);
            max-width: 700px;
            margin: 0 auto 2rem;
            line-height: 1.6;
            animation: fadeInUp 1.2s ease forwards 0.2s;
            opacity: 0;
        }

        .section-header {
            text-align: center;
            margin: 3rem 0 2rem;
        }

        .section-title {
            font-family: 'Poppins', sans-serif;
            font-size: 2.5rem;
            font-weight: 900;
            background: linear-gradient(135deg, var(--warning), var(--accent));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 0.5rem;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        .section-subtitle {
            color: var(--muted);
            font-size: 1.1rem;
            max-width: 600px;
            margin: 0 auto;
        }

        .products-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            margin: 2rem 0;
        }

        .product-card {
            background: var(--concert-card);
            border: 1px solid var(--concert-border);
            border-radius: 1.5rem;
            padding: 1.5rem;
            transition: all 0.4s ease;
            animation: fadeInUp 0.6s ease forwards;
            position: relative;
            overflow: hidden;
        }

        .product-card:hover {
            border-color: var(--primary);
            transform: translateY(-8px);
            box-shadow: 0 20px 40px hsla(280, 85%, 65%, 0.3);
        }

        .product-card::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: conic-gradient(from 0deg, transparent, var(--accent), transparent);
            opacity: 0;
            transition: opacity 0.4s ease;
            animation: rotate 10s linear infinite;
        }

        .product-card:hover::before {
            opacity: 0.1;
        }

        .product-content {
            position: relative;
            z-index: 2;
        }

        .product-image {
            width: 100%;
            height: 200px;
            border-radius: 1rem;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 2px solid var(--concert-border);
            transition: all 0.3s ease;
        }

        .product-card:hover .product-image {
            border-color: var(--primary);
            transform: scale(1.02);
        }

        .product-name {
            font-family: 'Poppins', sans-serif;
            font-size: 1.3rem;
            font-weight: 700;
            color: var(--foreground);
            margin-bottom: 0.5rem;
        }

        .product-description {
            color: var(--muted);
            font-size: 0.9rem;
            margin-bottom: 1rem;
            line-height: 1.5;
        }

        .product-price {
            font-family: 'Poppins', sans-serif;
            font-size: 1.5rem;
            font-weight: 900;
            color: var(--accent);
            margin-bottom: 1rem;
        }

        .product-status {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem 1rem;
            border-radius: 25px;
            font-weight: 600;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 1rem;
        }

        .status-dropping {
            background: linear-gradient(135deg, var(--warning), var(--accent));
            color: var(--concert-dark);
        }

        .status-coming {
            background: linear-gradient(135deg, var(--primary), var(--accent));
            color: var(--concert-dark);
        }

        .product-button {
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
            position: relative;
            overflow: hidden;
            box-shadow: 0 8px 25px hsla(280, 85%, 65%, 0.3);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            border: none;
            cursor: pointer;
        }

        .product-button::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            transition: left 0.6s ease;
        }

        .product-button:hover::before {
            left: 100%;
        }

        .product-button:hover {
            background: linear-gradient(135deg, var(--primary), var(--accent));
            transform: translateY(-2px) scale(1.02);
            box-shadow: 0 15px 35px hsla(280, 85%, 65%, 0.4);
        }

        .product-button:disabled {
            background: var(--muted);
            color: var(--concert-dark);
            cursor: not-allowed;
            transform: none;
            box-shadow: none;
        }

        .coming-soon-section {
            background: hsla(280, 85%, 65%, 0.1);
            border: 1px solid var(--concert-border);
            border-radius: 1.5rem;
            padding: 2.5rem;
            margin: 3rem 0;
            text-align: center;
        }

        .coming-soon-title {
            font-family: 'Poppins', sans-serif;
            font-size: 2rem;
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 1rem;
        }

        .coming-soon-text {
            color: var(--muted);
            font-size: 1.1rem;
            margin-bottom: 2rem;
        }

        .notify-btn {
            background: linear-gradient(135deg, var(--primary), var(--accent));
            color: var(--concert-dark);
            padding: 1rem 2rem;
            border-radius: 12px;
            font-family: 'Poppins', sans-serif;
            font-weight: 700;
            font-size: 1.1rem;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            cursor: pointer;
        }

        .notify-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px hsla(280, 85%, 65%, 0.4);
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

        .popup-title {
            font-family: 'Poppins', sans-serif;
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 1rem;
            text-align: center;
        }

        .popup-form {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .popup-form input {
            padding: 0.75rem;
            border: 1px solid var(--concert-border);
            border-radius: 0.5rem;
            background: var(--secondary);
            color: var(--foreground);
            font-size: 1rem;
            outline: none;
            transition: border-color 0.3s ease;
        }

        .popup-form input:focus {
            border-color: var(--primary);
        }

        .popup-form input.error {
            border-color: var(--destructive);
        }

        .popup-form .error-message {
            color: var(--destructive);
            font-size: 0.9rem;
            margin-top: -0.5rem;
            display: none;
        }

        .popup-form button {
            background: linear-gradient(135deg, var(--accent), var(--primary));
            color: var(--concert-dark);
            padding: 1rem;
            border: none;
            border-radius: 0.5rem;
            font-family: 'Poppins', sans-serif;
            font-weight: 700;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.3s ease;
            text-transform: uppercase;
        }

        .popup-form button:hover {
            background: linear-gradient(135deg, var(--primary), var(--accent));
            transform: translateY(-2px);
        }

        .popup-form button:disabled {
            background: var(--muted);
            cursor: not-allowed;
        }

        @media (min-width: 768px) {
            .container {
                padding: 0 2rem;
            }

            .svg-logo {
                height: 40px;
            }

            .logo-text {
                font-size: 2rem;
            }

            .hero-title {
                font-size: 3.5rem;
            }

            .hero-subtitle {
                font-size: 1.8rem;
            }

            .products-grid {
                grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
                gap: 2.5rem;
            }

            .bottom-nav {
                display: flex;
            }

            body {
                padding-bottom: 80px;
            }
        }

        @media (min-width: 1024px) {
            .menu-btn {
                display: none;
            }

            .nav-container {
                display: flex;
            }

            .svg-logo {
                height: 50px;
            }

            .logo-text {
                font-size: 2.5rem;
            }

            .hero-title {
                font-size: 4rem;
            }

            .hero-subtitle {
                font-size: 2rem;
            }

            .products-grid {
                grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
                gap: 3rem;
            }

            .bottom-nav {
                display: none;
            }

            body {
                padding-bottom: 0;
            }
        }

        @media (max-width: 767px) {
            .menu-btn {
                display: block;
            }

            .nav-container {
                display: none;
            }

            .hero-title {
                font-size: 2.5rem;
            }

            .hero-subtitle {
                font-size: 1.2rem;
            }

            .section-title {
                font-size: 2rem;
            }

            .products-grid {
                grid-template-columns: 1fr;
                gap: 1.5rem;
            }

            .bottom-nav {
                display: flex;
            }

            body {
                padding-bottom: 80px;
            }
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

        @keyframes rotate {
            from {
                transform: rotate(0deg);
            }
            to {
                transform: rotate(360deg);
            }
        }

        @keyframes pulse {
            0%, 100% {
                opacity: 1;
            }
            50% {
                opacity: 0.7;
            }
        }

        .pulse {
            animation: pulse 2s infinite;
        }
    </style>
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
            <h1 class="hero-title">Exclusive Store</h1>
            <p class="hero-subtitle">Wear it. Own it. Flex it</p>
        </div>
    </section>

    <div class="container">
        <!-- Tickets Section -->
        <div class="section-header">
            <h2 class="section-title">🎫 Tickets On Sale</h2>
            <p class="section-subtitle">Secure your spot for an unforgettable experience</p>
        </div>

        <div class="products-grid">
            <div class="product-card">
                <div class="product-content">
                    <img src="/img/s-1.png" alt="Standard Ticket" class="product-image">
                    <h3 class="product-name">Standard Ticket</h3>
                    <p class="product-description">General admission for Travis Scott: Circus Maximus Tour</p>
                    <div class="product-price">₹4,800 - ₹5,000</div>
                    <button class="product-button" onclick="window.location.href='ticket_purchase.php'">Buy Now</button>
                </div>
            </div>

            <div class="product-card">
                <div class="product-content">
                    <img src="/img/s-1.png" alt="Gold Ticket" class="product-image">
                    <h3 class="product-name">Gold Ticket</h3>
                    <p class="product-description">Premium seating for Travis Scott: Circus Maximus Tour</p>
                    <div class="product-price">₹23,000</div>
                    <button class="product-button" onclick="window.location.href='ticket_purchase.php'">Buy Now</button>
                </div>
            </div>
        </div>

        <!-- Dropping Soon Section -->
        <div class="section-header">
            <h2 class="section-title">🔥 Dropping Soon</h2>
            <p class="section-subtitle">Get ready for our hottest new releases - limited edition drops you won't want to miss</p>
        </div>

        <div class="products-grid">
            <div class="product-card">
                <div class="product-content">
                    <img src="/img/s-2.png" alt="Travis Scott Printed Exclusive Drop" class="product-image">
                    <h3 class="product-name">Travis Scott Printed Exclusive Drop</h3>
                    <p class="product-description">Limited edition Travis Scott-themed apparel</p>
                    <div class="product-price">₹999</div>
                    <div class="product-status status-coming">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="12" cy="12" r="10"></circle>
                            <polyline points="12,6 12,12 16,14"></polyline>
                        </svg>
                        Dropping soon
                    </div>
                    <button class="product-button notify-btn" data-product="Travis Scott Printed Exclusive Drop">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="12" cy="12" r="10"></circle>
                            <polyline points="12,6 12,12 16,14"></polyline>
                        </svg>
                        Notify Me
                    </button>
                </div>
            </div>

            <div class="product-card">
                <div class="product-content">
                    <img src="/img/s-3.png" alt="Circus Maximus Stadium Tour Merch" class="product-image">
                    <h3 class="product-name">Circus Maximus Stadium Tour Merch</h3>
                    <p class="product-description">Exclusive merchandise from the Circus Maximus Tour</p>
                    <div class="product-price">₹999</div>
                    <div class="product-status status-coming">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="12" cy="12" r="10"></circle>
                            <polyline points="12,6 12,12 16,14"></polyline>
                        </svg>
                        Dropping soon
                    </div>
                    <button class="product-button notify-btn" data-product="Circus Maximus Stadium Tour Merch">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="12" cy="12" r="10"></circle>
                            <polyline points="12,6 12,12 16,14"></polyline>
                        </svg>
                        Notify Me
                    </button>
                </div>
            </div>

            <div class="product-card">
                <div class="product-content">
                    <img src="/img/s3.png" alt="Circle Headphones" class="product-image">
                    <h3 class="product-name">Circle Headphones</h3>
                    <p class="product-description">Premium wireless headphones with Concert Circle branding</p>
                    <div class="product-price">₹8,999</div>
                    <div class="product-status status-coming">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="12" cy="12" r="10"></circle>
                            <polyline points="12,6 12,12 16,14"></polyline>
                        </svg>
                        Dropping soon
                    </div>
                    <button class="product-button notify-btn" data-product="Circle Headphones">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="12" cy="12" r="10"></circle>
                            <polyline points="12,6 12,12 16,14"></polyline>
                        </svg>
                        Notify Me
                    </button>
                </div>
            </div>
        </div>

        <!-- Newsletter Signup Section -->
        <div class="coming-soon-section">
            <h2 class="coming-soon-title">🔔 Never Miss a Drop</h2>
            <p class="coming-soon-text">
                Be the first to know when our exclusive merch drops go live. Get early access, special discounts, and insider updates straight to your inbox.
            </p>
            <button class="notify-btn" id="open-popup">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                    <polyline points="22,6 12,13 2,6"></polyline>
                </svg>
                Join The Circle
            </button>
        </div>

        <!-- Pop-up Form -->
        <div class="popup-overlay" id="popup-overlay">
            <div class="popup">
                <button class="popup-close" id="close-popup">&times;</button>
                <h2 class="popup-title">Join The Circle</h2>
                <form class="popup-form" id="subscribe-form" action="subscribe.php" method="POST">
                    <input type="hidden" id="product" name="product" value="">
                    <div>
                        <input type="text" id="name" name="name" placeholder="Full Name" required>
                        <span class="error-message" id="name-error">Please enter a valid name</span>
                    </div>
                    <div>
                        <input type="email" id="email" name="email" placeholder="Email Address" required>
                        <span class="error-message" id="email-error">Please enter a valid email address</span>
                    </div>
                    <div>
                        <input type="tel" id="phone" name="phone" placeholder="Phone Number" required>
                        <span class="error-message" id="phone-error">Please enter a valid phone number</span>
                    </div>
                    <button type="submit" id="submit-btn">Subscribe</button>
                </form>
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
        // Set active navigation item based on current page
        document.addEventListener('DOMContentLoaded', function() {
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

            // Existing popup functionality
            const popupOverlay = document.getElementById('popup-overlay');
            const openPopupBtn = document.getElementById('open-popup');
            const closePopupBtn = document.getElementById('close-popup');
            const subscribeForm = document.getElementById('subscribe-form');
            const submitBtn = document.getElementById('submit-btn');
            const productInput = document.getElementById('product');
            const notifyButtons = document.querySelectorAll('.product-button.notify-btn');

            // Open pop-up for "Join The Circle" button
            openPopupBtn.addEventListener('click', () => {
                productInput.value = '';
                popupOverlay.style.display = 'flex';
            });

            // Open pop-up for "Notify Me" buttons
            notifyButtons.forEach(button => {
                button.addEventListener('click', () => {
                    const productName = button.getAttribute('data-product');
                    productInput.value = productName;
                    popupOverlay.style.display = 'flex';
                });
            });

            // Close pop-up
            closePopupBtn.addEventListener('click', () => {
                popupOverlay.style.display = 'none';
                subscribeForm.reset();
                clearErrors();
            });

            popupOverlay.addEventListener('click', (e) => {
                if (e.target === popupOverlay) {
                    popupOverlay.style.display = 'none';
                    subscribeForm.reset();
                    clearErrors();
                }
            });

            // Form validation
            function validateForm() {
                let isValid = true;
                clearErrors();

                const name = document.getElementById('name').value.trim();
                const email = document.getElementById('email').value.trim();
                const phone = document.getElementById('phone').value.trim();

                if (!/^[A-Za-z\s]{2,}$/.test(name)) {
                    showError('name', 'Please enter a valid name (letters and spaces only, min 2 characters)');
                    isValid = false;
                }

                if (!/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/.test(email)) {
                    showError('email', 'Please enter a valid email address');
                    isValid = false;
                }

                if (!/^\+?\d{10,15}$/.test(phone)) {
                    showError('phone', 'Please enter a valid phone number (10-15 digits)');
                    isValid = false;
                }

                return isValid;
            }

            function showError(fieldId, message) {
                const field = document.getElementById(fieldId);
                const error = document.getElementById(`${fieldId}-error`);
                field.classList.add('error');
                error.style.display = 'block';
                error.textContent = message;
            }

            function clearErrors() {
                ['name', 'email', 'phone'].forEach(fieldId => {
                    const field = document.getElementById(fieldId);
                    const error = document.getElementById(`${fieldId}-error`);
                    field.classList.remove('error');
                    error.style.display = 'none';
                });
            }

            // Form submission
            subscribeForm.addEventListener('submit', async (e) => {
                e.preventDefault();
                if (!validateForm()) return;

                submitBtn.disabled = true;
                submitBtn.textContent = 'Subscribing...';

                try {
                    const formData = new FormData(subscribeForm);
                    const response = await fetch('subscribe.php', {
                        method: 'POST',
                        body: formData
                    });
                    const result = await response.json();

                    if (result.success) {
                        subscribeForm.reset();
                        popupOverlay.style.display = 'none';
                        const button = productInput.value ? 
                            Array.from(notifyButtons).find(btn => btn.getAttribute('data-product') === productInput.value) : 
                            openPopupBtn;
                        button.innerHTML = `
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M20 6L9 17l-5-5"></path>
                            </svg>
                            ${productInput.value ? 'Notified!' : 'Welcome to the Circle!'}
                        `;
                        button.style.background = 'linear-gradient(135deg, var(--success), var(--primary))';
                        setTimeout(() => {
                            button.innerHTML = `
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    ${productInput.value ? 
                                        '<circle cx="12" cy="12" r="10"></circle><polyline points="12,6 12,12 16,14"></polyline>' : 
                                        '<path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline>'
                                    }
                                </svg>
                                ${productInput.value ? 'Notify Me' : 'Join The Circle'}
                            `;
                            button.style.background = 'linear-gradient(135deg, var(--accent), var(--primary))';
                        }, 3000);
                    } else {
                        alert(result.message || 'An error occurred. Please try again.');
                    }
                } catch (error) {
                    alert('An error occurred. Please try again.');
                } finally {
                    submitBtn.disabled = false;
                    submitBtn.textContent = 'Subscribe';
                }
            });

            // Add scroll animations
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.animationPlayState = 'running';
                    }
                });
            }, observerOptions);

            document.querySelectorAll('.product-card').forEach(card => {
                observer.observe(card);
            });
        });
    </script>
</body>
</html>