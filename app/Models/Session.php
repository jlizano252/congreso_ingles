<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    protected $fillable = [
        'applicant_forms_id',
        'room_id',
        'date',
        'start_time',
        'end_time',
        'capacity'
    ];

    protected $casts = [
        // El tipo 'date' hace que Laravel devuelva solo la fecha como objeto Carbon.
        'date' => 'date',

        // Los campos de tiempo necesitan el casteo 'datetime' para usar format(),
        // pero requerirán un formato específico en el controlador si solo contienen la hora.
        // Una alternativa más simple (si solo necesitas la cadena de hora) es NO castearlos 
        // y usar la solución 2, pero mantener 'datetime' es mejor si necesitas manipularlos.
        'start_time' => 'datetime',
        'end_time' => 'datetime',
    ];

    public function applicantForm()
    {
        return $this->belongsTo(ApplicantForm::class, 'applicant_forms_id');
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function participants()
    {
        return $this->belongsToMany(Participant::class, 'session_participant')
            ->withTimestamps();
    }
}
