<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation - GradeVault</title>
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

        .confirmation-message {
            text-align: center;
            padding: 40px 15px;
            flex-grow: 1;
        }

        .confirmation-message h1 {
            color: #333;
            font-size: 2em;
            margin-bottom: 10px;
        }

        .confirmation-message p {
            font-size: 1.1em;
            margin-bottom: 20px;
        }

        .order-details {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #d7daeb;
            border: 1px solid #11023f;
            border-radius: 5px;
            text-align: left;
        }

        .order-details h2 {
            color: #333;
            margin-bottom: 15px;
        }

        .order-details p {
            margin: 2px 0;
            line-height: 1.5;
        }
        .info-rectangle {
            width: 80%;
            max-width: 400px;
            margin: 20px auto;
            padding: 40px;
            background-color: #D9E4F5;
            color: #000000;
            text-align: center;
            border-radius: 8px;
            font-size: 1.2em;
            border: 1.5px solid #000;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); 
        }

        .button-container {
            display: flex;
            justify-content: center;
            margin: 20px auto;
            max-width: 800px;
            gap: 50px; /
        }

        .button-container button {
            flex: 1;
            padding: 8% 0;
            font-size: 1.5em; 
            color: #fff;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s;
            background-color: #606297;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        }

        .button-container .maths {
            background-color: #606297;
        }

        .button-container .english {
            background-color: #2D306A;
        }

        .button-container .science {
            background-color: #0E125B;
        }

        .button-container button:hover {
            opacity: 0.85;
        }

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

    <div class="header">
        <div class="logo">
            <a href="index.html">
                <img src="images/GvLogo.png" alt="GradeVault Logo">
            </a>
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

    <div class="confirmation-message">
        <h1>Thank you for your order!</h1>
        <p>Your order has been confirmed! A confirmation email has been sent to your email address.</p>

        <div class="order-details">
            <h2>Order Details</h2>
            <p><strong>Item:</strong> GCSE Maths revision book</p>
            <p><strong>Price:</strong> £20.00</p>
            <p><strong>Order Number:</strong> #123456</p>
            <p><strong>Date:</strong> 14/11/2024</p>
            <p><strong>Shipping Address:</strong> 123 Aston Street B4 8UM</p>
        </div>
    </div>
    <div class="info-rectangle">
        <p>Explore more GCSE revision guides</p>
       </div>

    <div class="button-container">
        <button class="maths">Maths</button>
        <button class="english">English</button>
        <button class="science">Science</button>
    </div>

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
