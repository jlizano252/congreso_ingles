<?php

namespace App\Http\Livewire\Public\EnrollmentForm\V1;

use App\Models\GenderType;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class GenderData extends Component
{
    public Collection $gender_list;
    public string $selected_gender_id = '';

    public function mount() {
        $this->gender_list = GenderType::all();
        if($this->selected_gender_id == ""){
            $this->selected_gender_id = $this->gender_list[0]->id;
        }
    }

    public function emitEvent() {
        $this->emitTo('public.enrollment-form.v1.enrollment-formv1', 'selectGenderType', $this->selected_gender_id );
    }

    public function render()
    {
        return view('livewire.public.enrollment-form.v1.gender-data');
    }
}
