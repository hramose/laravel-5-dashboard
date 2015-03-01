<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard - V0.1</title>

    <!-- Fonts -->
    <link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Lato:100">
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/vendor/font-awesome/css/font-awesome.min.css') }}">

    <!-- Plugins style -->
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">

    <!-- App styles -->
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">

</head>

<body>

    <div id="container">

        @include('layouts/partials/header')

        @include('layouts/partials/sidebar')

        <div id="content">
            @yield('content')
        </div>

        @include('layouts/partials/footer')

    </div>

    <!-- Scripts -->
    <script src="{{ asset('assets/vendor/jquery/dist/jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendor/jquery-ui/jquery-ui.min.js') }}" type="text/javascript"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
    <script src="{{ asset('assets/vendor/slimScroll/jquery.slimscroll.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendor/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/main.js') }}" type="text/javascript"></script>
</body>
</html>
