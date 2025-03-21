<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Previous Orders</title>
        <style>
           html, body {
    height: 100%;
    display: flex;
    flex-direction: column;
    font-family: Arial, sans-serif;
}

.content {
    flex: 1; /* Pushes footer down when there's less content */
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
            }
            
            .header nav a:hover {
                color: gold;
            }


            .search-bar input[type="text"] {
                padding: 5px;
                font-size: 1em;
            }
/* Ensure Previous Orders container is properly spaced */
.content {
    max-width: 900px;
    margin: 80px auto 30px;
    background-color: #e7e9fc;
    
    padding: 40px;
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    text-align: center;
}

/* Add proper spacing to order boxes */
.order {
    background: #f9f9f9;
    max-width: 600px;
    padding: 20px;
    border-radius: 13px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    margin: 20px auto;
    margin-bottom: 30px; /* Increased margin to prevent overlap */
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

/* Ensure product details don't overlap */
.product-details {
    display: flex;
    align-items: center;
    justify-content: space-between;
    background: #eef2ff;
    padding: 15px;
    border-radius: 10px;
    width: 100%;
    margin: 15px 0; /* More margin for spacing */
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    gap: 15px;
}


.order:hover {
    transform: translateY(-5px);
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
}

.order h3 {
    font-size: 1.3em;
    margin-bottom: 15px;
    color: #444;
}


.product-details img {
    width: 100px;
    height: 100px;
    border-radius: 8px;
    object-fit: cover;
    flex-shrink: 0;
}

.product-info {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    flex-grow: 1;
}

.product-info p {
    margin: 2px 0;
    font-size: 1em;
    color: #333;
}

.total {
    font-weight: bold;
    font-size: 1.3em;
    margin-top: 15px;
    color: #222;
}

            .footer {
    background-color: #000;
    color: #fff;
    text-align: center;
    padding: 15px 0;
    width: 100%;
    margin-top: auto; /* Pushes footer to bottom */
}


    .footer p {
      margin: 5px 0;
    }

    .footer .contact-info {
      display: flex;
      justify-content: center;
      gap: 15px;
      flex-wrap: wrap;
    }

    .footer .contact-info p {
      margin: 0;
      font-size: 0.9em;
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
    bottom: 30px; /* Adjust the distance from the footer */
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

          /* DARK MODE GENERAL STYLES */
.dark-mode {
    background-color: #121212;
    color: #e0e0e0;
}

/* Ensure all text and links are readable */
.dark-mode a,
.dark-mode p,
.dark-mode h1,
.dark-mode h3,
.dark-mode .total {
    color:rgb(11, 11, 11);
}

/* HEADER & FOOTER */
.dark-mode .header,
.dark-mode .footer {
    background-color: #333;
    
}

.dark-mode .header nav a {
    color: white;
}
/* Change 'Previous Orders' text to black in dark mode */
.dark-mode h2 {
    color: black;
}

/* Match footer background color with header in dark mode */
.dark-mode .footer {
    background-color: #333;
    color: white; /* Ensure footer text is white */
}

/* Ensure all footer text stays white */
.dark-mode .footer p {
    color: white;
}

#returnForm {
    display: none;
    position: fixed;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
    background-color: white;
    padding: 20px;
    border: 1px solid gray;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    z-index: 1000;
    /* Ensure the form doesn't disrupt the page layout */
    width: 100%;
    max-width: 600px; /* Added max-width for consistency */
    height: auto;
    box-sizing: border-box;
    border-radius: 12px; /* Added border-radius to match other elements */
}

#returnForm h2 {
    font-size: 1.5em;
    margin-bottom: 20px;
    color: #444;
}

#returnForm label {
    display: block;
    margin-top: 10px;
    font-size: 1em;
    color: #555;
}

#returnForm textarea {
    width: 100%;
    padding: 10px;
    margin-top: 5px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 1em;
    resize: none;
    box-sizing: border-box;
}

#returnForm button {
    background-color: #000;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    font-size: 1em;
    cursor: pointer;
    transition: background-color 0.3s ease;
    margin: 0 10px; /* Added horizontal margin between buttons */
}

#returnForm button:hover {
    background-color: #0056b3;
}

#returnForm button:disabled {
    background-color: #ccc;
    cursor: not-allowed;
}


        </style>
    </head>
    <body>
        <div class="header">
            <div class="logo">
            <a href="/"> <img src="{{asset('Images/GV.png')}}" alt="GradeVault Logo"></a>
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
            <div class="font-toggle-container">
    <