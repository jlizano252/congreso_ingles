<?php

namespace App\Http\Livewire\Public\EnrollmentForm\V1;

use App\Models\AppointmentType;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class AppointmentData extends Component
{
    public Collection $appoint_list;
    public string $selected_appoint_id = '1';
    public string $mep = 'si';

    public function mount() {
        $this->setAppointmentCombo();
        $this->selected_appoint_id = $this->appoint_list[0]->id;
    }

    public function setAppointmentCombo() {
        if($this->mep == 'si' ) {
            $this->appoint_list = AppointmentType::where('type', 'ministerio')->get();
        }else {
            $this->appoint_list = AppointmentType::where('type', 'privado')->get();
        }
    }

    public function emitEvent() {
        $this->emitTo('public.enrollment-form.v1.enrollment-formv1', 'selectAppointmentType', $this->selected_appoint_id );
    }

    public function render()
    {
        return view('livewire.public.enrollment-form.v1.appointment-data');
    }
}
