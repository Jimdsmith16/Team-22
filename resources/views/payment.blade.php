<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Payment - GradeVault</title>
  <style>
    /* General Reset */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: Arial, sans-serif;
    }

    body {
      background-color: #f9f9f9;
      color: #333;
    }

    .header {
      background-color: #000;
      padding: 0 15px;
      height: 70px;
      color: #fff;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .header .logo img {
      height: 60px;
    }

    .header nav a {
      color: #fff;
      text-decoration: none;
      margin: 0 15px;
      font-weight: bold;
    }

    .content {
      max-width: 700px;
      margin: 40px auto;
      padding: 30px;
      background-color: #fff;
      box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
      border-radius: 10px;
      text-align: center;
    }

    .content h1 {
      margin-bottom: 20px;
      color: #444;
    }

    .content p {
      margin-bottom: 30px;
      color: #666;
    }

    .content form {
      display: flex;
      flex-direction: column;
      gap: 20px;
    }

    .content form label {
      font-weight: bold;
      text-align: left;
    }

    .content form input {
      padding: 12px;
      font-size: 1em;
      border: 1px solid #ccc;
      border-radius: 8px;
      width: 100%;
    }

    .content form button {
      background-color: #000;
      color: #fff;
      padding: 12px;
      font-size: 1.2em;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      transition: background-color 0.3s;
    }

    .content form button:hover {
      background-color: #444;
    }

    .footer {
      background-color: #000;
      color: #fff;
      text-align: center;
      padding: 20px 0;
      margin-top: 30px;
    }

    .footer p {
      margin: 5px 0;
    }
  </style>
</head>
<body>

  <div class="header">
    <div class="logo">
      <a href="index.html">
        <img src="GV.png" alt="GradeVault Logo">
      </a>
    </div>
    <nav>
      <a href="#">Tutors</a>
      <a href="#">About</a>
      <a href="#">Contact Us</a>
      <a href="#">Log In / Sign Up</a>
    </nav>
  </div>

  <div class="content">
    <h1>Secure Payment</h1>
    <p>Complete your payment to access GradeVault services securely and quickly.</p>

    <form action="/payment" method="post">
      @csrf
      <label for="name">Name on Card:</label>
      <input type="text" id="name" name="name" placeholder="Enter cardholder's name" required>

      <label for="card-number">Card Number:</label>
      <input type="text" id="card-number" name="card_number" placeholder="1234 5678 9012 3456" required>

      <label for="expiry">Expiry Date:</label>
      <input type="month" id="expiry" name="expiry" required>

      <label for="cvv">CVV:</label>
      <input type="password" id="cvv" name="cvv" placeholder="123" required>

      <label for="amount">Amount:</label>
      <input type="text" id="amount" name="amount" value="${{ number_format($amount, 2) }}" readonly>

      <button type="submit">Make Payment</button>
    </form>
  </div>

  <div class="footer">
    <p>Contact us at <a href="mailto:info@gradevault.com" style="color: #fff;">info@gradevault.com</a></p>
    <p>Telephone: 123-456-7890</p>
    <p>Guard your Grades with GradeVault</p>
  </div>

</body>
</html>
