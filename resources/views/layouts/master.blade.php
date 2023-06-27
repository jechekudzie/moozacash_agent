<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">

    <!-- set up csrf meta tag for ajax calls here-->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="apple-touch-icon" sizes="72x72" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <link href="images/favicon.png" rel="icon"/>
    <title>MoozaCash - Money Transfer and Online Payments HTML Template</title>

    <!-- Web Fonts
    ============================================= -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap">

    <!-- Stylesheet
    ============================================= -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@18.1.1/build/css/intlTelInput.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/font-awesome/css/all.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/bootstrap-select/css/bootstrap-select.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/currency-flags/css/currency-flags.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/owl.carousel/assets/owl.carousel.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/stylesheet.css') }}"/>
    <!-- Colors Css -->
    <style>
        .iti.iti--allow-dropdown.iti--show-flags {
            width: 100% !important;
        }
    </style>
</head>
<body>

<!-- Preloader -->
<div id="preloader">
    <div data-loader="dual-ring"></div>
</div>
<!-- Preloader End -->

<!-- Document Wrapper
============================================= -->
<div id="main-wrapper">
    <!-- Header
    ============================================= -->
    <header id="header">
        <div class="container">
            <div class="header-row">
                <div class="header-column justify-content-start">
                    <!-- Logo
                    ============================= -->
                    <div class="logo me-3"><a class="d-flex" href="{{ url('/') }}" title="MoozaCash Home"><img
                                src="{{ asset('images/logo.png') }}" style="width: 80%" alt="MoozaCash Logo"/></a></div>
                    <!-- Logo end -->
                    <!-- Collapse Button
                    ============================== -->
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#header-nav">
                        <span></span> <span></span> <span></span></button>
                    <!-- Collapse Button end -->

                    <!-- Primary Navigation
                    ============================== -->
                    <nav class="primary-menu navbar navbar-expand-lg">
                        <div id="header-nav" class="collapse navbar-collapse">
                            <ul class="navbar-nav me-auto">
                                <li @if(request()->routeIs('dashboard')) class="active" @endif><a
                                        href="{{ url('dashboard') }}">Dashboard</a></li>
                                <li @if(request()->routeIs('send-money')) class="active" @endif><a
                                        href="{{ url('/transactions/send-money') }}">Send Money</a></li>
                                <li @if(request()->routeIs('add_beneficiaries')) class="active" @endif><a
                                        href="{{ url('/transactions/beneficiaries') }}">Beneficiaries</a></li>
                                @if(\Illuminate\Support\Facades\Auth::user()->hasRole('Agent'))
                                    <li><a href="{{ url('/agent/dashboard') }}">Agent Portal</a></li>
                                @endif
                                @if(\Illuminate\Support\Facades\Auth::user()->hasRole('Admin'))
                                    <li><a href="{{ url('/admin/dashboard') }}">Admin</a></li>
                                @endif
                                <li><a href="help.html">Help</a></li>
                            </ul>
                        </div>
                    </nav>
                    <!-- Primary Navigation end -->
                </div>
                <div class="header-column justify-content-end">
                    <!-- My Profile
                    ============================== -->
                    <nav class="login-signup navbar navbar-expand">
                        <ul class="navbar-nav">
                            <li class="dropdown notifications"><a class="dropdown-toggle" href="#"><span class="text-5"><i
                                            class="far fa-bell"></i></span><span class="count">3</span></a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item text-center text-primary px-0"
                                           href="#">See all Notifications</a></li>
                                </ul>
                            </li>
                            <li class="dropdown profile ms-2"><a class="px-0 dropdown-toggle" href="#"><img
                                        class="rounded-circle" src="{{ asset('images/profile-thumb-sm.jpg') }}" alt=""></a>
                                <ul class="dropdown-menu">
                                    <li class="text-center text-3 py-2">
                                        Hi, {{ \Illuminate\Support\Facades\Auth::user()->name }}</li>
                                    <li class="dropdown-divider mx-n3"></li>
                                    <li><a class="dropdown-item" href="settings-profile.html"><i
                                                class="fas fa-user"></i>My Profile</a></li>
                                    <li><a class="dropdown-item" href="settings-Security.html"><i
                                                class="fas fa-shield-alt"></i>Security</a></li>
                                    <li><a class="dropdown-item" href="settings-payment-methods.html"><i
                                                class="fas fa-credit-card"></i>Payment Methods</a></li>
                                    <li><a class="dropdown-item" href="settings-notifications.html"><i
                                                class="fas fa-bell"></i>Notifications</a></li>
                                    <li class="dropdown-divider mx-n3"></li>
                                    <li><a class="dropdown-item" href="help.html"><i class="fas fa-life-ring"></i>Need
                                            Help?</a></li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <i class="fas fa-sign-out-alt"></i> Sign Out
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                              style="display: none;">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                    <!-- My Profile end -->
                </div>
            </div>
        </div>
    </header>
    <!-- Header End -->

    @yield('content')

    <!-- Footer
    ============================================= -->
    <footer id="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg d-lg-flex align-items-center">
                    <ul class="nav justify-content-center justify-content-lg-start text-3">
                        <li class="nav-item"><a class="nav-link active" href="#">About Us</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Support</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Help</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Careers</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Affiliate</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Fees</a></li>
                    </ul>
                </div>
                <div class="col-lg d-lg-flex justify-content-lg-end mt-3 mt-lg-0">
                    <ul class="social-icons justify-content-center">
                        <li class="social-icons-facebook"><a data-bs-toggle="tooltip" href="http://www.facebook.com/"
                                                             target="_blank" title="Facebook"><i
                                    class="fab fa-facebook-f"></i></a></li>
                        <li class="social-icons-twitter"><a data-bs-toggle="tooltip" href="http://www.twitter.com/"
                                                            target="_blank" title="Twitter"><i
                                    class="fab fa-twitter"></i></a></li>
                        <li class="social-icons-google"><a data-bs-toggle="tooltip" href="http://www.google.com/"
                                                           target="_blank" title="Google"><i class="fab fa-google"></i></a>
                        </li>
                        <li class="social-icons-youtube"><a data-bs-toggle="tooltip" href="http://www.youtube.com/"
                                                            target="_blank" title="Youtube"><i
                                    class="fab fa-youtube"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="footer-copyright pt-3 pt-lg-2 mt-2">
                <div class="row">
                    <div class="col-lg">
                        <p class="text-center text-lg-start mb-2 mb-lg-0">Copyright &copy; 2023 <a
                                href="#">MoozaCash</a>.
                            All Rights Reserved.</p>
                    </div>
                    <div class="col-lg d-lg-flex align-items-center justify-content-lg-end">
                        <ul class="nav justify-content-center">
                            <li class="nav-item"><a class="nav-link active" href="#">Security</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Terms</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Privacy</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer end -->

</div>
<!-- Document Wrapper end -->

<!-- Back to Top
============================================= -->
<a id="back-to-top" data-bs-toggle="tooltip" title="Back to Top" href="javascript:void(0)"><i
        class="fa fa-chevron-up"></i></a>
<!-- Script -->
<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap-select/js/bootstrap-select.min.js') }}"></script>
<script src="{{ asset('vendor/owl.carousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('js/theme.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/intl-tel-input@18.1.1/build/js/intlTelInput.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@stack('scripts')
</body>
</html>
