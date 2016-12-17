<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Extra Curricular Activity Monitor</title>
        <link rel="stylesheet" href="/bootstrap/bootstrap-darkly.min.css">
    </head>
    <body>

        @include('partials.navbar')

        @yield('content')

        <script src="/jquery-3.1.1.min.js"></script>
        <script src="/bootstrap/bootstrap.min.js"></script>
        @yield('scripts')
    </body>
</html>
