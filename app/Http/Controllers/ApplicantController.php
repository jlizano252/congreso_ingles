<?php

namespace App\Http\Controllers;

use App\Helpers\FormatService;
use App\Models\Applicant;
use App\Models\ApplicantForm;
use Illuminate\Http\Request;

class ApplicantController extends Controller
{
    public static function storeApplicant(array $params): Applicant|null
    {
        try {
            // Crear registro del postulante
            return Applicant::create([
                'user_id' => $params['user_id'],
                'user_presentation' => $params['user_presentation'] ?? null,
                'photo' => $params['photo'] ?? null,

                'teacher_wellbeing' => isset($params['teacher_wellbeing'])
                    ? json_encode((array) $params['teacher_wellbeing'])
                    : null,

                'selected_audiences' => isset($params['selected_audiences'])
                    ? json_encode((array) $params['selected_audiences'])
                    : null,

                'participation_type' => $params['participation_type'] ?? null,
                'title' => $params['title'] ?? null,
                'abstract' => $params['abstract'] ?? null,
                'description' => $params['description'] ?? null,
                'sources' => $params['sources'] ?? null,
            ]);
        } catch (\Exception $exception) {
            dd($exception);
            return null;
        }
    }
}
