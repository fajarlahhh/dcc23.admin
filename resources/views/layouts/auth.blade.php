<!DOCTYPE html>
<html lang="en" class="dark">

<head>
    <title>DCC23</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="DCC23">
    <meta name="keywords" content="DCC23">
    <meta name="author" content="LEFT4CODE">
    <link href="/dist/img/logo.png" rel="shortcut icon">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/dist/css/adminlte.min.css">
    @livewireStyles
</head>

<body class="hold-transition login-page">

    <div class="login-box">
        <div class="login-logo">
            <img style="width: 70px" src="/dist/img/logo.png"><br>
            <a href="/"><b>Admin</b>DCC23</a>
        </div>
        @yield('content')
    </div>

    @livewireScripts
    <script src="/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="/dist/js/adminlte.min.js"></script>
</body>

</html>
