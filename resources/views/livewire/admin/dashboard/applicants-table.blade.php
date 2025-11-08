<div>
    {{-- Card principal --}}
    <div class="card" style="font-size: .9em">

        {{-- Header con barra de acciones --}}
        <div class="card-body pb-0 d-flex justify-content-between align-items-center mb-3 flex-wrap">
            {{-- Botón Expositor --}}
            <div class="d-flex align-items-center mb-2 mb-md-0">
                @if(in_array(\Illuminate\Support\Facades\Auth::user()->ide,['207860302', '206590313', '208220670']))
                <button class="btn btn-warning btn-sm me-2" wire:click="$set('showChooseUserModal', true)">
                    <span class="fas fa-edit me-1"></span>Expositor
                </button>
                @endif
            </div>

            {{-- Barra de búsqueda + descargar --}}
            <div class="d-flex align-items-center flex-wrap">
                <input wire:model="search" class="form-control form-control-sm me-2 mb-2 mb-md-0"
                    type="text" placeholder="Search applicant..." />
                <button wire:click="export" class="btn btn-falcon-default btn-sm" type="button">
                    <span class="fas fa-download me-1" data-fa-transform="shrink-3"></span>Download
                </button>
            </div>
        </div>

        {{-- Tabla de applicants --}}
        <div class="table-responsive scrollbar">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Dept.</th>
                        <th scope="col">Joined</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($applicants as $applicant)
                    <tr class="hover-actions-trigger">
                        <td class="align-middle text-nowrap">
                            <div class="d-flex align-items-center">
                                {{-- Foto --}}
                                <div class="flex-shrink-0 me-3">
                                    @if($applicant->applicant->photo)
                                    <a href="{{ asset('storage/' . $applicant->applicant->photo) }}" target="_blank">
                                        <img class="rounded-circle border border-secondary"
                                            src="{{ asset('storage/' . $applicant->applicant->photo) }}"
                                            alt="{{ $applicant->applicant->user?->name }}"
                                            style="width:50px;height:50px;object-fit:cover;">
                                    </a>
                                    @else
                                    <img class="rounded-circle border border-secondary"
                                        src="{{ asset('images/team/avatar.png') }}"
                                        alt="{{ $applicant->applicant->user?->name }}"
                                        style="width:50px;height:50px;object-fit:cover;">
                                    @endif
                                </div>

                                {{-- Nombre --}}
                                <div class="flex-grow-1">
                                    <button wire:click="openModal({{ $applicant->applicant->user_id }})"
                                        class="btn btn-link p-0 text-capitalize fw-semibold">
                                        {{ ucfirst(strtolower($applicant->applicant->user?->name . ' ' . $applicant->applicant->user?->lastname)) }}
                                    </button>
                                    <div class="small text-muted">{{ $applicant->applicant->ide }}</div>
                                </div>
                            </div>
                        </td>

                        <td class="align-middle text-nowrap">{{ $applicant->applicant->user?->email ?? 'N/A' }}</td>
                        <td class="align-middle text-nowrap">
                            <span class="badge badge-soft-warning text-uppercase fw-semibold">Expositor</span>
                        </td>
                        <td class="align-middle text-nowrap">{{ \Carbon\Carbon::make($applicant->created_at)->toFormattedDateString() }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- Paginación --}}
        @if($applicants->hasPages())
        <div class="card-footer d-flex justify-content-end">
            {{ $applicants->links() }}
        </div>
        @endif
    </div>

    {{-- Modal para elegir acción --}}
    @if($showChooseUserModal)
    <div class="modal fade show d-block" wire:ignore.self>
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Choose an option</h5>
                    <button type="button" class="btn-close" wire:click="$set('showChooseUserModal', false)"></button>
                </div>
                <div class="modal-body">
                    @if(!$useExistingUser)
                    <button class="btn btn-primary w-100 mb-2" wire:click="useExistingUser">
                        Add data to an existing expositor
                    </button>
                    <button class="btn btn-success w-100" wire:click="createNewUser">
                        Create new expositor
                    </button>
                    @else
                    <label for="existingUser" class="form-label fw-bold">Select an existing user</label>
                    <select id="existingUser" class="form-select mb-3" wire:model="selectedUserId">
                        <option value="">-- Choose a user --</option>
                        @foreach($applicants->unique('applicant.user_id') as $applicant)
                        <option value="{{ $applicant->applicant->user_id }}">
                            {{ $applicant->applicant->user?->name ?? '' }}
                            {{ $applicant->applicant->user?->lastname ?? '' }}
                            ({{ $applicant->applicant->user?->email ?? '' }})
                        </option>
                        @endforeach
                    </select>
                    <button class="btn btn-primary w-100" wire:click="selectExistingUser">Continue</button>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="modal-backdrop fade show"></div>
    @endif

    {{-- Modal profesional del applicant --}}
    @if($showModal)
    <link rel="stylesheet" href="{{ asset('css/ivetc.css') }}">
    <div class="modal fade show d-block" id="applicantModal" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content rounded shadow-lg">

                {{-- Header --}}
                <div class="modal-header modal-header-blue text-white">
                    <div class="d-flex align-items-center">
                        @if($selectedUserApplicants->first()?->applicant->photo)
                        <img src="{{ asset('storage/' . $selectedUserApplicants->first()->applicant->photo) }}"
                            alt="{{ $selectedUserApplicants->first()->applicant->user?->name }}"
                            class="rounded-circle me-2"
                            style="width: 40px; height: 40px; object-fit: cover; border: 1px solid #fff;">
                        @else
                        <i class="fas fa-user-circle me-2 fs-4 text-white"></i>
                        @endif
                        <h5 class="modal-title mb-0 fs-5 fw-bold text-white">
                            {{ $selectedUserApplicants->first()->applicant->user?->name }}
                            {{ $selectedUserApplicants->first()->applicant->user?->lastname }}
                        </h5>
                    </div>
                    <button type="button" class="btn-close btn-close-white" wire:click="closeModal"></button>
                </div>

                {{-- Body --}}
                <div class="modal-body" style="font-size: 0.95rem; line-height: 1.5;">
                    @foreach($selectedUserApplicants as $index => $applicant)
                    <div class="mb-4">
                        {{-- Separador de tema --}}
                        <div class="d-flex align-items-center mb-3">
                            <span class="badge bg-primary me-2">Topic #{{ $index + 1 }}</span>
                            <h6 class="mb-0 fw-bold">{{ $applicant->title ?? 'Without title' }}</h6>
                        </div>
                        <hr class="mb-3">

                        @php
                        $fields = [
                        ['title'=>'Teacher Wellbeing','value'=>$applicant->teacher_wellbeing ?? 'N/A','bg'=>'bg-info text-white','icon'=>'fas fa-heartbeat'],
                        ['title'=>'Academic Title','value'=>$applicant->academic_title ?? 'N/A','bg'=>'bg-info text-white','icon'=>'fas fa-graduation-cap'],
                        ['title'=>'Selected Audiences','value'=>$applicant->selected_audiences ?? 'N/A','bg'=>'bg-info text-white','icon'=>'fas fa-users'],
                        ['title'=>'Abstract','value'=>$applicant->abstract ?? 'N/A','bg'=>'bg-info text-white','icon'=>'fas fa-file-alt'],
                        ['title'=>'Description','value'=>$applicant->description ?? 'N/A','bg'=>'bg-etc-orange text-white','icon'=>'fas fa-align-left'],
                        ];
                        @endphp

                        <div class="row g-3">
                            @foreach($fields as $field)
                            <div class="col-12 col-md-6">
                                <div class="card shadow-sm h-auto d-flex flex-column hover-shadow transition">
                                    <div class="card-header {{ $field['bg'] }} fw-bold d-flex align-items-center">
                                        <i class="{{ $field['icon'] }} me-2"></i> {{ $field['title'] }}
                                    </div>
                                    <div class="card-body p-3" style="max-height: 150px; overflow-y: auto;">
                                        @if(is_array($field['value']))
                                        <ul class="list-unstyled mb-0">
                                            @foreach($field['value'] as $item)
                                            <li class="p-2 bg-gray-100 rounded-lg mb-1 hover:bg-blue-100 transition">• {{ $item }}</li>
                                            @endforeach
                                        </ul>
                                        @else
                                        <p class="mb-0">{{ $field['value'] }}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endforeach

                    <div class="d-flex justify-content-end mt-4">
                        <button class="btn info_btn fw-bold px-5" wire:click="closeModal">Close</button>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="modal-backdrop fade show"></div>
    @endif
</div>