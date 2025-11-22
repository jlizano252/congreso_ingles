<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SessionParticipant extends Model
{
    use HasFactory;

    protected $table = 'session_participant';
    protected $fillable = ['session_id', 'participant_id'];

    // Cada fila pertenece a una sesión
    public function session()
    {
        return $this->belongsTo(Session::class);
    }

    // Cada fila pertenece a un participante
    public function participant()
    {
        return $this->belongsTo(Participant::class);
    }

    // Relación con Attendance
    public function attendances()
    {
        return $this->hasMany(Attendance::class, 'session_participant_id');
    }

    /**
     * Obtener el Applicant (presentador) navegando por:
     * session → applicantForm → applicant
     */
    public function presenter()
    {
        return $this->session?->applicantForm?->applicant ?? null;
    }

    /**
     * Obtener el usuario del presentador
     */
    public function presenterUser()
    {
        return $this->presenter()?->user ?? null;
    }

    /**
     * Obtener el tema (topic)
     */
    public function topic()
    {
        return $this->session?->applicantForm?->title ?? null;
    }
}
