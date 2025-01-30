<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Previous Orders</title>
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
                background-color: #F5F5F5;
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
                font-size: 1em;
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
                margin-bottom: 20px; 
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
        
            footer {
                background-color: black;
                color: white;
                text-align: center;
                padding: 10px;
                width: 100%;
                margin-top: 40px;
            }

            footer p {
                margin: 5px 0;
            }
        </style>
    </head>
    <body>
        <!-- Header Section -->
        <div class="header">
            <div class="logo">
                <img src="{{asset('Images/GV.png')}}" alt="GradeVault Logo">
            </div>
            <!-- Header Nav Bar -->
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
        <main>
            <section class="previous-orders">
                <h2>Previous Orders</h2>

                @foreach($orders as $order)
                <div class="order">
                    <a target="_blank" href="{{ $order->image_link }}">
                        <img src="{{ $order->image_link }}" alt="Product Image">
                    </a>
                    <div class="product-details">
                        <p>{{$order->name}} ?></p>
                        <p>Price: £{{ number_format($order->price,2) }}</p>
                        <p>Quantity: {{$order->number_of_stock}}</p>
                    </div>
                </div>
                @endforeach

                <div class="totals">
                    <p>Total: {{$total_price}}</p>
                    <p>Total orders: {{$total_orders}}</p>
                </div>
            </section>
        </main>

        <!-- Footer Section -->
        <div class="footer">
            <div class="contact-info">
            <p>Contact us</p>
            <p>Telephone: 123-456-7890</p>
            <p>Email: info@gradevault.com</p>
            </div>
            <p>Guard your Grades with GradeVault</p>
        </div>
    </body>
</html>
