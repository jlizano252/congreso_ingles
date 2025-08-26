<?php

namespace App\Http\Livewire\Public\EnrollmentForm\V1;

use App\Models\EducationalLevel;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class ProfessionalEducationalLevel extends Component
{
    public Collection $educational_list;
    public string $selected_educational_id = '';

    public function mount() {
        $this->educational_list = EducationalLevel::all();
        if($this->selected_educational_id == ""){
            $this->selected_educational_id = $this->educational_list[0]->id;
        }
    }

    public function emitEvent() {
        $this->emitTo('public.enrollment-form.v1.enrollment-formv1', 'selectEducationalLevelType', $this->selected_educational_id );
    }

    public function render()
    {
        return view('livewire.public.enrollment-form.v1.professional-educational-level');
    }
}
