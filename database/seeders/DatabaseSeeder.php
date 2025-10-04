<?php

namespace Database\Seeders;

use App\Models\AppointmentType;
use App\Models\EducationalLevel;
use App\Models\EducationalRegion;
use App\Models\GenderType;
use App\Models\IdeType;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //        // Locations...
        require_once 'locations.php';
        //
        IdeType::create(['name' => 'Identity Card (Cédula de identidad)', 'slug' => Str::slug('Identity Card (Cédula de identidad)')]);
        IdeType::create(['name' => 'Passport (Pasaporte)', 'slug' => Str::slug('Passport (Pasaporte)')]);
        IdeType::create(['name' => 'Residence ID (Cédula de residencia)', 'slug' => Str::slug('Residence ID (Cédula de residencia)')]);
        //
        GenderType::create(['name' => 'Female', 'slug' => Str::slug('Female')]);
        GenderType::create(['name' => 'Male', 'slug' => Str::slug('Male')]);
        GenderType::create(['name' => 'I prefer not to say', 'slug' => Str::slug('None')]);
        //
        EducationalRegion::create(['name' => 'Northern-North Regional Education Directorate', 'slug' => Str::slug('North')]);
        EducationalRegion::create(['name' => 'Western Regional Education Directorate', 'slug' => Str::slug('Occidental')]);
        EducationalRegion::create(['name' => 'San Carlos Regional Education Directorate', 'slug' => Str::slug('San Carlos')]);
        EducationalRegion::create(['name' => 'Sarapiquí Regional Education Directorate', 'slug' => Str::slug('Sarapiquí')]);
        EducationalRegion::create(['name' => 'Other', 'slug' => Str::slug('Other')]);
        //
        EducationalLevel::create(['name' => 'Early Education', 'slug' => Str::slug('Early Education')]);
        EducationalLevel::create(['name' => 'Primary Education', 'slug' => Str::slug('Primary Education')]);
        EducationalLevel::create(['name' => 'Secondary Education', 'slug' => Str::slug('Secondary Education')]);
        EducationalLevel::create(['name' => 'Technical Diversified Education', 'slug' => Str::slug('Technical Diversified Education')]);
        EducationalLevel::create(['name' => 'Higher Education', 'slug' => Str::slug('Higher Education')]);
        EducationalLevel::create(['name' => 'Technical Post-Secondary Education', 'slug' => Str::slug('Technical Post-Secondary Education')]);
        EducationalLevel::create(['name' => 'Independent Worker', 'slug' => Str::slug('Independent Worker')]);

        // Appointment types
        AppointmentType::create(['name' => 'Interim', 'type' => 'ministerio', 'slug' => Str::slug('Interim MEP')]);
        AppointmentType::create(['name' => 'Permanent', 'type' => 'ministerio', 'slug' => Str::slug('Permanent MEP')]);
        AppointmentType::create(['name' => 'Fixed-term Appointment', 'type' => 'ministerio', 'slug' => Str::slug('Fixed-term Appointment MEP')]);
        AppointmentType::create(['name' => 'Interim', 'type' => 'privado', 'slug' => Str::slug('Interim PRIVATE')]);
        AppointmentType::create(['name' => 'Indefinite-term Appointment', 'type' => 'privado', 'slug' => Str::slug('Indefinite-term Appointment PRIVATE')]);


        //
        User::create(['ide' => '207860302', 'ide_type' => 1, 'admin' => 1, 'name' => 'Jenhson', 'lastname' => 'Lizano Villalobos', 'email' => 'lizanovillalobosjenhson@gmail.com', 'password' => Hash::make('Puravida2025.')]);
        //User::create(['ide'=>'602930599', 'ide_type'=>1, 'name'=>'Patricia', 'lastname1'=>'López', 'lastname2'=>'Estrada', 'email'=>'plopez.estrada@gmail.com', 'password'=>Hash::make('Patricia2022.')]);

    }
}
