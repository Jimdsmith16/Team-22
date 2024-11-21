<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>

<!-- Header Section -->
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
        <a href="#">Log In / Sign Up</a>
    </nav>
    <div class="search-bar">
        <input type="text" placeholder="Search...">
    </div>
</div>


<div class="product-container">
    @foreach($products as $product)
    <div class="gallery">
        <a target="_blank" href="{{ $product->image_link }}">
            <img src= "{{ $product->image_link }}" alt="{{ $product->name }}">
        </a>
        <div class="desc">{{ $product->name }}</div>
        <div class="price">£{{ number_format($product->price, 2) }}</div>
    </div>
    @endforeach
</div>
   
</body>
</html>

