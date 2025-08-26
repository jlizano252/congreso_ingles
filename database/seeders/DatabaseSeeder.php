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
        GenderType::create(['name' => 'Femenino', 'slug' => Str::slug('Femenino')]);
        GenderType::create(['name' => 'Masculino', 'slug' => Str::slug('Masculino')]);
        GenderType::create(['name' => 'Prefiero no decirlo', 'slug' => Str::slug('Ninguno')]);
        //
        EducationalRegion::create(['name' => 'Dirección Regional de Educación Norte-Norte', 'slug' => Str::slug('Norte')]);
        EducationalRegion::create(['name' => 'Dirección Regional de Educación Occidente', 'slug' => Str::slug('Occidente')]);
        EducationalRegion::create(['name' => 'Dirección Regional de Educación San Carlos', 'slug' => Str::slug('San Carlos')]);
        EducationalRegion::create(['name' => 'Dirección Regional de Educación Sarapiquí', 'slug' => Str::slug('Sarapiquí')]);
        EducationalRegion::create(['name' => 'Otra', 'slug' => Str::slug('Otra')]);
        //
        EducationalLevel::create(['name' => 'Educación inicial', 'slug' => Str::slug('Educación inicial')]);
        EducationalLevel::create(['name' => 'Educación primaria', 'slug' => Str::slug('Educación primaria')]);
        EducationalLevel::create(['name' => 'Educación secundaria', 'slug' => Str::slug('Educación secundaria')]);
        EducationalLevel::create(['name' => 'Educación diversificada técnica', 'slug' => Str::slug('Educación diversificada técnica')]);
        EducationalLevel::create(['name' => 'Educación superior', 'slug' => Str::slug('Educación superior')]);
        EducationalLevel::create(['name' => 'Educación técnica parauniversitaria', 'slug' => Str::slug('Educación técnica parauniversitaria')]);
        EducationalLevel::create(['name' => 'Persona trabajadora independiente', 'slug' => Str::slug('Persona trabajadora independiente')]);
        //
        AppointmentType::create(['name' => 'Interino', 'type' => 'ministerio', 'slug' => Str::slug('Interino MEP')]);
        AppointmentType::create(['name' => 'Propiedad', 'type' => 'ministerio', 'slug' => Str::slug('Propiedad MEP')]);
        AppointmentType::create(['name' => 'Nombramiento por tiempo definido', 'type' => 'ministerio', 'slug' => Str::slug('Nombramiento por tiempo definido MEP')]);
        AppointmentType::create(['name' => 'Interino', 'type' => 'privado', 'slug' => Str::slug('Interino PRIVADO')]);
        AppointmentType::create(['name' => 'Nombramiento por tiempo indefinido', 'type' => 'privado', 'slug' => Str::slug('Nombramiento por tiempo definido PRIVADO')]);

        //
        User::create(['ide'=>'207860302', 'ide_type'=>1, 'admin'=>1, 'name'=>'Jenhson', 'lastname'=>'Lizano Villalobos', 'email'=>'lizanovillalobosjenhson@gmail.com', 'password'=>Hash::make('Puravida2025.')]);
        //User::create(['ide'=>'602930599', 'ide_type'=>1, 'name'=>'Patricia', 'lastname1'=>'López', 'lastname2'=>'Estrada', 'email'=>'plopez.estrada@gmail.com', 'password'=>Hash::make('Patricia2022.')]);

    }
}
