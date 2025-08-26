@extends('layout.public-layout')

@section('main-content')
    <style>
        body {
            background-image: url("https://cms.centroatenea.app/images/pattern-min.png");
            background-repeat: repeat;
            background-position: center center;
            background-size: auto;
        }
    </style>
    <div style="width: 100%">
        <div class="container">
            <div class="d-flex justify-content-center align-items-center mt-5 flex-column">
                <img class="img-fluid" src="{{ asset('images/Acronimo_year.png') }}" style="max-width: 180px">
                <h3 class="text-center fw-bold text-danger mt-3">¡Ocurrió un error!</h3>
                <h5 class="text-center fw-bold text-etc-darkblue mb-1">Intentalo nuevamente en unos minutos.</h5>
                <h6 class="text-center fw-bold text-secondary mt-0">Si el problema persiste, comunícate con nosotros.</h6>
                <a href="{{ route('webpage.index') }}" class="btn btn-sm bg-etc-orange text-white text-uppercase fw-semi-bold mt-4">Regresar la página principal</a>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
