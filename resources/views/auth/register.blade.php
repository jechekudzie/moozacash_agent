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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@18.1.1/build/css/intlTelInput.css">
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="vendor/font-awesome/css/all.min.css"/>
    <link rel="stylesheet" type="text/css" href="css/stylesheet.css"/>
    <style>
        .iti.iti--allow-dropdown.iti--show-flags {
            width: 100% !important;
        }

        .error {
            color: red;
        }
    </style>
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
            <div class="col-md-6">
                <!-- Get Verified! Text
                ============================================= -->
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
                                <h1 class="text-11 text-white mb-4">Get Verified!</h1>
                                <p class="text-4 text-white lh-base mb-5">Every day, Payyed makes thousands of customers
                                    happy.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Get Verified! Text End -->
            </div>
            <div class="col-md-6 d-flex align-items-center">
                <!-- SignUp Form
        ============================================= -->
                <div class="container my-4">
                    <div class="row g-0">
                        <div class="col-11 col-lg-9 col-xl-8 mx-auto">
                            <h3 class="fw-400 mb-4">Sign Up</h3>
                            <form id="loginForm" method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="mb-3">
                                    <label for="fullName" class="form-label">Full Name</label>
                                    <input type="text" class="form-control" id="fullName" name="name" required
                                           placeholder="Enter Your Name">
                                </div>
                                <div class="mb-3">
                                    <label for="emailAddress" class="form-label">Email Address</label>
                                    <input type="email" class="form-control" id="emailAddress" name="email" required
                                           placeholder="Enter Your Email">
                                </div>
                                <div class="mb-3">
                                    <label for="phoneNumber" class="form-label">Phone Number</label>
                                    <input type="text" class="form-control" id="phoneNumber" name="number" required
                                           placeholder="Enter Your Phone Number">
                                </div>
                                <div class="mb-3">
                                    <label for="nationalId" class="form-label">National ID</label>
                                    <input type="text" class="form-control" id="nationalId" name="national_id" required
                                           placeholder="Enter Your National ID">
                                </div>
                                <div class="mb-3">
                                    <label for="loginPassword" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="loginPassword" name="password"
                                           required placeholder="Enter Password">
                                </div>
                                <div class="mb-3">
                                    <label for="loginPassword" class="form-label">Confirm Password</label>
                                    <input type="password" class="form-control" placeholder="Confirm Password"
                                           name="password_confirmation" required autocomplete="new-password">
                                </div>
                                <input type="hidden" name="phone" id="hiddenNumber"/>

                                @if($errors->any())
                                    {!! implode('', $errors->all('<div class="error">:message</div>')) !!}
                                @endif

                                <div id="numberError" style="display: none" class="error">The phone number you entered
                                    is invalid
                                </div>

                                <div class="d-grid mt-4 mb-3">
                                    <button class="btn btn-primary" type="button" id="signUp">Sign Up</button>
                                </div>
                            </form>
                            <p class="text-3 text-center text-muted">Already have an account? <a class="btn-link"
                                                                                                 href="{{ route('login') }}">Log
                                    In</a></p>
                        </div>
                    </div>
                </div>
                <!-- SignUp Form End -->
            </div>
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
<script src="https://cdn.jsdelivr.net/npm/intl-tel-input@18.1.1/build/js/intlTelInput.min.js"></script>
<script>
    var input = document.querySelector("#phoneNumber");
    window.intlTelInput(input, {
        utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@18.1.1/build/js/utils.js",
    });
    //get phone number on key up and validate it
    var iti = window.intlTelInputGlobals.getInstance(input);
    //capture onclick of signUp button
    $("#signUp").click(function () {
        var phoneNumber = iti.getNumber();
        //check if number is valid
        if (!iti.isValidNumber()) {
            $('#numberError').show();
            return;
        } else {
            $('#numberError').hide();
            $("#hiddenNumber").val(phoneNumber);
            $("#loginForm").submit();
        }
    });
</script>
</body>
</html>
