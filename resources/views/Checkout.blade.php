<<<<<<< Updated upstream
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <style>
        * {
              margin: 0;
              padding: 0;
              box-sizing: border-box;
              font-family: Arial, sans-serif;
          }

          html, body {
    height: 100%;
    display: flex;
    flex-direction: column;
}

main {
    flex: 1;
    margin-top: 100px;
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100%;
}

          /* Header Styling */
          .header {
              background-color: #000;
              color: #fff;
              height: 60px;
              width: 100%;
              display: flex;
              justify-content: space-between;
              align-items: center;
              padding: 0 15px;
              position: fixed;
              top: 0;
              z-index: 1000;
          }

          .header .logo img {
              height: 50px;
          }

          .header nav {
              display: flex;
              align-items: center;
          }

          .header nav a {
              color: #fff;
              text-decoration: none;
              margin: 0 10px;
          }

          .search-bar {
              display: flex;
              align-items: center;
          }

          .search-bar input[type="text"] {
              padding: 5px;
              font-size: 1em;
          }

        /* Content Section */
        main {
            flex: 1;
            margin-top: 100px;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
        }

       /* Fix checkout layout to prevent basket from being pushed down */
.checkout-wrapper {
    display: flex;
    justify-content: space-between; /* Ensures form and basket stay side by side */
    align-items: flex-start;
    width: 90%; /* Allow the section to take more width */
    max-width: 1200px; /* Keep the layout balanced */
    margin: 100px auto 20px;
    padding: 20px;
    gap: 20px; /* Adjust spacing between form and basket */
}

/* Updated Checkout Form Styling */
.checkout-form {
    flex: 1;
    max-width: 550px; /* Adjusted width */
    min-width: 400px;
    background-color: #e7e9fc;
    padding: 25px; /* Reduced padding */
    border-radius: 10px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    display: flex;
    flex-direction: column;
    gap: 15px; /* Adds spacing between elements */
}

.checkout-step input,
.checkout-step select {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 1em;
}


    /* Spacing adjustments within form elements */
.checkout-step {
    display: flex;
    flex-direction: column;
    gap: 10px; /* Increased spacing between inputs */
    margin-bottom: 15px; /* Adds spacing between form sections */
}


.checkout-step label {
    font-size: 1em;
    font-weight: bold;
}
    
    .basket-summary {
    width: 350px; /* Fixed width to prevent it from getting pushed down */
    background-color: #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    flex-shrink: 0; /* Prevents it from shrinking */
}
    .basket-items {
        display: flex;
        flex-direction: column;
        gap: 8px;
        margin-bottom: 15px;
    }

    .checkout-item {
        background-color: #ffffff;
        padding: 12px;
        border-radius: 6px;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
    }

    .item-name {
        font-weight: bold;
        color: #000;
        font-size: 0.85em;
    }

    .quantity {
        font-weight: normal;
        color: #666;
        font-size: 0.8em;
    }

    .item-price {
        margin-top: 3px;
        color: #333;
        font-size: 0.85em;
    }

    .total-section {
        padding: 10px;
        background-color: #e7e9fc;
        border-radius: 6px;
        text-align: center;
        font-size: 1.1em;
        font-weight: bold;
        color: #000;
    }

    .checkout-footer {
    text-align: center;
    margin-top: 10px; /* Reduced margin */
}

    .checkout-footer button {
        width: 100%;
        padding: 12px;
        border: none;
        background-color: #000;
        color: white;
        font-size: 1em;
        border-radius: 5px;
        cursor: pointer;
    }

    .checkout-footer button:hover {
        opacity: 0.7;
    }
    .terms {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    font-size: 0.9em;
}

    /* Footer Styling */
.footer {
    background-color: #000;
    color: #fff;
    text-align: center;
    padding: 15px 0;
    margin-top: 20px;
    width: 100%;
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
              background-color: #878686;
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
              
          }
          .font-toggle-container {
    position: fixed;
    right: 17px;
    bottom: 28px;
    display: flex;
    align-items: center;
    gap: 10px;
    background: none; /* Remove background */
    padding: 0; /* Remove padding */
    border-radius: 0; /* Remove border radius */
    box-shadow: none; /* Remove shadow */
    transition: transform 0.01s ease-in-out;
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

          .dark-mode .dark-mode-button {
    background-color: #444; /* Dark gray background */
    color: white;
    padding: 5px 10px;
    border-radius: 5px;
}


        .dark-mode-button:hover {
            text-decoration: underline;
        }

        .dark-mode {
    background-color: #121212;
    color:rgb(10, 10, 10);
}

.dark-mode .content {
    background-color: #1e1e1e;
    color:rgb(8, 8, 8);
}

.dark-mode .header, .dark-mode .footer {
    background-color: #333;
}

.dark-mode .header nav a {
    color: #ffffff;
}

    </style>
</head>
<body>
<div class="header">
          <div class="logo">
          <a href="/"> <img src="{{asset('Images/GV.png')}}" alt="GradeVault Logo"></a>
          </div>
          <!-- Nav Bar -->
          <nav>
              <a href="{{url('/')}}">Home</a>
              <a href="{{url('tutor')}}">Tutors</a>
              <a href="{{url('about')}}">About</a>
              <a href="{{url('contact')}}">Contact Us</a>
              <a href="{{url('products')}}">Products</a>
              @auth
              @if(auth()->user()->type === 'admin')
              <a href="{{ url('adminsettings') }}">Settings</a>
              @else
              <a href="{{ url('usersettings') }}">Settings</a>
              @endif
              @else
              <a href="{{ url('login') }}">Login</a>
              @endauth
          </nav>
          <!-- Search Bar -->
          <div class="search-bar">
              <form action="{{route('products.search')}}" method="GET">
                  <input type="text" name="search" placeholder="Search Products...">
                  <button type="submit">Search</button>
              </form>
          </div>
      </div>

      <div class="font-toggle-container">
    <div class="tooltip">
        <label class="switch">
            <input type="checkbox" id="fontToggle" onchange="toggleFontSize()">
            <span class="slider round"></span>
        </label>
        <span class="tooltip-text">Toggle Font Size</span>
    </div>
    <button class="dark-mode-button" onclick="toggleDarkMode()">Dark Mode</button>
</div>


<!-- Basket & Checkout Layout -->
<div class="checkout-wrapper">
    <!-- Customer Details Form (Centered) -->
    <div class="checkout-form">
        <h2>Checkout</h2>
        <form action="{{ route('checkout.process') }}" method="POST">
            @csrf
            <div class="checkout-step">
                <label for="customer-details">Customer Details</label>
                <input type="text" id="customer-details" name="customer_name" placeholder="Enter your name" required>
            </div>

            <div class="checkout-step">
                <label for="address_line1">Address Line 1</label>
                <input type="text" id="address_line1" name="address_line1" placeholder="Enter address line 1" required>

                <label for="address_line2">Address Line 2</label>
                <input type="text" id="address_line2" name="address_line2" placeholder="Enter address line 2 (optional)">

                <label for="postcode">Postcode</label>
                <input type="text" id="postcode" name="postcode" placeholder="Enter your postcode" required>

                <label for="country">Country</label>
                <input type="text" id="country" name="country" placeholder="Enter your country" required>
            </div>

            <div class="checkout-step">
                <label for="payment-details">Payment Details</label>
                <select id="payment-details" name="payment_method" required>
                    <option value="">Select payment method</option>
                    <option value="card">Credit/Debit Card</option>
                    <option value="paypal">PayPal</option>
                </select>
            </div>

            <div class="checkout-footer">
                <div class="terms">
                    <input type="checkbox" id="terms" required>
                    <label for="terms">I agree to the Terms and Conditions</label>
                </div>
                <button type="submit">Place Order</button>
            </div>
        </form>
    </div>

    <!-- Basket Items (Right Side) -->
    <div class="basket-summary">
        <h3>Your Basket</h3>
        <div class="basket-items">
            @foreach($products as $product)
            <div class="checkout-item">
                <div class="item-details">
                    <p class="item-name">{{ $product->name }} <span class="quantity">(x{{ $product->pivot->quantity }})</span></p>
                    <p class="item-price">£{{ number_format($product->price * $product->pivot->quantity, 2) }}</p>
                </div>
            </div>
            @endforeach
        </div>
        <div class="total-section">
            <p><strong>Total:</strong> £{{ number_format($total, 2) }}</p>
        </div>
    </div>
</div>

    <!-- Footer Section -->
    <footer>
        <div class="footer">
            <div class="contact-info">
                <p>Contact us</p>
                <p>Telephone: 123 456 7890</p>
                <p>Email: info@gradevault.com</p>
            </div>
            <p>Guard your Grades with GradeVault</p>
        </div>
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
        });
        document.addEventListener("DOMContentLoaded", function () {
        const fontToggleContainer = document.querySelector(".font-toggle-container");

        window.addEventListener("scroll", function () {
            let scrollY = window.scrollY || window.pageYOffset; 
            let maxScroll = document.documentElement.scrollHeight - window.innerHeight;
            let scrollPercentage = scrollY / maxScroll; 

            let moveAmount = scrollPercentage * 80; // Adjust the floating effect amount
            fontToggleContainer.style.transform = `translateY(-${moveAmount}px)`;
        });
    });

    document.addEventListener("DOMContentLoaded", function () {
    const darkModeEnabled = localStorage.getItem("darkMode") === "enabled";

    if (darkModeEnabled) {
        document.body.classList.add("dark-mode");
    }

    document.querySelector(".dark-mode-button").addEventListener("click", function () {
        document.body.classList.toggle("dark-mode");
        const isDarkMode = document.body.classList.contains("dark-mode");
        localStorage.setItem("darkMode", isDarkMode ? "enabled" : "disabled");
    });
});

    </script>

</body>
</html>

