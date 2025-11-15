<?php

namespace App\Http\Livewire\Admin\Dashboard;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;
use App\Models\Participant;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\RegisterExport;
use ReflectionClass;
use Illuminate\Database\Eloquent\Relations\Relation;

class GeneralUsersTable extends Component
{
    use WithPagination;

    public string $search = '';
    public $page = 1;

    public $showModal = false;
    public $confirmDelete = false;

    public $selectedUser = null;
    public $selectedUserId = null;
    public $userRelations = [];

    protected $paginationTheme = 'bootstrap';

    protected $queryString = [
        'search' => ['except' => ''],
        'page'   => ['except' => 1],
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    // ------------------------------------------------------------------
    // EXPORTAR
    // ------------------------------------------------------------------
    public function export()
    {
        return Excel::download(
            new RegisterExport('users'),
            'Users-' . date('Y-m-d_H-i-s') . '.xlsx'
        );
    }

    // ------------------------------------------------------------------
    // OBTENER TODAS LAS RELACIONES DEL MODELO
    // ------------------------------------------------------------------
    protected function getAllRelations($model)
    {
        $class = new ReflectionClass($model);
        $methods = $class->getMethods();
        $relations = [];

        foreach ($methods as $method) {
            if (
                $method->class === get_class($model) &&
                $method->getNumberOfParameters() === 0
            ) {
                try {
                    $return = $method->invoke($model);

                    if ($return instanceof Relation) {
                        $relations[] = $method->name;
                    }
                } catch (\Throwable $e) {
                    // ignorar
                }
            }
        }

        return $relations;
    }

    // ------------------------------------------------------------------
    // MODAL DETALLE
    // ------------------------------------------------------------------
    public function openModal($id)
    {
        $this->selectedUser = User::findOrFail($id);
        $this->selectedUserId = $id;

        $relationNames = $this->getAllRelations($this->selectedUser);
        $this->selectedUser->load($relationNames);

        $this->userRelations = [];

        foreach ($relationNames as $relation) {
            $this->userRelations[$relation] = $this->selectedUser->$relation;
        }

        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->selectedUser = null;
        $this->userRelations = [];
        $this->showModal = false;
    }

    // ------------------------------------------------------------------
    // CONFIRMAR ELIMINACIÓN
    // ------------------------------------------------------------------
    public function confirmDeleteUser()
    {
        $this->confirmDelete = true;
    }

    public function closeConfirmDelete()
    {
        $this->confirmDelete = false;
    }

    // ------------------------------------------------------------------
    // ELIMINAR USUARIO SIN RELACIONES
    // ------------------------------------------------------------------
    public function deleteUser($id)
    {
        $user = User::find($id);

        if (!$user) return;

        $relationNames = $this->getAllRelations($user);
        $user->load($relationNames);

        // Verificar si existe relación con datos
        foreach ($relationNames as $relation) {
            $data = $user->$relation;

            if ($data instanceof \Illuminate\Database\Eloquent\Collection && $data->isNotEmpty()) {
                $this->dispatchBrowserEvent('alert', [
                    'type' => 'error',
                    'message' => "This user cannot be deleted because it has related records."
                ]);
                return;
            }

            if (!($data instanceof \Illuminate\Database\Eloquent\Collection) && !empty($data)) {
                $this->dispatchBrowserEvent('alert', [
                    'type' => 'error',
                    'message' => "This user cannot be deleted because it has a relationship."
                ]);
                return;
            }
        }

        $user->delete();

        // cerrar modales
        $this->confirmDelete = false;
        $this->showModal = false;

        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => "User deleted successfully."
        ]);
    }

    // ------------------------------------------------------------------
    // RENDER
    // ------------------------------------------------------------------
    public function render()
    {
        $excludedIds = Participant::pluck('user_id')->toArray();

        $users = User::query()
            ->where('admin', 0)
            ->whereNotIn('id', $excludedIds)
            ->where(function ($q) {
                $q->where('name', 'LIKE', '%' . $this->search . '%')
                    ->orWhere('lastname', 'LIKE', '%' . $this->search . '%')
                    ->orWhere('email', 'LIKE', '%' . $this->search . '%')
                    ->orWhere('ide', 'LIKE', '%' . $this->search . '%');
            })
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        return view('livewire.admin.dashboard.general-users-table', [
            'users' => $users,
        ]);
    }
}
