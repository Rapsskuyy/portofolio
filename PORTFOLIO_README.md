# Portfolio Website - Dokumentasi

Portofolio website yang modern dan fully functional dengan Laravel.

## 📋 Fitur

✅ **Navbar dengan Profile** - Menu navigasi yang responsif
✅ **Riwayat Pendidikan** - Tampilkan pendidikan dari database
✅ **Galeri Project** - Showcase portfolio projects dengan thumbnail
✅ **Soft Skills & Hard Skills** - Tampilkan skills dengan progress bar
✅ **Footer Dinamis** - Contact information yang lengkap
✅ **Responsive Design** - Bekerja sempurna di semua device

## 🗄️ Database Schema

### Tabel: `educations`
- `id` - Primary key
- `institution` - Nama institusi
- `degree` - Tingkat pendidikan (Bachelor, High School, etc)
- `field_of_study` - Bidang studi
- `start_year` - Tahun mulai
- `end_year` - Tahun selesai (nullable)
- `description` - Deskripsi singkat
- `timestamps` - Created/Updated at

### Tabel: `skills`
- `id` - Primary key
- `name` - Nama skill
- `type` - 'soft' atau 'hard'
- `proficiency` - Level 0-100
- `timestamps` - Created/Updated at

### Tabel: `projects`
- `id` - Primary key
- `title` - Judul project
- `description` - Deskripsi lengkap
- `image_url` - URL gambar project
- `project_url` - Link ke project live (nullable)
- `github_url` - Link ke GitHub repo (nullable)
- `technologies` - JSON array teknologi yang digunakan
- `timestamps` - Created/Updated at

## 🚀 Setup & Installation

### 1. Database Configuration
Database sudah menggunakan **MySQL** dengan nama `test1_portfolio`

Konfigurasi di `.env`:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=test1_portfolio
DB_USERNAME=root
DB_PASSWORD=
```

### 2. Run Migrations & Seeders
```bash
php artisan migrate --seed
```

Atau jika menggunakan Laragon PHP:
```bash
c:\laragon\bin\php\php-8.3.30-Win32-vs16-x64\php.exe artisan migrate --seed
```

### 3. Jalankan Development Server
```bash
php artisan serve
```

Kunjungi: `http://localhost:8000`

## 📂 Project Structure

```
app/
├── Models/
│   ├── Education.php
│   ├── Skill.php
│   └── Project.php
└── Http/
    └── Controllers/
        └── PortfolioController.php

database/
├── migrations/
│   ├── 2024_02_04_000001_create_educations_table.php
│   ├── 2024_02_04_000002_create_skills_table.php
│   └── 2024_02_04_000003_create_projects_table.php
└── seeders/
    └── PortfolioSeeder.php

resources/
└── views/
    └── portfolio/
        └── index.blade.php

routes/
└── web.php

public/
├── css/
│   └── portfolio.css
└── js/
    └── portfolio.js
```

## 🎨 Styling

Design menggunakan **Bootstrap 5** dan custom CSS dengan fitur:
- Modern gradient background
- Smooth animations
- Hover effects
- Fully responsive
- Dark mode footer

### CSS Files
- `public/css/portfolio.css` - Custom styling

### Assets External
- Bootstrap 5 CDN
- Font Awesome 6 Icons
- Google Fonts (via Bootstrap)

## 🔧 API Routes

| URL | Method | Description |
|-----|--------|-------------|
| `/` | GET | Homepage - Tampilkan semua portfolio |
| `/portfolio` | GET | Homepage alias |
| `/index` | GET | Legacy route |

## 📝 Usage

### Menambah Pendidikan Baru
Edit `PortfolioSeeder.php` atau gunakan tinker:
```bash
php artisan tinker
```

```php
App\Models\Education::create([
    'institution' => 'Universitas Baru',
    'degree' => 'Master',
    'field_of_study' => 'Data Science',
    'start_year' => 2024,
    'end_year' => null,
    'description' => 'Sedang menempuh',
]);
```

### Menambah Skill
```php
App\Models\Skill::create([
    'name' => 'Python',
    'type' => 'hard',
    'proficiency' => 85,
]);
```

### Menambah Project
```php
App\Models\Project::create([
    'title' => 'Project Baru',
    'description' => 'Deskripsi project',
    'image_url' => 'https://via.placeholder.com/400x300',
    'project_url' => 'https://project-url.com',
    'github_url' => 'https://github.com/user/repo',
    'technologies' => json_encode(['Laravel', 'Vue.js']),
]);
```

## 🎯 Customization

### Mengubah Warna
Edit `public/css/portfolio.css`:
```css
:root {
    --primary-color: #007bff;        /* Ubah warna utama */
    --secondary-color: #6c757d;
    --success-color: #28a745;
    --dark-color: #212529;
}
```

### Mengubah Profile Picture
Ganti URL di `resources/views/portfolio/index.blade.php`:
```blade
<img src="GANTI_URL_FOTO_ANDA" alt="Profile" ...>
```

### Mengubah Contact Information
Edit footer section di view untuk menambah email, phone, instagram, github, discord:
```blade
<a href="mailto:email@anda.com" ...>
<a href="tel:+62..." ...>
<a href="https://instagram.com/username" ...>
```

## 🔐 Security

- Semua input dari database sudah ter-escape otomatis (Blade escaping)
- CSRF protection enabled di semua form
- Eloquent ORM melindungi dari SQL injection

## 🐛 Troubleshooting

### Database connection error
Pastikan MySQL running dan config `.env` benar

### CSS/JS tidak load
Clear browser cache: `Ctrl + Shift + Delete`

### Halaman 404
Pastikan URL yang diakses sesuai dengan routes di `routes/web.php`

## 📞 Contact

Untuk mengedit informasi kontak di footer, update section footer di:
- `resources/views/portfolio/index.blade.php`

## 📄 License

Portfolio project buatan sendiri - Feel free to customize!

---

**Dibuat dengan ❤️ menggunakan Laravel & Bootstrap**
