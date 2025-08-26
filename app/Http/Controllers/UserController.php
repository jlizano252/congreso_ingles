<?php

namespace App\Http\Controllers;

use App\Jobs\ExportMoodleApplicant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Jobs\ExportMoodleParticipant;

class UserController extends Controller
{
    public static function storeUser(array $params): User|null
    {
        try {
            return User::create([
                'ide' => $params['ide'],
                'ide_type' => $params['ide_type'],
                'name' => $params['name'],
                'lastname' => $params['lastname'],
                'email' => $params['email'],
                'password' => Hash::make('4lv4r0.')
            ]);
            dd(ExportMoodleParticipant::dispatch($user));
        } catch (\Exception $exception) {
            dd($exception);
            return null;
        }
    }
    
    public static function storeUserApplicant(array $params): User|null
    {
        try {
            // Crear o reutilizar el usuario si ya existe
            $user = User::firstOrCreate(
                ['email' => $params['email']], // condición única
                [
                    'ide' => $params['ide'],
                    'ide_type' => $params['ide_type'],
                    'name' => $params['name'],
                    'lastname' => $params['lastname'],
                    'password' => Hash::make('4lv4r0.')
                ]
            );

            // Despachar job
           // dd(ExportMoodleApplicant::dispatch($user->id));

            // Retornar usuario creado o existente
            return $user;
        } catch (\Exception $exception) {
            dd($exception); // para depuración
            return null;
        }
    }
}
