<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Basket Page</title>
        <style>

      /* General Reset */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: Arial, sans-serif;
    }

    html, body {
    height: auto;
    min-height: 100vh;
    display: block;
}


.main-content {
    flex: 1;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: flex-start; /* Ensure content grows downward */
    width: 70%;
    padding-top: 80px; /* Space for fixed header */
    padding-bottom: 100px; /* Space for footer */
}


    body {
      background-color: #f5f5f5;
      color: #333;
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
    }

    .search-bar input[type="text"] {
      padding: 5px;
      font-size: 1em;
    }
    .basket-container {
    width: 60%;
    max-width: 800px;
    background-color: #ffffff;
    padding: 20px;
    border: 1.5px solid #4682B4;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    text-align: center;
    overflow: hidden;
}

        .basket-title {
            background-color: #59a7d5;
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
            .basket-item {
    display: flex;
    justify-content: space-between;
    align-items: center; /* Centers items vertically */
    text-align: center; /* Centers text inside elements */
    gap: 20px;
    margin: 20px 0;
    padding: 15px;
    border-radius: 8px;
    border: 1.5px solid #4682B4;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    text-align: center; /* Ensures text aligns properly */
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
                padding: 20px;
                border-radius: 8px;
                font-size: 1.2em;
                font-weight: bold;
                gap: 10px;
                white-space: nowrap; /* Prevents text from wrapping */
                min-width: 160px;   
            }

              /* Quantity Controls */
        .quantity-control {
            display: flex;
            align-items: center;
            gap: 10px;
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
            transition: background-color 0.3s ease;
        }

        .quantity-control button:hover {
            background-color: #649fcf;
        }
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
        }


        .checkout-button:hover {
            background-color: #1a6ab9;
        }

        .footer {
    position: fixed;
    bottom: 0;
    left: 0;
    width: 100%;
    background-color: #000;
    color: #fff;
    text-align: center;
    padding: 15px 0;
}
        .footer .contact-info {
            display: flex;
            justify-content: center;
            gap: 20px;
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
    bottom: 60px; /* Adjust the distance from the footer */
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
    color: #ffffff;
}

/* Header */
.dark-mode .header {
    background-color: #1a1a1a;
}

.dark-mode .header nav a {
    color: #ffffff;
}

/* Basket Container */
.dark-mode .basket-container {
    background-color: #1e1e1e;
    border-color: #3a3a3a;
}

.dark-mode .basket-title {
    background-color: #3b82f6;
}

/* Basket Items */
.dark-mode .basket-item {
    background-color: #252525;
    border-color: #3a3a3a;
}

.dark-mode .basket-item img {
    border: 1px solid #ffffff;
}

/* Price & Quantity */
.dark-mode .price-quantity-container {
    background-color: #3b82f6;
}

/* Buttons */
.dark-mode .quantity-control button {
    background-color: #3b82f6;
    border-color: #ffffff;
}

.dark-mode .quantity-control button:hover {
    background-color: #649fcf;
}

/* Total & Checkout */
.dark-mode .total-section {
    background-color: #3b82f6;
}

.dark-mode .checkout-button {
    background-color: #2563eb;
}

.dark-mode .checkout-button:hover {
    background-color: #1a6ab9;
}

/* Footer */
.dark-mode .footer {
    background-color: #1a1a1a;
}

/* Search Bar */
.dark-mode .search-bar input {
    background-color: #333;
    color: #fff;
    border: 1px solid #fff;
}

/* Dark Mode Toggle Button */
.dark-mode .dark-mode-button {
    background-color: #444;
    color: white;
}


.basket-search-container {
    display: flex;
    align-items: center;
    gap: 10px; /* Adjust spacing */
}

.basket-icon a {
    font-size: 24px; /* Adjust icon size */
    text-decoration: none;
}
        </style>
    </head>
    <body>
       <!-- Header Section -->
<div class="header">
    <div class="logo">
        <a href="/"> <img src="{{ asset('Images/GV.png') }}" alt="GradeVault Logo"></a>
    </div>
    <!-- Header Navigation Bar -->
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
    <div class="basket-search-container">
        @auth
            <div class="basket-icon">
                <a href="{{ url('basket') }}">🛒</a>
            </div>
        @endauth

        <!-- Header Search Bar -->
        <div class="search-bar">
            <form action="{{ route('products.search') }}" method="GET">
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
            <form action="{{ route('checkout.page') }}" method="GET">
                @csrf
                <button type="submit" class="checkout-button">Proceed to Checkout ➤</button>
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
