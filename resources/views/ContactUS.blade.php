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

    /* Layout Styling */
html, body {
  height: 100%; /* Ensure the body and html take full height */
  display: flex;
  flex-direction: column;
}

body {
  background-color: #f5f5f5;
  color: #333;
}

/* Content Styling */
.content {
  flex: 1; /* Makes the content take up the available space */
  width: 100%; /* Ensures the content stretches to fill the container */
  max-width: 800px; /* Limits the width for better readability */
  margin: 20px auto; /* Centers the content horizontally */
  padding: 20px;
  background-color: #e7e9fc;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
  border-radius: 10px;
}

/* Footer Styling */
.footer {
  background-color: #000;
  color: #fff;
  text-align: center;
  padding: 15px 0;
  margin-top: 20px;
}

    
    /* Layout Styling */
    body {
      background-color: #f5f5f5;
      color: #333;
    }
    
    .header {
      background-color: #000;
      padding: 0 15px;
      height: 60px;
      color: #fff;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }
    
    .header .logo img {
      height: 50px;
      max-height: 100%;
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
    }
    
    .content h2 {
      text-align: center;
      margin-bottom: 20px;
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
    </div>
    <nav>
      <a href="#">Tutors</a>
      <a href="AboutUs.blade.php">About</a>
      <a href="#">Contact Us</a>
      <a href="#">Log In / Sign Up</a>
    </nav>
    <div class="search-bar">
      <input type="text" placeholder="Search...">
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
