<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/ivetc.css') }}">
    <title>Document</title>
</head>

<body>

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

    <div class="loading-page">
        <div class="container">
            <div class="content" style="margin-top: -100px">
                <div class="congress-image d-flex justify-content-center">
                    {{-- <img src="{{ asset('images/ivetc-brand-loading-lg-min.png') }}" alt="congress-brand" class="img-fluid">--}}
                    <picture>
                        <source media="(min-width:1400px)" srcset="{{ asset('images/ivetc-brand-loading-xl-min.png') }}">
                        <img src="{{ asset('images/ivetc-brand-loading-lg-min.png') }}" alt="congress-brand" class="img-fluid">
                    </picture>
                </div>
                <div class="congress-count">
                    <h3 class="text-center mb-0">Start in:</h3>
                    <h1 class="text-center fw-bold text-white" id="count"></h1>
                </div>
            </div>
        </div>

        <div class="footer-bar d-flex justify-content-center align-items-center">
            <span class="text-uppercase text-center">V ENGLISH TEACHING CONGRESS - 2025</span>
        </div>
    </div>

    <script src="{{ asset('js/live-countdown.js') }}"></script>
    <script src="{{ asset('js/pre-loader.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>

</body>

</html>