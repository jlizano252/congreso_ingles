<?php

namespace App\Http\Livewire\Public\EnrollmentForm\V1;

use App\Helpers\FormatService;
use App\Helpers\MailService;
use App\Http\Controllers\EnrollmentPeriodController;
use App\Http\Controllers\RegistrationFormController;
use App\Models\Canton;
use App\Models\Career;
use App\Models\District;
use App\Models\Province;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;
use Livewire\WithFileUploads;

class EnrollmentFormv1 extends Component
{
    use WithFileUploads;
    // Form steps status...
    public int $current_step = 1;
    public int $steps_count = 5;

    // Locations....
    public Collection $province_list;
    public Collection $canton_list;
    public Collection $district_list;

    // Locked fields...
    public bool $lockCanton = true;
    public bool $lockDistrict = true;
    public bool $stop = false;

    // Form...
    //-- Step-1
    public string $quest1_1 = 'si';
    //-- Step-2
    public string $selected_ide_type = '1';
    public string $ide = "";
    public string $name = "";
    public string $lastname = "";
    public string $selected_gender_id = '1';
    public string $mobile = "";
    public string $email = "";
    public string $country = "CR";
    public $prov = "0";
    public $cant = "0";
    public $dist = "0";
    public string $selected_educational_id = '1';
    public string $mep = 'si';
    //-- Step-3
    public string $selected_appoint_id = '1';
    public string $service_years = '';
    public string $selected_region_id = '1';
    public string $other_region = '';
    public string $institution = "";
    public string $inst_address = "";
    //-- Step-4
    public string $quest4_1 = 'si';
    public $photo = null;
    //-- Step-5
    public string $quest5_1 = 'si';

    // Listeners...
    protected $listeners = [
        "selectDate" => 'getSelectedDate',
        'selectIdeType' => 'setIdeType',
        'selectGenderType' => 'setGenderType',
        'selectEducationalLevelType' => 'setEdLevelType',
        'selectAppointmentType' => 'setAppointmentType',
        'selectRegionType' => 'setRegionType'
    ];

    public function mount()
    {
        // Set step...
        $this->current_step = 1;
        // Set locations...
        $this->province_list = Province::all();
        $this->canton_list = new Collection();
        $this->district_list = new Collection();
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

    protected function rules(): array
    {
        return [
            'prov' => ['required'],
            'cant' => ['required'],
            'dist' => ['required']
        ];
    }

    protected array $validationAttributes = [
        'name' => 'nombre',
        'lastname' => 'apellido',
        'email' => 'correo',
        'ide' => 'identificación',
        'mobile' => 'teléfono celular',
        'prov' => 'provincia',
        'cant' => 'cantón',
        'dist' => 'distrito',
        'service_years' => 'años de servicio',
        'institution' => 'institución',
        'inst_address' => 'dirección',
        'other_region' => 'región'
    ];

    public function validateData()
    {
        if ($this->current_step == 1) {
            // $this->validate(['quest1_1' => 'accepted_if:si']);
        } elseif ($this->current_step == 2) {
            $this->validate([
                'ide' => 'required|string|min:9|max:14|unique:users,ide',
                'name' => 'required|string|min:2|max:180',
                'lastname' => 'required|string|min:2|max:80',
                'email' => 'required|email|min:10|max:180|unique:users,email',
                'mobile' => 'required|string|min:8|max:9|regex:/^[\-0-9]*$/'
            ]);
        } elseif ($this->current_step == 3) {
            $this->validate([
                'inst_address' => 'required|string|min:10|max:200',
                'institution' => 'required|string|min:6|max:200',
                'service_years' => 'required|numeric|min:0|max:99',
                'other_region' => 'string|min:6|max:200',
                'photo' => 'nullable|image|max:2048'
            ]);
        }
    }

    public function processData()
    {
        $this->resetErrorBag();

        // ✅ Guardar foto si existe
        if ($this->photo instanceof \Livewire\TemporaryUploadedFile) {
            $path = $this->photo->store('photos', 'public');
            $this->photo = $path; // reemplazar el archivo temporal por la ruta
        }

        if ($this->steps_count == 5) {
            $params = $this->buildParamsArray();
            if (RegistrationFormController::storeForm($params)) {
                MailService::sendRegisterMailNotification($params);
                return redirect()->route('public.register.success');
            } else {
                return redirect()->route('public.register.error');
            }
        }
    }

    public function increaseStep()
    {
        $this->resetErrorBag();
        $this->validateData();
        $this->current_step++;
        if ($this->current_step > $this->steps_count) {
            $this->current_step = $this->steps_count;
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

    // Events...
    public function setIdeType(string $value)
    {
        $this->selected_ide_type = $value;
    }

    public function setGenderType(string $value)
    {
        $this->selected_gender_id = $value;
    }

    public function setEdLevelType(string $value)
    {
        $this->selected_educational_id = $value;
    }

    public function setAppointmentType(string $value)
    {
        $this->selected_appoint_id = $value;
    }

    public function setRegionType(string $value)
    {
        $this->selected_region_id = $value;
    }

    public function changeStopStatus()
    {
        if ($this->stop) {
            $this->stop = false;
        } else {
            $this->stop = true;
        }
    }

    public function buildParamsArray(): array
    {
        if ($this->prov == 0 || $this->cant == 0 || $this->dist == 0) {
            $this->prov = $this->cant = $this->dist = null;
        }
        return array(
            // user params...
            'ide' => $this->ide,
            'ide_type' => $this->selected_ide_type,
            'name' => $this->name,
            'lastname' => $this->lastname,
            'email' => $this->email,
            // participant params...
            'gender_type' => $this->selected_gender_id,
            'phone' => FormatService::formatPhoneNumber($this->mobile),
            'country' => $this->country,
            'province_id' => $this->prov,
            'canton_id' => $this->cant,
            'district_id' => $this->dist,
            // form params...
            'accept' => $this->quest1_1,
            'mep' => $this->mep,
            'appointment_id' => $this->selected_appoint_id,
            'service_years' => $this->service_years,
            'region_id' => $this->selected_region_id,
            'region' => $this->other_region,
            'institution' => $this->institution,
            'address' => $this->inst_address,
            'auth_image' => $this->quest4_1,
            'certificate' => $this->quest5_1,
            'photo' => $this->photo,
        );
    }

    public function render()
    {
        return view('livewire.public.enrollment-form.v1.enrollment-formv1');
    }
}
