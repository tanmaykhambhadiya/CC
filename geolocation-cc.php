<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Journeys by Concert Circle</title>
  <link rel="icon" href="LOGO for website (circular).png" type="image/x-icon">
  <link rel="icon" href="LOGO for website (circular).png" type="image/x-icon">
  <link rel="shortcut icon" href="LOGO for website (circular).png" type="image/x-icon">
  <link rel="icon" type="image/x-icon" href="LOGO for website (circular).png">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;900&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">

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
      --concert-blue: hsl(200, 85%, 65%);
      --concert-dark: hsl(240, 10%, 8%);
      --concert-card: hsl(240, 10%, 12%);
      --concert-border: hsl(240, 10%, 20%);
      --concert-border-hover: hsl(240, 15%, 30%);
      --destructive: hsl(0, 62.8%, 60%);
      --muted: hsl(240, 5%, 65%);
      --border: hsl(240, 10%, 20%);
      --success: hsl(120, 60%, 50%);
      --warning: hsl(38, 92%, 50%);
    }

    body {
      font-family: 'Open Sans', sans-serif;
      background: linear-gradient(135deg, var(--concert-dark), var(--secondary), var(--concert-dark));
      background-size: 200% 200%;
      animation: gradient 15s ease infinite;
      color: var(--foreground);
      min-height: 100vh;
      overflow-x: hidden;
      line-height: 1.6;
    }

    @keyframes gradient {
      0% { background-position: 0% 50%; }
      50% { background-position: 100% 50%; }
      100% { background-position: 0% 50%; }
    }

    @keyframes pulse {
      0%, 100% { opacity: 1; }
      50% { opacity: 0.7; }
    }

    @keyframes slideUp {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }

    @keyframes fadeInUp {
      from { opacity: 0; transform: translateY(30px); }
      to { opacity: 1; transform: translateY(0); }
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

    .logo-text .concert { color: var(--accent); }
    .logo-text .circle { color: var(--primary); margin-left: 0.25rem; }

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

    .main-content { padding: 2rem 0; }

    .hero-section {
      text-align: center;
      margin-bottom: 3rem;
      animation: fadeInUp 1s ease forwards;
    }

    .hero-title {
      font-family: 'Poppins', sans-serif;
      font-size: 3rem;
      font-weight: 700;
      color: var(--foreground);
      background: linear-gradient(135deg, var(--concert-pink), var(--concert-purple), var(--concert-blue));
      -webkit-background-clip: text;
      background-clip: text;
      margin-bottom: 1rem;
      text-shadow: 0 2px 4px hsla(240, 10%, 8%, 0.5);
    }

    .hero-subtitle {
      font-size: 1.25rem;
      color: var(--muted);
      max-width: 600px;
      margin: 0 auto;
      line-height: 1.6;
    }

    #map {
      height: 600px;
      width: 100%;
      border-radius: 1rem;
      border: 2px solid var(--concert-border);
      box-shadow: 0 8px 32px rgba(0, 0, 0, 0.4);
      transition: all 0.3s ease;
    }

    #map:hover {
      border-color: var(--concert-purple);
      box-shadow: 0 12px 40px hsla(280, 85%, 65%, 0.2);
    }

    .card {
      background: var(--concert-card);
      border: 1px solid var(--concert-border);
      transition: all 0.3s ease;
      border-radius: 1rem;
      backdrop-filter: blur(10px);
      animation: slideUp 0.8s ease-out;
      padding: 2rem;
      margin-bottom: 2rem;
    }

    .card:hover {
      border-color: var(--concert-purple);
      box-shadow: 0 12px 24px hsla(280, 85%, 65%, 0.15);
      transform: translateY(-2px);
    }

    .section-title {
      font-family: 'Poppins', sans-serif;
      font-size: 1.5rem;
      font-weight: 700;
      color: var(--primary);
      margin-bottom: 1rem;
      display: flex;
      align-items: center;
      gap: 0.75rem;
    }

    .section-icon {
      width: 1.5rem;
      height: 1.5rem;
      color: var(--accent);
    }

    .btn-primary {
      background: linear-gradient(135deg, var(--concert-pink), var(--concert-purple));
      transition: all 0.3s ease;
      font-weight: 600;
      position: relative;
      overflow: hidden;
      color: white;
      border: none;
      border-radius: 0.75rem;
      padding: 1rem 1.5rem;
      font-size: 1rem;
      cursor: pointer;
      width: 100%;
      min-height: 48px;
    }

    .btn-primary::before {
      content: '';
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 100%;
      background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
      transition: left 0.5s;
    }

    .btn-primary:hover::before { left: 100%; }

    .btn-primary:hover {
      background: linear-gradient(135deg, var(--concert-purple), var(--concert-pink));
      transform: translateY(-2px);
      box-shadow: 0 8px 20px hsla(280, 85%, 65%, 0.3);
    }

    .btn-primary:disabled {
      opacity: 0.6;
      cursor: not-allowed;
      transform: none;
    }

    .btn-whatsapp {
      background: linear-gradient(135deg, #25D366, #20b358);
      transition: all 0.3s ease;
      font-weight: 600;
      color: white;
      border: none;
      border-radius: 0.75rem;
      padding: 0.75rem 1.5rem;
      font-size: 0.9rem;
      cursor: pointer;
      display: flex;
      align-items: center;
      gap: 0.5rem;
    }

    .btn-whatsapp:hover {
      background: linear-gradient(135deg, #20b358, #1ea851);
      transform: translateY(-2px);
      box-shadow: 0 6px 16px rgba(37, 211, 102, 0.3);
    }

    .btn-sms {
      background: linear-gradient(135deg, #4CAF50, #45a049);
      transition: all 0.3s ease;
      font-weight: 600;
      color: white;
      border: none;
      border-radius: 0.75rem;
      padding: 0.75rem 1.5rem;
      font-size: 0.9rem;
      cursor: pointer;
      display: flex;
      align-items: center;
      gap: 0.5rem;
    }

    .btn-sms:hover {
      background: linear-gradient(135deg, #45a049, #3e8e41);
      transform: translateY(-2px);
      box-shadow: 0 6px 16px rgba(76, 175, 80, 0.3);
    }

    .btn-copy {
      background: var(--concert-border);
      transition: all 0.3s ease;
      font-weight: 600;
      color: white;
      border: none;
      border-radius: 0.75rem;
      padding: 0.75rem 1.5rem;
      font-size: 0.9rem;
      cursor: pointer;
      display: flex;
      align-items: center;
      gap: 0.5rem;
    }

    .btn-copy:hover {
      background: var(--concert-border-hover);
      transform: translateY(-2px);
    }

    input {
      font-size: 1rem;
      padding: 1rem 1.25rem;
      border-radius: 0.75rem;
      border: 2px solid var(--concert-border);
      background: var(--concert-dark);
      color: var(--foreground);
      transition: all 0.3s ease;
      font-family: 'Open Sans', sans-serif;
      width: 100%;
      min-height: 48px;
    }

    input.error {
      border-color: var(--destructive);
      background: hsla(0, 62.8%, 60%, 0.1);
    }

    input::placeholder {
      color: var(--muted);
      font-weight: 400;
    }

    input:focus {
      outline: none;
      border-color: var(--concert-purple);
      box-shadow: 0 0 0 3px hsla(280, 85%, 65%, 0.1);
      background: hsl(240, 10%, 10%);
    }

    .status-indicator {
      display: inline-flex;
      align-items: center;
      padding: 0.25rem 0.75rem;
      border-radius: 2rem;
      font-size: 0.875rem;
      font-weight: 500;
      margin-left: 0.5rem;
    }

    .status-online {
      background: hsla(142, 71%, 45%, 0.2);
      color: var(--success);
      border: 1px solid hsla(142, 71%, 45%, 0.3);
    }

    .status-indicator::before {
      content: '';
      width: 6px;
      height: 6px;
      border-radius: 50%;
      background: currentColor;
      margin-right: 0.5rem;
      animation: pulse 2s infinite;
    }

    .participant-item {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 0.75rem 1rem;
      margin: 0.5rem 0;
      background: var(--concert-dark);
      border: 1px solid var(--concert-border);
      border-radius: 0.75rem;
      transition: all 0.3s ease;
    }

    .participant-item:hover {
      border-color: var(--concert-border-hover);
      transform: translateX(4px);
    }

    .share-section {
      background: linear-gradient(135deg, hsla(280, 85%, 65%, 0.1), hsla(320, 70%, 60%, 0.1));
      border: 1px solid hsla(280, 85%, 65%, 0.2);
      border-radius: 1rem;
      padding: 1.5rem;
      margin: 1rem 0;
    }

    .loading {
      display: inline-block;
      width: 20px;
      height: 20px;
      border: 2px solid var(--concert-border);
      border-radius: 50%;
      border-top-color: var(--concert-purple);
      animation: spin 1s ease-in-out infinite;
    }

    @keyframes spin {
      to { transform: rotate(360deg); }
    }

    .grid-2 { display: grid; grid-template-columns: 1fr; gap: 1rem; }
    .grid-3 { display: grid; grid-template-columns: 1fr; gap: 1rem; }
    .grid-4 { display: grid; grid-template-columns: 1fr; gap: 1rem; }
    .flex-wrap { display: flex; flex-wrap: wrap; gap: 1rem; }
    .text-center { text-align: center; }
    .hidden { display: none !important; }

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

    .bottom-nav-label { font-size: 0.8rem; }

    .modal {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.7);
      display: flex;
      align-items: center;
      justify-content: center;
      z-index: 100;
    }

    .modal-content {
      background: var(--concert-card);
      border: 1px solid var(--concert-border);
      border-radius: 1rem;
      padding: 2rem;
      max-width: 400px;
      width: 90%;
      text-align: center;
    }

    .error-message {
      color: var(--destructive);
      font-size: 0.875rem;
      margin-top: 0.25rem;
      display: none;
    }

    .notification {
      position: fixed;
      top: 1rem;
      right: 1rem;
      padding: 1rem 1.5rem;
      border-radius: 0.75rem;
      color: white;
      font-weight: 600;
      z-index: 1000;
      transform: translateX(100%);
      transition: transform 0.3s ease;
      max-width: 400px;
    }

    .notification.show {
      transform: translateX(0);
    }

    .notification.success {
      background: linear-gradient(135deg, var(--success), #45a049);
    }

    .notification.error {
      background: linear-gradient(135deg, var(--destructive), #c53030);
    }

    .notification.info {
      background: linear-gradient(135deg, var(--concert-blue), #3182ce);
    }

    @media (min-width: 768px) {
      .container { padding: 0 2rem; }
      .svg-logo { height: 40px; }
      .logo-text { font-size: 2rem; }
      .hero-title { font-size: 3.5rem; }
      .grid-2 { grid-template-columns: repeat(2, 1fr); }
      .grid-3 { grid-template-columns: repeat(3, 1fr); }
      .grid-4 { grid-template-columns: repeat(4, 1fr); }
      #map { height: 700px; }
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
      .nav-container.active {
        display: flex;
        flex-direction: column;
        position: absolute;
        top: 100%;
        left: 0;
        right: 0;
        background: hsla(240, 10%, 8%, 0.95);
        padding: 1rem;
        box-shadow: 0 2px 5px hsla(240, 10%, 8%, 0.3);
        backdrop-filter: blur(10px);
      }
      .hero-title { font-size: 2.5rem; }
      .section-title { font-size: 1.25rem; }
      input { font-size: 0.9rem; padding: 0.875rem 1rem; }
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
          <a href="packages.php" class="nav-item">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"></path>
            </svg>
            Packages
          </a>
          <a href="geolocation-cc.php" class="nav-item active">
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

  <main class="main-content">
    <div class="container">
      <section class="hero-section">
        <h1 class="hero-title">Share Your Journey in Real-Time</h1>
        <p class="hero-subtitle">Track locations, share experiences, and connect with your circle during concert trips and adventures.</p>
      </section>

      <!-- Create Journey Section -->
      <div class="card">
        <h2 class="section-title">
          <svg class="section-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
          </svg>
          Create a New Journey
        </h2>
        <p style="color: var(--muted); margin-bottom: 1.5rem;">Start tracking your location and invite friends to follow your journey in real-time.</p>
        
        <div class="grid-2" style="margin-bottom: 1.5rem;">
          <div>
            <label for="destination" style="display: block; font-weight: 600; margin-bottom: 0.5rem;">Destination</label>
            <input id="destination" type="text" placeholder="Enter city name or coordinates (e.g., Mumbai or 19.0760, 72.8777)" aria-label="Destination input" />
            <div id="destinationError" class="error-message">Please enter a valid destination</div>
            <p style="font-size: 0.875rem; color: var(--muted); margin-top: 0.25rem;">You can enter a city name or latitude,longitude coordinates</p>
          </div>
          <div>
            <label for="journeyName" style="display: block; font-weight: 600; margin-bottom: 0.5rem;">Journey Name</label>
            <input id="journeyName" type="text" placeholder="Give your journey a memorable name" aria-label="Journey name input" maxlength="50" />
            <div id="journeyNameError" class="error-message">Journey name is required</div>
            <p style="font-size: 0.875rem; color: var(--muted); margin-top: 0.25rem;">Something like "Weekend Trip to Goa" or "College Reunion"</p>
          </div>
        </div>
        
        <div style="margin-bottom: 1.5rem;">
          <label for="userName" style="display: block; font-weight: 600; margin-bottom: 0.5rem;">Your Name</label>
          <input id="userName" type="text" placeholder="Enter your name" required aria-label="Your name input" maxlength="20" />
          <div id="userNameError" class="error-message">Name must be at least 2 characters long</div>
          <p style="font-size: 0.875rem; color: var(--muted); margin-top: 0.25rem;">This will be used to create your unique username (e.g., CC-YourName-XX)</p>
        </div>
        
        <button id="createJourney" class="btn-primary" aria-label="Start a new journey">
          <span style="position: relative; z-index: 10;">🚀 Start Journey</span>
        </button>
        <button id="endJourney" class="btn-sms hidden" style="margin-top: 1rem; width: 100%;" aria-label="End current journey">
          <span style="position: relative; z-index: 10;">🛑 End Journey</span>
        </button>
      </div>

      <!-- Join Journey Modal -->
      <div id="joinModal" class="modal hidden">
        <div class="modal-content">
          <h2 class="section-title">Join Journey</h2>
          <p style="color: var(--muted); margin-bottom: 1.5rem;">Please enter your name to join the journey.</p>
          <div style="margin-bottom: 1.5rem;">
            <label for="joinUserName" style="display: block; font-weight: 600; margin-bottom: 0.5rem;">Your Name</label>
            <input id="joinUserName" type="text" placeholder="Enter your name" required aria-label="Name input to join journey" maxlength="20" />
            <div id="joinUserNameError" class="error-message">Name must be at least 2 characters long</div>
          </div>
          <div style="display: flex; gap: 1rem;">
            <button id="submitJoin" class="btn-primary" aria-label="Join the journey">Join Now</button>
            <button id="cancelJoin" class="btn-copy" aria-label="Cancel join" style="flex: 0 0 auto;">Cancel</button>
          </div>
        </div>
      </div>

      <!-- Journey Details Section -->
      <div id="journeyDetails" class="hidden">
        <div class="card">
          <h2 class="section-title">
            <svg class="section-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            Journey Active: <span id="journeyTitle" style="color: var(--primary);"></span>
            <span class="status-indicator status-online">Live</span>
          </h2>
          
          <div class="share-section">
            <h3 style="font-size: 1.25rem; font-weight: 600; margin-bottom: 1rem; display: flex; align-items: center; gap: 0.5rem;">
              <svg style="width: 1.25rem; height: 1.25rem;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.367 2.684 3 3 0 00-5.367-2.684z"></path>
              </svg>
              Share Your Journey
            </h3>
            <p style="color: var(--muted); margin-bottom: 1rem;">Invite friends and family to track your location in real-time:</p>
            <div style="background: var(--concert-dark); padding: 1rem; border-radius: 0.5rem; margin-bottom: 1rem; border: 1px solid var(--concert-border);">
              <p style="font-size: 0.875rem; color: var(--muted); margin-bottom: 0.5rem;">Share this link:</p>
              <a id="shareLink" href="#" style="color: var(--primary); text-decoration: underline; font-size: 0.875rem; word-break: break-all;"></a>
            </div>
            <div class="flex-wrap">
              <button id="shareWhatsApp" class="btn-whatsapp" aria-label="Share journey via WhatsApp">
                <svg style="width: 1.25rem; height: 1.25rem;" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.488"/>
                </svg>
                Share on WhatsApp
              </button>
              <button id="shareSMS" class="btn-sms" aria-label="Share journey via SMS">
                <svg style="width: 1.25rem; height: 1.25rem;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                </svg>
                Share via SMS
              </button>
              <button id="copyLink" class="btn-copy" aria-label="Copy journey link">
                <svg style="width: 1.25rem; height: 1.25rem;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                </svg>
                Copy Link
              </button>
            </div>
          </div>

          <h3 style="font-size: 1.25rem; font-weight: 600; margin: 2rem 0 1rem 0; display: flex; align-items: center; gap: 0.5rem;">
            <svg style="width: 1.25rem; height: 1.25rem;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
            </svg>
            Journey Participants
            <span id="participantCount" style="font-size: 0.875rem; background: var(--primary); color: white; padding: 0.25rem 0.5rem; border-radius: 9999px;">0</span>
          </h3>
          <div id="participants"></div>
          <p id="noParticipants" style="color: var(--muted); text-align: center; padding: 2rem 0;">
            <svg style="width: 3rem; height: 3rem; margin: 0 auto 1rem; opacity: 0.5;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
            </svg>
            Waiting for participants to join your journey...
          </p>
        </div>
      </div>

      <!-- Live Map Section -->
      <div class="card">
        <h3 class="section-title">
          <svg class="section-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-1.447-.894L15 9m0 8V9m0 0V7"></path>
          </svg>
          Live Location Map
        </h3>
        <p style="color: var(--muted); margin-bottom: 1rem;">Track real-time locations of all journey participants on the interactive map below.</p>
        <div id="map" role="application" aria-label="Interactive location map"></div>
      </div>

      <!-- Location Notice -->
      <div id="locationNotice" class="card hidden" style="border-color: var(--warning); background: hsla(38, 92%, 50%, 0.1);">
        <div style="display: flex; align-items: flex-start; gap: 1rem;">
          <svg style="width: 1.5rem; height: 1.5rem; color: var(--warning); flex-shrink: 0; margin-top: 0.25rem;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4.5a2.5 2.5 0 00-4.33 0L2.732 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
          </svg>
          <div>
            <h4 style="font-weight: 600; color: var(--warning); margin-bottom: 0.5rem;">Location Permission Required</h4>
            <p style="color: var(--muted); margin-bottom: 1rem;">Please allow location access to share your position with journey participants. Your location will only be visible to people with the journey link.</p>
            <button id="requestLocation" class="btn-primary" style="width: auto;" aria-label="Request location access">
              Request Location Access
            </button>
          </div>
        </div>
      </div>

      <!-- How It Works Section -->
      <div class="card">
        <h3 class="section-title">
          <svg class="section-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
          </svg>
          How It Works
        </h3>
        <div class="grid-3">
          <div class="text-center">
            <div style="width: 3rem; height: 3rem; background: hsla(280, 85%, 65%, 0.2); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1rem;">
              <svg style="width: 1.5rem; height: 1.5rem; color: var(--primary);" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
              </svg>
            </div>
            <h4 style="font-weight: 600; margin-bottom: 0.5rem;">1. Create Journey</h4>
            <p style="color: var(--muted); font-size: 0.875rem;">Set your destination and give your journey a memorable name to get started.</p>
          </div>
          <div class="text-center">
            <div style="width: 3rem; height: 3rem; background: hsla(320, 70%, 60%, 0.2); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1rem;">
              <svg style="width: 1.5rem; height: 1.5rem; color: var(--accent);" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.367 2.684 3 3 0 00-5.367-2.684z"></path>
              </svg>
            </div>
            <h4 style="font-weight: 600; margin-bottom: 0.5rem;">2. Share Link</h4>
            <p style="color: var(--muted); font-size: 0.875rem;">Send the journey link to friends via WhatsApp, SMS, or any messaging app.</p>
          </div>
          <div class="text-center">
            <div style="width: 3rem; height: 3rem; background: hsla(200, 85%, 65%, 0.2); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1rem;">
              <svg style="width: 1.5rem; height: 1.5rem; color: var(--concert-blue);" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
              </svg>
            </div>
            <h4 style="font-weight: 600; margin-bottom: 0.5rem;">3. Track Together</h4>
            <p style="color: var(--muted); font-size: 0.875rem;">Everyone can see real-time locations on the map and track journey progress.</p>
          </div>
        </div>
      </div>
    </div>
  </main>

  <!-- Bottom Navigation -->
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
    <a href="geolocation-cc.php" class="bottom-nav-item active">
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
    // Global variables
let map, destinationMarker, userMarkers = {}, userPaths = {}, journeyId = null, destinationCoords = null;
let watchId = null, isJourneyActive = false, userName = "";
let lastLocationUpdate = 0;
const geocodeCache = new Map();
let debounceTimer = null;
let participantUpdateListeners = new Map();

// Persist userId with unique device identifier
let deviceId = localStorage.getItem('deviceId') || 
    Math.random().toString(36).substring(2, 10) + '-' + Date.now();
if (!localStorage.getItem('deviceId')) localStorage.setItem('deviceId', deviceId);

let userId = localStorage.getItem('userId') || 
    deviceId + '-' + Math.random().toString(36).substring(2, 10);
if (!localStorage.getItem('userId')) localStorage.setItem('userId', userId);

// Enhanced notification system
function showNotification(message, type = 'info', duration = 4000) {
  // Only show notifications related to journey actions
  const journeyKeywords = ['journey', 'joined', 'link', 'ended'];
  if (!journeyKeywords.some(keyword => message.toLowerCase().includes(keyword))) return;

  const notification = document.createElement('div');
  notification.className = `notification ${type}`;
  notification.textContent = message;
  
  document.body.appendChild(notification);
  
  // Trigger animation
  setTimeout(() => notification.classList.add('show'), 100);
  
  // Remove notification
  setTimeout(() => {
    notification.classList.remove('show');
    setTimeout(() => {
      if (notification.parentNode) {
        notification.parentNode.removeChild(notification);
      }
    }, 300);
  }, duration);
}

// Enhanced input validation
function validateInput(inputId, errorId, validator, errorMessage) {
  const input = document.getElementById(inputId);
  const error = document.getElementById(errorId);
  const isValid = validator(input.value);
  
  if (!isValid) {
    input.classList.add('error');
    error.textContent = errorMessage;
    error.style.display = 'block';
  } else {
    input.classList.remove('error');
    error.style.display = 'none';
  }
  
  return isValid;
}

// Form validation
function validateDestination(value) {
  if (!value.trim()) return false;
  if (value.includes(',')) {
    const coords = value.split(',').map(n => parseFloat(n.trim()));
    return coords.length === 2 && 
           !coords.some(isNaN) && 
           coords[0] >= -90 && coords[0] <= 90 && 
           coords[1] >= -180 && coords[1] <= 180;
  }
  return value.length >= 2;
}

function validateJourneyName(value) {
  return value.trim().length >= 3 && value.trim().length <= 50;
}

function validateUserName(value) {
  return value.trim().length >= 2 && value.trim().length <= 20;
}

// Lazy load scripts
function loadScript(src) {
  return new Promise((resolve, reject) => {
    const script = document.createElement('script');
    script.src = src;
    script.onload = resolve;
    script.onerror = reject;
    document.head.appendChild(script);
  });
}

function loadCSS(href) {
  return new Promise((resolve, reject) => {
    const link = document.createElement('link');
    link.rel = 'stylesheet';
    link.href = href;
    link.onload = resolve;
    link.onerror = reject;
    document.head.appendChild(link);
  });
}

// Initialize Firebase
const firebaseConfig = {
  apiKey: "AIzaSyCshCQlOoD3pgvhr0wJ7DV5o2Nu-1UqqKU",
  authDomain: "geolocation-cc.firebaseapp.com",
  databaseURL: "https://geolocation-cc-default-rtdb.firebaseio.com",
  projectId: "geolocation-cc",
  storageBucket: "geolocation-cc.firebasestorage.app",
  messagingSenderId: "159296998445",
  appId: "1:159296998445:web:f8afb613193604bfb5bca4",
  measurementId: "G-4Q79SRJS9N"
};

let db;

// Enhanced geocoding with rate limiting and caching
async function geocodeCity(city) {
  const cacheKey = city.toLowerCase().trim();
  if (geocodeCache.has(cacheKey)) {
    return geocodeCache.get(cacheKey);
  }

  try {
    await new Promise(resolve => setTimeout(resolve, 1000));
    const response = await fetch(
      `https://nominatim.openstreetmap.org/search?` + 
      `q=${encodeURIComponent(city)}&format=json&limit=1&countrycodes=in&addressdetails=1`, 
      {
        headers: {
          'User-Agent': 'Concert Circle Journey Tracker'
        }
      }
    );
    
    if (!response.ok) {
      throw new Error(`HTTP ${response.status}: ${response.statusText}`);
    }
    
    const data = await response.json();
    if (data.length > 0) {
      const result = { 
        lat: parseFloat(data[0].lat), 
        lng: parseFloat(data[0].lon), 
        name: data[0].display_name 
      };
      geocodeCache.set(cacheKey, result);
      return result;
    }
    throw new Error('Location not found');
  } catch (error) {
    console.error('Geocoding error:', error);
    throw new Error('Unable to find location. Please try coordinates or another city name.');
  }
}

// Place suggestions
async function fetchPlaceSuggestions(query) {
  if (!query || query.length < 2) {
    hideSuggestions();
    return [];
  }

  try {
    const response = await fetch(
      `https://nominatim.openstreetmap.org/search?` +
      `q=${encodeURIComponent(query)}&format=json&limit=5&countrycodes=in&addressdetails=1`,
      {
        headers: {
          'User-Agent': 'Concert Circle Journey Tracker'
        }
      }
    );
    if (!response.ok) throw new Error('Failed to fetch suggestions');
    const data = await response.json();
    return data.map(item => ({
      name: item.display_name,
      lat: parseFloat(item.lat),
      lng: parseFloat(item.lon)
    }));
  } catch (error) {
    console.error('Error fetching suggestions:', error);
    return [];
  }
}

function showSuggestions(suggestions) {
  let suggestionsDiv = document.getElementById('destinationSuggestions');
  if (!suggestionsDiv) {
    suggestionsDiv = document.createElement('div');
    suggestionsDiv.id = 'destinationSuggestions';
    suggestionsDiv.style.cssText = `
      position: absolute;
      background: var(--concert-card);
      border: 1px solid var(--concert-border);
      border-radius: 0.75rem;
      max-height: 200px;
      overflow-y: auto;
      width: 100%;
      z-index: 1000;
      margin-top: 0.25rem;
    `;
    const destinationInput = document.getElementById('destination');
    destinationInput.parentElement.style.position = 'relative';
    destinationInput.parentElement.appendChild(suggestionsDiv);
  }

  suggestionsDiv.innerHTML = suggestions.map(suggestion => `
    <div class="suggestion-item" style="padding: 0.75rem; cursor: pointer; border-bottom: 1px solid var(--concert-border);"
         data-lat="${suggestion.lat}" data-lng="${suggestion.lng}" data-name="${suggestion.name}">
      ${suggestion.name}
    </div>
  `).join('');

  suggestionsDiv.querySelectorAll('.suggestion-item').forEach(item => {
    item.addEventListener('click', () => {
      const destinationInput = document.getElementById('destination');
      destinationInput.value = item.dataset.name;
      destinationCoords = {
        lat: parseFloat(item.dataset.lat),
        lng: parseFloat(item.dataset.lng),
        name: item.dataset.name
      };
      hideSuggestions();
    });
  });

  suggestionsDiv.style.display = suggestions.length > 0 ? 'block' : 'none';
}

function hideSuggestions() {
  const suggestionsDiv = document.getElementById('destinationSuggestions');
  if (suggestionsDiv) {
    suggestionsDiv.style.display = 'none';
  }
}

// Enhanced ETA calculation with fallback
function calculateDistanceETA(lat1, lon1, lat2, lon2) {
  const R = 6371; // Earth's radius in kilometers
  const dLat = (lat2 - lat1) * Math.PI / 180;
  const dLon = (lon2 - lon1) * Math.PI / 180;
  const a = Math.sin(dLat/2) * Math.sin(dLat/2) + 
            Math.cos(lat1 * Math.PI / 180) * Math.cos(lat2 * Math.PI / 180) * 
            Math.sin(dLon/2) * Math.sin(dLon/2);
  const c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a));
  const distance = R * c;
  const speed = 40; // Average speed in km/h
  const minutes = Math.round((distance / speed) * 60);
  return minutes < 60 ? `${minutes} min` : `${Math.floor(minutes / 60)}h ${minutes % 60}m`;
}

async function calculateETA(startLat, startLng, endLat, endLng) {
  return calculateDistanceETA(startLat, startLng, endLat, endLng);
}

// Enhanced username generation
function generateUsername(inputName) {
  const sanitizedName = inputName.trim()
    .replace(/[^a-zA-Z0-9]/g, '')
    .substring(0, 10)
    .toLowerCase();
  const randomSuffix = Math.floor(Math.random() * 100).toString().padStart(2, '0');
  return `CC-${sanitizedName}-${randomSuffix}`;
}

// Initialize Leaflet Map
function initMap() {
  try {
    map = L.map('map', {
      center: [20.5937, 78.9629], // Center on India
      zoom: 5,
      zoomControl: true,
      attributionControl: true
    });

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      maxZoom: 19,
      attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    map.on('loading', () => {
      document.body.style.cursor = 'wait';
    });
    
    map.on('load', () => {
      document.body.style.cursor = 'default';
    });

  } catch (error) {
    console.error('Map initialization error:', error);
  }
}

// Debounced location update function
function debounceLocationUpdate(func, delay) {
  return function(...args) {
    clearTimeout(debounceTimer);
    debounceTimer = setTimeout(() => func.apply(this, args), delay);
  };
}

// Enhanced location sharing
function startLocationSharing() {
  if (!navigator.geolocation) {
    showNotification('Geolocation is not supported by this browser.', 'error');
    return;
  }

  const options = {
    enableHighAccuracy: true,
    timeout: 30000,
    maximumAge: 10000
  };

  const debouncedUpdate = debounceLocationUpdate((position) => {
    updateUserLocation(position);
  }, 2000);

  watchId = navigator.geolocation.watchPosition(
    debouncedUpdate,
    (error) => {
      console.error('Geolocation error:', error);
      let message = 'Location access failed. ';
      switch(error.code) {
        case error.PERMISSION_DENIED:
          message += 'Please allow location access.';
          break;
        case error.POSITION_UNAVAILABLE:
          message += 'Location information unavailable.';
          break;
        case error.TIMEOUT:
          message += 'Location request timed out.';
          break;
      }
      showNotification(message, 'error');
    },
    options
  );
}

// Update user location in Firebase
async function updateUserLocation(position) {
  if (!journeyId || !db) return;

  const now = Date.now();
  if (now - lastLocationUpdate < 5000) return; // Rate limit updates

  try {
    const locationData = {
      lat: position.coords.latitude,
      lng: position.coords.longitude,
      timestamp: now,
      accuracy: position.coords.accuracy,
      userId: userId,
      userName: userName
    };

    await db.ref(`journeys/${journeyId}/participants/${userId}`).update(locationData);

    const pathRef = db.ref(`journeys/${journeyId}/paths/${userId}`);
    const snapshot = await pathRef.limitToLast(99).once('value');
    const existingPath = snapshot.val() || {};
    
    await pathRef.push({
      lat: position.coords.latitude,
      lng: position.coords.longitude,
      timestamp: now
    });

    lastLocationUpdate = now;

    if (destinationCoords) {
      const eta = await calculateETA(
        position.coords.latitude,
        position.coords.longitude,
        destinationCoords.lat,
        destinationCoords.lng
      );
      
      await db.ref(`journeys/${journeyId}/participants/${userId}`).update({ eta });
    }

  } catch (error) {
    console.error('Failed to update location:', error);
    showNotification('Failed to update location. Check your connection.', 'error');
  }
}

// Listen for journey participants
function listenForParticipants() {
  if (!journeyId || !db) return;

  const participantsRef = db.ref(`journeys/${journeyId}/participants`);
  
  participantsRef.on('value', (snapshot) => {
    const participants = snapshot.val() || {};
    updateParticipantsDisplay(participants);
    updateMapMarkers(participants);
  });

  const pathsRef = db.ref(`journeys/${journeyId}/paths`);
  pathsRef.on('child_changed', (snapshot) => {
    const userId = snapshot.key;
    const path = snapshot.val();
    updateUserPath(userId, path);
  });
}

// Update participants display
function updateParticipantsDisplay(participants) {
  const participantsDiv = document.getElementById('participants');
  const noParticipantsMsg = document.getElementById('noParticipants');
  const participantCount = document.getElementById('participantCount');
  
  const participantsList = Object.values(participants);
  participantCount.textContent = participantsList.length;

  if (participantsList.length === 0) {
    participantsDiv.innerHTML = '';
    noParticipantsMsg.classList.remove('hidden');
    return;
  }

  noParticipantsMsg.classList.add('hidden');
  
  participantsDiv.innerHTML = participantsList.map(participant => {
    const lastSeen = participant.timestamp ? 
      new Date(participant.timestamp).toLocaleTimeString() : 'Unknown';
    const eta = participant.eta || 'Calculating...';
    
    return `
      <div class="participant-item">
        <div>
          <strong>${participant.userName || 'Anonymous'}</strong>
          <div style="font-size: 0.875rem; color: var(--muted);">
            Last seen: ${lastSeen} | ETA: ${eta}
          </div>
        </div>
        <div class="status-indicator status-online">Active</div>
      </div>
    `;
  }).join('');
}

// Update map markers
function updateMapMarkers(participants) {
  if (!map) return;

  Object.values(userMarkers).forEach(marker => map.removeLayer(marker));
  userMarkers = {};

  Object.entries(participants).forEach(([userId, participant]) => {
    if (participant.lat && participant.lng) {
      const marker = L.marker([participant.lat, participant.lng], {
        icon: L.divIcon({
          className: 'custom-div-icon',
          html: `<div style="background: var(--concert-purple); color: white; border-radius: 50%; width: 30px; height: 30px; display: flex; align-items: center; justify-content: center; font-weight: bold; font-size: 12px; border: 2px solid white; box-shadow: 0 2px 4px rgba(0,0,0,0.3);">${(participant.userName || 'U').charAt(0).toUpperCase()}</div>`,
          iconSize: [30, 30],
          iconAnchor: [15, 15]
        })
      });

      marker.bindPopup(`
        <div style="text-align: center;">
          <strong>${participant.userName || 'Anonymous'}</strong><br>
          <small>Last updated: ${new Date(participant.timestamp).toLocaleString()}</small><br>
          <small>Accuracy: ±${Math.round(participant.accuracy || 0)}m</small>
        </div>
      `);

      marker.addTo(map);
      userMarkers[userId] = marker;
    }
  });

  const allMarkers = Object.values(userMarkers);
  if (destinationMarker) allMarkers.push(destinationMarker);
  
  if (allMarkers.length > 0) {
    const group = new L.featureGroup(allMarkers);
    try {
      map.fitBounds(group.getBounds().pad(0.1));
    } catch (error) {
      console.error('Error fitting bounds:', error);
    }
  }
}

// Update user path on map
function updateUserPath(userId, pathData) {
  if (!map || !pathData) return;

  if (userPaths[userId]) {
    map.removeLayer(userPaths[userId]);
  }

  const pathPoints = Object.values(pathData)
    .sort((a, b) => a.timestamp - b.timestamp)
    .map(point => [point.lat, point.lng]);

  if (pathPoints.length > 1) {
    userPaths[userId] = L.polyline(pathPoints, {
      color: '#' + Math.floor(Math.random()*16777215).toString(16),
      weight: 3,
      opacity: 0.7
    }).addTo(map);
  }
}

// Create new journey
async function createJourney() {
  const destination = document.getElementById('destination').value.trim();
  const journeyName = document.getElementById('journeyName').value.trim();
  const userNameInput = document.getElementById('userName').value.trim();

  const isDestinationValid = validateInput('destination', 'destinationError', validateDestination, 'Please enter a valid destination');
  const isJourneyNameValid = validateInput('journeyName', 'journeyNameError', validateJourneyName, 'Journey name must be 3-50 characters');
  const isUserNameValid = validateInput('userName', 'userNameError', validateUserName, 'Name must be 2-20 characters');

  if (!isDestinationValid || !isJourneyNameValid || !isUserNameValid) {
    showNotification('Please fix the errors above', 'error');
    return;
  }

  const createButton = document.getElementById('createJourney');
  createButton.disabled = true;
  createButton.innerHTML = '<span class="loading"></span> Creating journey...';

  try {
    let coords = destinationCoords || null;
    if (!coords) {
      if (destination.includes(',')) {
        const [lat, lng] = destination.split(',').map(n => parseFloat(n.trim()));
        coords = { lat, lng, name: `${lat}, ${lng}` };
      } else {
        coords = await geocodeCity(destination);
      }
    }

    destinationCoords = coords;
    userName = userNameInput;
    const generatedUsername = generateUsername(userName);

    const journeyData = {
      name: journeyName,
      destination: coords,
      createdBy: userId,
      createdAt: Date.now(),
      status: 'active'
    };

    const journeyRef = await db.ref('journeys').push(journeyData);
    journeyId = journeyRef.key;

    if (destinationMarker) map.removeLayer(destinationMarker);
    destinationMarker = L.marker([coords.lat, coords.lng], {
      icon: L.divIcon({
        className: 'custom-div-icon',
        html: `<div style="background: var(--destructive); color: white; border-radius: 50%; width: 40px; height: 40px; display: flex; align-items: center; justify-content: center; font-weight: bold; border: 2px solid white; box-shadow: 0 2px 8px rgba(0,0,0,0.3);">🎯</div>`,
        iconSize: [40, 40],
        iconAnchor: [20, 20]
      })
    }).addTo(map);

    destinationMarker.bindPopup(`
      <div style="text-align: center;">
        <strong>${journeyName}</strong><br>
        <small>Destination: ${coords.name}</small>
      </div>
    `);

    map.setView([coords.lat, coords.lng], 10);

    isJourneyActive = true;
    document.getElementById('journeyDetails').classList.remove('hidden');
    document.getElementById('journeyTitle').textContent = journeyName;
    
    const shareLink = `${window.location.origin}${window.location.pathname}?join=${journeyId}`;
    document.getElementById('shareLink').href = shareLink;
    document.getElementById('shareLink').textContent = shareLink;

    document.getElementById('createJourney').classList.add('hidden');
    document.getElementById('endJourney').classList.remove('hidden');

    startLocationSharing();
    listenForParticipants();

    showNotification('Journey created successfully! Share the link with friends.', 'success');

  } catch (error) {
    console.error('Failed to create journey:', error);
    showNotification('Failed to create journey: ' + error.message, 'error');
  } finally {
    createButton.disabled = false;
    createButton.innerHTML = '<span style="position: relative; z-index: 10;">🚀 Start Journey</span>';
  }
}

// Join existing journey
async function joinJourney(journeyIdParam) {
  if (!journeyIdParam) return;

  try {
    const journeySnapshot = await db.ref(`journeys/${journeyIdParam}`).once('value');
    const journeyData = journeySnapshot.val();

    if (!journeyData || journeyData.status !== 'active') {
      showNotification('Journey not found or no longer active.', 'error');
      return;
    }

    document.getElementById('joinModal').classList.remove('hidden');
    
    document.getElementById('submitJoin').onclick = async () => {
      const joinUserName = document.getElementById('joinUserName').value.trim();
      
      if (!validateInput('joinUserName', 'joinUserNameError', validateUserName, 'Name must be 2-20 characters')) {
        return;
      }

      try {
        journeyId = journeyIdParam;
        userName = joinUserName;
        destinationCoords = journeyData.destination;

        if (destinationMarker) map.removeLayer(destinationMarker);
        destinationMarker = L.marker([destinationCoords.lat, destinationCoords.lng], {
          icon: L.divIcon({
            className: 'custom-div-icon',
            html: `<div style="background: var(--destructive); color: white; border-radius: 50%; width: 40px; height: 40px; display: flex; align-items: center; justify-content: center; font-weight: bold; border: 2px solid white; box-shadow: 0 2px 8px rgba(0,0,0,0.3);">🎯</div>`,
            iconSize: [40, 40],
            iconAnchor: [20, 20]
          })
        }).addTo(map);

        isJourneyActive = true;
        document.getElementById('journeyDetails').classList.remove('hidden');
        document.getElementById('journeyTitle').textContent = journeyData.name;
        
        const shareLink = `${window.location.origin}${window.location.pathname}?join=${journeyId}`;
        document.getElementById('shareLink').href = shareLink;
        document.getElementById('shareLink').textContent = shareLink;

        document.getElementById('createJourney').classList.add('hidden');
        document.getElementById('endJourney').classList.remove('hidden');
        document.getElementById('joinModal').classList.add('hidden');

        startLocationSharing();
        listenForParticipants();

        showNotification(`Joined journey: ${journeyData.name}`, 'success');

      } catch (error) {
        console.error('Failed to join journey:', error);
        showNotification('Failed to join journey. Please try again.', 'error');
      }
    };

    document.getElementById('cancelJoin').onclick = () => {
      document.getElementById('joinModal').classList.add('hidden');
      window.history.replaceState({}, '', window.location.pathname);
    };

  } catch (error) {
    console.error('Failed to fetch journey:', error);
    showNotification('Failed to load journey. Please check the link.', 'error');
  }
}

// End journey
async function endJourney() {
  if (!journeyId || !db) return;

  try {
    if (watchId) {
      navigator.geolocation.clearWatch(watchId);
      watchId = null;
    }

    await db.ref(`journeys/${journeyId}`).update({
      status: 'ended',
      endedAt: Date.now()
    });

    await db.ref(`journeys/${journeyId}/participants/${userId}`).remove();

    isJourneyActive = false;
    journeyId = null;
    destinationCoords = null;
    
    document.getElementById('journeyDetails').classList.add('hidden');
    document.getElementById('createJourney').classList.remove('hidden');
    document.getElementById('endJourney').classList.add('hidden');

    Object.values(userMarkers).forEach(marker => map.removeLayer(marker));
    Object.values(userPaths).forEach(path => map.removeLayer(path));
    if (destinationMarker) map.removeLayer(destinationMarker);
    
    userMarkers = {};
    userPaths = {};
    destinationMarker = null;

    map.setView([20.5937, 78.9629], 5);

    showNotification('Journey ended successfully.', 'success');

  } catch (error) {
    console.error('Failed to end journey:', error);
    showNotification('Failed to end journey. Please try again.', 'error');
  }
}

// Share functions
function shareViaWhatsApp() {
  const link = document.getElementById('shareLink').href;
  const message = encodeURIComponent(`Join my journey: ${document.getElementById('journeyTitle').textContent}\n\nTrack my location in real-time: ${link}`);
  window.open(`https://wa.me/?text=${message}`, '_blank');
}

function shareViaSMS() {
  const link = document.getElementById('shareLink').href;
  const message = encodeURIComponent(`Join my journey: ${document.getElementById('journeyTitle').textContent}\n\nTrack my location: ${link}`);
  window.open(`sms:?body=${message}`, '_blank');
}

function copyShareLink() {
  const link = document.getElementById('shareLink').href;
  navigator.clipboard.writeText(link).then(() => {
    showNotification('Link copied to clipboard!', 'success');
  }).catch(() => {
    showNotification('Failed to copy link. Please copy manually.', 'error');
  });
}

// Request location permission
function requestLocationPermission() {
  navigator.geolocation.getCurrentPosition(
    (position) => {
      document.getElementById('locationNotice').classList.add('hidden');
      showNotification('Location access granted!', 'success');
    },
    (error) => {
      showNotification('Location access denied. Please enable location in browser settings.', 'error');
    },
    { enableHighAccuracy: true, timeout: 10000, maximumAge: 60000 }
  );
}

// Mobile menu toggle
function toggleMobileMenu() {
  const navContainer = document.querySelector('.nav-container');
  navContainer.classList.toggle('active');
}

// Initialize app
async function initApp() {
  try {
    await loadScript('https://www.gstatic.com/firebasejs/9.23.0/firebase-app-compat.js');
    await loadScript('https://www.gstatic.com/firebasejs/9.23.0/firebase-database-compat.js');
    
    firebase.initializeApp(firebaseConfig);
    db = firebase.database();

    await loadCSS('https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.9.4/leaflet.css');
    await loadScript('https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.9.4/leaflet.js');

    initMap();

    document.getElementById('createJourney').addEventListener('click', createJourney);
    document.getElementById('endJourney').addEventListener('click', endJourney);
    document.getElementById('shareWhatsApp').addEventListener('click', shareViaWhatsApp);
    document.getElementById('shareSMS').addEventListener('click', shareViaSMS);
    document.getElementById('copyLink').addEventListener('click', copyShareLink);
    document.getElementById('requestLocation').addEventListener('click', requestLocationPermission);
    document.querySelector('.menu-btn').addEventListener('click', toggleMobileMenu);

    // Add place suggestion event listener
    const destinationInput = document.getElementById('destination');
    destinationInput.addEventListener('input', debounce(async () => {
      const query = destinationInput.value.trim();
      if (query.includes(',')) {
        hideSuggestions();
        return;
      }
      const suggestions = await fetchPlaceSuggestions(query);
      showSuggestions(suggestions);
    }, 300));

    // Hide suggestions on focusout unless clicking a suggestion
    destinationInput.addEventListener('focusout', (e) => {
      setTimeout(() => {
        if (!e.relatedTarget || !e.relatedTarget.classList.contains('suggestion-item')) {
          hideSuggestions();
        }
      }, 100);
    });

    // Check for join parameter
    const urlParams = new URLSearchParams(window.location.search);
    const joinParam = urlParams.get('join');
    if (joinParam) {
      setTimeout(() => joinJourney(joinParam), 1000);
    }

    // Check location permission
    navigator.permissions.query({name: 'geolocation'}).then((result) => {
      if (result.state === 'denied') {
        document.getElementById('locationNotice').classList.remove('hidden');
      }
    }).catch(() => {
      navigator.geolocation.getCurrentPosition(
        () => {}, // Success - do nothing
        () => document.getElementById('locationNotice').classList.remove('hidden'), // Show notice on error
        { timeout: 1000 }
      );
    });

  } catch (error) {
    console.error('Failed to initialize app:', error);
  }
}

// Debounce function for input
function debounce(func, delay) {
  let timer;
  return function(...args) {
    clearTimeout(timer);
    timer = setTimeout(() => func.apply(this, args), delay);
  };
}

// Start the app when DOM is ready
document.addEventListener('DOMContentLoaded', initApp);
  </script>
</body>
</html>