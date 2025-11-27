<div class="card" style="font-size: .9em">
    <div class="card-body">

        <!-- Flash message -->
        @if(session()->has('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <!-- Search bar -->
        <div class="d-flex justify-content-end align-items-center mb-3">
            <div class="mx-2">
                <input wire:model="search" class="form-control form-control-sm" type="text" placeholder="Search participants..." />
            </div>
        </div>

        <!-- Table -->
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="table-dark text-center">
                    <tr>
                        <th>#</th>
                        <th>Participant</th>
                        <th>Session</th>
                        <th>Presenter</th>
                        <th>Attendance</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($sessionParticipants as $sp)
                    @php $attendance = $sp->attendances->first(); @endphp
                    <tr class="text-center">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $sp->participant->user->name }} {{ $sp->participant->user->lastname }}</td>
                        <td>{{ $sp->session->applicantForm->title ?? '-' }}</td>
                        <td>{{ $sp->session->applicantForm->applicant->user->name }} {{ $sp->session->applicantForm->applicant->user->lastname }}</td>
                        <td>
                            <button wire:click="markAsAttended({{ $sp->id }})"
                                class="btn btn-sm fw-bold {{ $attendance?->attended ? 'btn-success' : 'btn-primary' }}"
                                @if($attendance?->attended) disabled @endif>
                                {{ $attendance?->attended ? 'Attended' : 'Mark Attendance' }}
                            </button>
                        </td>
                        <td>{{ $attendance?->checked_in_at?->format('d/m/Y') ?? '-' }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center">There are no participants.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>

            {{ $sessionParticipants->links() }}

            <!-- Download report button -->
            <div class="d-flex justify-content-end mt-3">
                <a href="{{ route('dashboard.attendance.report') }}" class="btn btn-secondary fw-bold">
                    Download Attendance Report
                </a>
            </div>
            <div class="d-flex justify-content-end mt-3">
                <a href="{{ route('dashboard.troubleshooters.report') }}" class="btn btn-warning fw-bold text-dark">
                    Download Troubleshooters Report
                </a>
            </div>
        </div>

        <!-- General comments section -->
        <div class="mt-4">
            <h5 class="fw-bold">General Comments</h5>
            <p class="text-muted small mb-2">
                Add any notes or observations about participants or attendance.
            </p>
            <textarea class="form-control" rows="4" placeholder="Example: Participants who did not attend are not marked..." wire:model="generalComments"></textarea>
            <div class="d-flex justify-content-end mt-2">
                <button
                    class="btn btn-primary fw-bold"
                    wire:click="saveGeneralComments"
                    @if(empty($generalComments)) disabled @endif>
                    Save Comment
                </button>
            </div>
        </div>

    </div>
</div>