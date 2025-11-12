<?php

namespace App\Http\Livewire\Admin\Dashboard;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\SessionParticipant;
use App\Models\Attendance;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Alignment;

class AttendanceDashboard extends Component
{
    use WithPagination;

    public string $search = '';
    public string $generalComments = '';
    protected $paginationTheme = 'bootstrap';

    protected $queryString = [
        'search' => ['except' => ''],
        'page'   => ['except' => 1],
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function markAsAttended($sessionParticipantId)
    {
        if (!$sessionParticipantId) {
            dd('Error: sessionParticipantId no recibido');
        }

        Attendance::updateOrCreate(
            ['session_participant_id' => $sessionParticipantId],
            [
                'attended'      => true,
                'checked_in_at' => now(),
            ]
        );

        session()->flash('message', 'Attendance recorded successfully.');
    }

    public function saveGeneralComments()
    {
        $participants = SessionParticipant::with('attendances')->get();

        foreach ($participants as $sp) {
            $attendance = $sp->attendances->first();

            if (!$attendance?->attended) {
                Attendance::updateOrCreate(
                    ['session_participant_id' => $sp->id],
                    [
                        'attended'       => false,
                        'comment'        => $this->generalComments,
                        'checked_in_at'  => $attendance?->checked_in_at ?? null,
                    ]
                );
            }
        }

        session()->flash('message', 'Comment saved for participants who did not attend.');
        $this->generalComments = '';
    }

    public function render()
    {
        $participants = SessionParticipant::with([
            'participant.user',
            'session.applicantForm.applicant.user',
            'attendances'
        ])
            ->whereHas('participant.user', function ($q) {
                $q->where('name', 'LIKE', "%{$this->search}%")
                    ->orWhere('lastname', 'LIKE', "%{$this->search}%")
                    ->orWhere('email', 'LIKE', "%{$this->search}%");
            })
            ->orWhereHas('session.applicantForm', function ($q) {
                $q->where('title', 'LIKE', "%{$this->search}%");
            })
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view('livewire.admin.dashboard.attendance-dashboard', [
            'sessionParticipants' => $participants,
        ]);
    }
}
