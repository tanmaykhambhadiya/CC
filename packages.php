<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Concert Circle - Experience Packages</title>
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
            --yellow-accent: hsl(45, 100%, 50%);
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

        .packages-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        .package-card {
            background: var(--concert-card);
            border: 1px solid var(--concert-border);
            border-radius: 1.5rem;
            overflow: hidden;
            transition: all 0.4s ease;
            cursor: pointer;
            display: flex;
            flex-direction: column;
            min-height: 400px;
            animation: fadeInUp 0.6s ease forwards;
        }

        .package-card:nth-child(1) { animation-delay: 0.1s; }
        .package-card:nth-child(2) { animation-delay: 0.2s; }
        .package-card:nth-child(3) { animation-delay: 0.3s; }
        .package-card:nth-child(4) { animation-delay: 0.4s; }
        .package-card:nth-child(5) { animation-delay: 0.5s; }

        .package-card:hover {
            border-color: var(--primary);
            transform: translateY(-10px) scale(1.03);
            box-shadow: 0 15px 30px hsla(280, 85%, 65%, 0.3);
        }

        .card-image {
            position: relative;
            width: 100%;
            height: 200px;
            overflow: hidden;
        }

        .package-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.7s ease;
        }

        .package-card:hover .package-image {
            transform: scale(1.15);
        }

        .package-content {
            padding: 1.5rem;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            text-align: left;
        }

        .package-name {
            font-family: 'Poppins', sans-serif;
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 0.5rem;
        }

        .package-details {
            font-size: 0.9rem;
            color: var(--muted);
            margin-bottom: 1rem;
            line-height: 1.5;
        }

        .package-details ul {
            list-style-type: disc;
            padding-left: 1.5rem;
        }

        .package-details li {
            margin-bottom: 0.3rem;
        }

        .package-price {
            font-family: 'Poppins', sans-serif;
            font-size: 1.1rem;
            font-weight: 600;
            color: var(--yellow-accent);
            margin-bottom: 1rem;
        }

        .book-button {
            background: linear-gradient(135deg, var(--yellow-accent), hsl(45, 90%, 45%));
            color: var(--concert-dark);
            padding: 0.8rem 1.5rem;
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
            box-shadow: 0 8px 25px hsla(45, 100%, 50%, 0.4);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            text-transform: uppercase;
            letter-spacing: 0.3px;
            border: 2px solid transparent;
            touch-action: manipulation;
            -webkit-tap-highlight-color: transparent;
            user-select: none;
        }

        .book-button::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            transition: left 0.6s ease;
        }

        .book-button:hover::before {
            left: 100%;
        }

        .book-button:hover {
            background: linear-gradient(135deg, hsl(45, 90%, 45%), var(--yellow-accent));
            transform: translateY(-3px) scale(1.05);
            box-shadow: 0 15px 35px hsla(45, 100%, 50%, 0.5);
            border-color: var(--foreground);
        }

        .book-button:active {
            transform: translateY(-1px) scale(1.02);
            box-shadow: 0 8px 20px hsla(45, 100%, 50%, 0.4);
        }

        .book-button.urgent {
            animation: urgent-pulse 2s infinite;
            background: linear-gradient(135deg, var(--destructive), hsl(0, 80%, 55%));
            box-shadow: 0 8px 25px hsla(0, 62.8%, 60%, 0.4);
        }

        .book-button.urgent:hover {
            background: linear-gradient(135deg, hsl(0, 80%, 55%), var(--destructive));
            box-shadow: 0 15px 35px hsla(0, 62.8%, 60%, 0.5);
        }

        .book-button.notify {
            background: linear-gradient(135deg, var(--concert-purple), var(--concert-pink));
            box-shadow: 0 8px 25px hsla(280, 85%, 65%, 0.4);
        }

        .book-button.notify:hover {
            background: linear-gradient(135deg, var(--concert-pink), var(--concert-purple));
            box-shadow: 0 15px 35px hsla(280, 85%, 65%, 0.5);
        }

        @keyframes urgent-pulse {
            0% { 
                transform: scale(1); 
                box-shadow: 0 8px 25px hsla(0, 62.8%, 60%, 0.4);
            }
            50% { 
                transform: scale(1.05); 
                box-shadow: 0 12px 30px hsla(0, 62.8%, 60%, 0.6);
            }
            100% { 
                transform: scale(1); 
                box-shadow: 0 8px 25px hsla(0, 62.8%, 60%, 0.4);
            }
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

            .packages-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 2.5rem;
            }

            .card-image {
                height: 250px;
            }

            .package-name {
                font-size: 1.8rem;
            }

            .book-button {
                font-size: 1.1rem;
                padding: 0.9rem 1.8rem;
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

            .packages-grid {
                grid-template-columns: repeat(3, 1fr);
                gap: 3rem;
            }

            .card-image {
                height: 300px;
            }

            .package-name {
                font-size: 2rem;
            }

            .book-button {
                font-size: 1.2rem;
                padding: 1rem 2rem;
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

            .packages-grid {
                grid-template-columns: 1fr;
                gap: 1.5rem;
            }

            .card-image {
                height: 150px;
            }

            .package-name {
                font-size: 1.3rem;
            }

            .package-details {
                font-size: 0.8rem;
            }

            .book-button {
                font-size: 0.9rem;
                padding: 0.7rem 1.4rem;
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

        .popup {
            display: none;
            position: fixed;
            bottom: 20px;
            right: 20px;
            background: hsl(240, 15%, 10%);
            backdrop-filter: blur(15px);
            padding: 1.5rem;
            border-radius: 1rem;
            box-shadow: 0 8px 32px hsla(240, 10%, 0%, 0.5);
            border: 1px solid hsl(240, 15%, 20%);
            width: 85%;
            max-width: 320px;
            text-align: center;
            color: var(--foreground);
            z-index: 1000;
        }

        .popup.active {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .popup h2 {
            font-family: 'Poppins', sans-serif;
            font-size: 1.3rem;
            font-weight: 700;
            color: var(--concert-purple);
            margin-bottom: 0.5rem;
            line-height: 1.3;
        }

        .popup p {
            color: hsl(0, 0%, 85%);
            font-size: 0.9rem;
            margin-bottom: 0.5rem;
            line-height: 1.4;
        }

        .popup .form-group {
            display: none;
            flex-direction: column;
            gap: 0.8rem;
            margin: 1rem 0;
        }

        .popup .form-group.active {
            display: flex;
        }

        .popup input {
            width: 100%;
            padding: 0.8rem;
            border: 1px solid hsl(240, 15%, 25%);
            border-radius: 0.5rem;
            background: hsl(240, 15%, 15%);
            color: var(--foreground);
            font-size: 0.9rem;
        }

        .popup input:focus {
            outline: none;
            border-color: var(--concert-purple);
        }

        .popup button {
            background: linear-gradient(135deg, var(--concert-purple), var(--concert-pink));
            color: white;
            padding: 0.8rem 1.5rem;
            border-radius: 0.5rem;
            font-family: 'Poppins', sans-serif;
            font-weight: 600;
            font-size: 0.9rem;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
            width: 100%;
            text-transform: none;
        }

        .popup button:hover {
            background: linear-gradient(135deg, var(--concert-pink), var(--concert-purple));
            transform: translateY(-1px);
            box-shadow: 0 6px 20px hsla(280, 85%, 65%, 0.4);
        }

        .popup button.aside {
            background: hsla(240, 10%, 12%, 0.7);
            color: var(--accent);
            border: 1px solid var(--concert-border);
            margin-top: 0.4rem;
        }

        .popup button.aside:hover {
            background: var(--accent);
            color: var(--concert-dark);
        }

        .popup a {
            display: block;
            margin-top: 0.5rem;
            color: var(--accent);
            text-decoration: none;
            font-weight: 600;
            font-size: 0.8rem;
        }

        .popup a:hover {
            text-decoration: underline;
        }

        .timer-container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 1rem 0;
        }

        .timer-svg {
            width: 50px;
            height: 50px;
        }

        .timer-svg circle {
            fill: none;
            stroke: var(--concert-purple);
            stroke-width: 3;
            transform: rotate(-90deg);
            transform-origin: center;
        }

        .timer-text {
            font-family: 'Poppins', sans-serif;
            font-weight: 600;
            font-size: 0.8rem;
            color: var(--concert-purple);
            position: absolute;
        }

        .close-button {
            position: absolute;
            top: 12px;
            right: 12px;
            background: var(--concert-pink);
            border: 2px solid var(--concert-purple);
            color: var(--foreground);
            font-size: 18px;
            font-weight: 700;
            width: 30px;
            height: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
            border-radius: 50%;
            line-height: 1;
        }
        
        .close-button:hover {
            background: var(--concert-purple);
            border-color: var(--concert-pink);
            transform: rotate(90deg) scale(1.2);
        }

        .popup .offer-text {
            background: linear-gradient(45deg, #ff4500, #ff8c00);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            font-size: 1rem;
            font-weight: bold;
            text-align: center;
            text-transform: uppercase;
            animation: pulse 1.5s infinite;
            margin: 0.5rem 0;
        }

        @media (max-width: 767px) {
            .popup {
                width: 90%;
                max-width: 280px;
                padding: 1.2rem;
                bottom: 15px;
                right: 15px;
            }

            .popup h2 {
                font-size: 1.1rem;
            }

            .popup p {
                font-size: 0.8rem;
            }

            .popup input {
                font-size: 0.8rem;
                padding: 0.7rem;
            }

            .popup button {
                font-size: 0.8rem;
                padding: 0.7rem 1.2rem;
            }

            .timer-svg {
                width: 40px;
                height: 40px;
            }

            .timer-text {
                font-size: 0.7rem;
            }

            .close-button {
                top: 10px;
                right: 10px;
                font-size: 16px;
                width: 25px;
                height: 25px;
            }

            .popup .offer-text {
                font-size: 0.9rem;
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
        <h1 class="hero-title">Experience Packages</h1>
        <p class="hero-subtitle">Your whole concert trip planned in minutes - travel, stay, tickets & more</p>
        
        <div class="packages-grid">
            <div class="package-card" data-url="ride-to-the-rage.php">
                <div class="card-image">
                    <img src="/img/pp-1.jpeg" alt="Ride to the RAGE" class="package-image">
                </div>
                <div class="package-content">
                    <h2 class="package-name">Ride to the RAGE</h2>
                    <p>📍 Travis Scott Concert - Delhi</p>
                    <div class="package-details">
                        <ul>
                            <li>3-Star Hotel & Homestays</li>
                            <li>Airport Pick-up & Drop</li>
                            <li>Complimentary Breakfast</li>
                            <li>Experience Manager Assistance</li>
                        </ul>
                    </div>
                    <p>✅ For solo or budget fans</p>
                    <p class="package-price">Starting ₹7,499 per head</p>
                    <a href="ride-to-the-rage.php" class="book-button notify">🔥 Book Now</a>
                    <a href="tel:+911234567890" class="book-button notify" style="margin-top: 1rem;">📞 Call Now</a>
                </div>
            </div>

            <div class="package-card" data-url="utopia-circle-mode.php">
                <div class="card-image">
                    <img src="/img/pp-2.jpeg" alt="UTOPIA Circle Mode" class="package-image">
                </div>
                <div class="package-content">
                    <h2 class="package-name">UTOPIA Circle</h2>
                    <p>📍 Travis Scott Concert - Delhi</p>
                    <div class="package-details">
                        <ul>
                            <li>4-Star Hotel & Villa Stays for Group</li>
                            <li>Airport Pick-up & Drop</li>
                            <li>Cab Transfers Throughout the Trip</li>
                            <li>Complimentary Breakfast</li>
                            <li>Private Concierge Support via WhatsApp</li>
                            <li>Early Access to Merch Drops with Lucrative Discounts</li>
                        </ul>
                    </div>
                    <p>⚡️ For group of 3+ ragers</p>
                    <p class="package-price">Starting ₹9,999 per head</p>
                    <a href="utopia-circle-mode.php" class="book-button notify">🎵 Book Now</a>
                    <a href="tel:+911234567890" class="book-button notify" style="margin-top: 1rem;">📞 Call Now</a>
                </div>
            </div>
            
            <div class="package-card" data-url="astro-deluxe-drop.php">
                <div class="card-image">
                    <img src="/img/pp-3.jpeg" alt="Astro Deluxe Drop" class="package-image">
                </div>
                <div class="package-content">
                    <h2 class="package-name">Astro Deluxe Drop</h2>
                    <p>📍 Travis Scott Concert - Delhi</p>
                    <div class="package-details">
                        <ul>
                            <li>4.5–5 Star Luxury Hotel or Villa Stay</li>
                            <li>Private Airport Pick-up & Drop-off</li>
                            <li>Curated Local Experience</li>
                            <li>Exclusive Pre-launch Travis Scott Merch Drops</li>
                            <li>Complimentary Breakfast</li>
                            <li>All Cab Transfers</li>
                            <li>Dedicated Personal Concierge</li>
                            <li>Early Check-in + Late Checkout (subject to availability)</li>
                        </ul>
                    </div>
                    <p>⭐ Tailored for the top tier</p>
                    <p class="package-price">Starting ₹19,999 per head</p>
                    <a href="astro-deluxe-drop.php" class="book-button notify">✈️ Book Now</a>
                    <a href="tel:+911234567890" class="book-button notify" style="margin-top: 1rem;">📞 Call Now</a>
                </div>
            </div>

            <div class="package-card" data-url="#">
                <div class="card-image">
                    <img src="/img/p-4.jpeg" alt="Escape to Enrique" class="package-image">
                </div>
                <div class="package-content">
                    <h2 class="package-name">Escape to Enrique</h2>
                    <div class="package-details">
                        <ul>
                            <li>Limited Slots – Only a handful of packages will go live in the first drop.</li>
                            <li>Best Prices First – Early birds lock in the lowest rates before they rise.</li>
                            <li>Priority Access – Be first in line for travel + stay bundles before they sell out.</li>
                            <li>No FOMO – Secure your spot for an unforgettable Enrique weekend.</li>
                            <li>(Stay updated when bookings open)</li>
                        </ul>
                    </div>
                    <a href="#" class="book-button notify">🔔 Notify Me</a>
                </div>
            </div>

            <div class="package-card" data-url="#">
                <div class="card-image">
                    <img src="/img/p-5.jpeg" alt="The Passenger Package" class="package-image">
                </div>
                <div class="package-content">
                    <h2 class="package-name">The Passenger Package</h2>
                    <div class="package-details">
                        <ul>
                            <li>Limited Slots – Only a handful of packages will go live in the first drop.</li>
                            <li>Best Prices First – Early birds lock in the lowest rates before they rise.</li>
                            <li>Priority Access – Be first in line for travel + stay bundles before they sell out.</li>
                            <li>No FOMO – Secure your spot for an unforgettable Passenger</li>
                            <li>(Stay updated when bookings open)</li>
                        </ul>
                    </div>
                    <a href="#" class="book-button notify">🔔 Notify Me</a>
                </div>
            </div>
        </div>
    </div>
</section>

    <div class="popup" id="concertPopup" role="dialog" aria-labelledby="popupTitle" aria-hidden="true">
        <button class="close-button" id="closePopupBtn" style="position: absolute; top: 10px; right: 10px; font-size: 16px; width: 24px; height: 24px; line-height: 24px; padding: 0;" aria-label="Close popup">✕</button>
        <h2 id="popupTitle">Save ₹3000 When You Come as a Group!</h2>
        <p>Bring 3+ friends and unlock up to ₹3000 OFF your concert package.</p>
        <p>Enter your details to grab your code:</p>
        <div class="form-group" id="formGroup">
            <input type="text" id="name" placeholder="Full Name ✨" required aria-required="true" aria-label="Full Name">
            <input type="email" id="email" placeholder="Email 📧" required aria-required="true" aria-label="Email Address">
            <input type="tel" id="phone" placeholder="Phone 📱" required aria-required="true" aria-label="Phone Number">
        </div>
        <p class="offer-text">Only 20 Codes Available – Don’t Miss Out!</p>
        <div class="timer-container">
            <svg class="timer-svg" viewBox="0 0 100 100" aria-hidden="true">
                <circle cx="50" cy="50" r="45" stroke-dasharray="283" stroke-dashoffset="0" id="timerCircle"/>
                <text x="50" y="55" text-anchor="middle" class="timer-text" id="timerText">0:20</text>
            </svg>
        </div>
        <button id="joinButton">I’m In - Send Me The Code</button>
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
                <path d="m21 15–3.086–3.086a2 2 0 0 0–2.828 0L6 21"></path>
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

            // Handle package card clicks
            document.querySelectorAll('.package-card').forEach(card => {
                card.addEventListener('click', (e) => {
                    if (!e.target.closest('.book-button')) {
                        const url = card.getAttribute('data-url');
                        if (url && url !== '#') {
                            window.location.href = url;
                        }
                    }
                });
            });

            // Handle Notify Me button clicks
            document.querySelectorAll('.book-button.notify').forEach(button => {
                if (button.textContent.includes('Notify Me')) {
                    button.addEventListener('click', (e) => {
                        e.preventDefault();
                        alert('You will be notified when bookings open for this package!');
                    });
                }
            });

            // Popup functionality
            let timerInterval = null;

            function closePopup() {
                const popup = document.getElementById('concertPopup');
                popup.classList.remove('active');
                popup.setAttribute('aria-hidden', 'true');
                if (timerInterval) {
                    clearInterval(timerInterval);
                    timerInterval = null;
                }
                document.getElementById('formGroup').classList.remove('active');
                const joinButton = document.getElementById('joinButton');
                joinButton.textContent = 'I’m In - Send Me The Code';
                joinButton.onclick = showForm;
                document.querySelector('.nav-container').focus();
            }

            function showForm() {
                const formGroup = document.getElementById('formGroup');
                const joinButton = document.getElementById('joinButton');
                formGroup.classList.add('active');
                joinButton.textContent = 'Submit Details';
                joinButton.onclick = submitForm;
                document.getElementById('name').focus();
                if (timerInterval) {
                    clearInterval(timerInterval);
                    timerInterval = null;
                }
            }

            function submitForm() {
                const name = document.getElementById('name').value.trim();
                const email = document.getElementById('email').value.trim();
                const phone = document.getElementById('phone').value.trim();

                if (!name || !email || !phone) {
                    alert('Please fill all fields.');
                    return;
                }

                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!emailRegex.test(email)) {
                    alert('Please enter a valid email address.');
                    return;
                }

                const phoneRegex = /^[\d\s\-\+\(\)]{10,}$/;
                if (!phoneRegex.test(phone)) {
                    alert('Please enter a valid phone number.');
                    return;
                }

                const joinButton = document.getElementById('joinButton');
                joinButton.disabled = true;
                joinButton.textContent = 'Submitting...';

                setTimeout(() => {
                    try {
                        const userData = {
                            name: name,
                            email: email,
                            phone: phone,
                            timestamp: new Date().toISOString()
                        };
                        
                        alert('Thank you! Your details have been saved. Check your email for the discount code!');
                        closePopup();
                        window.location.href = 'ride-to-the-rage.php';
                    } catch (error) {
                        console.error('Error saving data:', error);
                        alert('Something went wrong. Please try again.');
                        joinButton.disabled = false;
                        joinButton.textContent = 'Submit Details';
                    }
                }, 1500);
            }

            function showPopup(duration) {
                const popup = document.getElementById('concertPopup');
                popup.classList.add('active');
                popup.setAttribute('aria-hidden', 'false');
                document.getElementById('joinButton').focus();

                let timeLeft = duration / 1000;
                const totalTime = timeLeft;
                const timerCircle = document.getElementById('timerCircle');
                const timerText = document.getElementById('timerText');
                const circumference = 283;

                if (!timerInterval) {
                    timerInterval = setInterval(() => {
                        timeLeft--;
                        const minutes = Math.floor(timeLeft / 60);
                        const seconds = timeLeft % 60;
                        timerText.textContent = `${minutes}:${seconds < 10 ? '0' : ''}${seconds}`;
                        const offset = circumference * (1 - timeLeft / totalTime);
                        timerCircle.setAttribute('stroke-dashoffset', offset);
                        if (timeLeft <= 0) {
                            clearInterval(timerInterval);
                            timerInterval = null;
                            closePopup();
                        }
                    }, 1000);
                }

                const closeBtn = document.getElementById('closePopupBtn');
                closeBtn.addEventListener('click', () => {
                    closePopup();
                }, { once: true });

                popup.addEventListener('click', (e) => {
                    if (e.target === popup) {
                        closePopup();
                    }
                }, { once: true });
            }

            const joinButton = document.getElementById('joinButton');
            joinButton.addEventListener('click', showForm);

            setTimeout(() => {
                showPopup(20000);
                setInterval(() => {
                    showPopup(25000);
                }, 120000);
            }, 0);

            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth'
                        });
                    }
                });
            });

            window.addEventListener('load', function() {
                document.querySelectorAll('.package-card').forEach((card, index) => {
                    setTimeout(() => {
                        card.style.opacity = '1';
                        card.style.transform = 'translateY(0)';
                    }, index * 100);
                });
            });
        });
    </script>
</body>
</html>