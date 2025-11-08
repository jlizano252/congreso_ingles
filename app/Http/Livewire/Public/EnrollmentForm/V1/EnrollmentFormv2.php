<?php

namespace App\Http\Livewire\Public\EnrollmentForm\V1;

use App\Helpers\FormatService;
use App\Helpers\MailService;
use App\Http\Controllers\RegistrationFormController;
use App\Models\Applicant;
use App\Models\ApplicantForm;
use App\Models\Canton;
use App\Models\District;
use App\Models\Province;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;
use Livewire\WithFileUploads;

class EnrollmentFormv2 extends Component
{
    use WithFileUploads;

    // Steps
    public int $current_step = 1;
    public int $steps_count = 7;

    // Locations
    public Collection $province_list;
    public Collection $canton_list;
    public Collection $district_list;

    // Step 1
    public string $quest1_1 = 'si';

    // Step 2
    public string $selected_ide_type = '';
    public string $ide = '';
    public string $name = '';
    public string $lastname = '';
    public string $email = '';
    public string $exp = '';
    public string $academic_title = '';
    public string $mobile = '';
    public string $country = 'CR';
    public string $prov = '0';
    public string $cant = '0';
    public string $dist = '0';
    public string $prefijo = 'BACH';
    public $selected_option = null;

    public bool $lockCanton = true;
    public bool $lockDistrict = true;
    public bool $stop = false;

    // Step 3
    public string $institucion = '';
    public string $service_years = '';
    public string $other_region = '';
    public string $user_presentation = 'si';
    public $photo = null;

    // Step 4
    public $teacher_wellbeing = null;

    // Step 5
    public $selected_audiences = [];

    // Step 6
    public $participation_type = null;

    // Step 7
    public string $title = '';
    public string $abstract = '';
    public string $description = '';
    public string $sources = '';

    // Selected existing user
    public $selectedUserId = null;
    public bool $is_existing_user = false;
    public $user_id;
    public $new_form = false;

    protected $listeners = [
        'selectIdeType' => 'setIdeType',
    ];

    public function mount()
    {
        $this->selected_ide_type = 1;
        $this->province_list  = Province::all();
        $this->canton_list    = new Collection();
        $this->district_list  = new Collection();

        $userId = session('selected_user_id');

        if (!$userId) {
            $this->current_step = 1;
            return;
        }

        // USER
        $user = User::find($userId);
        if (!$user) {
            $this->current_step = 1;
            return;
        }

        $this->selectedUserId = $user->id;
        $this->is_existing_user = true;

        // APPLICANT
        $applicant = Applicant::where('user_id', $user->id)->first();

        // APPLICANT_FORM (último)
        $applicantForm = null;
        if ($applicant) {
            $applicantForm = ApplicantForm::where('applicant_id', $applicant->id)->latest()->first();
        }

        // ----- USER -----
        $this->name     = $user->name;
        $this->lastname = $user->lastname;
        $this->email    = $user->email;

        // ----- APPLICANT -----
        $this->prefijo           = $applicant->prefijo ?? 'BACH';
        $this->user_presentation = $applicant->user_presentation ?? 'si';

        // ----- APPLICANT_FORM -----
        $this->academic_title = $applicantForm->academic_title ?? '';
        $this->exp            = $applicantForm->exp ?? '';
        $this->photo          = $applicantForm->photo ?? null;

        $this->current_step = 4;

        // limpiar para que no se repita
        session()->forget('selected_user_id');
    }


    public function updated($propertyName)
    {

        if ($this->prov == "0") {
            $this->reset('lockCanton', 'lockDistrict', 'cant', 'dist');
            $this->canton_list = $this->district_list = new Collection();
        } else {
            $this->canton_list = Canton::where('province_id', $this->prov)->get();
            $this->lockCanton = false;
            if ($this->cant == "0") {
                $this->reset('lockDistrict', 'dist');
                $this->district_list = new Collection();
            } else {
                $this->district_list = District::where('canton_id', $this->cant)->get();
                $this->lockDistrict = false;
            }
        }
    }

    public function validateData()
    {
        switch ($this->current_step) {
            case 2:
                $rules = [
                    'ide' => 'required|string|min:9|max:14',
                    'name' => 'required|string|min:2|max:180',
                    'lastname' => 'required|string|min:2|max:80',
                    'email' => 'required|email|min:10|max:180',
                    'mobile' => ['required', 'string', 'regex:/^\+?[0-9]{8,15}$/'],
                    'academic_title' => 'required|string|max:80',
                    'exp' => 'required|string',
                ];
                if (!$this->is_existing_user) {
                    $rules['ide'] .= '|unique:users,ide';
                    $rules['email'] .= '|unique:users,email';
                }
                $this->validate($rules);
                break;

            case 3:
                $this->validate([
                    'user_presentation' => 'required|string|in:si,no',
                    'photo' => 'nullable|image|max:2048'
                ]);
                break;

            case 4:
                $this->validate([
                    'teacher_wellbeing' => 'required|string',
                ]);
                break;

            case 5:
                $this->validate([
                    'selected_audiences' => 'required|array|min:1'
                ]);
                break;

            case 6:
                $this->validate([
                    'participation_type' => 'required|in:On-site,Hybrid'
                ]);
                break;

            case 7:
                $this->validate([
                    'title' => 'required|string|max:10',
                    'abstract' => 'required|string|max:50',
                    'description' => 'required|string|max:300',
                    'sources' => 'nullable|string|max:500'
                ]);
                break;
        }
    }

    public function increaseStep()
    {
        $this->resetErrorBag();

        try {
            $this->validateData();
            info('validateData OK for step ' . $this->current_step);
        } catch (\Illuminate\Validation\ValidationException $e) {
            // loguea errores y vuelve a lanzar para que Livewire los muestre
            info('VALIDATION FAILED on step ' . $this->current_step . ' -> ' . json_encode($e->validator->errors()->toArray()));
            throw $e;
        } catch (\Throwable $t) {
            info('OTHER ERROR in validateData: ' . $t->getMessage());
            throw $t;
        }

        $this->current_step++;
        info('after increment - current: ' . $this->current_step);

        if ($this->current_step > $this->steps_count) {
            $this->current_step = $this->steps_count;
            $this->processData();
        }
    }


    public function decreaseStep()
    {
        $this->resetErrorBag();
        $this->current_step--;
        if ($this->current_step < 1) {
            $this->current_step = 1;
        }
    }

    public function processData()
    {
        $params = $this->buildParamsArray();

        // Subida de foto si existe
        if ($params['photo'] instanceof \Livewire\TemporaryUploadedFile) {
            $params['photo'] = $params['photo']->store('photos', 'public');
        }

        // Guardar el formulario en la DB
        if (RegistrationFormController::storeApplicantForm($params)) {
            // Enviar notificación por correo
            MailService::sendRegisterMailNotification($params);

            // Reinicio de variables según tipo de usuario
            if ($this->is_existing_user) {
                // Solo reset de steps 4-7 para agregar un nuevo tema
                $this->reset([
                    'teacher_wellbeing',
                    'selected_audiences',
                    'participation_type',
                    'title',
                    'abstract',
                    'description',
                    'sources'
                ]);
                $this->current_step = 4;
            } else {
                $this->current_step = 1;
            }

            return redirect()->route('public.register.success');
        } else {
            return redirect()->route('public.register.error');
        }
    }

    public function buildParamsArray(): array
    {
        return [
            'ide' => $this->ide,
            'ide_type' => $this->selected_ide_type,
            'name' => $this->name,
            'lastname' => $this->lastname,
            'exp' => $this->exp,
            'email' => $this->email,
            'mobile' => $this->mobile,
            'country' => $this->country,
            'prov' => $this->prov ?: null,
            'cant' => $this->cant ?: null,
            'dist' => $this->dist ?: null,
            'academic_title' => $this->academic_title,
            'prefijo' => $this->prefijo,
            'institution' => $this->institucion,
            'user_presentation' => $this->user_presentation,
            'photo' => $this->photo,
            'teacher_wellbeing' => $this->teacher_wellbeing,
            'selected_audiences' => $this->selected_audiences,
            'participation_type' => $this->participation_type,
            'title' => $this->title,
            'abstract' => $this->abstract,
            'description' => $this->description,
            'sources' => $this->sources
        ];
    }

    public function render()
    {
        return view('livewire.public.enrollment-form.v1.enrollment-formv2');
    }
}
