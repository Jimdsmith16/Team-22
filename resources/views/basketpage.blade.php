<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Basket Page</title>
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

        .basket-container {
            margin: 30px auto;
            padding: 20px;
            background-color: #e9ecfe;
            width: 80%;
            max-width: 1000px;
            border: 2px solid #c6c38e;
            border-radius: 10px;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .basket-title {
            background-color: #b3c6ff;
            padding: 10px;
            font-size: 24px;
            font-weight: bold;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .item-title {
            background-color: #b3c6ff;
            padding: 5px 10px;
            border-radius: 5px;
            margin-bottom: 10px;
            display: inline-block;
        }

        .basket-item {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 30px;
            margin: 20px 0;
        }

        .basket-item img {
            max-width: 100px;
            border-radius: 5px;
        }

        .price-quantity-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            background-color: #b3c6ff;
            padding: 10px;
            border-radius: 5px;
        }

        .quantity-control {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-top: 10px;
        }

        .quantity-control button {
            background-color: #ddd;
            border: none;
            border-radius: 5px;
            padding: 5px 10px;
            font-size: 14px;
            cursor: pointer;
        }

        .total-section {
            background-color: #b3c6ff;
            padding: 10px;
            border-radius: 5px;
            display: inline-block;
            margin-top: 20px;
            font-size: 18px;
            font-weight: bold;
        }

        .checkout-button {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #4a90e2;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        .checkout-button:hover {
            background-color: #357abd;
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

    <div class="basket-container">
        <div class="basket-title">Basket</div>

        <div class="item-title">Title</div>

        <div class="basket-item">
            <img src="product.jpg" alt="Product Image">
            <div>'Maths GCSE Revision Book'</div>
            <div class="price-quantity-container">
                <div>Price - £10</div>
                <div class="quantity-control">
                    <button onclick="updateQuantity(-1, this)">-</button>
                    <span>1</span>
                    <button onclick="updateQuantity(1, this)">+</button>
                </div>
            </div>
        </div>

        <div class="total-section">Total = £10.00</div>
        <button class="checkout-button">Proceed to Checkout ➤</button>
    </div>
    
  <div class="footer">
    <div class="contact-info">
      <p>Contact us</p>
      <p>Telephone: 123-456-7890</p>
      <p>Email: info@gradevault.com</p>
    </div>
    <p>Guard your Grades with GradeVault</p>
  </div>

    <script>
        function updateQuantity(change, button) {
            const quantitySpan = button.parentElement.querySelector('span');
            const totalSpan = document.querySelector('.total-section');

            let quantity = parseInt(quantitySpan.textContent);
            quantity = Math.max(1, quantity + change); // Prevent quantity from going below 1
            quantitySpan.textContent = quantity;

            const total = quantity * 10; // Assuming price is £10
            totalSpan.textContent = `Total = £${total.toFixed(2)}`;
        }
    </script>
</body>
</html>
