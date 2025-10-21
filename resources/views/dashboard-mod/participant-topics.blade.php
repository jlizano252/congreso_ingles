@extends('layout.sections.dashboard.participant-layout')

@section('title', 'Participant Information')

@section('content')
<link rel="stylesheet" href="{{ asset('css/ivetc.css') }}">

<div class="container mt-4">
    <h1 class="mb-4">Participant Information</h1>

    {{-- Success message --}}
    @if(session('message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('message') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    {{-- Errors --}}
    @if($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    @if($participant && $participant->user)
    <p class="fw-bold">Participant: {{ $participant->user->name }} {{ $participant->user->lastname }}</p>

    <h3 class="mt-4 mb-3">Select a Topic:</h3>

    @if($applicants && $applicants->count() > 0)
    <form action="{{ route('participant.register') }}" method="POST" id="participantForm">
        @csrf
        <input type="hidden" name="participant_id" value="{{ $participant->id }}">

        <div class="row g-4">
            @foreach($applicants as $applicant)
            @php
            $form = $applicant->forms->first();
            $capacity = 10;
            $registeredCount = $applicant->participants()->count();
            $available = $capacity - $registeredCount;
            $alreadyRegistered = $participant->applicants->contains($applicant->id);
            @endphp

            <div class="col-md-4">
                <div class="card h-100 shadow-sm rounded border-0 hover-shadow transition">
                    <div class="card-body text-center position-relative">

                        {{-- Checkbox overlay --}}
                        <div class="position-absolute top-0 end-0 p-2">
                            <input type="checkbox" class="form-check-input topic-checkbox"
                                name="topics[]" value="{{ $applicant->id }}"
                                id="applicant-{{ $applicant->id }}"
                                {{ $alreadyRegistered ? 'checked disabled' : '' }}
                                {{ !$alreadyRegistered && $available <= 0 ? 'disabled' : '' }}>
                        </div>

                        {{-- Applicant Photo --}}
                        @if($form && $form->photo)
                        <img src="{{ asset('storage/' . $form->photo) }}" alt="{{ $applicant->user->name }}"
                            class="rounded-circle mb-3" style="width: 90px; height: 90px; object-fit: cover; border: 2px solid #ddd;">
                        @else
                        <i class="fas fa-user-circle fa-4x text-secondary mb-3"></i>
                        @endif

                        {{-- Applicant Name --}}
                        <h5 class="fw-bold mb-1">{{ $applicant->title ?? 'Untitled Topic' }}</h5>

                        {{-- Topic Title --}}
                        <p class="text-muted mb-2">{{ $applicant->user->name ?? 'Unknown' }} {{ $applicant->user->lastname ?? '' }}</p>

                        {{-- Available spots --}}
                        <p class="mb-3 text-secondary small">
                            <i class="fas fa-user-friends me-1"></i> Available Spots: {{ $available > 0 ? $available : 0 }}
                            {{ $alreadyRegistered ? '(Already registered)' : '' }}
                        </p>

                        {{-- Buttons --}}
                        <div class="d-flex justify-content-center gap-2">
                            <button type="button" class="btn btn-primary fw-bold"
                                data-bs-toggle="modal" data-bs-target="#aboutApplicantModal{{ $applicant->id }}">
                                About Expositor
                            </button>
                            <button type="button" class="btn btn-warning fw-bold"
                                data-bs-toggle="modal" data-bs-target="#aboutTopicModal{{ $applicant->id }}">
                                About Topic
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            {{-- About Applicant Modal --}}
            <div class="modal fade" id="aboutApplicantModal{{ $applicant->id }}" tabindex="-1" aria-labelledby="aboutApplicantLabel{{ $applicant->id }}" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content rounded shadow-lg">
                        <div class="modal-header bg-primary text-white">
                            <h5 class="modal-title" id="aboutApplicantLabel{{ $applicant->id }}">About Expositor</h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body text-center">
                            @if($form && $form->photo)
                            <img src="{{ asset('storage/' . $form->photo) }}" class="rounded-circle mb-3" style="width: 100px; height: 100px; object-fit: cover;">
                            @else
                            <i class="fas fa-user-circle fa-4x text-secondary mb-3"></i>
                            @endif
                            <h5 class="fw-bold mb-2">{{ $applicant->user->name ?? 'Unknown' }} {{ $applicant->user->lastname ?? '' }}</h5>
                            <p><strong>Academic Title:</strong> {{ $form->academic_title ?? 'N/A' }}</p>
                            <p><strong>Experience:</strong> {{ $form->exp ? $form->exp . ' years' : 'N/A' }}</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- About Topic Modal --}}
            <div class="modal fade" id="aboutTopicModal{{ $applicant->id }}" tabindex="-1" aria-labelledby="aboutTopicLabel{{ $applicant->id }}" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" style="max-height: 80vh;">
                    <div class="modal-content rounded shadow-lg">
                        <div class="modal-header bg-warning text-white">
                            <h5 class="modal-title" id="aboutTopicLabel{{ $applicant->id }}">About Topic</h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body" style="max-height: 60vh; overflow-y: auto;">
                            <div class="mb-3 p-3 bg-light rounded shadow-sm">
                                <h6 class="fw-bold"><i class="fas fa-heading me-2"></i>Title</h6>
                                <p class="mb-0">{{ $applicant->title ?? 'N/A' }}</p>
                            </div>
                            <div class="mb-3 p-3 bg-light rounded shadow-sm">
                                <h6 class="fw-bold"><i class="fas fa-file-alt me-2"></i>Abstract</h6>
                                <p class="mb-0">{{ $applicant->abstract ?? 'N/A' }}</p>
                            </div>
                            <div class="mb-3 p-3 bg-light rounded shadow-sm">
                                <h6 class="fw-bold"><i class="fas fa-align-left me-2"></i>Description</h6>
                                <p class="mb-0">{{ $applicant->description ?? 'N/A' }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @endforeach
        </div>

        <button type="submit" id="participarBtn" class="btn btn-success mt-3 fw-bold" disabled>Participate</button>
    </form>
    @else
    <p>No applicants available for this participant.</p>
    @endif
    @else
    <p>Participant or user not found.</p>
    @endif
</div>

{{-- Script --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const checkboxes = document.querySelectorAll('.topic-checkbox');
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

@include('layout.sections.private-foot')