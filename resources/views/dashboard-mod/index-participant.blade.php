@include('layout.sections.private-head')
@include('layout.sections.messages')

<main class="main" id="top">
    <div class="container" data-layout="container">

        <div class="row flex-center min-vh-100 py-6 mt-lg-n7">
            <div class="col-sm-10 col-md-8 col-lg-6 col-xl-4 col-xxl-3">

                {{-- Imagen centrada --}}
                <img src="https://vetc.centroatenea.network/images/Acronimo_year.png"
                    alt="vetc"
                    style="max-width: 100px; height: auto; margin: 0 auto 20px auto; display: block;">

                <div class="card shadow-sm">
                    <div class="card-body p-4">

                        {{-- Encabezado --}}
                        <div class="row flex-between-center mb-3">
                            <div class="col-auto">
                                <h5 class="mb-0">Booking Sessions</h5>
                            </div>
                        </div>

                        {{-- Mensaje profesional --}}
                        @if(!session()->has('participant_registered'))
                        <div class="alert alert-info d-flex align-items-center py-2 mb-4" role="alert" style="font-size: 0.9rem;">
                            <i class="fas fa-info-circle me-2"></i>
                            <div>
                                If you have not enrolled yet, please
                                <a href="{{ route('public.register.index') }}" class="alert-link">enroll</a>
                                before searching for available sessions.
                            </div>
                        </div>
                        @endif

                        {{-- Formulario de ingreso de cédula --}}
                        <form action="{{ route('participant.find') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <input name="ide" class="form-control" type="text" placeholder="Type your ID" required />
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-primary d-block w-100 mt-3" type="submit">Search</button>
                            </div>

                            {{-- Botón para ir a Home --}}
                            <div class="mb-3">
                                <a href="{{ route('webpage.index') }}" class="btn btn-secondary d-block w-100 mt-2">
                                    Go to Home
                                </a>
                            </div>

                            {{-- Errores --}}
                            @if ($errors->any())
                            <div class="text-danger small mt-2 text-center">
                                {{ $errors->first() }}
                            </div>
                            @endif

                            {{-- Mensajes de sesión --}}
                            @if(session('message'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('message') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            @endif
                        </form>

                    </div>
                </div>
            </div>
        </div>

    </div>
</main>

@include('layout.sections.private-foot')