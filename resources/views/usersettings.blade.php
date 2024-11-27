<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GradeVault User Settings</title>
    <link rel="stylesheet" href="{{ asset('css/UserSettingStyle.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100..900&display=swap" rel="stylesheet">
</head>

<body id="settings">
    <div class="header">
        <div class="logo">
            <img src="{{ asset('images/GV.png') }}" alt="GradeVault Logo">
        </div>
        <nav>
            <a href="{{url('/')}}">Home</a>
            <a href="{{url('tutor')}}">Tutors</a>
            <a href="{{url('about')}}">About</a>
            <a href="{{url('contact')}}">Contact Us</a>
            <a href="{{url('products')}}">Products</a>
            <a href="#">Hi {{ Auth::user()->name }}</a>
            <a href="#">
                <ion-icon name="person-outline"></ion-icon>
            </a>
        </nav>
    </div>

    <div class="grid-container">
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

        <div class="main-user-content">
            <section id="user-dashboard-link" class="section-content">
                <div class="user-dashboard-boxes">
                    <div class="box">
                        <span><strong>Name:</strong> {{ Auth::user()->name }}</span><br>
                        <span><strong>Email:</strong> {{ Auth::user()->email }}</span>
                    </div>
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
                <div class="user-dashboard-boxes">
                    <div class="box">
                        <span><strong>Address:</strong> Edit your shipping address.</span>
                    </div>
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
                            <p class="success-message">
                                Password successfully updated.
                            </p>
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
