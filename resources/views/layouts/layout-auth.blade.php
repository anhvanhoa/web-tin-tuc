{{-- <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Tin tức</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <title>@yield('title', 'Đăng nhập')</title>
</head>

<body>
    <div>
        <p>
                @yield('name', 'Đăng nhập')
        </p>
        @yield('content')
    </div>
</body>

</html> --}}

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<!-- Basic -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<!-- Mobile Metas -->
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Site Metas -->
<title>@yield('title', 'Đăng nhập')</title>
<meta name="keywords" content="">
<meta name="description" content="">
<meta name="author" content="">

<!-- Site Icons -->
<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
<link rel="apple-touch-icon" href="images/apple-touch-icon.png">

<!-- Design fonts -->
<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

<!-- Bootstrap core CSS -->
<link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">

<!-- FontAwesome Icons core CSS -->
<link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">

<!-- Custom styles for this template -->
<link rel="stylesheet" href="{{ asset('css/style.css') }}">

<!-- Responsive styles for this template -->
<link rel="stylesheet" href="{{ asset('css/responsive.css') }}">

<!-- Colors for this template -->
<link rel="stylesheet" href="{{ asset('css/colors.css') }}">

<!-- Version Tech CSS for this template -->
<link rel="stylesheet" href="{{ asset('css/version/tech.css') }}">


</head>

<body>
    <div id="wrapper">
        <div class="page-title lb single-wrapper" style="margin-top: 0 !important;">
            <div class="container">
                <div class="row" style="justify-content: center">
                    <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
                        <h2></i>
                            @yield('name', 'Login to your account')
                        </h2>
                        <small style="padding: 0;" class="hidden-xs-down hidden-sm-down">
                            @yield('des', 'Welcome to the login page. Please login to your account.')
                        </small>
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end page-title -->

        <section class="section wb">
            @yield('content')
        </section>
    </div><!-- end wrapper -->
    @include('layouts.partials.footer')
    <!-- Core JavaScript
    ================================================== -->
    <script src="js/jquery.min.js"></script>
    <script src="js/tether.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>

</body>

</html>
