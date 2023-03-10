<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DCC23 | Admin</title>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="/plugins/summernote/summernote-bs4.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    @livewireStyles
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="/dist/img/logo.png" alt="" height="60" width="60">
        </div>

        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
            </ul>
        </nav>

        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <a href="/" class="brand-link">
                <img src="/dist/img/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                    style="opacity: .8">
                <span class="brand-text font-weight-light">Admin DCC23</span>
            </a>
            <div class="sidebar">
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="info">
                        <a href="#" class="d-block">{{ strtoupper(auth()->user()->username) }}</a>
                    </div>
                </div>

                @php
                    $currentUrl = '/' . Request::path();
                @endphp
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-item">
                            <a href="/dashboard" class="nav-link @if (strpos($currentUrl, '/dashboard') === 0) active @endif">
                                <i class="nav-icon  fas fa-circle"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/dailybonus" class="nav-link @if (strpos($currentUrl, '/dailybonus') === 0) active @endif">
                                <i class="nav-icon  fas fa-circle"></i>
                                <p>
                                    Daily Bonus
                                </p>
                            </a>
                        </li>
                        <li class="nav-item @if (strpos($currentUrl, '/datamember') === 0 || strpos($currentUrl, '/datakasbon') === 0) menu-open @endif">
                            <a href="#" class="nav-link  @if (strpos($currentUrl, '/datamember') === 0 || strpos($currentUrl, '/datakasbon') === 0) active @endif">
                                <i class="nav-icon fas fa-circle"></i>
                                <p>
                                    Member Data
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/datamember"
                                        class="nav-link @if (strpos($currentUrl, '/datamember') === 0) active @endif">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Member</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/datakasbon"
                                        class="nav-link @if (strpos($currentUrl, '/datakasbon') === 0) active @endif">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Kas Bon</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item @if (strpos($currentUrl, '/logbonus') === 0 ||
                                strpos($currentUrl, '/logdownline') === 0 ||
                                strpos($currentUrl, '/lognetwork') === 0 ||
                                strpos($currentUrl, '/logdeposit') === 0) menu-open @endif">
                            <a href="#" class="nav-link  @if (strpos($currentUrl, '/logbonus') === 0 ||
                                    strpos($currentUrl, '/logdownline') === 0 ||
                                    strpos($currentUrl, '/lognetwork') === 0 ||
                                    strpos($currentUrl, '/logdeposit') === 0) active @endif">
                                <i class="nav-icon fas fa-circle"></i>
                                <p>
                                    Member Log
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/logbonus"
                                        class="nav-link @if (strpos($currentUrl, '/logbonus') === 0) active @endif">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Bonus</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/logdeposit"
                                        class="nav-link @if (strpos($currentUrl, '/logdeposit') === 0) active @endif">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Deposit</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/lognetwork"
                                        class="nav-link @if (strpos($currentUrl, '/lognetwork') === 0) active @endif">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Network</p>
                                    </a>
                                </li>
                                {{-- <li class="nav-item">
                                    <a href="/logsponsor"
                                        class="nav-link @if (strpos($currentUrl, '/logsponsor') === 0) active @endif">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Sponsor</p>
                                    </a>
                                </li> --}}
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="/requestactivation"
                                class="nav-link @if (strpos($currentUrl, '/requestactivation') === 0) active @endif">
                                <i class="nav-icon  fas fa-circle"></i>
                                <p>
                                    Req. Activation
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/requestdeposit"
                                class="nav-link @if (strpos($currentUrl, '/requestdeposit') === 0) active @endif">
                                <i class="nav-icon  fas fa-circle"></i>
                                <p>
                                    Req. Deposit
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/requestwd" class="nav-link @if (strpos($currentUrl, '/requestwd') === 0) active @endif">
                                <i class="nav-icon  fas fa-circle"></i>
                                <p>
                                    Req. WD
                                </p>
                            </a>
                        </li>
                        @if (auth()->user()->username == 'admin')
                            <li class="nav-item">
                                <a href="/dataadmin"
                                    class="nav-link @if (strpos($currentUrl, '/dataadmin') === 0) active @endif">
                                    <i class="nav-icon  fas fa-circle"></i>
                                    <p>
                                        Admin Data
                                    </p>
                                </a>
                            </li>
                        @endif
                        <hr style="background: white">

                        <li class="nav-item">
                            <a href="/changepassword" class="nav-link bg-yellow">
                                <p>
                                    Change Password
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="javascript:;"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                class="nav-link bg-red"></i>Logout</a>
                            <form id="logout-form" action="/logout" method="POST" style="display: none;">
                            </form>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <div class="content-wrapper">
            {{ $slot }}
        </div>

        <footer class="main-footer">
            <strong>Copyright &copy; 2023 <a href="https://dcc23.com">DCC23</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 1
            </div>
        </footer>

        <aside class="control-sidebar control-sidebar-dark">
        </aside>
    </div>

    @livewireScripts

    <!-- jQuery -->
    <script src="/plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="/plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="/plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="/plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="/plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="/plugins/moment/moment.min.js"></script>
    <script src="/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="/plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="/dist/js/adminlte.js"></script>
    <!-- Select2 -->
    <script src="/plugins/select2/js/select2.full.min.js"></script>
    @stack('scripts')
</body>

</html>
