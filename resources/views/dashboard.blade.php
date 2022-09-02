<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>My Blog</title>
        <script>
            window.appVars = {
                csrf_token: '{{ csrf_token() }}'
            }
        </script>
        <!-- Styles -->
        @routes
        @vite('resources/js/dashboard.js')
        @inertiaHead
    </head>
    <body class="antialiased">
        @inertia
    </body>
</html>
