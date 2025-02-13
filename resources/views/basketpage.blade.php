<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Basket Page</title>
        <style>
            * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
            }

            /* General Page Styling */
            html,body {
                height: 100%;
                display: flex;
                flex-direction: column;
            }
            .main-content {
                flex: 1;
            }
            
            body {
                background-color: #fff; /* Keeping the background white */
                color: #333;
            }

            /* Header Styling */
            .header {
                background-color: #000;
                padding: 0 15px;
                height: 60px;
                color: #fff;
                display: flex;
                justify-content: space-between;
                align-items: center;
                position: sticky;
                top: 0;
                z-index: 1000;
            }

            .header .logo img {
                height: 50px;
                max-height: 100%;
            }

            .header nav a {
                color: #fff;
                text-decoration: none;
                margin: 0 10px;
                transition: color 0.3s ease;
            }

            .header nav a:hover {
                color: #b5b2a2; /* Gold hover effect */
            }

            .search-bar input[type="text"] {
                padding: 5px;
                font-size: 1em;
            }

            /* Basket Container */
            /* Basket Container */
            .basket-container {
                margin: 30px auto;
                padding: 20px;
                background-color: #ffffff; /* White background */
                width: 80%;
                max-width: 800px;
                border: 1.5px solid #4682B4; /* Light blue border */
                border-radius: 10px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
                text-align: center;
            }

            /* Basket Title */
            .basket-title {
                background-color: #59a7d5; /* Light blue title */
                color: white; 
                padding: 12px;
                font-size: 2em;
                font-weight: bold;
                border-radius: 8px;
                margin-bottom: 20px;
            }

            /* Item Title */
            .item-title {
                background-color: #59a7d5; /* Light blue title bar */
                color: white;
                padding: 8px;
                border-radius: 5px;
                margin-bottom: 15px;
                display: inline-block;
                font-weight: bold;
                font-size: 1.2em;
            }

            /* Basket Item */
            .basket-item {
                display: flex;
                justify-content: center;
                align-items: center;
                gap: 30px;
                margin: 20px 0;
                background-color: #ffffff;
                padding: 15px;
                border-radius: 8px;
                border: 1.5px solid #4682B4;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            }

            .basket-item img {
                max-width: 100px;
                border-radius: 5px;
            }

            /* Price and Quantity Styling */
            .price-quantity-container {
                display: flex;
                flex-direction: column;
                align-items: center;
                background-color: #59a7d5;
                color: #fff; 
                padding: 12px;
                border-radius: 8px;
                font-size: 1.2em;
                font-weight: bold;
            }

            /* Quantity Controls */
            .quantity-control {
                display: flex;
                align-items: center;
                gap: 12px;
                margin-top: 10px;
            }

            .quantity-control button {
                background-color: #59a7d5;
                border: 1px solid #fff;
                border-radius: 5px;
                padding: 6px 14px;
                font-size: 1.1em;
                cursor: pointer;
                font-weight: bold;
                color: #fff;
                transition: background-color 0.3s ease, color 0.3s ease;
            }

            .quantity-control button:hover {
                background-color: #649fcf;
                color: #fff;
            }

            /* Total Section */
            .total-section {
                background-color: #59a7d5;
                color: #fff;
                padding: 14px;
                border-radius: 8px;
                display: inline-block;
                margin-top: 20px;
                font-size: 1.4em;
                font-weight: bold;
            }

            /* Checkout Button */
            .checkout-button {
                margin-top: 20px;
                padding: 14px 30px;
                background-color: #588ebc;
                color: #fff;
                border: none;
                border-radius: 8px;
                cursor: pointer;
                font-size: 1.4em;
                font-weight: bold;
                transition: background-color 0.3s ease, color 0.3s ease;
            }

            .checkout-button:hover {
                background-color: #1a6ab9;
                color: #fff;
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
                <a href="{{ url('usersettings') }}">Settings</a>
                @else
                <a href="{{ url('login') }}">Log In / Sign Up</a>
                @endauth
                <div class="tooltip">
                    <label class="switch">
                        <input type="checkbox" id="fontToggle" onchange="toggleFontSize()">
                        <span class="slider round"></span>
                    </label>
                    <span class="tooltip-text">Toggle Font Size</span>
                </div>
            </nav>
            <div class="search-bar">
                <form action="{{route('products.search')}}" method="GET">
                    <input type="text" name="search" placeholder="Search Products...">
                    <button type="submit">Search</button>
                </form>
            </div>
        </div>

        <!-- Basket Section -->
        <div class="main-content">
            <div class="basket-container">
                <div class="basket-title">Basket</div>

                <div class="item-title">Title</div>

                @foreach($products as $product)
                <div class="basket-item">
                <img src="{{ $product->image_link }}" alt="{{ $product->alt_text }}">
                <div>{{ $product->name }}</div>
                <div class="price-quantity-container">
                    <div>Price - £{{ number_format($product->price, 2) }}</div>
                    <div class="quantity-control">
                        <form action="{{ route('basket.remove') }}" method="POST">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <button type="submit">-</button>
                        </form>
                        <span>{{ $product->pivot->quantity }}</span>
                        <form action="{{ route('basket.add') }}" method="POST">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <input type="hidden" name="quantity" value="1">
                            <button type="submit">+</button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach

            <div class="total-section">Total = £{{ number_format($total, 2) }}</div>
            <button class="checkout-button">Proceed to Checkout ➤</button>
        </div>

        <!-- Footer Section -->
        <div class="footer">
            <div class="contact-info">
            <p>Contact us</p>
            <p>Telephone: 123-456-7890</p>
            <p>Email: info@gradevault.com</p>
            </div>
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

            // Function to update quantity and total price
            window.updateQuantity = function (change, button) {
                const quantitySpan = button.parentElement.querySelector('span');
                const totalSpan = document.querySelector('.total-section');

                let quantity = parseInt(quantitySpan.textContent);
                quantity = Math.max(1, quantity + change); // Prevent quantity from going below 1
                quantitySpan.textContent = quantity;

                const total = quantity * 10; // Assuming price is £10
                totalSpan.textContent = `Total = £${total.toFixed(2)}`;
            };
            });
        </script>
    </body>
</html>
