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
        position: fixed; /* Fixed to the top */
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
        margin: 100px auto 20px; /* Push content below the fixed navbar */
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
        flex-wrap: wrap;
      }

      .footer .contact-info p {
        margin: 0;
        font-size: 0.9em;
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
          width: 95%;
        }
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
          <a href="{{ url('usersettings') }}">Settings</a>
        @else
          <a href="{{ url('login') }}">Log In / Sign Up</a>
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

  </body>
</html>
