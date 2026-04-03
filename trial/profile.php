<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile & Account - MusicMeet</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700;900&display=swap" rel="stylesheet">
    <style>
    
    .menu-toggle {
    display: none;
    background: transparent;
    border: none;
    color: var(--text-color);
    font-size: 1.5rem;
    cursor: pointer;
    z-index: 1002;
}

/* Improved Media Queries */
@media (max-width: 768px) {
    header {
        padding: 10px 20px;
    }

    .nav-links {
        display: none;
        position: fixed;
        top: 70px;
        left: 0;
        width: 100%;
        height: calc(100vh - 70px);
        background-color: rgba(18, 18, 18, 0.98);
        backdrop-filter: blur(10px);
        flex-direction: column;
        padding: 20px;
        z-index: 999;
        overflow-y: auto;
        transition: all 0.3s ease;
    }

    .nav-links.active {
        display: flex;
    }

    .nav-links a {
        padding: 15px;
        width: 100%;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }

    .menu-toggle {
        display: block;
        margin-left: auto;
        margin-right: 15px;
    }

    .user-menu {
        margin-left: 0;
    }

    main {
        padding-top: 80px;
        padding-left: 15px;
        padding-right: 15px;
    }

    .page-title {
        font-size: 1.8rem;
        flex-direction: column;
        align-items: flex-start;
        gap: 15px;
    }

    .profile-header {
        flex-direction: column;
        align-items: center;
        text-align: center;
    }

    .profile-stats {
        justify-content: center;
        flex-wrap: wrap;
    }

    .grid {
        grid-template-columns: 1fr;
    }

    .card {
        padding: 15px;
    }

    .modal {
        width: 95%;
    }

    .form-group {
        margin-bottom: 15px;
    }

    .btn {
        width: 100%;
        justify-content: center;
        margin-bottom: 10px;
    }

    .modal-footer {
        flex-direction: column;
    }

    .modal-footer .btn {
        margin-bottom: 0;
    }

    .item-img {
        height: 150px;
    }

    .tab-nav {
        overflow-x: auto;
        padding-bottom: 5px;
    }

    .tab-link {
        padding: 10px 15px;
        white-space: nowrap;
    }
}

/* Add small tablet media query for better gradation */
@media (min-width: 769px) and (max-width: 991px) {
    .grid {
        grid-template-columns: repeat(2, 1fr);
    }

    main {
        padding: 100px 20px 20px;
    }

    .menu-toggle {
        display: none;
    }
}

/* Fix the larger screen display */
@media (min-width: 992px) {
    .menu-toggle {
        display: none;
    }

    main {
        padding-top: 120px;
    }
}
        :root {
            --primary-gradient: linear-gradient(45deg, #ff3131, #d269e6);
            --secondary-gradient: linear-gradient(45deg, #4ddde0, #52bdfb);
            --highlight-color: #ffd700;
            --dark-bg: #121212;
            --card-bg: rgba(255, 255, 255, 0.1);
            --text-color: #ffffff;
            --muted-text: #bbb;
            --accent-color: #d269e6;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Montserrat', sans-serif;
        }

        body {
            background-color: var(--dark-bg);
            color: var(--text-color);
            line-height: 1.6;
            min-height: 100vh;
        }

        header {
    background: rgba(18, 18, 18, 0.95);
    backdrop-filter: blur(10px);
    padding: 8px 20px; /* Further reduced padding */
    position: fixed;
    width: 100%;
    top: 0;
    z-index: 1000;
    box-shadow: 0 2px 15px rgba(0, 0, 0, 0.4);
    display: flex;
    justify-content: space-between;
    align-items: center;
    height: 50px; /* Reduced height */
}

main {
    padding-top: 90px; /* Significantly increased top padding */
    max-width: 1200px;
    margin: 0 auto;
    padding: 90px 2rem 2rem 2rem; /* Adjusted top padding */
}

/* You might also need to adjust this class */
.page {
    margin-top: 20px; /* Add margin to page content */
    padding-top: 20px;
}

/* And specifically for profile page */
.profile-header {
    margin-top: 30px;
}

        header .logo {
            font-size: 1.8rem;
            font-weight: 900;
            color: var(--highlight-color);
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .nav-links {
            display: flex;
            gap: 25px;
            align-items: center;
        }

        .nav-links a {
            color: var(--text-color);
            text-decoration: none;
            font-weight: 600;
            padding: 8px 16px;
            border-radius: 25px;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .nav-links a:hover {
            background-color: rgba(210, 105, 230, 0.3);
            color: var(--highlight-color);
        }

        .user-menu {
            position: relative;
            display: flex;
            align-items: center;
        }

        .user-icon {
            width: 40px;
            height: 40px;
            background-color: var(--accent-color);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s;
        }

        .user-icon:hover {
            transform: scale(1.1);
            box-shadow: 0 0 10px rgba(210, 105, 230, 0.5);
        }

        .user-dropdown {
            position: absolute;
            top: 50px;
            right: 0;
            background-color: rgba(0, 0, 0, 0.95);
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
            min-width: 200px;
            display: none;
            z-index: 1001;
        }

        .user-dropdown.active {
            display: block;
            animation: fadeIn 0.3s ease;
        }

        .user-dropdown ul {
            list-style: none;
        }

        .user-dropdown a {
            color: var(--text-color);
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 15px;
            transition: all 0.3s;
        }

        .user-dropdown a:hover {
            background-color: rgba(210, 105, 230, 0.2);
            color: var(--highlight-color);
        }

        main {
            padding-top: 100px;
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
        }

        .page {
            display: none;
        }

        .page.active {
            display: block;
        }

        .page-title {
            font-size: 2.2rem;
            font-weight: 900;
            margin-bottom: 40px;
            color: var(--highlight-color);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .card {
            background-color: var(--card-bg);
            border-radius: 15px;
            padding: 20px;
            margin-bottom: 30px;
            transition: all 0.3s ease;
            border: 1px solid rgba(210, 105, 230, 0.3);
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }

        .card-title {
            font-size: 1.3rem;
            font-weight: bold;
                   color: var(--highlight-color);
            margin-bottom: 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .btn {
            background: var(--primary-gradient);
            color: var(--text-color);
            border: none;
            padding: 10px 20px;
            border-radius: 50px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn:hover {
            background: linear-gradient(45deg, #d269e6, #ff3131);
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .btn-outline {
            background: transparent;
            border: 1px solid var(--accent-color);
            color: var(--text-color);
        }

        .btn-outline:hover {
            background: rgba(210, 105, 230, 0.2);
            border-color: var(--highlight-color);
        }

        .btn-danger {
            background: linear-gradient(45deg, #ff3131, #d269e6);
        }

        .btn-danger:hover {
            background: linear-gradient(45deg, #d269e6, #ff3131);
        }

        .btn-sm {
            padding: 8px 16px;
            font-size: 0.9rem;
        }

        .profile-header {
            display: flex;
            gap: 2rem;
            margin-bottom: 2rem;
        }

        .profile-pic {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid var(--accent-color);
        }

        .profile-name {
            font-size: 2rem;
            font-weight: 900;
            color: var(--highlight-color);
            margin-bottom: 0.5rem;
        }

        .profile-bio {
            color: var(--muted-text);
            margin-bottom: 1rem;
        }

        .profile-stats {
            display: flex;
            gap: 2rem;
        }

        .stat-number {
            font-size: 1.5rem;
            font-weight: bold;
            color: var(--highlight-color);
        }

        .stat-label {
            font-size: 0.9rem;
            color: var(--muted-text);
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 30px;
        }

        .item-card {
            background-color: var(--card-bg);
            border-radius: 15px;
            overflow: hidden;
            transition: all 0.3s ease;
            border: 1px solid rgba(77, 221, 224, 0.3);
        }

        .item-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.3);
            border-color: var(--accent-color);
        }

        .item-img {
            width: 100%;
            height: 180px;
            object-fit: cover;
        }

        .item-content {
            padding: 20px;
        }

        .item-title {
            font-size: 1.3rem;
            font-weight: bold;
            color: var(--highlight-color);
            margin-bottom: 10px;
        }

        .item-subtitle {
            color: var(--muted-text);
            font-size: 0.9rem;
            margin-bottom: 15px;
        }

        .item-meta {
            display: flex;
            justify-content: space-between;
            font-size: 0.9rem;
            color: var(--muted-text);
        }

        .activity-item {
            display: flex;
            gap: 1rem;
            margin-bottom: 1rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .activity-icon {
            width: 40px;
            height: 40px;
            background-color: rgba(210, 105, 230, 0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--accent-color);
        }

        .activity-text {
            margin-bottom: 0.5rem;
        }

        .activity-time {
            color: var(--muted-text);
            font-size: 0.8rem;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: var(--text-color);
        }

        .form-control {
            width: 100%;
            padding: 12px 15px;
            background-color: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 8px;
            color: var(--text-color);
            font-size: 1rem;
            transition: all 0.3s;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--accent-color);
            background-color: rgba(255, 255, 255, 0.15);
        }

        .form-check {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 0.5rem;
        }

        .tab-nav {
            display: flex;
            gap: 20px;
            margin-bottom: 2rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .tab-link {
            padding-bottom: 10px;
            cursor: pointer;
            transition: all 0.3s;
            color: var(--text-color);
        }

        .tab-link:hover {
            color: var(--highlight-color);
        }

        .tab-link.active {
            color: var(--highlight-color);
            position: relative;
        }

        .tab-link.active::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 3px;
            background-color: var(--highlight-color);
            border-radius: 3px;
        }

        .tab-content {
            display: none;
        }

        .tab-content.active {
            display: block;
        }

        .modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.8);
            display: none;
            align-items: center;
            justify-content: center;
            z-index: 1000;
        }

        .modal-overlay.active {
            display: flex;
        }

        .modal {
            background-color: var(--dark-bg);
            width: 90%;
            max-width: 500px;
            border-radius: 15px;
            overflow: hidden;
            position: relative;
            transform: scale(0.9);
            transition: all 0.3s ease;
        }

        .modal-overlay.active .modal {
            transform: scale(1);
        }

        .modal-header {
            padding: 20px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .modal-title {
            font-size: 1.8rem;
            color: var(--highlight-color);
            font-weight: 700;
        }

        .modal-close {
            background: rgba(0, 0, 0, 0.5);
            width: 30px;
            height: 30px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            color: var(--text-color);
            cursor: pointer;
            border: none;
            transition: all 0.3s;
        }

        .modal-close:hover {
            background: rgba(210, 105, 230, 0.2);
        }

        .modal-body {
            padding: 20px;
        }

        .modal-footer {
            padding: 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            display: flex;
            justify-content: flex-end;
            gap: 15px;
        }

        .tags {
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem;
            margin-top: 0.5rem;
        }

        .tag {
            background-color: rgba(210, 105, 230, 0.2);
            padding: 0.3rem 0.8rem;
            border-radius: 20px;
            font-size: 0.8rem;
            color: var(--text-color);
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @media (max-width: 768px) {
            header {
                padding: 10px 20px;
                flex-wrap: wrap;
            }

            .nav-links {
                display: none;
                position: absolute;
                top: 100%;
                left: 0;
                width: 100%;
                background-color: rgba(0, 0, 0, 0.95);
                flex-direction: column;
                padding: 20px;
            }

            .nav-links.active {
                display: flex;
            }

            .menu-toggle {
                display: block;
            }

            .user-menu {
                margin-left: auto;
            }

            .profile-header {
                flex-direction: column;
                align-items: center;
                text-align: center;
            }

            .grid {
                grid-template-columns: 1fr;
            }
        }

        @media (min-width: 769px) {
            .menu-toggle {
                display: none;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="logo">MusicMeet</div>
        <div class="nav-links" id="navLinks">
            <a href="index.php" onclick="showPage('profile')"><i class="fas fa-home"></i> Home</a>
            <a href="#" onclick="showPage('events')"><i class="fas fa-calendar"></i> Events</a>
            <a href="#" onclick="showPage('communities')"><i class="fas fa-users"></i> Communities</a>
            <a href="#" onclick="showPage('discover')"><i class="fas fa-search"></i> Discover</a>
        </div>
        <div class="user-menu">
            <div class="user-icon">JS</div>
            <div class="user-dropdown">
                <ul>
                    <li><a href="#" onclick="showPage('profile')"><i class="fas fa-user"></i> My Profile</a></li>
                    <li><a href="#" onclick="showPage('events')"><i class="fas fa-calendar"></i> My Events</a></li>
                    <li><a href="#" onclick="showPage('communities')"><i class="fas fa-users"></i> My Communities</a></li>
                    <li><a href="#" onclick="showPage('settings')"><i class="fas fa-cog"></i> Settings</a></li>
                    <li><a href="#"><i class="fas fa-sign-out-alt"></i> Log Out</a></li>
                </ul>
            </div>
        </div>
    </header>

    <main>
        <!-- Profile Page -->
        <div id="profile-page" class="page active">
            <div class="page-title">
                <h1>My Profile</h1>
                <button class="btn" onclick="openModal('edit-profile-modal')"><i class="fas fa-edit"></i> Edit Profile</button>
            </div>
            <div class="profile-header">
                <img src="https://via.placeholder.com/150" alt="Profile Picture" class="profile-pic">
                <div class="profile-info">
                    <h2 class="profile-name">John Smith</h2>
                    <p class="profile-bio">Music enthusiast and event organizer based in New York City. I love indie rock, jazz, and electronic music. Always looking for new sounds and experiences!</p>
                    <div class="profile-stats">
                        <div class="stat">
                            <div class="stat-number">24</div>
                            <div class="stat-label">Events Attended</div>
                        </div>
                        <div class="stat">
                            <div class="stat-number">8</div>
                            <div class="stat-label">Communities</div>
                        </div>
                        <div class="stat">
                            <div class="stat-number">156</div>
                            <div class="stat-label">Connections</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-title">
                    <span>Music Preferences</span>
                    <button class="btn btn-outline btn-sm" onclick="openModal('edit-music-preferences-modal')"><i class="fas fa-edit"></i> Edit</button>
                </div>
                <div class="tags">
                    <span class="tag">Indie Rock</span>
                    <span class="tag">Alternative</span>
                    <span class="tag">Jazz</span>
                    <span class="tag">Electronic</span>
                    <span class="tag">Hip-Hop</span>
                    <span class="tag">Classical</span>
                </div>
            </div>

            <div class="card">
                <div class="card-title">
                    <span>Upcoming Events</span>
                    <a href="#" onclick="showPage('events')" class="btn btn-outline btn-sm"><i class="fas fa-calendar"></i> See All</a>
                </div>
                <div class="grid">
                    <div class="item-card">
                        <img src="https://via.placeholder.com/300x150" alt="Event Image" class="item-img">
                        <div class="item-content">
                            <div class="item-title">Summer Jazz Festival</div>
                            <div class="item-subtitle">Central Park, New York</div>
                            <div class="item-meta">
                                <span><i class="fas fa-calendar"></i> Apr 15, 2025</span>
                                <span><i class="fas fa-users"></i> 240 attending</span>
                            </div>
                        </div>
                    </div>
                    <div class="item-card">
                        <img src="https://via.placeholder.com/300x150" alt="Event Image" class="item-img">
                        <div class="item-content">
                            <div class="item-title">Indie Night Live</div>
                            <div class="item-subtitle">Brooklyn Bowl, New York</div>
                            <div class="item-meta">
                                <span><i class="fas fa-calendar"></i> Apr 22, 2025</span>
                                <span><i class="fas fa-users"></i> 180 attending</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-title">
                    <span>Communities Joined</span>
                    <a href="#" onclick="showPage('communities')" class="btn btn-outline btn-sm"><i class="fas fa-users"></i> See All</a>
                </div>
                <div class="grid">
                    <div class="item-card">
                        <img src="https://via.placeholder.com/300x150" alt="Community Image" class="item-img">
                        <div class="item-content">
                            <div class="item-title">New York Jazz Lovers</div>
                            <div class="item-subtitle">2,456 members</div>
                            <div class="item-meta">
                                <span><i class="fas fa-calendar"></i> 3 upcoming events</span>
                            </div>
                        </div>
                    </div>
                    <div class="item-card">
                        <img src="https://via.placeholder.com/300x150" alt="Community Image" class="item-img">
                        <div class="item-content">
                            <div class="item-title">Electronic Music NYC</div>
                            <div class="item-subtitle">1,823 members</div>
                            <div class="item-meta">
                                <span><i class="fas fa-calendar"></i> 5 upcoming events</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-title">
                    <span>Activity Feed</span>
                </div>
                <div class="activity-feed">
                    <div class="activity-item">
                        <div class="activity-icon">
                            <i class="fas fa-ticket-alt"></i>
                        </div>
                        <div class="activity-content">
                            <div class="activity-text">You RSVP'd to <strong>Summer Jazz Festival</strong></div>
                            <div class="activity-time">2 days ago</div>
                        </div>
                    </div>
                    <div class="activity-item">
                        <div class="activity-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="activity-content">
                            <div class="activity-text">You joined <strong>Electronic Music NYC</strong> community</div>
                            <div class="activity-time">1 week ago</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Events Page -->
        <div id="events-page" class="page">
            <div class="page-title">
                <h1>My Events</h1>
            </div>

            <div class="tab-nav">
                <div class="tab-link active" onclick="showTab('upcoming-events')">Upcoming</div>
                <div class="tab-link" onclick="showTab('past-events')">Past</div>
                <div class="tab-link" onclick="showTab('saved-events')">Saved</div>
                <div class="tab-link" onclick="showTab('organizing-events')">Organizing</div>
            </div>

            <div id="upcoming-events" class="tab-content active">
                <div class="grid">
                    <div class="item-card">
                        <img src="https://via.placeholder.com/300x150" alt="Event Image" class="item-img">
                        <div class="item-content">
                            <div class="item-title">Summer Jazz Festival</div>
                            <div class="item-subtitle">Central Park, New York</div>
                            <div class="item-meta">
                                <span><i class="fas fa-calendar"></i> Apr 15, 2025</span>
                                <span><i class="fas fa-users"></i> 240 attending</span>
                            </div>
                            <button class="btn btn-outline btn-sm" style="margin-top: 10px" onclick="openModal('event-details-modal')">View Details</button>
                        </div>
                    </div>
                    <div class="item-card">
                        <img src="https://via.placeholder.com/300x150" alt="Event Image" class="item-img">
                        <div class="item-content">
                            <div class="item-title">Indie Night Live</div>
                            <div class="item-subtitle">Brooklyn Bowl, New York</div>
                            <div class="item-meta">
                                <span><i class="fas fa-calendar"></i> Apr 22, 2025</span>
                                <span><i class="fas fa-users"></i> 180 attending</span>
                            </div>
                            <button class="btn btn-outline btn-sm" style="margin-top: 10px" onclick="openModal('event-details-modal')">View Details</button>
                        </div>
                    </div>
                </div>
            </div>

            <div id="past-events" class="tab-content">
                <div class="grid">
                    <div class="item-card">
                        <img src="https://via.placeholder.com/300x150" alt="Event Image" class="item-img">
                        <div class="item-content">
                            <div class="item-title">Electronic Music Night</div>
                            <div class="item-subtitle">Output, Brooklyn</div>
                            <div class="item-meta">
                                <span><i class="fas fa-calendar"></i> Mar 15, 2025</span>
                                <span><i class="fas fa-users"></i> The event has ended</span>
                            </div>
                            <button class="btn btn-outline btn-sm" style="margin-top: 10px" onclick="openModal('event-details-modal')">View Details</button>
                        </div>
                    </div>
                </div>
            </div>

            <div id="saved-events" class="tab-content">
                <div class="grid">
                    <div class="item-card">
                        <img src="https://via.placeholder.com/300x150" alt="Event Image" class="item-img">
                        <div class="item-content">
                            <div class="item-title">Summer Rock Festival</div>
                            <div class="item-subtitle">Randall's Island, New York</div>
                            <div class="item-meta">
                                <span><i class="fas fa-calendar"></i> Jun 10, 2025</span>
                                <span><i class="fas fa-users"></i> 1200+ attending</span>
                            </div>
                            <button class="btn btn-outline btn-sm" style="margin-top: 10px" onclick="openModal('event-details-modal')">View Details</button>
                        </div>
                    </div>
                </div>
            </div>

            <div id="organizing-events" class="tab-content">
                <div class="card">
                    <div class="card-title">
                        <span>Events You're Organizing</span>
                        <button class="btn" onclick="openModal('create-event-modal')"><i class="fas fa-plus"></i> Create Event</button>
                    </div>
                    <div class="grid">
                        <div class="item-card">
                            <img src="https://via.placeholder.com/300x150" alt="Event Image" class="item-img">
                            <div class="item-content">
                                <div class="item-title">Indie Music Showcase</div>
                                <div class="item-subtitle">Williamsburg, Brooklyn</div>
                                <div class="item-meta">
                                    <span><i class="fas fa-calendar"></i> May 20, 2025</span>
                                    <span><i class="fas fa-users"></i> 45 RSVP'd</span>
                                </div>
                                <button class="btn btn-outline btn-sm" style="margin-top: 10px" onclick="openModal('manage-event-modal')">Manage Event</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Communities Page -->
        <div id="communities-page" class="page">
            <div class="page-title">
                <h1>My Communities</h1>
                <button class="btn" onclick="openModal('create-community-modal')"><i class="fas fa-plus"></i> Create Community</button>
            </div>

            <div class="card">
                <div class="card-title">Communities I've Joined</div>
                <div class="grid">
                    <div class="item-card">
                        <img src="https://via.placeholder.com/300x150" alt="Community Image" class="item-img">
                        <div class="item-content">
                            <div class="item-title">New York Jazz Lovers</div>
                            <div class="item-subtitle">2,456 members</div>
                            <div class="item-meta">
                                <span><i class="fas fa-calendar"></i> 3 upcoming events</span>
                            </div>
                            <button class="btn btn-outline btn-sm" style="margin-top: 10px" onclick="openModal('community-details-modal')">View Community</button>
                        </div>
                    </div>
                    <div class="item-card">
                        <img src="https://via.placeholder.com/300x150" alt="Community Image" class="item-img">
                        <div class="item-content">
                            <div class="item-title">Electronic Music NYC</div>
                            <div class="item-subtitle">1,823 members</div>
                            <div class="item-meta">
                                <span><i class="fas fa-calendar"></i> 5 upcoming events</span>
                            </div>
                            <button class="btn btn-outline btn-sm" style="margin-top: 10px" onclick="openModal('community-details-modal')">View Community</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-title">Community Activity Feed</div>
                <div class="activity-feed">
                    <div class="activity-item">
                        <div class="activity-icon">
                            <i class="fas fa-calendar"></i>
                        </div>
                        <div class="activity-content">
                            <div class="activity-text"><strong>New York Jazz Lovers</strong> posted a new event: Jazz in the Park</div>
                            <div class="activity-time">3 days ago</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Settings Page -->
        <div id="settings-page" class="page">
            <div class="page-title">
                <h1>Account Settings</h1>
            </div>

            <div class="tab-nav">
                <div class="tab-link active" onclick="showTab('profile-settings')">Profile</div>
                <div class="tab-link" onclick="showTab('account-settings')">Account</div>
                <div class="tab-link" onclick="showTab('privacy-settings')">Privacy</div>
                <div class="tab-link" onclick="showTab('notification-settings')">Notifications</div>
            </div>

            <div id="profile-settings" class="tab-content active">
                <div class="card">
                    <div class="card-title">Profile Information</div>
                    <form>
                        <div class="form-group">
                            <label for="fullname" class="form-label">Full Name</label>
                            <input type="text" id="fullname" class="form-control" value="John Smith">
                        </div>
                        <div class="form-group">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" id="username" class="form-control" value="johnsmith">
                        </div>
                        <div class="form-group">
                            <label for="bio" class="form-label">Bio</label>
                            <textarea id="bio" class="form-control" rows="4">Music enthusiast and event organizer based in New York City. I love indie rock, jazz, and electronic music. Always looking for new sounds and experiences!</textarea>
                        </div>
                        <div class="form-group">
                            <label for="location" class="form-label">Location</label>
                            <input type="text" id="location" class="form-control" value="New York, NY">
                        </div>
                        <button type="submit" class="btn">Save Changes</button>
                    </form>
                </div>
            </div>

            <div id="account-settings" class="tab-content">
                <div class="card">
                    <div class="card-title">Login Information</div>
                    <form>
                        <div class="form-group">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" id="email" class="form-control" value="john.smith@example.com">
                        </div>
                        <div class="form-group">
                            <label for="current-password" class="form-label">Current Password</label>
                            <input type="password" id="current-password" class="form-control">
                        </div>
                        <button type="submit" class="btn">Update Password</button>
                    </form>
                </div>
            </div>

            <div id="privacy-settings" class="tab-content">
                <div class="card">
                    <div class="card-title">Privacy Settings</div>
                    <div class="form-group">
                        <label class="form-label">Profile Visibility</label>
                        <div class="form-check">
                            <input type="radio" name="profile-visibility" id="visibility-public" checked>
                            <label for="visibility-public">Public</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" name="profile-visibility" id="visibility-members">
                            <label for="visibility-members">Members Only</label>
                        </div>
                    </div>
                    <button class="btn">Save Privacy Settings</button>
                </div>
            </div>

            <div id="notification-settings" class="tab-content">
                <div class="card">
                    <div class="card-title">Email Notifications</div>
                    <div class="form-group">
                        <div class="form-check">
                            <input type="checkbox" id="email-events" checked>
                            <label for="email-events">Event invitations and updates</label>
                        </div>
                    </div>
                    <button class="btn">Save Email Preferences</button>
                </div>
            </div>
        </div>

        <!-- Modals -->
        <div class="modal-overlay" id="edit-profile-modal">
            <div class="modal">
                <div class="modal-header">
                    <div class="modal-title">Edit Profile</div>
                    <button class="modal-close" onclick="closeModal('edit-profile-modal')">×</button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="modal-fullname" class="form-label">Full Name</label>
                            <input type="text" id="modal-fullname" class="form-control" value="John Smith">
                        </div>
                        <div class="form-group">
                            <label for="modal-username" class="form-label">Username</label>
                            <input type="text" id="modal-username" class="form-control" value="johnsmith">
                        </div>
                        <div class="form-group">
                            <label for="modal-bio" class="form-label">Bio</label>
                            <textarea id="modal-bio" class="form-control" rows="4">Music enthusiast and event organizer based in New York City.</textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-outline" onclick="closeModal('edit-profile-modal')">Cancel</button>
                    <button class="btn">Save Changes</button>
                </div>
            </div>
        </div>

        <div class="modal-overlay" id="edit-music-preferences-modal">
            <div class="modal">
                <div class="modal-header">
                    <div class="modal-title">Edit Music Preferences</div>
                    <button class="modal-close" onclick="closeModal('edit-music-preferences-modal')">×</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="form-label">Select your favorite genres</label>
                        <div class="form-check">
                            <input type="checkbox" id="modal-genre1" checked>
                            <label for="modal-genre1">Indie Rock</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" id="modal-genre2" checked>
                            <label for="modal-genre2">Jazz</label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-outline" onclick="closeModal('edit-music-preferences-modal')">Cancel</button>
                    <button class="btn">Save Preferences</button>
                </div>
            </div>
        </div>

        <div class="modal-overlay" id="event-details-modal">
            <div class="modal">
                <div class="modal-header">
                    <div class="modal-title">Event Details</div>
                    <button class="modal-close" onclick="closeModal('event-details-modal')">×</button>
                </div>
                <div class="modal-body">
                    <img src="https://via.placeholder.com/350x180" alt="Event Image" style="max-width: 100%; border-radius: 8px; margin-bottom: 1rem;">
                    <h3>Summer Jazz Festival</h3>
                    <p style="color: var(--muted-text);">Central Park, New York</p>
                    <p><i class="fas fa-calendar"></i> April 15, 2025 | 2:00 PM - 8:00 PM</p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-outline" onclick="closeModal('event-details-modal')">Close</button>
                    <button class="btn">RSVP</button>
                </div>
            </div>
        </div>

        <div class="modal-overlay" id="create-event-modal">
            <div class="modal">
                <div class="modal-header">
                    <div class="modal-title">Create New Event</div>
                    <button class="modal-close" onclick="closeModal('create-event-modal')">×</button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="event-title" class="form-label">Event Title</label>
                            <input type="text" id="event-title" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="event-location" class="form-label">Location</label>
                            <input type="text" id="event-location" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="event-date" class="form-label">Date</label>
                            <input type="date" id="event-date" class="form-control">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-outline" onclick="closeModal('create-event-modal')">Cancel</button>
                    <button class="btn">Create Event</button>
                </div>
            </div>
        </div>

        <div class="modal-overlay" id="community-details-modal">
            <div class="modal">
                <div class="modal-header">
                    <div class="modal-title">Community Details</div>
                    <button class="modal-close" onclick="closeModal('community-details-modal')">×</button>
                </div>
                <div class="modal-body">
                    <img src="https://via.placeholder.com/350x180" alt="Community Image" style="max-width: 100%; border-radius: 8px; margin-bottom: 1rem;">
                    <h3>New York Jazz Lovers</h3>
                    <p style="color: var(--muted-text);">2,456 members</p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-outline" onclick="closeModal('community-details-modal')">Close</button>
                    <button class="btn">View Community Page</button>
                </div>
            </div>
        </div>

        <div class="modal-overlay" id="create-community-modal">
            <div class="modal">
                <div class="modal-header">
                    <div class="modal-title">Create New Community</div>
                    <button class="modal-close" onclick="closeModal('create-community-modal')">×</button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="community-name" class="form-label">Community Name</label>
                            <input type="text" id="community-name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="community-description" class="form-label">Description</label>
                            <textarea id="community-description" class="form-control" rows="4"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-outline" onclick="closeModal('create-community-modal')">Cancel</button>
                    <button class="btn">Create Community</button>
                </div>
            </div>
        </div>
    </main>

    <script>
        // Toggle user dropdown
        const userIcon = document.querySelector('.user-icon');
        const userDropdown = document.querySelector('.user-dropdown');
        const navLinks = document.getElementById('navLinks');

        userIcon.addEventListener('click', function(e) {
            e.stopPropagation();
            userDropdown.classList.toggle('active');
        });

        document.addEventListener('click', function(e) {
            if (!userIcon.contains(e.target) && !userDropdown.contains(e.target)) {
                userDropdown.classList.remove('active');
            }
        });

        // Switch between pages
        function showPage(pageId) {
            const pages = document.querySelectorAll('.page');
            pages.forEach(page => page.classList.remove('active'));
            const targetPage = document.getElementById(`${pageId}-page`);
            if (targetPage) {
                targetPage.classList.add('active');
            }
            userDropdown.classList.remove('active');
            if (window.innerWidth <= 768) {
                navLinks.classList.remove('active');
            }
            window.scrollTo(0, 0);
        }

        // Switch between tabs
        function showTab(tabId) {
            const tabContent = document.getElementById(tabId);
            if (!tabContent) return;

            const tabContainer = tabContent.parentElement;
            const tabContents = tabContainer.querySelectorAll('.tab-content');
            tabContents.forEach(tab => tab.classList.remove('active'));
            tabContent.classList.add('active');

            const tabNav = tabContainer.previousElementSibling;
            if (tabNav && tabNav.classList.contains('tab-nav')) {
                const tabLinks = tabNav.querySelectorAll('.tab-link');
                tabLinks.forEach(link => link.classList.remove('active'));
                const activeLink = tabNav.querySelector(`[onclick="showTab('${tabId}')"]`);
                if (activeLink) {
                    activeLink.classList.add('active');
                }
            }
        }

        // Modal functions
        function openModal(modalId) {
            const modal = document.getElementById(modalId);
            if (modal) {
                modal.classList.add('active');
                document.body.style.overflow = 'hidden';
            }
        }

        function closeModal(modalId) {
            const modal = document.getElementById(modalId);
            if (modal) {
                modal.classList.remove('active');
                document.body.style.overflow = 'auto';
            }
        }

        // Close modal when clicking outside
        const modalOverlays = document.querySelectorAll('.modal-overlay');
        modalOverlays.forEach(overlay => {
            overlay.addEventListener('click', function(e) {
                if (e.target === overlay) {
                    overlay.classList.remove('active');
                    document.body.style.overflow = 'auto';
                }
            });
        });

        // Prevent form submissions (for demo purposes)
        const forms = document.querySelectorAll('form');
        forms.forEach(form => {
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                console.log('Form submission prevented (demo mode)');
                closeModal(form.closest('.modal-overlay')?.id);
            });
        });

        // Mobile menu toggle
        document.addEventListener('DOMContentLoaded', () => {
            const header = document.querySelector('header');
            const menuToggle = document.createElement('div');
            menuToggle.innerHTML = '<i class="fas fa-bars"></i>';
            menuToggle.style.cursor = 'pointer';
            menuToggle.style.fontSize = '1.5rem';
            menuToggle.style.color = 'var(--text-color)';
            menuToggle.classList.add('menu-toggle');
            header.appendChild(menuToggle);

            menuToggle.addEventListener('click', () => {
                navLinks.classList.toggle('active');
            });

            window.addEventListener('resize', () => {
                if (window.innerWidth > 768) {
                    navLinks.classList.remove('active');
                    navLinks.style.display = 'flex';
                } else {
                    navLinks.style.display = 'none';
                }
            });

            // Initial state
            if (window.innerWidth <= 768) {
                navLinks.style.display = 'none';
            }
        });
    </script>
</body>
</html>