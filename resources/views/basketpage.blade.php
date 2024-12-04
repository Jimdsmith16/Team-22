<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Basket Page</title>
    <style>
        /* General body styling */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f8ff;
        }

        /* Header styling */
        header {
            background-color: #000;
            color: white;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        header nav {
            display: flex;
            gap: 20px;
            align-items: center;
        }

        header nav a {
            text-decoration: none;
            color: white;
            font-size: 16px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        header nav a:hover {
            text-decoration: underline;
        }

        header .search-box {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        header .search-box input {
            padding: 5px;
            border: none;
            border-radius: 5px;
        }

        header .search-box button {
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            background-color: #ddd;
        }

        /* Logo styling */
        .logo {
            position: absolute;
            top: 10px;
            left: 20px;
            width: 50px;
        }

        /* Basket container styling */
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

        /* Footer styling */
        footer {
            background-color: #000;
            color: white;
            text-align: center;
            padding: 20px;
            margin-top: 30px;
        }
    </style>
</head>
<body>
    <!-- Golden logo in the corner -->
    <img src="logo.png" alt="GV Logo" class="logo">

    <!-- Header -->
    <header>
        <nav>
            <a href="#">Tutors</a>
            <a href="#">About</a>
            <a href="#">Contact us</a>
            <a href="#">
                <!-- Basket Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-basket" viewBox="0 0 16 16">
                    <path d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1v4.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 13.5V9a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h1.217L5.07 1.243a.5.5 0 0 1 .686-.172zM2 9v4.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V9zM1 7v1h14V7z" />
                </svg>
                Basket
            </a>
        </nav>
        <div class="search-box">
            <input type="text" placeholder="Search...">
            <button>🔍</button>
        </div>
    </header>

    <!-- Basket Section -->
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

    <!-- Footer -->
    <footer>
        Contact us: Telephone: <strong>123-456-789</strong> Email: <strong>info@example.com</strong><br>
        Guard your Grades with GradeVault
    </footer>

    <script>
        // Function to update quantity and total
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
