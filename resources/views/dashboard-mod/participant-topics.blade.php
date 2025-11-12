@extends('layout.sections.dashboard.participant-layout')

@section('title', 'Participant Sessions')

@section('content')
<link rel="stylesheet" href="{{ asset('css/ivetc.css') }}">

<style>
    .congreso-blue {
        color: #1976d2;
    }

    .congreso-orange {
        color: #f57c00;
    }

    /* Botones */
    .btn-orange {
        background-color: #f57c00;
        border-color: #f57c00;
        color: #fff;
        transition: 0.2s;
    }

    .btn-orange:hover {
        background-color: #e67300;
        border-color: #e67300;
    }

    .btn-blue {
        background-color: #1976d2;
        border-color: #1976d2;
        color: #fff;
        transition: 0.2s;
    }

    .btn-blue:hover {
        background-color: #1565c0;
        border-color: #1565c0;
    }

    /* Cards */
    .card-hover-shadow:hover {
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
    }

    .date-card-header {
        background-color: #1976d2;
        color: #fff;
        text-align: center;
        font-weight: bold;
        font-size: 1.2rem;
        padding: 0.75rem 1rem;
        border-radius: 0.25rem 0.25rem 0 0;
    }

    .session-card-body {
        padding: 1rem;
    }

    .expositor-photo {
        width: 90px;
        height: 90px;
        object-fit: cover;
        border: 2px solid #ddd;
    }

    .modal-body-custom {
        max-height: 60vh;
        overflow-y: auto;
    }

    .session-title {
        font-size: 1rem;
        font-weight: bold;
    }

    .small-info {
        font-size: 0.85rem;
    }
</style>

<div class="container mt-4">
    <h1 class="mb-4 congreso-blue text-center">Participant Sessions</h1>

    {{-- Mensajes --}}
    @if(session('message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('message') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif

    @if($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    {{-- Información del participante --}}
    @if($participant && $participant->user)
    <h2 class="fw-bold congreso-orange mb-4 text-center">
        {{ $participant->user->name }} {{ $participant->user->lastname }}
    </h2>

    @if($sessionsByDate && $sessionsByDate->count() > 0)
    <form action="{{ route('participant.register') }}" method="POST" id="participantForm">
        @csrf
        <input type="hidden" name="participant_id" value="{{ $participant->id }}">

        @foreach($sessionsByDate as $dateTitle => $sessionsOfDay)
        <div class="card mb-4 shadow-sm">
            <div class="card-header date-card-header">{{ $dateTitle }}</div>
            <div class="card-body">
                <div class="row g-4">
                    @foreach($sessionsOfDay as $session)
                    @php $applicantForm = $session['applicant_form'] ?? $session['applicantForm'] ?? null; @endphp
                    <div class="col-md-4">
                        <div class="card h-100 shadow-sm rounded border-0 card-hover-shadow">
                            <div class="card-body session-card-body text-center position-relative">
                                {{-- Checkbox --}}
                                <div class="position-absolute top-0 end-0 p-2">
                                    <input type="checkbox" class="form-check-input session-checkbox"
                                        name="sessions[]" value="{{ $session['id'] }}"
                                        {{ $session['already_registered'] ? 'checked disabled' : '' }}
                                        {{ !$session['already_registered'] && $session['available_spots'] <= 0 ? 'disabled' : '' }}>
                                </div>

                                {{-- Foto expositor --}}
                                @if($applicantForm && ($applicantForm['photo'] ?? false))
                                <img src="{{ asset('storage/' . $applicantForm['photo']) }}" class="rounded-circle mb-3 expositor-photo">
                                @else
                                <i class="fas fa-user-circle fa-4x text-secondary mb-3"></i>
                                @endif

                                {{-- Título --}}
                                <h5 class="mb-1 congreso-orange session-title">{{ $applicantForm['title'] ?? 'Untitled Topic' }}</h5>

                                {{-- Expositor --}}
                                <p class="text-muted small-info mb-2">
                                    {{ $applicantForm['applicant']['user']['name'] ?? 'N/A' }}
                                    {{ $applicantForm['applicant']['user']['lastname'] ?? '' }}
                                </p>

                                {{-- Spots --}}
                                <p class="mb-2 text-secondary small-info">
                                    <i class="fas fa-user-friends me-1"></i>
                                    Available Spots: {{ $session['available_spots'] > 0 ? $session['available_spots'] : 0 }}
                                    {{ $session['already_registered'] ? '(Already registered)' : '' }}
                                </p>

                                {{-- Date & Time --}}
                                <p class="mb-1 text-info small-info">
                                    <i class="fas fa-clock me-1"></i>
                                    {{ \Carbon\Carbon::parse($session['date'])->format('d/m/Y') }}
                                    {{ \Carbon\Carbon::parse($session['start_time'])->format('H:i') }} -
                                    {{ \Carbon\Carbon::parse($session['end_time'])->format('H:i') }}
                                </p>

                                {{-- Room --}}
                                <p class="mb-3 text-secondary small-info">
                                    <i class="fas fa-door-open me-1"></i> {{ $session['room']['name'] ?? 'Unknown Room' }}
                                </p>

                                {{-- Botones --}}
                                <div class="d-flex justify-content-center gap-2">
                                    <button type="button" class="btn btn-blue fw-bold" data-bs-toggle="modal" data-bs-target="#aboutExpositorModal{{ $session['id'] }}">About Expositor</button>
                                    <button type="button" class="btn btn-orange fw-bold" data-bs-toggle="modal" data-bs-target="#aboutSessionModal{{ $session['id'] }}">About Session</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Modal Expositor --}}
                    <div class="modal fade" id="aboutExpositorModal{{ $session['id'] }}" tabindex="-1" aria-labelledby="aboutExpositorLabel{{ $session['id'] }}" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content rounded shadow-lg">
                                <div class="modal-header" style="background-color:#1976d2; color:#fff;">
                                    <h5 class="modal-title" id="aboutExpositorLabel{{ $session['id'] }}">About Expositor</h5>
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body text-center">
                                    @if($applicantForm && ($applicantForm['photo'] ?? false))
                                    <img src="{{ asset('storage/' . $applicantForm['photo']) }}" class="rounded-circle mb-3" style="width:100px; height:100px; object-fit:cover;">
                                    @else
                                    <i class="fas fa-user-circle fa-4x text-secondary mb-3"></i>
                                    @endif
                                    <h5 class="fw-bold mb-2 congreso-orange">
                                        {{ $applicantForm['applicant']['user']['name'] ?? 'N/A' }}
                                        {{ $applicantForm['applicant']['user']['lastname'] ?? '' }}
                                    </h5>
                                    <p><strong>Academic Title:</strong> {{ $applicantForm['academic_title'] ?? 'N/A' }}</p>
                                    <p><strong>Biography:</strong> {{ $applicantForm['exp'] ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Modal Sesión --}}
                    <div class="modal fade" id="aboutSessionModal{{ $session['id'] }}" tabindex="-1" aria-labelledby="aboutSessionLabel{{ $session['id'] }}" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content rounded shadow-lg">
                                <div class="modal-header" style="background-color:#f57c00; color:#fff;">
                                    <h5 class="modal-title" id="aboutSessionLabel{{ $session['id'] }}">About Session</h5>
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body modal-body-custom">
                                    <div class="mb-3 p-3 bg-light rounded shadow-sm">
                                        <h6 class="fw-bold congreso-blue"><i class="fas fa-heading me-2"></i> Title</h6>
                                        <p class="mb-0">{{ $applicantForm['title'] ?? 'N/A' }}</p>
                                    </div>
                                    <div class="mb-3 p-3 bg-light rounded shadow-sm">
                                        <h6 class="fw-bold congreso-blue"><i class="fas fa-file-alt me-2"></i> Abstract</h6>
                                        <p class="mb-0">{{ $applicantForm['abstract'] ?? 'N/A' }}</p>
                                    </div>
                                    <div class="mb-3 p-3 bg-light rounded shadow-sm">
                                        <h6 class="fw-bold congreso-blue"><i class="fas fa-align-left me-2"></i> Description</h6>
                                        <p class="mb-0">{{ $applicantForm['description'] ?? 'N/A' }}</p>
                                    </div>
                                    <div class="mb-3 p-3 bg-light rounded shadow-sm">
                                        <h6 class="fw-bold congreso-blue"><i class="fas fa-clock me-2"></i> Date & Time</h6>
                                        <p class="mb-0">{{ \Carbon\Carbon::parse($session['date'])->format('d/m/Y') }} {{ \Carbon\Carbon::parse($session['start_time'])->format('H:i') }} - {{ \Carbon\Carbon::parse($session['end_time'])->format('H:i') }}</p>
                                    </div>
                                    <div class="mb-3 p-3 bg-light rounded shadow-sm">
                                        <h6 class="fw-bold congreso-blue"><i class="fas fa-door-open me-2"></i> Room</h6>
                                        <p class="mb-0">{{ $session['room']['name'] ?? 'Unknown Room' }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @endforeach
                </div>
            </div>
        </div>
        @endforeach

        <div class="text-center">
            <button type="submit" id="participarBtn" class="btn btn-orange mt-3 fw-bold" disabled>Participate</button>
        </div>
    </form>
    @else
    <p class="text-center">No sessions available for this participant.</p>
    @endif
    @else
    <p class="text-center">Participant not found.</p>
    @endif
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const checkboxes = document.querySelectorAll('.session-checkbox');
        const submitBtn = document.getElementById('participarBtn');

        function toggleButton() {
            const checked = Array.from(checkboxes).some(cb => cb.checked && !cb.disabled);
            submitBtn.disabled = !checked;
        }

        checkboxes.forEach(cb => cb.addEventListener('change', toggleButton));
        toggleButton();
    });
</script>
@endsection