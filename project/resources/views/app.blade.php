<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <meta name="description" content="PHP Test application">
    <meta name="author" content="Lucas Luan Pontarolo">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Title -->
    <title>{{ config('app.name') }}</title>

    <!-- Favicon icon -->
    <link rel="icon" href="/assets/img/favicon.ico" type="image/x-icon">

    <link href="{{ mix('assets/css/app.css') }}" type="text/css" rel="stylesheet" />
</head>

<body>
    <div id="app"></div>

    <!-- Footer -->
    <footer class="main-footer">
        <div class="footer-left">
            <span>Copyright &copy; Corp {{ date('Y') }}</span>
        </div>
    </footer>

    <!-- Core JS -->
    <script src="{{ mix('assets/js/manifest.js') }}"></script>
    <script src="{{ mix('assets/js/vendor.js') }}"></script>
    <script src="{{ mix('assets/js/app.js') }}"></script>
</body>

</html>
