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
    
    /* Layout Styling */
    body {
      background-color: #f5f5f5;
      color: #333;
    }
    
    .header {
      background-color: #000;
      padding: 0 15px;
      height: 60px; /* Set a fixed height for the header */
      color: #fff;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }
    
    .header .logo img {
      height: 50px; /* Adjusted the logo size */
      max-height: 100%; /* Ensures it doesn’t exceed header height */
    }
    
    .header nav a {
      color: #fff;
      text-decoration: none;
      margin: 0 10px;
    }
    
    .search-bar {
      position: relative;
    }
    
    .search-bar input[type="text"] {
      padding: 5px;
      font-size: 1em;
    }
    
    .content {
      max-width: 800px;
      margin: 20px auto;
      padding: 20px;
      background-color: #e7e9fc;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
      border-radius: 10px;
      text-align: center;
    }
    
    .content img {
      max-width: 100%;
      height: auto;
      margin-bottom: 20px; /* Adds space below the image */
    }
    
    .content p {
      margin: 15px 0;
      line-height: 1.6;
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
  </style>
</head>
<body>
  
  <!-- Header Section -->
  <div class="header">
    <div class="logo">
        <a href="index.html">
            <img src="GV.png" alt="GradeVault Logo">
        </a>

       <!-- Replace "GV.png" with your actual logo file path -->
    </div>
    <nav>
      <a href="{{url('/')}}">Home</a>
      <a href="{{url('tutor')}}">Tutors</a>
      <a href="{{url('about')}}">About</a>
      <a href="{{url('contact')}}">Contact Us</a>
      <a href="#">Log In / Sign Up</a>
    </nav>
    <div class="search-bar">
      <input type="text" placeholder="Search...">
    </div>
  </div>

  <!-- Content Section -->
  <div class="content">
    <!-- About Us Image Header -->
      
    <img src="abtLogo.jpg" alt="About Us" style="width: 200px; background-color: #e7e9fc; opacity: 0.9; border-radius: 8px; padding: 5px;">
    
    <p>Welcome to GradeVault!</p>
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
