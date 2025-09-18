<div>
    {{-- applicants table --}}
    <div class="card" style="font-size: .9em">
        <div class="card-body pb-0">
            <div class="d-flex justify-content-between">
                <div class="d-flex justify-content-end align-items-center">
                    <div class="mx-2">
                        <input wire:model="search" class="form-control form-control-sm" type="text" placeholder="Search applicant..." />
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
                            <th scope='col'>Idea</th>
                            <th scope="col">Email</th>
                            <th scope="col">Dept.</th>
                            <th scope="col">Joined</th>
                            @if(\Illuminate\Support\Facades\Auth::user()->ide == '113420689')
                            <th></th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach( $applicants as $applicant )
                        <tr class="hover-actions-trigger">
                            <td class="align-middle text-nowrap">
                                <div class="d-flex align-items-center">
                                    <div class="avatar avatar-xl">
                                        <img class="rounded-circle" src="{{ asset('images/team/avatar.png') }}" alt="" />
                                    </div>
                                    <div class="ms-2">
                                        <div class="text-capitalize">{{ strtolower($applicant->name . ' ' . $applicant->lastname) }}</div>
                                        <div class="small text-muted">{{ $applicant->ide }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="align-middle text-nowrap">
                                @forelse($applicant->applicant->forms as $form)
                                <div>{{ $form->title }}</div>
                                @empty
                                <span class="text-muted">N/A</span>
                                @endforelse
                            </td>
                            <td class="align-middle text-nowrap">{{ $applicant->email }}</td>
                            <td class="align-middle text-nowrap">
                                <span class="badge badge-soft-warning text-uppercase">Applicant</span>
                            </td>
                            <td class="align-middle text-nowrap">{{ \Carbon\Carbon::make($applicant->created_at)->toDateString() }}</td>
                            @if( in_array(\Illuminate\Support\Facades\Auth::user()->ide,['113420689','602930599']))
                            <td>
                                <div class="d-flex justify-content-end pt-1">
                                    @livewire('admin.users.set-admin-user', ['user' => $applicant], key($applicant->ide))
                                </div>
                            </td>
                            @endif
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
</div>