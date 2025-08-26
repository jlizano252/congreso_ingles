<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistrationForm extends Model
{
    use HasFactory;

    protected $fillable = [
        'reference',
        'participant_id',
        'applicant_id',
        'accept',
        'mep',
        'appointment_id',
        'service_years',
        'region_id',
        'region',
        'institution',
        'circuit',
        'address',
        'auth_image',
        'certificate'
    ];
}
