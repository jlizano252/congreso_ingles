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
                <h3 class="text-center fw-bold text-etc-regblue mt-3">¡Registro enviado exitosamente!</h3>
                <a href="{{ route('webpage.index') }}" class="btn btn-sm bg-etc-orange text-white text-uppercase fw-semi-bold">Regresar la página principal</a>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
