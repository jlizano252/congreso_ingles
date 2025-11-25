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
        User::firstOrCreate(
            ['email' => 'esteban12320soldel@gmail.com'],
            [
                'ide' => '119760505',
                'ide_type' => 1,
                'admin' => 1,
                'name' => 'Andres',
                'lastname' => 'Solano Delgado',
                'password' => Hash::make('VETC2025'),
            ]
        );
        User::firstOrCreate(
            ['email' => 'yeustinacuna@gmail.com'],
            [
                'ide' => '208710654',
                'ide_type' => 1,
                'admin' => 1,
                'name' => 'Yeustin Antony',
                'lastname' => 'Mairena Acuña',
                'password' => Hash::make('VETC2025'),
            ]
        );
        User::firstOrCreate(
            ['email' => 'jesusbrenes31@gmail.com'],
            [
                'ide' => '119740895',
                'ide_type' => 1,
                'admin' => 1,
                'name' => 'Christian',
                'lastname' => 'Brenes Vega',
                'password' => Hash::make('VETC2025'),
            ]
        );
        User::firstOrCreate(
            ['email' => 'daniela.segura.calvo@est.una.ac.cr'],
            [
                'ide' => '208250830',
                'ide_type' => 1,
                'admin' => 1,
                'name' => 'Daniela Ivannia',
                'lastname' => 'Segura Calvo',
                'password' => Hash::make('VETC2025'),
            ]
        );
        User::firstOrCreate(
            ['email' => 'david.gutierrez.guzman@est.una.ac.cr'],
            [
                'ide' => '118470725',
                'ide_type' => 1,
                'admin' => 1,
                'name' => 'David Jesús',
                'lastname' => 'Gutiérrez Guzmán',
                'password' => Hash::make('VETC2025'),
            ]
        );
        User::firstOrCreate(
            ['email' => 'sherry.borbon.andrade@est.una.ac.cr'],
            [
                'ide' => '402720047',
                'ide_type' => 1,
                'admin' => 1,
                'name' => 'Sherry',
                'lastname' => 'Borbón Andrade',
                'password' => Hash::make('VETC2025'),
            ]
        );
        User::firstOrCreate(
            ['email' => 'camilanayu27@gmail.com'],
            [
                'ide' => '118890348',
                'ide_type' => 1,
                'admin' => 1,
                'name' => 'Camila Nayudel',
                'lastname' => 'Santana Villalobos',
                'password' => Hash::make('VETC2025'),
            ]
        );
        User::firstOrCreate(
            ['email' => 'ssancho@estudiantes.tec.cr'],
            [
                'ide' => '2022065510',
                'ide_type' => 1,
                'admin' => 1,
                'name' => 'Samira',
                'lastname' => 'Sancho Chacón',
                'password' => Hash::make('VETC2025'),
            ]
        );
        User::firstOrCreate(
            ['email' => 'amartinez@uned.ac.cr'],
            [
                'ide' => '110490039',
                'ide_type' => 1,
                'admin' => 1,
                'name' => 'Ariel',
                'lastname' => 'Martínez Silva',
                'password' => Hash::make('VETC2025'),
            ]
        );
        User::firstOrCreate(
            ['email' => 'maria.vargas.mata@est.una.ac.cr'],
            [
                'ide' => '703000284',
                'ide_type' => 1,
                'admin' => 1,
                'name' => 'Maria Fernanda',
                'lastname' => 'Vargas Mata ',
                'password' => Hash::make('VETC2025'),
            ]
        );
    }
}
