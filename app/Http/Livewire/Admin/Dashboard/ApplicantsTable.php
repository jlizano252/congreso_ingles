<?php

namespace App\Http\Livewire\Admin\Dashboard;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\ApplicantForm;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\RegisterExport;

class ApplicantsTable extends Component
{
    use WithPagination;

    public string $search = '';
    public $page = 1;

    public $showModal = false;
    public $showChooseUserModal = false;
    public $useExistingUser = false;
    public $selectedUserId = null;
    public $selectedUserApplicants = [];

    protected $paginationTheme = 'bootstrap';

    protected $queryString = [
        'search' => ['except' => ''],
        'page' => ['except' => 1],
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function export()
    {
        return Excel::download(
            new RegisterExport('applicants'),
            'Applicants-' . date('Y-m-d_H-i-s') . '.xlsx'
        );
    }

    // Modal de info: mostrar todos los temas del usuario
    public function openModal($userId)
    {
        $this->selectedUserApplicants = ApplicantForm::with('applicant.user')
            ->whereHas('applicant.user', fn($q) => $q->where('id', $userId))
            ->orderBy('created_at', 'desc')
            ->get();

        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->selectedUserApplicants = [];
        $this->showModal = false;
    }

    // --- Modal para elegir acción ---
    public function createNewUser()
    {
        $this->showChooseUserModal = false;
        return redirect()->route('public.postularse.index');
    }

    public function useExistingUser()
    {
        $this->useExistingUser = true;
    }

    public function selectExistingUser()
    {
        if (!$this->selectedUserId) return;
        $this->showChooseUserModal = false;

        // Guardar user_id en sesión
        session(['selected_user_id' => $this->selectedUserId]);

        return redirect()->route('public.postularse.index');
    }
    
    public function render()
    {
        $applicantsQuery = \App\Models\ApplicantForm::with(['applicant.user'])
            ->whereHas('applicant.user', function ($q) {
                $q->where('admin', 0)
                    ->doesntHave('participant')
                    ->where(function ($qq) {
                        $qq->where('name', 'LIKE', '%' . $this->search . '%')
                            ->orWhere('lastname', 'LIKE', '%' . $this->search . '%')
                            ->orWhere('email', 'LIKE', '%' . $this->search . '%');
                    });
            })
            ->orderBy('created_at', 'desc');

        $allApplicants = $applicantsQuery->get();

        // Agrupar por usuario y tomar solo uno para la tabla
        $uniqueApplicants = $allApplicants->groupBy('applicant.user_id')
            ->map(fn($group) => $group->first())
            ->values();

        // Paginación manual
        $page = $this->page;
        $perPage = 15;
        $paginated = new \Illuminate\Pagination\LengthAwarePaginator(
            $uniqueApplicants->forPage($page, $perPage),
            $uniqueApplicants->count(),
            $perPage,
            $page,
            ['path' => \Illuminate\Pagination\Paginator::resolveCurrentPath()]
        );

        return view('livewire.admin.dashboard.applicants-table', [
            'applicants' => $paginated,
        ]);
    }
}
