<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Participant;
use App\Models\Applicant;
use App\Models\User;

class DashboardParticipantController extends Controller
{
    // 1️⃣ Show participant dashboard
    public function index()
    {
        return view('dashboard-mod.index-participant');
    }

    // 2️⃣ Search participant by ID and display topics
    public function findParticipant(Request $request)
    {
        // Find the user by IDE
        $user = User::where('ide', $request->ide)->first();

        if (!$user) {
            return back()->withErrors(['ide' => 'The ID/IDE was not found in the database']);
        }

        // Find the participant linked to this user and load relations
        $participant = Participant::with('user', 'applicants')
            ->where('user_id', $user->id)
            ->first();

        if (!$participant || !$participant->user) {
            return back()->withErrors(['ide' => 'The participant does not have a valid associated user']);
        }

        // Load all available applicants (you can filter them as needed)
        $applicants = Applicant::all(); // You can filter by type, date, etc.

        // Return the view with participant and applicants info
        return view('dashboard-mod.participant-topics', compact('participant', 'applicants'));
    }

    // 3️⃣ Register topic enrollment
    public function register(Request $request)
    {
        $participant = Participant::findOrFail($request->participant_id);
        $topics = $request->input('topics', []);

        if (empty($topics)) {
            return back()->withErrors(['topics' => 'You must select at least one topic']);
        }

        $registered = [];
        $capacity = 10; // maximum number of participants per topic

        foreach ($topics as $topicId) {
            $topic = Applicant::find($topicId);
            if (!$topic) continue;

            // Check if participant is already registered
            if ($participant->applicants()->where('applicant_id', $topicId)->exists()) {
                continue; // already registered, skip
            }

            // Dynamic counter
            $currentCount = $topic->participants()->count();
            if ($currentCount < $capacity) {
                $registered[] = $topicId;
            }
        }

        if (!empty($registered)) {
            $participant->applicants()->syncWithoutDetaching($registered);
            return redirect()->route('home_dashboard')
                ->with('message', 'Registration completed successfully');
        }

        return back()->withErrors(['topics' => 'No spots available or already registered for the selected topics']);
    }
}
