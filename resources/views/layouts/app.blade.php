<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
    <title>My Blog</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="border-b mb-4">
        <div class="max-w-6xl flex justify-between items-center py-8 mx-auto px-4 sm:px-6 lg:px-8">
            <a href="{{ route('home') }}" class="text-2xl font-bold text-gray-900">My Blog</a>
            <div>
                @if (Route::has('login'))
                @auth
                <a href="{{ url('/dashboard') }}"
                    class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                @else
                <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                @if (Route::has('register'))
                <a href="{{ route('register') }}"
                    class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                @endif
                @endauth
                @endif
            </div>
        </div>
    </div>
    <main class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        {{ $slot }}
    </main>
</body>

</html>