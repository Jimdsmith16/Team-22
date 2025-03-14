<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{$product->name}}</title>
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
    margin: 0;
    display: flex;
    flex-direction: column;
}

/* Wrap Content to Push Footer */
.content-wrapper {
    flex: 1;
}

/* General Page and Body Styling */
body {
    background-color: #fff;
    color: #333;
    font-size: 16px;
    line-height: 1.5;
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
}

.header nav {
    display: flex;
    align-items: center;
    gap: 15px;
}

.header nav a {
    color: #fff;
    text-decoration: none;
    font-size: 1em;
    transition: color 0.3s ease;
}

.header nav a:hover {
    color: gold;
}



/* Basket Title */
.basket-title {
    text-align: center;
    font-size: 2em;
    font-weight: bold;
    margin: 30px 0 20px;
    color: gold;
}

/* Product Container */
.product-container {
    display: flex;
    flex-wrap: wrap;
    gap: 30px;
    justify-content: center;
    align-items: flex-start;
    max-width: 1000px;
    margin: 20px auto;
    padding: 20px;
    background: #f9f9f9;
    border-radius: 10px;
}

/* Product Image */
.product-container img {
    flex: 1;
    max-width: 350px;
    width: 100%;
    height: auto;
    border: 1px solid #ddd;
    border-radius: 8px;
    padding: 10px;
    background-color: white;
}

/* Product Details */
.product-details {
    flex: 2;
    display: flex;
    flex-direction: column;
    gap: 15px;
    padding: 10px;
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

.product-details .stock {
    font-size: 1.1em;
    font-weight: bold;
    color: #222;
}

.product-details input[type="number"] {
    width: 50px;
    padding: 5px;
    font-size: 1em;
    border: 1px solid #ccc;
    border-radius: 5px;
    text-align: center;
}

/* Buttons */
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

 /* Footer Styling */
 .footer {
    background-color: #000;
    color: #fff;
    text-align: center;
    padding: 10px 0; /* Reduced height */
    width: 100%;
    position: relative;
    bottom: 0;
    font-size: 0.9em;
    margin-top: auto;
}

.footer .contact-info {
    display: flex;
    justify-content: center;
    gap: 15px;
    flex-wrap: wrap;
}

.footer .contact-info p {
    margin: 2px 0;
    font-size: 0.85em;
}


            .switch {
              position: relative;
              display: inline-block;
              width: 50px;
              height: 24px;
              margin-left: 10px;
          }

          .switch input {
              opacity: 0;
              width: 0;
              height: 0;
          }

          .slider {
              position: absolute;
              cursor: pointer;
              top: 0;
              left: 0;
              right: 0;
              bottom: 0;
              background-color: #878686;
              transition: 0.4s;
              border-radius: 24px;
          }

          .slider:before {
              position: absolute;
              content: "";
              height: 18px;
              width: 18px;
              left: 4px;
              bottom: 3px;
              background-color: rgb(6, 0, 0);
              transition: 0.4s;
              border-radius: 50%;
          }

          input:checked + .slider {
              background-color: #878686;
          }

          input:checked + .slider:before {
              transform: translateX(24px);
          }

          .tooltip {
              position: relative;
              
          }
          .font-toggle-container {
    position: fixed;
    bottom: 15px; /* Adjust the distance from the footer */
    left: 680px;
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 10px;
    width: 100%;
    padding: 10px 0;
    z-index: 1000;
}



          .tooltip .tooltip-text {
              font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
              visibility: hidden;
              background-color: black;
              color: #fff;
              text-align: center;
              padding: 6px;
              border-radius: 5px;
              position: absolute;
              top: 25px;
              left: 50%;
              transform: translateX(-50%);
              font-size: 0.7em;
              white-space: nowrap;
          }

          .tooltip:hover .tooltip-text {
              visibility: visible;
          }

          .dark-mode .dark-mode-button {
    background-color: #444; /* Dark gray background */
    color: white;
    padding: 5px 10px;
    border-radius: 5px;
}


        .dark-mode-button:hover {
            text-decoration: underline;
        }

        .dark-mode {
    background-color: #121212;
    color: #ffffff;
}

.dark-mode .content {
    background-color: #1e1e1e;
    color: #ffffff;
}

.dark-mode .header, .dark-mode .footer {
    background-color: #333;
}

.dark-mode .header nav a {
    color: #ffffff;
}

/* Dark Mode Adjustments */
.dark-mode .review-section h2 {
    color: #ffffff; /* Ensures "Customer Reviews" is white in dark mode */
}

.dark-mode .review {
    background: #1e1e1e; /* Darker background for reviews */
    color: #fff; /* White text */
    box-shadow: 0 2px 8px rgba(255, 255, 255, 0.1);
}

/* Ensure rating text is visible in dark mode */
.dark-mode .review p {
    color: #ffffff !important; /* Forces all text in reviews to be white */
}

.dark-mode .review strong {
    color: #ffffff !important; /* Ensures bold text is also white */
}

.dark-mode .review .rating {
    color: #ffcc00 !important; /* Sets the star rating text to gold */
}

.dark-mode .review-avatar {
    background: #3a7bd5; /* Adjusts avatar color for dark mode */
}

.dark-mode .review button {
    background-color: #ff4d4d; /* Keeps the delete button red */
}

/* Responsive Design */
@media (max-width: 768px) {
    .header {
        flex-direction: column;
        height: auto;
        padding: 10px;
    }

    .header nav {
        flex-direction: column;
        text-align: center;
        gap: 10px;
    }

    .search-bar {
        width: 100%;
        margin-top: 10px;
    }

    .product-container {
        flex-direction: column;
        align-items: center;
        padding: 15px;
    }

    .product-container img {
        max-width: 100%;
    }

    .product-details {
        width: 100%;
        text-align: center;
    }
}
/* Basket + Search Bar Container */
.basket-search-container {
    display: flex;
    align-items: center;
    justify-content: flex-start; /* Aligns contents to the left */
    gap: 10px; /* Spacing between basket icon and search bar */
}

/* Basket Icon */
.basket-icon {
    display: flex;
    align-items: center;
}

.basket-icon a {
    font-size: 24px;
    text-decoration: none;
}

/* Search Bar */

.search-bar input[type="text"] {
    padding: 5px;
    font-size: 1em;
}

/* Review Form Styling */
.review-form {
    max-width: 600px;
    margin: 40px auto;
    background: #f9f9f9;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
}

.review-form h2 {
    text-align: center;
    font-size: 1.8em;
    color: #333;
    margin-bottom: 15px;
}

.review-form label {
    font-weight: bold;
    display: block;
    margin: 10px 0 5px;
    color: #444;
}

.review-form select,
.review-form textarea {
    width: 100%;
    padding: 10px;
    font-size: 1em;
    border: 1px solid #ccc;
    border-radius: 5px;
    transition: 0.3s;
}

.review-form textarea {
    height: 100px;
    resize: none;
}

.review-form select:focus,
.review-form textarea:focus {
    border-color: #1a73e8;
    outline: none;
    box-shadow: 0 0 5px rgba(26, 115, 232, 0.3);
}

/* Submit Button */
.review-form button {
    width: 100%;
    background-color: #1a73e8;
    color: #fff;
    font-size: 1em;
    padding: 12px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s;
    font-weight: bold;
}

.review-form button:hover {
    background-color: #0c54b0;
}
/* Review Section Styling */
.review-section {
    max-width: 800px;
    margin: 40px auto;
    padding: 20px;
}

.review-section h2 {
    font-size: 1.8em;
    color: #333;
    margin-bottom: 15px;
    text-align: left;
}

/* Individual Review Cards */
.review {
    background: #fff;
    padding: 15px;
    margin-bottom: 15px;
    border-radius: 8px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    display: flex;
    align-items: flex-start;
    gap: 15px;
}

/* Avatar Placeholder */
.review-avatar {
    width: 50px;
    height: 50px;
    background: #1a73e8;
    color: #fff;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    font-weight: bold;
    font-size: 1.2em;
    flex-shrink: 0;
}

/* Review Text */
.review-content {
    flex-grow: 1;
}

.review p {
    margin: 5px 0;
    font-size: 1em;
    color: #444;
}

.review strong {
    color: #222;
}

/* Delete Button */
.review button {
    background-color: #ff4d4d;
    color: white;
    padding: 6px 12px;
    border: none;
    border-radius: 5px;
    font-size: 0.9em;
    cursor: pointer;
    transition: 0.3s;
}

.review button:hover {
    background-color: #d43f3f;
}


        </style>
    </head>
    <body>
        <!-- Header Section -->
<div class="header">
    <div class="logo">
        <a href="/"><img src="{{asset('Images/GV.png')}}" alt="GradeVault Logo"></a>
    </div>

    <!-- Header Nav Bar -->
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

    <!-- Basket Icon + Search Bar Container -->
    <div class="basket-search-container">
        @auth
        <div class="basket-icon">
            <a href="{{ url('basket') }}">🛒</a>
        </div>
        @endauth

        <div class="search-bar">
            <form action="{{route('products.search')}}" method="GET">
                <input type="text" name="search" placeholder="Search Products...">
                <button type="submit">Search</button>
            </form>
        </div>
    </div>
</div>

       
    <div class="font-toggle-container">
    <div class="tooltip">
        <label class="switch">
            <input type="checkbox" id="fontToggle" onchange="toggleFontSize()">
            <span class="slider round"></span>
        </label>
        <span class="tooltip-text">Toggle Font Size</span>
    </div>
    <button class="dark-mode-button" onclick="toggleDarkMode()">Dark Mode</button>
</div>
        <!-- Content Section -->
        <div class="basket-title">{{$product->name}}</div>

        <div class="product-container">
            <img src="{{$product->image_link}}" alt="{{$product->alt_text}}">

            <div class="product-details">
                <h1>{{$product->name}}</h1>
                <div class="price">£ {{$product->price}}</div>
                <div class="description">{{$product->description}}</div>
                <div class="stock">Amount in Stock: {{$product->number_of_stock}}</div>
                <form action="{{ route('basket.add') }}" method="POST">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <input type="number" name="quantity" value="1" min="1">
                    <button type="submit" class="add-to-basket-btn">Add to Basket</button>
                </form>
            </div>
        </div>

       <!-- Review Form -->
<form action="{{ route('review.store') }}" method="POST" class="review-form">
    @csrf
    <h2>Leave a Review</h2>
    
    <input type="hidden" name="user_id" value="{{ Auth::id() }}">
    <input type="hidden" name="product_id" value="{{ $product->id }}">

    <label for="rating">Rating (1-5):</label>
    <select name="rating" required>
        <option value="5">5 - Excellent</option>
        <option value="4">4 - Good</option>
        <option value="3">3 - Average</option>
        <option value="2">2 - Poor</option>
        <option value="1">1 - Terrible</option>
    </select>

    <label for="description">Your Review:</label>
    <textarea name="description" placeholder="Write your thoughts here..." required></textarea>

    <button type="submit">Submit Review</button>
</form>

<!-- Review Section -->
<div class="review-section">
    <h2>Customer Reviews</h2>

    @if($product->reviews->count() > 0)
        @foreach($product->reviews as $review)
            <div class="review">
                <!-- Avatar with first letter of user name -->
                <div class="review-avatar">
                    {{ substr($review->user->name ?? 'A', 0, 1) }}
                </div>

                <!-- Review Content -->
                <div class="review-content">
                    <p><strong>Rating:</strong> ⭐ {{ $review->rating }}/5</p>
                    <p><strong>Review:</strong> {{ $review->description }}</p>
                    <p><strong>By:</strong> {{ $review->user->name ?? 'Anonymous' }}</p>

                    <!-- Delete button (only if admin or user is the owner of the review) -->
                    @if(Auth::check() && Auth::id() == $review->user_id)
                    <form action="{{ route('review.destroy', $review->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                    @endif
                </div>
            </div>
        @endforeach
    @else
        <p>No reviews yet. Be the first to review this product!</p>
    @endif
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

        <script>
            document.addEventListener("DOMContentLoaded", function () {
              const savedFontSize = localStorage.getItem("pageFontSize");
              const fontToggle = document.getElementById("fontToggle");

              if (savedFontSize === "20px") {
                  document.body.style.fontSize = "20px";
                  fontToggle.checked = true;
              }

              window.toggleFontSize = function () {
                  const isLarge = fontToggle.checked;
                  document.body.style.fontSize = isLarge ? "20px" : "16px";
                  localStorage.setItem("pageFontSize", isLarge ? "20px" : "16px");
              };
          });

          document.addEventListener("DOMContentLoaded", function () {
        const fontToggleContainer = document.querySelector(".font-toggle-container");

        window.addEventListener("scroll", function () {
            let scrollY = window.scrollY || window.pageYOffset; 
            let maxScroll = document.documentElement.scrollHeight - window.innerHeight;
            let scrollPercentage = scrollY / maxScroll; 

            let moveAmount = scrollPercentage * 50; // Adjust the floating effect amount
            fontToggleContainer.style.transform = `translateY(-${moveAmount}px)`;
        });
    });

    document.addEventListener("DOMContentLoaded", function () {
    const darkModeEnabled = localStorage.getItem("darkMode") === "enabled";

    if (darkModeEnabled) {
        document.body.classList.add("dark-mode");
    }

    document.querySelector(".dark-mode-button").addEventListener("click", function () {
        document.body.classList.toggle("dark-mode");
        const isDarkMode = document.body.classList.contains("dark-mode");
        localStorage.setItem("darkMode", isDarkMode ? "enabled" : "disabled");
    });
});

        </script>
    </body>
</html>


