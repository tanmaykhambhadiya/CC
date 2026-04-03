<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Account Access | ConcertCircle</title>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        <link rel="icon" type="image/x-icon" href="LOGO for website (circular).png">
        <style>
            /* Global styles */
    :root {
        --primary: #6200ea;
        --primary-light: #7c43bd;
        --primary-dark: #3700b3;
        --secondary: #03dac6;
        --error: #cf6679;
        --success: #03a66a;
        --background: #121212;
        --surface: #1e1e1e;
        --surface-light: #2c2c2c;
        --on-background: #ffffff;
        --on-surface: #ffffff;
        --on-primary: #ffffff;
        --on-secondary: #000000;
        --transition: all 0.3s ease;
    }

    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    body {
        font-family: 'Montserrat', sans-serif;
        background-color: var(--background);
        color: var(--on-background);
        height: 100vh;
        overflow-x: hidden;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    /* Background styles */
    .static-background {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: var(--background);
        z-index: -3;
    }

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
        min-width: 100%;
        min-height: 100%;
        object-fit: cover;
        opacity: 0.4;
    }

    .bg-gradient-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: radial-gradient(circle at center, transparent 0%, var(--background) 85%);
        z-index: -1;
    }

    /* Container styles */
    .container {
        width: 100%;
        max-width: 400px;
        margin: 0 auto;
        padding: 20px;
        position: relative;
        z-index: 1;
    }

    /* Logo styles */
    .logo-container {
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 40px;
        text-decoration: none;
    }

    .svg-logo {
        width: 80px;
        height: 80px;
        margin-right: 15px;
    }

    .logo-text {
        font-size: 28px;
        font-weight: 700;
        color: var(--on-background);
        letter-spacing: 1px;
    }

    /* Auth container styles */
    .auth-container {
        background-color: var(--surface);
        border-radius: 12px;
        padding: 30px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        animation: fadeIn 0.5s ease-out;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    h2 {
        text-align: center;
        margin-bottom: 25px;
        font-weight: 600;
    }

    /* Form tab styles */
    .form-tabs {
        display: flex;
        position: relative;
        background-color: var(--surface-light);
        border-radius: 8px;
        margin-bottom: 25px;
    }

    .tab-btn {
        flex: 1;
        background: none;
        border: none;
        padding: 12px;
        color: var(--on-background);
        font-size: 14px;
        font-weight: 500;
        cursor: pointer;
        transition: var(--transition);
        z-index: 1;
        font-family: 'Montserrat', sans-serif;
    }

    .tab-btn.active {
        color: var(--on-primary);
    }

    .tab-indicator {
        position: absolute;
        height: 85%;
        top: 7.5%;
        background-color: var(--primary);
        border-radius: 6px;
        transition: var(--transition);
    }

    /* Form styles */
    .auth-form {
        display: none;
    }

    .auth-form.active {
        display: block;
        animation: fadeIn 0.3s ease-out;
    }

    .form-group {
        margin-bottom: 20px;
        position: relative;
    }

    .form-floating {
        position: relative;
    }

    .form-control {
        width: 100%;
        padding: 16px 16px;
        font-size: 16px;
        border: 2px solid var(--surface-light);
        border-radius: 8px;
        background-color: var(--surface-light);
        color: var(--on-background);
        transition: var(--transition);
        outline: none;
        font-family: 'Montserrat', sans-serif;
    }

    .form-control:focus {
        border-color: var(--primary);
    }

    .form-floating label {
        position: absolute;
        top: 50%;
        left: 16px;
        transform: translateY(-50%);
        pointer-events: none;
        transition: var(--transition);
        color: #aaa;
        font-size: 14px;
    }

    .form-control:focus + label,
    .form-control:not(:placeholder-shown) + label {
        top: 8px;
        left: 12px;
        font-size: 12px;
        color: var(--primary);
        padding: 0 4px;
        background-color: var(--surface-light);
    }

    .input-icon-wrapper {
        position: relative;
    }

    .toggle-password {
        position: absolute;
        right: 16px;
        top: 50%;
        transform: translateY(-50%);
        background: none;
        border: none;
        color: #aaa;
        cursor: pointer;
    }

    .flex-between {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .text-muted {
        color: #aaa;
        font-size: 14px;
        font-weight: 500; /* Improved visibility */
    }

    .text-primary {
        color: var(--primary);
        font-weight: 500; /* Improved visibility */
    }

    .forgot-password {
        color: var(--primary);
        text-decoration: none;
        font-size: 14px;
        transition: var(--transition);
        font-weight: 500; /* Improved visibility */
    }

    .forgot-password:hover {
        color: var(--primary-light);
        text-decoration: underline;
    }

    /* Button styles */
    .btn {
        width: 100%;
        padding: 14px;
        border: none;
        border-radius: 8px;
        background-color: var(--primary);
        color: var(--on-primary);
        font-weight: 600;
        font-size: 16px;
        cursor: pointer;
        transition: var(--transition);
        font-family: 'Montserrat', sans-serif;
    }

    .btn:hover {
        background-color: var(--primary-light);
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(98, 0, 234, 0.3);
    }

    .btn-block {
        width: 100%;
    }

    .animate-pulse {
        animation: buttonPulse 2s infinite;
    }

    @keyframes buttonPulse {
        0% { box-shadow: 0 0 0 0 rgba(98, 0, 234, 0.4); }
        70% { box-shadow: 0 0 0 10px rgba(98, 0, 234, 0); }
        100% { box-shadow: 0 0 0 0 rgba(98, 0, 234, 0); }
    }

    /* Divider styles */
    .divider {
        display: flex;
        align-items: center;
        text-align: center;
        margin: 20px 0;
        color: #aaa;
    }

    .divider::before,
    .divider::after {
        content: '';
        flex: 1;
        border-bottom: 1px solid #444;
    }

    .divider span {
        padding: 0 10px;
        font-size: 14px;
        font-weight: 500; /* Improved visibility */
    }

    /* Social login buttons */
    .google-btn, .phone-btn {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100%;
        padding: 12px;
        margin-bottom: 10px;
        border: 2px solid #444;
        border-radius: 8px;
        background-color: transparent;
        color: var(--on-background);
        font-weight: 500;
        font-size: 14px;
        cursor: pointer;
        transition: var(--transition);
        font-family: 'Montserrat', sans-serif;
    }

    .google-btn:hover, .phone-btn:hover {
        background-color: var(--surface-light);
        transform: translateY(-2px);
    }

    .google-icon, .phone-icon {
        margin-right: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 24px;
        height: 24px;
    }

    .google-icon i {
        color: #ea4335;
    }

    .phone-icon i {
        color: var(--secondary);
    }

    /* Password strength */
    .password-strength {
        height: 4px;
        background-color: #444;
        border-radius: 2px;
        margin-top: 8px;
        overflow: hidden;
    }

    .password-strength-meter {
        height: 100%;
        width: 0;
        background-color: var(--error);
        transition: var(--transition);
    }

    /* Alert styles */
    .alert {
        padding: 12px;
        border-radius: 8px;
        margin-bottom: 20px;
        text-align: center;
        font-weight: 500;
        opacity: 0;
        height: 0;
        overflow: hidden;
        transition: var(--transition);
        border: 1px solid transparent;
        display: none;
    }

    .alert.show {
        opacity: 1;
        height: auto;
        padding: 12px;
        margin-bottom: 20px;
        display: block;
    }

    .alert-success {
        background-color: rgba(3, 166, 106, 0.2);
        color: #03a66a;
        border-color: #03a66a;
    }

    .alert-error {
        background-color: rgba(207, 102, 121, 0.2);
        color: #cf6679;
        border-color: #cf6679;
        text-shadow: 0 0 1px rgba(0, 0, 0, 0.2);
    }

    /* Modal styles */
    .modal-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.7);
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 1000;
        opacity: 0;
        visibility: hidden;
        transition: var(--transition);
    }

    .modal-overlay.active {
        opacity: 1;
        visibility: visible;
    }

    .modal {
        background-color: var(--surface);
        width: 90%;
        max-width: 400px;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.5);
        transform: translateY(20px);
        transition: var(--transition);
    }

    .modal-overlay.active .modal {
        transform: translateY(0);
    }

    .modal-header {
        padding: 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-bottom: 1px solid #444;
    }

    .modal-title {
        font-size: 18px;
        font-weight: 600;
        margin: 0;
    }

    .close-modal {
        background: none;
        border: none;
        color: #aaa;
        font-size: 24px;
        cursor: pointer;
        transition: var(--transition);
    }

    .close-modal:hover {
        color: var(--on-background);
    }

    .modal-body {
        padding: 20px;
    }

    /* OTP input styles */
    .otp-container {
        display: flex;
        justify-content: space-between;
        margin-bottom: 20px;
    }

    .otp-input {
        width: 40px;
        height: 50px;
        text-align: center;
        font-size: 24px;
        font-weight: 600;
        border: 2px solid #444;
        border-radius: 8px;
        background-color: var(--surface-light);
        color: var(--on-background);
        transition: var(--transition);
    }

    .otp-input:focus {
        border-color: var(--primary);
        outline: none;
    }

    /* Mail suggestion styles */
    .mail-suggestion {
        position: absolute;
        top: 100%;
        left: 0;
        width: 100%;
        background-color: var(--surface);
        border-radius: 0 0 8px 8px;
        border: 1px solid #444;
        z-index: 10;
        max-height: 150px;
        overflow-y: auto;
        display: none;
    }

    .mail-suggestion.show {
        display: block;
    }

    .suggestion {
        padding: 10px 16px;
        cursor: pointer;
        transition: var(--transition);
    }

    .suggestion:hover,
    .suggestion.active {
        background-color: var(--surface-light);
        color: var(--primary);
    }

    /* Helper classes */
    .hidden {
        display: none !important;
    }

    .mb-md {
        margin-bottom: 20px;
    }

    .mt-md {
        margin-top: 20px;
    }

    .hover-scale {
        transition: var(--transition);
    }

    .hover-scale:hover {
        transform: scale(1.05);
    }

    .disabled {
        opacity: 0.5;
        pointer-events: none;
    }

    /* Nav links */
    .nav-links {
        position: absolute;
        top: 20px;
        right: 20px;
        z-index: 10;
    }

    .nav-links a {
        color: var(--on-background);
        text-decoration: none;
        font-size: 14px;
        padding: 8px 12px;
        border-radius: 6px;
        transition: var(--transition);
    }

    .nav-links a:hover {
        background-color: rgba(255, 255, 255, 0.1);
    }

    /* Responsive */
    @media (max-width: 480px) {
        .container {
            padding: 10px;
        }
        
        .auth-container {
            padding: 20px;
        }
        
        .otp-input {
            width: 35px;
            height: 45px;
            font-size: 20px;
        }
    }

    /* Loading spinner */
    .loading-spinner {
        display: inline-block;
        width: 20px;
        height: 20px;
        border: 3px solid rgba(255,255,255,.3);
        border-radius: 50%;
        border-top-color: #fff;
        animation: spin 1s ease-in-out infinite;
        margin-right: 8px;
    }

    @keyframes spin {
        to { transform: rotate(360deg); }
    }

    .btn-loading {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    /* Background animation */
    .animated-circles {
        position: fixed;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        z-index: -2;
        overflow: hidden;
    }

    .animated-circle {
        position: absolute;
        border-radius: 50%;
        background: rgba(98, 0, 234, 0.05);
        animation: floatAnimation 15s infinite ease-in-out;
    }

    .circle-1 {
        width: 300px;
        height: 300px;
        left: -150px;
        top: 10%;
        animation-delay: 0s;
    }

    .circle-2 {
        width: 200px;
        height: 200px;
        right: -100px;
        top: 30%;
        animation-delay: 3s;
    }

    .circle-3 {
        width: 400px;
        height: 400px;
        bottom: -200px;
        left: 20%;
        animation-delay: 7s;
    }

    .circle-4 {
        width: 250px;
        height: 250px;
        top: -125px;
        right: 20%;
        animation-delay: 5s;
    }

    @keyframes floatAnimation {
        0% { transform: translate(0, 0) rotate(0deg); }
        25% { transform: translate(5%, 5%) rotate(5deg); }
        50% { transform: translate(0, 10%) rotate(0deg); }
        75% { transform: translate(-5%, 5%) rotate(-5deg); }
        100% { transform: translate(0, 0) rotate(0deg); }
    }
            /* Ensure the logout button is styled appropriately */
            .logout-btn {
                color: var(--on-background);
                text-decoration: none;
                font-size: 14px;
                padding: 8px 12px;
                border-radius: 6px;
                transition: var(--transition);
            }
            .logout-btn:hover {
                background-color: rgba(255, 255, 255, 0.1);
            }
        </style>
    </head>
    <body>
        <!-- Background elements -->
        <div class="static-background"></div>
        <div class="animated-circles">
            <div class="animated-circle circle-1"></div>
            <div class="animated-circle circle-2"></div>
            <div class="animated-circle circle-3"></div>
            <div class="animated-circle circle-4"></div>
        </div>
        <div class="video-background">
            <video autoplay muted loop playsinline>
                <source src="https://assets.mixkit.co/videos/preview/mixkit-concert-lights-8575-large.mp4" type="video/mp4">
            </video>
        </div>
        <div class="bg-gradient-overlay"></div>

        <!-- Navigation links -->
        <div class="nav-links">
            <a href="contact.php"><i class="fas fa-envelope"></i> Contact</a>
            <a href="#" class="logout-btn" id="logout-btn" style="display: none;"><i class="fas fa-sign-out-alt"></i> Logout</a>
        </div>

        <div class="container">
            <!-- Logo -->
            <div class="header-container">
                <div class="logo-container">
                    <svg class="svg-logo" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1600 1200" role="img" aria-label="Concert Circle Logo">
                        <!-- SVG content remains unchanged -->
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
                    <span class="logo-text">ConcertCircle</span>
                </div>
            </div>

            <!-- Auth Container -->
            <div class="auth-container">
                <h2>Welcome Back</h2>

                <!-- Form Tabs -->
                <div class="form-tabs-container">
                    <div class="form-tabs">
                        <button class="tab-btn active" data-tab="login">Sign In</button>
                        <button class="tab-btn" data-tab="register">Sign Up</button>
                        <div class="tab-indicator"></div>
                    </div>
                </div>

                <!-- Alert Messages -->
                <div class="alert alert-success" id="success-alert">Operation successful!</div>
                <div class="alert alert-error" id="error-alert">An error occurred. Please try again.</div>

                <!-- Login Form -->
                <form class="auth-form active" id="login-form">
                    <div class="form-group" id="email-input-group">
                        <div class="form-floating">
                            <input type="email" id="login-email" class="form-control" placeholder=" " required>
                            <label for="login-email">Email Address</label>
                        </div>
                        <div class="mail-suggestion" id="mail-suggestion"></div>
                    </div>
                    <div class="form-group">
                        <div class="form-floating input-icon-wrapper">
                            <input type="password" id="login-password" class="form-control" placeholder=" " required>
                            <label for="login-password">Password</label>
                            <button type="button" class="toggle-password" tabindex="-1">
                                <i class="far fa-eye"></i>
                            </button>
                        </div>
                    </div>
                    <div class="form-group flex-between">
                        <div>
                            <input type="checkbox" id="remember-me">
                            <label for="remember-me" class="text-muted">Remember me</label>
                        </div>
                        <a href="#" class="forgot-password" id="forgot-password-link">Forgot Password?</a>
                    </div>
                    <button type="submit" class="btn btn-block animate-pulse" id="login-button">Sign In</button>
                    <div class="divider"><span>OR</span></div>
                    <button type="button" class="google-btn" id="google-signin">
                        <span class="google-icon"><i class="fab fa-google"></i></span>Sign in with Google
                    </button>
                </form>

                <!-- Register Form -->
                <form class="auth-form" id="register-form">
                    <div class="form-group">
                        <div class="form-floating">
                            <input type="text" id="register-name" class="form-control" placeholder=" " required>
                            <label for="register-name">Full Name</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-floating">
                            <input type="email" id="register-email" class="form-control" placeholder=" " required>
                            <label for="register-email">Email Address</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-floating">
                            <input type="tel" id="register-phone" class="form-control" placeholder=" " required pattern="[0-9]{10,15}">
                            <label for="register-phone">Phone Number</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-floating input-icon-wrapper">
                            <input type="password" id="register-password" class="form-control" placeholder=" " required>
                            <label for="register-password">Password</label>
                            <button type="button" class="toggle-password" tabindex="-1">
                                <i class="far fa-eye"></i>
                            </button>
                        </div>
                        <div class="password-strength">
                            <div class="password-strength-meter"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-floating input-icon-wrapper">
                            <input type="password" id="confirm-password" class="form-control" placeholder=" " required>
                            <label for="confirm-password">Confirm Password</label>
                            <button type="button" class="toggle-password" tabindex="-1">
                                <i class="far fa-eye"></i>
                            </button>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-block" id="register-button">Create Account</button>
                    <div class="divider"><span>OR</span></div>
                    <button type="button" class="google-btn" id="google-signup">
                        <span class="google-icon"><i class="fab fa-google"></i></span>Sign up with Google
                    </button>
                </form>
            </div>
        </div>

        <!-- Forgot Password Modal -->
        <div class="modal-overlay" id="forgot-password-modal">
            <div class="modal">
                <div class="modal-header">
                    <h3 class="modal-title">Reset Password</h3>
                    <button class="close-modal">×</button>
                </div>
                <div class="modal-body">
                    <form id="forgot-password-form">
                        <div class="form-group">
                            <div class="form-floating">
                                <input type="email" id="reset-email" class="form-control" placeholder=" " required>
                                <label for="reset-email">Email Address</label>
                            </div>
                        </div>
                        <p class="text-muted mb-md">Enter your email address and we'll send you a link to reset your password.</p>
                        <button type="submit" class="btn btn-block" id="reset-button">Send Reset Link</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Firebase SDK -->
        <script src="https://www.gstatic.com/firebasejs/9.22.0/firebase-app-compat.js"></script>
        <script src="https://www.gstatic.com/firebasejs/9.22.0/firebase-auth-compat.js"></script>

        <script>
            // Firebase Configuration
            const firebaseConfig = {
                apiKey: "AIzaSyDr6JiG_ZwmjH99RDVDvnAh5CmlNs5jtvY",
                authDomain: "auth-concert.firebaseapp.com",
                projectId: "auth-concert",
                storageBucket: "auth-concert.firebasestorage.app",
                messagingSenderId: "720525061223",
                appId: "1:720525061223:web:6ca8b0c21f65e1b1a878c2",
                measurementId: "G-532HJNNQ60"
            };

            // Initialize Firebase
            firebase.initializeApp(firebaseConfig);
            const auth = firebase.auth();

            // DOM Elements
            const loginForm = document.getElementById('login-form');
            const registerForm = document.getElementById('register-form');
            const forgotPasswordForm = document.getElementById('forgot-password-form');
            const forgotPasswordModal = document.getElementById('forgot-password-modal');
            const forgotPasswordLink = document.getElementById('forgot-password-link');
            const logoutBtn = document.getElementById('logout-btn');
            const navLinksContainer = document.querySelector('.nav-links');
            const tabButtons = document.querySelectorAll('.tab-btn');
            const togglePasswordButtons = document.querySelectorAll('.toggle-password');
            const successAlert = document.getElementById('success-alert');
            const errorAlert = document.getElementById('error-alert');
            const googleSigninBtn = document.getElementById('google-signin');
            const googleSignupBtn = document.getElementById('google-signup');
            const loginButton = document.getElementById('login-button');
            const registerButton = document.getElementById('register-button');
            const resetButton = document.getElementById('reset-button');
            const loginEmailInput = document.getElementById('login-email');
            const registerEmailInput = document.getElementById('register-email');
            const mailSuggestion = document.getElementById('mail-suggestion');
            const passwordInput = document.getElementById('register-password');
            const passwordStrengthMeter = document.querySelector('.password-strength-meter');

            // Utility Functions
            function addLoadingState(button, text) {
                button.innerHTML = `<span class="loading-spinner"></span>${text}`;
                button.classList.add('btn-loading');
                button.disabled = true;
            }

            function removeLoadingState(button, text) {
                button.innerHTML = text;
                button.classList.remove('btn-loading');
                button.disabled = false;
            }

            function showAlert(alertElement, message, duration = 5000) {
                alertElement.textContent = message;
                alertElement.classList.add('show');
                setTimeout(() => hideAlert(alertElement), duration);
            }

            function hideAlert(alertElement) {
                alertElement.classList.remove('show');
            }

            // Tab Switching
            function initializeTabs() {
                tabButtons.forEach(button => {
                    button.addEventListener('click', () => {
                        const tabName = button.getAttribute('data-tab');
                        tabButtons.forEach(btn => btn.classList.remove('active'));
                        button.classList.add('active');
                        document.querySelectorAll('.auth-form').forEach(form => form.classList.remove('active'));
                        document.getElementById(`${tabName}-form`).classList.add('active');
                        loginForm.reset();
                        registerForm.reset();
                        hideAlert(successAlert);
                        hideAlert(errorAlert);
                        updateTabIndicator();
                    });
                });
            }

            function updateTabIndicator() {
                const activeTab = document.querySelector('.tab-btn.active');
                const tabIndicator = document.querySelector('.tab-indicator');
                tabIndicator.style.width = `${activeTab.offsetWidth}px`;
                tabIndicator.style.left = `${activeTab.offsetLeft}px`;
            }

            // Password Toggle
            togglePasswordButtons.forEach(button => {
                button.addEventListener('click', () => {
                    const input = button.closest('.input-icon-wrapper').querySelector('input');
                    const icon = button.querySelector('i');
                    input.type = input.type === 'password' ? 'text' : 'password';
                    icon.classList.toggle('fa-eye');
                    icon.classList.toggle('fa-eye-slash');
                });
            });

            // Password Strength Meter
            passwordInput.addEventListener('input', () => {
                const password = passwordInput.value;
                let strength = 0;
                if (password.length >= 8) strength += 25;
                if (/[A-Z]/.test(password)) strength += 25;
                if (/[0-9]/.test(password)) strength += 25;
                if (/[^A-Za-z0-9]/.test(password)) strength += 25;
                passwordStrengthMeter.style.width = `${strength}%`;
                passwordStrengthMeter.style.backgroundColor = strength <= 25 ? '#cf6679' :
                    strength <= 50 ? '#e79023' :
                    strength <= 75 ? '#e7d323' : '#03a66a';
            });

            // Email Suggestions
            const emailDomains = ['gmail.com', 'yahoo.com', 'hotmail.com', 'outlook.com', 'icloud.com', 'aol.com'];
            function handleEmailInput(emailInput) {
                emailInput.addEventListener('input', e => {
                    const value = e.target.value;
                    mailSuggestion.innerHTML = '';
                    if (value.includes('@') && !value.split('@')[1].includes('.')) {
                        const username = value.split('@')[0];
                        const partialDomain = value.split('@')[1];
                        const filteredDomains = emailDomains.filter(domain => domain.startsWith(partialDomain));
                        if (filteredDomains.length) {
                            filteredDomains.forEach(domain => {
                                const suggestion = document.createElement('div');
                                suggestion.className = 'suggestion';
                                suggestion.textContent = `${username}@${domain}`;
                                suggestion.addEventListener('click', () => {
                                    emailInput.value = `${username}@${domain}`;
                                    mailSuggestion.classList.remove('show');
                                });
                                mailSuggestion.appendChild(suggestion);
                            });
                            mailSuggestion.classList.add('show');
                        } else {
                            mailSuggestion.classList.remove('show');
                        }
                    } else {
                        mailSuggestion.classList.remove('show');
                    }
                });
            }

            handleEmailInput(loginEmailInput);
            handleEmailInput(registerEmailInput);

            document.addEventListener('click', e => {
                if (!document.getElementById('email-input-group').contains(e.target)) {
                    mailSuggestion.classList.remove('show');
                }
            });

            // Modal Handling
            forgotPasswordLink.addEventListener('click', e => {
                e.preventDefault();
                forgotPasswordModal.classList.add('active');
                document.getElementById('reset-email').value = loginEmailInput.value;
            });

            document.querySelectorAll('.close-modal').forEach(button => {
                button.addEventListener('click', () => {
                    button.closest('.modal-overlay').classList.remove('active');
                });
            });

            forgotPasswordModal.addEventListener('click', e => {
                if (e.target === forgotPasswordModal) {
                    forgotPasswordModal.classList.remove('active');
                }
            });

            // Authentication Functions
            async function loginUser(email, password, rememberMe) {
                try {
                    await auth.setPersistence(rememberMe ? firebase.auth.Auth.Persistence.LOCAL : firebase.auth.Auth.Persistence.SESSION);
                    const userCredential = await auth.signInWithEmailAndPassword(email, password);
                    localStorage.setItem('user', JSON.stringify({
                        uid: userCredential.user.uid,
                        email: userCredential.user.email,
                        displayName: userCredential.user.displayName
                    }));
                    showAlert(successAlert, 'Login successful! Redirecting...');
                    setTimeout(() => window.location.href = 'index.php', 1500);
                } catch (error) {
                    let errorMessage = 'Failed to login. Please check your credentials.';
                    if (error.code === 'auth/user-not-found') errorMessage = 'No account found with this email.';
                    else if (error.code === 'auth/wrong-password') errorMessage = 'Incorrect password.';
                    else if (error.code === 'auth/too-many-requests') errorMessage = 'Too many attempts. Try again later.';
                    else if (error.code === 'auth/invalid-email') errorMessage = 'Invalid email format.';
                    showAlert(errorAlert, errorMessage);
                    throw error;
                }
            }

            async function registerUser(name, email, phone, password) {
                try {
                    const userCredential = await auth.createUserWithEmailAndPassword(email, password);
                    await userCredential.user.updateProfile({ displayName: name });
                    localStorage.setItem('user', JSON.stringify({
                        uid: userCredential.user.uid,
                        email,
                        displayName: name,
                        phone
                    }));
                    showAlert(successAlert, 'Account created successfully! Redirecting...');
                    setTimeout(() => window.location.href = 'index.php', 1500);
                } catch (error) {
                    let errorMessage = 'Failed to create account.';
                    if (error.code === 'auth/email-already-in-use') errorMessage = 'Email already in use.';
                    else if (error.code === 'auth/weak-password') errorMessage = 'Password is too weak.';
                    else if (error.code === 'auth/invalid-email') errorMessage = 'Invalid email format.';
                    showAlert(errorAlert, errorMessage);
                    throw error;
                }
            }

            async function resetPassword(email) {
                try {
                    await auth.sendPasswordResetEmail(email);
                    forgotPasswordModal.classList.remove('active');
                    showAlert(successAlert, 'Password reset link sent to your email!');
                } catch (error) {
                    let errorMessage = 'Failed to send reset link.';
                    if (error.code === 'auth/user-not-found') errorMessage = 'No account found with this email.';
                    else if (error.code === 'auth/invalid-email') errorMessage = 'Invalid email format.';
                    showAlert(errorAlert, errorMessage);
                    throw error;
                }
            }

            async function signInWithGoogle() {
                try {
                    const provider = new firebase.auth.GoogleAuthProvider();
                    const result = await auth.signInWithPopup(provider);
                    localStorage.setItem('user', JSON.stringify({
                        uid: result.user.uid,
                        email: result.user.email,
                        displayName: result.user.displayName,
                        photoURL: result.user.photoURL
                    }));
                    showAlert(successAlert, 'Google sign-in successful! Redirecting...');
                    setTimeout(() => window.location.href = 'index.php', 1500);
                } catch (error) {
                    showAlert(errorAlert, 'Google sign-in failed. Please try again.');
                    throw error;
                }
            }

            async function logoutUser() {
                try {
                    await auth.signOut();
                    localStorage.removeItem('user');
                    logoutBtn.style.display = 'none';
                    showAlert(successAlert, 'Logged out successfully!');
                    setTimeout(() => window.location.reload(), 1500);
                } catch (error) {
                    showAlert(errorAlert, 'Failed to logout. Please try again.');
                }
            }

            // Form Submissions
            loginForm.addEventListener('submit', async e => {
                e.preventDefault();
                const email = loginEmailInput.value;
                const password = document.getElementById('login-password').value;
                const rememberMe = document.getElementById('remember-me').checked;
                if (!email || !password) return showAlert(errorAlert, 'Please fill in all fields');
                addLoadingState(loginButton, 'Signing In...');
                try {
                    await loginUser(email, password, rememberMe);
                } finally {
                    removeLoadingState(loginButton, 'Sign In');
                }
            });

            registerForm.addEventListener('submit', async e => {
                e.preventDefault();
                const name = document.getElementById('register-name').value;
                const email = registerEmailInput.value;
                const phone = document.getElementById('register-phone').value;
                const password = document.getElementById('register-password').value;
                const confirmPassword = document.getElementById('confirm-password').value;
                if (!name || !email || !phone || !password || !confirmPassword) return showAlert(errorAlert, 'Please fill in all fields');
                if (password !== confirmPassword) return showAlert(errorAlert, 'Passwords do not match');
                if (password.length < 8) return showAlert(errorAlert, 'Password must be at least 8 characters');
                if (!/^[0-9]{10,15}$/.test(phone)) return showAlert(errorAlert, 'Invalid phone number');
                addLoadingState(registerButton, 'Creating Account...');
                try {
                    await registerUser(name, email, phone, password);
                } finally {
                    removeLoadingState(registerButton, 'Create Account');
                }
            });

            forgotPasswordForm.addEventListener('submit', async e => {
                e.preventDefault();
                const email = document.getElementById('reset-email').value;
                if (!email) return showAlert(errorAlert, 'Please enter your email');
                addLoadingState(resetButton, 'Sending...');
                try {
                    await resetPassword(email);
                } finally {
                    removeLoadingState(resetButton, 'Send Reset Link');
                }
            });

            googleSigninBtn.addEventListener('click', async () => {
                addLoadingState(googleSigninBtn, 'Signing in with Google...');
                try {
                    await signInWithGoogle();
                } finally {
                    removeLoadingState(googleSigninBtn, '<span class="google-icon"><i class="fab fa-google"></i></span>Sign in with Google');
                }
            });

            googleSignupBtn.addEventListener('click', async () => {
                addLoadingState(googleSignupBtn, 'Signing up with Google...');
                try {
                    await signInWithGoogle();
                } finally {
                    removeLoadingState(googleSignupBtn, '<span class="google-icon"><i class="fab fa-google"></i></span>Sign up with Google');
                }
            });

            logoutBtn.addEventListener('click', async e => {
                e.preventDefault();
                try {
                    await auth.signOut();
                    alert('Logged out successfully!');
                    window.location.reload(); // Reload the page to reflect changes
                } catch (error) {
                    console.error('Logout failed:', error);
                    alert('Failed to log out. Please try again.');
                }
            });

            // Auth State Listener
            auth.onAuthStateChanged(user => {
                if (user) {
                    // User is signed in
                    logoutBtn.style.display = 'inline-block';

                    // Dynamically update navigation links
                    const loginLink = navLinksContainer.querySelector('a[href="login.php"]');
                    if (loginLink) {
                        loginLink.style.display = 'none'; // Hide login link
                    }

                    // Redirect to index.php if on login.php
                    if (window.location.pathname.includes('login.php')) {
                        window.location.href = 'index.php';
                    }
                } else {
                    // User is signed out
                    logoutBtn.style.display = 'none';

                    // Dynamically update navigation links
                    const loginLink = navLinksContainer.querySelector('a[href="login.php"]');
                    if (loginLink) {
                        loginLink.style.display = 'inline-block'; // Show login link
                    }
                }
            });

            // Initialize
            window.addEventListener('DOMContentLoaded', () => {
                initializeTabs();
                updateTabIndicator();
                loginEmailInput.focus();
            });
        </script>
    </body>
    </html>