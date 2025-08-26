<?php

namespace App\Http\Controllers;

use App\Helpers\FormatService;
use App\Models\ApplicantForm;
use App\Models\RegistrationForm;
use App\Models\User;
use Illuminate\Http\Request;

class RegistrationFormController extends Controller
{
    public static function storeForm(array $params): bool
    {
        try {
            $participant = null;
            // User...
            $user = UserController::storeUser($params);
            if ($user) {
                $params_updated = array_merge($params, array('user_id' => $user->id));
                // Participant...
                $participant = ParticipantController::storeParticipant($params_updated);
            }
            // Form...
            if (!is_null($participant) && !is_null($user)) {
                RegistrationForm::create([
                    'reference' => FormatService::getUniqueConsecutiveCode(),
                    'participant_id' => $participant->id,
                    'accept' => $params['accept'],
                    'mep' => $params['mep'],
                    'appointment_id' => $params['appointment_id'],
                    'service_years' => $params['service_years'],
                    'region_id' => $params['region_id'],
                    'region' => $params['region'],
                    'institution' => $params['institution'],
                    'address' => $params['address'],
                    'auth_image' => $params['auth_image'],
                    'certificate' => $params['certificate'],
                ]);
            }
        } catch (\Exception $exception) {
            dd($exception);
            return false;
        }
        return true;
    }

    public static function storeApplicantForm(array $params)
    {
        try {
            $applicant = null;
            // User...
            $user = UserController::storeUserApplicant($params);
            if ($user) {
                $params_updated = array_merge($params, ['user_id' => $user->id]);
                // Applicant...
                $applicant = ApplicantController::storeApplicant($params_updated);
            }

            // Procesar foto siempre
            $photoPath = null;
            if (!empty($params['photo']) && $params['photo'] instanceof \Livewire\TemporaryUploadedFile) {
                $photoPath = $params['photo']->store('photos', 'public');
            } elseif (!empty($params['photo'])) {
                $photoPath = $params['photo']; // por si ya viene como string (ej: edición)
            }


            // Guardar formulario
            if ($applicant && $user) {
                ApplicantForm::create([
                    'applicant_id'       => $applicant->id,
                    'user_presentation'  => $params['user_presentation'] ?? null,
                    'photo'              => $photoPath ?? null,
                    'academic_title'     => $params['academic_title'] ?? null,
                    'exp'                => $params['exp'] ?? null,
                    'teacher_wellbeing'  => $params['teacher_wellbeing'] ?? null,
                    'selected_audiences' => $params['selected_audiences'] ?? null,
                    'participation_type' => $params['participation_type'] ?? null,
                    'title'              => $params['title'] ?? null,
                    'abstract'           => $params['abstract'] ?? null,
                    'description'        => $params['description'] ?? null,
                    'sources'            => $params['sources'] ?? null,
                ]);
            }
        } catch (\Exception $exception) {
            dd($exception);
            return false;
        }
        return true;
    }
}
