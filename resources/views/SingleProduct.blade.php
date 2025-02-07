<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{$product->name}}</title>
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
                padding: 0px 15px;
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
            .basket-title {
                text-align: center;
                font-size: 2em;
                font-weight: bold;
                margin: 30px 0 20px;
                color: gold;
            }

            .product-container {
                display: flex;
                flex-wrap: wrap;
                gap: 20px;
                margin: 20px auto;
                max-width: 800px;
            }

            .product-image {
                flex: 1;
                max-width: 300px;
                border: 1px solid #ddd;
                border-radius: 8px;
                padding: 10px;
                text-align: center;
            }

            .product-image img {
                max-width: 100%;
                height: auto;
                border-radius: 8px;
            }

            .product-details {
                flex: 2;
                display: flex;
                flex-direction: column;
                justify-content: center;
                gap: 15px;
            }

            .product-details h1 {
                font-size: 1.8em;
                color: #333;
            }

            .product-details .price {
                font-size: 1.5em;
                color: #1a73e8;
                font-weight: bold;
            }

            .product-details .description {
                font-size: 1.1em;
                color: #555;
            }

            .product-details button {
                background-color: #1a73e8;
                color: #fff;
                border: none;
                padding: 10px 15px;
                font-size: 1em;
                border-radius: 5px;
                cursor: pointer;
                transition: background-color 0.3s ease;
            }

            .product-details button:hover {
                background-color: #0c54b0;
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
            <!-- Header Nav Bar -->
            <nav>
                <a href="{{url('/')}}">Home</a>
                <a href="{{url('tutor')}}">Tutors</a>
                <a href="{{url('about')}}">About</a>
                <a href="{{url('contact')}}">Contact Us</a>
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
            <!-- Header Search Bar -->
            <div class="search-bar">
                <form action="{{route('products.search')}}" method="GET">
                    <input type="text" name="search" placeholder="Search Products...">
                    <button type="submit">Search</button>
                </form>
            </div>
        </div>

        <!-- Content Section -->
        <div class="basket-title">Basket</div>

        <div class="product-container">
            <img src="{{$product->image_link}}" alt="{{$product->alt_text}}">

            <div class="product-details">
                <h1>{{$product->name}}</h1>
                <div class="price">£ {{$product->price}}</div>
                <div class="description">{{$product->description}}</div>
                <div class="stock">Amount in Stock: {{$product->number_of_stock}}</div>
                <form action="{{ route('basket.add') }}" method="POST">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <input type="number" name="quantity" value="1" min="1">
                    <button type="submit" class="add-to-basket-btn">Add to Basket</button>
                </form>
                <button>Buy Now</button>
            </div>
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
