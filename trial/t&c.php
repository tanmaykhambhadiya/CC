<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Terms and Conditions for Concert Circle - Our legal agreement and user guidelines.">
    <link rel="icon" href="LOGO for website (circular).png" type="image/x-icon">
    <link rel="shortcut icon" href="LOGO for website (circular).png" type="image/x-icon">
    <title>Terms and Conditions - Concert Circle</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="footer.css">
    <style>
        /* General Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary-color: #4ddde0;
            --secondary-color: #d269e6;
            --accent-color: #ff3131;
            --highlight-color: #ffd700;
            --dark-bg: rgba(0, 0, 0, 0.7);
            --card-bg: rgba(0, 0, 0, 0.4);
            --border-color: rgba(255, 255, 255, 0.1);
            --transition: all 0.3s ease;
        }

        body {
            font-family: 'Montserrat', sans-serif;
            background-color: var(--dark-bg);
            color: #ffffff;
            line-height: 1.6;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .static-background {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -2;
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('concert-background.jpg');
            background-size: cover;
            background-position: center;
        }

        .video-background {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
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
            filter: blur(5px) brightness(0.4);
            object-fit: cover;
        }

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 2rem;
            background: rgba(0, 0, 0, 0.8);
            border-bottom: 1px solid var(--border-color);
            z-index: 10;
        }

        .logo {
            display: flex;
            align-items: center;
            text-decoration: none;
            color: var(--highlight-color);
            font-weight: 900;
            font-size: 1.5rem;
        }

        nav ul {
            display: flex;
            list-style: none;
            gap: 1.5rem;
        }

        nav a {
            color: #fff;
            text-decoration: none;
            font-weight: 600;
            transition: var(--transition);
        }

        nav a:hover {
            color: var(--primary-color);
        }

        main {
            flex: 1;
            padding: 2rem;
            text-align: center;
        }

        h1 {
            font-size: 2.5rem;
            font-weight: 900;
            margin-bottom: 1.5rem;
        }

        .gradient-text {
            background: linear-gradient(90deg, var(--primary-color), var(--secondary-color), var(--accent-color), var(--highlight-color));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        p {
            font-size: 1.2rem;
            margin-bottom: 2rem;
        }

        .contact-content {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 2rem;
        }

        .contact-info, .contact-form {
            flex: 1;
            min-width: 300px;
            max-width: 600px;
            background-color: var(--card-bg);
            padding: 2rem;
            border-radius: 10px;
            border: 1px solid var(--primary-color);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        }

        footer {
            text-align: center;
            padding: 1rem;
            background: rgba(0, 0, 0, 0.8);
            border-top: 1px solid var(--border-color);
            color: rgba(255, 255, 255, 0.7);
        }

        @media (max-width: 768px) {
            h1 {
                font-size: 2rem;
            }

            nav ul {
                flex-direction: column;
                gap: 1rem;
            }

            .contact-content {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <div class="static-background"></div>
    <div class="video-background">
        <video autoplay muted loop playsinline>
            <source src="3.mp4" type="video/mp4">
        </video>
    </div>

    <!-- Include Header -->
    <?php include 'header.php'; ?>

    <main>
        <h1>Terms and <span class="gradient-text">Conditions</span></h1>
        <p>Please read these terms and conditions carefully before using Concert Circle's services.</p>

        <div class="contact-content">
            <div class="contact-info">
                <h3>Last Updated</h3>
                <p>January 1, 2025</p>
                <h3>Contact Email</h3>
                <p><a href="mailto:info@concertcircle.com">info@concertcircle.com</a></p>
                <h3>Instagram</h3>
                <p><a href="https://www.instagram.com/concertcircle" target="_blank">@concertcircle</a></p>
            </div>

            <div class="contact-form">
                <h3>1. Acceptance of Terms</h3>
                <p>By accessing or using Concert Circle's services, you agree to be bound by these terms and conditions.</p>
                <h3>2. User Rights and Responsibilities</h3>
                <ul>
                    <li>You must be at least 13 years old to use our services.</li>
                    <li>You agree to provide accurate and current information.</li>
                    <li>You are responsible for maintaining the confidentiality of your account.</li>
                </ul>
                <h3>3. Privacy and Data</h3>
                <p>We collect and use your personal information as outlined in our Privacy Policy.</p>
            </div>
        </div>
    </main>

    <!-- Include Footer -->
    <?php include 'footer.php'; ?>
</body>
</html>