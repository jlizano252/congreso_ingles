<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Participant;
use App\Models\Applicant;
use App\Models\User;

class DashboardParticipantController extends Controller
{
    public function index()
    {
        return view('dashboard-mod.index-participant');
    }

    // 2️⃣ Buscar participante por cédula y mostrar temas
    public function findParticipant(Request $request)
    {
        // Buscar el usuario por IDE
        $user = User::where('ide', $request->ide)->first();

        if (!$user) {
            return back()->withErrors(['ide' => 'No se encontró la cédula/IDE en la base de datos']);
        }

        // Buscar participante asociado y cargar el usuario
        $participant = Participant::with('user', 'applicants')->where('user_id', $user->id)->first();

        if (!$participant || !$participant->user) {
            return back()->withErrors(['ide' => 'El participante no tiene un usuario válido asociado']);
        }

        // Cargar todos los applicants disponibles (o filtrados según tu lógica)
        $applicants = Applicant::all(); // Aquí podrías filtrar por tipo, fecha, etc.

        // Retornar la vista con la info del participante y los applicants
        return view('dashboard-mod.participant-topics', compact('participant', 'applicants'));
    }

    // 3️⃣ Registrar inscripción de los temas
    public function register(Request $request)
    {
        $participant = Participant::findOrFail($request->participant_id);
        $topics = $request->input('topics', []);

        if (empty($topics)) {
            return back()->withErrors(['topics' => 'Debe seleccionar al menos un topic']);
        }

        $registered = [];
        $capacity = 10; // cupos máximos por topic

        foreach ($topics as $topicId) {
            $topic = Applicant::find($topicId);
            if (!$topic) continue;

            // Verificar si el participante ya está registrado
            if ($participant->applicants()->where('applicant_id', $topicId)->exists()) {
                continue; // ya está inscrito, saltar
            }

            // Contador dinámico
            $currentCount = $topic->participants()->count();
            if ($currentCount < $capacity) {
                $registered[] = $topicId;
            }
        }

        if (!empty($registered)) {
            $participant->applicants()->syncWithoutDetaching($registered);
            return redirect()->route('home')->with('message', 'Inscripción realizada correctamente');
        }

        return back()->withErrors(['topics' => 'No hay cupos disponibles o ya está registrado en los topics seleccionados']);
    }
}
