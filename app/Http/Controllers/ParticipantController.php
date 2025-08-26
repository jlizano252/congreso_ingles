<?php

namespace App\Http\Controllers;

use App\Helpers\FormatService;
use App\Models\Participant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ParticipantController extends Controller
{
    public static function storeParticipant(array $params): Participant|null
    {
        try {
            return Participant::create([
                'user_id' => $params['user_id'],
                'gender_type' => $params['gender_type'],
                'photo' => $params['photo'] ?? null,
                'phone' => $params['phone'],
                'email' => $params['email'],
                'country' => $params['country'],
                'province_id' => $params['province_id'],
                'canton_id' => $params['canton_id'],
                'district_id' => $params['district_id']
            ]);
        } catch (\Exception $exception) {
            dd($exception);
            return null;
        }
    }
}
