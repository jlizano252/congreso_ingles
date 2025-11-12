<?php

namespace App\Http\Livewire\Admin\Dashboard;

use Livewire\Component;
use App\Models\ApplicantForm;
use App\Models\Room;
use App\Models\Session;

class AssignTopicSession extends Component
{
    public $applicant_forms_id;
    public $room_id;
    public $date;
    public $start_time;
    public $end_time;
    public $capacity;

    public function mount()
    {
        $this->capacity = 20; // default - luego se recalcula por room
    }

    public function updatedRoomId()
    {
        // Cuando cambie room, actualizar capacity automática
        $room = Room::find($this->room_id);
        if ($room) $this->capacity = $room->capacity;
    }

    public function save()
    {
        $this->validate([
            'applicant_forms_id' => 'required|exists:applicant_forms,id',
            'room_id' => 'required|exists:rooms,id',
            'date' => 'required|date',
            'start_time' => 'required',
            'end_time' => 'required|after:start_time',
            'capacity' => 'required|integer|min:1'
        ]);

        Session::create([
            'applicant_forms_id' => $this->applicant_forms_id,
            'room_id' => $this->room_id,
            'date' => $this->date,
            'start_time' => $this->start_time,
            'end_time' => $this->end_time,
            'capacity' => $this->capacity
        ]);

        session()->flash('message', 'Session created successfully!');
        $this->reset();
        $this->capacity = 20;
    }

    public function render()
    {
        return view('livewire.admin.dashboard.assign-topic-session', [
            'topics' => ApplicantForm::with('applicant.user')->get(),
            'rooms' => Room::all()
        ]);
    }
}
