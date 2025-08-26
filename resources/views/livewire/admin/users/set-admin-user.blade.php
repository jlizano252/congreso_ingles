<div>
    {{-- create admin user modal --}}

    <!-- Button trigger modal -->
    <button class="btn btn-sm btn-light pe-2" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop-{{$user->ide}}"><span class="fas fa-edit"></span></button>

    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="staticBackdrop-{{$user->ide}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-2 text-capitalize" id="staticBackdropLabel">Edit {{ strtolower($user->name) }}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body pb-0">
                    <form wire:submit.prevent="update">
                        <div class="mb-4 row">
                            <label class="col-4 col-form-label" for="staticEmail">Email</label>
                            <div class="col-8">
                                <input class="form-control-plaintext outline-none" id="staticEmail" type="text" readonly="" value="{{ $user->email }}" />
                                <div class="mb-3 row"></div>
                            </div>
                            <label class="col-4 col-form-label" for="inputPassword">Password</label>
                            <div class="col-8">
                                <input wire:model="password" class="form-control" id="inputPassword" type="password" />
                                @error('password') <p class="small mb-0 text-danger">{{ $message }}</p> @enderror
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
