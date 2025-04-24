<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Sistem Log Harian') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-900 flex items-center justify-center min-h-screen flex-col p-6 lg:p-8">
    <header class="w-full max-w-4xl text-sm mb-6">
        <nav class="flex items-center justify-end gap-4">
            @if (Route::has('login'))
                @auth
                    <a href="{{ route('dashboard') }}"
                       class="inline-block px-5 py-1.5 border border-gray-300 hover:border-gray-400 text-gray-900 rounded-md text-sm font-medium">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}"
                       class="inline-block px-5 py-1.5 text-gray-900 border border-transparent hover:border-gray-300 rounded-md text-sm font-medium">
                        Log In
                    </a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                           class="inline-block px-5 py-1.5 border border-gray-300 hover:border-gray-400 text-gray-900 rounded-md text-sm font-medium">
                            Register
                        </a>
                    @endif
                @endauth
            @endif
        </nav>
    </header>

    <main class="text-center max-w-4xl">
        <h1 class="text-4xl font-bold mb-4">Selamat Datang di Sistem Log Harian</h1>
        <p class="text-lg text-gray-600 mb-6">
            Kelola log harian pekerjaan Anda dengan mudah. Atasan dapat memverifikasi log bawahan secara efisien melalui sistem ini.
        </p>
        @if (!auth()->check())
            <div class="flex justify-center gap-4">
                <a href="{{ route('login') }}"
                   class="bg-blue-600 text-white px-6 py-2 rounded-md hover:bg-blue-700">
                    Masuk
                </a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}"
                       class="bg-gray-200 text-gray-900 px-6 py-2 rounded-md hover:bg-gray-300">
                        Daftar
                    </a>
                @endif
            </div>
        @endif
    </main>
</body>
</html>