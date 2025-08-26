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

<div class="container">
    <div class="d-flex justify-content-center mt-4">
        <img class="img-fluid" src="{{ asset('images/ivetc-brand-footer.png') }}" style="max-width: 120px">
    </div>
    <div class="row justify-content-center">

        {{-- <div class="col-12 col-lg-6">
            <div class="alert alert-info border-2 d-flex align-items-center" role="alert">
                <div class="bg-info me-3 icon-item"><span class="fas fa-info-circle text-white fs-3"></span></div>
                <p class="mb-0 flex-1">Enrollment period <strong>ended</strong>.</p>
            </div>
        </div> --}}

        <div class="col-12 col-lg-8 col-xxl-8 pb-3">
            @livewire('public.enrollment-form.v1.enrollment-formv2')
        </div>

    </div>
</div>

@endsection

@section('scripts')
<script>
    // Preloader...
    window.addEventListener('load', function() {
        let preloader = document.querySelector('#preloader');
        if (preloader) {
            preloader.classList.add('hide-element')
            setTimeout(function() {
                preloader.classList.add('d-none');
            }, 500);
        }
    })
</script>
@endsection