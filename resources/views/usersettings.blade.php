<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>GradeVault User Settings</title>
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
                margin: 0;
                padding: 0;
                height: 100vh;
                overflow: hidden;
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
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                z-index: 10;
            }

            .header .logo img {
                height: 50px;
            }

            nav {
                display: flex;
                justify-content: space-between;
                width: 100%;
            }

            .nav-links {
                display: flex;
                justify-content: center;
                flex-grow: 1;
                gap: 20px;
            }

            .nav-links a {
                color: #fff;
                text-decoration: none;
                margin: 0 10px;
                transition: color 0.3s ease;
            }

            .nav-links a:hover {
                color: gold;
            }

            .user-info {
                display: flex;
                align-items: center;
                gap: 10px;
            }

            .user-info a {
                color: #fff;
                text-decoration: none;
            }

            nav ion-icon {
                font-size: 25px;
                color: #ffffff;
            }

            /* Body Styling */
            .grid-container {
                display: grid;
                grid-template-columns: 250px 1fr;
                height: calc(100vh - 60px);
                margin-top: 60px;
                overflow: hidden;
            }

            .sidebar {
                background-color: #f0f0f0;
                box-shadow: 0 10px 10px rgba(0, 0, 0, 0.2);
                display: flex;
                flex-direction: column;
                align-items: center;
                padding-top: 20px;
                height: 100%;
                position: sticky;
                top: 0;
                overflow-y: auto;
            }

            .sidebar a {
                text-align: center;
                color: #000000;
                text-decoration: none;
                padding: 22px 0;
                width: 100%;
                font-size: 18px;
                transition: color 0.3s;
            }

            .sidebar a ion-icon {
                font-size: 24px;
                vertical-align: middle;
            }

            .main-user-content {
                padding: 20px;
                display: flex;
                flex-direction: column;
                overflow-y: auto;
            }

            .section-content {
                display: none;
            }

            .sidebar a.active {
                color: #02e652;
            }

            .box {
                width: 400px;
                height: 100px;
                background-color: #f5f5f5;
                border: 2px solid #000;
                border-radius: 8px;
                display: flex;
                flex-direction: column;
                align-items: flex-start;
                justify-content: center;
                padding-left: 20px;
                box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
                position: relative;
            }

            .box span {
                font-size: 16px;
                font-weight: bold;
                color: #333;
                margin: 5px;
            }

            .password-container {
                padding: 20px;
                display: flex;
                flex-direction: column;
                gap: 20px;
            }

            .password-container header {
                margin-bottom: 20px;
                display: flex;
                flex-direction: column;
                gap: 10px;
            }

            .password-container h2 {
                font-size: 1.5rem;
                color: #333333;
                margin: 0;
                padding: 0;
            }

            .password-container p {
                font-size: 0.9rem;
                color: #666666;
                margin: 0;
            }

            .form-group {
                display: flex;
                flex-direction: column;
                margin-bottom: 15px;
                gap: 8px;
            }

            .form-group input {
                width: 100%;
                padding: 12px;
                font-size: 0.9rem;
                border: 1px solid #cccccc;
                border-radius: 12px;
                box-sizing: border-box;
                transition: border 0.3s ease;
            }

            .form-group input:focus {
                border-color: #02e652;
                outline: none;
            }


            .submit-button,
            .submit-button1 {
                width: 100%;
                padding: 12px;
                background-color: #000000;
                color: #ffffff;
                border: none;
                border-radius: 12px;
                transition: background-color 0.3s ease, color 0.3s ease;
                font-size: 0.9rem;
                cursor: pointer;
            }

            .submit-button:hover,
            .submit-button1:hover {
                background-color: gold;
                color: #000000;
            }

            /* Responsive Design */
            @media (max-width: 768px) {
                .grid-container {
                    grid-template-columns: 60px 1fr;
                }

                .sidebar a {
                    font-size: 12px;
                    padding: 15px 10px;
                }
            }
        </style>
    </head>

    <body id="settings">
        <!-- Header Section -->
        <div class="header">
            <div class="logo">
                <img src="{{ asset('Images/GV.png') }}" alt="GradeVault Logo">
            </div>
            <!-- Header Nav Bar -->
            <nav>
                <div class="nav-links">
                    <a href="{{url('/')}}">Home</a>
                    <a href="{{url('tutor')}}">Tutors</a>
                    <a href="{{url('about')}}">About</a>
                    <a href="{{url('contact')}}">Contact Us</a>
                    <a href="{{url('products')}}">Products</a>
                </div>
                <div class="user-info">
                    <a href="#">Hi {{ Auth::user()->name }}</a>
                    <a href="#">
                        <ion-icon name="person-outline"></ion-icon>
                    </a>
                </div>
            </nav>
        </div>

        <!-- Content Section -->
        <div class="grid-container">
            <!-- Settings Sidebar -->
            <div class="sidebar">
                <a href="#user-dashboard-link" class="sidebar-link">
                    <ion-icon name="apps"></ion-icon> <span>User Dashboard</span>
                </a>
                <a href="#order-history" class="sidebar-link">
                    <ion-icon name="clipboard"></ion-icon> <span>Order History</span>
                </a>
                <a href="#address" class="sidebar-link">
                    <ion-icon name="navigate-circle"></ion-icon> <span>Edit Address</span>
                </a>
                <a href="#payment-method" class="sidebar-link">
                    <ion-icon name="card"></ion-icon> <span>Payment Method</span>
                </a>
                <a href="#security" class="sidebar-link">
                    <ion-icon name="lock-closed"></ion-icon> <span>Security</span>
                </a>
                <a href="#" id="logout-link"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <ion-icon name="exit"></ion-icon> <span>Logout</span>
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>

            <!-- Settings Content -->
            <div class="main-user-content">
                <section id="user-dashboard-link" class="section-content">
                    <div class="user-edit-container">
                        <header>
                            <h2>Edit User Information</h2>
                        </header>

                        <form method="POST" action="{{ route('profile.update') }}">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="name">Name</label>
                                <input id="name" name="name" type="text" value="{{ Auth::user()->name }}" required />
                                @error('name')
                                    <span class="error-message">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input id="email" name="email" type="email" value="{{ Auth::user()->email }}" required />
                                @error('email')
                                    <span class="error-message">{{ $message }}</span>
                                @enderror
                            </div>

                            <button type="submit1" class="submit-button1">Update Information</button>

                            @if (session('status') === 'user-updated')
                                <p class="success-message">Information successfully updated.</p>
                            @endif
                        </form>
                    </div>
                </section>

                <section id="order-history" class="section-content">
                    <div class="user-dashboard-boxes">
                        <div class="box">
                            <span><strong>Order History:</strong> Your past orders will appear here.</span>
                        </div>
                    </div>
                </section>

                <section id="address" class="section-content">
                    <div class="address-container">
                        <header>
                            <h2>Edit Address Information</h2>
                        </header>

                        <form method="POST" action="{{ route('address.update') }}">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="address_line1">New Address Line 1</label>
                                <input id="address_line1" name="address_line1" type="text"
                                    value="{{ old('address_line1') }}" required />
                                @error('address_line1')
                                    <span class="error-message">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="address_line2">New Address Line 2</label>
                                <input id="address_line2" name="address_line2" type="text"
                                    value="{{ old('address_line2') }}" />
                                @error('address_line2')
                                    <span class="error-message">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="postcode">New Postcode</label>
                                <input id="postcode" name="postcode" type="text" value="{{ old('postcode') }}" required />
                                @error('postcode')
                                    <span class="error-message">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="country">New Country</label>
                                <input id="country" name="country" type="text" value="{{ old('country') }}" required />
                                @error('country')
                                    <span class="error-message">{{ $message }}</span>
                                @enderror
                            </div>

                            <button type="submit" class="submit-button">Update Address</button>

                            @if (session('status') === 'address-updated')
                                <p class="success-message">Address successfully updated.</p>
                            @endif
                        </form>
                    </div>
                </section>

                <section id="payment-method" class="section-content">
                    <div class="user-dashboard-boxes">
                        <div class="box">
                            <span><strong>Payment Method:</strong> Manage your payment methods here.</span>
                        </div>
                    </div>
                </section>

                <section id="security" class="section-content">
                    <div class="password-container">
                        <header>
                            <h2>Update Password</h2>
                            <p>Create a secure password.</p>
                        </header>

                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="current_password">Current Password</label>
                                <input id="current_password" name="current_password" type="password" required />
                                @error('current_password')
                                    <span class="error-message">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="password">New Password</label>
                                <input id="password" name="password" type="password" required />
                                @error('password')
                                    <span class="error-message">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="password_confirmation">Confirm New Password</label>
                                <input id="password_confirmation" name="password_confirmation" type="password" required />
                                @error('password_confirmation')
                                    <span class="error-message">{{ $message }}</span>
                                @enderror
                            </div>

                            <button type="submit" class="submit-button">Save</button>

                            @if (session('status') === 'password-updated')
                                <p class="success-message">Password successfully updated.</p>
                            @endif
                        </form>
                    </div>
                </section>
            </div>
        </div>

        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const links = document.querySelectorAll('.sidebar-link');
                const sections = document.querySelectorAll('.section-content');

                function hideAllSections() {
                    sections.forEach(section => section.style.display = 'none');
                }

                function resetActiveLinks() {
                    links.forEach(link => link.classList.remove('active'));
                }

                links.forEach(link => {
                    link.addEventListener('click', function (event) {
                        event.preventDefault();
                        hideAllSections();
                        resetActiveLinks();

                        const targetSection = document.querySelector(link.getAttribute('href'));
                        if (targetSection) {
                            targetSection.style.display = 'block';
                            link.classList.add('active');
                        }
                    });
                });

                hideAllSections();
                const defaultSection = document.querySelector('#user-dashboard-link');
                defaultSection.style.display = 'block';
                document.querySelector('.sidebar-link[href="#user-dashboard-link"]').classList.add('active');
            });
        </script>
    </body>
</html>
