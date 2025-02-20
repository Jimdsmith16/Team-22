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

          /* General Page and Body Styling */
          html,
          body {
              height: 100%;
              background-color: #f5f5f5;
              color: #333;
          }

          body {
              display: flex;
              flex-direction: column;
              align-items: center;
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

        .checkout-container {
            background-color: #e7e9fc;
            width: 90%;
            max-width: 600px;
            padding: 50px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
            font-size: 1.3em;
        }

        .checkout-container h2 {
            margin-bottom: 20px;
            color: #000;
        }

        .checkout-step {
            margin-bottom: 15px;
            text-align: left;
        }

        .checkout-step label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .checkout-step input, .checkout-step select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .checkout-footer {
            margin-top: 20px;
        }

        .checkout-footer .terms {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 10px;
        }

        .checkout-footer input {
            margin-right: 5px;
        }

        .checkout-container button {
            width: 100%;
            padding: 10px;
            border: none;
            background-color: #000;
            color: white;
            font-size: 1em;
            border-radius: 5px;
            cursor: pointer;
        }

        .checkout-container button:hover {
            opacity: 0.7;
        } 

          /* Footer Styling */
          .footer {
                background-color: #000;
                color: #fff;
                text-align: center;
                padding: 15px 0;
                margin-top: 20px;
                width: 100%;
                left: 0;
                right: 0;
                position: absolute;
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
        /* Switch Styling */
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

        /* Tooltip Styling */
        .tooltip {
            position: relative;
            
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

        
        .font-toggle-container {
    position: fixed;
    right: 25px;
    bottom: 50px;
    display: flex;
    align-items: center;
    gap: 10px;
    background: none; /* Remove background */
    padding: 0; /* Remove padding */
    border-radius: 0; /* Remove border radius */
    box-shadow: none; /* Remove shadow */
    transition: transform 0.3s ease-in-out;
}

.tooltip:hover .tooltip-text {
    visibility: visible;
}

    </style>
</head>
<body>
<div class="header">
          <div class="logo">
              <img src="{{asset('Images/GV.png')}}" alt="GradeVault Logo">
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
</div>



    <!-- Content Section -->
    <main>
        <div class="checkout-container">
            <h2>Checkout</h2>

            <h3>Your Basket Items:</h3>
            @foreach($products as $product)
                <div class="checkout-item">
                    <p>{{ $product->name }} (x{{ $product->pivot->quantity }})</p>
                    <p>Price: £{{ number_format($product->price * $product->pivot->quantity, 2) }}</p>
                </div>
            @endforeach

            <div class="total-section">
                <p>Total: £{{ number_format($total, 2) }}</p>
            </div>

            <form action="{{ route('checkout.process') }}" method="POST">
            @csrf
                <div class="checkout-step">
                    <label for="customer-details">Customer Details</label>
                    <input type="text" id="customer-details" name="customer_name" placeholder="Enter your name" required>
                </div>

                <!-- Shipping Address -->
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
                        <label for="terms">Terms and Conditions</label>
                    </div>
                    <button type="submit">Place Order</button>
                </div>
            </form>
        </div>
    </main>

    <!-- Footer Section -->
    <footer>
        <div class="footer">
            <div class="contact-info">
                <p>Contact us</p>
                <p>Telephone: 123 456 7890</p>
                <p>Email: Gradevault06@gmail.com</p>
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

            let moveAmount = scrollPercentage * 50; // Adjust the floating effect amount
            fontToggleContainer.style.transform = `translateY(-${moveAmount}px)`;
        });
    });
    </script>

</body>
</html>

