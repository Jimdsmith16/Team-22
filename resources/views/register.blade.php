<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GradeVault Login</title>
    <link rel="stylesheet" href="{{ asset('css/LoginStyles.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100..900&display=swap" rel="stylesheet">
</head>
<body id="loginpage">
    <div class="header">
        <div class="logo">
            <a href="{{ route('login') }}">
                <img src="{{ asset('images/GV.png') }}" alt="GradeVault Logo">
            </a>
        </div>
        <nav>
            <a href="#">GCSE</a>
            <a href="#">A-Level</a>
            <a href="#">Tutors</a>
            <a href="#">About</a>
            <a href="#">Contact Us</a>
            <a href="{{ route('login') }}">Login</a>
        </nav>
        <div class="search-bar">
            <input type="text" placeholder="Search...">
        </div>
    </div>

    <div class="wrapper">
        <div class="form-box">
            <h2>Register</h2>
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <div class="input-box">
                    <span class="icon">
                        <ion-icon name="person"></ion-icon>
                    </span>
                    <input type="text" id="username" name="username" placeholder="Username" required>
                </div>
                <div class="input-box">
                    <span class="icon">
                        <ion-icon name="mail"></ion-icon>
                    </span>
                    <input type="text" id="email" name="email" placeholder="Email" required>
                </div>
                <div class="input-box">
                    <span class="icon">
                        <ion-icon name="lock-closed"></ion-icon>
                    </span>
                    <input type="password" id="password" name="password" placeholder="Password" required>
                </div>
                <div class="terms-conditons">
                    <label><input type="checkbox" name="terms"> I accept the Terms and Conditions</label>
                </div>
                <button class="btn" type="submit">Register</button>
            </form>
            <p class="login-register">Already have an account? <a href="{{ route('login') }}">Login</a></p>
        </div>
    </div>

    <script src="{{ asset('js/script.js') }}"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>
