<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="checkout.css">
</head>
<body>

<header>
    <div class="logo">
        <img src="#" alt="GradeVault Logo">
    </div>
    <nav>
        <a href="#">Tutors</a>
        <a href="#">About</a>
        <a href="#">Contact us</a>
        <input type="search" placeholder="Search...">
    </nav>
</header>

<main>
    <div class="checkout-container">
        <h2>Checkout</h2>
        <div class="checkout-step">
            <label for="customer-details">Customer Details</label>
            <input type="text" id="customer-details" placeholder="Enter your name">
        </div>
        <div class="checkout-step">
            <label for="address">Confirm Address</label>
            <input type="text" id="address" placeholder="Enter your address">
        </div>
        <div class="checkout-step">
            <label for="payment-details">Payment Details</label>
            <select id="payment-details">
                <option value="">Select payment method</option>
                <option value="card">Credit/Debit Card</option>
                <option value="paypal">PayPal</option>
            </select>
        </div>
        <div class="checkout-footer">
            <div class="terms">
                <input type="checkbox" id="terms" required>
                <label for="terms">Terms and Conditions</label>
            </div>
            <button type="button">Place Order</button>
        </div>
    </div>
</main>

<footer>
    <p>Contact us</p>
    <p>Telephone: </p>
    <p>Email: </p>
    <p>Guard your Grades with GradeVault</p>
</footer>

</body>
</html>
