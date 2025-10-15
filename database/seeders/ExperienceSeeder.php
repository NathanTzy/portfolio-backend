<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Experience;

class ExperienceSeeder extends Seeder
{
    public function run()
    {
        Experience::create([
            'title' => 'Frontend Developer',
            'company' => 'PT. Digital Kreatif',
            'start_year' => '2022',
            'end_year' => 'Sekarang',
            'description' => 'Membangun antarmuka modern dengan Tailwind dan React. Fokus pada performa, aksesibilitas, dan animasi interaktif yang lembut.',
        ]);

        Experience::create([
            'title' => 'UI/UX Designer',
            'company' => 'Freelance',
            'start_year' => '2020',
            'end_year' => '2022',
            'description' => 'Mendesain sistem desain dan prototipe di Figma. Berfokus pada pengalaman pengguna yang intuitif dan estetika minimalis.',
        ]);

        Experience::create([
            'title' => 'Backend Developer Intern',
            'company' => 'TechnoLab Studio',
            'start_year' => '2019',
            'end_year' => '2020',
            'description' => 'Mengembangkan API Laravel dan integrasi database untuk aplikasi internal. Membuat struktur endpoint efisien dan mudah dipelihara.',
        ]);
        Experience::create([
            'title' => 'Backend Developer Intern',
            'company' => 'TechnoLab Studio',
            'start_year' => '2019',
            'end_year' => '2020',
            'description' => 'Mengembangkan API Laravel dan integrasi database untuk aplikasi internal. Membuat struktur endpoint efisien dan mudah dipelihara.',
        ]);
        Experience::create([
            'title' => 'Backend Developer Intern',
            'company' => 'TechnoLab Studio',
            'start_year' => '2019',
            'end_year' => '2020',
            'description' => 'Mengembangkan API Laravel dan integrasi database untuk aplikasi internal. Membuat struktur endpoint efisien dan mudah dipelihara.',
        ]);
    }
}
