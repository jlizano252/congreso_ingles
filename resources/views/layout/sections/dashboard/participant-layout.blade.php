<!DOCTYPE html>
<html lang="es">

<head>
    @livewireStyles
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'V-ETC')</title>
    <meta name="description" content="@yield('description', '')">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        .page-link {
            font-size: .6rem !important;
        }
    </style>
</head>

<body>
    <main class="main" id="top">
        <div class="container" data-layout="container">

            <!-- Navbar simple -->
            <nav class="navbar navbar-light navbar-glass navbar-top navbar-expand-lg mb-3">
                <a class="navbar-brand" href="{{ route('webpage.index') }}">
                    <div class="d-flex align-items-center">
                        <img src="{{ asset('images/ivetc-brand-loading-sm-min.png') }}" alt="" width="40" class="me-2">
                        <span class="font-sans-serif mb-0">V-ETC</span>
                    </div>
                </a>
            </nav>

            <!-- Contenido principal -->
            <div class="content">
                @yield('content')
            </div>

            <!-- Footer simple -->
            <footer class="footer mt-4">
                <div class="row g-0 justify-content-between fs--1">
                    <div class="col-12 col-sm-auto text-center">
                        <p class="mb-0 text-500">Sponsored with ❤ by Jenhson Lizano<span class="d-none d-sm-inline-block">|</span><br class="d-sm-none" /> 2025</p>
                    </div>
                    <div class="col-12 col-sm-auto text-center">
                        <p class="mb-0 text-600">v1.0.0</p>
                    </div>
                </div>
            </footer>
        </div>
    </main>

    <script src="{{ asset('js/app.js') }}"></script>
    @stack('scripts')
    @livewireScripts
</body>

</html>