<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Previous Orders</title>
        <style>
           html, body {
    height: 100%;
    display: flex;
    flex-direction: column;
    font-family: Arial, sans-serif;
}

.content {
    flex: 1; /* Pushes footer down when there's less content */
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
/* Ensure Previous Orders container is properly spaced */
.content {
    max-width: 900px;
    margin: 80px auto 30px;
    background-color: #e7e9fc;
    
    padding: 40px;
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    text-align: center;
}

/* Add proper spacing to order boxes */
.order {
    background: #f9f9f9;
    max-width: 600px;
    padding: 20px;
    border-radius: 13px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    margin: 20px auto;
    margin-bottom: 30px; /* Increased margin to prevent overlap */
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

/* Ensure product details don't overlap */
.product-details {
    display: flex;
    align-items: center;
    justify-content: space-between;
    background: #eef2ff;
    padding: 15px;
    border-radius: 10px;
    width: 100%;
    margin: 15px 0; /* More margin for spacing */
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    gap: 15px;
}


.order:hover {
    transform: translateY(-5px);
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
}

.order h3 {
    font-size: 1.3em;
    margin-bottom: 15px;
    color: #444;
}


.product-details img {
    width: 100px;
    height: 100px;
    border-radius: 8px;
    object-fit: cover;
    flex-shrink: 0;
}

.product-info {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    flex-grow: 1;
}

.product-info p {
    margin: 2px 0;
    font-size: 1em;
    color: #333;
}

.total {
    font-weight: bold;
    font-size: 1.3em;
    margin-top: 15px;
    color: #222;
}

            .footer {
    background-color: #000;
    color: #fff;
    text-align: center;
    padding: 15px 0;
    width: 100%;
    margin-top: auto; /* Pushes footer to bottom */
}


    .footer p {
      margin: 5px 0;
    }

    .footer .contact-info {
      display: flex;
      justify-content: center;
      gap: 15px;
      flex-wrap: wrap;
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
    bottom: 30px; /* Adjust the distance from the footer */
    left: 680px;
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 10px;
    width: 100%;
    padding: 10px 0;
    z-index: 1000;
    
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

          /* DARK MODE GENERAL STYLES */
.dark-mode {
    background-color: #121212;
    color: #e0e0e0;
}

/* Ensure all text and links are readable */
.dark-mode a,
.dark-mode p,
.dark-mode h1,
.dark-mode h3,
.dark-mode .total {
    color:rgb(11, 11, 11);
}

/* HEADER & FOOTER */
.dark-mode .header,
.dark-mode .footer {
    background-color: #333;
    
}

.dark-mode .header nav a {
    color: white;
}
/* Change 'Previous Orders' text to black in dark mode */
.dark-mode h2 {
    color: black;
}

/* Match footer background color with header in dark mode */
.dark-mode .footer {
    background-color: #333;
    color: white; /* Ensure footer text is white */
}

/* Ensure all footer text stays white */
.dark-mode .footer p {
    color: white;
}

/* Return Form  */
.return-product {
                max-width: 600px;
                margin: 40px auto;
                padding: 20px;
                background: #f9f9f9;
                border-radius: 12px;
                box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
                text-align: center;
            }

            .return-product h3 {
                color: #333;
                margin-bottom: 15px;
            }

            .return-product form {
                display: flex;
                flex-direction: column;
                gap: 10px;
            }

            .return-product input,
            .return-product textarea,
            .return-product button {
                width: 100%;
                padding: 10px;
                font-size: 1em;
                border: 1px solid #ccc;
                border-radius: 8px;
            }

            .return-product button {
                background-color: #000;
                color: white;
                cursor: pointer;
                transition: background 0.3s ease;
            }

            .return-product button:hover {
                background-color: #444;
            }


        </style>
    </head>
    <body>
        <!-- Header Section -->
        <div class="header">
            <div class="logo">
            <a href="/"> <img src="{{asset('Images/GV.png')}}" alt="GradeVault Logo"></a>
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

            <!-- Header Search Bar -->
            <div class="search-bar">
                <form action="{{route('products.search')}}" method="GET">
                    <input type="text" name="search" placeholder="Search Products...">
                    <button type="submit">Search</button>
                </form>
            </div>
        </div>

        <div class="content">
        <h2>Previous Orders</h2>
        @foreach($orders as $order)
            <div class="order">
                <h3>Order {{ $order->id }} - Delivery Date: {{ $order->estimated_delivery_date->toFormattedDateString() }}</h3>
                @foreach($order->products as $product)
                <div class="product-details">
    <img src="{{ $product->image_link }}" alt="{{ $product->alt_text }}">
    <div class="product-info">
        <p>{{ $product->name }}</p>
        <p>Price: £{{ number_format($product->pivot->price, 2) }}</p>
        <p>Quantity: {{ $product->pivot->quantity }}</p>
    </div>
</div>

                @endforeach
                <p class="total">Total: £{{ number_format($order->products->sum(fn($p) => $p->pivot->price * $p->pivot->quantity), 2) }}</p>
            </div>
        @endforeach
    </div>
    <!-- Return Form -->
    <div class="return-product">
    <h3>Request a Return</h3>
    <p>If you're not happy with your order, please fill out the form below to request a return.</p>
    <form action="https://formspree.io/f/xeoaazag" method="POST">
        <input type="text" name="name" placeholder="Your Name" required>
        <input type="email" name="email" placeholder="Your Email" required>
        <input type="text" name="order_number" placeholder="Order Number" required>
        <input type="text" name="product_name" placeholder="Product Name" required>
        <textarea name="reason_for_return" rows="6" placeholder="Reason for Return" required></textarea>
        <textarea name="additional_comments" rows="4" placeholder="Additional Comments (optional)"></textarea>
        <button type="submit">Submit Return Request</button>
    </form>
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
