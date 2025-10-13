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
        $total_count = RegistrationForm::count();
        $mep_count = RegistrationForm::where('mep', 'si')->count();

        // Evitar división por cero
        $percent = $total_count > 0
            ? number_format(($mep_count * 100) / $total_count, 1, '.', ',')
            : 0;

        return view('livewire.admin.widgets.total-m-e-p-records-widget', [
            'count' => $mep_count,
            'percent_count' => $percent
        ]);
    }
}
