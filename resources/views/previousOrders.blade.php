<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Previous Orders</title>
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

<header>
    <div class="logo">
        <img src="#" alt="GradeVault Logo">
    </div>
    <nav>
        <a href="{{url('/')}}">Home</a>
        <a href="{{url('tutor')}}">Tutors</a>
        <a href="{{url('about')}}">About</a>
        <a href="{{url('contact')}}">Contact Us</a>
        <a href="{{url('products')}}">Products</a>
        <a href="#">Basket Icon</a>
        <input type="search" placeholder="Search...">
    </nav>
</header>

<main>
    <section class="previous-orders">
        <h2>Previous Orders</h2>

        @foreach($orders as $order)
        <div class="order">
            <a target="_blank" href="{{ $order->image_link }}">
                <img src="{{ $order->image_link }}" alt="Product Image">
            </a>
            <div class="product-details">
                <p>{{$order->name}} ?></p>
                <p>Price: £{{ number_format($order->price,2) }}</p>
                <p>Quantity: {{$order->number_of_stock}}</p>
            </div>
        </div>
        @endforeach

        <div class="totals">
            <p>Total: {{$orders->total_price}}</p>
            <p>Total orders: {{$orders->total_orders}}</p>
        </div>
    </section>
</main>

<footer>
    <p>Contact us</p>
    <p>Telephone</p>
    <p>Email</p>
    <p>Guard your Grades with GradeVault</p>
</footer>

</body>
</html>
