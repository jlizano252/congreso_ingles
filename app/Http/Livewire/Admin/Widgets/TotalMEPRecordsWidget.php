<?php

namespace App\Http\Livewire\Admin\Widgets;

use App\Models\Participant;
use App\Models\RegistrationForm;
use Carbon\Carbon;
use Livewire\Component;

class TotalMEPRecordsWidget extends Component
{
    public function render()
    {
        $total_count = RegistrationForm::all()->count();
        $mep_count = RegistrationForm::where('mep', 'si')->count();
        $percent = number_format(($mep_count*100)/$total_count,'1','.',',');

        $count = RegistrationForm::where('mep', 'si')->count();
        return view('livewire.admin.widgets.total-m-e-p-records-widget',[
            'count' => $count,
            'percent_count' => $percent
        ]);
    }
}
