<<<<<<< Updated upstream
  <!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>About Us - GradeVault</title>
      
      <style>
          /* General Reset */
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

          /* Content Styling */
          .content {
              max-width: 800px;
              width: 90%;
              margin: 120px auto 20px;
              padding: 30px;
              background-color: #e7e9fc;
              box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
              border-radius: 10px;
              text-align: center;
              font-size: 1.1em;
          }

          .content img {
              width: 80%; /* Adjust the width of the image */
              max-width: 400px; /* Set a maximum width */
              height: auto; /* Maintain aspect ratio */
              margin-bottom: 20px; /* Add some space below the image */
          }

          h2 {
              margin-top: 30px;
              margin-bottom: 15px;
          }

          p {
              margin-bottom: 20px;
          }

          /* Frequently Asked Questions Styling */
          .faq {
              margin-top: 30px;
              text-align: center;
          }

          .faq-question {
              font-size: 1.2em;
              font-weight: bold;
              margin-top: 15px;
              text-align: center;
          }

          .faq-answer {
              padding: 10px 0;
              font-size: 1em;
              text-align: center;
          }

        /* Footer Styling */
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

          .tooltip {
              position: relative;
              
          }
          .font-toggle-container {
    position: fixed;
    right: 17px;
    bottom: 28px;
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
          <a href="/"> <img src="{{asset('Images/GV.png')}}" alt="GradeVault Logo"></a>
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
      <div class="content">
          <img src="{{asset('Images/abtLogo.jpg')}}" alt="About Us">
          <p style="font-weight: bold; font-size: 1.5em;">Welcome to GradeVault!</p>
          <p>At GradeVault, we understand that your academic journey is unique and challenging. That's why we've built a
              platform that not only provides support but also protects your hard-earned achievements. Whether you're aiming to
              excel in GCSEs, A-Levels, or looking for top-notch tutors to help you master complex subjects, GradeVault is here
              to back you every step of the way.</p>

          <h2>Who We Are</h2>
          <p>We are a dedicated team of educators, technologists, and academic advisors committed to empowering students to
              reach their full potential. GradeVault combines innovative technology with expert guidance to create a safe,
              structured, and supportive environment for students to thrive.</p>

          <h2>Our Mission</h2>
          <p>Our mission is simple: to be your academic partner. We aim to help students excel academically by providing easy
              access to quality tutors and study resources. We believe that every student deserves the chance to succeed and that
              proper support can make all the difference.</p>

          <h2>Why Choose GradeVault?</h2>
          <ul>
              <li>Expert Tutors: Access a network of experienced tutors specializing in GCSE and A-Level subjects.</li>
              <li>Community & Collaboration: Join a community of motivated students and educators who share the same drive for
                  success.</li>
          </ul>

          <h2>Frequently Asked Questions</h2>
          <div class="faq">
              <p class="faq-question">What subjects do your tutors cover?</p>
              <p class="faq-answer">Our tutors specialize in the core GCSE subjects including Mathematics, Science, and English.</p>

              <p class="faq-question">How do I sign up for tutoring?</p>
              <p class="faq-answer">Signing up is easy! Simply create an account, browse our list of available tutors, and
                  schedule a session that fits your needs.</p>

              <p class="faq-question">How can I view my order history?</p>
              <p class="faq-answer">Once you have logged in, simply go to your profile and navigate to the previous order page.</p>
          </div>
      </div>

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
