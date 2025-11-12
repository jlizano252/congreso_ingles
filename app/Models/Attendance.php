<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $fillable = ['session_participant_id', 'attended', 'checked_in_at', 'comment'];

    protected $casts = [
        'checked_in_at' => 'datetime',
    ];

    public function sessionParticipant()
    {
        return $this->belongsTo(SessionParticipant::class);
    }
}