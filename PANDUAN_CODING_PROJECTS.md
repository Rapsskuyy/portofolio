# 📋 Panduan Menambahkan Coding Projects

## ✅ Status Saat Ini
- ✅ Database table `coding_projects` sudah dibuat
- ✅ Model `CodingProject` sudah dibuat
- ✅ Controller sudah diupdate untuk fetch data
- ✅ View section "Coding Projects" sudah ditambahkan (Section 05)
- ✅ CSS styling sudah lengkap
- ✅ Folder `public/images/coding-projects/` sudah dibuat
- ⏳ **BELUM ADA DATA** - Menunggu info project dari kelas 10

---

## 📁 Struktur Folder
```
public/images/coding-projects/
├── .gitkeep
└── (upload screenshot project di sini)
```

---

## 🎯 Cara Menambahkan Project

### Opsi 1: Manual via Database (Cepat)
Jalankan command ini di terminal untuk setiap project:

```bash
php artisan tinker
```

Lalu masukkan:
```php
App\Models\CodingProject::create([
    'title' => 'Nama Project',
    'description' => 'Deskripsi lengkap project ini...',
    'image_url' => 'nama-file-gambar.png',  // File di public/images/coding-projects/
    'demo_url' => 'https://demo-url.com',   // Opsional
    'github_url' => 'https://github.com/username/repo',  // Opsional
    'technologies' => json_encode(['PHP', 'Laravel', 'MySQL']),  // Array teknologi
    'category' => 'web',  // web, mobile, desktop, game, dll
    'year' => 2024,
    'order' => 1,  // Urutan tampilan (1 = paling atas)
]);
```

### Opsi 2: Via Seeder (Untuk Banyak Project)
1. Edit file `database/seeders/CodingProjectSeeder.php` (akan dibuat)
2. Jalankan: `php artisan db:seed --class=CodingProjectSeeder`

---

## 📝 Informasi yang Dibutuhkan

Untuk setiap project dari kelas 10, siapkan:

1. **Nama Project** (title)
2. **Deskripsi** (description) - Jelaskan apa yang dibuat, fitur utama, dll
3. **Screenshot/Gambar** (image_url) - Upload ke `public/images/coding-projects/`
4. **Link Demo** (demo_url) - Jika ada website/app yang bisa diakses (opsional)
5. **Link GitHub** (github_url) - Jika ada repository (opsional)
6. **Teknologi** (technologies) - Array: ['HTML', 'CSS', 'JavaScript', dll]
7. **Kategori** (category) - web, mobile, desktop, game, dll
8. **Tahun** (year) - 2024, 2025, dll
9. **Urutan** (order) - 1, 2, 3, dst (untuk sorting)

---

## 🎨 Contoh Data Project

```php
[
    'title' => 'Website Sekolah SMKN 1 Depok',
    'description' => 'Website profil sekolah dengan fitur berita, galeri, dan informasi akademik. Dibuat menggunakan Laravel dan Bootstrap untuk tampilan yang responsive.',
    'image_url' => 'website-sekolah.png',
    'demo_url' => 'https://smkn1depok.sch.id',
    'github_url' => 'https://github.com/Rapsskuyy/website-sekolah',
    'technologies' => json_encode(['Laravel', 'PHP', 'MySQL', 'Bootstrap', 'JavaScript']),
    'category' => 'web',
    'year' => 2024,
    'order' => 1,
]
```

---

## 🔄 Setelah Menambahkan Data

Jalankan command ini untuk clear cache:
```bash
php artisan cache:clear
php artisan view:clear
```

Lalu refresh browser untuk melihat hasilnya!

---

## 📊 Database Schema

Table: `coding_projects`

| Column | Type | Description |
|--------|------|-------------|
| id | bigint | Primary key |
| title | varchar(255) | Nama project |
| description | text | Deskripsi lengkap |
| image_url | varchar(255) | Path gambar (relatif dari public/) |
| demo_url | varchar(255) | Link demo (nullable) |
| github_url | varchar(255) | Link GitHub (nullable) |
| technologies | json | Array teknologi yang digunakan |
| category | varchar(50) | Kategori project (nullable) |
| year | integer | Tahun pembuatan (nullable) |
| order | integer | Urutan tampilan (default: 0) |
| created_at | timestamp | Waktu dibuat |
| updated_at | timestamp | Waktu diupdate |

---

## 🎯 Next Steps

1. **Upload gambar** project ke `public/images/coding-projects/`
2. **Siapkan informasi** untuk setiap project (lihat list di atas)
3. **Tambahkan data** menggunakan salah satu opsi di atas
4. **Clear cache** dan refresh browser
5. **Cek hasilnya** di section "Coding Projects" (Section 05)

---

## ❓ Pertanyaan?

Jika ada yang kurang jelas atau butuh bantuan, tinggal tanya aja! 🚀
