<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Products</title>
        <link rel="stylesheet" href="{{asset('css/styles.css')}}">
    </head>
    <body>
        <!-- Header Section -->
        <div class="header">
            <div class="logo">
                <img src="{{asset('Images/GV.png')}}" alt="GradeVault Logo">
            </div>
            <!-- Header Nav Bar -->
            <nav>
                <a href="{{url('/')}}">Home</a>
                <a href="{{url('tutor')}}">Tutors</a>
                <a href="{{url('about')}}">About</a>
                <a href="{{url('contact')}}">Contact Us</a>
                <a href="{{url('products')}}">Products</a>
            </nav>
            <!-- Header Search Bar -->
            <div class="search-bar">
                <form action="{{route('products.search')}}" method="GET">
                    <input type="text" name="search" placeholder="Search Products...">
                    <button type="submit">Search</button>
                </form>
            </div>
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

        <!-- Footer Section -->
        <footer>
            <p>Contact us</p>
            <p>Telephone: 0788635240</p>
            <p>Email: GradeVault@gmail.com</p>
            <p>Guard your Grades with GradeVault</p>
        </footer>

    </body>
</html>
