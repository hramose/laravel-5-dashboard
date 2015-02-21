<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard - V0.1</title>

    <link href="/css/main.css" rel="stylesheet">

    <!-- Fonts -->
    <link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Lato:100">
</head>

<body>

    <div>

        @include('layouts/partials/header')

        @include('layouts/partials/sidebar')

        <div class="content">
            @yield('content')
        </div>

        @include('layouts/partials/footer')

    </div>

    <!-- Scripts -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
    <script src="{{ asset('assets/vendor/slimScroll/jquery.slimscroll.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/main.js') }}" type="text/javascript"></script>
</body>
</html>
