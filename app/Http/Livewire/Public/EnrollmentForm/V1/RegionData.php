<?php

namespace App\Http\Livewire\Public\EnrollmentForm\V1;

use App\Models\EducationalRegion;
use App\Models\GenderType;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class RegionData extends Component
{
    public Collection $region_list;
    public string $selected_region_id = '';

    public function mount() {
        $this->region_list = EducationalRegion::all();
        if($this->selected_region_id == ""){
            $this->selected_region_id = $this->region_list[0]->id;
        }
    }

    public function emitEvent() {
        $this->emitTo('public.enrollment-form.v1.enrollment-formv1', 'selectRegionType', $this->selected_region_id );
    }

    public function render()
    {
        return view('livewire.public.enrollment-form.v1.region-data');
    }
}
