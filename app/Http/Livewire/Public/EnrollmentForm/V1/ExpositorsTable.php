<?php

namespace App\Http\Livewire\Public\EnrollmentForm\V1;

use Livewire\Component;
use App\Models\ApplicantForm;

class ExpositorsTable extends Component
{
    public $search = '';

    public function render()
    {
        $expositors = \App\Models\User::query()
            ->whereHas('applicant.forms') // usuarios que tengan al menos un form
            ->with(['applicant' => function ($q) {
                $q->with('forms'); // cargamos forms de cada applicant
            }])
            ->when($this->search, function ($query) {
                $query->where('name', 'like', "%{$this->search}%")
                    ->orWhere('lastname', 'like', "%{$this->search}%")
                    ->orWhere('email', 'like', "%{$this->search}%")
                    ->orWhereHas('applicants', function ($q) {
                        $q->where('academic_title', 'like', "%{$this->search}%")
                            ->orWhere('exp', 'like', "%{$this->search}%")
                            ->orWhere('prefijo', 'like', "%{$this->search}%");
                    });
            })
            ->get();

        return view('livewire.public.enrollment-form.v1.expositors-table', [
            'expositors' => $expositors
        ]);
    }
}
