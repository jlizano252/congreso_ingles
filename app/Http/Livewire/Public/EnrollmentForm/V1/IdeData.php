<?php

namespace App\Http\Livewire\Public\EnrollmentForm\V1;

use App\Models\IdeType;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class IdeData extends Component
{
    public Collection $ide_types;
    public string $selected_ide_type = "";

    public function mount()
    {
        $this->ide_types = IdeType::all();

        if ($this->ide_types->isNotEmpty()) {
            $this->selected_ide_type = $this->ide_types->first()->id;
        } else {
            $this->selected_ide_type = ''; // evitar error si no hay datos
        }
    }

    public function emitEvent()
    {
        $this->emitTo('public.enrollment-form.v1.enrollment-formv1', 'selectIdeType', $this->selected_ide_type);
    }

    public function render()
    {
        return view('livewire.public.enrollment-form.v1.ide-data');
    }
}
