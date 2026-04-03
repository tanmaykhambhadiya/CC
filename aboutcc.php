<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Concert Circle - About Us</title>
    <link rel="icon" href="LOGO for website (circular).png" type="image/x-icon">
    <link rel="shortcut icon" href="LOGO for website (circular).png" type="image/x-icon">
    <link rel="icon" type="image/x-icon" href="LOGO for website (circular).png">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700;900&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
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
            padding: 3rem 0;
            text-align: center;
        }

        .hero-title {
            font-family: 'Poppins', sans-serif;
            font-size: 3rem;
            font-weight: 900;
            color: var(--foreground);
            margin-bottom: 1rem;
            text-shadow: 0 2px 4px hsla(240, 10%, 8%, 0.5);
            animation: fadeInUp 1s ease forwards;
        }

        .hero-subtitle {
            font-size: 1.5rem;
            color: var(--muted);
            max-width: 700px;
            margin: 0 auto 3rem;
            line-height: 1.6;
            animation: fadeInUp 1.2s ease forwards 0.2s;
            opacity: 0;
        }

        .content-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 3rem;
            margin-bottom: 3rem;
        }

        .section-card {
            background: var(--concert-card);
            border: 1px solid var(--concert-border);
            border-radius: 1.5rem;
            padding: 2.5rem;
            transition: all 0.4s ease;
            animation: fadeInUp 0.6s ease forwards;
        }

        .section-card:hover {
            border-color: var(--primary);
            transform: translateY(-5px);
            box-shadow: 0 15px 30px hsla(280, 85%, 65%, 0.2);
        }

        .section-card:nth-child(1) { animation-delay: 0.1s; }
        .section-card:nth-child(2) { animation-delay: 0.2s; }
        .section-card:nth-child(3) { animation-delay: 0.3s; }

        .section-title {
            font-family: 'Poppins', sans-serif;
            font-size: 2rem;
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .section-icon {
            width: 2rem;
            height: 2rem;
            color: var(--accent);
        }

        .section-content {
            line-height: 1.8;
            color: var(--foreground);
            font-size: 1.1rem;
        }

        .mission-text {
            font-size: 1.3rem;
            color: var(--accent);
            font-weight: 600;
            margin-bottom: 1.5rem;
            text-align: center;
        }

        .features-list {
            display: grid;
            grid-template-columns: 1fr;
            gap: 1rem;
            margin: 1.5rem 0;
        }

        .feature-item {
            display: flex;
            align-items: flex-start;
            gap: 0.75rem;
            padding: 1rem;
            background: var(--secondary);
            border-radius: 0.75rem;
            transition: all 0.3s ease;
        }

        .feature-item:hover {
            background: hsla(280, 85%, 65%, 0.1);
            transform: translateX(5px);
        }

        .feature-bullet {
            width: 1.5rem;
            height: 1.5rem;
            background: linear-gradient(135deg, var(--accent), var(--primary));
            border-radius: 50%;
            flex-shrink: 0;
            margin-top: 0.2rem;
        }

        .feature-text {
            flex: 1;
        }

        .feature-title {
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 0.25rem;
        }

        .policy-item {
            background: var(--secondary);
            border-radius: 0.75rem;
            padding: 1rem;
            margin-bottom: 0.75rem;
            border-left: 4px solid var(--accent);
            transition: all 0.3s ease;
            display: flex;
            flex-direction: column;
        }

        .policy-item:hover {
            background: hsla(280, 85%, 65%, 0.1);
            transform: translateX(5px);
        }

        .policy-title {
            font-family: 'Poppins', sans-serif;
            font-weight: 700;
            color: var(--primary);
            font-size: 1.2rem;
            margin-bottom: 0.5rem;
        }

        .policy-details {
            color: var(--foreground);
            line-height: 1.6;
            margin-left: 0.5rem;
        }

        .policy-details ul {
            list-style-type: none;
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .policy-details li {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 0;
        }

        .policy-details li::before {
            content: "•";
            color: var(--accent);
            font-size: 1.2rem;
            margin-right: 0.5rem;
        }

        .contact-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 1.5rem;
            margin-top: 2rem;
        }

        .contact-item {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 1.5rem;
            background: var(--secondary);
            border-radius: 1rem;
            transition: all 0.3s ease;
        }

        .contact-item:hover {
            background: hsla(280, 85%, 65%, 0.1);
            transform: translateY(-3px);
        }

        .contact-icon {
            width: 2.5rem;
            height: 2.5rem;
            color: var(--accent);
            flex-shrink: 0;
        }

        .contact-info h4 {
            font-family: 'Poppins', sans-serif;
            font-weight: 600;
            color: var(--primary);
            margin-bottom: 0.25rem;
        }

        .contact-info p {
            color: var(--muted);
        }

        .contact-info a {
            color: var(--accent);
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .contact-info a:hover {
            color: var(--primary);
        }

        .cta-section {
            text-align: center;
            padding: 3rem 0;
            background: hsla(280, 85%, 65%, 0.1);
            border-radius: 1.5rem;
            margin: 3rem 0;
            border: 1px solid var(--concert-border);
        }

        .cta-title {
            font-family: 'Poppins', sans-serif;
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--foreground);
            margin-bottom: 1rem;
        }

        .cta-subtitle {
            font-size: 1.2rem;
            color: var(--muted);
            margin-bottom: 2rem;
        }

        .cta-button {
            background: linear-gradient(135deg, var(--accent), var(--primary));
            color: var(--concert-dark);
            padding: 1.25rem 3rem;
            border-radius: 12px;
            font-family: 'Poppins', sans-serif;
            font-weight: 700;
            font-size: 1.3rem;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.75rem;
            position: relative;
            overflow: hidden;
            box-shadow: 0 8px 25px hsla(280, 85%, 65%, 0.4);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            border: 2px solid transparent;
            touch-action: manipulation;
            -webkit-tap-highlight-color: transparent;
            user-select: none;
        }

        .cta-button::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            transition: left 0.6s ease;
        }

        .cta-button:hover::before {
            left: 100%;
        }

        .cta-button:hover {
            background: linear-gradient(135deg, var(--primary), var(--accent));
            transform: translateY(-3px) scale(1.05);
            box-shadow: 0 15px 35px hsla(280, 85%, 65%, 0.5);
            border-color: var(--foreground);
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

            .content-grid {
                grid-template-columns: 1fr;
                gap: 2rem;
            }

            .features-list {
                grid-template-columns: 1fr;
            }

            .contact-grid {
                grid-template-columns: repeat(2, 1fr);
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

            .content-grid {
                grid-template-columns: 1fr;
                gap: 3rem;
            }

            .features-list {
                grid-template-columns: 1fr;
            }

            .contact-grid {
                grid-template-columns: repeat(4, 1fr);
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
                font-size: 1.5rem;
            }

            .section-content {
                font-size: 1rem;
            }

            .cta-button {
                padding: 1rem 2rem;
                font-size: 1rem;
            }

            .bottom-nav {
                display: flex;
            }

            body {
                padding-bottom: 80px;
            }
        }
        
        @media (max-width: 767px) {
            .hero-title { font-size: 1.8rem; }
            .hero-subtitle { font-size: 1rem; }
            .section-title { font-size: 1.2rem; }
            .section-content { font-size: 0.9rem; }
            .mission-text { font-size: 1.1rem; }
            .policy-title { font-size: 1rem; }
            .policy-details { font-size: 0.85rem; }
            .contact-info h4 { font-size: 0.9rem; }
            .contact-info p { font-size: 0.8rem; }
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
            <h1 class="hero-title">About Us</h1>
        </div>
    </section>

    <div class="container">
        <div class="content-grid">
            <!-- About Us Section -->
            <div class="section-card">
                <h2 class="section-title">
                    The Drip behind Concert Circle
                </h2>
                <div style="background: var(--concert-card); border-left: 4px solid var(--accent); border-radius: 0 1rem 1rem 0; padding: 2rem; margin: 2rem 0;">
                    <p style="font-size: 1.2rem; line-height: 1.7; color: var(--foreground); margin-bottom: 1.5rem;">
                        As a regular concert junkie, I lived through the chaos of booking tickets on one app, finding flights on another, figuring out stays last minute, and missing out on the real vibe. The whole concert experience felt disjointed and messy.
                    </p>
                    <p style="font-size: 1.2rem; line-height: 1.7; color: var(--foreground); margin-bottom: 1.5rem;">
                        So I built <strong style="color: var(--primary);">Concert Circle</strong> — a platform that brings it all together.
                    </p>
                    <p style="font-size: 1.2rem; line-height: 1.7; color: var(--foreground); margin-bottom: 1.5rem;">
                        From travel, stay, and local rides to curated experiences, exclusive merch drops, and a tribe we call your "Circle" 
                    </p>
                    <p style="font-size: 1.3rem; font-weight: 700; color: var(--accent); margin-bottom: 0.5rem;">
                        You just show up and vibe.
                    </p>
                    <p style="font-size: 1.3rem; font-weight: 700; color: var(--primary);">
                        We handle the rest.
                    </p>
                    
                    <p style="font-size: 1.2rem; line-height: 1.7; color: var(--foreground); margin-bottom: 1.5rem;">
                        ~ Atri Patel
                    </p>
                </div>
            </div>

            <!-- Policies Section -->
            <div class="section-card">
                <h2 class="section-title">
                    <svg class="section-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                        <polyline points="14,2 14,8 20,8"></polyline>
                        <line x1="16" y1="13" x2="8" y2="13"></line>
                        <line x1="16" y1="17" x2="8" y2="17"></line>
                        <polyline points="10,9 9,9 8,9"></polyline>
                    </svg>
                    Policies
                </h2>
                <div class="section-content">
                    <div class="policy-item">
                        <div class="policy-title">Booking Policy</div>
                        <div class="policy-details">
                            <ul>
                                <li>Full payment required within 48 hours of booking confirmation</li>
                                <li>Your tickets, passes and everything will be shared within 2-3 hours of payment</li>
                            </ul>
                        </div>
                    </div>
                    <div class="policy-item">
                        <div class="policy-title">Cancellation Policy</div>
                        <div class="policy-details">
                            <ul>
                                <li>50% refund if cancelled 24 hours before event</li>
                                <li>80% refund if cancelled 6 days before event</li>
                                <li>Full refund guaranteed for cancellations made at least 7 days before the event</li>
                            </ul>
                        </div>
                    </div>
                    <div class="policy-item">
                        <div class="policy-title">Important Notes</div>
                        <div class="policy-details">
                            <ul>
                                <li>Valid ID required for all travelers</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contact Section -->
<div class="section-card">
    <h2 class="section-title">
        <svg class="section-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
        </svg>
        Get in Touch
    </h2>
    <div class="section-content">
        <p style="margin-bottom: 2rem;">Have questions about Concert Circle? Want to collaborate? Reach out to us - we'd love to hear from you!</p>
        <div class="contact-grid">
            <div class="contact-item">
                <svg class="contact-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                    <polyline points="22,6 12,13 2,6"></polyline>
                </svg>
                <div class="contact-info">
                    <h4>Email</h4>
                    <p><a href="mailto:info@concertcircle.com">info@concertcircle.com</a></p>
                </div>
            </div>
            <div class="contact-item">
                <svg class="contact-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect>
                    <path d="m8 11 2 2 4-4"></path>
                </svg>
                <div class="contact-info">
                    <h4>Instagram</h4>
                    <p><a href="https://instagram.com/concertcircle" target="_blank">@concertcircle</a></p>
                </div>
            </div>
          
            <div class="contact-item">
                <svg class="contact-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                </svg>
                <div class="contact-info">
                    <h4>Contact Number</h4>
                    <p><a href="tel:+911234567890">+91 84010 89266</a></p>
                </div>
            </div>
            <div class="contact-item">
                <svg class="contact-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <circle cx="12" cy="12" r="10"></circle>
                    <polyline points="12,6 12,12 16,14"></polyline>
                </svg>
                <div class="contact-info">
                    <h4>Response Time</h4>
                    <p>Within 24-48 hours</p>
                </div>
            </div>
        </div>
    </div>
</div>

        <!-- Call to Action Section -->
        <div class="cta-section">
            <h2 class="cta-title">Ready to Experience Music Like Never Before?</h2>
            <p class="cta-subtitle">Join thousands of music lovers who have discovered their next favorite concert through Concert Circle</p>
            <a href="packages.php" class="cta-button">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"></path>
                </svg>
                Explore Packages
            </a>
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
    </script>
</body>
</html>