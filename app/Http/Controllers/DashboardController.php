<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Participant;

class DashboardController extends Controller
{
    //
    public function index()
    {
        return view('dashboard-mod.index');
    }

    public function downloadCertificate($id)
    {
        $participant = Participant::findOrFail($id);

        // Generar PDF con tamaño A4 horizontal
        $pdf = Pdf::loadView('pdf.certificate', compact('participant'))
            ->setPaper('A4', 'landscape') // Horizontal
            ->setOptions([
                'isRemoteEnabled' => true, // permite cargar imágenes externas si las usas
            ]);

        // Descargar PDF con nombre basado en el IDE del participante
        return $pdf->download($participant->user->ide . '-certificate.pdf');
    }
}
