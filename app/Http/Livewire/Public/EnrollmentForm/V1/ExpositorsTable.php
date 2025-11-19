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
            ->whereHas('applicant.forms') // solo expositores reales
            ->with(['applicant.forms'])
            ->when($this->search, function ($query) {
                $search = "%{$this->search}%";
                $query->where(function ($q) use ($search) {
                    $q->where('name', 'like', $search)
                        ->orWhere('lastname', 'like', $search)
                        ->orWhere('email', 'like', $search)
                        ->orWhereHas('applicant', function ($q2) use ($search) {
                            $q2->where('academic_title', 'like', $search)
                                ->orWhere('exp', 'like', $search)
                                ->orWhere('prefijo', 'like', $search);
                        });
                });
            })
            ->get();

        return view('livewire.public.enrollment-form.v1.expositors-table', [
            'expositors' => $expositors
        ]);
    }
}
