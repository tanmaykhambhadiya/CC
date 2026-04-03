<?php
// filepath: t:\xampp\htdocs\public_html\trial\blog_detail.php
require_once('inc/config.php');

// Validate and fetch blog details based on the `id` parameter
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $blogId = intval($_GET['id']);
    $statement = $pdo->prepare("SELECT * FROM blogs WHERE id = ?");
    $statement->execute([$blogId]);
    $blog = $statement->fetch(PDO::FETCH_ASSOC);

    if (!$blog) {
        echo "<h1>Blog not found.</h1>";
        exit;
    }
} else {
    echo "<h1>Invalid blog ID.</h1>";
    exit;
}

// Extract blog details
$title = htmlspecialchars($blog['title']);
// $subheading = htmlspecialchars($blog['subheading']);
$excerpt = htmlspecialchars($blog['excerpt']);
$content = $blog['content']; // Do not escape content to allow HTML rendering
$image = $blog['image'] ? 'uploads/blogs/' . htmlspecialchars($blog['image']) : 'uploads/blogs/default-blog.jpg';
$author = htmlspecialchars($blog['author_name']);
$authorAvatar = $blog['author_avatar'] ? 'uploads/authors/' . htmlspecialchars($blog['author_avatar']) : 'uploads/authors/default-avatar.jpg';
$date = $blog['published_date'] ? date("F j, Y", strtotime($blog['published_date'])) : '';
$category = htmlspecialchars($blog['category']);
$views = isset($blog['views']) ? number_format($blog['views']) : '0'; // Fallback to 0 if views is not set
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="LOGO for website (circular).png" type="image/x-icon">
    <link rel="stylesheet" href="navbar.css" type="text/css" />
    <link rel="stylesheet" href="footer.css" type="text/css" />
    <link rel="stylesheet" href="blogs.css" type="text/css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <title><?= $title ?> - Concert Circle Blog</title>
    <meta name="description" content="<?= htmlspecialchars(substr(strip_tags($content), 0, 150)) ?>">
    <meta property="og:title" content="<?= $title ?>">
    <meta property="og:description" content="<?= htmlspecialchars(substr(strip_tags($content), 0, 150)) ?>">
    <meta property="og:image" content="<?= $image ?>">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --color-primary: #ff6b6b;
            --color-secondary: #4ecdc4;
            --color-accent: #ffd93d;
            --gradient-primary: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --gradient-secondary: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            --gradient-dark: linear-gradient(135deg, #232526 0%, #414345 100%);
            --text-light: #ffffff;
            --text-medium: #e2e8f0;
            --text-muted: #94a3b8;
            --bg-dark: #0f172a;
            --bg-card: rgba(30, 41, 59, 0.8);
            --border-color: rgba(148, 163, 184, 0.2);
            --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
            --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
            --shadow-xl: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
            --shadow-2xl: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
            --radius-sm: 0.25rem;
            --radius-md: 0.375rem;
            --radius-lg: 0.5rem;
            --radius-xl: 0.75rem;
            --spacing-xs: 0.25rem;
            --spacing-sm: 0.5rem;
            --spacing-md: 1rem;
            --spacing-lg: 1.5rem;
            --spacing-xl: 2rem;
            --spacing-xxl: 3rem;
            --font-sm: 0.875rem;
            --font-base: 1rem;
            --font-lg: 1.125rem;
            --font-xl: 1.25rem;
        }

        body {
            background: var(--bg-dark);
            color: var(--text-light);
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            line-height: 1.6;
            overflow-x: hidden;
        }

        /* Enhanced Background */
        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: 
                radial-gradient(circle at 20% 80%, rgba(120, 119, 198, 0.3) 0%, transparent 50%),
                radial-gradient(circle at 80% 20%, rgba(255, 107, 107, 0.3) 0%, transparent 50%),
                radial-gradient(circle at 40% 40%, rgba(78, 205, 196, 0.2) 0%, transparent 50%);
            z-index: -1;
            animation: backgroundPulse 20s ease-in-out infinite;
        }

        @keyframes backgroundPulse {
            0%, 100% { opacity: 0.5; }
            50% { opacity: 0.8; }
        }

        .blog-detail-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: var(--spacing-xl);
            position: relative;
            z-index: 1;
        }
        
        .blog-header {
            text-align: center;
            margin-bottom: var(--spacing-xxl);
            position: relative;
            padding: var(--spacing-xxl) 0;
        }

        .blog-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 4px;
            background: var(--gradient-primary);
            border-radius: 2px;
            box-shadow: 0 0 20px rgba(102, 126, 234, 0.5);
        }
        
        .blog-detail-title {
            font-size: clamp(2rem, 5vw, 3.5rem);
            font-weight: 900;
            margin: var(--spacing-xl) 0;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 50%, #f093fb 100%);
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
            line-height: 1.2;
            letter-spacing: -0.02em;
            text-shadow: 0 0 30px rgba(102, 126, 234, 0.3);
            animation: titleGlow 3s ease-in-out infinite alternate;
        }

        @keyframes titleGlow {
            from { filter: drop-shadow(0 0 5px rgba(102, 126, 234, 0.3)); }
            to { filter: drop-shadow(0 0 15px rgba(102, 126, 234, 0.6)); }
        }
        
        .blog-excerpt {
            font-size: 1.2rem;
            margin-bottom: var(--spacing-xl);
            color: var(--text-medium);
            line-height: 1.7;
            max-width: 800px;
            margin-left: auto;
            margin-right: auto;
            font-weight: 300;
            letter-spacing: 0.01em;
        }
        
        .blog-detail-meta {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: var(--spacing-xl);
            margin-bottom: var(--spacing-xl);
            flex-wrap: wrap;
            padding: var(--spacing-lg);
            background: rgba(30, 41, 59, 0.6);
            border-radius: var(--radius-xl);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(148, 163, 184, 0.1);
            box-shadow: var(--shadow-xl);
        }
        
        .blog-author-detail {
            display: flex;
            align-items: center;
            gap: var(--spacing-sm);
            padding: var(--spacing-sm);
            border-radius: var(--radius-lg);
            transition: all 0.3s ease;
        }

        .blog-author-detail:hover {
            background: rgba(102, 126, 234, 0.1);
            transform: translateY(-2px);
        }
        
        .author-avatar-large {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: var(--gradient-primary);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 700;
            font-size: 1.5rem;
            box-shadow: var(--shadow-lg);
            border: 3px solid rgba(255, 255, 255, 0.2);
            transition: all 0.3s ease;
        }

        .author-avatar-large:hover {
            transform: scale(1.1);
            box-shadow: var(--shadow-2xl);
        }
        
        .blog-stats {
            display: flex;
            gap: var(--spacing-lg);
            color: var(--text-muted);
            font-size: var(--font-sm);
        }
        
        .blog-stat {
            display: flex;
            align-items: center;
            gap: var(--spacing-xs);
            padding: var(--spacing-sm) var(--spacing-md);
            background: rgba(148, 163, 184, 0.1);
            border-radius: var(--radius-md);
            transition: all 0.3s ease;
        }

        .blog-stat:hover {
            background: rgba(148, 163, 184, 0.2);
            transform: translateY(-1px);
        }

        .blog-stat i {
            color: var(--color-primary);
        }
        
        .blog-featured-image {
            width: 100%;
            max-height: 600px;
            object-fit: cover;
            border-radius: var(--radius-xl);
            margin-bottom: var(--spacing-xxl);
            box-shadow: var(--shadow-2xl);
            border: 1px solid rgba(255, 255, 255, 0.1);
            transition: all 0.5s ease;
            filter: brightness(0.9) contrast(1.1);
        }

        .blog-featured-image:hover {
            transform: scale(1.01); /* Reduced scale to prevent layout shift */
            filter: brightness(1) contrast(1.2);
        }

        /* Content wrapper for better alignment */
        .content-wrapper {
            max-width: 1200px;
            margin: 0 auto;
        }

        .blog-content-section {
            display: grid;
            grid-template-columns: 1fr;
            gap: var(--spacing-xxl);
            align-items: start;
        }
        
        .blog-content {
            max-width: 1000px; /* Increased from 800px */
            margin: 0 auto;
            font-size: var(--font-lg);
            line-height: 1.8;
            color: var(--text-medium);
            background: rgba(30, 41, 59, 0.4);
            padding: var(--spacing-xxl) 3rem; /* Increased horizontal padding */
            border-radius: var(--radius-xl);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(148, 163, 184, 0.1);
            box-shadow: var(--shadow-xl);
            position: relative;
        }

        .blog-content::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 1px;
            background: linear-gradient(90deg, transparent, var(--color-primary), transparent);
        }
        
        .blog-content p {
            margin-bottom: var(--spacing-lg);
            text-align: justify;
        }

        .blog-content p:first-child::first-letter {
            font-size: 4rem;
            font-weight: 700;
            line-height: 1;
            float: left;
            margin: 0 8px 0 0;
            background: var(--gradient-primary);
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .blog-content h1, .blog-content h2, .blog-content h3 {
            color: var(--text-light);
            margin: var(--spacing-xl) 0 var(--spacing-md) 0;
            font-weight: 700;
        }

        .blog-content h1 {
            background: var(--gradient-primary);
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .blog-content blockquote {
            border-left: 4px solid var(--color-primary);
            padding-left: var(--spacing-lg);
            margin: var(--spacing-xl) 0;
            font-style: italic;
            color: var(--text-muted);
            background: rgba(255, 107, 107, 0.1);
            padding: var(--spacing-lg);
            border-radius: var(--radius-md);
        }

        .blog-content a {
            color: var(--color-primary);
            text-decoration: none;
            border-bottom: 1px solid transparent;
            transition: all 0.3s ease;
        }

        .blog-content a:hover {
            border-bottom-color: var(--color-primary);
            text-shadow: 0 0 5px rgba(255, 107, 107, 0.5);
        }

        /* Floating Action Buttons */
        .floating-actions {
            position: fixed;
            right: 20px;
            bottom: 20px;
            z-index: 1000;
            display: flex;
            flex-direction: column;
            gap: var(--spacing-sm);
        }

        .fab {
            width: 56px;
            height: 56px;
            border-radius: 50%;
            background: var(--gradient-primary);
            border: none;
            color: white;
            font-size: 1.2rem;
            cursor: pointer;
            box-shadow: var(--shadow-lg);
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .fab:hover {
            transform: scale(1.1);
            box-shadow: var(--shadow-2xl);
        }

        /* Sticky Blog Title */
        .sticky-title {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            background: rgba(15, 23, 42, 0.95);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(148, 163, 184, 0.2);
            padding: var(--spacing-md) var(--spacing-lg);
            z-index: 99; /* Lower than main header */
            transform: translateY(-100%);
            transition: all 0.3s ease;
            box-shadow: var(--shadow-lg);
            margin-top: 80px; /* Space for main header */
        }

        .sticky-title.visible {
            transform: translateY(0);
        }

        .sticky-title-content {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            align-items: center;
            gap: var(--spacing-lg);
        }

        .sticky-title-text {
            font-size: var(--font-lg);
            font-weight: 700;
            color: var(--text-light);
            flex: 1;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 50%, #f093fb 100%);
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .sticky-progress {
            width: 100px;
            height: 4px;
            background: rgba(148, 163, 184, 0.3);
            border-radius: 2px;
            overflow: hidden;
            position: relative;
        }

        .sticky-progress-bar {
            height: 100%;
            background: var(--gradient-primary);
            border-radius: 2px;
            transition: width 0.1s ease;
            width: 0%;
        }

        .sticky-author {
            display: flex;
            align-items: center;
            gap: var(--spacing-sm);
        }

        .sticky-avatar {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background: var(--gradient-primary);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
            font-size: 0.8rem;
        }

        .sticky-author-name {
            font-size: var(--font-sm);
            color: var(--text-muted);
            display: none;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .blog-detail-container {
                padding: var(--spacing-md);
            }

            .blog-detail-meta {
                flex-direction: column;
                gap: var(--spacing-md);
            }

            .blog-stats {
                justify-content: center;
            }

            .blog-content {
                padding: var(--spacing-lg) var(--spacing-md); /* Adjusted mobile padding */
                max-width: 95%; /* Use more width on mobile */
            }

            .floating-actions {
                right: 15px;
                bottom: 15px;
            }

            .fab {
                width: 48px;
                height: 48px;
                font-size: 1rem;
            }

            .sticky-title {
                margin-top: 60px; /* Space for mobile header */
                padding: var(--spacing-sm) var(--spacing-md);
            }

            .sticky-title-text {
                font-size: var(--font-base);
            }

            .sticky-progress {
                width: 60px;
            }

            .sticky-author-name {
                display: block;
            }
        }

        /* Scroll animations */
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

        .blog-header {
            animation: fadeInUp 0.8s ease-out;
        }

        .blog-featured-image {
            animation: fadeInUp 0.8s ease-out 0.2s both;
        }

        .blog-content {
            animation: fadeInUp 0.8s ease-out 0.4s both;
        }

        /* Loading shimmer effect */
        .shimmer {
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.1), transparent);
            background-size: 200% 100%;
            animation: shimmer 2s infinite;
        }

        @keyframes shimmer {
            0% { background-position: -200% 0; }
            100% { background-position: 200% 0; }
        }

        /* Background components */
        .video-background {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -2;
            overflow: hidden;
        }

        .video-background video {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            min-width: 100%;
            min-height: 100%;
            width: auto;
            height: auto;
            filter: blur(8px) brightness(0.3) contrast(1.2);
            object-fit: cover;
        }

        .static-background {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -3;
            background-color: #000;
            background-image: 
                linear-gradient(rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.8)), 
                url('concert-background.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }
    </style>
</head>
<body>
    <div class="video-background">
        <div class="static-background"></div>
    </div>
     
    <header>
        <?php include "header.php" ?>
    </header>

    <!-- Sticky Title Bar -->
    <div class="sticky-title" id="stickyTitle">
        <div class="sticky-title-content">
            <div class="sticky-title-text"><?= $title ?></div>
            <div class="sticky-progress">
                <div class="sticky-progress-bar" id="progressBar"></div>
            </div>
            <div class="sticky-author">
                <div class="sticky-avatar">
                    <?= strtoupper(substr($author, 0, 1)) ?>
                </div>
                <div class="sticky-author-name"><?= $author ?></div>
            </div>
        </div>
    </div>
    
    <main class="main-content">
        <div class="blog-detail-container">
            <div class="blog-header">
                <h1 class="blog-detail-title"><?= $title ?></h1>
                <p class="blog-excerpt"><?= $excerpt ?></p>
                
                <div class="blog-detail-meta">
                    <div class="blog-author-detail">
                        <div class="author-avatar-large">
                            <?= strtoupper(substr($author, 0, 1)) ?>
                        </div>
                        <div>
                            <div style="font-weight: 600; color: var(--text-light); font-size: var(--font-lg);"><?= $author ?></div>
                            <div style="font-size: var(--font-sm); color: var(--text-muted);">Author</div>
                        </div>
                    </div>
                    
                    <div class="blog-stats">
                        <div class="blog-stat">
                            <i class="fas fa-calendar-alt"></i>
                            <span><?= $date ?></span>
                        </div>
                        <div class="blog-stat">
                            <i class="fas fa-eye"></i>
                            <span><?= $views ?> views</span>
                        </div>
                        <div class="blog-stat">
                            <i class="fas fa-tag"></i>
                            <span><?= $category ?></span>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="content-wrapper">
                <div class="blog-content-section">
                    <img src="<?= $image ?>" alt="<?= $title ?>" class="blog-featured-image">
                    
                    <div class="blog-content">
                        <?= $content ?>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Floating Action Buttons -->
    <div class="floating-actions">
        <button class="fab" onclick="window.scrollTo({top: 0, behavior: 'smooth'})" title="Back to top">
            <i class="fas fa-arrow-up"></i>
        </button>
        
        <button class="fab" onclick="navigator.share ? navigator.share({title: '<?= $title ?>', url: window.location.href}) : copyToClipboard(window.location.href)" title="Share article">
            <i class="fas fa-share-alt"></i>
        </button>
    </div>
    
    <footer>
        <?php include 'footer.php'; ?>
    </footer>

    <script>
        // Smooth scroll behavior
        document.documentElement.style.scrollBehavior = 'smooth';

        // Sticky title and reading progress
        const stickyTitle = document.getElementById('stickyTitle');
        const progressBar = document.getElementById('progressBar');
        const blogHeader = document.querySelector('.blog-header');
        const blogContent = document.querySelector('.blog-content');
        const mainHeader = document.querySelector('header');

        function updateStickyTitle() {
            const headerRect = blogHeader.getBoundingClientRect();
            const contentRect = blogContent.getBoundingClientRect();
            const mainHeaderHeight = mainHeader ? mainHeader.offsetHeight : 80;
            
            // Adjust sticky title position based on main header height
            stickyTitle.style.marginTop = mainHeaderHeight + 'px';
            
            // Show sticky title when main title is out of view
            if (headerRect.bottom < mainHeaderHeight) {
                stickyTitle.classList.add('visible');
            } else {
                stickyTitle.classList.remove('visible');
            }

            // Update reading progress
            const contentTop = contentRect.top + window.pageYOffset;
            const contentHeight = contentRect.height;
            const windowHeight = window.innerHeight;
            const scrollTop = window.pageYOffset;
            
            // Calculate progress based on content area
            let progress = 0;
            if (scrollTop > contentTop - windowHeight) {
                progress = Math.min(
                    Math.max((scrollTop - contentTop + windowHeight) / contentHeight, 0),
                    1
                );
            }
            
            progressBar.style.width = (progress * 100) + '%';
        }

        window.addEventListener('scroll', updateStickyTitle);
        updateStickyTitle();

        // Copy to clipboard fallback
        function copyToClipboard(text) {
            navigator.clipboard.writeText(text).then(() => {
                alert('Link copied to clipboard!');
            }).catch(() => {
                const textArea = document.createElement('textarea');
                textArea.value = text;
                document.body.appendChild(textArea);
                textArea.select();
                document.execCommand('copy');
                document.body.removeChild(textArea);
                alert('Link copied to clipboard!');
            });
        }

        // Add subtle parallax effect to featured image
        window.addEventListener('scroll', () => {
            const image = document.querySelector('.blog-featured-image');
            if (image) {
                const scrolled = window.pageYOffset;
                const speed = 0.2;
                image.style.transform = `translateY(${scrolled * speed}px)`;
            }
        });

        // Smooth reveal animations on scroll
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, observerOptions);

        // Observe elements for animation
        document.querySelectorAll('.blog-stat, .fab').forEach(el => {
            el.style.opacity = '0';
            el.style.transform = 'translateY(20px)';
            el.style.transition = 'all 0.6s ease';
            observer.observe(el);
        });
    </script>
</body>
</html>