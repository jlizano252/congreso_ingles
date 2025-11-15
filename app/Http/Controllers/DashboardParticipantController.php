<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Participant;
use App\Models\User;
use App\Models\Session;
use App\Mail\ParticipantTopicsMail;
use Illuminate\Support\Facades\Mail;

class DashboardParticipantController extends Controller
{
    // Mostrar formulario de búsqueda de cédula
    public function index()
    {
        return view('dashboard-mod.index-participant');
    }

    // Buscar participante y mostrar sesiones
    public function findParticipant(Request $request)
    {
        $request->validate(['ide' => 'required|string']);

        $user = User::where('ide', $request->ide)->firstOrFail();
        $participant = Participant::with('user')->where('user_id', $user->id)->firstOrFail();

        // Guardar participante en sesión
        session(['participant_id' => $participant->id]);

        // Redirigir a la página de sesiones
        return redirect()->route('participant.sessions');
    }

    public function showSessions()
    {
        // Tomar participante de sesión
        $participantId = session('participant_id');
        if (!$participantId) {
            return redirect()->route('home_dashboard')->withErrors('Please enter your ID first.');
        }

        $participant = Participant::with('user')->findOrFail($participantId);

        $sessions = Session::with(['applicantForm', 'applicantForm.applicant.user', 'room', 'participants'])
            ->whereHas('applicantForm')
            ->orderBy('date')
            ->orderBy('start_time')
            ->get();

        $sessionsByDate = $sessions->map(function ($session) use ($participant) {
            $alreadyRegistered = $session->participants->contains($participant->id);
            $available = $session->capacity - $session->participants->count();

            return array_merge($session->toArray(), [
                'already_registered' => $alreadyRegistered,
                'available_spots' => $available,
            ]);
        })->groupBy(function ($s) {
            return \Carbon\Carbon::parse($s['date'])->format('l, F jS');
        });

        return view('dashboard-mod.participant-topics', compact('participant', 'sessionsByDate'));
    }

    // Registrar sesiones seleccionadas
    public function register(Request $request)
    {
        $request->validate([
            'participant_id' => 'required|exists:participants,id',
            'sessions' => 'required|array',
            'sessions.*' => 'exists:sessions,id',
        ]);

        $participant = Participant::findOrFail($request->participant_id);
        $sessionIds = $request->input('sessions', []);

        if (empty($sessionIds)) {
            return back()->withErrors(['sessions' => 'You must select at least one session']);
        }

        $registered = [];
        foreach ($sessionIds as $sessionId) {
            $session = Session::with('participants')->find($sessionId);
            if (!$session) continue;

            if ($participant->sessions()->where('session_id', $sessionId)->exists()) continue;

            if ($session->participants()->count() < $session->capacity) {
                $registered[] = $sessionId;
            }
        }

        if (!empty($registered)) {
            $participant->sessions()->syncWithoutDetaching($registered);

            $selectedSessions = Session::whereIn('id', $registered)->get()->load(['applicantForm', 'applicantForm.applicant.user', 'room']);

            Mail::to($participant->user->email)->queue(new ParticipantTopicsMail($participant, $selectedSessions));

            return back()->with('message', 'Registration completed successfully!');
        }

        return back()->withErrors(['sessions' => 'No spots available or already registered']);
    }
}
