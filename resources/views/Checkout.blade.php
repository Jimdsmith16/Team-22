<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Checkout</title>
      <style>
      /* General Reset */
      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: Arial, sans-serif;
      }
      
      /* General Page and Body Styling */
      body {
        background-color: #f5f5f5;
        color: #333;
      }
      
      /* General Header Styling */
      .header {
        background-color: #000;
        padding: 0 15px;
        height: 60px; /* Set a fixed height for the header */
        color: #fff;
        display: flex;
        justify-content: space-between;
        align-items: center;
      }
      
      .header .logo img {
        height: 50px; /* Adjusted the logo size */
        max-height: 100%; /* Ensures it doesn’t exceed header height */
      }
      
      .header nav a {
        color: #fff;
        text-decoration: none;
        margin: 0 10px;
      }
      
      .search-bar {
        position: relative;
      }
      
      .search-bar input[type="text"] {
        padding: 5px;
        font-size: 1em;
      }
      
      /* Body Styling */
      .content {
        max-width: 800px;
        margin: 20px auto;
        padding: 20px;
        background-color: #e7e9fc;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        border-radius: 10px;
        text-align: center;
      }
      
      .content img {
        max-width: 100%;
        height: auto;
        margin-bottom: 20px; /* Adds space below the image */
      }
      
      .content p {
        margin: 15px 0;
        line-height: 1.6;
      }

      /* Footer Styling */
      .footer {
        background-color: #000;
        color: #fff;
        text-align: center;
        padding: 15px 0;
        margin-top: 20px;
      }
      
      .footer p {
        margin: 5px 0;
      }
      
      .footer .contact-info {
        display: flex;
        justify-content: center;
        gap: 15px;
      }
      
      .footer .contact-info p {
        margin: 0;
        font-size: 0.9em;
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
    <header>
      <div class="logo">
        <img src="#" alt="GradeVault Logo">
      </div>
      <!-- Header Nav Bar -->
      <nav>
        <a href="{{url('/')}}">Home</a>
        <a href="{{url('tutor')}}">Tutors</a>
        <a href="{{url('about')}}">About</a>
        <a href="{{url('contact')}}">Contact Us</a>
        <a href="{{url('products')}}">Products</a>
        @auth
        <a href="{{url('usersettings') }}">Settings</a>
        @else
        <a href="{{url('login') }}">Log In / Sign Up</a>
        @endauth
        <div class="tooltip">
            <label class="switch">
            <input type="checkbox" id="fontToggle" onchange="toggleFontSize()">
            <span class="slider round"></span>
            </label>
            <span class="tooltip-text">Toggle Font Size</span>
        </div>
      </nav>
      <!-- Header Search Bar -->
      <div class="search-bar">
        <form action="{{route('products.search')}}" method="GET">
          <input type="text" name="search" placeholder="Search Products...">
          <button type="submit">Search</button>
        </form>
      </div>
    </header>

    <!-- Content Section -->
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
      </div>
    </main>

    <!-- Footer Section -->
    <footer>
        <p>Contact us</p>
        <p>Telephone: 123 456 7890</p>
        <p>Email: Gradevault06@gmail.com</p>
        <p>Guard your Grades with GradeVault</p>
    </footer>

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
