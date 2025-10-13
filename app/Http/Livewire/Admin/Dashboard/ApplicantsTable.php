<?php

namespace App\Http\Livewire\Admin\Dashboard;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\RegisterExport;

class ApplicantsTable extends Component
{
    use WithPagination;

    public string $search = '';
    public $page = 1;

    public $selectedApplicant = null; // Applicant seleccionado
    public $showModal = false;        // Controla el modal

    protected $paginationTheme = 'bootstrap';

    protected $queryString = [
        'search' => ['except' => ''],
        'page' => ['except' => 1],
    ];

    // Resetear la página al cambiar la búsqueda
    public function updatingSearch()
    {
        $this->resetPage();
    }

    // Exportar applicants
    public function export()
    {
        return Excel::download(new RegisterExport('applicants'), 'Applicants-' . date('Y-m-d_H-i-s') . '.xlsx');
    }

    // Abrir modal
    public function openModal($userId)
    {
        $this->selectedApplicant = User::with('applicant')->find($userId);
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->selectedApplicant = null;
        $this->showModal = false;
    }
    
    public function render()
    {
        $applicants = User::where('admin', 0)
            ->doesntHave('participant')
            ->whereHas('applicant')
            ->with('applicant.forms')
            ->where(function ($query) {
                $query->where('name', 'LIKE', '%' . $this->search . '%')
                    ->orWhere('lastname', 'LIKE', '%' . $this->search . '%')
                    ->orWhere('email', 'LIKE', '%' . $this->search . '%');
            })
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        return view('livewire.admin.dashboard.applicants-table', [
            'applicants' => $applicants,
        ]);
    }
}
