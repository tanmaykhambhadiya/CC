<?php
// filepath: t:\xampp\htdocs\public_html\trial\communities.php
// Database connection
require_once 'inc/config.php'; // Ensure this file contains your PDO connection setup

// Fetch communities data
$statement = $pdo->prepare("SELECT * FROM communities ORDER BY id ASC");
$statement->execute();
$communities = $statement->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="LOGO for website (circular).png" type="image/x-icon">
    <link rel="shortcut icon" href="LOGO for website (circular).png" type="image/x-icon">
    <title>Concert Circle - Communities</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="navbar.css" type="text/css" />
    <link rel="stylesheet" href="footer.css" type="text/css" />
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Montserrat', sans-serif;
            background-color: #121212;
            color: #ffffff;
        }
        
        /* Static background */
        .static-background {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -2;
            background-color: #000;
            background-image: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('concert-background.jpg');
            background-size: cover;
            background-position: center;
        }
        
        
        .main-content {
            padding-top: 10px;
            min-height: 100vh;
        }
        
        .page-header {
            padding: 30px 0;
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
           
            border: 1px solid rgba(210, 105, 230, 0.3);
        }
        
        .search-row {
            display: flex;
            gap: 15px;
            margin-bottom: 20px;
        }
        
        .search-input {
            flex-grow: 1;
            padding: 15px;
            border-radius: 8px;
            border: none;
            background-color: rgba(255, 255, 255, 0.9);
            font-size: 1rem;
        }
        
        .search-btn {
            background: linear-gradient(45deg, #ff3131, #d269e6);
            color: white;
            border: none;
            padding: 0 25px;
            border-radius: 8px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s;
        }
        
        .search-btn:hover {
            background: linear-gradient(45deg, #d269e6, #ff3131);
        }
        
        .filter-row {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
        }
        
        .filter-group {
            flex: 1;
            min-width: 200px;
        }
        
        .filter-label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #ffd700;
        }
        
        .filter-select {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: none;
            background-color: rgba(255, 255, 255, 0.9);
        }
        
        .categories {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin: 30px 0;
        }
        
        .category-tag {
            padding: 8px 15px;
            border-radius: 20px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s;
            background-color: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(77, 221, 224, 0.3);
        }
        
        .category-tag:hover, .category-tag.active {
            background-color: rgba(210, 105, 230, 0.3);
            border-color: #d269e6;
            color: #ffd700;
        }
        
        .communities-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 30px;
            margin-bottom: 50px;
            padding: 20px;
        }
        
        .community-card {
            background: linear-gradient(145deg, rgba(255, 255, 255, 0.1), rgba(255, 255, 255, 0.05));
            border-radius: 24px;
            overflow: hidden;
            transition: all 0.4s ease;
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.2);
            position: relative;
        }
        
        .community-card:hover {
            transform: translateY(-8px);
            border-color: rgba(210, 105, 230, 0.5);
            box-shadow: 0 15px 40px rgba(210, 105, 230, 0.2);
        }
        
        .community-banner {
            height: 180px;
            position: relative;
            overflow: hidden;
        }
        
        .community-banner::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 60%;
            background: linear-gradient(to top, rgba(0, 0, 0, 0.8), transparent);
        }
        
        .community-banner img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }
        
        .community-card:hover .community-banner img {
            transform: scale(1.1);
        }
        
        .community-icon {
            position: absolute;
            bottom: -25px;
            left: 25px;
            width: 70px;
            height: 70px;
            background: linear-gradient(135deg, #4ddde0, #52bdfb);
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.2rem;
            border: 4px solid #121212;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
            z-index: 2;
            transform: rotate(-5deg);
            transition: transform 0.3s ease;
        }
        
        .community-card:hover .community-icon {
            transform: rotate(0deg) scale(1.05);
        }
        
        .community-content {
            padding: 35px 25px 25px;
            position: relative;
        }
        
        .community-info {
            margin-bottom: 20px;
        }
        
        .community-name {
            font-size: 1.5rem;
            font-weight: 800;
            margin-bottom: 12px;
            background: linear-gradient(90deg, #4ddde0, #52bdfb);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            letter-spacing: 0.5px;
        }
        
        .community-stats {
            display: flex;
            gap: 15px;
            color: #bbb;
            font-size: 0.9rem;
        }
        
        .members, .activity {
            display: flex;
            align-items: center;
            gap: 6px;
        }
        
        .members i, .activity i {
            color: #4ddde0;
            font-size: 0.85rem;
        }
        
        .community-description {
            color: rgba(255, 255, 255, 0.85);
            margin-bottom: 20px;
            line-height: 1.6;
            font-size: 0.95rem;
        }
        
        .community-tags {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin-bottom: 25px;
        }
        
        .community-tag {
            padding: 6px 14px;
            border-radius: 20px;
            font-size: 0.85rem;
            background: rgba(77, 221, 224, 0.1);
            color: #4ddde0;
            border: 1px solid rgba(77, 221, 224, 0.3);
            transition: all 0.3s ease;
        }
        
        .community-tag:hover {
            background: rgba(77, 221, 224, 0.2);
            border-color: rgba(77, 221, 224, 0.5);
            transform: translateY(-2px);
        }
        
        .button-group {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px;
        }
        
        .join-circle-button, .join-community-button {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 12px;
            border-radius: 12px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-size: 0.85rem;
        }
        
        .join-circle-button {
            background: linear-gradient(135deg, #ff3131, #d269e6);
            color: white;
            border: none;
        }
        
        .join-community-button {
            background: transparent;
            color: #fff;
            border: 2px solid #4ddde0;
        }
        
        .join-circle-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(210, 105, 230, 0.3);
            background: linear-gradient(135deg, #d269e6, #ff3131);
        }
        
        .join-community-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(77, 221, 224, 0.2);
            background: rgba(77, 221, 224, 0.1);
            border-color: #52bdfb;
        }
        
        .join-circle-button i, .join-community-button i {
            font-size: 0.9rem;
        }
        
        .featured-communities {
            background-color: rgba(0, 0, 0, 0.6);
            padding: 60px 0;
            margin: 50px 0;
        }
        
        .section-title {
            font-size: 2.2rem;
            text-align: center;
            margin-bottom: 40px;
        }
        
        .pagination {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 30px;
        }
        
        .page-link {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 8px;
            color: white;
            text-decoration: none;
            transition: all 0.3s;
        }
        
        .page-link:hover, .page-link.active {
            background-color: #d269e6;
        }
        
        .create-community {
            margin: 50px 0;
            text-align: center;
        }
        
        .create-title {
            font-size: 1.8rem;
            margin-bottom: 20px;
        }
        
        .create-button {
            background: linear-gradient(45deg, #ff3131, #d269e6);
            color: white;
            border: none;
            padding: 15px 30px;
            font-size: 1.2rem;
            font-weight: bold;
            border-radius: 50px;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
        }
        
        .create-button:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
            background: linear-gradient(45deg, #d269e6, #ff3131);
        }
        
        /* Mobile menu */
        .mobile-menu-btn {
            display: none;
            background: none;
            border: none;
            color: white;
            font-size: 1.5rem;
            cursor: pointer;
        }
        
        @media (max-width: 900px) {
            .mobile-menu-btn {
                display: block;
            }
            
            .page-title {
                font-size: 2rem;
            }
            
            .search-row {
                flex-direction: column;
            }
            
            .search-btn {
                padding: 15px;
            }
            
            .filter-row {
                flex-direction: column;
            }
        }
        
        @media (max-width: 600px) {
            .header-container {
                padding: 0 15px;
            }
            
            .logo {
                width: 40px;
                height: 40px;
            }
            
            .logo-text {
                font-size: 1rem;
            }
            
            .page-title {
                font-size: 1.8rem;
            }
            
            .page-description {
                font-size: 1rem;
            }
            
            .section-title {
                font-size: 1.8rem;
            }
        }
    </style>
</head>
<body>
    <div class="static-background" aria-hidden="true"></div>
    
    <?php include 'header.php'; ?>
    
    <section class="page-header">
        <div class="container">
            <h1 class="page-title">Discover Music <span class="gradient-text">Communities</span></h1>
        </div>
    </section>
    
    <main class="main-content">
        <section class="container">
            <div class="search-filter-container">
                <div class="search-row">
                    <input type="text" class="search-input" placeholder="Search for communities...">
                    <button class="search-btn">Search</button>
                </div>
                
               
            </div>
            
          
            
            <div class="communities-grid">
                <?php foreach ($communities as $community): ?>
                <div class="community-card">
                    <div class="community-banner">
                        <img src="<?php echo htmlspecialchars('uploads/communities/' . $community['banner_image_url']); ?>" alt="<?php echo htmlspecialchars($community['name']); ?> banner">
                     </div>
                    <div class="community-content">
                        <div class="community-info">
                            <div class="community-text">
                                <h3 class="community-name"><?php echo htmlspecialchars($community['name']); ?></h3>
                                <div class="community-stats">
                                    <div class="members">
                                        <i class="fas fa-users"></i>
                                        <?php echo number_format($community['members_count']); ?> members
                                    </div>
                                    <div class="activity">
                                        <i class="fas fa-chart-line"></i>
                                        Active
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p class="community-description"><?php echo htmlspecialchars($community['description']); ?></p>
                        <div class="community-tags">
                            <?php 
                            $tags = explode(',', $community['tags']);
                            foreach ($tags as $tag): ?>
                                <span class="community-tag"><?php echo htmlspecialchars(trim($tag)); ?></span>
                            <?php endforeach; ?>
                        </div>
                        <div class="button-group">
                                <a href="<?php echo htmlspecialchars($community['join_circle_link']); ?>" class="join-circle-button" target="_blank">
                                <i class="fas fa-link"></i>
                                Join Community
                            </a>
                           
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            
            <div class="pagination">
                <a href="#" class="page-link active">1</a>
                <a href="#" class="page-link">2</a>
                <a href="#" class="page-link">3</a>
                <a href="#" class="page-link">4</a>
                <a href="#" class="page-link">5</a>
                <a href="#" class="page-link">→</a>
            </div>
        </section>
    </main>
    
    <?php include 'footer.php'; ?>
</body>
</html>