<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>
    @livewireStyles
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.css" rel="stylesheet">
</head>
<body class="antialiased bg-gray-100">
    <div class="min-h-screen">
        @include('navigation-menu')
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <h1 class="text-3xl font-bold text-gray-900">{{ $header ?? 'Dashboard' }}</h1>
            </div>
        </header>
        <main>
            <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
                @if (session('message'))
                    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4">
                        {{ session('message') }}
                    </div>
                @endif
                @if (session('error'))
                    <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4">
                        {{ session('error') }}
                    </div>
                @endif
                {{ $slot }}
            </div>
        </main>
    </div>
    @livewireScripts
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js"></script>
</body>
</html>