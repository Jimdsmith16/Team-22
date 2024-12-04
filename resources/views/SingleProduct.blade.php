<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Page</title>
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

        .basket-title {
            text-align: center;
            font-size: 2em;
            font-weight: bold;
            margin: 30px 0 20px;
            color: gold;
        }

        .product-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            margin: 20px auto;
            max-width: 800px;
        }

        .product-image {
            flex: 1;
            max-width: 300px;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 10px;
            text-align: center;
        }

        .product-image img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
        }

        .product-details {
            flex: 2;
            display: flex;
            flex-direction: column;
            justify-content: center;
            gap: 15px;
        }

        .product-details h1 {
            font-size: 1.8em;
            color: #333;
        }

        .product-details .price {
            font-size: 1.5em;
            color: #1a73e8;
            font-weight: bold;
        }

        .product-details .description {
            font-size: 1.1em;
            color: #555;
        }

        .product-details button {
            background-color: #1a73e8;
            color: #fff;
            border: none;
            padding: 10px 15px;
            font-size: 1em;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .product-details button:hover {
            background-color: #0c54b0;
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
            <img src="{{asset('Images/GV.png')}}" alt="GradeVault Logo">
        </div>
        <nav>
            <a href="{{url('/')}}">Home</a>
            <a href="{{url('tutor')}}">Tutors</a>
            <a href="{{url('about')}}">About</a>
            <a href="{{url('contact')}}">Contact Us</a>
        @auth
            <a href="{{ url('usersettings') }}">Settings</a>
            @else
            <a href="{{ url('login') }}">Log In / Sign Up</a>
        @endauth
        </nav>
        <div class="search-bar">
            <input type="text" placeholder="Search...">
        </div>
    </div>

    <div class="basket-title">Basket</div>

    <div class="product-container">
        <div class="product-image">
            <img src="{{$product->image_link}}" alt="{{$product->name}}">
        </div>

        <div class="product-details">
            <h1>{{$product->name}}</h1>
            <div class="price">£ {{$product->price}}</div>
            <div class="description">{{$product->description}}</div>
            <button>Buy Now</button>
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
</body>
</html>
