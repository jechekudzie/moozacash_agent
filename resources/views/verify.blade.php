<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">
    <link href="images/favicon.png" rel="icon"/>
    <title>Payyed - Money Transfer and Online Payments HTML Template</title>
    <meta name="description"
          content="This professional design html template is for build a Money Transfer and online payments website.">
    <meta name="author" content="harnishdesign.net">

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

<div id="main-wrapper" class="min-vh-100 d-flex flex-column">
    <!-- Login Form
    ============================================= -->
    <div class="container my-auto">
        <div class="row g-0">
            <div class="col-11 col-sm-9 col-md-7 col-lg-5 col-xl-4 m-auto py-5">
                <div class="logo text-center" style="margin-bottom: 55px"><a href="index.html" title="MoozaCash"><img
                            src="images/logo-light.png" alt="Payyed"></a></div>
                <p class="lead text-center mb-4">Verify your phone number!</p>
                <form id="loginForm" method="post" action="{{ url('verify-number') }}">
                    @csrf
                    <div class="vertical-input-group">
                        <div class="input-group">
                            <input type="number" name="otp" class="form-control" id="emailAddress" required
                                   placeholder="Enter the code sent to your phone">
                        </div>
                    </div>
                    <!--Display error if the OTP is wrong-->
                    <div class="d-grid my-4">
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <span class="text-danger">{{ $error }}</span>
                            @endforeach
                        @endif
                        <button class="btn btn-primary shadow-none" type="submit">Verify Number</button>
                    </div>
                </form>
                <p class="text-3 text-center text-muted mb-2">Want to go back home? <a class="btn-link"
                                                                                       href="{{ url('/') }}">Home</a>
                </p>
            </div>
        </div>
    </div>
    <!-- Login Form End -->

    <!-- Footer
    ============================================= -->
    <div class="container-fluid bg-white py-2">
        <p class="text-center text-muted mb-0">Copyright &copy; 2023 <a href="#">MoozaCash</a>. All Rights Reserved.</p>
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
