<div class="card" style="font-size: .9em">
    <div class="card-body">

        <!-- Mensaje de éxito -->
        @if(session()->has('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
        @endif

        <!-- Barra de búsqueda -->
        <div class="d-flex justify-content-end align-items-center mb-3">
            <div class="mx-2">
                <input wire:model="search" class="form-control form-control-sm" type="text" placeholder="Buscar participante..." />
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Participante</th>
                        <th>Tema</th>
                        <th>Expositor</th>
                        <th>Asistencia</th>
                        <th>Fecha</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($applicantParticipants as $ap)
                    @php
                    $attendance = $ap->attendances->first();
                    @endphp
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $ap->participant->user->name }} {{ $ap->participant->user->lastname }}</td>
                        <td>{{ $ap->applicant->title ?? $ap->applicant->name }}</td>
                        <td>{{ $ap->applicant->user->name }} {{ $ap->applicant->user->lastname }}</td>
                        <td>
                            <button
                                wire:click="markAsAttended({{ $ap->id }})"
                                class="btn {{ $attendance?->attended ? 'btn-success' : 'btn-primary' }}"
                                @if($attendance?->attended) disabled @endif
                                >
                                {{ $attendance?->attended ? 'Asistió' : 'Marcar Asistencia' }}
                            </button>
                        </td>
                        <td>
                            {{ $attendance?->checked_in_at?->format('d/m/Y') ?? '-' }}
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center">No hay participantes.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>

            <!-- Botón alineado a la derecha -->
            <div class="d-flex justify-content-end mt-3">
                <a href="{{ route('dashboard.attendance.report') }}" class="btn btn-secondary">
                    Descargar Reporte
                </a>
            </div>
        </div>

    </div>
</div>