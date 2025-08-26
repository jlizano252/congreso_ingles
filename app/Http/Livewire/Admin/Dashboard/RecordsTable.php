<?php

namespace App\Http\Livewire\Admin\Dashboard;

use App\Exports\RegisterExport;
use App\Models\Participant;
use Livewire\Component;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;

class RecordsTable extends Component
{
    use WithPagination;

    public string $search = "";
    public $page = 1;

    protected $paginationTheme = 'bootstrap';

    public function updatingSearch() {
        $this->resetPage();
    }

    protected $queryString = [
        'search' => ['except'=>''],
        'page' => ['except' => 1],
    ];

    public function export() {
        return Excel::download(new RegisterExport(), 'Registros-.'.date('Y-m-d h:m:s').'-iv-etc.xlsx');
    }

    public function render()
    {
        $records = Participant::orderBy('participants.created_at', 'desc')
            ->join('users', function($join){
                $join->on('participants.user_id','users.id');
            })
            ->where(function($query){
                $query->where('users.name','LIKE','%'. $this->search .'%')
                    ->orWhere('users.ide','LIKE','%'. $this->search .'%')
                    ->orWhere('users.email','LIKE','%'. $this->search .'%');
            })
            ->select('participants.*')
            ->paginate(15);
        return view('livewire.admin.dashboard.records-table', [
            'participants' => $records
        ]);
    }
}
