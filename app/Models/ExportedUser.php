<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExportedUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'participant_id',
        'emails'
    ];
}
