<?php

namespace App\Http\Livewire\Admin\Dashboard;

use App\Models\Participant;
use Barryvdh\DomPDF\Facade\Pdf;
use Livewire\Component;

class GenerateCertificate extends Component
{
    public Participant $participant;

    public function generateCertificate() {
        //
        $pdfContent = PDF::loadView('pdf.certificate', ['participant'=>$this->participant])->output();
        return response()->streamDownload(
            fn () => print($pdfContent),
            $this->participant->user->ide . "-certificate.pdf"
        );
    }

    public function render()
    {
        return view('livewire.admin.dashboard.generate-certificate');
    }
}
