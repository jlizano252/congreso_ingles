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

    .card-hover-shadow:hover {
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
    }

    .date-card-header {
        background-color: #1976d2;
        color: #fff;
        text-align: center;
        font-weight: bold;
        font-size: 1.2rem;
        padding: .75rem 1rem;
        border-radius: .25rem .25rem 0 0;
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

    .block-title {
        font-size: 1.1rem;
        font-weight: bold;
        color: #f57c00;
        margin-bottom: 1rem;
        text-transform: uppercase;
    }
</style>

<div class="container mt-4">
    <h1 class="mb-4 congreso-blue text-center">Participant Sessions</h1>

    {{-- Messages --}}
    @if(session('message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('message') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif

    @if($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach($errors->all() as $error) <li>{{ $error }}</li> @endforeach
        </ul>
    </div>
    @endif

    {{-- Participant Info --}}
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
            <div class="date-card-header">{{ $dateTitle }}</div>
            <div class="card-body">

                {{-- Agrupar por bloque --}}
                @php
                $sessionsByBlock = collect($sessionsOfDay)->groupBy('block');
                @endphp

                @foreach($sessionsByBlock as $blockNumber => $blockSessions)
                <div class="mb-4 p-3 border rounded bg-light shadow-sm">
                    <div class="block-title text-center">
                        Block {{ $blockNumber }}:
                        <span class="text-muted">
                            {{ $blockSessions->first()['block_time'] }}
                        </span>
                    </div>
                    <div class="row g-4">
                        @foreach($blockSessions as $session)
                        @php
                        $applicantForm = $session['applicant_form'] ?? $session['applicantForm'] ?? null;
                        @endphp

                        <div class="col-md-4">
                            <div class="card h-100 shadow-sm rounded border-0 card-hover-shadow">
                                <div class="card-body session-card-body text-center position-relative">

                                    {{-- Checkbox --}}
                                    <div class="position-absolute top-0 end-0 p-2">
                                        <input type="checkbox"
                                            class="form-check-input session-checkbox"
                                            name="sessions[]"
                                            value="{{ $session['id'] }}"
                                            data-block="{{ $session['block'] }}"
                                            {{ $session['already_registered'] ? 'checked disabled' : '' }}
                                            {{ !$session['already_registered'] && $session['available_spots'] <= 0 ? 'disabled' : '' }}>
                                    </div>

                                    {{-- Expositor Photo --}}
                                    @if($applicantForm && ($applicantForm['photo'] ?? false))
                                    <img src="{{ asset('storage/' . $applicantForm['photo']) }}"
                                        class="rounded-circle mb-3 expositor-photo">
                                    @else
                                    <i class="fas fa-user-circle fa-4x text-secondary mb-3"></i>
                                    @endif

                                    <h5 class="mb-1 congreso-orange session-title">
                                        {{ $applicantForm['title'] ?? 'Untitled Topic' }}
                                    </h5>

                                    <p class="text-muted small-info mb-2">
                                        {{ $applicantForm['applicant']['user']['name'] ?? 'N/A' }}
                                        {{ $applicantForm['applicant']['user']['lastname'] ?? '' }}
                                    </p>

                                    <p class="small-info text-primary mb-2">
                                        <strong>Modality:</strong> {{ $applicantForm['participation_type'] ?? 'N/A' }}
                                    </p>

                                    <p class="mb-2 text-secondary small-info">
                                        <i class="fas fa-user-friends me-1"></i>
                                        Available Spots: {{ $session['available_spots'] }}
                                        {{ $session['already_registered'] ? '(Already registered)' : '' }}
                                    </p>

                                    <p class="mb-1 text-info small-info">
                                        <i class="fas fa-clock me-1"></i>
                                        {{ \Carbon\Carbon::parse($session['date'])->format('d/m/Y') }}
                                        {{ \Carbon\Carbon::parse($session['start_time'])->format('H:i') }}
                                        -
                                        {{ \Carbon\Carbon::parse($session['end_time'])->format('H:i') }}
                                    </p>

                                    <p class="mb-3 text-secondary small-info">
                                        <i class="fas fa-door-open me-1"></i>
                                        {{ $session['room']['name'] ?? 'Unknown Room' }}
                                    </p>

                                    <div class="d-flex justify-content-center gap-2">
                                        <button type="button" class="btn btn-blue fw-bold"
                                            data-bs-toggle="modal"
                                            data-bs-target="#aboutExpositorModal{{ $session['id'] }}">
                                            About Expositor
                                        </button>

                                        <button type="button" class="btn btn-orange fw-bold"
                                            data-bs-toggle="modal"
                                            data-bs-target="#aboutSessionModal{{ $session['id'] }}">
                                            About Session
                                        </button>
                                    </div>

                                </div>
                            </div>
                        </div>

                        {{-- Modal Expositor --}}
                        <div class="modal fade" id="aboutExpositorModal{{ $session['id'] }}" tabindex="-1">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content rounded shadow-lg">
                                    <div class="modal-header" style="background-color:#1976d2; color:#fff;">
                                        <h5 class="modal-title">About Expositor</h5>
                                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body text-center">
                                        @if($applicantForm && ($applicantForm['photo'] ?? false))
                                        <img src="{{ asset('storage/' . $applicantForm['photo']) }}"
                                            class="rounded-circle mb-3" style="width:100px;height:100px;">
                                        @else
                                        <i class="fas fa-user-circle fa-4x text-secondary mb-3"></i>
                                        @endif

                                        <h5 class="fw-bold congreso-orange">
                                            {{ $applicantForm['applicant']['user']['name'] ?? '' }}
                                            {{ $applicantForm['applicant']['user']['lastname'] ?? '' }}
                                        </h5>

                                        <p><strong>Academic Title:</strong> {{ $applicantForm['academic_title'] ?? 'N/A' }}</p>
                                        <p><strong>Biography:</strong> {{ $applicantForm['exp'] ?? 'N/A' }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Modal Session --}}
                        <div class="modal fade" id="aboutSessionModal{{ $session['id'] }}" tabindex="-1">
                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content rounded shadow-lg">
                                    <div class="modal-header" style="background-color:#f57c00; color:#fff;">
                                        <h5 class="modal-title">About Session</h5>
                                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body modal-body-custom">

                                        <div class="mb-3 p-3 bg-light rounded shadow-sm">
                                            <h6 class="fw-bold congreso-blue">Title</h6>
                                            <p>{{ $applicantForm['title'] ?? 'N/A' }}</p>
                                        </div>

                                        <div class="mb-3 p-3 bg-light rounded shadow-sm">
                                            <h6 class="fw-bold congreso-blue">Abstract</h6>
                                            <p>{{ $applicantForm['abstract'] ?? 'N/A' }}</p>
                                        </div>

                                        <div class="mb-3 p-3 bg-light rounded shadow-sm">
                                            <h6 class="fw-bold congreso-blue">Description</h6>
                                            <p>{{ $applicantForm['description'] ?? 'N/A' }}</p>
                                        </div>

                                        <div class="mb-3 p-3 bg-light rounded shadow-sm">
                                            <h6 class="fw-bold congreso-blue">Date & Time</h6>
                                            <p>{{ \Carbon\Carbon::parse($session['date'])->format('d/m/Y') }}
                                                {{ \Carbon\Carbon::parse($session['start_time'])->format('H:i') }}
                                                -
                                                {{ \Carbon\Carbon::parse($session['end_time'])->format('H:i') }}
                                            </p>
                                        </div>

                                        <div class="mb-3 p-3 bg-light rounded shadow-sm">
                                            <h6 class="fw-bold congreso-blue">Room</h6>
                                            <p>{{ $session['room']['name'] ?? 'Unknown Room' }}</p>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        @endforeach
                    </div>
                </div>
                @endforeach

            </div>
        </div>
        @endforeach

        <div class="text-center">
            <button type="submit" id="participarBtn" class="btn btn-orange mt-3 fw-bold" disabled>
                Participate
            </button>
        </div>

    </form>

    @else
    <p class="text-center">No sessions available yet.</p>
    @endif

    @else
    <p class="text-center">Participant not found.</p>
    @endif
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {

        const checkboxes = document.querySelectorAll('.session-checkbox');
        const submitBtn = document.getElementById('participarBtn');

        checkboxes.forEach(cb => {
            cb.addEventListener('change', function() {

                if (this.checked) {
                    const block = this.dataset.block;

                    // Deseleccionar otros del mismo bloque
                    checkboxes.forEach(other => {
                        if (other !== this && other.dataset.block === block) {
                            other.checked = false;
                        }
                    });
                }

                toggleButton();
            });
        });

        function toggleButton() {
            const checked = [...checkboxes].some(cb => cb.checked);
            submitBtn.disabled = !checked;
        }

        toggleButton();
    });
</script>

@endsection