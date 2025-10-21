<?php

namespace App\Http\Livewire\Public\EnrollmentForm\V1;

use Livewire\Component;
use App\Models\ApplicantForm;

class ExpositorsTable extends Component
{
    public $search = '';

    public function render()
    {
        $expositors = ApplicantForm::with('applicant.user') // Traemos Applicant y User
            ->when($this->search, function ($query) {
                $search = $this->search;

                $query->where('title', 'like', "%{$search}%")
                    ->orWhereHas('applicant', function ($q) use ($search) {
                        $q->whereHas('user', function ($q2) use ($search) {
                            $q2->where('name', 'like', "%{$search}%")
                                ->orWhere('lastname', 'like', "%{$search}%")
                                ->orWhere('email', 'like', "%{$search}%");
                        });
                    });
            })
            ->get();

        return view('livewire.public.enrollment-form.v1.expositors-table', [
            'expositors' => $expositors
        ]);
    }
}
