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
