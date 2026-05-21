# 📂 Struktur Folder Portfolio

## 🗂️ Struktur Lengkap

```
portfolio/
│
├── 📁 app/
│   ├── Http/
│   │   └── Controllers/
│   │       ├── PortfolioController.php    # Controller utama portfolio
│   │       ├── DashboardController.php    # Controller admin dashboard
│   │       └── GuestBookController.php    # Controller guestbook
│   │
│   └── Models/
│       ├── Project.php                    # Model untuk project/galeri
│       ├── Education.php                  # Model untuk pendidikan
│       ├── Skill.php                      # Model untuk skills
│       ├── Testimonial.php                # Model untuk testimonial
│       └── GuestBook.php                  # Model untuk guestbook
│
├── 📁 public/
│   ├── css/
│   │   └── portfolio.css                  # ✨ CSS utama (REDESIGNED)
│   │
│   ├── js/
│   │   └── portfolio.js                   # ✨ JavaScript utama (REDESIGNED)
│   │
│   └── images/                            # 📸 FOLDER GAMBAR ANDA
│       ├── profile/                       # ← Upload foto profil di sini
│       │   ├── raffa.jpg                  # Foto profil utama
│       │   └── .gitkeep
│       │
│       ├── projects/                      # ← Upload gambar project di sini
│       │   ├── project1.jpg
│       │   ├── project2.jpg
│       │   └── .gitkeep
│       │
│       ├── testimonials/                  # ← Upload foto testimonial di sini
│       │   └── .gitkeep
│       │
│       ├── .gitignore
│       └── README.md                      # Panduan upload gambar
│
├── 📁 resources/
│   └── views/
│       └── portfolio/
│           └── index.blade.php            # ✨ View utama (REDESIGNED)
│
├── 📁 routes/
│   └── web.php                            # Routes aplikasi
│
├── 📁 storage/
│   └── app/
│       └── public/                        # Alternatif folder gambar
│           ├── profile/
│           ├── projects/
│           └── testimonials/
│
├── 📁 database/
│   ├── migrations/                        # File migrasi database
│   └── seeders/                           # File seeder
│
├── 📄 PANDUAN_UPLOAD_GAMBAR.md           # 📖 Panduan lengkap upload gambar
├── 📄 STRUKTUR_FOLDER.md                 # 📖 File ini
└── 📄 README.md                           # Dokumentasi project

```

---

## 📸 Folder Gambar (PENTING!)

### **public/images/** - Folder Utama Gambar

```
public/images/
├── profile/          # Foto profil Anda
│   └── raffa.jpg     # Nama file harus: raffa.jpg
│
├── projects/         # Gambar project/galeri
│   ├── project1.jpg
│   ├── project2.jpg
│   └── ...
│
└── testimonials/     # Foto testimonial (opsional)
    ├── client1.jpg
    └── ...
```

#### 🎯 Cara Upload:

1. **Foto Profil:**
   - Copy foto ke: `public/images/profile/raffa.jpg`
   - Ukuran: 500x500px (square)

2. **Gambar Project:**
   - Copy gambar ke: `public/images/projects/`
   - Update database kolom `image_url` dengan: `images/projects/nama-file.jpg`

3. **Foto Testimonial:**
   - Copy foto ke: `public/images/testimonials/`
   - Update database kolom `image_url` dengan: `images/testimonials/nama-file.jpg`

---

## 🎨 File yang Sudah Diredesign

### ✨ **1. resources/views/portfolio/index.blade.php**
**Perubahan:**
- Sidebar navigation dengan dots
- Hero fullscreen split layout
- Bento box grid untuk about
- Circular progress untuk skills
- Masonry layout untuk gallery
- Horizontal timeline untuk experience
- Carousel slider untuk testimonials
- Chat interface untuk guestbook
- Modal popup untuk form

### ✨ **2. public/css/portfolio.css**
**Perubahan:**
- Dark theme dengan purple/pink gradient
- Modern typography (Poppins font)
- Smooth animations
- Responsive design (mobile-first)
- Glassmorphism effects
- Custom scrollbar
- Hover effects
- Print styles

### ✨ **3. public/js/portfolio.js**
**Perubahan:**
- Sidebar navigation active state
- Role rotator animation
- Circular progress animation
- Testimonial slider
- Scroll animations
- Modal functions
- Form enhancements
- Character counter

---

## 🗄️ Database Tables

### **1. projects**
```sql
- id
- title
- description
- image_url          # Path: images/projects/nama-file.jpg
- project_url
- github_url
- technologies
- created_at
- updated_at
```

### **2. educations**
```sql
- id
- institution
- degree
- field_of_study
- start_year
- end_year
- description
- created_at
- updated_at
```

### **3. skills**
```sql
- id
- name
- type               # 'soft' atau 'hard'
- proficiency        # 0-100
- created_at
- updated_at
```

### **4. testimonials**
```sql
- id
- name
- email
- position
- message
- rating             # 1-5
- image_url          # Path: images/testimonials/nama-file.jpg
- is_approved        # true/false
- created_at
- updated_at
```

### **5. guest_books**
```sql
- id
- name
- email
- message
- created_at
- updated_at
```

---

## 🚀 Quick Start

### 1. Upload Gambar
```bash
# Copy foto profil
copy foto-anda.jpg public/images/profile/raffa.jpg

# Copy gambar project
copy project1.jpg public/images/projects/website-sekolah.jpg
```

### 2. Update Database
```bash
php artisan tinker
```
```php
# Update project image
$project = App\Models\Project::find(1);
$project->image_url = 'images/projects/website-sekolah.jpg';
$project->save();
```

### 3. Clear Cache
```bash
php artisan cache:clear
php artisan view:clear
```

### 4. Run Server
```bash
php artisan serve
```

### 5. Open Browser
```
http://localhost:8000
```

---

## 📋 Checklist Setup

- [ ] Upload foto profil ke `public/images/profile/raffa.jpg`
- [ ] Upload gambar project ke `public/images/projects/`
- [ ] Update database `projects` table
- [ ] Upload foto testimonial (opsional)
- [ ] Clear cache Laravel
- [ ] Test di browser
- [ ] Test responsive (mobile)
- [ ] Backup semua gambar

---

## 🔧 Maintenance

### Update Gambar:
1. Replace file di folder `public/images/`
2. Clear cache: `php artisan cache:clear`
3. Refresh browser (Ctrl+F5)

### Tambah Project Baru:
1. Upload gambar ke `public/images/projects/`
2. Insert ke database:
```php
App\Models\Project::create([
    'title' => 'Nama Project',
    'description' => 'Deskripsi project',
    'image_url' => 'images/projects/nama-file.jpg'
]);
```

### Backup:
```bash
# Backup gambar
xcopy public\images backup\images /E /I

# Backup database
php artisan db:backup
```

---

## 📞 Support

Jika ada masalah:
1. Cek `PANDUAN_UPLOAD_GAMBAR.md`
2. Cek path file sudah benar
3. Clear cache Laravel
4. Cek permission folder (Linux/Mac)

---

**Happy Coding! 🎉**
