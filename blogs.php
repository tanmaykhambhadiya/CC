<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Concert Circle - Blog</title>
    <link rel="icon" href="LOGO for website (circular).png" type="image/x-icon">
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

        .blog-section {
            padding: 4rem 0;
        }

        .blog-header {
            text-align: center;
            margin-bottom: 3rem;
        }

        .blog-title {
            font-family: 'Poppins', sans-serif;
            font-size: 3rem;
            font-weight: 900;
            color: var(--foreground);
            text-shadow: 0 2px 4px hsla(240, 10%, 8%, 0.5);
            background: linear-gradient(45deg, var(--concert-purple), var(--concert-pink));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .blog-subtitle {
            color: var(--muted);
            font-size: 1.3rem;
            margin-top: 0.75rem;
            font-weight: 400;
            max-width: 700px;
            margin-left: auto;
            margin-right: auto;
        }

        .blog-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 2.5rem;
            margin-top: 3rem;
        }

        .blog-card {
            background: linear-gradient(135deg, var(--concert-card), hsla(240, 10%, 16%, 0.8));
            border: 2px solid var(--concert-border);
            border-radius: 1.5rem;
            overflow: hidden;
            transition: all 0.4s ease;
            animation: fadeInUp 0.7s ease forwards;
            animation-delay: calc(var(--order) * 0.1s);
            position: relative;
            box-shadow: 0 8px 20px hsla(240, 10%, 8%, 0.3);
        }

        .blog-card:hover {
            border-color: var(--accent);
            transform: translateY(-8px);
            box-shadow: 0 12px 30px hsla(320, 70%, 60%, 0.4);
        }

        .blog-image {
            width: 100%;
            height: 220px;
            object-fit: cover;
            transition: transform 0.4s ease;
        }

        .blog-card:hover .blog-image {
            transform: scale(1.05);
        }

        .blog-content {
            padding: 1.75rem;
        }

        .blog-card-title {
            font-family: 'Poppins', sans-serif;
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--concert-purple);
            margin-bottom: 0.75rem;
            line-height: 1.3;
        }

        .blog-card-excerpt {
            color: var(--foreground);
            font-size: 1.1rem;
            line-height: 1.6;
            margin-bottom: 1.25rem;
            opacity: 0.9;
        }

        .blog-card-meta {
            display: flex;
            justify-content: space-between;
            color: var(--muted);
            font-size: 0.95rem;
            font-weight: 500;
            margin-bottom: 1rem;
        }

        .blog-card-author {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: var(--muted);
            font-size: 0.9rem;
            margin-bottom: 0.5rem;
        }

        .blog-card-tags {
            display: flex;
            gap: 0.5rem;
            margin-bottom: 1rem;
        }

        .blog-tag {
            background: hsla(280, 85%, 65%, 0.2);
            color: var(--concert-purple);
            padding: 0.25rem 0.75rem;
            border-radius: 1rem;
            font-size: 0.8rem;
            font-weight: 500;
        }

        .blog-card-readmore {
            display: inline-block;
            background: linear-gradient(45deg, var(--accent), var(--primary));
            color: var(--concert-dark);
            padding: 0.6rem 1.2rem;
            border-radius: 0.5rem;
            text-decoration: none;
            font-weight: 600;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .blog-card-readmore:hover {
            background: linear-gradient(45deg, var(--primary), var(--accent));
            transform: scale(1.05);
            box-shadow: 0 5px 15px hsla(280, 85%, 65%, 0.3);
        }

        @media (max-width: 767px) {
            .blog-title {
                font-size: 2rem;
            }

            .blog-subtitle {
                font-size: 1.1rem;
            }

            .blog-card-title {
                font-size: 1.5rem;
            }

            .blog-card-excerpt {
                font-size: 0.95rem;
            }

            .blog-card-meta {
                font-size: 0.85rem;
            }

            .blog-card-readmore {
                font-size: 0.9rem;
                padding: 0.5rem 1rem;
            }

            .blog-image {
                height: 180px;
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

            .blog-title {
                font-size: 3.5rem;
            }
        }

        @media (min-width: 1024px) {
            .svg-logo {
                height: 50px;
            }

            .logo-text {
                font-size: 2.5rem;
            }

            .blog-title {
                font-size: 4rem;
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
                    <a href="index.php" class="nav-item active">
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

    <section class="blog-section" role="region" aria-label="Blog posts">
        <div class="container">
            <div class="blog-header">
                <h2 class="blog-title">Concert Circle Blogs</h2>
                <p class="blog-subtitle">Dive into the latest news, concert hacks, and unforgettable stories from the music world.</p>
            </div>
            <div class="blog-grid">
                <div class="blog-card" style="--order: 1;">
                    <img src="/img/b6.jpg" alt="Coldplay concert commute chaos at DY Patil Stadium" class="blog-image">
                    <div class="blog-content">
                        <div class="blog-card-author">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg>
                            Atri Patel
                        </div>
                        <h3 class="blog-card-title">The Coldplay Mumbai Concert Commute Chaos</h3>
                        <p class="blog-card-excerpt">Coldplay’s Mumbai show was epic, but getting there with your crew? A nightmare. Discover how Concert Circle’s geolocation feature solves the chaos.</p>
                        <div class="blog-card-tags">
                            <span class="blog-tag">Featured</span>
                            <span class="blog-tag">Concert Guide</span>
                        </div>
                        <div class="blog-card-meta">
                            <span>August 24, 2025</span>
                            <span>5 min read</span>
                        </div>
                        <a href="blog6.php" class="blog-card-readmore" aria-label="Read more about Coldplay Mumbai concert commute chaos">Read More</a>
                    </div>
                </div>

                <div class="blog-card" style="--order: 2;">
                    <img src="/img/b5.jpg" alt="Travis Scott concert experience in Delhi" class="blog-image">
                    <div class="blog-content">
                        <div class="blog-card-author">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg>
                            Atri Patel
                        </div>
                        <h3 class="blog-card-title">A Concert Isn’t Just About 3 Hours of Music…</h3>
                        <p class="blog-card-excerpt">The real memories of Travis Scott’s Delhi concert live in the journey—road trips, inside jokes, and the chaos. Utopia Circle Mode makes it seamless.</p>
                        <div class="blog-card-tags">
                            <span class="blog-tag">Concert Experience</span>
                            <span class="blog-tag">Utopia Circle Mode</span>
                        </div>
                        <div class="blog-card-meta">
                            <span>August 24, 2025</span>
                            <span>5 min read</span>
                        </div>
                        <a href="blog5.php" class="blog-card-readmore" aria-label="Read more about Travis Scott concert experience">Read More</a>
                    </div>
                </div>

                <div class="blog-card" style="--order: 3;">
                    <img src="/img/b-1.png" alt="Travis Scott concert crowd with vibrant lights" class="blog-image">
                    <div class="blog-content">
                        <div class="blog-card-author">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg>
                            Atri Patel
                        </div>
                        <h3 class="blog-card-title">How to Plan Your Epic Travis Scott Concert Trip in Delhi</h3>
                        <p class="blog-card-excerpt">Your zero-stress guide to the ultimate concert experience. From locking tickets to sorting travel, finding the right stay, and figuring out how not to get lost in a new city.</p>
                        <div class="blog-card-tags">
                            <span class="blog-tag">Concert Guide</span>
                        </div>
                        <div class="blog-card-meta">
                            <span>August 11, 2025</span>
                            <span>5 min read</span>
                        </div>
                        <a href="blog1.php" class="blog-card-readmore" aria-label="Read more about Travis Scott concert planning">Read More</a>
                    </div>
                </div>

                <div class="blog-card" style="--order: 4;">
                    <img src="/img/b-2.jpg" alt="Concert preparation and tips" class="blog-image">
                    <div class="blog-content">
                        <div class="blog-card-author">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg>
                            Sushant Singh
                        </div>
                        <h3 class="blog-card-title">5 Tips Before Going to a Concert (So You Don't Regret It Later)</h3>
                        <p class="blog-card-excerpt">You saw that your favourite artist is coming to perform in your city. You're hyped, but then concert day hits and you realize you're unprepared. Here's how to avoid the stress.</p>
                        <div class="blog-card-tags">
                            <span class="blog-tag">Tips</span>
                        </div>
                        <div class="blog-card-meta">
                            <span>August 11, 2025</span>
                            <span>5 min read</span>
                        </div>
                        <a href="blog2.php" class="blog-card-readmore" aria-label="Read more about concert preparation tips">Read More</a>
                    </div>
                </div>

                <div class="blog-card" style="--order: 5;">
                    <img src="/img/b-3.jpg" alt="Concert crowd red flags" class="blog-image">
                    <div class="blog-content">
                        <div class="blog-card-author">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg>
                            Sushant Singh
                        </div>
                        <h3 class="blog-card-title">Red Flag? We Asked 5 People: What's Your Top Concert Red Flag?</h3>
                        <p class="blog-card-excerpt">With whom do you agree the most? We asked 5 Indian concert-goers about the one thing that instantly ruins a concert for them. Their answers might surprise you.</p>
                        <div class="blog-card-tags">
                            <span class="blog-tag">Community</span>
                        </div>
                        <div class="blog-card-meta">
                            <span>August 11, 2025</span>
                            <span>5 min read</span>
                        </div>
                        <a href="blog3.php" class="blog-card-readmore" aria-label="Read more about concert red flags">Read More</a>
                    </div>
                </div>

                <div class="blog-card" style="--order: 6;">
                    <img src="/img/b-4.jpg" alt="VIP concert tickets experience" class="blog-image">
                    <div class="blog-content">
                        <div class="blog-card-author">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg>
                            Sushant Singh
                        </div>
                        <h3 class="blog-card-title">VIP Tickets: Are They Ever Worth the $$$? The Reality I Faced!</h3>
                        <p class="blog-card-excerpt">We've all looked at VIP tickets while booking and thought: "Should I just go for it?" The price makes your soul leave your body, but are they really worth it? Here's the honest truth.</p>
                        <div class="blog-card-tags">
                            <span class="blog-tag">Reality</span>
                        </div>
                        <div class="blog-card-meta">
                            <span>August 11, 2025</span>
                            <span>5 min read</span>
                        </div>
                        <a href="blog4.php" class="blog-card-readmore" aria-label="Read more about VIP tickets reality">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <nav class="bottom-nav" id="bottomNav">
        <a href="index.php" class="bottom-nav-item active">
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

    <script>
        // Intersection Observer for animations
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.2 });

        // Initialize animations
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.blog-card').forEach(card => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(30px)';
                observer.observe(card);
            });
        });
    </script>
</body>
</html>