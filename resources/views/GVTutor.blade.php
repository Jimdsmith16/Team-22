<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation - GradeVault</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background-color: #fff;
            color: #333;
        }

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

        footer {
            background-color: black;
            color: white;
            text-align: center;
            padding: 10px;
            width: 100%;
            margin-top: auto;
        }

        footer p {
            margin: 5px 0;
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="logo">
            <img src="{{asset('Images/GV.png')}}" alt="GradeVault Logo">
        </div>
        <nav>
            <a href="{{url('/')}}">Home</a>
            <a href="{{url('tutor')}}">Tutors</a>
            <a href="{{url('about')}}">About</a>
            <a href="{{url('contact')}}">Contact Us</a>
            <a href="{{url('products')}}">Products</a>
            <a href="#">Log In / Sign Up</a>
        </nav>
        <div class="search-bar">
            <input type="text" placeholder="Search...">
        </div>
    </div>

    <div class="bestseller-header">Math Tutors</div>

    <div class="profile-container">
        <div class="card">
            <img src="{{asset('Images/John.jpeg')}}" alt="John Doe">
            <h1>John Doe</h1>
            <p class="title">Math Tutor</p>
            <p>Harvard University</p>
            <button onclick="openModal()">Contact</button>
        </div>

        <div class="card">
            <img src="{{asset('Images/Jane.jpg')}}" alt="Jane Harris">
            <h1>Jane Harris</h1>
            <p class="title">Math Tutor</p>
            <p>University of Nottingham</p>
            <button onclick="openModal()">Contact</button>
        </div>

        <div class="card">
            <img src="{{asset('Images/Annie.jpg')}}" alt="Annie Brown">
            <h1>Annie Brown</h1>
            <p class="title">Math Tutor</p>
            <p>University of Bristol</p>
            <button onclick="openModal()">Contact</button>
        </div>
    </div>
    <div class="bestseller-header">English Tutors</div>

    <div class="profile-container">
        <div class="card">
            <img src="{{asset('Images/John.jpeg')}}" alt="John Doe">
            <h1>John Doe</h1>
            <p class="title">English tutor</p>
            <p>Harvard University</p>
            <button onclick="openModal()">Contact</button>
        </div>

        <div class="card">
            <img src="{{asset('Images/Jane.jpg')}}" alt="Jane Harris">
            <h1>Jane Harris</h1>
            <p class="title">English tutor</p>
            <p>University of Nottingham</p>
            <button onclick="openModal()">Contact</button>
        </div>

        <div class="card">
            <img src="{{asset('Images/Annie.jpg')}}" alt="Annie Brown">
            <h1>Annie Brown</h1>
            <p class="title">English Tutor</p>
            <p>University of Bristol</p>
            <button onclick="openModal()">Contact</button>
        </div>
    </div>
    <div class="bestseller-header">Science Tutors</div>

    <div class="profile-container">
        <div class="card">
            <img src="{{asset('Images/John.jpeg')}}" alt="John Doe">
            <h1>John Doe</h1>
            <p class="title">Science Tutor</p>
            <p>Harvard University</p>
            <button onclick="openModal()">Contact</button>
        </div>

        <div class="card">
            <img src="{{asset('Images/Jane.jpg')}}" alt="Jane Harris">
            <h1>Jane Harris</h1>
            <p class="title">Science Tutor</p>
            <p>University of Nottingham</p>
            <button onclick="openModal()">Contact</button>
        </div>

        <div class="card">
            <img src="{{asset('Images/Annie.jpg')}}" alt="Annie Brown">
            <h1>Annie Brown</h1>
            <p class="title">Science Tutor </p>
            <p>University of Bristol</p>
            <button onclick="openModal()">Contact</button>
        </div>
    </div>

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

    <footer>
        <p>Contact us</p>
        <p>Telephone: 0788635240</p>
        <p>Email: GradeVault@gmail.com</p>
        <p>Guard your Grades with GradeVault</p>
    </footer>
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
    </script>
</body>
</html>
