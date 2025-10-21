<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'ide',
        'prefijo', // <-- agregado
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
        'teacher_wellbeing' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function ideType()
    {
        return $this->belongsTo(IdeType::class);
    }

    public function forms()
    {
        return $this->hasMany(ApplicantForm::class, 'applicant_id');
    }

    public function participants()
    {
        return $this->belongsToMany(Participant::class, 'applicant_participant');
    }
}
