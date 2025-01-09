<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<!-- Basic -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<!-- Mobile Metas -->
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Site Metas -->
<title>@yield('title', 'Blog')</title>
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
    @include('layouts.partials.header')
    <div id="wrapper">
        @yield('content')
        <div class="dmtop">Scroll to Top</div>
        @include('layouts.partials.footer')
    </div><!-- end wrapper -->

    <!-- Core JavaScript
    ================================================== -->
    <script src="js/jquery.min.js"></script>
    <script src="js/tether.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>

</body>

</html>
