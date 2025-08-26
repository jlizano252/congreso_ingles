<?php

namespace App\Http\Livewire\Admin\Widgets;

use App\Models\User;
use Carbon\Carbon;
use Livewire\Component;

class TotalRecordsWidget extends Component
{
    public function render()
    {
        // Usuarios totales excluyendo admins
        $count = User::where('admin', 0)->count();

        // Usuarios creados hoy excluyendo admins
        $today_count = User::where('admin', 0)
            ->whereDate('created_at', Carbon::today())
            ->count();

        return view('livewire.admin.widgets.total-records-widget', [
            'count' => $count,
            'today_count' => $today_count
        ]);
    }
}
