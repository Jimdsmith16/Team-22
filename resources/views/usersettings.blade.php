<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GradeVault User Settings</title>
    <link rel="stylesheet" href="{{ asset('css/UserSettingStyle.css') }}">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100..900&display=swap" rel="stylesheet">
</head>

<body id="settings">
    <div class="header">
        <div class="logo">
            <a href="{{ route('home') }}">
                <img src="images/GV.png" alt="GradeVault Logo">
            </a>
        </div>
        <nav>
            <a href="{{ route('home') }}">Return to Homepage</a>
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

            <a href="#" id="logout-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
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
                <div class="user-dashboard-boxes">
                    <div class="update-password-container">
                        <header>
                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                {{ __('Update Password') }}
                            </h2>
                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                {{ __('Create A Secure Password') }}
                            </p>
                        </header>

                        <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
                            @csrf
                            @method('put')

                            <div>
                                <x-input-label for="update_password_current_password" :value="__('Current Password')" />
                                <x-text-input id="update_password_current_password" name="current_password" type="password" class="mt-1 block w-full" autocomplete="current-password" />
                                <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="update_password_password" :value="__('New Password')" />
                                <x-text-input id="update_password_password" name="password" type="password" class="mt-1 block w-full" autocomplete="new-password" />
                                <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="update_password_password_confirmation" :value="__('Confirm Password')" />
                                <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full" autocomplete="new-password" />
                                <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
                            </div>

                            <div class="flex items-center gap-4">
                                <x-primary-button class="custom-save-button">{{ __('Save') }}</x-primary-button>

                                @if (session('status') === 'password-updated')
                                    <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="text-sm text-gray-600 dark:text-gray-400">
                                        {{ __('Saved.') }}
                                    </p>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
            </section>

            <section id="logout-section" class="section-content">
                <div class="user-dashboard-boxes">
                    <div class="box">
                        <span><strong>Logout:</strong> Click the logout button to sign out.</span>
                    </div>
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
                    targetSection.style.display = 'block';
                    link.classList.add('active');
                });
            });

            hideAllSections();
            document.querySelector('#user-dashboard-link').style.display = 'block';
            document.querySelector('#user-dashboard-link').classList.add('active');
        });
    </script>
</body>

</html>
