<div>

    <!-- BUSCADOR -->
    <div class="row mb-3">
        <div class="col-md-4">
            <input type="text"
                wire:model.debounce.400ms="search"
                class="form-control"
                placeholder="Search users...">
        </div>

        <div class="col-md-8 text-end">
            <button class="btn btn-success" wire:click="export">
                Export Excel
            </button>
        </div>
    </div>

    <!-- TABLA -->
    <div class="card">
        <div class="card-body">

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Created</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }} {{ $user->lastname }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->created_at }}</td>
                        <td class="text-end">
                            <button class="btn btn-primary btn-sm"
                                wire:click="openModal({{ $user->id }})">
                                Details
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>

            <div class="mt-3">
                {{ $users->links() }}
            </div>

        </div>
    </div>

    <!-- MODAL DETALLE -->
    @if($showModal)
    <div class="modal fade show d-block" style="background: rgba(0,0,0,.5);">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">
                        User Details #{{ $selectedUser->id }}
                    </h5>
                    <button class="btn-close" wire:click="closeModal"></button>
                </div>

                <div class="modal-body">

                    <h5>Basic Information</h5>
                    <ul>
                        <li><strong>Name:</strong> {{ $selectedUser->name }} {{ $selectedUser->lastname }}</li>
                        <li><strong>Email:</strong> {{ $selectedUser->email }}</li>
                        <li><strong>IDE:</strong> {{ $selectedUser->ide }}</li>
                        <li><strong>Created:</strong> {{ $selectedUser->created_at }}</li>
                    </ul>

                    <hr>

                    <h4>Detected Relationships</h4>

                    @php
                    $hasRelations = false;
                    foreach ($userRelations as $relation => $data) {
                    if ($data instanceof \Illuminate\Database\Eloquent\Collection && $data->isNotEmpty()) {
                    $hasRelations = true;
                    } elseif (!($data instanceof \Illuminate\Database\Eloquent\Collection) && !empty($data)) {
                    $hasRelations = true;
                    }
                    }
                    @endphp

                    @forelse($userRelations as $relation => $data)
                    <div class="mb-4">
                        <h5 class="text-primary">{{ $relation }}</h5>

                        @if($data instanceof \Illuminate\Database\Eloquent\Collection)
                        <pre>{{ json_encode($data->toArray(), JSON_PRETTY_PRINT) }}</pre>
                        @elseif(!empty($data))
                        <pre>{{ json_encode($data->toArray(), JSON_PRETTY_PRINT) }}</pre>
                        @else
                        <p class="text-muted">No data in this relationship.</p>
                        @endif
                    </div>

                    @empty
                    <p class="text-muted">No relationships were detected for this user.</p>
                    @endforelse

                </div>

                <div class="modal-footer">

                    @if(!$hasRelations)
                    <button class="btn btn-danger"
                        wire:click="confirmDeleteUser">
                        Delete User
                    </button>
                    @endif

                    <button class="btn btn-secondary" wire:click="closeModal">
                        Close
                    </button>
                </div>

            </div>
        </div>
    </div>
    @endif

    <!-- MODAL CONFIRMACIÓN DELETE -->
    @if($confirmDelete)
    <div class="modal fade show d-block" style="background: rgba(0,0,0,.5);">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Confirm Delete</h5>
                    <button class="btn-close" wire:click="closeConfirmDelete"></button>
                </div>

                <div class="modal-body">
                    <p>Are you sure you want to delete this user?</p>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-secondary" wire:click="closeConfirmDelete">
                        Cancel
                    </button>

                    <button class="btn btn-danger"
                        wire:click="deleteUser({{ $selectedUserId }})">
                        Yes, Delete
                    </button>
                </div>

            </div>
        </div>
    </div>
    @endif

</div>

<script>
    window.addEventListener('alert', event => {
        alert(event.detail.message);
    });
</script>