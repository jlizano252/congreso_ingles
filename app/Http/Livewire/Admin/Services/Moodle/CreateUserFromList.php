<?php

namespace App\Http\Livewire\Admin\Services\Moodle;

use App\Helpers\MoodleRequestService;
use App\Jobs\ExportMoodleParticipant;
use App\Models\ExportedUser;
use App\Models\Participant;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class CreateUserFromList extends Component
{
    public Collection $participants;

    public function mount() {
        // $this->participants = Participant::all();
        $this->participants = Participant::whereNotIn( 'id', ExportedUser::pluck('participant_id')->all() )->get();
    }

    public function exportUsers() {
        //
        $count = 1;
//        $moodle = new MoodleRequestService();
        foreach ( $this->participants as $participant ) {
            ExportMoodleParticipant::dispatch( $participant->user )->delay( now()->addSeconds($count*10) );
            $count++;
//            $moodle->createMoodleUser($participant->user);
        }
        return redirect()->route('dashboard.index');
    }

    public function render()
    {
        return view('livewire.admin.services.moodle.create-user-from-list');
    }
}
