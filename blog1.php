<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>How to Plan Your Epic Travis Scott Concert Trip - Concert Circle</title>
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
            --concert-border: hsla(280, 85%, 65%, 0.3);
            --destructive: hsl(0, 62.8%, 60%);
            --muted: hsl(240, 5%, 65%);
            --border: hsl(240, 10%, 20%);
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

        .nav-container {
            display: none;
        }

        @media (min-width: 1024px) {
            .nav-container {
                display: flex;
                gap: 1.5rem;
            }
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

        .bottom-nav {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            background: hsla(240, 10%, 8%, 0.95);
            backdrop-filter: blur(10px);
            display: flex;
            justify-content: space-around;
            padding: 0.75rem 0;
            border-top: 1px solid var(--concert-border);
            z-index: 50;
        }

        @media (min-width: 1024px) {
            .bottom-nav {
                display: none;
            }
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

        .article-section {
            padding: 4rem 0;
            max-width: 900px;
            margin: 0 auto;
        }

        .article-header {
            margin-bottom: 3rem;
        }

        .article-image {
            width: 100%;
            height: 400px;
            object-fit: cover;
            border-radius: 1rem;
            margin-bottom: 2rem;
            box-shadow: 0 8px 20px hsla(240, 10%, 8%, 0.3);
        }

        .article-title {
            font-family: 'Poppins', sans-serif;
            font-size: 2.5rem;
            font-weight: 900;
            color: var(--foreground);
            text-shadow: 0 2px 4px hsla(240, 10%, 8%, 0.5);
            background: linear-gradient(45deg, var(--concert-purple), var(--concert-pink));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            margin-bottom: 1rem;
            line-height: 1.2;
        }

        .article-subtitle {
            color: var(--muted);
            font-size: 1.3rem;
            margin-bottom: 1.5rem;
            font-weight: 400;
        }

        .article-meta {
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
            align-items: center;
            color: var(--muted);
            font-size: 0.95rem;
            font-weight: 500;
            margin-bottom: 2rem;
            padding: 1rem;
            background: hsla(240, 10%, 12%, 0.5);
            border-radius: 0.75rem;
            border: 1px solid var(--concert-border);
        }

        .meta-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .article-tags {
            display: flex;
            gap: 0.75rem;
            margin-bottom: 1rem;
        }

        .article-tag {
            background: hsla(280, 85%, 65%, 0.2);
            color: var(--concert-purple);
            padding: 0.5rem 1rem;
            border-radius: 1.5rem;
            font-size: 0.9rem;
            font-weight: 600;
            border: 1px solid var(--concert-border);
        }

        .article-content {
            line-height: 1.8;
            font-size: 1.1rem;
            color: var(--foreground);
        }

        .article-content h2 {
            font-family: 'Poppins', sans-serif;
            font-size: 2rem;
            font-weight: 700;
            color: var(--concert-purple);
            margin: 2.5rem 0 1.5rem;
            padding-top: 1rem;
            border-top: 2px solid var(--concert-border);
        }

        .article-content h3 {
            font-family: 'Poppins', sans-serif;
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--concert-pink);
            margin: 2rem 0 1rem;
        }

        .article-content p {
            margin-bottom: 1.5rem;
            opacity: 0.95;
        }

        .article-content ul {
            list-style: none;
            margin: 1.5rem 0;
            padding-left: 0;
        }

        .article-content li {
            margin-bottom: 0.75rem;
            padding-left: 1.5rem;
            position: relative;
        }

        .article-content li::before {
            content: "🎵";
            position: absolute;
            left: 0;
            color: var(--concert-purple);
        }

        .article-content a {
            color: var(--primary);
            text-decoration: none;
            font-weight: 600;
            padding: 0.5rem 1rem;
            background: hsla(280, 85%, 65%, 0.1);
            border-radius: 0.5rem;
            border: 1px solid var(--concert-border);
            display: inline-block;
            margin: 0.5rem 0;
            transition: all 0.3s ease;
        }

        .article-content a:hover {
            background: hsla(280, 85%, 65%, 0.2);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px hsla(280, 85%, 65%, 0.3);
        }

        .highlight-box {
            background: linear-gradient(135deg, var(--concert-card), hsla(240, 10%, 16%, 0.8));
            border: 2px solid var(--concert-border);
            border-radius: 1rem;
            padding: 1.5rem;
            margin: 2rem 0;
            position: relative;
            overflow: hidden;
        }

        .highlight-box::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(45deg, var(--concert-purple), var(--concert-pink));
        }

        .back-to-blog {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            color: var(--muted);
            text-decoration: none;
            font-weight: 600;
            margin-bottom: 2rem;
            padding: 0.75rem 1.25rem;
            background: hsla(240, 10%, 12%, 0.5);
            border-radius: 0.75rem;
            border: 1px solid var(--concert-border);
            transition: all 0.3s ease;
        }

        .back-to-blog:hover {
            color: var(--foreground);
            background: hsla(280, 85%, 65%, 0.2);
            transform: translateY(-2px);
        }

        @media (max-width: 767px) {
            .article-title {
                font-size: 1.8rem;
            }

            .article-subtitle {
                font-size: 1.1rem;
            }

            .article-content {
                font-size: 1rem;
            }

            .article-content h2 {
                font-size: 1.6rem;
            }

            .article-content h3 {
                font-size: 1.3rem;
            }

            .article-image {
                height: 250px;
            }

            .article-meta {
                flex-direction: column;
                align-items: flex-start;
                gap: 0.5rem;
            }

            body {
                padding-bottom: 80px;
            }
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

            .article-title {
                font-size: 3rem;
            }
        }

        @media (min-width: 1024px) {
            .svg-logo {
                height: 50px;
            }

            .logo-text {
                font-size: 2.5rem;
            }

            .article-title {
                font-size: 3.5rem;
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

    <section class="article-section">
        <div class="container">
            <a href="blogs.php" class="back-to-blog">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="m12 19-7-7 7-7"></path>
                    <path d="m19 12-7 0"></path>
                </svg>
                Back to Blog
            </a>
            
            <div class="article-header">
                <img src="/img/b-1.png" alt="Travis Scott concert crowd with vibrant lights and stage setup" class="article-image">
                
                <h1 class="article-title">How to Plan Your Epic Travis Scott Concert Trip in Delhi</h1>
                <p class="article-subtitle">Your zero-stress guide to the ultimate concert experience</p>
                
                <div class="article-tags">
                    <span class="article-tag">Featured</span>
                    <span class="article-tag">Concert Guide</span>
                </div>
                
                <div class="article-meta">
                    <div class="meta-item">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                        Atri Patel
                    </div>
                    <div class="meta-item">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                            <line x1="16" y1="2" x2="16" y2="6"></line>
                            <line x1="8" y1="2" x2="8" y2="6"></line>
                            <line x1="3" y1="10" x2="21" y2="10"></line>
                        </svg>
                        August 11, 2025
                    </div>
                    <div class="meta-item">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="12" cy="12" r="10"></circle>
                            <polyline points="12,6 12,12 16,14"></polyline>
                        </svg>
                        5 min read
                    </div>
                </div>
            </div>
            
            <div class="article-content">
                <p>Picture this: It's the day Travis Scott lands in Delhi for the Circus Maximus Tour. The lights, the bass, the energy, it's everything you've been waiting for. But here's the catch: the trip isn't just about showing up at Jawaharlal Nehru Stadium. It's about making the entire weekend feel like part of the show.</p>
                
                <p>And if you've ever tried to plan a big concert trip, you already know, it's a mix of hype and headache. From locking tickets to sorting travel, finding the right stay, and figuring out how not to get lost in a new city it can feel like a full-time job.</p>
                
                <p>Let's break it down step-by-step.</p>

                <h2>Step 1: Lock in Your Tickets</h2>
                <p>Travis Scott shows sell out fast and this one already has.</p>
                
                <p>But here's the good news: we've got verified resale tickets. If you missed the official sale, you can still make it to the Circus Maximus Tour in Delhi through us.</p>
                
                <div class="highlight-box">
                    <p>🎟️ Limited resale tickets available with packages — first come, first served.</p>
                    <a href="ticket_purchase.php">Secure My Resale Ticket + Package →</a>
                </div>

                <h2>Step 2: Sort Out Your Travel Early</h2>
                <p>Delhi is well-connected - you've got flights, trains, and buses to choose from. But here's the reality: closer to the concert date, prices skyrocket.</p>
                
                <ul>
                    <li><strong>Flights:</strong> If you're coming from far, aim to land in Delhi by the night before. This way, even if there's a delay, you're safe.</li>
                    <li><strong>Trains:</strong> For mid-range budgets, trains are perfect, but book AC classes early — they sell out fast.</li>
                    <li><strong>Buses:</strong> Night buses can be a budget-friendly move, but make sure they're reputable and arrive in central Delhi.</li>
                </ul>
                
                <div class="highlight-box">
                    <p>💡 Our packages include your travel. You choose the mode, we handle the rest.</p>
                    <a href="packages.php">Explore Packages →</a>
                </div>

                <h2>Step 3: Stay Close, Stay Safe</h2>
                <p>Concert nights are electric but they also end late. You want a stay that's close enough to the action so you're not spending half the night stuck in traffic, but also in an area that's safe and vibrant.</p>
                
                <ul>
                    <li><strong>Budget stays:</strong> Shared 3-star hotels or clean guesthouses.</li>
                    <li><strong>Mid-tier comfort:</strong> 4-star hotels with easy cab access.</li>
                    <li><strong>Luxury vibes:</strong> 5-star hotels with concierge service, late check-out, and plush recovery mornings.</li>
                </ul>
                
                <div class="highlight-box">
                    <p>🛏️ Whether you're solo or rolling with a crew, there's a tier for you.</p>
                    <a href="packages.php">See Stay Options in Each Package →</a>
                </div>

                <h2>Step 4: Navigating Delhi Like a Pro</h2>
                <p>We've all been there, the show ends, the crowd floods out, and you're battling 5,000 fans for a ride & negotiating high prices. That's a lot</p>
                
                <p>Our packages include:</p>
                <ul>
                    <li>Pre-booked cabs to & from the venue</li>
                    <li>Airport transfers</li>
                    <li>Local city transport for your side plans</li>
                </ul>
                
                <p>Zero waiting. Zero haggling. Zero stress.</p>

                <h2>Step 5: Keep the Vibe Going – Before & After the Concert</h2>
                <p>This isn't just a concert — it's a weekend in Delhi. We slot in party spots, pregame lounges, and afterparty raves so you never drop the energy.</p>
                
                <ul>
                    <li><strong>Pregame:</strong> Social CP, Summer House Café, Raasta</li>
                    <li><strong>Afterparty:</strong> Kitty Su, Privee, Toy Room</li>
                    <li><strong>Chill-down cafés:</strong> Fig at Malcha, Perch Khan Market</li>
                </ul>
                
                <div class="highlight-box">
                    <p>🎉 We build these into your itinerary so you can go from concert → afterparty → recovery brunch without opening Google Maps once.</p>
                    <a href="packages.php">Get Your Curated Itinerary Plan →</a>
                </div>

                <h2>Step 6: The Zero-Stress Way to Do It All</h2>
                <p>Sure, you could DIY every step — but that means flights, stays, cabs, city research, and the occasional "Wait, is this the right venue gate?" moment. Or… you could let Concert Circle handle it.</p>

                <h3>🏆 Pick Your Travis Scott Experience Package</h3>
                <ul>
                    <li><strong>Ride to the Rage – From ₹7,499 per head</strong><br>Budget-friendly essentials for solo travelers.<br><a href="#">Book Ride to the Rage →</a></li>
                    <li><strong>Utopia Circle Mode – From ₹9,999 per head</strong><br>Group-focused for 3+ ragers<br><a href="#">Book Utopia Circle Mode →</a></li>
                    <li><strong>Astro Deluxe Drop – From ₹19,999 per head</strong><br>VIP luxury with merch, concierge, and premium travel.<br><a href="#">Book Astro Deluxe Drop →</a></li>
                </ul>
                
                <p>No stress. No missed details. Just your full focus on the music, the energy, and the moments you'll talk about for years.</p>

                <h3>Don't just attend - Experience It</h3>
                <p>When Travis Scott hits that stage, the only thing you should be thinking about is the music — not your return cab.</p>
                
                <p>Lock in your package now and make this trip a memory you'll brag about for years.</p>
                
                <div class="highlight-box">
                    <a href="packages.php" style="background: linear-gradient(45deg, var(--accent), var(--primary)); color: var(--concert-dark); padding: 1rem 2rem; border-radius: 0.75rem; font-weight: 700; font-size: 1.1rem;">🔘 Secure My Package</a>
                </div>
            </div>
        </div>
    </section>

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
</body>
</html>