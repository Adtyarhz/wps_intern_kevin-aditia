<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="icon" type="image/png" href="{{ asset('iconweb.png') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
    body {
        font-family: 'Instrument Sans', sans-serif;
        background: url('{{ asset('images/backgrounds/Background-Office.jpg') }}') no-repeat center center fixed;
        background-size: cover;
        position: relative;
        color: #fff;
        transition: background-color 0.3s ease, color 0.3s ease;
        min-height: 100vh;
        display: flex;
        flex-direction: column;
    }

    body.dark-mode {
        background-color: #121212;
        color: #e0e0e0;
    }

    body::before {
        content: '';
        position: fixed;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        background: rgba(0, 0, 0, 0.5);
        z-index: 0;
        pointer-events: none;
    }

    .glass-wrapper {
        border-radius: 1rem;
        padding: 2rem;
        background: rgba(255, 255, 255, 0.15);
        border: 1px solid rgba(255, 255, 255, 0.6);
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        z-index: 1;
        color: #fff;
    }

    .navbar-dark {
        background-color: rgba(0, 0, 0, 0.5) !important;
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);
        color: #fff;
        padding: 1rem;
    }

    .footer-dark {
        background-color: rgba(0, 0, 0, 0.5) !important;
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);
        color: #fff;
        padding: 1.5rem 0;
    }

    .navbar-dark .navbar-nav .nav-link {
        color: #fff;
        font-weight: 500;
        padding: 0.5rem 1rem;
    }

    .navbar-dark .navbar-nav .nav-link:hover {
        color: #f8f9fa;
    }

    .btn-glow {
        transition: all 0.3s ease;
        position: relative;
        z-index: 3; /* Ensure buttons are above other elements */
        background-color: rgba(255, 255, 255, 0.3); /* Slightly more opaque background */
        border: 2px solid #fff; /* Thicker border for visibility */
        color: #fff; /* White text for contrast */
        padding: 0.5rem 1.5rem;
        font-weight: 600; /* Bold text */
        border-radius: 50rem; /* Consistent rounded shape */
        display: inline-block; /* Ensure proper rendering */
        pointer-events: auto; /* Ensure clickability */
    }

    .btn-glow:hover {
        box-shadow: 0 0 12px rgba(255, 255, 255, 0.8), 0 0 6px rgba(255, 255, 255, 0.5);
        background-color: rgba(255, 255, 255, 0.4); /* Slightly brighter on hover */
        color: #fff;
    }

    .animate-fade-in-down {
        animation: fadeInDown 0.8s ease-out both;
    }

    .animate-fade-in-up {
        animation: fadeInUp 1s ease-out both;
    }

    @keyframes fadeInDown {
        0% { opacity: 0; transform: translateY(-20px); }
        100% { opacity: 1; transform: translateY(0); }
    }

    @keyframes fadeInUp {
        0% { opacity: 0; transform: translateY(20px); }
        100% { opacity: 1; transform: translateY(0); }
    }

    .toggle-darkmode {
        cursor: pointer;
        background: none;
        border: none;
        color: white;
        font-size: 1.2rem;
        padding: 0.5rem;
    }

    footer.footer-dark p {
        color: #ccc;
        margin: 0;
    }

    .text-white, .navbar a, .navbar-brand {
        color: white !important;
        font-weight: 600;
    }

    .navbar-dark .btn-outline-light {
        color: #fff;
        border: 2px solid #fff; /* Thicker border */
        background-color: transparent; /* Ensure transparency */
        border-radius: 50rem;
        padding: 0.5rem 1.5rem;
        font-weight: 600;
    }

    .navbar-dark .btn-outline-light:hover {
        background-color: #fff;
        color: #333;
    }

    .navbar-dark .btn-light {
        color: #333;
        background-color: #fff;
        border: 2px solid #fff;
        border-radius: 50rem;
        padding: 0.5rem 1.5rem;
        font-weight: 600;
    }

    /* Responsive Adjustments */
    @media (max-width: 768px) {
        .glass-wrapper {
            padding: 1.5rem;
            margin: 1rem;
        }

        .navbar-dark .navbar-nav {
            padding: 1rem 0;
        }

        .navbar-dark .navbar-nav .nav-item {
            margin: 0.5rem 0;
        }

        .navbar-dark .btn-glow {
            width: 100%;
            text-align: center;
        }

        .navbar-brand {
            font-size: 1.25rem;
        }

        main.container {
            margin: 2rem 1rem;
        }

        .display-4 {
            font-size: 2rem;
        }

        .lead {
            font-size: 1rem;
        }

        .d-flex.gap-3 {
            flex-direction: column;
            gap: 1rem;
        }

        .btn-lg {
            padding: 0.75rem 1.5rem;
            font-size: 1rem;
        }
    }

    @media (max-width: 576px) {
        .glass-wrapper {
            padding: 1rem;
            margin: 0.5rem;
        }

        .navbar-dark {
            padding: 0.75rem;
        }

        .footer-dark {
            padding: 1rem 0;
        }

        .display-4 {
            font-size: 1.75rem;
        }

        .navbar-dark .btn-glow {
            padding: 0.5rem 1rem;
        }
    }
</style>
</head>

<body class="bg-light d-flex flex-column min-vh-100 position-relative text-white">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark shadow-sm position-relative" style="z-index: 2;">
        <div class="container max-w-5xl">
            <a class="navbar-brand fw-bold" href="/">{{ config('app.name', 'Daily Log System') }}</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav gap-2 align-items-center">
                    @if (Route::has('login'))
                        @auth
                            <li class="nav-item animate-fade-in-down" style="animation-delay: 0.3s;">
                                <a href="{{ route('dashboard') }}" class="btn btn-outline-light btn-glow">
                                    Dashboard
                                </a>
                            </li>
                        @else
                            <li class="nav-item animate-fade-in-down" style="animation-delay: 0.4s;">
                                <a href="{{ route('login') }}" class="btn btn-light text-dark btn-glow">
                                    Log In
                                </a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item animate-fade-in-down" style="animation-delay: 0.6s;">
                                    <a href="{{ route('register') }}" class="btn btn-outline-light btn-glow">
                                        Register
                                    </a>
                                </li>
                            @endif
                        @endauth
                    @endif
                    <li class="nav-item">
                        <button onclick="toggleDarkMode()" class="toggle-darkmode ms-3" title="Toggle Dark Mode">🌓</button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="container my-5 flex-grow-1 position-relative z-1">
        <div class="glass-wrapper text-center mx-auto" style="max-width: 700px;">
            <h1 class="display-4 fw-bold text-white mb-4 animate-fade-in-down">
                Welcome to Daily Log System
            </h1>
            <p class="lead text-white mb-5 animate-fade-in-up">
                Effortlessly manage your daily work logs. Supervisors can efficiently verify their team’s logs through this system.
            </p>
            @if (!auth()->check())
                <div class="d-flex justify-content-center gap-3">
                    <a href="{{ route('login') }}" class="btn btn-primary btn-lg px-5 py-3 rounded-pill animate-fade-in-up">
                        Log In
                    </a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="btn btn-outline-light btn-lg px-5 py-3 rounded-pill animate-fade-in-up">
                            Register
                        </a>
                    @endif
                </div>
            @endif
        </div>
    </main>

    <!-- Footer -->
    <footer class="footer-dark py-4 shadow-sm mt-auto position-relative" style="z-index: 2;">
        <div class="container text-center">
            <p class="mb-0">© {{ date('Y') }} {{ config('app.name', 'Daily Log System') }}. All rights reserved.</p>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>

    <!-- Dark Mode Toggle Script -->
    <script>
        function toggleDarkMode() {
            document.body.classList.toggle('dark-mode');
        }
    </script>
</body>
</html>