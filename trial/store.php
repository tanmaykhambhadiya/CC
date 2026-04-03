<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="LOGO for website (circular).png" type="image/x-icon">
    <link rel="shortcut icon" href="LOGO for website (circular).png" type="image/x-icon">
    <title>Concert Circle - Store</title>
    <link rel="stylesheet" href="store.css">
    <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="footer.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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
            overflow-x: hidden;
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

        header {
            background-color: rgba(0, 0, 0, 0.8);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            padding: 15px 0;
            position: fixed;
            width: 100%;
            z-index: 100;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
        }

        .header-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .logo-container {
            display: flex;
            align-items: center;
        }

        .logo {
            width: 50px;
            height: 50px;
            position: relative;
        }

        .circle {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border-radius: 50%;
            border: 2px solid transparent;
        }

        .circle-outer {
            border-color: #d269e6;
        }

        .circle-middle {
            border-color: #ff3131;
            transform: scale(0.85);
        }

        .circle-inner {
            border-color: #4ddde0;
            transform: scale(0.7);
        }

        .logo-text {
            font-weight: 900;
            font-size: 1.2rem;
            margin-left: 10px;
            color: #ffd700;
        }

        nav ul {
            display: flex;
            list-style: none;
            gap: 20px;
        }

        nav a {
            color: white;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s;
            padding: 8px 16px;
            border-radius: 25px;
        }

        nav a:hover,
        nav a.active {
            background-color: rgba(210, 105, 230, 0.3);
            color: #ffd700;
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
            padding-top: 80px;
            min-height: 100vh;
            position: relative;
            z-index: 1;
        }

        .page-banner {
            height: 175px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            position: relative;
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('store-banner.jpg');
            background-size: cover;
            background-position: center;
            transition: background 0.5s ease;
            z-index: 1;
        }

        .banner-content {
            max-width: 900px;
            padding: 0 20px;
            z-index: 2;
            opacity: 0;
            animation: fadeIn 1s ease forwards;
        }

        @keyframes fadeIn {
            0% { opacity: 0; transform: translateY(20px); }
            100% { opacity: 1; transform: translateY(0); }
        }

        h1 {
            font-size: 3rem;
            font-weight: 900;
            margin-bottom: 1.5rem;
            line-height: 1.2;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.5);
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
            transition: width 0.3s ease;
        }

        .banner-text {
            font-size: 1.2rem;
            max-width: 600px;
            margin: 0 auto;
            text-shadow: 0 1px 5px rgba(0, 0, 0, 0.3);
        }

        .store-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 60px 20px;
            position: relative;
            z-index: 1;
        }

        .store-controls {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 40px;
        }

        .store-search {
            display: flex;
            max-width: 400px;
        }

        .store-search input {
            flex-grow: 1;
            padding: 12px 15px;
            border: none;
            border-radius: 50px 0 0 50px;
            background-color: rgba(255, 255, 255, 0.1);
            color: white;
            font-size: 1rem;
            transition: background-color 0.3s ease;
        }

        .store-search input:focus {
            background-color: rgba(255, 255, 255, 0.2);
            outline: none;
        }

        .store-search button {
            background: linear-gradient(45deg, #ff3131, #d269e6);
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 0 50px 50px 0;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s;
        }

        .store-search button:hover {
            background: linear-gradient(45deg, #d269e6, #ff3131);
        }

        .category-filter {
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
        }

        .category-btn {
            background-color: rgba(255, 255, 255, 0.1);
            border: none;
            padding: 10px 20px;
            border-radius: 25px;
            color: white;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
        }

        .category-btn:hover,
        .category-btn.active {
            background-color: rgba(210, 105, 230, 0.3);
            color: #ffd700;
        }

        .featured-product {
            margin-bottom: 60px;
            background-color: rgba(255, 255, 255, 0.05);
            border-radius: 20px;
            overflow: hidden;
            display: grid;
            grid-template-columns: 1fr 1fr;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease;
            position: relative;
            z-index: 1;
        }

        .featured-product:hover {
            transform: translateY(-5px);
        }

        .featured-product-image {
            height: 400px;
            background-color: #333;
            position: relative;
            z-index: 1;
            overflow: hidden;
        }

        .featured-product-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
            transition: transform 0.5s ease;
            display: block;
            position: absolute;
            top: 0;
            left: 0;
            z-index: 1;
        }

        .featured-product:hover .featured-product-image img {
            transform: scale(1.05);
        }

        .featured-label {
            position: absolute;
            top: 20px;
            left: 20px;
            background-color: rgba(255, 49, 49, 0.9);
            color: white;
            padding: 8px 20px;
            border-radius: 25px;
            font-weight: bold;
            font-size: 0.9rem;
            text-transform: uppercase;
            z-index: 2;
        }

        .featured-product-content {
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            opacity: 0;
            animation: fadeIn 1s ease forwards;
            animation-delay: 0.2s;
            position: relative;
            z-index: 1;
        }

        .featured-product-title {
            font-size: 2rem;
            font-weight: 900;
            margin-bottom: 20px;
            color: #ffd700;
            line-height: 1.3;
        }

        .featured-product-description {
            color: #ddd;
            margin-bottom: 20px;
            line-height: 1.8;
            font-size: 1.1rem;
        }

        .featured-product-price {
            font-size: 1.8rem;
            font-weight: bold;
            margin-bottom: 30px;
            color: #4ddde0;
        }

        .buy-btn {
            display: inline-block;
            background: linear-gradient(45deg, #ff3131, #d269e6);
            color: white;
            padding: 15px 30px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: bold;
            transition: all 0.3s;
            border: none;
            cursor: pointer;
            font-size: 1rem;
            text-align: center;
            max-width: 200px;
        }

        .buy-btn:hover {
            background: linear-gradient(45deg, #d269e6, #ff3131);
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .add-to-cart {
            display: inline-block;
            background: transparent;
            color: white;
            padding: 15px 30px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: bold;
            transition: all 0.3s;
            border: 2px solid #4ddde0;
            cursor: pointer;
            font-size: 1rem;
            text-align: center;
            max-width: 200px;
            margin-left: 15px;
        }

        .add-to-cart:hover {
            background-color: rgba(77, 221, 224, 0.2);
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .products-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 30px;
        }

        .product-card {
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 15px;
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .product-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.3);
        }

        .product-image {
            height: 280px;
            background-color: #333;
            position: relative;
            overflow: hidden;
        }

        .product-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .product-card:hover .product-image img {
            transform: scale(1.05);
        }

        .product-tag {
            position: absolute;
            top: 15px;
            left: 15px;
            background-color: rgba(210, 105, 230, 0.9);
            color: white;
            padding: 5px 15px;
            border-radius: 25px;
            font-weight: bold;
            font-size: 0.8rem;
            text-transform: uppercase;
        }

        .product-details {
            padding: 25px;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }

        .product-title {
            font-size: 1.3rem;
            font-weight: bold;
            margin-bottom: 10px;
            color: #ffd700;
        }

        .product-price {
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 20px;
            color: #4ddde0;
        }

        .product-actions {
            display: flex;
            gap: 10px;
            margin-top: auto;
        }

        .product-buy {
            flex: 1;
            padding: 10px;
            background: linear-gradient(45deg, #ff3131, #d269e6);
            color: white;
            border: none;
            border-radius: 25px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s;
        }

        .product-buy:hover {
            background: linear-gradient(45deg, #d269e6, #ff3131);
            transform: translateY(-3px);
        }

        .product-cart {
            width: 40px;
            height: 40px;
            background-color: transparent;
            border: 2px solid #4ddde0;
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s;
        }

        .product-cart:hover {
            background-color: rgba(77, 221, 224, 0.2);
            transform: translateY(-3px);
        }

        .section-title {
            font-size: 2rem;
            font-weight: 900;
            margin-bottom: 30px;
            color: white;
        }

        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 60px;
            gap: 10px;
        }

        .page-btn {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: rgba(255, 255, 245, 0.1);
            border: none;
            color: white;
            font-weight: bold;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s;
        }

        .page-btn:hover,
        .page-btn.active {
            background: linear-gradient(45deg, #ff3131, #d269e6);
        }

        footer {
            background-color: rgba(0, 0, 0, 0.9);
            padding: 60px 0 30px;
        }

        .footer-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 40px;
        }

        .footer-logo-container {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .footer-logo {
            width: 40px;
            height: 40px;
            position: relative;
        }

        .footer-logo-text {
            font-weight: 900;
            font-size: 1.2rem;
            margin-left: 10px;
            color: #ffd700;
        }

        .footer-about {
            color: #bbb;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .social-links {
            display: flex;
            gap: 15px;
        }

        .social-link {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: rgba(255, 255, 255, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s;
        }

        .social-link:hover {
            background-color: #d269e6;
            transform: translateY(-3px);
        }

        .footer-title {
            font-size: 1.2rem;
            font-weight: bold;
            margin-bottom: 20px;
            color: #fff;
        }

        .footer-links {
            list-style: none;
        }

        .footer-links li {
            margin-bottom: 15px;
        }

        .footer-links a {
            color: #bbb;
            text-decoration: none;
            transition: all 0.3s;
        }

        .footer-links a:hover {
            color: #ffd700;
        }

        .copyright {
            text-align: center;
            color: #777;
            padding-top: 30px;
            margin-top: 40px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
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

        .cart-count {
            position: relative;
        }

        .cart-badge {
            position: absolute;
            top: -5px;
            right: -5px;
            background-color: #ff3131;
            color: white;
            font-size: 0.7rem;
            font-weight: bold;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Mobile view adjustments for screens up to 900px */
        @media (max-width: 900px) {
            

            nav.active {
                left: 0;
            }

            nav ul {
                flex-direction: column;
                gap: 15px;
            }

            .mobile-menu-btn {
                display: block;
                font-size: 1.8rem;
            }

            .featured-product {
                grid-template-columns: 1fr;
            }

            .featured-product-image {
                height: 200px;
                width: 100%;
            }

            .featured-product-image img {
                width: 100%;
                height: 100%;
                object-fit: cover;
                object-position: center;
            }

            .featured-product-content {
                padding: 20px;
            }

            .products-grid {
                grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
            }

            .store-controls {
                flex-direction: column;
                gap: 15px;
                align-items: flex-start;
            }

            .store-search {
                width: 100%;
                max-width: none;
            }

            .store-search input {
                padding: 10px;
                font-size: 0.9rem;
            }

            .store-search button {
                padding: 10px 15px;
                font-size: 0.9rem;
            }
        }

        /* Mobile view adjustments for screens up to 600px */
        @media (max-width: 600px) {
            .header-container {
                padding: 0 10px;
                height: 50px;
            }

            .logo {
                width: 35px;
                height: 35px;
            }

            .logo-text {
                font-size: 0.9rem;
                color: #ffd700;
            }

            .mobile-menu-btn {
                font-size: 1.5rem;
            }

            h1 {
                font-size: 1.8rem;
            }

            .banner-text {
                font-size: 0.9rem;
            }

            .page-banner {
                height: 120px;
            }

            .featured-product-title {
                font-size: 1.3rem;
            }

            .featured-product-description {
                font-size: 0.9rem;
                line-height: 1.6;
            }

            .featured-product-price {
                font-size: 1.5rem;
                margin-bottom: 20px;
            }

            .featured-product-content {
                padding: 15px;
            }

            .featured-product-image {
                height: 180px;
            }

            .featured-product-image img {
                width: 100%;
                height: 100%;
                object-fit: cover;
                object-position: center;
            }

            /* Stack buttons vertically */
            .featured-product-content div {
                display: flex;
                flex-direction: column;
                gap: 10px;
            }

            .buy-btn,
            .add-to-cart {
                max-width: 100%;
                padding: 12px 20px;
                font-size: 0.9rem;
            }

            .add-to-cart {
                margin-left: 0;
            }

            .products-grid {
                grid-template-columns: 1fr;
                gap: 20px;
            }

            .product-image {
                height: 220px;
            }

            .product-details {
                padding: 15px;
            }

            .product-title {
                font-size: 1.1rem;
            }

            .product-price {
                font-size: 1.3rem;
                margin-bottom: 15px;
            }

            .product-actions {
                gap: 8px;
            }

            .product-buy {
                padding: 8px;
                font-size: 0.9rem;
            }

            .product-cart {
                width: 35px;
                height: 35px;
            }

            .category-filter {
                flex-wrap: nowrap;
                overflow-x: auto;
                padding-bottom: 10px;
                -webkit-overflow-scrolling: touch;
                width: 100%;
            }

            .category-btn {
                flex: 0 0 auto;
                white-space: nowrap;
                padding: 8px 15px;
                font-size: 0.9rem;
            }

            .section-title {
                font-size: 1.5rem;
            }

            .pagination {
                margin-top: 40px;
            }

            .page-btn {
                width: 35px;
                height: 35px;
                font-size: 0.9rem;
            }

            .footer-container {
                padding: 0 15px;
                gap: 30px;
            }

            .footer-logo {
                width: 35px;
                height: 35px;
            }

            .footer-logo-text {
                font-size: 1rem;
            }

            .footer-about {
                font-size: 0.9rem;
            }

            .footer-title {
                font-size: 1.1rem;
            }

            .footer-links li {
                margin-bottom: 10px;
            }

            .footer-links a {
                font-size: 0.9rem;
            }

            .social-link {
                width: 35px;
                height: 35px;
            }
        }

        /* Extra small screens (below 400px) */
        @media (max-width: 400px) {
            .header-container {
                padding: 0 8px;
                height: 45px;
            }

            .logo {
                width: 30px;
                height: 30px;
            }

            .logo-text {
                font-size: 0.8rem;
            }

            .mobile-menu-btn {
                font-size: 1.3rem;
            }

            h1 {
                font-size: 1.5rem;
            }

            .banner-text {
                font-size: 0.8rem;
            }

            .page-banner {
                height: 100px;
            }

            .store-container {
                padding: 40px 10px;
            }

            .featured-product-image {
                height: 150px;
            }

            .featured-product-image img {
                width: 100%;
                height: 100%;
                object-fit: cover;
                object-position: center;
            }

            .featured-product-title {
                font-size: 1.1rem;
            }

            .featured-product-description {
                font-size: 0.8rem;
            }

            .featured-product-price {
                font-size: 1.3rem;
            }

            .buy-btn,
            .add-to-cart {
                padding: 10px 15px;
                font-size: 0.8rem;
            }

            .product-image {
                height: 200px;
            }

            .product-title {
                font-size: 1rem;
            }

            .product-price {
                font-size: 1.2rem;
            }

            .store-search input {
                font-size: 0.8rem;
            }

            .store-search button {
                padding: 8px 12px;
                font-size: 0.8rem;
            }

            .category-btn {
                padding: 6px 12px;
                font-size: 0.8rem;
            }
        }
    </style>
</head>

<body>
    <div class="static-background"></div>

    <?php
    require_once('header.php');
    require_once('inc/config.php'); // Include your database connection file
    ?>

    <main class="main-content">
        <section class="page-banner">
            <div class="banner-content">
                <h1>Concert Circle <span class="gradient-text">Store</span></h1>
                <p class="banner-text">Merchandise, gear, and exclusive items for music lovers</p>
            </div>
        </section>

        <section class="store-container">
            <?php
            // Fetch the featured product
            $statement = $pdo->prepare("SELECT * FROM featured_products WHERE is_featured = 1 LIMIT 1");
            $statement->execute();
            $featured_product = $statement->fetch(PDO::FETCH_ASSOC);

            if ($featured_product): ?>
                <div class="featured-product">
                    <div class="featured-product-image">
                        <img src="uploads/featured-products/<?php echo htmlspecialchars($featured_product['image_url']); ?>" alt="<?php echo htmlspecialchars($featured_product['title']); ?>">
                        <div class="featured-label">Featured</div>
                    </div>
                    <div class="featured-product-content">
                        <h2 class="featured-product-title"><?php echo htmlspecialchars($featured_product['title']); ?></h2>
                        <p class="featured-product-description"><?php echo htmlspecialchars($featured_product['description']); ?></p>
                        <p class="featured-product-price">₹<?php echo htmlspecialchars($featured_product['price']); ?></p>
                        <div>
                            <button class="buy-btn">Buy Now</button>
                            <button class="add-to-cart">Add to Cart</button>
                        </div>
                    </div>
                </div>
            <?php else: ?>
                <p>No featured product available at the moment.</p>
            <?php endif; ?>
        </section>
    </main>

    <?php include 'footer.php'; ?>

    <script>
        // Mobile menu toggle
        const mobileMenuBtn = document.querySelector('.mobile-menu-btn');
        const nav = document.querySelector('nav');

        mobileMenuBtn.addEventListener('click', () => {
            nav.classList.toggle('active');
        });

        // Category filter
        const categoryBtns = document.querySelectorAll('.category-btn');

        categoryBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                categoryBtns.forEach(b => b.classList.remove('active'));
                btn.classList.add('active');
                // Here you would add code to filter products
            });
        });

        // Cart functionality
        const addToCartBtns = document.querySelectorAll('.add-to-cart, .product-cart');

        addToCartBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                // Here you would add code to add items to cart
                alert('Item added to cart!');
            });
        });
    </script>
</body>

</html>