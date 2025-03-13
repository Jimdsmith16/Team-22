<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Order Confirmation - GradeVault</title>
        <style>
        html, body {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: Arial, sans-serif;
}

/* Ensure consistent spacing */
body {
    background-color: #f4f4f9;
    color: #333;
    
}     /* Header Styling */
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
      /* Fixed to the top */
      top: 0;
      left: 0;
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
      margin-right: 20px;
    }

    .search-bar input[type="text"] {
      padding: 5px;
      font-size: 1em;
      
    }

    /* Footer Styling */
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

            /* Content Section Styling */
            .order-confirmation {
                max-width: 800px;
                margin: 80px auto 30px;
                background: #e7e9fc;
                padding: 30px;
                border-radius: 10px;
                box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
                text-align: center;
            }

            .order-confirmation h1 {
                color: #222;
                font-size: 2.2em;
                margin-bottom: 15px;
            }

            .order-confirmation p {
                font-size: 1.1em;
                color: #666;
                margin-bottom: 25px;
            }

            /* Order Card */
            .order {
                background: #fff;
                padding: 20px;
                border-radius: 10px;
                box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
                margin-bottom: 20px;
            }

            .order h3 {
                color: #444;
                font-size: 1.4em;
                margin-bottom: 10px;
            }

            .product-details {
    display: flex;
    align-items: center; /* Align items in a single row */
    justify-content: flex-start; /* Align content to the left */
    background: #eef2ff;
    padding: 15px;
    margin-top: 10px;
    border-radius: 8px;
    width: 100%;
    max-width: 600px; /* Adjust width as needed */
    margin-left: auto;
    margin-right: auto; /* Center the block */
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    gap: 15px; /* Adds spacing between image and text */
}

.product-details img {
    width: 100px;
    height: 100px;
    border-radius: 8px;
    object-fit: cover;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
    flex-shrink: 0; /* Prevents the image from resizing */
}

.product-details div {
    flex-grow: 1; /* Allows text to take available space */
    text-align: left;
    overflow: hidden; /* Prevents text from overflowing */
    white-space: nowrap; /* Keeps text in one line */
    text-overflow: ellipsis; /* Adds '...' if text is too long */
}

.product-details p {
    font-size: 1em;
    color: #444;
    margin: 5px 0;
}


            /* Total Amount */
            .total {
                font-weight: bold;
                font-size: 1.2em;
                margin-top: 15px;
                color: #222;
            }

            /* Order Buttons */
            .btn {
                display: inline-block;
                margin-top: 20px;
                padding: 12px 25px;
                font-size: 1.1em;
                color: white;
                background-color: #4c5dd5;
                border: none;
                border-radius: 5px;
                cursor: pointer;
                text-decoration: none;
                transition: 0.3s ease;
            }

            .btn:hover {
                background-color: #3b4bb8;
            }

            .button-container {
    display: flex;
    justify-content: center;
    gap: 15px;
    margin: 30px auto;
}

.button-container a {
    display: inline-block;
    text-align: center;
    flex: 1;
    max-width: 150px; /* Restrict button width */
    padding: 15px;
    font-size: 1.1em;
    color: white;
    text-decoration: none; /* Removes underline */
    border: none;
    border-radius: 50px; /* Rounded buttons */
    cursor: pointer;
    transition: all 0.3s ease;
    text-transform: uppercase;
    font-weight: bold;
    letter-spacing: 1px;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
}

.maths {
    background: linear-gradient(135deg, #606297, #4c5dd5);
}

.english {
    background: linear-gradient(135deg, #2D306A, #6A67CE);
}

.science {
    background: linear-gradient(135deg, #0E125B, #4a90e2);
}

.button-container a:hover {
    transform: scale(1.05);
    opacity: 0.9;
}



            /* Information Box */
            .info-rectangle {
                max-width: 400px;
                margin: 25px auto;
                padding: 20px;
                background: #d9e4f5;
                text-align: center;
                font-size: 1.2em;
                border-radius: 8px;
                border: 1.5px solid #000;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
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
    color: #e0e0e0;
}

/* HEADER & FOOTER */
.dark-mode .header,
.dark-mode .footer {
    background-color: #333;
}

.dark-mode .header nav a {
    color: white;
}

/* ORDER CONFIRMATION SECTION */
.dark-mode .order-confirmation {
    background: #1e1e1e;
    box-shadow: 0 4px 10px rgba(255, 255, 255, 0.1);
}

/* ORDER CARD */
.dark-mode .order {
    background: #2a2a2a;
    box-shadow: 0 2px 8px rgba(255, 255, 255, 0.1);
}

/* PRODUCT DETAILS */
.dark-mode .product-details {
    background: #333333;
    color: #e0e0e0;
    box-shadow: 0 2px 8px rgba(255, 255, 255, 0.1);
}



/* BUTTONS (Order Button & Subject Buttons) */
.dark-mode .btn,
.dark-mode .button-container a {
    background: linear-gradient(135deg, #4c5dd5, #606297);
    color: #fff;
    box-shadow: 0 4px 10px rgba(255, 255, 255, 0.1);
}

.dark-mode .btn:hover,
.dark-mode .button-container a:hover {
    background: linear-gradient(135deg, #3b4bb8, #505090);
}

/* INFO BOX */
.dark-mode .info-rectangle {
    background: #2a2a2a;
    border: 1.5px solid #555;
    box-shadow: 0 4px 8px rgba(255, 255, 255, 0.1);
}

/* DARK MODE TOGGLE BUTTON */
.dark-mode .dark-mode-button {
    background-color: #444;
    color: #fff;
}

.dark-mode .dark-mode-button:hover {
    background-color: #666;
}

/* Toggle Switch Slider */
.dark-mode .slider {
    background-color: #555;
}

.dark-mode input:checked + .slider {
    background-color: #4c5dd5;
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
      <a href="{{ url('/') }}">Home</a>
      <a href="{{ url('tutor') }}">Tutors</a>
      <a href="{{ url('about') }}">About</a>
      <a href="{{ url('contact') }}">Contact Us</a>
      <a href="{{ url('products') }}">Products</a>
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

    <div class="search-bar">
                <form action="{{route('products.search')}}" method="GET">
                    <input type="text" name="search" placeholder="Search Products...">
                    <button type="submit">Search</button>
                </form>
            </div>
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

        <!-- Content Section -->
        <section class="order-confirmation">
            <h1>Thank You for Your Order!</h1>
            <p>Your order has been confirmed. A confirmation email has been sent to your inbox.</p>

            <div class="order">
                <h3>Order #{{ $order->id }} - Estimated Delivery: {{ $order->estimated_delivery_date->toFormattedDateString() }}</h3>
                @foreach($order->products as $product)
                    <div class="product-details">
                        <img src="{{ $product->image_link }}" alt="{{ $product->alt_text }}">
                        <div>
                            <p><strong>{{ $product->name }}</strong></p>
                            <p>Price: £{{ number_format($product->pivot->price, 2) }}</p>
                            <p>Quantity: {{ $product->pivot->quantity }}</p>
                        </div>
                    </div>
                @endforeach
                <p class="total">Total: £{{ number_format($order->products->sum(fn($p) => $p->pivot->price * $p->pivot->quantity), 2) }}</p>
            </div>

            <a href="{{ route('previous.orders') }}" class="btn">View All Orders</a>
        </section>

        <!-- Extra Info Box -->
        <div class="info-rectangle">
            <p>Explore more GCSE revision guides</p>
        </div>

        <div class="button-container">
    <a class="maths" href="{{route('products.category', 2)}}">Maths</a>
    <a class="english" href="{{route('products.category', 1)}}">English</a>
    <a class="science" href="{{route('products.category', 3)}}">Science</a>
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
