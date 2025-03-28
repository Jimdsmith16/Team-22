<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GradeVault</title>
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
        .bestseller-header {
            text-align: center;
            font-size: 2em;
            color: gold;
            margin-top: 20px;
        }

        .slideshow-container {
            max-width: 800px;
            position: relative;
            margin: 20px auto;
        }

        .slideshow-container img {
            width: 100%;
            height: auto;
        }

        .prev,
        .next {
            cursor: pointer;
            position: absolute;
            top: 50%;
            width: auto;
            padding: 16px;
            margin-top: -22px;
            color: white;
            font-weight: bold;
            font-size: 18px;
            transition: 0.6s ease;
            border-radius: 0 3px 3px 0;
            user-select: none;
        }

        .next {
            right: 0;
            border-radius: 3px 0 0 3px;
        }

        .prev:hover,
        .next:hover {
            background-color: #f1f1f1;
            color: black;
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
        .ratings-container {
            display: flex;
            justify-content: space-around;
            gap: 20px;
            margin: 40px auto;
            max-width: 800px;
        }

        .review-box {
            background-color: #ffffff;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 20px;
            max-width: 350px;
            flex: 1;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .review-box .stars {
            color: gold;
            font-size: 1.5em;
            margin-bottom: 10px;
        }

        .review-box .review-text {
            font-size: 1em;
            color: #333;
            margin: 10px 0;
        }

        .review-box .review-author {
            font-style: italic;
            color: #666;
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

        /* Switch styling */
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
    <div class="bestseller-header">Bestsellers</div>

    <div class="slideshow-container">
        <div class="mySlides1">
            <img src="{{asset('Images/English.png')}}" alt="English Language">
        </div>

        <div class="mySlides1">
            <img src="{{asset('Images/Science.png')}}" alt="Combined Science">
        </div>

        <div class="mySlides1">
            <img src="{{asset('Images/Maths.png')}}" alt="Maths">
        </div>
    </div>

    <div class="info-rectangle">
        <p>GCSE REVISION</p>
        <p>Key Stage 4 Revision Guides</p>
    </div>

    <div class="button-container">
        <a class="maths" href="{{route('products.category', 2)}}">Maths</a>
        <a class="english" href="{{route('products.category', 1)}}">English</a>
        <a class="science" href="{{route('products.category', 3)}}">Science</a>
    </div>

    <div class="ratings-container">
        <div class="review-box">
            <div class="stars">★★★★☆</div>
            <p class="review-text">"Super easy to use and had every book I was looking for!"</p>
            <p class="review-author">- Alex P.</p>
        </div>
        <div class="review-box">
            <div class="stars">★★★★★</div>
            <p class="review-text">"Good resources and the tutor system was perfect for what my daughter needed."</p>
            <p class="review-author">- James L.</p>
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
    let slideIndex = 0;
    const slides = document.querySelectorAll(".mySlides1");
    
    function showSlides() {
        slides.forEach((slide, index) => {
            slide.style.display = "none";
        });

        slideIndex++;
        if (slideIndex > slides.length) {
            slideIndex = 1;
        }

        slides[slideIndex - 1].style.display = "block";
        setTimeout(showSlides, 3000); // Change slide every 3 seconds
    }

    showSlides();
});
    
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
