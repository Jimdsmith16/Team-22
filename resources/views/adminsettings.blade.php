<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>GradeVault Admin Settings</title>
    <style>
        /* Global Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            margin: 0;
            padding: 0;
            min-height: 100vh;
        }

        /* Header & Navigation */
        .header {
            background-color: #000;
            padding: 0 15px;
            height: 60px;
            color: #fff;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 10;
        }

        .header .logo img {
            height: 50px;
        }

        nav {
            display: flex;
            justify-content: space-between;
            width: 100%;
        }

        .nav-links {
            display: flex;
            justify-content: center;
            flex-grow: 1;
            gap: 20px;
        }

        .nav-links a {
            color: #fff;
            text-decoration: none;
            margin: 0 10px;
            transition: color 0.3s ease;
        }

        .nav-links a:hover {
            color: gold;
        }

        .admin-info {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .admin-info a {
            color: #fff;
            text-decoration: none;
        }

        nav ion-icon {
            font-size: 25px;
            color: #ffffff;
        }

        .grid-container {
            margin-top: 60px;
            height: calc(100vh - 60px);
        }

        .sidebar {
            background-color: #f0f0f0;
            box-shadow: 0 10px 10px rgba(0, 0, 0, 0.2);
            display: flex;
            flex-direction: column;
            align-items: center;
            padding-top: 20px;
            position: fixed;
            top: 60px;
            left: 0;
            width: 250px;
            height: calc(100vh - 60px);
            overflow-y: auto;
            z-index: 5;
        }

        .sidebar a {
            text-align: center;
            color: #000000;
            text-decoration: none;
            padding: 22px 0;
            width: 100%;
            font-size: 18px;
            transition: color 0.3s;
        }

        .sidebar a ion-icon {
            font-size: 24px;
            vertical-align: middle;
        }

        .sidebar a.active {
            color: #02e652;
        }

        .main-admin-content {
            padding: 20px;
            display: flex;
            flex-direction: column;
            overflow-y: auto;
            margin-left: 250px;
            height: calc(100vh - 60px);
        }

        .section-content {
            display: none;
        }

        .box {
            width: 400px;
            height: 100px;
            background-color: #f5f5f5;
            border: 2px solid #000;
            border-radius: 8px;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            justify-content: center;
            padding-left: 20px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
            position: relative;
        }

        .box span {
            font-size: 16px;
            font-weight: bold;
            color: #333;
            margin: 5px;
        }

        .password-container {
            padding: 20px;
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .password-container header {
            margin-bottom: 20px;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .password-container h2 {
            font-size: 1.5rem;
            color: #333333;
            margin: 0;
            padding: 0;
        }

        .password-container p {
            font-size: 0.9rem;
            color: #666666;
            margin: 0;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            margin-bottom: 15px;
            gap: 8px;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 12px;
            font-size: 0.9rem;
            border: 1px solid #cccccc;
            border-radius: 12px;
            box-sizing: border-box;
            transition: border 0.3s ease;
        }

        .form-group input:focus,
        .form-group textarea:focus {
            border-color: #02e652;
            outline: none;
        }

        .form-group textarea {
            height: 150px;
            resize: none;
        }

        .submit-button,
        .submit-button1 {
            width: 100%;
            padding: 12px;
            background-color: rgb(0, 0, 0);
            color: #ffffff;
            border: none;
            border-radius: 12px;
            transition: background-color 0.3s ease, color 0.3s ease;
            font-size: 0.9rem;
            cursor: pointer;
            margin-bottom: 20px;
        }

        .submit-button:hover,
        .submit-button1:hover {
            background-color: gold;
            color: #000000;
        }

        @media (max-width: 768px) {
            .grid-container {
                margin-top: 60px;
            }

            .sidebar {
                width: 60px;
            }

            .sidebar a {
                font-size: 12px;
                padding: 15px 10px;
            }

            .main-admin-content {
                margin-left: 60px;
            }
        }

        /* User Management Styles */
        .user-list {
            display: flex;
            flex-direction: column;
            gap: 15px;
            margin-top: 20px;
        }

        .user-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px;
            border-radius: 12px;
            background-color: #f9f9f9;
            border: 1px solid #ddd;
        }

        .user-info p {
            margin: 5px 0;
        }

        .user-actions {
            display: flex;
            gap: 10px;
            align-items: center;
        }

        .user-actions form {
            display: flex;
            gap: 5px;
            align-items: center;
        }

        .user-actions input {
            padding: 8px;
            font-size: 0.9rem;
            border: 1px solid #ccc;
            border-radius: 8px;
        }

        .delete-button-user {
            width: 100%;
            padding: 12px;
            background-color: #000000;
            color: #ffffff;
            border: none;
            border-radius: 12px;
            transition: background-color 0.3s ease, color 0.3s ease;
            font-size: 0.9rem;
            cursor: pointer;
            margin-bottom: 20px;
        }

        .delete-button-user:hover {
            background-color: gold;
            color: #000000;
        }

        /* Inventory Styles */
        #inventory {
            padding: 20px;
            background-color: #f4f4f4;
            border-radius: 8px;
            margin-top: 20px;
        }

        .admin-dashboard-boxes {
            margin-bottom: 20px;
        }

        .dashboard-box-container {
            display: flex;
            justify-content: space-between;
            gap: 20px;
            margin-bottom: 20px;
        }

        .dashboard-box {
            flex: 1;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            border: 2px solid black;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        .dashboard-box h4 {
            margin: 0 0 10px;
            font-size: 20px;
        }

        .dashboard-box p {
            font-size: 18px;
            font-weight: bold;
            color: rgb(7, 212, 68);
        }

        #inventory h3 {
            font-size: 24px;
            margin-bottom: 20px;
            text-align: center;
        }

        .product-list {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
        }

        @media (max-width: 768px) {
            .product-list {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 480px) {
            .product-list {
                grid-template-columns: 1fr;
            }
        }

        .product-item {
            background-color: #ffffff;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            min-height: 350px;
        }

        #inventory .product-item .product-image {
            text-align: center;
        }

        #inventory .product-item .product-image img {
            width: 150px;
            height: auto;
        }

        #inventory .product-item .hidden-edit-form {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
            z-index: 1000;
        }

        #inventory .product-item .hidden-edit-form .modal-content {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            width: 450px;
            max-width: 90%;
            max-height: 80%;
            position: relative;
            overflow-y: auto;
            box-sizing: border-box;
        }

        #inventory .product-item .hidden-edit-form .modal-content .close-button {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 30px;
            font-weight: bold;
            cursor: pointer;
        }

        #inventory .product-item .hidden-edit-form .product-field {
            margin-bottom: 15px;
        }

        #inventory .product-item .hidden-edit-form .product-field label {
            font-weight: bold;
            margin-bottom: 5px;
            display: block;
        }

        #inventory .product-item .hidden-edit-form .product-field input,
        #inventory .product-item .hidden-edit-form .product-field textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .submit-button1 {
            width: 100%;
            padding: 12px;
            background-color: #000000;
            color: #ffffff;
            border: none;
            border-radius: 12px;
            transition: background-color 0.3s ease, color 0.3s ease;
            font-size: 0.9rem;
            cursor: pointer;
        }

        .submit-button1:hover {
            background-color: gold;
            color: #000000;
        }

        .delete-button-product {
            width: 100%;
            padding: 12px;
            background-color: rgb(211, 47, 47);
            color: #ffffff;
            border: none;
            border-radius: 12px;
            transition: background-color 0.3s ease, color 0.3s ease;
            font-size: 0.9rem;
            cursor: pointer;
            margin-bottom: 20px;
        }

        .delete-button-product:hover {
            background-color: gold;
            color: #000000;
        }

        /* Stock Management Styles */
        #stock-requests-section {
            padding: 20px;
            margin-top: 10px;
            margin-bottom: 50px;
        }

        #stock-requests-section h1 {
            font-size: 25px;
            color: #222;
            margin-bottom: 20px;
            font-weight: 600;
            border-bottom: 2px solid rgb(0, 0, 0);
            padding-bottom: 10px;
            text-align: center;
        }

        #stock-requests-section table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }

        #stock-requests-section th,
        #stock-requests-section td {
            padding: 15px;
            text-align: left;
            border: 1px solid #ddd;
        }

        #stock-requests-section th {
            background-color: rgb(0, 0, 0);
            color: #fff;
            font-weight: bold;
            text-transform: uppercase;
        }

        #stock-requests-section td {
            background-color: #f9f9f9;
        }

        #stock-requests-section tr:nth-child(even) {
            background-color: #f1f1f1;
        }

        #stock-requests-section tr:hover {
            background-color: #e1e1e1;
        }

        #stock-requests-section button.btn-success {
            background-color: rgb(0, 0, 0);
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s;
            color: #fff;
        }

        #stock-requests-section button.btn-success:hover {
            background-color: gold;
        }

        #stock-requests-section button.btn-success:disabled {
            background-color: #ccc;
            cursor: not-allowed;
        }

        .alert.error {
            background-color: #e74c3c;
        }

        .alert {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #02e652;
            color: #ffffff;
            padding: 16px 24px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
            display: flex;
            align-items: center;
            gap: 12px;
            font-weight: bold;
            animation: fadeIn 0.3s ease-out;
            z-index: 9999;
        }

        .alert button {
            background: transparent;
            border: none;
            color: #ffffff;
            font-size: 20px;
            cursor: pointer;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeOut {
            from {
                opacity: 1;
            }

            to {
                opacity: 0;
            }
        }

        .password-input-container {
            position: relative;
        }

        .password-input-container input {
            width: 100%;
            padding-right: 40px;
        }

        .toggle-password {
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
            cursor: pointer;
            user-select: none;
        }

        .popup {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
        }

        .popup-content {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            max-width: 400px;
            text-align: center;
        }

        .popup-close-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 24px;
            cursor: pointer;
        }

        #UserSuccessPopup .popup-content {
            border: 2px solid #4CAF50;
            background-color: #e8f5e9;
        }

        #UserSuccessPopup .popup-content p {
            color: #388e3c;
        }

        #UserErrorPopup .popup-content {
            border: 2px solid #f44336;
            background-color: #ffebee;
        }

        #UserErrorPopup .popup-content p {
            color: #d32f2f;
        }

        .alert-error {
            background-color: #e74c3c;
        }

        .alert button {
            display: none;
        }

        #orders-section {
            padding: 20px;
            margin-top: 10px;
            margin-bottom: 50px;
        }

        #orders-section h1 {
            font-size: 25px;
            color: #222;
            margin-bottom: 20px;
            font-weight: 600;
            border-bottom: 2px solid rgb(0, 0, 0);
            padding-bottom: 10px;
            text-align: center;
        }

        #orders-section table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }

        #orders-section th,
        #orders-section td {
            padding: 15px;
            text-align: left;
            border: 1px solid #ddd;
        }

        #orders-section th {
            background-color: rgb(0, 0, 0);
            color: #fff;
            font-weight: bold;
            text-transform: uppercase;
        }

        #orders-section td {
            background-color: #f9f9f9;
        }

        #orders-section tr:nth-child(even) {
            background-color: #f1f1f1;
        }

        #orders-section tr:hover {
            background-color: #e1e1e1;
        }

        #orders-section a.submit-button1 {
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div id="settings">
        <div class="header">
            <div class="logo">
                <img src="{{ asset('Images/GV.png') }}" alt="GradeVault Logo" />
            </div>
            <nav>
                <div class="nav-links">
                    <a href="{{ url('/') }}">Home</a>
                    <a href="{{ url('tutor') }}">Tutors</a>
                    <a href="{{ url('about') }}">About</a>
                    <a href="{{ url('contact') }}">Contact Us</a>
                    <a href="{{ url('products') }}">Products</a>
                </div>
                <div class="admin-info">
                    <a href="#">Hi {{ Auth::user()->name }}</a>
                    <a href="#">
                        <ion-icon name="person-outline"></ion-icon>
                    </a>
                </div>
            </nav>
        </div>

        <div class="grid-container">
            <div class="sidebar">
                <a href="#admin-dashboard-link" class="sidebar-link">
                    <ion-icon name="apps"></ion-icon> <span>Admin Dashboard</span>
                </a>
                <a href="#inventory" class="sidebar-link">
                    <ion-icon name="clipboard"></ion-icon> <span>Inventory</span>
                </a>
                <a href="#Stock" class="sidebar-link">
                    <ion-icon name="bar-chart"></ion-icon> <span>Stock Management</span>
                </a>
                <a href="#Orders" class="sidebar-link">
                    <ion-icon name="paper-plane-sharp"></ion-icon> <span>Order Management</span>
                </a>
                <a href="#user-management" class="sidebar-link">
                    <ion-icon name="person"></ion-icon> <span>User Management</span>
                </a>
                <a href="#address" class="sidebar-link">
                    <ion-icon name="navigate-circle"></ion-icon> <span>Edit Address</span>
                </a>
                <a href="#payment-method" class="sidebar-link">
                    <ion-icon name="card"></ion-icon> <span>Payment Method</span>
                </a>
                <a href="#security" class="sidebar-link">
                    <ion-icon name="lock-closed"></ion-icon> <span>Security</span>
                </a>
                <a href="#" id="logout-link"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <ion-icon name="exit"></ion-icon> <span>Logout</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>

            <div class="main-admin-content">
                <!-- Admin Dashboard Section -->
                <section id="admin-dashboard-link" class="section-content">
                    <div class="user-edit-container">
                        <header>
                            <h2>Edit Your Information</h2>
                        </header>
                        <form method="POST" action="{{ route('profile.update') }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input id="name" name="name" type="text" value="{{ Auth::user()->name }}" required
                                    aria-describedby="nameHelp" />

                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input id="email" name="email" type="email" value="{{ Auth::user()->email }}" required
                                    aria-describedby="emailHelp" />

                            </div>
                            <button type="submit" class="submit-button1">Update Information</button>
                            @if ($msg = session()->pull('status'))
                                <div id="success-alert" class="alert">
                                    <span>{{ $msg }}</span>
                                </div>
                            @endif
                            @if($errors->any())
                                <div id="error-alert" class="alert error">
                                    <span>{{ $errors->first() }}</span>
                                </div>
                            @endif
                        </form>
                    </div>
                </section>

                <!-- Inventory Section -->
                <section id="inventory" class="section-content">
                    <div class="admin-dashboard-boxes">
                        <div class="dashboard-box-container">
                            <div class="dashboard-box">
                                <h4>Total Products</h4>
                                <p>{{ \App\Models\Product::query()->count() }}</p>
                            </div>
                        </div>
                    </div>
                    <h3>Add New Product</h3>
                    <form method="POST" action="{{ route('product.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="name">Product Name</label>
                            <input type="text" id="name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="number" id="price" name="price" step="0.01" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea id="description" name="description" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="alt_text">Alt Text</label>
                            <input type="text" id="alt_text" name="alt_text" required>
                        </div>
                        <div class="form-group">
                            <label for="stock">Stock Number</label>
                            <input type="number" id="stock" name="number_of_stock" required>
                        </div>
                        <div class="form-group">
                            <label for="image_link">Image Link</label>
                            <input type="text" id="image_link" name="image_link" required>
                        </div>
                        <div class="form-group">
                            <label for="rating">Rating</label>
                            <input type="number" id="rating" name="average_rating" min="1" max="5" required>
                        </div>
                        <div class="form-group">
                            <label for="category_id">Category ID</label>
                            <input type="number" id="category_id" name="category_id" required>
                        </div>
                        <button type="submit" class="submit-button1">Add Product</button>
                    </form>

                    @if ($msg = session()->pull('product-status'))
                        <div id="product-success-alert" class="alert">
                            <span>{{ $msg }}</span>
                        </div>
                    @endif

                    <!-- Products Section -->
                    <h3>Existing Products</h3>
                    <div class="product-list">
                        @foreach($products as $product)
                            <div class="product-item">
                                <div class="product-image">
                                    <img src="{{ $product->image_link }}" alt="{{ $product->alt_text }}">
                                </div>
                                <button onclick="toggleEditForm({{ $product->id }})" class="submit-button1">Edit
                                    Product</button>
                                <!-- Hidden Edit Form -->
                                <div id="editForm_{{ $product->id }}" class="hidden-edit-form">
                                    <div class="modal-content">
                                        <span onclick="closeEditForm({{ $product->id }})"
                                            class="close-button">&times;</span>
                                        <h4>Edit Product Details</h4>
                                        <form method="POST" action="{{ route('product.update', $product->id) }}">
                                            @csrf
                                            @method('PUT')
                                            <div class="product-field">
                                                <label for="name_{{ $product->id }}"><strong>Name:</strong></label>
                                                <input type="text" id="name_{{ $product->id }}" name="name"
                                                    value="{{ $product->name }}" required aria-label="Product Name">
                                            </div>
                                            <div class="product-field">
                                                <label
                                                    for="description_{{ $product->id }}"><strong>Description:</strong></label>
                                                <textarea id="description_{{ $product->id }}" name="description" required
                                                    aria-label="Product Description">{{ $product->description }}</textarea>
                                            </div>
                                            <div class="product-field">
                                                <label for="alt_text_{{ $product->id }}"><strong>Alt Text:</strong></label>
                                                <input type="text" id="alt_text_{{ $product->id }}" name="alt_text"
                                                    value="{{ $product->alt_text }}" required aria-label="Alt Text">
                                            </div>
                                            <div class="product-field">
                                                <label for="price_{{ $product->id }}"><strong>Price:</strong></label>
                                                <input type="number" id="price_{{ $product->id }}" name="price"
                                                    value="{{ $product->price }}" required aria-label="Price">
                                            </div>
                                            <div class="product-field">
                                                <label for="rating_{{ $product->id }}"><strong>Rating:</strong></label>
                                                <input type="number" id="rating_{{ $product->id }}" name="average_rating"
                                                    value="{{ $product->average_rating }}" min="1" max="5" required
                                                    aria-label="Rating">
                                            </div>
                                            <div class="product-field">
                                                <label for="category_id_{{ $product->id }}"><strong>Category
                                                        ID:</strong></label>
                                                <input type="number" id="category_id_{{ $product->id }}" name="category_id"
                                                    value="{{ $product->category_id }}" required aria-label="Category ID">
                                            </div>
                                            <button type="submit" class="submit-button1">Update Product</button>
                                        </form>
                                        <!-- Delete Product Form -->
                                        <form id="deleteProductForm_{{ $product->id }}"
                                            action="{{ route('product.destroy', $product->id) }}" method="POST"
                                            style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="delete-button-product">Delete Product</button>
                                        </form>
                                        <form method="POST" action="{{ route('stock.request') }}">
                                            @csrf
                                            <div class="product-field">
                                                <label for="stock_{{ $product->id }}"><strong>Current Stock
                                                        Level:</strong></label>
                                                <span id="stock_{{ $product->id }}">{{ $product->number_of_stock }}</span>
                                            </div>
                                            <div class="product-field">
                                                <label for="stock_quantity_{{ $product->id }}"><strong>Stock
                                                        Quantity:</strong></label>
                                                <input type="number" id="stock_quantity_{{ $product->id }}" name="quantity"
                                                    required min="1" aria-label="Stock Quantity">
                                            </div>
                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                            <button type="submit" class="submit-button1">Request Stock</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </section>

                <!-- Stock Management Section -->
                <section id="Stock" class="section-content" style="display: none;">
                    <div id="stock-requests-section" class="container">
                        <h1>Stock Requests</h1>
                        @if($msg = session()->pull('success'))
                            <div id="stock-success-alert" class="alert">
                                <span>{{ $msg }}</span>
                            </div>
                        @endif
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>User ID</th>
                                    <th>Product ID</th>
                                    <th>Image</th>
                                    <th>Quantity</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($stockRequests as $stockRequest)
                                    <tr>
                                        <td>{{ $stockRequest->id }}</td>
                                        <td>{{ $stockRequest->user_id }}</td>
                                        <td>{{ $stockRequest->product_id }}</td>
                                        <td>
                                            @if($stockRequest->product)
                                                <img src="{{ $stockRequest->product->image_link }}"
                                                    alt="{{ $stockRequest->product->alt_text }}"
                                                    style="width: 100px; height: auto;">
                                            @endif
                                        </td>
                                        <td>{{ $stockRequest->quantity }}</td>
                                        <td>{{ $stockRequest->status }}</td>
                                        <td>
                                            <form action="{{ route('stockRequests.approve', $stockRequest->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="btn btn-success" {{ $stockRequest->status == 'approved' ? 'disabled' : '' }}>Approve</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </section>

                <!-- Orders Management Section -->
                <section id="Orders" class="section-content" style="display: none;">
                    <div id="orders-section" class="container">
                        <div class="dashboard-box-container">
                            <div class="dashboard-box">
                                <h4>Total Orders</h4>
                                <p>{{ \App\Models\Order::query()->count() }}</p>
                            </div>
                            <div class="dashboard-box">
                                <h4>Total Revenue</h4>
                                <p>£{{ number_format($orders->sum('total'), 2) }}</p>
                            </div>
                            <div class="dashboard-box">
                                <h4>Average Order Value</h4>
                                <p>
                                    £{{ number_format($orders->count() ? $orders->sum('total') / $orders->count() : 0, 2) }}
                                </p>
                            </div>
                        </div>
                        <h1>All Orders</h1>
                        <table>
                            <thead>
                                <tr>
                                    <th>Order ID</th>
                                    <th>User</th>
                                    <th>Estimated Delivery Date</th>
                                    <th>Total</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($orders as $order)
                                    <tr>
                                        <td>{{ $order->id }}</td>
                                        <td>{{ $order->user->name ?? 'N/A' }}</td>
                                        <td>
                                            {{ $order->estimated_delivery_date ? $order->estimated_delivery_date->format('Y-m-d') : 'N/A' }}
                                        </td>
                                        <td>£{{ number_format($order->total, 2) }}</td>
                                        <td>
                                            <a href="{{ route('order.confirmation', $order->id) }}"
                                                class="submit-button1">View</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" style="text-align: center;">No orders found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </section>

                <!-- User Management Section -->
                <section id="user-management" class="section-content">
                    <div class="admin-dashboard-boxes">

                        <form method="POST" action="{{ route('user.add') }}">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="name" id="name" placeholder="Full Name" required>
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" id="email" placeholder="Email" required>
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" id="password" placeholder="Password" required>
                            </div>
                            <button type="submit" class="submit-button1">Add User</button>
                        </form>

                        @if(session('user-add-success'))
                            <div id="user-success-alert" class="alert alert-success">
                                <span>{{ session('user-add-success') }}</span>
                            </div>
                        @endif

                        <h3>Existing Users</h3>
                        <div class="user-list">
                            @foreach($users as $user)
                                <div class="user-item">
                                    <div class="user-info">
                                        <p><strong>Name:</strong> {{ $user->name }}</p>
                                        <p><strong>Email:</strong> {{ $user->email }}</p>
                                    </div>
                                    <div class="user-actions">
                                        <form method="POST" action="{{ route('user.update', $user->id) }}">
                                            @csrf
                                            @method('PUT')
                                            <input type="text" name="name" value="{{ $user->name }}" required>
                                            <input type="email" name="email" value="{{ $user->email }}" required>
                                            <button type="submit" class="submit-button1">Update</button>
                                        </form>
                                        <form action="{{ route('user.destroy', $user->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="delete-button-user">Delete User</button>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </section>

                <div id="UserErrorPopup" class="popup" style="display:none;">
                    <div class="popup-content">
                        <p id="errorMessage">Unable to delete this user</p>
                    </div>
                </div>

                <!-- Address Section -->
                <section id="address" class="section-content">
                    <div class="address-container">
                        <header>
                            <h2>Edit Address</h2>
                        </header>
                        <form method="POST" action="{{ route('address.update') }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="address_line1">Address Line 1</label>
                                <input id="address_line1" name="address_line1" type="text"
                                    value="{{ old('address_line1', auth()->user()->address->address_line1 ?? '') }}"
                                    required aria-label="Address Line 1" />
                                @error('address_line1')
                                    <span class="error-message">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="address_line2">Address Line 2</label>
                                <input id="address_line2" name="address_line2" type="text"
                                    value="{{ old('address_line2', auth()->user()->address->address_line2 ?? '') }}"
                                    aria-label="Address Line 2" />
                                @error('address_line2')
                                    <span class="error-message">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="postcode">Postcode</label>
                                <input id="postcode" name="postcode" type="text"
                                    value="{{ old('postcode', auth()->user()->address->postcode ?? '') }}" required
                                    aria-label="Postcode" />
                                @error('postcode')
                                    <span class="error-message">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="country">Country</label>
                                <input id="country" name="country" type="text"
                                    value="{{ old('country', auth()->user()->address->country ?? '') }}" required
                                    aria-label="Country" />
                                @error('country')
                                    <span class="error-message">{{ $message }}</span>
                                @enderror
                            </div>
                            <button type="submit" class="submit-button">Update Address</button>
                        </form>
                        @if ($msg = session()->pull('address-status'))
                            <div id="address-success-alert" class="alert">
                                <span>{{ $msg }}</span>
                            </div>
                        @endif
                    </div>
                </section>

                <!-- Payment Method Section -->
                <section id="payment-method" class="section-content">
                    <div class="admin-dashboard-boxes">
                        <div class="box">
                            <span><strong>Payment Method:</strong> Manage your payment methods here.</span>
                        </div>
                    </div>
                </section>

                <!-- Security Section -->
                <section id="security" class="section-content">
                    <div class="password-container">
                        <form method="POST" action="{{ route('user.password.update') }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="current_password">Current Password</label>
                                <div class="password-input-container">
                                    <input id="current_password" name="current_password" type="password" required />
                                    <span class="toggle-password" data-target="current_password">
                                        <ion-icon name="eye-off-outline"></ion-icon>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password">New Password</label>
                                <div class="password-input-container">
                                    <input id="password" name="password" type="password" required />
                                    <span class="toggle-password" data-target="password">
                                        <ion-icon name="eye-off-outline"></ion-icon>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation">Confirm New Password</label>
                                <div class="password-input-container">
                                    <input id="password_confirmation" name="password_confirmation" type="password"
                                        required />
                                    <span class="toggle-password" data-target="password_confirmation">
                                        <ion-icon name="eye-off-outline"></ion-icon>
                                    </span>
                                </div>
                            </div>
                            <button type="submit" class="submit-button">Save</button>
                        </form>
                        @if (session('status') === 'password-updated')
                            <div id="password-success-alert" class="alert">
                                <span>Password successfully updated.</span>
                            </div>
                        @endif
                    </div>
                </section>
            </div>
        </div>
    </div>

    <!-- Ionicons -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    <!-- Section Switching and Popup Handling Scripts -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const links = document.querySelectorAll('.sidebar-link');
            const sections = document.querySelectorAll('.section-content');

            function hideAllSections() {
                sections.forEach(section => section.style.display = 'none');
            }
            function resetActiveLinks() {
                links.forEach(link => link.classList.remove('active'));
            }
            function showSectionFromHash() {
                const hash = window.location.hash.substring(1);
                hideAllSections();
                resetActiveLinks();

                if (hash) {
                    const targetSection = document.getElementById(hash);
                    const activeLink = document.querySelector(`.sidebar-link[href="#${hash}"]`);
                    if (targetSection) {
                        targetSection.style.display = 'block';
                        if (activeLink) activeLink.classList.add('active');
                    }
                } else {
                    document.getElementById('admin-dashboard-link').style.display = 'block';
                    document.querySelector('.sidebar-link[href="#admin-dashboard-link"]').classList.add('active');
                }
                window.scrollTo(0, 0);
            }

            function createAlert(message, isSuccess = true) {
                const alertDiv = document.createElement('div');
                alertDiv.className = isSuccess ? 'alert alert-success' : 'alert alert-error';
                alertDiv.innerHTML = `
            <span>${message}</span>
            <button type="button" class="alert-close-btn">&times;</button>
        `;
                document.body.prepend(alertDiv);

                const closeBtn = alertDiv.querySelector('.alert-close-btn');
                const timer = setTimeout(() => dismiss(alertDiv), 5000);
                closeBtn.addEventListener('click', () => {
                    clearTimeout(timer);
                    dismiss(alertDiv);
                });

                function dismiss(el) {
                    el.style.animation = 'fadeOut 0.3s forwards';
                    setTimeout(() => el.remove(), 300);
                }
            }

            function wireDeleteButtons(selector, successMessage) {
                document.querySelectorAll(selector).forEach(button => {
                    button.addEventListener('click', event => {
                        event.preventDefault();
                        const form = button.closest('form');
                        fetch(form.action, { method: 'POST', body: new FormData(form) })
                            .then(res => res.json())
                            .then(data => {
                                if (data.success) {
                                    createAlert(successMessage || data.message, true);
                                    button.closest(selector.includes('user') ? '.user-item' : '.product-item').remove();
                                } else {
                                    createAlert(data.message, false);
                                }
                            })
                            .catch(err => {
                                console.error(err);
                                createAlert('An error occurred.', false);
                            });
                    });
                });
            }

            showSectionFromHash();
            links.forEach(link => {
                link.addEventListener('click', e => {
                    e.preventDefault();
                    window.location.hash = link.getAttribute('href').substring(1);
                    showSectionFromHash();
                });
            });
            window.addEventListener('hashchange', showSectionFromHash);

            wireDeleteButtons('.delete-button-user');
            wireDeleteButtons('.delete-button-product', 'The product has been successfully removed.');

            window.toggleEditForm = productId => {
                document.getElementById('editForm_' + productId).style.display = 'flex';
            };
            window.closeEditForm = productId => {
                document.getElementById('editForm_' + productId).style.display = 'none';
            };
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const alertEl = document.getElementById('success-alert');
            const closeBtn = document.getElementById('alert-close');
            if (alertEl) {
                const timer = setTimeout(dismissAlert, 5000);
                closeBtn.addEventListener('click', () => {
                    clearTimeout(timer);
                    dismissAlert();
                });
                function dismissAlert() {
                    alertEl.style.animation = 'fadeOut 0.3s forwards';
                    setTimeout(() => alertEl.remove(), 300);
                }
            }
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const errAlert = document.getElementById('error-alert');
            const errClose = document.getElementById('error-alert-close');
            if (errAlert) {
                errClose.addEventListener('click', () => errAlert.remove());
            }
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const addressAlert = document.getElementById('address-success-alert');
            const addressAlertClose = document.getElementById('address-alert-close');
            if (addressAlert) {
                const timer = setTimeout(() => {
                    dismissAddressAlert();
                }, 5000);
                addressAlertClose.addEventListener('click', () => {
                    clearTimeout(timer);
                    dismissAddressAlert();
                });
                function dismissAddressAlert() {
                    addressAlert.style.animation = 'fadeOut 0.3s forwards';
                    setTimeout(() => addressAlert.remove(), 300);
                }
            }
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            document.querySelectorAll('.toggle-password').forEach(function (toggle) {
                toggle.addEventListener('click', function () {
                    const targetId = this.getAttribute('data-target');
                    const input = document.getElementById(targetId);
                    if (input.getAttribute('type') === 'password') {
                        input.setAttribute('type', 'text');
                        this.innerHTML = '<ion-icon name="eye-outline"></ion-icon>';
                    } else {
                        input.setAttribute('type', 'password');
                        this.innerHTML = '<ion-icon name="eye-off-outline"></ion-icon>';
                    }
                });
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const productAlert = document.getElementById('product-success-alert');
            if (productAlert) {
                setTimeout(() => {
                    productAlert.style.animation = 'fadeOut 0.3s forwards';
                    setTimeout(() => productAlert.remove(), 300);
                }, 5000);
            }
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const stockAlert = document.getElementById('stock-success-alert');
            const stockClose = document.getElementById('stock-alert-close');
            if (stockAlert) {
                const timer = setTimeout(() => {
                    stockAlert.style.animation = 'fadeOut 0.3s forwards';
                    setTimeout(() => stockAlert.remove(), 300);
                }, 5000);

                stockClose.addEventListener('click', () => {
                    clearTimeout(timer);
                    stockAlert.style.animation = 'fadeOut 0.3s forwards';
                    setTimeout(() => stockAlert.remove(), 300);
                });
            }
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const alertEl = document.getElementById('user-success-alert');
            if (!alertEl) return;

            const closeBtn = alertEl.querySelector('.alert-close-btn');
            const timer = setTimeout(dismiss, 5000);

            closeBtn.addEventListener('click', () => {
                clearTimeout(timer);
                dismiss();
            });

            function dismiss() {
                alertEl.style.animation = 'fadeOut 0.3s forwards';
                setTimeout(() => alertEl.remove(), 300);
            }
        });
    </script>

</body>

</html>