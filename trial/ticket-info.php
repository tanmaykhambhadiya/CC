<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="LOGO for website (circular).png" type="image/x-icon">
    <link rel="shortcut icon" href="LOGO for website (circular).png" type="image/x-icon">
    <title>Concert Circle - Ticket Info</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700;900&display=swap" rel="stylesheet">
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
        
        
        @media (max-width: 768px) {
  header {
    position: relative;
    z-index: 10;
  }
  
  .main-content {
    padding-top: 80px; /* Adjust this value based on your header height */
  }
  
  .header-container {
    flex-direction: column;
    align-items: center;
  }
  
  nav ul {
    display: none; /* Hidden by default on mobile */
  }
  
  nav.active ul {
    display: flex;
    flex-direction: column;
    position: absolute;
    top: 100%;
    left: 0;
    width: 100%;
    background-color: #fff;
    box-shadow: 0 5px 10px rgba(0,0,0,0.1);
    z-index: 99;
  }
  
  .mobile-menu-toggle {
    display: block; /* Show hamburger menu on mobile */
    cursor: pointer;
  }
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
            width: 10%;
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
        
        nav a:hover {
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
        
        /* User dropdown menu */
        .user-dropdown {
            position: absolute;
            top: 50px;
            right: 0;
            width: 200px;
            background-color: rgba(0, 0, 0, 0.9);
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
            display: none;
            z-index: 101;
        }
        
        .user-dropdown.active {
            display: block;
            animation: fadeIn 0.3s ease;
        }
        
        .user-dropdown ul {
            list-style: none;
        }
        
        .user-dropdown li {
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .user-dropdown li:last-child {
            border-bottom: none;
        }
        
        .user-dropdown a {
            display: block;
            padding: 15px;
            color: white;
            text-decoration: none;
            transition: all 0.3s;
        }
        
        .user-dropdown a:hover {
            background-color: rgba(210, 105, 230, 0.2);
        }
        
        .main-content {
            padding-top: 80px;
            min-height: 100vh;
        }
        
        .hero-section {
            height: 600px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            position: relative;
        }
        
        .hero-content {
            max-width: 900px;
            padding: 0 20px;
            z-index: 1;
        }
        
        h1 {
            font-size: 3rem;
            font-weight: 900;
            margin-bottom: 1.5rem;
            line-height: 1.2;
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
        
        .hero-text {
            font-size: 1.2rem;
            max-width: 600px;
            margin: 0 auto 2rem;
        }
        
        .search-container {
            display: flex;
            max-width: 600px;
            margin: 0 auto;
        }
        
        .search-input {
            flex-grow: 1;
            padding: 15px;
            border: none;
            border-radius: 50px 0 0 50px;
            background-color: rgba(255, 255, 255, 0.9);
            font-size: 1rem;
        }
        
        .search-btn {
            background: linear-gradient(45deg, #ff3131, #d269e6);
            color: white;
            border: none;
            padding: 15px 25px;
            border-radius: 0 50px 50px 0;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s;
        }
        
        .search-btn:hover {
            background: linear-gradient(45deg, #d269e6, #ff3131);
        }
        
        .search-results {
            position: absolute;
            top: 100%;
            left: 0;
            width: 100%;
            background-color: rgba(0, 0, 0, 0.9);
            border-radius: 0 0 10px 10px;
            max-height: 300px;
            overflow-y: auto;
            display: none;
            z-index: 50;
        }
        
        .search-results.active {
            display: block;
            animation: fadeIn 0.3s ease;
        }
        
        .search-result-item {
            padding: 15px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            display: flex;
            align-items: center;
            transition: all 0.3s;
            cursor: pointer;
        }
        
        .search-result-item:hover {
            background-color: rgba(210, 105, 230, 0.2);
        }
        
        .search-result-icon {
            width: 40px;
            height: 40px;
            background-color: #333;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
        }
        
        .search-result-details h4 {
            margin-bottom: 5px;
            color: #ffd700;
        }
        
        .search-result-details p {
            font-size: 0.8rem;
            color: #bbb;
        }
        
        .featured-section {
            max-width: 1200px;
            margin: 0 auto;
            padding: 60px 20px;
            position: relative;
        }
        
        .section-title {
            font-size: 2.2rem;
            text-align: center;
            margin-bottom: 40px;
        }
        
        .event-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 30px;
        }
        
        .event-card {
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 15px;
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .event-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.3);
        }
        
        .event-image {
            height: 180px;
            background-color: #333;
            position: relative;
            overflow: hidden;
        }
        
        .event-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .event-date {
            position: absolute;
            top: 10px;
            right: 10px;
            background-color: rgba(255, 49, 49, 0.9);
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
            font-weight: bold;
            font-size: 0.9rem;
        }
        
        .event-details {
            padding: 20px;
        }
        
        .event-title {
            font-size: 1.3rem;
            font-weight: bold;
            margin-bottom: 10px;
            color: #ffd700;
        }
        
        .event-location {
            color: #fff;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            font-size: 0.9rem;
        }
        
        .location-icon {
            margin-right: 5px;
            color: #4ddde0;
        }
        
        .event-attendance {
            display: flex;
            align-items: center;
            margin-top: 15px;
        }
        
        .attendee-avatars {
            display: flex;
            margin-right: 10px;
        }
        
        .attendee {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background-color: #d269e6;
            border: 2px solid #121212;
            margin-left: -10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.8rem;
            font-weight: bold;
        }
        
        .attendee:first-child {
            margin-left: 0;
        }
        
        .attendance-count {
            font-size: 0.9rem;
            color: #bbb;
        }
        
        .join-button {
            display: inline-block;
            margin-top: 15px;
            background: linear-gradient(45deg, #4ddde0, #52bdfb);
            color: white;
            padding: 10px 20px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: bold;
            transition: all 0.3s;
        }
        
        .join-button:hover {
            background: linear-gradient(45deg, #52bdfb, #4ddde0);
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }
        
        /* Event Modal */
        .event-modal {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.8);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 1000;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
        }
        
        .event-modal.active {
            opacity: 1;
            visibility: visible;
        }
        
        .event-modal-content {
            background-color: #121212;
            width: 90%;
            max-width: 800px;
            border-radius: 15px;
            overflow: hidden;
            position: relative;
            transform: scale(0.9);
            transition: transform 0.3s ease;
        }
        
        .event-modal.active .event-modal-content {
            transform: scale(1);
        }
        
        .event-modal-close {
            position: absolute;
            top: 15px;
            right: 15px;
            background: rgba(0, 0, 0, 0.5);
            width: 30px;
            height: 30px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            color: white;
            cursor: pointer;
            z-index: 10;
        }
        
        .event-modal-image {
            height: 250px;
            position: relative;
            background-color: #333;
        }
        
        .event-modal-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .event-modal-details {
            padding: 30px;
        }
        
        .event-modal-title {
            font-size: 2rem;
            margin-bottom: 15px;
            color: #ffd700;
        }
        
        .event-modal-info {
            display: flex;
            gap: 30px;
            margin-bottom: 20px;
        }
        
        .event-modal-info-item {
            display: flex;
            align-items: center;
        }
        
        .event-modal-info-icon {
            margin-right: 10px;
            color: #4ddde0;
            font-size: 1.2rem;
        }
        
        .event-modal-description {
            margin-bottom: 20px;
            line-height: 1.6;
        }
        
        .event-modal-buttons {
            display: flex;
            gap: 15px;
        }
        
        .event-modal-button {
            flex: 1;
            text-align: center;
            padding: 15px;
            border-radius: 10px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s;
        }
        
        .primary-button {
            background: linear-gradient(45deg, #4ddde0, #52bdfb);
            color: white;
        }
        
        .primary-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }
        
        .secondary-button {
            background: rgba(255, 255, 255, 0.1);
            color: white;
        }
        
        .secondary-button:hover {
            background: rgba(255, 255, 255, 0.2);
        }
        
        .community-section {
            background-color: rgba(0, 0, 0, 0.6);
            padding: 80px 0;
        }
        
        .community-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
        
        .community-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
            gap: 25px;
        }
        
        .community-card {
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            padding: 20px;
            text-align: center;
            transition: all 0.3s ease;
            border: 1px solid rgba(77, 221, 224, 0.3);
            cursor: pointer;
        }
        
        .community-card:hover {
            background-color: rgba(255, 255, 255, 0.15);
            transform: translateY(-5px);
            border-color: #d269e6;
        }
        
        .community-icon {
            width: 80px;
            height: 80px;
            margin: 0 auto 15px;
            background-color: rgba(210, 105, 230, 0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
        }
        
        .community-name {
            font-size: 1.2rem;
            font-weight: bold;
            margin-bottom: 10px;
            color: #ffd700;
        }
        
        .community-members {
            color: #bbb;
            font-size: 0.9rem;
            margin-bottom: 15px;
        }
        
        /* Community Modal */
        .community-modal {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.8);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 1000;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
        }
        
        .community-modal.active {
            opacity: 1;
            visibility: visible;
        }
        
        .community-modal-content {
            background-color: #121212;
            width: 90%;
            max-width: 800px;
            border-radius: 15px;
            overflow: hidden;
            position: relative;
            transform: scale(0.9);
            transition: transform 0.3s ease;
        }
        
        .community-modal.active .community-modal-content {
            transform: scale(1);
        }
        
        .community-modal-close {
            position: absolute;
            top: 15px;
            right: 15px;
            background: rgba(0, 0, 0, 0.5);
            width: 30px;
            height: 30px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            color: white;
            cursor: pointer;
            z-index: 10;
        }
        
        .community-modal-header {
            padding: 30px;
            display: flex;
            align-items: center;
            gap: 20px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .community-modal-icon {
            width: 80px;
            height: 80px;
            background-color: rgba(210, 105, 230, 0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
        }
        
        .community-modal-title-area h2 {
            font-size: 2rem;
            color: #ffd700;
            margin-bottom: 5px;
        }
        
        .community-modal-members {
            color: #bbb;
        }
        
        .community-modal-tabs {
            display: flex;
            padding: 0 30px;
            gap: 20px;
            margin-top: 20px;
        }
        
        .community-modal-tab {
            padding-bottom: 10px;
            cursor: pointer;
            position: relative;
            transition: all 0.3s;
        }
        
        .community-modal-tab.active {
            color: #ffd700;
        }
        
        .community-modal-tab.active::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 3px;
            background-color: #ffd700;
            border-radius: 3px;
        }
        
        .community-modal-content-area {
            padding: 30px;
        }
        
        .features-section {
            max-width: 1200px;
            margin: 0 auto;
            padding: 80px 20px;
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
        
        .cta-section {
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('cta-background.jpg');
            background-size: cover;
            background-position: center;
            padding: 100px 20px;
            text-align: center;
        }
        
        .cta-content {
            max-width: 800px;
            margin: 0 auto;
        }
        
        .cta-title {
            font-size: 2.5rem;
            font-weight: 900;
            margin-bottom: 20px;
            color: #fff;
        }
        
        .cta-text {
            font-size: 1.2rem;
            color: #ddd;
            margin-bottom: 40px;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }
        
        .cta-button {
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
        
        .cta-button:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
            background: linear-gradient(45deg, #d269e6, #ff3131);
        }
        
        /* Sign Up Modal */
        .signup-modal {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.8);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 1000;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
        }
        
        .signup-modal.active {
            opacity: 1;
            visibility: visible;
        }
        
        .signup-modal-content {
            background-color: #121212;
            width: 90%;
            max-width: 500px;
            border-radius: 15px;
            overflow: hidden;
            position: relative;
            transform: scale(0.9);
            transition: transform 0.3s ease;
        }
        
        .signup-modal.active .signup-modal-content {
            transform: scale(1);
        }
        
        .signup-modal-close {
            position: absolute;
            top: 15px;
            right: 15px;
            background: rgba(0, 0, 0, 0.5);
            width: 30px;
            height: 30px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            color: white;
            cursor: pointer;
            z-index: 10;
        }
        
        .signup-modal-header {
            padding: 30px 30px 20px;
            text-align: center;
        }
        
        .signup-modal-title {
            font-size: 1.8rem;
            color: #ffd700;
            margin-bottom: 10px;
        }
        
        .signup-modal-subtitle {
            color: #bbb;
        }
        
        .signup-modal-form {
            padding: 0 30px 30px;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
        }
        
        .form-input {
            width: 100%;
            padding: 12px 15px;
            background-color: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 8px;
            color: white;
            font-size: 1rem;
            transition: all 0.3s;
        }
        
        .form-input:focus {
            outline: none;
            border-color: #52bdfb;
            background-color: rgba(255, 255, 255, 0.15);
        }
        
        .submit-button {
            width: 100%;
            padding: 15px;
            background: linear-gradient(45deg, #ff3131, #d269e6);
            color: white;
            border: none;
            border-radius: 8px;
            font-weight: bold;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.3s;
        }
        
        .submit-button:hover {
            background: linear-gradient(45deg, #d269e6, #ff3131);
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }
        
        .switch-form {
            text-align: center;
            margin-top: 20px;
            color: #bbb;
        }
        
        .switch-form a {
            color: #52bdfb;
            text-decoration: none;
            margin-left: 5px;
        }
        
        .switch-form a:hover {
            text-decoration: underline;
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
        .mobile-menu-toggle {
            display: none;
            cursor: pointer;
            font-size: 1.5rem;
        }
        
        @media (max-width: 768px) {
            .mobile-menu-toggle {
                display: block;
            }
            
            nav ul {
                display: none;
                position: absolute;
                top: 70px;
                left: 0;
                width: 100%;
                background-color: rgba(0, 0, 0, 0.9);
                flex-direction: column;
                padding: 20px;
            }
            
            nav ul.active {
                display: flex;
            }
            
            nav a {
                padding: 15px 0;
                display: block;
            }
            
            .event-grid,
            .community-grid,
            .features-grid {
                grid-template-columns: 1fr;
            }
            
            .hero-section {
                height: auto;
                padding: 60px 0;
            }
            
            h1 {
                font-size: 2.2rem;
            }
            
            .search-container {
                flex-direction: column;
            }
            
            .search-input {
                border-radius: 50px;
                margin-bottom: 10px;
            }
            
            .search-btn {
                border-radius: 50px;
            }
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
        
         .logo-container {
            display: flex;
            align-items: center;
            cursor: pointer;
            transition: transform 0.3s ease;
            max-width: 500px; /* Increased max-width */
            padding: 20px; /* Added padding for more space */
        }

        .logo-container:hover {
            transform: scale(1.05);
        }

        .svg-logo {
            width: 150px; /* Increased from 70px */
            height: 150px; /* Increased from 70px */
            transition: all 0.3s ease;
        }

        @media (max-width: 600px) {
            .svg-logo {
                width: 100px; /* Increased from 50px */
                height: 100px; /* Increased from 50px */
            }
        }
        
                .logo-text {
            font-weight: 900;
            font-size: 1.5rem;
            margin-left: 10px; /* Reduced from 20px */
            color: #ffd700;
            transition: color 0.3s ease;
        }

        .logo-container:hover .logo-text {
            color: #d269e6;
        }
    </style>
</head>
<body>
    <div class="static-background"></div>
    
    <header>
        <div class="header-container">
            <div class="logo-container">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1600 1200" class="svg-logo" role="img" aria-label="Concert Circle Logo">
                    <!-- Same SVG logo code as in index.html -->
                </svg>
                <div class="logo-text">CONCERT CIRCLE</div>
            </div>
            <nav>
                <div class="mobile-menu-toggle"><i class="fas fa-bars"></i></div>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="events.php">Events</a></li>
                    <li><a href="communities.php">Communities</a></li>
                    <li><a href="aboutus.php">About</a></li>
                    <li><a href="contact.php">Contact</a></li>
                    <li><a href="blogs.php">Blogs</a></li>
                    <li><a href="services.php">Services</a></li>
                    <li><a href="store.php">Store</a></li>
                </ul>
            </nav>
            <div class="user-menu">
                <a href="profile.html" class="user-icon">JS</a>
            </div>
        </div>
    </header>

    <main class="main-content">
        <section class="hero-section" style="height: auto; padding: 100px 20px;">
            <div class="hero-content">
                <h1>Ticket <span class="gradient-text">Information</span></h1>
                <p class="hero-text">Everything you need to know about purchasing tickets, group discounts, and our trusted ticket partners.</p>
            </div>
        </section>

        <section class="features-section">
            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon"><i class="fas fa-ticket-alt"></i></div>
                    <h3 class="feature-title">How Ticket Purchasing Works</h3>
                    <p class="feature-description">Browse events on Concert Circle, join a community, and purchase tickets directly through our platform or trusted partners. Follow the step-by-step checkout process to secure your spot!</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon"><i class="fas fa-users"></i></div>
                    <h3 class="feature-title">Group Discount Information</h3>
                    <p class="feature-description">Gather your concert crew! When you buy tickets as a group (5+ people), enjoy exclusive discounts ranging from 10-25% off, depending on the event and vendor.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon"><i class="fas fa-handshake"></i></div>
                    <h3 class="feature-title">Partner Ticket Vendors</h3>
                    <p class="feature-description">We partner with leading ticket providers like Ticketmaster, Live Nation, and StubHub to ensure secure and reliable ticket purchases for all Concert Circle members.</p>
                </div>
            </div>
        </section>
    </main>

    <footer>
        <!-- Same footer code as in index.html -->
    </footer>

    <script src="https://kit.fontawesome.com/your-fontawesome-kit.js" crossorigin="anonymous"></script>
    <script>
        // Same JavaScript for mobile menu and user dropdown as in index.html
    </script>
</body>
</html>