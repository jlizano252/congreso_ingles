<div>
    {{-- records table --}}
    <div class="card" style="font-size: .9em">
        <div class="card-body pb-0">
            <div class="d-flex justify-content-between">
                <a href="{{ route('dashboard.attendance') }}" class="btn btn-primary btn-sm">
                    <span class="fas fa-check-circle me-1"></span> Asistencia
                </a>
                <div class="d-flex justify-content-end align-items-center">
                    <div class="mx-2">
                        <input wire:model="search" class="form-control form-control-sm" type="text" placeholder="Search participant..." />
                    </div>

                    <button wire:click="export" class="btn btn-falcon-default btn-sm me-1 mb-1" type="button">
                        <span class="fas fa-download me-1" data-fa-transform="shrink-3"></span>Download
                    </button>
                </div>
            </div>
            <div class="table-responsive scrollbar">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Dept.</th>
                            <th scope="col">Joined</th>
                            <th scope="col">Receipt</th>
                            @if(\Illuminate\Support\Facades\Auth::user()->ide == '207860302')
                            <th>Certificate</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($participants as $participant)
                        <tr class="hover-actions-trigger">
                            <td class="align-middle text-nowrap">
                                <div class="d-flex align-items-center">
                                    <div class="avatar avatar-xl">
                                        <img class="rounded-circle" src="{{ asset('images/team/avatar.png') }}" alt="" />
                                    </div>
                                    <div class="ms-2">
                                        <div class="text-capitalize">{{ strtolower($participant->user->name . ' ' . $participant->user->lastname) }}</div>
                                        <div class="small text-muted">{{ $participant->user->ide }}</div>
                                    </div>
                                </div>
                            </td>

                            <td class="align-middle text-nowrap">{{ $participant->user->email }}</td>

                            <td class="align-middle text-nowrap">
                                @if($participant->register->mep == 'si')
                                <span class="badge badge-soft-success text-uppercase">MEP</span>
                                @else
                                <span class="badge badge-soft-info text-uppercase">Private</span>
                                @endif
                            </td>

                            <td class="align-middle text-nowrap">{{ \Carbon\Carbon::make($participant->user->created_at)->toDateString() }}</td>

                            {{-- Nueva columna para el comprobante --}}
                            <td class="align-middle text-center">
                                @if ($participant->photo)
                                <a href="{{ asset('storage/' . $participant->photo) }}" target="_blank">
                                    <img src="{{ asset('storage/' . $participant->photo) }}"
                                        alt="Payment receipt"
                                        class="img-thumbnail shadow-sm"
                                        style="width: 100px; height: 100px; object-fit: contain; border-radius: 6px;">
                                </a>
                                @else
                                <span class="text-muted small fst-italic">No receipt</span>
                                @endif
                            </td>

                            @if(in_array(\Illuminate\Support\Facades\Auth::user()->ide, ['207860302']))
                            <td>
                                <div class="d-flex justify-content-end pt-1 align-items-center">
                                    @livewire('admin.users.set-admin-user', ['user' => $participant->user], key($participant->user->ide))
                                    {{-- Botón para descargar certificado --}}
                                    @livewire('admin.dashboard.generate-certificate', ['participant' => $participant], key('certificate-'.$participant->id))
                                </div>
                            </td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                @if(count($participants) > 9)
                <div class="text-secondary d-flex justify-content-end small" style="font-size: .8rem !important;">
                    {{ $participants->links() }}
                </div>
                @endif
            </div>
        </div>
    </div>
</div>