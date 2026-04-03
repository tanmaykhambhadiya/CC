<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="LOGO for website (circular).png" type="image/x-icon">
    <link rel="shortcut icon" href="LOGO for website (circular).png" type="image/x-icon">
    <title>Concert Circle - Support</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="footer.css">
    <style>
        /* General Reset */
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
            background: linear-gradient(rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.8)), url('concert-background.jpg');
            background-size: cover;
            background-position: center;
        }

        main {
            flex: 1;
            padding: 2rem;
            text-align: center;
        }

        .section-title {
            font-size: 2.5rem;
            font-weight: 900;
            margin-bottom: 1.5rem;
            color: #ffd700;
        }

        .support-description {
            font-size: 1.2rem;
            color: #ddd;
            margin-bottom: 2rem;
            line-height: 1.8;
        }

        .support-form {
            max-width: 600px;
            margin: 0 auto;
            background: rgba(255, 255, 255, 0.1);
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
        }

        .form-group {
            margin-bottom: 1.5rem;
            text-align: left;
        }

        .form-label {
            display: block;
            font-weight: 700;
            margin-bottom: 0.5rem;
            color: #ffd700;
        }

        .form-input, .form-textarea {
            width: 100%;
            padding: 0.8rem;
            border: none;
            border-radius: 10px;
            background: rgba(255, 255, 255, 0.1);
            color: #fff;
            font-size: 1rem;
            transition: all 0.3s;
        }

        .form-input:focus, .form-textarea:focus {
            outline: none;
            background: rgba(255, 255, 255, 0.2);
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.3);
        }

        .form-textarea {
            resize: none;
            height: 120px;
        }

        .submit-button {
            width: 100%;
            padding: 1rem;
            background: linear-gradient(45deg, #ff3131, #d269e6);
            color: #fff;
            border: none;
            border-radius: 10px;
            font-weight: bold;
            font-size: 1.1rem;
            cursor: pointer;
            transition: all 0.3s;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .submit-button:hover {
            background: linear-gradient(45deg, #d269e6, #ff3131);
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
        }

        @media (max-width: 768px) {
            .section-title {
                font-size: 2rem;
            }

            .support-description {
                font-size: 1rem;
            }
        }
    </style>
</head>
<body>
    <div class="static-background"></div>

    <!-- Include Header -->
    <?php include 'header.php'; ?>

    <main>
        <h1 class="section-title">Support</h1>
        <p class="support-description">
            We're here to help! If you have any questions, issues, or need assistance, feel free to reach out to our support team. You can contact us via the form below or email us directly at <a href="mailto:support@concertcircle.com" style="color: #52bdfb;">support@concertcircle.com</a>.
        </p>

        <div class="support-form">
            <form action="submit_support.php" method="POST">
                <div class="form-group">
                    <label for="name" class="form-label">Your Name</label>
                    <input type="text" id="name" name="name" class="form-input" placeholder="Enter your name" required>
                </div>
                <div class="form-group">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="email" id="email" name="email" class="form-input" placeholder="Enter your email" required>
                </div>
                <div class="form-group">
                    <label for="subject" class="form-label">Subject</label>
                    <input type="text" id="subject" name="subject" class="form-input" placeholder="What’s your issue?" required>
                </div>
                <div class="form-group">
                    <label for="message" class="form-label">Message</label>
                    <textarea id="message" name="message" class="form-textarea" placeholder="Describe your issue or question" required></textarea>
                </div>
                <button type="submit" class="submit-button">Send Message</button>
            </form>
        </div>
    </main>

    <!-- Include Footer -->
    <?php include 'footer.php'; ?>
</body>
</html>