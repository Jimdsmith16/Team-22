<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Products</title>
        <link rel="stylesheet" href="{{asset('css/styles.css')}}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
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
            </nav>
            <!-- Header Search Bar -->
            <div class="search-bar">
                <form action="{{route('products.search')}}" method="GET">
                    <input type="text" name="search" placeholder="Search Products...">
                    <button type="submit">Search</button>
                </form>
            </div>
        </div>

          <!-- Buttons to switch between views --> 
       
          <div class="view-buttons">
            <button onclick="listView()"><i class="fa fa-bars"></i> List</button>
            <button onclick="gridView()"><i class="fa fa-th-large"></i> Grid</button>
        </div>

        <!-- Content Section -->
        <div class="product-container">

            <!-- Category Dropdown -->
            <form action="{{ route('products.byCategory') }}" method="GET" class="category-filter">
                <label for="category">Filter by Category:</label> <p></p>
                <select name="category" id="category" onchange="this.form.submit()">
                    <option value="">All Categories</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </form>

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
        document.querySelector(".product-container").classList.add("list-view");
        document.querySelector(".product-container").classList.remove("grid-view");
    }

    function gridView() {
        document.querySelector(".product-container").classList.add("grid-view");
        document.querySelector(".product-container").classList.remove("list-view");
    }
</script>
    </body>
</html>
