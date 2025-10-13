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
            <footer class="footer">
                <div class="row g-0 justify-content-between align-items-center fs--1 mt-4 mb-3 text-center text-sm-start">

                    <!-- Imagen + texto -->
                    <div class="col-12 col-sm-auto d-flex flex-column flex-sm-row align-items-center justify-content-center mb-3 mb-sm-0">
                        <img src="{{ asset('images/committee/jenhson_lizano.jpeg') }}"
                            alt="Jenhson Lizano"
                            class="rounded-circle img-fluid me-2 footer-img"
                            style="width: 80px; height: 80px;">

                        <p class="mb-0 text-500 mt-2 mt-sm-0">
                            Sponsored with ❤ by <strong>Jenhson Lizano Villalobos - T.I. ETAI Department</strong>
                            <span class="d-none d-sm-inline-block">|</span><br class="d-sm-none" /> 2025
                        </p>
                    </div>

                    <!-- Versión -->
                    <div class="col-12 col-sm-auto text-center text-sm-end">
                        <p class="mb-0 text-600">v1.0.0</p>
                    </div>
                </div>
            </footer>
            <style>
                .footer-img {
                    transition: transform 0.3s ease;
                }

                .footer-img:hover {
                    transform: scale(1.8);
                    z-index: 10;
                }

                @media (max-width: 576px) {
                    .footer-img:hover {
                        transform: scale(1.4);
                    }
                }
            </style>
        </div>
    </main>

    <script src="{{ asset('js/app.js') }}"></script>
    @stack('scripts')
    @livewireScripts
</body>

</html>