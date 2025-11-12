<?php

namespace Database\Seeders;

use App\Models\AppointmentType;
use App\Models\EducationalLevel;
use App\Models\EducationalRegion;
use App\Models\GenderType;
use App\Models\IdeType;
use App\Models\User;
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
        require_once 'locations.php';

        // === Ide Types ===
        IdeType::firstOrCreate(['slug' => Str::slug('Identity Card (Cédula de identidad)')], [
            'name' => 'Identity Card (Cédula de identidad)',
        ]);
        IdeType::firstOrCreate(['slug' => Str::slug('Passport (Pasaporte)')], [
            'name' => 'Passport (Pasaporte)',
        ]);
        IdeType::firstOrCreate(['slug' => Str::slug('Residence ID (Cédula de residencia)')], [
            'name' => 'Residence ID (Cédula de residencia)',
        ]);

        // === Gender Types ===
        GenderType::firstOrCreate(['slug' => Str::slug('Female')], ['name' => 'Female']);
        GenderType::firstOrCreate(['slug' => Str::slug('Male')], ['name' => 'Male']);
        GenderType::firstOrCreate(['slug' => Str::slug('None')], ['name' => 'I prefer not to say']);

        // === Educational Regions ===
        EducationalRegion::firstOrCreate(['slug' => Str::slug('North')], [
            'name' => 'Northern-North Regional Education Directorate',
        ]);
        EducationalRegion::firstOrCreate(['slug' => Str::slug('Occidental')], [
            'name' => 'Western Regional Education Directorate',
        ]);
        EducationalRegion::firstOrCreate(['slug' => Str::slug('San Carlos')], [
            'name' => 'San Carlos Regional Education Directorate',
        ]);
        EducationalRegion::firstOrCreate(['slug' => Str::slug('Sarapiquí')], [
            'name' => 'Sarapiquí Regional Education Directorate',
        ]);
        EducationalRegion::firstOrCreate(['slug' => Str::slug('Other')], ['name' => 'Other']);

        // === Educational Levels ===
        $levels = [
            'Early Education',
            'Primary Education',
            'Secondary Education',
            'Technical Diversified Education',
            'Higher Education',
            'Technical Post-Secondary Education',
            'Independent Worker',
        ];

        foreach ($levels as $level) {
            EducationalLevel::firstOrCreate(['slug' => Str::slug($level)], ['name' => $level]);
        }

        // === Appointment Types ===
        AppointmentType::firstOrCreate(['slug' => Str::slug('Interim MEP')], [
            'name' => 'Interim',
            'type' => 'ministerio',
        ]);
        AppointmentType::firstOrCreate(['slug' => Str::slug('Permanent MEP')], [
            'name' => 'Permanent',
            'type' => 'ministerio',
        ]);
        AppointmentType::firstOrCreate(['slug' => Str::slug('Fixed-term Appointment MEP')], [
            'name' => 'Fixed-term Appointment',
            'type' => 'ministerio',
        ]);
        AppointmentType::firstOrCreate(['slug' => Str::slug('Interim PRIVATE')], [
            'name' => 'Interim',
            'type' => 'privado',
        ]);
        AppointmentType::firstOrCreate(['slug' => Str::slug('Indefinite-term Appointment PRIVATE')], [
            'name' => 'Indefinite-term Appointment',
            'type' => 'privado',
        ]);

        // === Admin User ===
        User::firstOrCreate(
            ['email' => 'lizanovillalobosjenhson@gmail.com'],
            [
                'ide' => '207860302',
                'ide_type' => 1,
                'admin' => 1,
                'name' => 'Jenhson',
                'lastname' => 'Lizano Villalobos',
                'password' => Hash::make('Puravida2025.'),
            ]
        );
        User::firstOrCreate(
            ['email' => 'lizanovillalobosjenhson@gmail.com'],
            [
                'ide' => '207860302',
                'ide_type' => 1,
                'admin' => 1,
                'name' => 'Jenhson',
                'lastname' => 'Lizano Villalobos',
                'password' => Hash::make('Puravida2025.'),
            ]
        );
        User::firstOrCreate(
            ['email' => 'jschaves@etai.ac.cr'],
            [
                'ide' => '208220670',
                'ide_type' => 1,
                'admin' => 1,
                'name' => 'Jessica María',
                'lastname' => 'Chaves Chaves',
                'password' => Hash::make('Jeka25*'),
            ]
        );
        User::firstOrCreate(
            ['email' => 'jchaves@etai.ac.cr'],
            [
                'ide' => '206590313',
                'ide_type' => 1,
                'admin' => 1,
                'name' => 'Jorge',
                'lastname' => 'Chaves Blanco',
                'password' => Hash::make('VETC2025'),
            ]
        );
    }
}
