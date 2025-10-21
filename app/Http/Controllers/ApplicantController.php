<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use Illuminate\Http\Request;

class ApplicantController extends Controller
{
    public static function storeApplicant(array $params): ?Applicant
    {
        try {
            return Applicant::create([
                'user_id' => $params['user_id'],
                'id' => $params['ide'] ?? null,
                'prefijo' => $params['prefijo'] ?? null, // <-- agregado
                'user_presentation' => $params['user_presentation'] ?? null,
                'photo' => $params['photo'] ?? null,
                'academic_title' => $params['academic_title'] ?? null,
                'exp' => $params['exp'] ?? null,
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

    public function index(Request $request)
    {
        $search = $request->input('search');

        $expositors = Applicant::query()
            ->when($search, function ($query, $search) {
                $query->where('title', 'like', "%{$search}%")
                    ->orWhereHas('user', function ($q) use ($search) {
                        $q->where('name', 'like', "%{$search}%")
                            ->orWhere('lastname', 'like', "%{$search}%");
                    });
            })
            ->get();

        return view('index-expositors', compact('expositors', 'search'));
    }
}
