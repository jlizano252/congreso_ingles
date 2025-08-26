<html>
    <head>
{{--        <link rel="preconnect" href="https://fonts.googleapis.com">--}}
{{--        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>--}}
{{--        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">--}}
        <style>
            @page {
                size: letter landscape;
            }
            body {
                padding: 5px;
                margin: 0;
                border: 3px solid steelblue;
                height: 100%;
            }
            .container {
                font-family: 'Montserrat', sans-serif;
                /*box-sizing: border-box;*/
                /*border: 1px dashed lightskyblue;*/
                /*width: 100%;*/
                /*height: 100%;*/
                padding: 3% 5%;
                text-align: center;
                -webkit-font-smoothing: antialiased;
                -moz-osx-font-smoothing: grayscale;
                text-rendering: optimizeLegibility;
                /*line-height: 1.6;*/
                /*letter-spacing: .8px;*/
            }

            .container h1 {
                text-transform: uppercase;
                font-size: 2.2rem;
                color: steelblue;
                font-weight: bold;
            }

            .container h2 {
                text-transform: uppercase;
                font-size: 2rem;
                margin-top: .8rem;
                margin-bottom: 0;
            }

            .container h3 {
                color: #1e2b37;
                font-weight: normal;
                font-size: 1.4rem;
                margin-bottom: 0;
                margin-top: 2rem;
            }

            .container .etc {
                font-weight: bold;
                font-size: 1.5rem;
            }

            .container h4 {
                color: grey;
                font-weight: normal;
                font-size: 1.2rem;
                margin-bottom: 0;
                margin-top: 0;
                letter-spacing: 1px;
            }

            .container .signature-box {
                text-align: left;
                font-weight: normal;
                color: dimgrey;
                margin-top: 13%;
                padding: 0 3%;
            }

            .container .signature-box p {
                margin: 0;
                padding: 0;
            }

            .container .signature-box .left {
                float: left;
            }

            .container .signature-box .right {
                float: right;
            }

        </style>
    </head>
    <body>
        <div class="container">
            <h1>Instituto Tecnológico de Costa Rica</h1>
            <h3>Confiere este certificado de participación a:</h3>

            <h2>{{ $participant->user->name .' '. $participant->user->lastname1 .' '. $participant->user->lastname2 }}</h2>
            <h4>{{ $participant->user->ide }}</h4>

            <h3>Por completar 20 horas efectivas de desarrollo profesional en el
                <br> <span class="etc">IV Congreso de la Enseñanza del Inglés de la Región Huetar Norte 2022:</span>
                <br> <i>“La enseñanza del inglés en tiempos de cambio: ¡Encendiendo la luz!”</i>
            </h3>

            <h3>Llevado a cabo de manera virtual del 17 de noviembre al 15 de diciembre de 2022.
                <br>
                Santa Clara, San Carlos, 28 de febrero de 2023.
            </h3>

            <div class="signature-box">
                <div class="left">
                    <p><b>Dr. Oscar López Villegas</b></p>
                    <p>Director Campus Tecnológico San Carlos</p>
                    <p>Instituto Tecnológico de Costa Rica</p>
                    <img style="width: 180px; height: auto; margin-top: 10px" src="https://etai.aulavirtual.co.cr/assets/ivetc/tec-brand.jpg">
                </div>
                <div class="right">
                    <p><b>Dra. Patricia López Estrada</b></p>
                    <p>Coordinadora General</p>
                    <p>IV Congreso de la Enseñanza del Inglés</p>
                    <img style="width: 160px; height: auto; margin-top: 15px" src="https://etai.aulavirtual.co.cr/assets/ivetc/ivetc-brand-color-light-min.png">
                </div>
            </div>

        </div>
    </body>
</html>
