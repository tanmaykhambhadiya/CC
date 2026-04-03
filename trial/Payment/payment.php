<?php
session_start();
function generateCsrfToken() {
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="LOGO for website (circular).png" type="image/x-icon">
    <link rel="shortcut icon" href="LOGO for website (circular).png" type="image/x-icon">
    <link rel="icon" type="image/x-icon" href="LOGO for website (circular).png">
    <title>Concert Circle-Payment</title>
    <style>
        * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Arial', sans-serif;
    background: linear-gradient(135deg, #89f7fe 0%, #66a6ff 100%);
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 20px;
    animation: fadeInBody 1.2s ease-in;
}

@keyframes fadeInBody {
    from { opacity: 0; transform: scale(0.96); }
    to { opacity: 1; transform: scale(1); }
}

.container {
    background: white;
    border-radius: 20px;
    box-shadow: 0 25px 50px rgba(0,0,0,0.1);
    overflow: hidden;
    max-width: 500px;
    width: 100%;
    animation: slideUp 0.6s ease;
    transition: all 0.3s ease;
}

@keyframes slideUp {
    from { transform: translateY(40px); opacity: 0; }
    to { transform: translateY(0); opacity: 1; }
}

.container:hover {
    transform: translateY(-5px);
    box-shadow: 0 35px 65px rgba(0,0,0,0.15);
}

/* LOGO STYLES */
.logo-container {
    text-align: center;
    padding-top: 25px;
    animation: logoFadeIn 1s ease-in-out;
}

.logo {
    max-width: 160px;
    height: auto;
    filter: drop-shadow(0 4px 6px rgba(0,0,0,0.1));
    transition: transform 0.3s ease;
}

.logo:hover {
    transform: scale(1.05);
}

@keyframes logoFadeIn {
    from { opacity: 0; transform: scale(0.95); }
    to { opacity: 1; transform: scale(1); }
}

.header {
    background: linear-gradient(135deg, #00c853, #64dd17);
    color: white;
    padding: 30px;
    text-align: center;
}

.header h1 {
    font-size: 2.5em;
    margin-bottom: 10px;
    font-weight: 300;
}

.header p {
    opacity: 0.95;  
    font-size: 1.1em;
}

.form-container {
    padding: 40px;
}

.form-group {
    margin-bottom: 25px;
}

.form-group label {
    display: block;
    margin-bottom: 8px;
    font-weight: 600;
    color: #333;
    font-size: 0.95em;
}

.form-group input, .form-group select {
    width: 100%;
    padding: 15px;
    border: 2px solid #e1e5e9;
    border-radius: 10px;
    font-size: 16px;
    background: #f8f9fa;
    transition: border 0.3s ease, box-shadow 0.3s ease;
}

.form-group input:focus, .form-group select:focus {
    outline: none;
    border-color: #00c853;
    background: white;
    box-shadow: 0 4px 12px rgba(0, 200, 83, 0.2);
    animation: fieldFocus 0.2s ease;
}

@keyframes fieldFocus {
    from { transform: scale(1); }
    to { transform: scale(1.015); }
}

.form-group input.error {
    border-color: #ff6b6b;
    background-color: #fff5f5;
}

.form-group input.success {
    border-color: #00c853;
}

.amount-display {
    background: linear-gradient(135deg, #ff416c, #ff4b2b);
    color: white;
    padding: 20px;
    border-radius: 15px;
    text-align: center;
    margin-bottom: 30px;
    font-size: 1.5em;
    font-weight: bold;
    transition: transform 0.2s ease;
}

.amount-display.updated {
    transform: scale(1.08);
}

.pay-button {
    width: 100%;
    background: linear-gradient(135deg, #00c853, #64dd17);
    color: white;
    border: none;
    padding: 18px;
    border-radius: 12px;
    font-size: 1.2em;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    text-transform: uppercase;
    letter-spacing: 1px;
    position: relative;
    overflow: hidden;
}

.pay-button:hover {
    transform: translateY(-3px);
    box-shadow: 0 12px 28px rgba(0, 200, 83, 0.3);
    background: linear-gradient(135deg, #64dd17, #00c853);
}

.pay-button:active {
    transform: translateY(-1px);
}

.pay-button:disabled {
    background: #ccc;
    cursor: not-allowed;
    box-shadow: none;
}

.pay-button::before {
    content: '';
    position: absolute;
    top: 50%;
    left: 50%;
    width: 0;
    height: 0;
    background: rgba(255, 255, 255, 0.2);
    border-radius: 50%;
    transform: translate(-50%, -50%);
    transition: width 0.6s, height 0.6s;
}

.pay-button:active::before {
    width: 300px;
    height: 300px;
}

.loading {
    display: none;
    text-align: center;
    padding: 20px;
}

.spinner {
    width: 40px;
    height: 40px;
    border: 4px solid #f3f3f3;
    border-top: 4px solid #00c853;
    border-radius: 50%;
    animation: spin 1s linear infinite;
    margin: 0 auto 15px;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

.status-message {
    padding: 15px;
    border-radius: 10px;
    margin-top: 20px;
    text-align: center;
    font-weight: 600;
    display: none;
    animation: slideIn 0.3s ease;
}

@keyframes slideIn {
    from { opacity: 0; transform: translateY(-10px); }
    to { opacity: 1; transform: translateY(0); }
}

.success {
    background-color: #e6f9ec;
    color: #256029;
    border: 1px solid #b2dfdb;
}

.error {
    background-color: #fdecea;
    color: #c62828;
    border: 1px solid #f44336;
}

.security-info {
    background: #f1f3f5;
    padding: 20px;
    border-radius: 10px;
    margin-top: 30px;
    text-align: center;
    font-size: 0.9em;
    color: #555;
}

.security-info i {
    color: #00c853;
    margin-right: 5px;
}

@media (max-width: 480px) {
    .container {
        margin: 10px;
    }

    .header h1 {
        font-size: 2em;
    }

    .form-container {
        padding: 30px 20px;
    }

    .logo {
        max-width: 120px;
    }
}

    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>💳 Secure Payment</h1>
            <p>Complete your transaction safely</p>
        </div>

        <div class="form-container">
            <form id="paymentForm">
                <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars(generateCsrfToken()); ?>">
                <div class="form-group">
                    <label for="customerName">Full Name</label>
                    <input type="text" id="customerName" name="customerName" required 
                           placeholder="Enter your full name">
                </div>

                <div class="form-group">
                    <label for="customerEmail">Email Address</label>
                    <input type="email" id="customerEmail" name="customerEmail" required 
                           placeholder="Enter your email address">
                </div>

                <div class="form-group">
                    <label for="customerPhone">Phone Number</label>
                    <input type="tel" id="customerPhone" name="customerPhone" required 
                           placeholder="Enter your phone number" pattern="[0-9]{10,12}">
                </div>

                <div class="form-group">
                    <label for="amount">Amount (₹)</label>
                    <input type="number" id="amount" name="amount" min="1" step="0.01" required 
                           placeholder="Enter amount">
                </div>

                <div class="amount-display" id="amountDisplay">
                    Amount: ₹0.00
                </div>

                <button type="submit" class="pay-button" id="payButton">
                    🔒 Pay Securely with Cashfree
                </button>

                <div class="status-message" id="statusMessage"></div>
            </form>

            <div class="loading" id="loadingDiv">
                <div class="spinner"></div>
                <p>Processing your payment...</p>
            </div>

            <div class="security-info">
                <p><i>🔒</i> Your payment is secured with 256-bit SSL encryption</p>
                <p><i>🛡️</i> PCI DSS compliant payment processing</p>
                <p><i>✅</i> Secure and trusted payment gateway</p>
            </div>
        </div>
    </div>

    <!-- Cashfree SDK -->
<script src="https://sdk.cashfree.com/js/v3/cashfree.js"></script>

<script>
    // ✅ 1. Initialize Cashfree SDK
    let cashfree;
    try {
        cashfree = Cashfree({ mode: "production" }); // Change to "sandbox" for testing
    } catch (error) {
        console.error('Cashfree SDK initialization failed:', error);
        showMessage('Failed to initialize payment gateway.', 'error');
        document.getElementById('payButton').disabled = true;
    }

    // ✅ 2. DOM references
    const paymentForm = document.getElementById('paymentForm');
    const csrfToken = document.querySelector('input[name="csrf_token"]').value;
    const amountInput = document.getElementById('amount');
    const amountDisplay = document.getElementById('amountDisplay');
    const payButton = document.getElementById('payButton');
    const loadingDiv = document.getElementById('loadingDiv');
    const statusMessage = document.getElementById('statusMessage');

    // ✅ 3. Update amount display
    amountInput.addEventListener('input', function () {
        const amount = parseFloat(this.value) || 0;
        amountDisplay.textContent = `Amount: ₹${amount.toFixed(2)}`;
        amountDisplay.classList.add('updated');
        setTimeout(() => amountDisplay.classList.remove('updated'), 200);

        if (amount >= 1) {
            this.classList.remove('error');
            this.classList.add('success');
        } else if (this.value) {
            this.classList.add('error');
            this.classList.remove('success');
        }
    });

    // ✅ 4. Validate form before submitting
    function validateForm(formData) {
        const errors = [];

        const name = formData.get('customerName')?.trim();
        const email = formData.get('customerEmail')?.trim();
        const phone = formData.get('customerPhone')?.trim();
        const amount = parseFloat(formData.get('amount'));

        if (!csrfToken) errors.push('CSRF token is missing');
        if (!name || name.length < 2) errors.push('Please enter a valid name');
        if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) errors.push('Invalid email');
        if (!/^[0-9]{10,12}$/.test(phone)) errors.push('Invalid phone');
        if (!amount || amount < 1) errors.push('Enter valid amount ≥ ₹1');

        return {
            isValid: errors.length === 0,
            errors
        };
    }

    // ✅ 5. Handle form submit
    paymentForm.addEventListener('submit', function (e) {
        e.preventDefault();
        const formData = new FormData(paymentForm);
        const validation = validateForm(formData);
        if (!validation.isValid) {
            showMessage(validation.errors[0], 'error');
            return;
        }
        initiatePayment(formData);
    });

    // ✅ 6. Payment Flow
    async function initiatePayment(formData) {
        showLoading(true);
        showMessage('Creating order...', 'success');

        try {
            const orderId = 'order_' + Date.now();
            const customerId = 'cust_' + Math.floor(Math.random() * 1000000);

            const orderData = {
                order_id: orderId,
                order_amount: parseFloat(formData.get('amount')),
                order_currency: "INR",
                customer_details: {
                    customer_id: customerId,
                    customer_name: formData.get('customerName').trim(),
                    customer_email: formData.get('customerEmail').trim(),
                    customer_phone: formData.get('customerPhone').trim().replace(/\D/g, '')
                },
                csrf_token: csrfToken
            };

            // Step 1: create order
            const res = await fetch('create-order.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(orderData)
            });

            const result = await res.json();
            if (!res.ok || !result.success) {
                throw new Error(result.message || 'Order creation failed');
            }

            showMessage('Order created. Launching payment gateway...', 'success');

            // Step 2: open checkout modal
            const checkoutOptions = {
                paymentSessionId: result.payment_session_id,
                redirectTarget: "_modal"
            };

            const response = await cashfree.checkout(checkoutOptions);

            if (response.error) {
                throw new Error(response.error.message || 'Cashfree error');
            }

            if (response.redirect) {
                showMessage('Verifying payment...', 'success');
                await verifyPayment(orderId);
            }

        } catch (err) {
            console.error('Payment error:', err);
            showMessage('❌ ' + err.message, 'error');
            showLoading(false);
        }
    }

 // ✅ 7. Verify payment (with better error handling and timeout)
let retryCount = 0;
const MAX_RETRIES = 8; // Increased retries
const RETRY_DELAY = 2000; // 2 seconds between retries

async function verifyPayment(orderId) {
    try {
        showMessage(`⏳ Verifying payment... (${retryCount + 1}/${MAX_RETRIES})`, 'success');
        
        const controller = new AbortController();
        const timeoutId = setTimeout(() => controller.abort(), 15000); // 15 second timeout

        const res = await fetch('verify-payment.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({
                order_id: orderId,
                csrf_token: csrfToken
            }),
            signal: controller.signal
        });

        clearTimeout(timeoutId);

        if (!res.ok) {
            const errorText = await res.text();
            throw new Error(`HTTP ${res.status}: ${errorText}`);
        }

        const result = await res.json();
        console.log('Verification response:', result);

        // Handle successful payment
        if (result.success && result.order_status === 'PAID') {
            showMessage('✅ Payment Successful! Redirecting...', 'success');
            setTimeout(() => {
                const params = new URLSearchParams({
                    order_id: orderId,
                    amount: result.order_amount || 0,
                    transaction_id: result.transaction_id || orderId,
                    payment_method: result.payment_method || 'Unknown',
                    payment_date: new Date().toISOString()
                });
                window.location.href = `payment-success.html?${params.toString()}`;
            }, 2000);
            return;
        }

        // Handle pending/processing states
        if (result.success && (result.order_status === 'PENDING' || result.order_status === 'ACTIVE')) {
            if (retryCount < MAX_RETRIES) {
                retryCount++;
                showMessage(`⏳ Payment processing... Attempt ${retryCount}/${MAX_RETRIES}`, 'success');
                setTimeout(() => verifyPayment(orderId), RETRY_DELAY);
                return;
            } else {
                showMessage('⚠️ Payment verification taking longer than expected. Please check your email or contact support.', 'error');
                showLoading(false);
                return;
            }
        }

        // Handle failed payment
        if (result.success && (result.order_status === 'FAILED' || result.order_status === 'CANCELLED')) {
            showMessage('❌ Payment was not successful. Please try again or use a different payment method.', 'error');
            showLoading(false);
            return;
        }

        // Handle API errors
        if (!result.success) {
            throw new Error(result.message || 'Payment verification failed');
        }

        // Handle unknown status
        showMessage(`❓ Unknown payment status: ${result.order_status}. Please contact support with Order ID: ${orderId}`, 'error');
        showLoading(false);

    } catch (err) {
        console.error('Verification error:', err);
        
        if (err.name === 'AbortError') {
            showMessage('⏰ Verification request timed out. Please check your internet connection.', 'error');
        } else if (retryCount < MAX_RETRIES) {
            retryCount++;
            showMessage(`⚠️ Verification failed. Retrying... (${retryCount}/${MAX_RETRIES})`, 'error');
            setTimeout(() => verifyPayment(orderId), RETRY_DELAY);
            return;
        } else {
            showMessage(`❌ Could not verify payment after ${MAX_RETRIES} attempts. Please contact support with Order ID: ${orderId}`, 'error');
        }
        
        showLoading(false);
    }
}

// Updated payment initiation with better error handling
async function initiatePayment(formData) {
    showLoading(true);
    showMessage('Creating order...', 'success');
    retryCount = 0; // Reset retry count

    try {
        const orderId = 'order_' + Date.now() + '_' + Math.floor(Math.random() * 1000);
        const customerId = 'cust_' + Math.floor(Math.random() * 1000000);

        const orderData = {
            order_id: orderId,
            order_amount: parseFloat(formData.get('amount')),
            order_currency: "INR",
            customer_details: {
                customer_id: customerId,
                customer_name: formData.get('customerName').trim(),
                customer_email: formData.get('customerEmail').trim(),
                customer_phone: formData.get('customerPhone').trim().replace(/\D/g, '')
            },
            csrf_token: csrfToken
        };

        console.log('Creating order:', orderData);

        // Step 1: create order
        const res = await fetch('create-order.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(orderData)
        });

        if (!res.ok) {
            const errorText = await res.text();
            throw new Error(`Order creation failed: HTTP ${res.status} - ${errorText}`);
        }

        const result = await res.json();
        console.log('Order creation response:', result);

        if (!result.success) {
            throw new Error(result.message || 'Order creation failed');
        }

        if (!result.payment_session_id) {
            throw new Error('No payment session ID received from server');
        }

        showMessage('Order created. Opening payment gateway...', 'success');

        // Step 2: open checkout modal
        const checkoutOptions = {
            paymentSessionId: result.payment_session_id,
            redirectTarget: "_modal"
        };

        console.log('Opening Cashfree checkout with options:', checkoutOptions);

        const response = await cashfree.checkout(checkoutOptions);
        console.log('Cashfree checkout response:', response);

        if (response.error) {
            throw new Error(response.error.message || 'Payment gateway error');
        }

        // Handle different response scenarios
        if (response.redirect) {
            showMessage('Payment completed. Verifying...', 'success');
            setTimeout(() => verifyPayment(orderId), 1000);
        } else if (response.paymentDetails) {
            // Payment completed inline
            showMessage('Payment completed. Verifying...', 'success');
            setTimeout(() => verifyPayment(orderId), 1000);
        } else if (response.status === 'success' || response.type === 'success') {
            // Alternative success indicators
            showMessage('Payment completed. Verifying...', 'success');
            setTimeout(() => verifyPayment(orderId), 1000);
        } else {
            // If no clear success indicator, still try to verify
            console.warn('Unclear response from Cashfree, attempting verification anyway:', response);
            showMessage('Payment gateway response unclear. Verifying payment...', 'success');
            setTimeout(() => verifyPayment(orderId), 2000);
        }

    } catch (err) {
        console.error('Payment initiation error:', err);
        showMessage('❌ ' + err.message, 'error');
        showLoading(false);
    }
}

    // ✅ 8. Helper functions
    function showMessage(message, type) {
        statusMessage.textContent = message;
        statusMessage.className = `status-message ${type}`;
        statusMessage.style.display = 'block';
    }

    function showLoading(show) {
        loadingDiv.style.display = show ? 'block' : 'none';
        paymentForm.style.display = show ? 'none' : 'block';
        payButton.disabled = show;
    }

    // ✅ 9. Set initial amount display
    window.addEventListener('load', () => {
        const amt = parseFloat(amountInput.value) || 0;
        amountDisplay.textContent = `Amount: ₹${amt.toFixed(2)}`;
    });
</script>
</body>
</html>
