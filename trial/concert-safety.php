<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="LOGO for website (circular).png" type="image/x-icon">
    <link rel="shortcut icon" href="LOGO for website (circular).png" type="image/x-icon">
    <link rel="icon" type="image/x-icon" href="LOGO for website (circular).png">
    <title>Concert Circle - Concert Safety</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="footer.css">
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
            line-height: 1.6;
        }

        /* Static Background */
        .static-background {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('concert-background.jpg');
            background-size: cover;
            background-position: center;
        }

        /* Hero Section */
        .hero-section {
            text-align: center;
            padding: 100px 20px;
            background: rgba(0, 0, 0, 0.8);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .hero-section h1 {
            font-size: 3rem;
            font-weight: 900;
            margin-bottom: 1rem;
        }

        .hero-section .gradient-text {
            background: linear-gradient(90deg, #4ddde0, #52bdfb, #d269e6, #ff3131, #ffd700);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .hero-section p {
            font-size: 1.2rem;
            max-width: 600px;
            margin: 0 auto;
            color: #ddd;
        }

        /* Features Section */
        .features-section {
            max-width: 1200px;
            margin: 0 auto;
            padding: 60px 20px;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 30px;
        }

        .feature-card {
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 15px;
            padding: 30px;
            text-align: center;
            transition: all 0.3s ease;
            border: 1px solid rgba(210, 105, 230, 0.3);
        }

        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
            background-color: rgba(255, 255, 255, 0.15);
            border-color: #d269e6;
        }

        .feature-icon {
            font-size: 2.5rem;
            margin-bottom: 20px;
            color: #ffd700;
        }

        .feature-title {
            font-size: 1.3rem;
            font-weight: 700;
            margin-bottom: 15px;
            color: #fff;
        }

        .feature-description {
            color: #ddd;
            line-height: 1.6;
        }

        /* Responsive Styles */
        @media (max-width: 768px) {
            .hero-section h1 {
                font-size: 2.2rem;
            }

            .hero-section p {
                font-size: 1rem;
            }

            .features-grid {
                grid-template-columns: 1fr;
            }
        }
        /* Background components */
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
    </style>
</head>
<body>
    <!-- Include Header -->
    <?php include 'header.php'; ?>

    <main class="main-content">
        <!-- Hero Section -->
        <section class="hero-section">
            <div class="hero-content">
                <h1>Concert <span class="gradient-text">Safety</span></h1>
                <p>Your safety is our priority. Learn how to stay safe at concerts and what to do in emergencies.</p>
            </div>
        </section>

        <!-- Features Section -->
        <section class="features-section">
            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon"><i class="fas fa-shield-alt"></i></div>
                    <h3 class="feature-title">Safety Guidelines</h3>
                    <p class="feature-description">Stay hydrated, keep your belongings secure, and follow venue rules. Always plan your transportation ahead of time and stay with your group.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon"><i class="fas fa-exclamation-triangle"></i></div>
                    <h3 class="feature-title">Emergency Information</h3>
                    <p class="feature-description">Know the nearest exits, medical stations, and security points at every venue. In an emergency, contact venue staff or dial 911 immediately.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon"><i class="fas fa-flag"></i></div>
                    <h3 class="feature-title">Reporting System</h3>
                    <p class="feature-description">Witness something concerning? Use our in-app reporting tool to notify our team or venue staff discreetly and quickly.</p>
                </div>
            </div>
        </section>
    </main>

    <!-- Include Footer -->
    <?php include 'footer.php'; ?>

    <script src="https://kit.fontawesome.com/your-fontawesome-kit.js" crossorigin="anonymous"></script>
</body>
</html>