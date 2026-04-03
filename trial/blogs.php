<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="LOGO for website (circular).png" type="image/x-icon">
    <link rel="shortcut icon" href="LOGO for website (circular).png" type="image/x-icon">
    <title>Concert Circle - Blog</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="navbar.css" type="text/css" />
    <link rel="stylesheet" href="footer.css" type="text/css" />
    <link rel="stylesheet" href="events.css" type="text/css" />
    <link rel="stylesheet" href="blogs.css" type="text/css" />
    <style>
        
.features-container {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: var(--spacing-xl);
    margin-top: var(--spacing-xxl);
}

.feature-card {
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
    padding: var(--spacing-xl);
}

.feature-icon {
    width: 60px;
    height: 60px;
    background: var(--gradient-primary);
    border-radius: var(--radius-round);
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: var(--spacing-lg);
    color: var(--text-light);
    font-size: 1.5rem;
}

.feature-title {
    font-size: var(--font-lg);
    font-weight: 700;
    margin-bottom: var(--spacing-md);
    color: var(--text-light);
}

.feature-description {
    color: var(--text-muted);
    font-size: var(--font-sm);
    line-height: 1.7;
}
.modal-content {
    background-color: var(--bg-card);
    margin: 5% auto;
    padding: var(--spacing-xl);
    border-radius: var(--radius-lg);
    max-width: 800px;
    width: 90%;
    box-shadow: var(--shadow-xl);
    position: relative;
    animation: fadeInUp 0.5s ease;
    max-height: 90vh;
    overflow-y: auto;
}

.close-modal {
    color: var(--text-dim);
    float: right;
    font-size: 28px;
    font-weight: bold;
    cursor: pointer;
    transition: var(--transition-fast);
    position: absolute;
    top: 15px;
    right: 20px;
}

.close-modal:hover {
    color: var(--color-primary);
}

.modal-title {
    font-size: 1.8rem;
    font-weight: 700;
    margin-bottom: var(--spacing-lg);
    color: var(--text-light);
}

.modal-section {
    margin-bottom: var(--spacing-lg);
}

.modal-section-title {
    font-size: var(--font-lg);
    font-weight: 700;
    margin-bottom: var(--spacing-md);
    color: var(--color-primary);
    display: flex;
    align-items: center;
    gap: var(--spacing-sm);
}

.modal-icon {
    width: 24px;
    height: 24px;
    color: var(--color-primary);
}

.modal-text {
    color: var(--text-medium);
    font-size: var(--font-md);
    line-height: 1.7;
    margin-bottom: var(--spacing-sm);
}

.modal-list {
    list-style: none;
    margin: var(--spacing-md) 0;
}

.modal-list li {
    margin-bottom: var(--spacing-sm);
    padding-left: 20px;
    position: relative;
    color: var(--text-muted);
}

.modal-list li::before {
    content: '•';
    color: var(--color-secondary);
    position: absolute;
    left: 0;
    font-size: 1.2rem;
}

.featured-carousel {
    width: 100%;
    height: 100%;
    position: relative;
}

.featured-slide {
    position: absolute;
    width: 100%;
    height: 100%;
    background-size: cover;
    background-position: center;
    opacity: 0;
    transition: opacity 1s ease;
    display: flex;
    align-items: center;
    justify-content: center;
    will-change: opacity;
}

.featured-slide.active {
    opacity: 1;
    z-index: 2;
}

.featured-slide-content {
    width: 80%;
    max-width: 1200px;
    color: var(--text-light);
    padding: 2rem;
    background: rgba(0, 0, 0, 0.6);
    backdrop-filter: blur(5px);
    border-radius: var(--radius-md);
    transform: translateY(30px);
    opacity: 0;
    transition: all 0.8s ease 0.3s;
    will-change: transform, opacity;
}

.featured-slide.active .featured-slide-content {
    transform: translateY(0);
    opacity: 1;
}

.featured-title {
    font-size: var(--font-hero);
    font-weight: 900;
    margin-bottom: 1rem;
    background: linear-gradient(45deg, var(--color-secondary), var(--color-primary), var(--color-accent));
    -webkit-background-clip: text;
    background-clip: text;
    -webkit-text-fill-color: transparent;
}

.featured-subtitle {
    font-size: var(--font-lg);
    margin-bottom: 2rem;
    max-width: 700px;
}
.modal-image {
    border-radius: 10px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.3);
    width: 400px;
    height: auto;
    flex-shrink: 0;
}

/* Add to your CSS */
.modal {
    display: none;
    position: fixed;
    z-index: 9999;
    left: 0; top: 0; width: 100vw; height: 100vh;
    overflow: auto;
    background: rgba(0,0,0,0.6);
}
.modal.show {
    display: block;
}
    </style>
</head>
<body>
    <div class="static-background"></div>
    
    <?php include 'header.php'; ?>
    
    <main class="main-content">
        <section class="page-banner">
            <div class="banner-content">
                <h1>Concert Circle <span class="gradient-text">Blog</span></h1>
                <p class="banner-text">News, stories, and insights from the concert community</p>
            </div>
        </section>
        
        <section class="blog-container">
            <!-- <div class="featured-blog">
                <div class="featured-blog-image">
                    <img src="featured-blog.jpg" alt="Festival Season 2025">
                    <div class="featured-category">Featured</div>
                </div>
                <div class="featured-blog-content">
                    <h2 class="featured-blog-title">The Ultimate Guide to Festival Season 2025</h2>
                    <div class="featured-blog-meta">
                        <div class="blog-author">
                            <div class="author-avatar">JM</div>
                            <span>Jamie Morris</span>
                        </div>
                        <div class="blog-date">
                            <i class="fas fa-calendar"></i>
                            <span>March 15, 2025</span>
                        </div>
                    </div>
                    <p class="featured-blog-excerpt">From Coachella to Glastonbury, we've compiled everything you need to know about this year's hottest music festivals. Discover hidden gems, packing essentials, and insider tips to make your festival experience unforgettable.</p>
                    <a href="#" class="read-more">Read Article</a>
                </div>
            </div> -->
            
            <!-- <div class="blog-controls">
                <div class="blog-search">
                    <input type="text" placeholder="Search articles...">
                    <button type="submit"><i class="fas fa-search"></i></button>
                </div>
                
                <div class="blog-filter">
                    <button class="filter-btn active">All</button>
                    <button class="filter-btn">News</button>
                    <button class="filter-btn">Interviews</button>
                    <button class="filter-btn">Reviews</button>
                    <button class="filter-btn">Tips</button>
                </div>
            </div>
             -->
      
            <div class="blog-grid">
<?php
require_once('inc/config.php');

// Fetch blogs
$statement = $pdo->prepare("SELECT * FROM blogs ORDER BY published_date DESC LIMIT 12");
$statement->execute();
$blogs = $statement->fetchAll(PDO::FETCH_ASSOC);

foreach ($blogs as $blog):
    $blogId = $blog['id'];
    $title = htmlspecialchars($blog['title']);
    $excerpt = htmlspecialchars($blog['excerpt']);
    // Fix image path: use uploads/blogs/ for both card and modal
    $image = $blog['image'] ? 'uploads/blogs/' . htmlspecialchars($blog['image']) : 'uploads/blogs/default-blog.jpg';
    $category = htmlspecialchars($blog['category']);
    $author = htmlspecialchars($blog['author_name']);
    $avatar = htmlspecialchars($blog['author_avatar']);
    $date = $blog['published_date'] ? date("F j, Y", strtotime($blog['published_date'])) : '';
?>
    <article class="blog-card">
        <div class="blog-image">
            <img src="<?= $image ?>" alt="<?= $title ?>">
            <div class="blog-category"><?= $category ?></div>
        </div>
        <div class="blog-details">
            <h3 class="blog-title"><?= $title ?></h3>
            <p class="blog-excerpt"><?= mb_strimwidth($excerpt, 0, 120, "...") ?></p>
            <div class="blog-meta">
                <div class="blog-author">
                    <div class="author-avatar"><?= $avatar ?></div>
                    <span><?= $author ?></span>
                </div>
                <div class="blog-date">
                    <i class="fas fa-calendar"></i>
                    <span><?= $date ?></span>
                </div>
            </div>
            <a href="blog_detail.php?id=<?= $blogId ?>" class="read-more">Read Article</a>
        </div>
    </article>
<?php endforeach; ?>
            </div>
            <div class="pagination">
                <button class="page-btn active">1</button>
                <button class="page-btn">2</button>
                <button class="page-btn">3</button>
                <button class="page-btn">4</button>
                <button class="page-btn"><i class="fas fa-ellipsis-h"></i></button>
                <button class="page-btn"><i class="fas fa-chevron-right"></i></button>
            </div>
        </section>
    </main>
    
    <?php include 'footer.php'; ?>


    <!-- Modal for Featured Blog (Static)-->
    <div id="featured1Modal" class="modal">
        <div class="modal-content">
            <span class="close-modal" onclick="closeModal('featured1')">×</span>
            <h2 class="modal-title">AR Rahman: Harmony Tour 2025</h2>
            <div class="modal-section">
                <h3 class="modal-section-title"><i class="fas fa-music modal-icon"></i>About This Event</h3>
                <p class="modal-text">Experience the magic of the Mozart of Madras live as AR Rahman brings his symphony of sounds across 5 major Indian cities. This tour celebrates three decades of musical excellence with reimagined arrangements of his most beloved compositions.</p>
            </div>
            <div class="modal-section">
                <h3 class="modal-section-title"><i class="fas fa-map-marker-alt modal-icon"></i>Tour Dates & Venues</h3>
                <ul class="modal-list">
                    <li><strong>Mumbai:</strong> July 5-6, 2025 - DY Patil Stadium</li>
                    <li><strong>Delhi:</strong> July 12-13, 2025 - Jawaharlal Nehru Stadium</li>
                    <li><strong>Bangalore:</strong> July 19-20, 2025 - Bangalore International Exhibition Centre</li>
                    <li><strong>Chennai:</strong> July 26-27, 2025 - MA Chidambaram Stadium</li>
                    <li><strong>Kolkata:</strong> August 2-3, 2025 - Salt Lake Stadium</li>
                </ul>
            </div>
            <div class="modal-section">
                <h3 class="modal-section-title"><i class="fas fa-ticket-alt modal-icon"></i>VIP Package Options</h3>
                <p class="modal-text">Priority access packages include premium seating, exclusive merchandise, backstage tour, sound check access, and a pre-show reception with AR Rahman's orchestra members.</p>
            </div>
            <a href="event-details.html?event=ar-rahman-harmony" class="modal-join-btn">Get Priority Access</a>
        </div>
    </div>

    <!-- Modal for Blog Article -->
<div id="blog1Modal" class="modal">
    <div class="modal-content">
        <span class="close-modal" onclick="closeModal('blog1')">×</span>
        <h2 class="modal-title">Backstage with The Echo Waves: Exclusive Interview</h2>
        <div class="modal-section">
            <h3 class="modal-section-title"><i class="fas fa-microphone modal-icon"></i>Interview Highlights</h3>
            <p class="modal-text">We caught up with the indie sensation before their sold-out show to discuss their new album, creative process, and life on the road.</p>
        </div>
    </div>
</div>

    <script>
        // Mobile menu toggle
        const mobileMenuBtn = document.querySelector('.mobile-menu-btn');
        const nav = document.querySelector('nav');
        if (mobileMenuBtn && nav) {
            mobileMenuBtn.addEventListener('click', () => {
                nav.classList.toggle('active');
            });
            document.addEventListener('click', (e) => {
                if (!nav.contains(e.target) && !mobileMenuBtn.contains(e.target)) {
                    nav.classList.remove('active');
                }
            });
        }

        // Filter buttons
        const filterButtons = document.querySelectorAll('.filter-btn');
        filterButtons.forEach(button => {
            button.addEventListener('click', () => {
                filterButtons.forEach(btn => btn.classList.remove('active'));
                button.classList.add('active');
                // Add filtering logic here
            });
        });

        // Modal logic
        window.openModal = function(eventId) {
                var modal = document.getElementById(eventId + 'Modal');
            if (modal) {
                modal.classList.add('show');
                document.body.style.overflow = 'hidden';
            }
        }
        window.closeModal = function(eventId) {
            var modal = document.getElementById(eventId + 'Modal');
            if (modal) {
                modal.classList.remove('show');
                document.body.style.overflow = 'auto';
            }
        }
        // Close modal when clicking outside modal-content
        document.addEventListener('click', function(event) {
            var modals = document.getElementsByClassName('modal');
            for (let i = 0; i < modals.length; i++) {
                if (event.target === modals[i]) {
                    modals[i].classList.remove('show');
                    document.body.style.overflow = 'auto';
                }
            }
        });
        // Prevent modal-content clicks from closing modal
        document.querySelectorAll('.modal-content').forEach(function(content) {
            content.addEventListener('click', function(event) {
                event.stopPropagation();
            });
        });

        window.scrollCarousel = function(direction, carouselSelector) {
            const carousel = document.querySelector(carouselSelector);
            const scrollAmount = carousel.offsetWidth * 0.8;
            if (direction === 'left') {
                carousel.scrollBy({
                    left: -scrollAmount,
                    behavior: 'smooth'
                });
            } else {
                carousel.scrollBy({
                    left: scrollAmount,
                    behavior: 'smooth'
                });
            }
        }
    </script>
</body>
</html>