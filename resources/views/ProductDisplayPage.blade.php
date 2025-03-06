<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Products</title>
       
        <style>
            /* General Reset */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: Arial, sans-serif;
}

/* General Page and Body Styling */
body {
    background-color: #F5F5F5;
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
    font-size: 1em;
    transition: color 0.3s ease;
    cursor: pointer;
}

.header nav a:hover {
    color: gold;
}


.search-bar input[type="text"] {
    padding: 5px;
    font-size: 1em;
}

/* Body Styling */
.product-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    padding: 20px;
    gap: 20px;
    max-width: 1000px;
    margin: 0 auto;
}

.gallery {
    border: 1px solid #ddd;
    border-radius: 8px;
    background-color: #fff;
    padding: 15px;
    text-align: center;
    width: 200px;
}

.gallery img {
    width: 100%;
    max-width: 150px;
    height: auto;
    border-radius: 8px;
}

.desc {
    padding-top: 10px;
    font-size: 0.9rem;
    color: #333;
}

.price {
    padding-top: 5px;
    font-size: 0.9rem;
    color: #1a73e8;
    font-weight: bold;
}

.view-product-btn {
    margin-top: 10px;
    padding: 8px 12px;
    font-size: 0.9rem;
    border: none;
    border-radius: 5px;
    background-color: #2D306A;
    color: #fff;
    cursor: pointer;
    text-decoration: none; 
    display: inline-block; 
}

.view-product-btn:hover {
        opacity: 0.7;
}

/* Footer Styling */
.footer {
    background-color: #000;
    color: #fff;
    text-align: center;
    padding: 15px 0;
    margin-top: 20px;
    width: 100%;
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

footer p {
    margin: 5px 0;
}
/* List/Grid buttons positioning */
.column {
    float: left;
    width: 50%;
    padding: 10px;
}

/* empty space after the columns */
.row:after {
    content: "";
    display: table;
    clear: both;
}

/* Ensure uniform styling for both views */
.product-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    padding: 20px;
    gap: 20px;
    max-width: 1000px;
    margin: 0 auto;
    transition: all 0.3s ease-in-out;
}
/* Align category filter and buttons in center */
/* Ensure the category filter and buttons are aligned */
.category-filter {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    margin-bottom: 5px;
    margin-left: 5px;
}
.view-buttons {
    display: flex;
    justify-content: flex-start; /* Align buttons to the left */
    gap: 8px; /* Small gap between buttons */
    margin-top: 40px; /* Moves buttons slightly up */
    margin-left: -150px; /* Moves buttons slightly to the left */
}

/* Fix button size and prevent stretching */
.view-buttons button {
    padding: 5px 12px;
    font-size: 0.85rem;
    border: none;
    background-color: #2D306A;
    color: white;
    cursor: pointer;
    border-radius: 5px;
    transition: 0.3s ease;
    width: auto;
    height: 35px;
    text-align: center;
    display: inline-block;
    min-width: 60px;
}

/* Button Hover Effect */
.view-buttons button:hover {
    opacity: 0.7;
}

/* Grid View - Consistent Layout */
.grid-view {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    justify-content: center;
}

/* List View - Added Spacing */
.list-view {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 15px;
    width: 100%;
}

/* Adjust Product Display in List View */
.list-view .gallery {
    display: flex;
    flex-direction: row;
    width: 100%;
    max-width: 600px;
    align-items: center;
    padding: 15px;
    gap: 15px; /* Added gap between items */
    border: 1px solid #ddd;
    border-radius: 8px;
    background-color: #fff;
}

.list-view .gallery img {
    width: 120px;
    height: auto;
    border-radius: 8px;
    margin-right: 20px;
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
    right: 17px;
    bottom: 28px;
    display: flex;
    align-items: center;
    gap: 10px;
    background: none; /* Remove background */
    padding: 0; /* Remove padding */
    border-radius: 0; /* Remove border radius */
    box-shadow: none; /* Remove shadow */
    transition: transform 0.01s ease-in-out;
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
.basket-container {
    display: flex;
    align-items: center;
    gap: 10px; /* Adjust spacing */
}

.basket-icon a {
    font-size: 24px; /* Adjust icon size */
    text-decoration: none;
}
.search-bar input[type="text"] {
    padding: 5px;
    font-size: 1em;
}

        </style>
    </head>
    <body>
    <!-- Header Section -->
<div class="header">
    <div class="logo">
        <a href="/"> <img src="{{asset('Images/GV.png')}}" alt="GradeVault Logo"></a>
    </div>
    
    <!-- Header Nav Bar -->
    <nav>
        <a href="{{url('/')}}">Home</a>
        <a href="{{url('tutor')}}">Tutors</a>
        <a href="{{url('about')}}">About</a>
        <a href="{{url('contact')}}">Contact Us</a>
        <a href="{{url('products')}}">Products</a>
        @auth
            @if(auth()->user()->type === 'admin')
                <a href="{{ url('adminsettings') }}">Settings</a>
            @else
                <a href="{{ url('usersettings') }}">Settings</a>
            @endif
        @else
            <a href="{{ url('login') }}">Login</a>
        @endauth
    </nav>

    <!-- Basket Icon + Search Bar -->
    <div class="basket-container">
        @auth
        <div class="basket-icon">
            <a href="{{ url('basket') }}">
                🛒
            </a>
        </div>
        @endauth

        <!-- Header Search Bar -->
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
        <div class="product-container">

            <!-- Category Dropdown -->
            <form action="{{ route('products.byCategory') }}" method="GET" class="category-filter">
                <label for="category">Filter by Category:</label>
                <select name="category" id="category" onchange="this.form.submit()">
                    <option value="">All Categories</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </form>
            <div class="view-buttons">
            <button onclick="listView()"><i class="fa fa-bars"></i> List</button>
            <button onclick="gridView()"><i class="fa fa-th-large"></i> Grid</button>
        </div>

            @if($products->isEmpty())
                <p>No products found in this category.</p>
            @else
                @foreach($products as $product)
                    <div class="gallery">
                        <img src="{{ $product->image_link }}" alt="{{ $product->alt_text }}">
                        <div class="desc">{{ $product->name }}</div>
                        <div class="price">£{{ number_format($product->price, 2) }}</div>
                        <a href="{{ url('products', ['id' => $product->id]) }}" class="view-product-btn">View Product</a>
                    </div>
                @endforeach
            @endif
        </div>

        <!-- Footer Styling -->
        <div class="footer">
            <div class="contact-info">
                <p>Contact us</p>
                <p>Telephone: 123-456-7890</p>
                <p>Email: info@gradevault.com</p>
            </div>
            <p>Guard your Grades with GradeVault</p>
        </div>

        <!-- JavaScript for List/Grid View -->

  <script>
    function listView() {
    let container = document.querySelector(".product-container");
    container.classList.add("list-view");
    container.classList.remove("grid-view");
}

function gridView() {
    let container = document.querySelector(".product-container");
    container.classList.add("grid-view");
    container.classList.remove("list-view");
}

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
