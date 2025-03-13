<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment - GradeVault</title>
    <style>
      /* General Reset */
      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: Arial, sans-serif;
      }

      /* General Body and Page Styling */
      body {
        background-color: #f9f9f9;
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
        .content {
    max-width: 450px;
    margin: 50px auto;
    padding: 30px;
    background-color: #e7e9fc;
    border-radius: 16px;
    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.15);
    text-align: center;
  }

  .content h1 {
    color: #222;
    font-size: 1.8em;
    font-weight: bold;
    margin-bottom: 10px;
  }

  .content p {
    color: #555;
    font-size: 1.1em;
    margin-bottom: 20px;
  }

  .payment-form {
    background: #fff;
    padding: 20px;
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    display: flex;
    flex-direction: column;
    gap: 15px;
  }

  .input-group {
    position: relative;
    width: 100%;
  }

  .input-group label {
    position: absolute;
    top: 12px;
    left: 12px;
    font-size: 0.9em;
    color: #888;
    transition: 0.3s ease-in-out;
    pointer-events: none;
  }

  .input-group input {
    width: 100%;
    padding: 14px;
    font-size: 1em;
    border: 2px solid #ccc;
    border-radius: 8px;
    outline: none;
    background: transparent;
    transition: border-color 0.3s;
  }

  .input-group input:focus,
  .input-group input:not(:placeholder-shown) {
    border-color: #000;
  }

  .input-group input:focus + label,
  .input-group input:not(:placeholder-shown) + label {
    top: -10px;
    left: 8px;
    font-size: 0.8em;
    background: white;
    padding: 2px 6px;
    color: #000;
    font-weight: bold;
  }

  .payment-form button {
    background: #000;
    color: #fff;
    padding: 14px;
    font-size: 1.2em;
    border: none;
    border-radius: 10px;
    cursor: pointer;
    transition: 0.3s;
  }

  .payment-form button:hover {
    background: #444;
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

footer p {
    margin: 5px 0;
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
    bottom: 60px;
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
    color: #ffffff;
}

.dark-mode .content {
    background-color: #1e1e1e;
    color: #ffffff;
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
            @if(auth()->user()->type === 'admin')
                <a href="{{ url('adminsettings') }}">Settings</a>
            @else
                <a href="{{ url('usersettings') }}">Settings</a>
            @endif
        @else
            <a href="{{ url('login') }}">Login</a>
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
  
<div class="content">
  <h1>Secure Payment</h1>
  <p>Complete your payment to access GradeVault services securely.</p>

  <form action="{{ route('payment.process') }}" method="post" class="payment-form">
    @csrf

    <div class="input-group">
      <input type="text" id="name" name="name" placeholder=" " required>
      <label for="name">Name on Card</label>
    </div>

    <div class="input-group">
      <input type="text" id="card-number" name="card_number" placeholder=" " required>
      <label for="card-number">Card Number</label>
    </div>

    <div class="input-group">
      <input type="month" id="expiry" name="expiry" required>
      <label for="expiry">Expiry Date</label>
    </div>

    <div class="input-group">
      <input type="password" id="cvv" name="cvv" placeholder=" " required>
      <label for="cvv">CVV</label>
    </div>

    <div class="input-group">
      <input type="text" id="amount" name="amount" value="${{ number_format($totalPrice, 2) }}" readonly>
      <label for="amount">Amount</label>
    </div>

    <button type="submit">Make Payment</button>
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
