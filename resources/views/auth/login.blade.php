<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="72x72" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <link href="images/favicon.png" rel="icon"/>
    <title>MoozaCash - Money Transfer and Online Payments</title>

    <!-- Web Fonts
    ============================================= -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap">

    <!-- Stylesheet
    ============================================= -->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="vendor/font-awesome/css/all.min.css"/>
    <link rel="stylesheet" type="text/css" href="css/stylesheet.css"/>
</head>
<body>

<!-- Preloader -->
<div id="preloader">
    <div data-loader="dual-ring"></div>
</div>
<!-- Preloader End -->

<div id="main-wrapper">
    <div class="container-fluid px-0">
        <div class="row g-0 min-vh-100">
            <!-- Welcome Text
            ============================================= -->
            <div class="col-md-6">
                <div class="hero-wrap d-flex align-items-center h-100">
                    <div class="hero-mask opacity-8 bg-primary"></div>
                    <div class="hero-bg hero-bg-scroll" style="background-image:url('./images/bg/image-3.jpg');"></div>
                    <div class="hero-content mx-auto w-100 h-100 d-flex flex-column">
                        <div class="row g-0">
                            <div class="col-10 col-lg-9 mx-auto">
                                <div class="logo mt-5 mb-5 mb-md-0"><a class="d-flex" href="{{ url('/') }}"
                                                                       title="MoozaCash"><img
                                            src="images/logo-light.png" alt="Moozacash"></a></div>
                            </div>
                        </div>
                        <div class="row g-0 my-auto">
                            <div class="col-10 col-lg-9 mx-auto">
                                <h1 class="text-11 text-white mb-4">Welcome back!</h1>
                                <p class="text-4 text-white lh-base mb-5">We are glad to see you again! Instant
                                    deposits, withdrawals & payouts trusted by millions worldwide.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Welcome Text End -->

            <!-- Login Form
               ============================================= -->
            <div class="col-md-6 d-flex align-items-center">
                <div class="container my-4">
                    <div class="row g-0">
                        <div class="col-11 col-lg-9 col-xl-8 mx-auto">
                            <h3 class="fw-400 mb-4">Log In</h3>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email Address</label>
                                    <input type="email" class="form-control" id="email" name="email" required
                                           placeholder="Enter Your Email">
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" required
                                           placeholder="Enter Password">
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" id="remember" name="remember"
                                                   type="checkbox">
                                            <label class="form-check-label" for="remember">Remember Me</label>
                                        </div>
                                    </div>
                                    <div class="col-sm text-end"><a class="btn-link"
                                                                    href="{{ route('password.request') }}">Forgot
                                            Password ?</a></div>
                                </div>
                                <div class="d-grid mb-3">
                                    <button class="btn btn-primary" type="submit">Login</button>
                                </div>
                            </form>
                            <p class="text-3 text-center text-muted">Don't have an account? <a class="btn-link"
                                                                                               href="{{ route('register') }}">Sign
                                    Up</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Login Form End -->

        </div>
    </div>
</div>

<!-- Back to Top
============================================= -->
<a id="back-to-top" data-bs-toggle="tooltip" title="Back to Top" href="javascript:void(0)"><i
        class="fa fa-chevron-up"></i></a>

<!-- Script -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="js/theme.js"></script>
</body>
</html>
