<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Utopia Circle Mode - Concert Circle</title>
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
    fbq('init', '742867645193107');
    fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
    src="https://www.facebook.com/tr?id=742867645193107&ev=PageView&noscript=1"
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
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
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

        .container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 1rem;
        }

        .main-content {
            display: grid;
            grid-template-columns: 1fr 280px;
            gap: 2rem;
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 1rem;
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
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 1rem;
        }

        .svg-logo {
            height: 40px;
            width: auto;
            transition: transform 0.3s ease;
        }

        .svg-logo:hover {
            transform: scale(1.1);
        }

        .logo-container {
            display: flex;
            align-items: center;
        }

        .logo-text {
            font-family: 'Poppins', sans-serif;
            font-weight: 900;
            font-size: 1.5rem;
            letter-spacing: -0.02em;
            display: flex;
            align-items: center;
            margin-left: 0.5rem;
        }

        .logo-text .concert { color: var(--accent); }
        .logo-text .circle { color: var(--primary); margin-left: 0.25rem; }

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
            gap: 1rem;
            align-items: center;
        }

        .nav-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem 1rem;
            border-radius: 0.5rem;
            text-decoration: none;
            color: var(--muted);
            font-weight: 600;
            font-size: 1rem;
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

        .back-button {
            background: var(--concert-card);
            border: 1px solid var(--concert-border);
            border-radius: 0.5rem;
            padding: 0.5rem 1rem;
            color: var(--foreground);
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .back-button:hover {
            background: var(--accent);
            transform: scale(1.05);
        }

        .hero {
            padding: 2rem 0;
            position: relative;
            grid-column: 1 / -1;
        }

        .hero-image {
            position: relative;
            border-radius: 1rem;
            overflow: hidden;
            box-shadow: 0 10px 20px hsla(240, 10%, 8%, 0.5);
        }

        .hero-image img {
            width: 100%;
            height: clamp(300px, 50vw, 500px);
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .hero-image:hover img {
            transform: scale(1.05);
        }

        .hero-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(to top, hsla(240, 10%, 8%, 0.8), transparent);
        }

        .download-icon {
            position: absolute;
            top: 1rem;
            right: 1rem;
            background: var(--concert-card);
            padding: 0.5rem;
            border-radius: 0.5rem;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .download-icon:hover {
            background: var(--accent);
            transform: scale(1.1);
        }

        .hero-content {
            position: absolute;
            bottom: 2rem;
            left: 2rem;
            right: 2rem;
            animation: fadeInUp 1s ease forwards;
        }

        .hero-title {
            font-family: 'Poppins', sans-serif;
            font-size: clamp(1.5rem, 5vw, 2.5rem);
            font-weight: 900;
            margin-bottom: 1rem;
            text-shadow: 0 2px 4px hsla(240, 10%, 8%, 0.5);
        }

        .hero-title .white { color: var(--foreground); }
        .hero-title .purple { color: var(--concert-purple); }
        .hero-title .emoji { font-size: 1.5rem; vertical-align: middle; }

        .hero-subtitle {
            font-size: clamp(1rem, 2.5vw, 1.2rem);
            color: var(--muted);
            max-width: 600px;
            line-height: 1.6;
            animation: fadeInUp 1.2s ease forwards 0.2s;
            opacity: 0;
        }

        .content-area {
            grid-column: 1;
        }

        .event-info {
            background: var(--concert-card);
            padding: 1.5rem;
            border: 1px solid var(--concert-border);
            border-radius: 1rem;
            margin-bottom: 2rem;
        }

        .event-info p {
            margin: 0.5rem 0;
            font-size: clamp(0.9rem, 2vw, 1rem);
        }

        .event-info ul {
            list-style-type: none;
            padding: 0;
        }

        .event-info ul li {
            margin-bottom: 0.75rem;
            padding-left: 1.5rem;
            position: relative;
            font-size: clamp(0.9rem, 2vw, 1rem);
        }

        .event-info ul li:before {
            content: "•";
            color: var(--concert-purple);
            font-weight: bold;
            display: inline-block;
            width: 1.5rem;
            margin-left: -1.5rem;
        }

        .event-info .date-time { color: var(--accent); }
        .event-info .location { color: var(--concert-purple); }

        .nav-tabs {
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem;
            background: var(--concert-card);
            padding: 1rem;
            border-radius: 1rem;
            margin-bottom: 2rem;
        }

        .nav-tabs button {
            flex: 1;
            background: none;
            border: none;
            color: var(--muted);
            font-weight: 600;
            font-size: clamp(0.9rem, 2vw, 1rem);
            cursor: pointer;
            padding: 0.5rem;
            border-radius: 0.5rem;
            transition: all 0.3s ease;
        }

        .nav-tabs button:hover {
            color: var(--foreground);
            background: hsla(280, 85%, 65%, 0.2);
        }

        .nav-tabs button.active {
            color: var(--destructive);
            background: hsla(0, 62.8%, 60%, 0.3);
            border: 1px solid var(--destructive);
        }

        .tabcontent {
            display: none;
            background: var(--concert-card);
            padding: 1.5rem;
            border-radius: 1rem;
            margin-bottom: 2rem;
            animation: fadeInUp 0.5s ease forwards;
        }

        .experiences h2, .itinerary h2, .details h2, .merch-section h2 {
            color: var(--accent);
            font-size: clamp(1.5rem, 3vw, 1.75rem);
            margin-bottom: 1rem;
            font-family: 'Poppins', sans-serif;
            font-weight: 700;
        }

        .experience-category {
            margin-bottom: 2rem;
        }

        .experience-category h3 {
            color: var(--concert-purple);
            font-size: 1.2rem;
            margin-bottom: 1rem;
            font-family: 'Poppins', sans-serif;
            font-weight: 600;
        }

        .experience-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 1rem;
        }

        .experience-item {
            background: var(--secondary);
            padding: 1rem;
            border: 1px solid var(--concert-border);
            border-radius: 0.75rem;
            transition: all 0.3s ease;
        }

        .experience-item:hover {
            border-color: var(--primary);
            transform: translateY(-5px);
        }

        .experience-item img {
            width: 100%;
            height: 150px;
            object-fit: cover;
            border-radius: 0.5rem;
            margin-bottom: 0.5rem;
        }

        .hotel-stars {
            color: gold;
            margin-top: 0.5rem;
        }

        .details ul {
            list-style-type: none;
            padding: 0;
        }

        .details ul li {
            margin-bottom: 0.75rem;
            padding-left: 1.5rem;
            position: relative;
            font-size: clamp(0.9rem, 2vw, 1rem);
        }

        .details ul li:before {
            content: "•";
            color: var(--concert-purple);
            font-weight: bold;
            display: inline-block;
            width: 1.5rem;
            margin-left: -1.5rem;
        }

        .notes, .policies {
            background: var(--concert-card);
            padding: 1.5rem;
            border-radius: 1rem;
            font-size: clamp(0.8rem, 2vw, 0.9rem);
            color: var(--muted);
            line-height: 1.6;
            margin-top: 1rem;
        }

        .day-dropdown {
            background: var(--concert-card);
            border: 1px solid var(--concert-border);
            border-radius: 0.5rem;
            padding: 0.5rem;
            color: var(--foreground);
            margin-bottom: 1rem;
            width: 200px;
            font-size: 1rem;
        }

        .day-content {
            display: none;
        }

        .day-item-square {
            background: var(--secondary);
            border: 1px solid var(--concert-border);
            border-radius: 0.75rem;
            padding: 1rem;
            margin: 0 1rem 1rem 0;
            width: 300px;
            height: 300px;
            display: inline-block;
            vertical-align: top;
            transition: all 0.3s ease;
        }

        .day-item-square img {
            width: 100%;
            height: 150px;
            object-fit: cover;
            border-radius: 0.5rem;
            margin-bottom: 0.5rem;
        }

        .day-item-square:hover {
            border-color: var(--primary);
            transform: translateY(-5px);
        }

        .pricing-sidebar {
            background: var(--concert-card);
            border: 2px solid var(--concert-border);
            border-radius: 1rem;
            padding: 1.5rem;
            text-align: center;
            box-shadow: 0 8px 32px hsla(240, 10%, 8%, 0.7);
            backdrop-filter: blur(10px);
            animation: slideInRight 0.8s ease forwards;
        }

        .pricing-sidebar h3 {
            color: var(--accent);
            font-family: 'Poppins', sans-serif;
            font-size: 1.3rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }

        .price-display {
            font-size: 2rem;
            font-weight: 900;
            color: var(--concert-purple);
            margin: 1rem 0;
            font-family: 'Poppins', sans-serif;
        }

        .price-subtitle {
            color: var(--muted);
            font-size: 0.9rem;
            margin-bottom: 1.5rem;
        }

        .inclusion-icons {
            display: flex;
            gap: 1rem;
            justify-content: center;
            margin: 1.5rem 0;
        }

        .inclusion-icons svg {
            width: 2.5rem;
            height: 2.5rem;
            fill: var(--concert-purple);
            transition: all 0.3s ease;
        }

        .inclusion-icons svg:hover {
            fill: var(--accent);
            transform: scale(1.1);
        }

        .book-call {
            background: linear-gradient(45deg, var(--accent), var(--primary));
            color: var(--concert-dark);
            padding: 1rem 2rem;
            border-radius: 0.75rem;
            font-weight: 700;
            font-size: 1.1rem;
            text-decoration: none;
            display: block;
            text-align: center;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px hsla(280, 85%, 65%, 0.4);
        }

        .book-call:hover {
            background: linear-gradient(45deg, var(--primary), var(--accent));
            transform: translateY(-2px);
            box-shadow: 0 6px 20px hsla(280, 85%, 65%, 0.6);
        }

        .merch-section {
            background: var(--concert-card);
            padding: 2rem;
            border-radius: 1rem;
            margin: 2rem 0 15rem 0; /* Increased bottom margin to avoid overlap */
            border: 1px solid var(--concert-border);
        }

        .merch-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 1.5rem;
            margin-top: 1.5rem;
        }

        .merch-card, .ticket-card {
            background: var(--secondary);
            border: 2px solid var(--concert-border);
            border-radius: 1rem;
            padding: 1.5rem;
            text-align: center;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .merch-card:hover, .ticket-card:hover {
            border-color: var(--primary);
            transform: translateY(-5px);
            box-shadow: 0 10px 30px hsla(240, 10%, 8%, 0.5);
        }

        .merch-card::before, .ticket-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(45deg, var(--accent), var(--primary));
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .merch-card:hover::before, .ticket-card:hover::before {
            opacity: 1;
        }

        .merch-card img, .ticket-card img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            margin-bottom: 1rem;
            border: 3px solid var(--concert-border);
        }

        .dropping-soon {
            background: linear-gradient(45deg, var(--concert-pink), var(--accent));
            color: var(--concert-dark);
            padding: 0.25rem 0.75rem;
            border-radius: 1rem;
            font-size: 0.8rem;
            font-weight: 700;
            margin-bottom: 1rem;
            display: inline-block;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.7; }
        }

        .merch-card h3, .ticket-card h3 {
            font-family: 'Poppins', sans-serif;
            font-size: 1.3rem;
            color: var(--accent);
            margin-bottom: 0.75rem;
            font-weight: 600;
        }

        .merch-card p, .ticket-card p {
            font-size: 0.9rem;
            color: var(--muted);
            margin-bottom: 1rem;
            line-height: 1.4;
        }

        .merch-card .price, .ticket-card .price {
            font-size: 1.5rem;
            color: var(--concert-purple);
            margin-bottom: 1rem;
            font-weight: 700;
            font-family: 'Poppins', sans-serif;
        }

        .notify-btn {
            background: linear-gradient(45deg, var(--concert-pink), var(--primary));
            border: none;
            padding: 0.75rem 1.5rem;
            color: var(--concert-dark);
            font-weight: 700;
            border-radius: 0.5rem;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 0.9rem;
            width: 100%;
        }

        .notify-btn:hover {
            background: linear-gradient(45deg, var(--primary), var(--concert-pink));
            transform: translateY(-2px);
            box-shadow: 0 4px 15px hsla(320, 70%, 60%, 0.4);
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
            padding: 0.5rem 0;
            border-top: 1px solid var(--concert-border);
            z-index: 50;
        }

        .bottom-nav-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-decoration: none;
            color: var(--muted);
            font-size: 0.8rem;
            font-weight: 600;
            padding: 0.5rem;
            transition: all 0.3s ease;
        }

        .bottom-nav-item:hover {
            color: var(--foreground);
            background: hsla(280, 85%, 65%, 0.2);
        }

        .nav-item.active {
            color: var(--destructive);
            background: hsla(0, 62.8%, 60%, 0.3);
            border: 1px solid var(--destructive);
        }

        .bottom-nav-icon {
            width: 1.5rem;
            height: 1.5rem;
            margin-bottom: 0.25rem;
        }

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes slideInRight {
            from { opacity: 0; transform: translateX(50px); }
            to { opacity: 1; transform: translateX(0); }
        }

        .pdf-title-page {
            display: none;
            text-align: center;
            padding: 0.5in;
            background: linear-gradient(135deg, var(--concert-dark), var(--secondary));
            color: var(--foreground);
            page-break-after: always;
            width: 100%;
            box-sizing: border-box;
        }

        .pdf-title-page h1 {
            font-family: 'Poppins', sans-serif;
            font-size: 1.4rem;
            font-weight: 900;
            color: var(--concert-purple);
            margin-bottom: 0.4in;
        }

        .pdf-title-page p {
            font-size: 0.85rem;
            color: var(--muted);
            margin-bottom: 0.2in;
        }

        .pdf-title-page img {
            width: 100%;
            max-width: 3in;
            height: auto;
            border-radius: 0.4rem;
            margin: 0.4in 0;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        }

        .pdf-content {
            background: var(--concert-card);
            padding: 0.4in;
            margin-bottom: 0.4in;
            font-size: 0.8rem;
            color: var(--foreground);
            width: 100%;
            box-sizing: border-box;
            page-break-before: auto;
        }

        .pdf-content h2 {
            color: var(--accent);
            font-size: 1rem;
            margin-bottom: 0.4rem;
            font-family: 'Poppins', sans-serif;
            font-weight: 700;
            page-break-after: avoid;
        }

        .pdf-content .day-item-square {
            background: var(--secondary);
            padding: 0.4rem;
            margin-bottom: 0.4rem;
            border: 1px solid var(--concert-border);
            border-radius: 0.4rem;
            page-break-inside: avoid;
        }

        .pdf-content .day-item-square img {
            width: 100%;
            height: 1.2in;
            object-fit: cover;
            border-radius: 0.2rem;
            margin-bottom: 0.2rem;
        }

        .pdf-content .day-item-square p {
            font-size: 0.75rem;
            color: var(--foreground);
        }

        .pdf-content .event-info p {
            margin: 0.2rem 0;
            font-size: 0.75rem;
        }

        @media (max-width: 1200px) {
            .main-content {
                grid-template-columns: 1fr;
            }
            .pricing-sidebar {
                position: fixed;
                bottom: 60px;
                left: 0;
                right: 0;
                margin: 0;
                border-radius: 0;
                z-index: 40;
                padding: 1rem;
                box-shadow: 0 -4px 12px hsla(240, 10%, 8%, 0.5);
                animation: none;
            }
        }

        @media (max-width: 767px) {
            .menu-btn { display: block; }
            .nav-container { 
                display: none;
                position: absolute;
                top: 100%;
                left: 0;
                right: 0;
                background: var(--concert-dark);
                flex-direction: column;
                padding: 1rem;
                border-radius: 0 0 0.5rem 0.5rem;
            }
            .nav-container.active { display: flex; }
            .hero-title { font-size: 1.5rem; }
            .hero-subtitle { font-size: 1rem; }
            .bottom-nav { display: flex; }
            body { padding-bottom: 60px; }
            .experience-grid {
                grid-template-columns: 1fr;
            }
            .merch-grid {
                grid-template-columns: 1fr;
            }
            .day-item-square {
                width: 100%;
                height: auto;
                display: block;
                margin: 0 0 1rem 0;
            }
            .pricing-sidebar h3 {
                font-size: 1.1rem;
                margin-bottom: 0.5rem;
            }
            .price-display {
                font-size: 1.5rem;
                margin: 0.5rem 0;
            }
            .price-subtitle {
                font-size: 0.8rem;
                margin-bottom: 1rem;
            }
            .inclusion-icons {
                gap: 0.5rem;
                margin: 1rem 0;
            }
            .inclusion-icons svg {
                width: 2rem;
                height: 2rem;
            }
            .book-call {
                padding: 0.75rem 1.5rem;
                font-size: 1rem;
            }
            .header-content {
                flex-wrap: wrap;
            }
            .back-button {
                margin-top: 0.5rem;
            }
        }

        @media (min-width: 768px) {
            .container { padding: 0 2rem; }
            .main-content { padding: 0 2rem; }
            .pricing-sidebar {
                position: sticky;
                top: 120px;
                height: fit-content;
            }
        }

        @media (min-width: 1024px) {
            .container { max-width: 1200px; }
            .svg-logo { height: 50px; }
            .logo-text { font-size: 2rem; }
            .hero-image img { height: 600px; }
            .hero-title { font-size: 3rem; }
            .bottom-nav { display: none; }
            body { padding-bottom: 0; }
        }

        @media print {
            .pdf-title-page, .pdf-content {
                display: block !important;
            }
            .hero, .nav-tabs, .bottom-nav, .header, .book-call, .notes, .inclusion-icons, .pricing-sidebar, .merch-section {
                display: none !important;
            }
            .pdf-content .day-item-square {
                page-break-inside: avoid;
            }
            .pdf-content h2 {
                page-break-after: avoid;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="header-content">
            <div class="logo-container">
                <a href="https://concertcircle.com" style="text-decoration: none; color: inherit; display: flex; align-items: center;">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" class="svg-logo" role="img" aria-label="Concert Circle Logo">
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
                <a href="packages.php" class="nav-item active">
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
            <a href="packages.php" class="back-button">Back</a>
        </div>
    </header>

    <div class="main-content">
        <section class="hero">
            <div class="hero-image">
                <img src="/img/ps-2.jpeg" alt="Travis Scott Concert Crowd">
                <div class="hero-overlay"></div>
                <a href="#" class="download-icon" title="Download Itinerary" onclick="downloadItinerary()">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                        <polyline points="7 10 12 15 17 10"></polyline>
                        <line x1="12" y1="15" x2="12" y2="3"></line>
                    </svg>
                </a>
                <div class="hero-content">
                    <h2 class="hero-title">
                        <span class="white">Utopia Circle </span>
                        <span class="purple">Mode</span>
                    </h2>
                    <p class="hero-subtitle">Gather your squad - this package turns the Travis Scott concert into the ultimate group experience</p>
                </div>
            </div>
        </section>

        <div class="content-area">
            <div class="pdf-title-page" id="pdfTitlePage">
                <h1>Travis Scott Squad Drop: Concert Itinerary</h1>
                <p>Saturday, October 18, 2025</p>
                <p>Jawaharlal Nehru Stadium, Delhi</p>
                <p>Generated on: August 20, 2025, 05:52 PM IST</p>
                <img src="/img/ps-2.jpeg" alt="Travis Scott Concert">
                <p>Curated by Concert Circle</p>
            </div>

            <div class="event-info" id="eventInfo">
                <p class="date-time"><strong>Date:</strong> Sat 18 Oct 2025 | 7:00 PM</p>
                <p class="location"><strong>Location:</strong> Jawaharlal Nehru Stadium, Delhi</p>
                <p><strong>About the package:</strong></p>
                <ul>
                    <li>Curated for squads of 3+, this package turns the Travis Scott concert into a full-blown crew adventure.</li>
                    <li>Includes coordinated group travel, shared premium stays, and smooth cab transfers for your entire gang.</li>
                    <li>Enjoy pre-concert hangouts, exclusive group activities, and the hype of arriving together in style.</li>
                    <li>Book a call now to connect with our crew to rage as a circle - stay together, ride together, vibe together.</li>
                </ul>
            </div>

            <div class="nav-tabs">
                <button class="tablinks active" onclick="openTab(event, 'Experiences')">Experiences</button>
                <button class="tablinks" onclick="openTab(event, 'Itinerary')">Itinerary</button>
                <button class="tablinks" onclick="openTab(event, 'Details')">Details</button>
            </div>

            <div id="Experiences" class="tabcontent" style="display: block;">
                <div class="experiences">
                    <h2>What's Included</h2>
                    <div class="experience-category">
                        <h3>Travel Options</h3>
                        <div class="experience-grid">
                            <div class="experience-item">
                                <img src="https://images.unsplash.com/photo-1436491865332-7a61a109cc05?w=800&h=400&fit=crop&auto=format&q=90" alt="Flights">
                                <p><strong>Flights</strong><br>Coordinated group flights with priority boarding</p>
                            </div>
                            <div class="experience-item">
                                <img src="/img/u1.jpg" alt="Trains">
                                <p><strong>Trains</strong><br>AC group compartments for shared travel</p>
                            </div>
                            <div class="experience-item">
                                <img src="https://images.unsplash.com/photo-1570125909232-eb263c188f7e?w=800&h=400&fit=crop&auto=format&q=90" alt="Buses">
                                <p><strong>Buses</strong><br>Group coaches with premium amenities</p>
                            </div>
                        </div>
                    </div>
                    <div class="experience-category">
                        <h3>Accommodation</h3>
                        <div class="experience-grid">
                            <div class="experience-item">
                                <img src="/img/u2.jpg" alt="Hotel Shanti Palace">
                                <p><strong>Hotel Shanti Palace</strong> <span class="hotel-stars">★★★</span><br>3-star shared group stay with amenities</p>
                            </div>
                            <div class="experience-item">
                                <img src="/img/u-4.jpg" alt="goStops delhi ">
                                <p><strong>goStops delhi </strong> <span class="hotel-stars">★★★</span><br>Social hostel with vibrant community</p>
                            </div>
                        </div>
                    </div>
                    <div class="experience-category">
                        <h3>Local Transportation</h3>
                        <div class="experience-grid">
                            <div class="experience-item">
                                <img src="/img/r4.jpg" alt="Cabs">
                                <p><strong>Cabs</strong><br>Group cab transfers for seamless logistics</p>
                            </div>
                        </div>
                    </div>
                    <div class="experience-category">
                        <h3>Local Experiences</h3>
                        <div class="experience-grid">
                            <div class="experience-item">
                                <img src="https://images.unsplash.com/photo-1555396273-367ea4eb4db5?w=800&h=400&fit=crop&auto=format&q=90" alt="Lord of the Drinks">
                                <p><strong>Lord of the Drinks</strong><br>Group dining and premium cocktails</p>
                            </div>
                            <div class="experience-item">
                                <img src="/img/r5.jpg" alt="Connaught Place">
                                <p><strong>Connaught Place</strong><br>Group shopping and cultural experience</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="Itinerary" class="tabcontent">
                <div class="itinerary">
                    <h2>Complete Itinerary</h2>
                    <p style="color: var(--muted);">Note: This is a sample itinerary.</p>
                    <select id="daySelector" onchange="showDay(this.value)" class="day-dropdown">
                        <option value="Day1">Day 1 - Concert Day</option>
                        <option value="Day2">Day 2 - Exploration & Return</option>
                    </select>
                    <div id="Day1" class="day-content">
                        <div class="day-item-square">
                            <img src="/img/r600.jpg" alt="Wake Up">
                            <p><strong>6:00 AM</strong><br>Wake up, pack, and get ready for your squad trip</p>
                        </div>
                        <div class="day-item-square">
                            <img src="https://images.unsplash.com/photo-1436491865332-7a61a109cc05?w=800&h=400&fit=crop&auto=format&q=90" alt="Flight Departure">
                            <p><strong>7:05 AM</strong><br>Group flight from Mumbai to Delhi</p>
                        </div>
                        <div class="day-item-square">
                            <img src="/img/r920.jpg" alt="Arrival Delhi">
                            <p><strong>9:20 AM</strong><br>Land at Indira Gandhi International Airport</p>
                        </div>
                        <div class="day-item-square">
                            <img src="/img/r945.jpg" alt="Private Airport Transfer">
                            <p><strong>9:45 AM - 10:35 AM</strong><br>Group cab transfer to hotel</p>
                        </div>
                        <div class="day-item-square">
                            <img src="/img/u11035.jpg" alt="Hotel Check-in">
                            <p><strong>10:35 AM - 12:00 PM</strong><br>Check-in at Hotel Shanti Palace</p>
                        </div>
                        <div class="day-item-square">
                            <img src="/img/r1230.png" alt="Lunch">
                            <p><strong>12:30 PM</strong><br>Group lunch at Lord of the Drinks</p>
                        </div>
                        <div class="day-item-square">
                            <img src="/img/r200.jpg" alt="Explore Connaught Place">
                            <p><strong>2:00 PM - 4:30 PM</strong><br>Group visit to Connaught Place</p>
                        </div>
                        <div class="day-item-square">
                            <img src="/img/u1430.jpg" alt="Hotel Relaxation">
                            <p><strong>4:30 PM - 5:30 PM</strong><br>Relax at hotel with squad</p>
                        </div>
                        <div class="day-item-square">
                            <img src="https://images.unsplash.com/photo-1470337458703-46ad1756a187?w=800&h=400&fit=crop&auto=format&q=90" alt="Dinner/Drinks">
                            <p><strong>5:30 PM - 6:30 PM</strong><br>Group dinner at Lord of the Drinks</p>
                        </div>
                        <div class="day-item-square">
                            <img src="/img/r630.png" alt="Group Cab to Venue">
                            <p><strong>6:30 PM</strong><br>Group cab to Jawaharlal Nehru Stadium</p>
                        </div>
                        <div class="day-item-square">
                            <img src="/img/r730.jpg" alt="VIP Venue Arrival">
                            <p><strong>7:00 PM</strong><br>Group VIP entry to concert</p>
                        </div>
                        <div class="day-item-square">
                            <img src="/img/r800.png" alt="Concert">
                            <p><strong>8:00 PM onwards</strong><br>Travis Scott Concert with group zones</p>
                        </div>
                        <div class="day-item-square">
                            <img src="/img/u11200.jpg" alt="Post-Concert">
                            <p><strong>12:00 AM</strong><br>Group lounge at Lord of the Drinks</p>
                        </div>
                    </div>
                    <div id="Day2" class="day-content">
                        <div class="day-item-square">
                            <img src="/img/r2730.jpg" alt="Breakfast">
                            <p><strong>7:30 AM</strong><br>Wake up, breakfast at hotel or The Kitchen/Carnatic Cafe</p>
                        </div>
                        <div class="day-item-square">
                            <img src="/img/r2900.jpg" alt="Explore City">
                            <p><strong>9:00 AM</strong><br>Quick exploration trip to Connaught Place</p>
                        </div>
                        <div class="day-item-square">
                            <img src="/img/r21130.jpg" alt="Hotel Check-out">
                            <p><strong>11:30 AM</strong><br>Return to hotel, pack up and check out</p>
                        </div>
                        <div class="day-item-square">
                            <img src="/img/r21200.jpg" alt="Airport Transfer">
                            <p><strong>12:00 PM</strong><br>Private cab transfer to Delhi Airport</p>
                        </div>
                        <div class="day-item-square">
                            <img src="/img/r2130.jpg" alt="Flight Departure">
                            <p><strong>3:00 PM</strong><br>Fly Delhi to Mumbai, Arrival 5:15 PM</p>
                        </div>
                        <div class="day-item-square">
                            <img src="/img/r2515.jpg" alt="Trip Ends">
                            <p><strong>5:15 PM</strong><br>Land in Mumbai, epic concert trip ends!</p>
                        </div>
                    </div>
                </div>
            </div>

            <div id="Details" class="tabcontent">
                <div class="details">
                    <h2>Package Details</h2>
                    <h3 style="color: var(--concert-purple); margin: 2rem 0 1rem 0;">Inclusions</h3>
                    <ul>
                        <li>4-star hotel & villa stays for group</li>
                        <li>Airport pick up & drop</li>
                        <li>Cab transfers throughout the trip</li>
                        <li>Complimentary breakfast</li>
                        <li>Private concierge support via WhatsApp</li>
                        <li>Early access to merch drops with lucrative discounts</li>
                    </ul>
                    <h3 style="color: var(--concert-purple); margin: 2rem 0 1rem 0;">Exclusions</h3>
                    <ul>
                        <li>International/Domestic Airfare</li>
                        <li>Personal expenses & shopping</li>
                        <li>Beverages, Lunch, Dinner unless mentioned</li>
                        <li>Future cost changes due to inflation</li>
                        <li>Any services not specified in inclusions</li>
                    </ul>
                </div>
                <div class="policies">
                    <h3 style="color: var(--accent); margin-bottom: 1rem;">Booking Policy</h3>
                    <ul>
                        <li>Full payment required within 48 hours of booking confirmation</li>
                        <li>Your tickets, Passes and everything will be shared within 2-3 Hours of Payment</li>
                    </ul>
                    <h3 style="color: var(--accent); margin: 1.5rem 0 1rem 0;">Cancellation Policy</h3>
                    <ul>
                        <li>50% refund if cancelled 24 Hours before event</li>
                        <li>80% refund if cancelled 6 days before event</li>
                        <li>90% refund guaranteed for cancellations made at least 7 days before the event</li>
                    </ul>
                    <h3 style="color: var(--accent); margin: 1.5rem 0 1rem 0;">Important Notes</h3>
                    <ul>
                        <li>Valid ID required for all travelers</li>
                        <li>These are tentative rates and subject to change</li>
                        <li>Hotel availability & flights are dynamic</li>
                        <li>No refunds on partially utilized services</li>
                    </ul>
                </div>
                <div class="notes">
                    Our crew will call you within 24 hours to customize your perfect concert experience.<br>
                    - These are tentative rates.<br>
                    - No booking has been made.<br>
                    - Hotel availability & Flights is dynamic and is subject to change along with the prices.<br>
                    - There would be no refund issued on partly utilized services.<br>
                    - Flights & Travel options can be booked on call with our agent based on source destination.
                </div>
            </div>

            <div class="merch-section">
                <h2>Exclusive Merchandise & Tickets</h2>
                <p style="color: var(--muted); margin-bottom: 1.5rem;">Complete your concert experience with our exclusive merchandise and secure your tickets!</p>
                <div class="merch-grid">
                    <div class="merch-card">
                        <img src="/img/s-2.png" alt="Travis Scott Printed Exclusive Drop">
                        <h3>Travis Scott Printed Exclusive Drop</h3>
                        <div class="dropping-soon">DROPPING SOON</div>
                        <p>Limited edition Travis Scott-themed apparel.</p>
                        <div class="price">₹999</div>
                        <button class="notify-btn" data-product="Travis Scott Printed Exclusive Drop">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <circle cx="12" cy="12" r="10"></circle>
                                <polyline points="12,6 12,12 16,14"></polyline>
                            </svg>
                            NOTIFY ME
                        </button>
                    </div>
                    <div class="merch-card">
                        <img src="/img/s-3.png" alt="Circus Maximus Stadium Tour Merch">
                        <h3>Circus Maximus Stadium Tour Merch</h3>
                        <div class="dropping-soon">DROPPING SOON</div>
                        <p>Exclusive merchandise from the Circus Maximus Tour.</p>
                        <div class="price">₹999</div>
                        <button class="notify-btn" data-product="Circus Maximus Stadium Tour Merch">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <circle cx="12" cy="12" r="10"></circle>
                                <polyline points="12,6 12,12 16,14"></polyline>
                            </svg>
                            NOTIFY ME
                        </button>
                    </div>
                    <div class="ticket-card">
                        <img src="/img/s-1.png" alt="Gold Ticket">
                        <h3>Gold Ticket</h3>
                        <p>Premium seating for Travis Scott: Circus Maximus Tour at Jawaharlal Nehru Stadium.</p>
                        <div class="price">₹23,000</div>
                        <button class="notify-btn" style="background: linear-gradient(45deg, var(--accent), var(--primary));" onclick="window.location.href='ticket_purchase.php'">BOOK NOW</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="pricing-sidebar">
            <h3>Starting from</h3>
            <div class="price-display">₹9,999</div>
            <div class="price-subtitle">Per Head</div>
            <div class="inclusion-icons">
                <svg viewBox="0 0 24 24" fill="currentColor">
                    <path d="M12 12a5 5 0 1 0 0-10 5 5 0 0 0 0 10zm0 2c-4.42 0-8 1.79-8 4v2h16v-2c0-2.21-3.58-4-8-4z"></path>
                </svg>
                <svg viewBox="0 0 24 24" fill="currentColor">
                    <path d="M2 10h20v10H2V10zm2 2v6h16v-6H4zm2-4h4v2H6V8zm10 0h2v2h-2V8zM4 14h16v2H4v-2z"/>
                </svg>
                <svg viewBox="0 0 24 24" fill="currentColor">
                    <path d="M11 9H9V2H7v7H5V2H3v7c0 2.12 1.66 3.84 3.75 3.97V22h2.5v-9.03C11.34 12.84 13 11.12 13 9V2h-2v7zm5-3v8h2.5v8H21V2c-2.76 0-5 2.24-5 4z"></path>
                </svg>
                <svg viewBox="0 0 24 24" fill="currentColor">
                    <path d="M12 14C13.66 14 15 12.66 15 11V5C15 3.34 13.66 2 12 2S9 3.34 9 5V11C9 12.66 10.34 14 12 14ZM10.8 4.9C10.8 4.24 11.34 3.7 12 3.7S13.2 4.24 13.2 4.9V11.1C13.2 11.76 12.66 12.3 12 12.3S10.8 11.76 10.8 11.1V4.9ZM17 11C17 14.53 14.39 17.44 11 17.93V21H13V23H11H9V21H11V17.93C7.61 17.44 5 14.53 5 11H7C7 13.76 9.24 16 12 16S17 13.76 17 16H17V11Z"/>
                </svg>
                <svg viewBox="0 0 24 24" fill="currentColor">
                    <path d="M18.92 6.01C18.72 5.42 18.16 5 17.5 5H15V4C15 2.9 14.1 2 13 2H11C9.9 2 9 2.9 9 4V5H6.5C5.84 5 5.28 5.42 5.08 6.01L3 12V20C3 20.55 3.45 21 4 21H5C5.55 21 6 20.55 6 20V19H18V20C18 20.55 18.45 21 19 21H20C20.55 21 21 20.55 21 20V12L18.92 6.01ZM11 4H13V5H11V4ZM6.5 16C5.67 16 5 15.33 5 14.5S5.67 13 6.5 13 8 13.67 8 14.5 7.33 16 6.5 16ZM17.5 16C16.67 16 16 15.33 16 14.5S16.67 13 17.5 13 19 13.67 19 14.5 18.33 16 17.5 16ZM5 11L6.5 7H17.5L19 11H5Z"/>
                </svg>
            </div>
            <a href="travis-details.php" class="book-call">Book a Call</a>
        </div>
    </div>

    <nav class="bottom-nav">
        <a href="index.php" class="bottom-nav-item">
            <svg class="bottom-nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                <polyline points="9,22 9,12 15,12 15,22"></polyline>
            </svg>
            <span class="bottom-nav-label">Home</span>
        </a>
        <a href="packages.php" class="bottom-nav-item active">
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>
    <script>
        function openTab(evt, tabName) {
            const tabcontent = document.getElementsByClassName("tabcontent");
            for (let i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            const tablinks = document.getElementsByClassName("tablinks");
            for (let i = 0; i < tablinks.length; i++) {
                tablinks[i].classList.remove("active");
            }
            document.getElementById(tabName).style.display = "block";
            evt.currentTarget.classList.add("active");
        }

        function showDay(day) {
            const dayContent = document.getElementsByClassName("day-content");
            for (let i = 0; i < dayContent.length; i++) {
                dayContent[i].style.display = "none";
            }
            document.getElementById(day).style.display = "block";
        }

        document.querySelector('.menu-btn').addEventListener('click', function() {
            document.querySelector('.nav-container').classList.toggle('active');
        });

        document.addEventListener('click', function(event) {
            const navContainer = document.querySelector('.nav-container');
            const menuBtn = document.querySelector('.menu-btn');
            if (!navContainer.contains(event.target) && !menuBtn.contains(event.target)) {
                navContainer.classList.remove('active');
            }
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

            document.querySelectorAll('.experience-item, .day-item-square, .merch-card, .ticket-card').forEach((item, index) => {
                setTimeout(() => {
                    item.style.opacity = '1';
                    item.style.transform = 'translateY(0)';
                }, index * 100);
            });

            const firstTab = document.querySelector(".tablinks");
            if (firstTab) {
                firstTab.classList.add("active");
                document.getElementById('Experiences').style.display = "block";
            }
            document.getElementById('daySelector').value = 'Day1';
            showDay('Day1');
        });

        function preloadImages(urls) {
            return Promise.all(urls.map(url => {
                return new Promise((resolve, reject) => {
                    const img = new Image();
                    img.crossOrigin = "Anonymous";
                    img.src = url;
                    img.onload = resolve;
                    img.onerror = () => {
                        console.warn(`Failed to load image: ${url}`);
                        resolve();
                    };
                });
            }));
        }

        async function downloadItinerary() {
            alert('Downloading the sample itinerary...');
            const itineraryImages = Array.from(document.querySelectorAll('#Itinerary .day-item-square img')).map(img => img.src);
            const titleImage = document.querySelector('#pdfTitlePage img').src;
            const imageUrls = [titleImage, ...itineraryImages];

            try {
                await preloadImages(imageUrls);

                const pdfContainer = document.createElement('div');
                pdfContainer.style.width = '8.5in';
                pdfContainer.style.boxSizing = 'border-box';
                pdfContainer.style.background = 'var(--concert-dark)';

                const titlePage = document.getElementById('pdfTitlePage').cloneNode(true);
                const eventInfo = document.getElementById('eventInfo').cloneNode(true);
                const itineraryElement = document.getElementById('Itinerary').cloneNode(true);

                titlePage.classList.add('pdf-title-page');
                eventInfo.classList.add('pdf-content');
                itineraryElement.classList.add('pdf-content');

                titlePage.style.display = 'block';
                eventInfo.style.display = 'block';
                itineraryElement.style.display = 'block';

                itineraryElement.querySelector('#daySelector').style.display = 'none';
                itineraryElement.querySelectorAll('.day-content').forEach(dc => dc.style.display = 'block');

                const day1 = itineraryElement.querySelector('#Day1');
                const h3day1 = document.createElement('h3');
                h3day1.textContent = 'Day 1 - Concert Day';
                h3day1.style.color = 'var(--concert-purple)';
                h3day1.style.fontFamily = "'Poppins', sans-serif";
                h3day1.style.fontWeight = '600';
                h3day1.style.marginBottom = '1rem';
                h3day1.style.pageBreakAfter = 'avoid';
                day1.parentNode.insertBefore(h3day1, day1);

                const day2 = itineraryElement.querySelector('#Day2');
                const h3day2 = document.createElement('h3');
                h3day2.textContent = 'Day 2 - Exploration & Return';
                h3day2.style.color = 'var(--concert-purple)';
                h3day2.style.fontFamily = "'Poppins', sans-serif";
                h3day2.style.fontWeight = '600';
                h3day2.style.marginBottom = '1rem';
                h3day2.style.marginTop = '2rem';
                h3day2.style.pageBreakAfter = 'avoid';
                day2.parentNode.insertBefore(h3day2, day2);

                pdfContainer.appendChild(titlePage);
                pdfContainer.appendChild(eventInfo);
                pdfContainer.appendChild(itineraryElement);

                document.body.appendChild(pdfContainer);

                const opt = {
                    margin: [0.4, 0.4, 0.4, 0.4],
                    filename: 'Travis_Scott_Squad_Drop_Itinerary.pdf',
                    image: { type: 'jpeg', quality: 0.98 },
                    html2canvas: {
                        scale: 2,
                        useCORS: true,
                        logging: true,
                        width: 816,
                        scrollX: 0,
                        scrollY: 0
                    },
                    jsPDF: {
                        unit: 'in',
                        format: 'letter',
                        orientation: 'portrait'
                    },
                    pagebreak: { mode: ['css', 'legacy'], avoid: ['.day-item-square', 'h2', 'h3', '.event-info'] }
                };

                await html2pdf().from(pdfContainer).set(opt).toPdf().get('pdf').then(pdf => {
                    const totalPages = pdf.internal.getNumberOfPages();
                    for (let i = 1; i <= totalPages; i++) {
                        pdf.setPage(i);
                        pdf.setFontSize(8);
                        pdf.setTextColor(150, 150, 150);
                        pdf.text(`Page ${i} of ${totalPages}`, 0.4, 10.8);
                    }
                }).save();

                pdfContainer.remove();
            } catch (error) {
                console.error('Error generating PDF:', error);
                alert('Failed to generate PDF. Please try again.');
            }
        }
    </script>
</body>
</html>