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
    
    html, body {
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
      position: fixed; /* Keeps header at the top */
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

    .content {
      max-width: 800px;
      width: 90%;
      margin: 100px auto 20px; /* Space below the fixed header */
      padding: 20px;
      background-color: #e7e9fc;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
      border-radius: 10px;
      text-align: center;
    }

    .content img {
      max-width: 200px;
      height: auto;
      margin-bottom: 20px;
      background-color: #e7e9fc;
      opacity: 0.9;
      border-radius: 8px;
      padding: 5px;
    }

    .content h2 {
      margin: 20px 0 10px;
      font-size: 1.8em;
      color: #333;
    }

    .content p {
      margin: 15px 0;
      line-height: 1.6;
      font-size: 1em;
    }

    .content ul {
      text-align: left;
      margin: 20px 0;
      padding-left: 20px;
    }

    .content ul li {
      margin-bottom: 10px;
      font-size: 1em;
    }

    /* Footer Styling */
    .footer {
      background-color: #000;
      color: #fff;
      text-align: center;
      padding: 15px 0;
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
    <nav>
      <a href="{{url('/')}}">Home</a>
      <a href="{{url('tutor')}}">Tutors</a>
      <a href="{{url('about')}}">About</a>
      <a href="{{url('contact')}}">Contact Us</a>
      <a href="{{url('products')}}">Products</a>
      @auth
        <a href="{{ url('usersettings') }}">Settings</a>
      @else
        <a href="{{ url('login') }}">Log In / Sign Up</a>
      @endauth
    </nav>
    <div class="search-bar">
      <form action="{{route('products.search')}}" method="GET">
        <input type="text" name="search" placeholder="Search Products...">
        <button type="submit">Search</button>
      </form>
    </div>
  </div>

  <!-- Content Section -->
  <div class="content">
    <!-- About Us Image Header -->
    <img src="{{asset('Images/abtLogo.jpg')}}" alt="About Us">
    
    <p style="font-weight: bold; font-size: 1.5em;">Welcome to GradeVault!</p>
    <p>At GradeVault, we understand that your academic journey is unique and challenging. That's why we've built a platform that not only provides support but also protects your hard-earned achievements. Whether you're aiming to excel in GCSEs, A-Levels, or looking for top-notch tutors to help you master complex subjects, GradeVault is here to back you every step of the way.</p>
    
    <h2>Who We Are</h2>
    <p>We are a dedicated team of educators, technologists, and academic advisors committed to empowering students to reach their full potential. GradeVault combines innovative technology with expert guidance to create a safe, structured, and supportive environment for students to thrive.</p>

    <h2>Our Mission</h2>
    <p>Our mission is simple: to be your academic partner. We aim to help students excel academically by providing easy access to quality tutors, study resources, and personalized grade tracking. We believe that every student deserves the chance to succeed and that proper support can make all the difference.</p>

    <h2>Why Choose GradeVault?</h2>
    <ul>
      <li>Expert Tutors: Access a network of experienced tutors specializing in GCSE and A-Level subjects.</li>
      <li>Personalized Support: Tailored study plans and resources to match your goals and learning style.</li>
      <li>Community & Collaboration: Join a community of motivated students and educators who share the same drive for success.</li>
    </ul>

    <p>Join Us on the Journey to Academic Success!</p>
    <p>At GradeVault, we don’t just help you with grades; we help you build a brighter future. Ready to start your journey with us? Explore our tutoring options, sign up for personalized grade tracking, or contact us to learn more.</p>
    
    <p><strong>Guard your Grades with GradeVault – Because Your Success Matters!</strong></p>
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
