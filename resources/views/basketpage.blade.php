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

/* General Page Styling */
body {
    background-color: #fff; /* Keeping the background white */
    color: #333;
}

/* Header Styling */
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
    color: #cdaf06; /* Gold hover effect */
}

.search-bar input[type="text"] {
    padding: 5px;
    font-size: 1em;
}

/* Basket Container */
.basket-container {
    margin: 30px auto;
    padding: 20px;
    background-color: #fff; /* Keeping the basket background white */
    width: 80%;
    max-width: 800px;
    border: 1.5px solid #000;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    text-align: center;
}

/* Basket Title */
.basket-title {
    background-color: #000; /* Black header */
    color: #cdaf06; /* Gold text */
    padding: 12px;
    font-size: 2em;
    font-weight: bold;
    border-radius: 8px;
    margin-bottom: 20px;
}

/* Item Title */
.item-title {
    background-color: #000; /* Black title bar */
    color: #cdaf06;
    padding: 8px;
    border-radius: 5px;
    margin-bottom: 15px;
    display: inline-block;
    font-weight: bold;
    font-size: 1.2em;
}

/* Basket Item */
.basket-item {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 30px;
    margin: 20px 0;
    background-color: #fff; /* Keeping item area white */
    padding: 15px;
    border-radius: 8px;
    border: 1.5px solid #000;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}

.basket-item img {
    max-width: 100px;
    border-radius: 5px;
}

/* Price and Quantity Styling */
.price-quantity-container {
    display: flex;
    flex-direction: column;
    align-items: center;
    background-color: #000; /* Black background */
    color: #cdaf06; /* Gold text */
    padding: 12px;
    border-radius: 8px;
    font-size: 1.2em;
    font-weight: bold;
}

/* Quantity Controls */
.quantity-control {
    display: flex;
    align-items: center;
    gap: 12px;
    margin-top: 10px;
}

.quantity-control button {
    background-color: #000;
    border: 1px solid #cdaf06;
    border-radius: 5px;
    padding: 6px 14px;
    font-size: 1.1em;
    cursor: pointer;
    font-weight: bold;
    color: #cdaf06;
    transition: background-color 0.3s ease, color 0.3s ease;
}

.quantity-control button:hover {
    background-color: #cdaf06;
    color: #000;
}

/* Total Section */
.total-section {
    background-color: #000;
    color: #cdaf06;
    padding: 14px;
    border-radius: 8px;
    display: inline-block;
    margin-top: 20px;
    font-size: 1.4em;
    font-weight: bold;
}

/* Checkout Button */
.checkout-button {
    margin-top: 20px;
    padding: 14px 30px;
    background-color: #d3bd40; /* Gold button */
    color: #000;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    font-size: 1.4em;
    font-weight: bold;
    transition: background-color 0.3s ease, color 0.3s ease;
    box-shadow: 0 4px 8px rgba(255, 215, 0, 0.3);
}

.checkout-button:hover {
    background-color: #000;
    color: #cdaf06;
    border: 1.5px solid #cdaf06;
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
