<?php

namespace App\Http\Livewire\Admin\Widgets;

use App\Models\RegistrationForm;
use Livewire\Component;

class TotalCertificateRecordsWidget extends Component
{
    public function render()
    {
        $certificates = RegistrationForm::where('certificate','si')->count();
        return view('livewire.admin.widgets.total-certificate-records-widget',[
            'certificates' => $certificates
        ]);
    }
}
