<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicantForm extends Model
{
    use HasFactory;

    protected $fillable = [
        'applicant_id',
        'user_presentation',
        'photo',
        'academic_title',
        'exp',
        'teacher_wellbeing',
        'selected_audiences',
        'participation_type',
        'title',
        'abstract',
        'description',
        'sources',
    ];

    protected $casts = [
        'selected_audiences' => 'array',
    ];

    public function applicant()
    {
        return $this->belongsTo(Applicant::class);
    }

    public function participants()
    {
        return $this->belongsToMany(Participant::class, 'applicant_participant');
    }
}
