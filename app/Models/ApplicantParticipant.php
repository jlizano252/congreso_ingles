<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicantParticipant extends Model
{
    use HasFactory;

    protected $table = 'applicant_participant';
    protected $fillable = ['participant_id', 'applicant_id'];

    public function participant()
    {
        return $this->belongsTo(Participant::class);
    }

    public function applicant()
    {
        return $this->belongsTo(Applicant::class);
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class, 'applicant_participant_id');
    }
}
