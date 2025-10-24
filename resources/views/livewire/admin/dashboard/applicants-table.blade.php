<div>
    {{-- Applicants Table --}}
    <div class="card" style="font-size: .9em">
        <div class="card-body pb-0">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <!-- Botón Expositor / Apply alineado a la izquierda -->
                @if(in_array(\Illuminate\Support\Facades\Auth::user()->ide,['207860302', '206590313', '208220670']))
                <a href="{{ route('public.postularse.index') }}" class="btn btn-warning btn-sm">
                    <span class="fas fa-edit me-1"></span>Expositor
                </a>
                @endif
                <!-- Barra de búsqueda y Download alineados a la derecha -->
                <div class="d-flex justify-content-end align-items-center">
                    <div class="mx-2">
                        <input wire:model="search" class="form-control form-control-sm" type="text" placeholder="Search applicant..." />
                    </div>

                    <button wire:click="export" class="btn btn-falcon-default btn-sm me-1" type="button">
                        <span class="fas fa-download me-1" data-fa-transform="shrink-3"></span>Download
                    </button>
                </div>
            </div>

            <div class="table-responsive scrollbar">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Idea</th>
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
                                    {{-- Foto del applicant --}}
                                    <div class="flex-shrink-0 me-3">
                                        @if($applicant->applicant->photo)
                                        <a href="{{ asset('storage/' . $applicant->applicant->photo) }}" target="_blank" title="View full photo">
                                            <img class="rounded-circle border border-secondary"
                                                src="{{ asset('storage/' . $applicant->applicant->photo) }}"
                                                alt="{{ $applicant->name }}"
                                                style="width: 50px; height: 50px; object-fit: cover;">
                                        </a>
                                        @else
                                        <img class="rounded-circle border border-secondary"
                                            src="{{ asset('images/team/avatar.png') }}"
                                            alt="{{ $applicant->name }}"
                                            style="width: 50px; height: 50px; object-fit: cover;">
                                        @endif
                                    </div>

                                    {{-- Nombre y botón para modal --}}
                                    <div class="flex-grow-1">
                                        <button wire:click="openModal({{ $applicant->id }})" class="btn btn-link p-0 text-capitalize fw-semibold">
                                            {{ ucfirst(strtolower($applicant->name . ' ' . $applicant->lastname)) }}
                                        </button>
                                        <div class="small text-muted">{{ $applicant->ide }}</div>
                                    </div>
                                </div>
                            </td>

                            {{-- Idea --}}
                            <td class="align-middle text-nowrap">
                                @forelse($applicant->applicant->forms ?? [] as $form)
                                <div class="text-truncate">{{ $form->title }}</div>
                                @empty
                                <span class="text-muted fst-italic">N/A</span>
                                @endforelse
                            </td>

                            <td class="align-middle text-nowrap">{{ $applicant->email }}</td>
                            <td class="align-middle text-nowrap">
                                <span class="badge badge-soft-warning text-uppercase fw-semibold">Expositor</span>
                            </td>
                            <td class="align-middle text-nowrap">{{ \Carbon\Carbon::make($applicant->created_at)->toFormattedDateString() }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                @if(count($applicants) > 9)
                <div class="text-secondary d-flex justify-content-end small" style="font-size: .8rem !important;">
                    {{ $applicants->links() }}
                </div>
                @endif
            </div>
        </div>
    </div>

    {{-- Modal profesional para mostrar info del applicant --}}
    @if($selectedApplicant)
    @php
    $form = $selectedApplicant->applicant->forms->first();
    @endphp

    <link rel="stylesheet" href="{{ asset('css/ivetc.css') }}">

    <div class="modal fade show d-block" id="applicantModal" tabindex="-1" aria-labelledby="applicantModalLabel">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content rounded shadow-lg">

                {{-- Header --}}
                <div class="modal-header modal-header-blue text-white">
                    <div class="d-flex align-items-center">
                        @if($selectedApplicant->applicant->photo)
                        <img src="{{ asset('storage/' . $selectedApplicant->applicant->photo) }}"
                            alt="{{ $selectedApplicant->name }}"
                            class="rounded-circle me-2"
                            style="width: 40px; height: 40px; object-fit: cover; border: 1px solid #fff;">
                        @else
                        <i class="fas fa-user-circle me-2 fs-4 text-white"></i>
                        @endif
                        <h5 class="modal-title mb-0 fs-5 fw-bold text-white">
                            {{ $selectedApplicant->name }} {{ $selectedApplicant->lastname }}
                        </h5>
                    </div>
                    <button type="button" class="btn-close btn-close-white" wire:click="closeModal" aria-label="Close"></button>
                </div>

                {{-- Body --}}
                <div class="modal-body" style="font-size: 0.95rem; line-height: 1.5;">

                    {{-- Imagen fija --}}
                    <div class="d-flex justify-content-center mb-4">
                        <img src="{{ asset('images/Acronimo_year.png') }}" alt="Modal Image" class="img-fluid" style="max-width: 100px;">
                    </div>

                    @if($form)
                    <div class="row g-3">
                        @php
                        $fields = [
                        ['title'=>'Teacher Wellbeing','value'=>$form->teacher_wellbeing,'bg'=>'bg-etc-orange text-white','icon'=>'fas fa-heartbeat'],
                        ['title'=>'Academic Title','value'=>$form->academic_title,'bg'=>'bg-info text-white','icon'=>'fas fa-graduation-cap'],
                        ['title'=>'Selected Audiences','value'=>$form->selected_audiences,'bg'=>'bg-info text-white','icon'=>'fas fa-users'],
                        ['title'=>'Abstract','value'=>$form->abstract,'bg'=>'bg-info text-white','icon'=>'fas fa-file-alt'],
                        ['title'=>'Description','value'=>$form->description,'bg'=>'bg-etc-orange text-white','icon'=>'fas fa-align-left'],
                        ];
                        @endphp

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
                                    <p class="mb-0">{{ $field['value'] ?? 'N/A' }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @else
                    <p class="text-muted fst-italic">No form data available.</p>
                    @endif

                    {{-- Footer button --}}
                    <div class="d-flex justify-content-end mt-4">
                        <button class="btn info_btn fw-bold px-5" wire:click="closeModal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Backdrop --}}
    <div class="modal-backdrop fade show"></div>

    {{-- Animación modal --}}
    <style>
        @keyframes modalEnter {
            0% {
                opacity: 0;
                transform: translateY(-50px) scale(0.95);
            }

            100% {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        .modal.fade.show .modal-dialog {
            animation: modalEnter 0.5s ease-out;
        }

        .modal.fade .modal-dialog {
            transition: transform 0.3s ease, opacity 0.3s ease;
        }

        .modal.fade:not(.show) .modal-dialog {
            transform: translateY(-50px) scale(0.95);
            opacity: 0;
        }
    </style>
    @endif
</div>