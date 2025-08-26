<?php

namespace App\Http\Livewire\Public\EnrollmentForm\V1;

use App\Helpers\FormatService;
use App\Helpers\MailService;
use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\RegistrationFormController;
use App\Models\ApplicantForm;
use App\Models\Canton;
use App\Models\District;
use App\Models\Province;
use App\Models\RegistrationForm;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;
use Livewire\WithFileUploads;

class EnrollmentFormv2 extends Component
{
    use WithFileUploads;

    // Form steps status
    public int $current_step = 1;
    public int $steps_count = 7;

    // Locations
    public Collection $province_list;
    public Collection $canton_list;
    public Collection $district_list;

    //-- Step-1
    public string $quest1_1 = 'si';

    // Locked fields...
    public bool $lockCanton = true;
    public bool $lockDistrict = true;
    public bool $stop = false;

    // Step 2: Información personal
    public string $selected_ide_type = '1';
    public string $ide = "";
    public string $name = "";
    public string $lastname = "";
    public string $email = "";
    public string $exp = "";
    public string $academic_title = '';
    public string $mobile = "";
    public string $country = "CR";
    public $prov = "0";
    public $cant = "0";
    public $dist = "0";
    public string $prefijo = 'BACH';
    public $selected_option;
    
    // Step 3: Presentación / foto / institución
    public string $institucion = "";
    public string $service_years = '';
    public string $other_region = '';
    public string $user_presentation = 'si';
    public $photo = null;
    // Step 4: Temas
    public $teacher_wellbeing;

    // Step 5: Audiencias
    public $selected_audiences = [];

    // Step 6: Tipo de participación
    public $participation_type;

    // Step 7: Sesión
    public string $title = '';
    public string $abstract = '';
    public string $description = '';
    public string $sources = '';

    // Listeners...
    protected $listeners = [
        'selectIdeType' => 'setIdeType',
    ];

    public function mount()
    {
        $this->current_step = 1;
        $this->province_list = Province::all();
        $this->canton_list = new Collection();
        $this->district_list = new Collection();
    }

    protected function rules(): array
    {
        return [
            'prov' => ['required'],
            'cant' => ['required'],
            'dist' => ['required']
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);

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
                $this->validate([
                    'ide' => 'required|string|min:9|max:14|unique:users,ide',
                    'name' => 'required|string|min:2|max:180',
                    'lastname' => 'required|string|min:2|max:80',
                    'email' => 'required|email|min:10|max:180|unique:users,email',
                    'mobile' => 'required|string|min:8|max:9|regex:/^[\-0-9]*$/',
                    'academic_title' => 'required|string|max:80',
                    'exp' => 'required|string|max:80',
                ]);
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
                    'participation_type' => 'required|in:Presencial,Híbrido'
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
        $this->validateData();
        $this->current_step++;
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

        // ✅ Manejar archivo Livewire
        if ($params['photo'] instanceof \Livewire\TemporaryUploadedFile) {
            $params['photo'] = $params['photo']->store('photos', 'public');
        }

        if (RegistrationFormController::storeApplicantForm($params)) {
            MailService::sendRegisterMailNotification($params);
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
            'photo' => $this->photo, // Puede ser TemporaryUploadedFile, será procesado en processData()
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
