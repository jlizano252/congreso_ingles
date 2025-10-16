<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <style>
        /* --- Página / documento --- */
        @page {
            size: letter landscape;
            margin: 10px;
        }

        body {
            margin: 0;
            padding: 12px;
            border: 8px double #2c3e50;
            background-color: #ffffff;
            font-family: "Times New Roman", Georgia, serif;
            color: #2c3e50;
        }

        /* --- Contenedor central --- */
        .container {
            text-align: center;
            padding: 18px 48px;
            position: relative;
        }

        h1 {
            font-size: 1.5rem;
            font-weight: 700;
            margin: 0;
            letter-spacing: 3px;
            text-transform: uppercase;
        }

        /* Subtítulo pequeño (se puede usar para ubicación/organización secundaria) */
        .subtitle {
            font-size: 0.95rem;
            margin-top: 6px;
            color: #444;
        }

        /* Texto que introduce al galardonado */
        .intro-text {
            font-size: 1rem;
            margin-top: 18px;
            margin-bottom: 10px;
            line-height: 1.4;
        }

        /* Nombre del participante: grande y destacado */
        h2.participant-name {
            font-size: 2.6rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            margin: 18px 0 6px;
            display: inline-block;
        }

        /* ID / identificación en sinergia con el nombre */
        h4.participant-id {
            font-size: 1.05rem;
            font-weight: 400;
            color: #555;
            margin: 4px 0 18px;
        }

        /* Información del evento */
        .event-block {
            font-size: 1rem;
            line-height: 1.45;
            margin: 10px 0;
        }

        .etc {
            font-weight: 700;
            font-size: 1.05rem;
            display: block;
            margin-top: 6px;
            letter-spacing: 0.6px;
        }

        /* Slogan (después del bloque del evento) */
        h4.slogan {
            font-style: italic;
            font-weight: 400;
            font-size: 1rem;
            color: #555;
            margin: 12px 0 18px;
        }

        /* --- Firmas --- */
        table.signatures {
            width: 100%;
            margin-top: 120px;
            /* empuja las firmas hacia abajo */
            border-collapse: collapse;
        }

        table.signatures td {
            width: 50%;
            vertical-align: top;
            text-align: center;
            padding: 0 12px;
        }

        /* Imagen de la firma (si la usas) */
        .signature-img {
            display: block;
            margin: 6px auto 8px;
            max-width: 50px;
            /* reducido de 180px a 120px */
            height: auto;
        }

        /* Línea de firma */
        .sig-line {
            width: 220px;
            height: 1px;
            background: #2c3e50;
            margin: 6px auto 8px;
            opacity: 0.9;
        }

        /* Textos debajo de la línea de firma */
        .sig-name {
            font-size: 0.86rem;
            font-weight: 700;
            margin: 2px 0;
        }

        .sig-title {
            font-size: 0.78rem;
            color: #555;
            margin: 0;
        }

        /* Reducir el tamaño y espacio de los textos de firma (sinergía) */
        table.signatures td p {
            font-size: 0.78rem;
            margin: 2px 0;
            color: #2c3e50;
        }

        /* Texto que antecede a los logos de colaboración */
        .collaboration-text {
            margin-top: 24px;
            font-size: 0.9rem;
            color: #666;
            font-weight: 400;
        }

        /* Logos de colaboradores al pie */
        table.collaborators {
            width: 100%;
            border-collapse: collapse;
            margin-top: 8px;
            padding: 0;
        }

        table.collaborators td {
            text-align: center;
            vertical-align: middle;
            padding: 6px 4px;

            width: {
                    {
                    100 / (count($collaborators ?? ['a', 'b', 'c']))
                }
            }

            %;
        }

        table.collaborators img {
            max-width: 48px;
            max-height: 48px;
            width: auto;
            height: auto;
            display: inline-block;
        }

        /* Pie / notas pequeñas (opcional) */
        .footer-note {
            font-size: 0.75rem;
            color: #777;
            margin-top: 10px;
        }

        /* Ajustes para que DomPDF no rompa elementos */
        .no-break {
            page-break-inside: avoid;
        }
    </style>
</head>

<body>
    <div class="container no-break">

        <h1>Escuela Técnica Agricola e Industrial</h1>
        <div class="subtitle">V English Teaching Congress — Northern Huetar Region</div>

        <div class="intro-text">Hereby awards this certificate of participation to:</div>

        <h2 class="participant-name">
            {{ $participant->user->name .' '. $participant->user->lastname }}
        </h2>

        <h4 class="participant-id">{{ $participant->user->ide }}</h4>

        <div class="event-block">
            For participating in the
            <br>
            <span class="etc">
                V ENGLISH TEACHING CONGRESS 
                OF THE NORTHERN HUETAR REGION 2025
            </span>
        </div>

        <h4 class="slogan">Empowered Teachers, Inspired Classrooms</h4>

        <div class="event-block">
            Held from November 27 to November 28, 2025.
            <br>
            Santa Clara, San Carlos.
        </div>

        <!-- Firmas -->
        <table class="signatures no-break">
            <tr>
                <td>
                    {{-- Firma / imagen opcional arriba de la línea --}}
                    @php
                    $etaiImg = null;
                    try {
                    $etaiImg = base64_encode(file_get_contents(public_path('images/committee/etai.png')));
                    } catch (\Exception $e) {
                    $etaiImg = null;
                    }
                    @endphp

                    <p class="sig-name">Mr. Roberto Brenes Delangton</p>
                    <p class="sig-title">Director — ETAI</p>
                    <p class="sig-title">Escuela Técnica Agricola e Industrial</p>
                    @if($etaiImg)
                    <img src="data:image/png;base64,{{ $etaiImg }}" alt="firma" class="signature-img">
                    @endif
                </td>

                <td>
                    {{-- Firma / imagen opcional arriba de la línea --}}
                    @php
                    $acrImg = null;
                    try {
                    $acrImg = base64_encode(file_get_contents(public_path('images/Acronimo_year.png')));
                    } catch (\Exception $e) {
                    $acrImg = null;
                    }
                    @endphp
                    <p class="sig-name">Lic. Jorge Chaves Blanco</p>
                    <p class="sig-title">General Coordinator</p>
                    <p class="sig-title">V Congress of English Teaching</p>
                    @if($acrImg)
                    <img src="data:image/png;base64,{{ $acrImg }}" alt="firma" class="signature-img">
                    @endif
                </td>
            </tr>
        </table>

        <div class="collaboration-text">In collaboration with</div>

        @php
        $collaborators = $collaborators ?? [
        'images/committee/tec.jpg',
        'images/committee/uned.png',
        'images/committee/casc.png',
        'images/committee/utn.png',
        'images/committee/una.jpg',
        'images/committee/in.png',
        'images/committee/mep.jpeg',
        ];
        @endphp

        <table class="collaborators no-break" role="presentation">
            <tr>
                @foreach($collaborators as $logo)
                <td>
                    @php
                    $logoImg = null;
                    try {
                    $logoImg = base64_encode(file_get_contents(public_path($logo)));
                    } catch (\Exception $e) {
                    $logoImg = null;
                    }
                    @endphp

                    @if($logoImg)
                    <img src="data:image/png;base64,{{ $logoImg }}" alt="logo">
                    @endif
                </td>
                @endforeach
            </tr>
        </table>

        <div class="footer-note">Certificate generated by Escuela Técnica Agricola e Industrial — V English Teaching Congress 2025</div>
    </div>
</body>

</html>