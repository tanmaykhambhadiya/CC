<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - ConcertCircle PDF Generator</title>
    <link rel="icon" href="LOGO for website (circular).png" type="image/x-icon">
    <link rel="shortcut icon" href="LOGO for website (circular).png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700;900&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --background: hsl(240, 15%, 12%);
            --foreground: hsl(0, 0%, 95%);
            --primary: hsl(280, 80%, 60%);
            --secondary: hsl(240, 15%, 18%);
            --accent: hsl(320, 65%, 55%);
            --concert-dark: hsl(240, 15%, 12%);
            --concert-card: hsl(240, 15%, 16%);
            --concert-border: hsl(240, 15%, 22%);
            --error: hsl(0, 80%, 55%);
            --success: hsl(140, 70%, 40%);
        }

        body {
            font-family: 'Open Sans', sans-serif;
            background: linear-gradient(135deg, var(--concert-dark), var(--secondary));
            color: var(--foreground);
            min-height: 100vh;
            margin: 0;
            padding: 0;
        }

        .logo-container {
            display: flex;
            align-items: center;
            padding: 1rem;
        }

        .logo-text {
            font-family: 'Poppins', sans-serif;
            font-weight: 900;
            font-size: 1.6rem;
            letter-spacing: -0.02em;
        }

        .logo-text .concert { color: var(--accent); }
        .logo-text .circle { color: var(--primary); margin-left: 0.3rem; }

        .auth-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            padding: 2rem;
        }

        .auth-form {
            background: var(--concert-card);
            border: 1px solid var(--concert-border);
            border-radius: 0.8rem;
            padding: 1.5rem;
            width: 100%;
            max-width: 360px;
            box-shadow: 0 6px 12px hsla(240, 15%, 10%, 0.2);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .auth-form:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px hsla(280, 80%, 60%, 0.15);
        }

        .auth-form h2 {
            font-family: 'Poppins', sans-serif;
            color: var(--primary);
            text-align: center;
            margin-bottom: 1.2rem;
            font-size: 1.4rem;
        }

        .auth-container input {
            margin: 0.4rem 0;
            padding: 0.6rem;
            border-radius: 0.4rem;
            border: 1px solid var(--concert-border);
            background: var(--secondary);
            color: var(--foreground);
            width: 100%;
            box-sizing: border-box;
            font-size: 0.85rem;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        .auth-container input:focus {
            border-color: var(--primary);
            box-shadow: 0 0 6px hsla(280, 80%, 60%, 0.3);
            outline: none;
        }

        .auth-container button {
            padding: 0.7rem;
            border-radius: 0.4rem;
            background: linear-gradient(135deg, var(--accent), var(--primary));
            color: var(--concert-dark);
            border: none;
            cursor: pointer;
            font-weight: 600;
            font-family: 'Poppins', sans-serif;
            width: 100%;
            margin-top: 0.8rem;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .auth-container button:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px hsla(280, 80%, 60%, 0.3);
        }

        .auth-container button:disabled {
            opacity: 0.6;
            cursor: not-allowed;
            transform: none;
        }

        .error-message {
            color: var(--error);
            background: rgba(220, 38, 127, 0.1);
            border: 1px solid var(--error);
            border-radius: 0.4rem;
            padding: 0.4rem;
            margin: 0.4rem 0;
            text-align: center;
            font-size: 0.8rem;
        }

        .container {
            max-width: 1000px;
            margin: 0 auto;
            padding: 1rem;
        }

        header, .admin-section { display: none; }

        .section-card {
            background: var(--concert-card);
            border: 1px solid var(--concert-border);
            border-radius: 0.8rem;
            padding: 1.5rem;
            box-shadow: 0 6px 12px hsla(240, 15%, 10%, 0.2);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .section-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px hsla(280, 80%, 60%, 0.15);
        }

        .section-title {
            font-family: 'Poppins', sans-serif;
            font-size: 1.6rem;
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 1rem;
        }

        .admin-form {
            display: grid;
            gap: 0.8rem;
        }

        .form-group label {
            font-size: 0.85rem;
            font-weight: 500;
            color: var(--foreground);
            margin-bottom: 0.3rem;
        }

        .form-group input,
        .form-group textarea,
        .form-group select {
            background: var(--secondary);
            border: 1px solid var(--concert-border);
            border-radius: 0.4rem;
            padding: 0.8rem;
            color: var(--foreground);
            font-size: 0.85rem;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
            width: 100%;
            min-height: 120px;
        }

        .form-group input:focus,
        .form-group textarea:focus,
        .form-group select:focus {
            border-color: var(--primary);
            box-shadow: 0 0 6px hsla(280, 80%, 60%, 0.3);
            outline: none;
        }

        .form-group textarea {
            min-height: 120px;
            resize: vertical;
        }

        .form-group input[type="text"],
        .form-group input[type="number"] {
            min-height: 40px;
        }

        .cta-button {
            background: linear-gradient(135deg, var(--accent), var(--primary));
            color: var(--concert-dark);
            padding: 0.7rem 1.2rem;
            border-radius: 0.4rem;
            font-weight: 600;
            font-family: 'Poppins', sans-serif;
            cursor: pointer;
            border: none;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .cta-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px hsla(280, 80%, 60%, 0.3);
        }

        .button-group {
            display: flex;
            gap: 0.8rem;
            margin-top: 1rem;
        }

        .pdf-preview {
            margin-top: 1.5rem;
            background: #fff;
            border-radius: 0.8rem;
            padding: 1.2rem;
            max-width: 595pt;
            color: #000;
            box-shadow: 0 6px 12px hsla(240, 15%, 10%, 0.15);
        }

        .pdf-header {
            background: linear-gradient(135deg, var(--accent), var(--primary));
            padding: 0.8rem;
            color: var(--concert-dark);
            text-align: center;
            border-radius: 0.4rem;
            margin-bottom: 1rem;
        }

        .pdf-section {
            border-left: 3px solid var(--primary);
            padding-left: 1rem;
            margin-bottom: 1rem;
            background: #f8f9fa;
            border-radius: 0.4rem;
            padding: 1rem;
        }

        .pdf-section-title {
            font-family: 'Poppins', sans-serif;
            font-size: 1.1rem;
            font-weight: 700;
            color: var(--accent);
            margin-bottom: 0.5rem;
            display: flex;
            align-items: center;
        }

        .pdf-section-title i {
            margin-right: 0.5rem;
            color: var(--primary);
            font-size: 1.1rem;
        }

        .pdf-footer {
            margin-top: 1rem;
            width: 100%;
            text-align: center;
            font-size: 8pt;
            color: #666;
            border-top: 1px solid #ddd;
            padding-top: 0.5rem;
        }

        .status-message {
            position: fixed;
            top: 15px;
            right: 15px;
            padding: 0.6rem;
            border-radius: 0.4rem;
            color: white;
            font-weight: 600;
            font-family: 'Poppins', sans-serif;
            font-size: 0.85rem;
            z-index: 1000;
            transform: translateX(100%);
            transition: transform 0.3s ease;
        }

        .status-message.show { transform: translateX(0); }
        .status-message.success { background: var(--success); }
        .status-message.error { background: var(--error); }

        .logout-btn {
            position: fixed;
            top: 15px;
            right: 15px;
            background: var(--error);
            color: white;
            border: none;
            padding: 0.4rem 0.8rem;
            border-radius: 0.4rem;
            cursor: pointer;
            font-weight: 600;
            font-family: 'Poppins', sans-serif;
            font-size: 0.85rem;
        }

        .qr-image {
            max-width: 100px;
            margin: 0.4rem auto;
            display: block;
            border-radius: 0.4rem;
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.1);
        }

        .experience-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(160px, 1fr));
            gap: 0.8rem;
            margin-top: 0.8rem;
        }

        .experience-item {
            background: var(--concert-card);
            border: 1px solid var(--concert-border);
            border-radius: 0.4rem;
            padding: 0.8rem;
            text-align: center;
        }

        .experience-item img {
            max-width: 140px;
            height: 140px;
            object-fit: cover;
            border-radius: 0.4rem;
            margin-bottom: 0.4rem;
        }

        .experience-item p {
            margin: 0;
            font-size: 0.8rem;
            color: var(--foreground);
        }

        .hotel-stars { color: gold; }
    </style>
</head>
<body>
    <div class="auth-container" id="auth-container">
        <div class="auth-form">
            <h2>ConcertCircle Admin Access</h2>
            <input type="text" id="username" placeholder="Admin ID" required>
            <input type="password" id="password" placeholder="Password" required>
            <div id="error-message" class="error-message" style="display: none;"></div>
            <button onclick="authenticate()" id="login-btn">Login</button>
        </div>
    </div>

    <button class="logout-btn" onclick="logout()" style="display: none;" id="logout-btn">Logout</button>

    <header>
        <div class="container">
            <div class="logo-container">
                <a href="https://concertcircle.com" style="text-decoration: none; color: inherit; display: flex; align-items: center;">
                    <span class="logo-text">
                        <span class="concert">Concert</span>
                        <span class="circle">Circle</span>
                    </span>
                </a>
            </div>
        </div>
    </header>

    <section class="admin-section">
        <div class="container">
            <div class="section-card">
                <h2 class="section-title">Package Generator</h2>
                <form id="pdf-form" class="admin-form">
                    <div class="form-group">
                        <label for="customer-details">Customer Details</label>
                        <textarea id="customer-details" placeholder="Name, Contact, Address"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="curator-details">Curator Details</label>
                        <textarea id="curator-details" placeholder="Name, Contact, Role"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="group-count">Group Count</label>
                        <input type="number" id="group-count" placeholder="Number of people" min="1">
                    </div>
                    <div class="form-group">
                        <label for="package-title">Package Title</label>
                        <input type="text" id="package-title" placeholder="Package title">
                    </div>
                    <div class="form-group">
                        <label for="duration">Duration</label>
                        <input type="text" id="duration" placeholder="e.g., 4N/5D">
                    </div>
                    <div class="form-group">
                        <label for="package-type">Package Type</label>
                        <select id="package-type" onchange="suggestFields()">
                            <option value="Ride to the Rage">Ride to the Rage</option>
                            <option value="Utopia Circle">Utopia Circle</option>
                            <option value="Astro Deluxe Drop">Astro Deluxe Drop</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="flights">Flight Details</label>
                        <textarea id="flights" placeholder="Flight details"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="bus-train">Bus/Train Options</label>
                        <textarea id="bus-train" placeholder="Bus/train travel options"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="local-cab">Local Transport</label>
                        <textarea id="local-cab" placeholder="Local transportation and cab services"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="hotel">Hotel Details</label>
                        <select id="hotel" onchange="updateHotelImages()">
                            <option value="">Select a hotel</option>
                            <option value="Radisson Blu">Radisson Blu (★★★★★)</option>
                            <option value="Hyatt Regency">Hyatt Regency (★★★★½)</option>
                            <option value="Hotel Shanti Palace">Hotel Shanti Palace (★★★)</option>
                            <option value="goStops delhi">goStops delhi (★★★)</option>
                            <option value="Hotel Town Inn">Hotel Town Inn (★★★)</option>
                            <option value="Zostel Delhi">Zostel Delhi (★★★)</option>
                        </select>
                        <div id="hotel-images" class="experience-grid" style="display: none;"></div>
                    </div>
                    <div class="form-group">
                        <label for="itinerary">Itinerary (Day-wise)</label>
                        <textarea id="itinerary" placeholder="Day-wise itinerary"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="merch">Merchandise & Souvenirs</label>
                        <textarea id="merch" placeholder="Merchandise, exclusive items, souvenirs"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="inclusions">Inclusions</label>
                        <textarea id="inclusions" placeholder="Inclusions"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exclusions">Exclusions</label>
                        <textarea id="exclusions" placeholder="Exclusions"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="cost-per-head">Cost Per Head</label>
                        <input type="text" id="cost-per-head" placeholder="e.g., ₹12,999">
                    </div>
                    <div class="form-group">
                        <label for="total-cost">Total Cost</label>
                        <input type="text" id="total-cost" placeholder="Auto-calculated" readonly>
                    </div>
                    <div class="form-group">
                        <label for="contact">Contact Info</label>
                        <input type="text" id="contact" placeholder="Email, Instagram, Phone">
                    </div>
                    <div class="form-group">
                        <label for="payment-qr">Payment QR Code (PNG/JPG)</label>
                        <input type="file" id="payment-qr" accept="image/png, image/jpeg">
                    </div>
                    <div class="form-group">
                        <label for="generation-notes">Generation Notes</label>
                        <textarea id="generation-notes" placeholder="Notes for PDF generation"></textarea>
                    </div>
                    <div class="button-group">
                        <button type="button" class="cta-button" onclick="previewPDF()">Preview PDF</button>
                        <button type="button" class="cta-button" onclick="generatePDF()">Download PDF</button>
                    </div>
                </form>
                <div id="pdf-preview" class="pdf-preview" style="display: none;">
                    <div class="pdf-logo-container" style="display: flex; align-items: center; margin-bottom: 0.8rem;">
                        <span class="logo-text" style="font-size: 1.4rem;">
                            <span class="concert">Concert</span>
                            <span class="circle">Circle</span>
                        </span>
                    </div>
                    <img id="preview-qr" class="qr-image" src="" alt="Payment QR Code" style="display: none;">
                    <div class="pdf-header">
                        <h2>ConcertCircle</h2>
                        <p><a href="mailto:info@concertcircle.com">Email: info@concertcircle.com</a> | <a href="https://instagram.com/concertcircle">Instagram: @concertcircle</a> | <a href="tel:+918401089266">Phone: +91-8401089266</a></p>
                        <h3 id="preview-title">Package Title</h3>
                        <p id="preview-duration">Duration</p>
                        <p id="preview-package-type">Package Type</p>
                        <p id="preview-customer-details">Customer Details</p>
                        <p id="preview-curator-details">Curator Details</p>
                        <p id="preview-group-count">Group Count</p>
                    </div>
                    <div class="pdf-content">
                        <div class="pdf-section">
                            <h2 class="pdf-section-title"><i class="fas fa-plane"></i> Flights</h2>
                            <p id="preview-flights">Flight Details</p>
                        </div>
                        <div class="pdf-section">
                            <h2 class="pdf-section-title"><i class="fas fa-train"></i> Bus/Train Options</h2>
                            <p id="preview-bus-train">Bus/Train Details</p>
                        </div>
                        <div class="pdf-section">
                            <h2 class="pdf-section-title"><i class="fas fa-car"></i> Local Transportation</h2>
                            <p id="preview-local-cab">Local Cab Details</p>
                        </div>
                        <div class="pdf-section">
                            <h2 class="pdf-section-title"><i class="fas fa-hotel"></i> Hotel</h2>
                            <p id="preview-hotel">Hotel Details</p>
                            <div id="preview-hotel-images" class="experience-grid"></div>
                        </div>
                        <div class="pdf-section">
                            <h2 class="pdf-section-title"><i class="fas fa-calendar"></i> Itinerary</h2>
                            <p id="preview-itinerary">Itinerary Details</p>
                        </div>
                        <div class="pdf-section">
                            <h2 class="pdf-section-title"><i class="fas fa-gift"></i> Merchandise & Souvenirs</h2>
                            <p id="preview-merch">Merchandise Details</p>
                        </div>
                        <div class="pdf-section">
                            <h2 class="pdf-section-title"><i class="fas fa-check-circle"></i> Inclusions</h2>
                            <ul id="preview-inclusions"></ul>
                        </div>
                        <div class="pdf-section">
                            <h2 class="pdf-section-title"><i class="fas fa-times-circle"></i> Exclusions</h2>
                            <ul id="preview-exclusions"></ul>
                        </div>
                        <div class="pdf-section">
                            <h2 class="pdf-section-title"><i class="fas fa-file-contract"></i> Booking Policy</h2>
                            <ul id="preview-booking-policy">
                                <li>Full payment required within 48 hours of booking confirmation</li>
                                <li>Your tickets, passes and everything will be shared within 2-3 hours of payment</li>
                            </ul>
                        </div>
                        <div class="pdf-section">
                            <h2 class="pdf-section-title"><i class="fas fa-exclamation-triangle"></i> Cancellation Policy</h2>
                            <ul id="preview-cancellation-policy">
                                <li>50% refund if cancelled 24 hours before event</li>
                                <li>80% refund if cancelled 6 days before event</li>
                                <li>90% refund guaranteed for cancellations made at least 7 days before the event</li>
                            </ul>
                        </div>
                        <div class="pdf-section">
                            <h2 class="pdf-section-title"><i class="fas fa-info-circle"></i> Important Notes</h2>
                            <ul id="preview-important-notes">
                                <li>Valid ID required for all travelers</li>
                                <li>These are tentative rates and subject to change</li>
                                <li>Hotel availability & flights are dynamic and subject to price changes</li>
                                <li>No refunds on partially utilized services</li>
                            </ul>
                        </div>
                        <div class="pdf-section">
                            <h2 class="pdf-section-title"><i class="fas fa-money-bill"></i> Cost Per Head</h2>
                            <p id="preview-cost-per-head">Cost Per Head</p>
                        </div>
                        <div class="pdf-section">
                            <h2 class="pdf-section-title"><i class="fas fa-wallet"></i> Total Cost</h2>
                            <p id="preview-total-cost">Total Cost</p>
                        </div>
                        <div class="pdf-section">
                            <h2 class="pdf-section-title"><i class="fas fa-phone"></i> Contact</h2>
                            <p id="preview-contact">Contact Info</p>
                        </div>
                        <div class="pdf-section">
                            <h2 class="pdf-section-title"><i class="fas fa-qrcode"></i> Payment QR Code</h2>
                            <p id="preview-qr-text">Scan to Pay</p>
                        </div>
                    </div>
                    <div class="pdf-footer">
                        <p><a href="mailto:info@concertcircle.com">Email: info@concertcircle.com</a> | <a href="https://instagram.com/concertcircle">Instagram: @concertcircle</a> | <a href="tel:+918401089266">Phone: +91-8401089266</a></p>
                        <p>Please think twice before printing this document. Save paper, it's good for the environment.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        let sessionActive = false;
        let loginAttempts = 0;
        const maxAttempts = 5;
        let lockoutTime = 0;
        let pdfIndex = localStorage.getItem('pdfIndex') ? parseInt(localStorage.getItem('pdfIndex')) : 1000;

        const hotelImages = {
            'Radisson Blu': { src: '/img/as-1.jpg', desc: 'Radisson Blu ★★★★★\nLuxury 5-star stay with spa access' },
            'Hyatt Regency': { src: '/img/as-2.jpg', desc: 'Hyatt Regency ★★★★½\nPremium 4.5-star with exclusive amenities' },
            'Hotel Shanti Palace': { src: '/img/u2.jpg', desc: 'Hotel Shanti Palace ★★★\n3-star shared group stay with amenities' },
            'goStops delhi': { src: '/img/u-4.jpg', desc: 'goStops delhi ★★★\nSocial hostel with vibrant community' },
            'Hotel Town Inn': { src: '/img/r2.jpg', desc: 'Hotel Town Inn ★★★\nModern amenities in the heart of Delhi' },
            'Zostel Delhi': { src: '/img/r3.jpg', desc: 'Zostel Delhi ★★★\nSocial hostel with vibrant community' }
        };

        function validateForm() {
            const requiredFields = ['customer-details', 'package-title', 'cost-per-head', 'contact'];
            for (let field of requiredFields) {
                if (!document.getElementById(field).value.trim()) {
                    showError(`Please fill in ${field.replace('-', ' ')}`);
                    return false;
                }
            }
            return true;
        }

        function authenticate() {
            const currentTime = Date.now();
            const username = document.getElementById('username').value.trim();
            const password = document.getElementById('password').value;
            const loginBtn = document.getElementById('login-btn');
            const errorDiv = document.getElementById('error-message');

            if (lockoutTime > currentTime) {
                const remainingTime = Math.ceil((lockoutTime - currentTime) / 1000);
                showError(`Too many failed attempts. Wait ${remainingTime} seconds.`);
                return;
            }

            if (!username || !password) {
                showError('Please enter both ID and password');
                loginBtn.disabled = false;
                loginBtn.textContent = 'Login';
                return;
            }

            loginBtn.disabled = true;
            loginBtn.textContent = 'Authenticating...';

            setTimeout(() => {
                const validCredentials = [
                    { id: 'admin', pass: 'ConcertCircle2025!' },
                    { id: 'curator', pass: 'CC_Curator_2025#' },
                    { id: 'manager', pass: 'CC_Manager@2025' }
                ];

                const isValid = validCredentials.some(cred => 
                    cred.id === username && cred.pass === password
                );

                if (isValid) {
                    sessionActive = true;
                    loginAttempts = 0;
                    lockoutTime = 0;

                    document.getElementById('auth-container').style.display = 'none';
                    document.querySelector('header').style.display = 'block';
                    document.querySelector('.admin-section').style.display = 'block';
                    document.getElementById('logout-btn').style.display = 'block';

                    showStatus('Login successful!', 'success');
                    suggestFields();
                    previewPDF();

                    setTimeout(() => {
                        if (sessionActive) logout();
                    }, 30 * 60 * 1000);
                } else {
                    loginAttempts++;
                    if (loginAttempts >= maxAttempts) {
                        lockoutTime = currentTime + (5 * 60 * 1000);
                        showError(`Locked out for 5 minutes.`);
                    } else {
                        showError(`Invalid credentials. ${maxAttempts - loginAttempts} attempts left.`);
                    }
                }

                loginBtn.disabled = false;
                loginBtn.textContent = 'Login';
            }, 1000);
        }

        function logout() {
            sessionActive = false;
            document.getElementById('auth-container').style.display = 'flex';
            document.querySelector('header').style.display = 'none';
            document.querySelector('.admin-section').style.display = 'none';
            document.getElementById('logout-btn').style.display = 'none';
            
            document.getElementById('pdf-form').reset();
            document.getElementById('pdf-preview').style.display = 'none';
            
            document.getElementById('username').value = '';
            document.getElementById('password').value = '';
            
            showStatus('Logged out successfully', 'success');
        }

        function showError(message) {
            const errorDiv = document.getElementById('error-message');
            errorDiv.textContent = message;
            errorDiv.style.display = 'block';
            setTimeout(() => {
                errorDiv.style.display = 'none';
            }, 4000);
        }

        function showStatus(message, type = 'success') {
            const statusDiv = document.createElement('div');
            statusDiv.className = `status-message ${type}`;
            statusDiv.textContent = message;
            document.body.appendChild(statusDiv);
            
            setTimeout(() => statusDiv.classList.add('show'), 100);
            setTimeout(() => {
                statusDiv.classList.remove('show');
                setTimeout(() => statusDiv.remove(), 300);
            }, 2500);
        }

        document.addEventListener('keydown', function(event) {
            if (event.key === 'Enter' && document.getElementById('auth-container').style.display !== 'none') {
                authenticate();
            }
        });

        function updateHotelImages() {
            const hotelSelect = document.getElementById('hotel');
            const hotelImagesDiv = document.getElementById('hotel-images');
            const previewHotelImages = document.getElementById('preview-hotel-images');
            const selectedHotel = hotelSelect.value;

            hotelImagesDiv.innerHTML = '';
            previewHotelImages.innerHTML = '';

            if (selectedHotel && hotelImages[selectedHotel]) {
                const { src, desc } = hotelImages[selectedHotel];
                hotelImagesDiv.innerHTML = `
                    <div class="experience-item">
                        <img src="${src}" alt="${selectedHotel}" style="width: 140px; height: 140px; object-fit: cover;">
                        <p>${desc}</p>
                    </div>
                `;
                previewHotelImages.innerHTML = `
                    <div class="experience-item">
                        <img src="${src}" alt="${selectedHotel}" style="width: 140px; height: 140px; object-fit: cover;">
                        <p>${desc}</p>
                    </div>
                `;
                hotelImagesDiv.style.display = 'grid';
            } else {
                hotelImagesDiv.style.display = 'none';
            }
        }

        function calculateTotalCost() {
            const costPerHead = document.getElementById('cost-per-head').value.replace(/[^0-9.]/g, '');
            const groupCount = document.getElementById('group-count').value;
            const totalCost = costPerHead && groupCount ? (parseFloat(costPerHead) * parseInt(groupCount)).toFixed(2) : '';
            document.getElementById('total-cost').value = totalCost ? `₹${totalCost}` : '';
        }

        document.getElementById('cost-per-head').addEventListener('input', calculateTotalCost);
        document.getElementById('group-count').addEventListener('input', calculateTotalCost);

        function suggestFields() {
            const packageType = document.getElementById('package-type').value;
            const suggestions = {
                'Ride to the Rage': {
                    duration: '2N/3D',
                    flights: 'Round-trip economy flights from major cities',
                    busTrain: 'AC sleeper bus available from Mumbai, Delhi\nTrain options: 2AC/3AC bookings available',
                    localCab: 'Airport pickup/drop included\nLocal sightseeing via private cab\n24/7 cab service available',
                    hotel: 'Hotel Shanti Palace',
                    itinerary: 'Day 1: Arrival and check-in\nDay 2: Concert event and after-party\nDay 3: Local sightseeing and departure',
                    merch: 'Exclusive ConcertCircle t-shirt\nEvent wristband and stickers\nPhoto opportunities with props',
                    inclusions: 'Airport transfers (round trip cab service)\nPremium 3-Star Hotel & Home stays (Accommodation of your choice)\nComplimentary meal (Breakfast or lunch included)\nPersonal Concierge (Guide throughout your concert experience)',
                    exclusions: 'International/Domestic Airfare\nPersonal expenses & shopping\nCab transfers from hotel to concert venue\nBeverages, Lunch, Dinner throughout the tour unless mentioned otherwise\nFuture cost changes due to inflation\nAny services not specified in inclusions',
                    costPerHead: '₹12,999',
                    contact: 'info@concertcircle.com, +91-8401089266',
                    customer_details: 'Default Customer Name, Contact: 123-456-7890, Address: Sample Address',
                    package_title: 'Ride to the Rage Package'
                },
                'Utopia Circle': {
                    duration: '3N/4D',
                    flights: 'Round-trip premium economy flights with extra legroom',
                    busTrain: 'Luxury coach bus with entertainment system\nPremium train bookings: 1AC/2AC available',
                    localCab: 'Premium sedan pickup/drop\nDedicated local guide with transport\nAll sightseeing included',
                    hotel: 'Hyatt Regency',
                    itinerary: 'Day 1: Arrival and welcome dinner\nDay 2: Concert event and VIP lounge access\nDay 3: City tour and cultural experience\nDay 4: Shopping and departure',
                    merch: 'Premium ConcertCircle hoodie\nLimited edition poster\nExclusive photo book\nVIP access pass',
                    inclusions: 'Airport transfers (round trip cab service)\nPremium 3-Star Hotel & Home stays (Accommodation of your choice)\nComplimentary meal (Breakfast or lunch included)\nPersonal Concierge (Guide throughout your concert experience)',
                    exclusions: 'International/Domestic Airfare\nPersonal expenses & shopping\nCab transfers from hotel to concert venue\nBeverages, Lunch, Dinner throughout the tour unless mentioned otherwise\nFuture cost changes due to inflation\nAny services not specified in inclusions',
                    costPerHead: '₹16,999',
                    contact: 'support@concertcircle.com, +91-8401089266',
                    customer_details: 'Default Customer Name, Contact: 123-456-7890, Address: Sample Address',
                    package_title: 'Utopia Circle Package'
                },
                'Astro Deluxe Drop': {
                    duration: '4N/5D',
                    flights: 'Round-trip business class flights with lounge access',
                    busTrain: 'Luxury coach with personal attendant\nFirst-class train bookings with meals',
                    localCab: 'Luxury SUV for airport transfers\nPrivate chauffeur for all local travel\nComplimentary refreshments in transit',
                    hotel: 'Radisson Blu',
                    itinerary: 'Day 1: Arrival, VIP welcome, and check-in\nDay 2: Concert event with front-row access\nDay 3: Exclusive backstage tour and artist meet\nDay 4: Luxury city tour and fine dining\nDay 5: Leisure day and departure',
                    merch: 'Luxury ConcertCircle jacket\nSigned artist memorabilia\nPremium gift box with exclusive souvenirs',
                    inclusions: 'Airport transfers (round trip cab service)\nPremium 3-Star Hotel & Home stays (Accommodation of your choice)\nComplimentary meal (Breakfast or lunch included)\nPersonal Concierge (Guide throughout your concert experience)',
                    exclusions: 'International/Domestic Airfare\nPersonal expenses & shopping\nCab transfers from hotel to concert venue\nBeverages, Lunch, Dinner throughout the tour unless mentioned otherwise\nFuture cost changes due to inflation\nAny services not specified in inclusions',
                    costPerHead: '₹24,999',
                    contact: 'contact@concertcircle.com, +91-8401089266',
                    customer_details: 'Default Customer Name, Contact: 123-456-7890, Address: Sample Address',
                    package_title: 'Astro Deluxe Drop Package'
                }
            };

            const fields = suggestions[packageType] || {};
            document.getElementById('duration').value = fields.duration || 'N/A';
            document.getElementById('flights').value = fields.flights || 'N/A';
            document.getElementById('bus-train').value = fields.busTrain || 'N/A';
            document.getElementById('local-cab').value = fields.localCab || 'N/A';
            document.getElementById('hotel').value = fields.hotel || 'N/A';
            document.getElementById('itinerary').value = fields.itinerary || 'N/A';
            document.getElementById('merch').value = fields.merch || 'N/A';
            document.getElementById('inclusions').value = fields.inclusions || 'N/A';
            document.getElementById('exclusions').value = fields.exclusions || 'N/A';
            document.getElementById('cost-per-head').value = fields.costPerHead || '₹0';
            document.getElementById('contact').value = fields.contact || 'N/A';
            document.getElementById('customer-details').value = fields.customer_details || 'Default Customer, Contact: N/A, Address: N/A';
            document.getElementById('package-title').value = fields.package_title || 'Default Package';
            updateHotelImages();
            calculateTotalCost();
        }

        function previewPDF() {
            if (!sessionActive) {
                showError('Please login to preview PDF');
                return;
            }

            if (!validateForm()) return;

            const qrInput = document.getElementById('payment-qr');
            const previewQr = document.getElementById('preview-qr');
            
            const previewLogoContainer = document.querySelector('.pdf-logo-container .logo-text');
            previewLogoContainer.style.display = 'flex';

            if (qrInput.files && qrInput.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    previewQr.src = e.target.result;
                    previewQr.style.display = 'block';
                };
                reader.readAsDataURL(qrInput.files[0]);
            } else {
                previewQr.style.display = 'none';
            }

            document.getElementById('preview-title').textContent = document.getElementById('package-title').value || 'Package Title';
            document.getElementById('preview-duration').textContent = document.getElementById('duration').value || 'Duration';
            document.getElementById('preview-package-type').textContent = document.getElementById('package-type').value || 'Package Type';
            document.getElementById('preview-customer-details').textContent = document.getElementById('customer-details').value || 'Customer Details';
            document.getElementById('preview-curator-details').textContent = document.getElementById('curator-details').value || 'Curator Details';
            document.getElementById('preview-group-count').textContent = document.getElementById('group-count').value ? `Group Count: ${document.getElementById('group-count').value}` : 'Group Count';
            document.getElementById('preview-flights').textContent = document.getElementById('flights').value || 'Flight Details';
            document.getElementById('preview-bus-train').textContent = document.getElementById('bus-train').value || 'Bus/Train Details';
            document.getElementById('preview-local-cab').textContent = document.getElementById('local-cab').value || 'Local Cab Details';
            document.getElementById('preview-hotel').textContent = document.getElementById('hotel').value || 'Hotel Details';
            document.getElementById('preview-itinerary').textContent = document.getElementById('itinerary').value || 'Itinerary Details';
            document.getElementById('preview-merch').textContent = document.getElementById('merch').value || 'Merchandise Details';
            document.getElementById('preview-cost-per-head').textContent = document.getElementById('cost-per-head').value || 'Cost Per Head';
            document.getElementById('preview-total-cost').textContent = document.getElementById('total-cost').value || 'Total Cost';
            document.getElementById('preview-contact').textContent = document.getElementById('contact').value || 'Contact Info';

            const inclusions = document.getElementById('inclusions').value.split('\n').filter(item => item.trim());
            const exclusions = document.getElementById('exclusions').value.split('\n').filter(item => item.trim());
            
            document.getElementById('preview-inclusions').innerHTML = inclusions.map(item => `<li>${item}</li>`).join('');
            document.getElementById('preview-exclusions').innerHTML = exclusions.map(item => `<li>${item}</li>`).join('');

            updateHotelImages();
            document.getElementById('pdf-preview').style.display = 'block';
        }

        function generatePDF() {
            if (!sessionActive) {
                showError('Please login to generate PDF');
                return;
            }

            if (!validateForm()) return;

            const { jsPDF } = window.jspdf;
            const doc = new jsPDF({
                orientation: 'portrait',
                unit: 'pt',
                format: 'a4'
            });

            pdfIndex++;
            localStorage.setItem('pdfIndex', pdfIndex);

            const qrInput = document.getElementById('payment-qr');
            const hotelSelect = document.getElementById('hotel').value;
            let qrPromise = Promise.resolve(null);
            let hotelImagePromise = Promise.resolve(null);

            if (qrInput.files && qrInput.files[0]) {
                qrPromise = new Promise((resolve, reject) => {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        resolve(e.target.result);
                    };
                    reader.onerror = function() {
                        reject(new Error('Failed to read QR code image'));
                    };
                    reader.readAsDataURL(qrInput.files[0]);
                });
            }

            if (hotelSelect && hotelImages[hotelSelect]) {
                hotelImagePromise = new Promise((resolve, reject) => {
                    const img = new Image();
                    img.crossOrigin = 'Anonymous';
                    img.src = hotelImages[hotelSelect].src;
                    img.onload = () => {
                        const canvas = document.createElement('canvas');
                        canvas.width = img.width;
                        canvas.height = img.height;
                        const ctx = canvas.getContext('2d');
                        ctx.drawImage(img, 0, 0);
                        resolve(canvas.toDataURL('image/jpeg'));
                    };
                    img.onerror = () => reject(new Error('Failed to load hotel image'));
                });
            }

            Promise.all([qrPromise, hotelImagePromise]).then(([qrSrc, hotelImageSrc]) => {
                const pageWidth = 595;
                const marginLeft = 40;
                const marginRight = 40;
                const marginTop = 100;
                const marginBottom = 60;
                let y = marginTop;

                function addHeader() {
                    doc.setFont('Helvetica', 'bold');
                    doc.setFontSize(24);
                    doc.setTextColor(217, 48, 140);
                    doc.text('Concert', marginLeft, 40);
                    doc.setTextColor(171, 94, 242);
                    doc.text('Circle', marginLeft + doc.getTextWidth('Concert') + 5, 40);
                    doc.setFontSize(10);
                    doc.setTextColor(100, 100, 100);
                    doc.text(`Package ID: CC${pdfIndex}`, pageWidth - marginRight - 80, 40);
                    doc.setFontSize(8);
                    doc.text('Email: ', marginLeft, 55);
                    doc.setTextColor(0, 0, 255);
                    doc.textWithLink('info@concertcircle.com', marginLeft + doc.getTextWidth('Email: '), 55, { url: 'mailto:info@concertcircle.com' });
                    doc.setTextColor(100, 100, 100);
                    doc.text(' | Instagram: ', marginLeft + doc.getTextWidth('Email: info@concertcircle.com'), 55);
                    doc.setTextColor(0, 0, 255);
                    doc.textWithLink('@concertcircle', marginLeft + doc.getTextWidth('Email: info@concertcircle.com | Instagram: '), 55, { url: 'https://instagram.com/concertcircle' });
                    doc.setTextColor(100, 100, 100);
                    doc.text(' | Phone: ', marginLeft + doc.getTextWidth('Email: info@concertcircle.com | Instagram: @concertcircle'), 55);
                    doc.setTextColor(0, 0, 255);
                    doc.textWithLink('+91-8401089266', marginLeft + doc.getTextWidth('Email: info@concertcircle.com | Instagram: @concertcircle | Phone: '), 55, { url: 'tel:+918401089266' });
                    doc.setFillColor(171, 94, 242);
                    doc.rect(0, 70, pageWidth, 10, 'F');
                    doc.setDrawColor(217, 48, 140);
                    doc.setLineWidth(0.5);
                    doc.line(marginLeft, 85, pageWidth - marginRight, 85);
                }

                function addFooter() {
                    doc.setFont('Helvetica', 'normal');
                    doc.setFontSize(8);
                    doc.setTextColor(100, 100, 100);
                    doc.text('Powered by ConcertCircle | Email: ', marginLeft, 842 - 30);
                    doc.setTextColor(0, 0, 255);
                    doc.textWithLink('info@concertcircle.com', marginLeft + doc.getTextWidth('Powered by ConcertCircle | Email: '), 842 - 30, { url: 'mailto:info@concertcircle.com' });
                    doc.setTextColor(100, 100, 100);
                    doc.text(' | Instagram: ', marginLeft + doc.getTextWidth('Powered by ConcertCircle | Email: info@concertcircle.com'), 842 - 30);
                    doc.setTextColor(0, 0, 255);
                    doc.textWithLink('@concertcircle', marginLeft + doc.getTextWidth('Powered by ConcertCircle | Email: info@concertcircle.com | Instagram: '), 842 - 30, { url: 'https://instagram.com/concertcircle' });
                    doc.setTextColor(100, 100, 100);
                    doc.text(' | Phone: ', marginLeft + doc.getTextWidth('Powered by ConcertCircle | Email: info@concertcircle.com | Instagram: @concertcircle'), 842 - 30);
                    doc.setTextColor(0, 0, 255);
                    doc.textWithLink('+91-8401089266', marginLeft + doc.getTextWidth('Powered by ConcertCircle | Email: info@concertcircle.com | Instagram: @concertcircle | Phone: '), 842 - 30, { url: 'tel:+918401089266' });
                    doc.setTextColor(100, 100, 100);
                    doc.text('Please think twice before printing this document. Save paper, it’s good for the environment.', marginLeft, 842 - 20);
                    doc.setDrawColor(171, 94, 242);
                    doc.setLineWidth(0.5);
                    doc.line(marginLeft, 842 - 40, pageWidth - marginRight, 842 - 40);
                }

                function checkPageFit(lines, lineHeight, currentY, extraHeight = 0) {
                    const totalHeight = lines.length * lineHeight + extraHeight + 20;
                    return currentY + totalHeight <= 842 - marginBottom;
                }

                function addSection(title, content, icon, isList = false) {
                    if (y > 842 - marginBottom - 30) {
                        addFooter();
                        doc.addPage();
                        addHeader();
                        y = marginTop;
                    }

                    doc.setFont('Helvetica', 'bold');
                    doc.setFontSize(14);
                    doc.setTextColor(217, 48, 140);
                    doc.text(title, marginLeft + 10, y);
                    doc.setFillColor(171, 94, 242);
                    doc.rect(marginLeft, y - 10, 5, 20, 'F');
                    y += 20;

                    doc.setFont('Helvetica', 'normal');
                    doc.setFontSize(10);
                    doc.setTextColor(0, 0, 0);

                    if (isList) {
                        const lines = content.map(item => `• ${item}`);
                        if (!checkPageFit(lines, 14, y)) {
                            addFooter();
                            doc.addPage();
                            addHeader();
                            y = marginTop;
                            doc.setFont('Helvetica', 'bold');
                            doc.setFontSize(14);
                            doc.setTextColor(217, 48, 140);
                            doc.text(title, marginLeft + 10, y);
                            doc.setFillColor(171, 94, 242);
                            doc.rect(marginLeft, y - 10, 5, 20, 'F');
                            y += 20;
                            doc.setFont('Helvetica', 'normal');
                            doc.setFontSize(10);
                            doc.setTextColor(0, 0, 0);
                        }
                        lines.forEach(item => {
                            doc.text(item, marginLeft + 15, y);
                            y += 14;
                        });
                    } else {
                        const lines = doc.splitTextToSize(content, pageWidth - marginLeft - marginRight - 10);
                        if (!checkPageFit(lines, 14, y)) {
                            addFooter();
                            doc.addPage();
                            addHeader();
                            y = marginTop;
                        }
                        lines.forEach(line => {
                            doc.text(line, marginLeft + 10, y);
                            y += 14;
                        });
                    }
                    y += 10;
                }

                addHeader();

                doc.setFont('Helvetica', 'bold');
                doc.setFontSize(28);
                doc.setTextColor(217, 48, 140);
                doc.text('ConcertCircle', pageWidth / 2, 180, { align: 'center' });
                doc.setTextColor(171, 94, 242);
                doc.text('Travel Package', pageWidth / 2, 210, { align: 'center' });
                doc.setFont('Helvetica', 'normal');
                doc.setFontSize(16);
                doc.setTextColor(0, 0, 0);
                doc.text(document.getElementById('package-title').value || 'Package Title', pageWidth / 2, 260, { align: 'center' });
                doc.setFontSize(12);
                doc.text(document.getElementById('duration').value || 'Duration', pageWidth / 2, 280, { align: 'center' });
                doc.text(document.getElementById('package-type').value || 'Package Type', pageWidth / 2, 295, { align: 'center' });
                doc.addPage();
                addHeader();
                y = marginTop;

                doc.setFont('Helvetica', 'normal');
                doc.setFontSize(11);
                doc.setTextColor(0, 0, 0);

                const customerDetails = doc.splitTextToSize(document.getElementById('customer-details').value || 'Customer Details', pageWidth - marginLeft - marginRight);
                if (!checkPageFit(customerDetails, 14, y)) {
                    addFooter();
                    doc.addPage();
                    addHeader();
                    y = marginTop;
                }
                customerDetails.forEach(line => {
                    doc.text(line, marginLeft, y);
                    y += 14;
                });
                y += 10;

                const curatorDetails = doc.splitTextToSize(document.getElementById('curator-details').value || 'Curator Details', pageWidth - marginLeft - marginRight);
                if (!checkPageFit(curatorDetails, 14, y)) {
                    addFooter();
                    doc.addPage();
                    addHeader();
                    y = marginTop;
                }
                curatorDetails.forEach(line => {
                    doc.text(line, marginLeft, y);
                    y += 14;
                });
                y += 10;

                const groupCountText = document.getElementById('group-count').value ? `Group Count: ${document.getElementById('group-count').value}` : 'Group Count';
                if (!checkPageFit([groupCountText], 14, y)) {
                    addFooter();
                    doc.addPage();
                    addHeader();
                    y = marginTop;
                }
                doc.text(groupCountText, marginLeft, y);
                y += 18;

                const sections = [
                    { title: 'Flights', content: document.getElementById('flights').value || 'Flight Details', icon: 'fa-plane' },
                    { title: 'Bus/Train Options', content: document.getElementById('bus-train').value || 'Bus/Train Details', icon: 'fa-train' },
                    { title: 'Local Transportation', content: document.getElementById('local-cab').value || 'Local Cab Details', icon: 'fa-car' },
                    { title: 'Hotel', content: document.getElementById('hotel').value || 'Hotel Details', icon: 'fa-hotel' },
                    { title: 'Itinerary', content: document.getElementById('itinerary').value || 'Itinerary Details', icon: 'fa-calendar' },
                    { title: 'Merchandise & Souvenirs', content: document.getElementById('merch').value || 'Merchandise Details', icon: 'fa-gift' },
                    { title: 'Inclusions', content: document.getElementById('inclusions').value.split('\n').filter(item => item.trim()), icon: 'fa-check-circle', isList: true },
                    { title: 'Booking Policy', content: [
                        'Full payment required within 48 hours of booking confirmation',
                        'Your tickets, passes and everything will be shared within 2-3 hours of payment'
                    ], icon: 'fa-file-contract', isList: true },
                    { title: 'Cancellation Policy', content: [
                        '50% refund if cancelled 24 hours before event',
                        '80% refund if cancelled 6 days before event',
                        '90% refund guaranteed for cancellations made at least 7 days before the event'
                    ], icon: 'fa-exclamation-triangle', isList: true },
                    { title: 'Important Notes', content: [
                        'Valid ID required for all travelers',
                        'These are tentative rates and subject to change',
                        'Hotel availability & flights are dynamic and subject to price changes',
                        'No refunds on partially utilized services'
                    ], icon: 'fa-info-circle', isList: true },
                    { title: 'Cost Per Head', content: document.getElementById('cost-per-head').value || 'Cost Per Head', icon: 'fa-money-bill' },
                    { title: 'Total Cost', content: document.getElementById('total-cost').value || 'Total Cost', icon: 'fa-wallet' },
                    { title: 'Contact', content: document.getElementById('contact').value || 'Contact Info', icon: 'fa-phone' },
                    { title: 'Payment QR Code', content: qrSrc ? 'Scan to Pay' : 'No QR Code Provided', icon: 'fa-qrcode' }
                ];

                if (document.getElementById('exclusions').value.trim()) {
                    sections.splice(7, 0, {
                        title: 'Exclusions',
                        content: document.getElementById('exclusions').value.split('\n').filter(item => item.trim()),
                        icon: 'fa-times-circle',
                        isList: true
                    });
                }

                sections.forEach((section) => {
                    if (section.title === 'Hotel' && hotelImageSrc && hotelImages[section.content]) {
                        if (y > 842 - marginBottom - 130) {
                            addFooter();
                            doc.addPage();
                            addHeader();
                            y = marginTop;
                        }
                        doc.setFont('Helvetica', 'bold');
                        doc.setFontSize(14);
                        doc.setTextColor(217, 48, 140);
                        doc.text(section.title, marginLeft + 10, y);
                        doc.setFillColor(171, 94, 242);
                        doc.rect(marginLeft, y - 10, 5, 20, 'F');
                        y += 20;
                        try {
                            const { desc } = hotelImages[section.content];
                            const lines = doc.splitTextToSize(desc, pageWidth - marginLeft - marginRight - 10);
                            if (!checkPageFit(lines, 14, y, 100)) {
                                addFooter();
                                doc.addPage();
                                addHeader();
                                y = marginTop;
                                doc.setFont('Helvetica', 'bold');
                                doc.setFontSize(14);
                                doc.setTextColor(217, 48, 140);
                                doc.text(section.title, marginLeft + 10, y);
                                doc.setFillColor(171, 94, 242);
                                doc.rect(marginLeft, y - 10, 5, 20, 'F');
                                y += 20;
                            }
                            doc.addImage(hotelImageSrc, 'JPEG', marginLeft + 10, y, 100, 100);
                            y += 110;
                            doc.setFont('Helvetica', 'normal');
                            doc.setFontSize(10);
                            doc.setTextColor(0, 0, 0);
                            lines.forEach(line => {
                                doc.text(line, marginLeft + 10, y);
                                y += 14;
                            });
                        } catch (e) {
                            console.error('Error adding hotel image:', e);
                            doc.setFont('Helvetica', 'normal');
                            doc.setFontSize(10);
                            doc.setTextColor(0, 0, 0);
                            doc.text('Hotel image unavailable', marginLeft + 10, y);
                            y += 14;
                        }
                        y += 10;
                    } else if (section.title === 'Payment QR Code' && qrSrc) {
                        if (y > 842 - marginBottom - 130) {
                            addFooter();
                            doc.addPage();
                            addHeader();
                            y = marginTop;
                        }
                        doc.setFont('Helvetica', 'bold');
                        doc.setFontSize(14);
                        doc.setTextColor(217, 48, 140);
                        doc.text(section.title, marginLeft + 10, y);
                        doc.setFillColor(171, 94, 242);
                        doc.rect(marginLeft, y - 10, 5, 20, 'F');
                        y += 20;
                        try {
                            doc.addImage(qrSrc, 'PNG', marginLeft + 10, y, 100, 100);
                            y += 110;
                            doc.setFont('Helvetica', 'normal');
                            doc.setFontSize(10);
                            doc.setTextColor(0, 0, 0);
                            doc.text(section.content, marginLeft + 10, y);
                            y += 14;
                        } catch (e) {
                            console.error('Error adding QR code:', e);
                            doc.setFont('Helvetica', 'normal');
                            doc.setFontSize(10);
                            doc.setTextColor(0, 0, 0);
                            doc.text('QR code unavailable', marginLeft + 10, y);
                            y += 14;
                        }
                        y += 10;
                    } else if (section.title === 'Cost Per Head' || section.title === 'Total Cost') {
                        if (y > 842 - marginBottom - 30) {
                            addFooter();
                            doc.addPage();
                            addHeader();
                            y = marginTop;
                        }
                        doc.setFont('Helvetica', 'bold');
                        doc.setFontSize(14);
                        doc.setTextColor(217, 48, 140);
                        doc.text(section.title, marginLeft + 10, y);
                        doc.setFillColor(171, 94, 242);
                        doc.rect(marginLeft, y - 10, 5, 20, 'F');
                        y += 20;
                        doc.setFont('Helvetica', 'normal');
                        doc.setFontSize(10);
                        doc.setTextColor(0, 0, 0);
                        const lines = doc.splitTextToSize(section.content.replace(/₹/g, '₹'), pageWidth - marginLeft - marginRight - 10);
                        if (!checkPageFit(lines, 14, y)) {
                            addFooter();
                            doc.addPage();
                            addHeader();
                            y = marginTop;
                            doc.setFont('Helvetica', 'bold');
                            doc.setFontSize(14);
                            doc.setTextColor(217, 48, 140);
                            doc.text(section.title, marginLeft + 10, y);
                            doc.setFillColor(171, 94, 242);
                            doc.rect(marginLeft, y - 10, 5, 20, 'F');
                            y += 20;
                            doc.setFont('Helvetica', 'normal');
                            doc.setFontSize(10);
                            doc.setTextColor(0, 0, 0);
                        }
                        lines.forEach(line => {
                            doc.text(line, marginLeft + 10, y);
                            y += 14;
                        });
                        y += 10;
                    } else {
                        addSection(section.title, section.content, section.icon, section.isList);
                    }
                });

                addFooter();
                doc.save(`ConcertCircle_Package_CC${pdfIndex}.pdf`);
                showStatus('PDF generated successfully!', 'success');
            }).catch((error) => {
                console.error('PDF generation error:', error);
                showError('Error generating PDF');
            });
        }
    </script>
</body>
</html>