<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta Information -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'Midbound')</title>

    <!-- Fonts -->
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css' rel='stylesheet' type='text/css'>

    <!-- CSS -->
    <link href="/css/sweetalert.css" rel="stylesheet">
    <link href="/css/app.css" rel="stylesheet">

    <!-- Scripts -->
@yield('scripts', '')

<!-- Global Spark Object -->
    <script>
        window.Spark = <?php echo json_encode(array_merge(
                Spark::scriptVariables(), []
        )); ?>;
    </script>
</head>
<body>
<div id="spark-app" v-cloak>
    <!-- Navigation -->
    @include('spark::nav.guest')

    <!-- Main Content -->
    @yield('content')

    <!-- Footer -->
    @include('guest.footer')

    <!-- Application Level Modals -->
    @if (Auth::check())
        @include('spark::modals.notifications')
        @include('spark::modals.support')
        @include('spark::modals.session-expired')
    @endif

    <!-- JavaScript -->
    <script src="/js/app.js"></script>
    <script src="/js/sweetalert.min.js"></script>
</div>
</body>
</html>