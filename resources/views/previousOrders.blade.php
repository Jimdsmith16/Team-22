<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Previous Orders</title>
    <link rel="stylesheet" href="previousOrders.css">
</head>
<body>

<header>
    <div class="logo">
        <img src="#" alt="GradeVault Logo">
    </div>
    <nav>
        <a href="#">GCSE</a>
        <a href="#">A-level</a>
        <a href="#">Tutors</a>
        <a href="#">About</a>
        <a href="#">Contact us</a>
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
