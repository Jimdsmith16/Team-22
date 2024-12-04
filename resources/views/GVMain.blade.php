<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GradeVault</title>
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

        .search-bar input[type="text"] {
            padding: 5px;
            font-size: 1em;
        }  
        
        .bestseller-header {
            text-align: center;
            font-size: 2em;
            color: gold;
            margin-top: 20px;
        }

        .slideshow-container {
            max-width: 800px;
            position: relative;
            margin: 20px auto;
        }

        .slideshow-container img {
            width: 100%;
            height: auto;
        }

        .prev, .next {
            cursor: pointer;
            position: absolute;
            top: 50%;
            width: auto;
            padding: 16px;
            margin-top: -22px;
            color: white;
            font-weight: bold;
            font-size: 18px;
            transition: 0.6s ease;
            border-radius: 0 3px 3px 0;
            user-select: none;
        }

        .next {
            right: 0;
            border-radius: 3px 0 0 3px;
        }

        .prev:hover, .next:hover {
            background-color: #f1f1f1;
            color: black;
        }

        .info-rectangle {
            width: 80%;
            max-width: 400px;
            margin: 20px auto;
            padding: 40px;
            background-color: #D9E4F5;
            color: #000000;
            text-align: center;
            border-radius: 8px;
            font-size: 1.2em;
            border: 1.5px solid #000;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); 
        }

        .button-container {
            display: flex;
            justify-content: space-around;
            margin: 17px auto;
            max-width: 800px;
            gap: 40px; 
        }

        .button-container button {
             flex: 1; 
             padding: 50px 0;
               font-size: 1.5em;
                color: #fff;
             border: none;
              border-radius: 5px;
               cursor: pointer;
               transition: background-color 0.3s;
              background-color: #606297; 
              box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); 
        }

        .button-container .maths {
            background-color: #606297; 
        }

        .button-container .english {
            background-color: #2D306A; 
        }

        .button-container .science {
            background-color: #0E125B; 
        }

        .button-container button:hover {
            opacity: 0.8;
        }

        .ratings-container {
            display: flex;
            justify-content: space-around;
            gap: 20px;
            margin: 40px auto;
            max-width: 800px;
        }

        .review-box {
            background-color: #ffffff;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 20px;
            max-width: 350px;
            flex: 1;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .review-box .stars {
            color: gold;
            font-size: 1.5em;
            margin-bottom: 10px;
        }

        .review-box .review-text {
            font-size: 1em;
            color: #333;
            margin: 10px 0;
        }

        .review-box .review-author {
            font-style: italic;
            color: #666;
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
<!-- Displaying search results (hopefully)-->
            @if (count($results) > 0)
    <ul>
        @foreach ($results as $result)
            <li>{{ $result->name }}</li>
        @endforeach
    </ul>
@else
    <p>No results found.</p>
@endif
<!---->
            
        </div>
    </div>
    <div class="bestseller-header">Bestsellers</div>

    <div class="slideshow-container">
        <div class="mySlides1">
            <img src="{{asset('Images/English.png')}}" alt="English Language">
        </div>
      
        <div class="mySlides1">
            <img src="{{asset('Images/Science.png')}}" alt="Combined Science">
        </div>
      
        <div class="mySlides1">
            <img src="{{asset('Images/Maths.png')}}" alt="Maths">
        </div>
    </div>

    <div class="info-rectangle">
        <p>GCSE REVISION</p>
        <p>Key Stage 4 Revision Guides</p> 
    </div>

    <div class="button-container">
        <button class="maths">Maths</button>
        <button class="english">English</button>
        <button class="science">Science</button>
    </div>

    <div class="ratings-container">
        <div class="review-box">
            <div class="stars">★★★★☆</div>
            <p class="review-text">"Super easy to use and had every book I was looking for!"</p>
            <p class="review-author">- Alex P.</p>
        </div>
        <div class="review-box">
            <div class="stars">★★★★★</div>
            <p class="review-text">"Good resources and the tutor system was perfect for what my daughter needed."</p>
            <p class="review-author">- James L.</p>
        </div>
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
        let slideIndex = 0;
        showSlides();

        function showSlides() {
            const slides = document.getElementsByClassName("mySlides1");
            for (let i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            slideIndex++;
            if (slideIndex > slides.length) {slideIndex = 1}
            slides[slideIndex - 1].style.display = "block";
            setTimeout(showSlides, 3000); 
        }
    </script>

</body>
</html>
