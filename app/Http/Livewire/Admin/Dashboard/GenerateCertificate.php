<?php

namespace App\Http\Livewire\Admin\Dashboard;

use App\Models\Participant;
use Barryvdh\DomPDF\Facade\Pdf;
use Livewire\Component;

class GenerateCertificate extends Component
{
    public Participant $participant;

    /**
     * Generate and download the participant's certificate as PDF
     */
    public function generateCertificate()
    {
        // Validación rápida
        if (!$this->participant || !$this->participant->user) {
            session()->flash('error', 'Participant data not found.');
            return;
        }

        // Generar PDF usando la vista formal
        $pdf = Pdf::loadView('pdf.certificate', [
            'participant' => $this->participant
        ]);

        // Descargar PDF con nombre basado en IDE del participante
        return $pdf->download($this->participant->user->ide . '-certificate.pdf');
    }

    public function render()
    {
        return view('livewire.admin.dashboard.generate-certificate');
    }
}
