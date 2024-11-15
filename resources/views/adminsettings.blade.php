<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'GradeVault Settings')</title>
    <link rel="stylesheet" href="{{ asset('css/UserSettingStyle.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100..900&display=swap" rel="stylesheet">
</head>

<body id="settings">
    <div class="header">
        <div class="logo">
            <a href="{{ route('login') }}">
                <img src="{{ asset('images/GV.png') }}" alt="GradeVault Logo">
            </a>
        </div>
        <nav>
            <a href="{{ route('home') }}">Return to Homepage</a>
            <a href="#">Hi, {{ Auth::user()->name ?? 'Admin' }}</a>
            <a href="#">
                <ion-icon name="person-outline"></ion-icon>
            </a>
        </nav>
    </div>

    <div class="grid-container">
        <div class="sidebar">
            <a href="#dashboard" id="dashboard-link" class="sidebar-link">
                <ion-icon name="apps"></ion-icon> <span>Dashboard</span>
            </a>
            <a href="#user" id="user-link" class="sidebar-link">
                <ion-icon name="person"></ion-icon> <span>User</span>
            </a>
            <a href="#analytics" id="analytics-link" class="sidebar-link">
                <ion-icon name="stats-chart"></ion-icon> <span>Analytics</span>
            </a>
            <a href="#order" id="order-link" class="sidebar-link">
                <ion-icon name="cart"></ion-icon> <span>Order</span>
            </a>
            <a href="#inventory" id="inventory-link" class="sidebar-link">
                <ion-icon name="cube"></ion-icon> <span>Inventory</span>
            </a>
            <a href="#" id="logout-link"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <ion-icon name="exit"></ion-icon> <span>Logout</span>
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>

        <div class="main-admin-content">
            <section id="dashboard" class="section-content">
                <div class="admin-dashboard-boxes">
                    <div class="box2">
                        <div class="total-users-label">Total Users</div>
                        <div class="total-users-number">{{ $totalUsers }}</div>
                    </div>

                    <div class="box2">
                        <!-- Temporary until database is fixed -->
                        <div class="total-users-label">Total Sales</div>
                        <div class="total-users-number">{{ $totalUsers }}</div>
                    </div>
                    <div class="box2">
                        <div class="total-users-label">Total Income</div>
                        <div class="total-users-number">{{ $totalUsers }}</div>
                    </div>
                </div>
            </section>

            </section>

            <section id="user" class="section-content">
                <div class="admin-dashboard-boxes">
                    @foreach ($users as $user)
                        <div class="box">
                            <span>{{ $user->name }}</span>
                            <p>Email: {{ $user->email }}</p>
                        </div>
                    @endforeach
                </div>
            </section>

            <section id="analytics" class="section-content">
                <div class="admin-dashboard-boxes">
                    <div class="box2">
                        <div class="total-users-label">Total Users</div>
                        <div class="total-users-number">{{ $totalUsers }}</div>
                    </div>
            </section>

            <section id="order" class="section-content">
                <div class="admin-dashboard-boxes">
                    <div class="box2">
                        <div class="total-users-label">Total Orders</div>
                        <div class="total-users-number">{{ $totalUsers }}</div>
                    </div>
            </section>

            <section id="inventory" class="section-content">
            <div class="admin-dashboard-boxes">
                    <div class="box2">
                        <div class="total-users-label">Inventory</div>
                        <div class="total-users-number">{{ $totalUsers }}</div>
                    </div>
            </section>
        </div>
    </div>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    <script>

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
                targetSection.style.display = 'block';

                link.classList.add('active');
            });
        });

        hideAllSections();
        document.querySelector('#dashboard').style.display = 'block';
        document.querySelector('#dashboard-link').classList.add('active');
    </script>
</body>

</html>