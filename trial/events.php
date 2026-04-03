<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="LOGO for website (circular).png" type="image/x-icon">
    <link rel="shortcut icon" href="LOGO for website (circular).png" type="image/x-icon">
    <link rel="icon" type="image/x-icon" href="LOGO for website (circular).png">
    <title>Events - Concert Circle India</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700;900&display=swap" rel="stylesheet">
    <!-- <link rel="stylesheet" href="events.css"> -->
    <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
    --color-primary: #d269e6;
    --color-secondary: #ff3131;
    --color-accent: #ffd700;
    --color-accent-blue: #52bdfb;
    --color-accent-teal: #4ddde0;
    --bg-dark: #121212;
    --bg-darker: #0a0a0a;
    --bg-darkest: #000;
    --bg-card: rgba(32, 32, 32, 0.95);
    --bg-header: rgba(0, 0, 0, 0.9);
    --text-light: #ffffff;
    --text-medium: #ddd;
    --text-muted: #ccc;
    --text-dim: #aaa;
    --text-dimmer: #888;
    --gradient-primary: linear-gradient(45deg, var(--color-secondary), var(--color-primary));
    --gradient-card: linear-gradient(145deg, rgba(32, 32, 32, 0.95), rgba(26, 26, 26, 0.98));
    --gradient-text: linear-gradient(90deg, var(--color-accent-teal), var(--color-accent-blue), var(--color-primary), var(--color-secondary), var(--color-accent));
    --shadow-card: 0 8px 32px rgba(0, 0, 0, 0.3);
    --shadow-hover: 0 12px 40px rgba(0, 0, 0, 0.4);
    --transition-fast: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    --transition-slow: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
    --spacing-xs: 5px;
    --spacing-sm: 10px;
    --spacing-md: 15px;
    --spacing-lg: 20px;
    --spacing-xl: 30px;
    --spacing-xxl: 50px;
    --radius-sm: 5px;
    --radius-md: 12px;
    --radius-lg: 15px;
    --radius-full: 50px;
    --radius-round: 50%;
    --shadow-sm: 0 4px 10px rgba(0, 0, 0, 0.3);
    --shadow-md: 0 5px 15px rgba(0, 0, 0, 0.3);
    --shadow-lg: 0 10px 25px rgba(0, 0, 0, 0.4);
    --shadow-xl: 0 10px 30px rgba(0, 0, 0, 0.5);
    --font-xs: 0.8rem;
    --font-sm: 0.9rem;
    --font-md: 1rem;
    --font-lg: 1.2rem;
    --font-xl: 1.5rem;
    --font-xxl: 2rem;
    --font-hero: 3.5rem;
    --font-primary: 'Montserrat', sans-serif;
    --container-width: 1400px;
    --header-height: 90px;
    --card-bg: rgba(18, 18, 18, 0.95);
    --card-border: rgba(255, 255, 255, 0.1);
    --date-bg: #ff3131;
}

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: var(--font-primary);
    background-color: var(--bg-darkest);
    color: var(--text-light);
    line-height: 1.6;
    overflow-x: hidden;
}

body:not(.auth-loaded) .logged-in-only,
body:not(.auth-loaded) .logged-out-only {
    visibility: hidden;
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.animate-fade-in {
    animation: fadeInUp 0.5s ease;
}

.container {
    width: 100%;
    max-width: var(--container-width);
    margin: 0 auto;
    padding: 0 var(--spacing-lg);
}

.static-background {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: -2;
    background: linear-gradient(to bottom, rgba(0, 0, 0, 0.9), rgba(0, 0, 0, 0.7)), url('concert-background.jpg');
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
}


.user-menu {
    position: relative;
    cursor: pointer;
}

.user-icon {
    width: 40px;
    height: 40px;
    background-color: #d269e6;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: bold;
}

.main-content {
    padding-top: 10px;
    min-height: 100vh;
}

.page-header {
    padding: 60px 0;
    text-align: center;
    background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6));
}

.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
}

.page-title {
    font-size: 2.5rem;
    font-weight: 900;
    margin-bottom: 20px;
}

.gradient-text {
    background: linear-gradient(90deg, #4ddde0, #52bdfb, #d269e6, #ff3131, #ffd700);
    -webkit-background-clip: text;
    background-clip: text;
    color: transparent;
    position: relative;
    display: inline-block;
}

.gradient-text::after {
    content: '';
    position: absolute;
    bottom: -3px;
    left: 0;
    width: 100%;
    height: 4px;
    background: linear-gradient(90deg, #4ddde0, #52bdfb, #d269e6, #ff3131, #ffd700);
    border-radius: 2px;
}

.page-description {
    max-width: 700px;
    margin: 0 auto;
    font-size: 1.1rem;
    color: #ddd;
}

.search-filter-container {
    background-color: rgba(0, 0, 0, 0.5);
    padding: 30px;
    border-radius: 15px;
    margin: 30px 0;
    border: 1px solid rgba(210, 105, 230, 0.3);
}


.filter-bar {
    max-width: 800px;
    margin: 0 auto 40px;
}

.filter-input {
    width: 100%;
    background: rgba(0, 0, 0, 0.6);
    border: 1px solid rgba(255, 255, 255, 0.1);
    border-radius: 8px;
    color: #fff;
    font-size: 16px;
    padding: 15px 20px;
    outline: none;
}

.event-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
    gap: 25px;
    padding: 0 20px;
    margin: 0 auto;
    max-width: 1200px;
}

.event-card {
    background: var(--card-bg);
    border-radius: 12px;
    overflow: hidden;
    border: 1px solid var(--card-border);
    transition: transform 0.3s ease;
}

.event-image {
    position: relative;
    height: 200px;
}

.event-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.event-date {
    position: absolute;
    top: 15px;
    right: 15px;
    background: var(--date-bg);
    color: white;
    padding: 6px 12px;
    border-radius: 4px;
    font-weight: 600;
    font-size: 14px;
}

.event-details {
    padding: 20px;
}

.event-title {
    font-size: 1.4rem;
    font-weight: 700;
    color: #ffd700;
    margin-bottom: 10px;
    line-height: 1.3;
}

.event-location {
    display: flex;
    align-items: center;
    gap: 5px;
    color: #ddd;
    font-size: 14px;
    margin-bottom: 15px;
}

.event-attendance {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 20px;
}

.attendee-avatars {
    display: flex;
    margin-right: 10px;
}

.attendee {
    width: 30px;
    height: 30px;
    background: var(--color-primary);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 12px;
    margin-left: -8px;
    border: 2px solid var(--card-bg);
}

.attendance-count {
    color: #aaa;
    font-size: 14px;
}

.join-button {
    display: block;
    width: 100%;
    background: #52bdfb;
    color: white;
    text-align: center;
    padding: 12px 0;
    border-radius: 6px;
    font-weight: 600;
    text-decoration: none;
    transition: background 0.3s ease;
}

.join-button:hover {
    background: #4ddde0;
}

@media (max-width: 768px) {
    .event-grid {
        grid-template-columns: 1fr;
        padding: 0 15px;
    }
    
    .page-title {
        font-size: 2.5rem;
    }
}
    </style>
</head>
<body>
    <div class="static-background" aria-hidden="true"></div>
    
    <?php include'header.php' ?>
    
    <main class="main-content">
        <section class="page-header">
            <h1 class="page-title">Discover <span class="gradient-text">Events</span></h1>
        </section>
        
        <section class="events-container">
            <div class="filter-bar">
                <div class="filter-group">
                    <input type="text" class="filter-input" placeholder="Search events by name or location...">
                    <div class="search-suggestions"></div>
                </div>
               
            </div>
            
            <div class="event-grid">
                <?php
                // Include database connection
                require_once('inc/config.php');

                try {
                    // Set the number of events per page
                    $eventsPerPage = 999;
                    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                    $offset = ($page - 1) * $eventsPerPage;

                    // Get total number of events
                    $totalStatement = $pdo->query("SELECT COUNT(*) FROM events");
                    $totalEvents = $totalStatement->fetchColumn();

                    // Fetch events with pagination
                    $statement = $pdo->prepare("SELECT * FROM events ORDER BY date ASC LIMIT :limit OFFSET :offset");
                    $statement->bindValue(':limit', $eventsPerPage, PDO::PARAM_INT);
                    $statement->bindValue(':offset', $offset, PDO::PARAM_INT);
                    $statement->execute();
                    $events = $statement->fetchAll(PDO::FETCH_ASSOC);

                    if (!empty($events)) {
                        foreach ($events as $event) {
                            ?>
                            <div class="event-card" data-title="<?php echo htmlspecialchars(strtolower($event['title'])); ?>">
                                <div class="event-image">
                                    <img src="uploads/events/<?php echo htmlspecialchars($event['image_url']); ?>" 
                                         alt="<?php echo htmlspecialchars($event['title']); ?>">
                                    <div class="event-date"><?php echo date('M d', strtotime($event['date'])); ?></div>
                                </div>
                                <div class="event-details">
                                    <h3 class="event-title"><?php echo htmlspecialchars($event['title']); ?></h3>
                                    <div class="event-location">
                                        <span class="location-icon">📍</span> <?php echo htmlspecialchars($event['location']); ?>
                                    </div>
                                    <div class="event-attendance">
                                        <div class="attendee-avatars">
                                            <div class="attendee">A</div>
                                            <div class="attendee">R</div>
                                            <div class="attendee">S</div>
                                            <div class="attendee">+</div>
                                        </div>
                                        <span class="attendance-count"><?php echo htmlspecialchars($event['attendees_count']); ?> attending</span>
                                    </div>
                                    <a href="<?php echo htmlspecialchars($event['link']); ?>" class="join-button">
                                        <?php echo isset($event['button_text']) ? htmlspecialchars($event['button_text']) : 'Explore'; ?>
                                    </a>
                                </div>
                            </div>
                            <?php
                        }
                        // Store total events count in a data attribute
                        echo '<div id="events-data" 
                                  data-total-events="' . $totalEvents . '" 
                                  data-current-page="' . $page . '"
                                  data-events-per-page="' . $eventsPerPage . '"
                                  style="display: none;"></div>';
                    } else {
                        echo '<p class="no-events">No events available at the moment. Stay tuned!</p>';
                    }
                } catch (PDOException $e) {
                    echo '<p class="error-message">Failed to load events. Please try again later.</p>';
                }
                ?>
            </div>
            
            <button class="load-more">Load More Events</button>
        </section>
    </main>
    
    <?php include'footer.php' ?>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.querySelector('.filter-input');
            const eventGrid = document.querySelector('.event-grid');
            const eventCards = document.querySelectorAll('.event-card');
            const loadMoreBtn = document.querySelector('.load-more');
            const eventsData = document.getElementById('events-data');
            let searchTimeout;
            let isLoading = false;

            // Get pagination data
            const totalEvents = parseInt(eventsData.dataset.totalEvents);
            let currentPage = parseInt(eventsData.dataset.currentPage);
            const eventsPerPage = parseInt(eventsData.dataset.eventsPerPage);

            // Hide load more button if all events are loaded
            if (currentPage * eventsPerPage >= totalEvents) {
                loadMoreBtn.style.display = 'none';
            }

            // Add visible class to all cards initially with a stagger effect
            eventCards.forEach((card, index) => {
                setTimeout(() => {
                    card.classList.add('visible');
                }, index * 100);
            });

            function showNoResults() {
                const existingMessage = document.querySelector('.no-results-message');
                if (existingMessage) {
                    existingMessage.remove();
                }

                const noResults = document.createElement('div');
                noResults.className = 'no-results-message';
                noResults.innerHTML = `
                    <div class="no-results-content">
                        <h3>No events found</h3>
                        <p>Try different keywords or check back later for new events.</p>
                    </div>
                `;
                eventGrid.appendChild(noResults);
                loadMoreBtn.style.display = 'none';
            }

            function hideNoResults() {
                const noResults = document.querySelector('.no-results-message');
                if (noResults) {
                    noResults.remove();
                }
                updateLoadMoreButton();
            }

            function updateLoadMoreButton() {
                const visibleCards = document.querySelectorAll('.event-card[style="display: "]').length;
                if (visibleCards > 0 && currentPage * eventsPerPage < totalEvents) {
                    loadMoreBtn.style.display = 'block';
                } else {
                    loadMoreBtn.style.display = 'none';
                }
            }

            function performSearch(searchTerm) {
                let hasVisibleCards = false;
                searchTerm = searchTerm.toLowerCase().trim();

                eventCards.forEach(card => {
                    const title = card.querySelector('.event-title').textContent.toLowerCase();
                    const location = card.querySelector('.event-location').textContent.toLowerCase();
                    
                    if (searchTerm === '' || title.includes(searchTerm) || location.includes(searchTerm)) {
                        card.style.display = '';
                        setTimeout(() => {
                            card.classList.add('visible');
                        }, 50);
                        hasVisibleCards = true;
                    } else {
                        card.classList.remove('visible');
                        setTimeout(() => {
                            card.style.display = 'none';
                        }, 300);
                    }
                });

                if (!hasVisibleCards && searchTerm !== '') {
                    showNoResults();
                } else {
                    hideNoResults();
                }
            }

            // Load more events function
            async function loadMoreEvents() {
                if (isLoading) return;
                isLoading = true;
                loadMoreBtn.textContent = 'Loading...';

                try {
                    const nextPage = currentPage + 1;
                    const response = await fetch(`events.php?page=${nextPage}`);
                    const text = await response.text();
                    
                    // Create a temporary container to parse the HTML
                    const temp = document.createElement('div');
                    temp.innerHTML = text;
                    
                    // Extract new events
                    const newEvents = temp.querySelectorAll('.event-card');
                    
                    if (newEvents.length > 0) {
                        newEvents.forEach((event, index) => {
                            event.style.opacity = '0';
                            eventGrid.insertBefore(event, loadMoreBtn);
                            
                            // Animate new events with delay
                            setTimeout(() => {
                                event.style.opacity = '1';
                                event.classList.add('visible');
                            }, index * 100);
                        });
                        
                        currentPage = nextPage;
                        
                        // Update load more button visibility
                        if (currentPage * eventsPerPage >= totalEvents) {
                            loadMoreBtn.style.display = 'none';
                        }
                    }
                } catch (error) {
                    console.error('Error loading more events:', error);
                    loadMoreBtn.textContent = 'Error loading events. Try again.';
                } finally {
                    isLoading = false;
                    loadMoreBtn.textContent = 'Load More Events';
                }
            }

            // Event Listeners
            searchInput.addEventListener('input', function(e) {
                eventCards.forEach(card => {
                    card.classList.remove('visible');
                });

                clearTimeout(searchTimeout);
                searchTimeout = setTimeout(() => {
                    performSearch(e.target.value);
                }, 300);
            });

            searchInput.addEventListener('keydown', function(e) {
                if (e.key === 'Escape') {
                    this.value = '';
                    performSearch('');
                }
            });

            loadMoreBtn.addEventListener('click', loadMoreEvents);
        });
    </script>

    <style>
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .no-results-message {
            width: 100%;
            padding: 40px 20px;
            text-align: center;
            animation: fadeIn 0.5s ease;
        }

        .no-results-content {
            background: rgba(255, 255, 255, 0.05);
            border-radius: 15px;
            padding: 30px;
            display: inline-block;
        }

        .no-results-message i {
            font-size: 2.5rem;
            color: var(--color-primary);
            margin-bottom: 15px;
        }

        .no-results-message h3 {
            font-size: 1.5rem;
            margin-bottom: 10px;
            color: var(--text-light);
        }

        .no-results-message p {
            color: var(--text-muted);
        }
    </style>
</body>
</html>