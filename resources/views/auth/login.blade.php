<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GradeVault Login</title>
    <link rel="stylesheet" href="{{ asset('css/LoginStyles.css') }}">
</head>
<body id="loginpage">  
<div class="header">
        <div class="logo">
            <img src="{{ asset('images/GV.png') }}" alt="GradeVault Logo">
        </div>
        <nav>
            <a href="#">GCSE</a>
            <a href="#">A-Level</a>
            <a href="#">Tutors</a>
            <a href="#">About</a>
            <a href="#">Contact Us</a>
        </nav>
        <div class="search-bar">
            <input type="text" placeholder="Search...">
        </div>
    </div>

    <div class="wrapper">
        <div class="form-box">
            <h2>Login</h2>
            <form action="{{ route('login') }}" method="post">
                @csrf

                <div class="input-box">
                    <span class="icon">
                        <ion-icon name="mail"></ion-icon>
                    </span>
                    <input type="email" id="email" name="email" placeholder="Email" required value="{{ old('email') }}">
                </div>
                @error('email')
                    <div class="error-message">{{ $message }}</div>
                @enderror

                <div class="input-box">
                    <span class="icon">
                        <ion-icon name="lock-closed"></ion-icon>
                    </span>
                    <input type="password" id="password" name="password" placeholder="Password" required>
                </div>
                @error('password')
                    <div class="error-message">{{ $message }}</div>
                @enderror

                <div class="remember-forgot">
                    <label><input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me</label>
                    <a href="{{ route('password.request') }}">Forgot Password?</a>
                </div>

                <button class="btn" type="submit">Login</button>
            </form>
            <p class="login-register">Don't have an account? <a href="{{ route('register') }}">Register</a></p>
        </div>
    </div>
    
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</body>
</html>
