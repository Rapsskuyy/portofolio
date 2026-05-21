<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CodingProject;

class CodingProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Clear existing data (optional - comment out if you want to keep existing data)
        // CodingProject::truncate();

        $projects = [
            // Project 1: 3D Modeling Ruang Kelas
            [
                'title' => '3D Modeling Ruang Kelas',
                'description' => 'Modeling 3D barang-barang yang ada di kelas seperti meja, bangku, papan tulis, lemari, buku, dan vas bunga. Dibuat dengan detail untuk simulasi ruang kelas yang realistis.',
                'image_url' => 'kelas.png',
                'demo_url' => null,
                'github_url' => null,
                'technologies' => ['3D Modeling', 'Blender'],
                'category' => 'design',
                'year' => 2025,
                'order' => 1,
            ],

            // Project 2: 3D Modeling Pedang
            [
                'title' => '3D Modeling Pedang',
                'description' => 'Modeling 3D pedang dengan detail tekstur dan material yang realistis. Project ini menunjukkan kemampuan dalam membuat objek 3D dengan detail yang kompleks.',
                'image_url' => 'pedang.png',
                'demo_url' => null,
                'github_url' => null,
                'technologies' => ['3D Modeling', 'Blender'],
                'category' => 'design',
                'year' => 2025,
                'order' => 2,
            ],

            // Project 3: UI/UX Design Portfolio Website
            [
                'title' => 'UI/UX Design Portfolio Website',
                'description' => 'Design UI/UX untuk website portfolio pribadi pertama saya. Dibuat menggunakan Figma dengan fokus pada user experience dan tampilan yang modern dan menarik.',
                'image_url' => 'porto1.png',
                'demo_url' => null,
                'github_url' => null,
                'technologies' => ['Figma', 'UI/UX Design'],
                'category' => 'design',
                'year' => 2025,
                'order' => 3,
            ],

            // Project 4: UI/UX Design Web Kursus PT Komari
            [
                'title' => 'UI/UX Design Web Kursus PT Komari',
                'description' => 'Design UI/UX untuk website kursus PT Komari. Design ini mencakup halaman landing, katalog kursus, dan sistem pendaftaran dengan interface yang user-friendly.',
                'image_url' => 'web1.png',
                'demo_url' => null,
                'github_url' => null,
                'technologies' => ['Figma', 'UI/UX Design'],
                'category' => 'design',
                'year' => 2025,
                'order' => 4,
            ],
        ];

        // Insert all projects
        foreach ($projects as $project) {
            CodingProject::create($project);
        }

        $this->command->info('✅ Coding projects seeded successfully!');
        $this->command->info('📊 Total projects: ' . count($projects));
    }
}
