<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">

    <title>MoozaCash Admin</title>
    <meta name="robots" content="noindex, nofollow">

    <!-- Open Graph Meta -->
    <meta property="og:url" content="">
    <meta property="og:image" content="">

    <link rel="apple-touch-icon" sizes="72x72" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <link href="images/favicon.png" rel="icon"/>

    <link rel="stylesheet"
          href="{{ asset('agent/assets/js/plugins/datatables-bs5/css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet"
          href="{{ asset('agent/assets/js/plugins/datatables-buttons-bs5/css/buttons.bootstrap5.min.css') }}">
    <link rel="stylesheet"
          href="{{ asset('agent/assets/js/plugins/datatables-responsive-bs5/css/responsive.bootstrap5.min.css') }}">
    <link rel="stylesheet" id="css-main" href="{{ asset('agent/assets/css/codebase.min.css') }}">
    <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
    <!-- <link rel="stylesheet" id="css-theme" href="assets/css/themes/flat.min.css"> -->
    <!-- END Stylesheets -->
</head>

<body>

<!-- Page Container -->
<div id="page-container" class="sidebar-o enable-page-overlay side-scroll page-header-modern main-content-boxed">
    <!-- Side Overlay-->
    <aside id="side-overlay">
        <!-- Side Header -->
        <div class="content-header">
            <!-- User Avatar -->
            <a class="img-link me-2" href="be_pages_generic_profile.html">
                <img class="img-avatar img-avatar32" src="{{ asset('admin/assets/media/avatars/avatar15.jpg') }}"
                     alt="">
            </a>
            <!-- END User Avatar -->

            <!-- User Info -->
            <a class="link-fx text-body-color-dark fw-semibold fs-sm" href="be_pages_generic_profile.html">
                John Smith
            </a>
            <!-- END User Info -->

            <!-- Close Side Overlay -->
            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
            <button type="button" class="btn btn-sm btn-alt-danger ms-auto" data-toggle="layout"
                    data-action="side_overlay_close">
                <i class="fa fa-fw fa-times"></i>
            </button>
            <!-- END Close Side Overlay -->
        </div>
        <!-- END Side Header -->

        <!-- Side Content -->
        <div class="content-side">
            <!-- Search -->
            <div class="block pull-t pull-x">
                <div class="block-content block-content-full block-content-sm bg-body-light">
                    <form action="be_pages_generic_search.html" method="POST">
                        <div class="input-group">
                            <input type="text" class="form-control" id="side-overlay-search"
                                   name="side-overlay-search"
                                   placeholder="Search..">
                            <button type="submit" class="btn btn-secondary">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- END Search -->

            <!-- Mini Stats -->
            <div class="block pull-x">
                <div class="block-content block-content-full block-content-sm bg-body-light">
                    <div class="row text-center">
                        <div class="col-4">
                            <div class="fs-sm fw-semibold text-uppercase text-muted">Clients</div>
                            <div class="fs-4">460</div>
                        </div>
                        <div class="col-4">
                            <div class="fs-sm fw-semibold text-uppercase text-muted">Sales</div>
                            <div class="fs-4">728</div>
                        </div>
                        <div class="col-4">
                            <div class="fs-sm fw-semibold text-uppercase text-muted">Earnings</div>
                            <div class="fs-4">$7,860</div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END Mini Stats -->

            <!-- Friends -->
            <div class="block pull-x">
                <div class="block-header bg-body-light">
                    <h3 class="block-title">
                        <i class="fa fa-fw fa-users opacity-50 me-1"></i> Friends
                    </h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-toggle="block-option"
                                data-action="state_toggle" data-action-mode="demo">
                            <i class="si si-refresh"></i>
                        </button>
                        <button type="button" class="btn-block-option" data-toggle="block-option"
                                data-action="content_toggle"></button>
                    </div>
                </div>
                <div class="block-content">

                </div>
            </div>
            <!-- END Friends -->

            <!-- Profile -->
            <div class="block pull-x">
                <div class="block-header bg-body-light">
                    <h3 class="block-title">
                        <i class="fa fa-fw fa-pencil-alt opacity-50 me-1"></i> Profile
                    </h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-toggle="block-option"
                                data-action="content_toggle"></button>
                    </div>
                </div>
                <div class="block-content block-content-full">
                    <form action="be_pages_dashboard.html" method="POST" onsubmit="return false;">
                        <div class="mb-3">
                            <label class="form-label" for="side-overlay-profile-name">Name</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="side-overlay-profile-name"
                                       name="side-overlay-profile-name" placeholder="Your name.."
                                       value="John Smith">
                                <span class="input-group-text">
                      <i class="fa fa-user"></i>
                    </span>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="side-overlay-profile-email">Email</label>
                            <div class="input-group">
                                <input type="email" class="form-control" id="side-overlay-profile-email"
                                       name="side-overlay-profile-email" placeholder="Your email.."
                                       value="john.smith@example.com">
                                <span class="input-group-text">
                      <i class="fa fa-envelope"></i>
                    </span>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="side-overlay-profile-password">New Password</label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="side-overlay-profile-password"
                                       name="side-overlay-profile-password" placeholder="New Password..">
                                <span class="input-group-text">
                      <i class="fa fa-asterisk"></i>
                    </span>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="side-overlay-profile-password-confirm">Confirm New
                                Password</label>
                            <div class="input-group">
                                <input type="password" class="form-control"
                                       id="side-overlay-profile-password-confirm"
                                       name="side-overlay-profile-password-confirm"
                                       placeholder="Confirm New Password..">
                                <span class="input-group-text">
                      <i class="fa fa-asterisk"></i>
                    </span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <button type="submit" class="btn btn-alt-primary">
                                    <i class="fa fa-sync opacity-50 me-1"></i> Update
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- END Profile -->

            <!-- Settings -->
            <div class="block pull-x">
                <div class="block-header bg-body-light">
                    <h3 class="block-title">
                        <i class="fa fa-fw fa-wrench opacity-50 me-1"></i> Settings
                    </h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-toggle="block-option"
                                data-action="content_toggle"></button>
                    </div>
                </div>
                <div class="block-content block-content-full">
                    <div class="mb-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value=""
                                   id="side-overlay-settings-security-status"
                                   name="side-overlay-settings-security-status" checked>
                            <label class="form-check-label fw-medium" for="side-overlay-settings-security-status">Online
                                Status</label>
                            <div class="fs-sm text-muted">Show your status to all</div>
                        </div>
                    </div>
                    <div class="mb-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value=""
                                   id="side-overlay-settings-security-verify"
                                   name="side-overlay-settings-security-verify">
                            <label class="form-check-label fw-medium" for="side-overlay-settings-security-verify">Verify
                                on Login</label>
                            <div class="fs-sm text-muted">Most secure option</div>
                        </div>
                    </div>
                    <div class="mb-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value=""
                                   id="side-overlay-settings-security-updates"
                                   name="side-overlay-settings-security-updates" checked>
                            <label class="form-check-label fw-medium" for="side-overlay-settings-security-updates">Auto
                                Updates</label>
                            <div class="fs-sm text-muted">Keep app updated</div>
                        </div>
                    </div>
                    <div class="mb-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value=""
                                   id="side-overlay-settings-security-notifications"
                                   name="side-overlay-settings-security-notifications" checked>
                            <label class="form-check-label fw-medium"
                                   for="side-overlay-settings-security-notifications">Notifications</label>
                            <div class="fs-sm text-muted">For every transaction</div>
                        </div>
                    </div>
                    <div class="mb-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value=""
                                   id="side-overlay-settings-security-api" name="side-overlay-settings-security-api"
                                   checked>
                            <label class="form-check-label fw-medium" for="side-overlay-settings-security-api">API
                                Access</label>
                            <div class="fs-sm text-muted">Enable access from third party apps</div>
                        </div>
                    </div>
                    <div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value=""
                                   id="side-overlay-settings-security-2fa"
                                   name="side-overlay-settings-security-2fa">
                            <label class="form-check-label fw-medium" for="side-overlay-settings-security-2fa">Two
                                Factor Auth</label>
                            <div class="fs-sm text-muted">Using an authenticator</div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END Settings -->
        </div>
        <!-- END Side Content -->
    </aside>
    <!-- END Side Overlay -->

    <nav id="sidebar">
        <!-- Sidebar Content -->
        <div class="sidebar-content">
            <!-- Side Header -->
            <div class="content-header justify-content-lg-center">
                <!-- Logo -->
                <div>
              <span class="smini-visible fw-bold tracking-wide fs-lg">
                c<span class="text-primary">b</span>
              </span>
                    <a class="fw-bold tracking-wide mx-auto" href="{{ url('/agent/dashboard') }}">
                        <img
                            src="{{ asset('images/logo.png') }}" style="width: 70%" alt="MoozaCash Logo"/>
                    </a>
                </div>
                <!-- END Logo -->

                <!-- Options -->
                <div>
                    <!-- Close Sidebar, Visible only on mobile screens -->
                    <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                    <button type="button" class="btn btn-sm btn-alt-danger d-lg-none" data-toggle="layout"
                            data-action="sidebar_close">
                        <i class="fa fa-fw fa-times"></i>
                    </button>
                    <!-- END Close Sidebar -->
                </div>
                <!-- END Options -->
            </div>
            <!-- END Side Header -->

            <!-- Sidebar Scrolling -->
            <div class="js-sidebar-scroll">
                <!-- Side User -->
                <div class="content-side content-side-user px-0 py-0">
                    <!-- Visible only in mini mode -->
                    <div class="smini-visible-block animated fadeIn px-3">
                        <img class="img-avatar img-avatar32"
                             src="{{ asset('agent/assets/media/avatars/avatar15.jpg') }}" alt="">
                    </div>
                    <!-- END Visible only in mini mode -->

                    <!-- Visible only in normal mode -->
                    <div class="smini-hidden text-center mx-auto">
                        <a class="img-link" href="be_pages_generic_profile.html">
                            <img class="img-avatar" src="{{ asset('agent/assets/media/avatars/avatar15.jpg') }}" alt="">
                        </a>
                        <ul class="list-inline mt-3 mb-0">
                            <li class="list-inline-item">
                                <a class=" text-dual fs-sm fw-semibold text-uppercase"
                                   href="be_pages_generic_profile.html">{{ \Illuminate\Support\Facades\Auth::user()->name  }}</a>
                            </li>
                            <li class="list-inline-item">
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="link-fx text-dual"
                                            style="background: none; border: none; padding: 0;">
                                        <i class="fa fa-sign-out-alt"></i>
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                    <!-- END Visible only in normal mode -->
                </div>
                <!-- END Side User -->

                <!-- Side Navigation -->
                <div class="content-side content-side-full">
                    <ul class="nav-main">
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="{{ url('/admin/dashboard') }}">
                                <i class="nav-main-link-icon fa fa-house-user"></i>
                                <span class="nav-main-link-name">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="{{ url('/admin/users') }}">
                                <i class="nav-main-link-icon fa fa-user"></i>
                                <span class="nav-main-link-name">Users</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="{{ url('/admin/exchange-rates') }}">
                                <i class="nav-main-link-icon fa fa-user"></i>
                                <span class="nav-main-link-name">Exchange Rates</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- END Side Navigation -->
            </div>
            <!-- END Sidebar Scrolling -->
        </div>
        <!-- Sidebar Content -->
    </nav>
    <!-- END Sidebar -->

    <!-- Header -->
    <header id="page-header">
        <!-- Header Content -->
        <div class="content-header">
            <!-- Left Section -->
            <div class="space-x-1">
                <!-- Toggle Sidebar -->
                <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                <button type="button" class="btn btn-sm btn-alt-secondary" data-toggle="layout"
                        data-action="sidebar_toggle">
                    <i class="fa fa-fw fa-bars"></i>
                </button>
                <!-- END Toggle Sidebar -->
            </div>
            <!-- END Left Section -->

            <!-- Right Section -->
            <div class="space-x-1">
                <!-- Toggle Side Overlay -->
                <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                <button type="button" class="btn btn-sm btn-alt-secondary" data-toggle="layout"
                        data-action="side_overlay_toggle">
                    <i class="fa fa-fw fa-stream"></i>
                </button>
                <!-- END Toggle Side Overlay -->
            </div>
            <!-- END Right Section -->
        </div>
        <!-- END Header Content -->

        <!-- Header Loader -->
        <!-- Please check out the Activity page under Elements category to see examples of showing/hiding it -->
        <div id="page-header-loader" class="overlay-header bg-primary">
            <div class="content-header">
                <div class="w-100 text-center">
                    <i class="far fa-sun fa-spin text-white"></i>
                </div>
            </div>
        </div>
        <!-- END Header Loader -->
    </header>
    <!-- END Header -->

    @yield('content')

    <!-- Footer -->
    <footer id="page-footer">
        <div class="content py-3">
            <div class="row fs-sm">
                <div class="col-sm-6 order-sm-2 py-1 text-center text-sm-end">
                    MoozaCash
                </div>
                <div class="col-sm-6 order-sm-1 py-1 text-center text-sm-start">
                    <a class="fw-semibold" href="#" target="_blank">Leading Digital</a>
                    &copy;
                    <span data-toggle="year-copy"></span>
                </div>
            </div>
        </div>
    </footer>
    <!-- END Footer -->
</div>
<!-- END Page Container -->
<script src="{{ asset('agent/assets/js/codebase.app.min.js') }}"></script>
<script src="{{ asset('agent/assets/js/lib/jquery.min.js') }}"></script>
<script src="{{ asset('agent/assets/js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('agent/assets/js/plugins/datatables-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
<script src="{{ asset('agent/assets/js/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('agent/assets/js/plugins/datatables-responsive-bs5/js/responsive.bootstrap5.min.js') }}"></script>
<script src="{{ asset('agent/assets/js/plugins/datatables-buttons/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('agent/assets/js/plugins/datatables-buttons-bs5/js/buttons.bootstrap5.min.js') }}"></script>
<script src="{{ asset('agent/assets/js/plugins/datatables-buttons-jszip/jszip.min.js') }}"></script>
<script src="{{ asset('agent/assets/js/plugins/datatables-buttons-pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('agent/assets/js/plugins/datatables-buttons-pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('agent/assets/js/plugins/datatables-buttons/buttons.print.min.js') }}"></script>
<script src="{{ asset('agent/assets/js/plugins/datatables-buttons/buttons.html5.min.js') }}"></script>
<script src="{{ asset('agent/assets/js/pages/be_tables_datatables.min.js') }}"></script>
@stack('scripts')
</body>
</html>
