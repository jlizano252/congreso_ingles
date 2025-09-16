@extends('layout.sections.dashboard.participant-layout')

@section('title', 'Información del Participante')

@section('content')
<div class="container mt-4">

    <h1 class="mb-4">Información del Participante</h1>

    {{-- Mensaje de éxito --}}
    @if(session('message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('message') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
    </div>
    @endif

    {{-- Errores --}}
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
    <p><strong>Participante:</strong> {{ $participant->user->name }} {{ $participant->user->lastname }}</p>

    <h3 class="mt-4">Seleccione los temas de su interés:</h3>

    @if($applicants && $applicants->count() > 0)
    <form action="{{ route('participant.register') }}" method="POST" id="participantForm">
        @csrf
        <input type="hidden" name="participant_id" value="{{ $participant->id }}">

        <div class="row">
            @foreach($applicants as $applicant)
            @php
            $capacity = 10; // cupos máximos por topic
            $registeredCount = $applicant->participants()->count();
            $available = $capacity - $registeredCount;
            $alreadyRegistered = $participant->applicants->contains($applicant->id);
            @endphp

            <div class="col-md-4 mb-3">
                <div class="card h-100 {{ $available <= 0 ? 'bg-light text-muted' : '' }}">
                    <div class="card-body">
                        <div class="form-check">
                            <input class="form-check-input topic-checkbox" type="checkbox"
                                name="topics[]" value="{{ $applicant->id }}"
                                id="applicant-{{ $applicant->id }}"
                                {{ $alreadyRegistered ? 'checked disabled' : '' }}
                                {{ !$alreadyRegistered && $available <= 0 ? 'disabled' : '' }}>

                            <label class="form-check-label" for="applicant-{{ $applicant->id }}">
                                <strong>{{ $applicant->user->name ?? 'Nombre no disponible' }}</strong><br>
                                {{ $applicant->title ?? 'Sin título' }}<br>
                                <small>
                                    Cupos disponibles: {{ $available > 0 ? $available : 0 }}
                                    {{ $alreadyRegistered ? '(Ya inscrito)' : '' }}
                                </small>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <button type="submit" id="participarBtn" class="btn btn-primary mt-3" disabled>Participar</button>
    </form>
    @else
    <p>No hay applicants disponibles para este participante.</p>
    @endif

    @else
    <p>Participante o usuario no encontrado.</p>
    @endif
</div>

{{-- Script para habilitar/deshabilitar el botón --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const checkboxes = document.querySelectorAll('.topic-checkbox');
        const submitBtn = document.getElementById('participarBtn');

        function toggleButton() {
            const checked = Array.from(checkboxes).some(cb => cb.checked && !cb.disabled);
            submitBtn.disabled = !checked;
        }

        checkboxes.forEach(cb => {
            cb.addEventListener('change', toggleButton);
        });

        // Revisar al cargar la página
        toggleButton();
    });
</script>
@endsection