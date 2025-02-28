<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Order Confirmation - GradeVault</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>
            /* General Reset */
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
                font-family: Arial, sans-serif;
            }

            html, body {
                height: 100%;
            }

            /* General Body and Page Styling */
            body {
                background-color: #fff;
                color: #333;
                display: flex;
                flex-direction: column;
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
            .bestseller-header {
                text-align: center;
                font-size: 2em;
                color: gold;
                margin-top: 20px;
            }

            .profile-container {
                display: flex;
                justify-content: space-around;
                gap: 20px;
                margin: 40px auto;
                max-width: 1000px;
            }

            .card {
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
                max-width: 300px;
                margin: auto;
                text-align: center;
                font-family: Arial, sans-serif;
                padding: 20px;
                border-radius: 8px;
                background-color: #f9f9f9;
            }

            .card img {
                width: 100%;
                border-radius: 8px;
            }

            .title {
                color: grey;
                font-size: 18px;
                margin: 10px 0;
            }

            button {
                border: none;
                outline: 0;
                display: inline-block;
                padding: 10px;
                color: white;
                background-color: #000;
                text-align: center;
                cursor: pointer;
                width: 100%;
                font-size: 18px;
                border-radius: 5px;
            }

            button:hover {
                opacity: 0.7;
            }

            .modal {
                display: none;
                position: fixed;
                z-index: 1000;
                left: 0;
                top: 0;
                width: 100%;
                height: 100%;
                overflow: auto;
                background-color: rgba(0, 0, 0, 0.5);
                justify-content: center;
                align-items: center;
            }

            .modal-content {
                background-color: white;
                padding: 20px;
                border-radius: 10px;
                max-width: 500px;
                width: 90%;
            }

            .close {
                color: black;
                float: right;
                font-size: 28px;
                font-weight: bold;
                cursor: pointer;
            }

            .close:hover {
                color: red;
            }

            /* Footer Styling */
            .footer {
                background-color: #000;
                color: #fff;
                text-align: center;
                padding: 15px 0;
                margin-top: auto;
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

            /* Tooltip Styling */
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
        <!-- Header Styling -->
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
        <div class="bestseller-header">Math Tutors</div>
        <div class="profile-container">
            <div class="card">
                <img src="{{asset('Images/John.jpeg')}}" alt="John Doe">
                <h1>John Doe</h1>
                <p class="title">Math Tutor</p>
                <p>Harvard University</p>
                <p>Price: £50 Per Hour</p>
                <button onclick="openModal()">Contact</button>
            </div>

            <div class="card">
                <img src="{{asset('Images/Jane.jpg')}}" alt="Jane Harris">
                <h1>Jane Harris</h1>
                <p class="title">Math Tutor</p>
                <p>University of Nottingham</p>
                <p>Price: £30 Per Hour</p>
                <button onclick="openModal()">Contact</button>
            </div>

            <div class="card">
                <img src="{{asset('Images/Annie.jpg')}}" alt="Annie Brown">
                <h1>Annie Brown</h1>
                <p class="title">Math Tutor</p>
                <p>University of Bristol</p>
                <p>Price: £30 Per Hour</p>
                <button onclick="openModal()">Contact</button>
            </div>
        </div>

        <!-- Modal for Contact -->
        <div id="contactModal" class="modal">
            <div class="modal-content">
                <span class="close" onclick="closeModal()">&times;</span>
                <h2>Contact Form</h2>
                <form action="https://formspree.io/f/mdkodzeb" method="POST">
                    <label>
                        Your email:
                        <input type="email" name="email" required>
                    </label>
                    <br><br>
                    <label>
                        Your message:
                        <textarea name="message" required></textarea>
                    </label>
                    <br><br>
                    <button type="submit">Send</button>
                </form>
            </div>
        </div>

        <!-- Footer Styling -->
        <div class="footer">
            <div class="contact-info">
                <p>Contact us</p>
                <p>Telephone: 123-456-7890</p>
                <p>Email: info@gradevault.com</p>
            </div>
            <p>Guard your Grades with GradeVault</p>
        </div>

        <script>
            function openModal() {
                document.getElementById("contactModal").style.display = "flex";
            }

            function closeModal() {
                document.getElementById("contactModal").style.display = "none";
            }

            window.onclick = function(event) {
                const modal = document.getElementById("contactModal");
                if (event.target === modal) {
                    closeModal();
                }
            };

            document.addEventListener("DOMContentLoaded", function () {
                const savedFontSize = localStorage.getItem("pageFontSize");
                const fontToggle = document.getElementById("fontToggle");

                if (savedFontSize === "20px") {
                    document.body.style.fontSize = "20px";
                    fontToggle.checked = true;
                }
            });

            function toggleFontSize() {
                const fontToggle = document.getElementById("fontToggle");
                const isLarge = fontToggle.checked;
                document.body.style.fontSize = isLarge ? "20px" : "16px";
                localStorage.setItem("pageFontSize", isLarge ? "20px" : "16px");
            }
        </script>
    </body>
</html>
