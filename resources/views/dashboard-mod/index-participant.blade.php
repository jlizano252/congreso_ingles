@php $pageTitle = 'V-ETC | Booking Sessions'; @endphp
@include('layout.sections.private-head')
@include('layout.sections.messages')

<main class="main" id="top">
    <div class="container" data-layout="container">
        <div class="row flex-center min-vh-100 py-6 mt-lg-n7">
            <div class="col-sm-10 col-md-8 col-lg-6 col-xl-4 col-xxl-3">

                <img src="https://vetc.centroatenea.network/images/Acronimo_year.png"
                    alt="vetc"
                    style="max-width: 100px; height: auto; margin: 0 auto 20px auto; display: block;">

                <div class="card shadow-sm">
                    <div class="card-body p-4">
                        <h5 class="mb-3 text-center">Booking Sessions</h5>

                        @if(!session()->has('participant_registered'))
                        <div class="alert alert-info py-2 mb-4" role="alert" style="font-size: 0.9rem;">
                            <i class="fas fa-info-circle me-2"></i>
                            Please enroll before searching for available sessions.
                        </div>
                        @endif

                        <form action="{{ route('participant.find') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <input name="ide" class="form-control" type="text" placeholder="Type your ID" required />
                            </div>
                            <button class="btn btn-primary d-block w-100" type="submit">Search</button>
                        </form>

                        <a href="{{ route('webpage.index') }}" class="btn btn-secondary d-block w-100 mt-2">
                            Go to Home
                        </a>

                        @if ($errors->any())
                        <div class="text-danger small mt-2 text-center">{{ $errors->first() }}</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@include('layout.sections.private-foot')