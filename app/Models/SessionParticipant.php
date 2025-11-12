<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SessionParticipant extends Model
{
    use HasFactory;

    protected $table = 'session_participant'; // 👈 Tu tabla actual
    protected $fillable = ['session_id', 'participant_id'];

    // Relación con Session
    public function session()
    {
        return $this->belongsTo(Session::class);
    }

    // Relación con Participant
    public function participant()
    {
        return $this->belongsTo(Participant::class);
    }

    // Relación con Attendance (asistencia)
    public function attendances()
    {
        return $this->hasMany(Attendance::class, 'session_participant_id');
    }

    public function applicant()
    {
        return $this->hasOneThrough(
            Applicant::class,
            ApplicantForm::class,
            'id',               // Foreign key en ApplicantForm
            'id',               // Foreign key en Applicant
            'session_id',       // Local key en SessionParticipant
            'applicant_id'      // Local key en ApplicantForm
        );
    }
}
