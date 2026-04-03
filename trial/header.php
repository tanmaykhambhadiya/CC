<?php
// session_start();
$isLoggedIn = isset($_SESSION['user']);
?>
<header>
    <link rel="stylesheet" href="styles/navbar.css" type="text/css" />
    <div class="header-container" style="display: flex; align-items: left; justify-content: space-between; width: 100%; max-width: 95%; margin: 0 auto; padding: 0 15px;">
        <!-- Logo positioned on the left -->
        <div class="logo-container" style="display: flex; align-items: center; flex: 0 0 auto;">
            <a href="https://concertcircle.com" style="text-decoration: none; color: inherit; display: flex; align-items: center;">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1600 1200" class="svg-logo" role="img" aria-label="Concert Circle Logo" style="height: 30px; width: auto; margin-right: 4px;">
                <defs>
                    <linearGradient id="logoGradient" x1="0%" y1="0%" x2="100%" y2="100%">
                        <stop offset="0%" stop-color="#4ddde0" />
                        <stop offset="50%" stop-color="#d269e6" />
                        <stop offset="100%" stop-color="#ff3131" />
                    </linearGradient>
                    <filter id="dynamicGlow">
                        <feGaussianBlur class="blur" stdDeviation="15" result="coloredBlur" />
                        <feMerge>
                            <feMergeNode in="coloredBlur" />
                            <feMergeNode in="SourceGraphic" />
                        </feMerge>
                    </filter>
                </defs>
                <g transform="translate(800, 600)">
                    <g id="circleGroup">
                        <circle cx="0" cy="0" r="450" stroke="url(#logoGradient)" stroke-width="12" fill="none" opacity="0.6" filter="url(#dynamicGlow)">
                            <animate attributeName="r" values="450;490;450" dur="4s" repeatCount="indefinite" />
                            <animate attributeName="opacity" values="0.6;0.4;0.6" dur="4s" repeatCount="indefinite" />
                        </circle>
                        <circle cx="0" cy="0" r="360" stroke="url(#logoGradient)" stroke-width="12" fill="none" opacity="0.8" filter="url(#dynamicGlow)">
                            <animate attributeName="r" values="360;400;360" dur="3s" repeatCount="indefinite" />
                            <animate attributeName="opacity" values="0.8;0.6;0.8" dur="3s" repeatCount="indefinite" />
                        </circle>
                        <circle cx="0" cy="0" r="270" stroke="url(#logoGradient)" stroke-width="12" fill="none" opacity="1" filter="url(#dynamicGlow)">
                            <animate attributeName="r" values="270;310;270" dur="2s" repeatCount="indefinite" />
                            <animate attributeName="opacity" values="1;0.7;1" dur="2s" repeatCount="indefinite" />
                        </circle>
                    </g>
                </g>
            </svg>
            <span class="logo-text">Concert Circle</span>
            </a>
        </div>
        
        <!-- Navigation menu -->
        <nav class="main-nav" style="flex: 1 1 auto; display: flex; justify-content: flex-end;">
            <ul id="navbar-menu">
                <li><a href="index.php">Home</a></li>
                <li><a href="events.php">Events</a></li>
                <li><a href="communities.php">Community</a></li>
                <li><a href="store.php">Store</a></li>
                <li><a href="blogs.php">Blogs</a></li>
                <li><a href="contactus.php">Contact</a></li>
                <?php if ($isLoggedIn): ?>
                    <li><a href="logout.php" id="logout-btn">Logout</a></li>
                <?php else: ?>
                    <li><a href="login.php" id="login-btn">Login</a></li>
                <?php endif; ?>
            </ul>
        </nav>
        
        <!-- Mobile toggle button positioned on the right -->
        <button class="menu-toggle" onclick="toggleMenu()" aria-label="Toggle navigation menu" style="display: none;">☰</button>
    </div>
    
    <style>
        /* Mobile styles */
        @media (max-width: 768px) {
    .header-container {
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
        padding: 10px 12px !important;
        max-width: 100% !important;
    }

    .logo-container {
        flex-grow: 1;
    }

    .menu-toggle {
        display: block !important;
        background: none;
        border: none;
        font-size: 26px;
        cursor: pointer;
        color: inherit;
        padding: 4px;
        margin-left: auto;
    }

    .main-nav {
        position: absolute;
        top: 100%;
        left: 0;
        right: 0;
        background: var(--bg-darkest);
        z-index: 1000;
    }

    #navbar-menu {
        display: none;
        flex-direction: column;
        width: 100%;
        margin: 0;
        padding: 0;
        list-style: none;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    #navbar-menu.active {
        display: flex;
    }

    #navbar-menu li {
        width: 100%;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }

    #navbar-menu li a {
        display: block;
        padding: 14px 20px;
        text-decoration: none;
        color: inherit;
        width: 100%;
        box-sizing: border-box;
    }

    .logo-text {
        font-size: 16px;
    }

    .svg-logo {
        height: 24px !important;
        margin-right: 6px;
    }
}

        
        /* Desktop styles */
        @media (min-width: 769px) {
            .menu-toggle {
                display: none !important;
            }
            
            #navbar-menu {
                display: flex !important;
                list-style: none;
                margin: 0;
                padding: 0;
                gap: 20px;
            }
            
            #navbar-menu li a {
                text-decoration: none;
                color: inherit;
                padding: 10px 15px;
                display: block;
            }
        }
    </style>
</header>

<script>
    function toggleMenu() {
        const menu = document.getElementById('navbar-menu');
        menu.classList.toggle('active');
    }
    
    // Close menu when clicking outside
    document.addEventListener('click', function(event) {
        const menu = document.getElementById('navbar-menu');
        const toggle = document.querySelector('.menu-toggle');
        const nav = document.querySelector('.main-nav');
        
        if (!nav.contains(event.target) && !toggle.contains(event.target)) {
            menu.classList.remove('active');
        }
    });
</script>