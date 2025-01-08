<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Tin tức</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>@yield('title', 'Quản trị')</title>

    <style>
        .container {
            margin: 0 auto;
            width: 80%;
            padding: 10px;
            display: flex;
        }

        .sidebar {
            height: 80vh;
            width: 20%;
            background-color: #f4f4f4;
            padding: 10px;
        }

        .content {
            padding: 10px;
            flex: 1;
        }
    </style>

</head>

<body>
    <div class="container">
        @include('layouts.partials.sidebar')
        @yield('content')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
