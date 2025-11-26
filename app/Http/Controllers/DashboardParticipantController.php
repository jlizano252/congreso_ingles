<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Participant;
use App\Models\User;
use App\Models\Session;
use App\Mail\ParticipantTopicsMail;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

class DashboardParticipantController extends Controller
{
    public function index()
    {
        return view('dashboard-mod.index-participant');
    }

    public function findParticipant(Request $request)
    {
        $request->validate(['ide' => 'required|string']);

        $user = User::where('ide', $request->ide)->firstOrFail();
        $participant = Participant::with('user')->where('user_id', $user->id)->firstOrFail();

        session(['participant_id' => $participant->id]);

        return redirect()->route('participant.sessions');
    }

    public function showSessions()
    {
        $participantId = session('participant_id');
        if (!$participantId) {
            return redirect()->route('home_dashboard')->withErrors('Please enter your ID first.');
        }

        $participant = Participant::with('user', 'sessions')->findOrFail($participantId);

        $registeredSessions = $participant->sessions->pluck('id')->toArray();

        $sessions = Session::with([
            'applicantForm',
            'applicantForm.applicant.user',
            'room',
            'participants'
        ])
            ->whereHas('applicantForm')
            ->orderBy('date')
            ->orderBy('start_time')
            ->get();

        $sessionsByDate = $sessions->map(function ($session) use ($registeredSessions) {

            $alreadyRegistered = in_array($session->id, $registeredSessions);
            $available = $session->capacity - $session->participants->count();

            $block = $this->getBlock($session->date, $session->start_time);

            $blockNumber = $block['number'] ?? null;
            $blockTime   = $block['time'] ?? null;
            $blockFull   = $block['block_full'] ?? null;

            return array_merge($session->toArray(), [
                'already_registered' => $alreadyRegistered,
                'available_spots'    => $available,
                'block'              => $blockNumber,
                'block_time'         => $blockTime,
                'block_full'         => $blockFull,
            ]);
        })->groupBy(function ($s) {
            return Carbon::parse($s['date'])->format('l, F jS');
        });

        return view('dashboard-mod.participant-topics', compact('participant', 'sessionsByDate'));
    }

    public function register(Request $request)
    {
        $request->validate([
            'participant_id' => 'required|exists:participants,id',
            'sessions'       => 'required|array',
            'sessions.*'     => 'exists:sessions,id',
        ]);

        $participant = Participant::findOrFail($request->participant_id);
        $selectedSessionIds = $request->input('sessions');

        $selectedSessions = Session::whereIn('id', $selectedSessionIds)
            ->with('participants')
            ->get();

        /*
         |-----------------------------------------------------
         | Validación: Solo una sesión por bloque (con fecha)
         |-----------------------------------------------------
        */

        $selectedBlocks = [];
        $participantRegisteredBlocks = [];

        // Bloques ya registrados por el participante (block_full)
        foreach ($participant->sessions as $reg) {
            $blockFull = $this->getBlock($reg->date, $reg->start_time)['block_full'];
            if ($blockFull) {
                $participantRegisteredBlocks[$blockFull] = true;
            }
        }

        // Bloques seleccionados ahora (block_full)
        foreach ($selectedSessions as $session) {

            $blockFull = $this->getBlock($session->date, $session->start_time)['block_full'];

            if (!$blockFull) {
                continue;
            }

            // Ya tenía una sesión en este mismo bloque+fecha
            if (isset($participantRegisteredBlocks[$blockFull])) {
                return back()->withErrors([
                    'sessions' => 'You can only choose ONE session per block.'
                ]);
            }

            // Ha seleccionado más de una sesión en el mismo bloque+fecha
            if (isset($selectedBlocks[$blockFull])) {
                return back()->withErrors([
                    'sessions' => 'You can only choose ONE session per block.'
                ]);
            }

            $selectedBlocks[$blockFull] = true;
        }

        /*
         |-----------------------------------------
         | Validación: Capacidad de cada sesión
         |-----------------------------------------
        */
        foreach ($selectedSessions as $session) {
            if ($session->participants->count() >= $session->capacity) {
                return back()->withErrors([
                    'sessions' => 'The session "' . $session->title . '" is already full.'
                ]);
            }
        }

        // Registrar sin eliminar sesiones anteriores
        $participant->sessions()->syncWithoutDetaching($selectedSessionIds);

        // Preparar datos para el correo
        $sessionsFull = Session::whereIn('id', $selectedSessionIds)
            ->with(['applicantForm', 'applicantForm.applicant.user', 'room'])
            ->get();

        Mail::to($participant->user->email)
            ->later(now()->addSeconds(10), new ParticipantTopicsMail($participant, $sessionsFull));

        return back()->with('message', 'Registration completed successfully!');
    }

    private function getBlock($date, $startTime)
    {
        $dateFormatted = Carbon::parse($date)->format('Y-m-d');
        $start = Carbon::parse($startTime);

        $make = function ($number, $time) use ($dateFormatted) {
            return [
                'number'     => $number,
                'time'       => $time,
                'block_full' => $dateFormatted . '_' . $number,
            ];
        };

        // Bloques del jueves
        if ($dateFormatted === '2025-11-27') {
            if ($start->between('09:15', '10:40')) return $make(1, '09:15 – 10:40');
            if ($start->between('11:00', '12:30')) return $make(2, '11:00 – 12:30');
            if ($start->between('14:00', '15:30')) return $make(3, '14:00 – 15:30');
        }

        // Bloques del viernes
        if ($dateFormatted === '2025-11-28') {
            if ($start->between('09:15', '10:40')) return $make(1, '09:15 – 10:40');
            if ($start->between('11:00', '12:30')) return $make(2, '11:00 – 12:30');
        }

        return [
            'number'     => null,
            'time'       => null,
            'block_full' => null,
        ];
    }
}
