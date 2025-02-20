<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Order Confirmation - GradeVault</title>
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
                background-color: #fff;
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
                color: gold;
            }

            .search-bar input[type="text"] {
                padding: 5px;
                font-size: 1em;
            }  
            
            /* Body Styling */
            .confirmation-message {
                text-align: center;
                padding: 40px 15px;
                flex-grow: 1;
            }

            .confirmation-message h1 {
                color: #333;
                font-size: 2em;
                margin-bottom: 10px;
            }

            .confirmation-message p {
                font-size: 1.1em;
                margin-bottom: 20px;
            }

            .order-details {
                max-width: 600px;
                margin: 0 auto;
                padding: 20px;
                background-color: #d7daeb;
                border: 1px solid #11023f;
                border-radius: 5px;
                text-align: left;
            }

            .order-details h2 {
                color: #333;
                margin-bottom: 15px;
            }

            .order-details p {
                margin: 2px 0;
                line-height: 1.5;
            }

            .info-rectangle {
                width: 80%;
                max-width: 400px;
                margin: 20px auto;
                padding: 40px;
                background-color: #D9E4F5;
                color: #000000;
                text-align: center;
                border-radius: 8px;
                font-size: 1.2em;
                border: 1.5px solid #000;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); 
            }

            .button-container {
                display: flex;
                justify-content: center;
                margin: 20px auto;
                max-width: 800px;
                gap: 50px; /
            }

            .button-container button {
                flex: 1;
                padding: 8% 0;
                font-size: 1.5em; 
                color: #fff;
                border: none;
                border-radius: 8px;
                cursor: pointer;
                transition: background-color 0.3s;
                background-color: #606297;
                box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
            }

            .button-container .maths {
                background-color: #606297;
            }

            .button-container .english {
                background-color: #2D306A;
            }

            .button-container .science {
                background-color: #0E125B;
            }

            .button-container button:hover {
                opacity: 0.85;
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
                <a href="index.html">
                    <img src="images/GvLogo.png" alt="GradeVault Logo">
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
            <!-- Header Search Bar -->
            <div class="search-bar">
                <form action="{{route('products.search')}}" method="GET">
                    <input type="text" name="search" placeholder="Search Products...">
                    <button type="submit">Search</button>
                </form>
            </div>
        </div>
        
        <!-- Content Section -->
        <section class="order-confirmation">
            <h1>Thank you for your order!</h1>
            <p>Your order has been confirmed! A confirmation email has been sent to your email address.</p>

            <div class="order">
                <h3>Order #{{ $order->id }} - Delivery Date: {{ $order->estimated_delivery_date->toFormattedDateString() }}</h3>
                @foreach($order->products as $product)
                    <div class="product-details">
                        <img src="{{ $product->image_link }}" alt="{{ $product->alt_text }}">
                        <p>{{ $product->name }}</p>
                        <p>Price: £{{ number_format($product->pivot->price, 2) }}</p>
                        <p>Quantity: {{ $product->pivot->quantity }}</p>
                    </div>
                @endforeach
                <p><strong>Total: £{{ number_format($order->products->sum(fn($p) => $p->pivot->price * $p->pivot->quantity), 2) }}</strong></p>
            </div>

            <a href="{{ route('previous.orders') }}" class="btn">View All Orders</a>
        </section>
        <div class="info-rectangle">
            <p>Explore more GCSE revision guides</p>
        </div>

        <div class="button-container">
            <button class="maths">Maths</button>
            <button class="english">English</button>
            <button class="science">Science</button>
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
            })
        </script>
    </body>
</html>
