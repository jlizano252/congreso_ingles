<?php

namespace App\Http\Livewire\Admin\Widgets;

use App\Models\User;
use Carbon\Carbon;
use Livewire\Component;

class TotalRecordsWidget extends Component
{
    public function render()
    {
        // Usuarios que tienen al menos un applicant
        $count = User::whereHas('applicant')->count();

        // Usuarios que tienen applicants creados hoy
        $today_count = User::whereHas('applicant', function ($q) {
            $q->whereDate('created_at', Carbon::today());
        })->count();

        return view('livewire.admin.widgets.total-records-widget', [
            'count' => $count,
            'today_count' => $today_count
        ]);
    }
}
