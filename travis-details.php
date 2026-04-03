<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Travis Scott Concert - Concert Circle</title>
    <link rel="icon" href="LOGO for website (circular).png" type="image/x-icon">
    <link rel="shortcut icon" href="LOGO for website (circular).png" type="image/x-icon">
    <link rel="icon" type="image/x-icon" href="LOGO for website (circular).png">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;900&family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
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
            --success: hsl(120, 50%, 60%);
            --glow: hsla(280, 85%, 65%, 0.15);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Open Sans', sans-serif;
            background: linear-gradient(135deg, var(--concert-dark), var(--secondary), var(--concert-dark));
            background-size: 400% 400%;
            animation: gradient 25s ease infinite;
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
            max-width: 1000px;
            margin: 0 auto;
            padding: 0 1rem;
        }

        header {
            position: sticky;
            top: 0;
            z-index: 50;
            padding: 1rem 0;
            background: hsla(240, 10%, 8%, 0.95);
            backdrop-filter: blur(14px);
            box-shadow: 0 4px 12px hsla(240, 10%, 8%, 0.5);
        }

        .header-content {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .svg-logo {
            height: 30px;
            width: auto;
            margin-right: 4px;
            transition: transform 0.4s ease, filter 0.4s ease;
        }

        .svg-logo:hover {
            transform: scale(1.15) rotate(8deg);
            filter: brightness(1.3) drop-shadow(0 0 8px var(--glow));
        }

        .logo-container {
            display: flex;
            align-items: center;
            flex: 0 0 auto;
        }

        .logo-text {
            font-family: 'Poppins', sans-serif;
            font-weight: 900;
            font-size: clamp(1.2rem, 3vw, 1.5rem);
            letter-spacing: -0.02em;
            display: flex;
            align-items: center;
            background: linear-gradient(45deg, var(--concert-purple), var(--concert-pink));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            transition: transform 0.3s ease;
        }

        .logo-container:hover .logo-text {
            transform: scale(1.05);
        }

        .logo-text .concert {
            color: var(--accent);
        }

        .logo-text .circle {
            color: var(--primary);
            margin-left: 0.25rem;
        }

        .back-button {
            background: var(--concert-card);
            border: 1px solid var(--concert-border);
            border-radius: 0.75rem;
            padding: 0.5rem 1rem;
            color: var(--foreground);
            text-decoration: none;
            font-weight: 600;
            transition: all 0.4s ease;
            position: relative;
            overflow: hidden;
        }

        .back-button:hover {
            background: var(--accent);
            transform: scale(1.05) translateY(-2px);
            box-shadow: 0 6px 16px var(--glow);
        }

        .back-button::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, hsla(320, 70%, 60%, 0.4), transparent);
            transition: 0.6s;
        }

        .back-button:hover::before {
            left: 100%;
        }

        .booking-hero {
            padding: 3.5rem 0;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .booking-hero::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, hsla(280, 85%, 65%, 0.1), transparent 70%);
            animation: pulse 10s ease infinite;
        }

        @keyframes pulse {
            0% { transform: scale(1); opacity: 0.1; }
            50% { transform: scale(1.2); opacity: 0.2; }
            100% { transform: scale(1); opacity: 0.1; }
        }

        .booking-title {
            font-family: 'Poppins', sans-serif;
            font-size: clamp(2.5rem, 5vw, 3.5rem);
            font-weight: 900;
            margin-bottom: 0.5rem;
            background: linear-gradient(45deg, var(--concert-purple), var(--accent), var(--concert-purple));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            animation: fadeInUp 1s ease forwards;
            text-shadow: 0 3px 6px hsla(240, 10%, 8%, 0.4);
        }

        .booking-subtitle {
            font-size: clamp(1rem, 2.5vw, 1.3rem);
            color: var(--muted);
            margin-bottom: 2rem;
            animation: fadeInUp 1.2s ease forwards 0.2s;
            opacity: 0;
            line-height: 1.6;
            position: relative;
            padding: 0.5rem;
        }

        .booking-subtitle::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            width: 0;
            height: 2px;
            background: var(--primary);
            transition: width 0.4s ease, left 0.4s ease;
        }

        .booking-hero:hover .booking-subtitle::after {
            width: 50%;
            left: 25%;
        }

        .booking-form-container {
            background: var(--concert-card);
            border: 1px solid var(--concert-border);
            border-radius: 1.25rem;
            padding: 2.5rem;
            margin-bottom: 2rem;
            box-shadow: 0 14px 48px hsla(240, 10%, 8%, 0.7);
            animation: fadeInUp 1.4s ease forwards 0.4s;
            opacity: 0;
            position: relative;
            overflow: hidden;
        }

        .booking-form-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: linear-gradient(90deg, var(--concert-purple), var(--concert-pink));
            animation: slideIn 2.5s ease infinite;
        }

        @keyframes slideIn {
            0% { transform: translateX(-100%); }
            50% { transform: translateX(100%); }
            100% { transform: translateX(-100%); }
        }

        .form-section {
            margin-bottom: 2.5rem;
        }

        .form-section h3 {
            font-family: 'Poppins', sans-serif;
            font-size: 1.5rem;
            color: var(--accent);
            margin-bottom: 1rem;
            font-weight: 700;
            position: relative;
            display: inline-block;
        }

        .form-section h3::after {
            content: '';
            position: absolute;
            bottom: -4px;
            left: 0;
            width: 60%;
            height: 2px;
            background: linear-gradient(90deg, var(--concert-purple), var(--concert-pink));
            transition: width 0.4s ease;
        }

        .form-section h3:hover::after {
            width: 100%;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr;
            gap: 1rem;
        }

        .form-row.two-col {
            grid-template-columns: 1fr 1fr;
        }

        .form-row.three-col {
            grid-template-columns: 1fr 1fr 1fr;
        }

        label {
            display: block;
            font-weight: 600;
            color: var(--foreground);
            margin-bottom: 0.5rem;
            font-size: 0.95rem;
            transition: color 0.3s ease;
        }

        label:hover {
            color: var(--primary);
        }

        .required {
            color: var(--destructive);
        }

        input, select, textarea {
            width: 100%;
            padding: 0.85rem;
            background: var(--secondary);
            border: 1px solid var(--concert-border);
            border-radius: 0.75rem;
            color: var(--foreground);
            font-size: 1rem;
            transition: all 0.4s ease;
            position: relative;
        }

        input:focus, select:focus, textarea:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 4px var(--glow);
            background: hsla(240, 10%, 20%, 0.95);
        }

        input::placeholder, textarea::placeholder {
            color: var(--muted);
            opacity: 0.7;
            transition: opacity 0.3s ease;
        }

        input:focus::placeholder, textarea:focus::placeholder {
            opacity: 0.4;
        }

        .group-size-selector {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(80px, 1fr));
            gap: 0.75rem;
            margin-top: 0.5rem;
        }

        .group-size-option {
            padding: 0.85rem;
            background: var(--secondary);
            border: 1px solid var(--concert-border);
            border-radius: 0.75rem;
            color: var(--foreground);
            text-align: center;
            cursor: pointer;
            transition: all 0.4s ease;
            font-weight: 600;
            position: relative;
            overflow: hidden;
        }

        .group-size-option::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, hsla(280, 85%, 65%, 0.3), transparent);
            transition: 0.6s;
        }

        .group-size-option:hover::before {
            left: 100%;
        }

        .group-size-option:hover {
            border-color: var(--primary);
            background: var(--glow);
            transform: translateY(-3px);
            box-shadow: 0 6px 16px var(--glow);
        }

        .group-size-option.selected {
            background: linear-gradient(45deg, var(--primary), var(--accent));
            color: var(--foreground);
            border-color: var(--primary);
            box-shadow: 0 6px 16px var(--glow);
        }

        .checkbox-group {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
            margin-top: 0.5rem;
        }

        .checkbox-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.85rem;
            background: var(--secondary);
            border: 1px solid var(--concert-border);
            border-radius: 0.75rem;
            cursor: pointer;
            transition: all 0.4s ease;
            position: relative;
            overflow: hidden;
        }

        .checkbox-item::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, hsla(280, 85%, 65%, 0.3), transparent);
            transition: 0.6s;
        }

        .checkbox-item:hover::before {
            left: 100%;
        }

        .checkbox-item:hover {
            border-color: var(--primary);
            background: var(--glow);
            transform: translateY(-3px);
            box-shadow: 0 6px 16px var(--glow);
        }

        .checkbox-item input[type="checkbox"] {
            width: auto;
            margin: 0;
        }

        .checkbox-item.checked {
            background: var(--glow);
            border-color: var(--primary);
            box-shadow: 0 6px 16px var(--glow);
        }

        .radio-group {
            display: flex;
            gap: 1rem;
            margin-top: 0.5rem;
        }

        .radio-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.85rem;
            background: var(--secondary);
            border: 1px solid var(--concert-border);
            border-radius: 0.75rem;
            cursor: pointer;
            transition: all 0.4s ease;
            position: relative;
            overflow: hidden;
        }

        .radio-item::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, hsla(280, 85%, 65%, 0.3), transparent);
            transition: 0.6s;
        }

        .radio-item:hover::before {
            left: 100%;
        }

        .radio-item:hover {
            border-color: var(--primary);
            background: var(--glow);
            transform: translateY(-3px);
            box-shadow: 0 6px 16px var(--glow);
        }

        .radio-item input[type="radio"] {
            width: auto;
            margin: 0;
        }

        .radio-item.selected {
            background: var(--glow);
            border-color: var(--primary);
            box-shadow: 0 6px 16px var(--glow);
        }

        .submit-button {
            width: 100%;
            background: linear-gradient(45deg, var(--accent), var(--primary));
            color: var(--foreground);
            padding: 1.2rem 2rem;
            border: none;
            border-radius: 0.75rem;
            font-weight: 700;
            font-size: 1.25rem;
            cursor: pointer;
            transition: all 0.4s ease;
            font-family: 'Poppins', sans-serif;
            position: relative;
            overflow: hidden;
        }

        .submit-button:hover {
            background: linear-gradient(45deg, var(--primary), var(--accent));
            transform: translateY(-4px);
            box-shadow: 0 14px 28px var(--glow);
        }

        .submit-button::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, hsla(320, 70%, 60%, 0.4), transparent);
            transition: 0.6s;
        }

        .submit-button:hover::before {
            left: 100%;
        }

        .submit-button:disabled {
            opacity: 0.6;
            cursor: not-allowed;
            transform: none;
        }

        .form-notes {
            background: var(--secondary);
            border: 1px solid var(--concert-border);
            border-radius: 0.75rem;
            padding: 1.2rem;
            margin-top: 2rem;
            font-size: 0.95rem;
            color: var(--foreground);
            line-height: 1.6;
            position: relative;
        }

        .form-notes::before {
            content: '';
            position: absolute;
            top: -1px;
            left: -1px;
            right: -1px;
            bottom: -1px;
            border-radius: 0.75rem;
            background: linear-gradient(45deg, var(--concert-purple), var(--concert-pink));
            opacity: 0.2;
            z-index: -1;
            transition: opacity 0.3s ease;
        }

        .form-notes:hover::before {
            opacity: 0.3;
        }

        .highlight-note {
            background: var(--secondary);
            border: 1px solid var(--primary);
            color: var(--foreground);
            padding: 1rem;
            border-radius: 0.75rem;
            margin-top: 1rem;
            font-weight: 600;
            text-align: center;
        }

        .error-message {
            color: var(--destructive);
            font-size: 0.9rem;
            margin-top: 0.25rem;
            font-weight: 600;
            animation: shake 0.3s ease;
        }

        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-5px); }
            75% { transform: translateX(5px); }
        }

        .success-message {
            background: linear-gradient(45deg, var(--success), hsla(120, 50%, 60%, 0.8));
            border: 2px solid var(--success);
            color: var(--foreground);
            padding: 1.5rem;
            border-radius: 1rem;
            margin-bottom: 1.5rem;
            text-align: center;
            font-weight: 700;
            font-size: 1.2rem;
            box-shadow: 0 8px 24px hsla(120, 50%, 60%, 0.4);
            animation: popIn 0.5s ease forwards, glowPulse 2s ease infinite;
            position: relative;
            overflow: hidden;
        }

        .success-message::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, hsla(120, 50%, 60%, 0.3), transparent);
            transition: 0.8s;
        }

        .success-message::after {
            content: '🎉';
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 2rem;
            animation: bounce 1s ease infinite;
        }

        @keyframes glowPulse {
            0% { box-shadow: 0 8px 24px hsla(120, 50%, 60%, 0.4); }
            50% { box-shadow: 0 12px 32px hsla(120, 50%, 60%, 0.6); }
            100% { box-shadow: 0 8px 24px hsla(120, 50%, 60%, 0.4); }
        }

        @keyframes bounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-5px); }
        }

        @keyframes popIn {
            0% { transform: scale(0.95); opacity: 0; }
            100% { transform: scale(1); opacity: 1; }
        }

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @media (max-width: 767px) {
            .form-row.two-col,
            .form-row.three-col {
                grid-template-columns: 1fr;
            }
            
            .group-size-selector {
                grid-template-columns: repeat(auto-fit, minmax(60px, 1fr));
            }
            
            .checkbox-group, .radio-group {
                grid-template-columns: 1fr;
            }
            
            .booking-form-container {
                padding: 1.5rem;
            }
            
            .svg-logo {
                height: 25px;
            }
        }

        @media (min-width: 768px) {
            .container { padding: 0 2rem; }
            .svg-logo {
                height: 40px;
            }
        }

        @media (min-width: 1024px) {
            .container { max-width: 1200px; }
            .svg-logo {
                height: 50px;
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
                <a href="packages.php" class="back-button">← Back to Event</a>
            </div>
        </div>
    </header>

    <main class="container">
        <section class="booking-hero">
            <h1 class="booking-title">Book Travis Scott Concert</h1>
            <p class="booking-subtitle">Fill in your details to secure your spot at this exclusive concert experience</p>
        </section>

        <div class="booking-form-container">
            <form id="bookingForm" method="POST" action="process_booking.php">
                <!-- Package Selection -->
                <div class="form-section">
                    <h3>Package Selection</h3>
                    <div class="form-group">
                        <label for="packageType">Select Package <span class="required">*</span></label>
                        <select id="packageType" name="packageType" required>
                            <option value="">Select a package</option>
                            <option value="fly-to-the-rage">Ride to the RAGE (₹7,499 per head)</option>
                            <option value="utopia-circle">UTOPIA Circle (₹9,999 per head)</option>
                            <option value="astro-deluxe-drop">Astro Deluxe Drop (₹19,999 per head)</option>
                        </select>
                        <div class="error-message" id="packageTypeError"></div>
                    </div>
                </div>

                <!-- Personal Information -->
                <div class="form-section">
                    <h3>Personal Information</h3>
                    <div class="form-row two-col">
                        <div class="form-group">
                            <label for="firstName">First Name <span class="required">*</span></label>
                            <input type="text" id="firstName" name="firstName" required>
                            <div class="error-message" id="firstNameError"></div>
                        </div>
                        <div class="form-group">
                            <label for="lastName">Last Name <span class="required">*</span></label>
                            <input type="text" id="lastName" name="lastName" required>
                            <div class="error-message" id="lastNameError"></div>
                        </div>
                    </div>
                    <div class="form-row two-col">
                        <div class="form-group">
                            <label for="email">Email Address <span class="required">*</span></label>
                            <input type="email" id="email" name="email" required>
                            <div class="error-message" id="emailError"></div>
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone Number <span class="required">*</span></label>
                            <input type="tel" id="phone" name="phone" required>
                            <div class="error-message" id="phoneError"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="sourceDestination">Source Destination <span class="required">*</span></label>
                        <input type="text" id="sourceDestination" name="sourceDestination" placeholder="City, State/Country" required>
                        <div class="error-message" id="sourceDestinationError"></div>
                    </div>
                </div>

                <!-- Group Details -->
                <div class="form-section">
                    <h3>Group Details</h3>
                    <div class="form-group">
                        <label>Group Size <span class="required">*</span></label>
                        <div class="group-size-selector">
                            <div class="group-size-option" data-size="1">1</div>
                            <div class="group-size-option" data-size="2">2</div>
                            <div class="group-size-option" data-size="3">3</div>
                            <div class="group-size-option" data-size="4">4</div>
                            <div class="group-size-option" data-size="5">5</div>
                            <div class="group-size-option" data-size="6">6+</div>
                        </div>
                        <input type="hidden" id="groupSize" name="groupSize" required>
                        <div class="error-message" id="groupSizeError"></div>
                    </div>
                </div>

                <!-- Travel & Accommodation -->
                <div class="form-section">
                    <h3>Travel & Accommodation</h3>
                    <div class="form-row two-col">
                        <div class="form-group">
                            <label for="stayDuration">Stay Duration (Nights) <span class="required">*</span></label>
                            <input type="number" id="stayDuration" name="stayDuration" min="1" required>
                            <div class="error-message" id="stayDurationError"></div>
                        </div>
                    </div>
                    <div class="form-row two-col">
                        <div class="form-group">
                            <label for="travelType">Travel Type</label>
                            <select id="travelType" name="travelType">
                                <option value="">Select travel type</option>
                                <option value="flight">Flight</option>
                                <option value="train">Train</option>
                                <option value="bus">Bus</option>
                                <option value="car">Car/Drive</option>
                                <option value="own-arrangement">Own Arrangement</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Trip Type <span class="required">*</span></label>
                            <div class="radio-group">
                                <div class="radio-item">
                                    <input type="radio" id="oneWay" name="tripType" value="one-way" required>
                                    <label for="oneWay">One Way</label>
                                </div>
                                <div class="radio-item">
                                    <input type="radio" id="roundTrip" name="tripType" value="round-trip" required>
                                    <label for="roundTrip">Round Trip</label>
                                </div>
                            </div>
                            <div class="error-message" id="tripTypeError"></div>
                        </div>
                    </div>
                </div>

                <!-- City Hangout Places -->
                <div class="form-section">
                    <h3>City Hangout Spots</h3>
                    <div class="form-group">
                        <label>Would you like to explore popular hangout places in the city?</label>
                        <div class="checkbox-group">
                            <div class="checkbox-item">
                                <input type="checkbox" id="rooftopBars" name="cityPlaces[]" value="rooftop-bars">
                                <label for="rooftopBars">🍸 Rooftop Bars & Lounges</label>
                            </div>
                            <div class="checkbox-item">
                                <input type="checkbox" id="hipsterCafes" name="cityPlaces[]" value="hipster-cafes">
                                <label for="hipsterCafes">☕ Trendy Cafes & Coffee Spots</label>
                            </div>
                            <div class="checkbox-item">
                                <input type="checkbox" id="foodTrucks" name="cityPlaces[]" value="food-trucks">
                                <label for="foodTrucks">🌮 Food Trucks & Street Food</label>
                            </div>
                            <div class="checkbox-item">
                                <input type="checkbox" id="musicVenues" name="cityPlaces[]" value="music-venues">
                                <label for="musicVenues">🎵 Local Music Venues & Clubs</label>
                            </div>
                            <div class="checkbox-item">
                                <input type="checkbox" id="artDistricts" name="cityPlaces[]" value="art-districts">
                                <label for="artDistricts">🎨 Art Districts & Galleries</label>
                            </div>
                            <div class="checkbox-item">
                                <input type="checkbox" id="shoppingSdistricts" name="cityPlaces[]" value="shopping-districts">
                                <label for="shoppingSdistricts">🛍️ Shopping Districts & Markets</label>
                            </div>
                            <div class="checkbox-item">
                                <input type="checkbox" id="nightlife" name="cityPlaces[]" value="nightlife">
                                <label for="nightlife">🌃 Nightlife & Party Spots</label>
                            </div>
                            <div class="checkbox-item">
                                <input type="checkbox" id="culturalSites" name="cityPlaces[]" value="cultural-sites">
                                <label for="culturalSites">🏛️ Cultural Sites & Landmarks</label>
                            </div>
                            <div class="checkbox-item">
                                <input type="checkbox" id="outdoorSpaces" name="cityPlaces[]" value="outdoor-spaces">
                                <label for="outdoorSpaces">🌳 Parks & Outdoor Spaces</label>
                            </div>
                            <div class="checkbox-item">
                                <input type="checkbox" id="noCityPlaces" name="cityPlaces[]" value="none">
                                <label for="noCityPlaces">❌ Just here for the concert</label>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Discount Code -->
                <div class="form-section">
                    <h3>Discount Code</h3>
                    <div class="form-row two-col">
                        <div class="form-group">
                            <label for="discountCode">Promo Code</label>
                            <input type="text" id="discountCode" name="discountCode" placeholder="Enter discount code">
                        </div>
                    </div>
                </div>

                <!-- Additional Requirements -->
                <div class="form-section">
                    <h3>Additional Requirements</h3>
                    <div class="form-group">
                        <label for="additionalRequirements">Special Requests or Requirements</label>
                        <textarea id="additionalRequirements" name="additionalRequirements" rows="4" placeholder="Dietary restrictions, accessibility needs, special occasions, etc."></textarea>
                    </div>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="submit-button" id="submitBtn">
                    Book Now - Secure Your Spot
                </button>
            </form>

            <div class="form-notes">
                <strong>Note:</strong> This is a preliminary booking. Final pricing and availability will be confirmed within 24 hours. 
                All bookings are subject to our terms and conditions. A deposit may be required to secure your reservation.
            </div>
            <div class="highlight-note">
                Package rates are tentative—final prices will be shared once our team connects with you, as flights and hotels are dynamic.
            </div>
        </div>
    </main>

    <script>
        let selectedGroupSize = 0;

        // Group size selection
        document.querySelectorAll('.group-size-option').forEach(option => {
            option.addEventListener('click', function() {
                document.querySelectorAll('.group-size-option').forEach(opt => opt.classList.remove('selected'));
                this.classList.add('selected');
                selectedGroupSize = this.dataset.size === '6+' ? 6 : parseInt(this.dataset.size);
                document.getElementById('groupSize').value = selectedGroupSize;
                updateFormBasedOnPackage();
            });
        });

        // Package selection handling
        document.getElementById('packageType').addEventListener('change', updateFormBasedOnPackage);

        function updateFormBasedOnPackage() {
            const packageType = document.getElementById('packageType').value;
            const groupSize = parseInt(document.getElementById('groupSize').value) || 0;
            const submitBtn = document.getElementById('submitBtn');

            // Skip taxis handling since field doesn't exist
            const accommodationType = document.getElementById('accommodationType');
            if (accommodationType) {
                accommodationType.disabled = true;
                accommodationType.value = '';
            }

            if (packageType === 'fly-to-the-rage') {
                if (accommodationType) accommodationType.value = 'standard-hotel';
                if (groupSize > 1) {
                    document.getElementById('groupSizeError').textContent = 'This package is for solo or budget fans (1 person only)';
                    submitBtn.disabled = true;
                } else {
                    document.getElementById('groupSizeError').textContent = '';
                    submitBtn.disabled = false;
                }
            } else if (packageType === 'utopia-circle') {
                if (accommodationType) accommodationType.value = 'premium-hotel';
                if (groupSize < 3) {
                    document.getElementById('groupSizeError').textContent = 'This package requires a group of 3 or more';
                    submitBtn.disabled = true;
                } else {
                    document.getElementById('groupSizeError').textContent = '';
                    submitBtn.disabled = false;
                }
            } else if (packageType === 'astro-deluxe-drop') {
                if (accommodationType) accommodationType.value = 'luxury-hotel';
                document.getElementById('groupSizeError').textContent = '';
                submitBtn.disabled = false;
            } else {
                if (accommodationType) accommodationType.disabled = false;
                document.getElementById('groupSizeError').textContent = '';
                submitBtn.disabled = false;
            }
        }

        // Checkbox handling
        document.querySelectorAll('.checkbox-item').forEach(item => {
            const checkbox = item.querySelector('input[type="checkbox"]');
            
            item.addEventListener('click', function(e) {
                if (e.target.type !== 'checkbox') {
                    checkbox.checked = !checkbox.checked;
                }
                
                if (checkbox.checked) {
                    item.classList.add('checked');
                } else {
                    item.classList.remove('checked');
                }
                
                // Handle "Just here for the concert" exclusivity for city places
                if (checkbox.value === 'none' && checkbox.name === 'cityPlaces[]' && checkbox.checked) {
                    document.querySelectorAll('input[name="cityPlaces[]"]').forEach(cb => {
                        if (cb.value !== 'none') {
                            cb.checked = false;
                            cb.closest('.checkbox-item').classList.remove('checked');
                        }
                    });
                } else if (checkbox.name === 'cityPlaces[]' && checkbox.value !== 'none' && checkbox.checked) {
                    const noneCheckbox = document.querySelector('input[name="cityPlaces[]"][value="none"]');
                    if (noneCheckbox) {
                        noneCheckbox.checked = false;
                        noneCheckbox.closest('.checkbox-item').classList.remove('checked');
                    }
                }
            });
        });

        // Radio button handling
        document.querySelectorAll('.radio-item').forEach(item => {
            const radio = item.querySelector('input[type="radio"]');
            
            item.addEventListener('click', function(e) {
                if (e.target.type !== 'radio') {
                    radio.checked = true;
                }
                
                document.querySelectorAll('.radio-item').forEach(r => r.classList.remove('selected'));
                if (radio.checked) {
                    item.classList.add('selected');
                }
            });
        });

        // Form validation and submission
        document.getElementById('bookingForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            let isValid = true;
            const submitBtn = document.getElementById('submitBtn');
            
            // Clear previous errors
            document.querySelectorAll('.error-message').forEach(error => error.textContent = '');
            
            // Validate required fields
            const requiredFields = ['packageType', 'firstName', 'lastName', 'email', 'phone', 'sourceDestination', 'stayDuration'];
            requiredFields.forEach(field => {
                const input = document.getElementById(field);
                if (!input.value) {
                    document.getElementById(field + 'Error').textContent = 'This field is required';
                    isValid = false;
                }
            });
            
            // Validate tripType radio buttons
            if (!document.querySelector('input[name="tripType"]:checked')) {
                document.getElementById('tripTypeError').textContent = 'Please select a trip type (One Way or Round Trip)';
                isValid = false;
            }
            
            // Validate email format
            const email = document.getElementById('email').value;
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (email && !emailRegex.test(email)) {
                document.getElementById('emailError').textContent = 'Please enter a valid email address';
                isValid = false;
            }
            
            // Validate group size
            if (!selectedGroupSize) {
                document.getElementById('groupSizeError').textContent = 'Please select group size';
                isValid = false;
            } else {
                const packageType = document.getElementById('packageType').value;
                if (packageType === 'fly-to-the-rage' && selectedGroupSize > 1) {
                    document.getElementById('groupSizeError').textContent = 'This package is for solo or budget fans (1 person only)';
                    isValid = false;
                } else if (packageType === 'utopia-circle' && selectedGroupSize < 3) {
                    document.getElementById('groupSizeError').textContent = 'This package requires a group of 3 or more';
                    isValid = false;
                }
            }
            
            // Validate stay duration
            const stayDuration = document.getElementById('stayDuration').value;
            if (stayDuration && parseInt(stayDuration) < 1) {
                document.getElementById('stayDurationError').textContent = 'Stay duration must be at least 1 night';
                isValid = false;
            }
            
            if (isValid) {
                const formData = new FormData(this);
                console.log('Form Data:', Object.fromEntries(formData.entries()));
                submitBtn.disabled = true;
                submitBtn.textContent = 'Submitting...';
                
                fetch('process_booking.php', { 
                    method: 'POST',
                    body: formData
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error(`HTTP error! Status: ${response.status}`);
                    }
                    return response.json();
                })
                .then(data => {
                    console.log('Response:', data);
                    const formContainer = document.querySelector('.booking-form-container');
                    
                    if (data.success) {
                        const successDiv = document.createElement('div');
                        successDiv.className = 'success-message';
                        successDiv.textContent = 'Booking submitted successfully! We\'ll contact you within 24 hours to confirm your reservation.';
                        formContainer.insertBefore(successDiv, this);
                        
                        this.reset();
                        submitBtn.textContent = 'Book Now - Secure Your Spot';
                        submitBtn.disabled = false;
                        
                        document.querySelectorAll('.group-size-option').forEach(opt => opt.classList.remove('selected'));
                        selectedGroupSize = 0;
                        
                        document.querySelectorAll('.checkbox-item').forEach(item => item.classList.remove('checked'));
                        
                        document.querySelectorAll('.radio-item').forEach(item => item.classList.remove('selected'));
                        
                        setTimeout(() => {
                            successDiv.scrollIntoView({ behavior: 'smooth' });
                        }, 100);
                    } else {
                        const errorDiv = document.createElement('div');
                        errorDiv.className = 'error-message';
                        errorDiv.style.marginBottom = '1rem';
                        errorDiv.textContent = data.message || 'An error occurred while submitting your booking. Please check your input and try again.';
                        formContainer.insertBefore(errorDiv, this);
                        errorDiv.scrollIntoView({ behavior: 'smooth' });
                        submitBtn.textContent = 'Book Now - Secure Your Spot';
                        submitBtn.disabled = false;
                    }
                })
                .catch(error => {
                    console.error('Fetch error:', error.message, error.stack);
                    const errorDiv = document.createElement('div');
                    errorDiv.className = 'error-message';
                    errorDiv.style.marginBottom = '1rem';
                    errorDiv.textContent = 'An error occurred while submitting your booking: ' + error.message;
                    formContainer.insertBefore(errorDiv, this);
                    errorDiv.scrollIntoView({ behavior: 'smooth' });
                    submitBtn.textContent = 'Book Now - Secure Your Spot';
                    submitBtn.disabled = false;
                });
            }
        });
    </script>
</body>
</html>