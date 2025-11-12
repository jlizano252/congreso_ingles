<div class="card p-3 shadow-sm">
    @if (session('message'))
    <div class="alert alert-success">{{ session('message') }}</div>
    @endif

    <h5 class="mb-3 fw-bold">Assign Topic Session</h5>

    <div class="mb-3">
        <label>Topic</label>
        <select wire:model="applicant_forms_id" class="form-control">
            <option value="">-- Select Topic --</option>
            @foreach($topics as $t)
            <option value="{{ $t->id }}">
                {{ $t->title }} — {{ $t->applicant->user->name }} {{ $t->applicant->user->lastname }}
            </option>
            @endforeach
        </select>
        @error('applicant_forms_id')<span class="text-danger">{{ $message }}</span>@enderror
    </div>

    <div class="mb-3">
        <label>Room</label>
        <select wire:model="room_id" class="form-control">
            <option value="">-- Select Room --</option>
            @foreach($rooms as $room)
            <option value="{{ $room->id }}">{{ $room->name }} ({{ $room->capacity }})</option>
            @endforeach
        </select>
        @error('room_id')<span class="text-danger">{{ $message }}</span>@enderror
    </div>

    <div class="row">
        <div class="col-md-4 mb-3">
            <label>Date</label>
            <input type="date" wire:model="date" class="form-control">
            @error('date')<span class="text-danger">{{ $message }}</span>@enderror
        </div>

        <div class="col-md-4 mb-3">
            <label>Start Time</label>
            <input type="time" wire:model="start_time" class="form-control">
            @error('start_time')<span class="text-danger">{{ $message }}</span>@enderror
        </div>

        <div class="col-md-4 mb-3">
            <label>End Time</label>
            <input type="time" wire:model="end_time" class="form-control">
            @error('end_time')<span class="text-danger">{{ $message }}</span>@enderror
        </div>
    </div>

    <div class="mb-3">
        <label>Capacity</label>
        <input type="number" wire:model="capacity" class="form-control">
    </div>

    <button wire:click="save" class="btn btn-primary fw-bold">Save Session</button>
</div>