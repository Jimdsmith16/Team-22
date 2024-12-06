<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GradeVault Register</title>
    <link rel="stylesheet" href="{{ asset('css/LoginStyles.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100..900&display=swap" rel="stylesheet">
</head>
<body id="register-page">
    <div class="header">
        <div class="logo">
            <img src="{{ asset('Images/GV.png') }}" alt="GradeVault Logo">
        </div>
        <nav>
            <a href="{{url('/')}}">Home</a>
            <a href="{{url('tutor')}}">Tutors</a>
            <a href="{{url('about')}}">About</a>
            <a href="{{url('contact')}}">Contact Us</a>
            <a href="{{url('products')}}">Products</a>
        </nav>
        <div class="search-bar">
            <form action="{{route('products.search')}}" method="GET">
                <input type="text" name="search" placeholder="Search Products...">
                <button type="submit">Search</button>
            </form>
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
                    <input type="text" id="name" name="name" placeholder="Name" value="{{ old('name') }}" required>
                    @error('name')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>
                <div class="input-box">
                    <span class="icon">
                        <ion-icon name="mail"></ion-icon>
                    </span>
                    <input type="email" id="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
                    @error('email')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>
                <div class="input-box">
                    <span class="icon">
                        <ion-icon name="lock-closed"></ion-icon>
                    </span>
                    <input type="password" id="password" name="password" placeholder="Password" required>
                    @error('password')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>
                <div class="input-box">
                    <span class="icon">
                        <ion-icon name="lock-closed"></ion-icon>
                    </span>
                    <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password" required>
                </div>

                <div class="terms-conditons">
                    <label>
                        <input type="checkbox" name="terms" required> I accept the Terms and Conditions
                    </label>
                    @error('terms')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>
                
                <button class="btn" type="submit">Register</button>
            </form>
            <p class="login-register">Already have an account? <a href="{{ route('login') }}">Login</a></p>
        </div>
    </div>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>

<style>
    * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "Noto Sans JP", sans-serif;
    font-weight: 600;
}

body {
    height: 100%;
    padding-top: 60px;
    background-color: #0ac135;
}

/* Header CSS */
.header {
    background-color: #000;
    padding: 0 15px;
    height: 60px;
    color: #fff;
    display: flex;
    justify-content: space-between;
    align-items: center;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    z-index: 10;
}

.header .logo img {
    height: 50px;
}

.header nav a {
    color: #fff;
    text-decoration: none;
    margin: 0 10px;
}

.search-bar input[type="text"] {
    padding: 5px;
    font-size: 1em;
}

/* Register Page */
#register-page {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    background-image: url('{{ asset('Images/Login.jpg') }}');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
}

.wrapper {
    width: 350px;
    padding: 10px;
    margin-top: 5px;
    background: transparent;
    border: 2px solid rgba(255, 255, 255, 0.5);
    border-radius: 15px;
    backdrop-filter: blur(20px);
    box-shadow: 0 0 30px rgba(0, 0, 0, 0.5);
    text-align: center;
    display: flex;
    justify-content: center;
    align-items: center;

}

.wrapper .form-box h2 {
    font-size: 2em;
    color: #000000;
    margin-bottom: 20px;
    text-align: center;
}

.input-box {
    position: relative;
    width: 100%;
    margin: 20px 0;
    display: flex;
    align-items: center; 
}

.input-box .icon {
    font-size: 1.5em; 
    color: #162938;
    margin-right: 20px; 
    display: flex;
    align-items: center;
}

.input-box input {
    width: 100%;
    height: 50px;
    background: transparent;
    border: none;
    border-bottom: 2px solid #162938;
    outline: none;
    font-size: 1em;
    padding-left: 10px;
    color: #000000;
}

.input-box label {
    position: absolute;
    top: 15px;
    left: 10px;
    color: #162938;
    font-size: 1em;
    pointer-events: none;
}

.input-box input:focus {
    border-bottom: 2px solid #ead602;
}

.remember-forgot {
    display: flex;
    justify-content: space-between;
    font-size: 14px;
    color: #000000;
    margin-bottom: 20px;
}

.remember-forgot label {
    display: flex;
    align-items: center;
    gap: 5px;
}

.remember-forgot a {
    color: #000000;
    text-decoration: none;
}

.remember-forgot a:hover {
    text-decoration: underline;
}

.btn {
    width: 100%;
    background: transparent;
    border: 2px solid #000000;
    padding: 10px;
    cursor: pointer;
    color: #000000;
    border-radius: 5px;
    font-size: 16px;
    margin-top: 10px; 
}

.btn:hover {
    background: #0ac135;
}

.login-register {
    margin-top: 20px;
    font-size: 14px;
    color: #000000;
}

.login-register a {
    color: #000000;
    text-decoration: none;
}

.login-register a:hover {
    text-decoration: underline;
}
</style>
