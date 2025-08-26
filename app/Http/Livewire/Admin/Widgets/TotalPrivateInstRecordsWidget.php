<?php

namespace App\Http\Livewire\Admin\Widgets;

use App\Models\RegistrationForm;
use Carbon\Carbon;
use Livewire\Component;

class TotalPrivateInstRecordsWidget extends Component
{
    public function render()
    {
        $total_count = RegistrationForm::all()->count();
        $mep_count = RegistrationForm::where('mep', 'si')->count();
        $pri_count = $total_count - $mep_count;
        $percent = number_format(($pri_count*100)/$total_count,'1','.',',');

        return view('livewire.admin.widgets.total-private-inst-records-widget',[
            'count' => $pri_count,
            'percent_count' => $percent
        ]);
    }
}
