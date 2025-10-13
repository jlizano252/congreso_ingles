<?php

namespace App\Http\Livewire\Admin\Widgets;

use App\Models\RegistrationForm;
use Livewire\Component;

class TotalPrivateInstRecordsWidget extends Component
{
    public function render()
    {
        // Contadores
        $total_count = RegistrationForm::count();
        $mep_count = RegistrationForm::where('mep', 'si')->count();
        $pri_count = $total_count - $mep_count;

        // Evitar división por cero
        $percent = $total_count > 0
            ? number_format(($pri_count * 100) / $total_count, 1, '.', ',')
            : 0;

        return view('livewire.admin.widgets.total-private-inst-records-widget', [
            'count' => $pri_count,
            'percent_count' => $percent
        ]);
    }
}
