<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    protected $fillable = [
        'user_id',
        'ide',
        'reference',
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
    
    // Relación con usuario
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relación con tipo de identificación
    public function ideType()
    {
        return $this->belongsTo(IdeType::class);
    }

    public function register()
    {
        return $this->hasOne(ApplicantForm::class, 'applicant_id', 'id');
    }

    public function forms()
{
    return $this->hasMany(ApplicantForm::class, 'applicant_id');
}
}
