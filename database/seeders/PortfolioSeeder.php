<?php

namespace Database\Seeders;

use App\Models\Education;
use App\Models\Skill;
use App\Models\Project;
use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class PortfolioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Seed Educations (idempotent)
        Education::updateOrCreate(
            ['institution' => 'SDN Cibubur 10'],
            [
                'degree' => 'Sekolah Dasar',
                'field_of_study' => 'Pendidikan Dasar',
                'start_year' => '2014/2015',
                'end_year' => '2019/2020',
                'description' => 'Dasar pendidikan dan pembentukan karakter',
            ]
        );

        Education::updateOrCreate(
            ['institution' => 'SMPN 15 Depok'],
            [
                'degree' => 'Sekolah Menengah Pertama',
                'field_of_study' => 'Pendidikan Umum',
                'start_year' => '2021/2022',
                'end_year' => '2023/2024',
                'description' => 'Pendidikan menengah dengan fokus akademik',
            ]
        );

        Education::updateOrCreate(
            ['institution' => 'SMKN 1 Depok'],
            [
                'degree' => 'Sekolah Menengah Kejuruan',
                'field_of_study' => 'PPLG (Pengembangan Perangkat Lunak dan Gim)',
                'start_year' => '2024/2025',
                'end_year' => '2026/2027',
                'description' => 'Pendidikan kejuruan fokus pada pengembangan perangkat lunak dan gim',
            ]
        );

        // Seed Soft Skills
        $softSkills = [
            ['name' => 'Komunikasi', 'proficiency' => 87],
            ['name' => 'Problem Solving', 'proficiency' => 93],
            ['name' => 'Creative Thinking', 'proficiency' => 87],
            ['name' => 'Leadership', 'proficiency' => 81],
            ['name' => 'Teamwork', 'proficiency' => 97],
        ];
        foreach ($softSkills as $skill) {
            Skill::updateOrCreate(
                ['name' => $skill['name'], 'type' => 'soft'],
                ['proficiency' => $skill['proficiency']]
            );
        }

        // Seed Hard Skills
        $hardSkills = [
            ['name' => 'PHP', 'proficiency' => 89],
            ['name' => 'Laravel', 'proficiency' => 65],
            ['name' => 'JavaScript', 'proficiency' => 74],
            ['name' => 'MySQL', 'proficiency' => 94],
            ['name' => 'HTML/CSS', 'proficiency' => 96],
            ['name' => 'Git', 'proficiency' => 74],
        ];

        foreach ($hardSkills as $skill) {
            Skill::updateOrCreate(
                ['name' => $skill['name'], 'type' => 'hard'],
                ['proficiency' => $skill['proficiency']]
            );
        }

        // Seed Projects - Gallery dari pengalaman organisasi
        Project::updateOrCreate(
            ['title' => 'Panitia Event Bulan Bahasa 2025'],
            [
                'description' => 'Berperan sebagai Sie Acara dalam menyelenggarakan acara Bulan Bahasa 2025. Bertanggung jawab mengatur rundown acara, koordinasi timeline, dan memastikan setiap segment berjalan sesuai rencana dengan sempurna.',
                'image_url' => 'projects/bulan_bahasa.jpg',
                'project_url' => '#',
                'github_url' => '#',
                'technologies' => json_encode(['Event Planning', 'Rundown Management', 'Koordinasi']),
            ]
        );

        Project::updateOrCreate(
            ['title' => "Panitia Event One's Harmony 2025"],
            [
                'description' => 'Sebagai Sie Perlengkapan dalam event One\'s Harmony 2025. Mengelola semua aspek perlengkapan acara mulai dari persiapan, pengadaan, penempatan hingga pemeliharaan semua peralatan untuk kelancaran event.',
                'image_url' => 'projects/ones_harmony.jpg',
                'project_url' => '#',
                'github_url' => '#',
                'technologies' => json_encode(['Manajemen Perlengkapan', 'Logistik', 'Koordinasi Tim']),
            ]
        );

        Project::updateOrCreate(
            ['title' => 'Juara Olimpiade Sains Nasional'],
            [
                'description' => 'Meraih juara 1 dalam Olimpiade Sains Nasional. Pencapaian ini merupakan hasil dari dedikasi, pembelajaran berkelanjutan, dan kerja keras dalam mempersiapkan diri menghadapi kompetisi tingkat nasional.',
                'image_url' => 'projects/olimpiade_sains.jpg',
                'project_url' => '#',
                'github_url' => '#',
                'technologies' => json_encode(['Sains', 'Problem Solving', 'Kompetisi Nasional']),
            ]
        );

        Project::updateOrCreate(
            ['title' => 'MC — Project Kolaborasi Nusantara'],
            [
                'description' => 'Menjadi MC pada acara Project Kolaborasi Nusantara: memandu acara, menjaga alur, serta berkoordinasi dengan tim produksi dan peserta agar acara berjalan lancar.',
                'image_url' => 'projects/mc_kolaborasi_nusantara.jpg',
                'project_url' => '#',
                'github_url' => '#',
                'technologies' => json_encode(['Public Speaking', 'MC', 'Koordinasi Tim']),
            ]
        );

        Project::updateOrCreate(
            ['title' => 'Panitia MPLS SMKN 1 Depok'],
            [
                'description' => 'Panitia MPLS di SMKN 1 Depok: bertugas dalam perencanaan orientasi, registrasi peserta, dan koordinasi kegiatan untuk menyambut siswa baru.',
                'image_url' => 'projects/panitia_mpls_smkn1_depok.jpg',
                'project_url' => '#',
                'github_url' => '#',
                'technologies' => json_encode(['Organisasi', 'Registrasi', 'Koordinasi Kegiatan']),
            ]
        );

        // Testimonials table siap, menunggu pengunjung untuk mengisi
    }
}
