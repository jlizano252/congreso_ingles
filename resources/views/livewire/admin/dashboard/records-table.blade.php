<div>
    {{-- records table --}}
    <div class="card" style="font-size: .9em">
        <div class="card-body pb-0">
            <div class="d-flex justify-content-between">
                @livewire('admin.services.moodle.create-user-from-list')
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
                        @if(\Illuminate\Support\Facades\Auth::user()->ide == '113420689')
                            <th></th>
                        @endif
                    </tr>
                    </thead>
                    <tbody>
                    @foreach( $participants as $participant )
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
                                @if( $participant->register->mep == 'si')
                                    <span class="badge badge-soft-success text-uppercase">MEP</span>
                                @else
                                    <span class="badge badge-soft-info text-uppercase">Private</span>
                                @endif
                            </td>
{{--                            <td class="w-auto">--}}
{{--                                <div class="btn-group btn-group hover-actions end-0 me-4">--}}
{{--                                    <button class="btn btn-light pe-2" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><span class="fas fa-edit"></span></button>--}}
{{--                                    <button class="btn btn-light ps-2" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><span class="fas fa-trash-alt"></span></button>--}}
{{--                                </div>--}}
{{--                            </td>--}}
                            <td class="align-middle text-nowrap">{{ \Carbon\Carbon::make($participant->user->created_at)->toDateString() }}</td>
                            @if( in_array(\Illuminate\Support\Facades\Auth::user()->ide,['113420689','602930599']))
                                <td>
                                    <div class="d-flex justify-content-end pt-1">
                                        @livewire('admin.users.set-admin-user', ['user' => $participant->user], key($participant->user->ide))
                                        @livewire('admin.dashboard.generate-certificate', ['participant' => $participant], key($participant->id))
                                    </div>
                                </td>
                            @endif
                        </tr>
                    </tbody>
                    @endforeach
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
