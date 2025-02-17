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

      /* General Body and Page Styling */
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

      /* Body Styling */
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

      /* Footer Styling */
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
      .switch {
        position: relative;
        display: inline-block;
        width: 50px;
        height: 24px;
        margin-left: 10px;
      }

      .switch input {
        opacity: 0;
        width: 0;
        height: 0;
      }

      .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #878686   ;
        transition: 0.4s;
        border-radius: 24px;
      }

      .slider:before {
        position: absolute;
        content: "";
        height: 18px;
        width: 18px;
        left: 4px;
        bottom: 3px;
        background-color: rgb(6, 0, 0);
        transition: 0.4s;
        border-radius: 50%;
      }

      input:checked + .slider {
         background-color: #878686;
      }

      input:checked + .slider:before {
        transform: translateX(24px);
      }
      
      .tooltip {
        position: relative;
        display: inline-block;
      }

      .tooltip .tooltip-text {
        font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        visibility: hidden;
        background-color: black;
        color: #fff;
        text-align: center;
        padding: 6px;
        border-radius: 5px;
        position: absolute;
        top: 25px;
        left: 50%;
        transform: translateX(-50%);
        font-size: 0.7em;
        white-space: nowrap;
      }

      .tooltip:hover .tooltip-text {
        visibility: visible;
      }
    </style>
  </head>
  <body>
    <!-- Header Section -->
    <div class="header">
      <div class="logo">
        <a href="index.html">
          <img src="GV.png" alt="GradeVault Logo">
        </a>
      </div>
      <!-- Header Nav Bar -->
      <nav>
          <a href="{{url('/')}}">Home</a>
          <a href="{{url('tutor')}}">Tutors</a>
          <a href="{{url('about')}}">About</a>
          <a href="{{url('contact')}}">Contact Us</a>
          <a href="{{url('products')}}">Products</a>
          <a href="#">Log In / Sign Up</a>
          <div class="tooltip">
                <label class="switch">
                <input type="checkbox" id="fontToggle" onchange="toggleFontSize()">
                <span class="slider round"></span>
                </label>
                <span class="tooltip-text">Toggle Font Size</span>
          </div>
      </nav>
    </div>

    <!-- Content Section -->
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

    <!-- Footer Section -->
    <div class="footer">
      <p>Contact us at <a href="mailto:info@gradevault.com" style="color: #fff;">info@gradevault.com</a></p>
      <p>Telephone: 123-456-7890</p>
      <p>Guard your Grades with GradeVault</p>
    </div>

    <script>
      document.addEventListener("DOMContentLoaded", function () {
      const savedFontSize = localStorage.getItem("pageFontSize");
      const fontToggle = document.getElementById("fontToggle");

      if (savedFontSize === "20px") {
          document.body.style.fontSize = "20px";
          fontToggle.checked = true;
      }

      window.toggleFontSize = function () {
          const isLarge = fontToggle.checked;
          document.body.style.fontSize = isLarge ? "20px" : "16px";
          localStorage.setItem("pageFontSize", isLarge ? "20px" : "16px");
      };
      })
    </script>
  </body>
</html>