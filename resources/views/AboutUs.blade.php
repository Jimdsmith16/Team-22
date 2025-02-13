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

      .content {
        max-width: 800px;
        width: 90%;
        margin: 120px auto 20px;
        padding: 30px;
        background-color: #e7e9fc;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        border-radius: 10px;
        text-align: center;
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

      footer {
        background-color: black;
        color: white;
        text-align: center;
        padding: 10px;
        width: 100%;
        margin-top: 40px;
      }

      footer p {
        margin: 5px 0;
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

      input:checked+.slider {
        background-color: #878686;
      }

      input:checked+.slider:before {
        transform: translateX(24px);
      }

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
        <div class="tooltip">
          <label class="switch">
            <input type="checkbox" id="fontToggle" onchange="toggleFontSize()">
            <span class="slider round"></span>
          </label>
          <span class="tooltip-text">Toggle Font Size</span>
        </div>
      </nav>
      <!-- Search Bar -->
      <div class="search-bar">
        <form action="{{route('products.search')}}" method="GET">
          <input type="text" name="search" placeholder="Search Products...">
          <button type="submit">Search</button>
        </form>
      </div>
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
        access to quality tutors, study resources. We believe that every student deserves the chance to succeed and that
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
        <p class="faq-answer">Our tutors specialize in the core GCSE subjects including Mathematics, Science, English.</p>

        <p class="faq-question">How do I sign up for tutoring?</p>
        <p class="faq-answer">Signing up is easy! Simply create an account, browse our list of available tutors, and
          schedule a session that fits your needs.</p>

        <p class="faq-question">How can I view my order history?</p>
        <p class="faq-answer">Once you have logged in simply go to your profile and naviagte to the previous order page
        </p>
      </div>
    </div>

    <footer>
      <p>Contact us</p>
      <p>Telephone: 0788635240</p>
      <p>Email: GradeVault@gmail.com</p>
      <p>Guard your Grades with GradeVault</p>
    </footer>

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
    </script>
  </body>
</html>