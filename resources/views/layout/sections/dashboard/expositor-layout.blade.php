<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Expositors - V-ETC')</title>
    <meta name="description" content="@yield('description', '')">

    {{-- CSS --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/ivetc.css') }}">
    @livewireStyles

    @stack('styles')

    <style>
        :root {
            --congreso-azul: #3586ddff;
            --congreso-naranja: #eb8d35ff;
        }

        body {
            background-color: #ffffff;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        main.content-wrapper {
            flex: 1;
        }

        footer.footer {
            background-color: #f8f9fa;
            padding: 1rem 0;
            margin-top: auto;
        }

        .footer-img {
            transition: transform 0.3s ease;
        }

        .footer-img:hover {
            transform: scale(1.8);
            z-index: 10;
        }

        @media (max-width: 768px) {
            footer .container {
                flex-direction: column;
                align-items: center;
                text-align: center;
                gap: 0.5rem;
            }

            .footer-img:hover {
                transform: scale(1.5);
            }
        }

        @media (max-width: 576px) {
            .footer-img {
                width: 60px !important;
                height: 60px !important;
            }
        }

        .expositor-card {
            border-top: 4px solid var(--congreso-naranja);
            border-radius: 12px;
            background: linear-gradient(145deg, #ffffff, #f6f6f6);
            transition: all 0.3s ease;
            text-align: center;
            padding: 1.5rem;
        }

        .expositor-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            background: linear-gradient(145deg, #fefefe, #fafafa);
        }

        .expositor-badge {
            display: inline-block;
            background-color: #f57c00;
            color: white;
            font-weight: 600;
            font-size: 0.85rem;
            border-radius: 12px;
            padding: 4px 10px;
            margin-bottom: 0.5rem;
            max-width: 100%;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .input-group-text i {
            transition: color 0.3s;
        }

        .input-group:focus-within .input-group-text i {
            color: var(--congreso-azul);
        }
    </style>
</head>

<body id="page-body">
    <div class="pre-loader" id="preloader">
        <div class="lds-roller">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
        <img class="pre-loader-image" src="{{ asset('images/ivetc-brand-loading-sm-min.png') }}" alt="loading-brand-sm">
    </div>

    <main class="content-wrapper">
        {{-- Navbar --}}
        <nav id="ivetc-menu" class="ivetc-navbar navbar navbar-expand-lg navbar-dark">
            <div class="container">
                <a class="py-lg-0 navbar-brand text-decoration: none;" href="https://vetc.centroatenea.network/">
                    <img src="{{ asset('images/ETC_white.png') }}" class="d-inline-block align-text-top">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-lg-end" id="navbarSupportedContent">
                    <ul class="navbar-nav mb-2 mb-lg-0">
                        <li class="nav-item menu-item">
                            <a class="nav-link" href="{{ route('webpage.index') }}">Home</a>
                        </li>
                        <li class="nav-item menu-item">
                            <a class="nav-link" href="{{ route('webpage.details') }}">Details</a>
                        </li>
                        <li class="nav-item menu-item">
                            <a class="nav-link active" href="#hero-section">Expositors</a>
                        </li>
                        <li class="nav-item menu-item">
                            <a class="nav-link" href="{{ route('home_dashboard') }}">Book Sessions</a>
                        </li>
                        <li class="nav-item menu-item mt-4 mt-lg-0">
                            <a href="{{ route('public.register.index') }}" class="btn register_btn btn-warning fw-normal px-5" style="background-color: orange">Enroll</a>
                        </li>
                        <li class="nav-item menu-item">
                            <a class="nav-link" href="{{ route('home') }}">Admin</a>
                        </li>
                    </ul>

                </div>
            </div>
        </nav>

        {{-- Contenido inyectado --}}
        <div class="content">
            @yield('content')
        </div>
    </main>

    {{-- Footer --}}
    <footer class="footer">
        <div class="container d-flex justify-content-between align-items-center flex-wrap">
            <div class="d-flex align-items-center gap-3">
                <img src="{{ asset('images/committee/jenhson_lizano.jpeg') }}" alt="Jenhson Lizano" class="rounded-circle img-fluid footer-img" style="width: 80px; height: 80px;">
                <p class="mb-0 text-500 mt-2 mt-sm-0">
                    Sponsored with ❤ by <strong>Jenhson Lizano Villalobos - T.I. ETAI Department</strong>
                    <span class="d-none d-sm-inline-block">|</span><br class="d-sm-none" /> 2025
                </p>
            </div>
            <div>
                <p class="mb-0 text-600">v1.0.0</p>
            </div>
        </div>
    </footer>

    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/pre-loader.js') }}"></script>
    <script src="{{ asset('js/menu.js') }}"></script>
    @stack('scripts')
    @livewireScripts
</body>

</html>