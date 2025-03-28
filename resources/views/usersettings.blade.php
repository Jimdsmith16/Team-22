<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>GradeVault User Settings</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            margin: 0;
            padding: 0;
            overflow: hidden;
        }

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

        .sidebar {
            background-color: #f0f0f0;
            box-shadow: 0 10px 10px rgba(0, 0, 0, 0.2);
            display: flex;
            flex-direction: column;
            align-items: center;
            padding-top: 20px;
            position: fixed;
            top: 60px;
            left: 0;
            width: 250px;
            height: calc(100vh - 60px);
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

        .sidebar a.active {
            color: #02e652;
        }

        .main-user-content {
            margin-left: 250px;
            padding: 20px;
            height: calc(100vh - 60px);
            overflow-y: auto;
            margin-top: 60px;
        }

        .section-content {
            display: none;
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

        @media (max-width: 768px) {
            .sidebar {
                width: 60px;
            }

            .sidebar a {
                font-size: 12px;
                padding: 15px 10px;
            }

            .main-user-content {
                margin-left: 60px;
            }
        }

        .view-orders-btn {
            display: inline-block;
            padding: 14px 24px;
            font-size: 1rem;
            font-weight: bold;
            text-align: center;
            text-decoration: none;
            color: #ffffff;
            background: linear-gradient(135deg, #000000, #333333);
            border-radius: 50px;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease-in-out;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.2);
            margin-top: 15px;
            display: flex;
            justify-content: center;
            align-items: center;
            width: fit-content;
            min-width: 200px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .view-orders-btn:hover {
            background: linear-gradient(135deg, gold, #ffcc00);
            color: #000000;
            transform: translateY(-3px);
            box-shadow: 0px 6px 18px rgba(255, 215, 0, 0.4);
        }

        .view-orders-btn:active {
            transform: translateY(1px);
            box-shadow: 0px 3px 8px rgba(0, 0, 0, 0.2);
        }

        .order-history-text {
            font-size: 1rem;
            color: #555;
            text-align: center;
            margin-bottom: 20px;
            max-width: 80%;
            margin-left: auto;
            margin-right: auto;
            line-height: 1.6;
        }

        .alert.error {
            background-color: #e74c3c;
        }

        .alert {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #02e652;
            color: #ffffff;
            padding: 16px 24px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
            display: flex;
            align-items: center;
            gap: 12px;
            font-weight: bold;
            animation: fadeIn 0.3s ease-out;
            z-index: 9999;
        }

        .alert button {
            background: transparent;
            border: none;
            color: #ffffff;
            font-size: 20px;
            cursor: pointer;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeOut {
            from {
                opacity: 1;
            }

            to {
                opacity: 0;
            }
        }

        .password-input-container {
            position: relative;
        }

        .password-input-container input {
            width: 100%;
            padding-right: 40px;
        }

        .toggle-password {
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
            cursor: pointer;
            user-select: none;
        }
    </style>
</head>

<body id="settings">
    <!-- Header Section -->
    <div class="header">
        <div class="logo">
            <a href="/"> <img src="{{asset('Images/GV.png')}}" alt="GradeVault Logo" /></a>
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

    <!-- Sidebar -->
    <div class="sidebar">
        <a href="#user-dashboard-link" class="sidebar-link"><ion-icon name="apps"></ion-icon> User Dashboard</a>
        <a href="#order-history" class="sidebar-link"><ion-icon name="clipboard"></ion-icon> Order History</a>
        <a href="#address" class="sidebar-link"><ion-icon name="navigate-circle"></ion-icon> Edit Address</a>
        <a href="#payment-method" class="sidebar-link"><ion-icon name="card"></ion-icon> Payment Method</a>
        <a href="#security" class="sidebar-link"><ion-icon name="lock-closed"></ion-icon> Security</a>
        <a href="#" id="logout-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <ion-icon name="exit"></ion-icon> Logout
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">@csrf</form>
    </div>

    <!-- Main Content -->
    <div class="main-user-content">
        <section id="user-dashboard-link" class="section-content">
            <div class="user-edit-container">
                <header>
                    <h2>Edit Your Information</h2>
                </header>
                <form method="POST" action="{{ route('profile.update') }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input id="name" name="name" type="text" value="{{ Auth::user()->name }}" required />
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input id="email" name="email" type="email" value="{{ Auth::user()->email }}" required />
                    </div>
                    <button type="submit" class="submit-button1">Update Information</button>
                </form>
            </div>

            @if(session('status') === 'user-updated')
                <div id="success-alert" class="alert">
                    <span> Your information was updated successfully!</span>
                    <button id="alert-close">&times;</button>
                </div>
            @endif
        </section>

        @if($errors->any())
            <div id="error-alert" class="alert error">
                <span> {{ $errors->first() }}</span>
                <button id="error-alert-close">&times;</button>
            </div>
        @endif

        <section id="order-history" class="section-content">
            <h2>Order History</h2>
            <p class="order-history-text">Your past orders will be displayed here.</p>
            <a href="{{ route('previous.orders') }}" class="btn view-orders-btn">View Previous Orders</a>
        </section>

        <section id="address" class="section-content">
            <div class="address-container">
                <header>
                    <h2>Edit Address</h2>
                </header>
                <form method="POST" action="{{ route('address.update') }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="address_line1">Address Line 1</label>
                        <input id="address_line1" name="address_line1" type="text"
                            value="{{ old('address_line1', auth()->user()->address->address_line1 ?? '') }}" required
                            aria-label="Address Line 1" />
                        @error('address_line1')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="address_line2">Address Line 2</label>
                        <input id="address_line2" name="address_line2" type="text"
                            value="{{ old('address_line2', auth()->user()->address->address_line2 ?? '') }}"
                            aria-label="Address Line 2" />
                        @error('address_line2')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="postcode">Postcode</label>
                        <input id="postcode" name="postcode" type="text"
                            value="{{ old('postcode', auth()->user()->address->postcode ?? '') }}" required
                            aria-label="Postcode" />
                        @error('postcode')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="country">Country</label>
                        <input id="country" name="country" type="text"
                            value="{{ old('country', auth()->user()->address->country ?? '') }}" required
                            aria-label="Country" />
                        @error('country')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="submit" class="submit-button">Update Address</button>
                </form>
                @if (session('status') === 'address-updated')
                    <div id="address-success-alert" class="alert">
                        <span>Address successfully updated.</span>
                        <button id="address-alert-close">&times;</button>
                    </div>
                @endif
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
                <form method="POST" action="{{ route('user.password.update') }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="current_password">Current Password</label>
                        <div class="password-input-container">
                            <input id="current_password" name="current_password" type="password" required />
                            <span class="toggle-password" data-target="current_password">
                                <ion-icon name="eye-off-outline"></ion-icon>
                            </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password">New Password</label>
                        <div class="password-input-container">
                            <input id="password" name="password" type="password" required />
                            <span class="toggle-password" data-target="password">
                                <ion-icon name="eye-off-outline"></ion-icon>
                            </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">Confirm New Password</label>
                        <div class="password-input-container">
                            <input id="password_confirmation" name="password_confirmation" type="password" required />
                            <span class="toggle-password" data-target="password_confirmation">
                                <ion-icon name="eye-off-outline"></ion-icon>
                            </span>
                        </div>
                    </div>
                    <button type="submit" class="submit-button">Save</button>
                </form>
                @if (session('status') === 'password-updated')
                    <div id="password-success-alert" class="alert">
                        <span>Password successfully updated.</span>
                        <button id="password-alert-close">&times;</button>
                    </div>
                @endif
            </div>
        </section>
    </div>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            console.log("DOMContentLoaded fired. Current hash:", window.location.hash);
            const links = document.querySelectorAll('.sidebar-link');
            const sections = document.querySelectorAll('.section-content');

            function hideAll() {
                sections.forEach(s => s.style.display = 'none');
            }

            function resetLinks() {
                links.forEach(l => l.classList.remove('active'));
            }

            function showSection(hash) {
                console.log("Trying to show section for hash:", hash);
                const section = document.querySelector(hash);
                const link = document.querySelector(`.sidebar-link[href="${hash}"]`);
                if (section && link) {
                    hideAll();
                    resetLinks();
                    section.style.display = 'block';
                    link.classList.add('active');
                    document.querySelector('.main-user-content').scrollTop = 0;
                    console.log("Displayed section:", hash);
                } else {
                    console.error("Section or link not found for hash:", hash);
                }
            }

            links.forEach(link => {
                link.addEventListener('click', e => {
                    e.preventDefault();
                    const hash = link.getAttribute('href');
                    history.pushState(null, '', hash);
                    showSection(hash);
                });
            });

            const initialHash = window.location.hash || '#user-dashboard-link';
            showSection(initialHash);
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const alert = document.getElementById('success-alert');
            const closeBtn = document.getElementById('alert-close');

            if (alert) {
                const timer = setTimeout(dismissalert, 5000);

                closeBtn.addEventListener('click', () => {
                    clearTimeout(timer);
                    dismissalert();
                });

                function dismissalert() {
                    alert.style.animation = 'fadeOut 0.3s forwards';
                    setTimeout(() => alert.remove(), 300);
                }
            }
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const errAlert = document.getElementById('error-alert');
            const errClose = document.getElementById('error-alert-close');

            if (errAlert) {
                errClose.addEventListener('click', () => errAlert.remove());
            }
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const addressAlert = document.getElementById('address-success-alert');
            const addressAlertClose = document.getElementById('address-alert-close');

            if (addressAlert) {
                const timer = setTimeout(() => {
                    dismissAddressAlert();
                }, 5000);

                addressAlertClose.addEventListener('click', () => {
                    clearTimeout(timer);
                    dismissAddressAlert();
                });

                function dismissAddressAlert() {
                    addressAlert.style.animation = 'fadeOut 0.3s forwards';
                    setTimeout(() => addressAlert.remove(), 300);
                }
            }
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            document.querySelectorAll('.toggle-password').forEach(function (toggle) {
                toggle.addEventListener('click', function () {
                    const targetId = this.getAttribute('data-target');
                    const input = document.getElementById(targetId);
                    if (input.getAttribute('type') === 'password') {
                        input.setAttribute('type', 'text');
                        this.innerHTML = '<ion-icon name="eye-outline"></ion-icon>';
                    } else {
                        input.setAttribute('type', 'password');
                        this.innerHTML = '<ion-icon name="eye-off-outline"></ion-icon>';
                    }
                });
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const passwordAlert = document.getElementById('password-success-alert');
            const passwordAlertClose = document.getElementById('password-alert-close');

            if (passwordAlert) {
                const timer = setTimeout(() => {
                    dismissPasswordAlert();
                }, 5000);

                passwordAlertClose.addEventListener('click', () => {
                    clearTimeout(timer);
                    dismissPasswordAlert();
                });

                function dismissPasswordAlert() {
                    passwordAlert.style.animation = 'fadeOut 0.3s forwards';
                    setTimeout(() => passwordAlert.remove(), 300);
                }
            }
        });
    </script>

</body>

</html>