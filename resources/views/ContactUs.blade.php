<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact Us - GradeVault</title>
  <style>
    /* General Reset */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: Arial, sans-serif;
    }

    /* General Page and Body Styling */
    html, body {
    height: 100%;
    display: flex;
    flex-direction: column;
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

    /* Content Styling */
    .content {
      max-width: 800px;
      width: 90%;
      margin: 100px auto 20px;
      /* Push content below the fixed navbar */
      padding: 20px;
      background-color: #e7e9fc;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
      border-radius: 10px;
    }

    .content h2 {
      text-align: center;
      margin-bottom: 20px;
      font-size: 1.8em;
    }

    .content form {
      display: flex;
      flex-direction: column;
      gap: 15px;
    }

    .content form input,
    .content form textarea,
    .content form button {
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
      font-size: 1em;
      width: 100%;
    }

    .content form button {
      background-color: #000;
      color: #fff;
      cursor: pointer;
      border: none;
    }

    .content form button:hover {
      background-color: #333;
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
    bottom: 80px; /* Adjust the distance from the footer */
    left: 690px;
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


    /* Responsive Design */
    @media (max-width: 768px) {
      .header nav {
        flex-wrap: wrap;
        justify-content: center;
      }

      .footer .contact-info {
        flex-direction: column;
        text-align: center;
      }

      .content {
        flex: 1;
      }
    }
    .basket-container {
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
    <div class="basket-container">
            @auth
            <div class="basket-icon">
                <a href="{{ url('basket') }}">
                    🛒
                </a>
            </div>
            @endauth

            <!-- Header Search Bar -->
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
  <div class="content">
    <h2>Contact Us</h2>
    <form action="https://formspree.io/f/xldenewb" method="post">
      <input type="text" name="name" placeholder="Your Name" required>
      <input type="email" name="email" placeholder="Your Email" required>
      <input type="text" name="subject" placeholder="Subject" required>
      <textarea name="message" rows="6" placeholder="Your Message" required></textarea>
      <button type="submit">Send Message</button>
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