@include('layout.sections.private-head')
@include('layout.sections.messages')

<main class="main" id="top">
    <div class="container" data-layout="container">

        <div class="row flex-center min-vh-100 py-6 mt-lg-n7">
            <div class="col-sm-10 col-md-8 col-lg-6 col-xl-4 col-xxl-3">
                <div class="card">
                    <div class="card-body p-4">
                        <div class="row flex-between-center mb-2">
                            <div class="col-auto">
                                <h5>Registro de Participante</h5>
                            </div>
                        </div>

                        {{-- Formulario de ingreso de cédula --}}
                        <form action="{{ route('participant.find') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <input name="ide" class="form-control" type="text" placeholder="Ingrese su cédula" required />
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-primary d-block w-100 mt-3" type="submit">Buscar</button>
                            </div>

                            @if ($errors->any())
                            <div class="text-danger small mt-2 text-center">
                                {{ $errors->first() }}
                            </div>
                            @endif
                            @if(session('message'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('message') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
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