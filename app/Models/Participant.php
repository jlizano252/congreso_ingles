<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'photo',
        'gender_type',
        'phone',
        'email',
        'country',
        'province_id',
        'canton_id',
        'district_id'
    ];

    // Relationships...
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function register()
    {
        return $this->hasOne(RegistrationForm::class, 'participant_id', 'id');
    }

    public function applicants()
    {
        return $this->belongsToMany(Applicant::class, 'applicant_participant');
    }
}
