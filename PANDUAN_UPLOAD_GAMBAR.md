# 📸 Panduan Upload Gambar Portfolio

## 📁 Struktur Folder

```
portfolio/
├── public/
│   └── images/
│       ├── profile/          ← Foto profil Anda
│       ├── projects/         ← Gambar project/galeri
│       └── testimonials/     ← Foto testimonial (opsional)
│
└── storage/
    └── app/
        └── public/
            ├── profile/      ← Alternatif foto profil
            ├── projects/     ← Alternatif gambar project
            └── testimonials/ ← Alternatif foto testimonial
```

---

## 🎯 Cara Upload Gambar

### **Opsi 1: Upload ke `public/images/` (RECOMMENDED)**

#### ✅ Kelebihan:
- Langsung bisa diakses
- Tidak perlu symbolic link
- Lebih mudah untuk development

#### 📍 Lokasi:
```
C:\laragon\www\test1 - Copy\public\images\
```

#### 📝 Cara Upload:

**1. Foto Profil:**
```
Letakkan di: public/images/profile/raffa.jpg
Ukuran: 500x500px (square)
Format: JPG atau PNG
```

**2. Gambar Project:**
```
Letakkan di: public/images/projects/
Contoh:
  - public/images/projects/website-sekolah.jpg
  - public/images/projects/aplikasi-kasir.jpg
  - public/images/projects/sistem-inventory.png

Ukuran: 1200x800px (landscape) atau 800x1200px (portrait)
Format: JPG atau PNG
```

**3. Foto Testimonial (Opsional):**
```
Letakkan di: public/images/testimonials/
Contoh:
  - public/images/testimonials/client1.jpg
  - public/images/testimonials/john-doe.jpg

Ukuran: 200x200px (square)
Format: JPG atau PNG
```

---

### **Opsi 2: Upload ke `storage/app/public/`**

#### ✅ Kelebihan:
- Lebih aman (tidak langsung accessible)
- Best practice Laravel
- Bisa dikontrol permission

#### 📍 Lokasi:
```
C:\laragon\www\test1 - Copy\storage\app\public\
```

#### 📝 Cara Upload:

**1. Upload gambar ke folder:**
```
storage/app/public/profile/raffa.jpg
storage/app/public/projects/project1.jpg
storage/app/public/testimonials/client1.jpg
```

**2. Buat symbolic link (WAJIB):**
```bash
php artisan storage:link
```

**3. Gambar akan accessible via:**
```
http://localhost:8000/storage/profile/raffa.jpg
http://localhost:8000/storage/projects/project1.jpg
```

---

## 🗄️ Update Database

### **1. Update Foto Profil**

Foto profil sudah otomatis terdeteksi di:
```blade
{{ asset('images/profile/raffa.jpg') }}
```

Jika tidak ada, akan fallback ke:
```blade
{{ asset('storage/profile/raffa.jpg') }}
```

### **2. Update Gambar Project**

Masuk ke database tabel `projects`, update kolom `image_url`:

**Jika pakai `public/images/`:**
```sql
UPDATE projects 
SET image_url = 'images/projects/nama-file.jpg' 
WHERE id = 1;
```

**Jika pakai `storage/`:**
```sql
UPDATE projects 
SET image_url = 'projects/nama-file.jpg' 
WHERE id = 1;
```

**Atau via Laravel Tinker:**
```bash
php artisan tinker
```
```php
$project = App\Models\Project::find(1);
$project->image_url = 'images/projects/nama-file.jpg';
$project->save();
```

### **3. Update Foto Testimonial**

Masuk ke database tabel `testimonials`, update kolom `image_url`:

```sql
UPDATE testimonials 
SET image_url = 'images/testimonials/client1.jpg' 
WHERE id = 1;
```

---

## 🎨 Rekomendasi Ukuran Gambar

| Jenis | Ukuran | Rasio | Format |
|-------|--------|-------|--------|
| **Foto Profil** | 500x500px | 1:1 (Square) | JPG/PNG |
| **Project (Landscape)** | 1200x800px | 3:2 | JPG/PNG |
| **Project (Portrait)** | 800x1200px | 2:3 | JPG/PNG |
| **Project (Square)** | 1000x1000px | 1:1 | JPG/PNG |
| **Testimonial** | 200x200px | 1:1 (Square) | JPG/PNG |

---

## 🛠️ Tools untuk Resize/Compress Gambar

### Online (Gratis):
1. **TinyPNG** - https://tinypng.com/ (Compress)
2. **Squoosh** - https://squoosh.app/ (Compress + Resize)
3. **Canva** - https://canva.com/ (Resize + Edit)
4. **Photopea** - https://photopea.com/ (Edit seperti Photoshop)

### Software:
1. **Paint.NET** (Windows)
2. **GIMP** (Cross-platform)
3. **IrfanView** (Windows)

---

## 📋 Checklist Upload

- [ ] Compress gambar (max 500KB per file)
- [ ] Rename file tanpa spasi (gunakan dash `-` atau underscore `_`)
- [ ] Upload ke folder yang sesuai
- [ ] Update database jika perlu
- [ ] Test di browser
- [ ] Backup gambar original

---

## 🚀 Quick Start

### Upload Foto Profil:
```bash
# 1. Copy foto ke folder
copy foto-anda.jpg public/images/profile/raffa.jpg

# 2. Refresh browser
# Foto langsung muncul!
```

### Upload Gambar Project:
```bash
# 1. Copy gambar ke folder
copy project1.jpg public/images/projects/website-sekolah.jpg

# 2. Update database
php artisan tinker
```
```php
$project = App\Models\Project::find(1);
$project->image_url = 'images/projects/website-sekolah.jpg';
$project->save();
exit
```

```bash
# 3. Refresh browser
```

---

## ❓ Troubleshooting

### Gambar tidak muncul?

**1. Cek path file:**
```
Pastikan file ada di:
public/images/profile/raffa.jpg
```

**2. Cek permission (Linux/Mac):**
```bash
chmod -R 755 public/images/
```

**3. Cek database:**
```sql
SELECT image_url FROM projects;
```

**4. Clear cache:**
```bash
php artisan cache:clear
php artisan view:clear
```

**5. Cek di browser:**
```
http://localhost:8000/images/profile/raffa.jpg
```

### Gambar terlalu besar?

Compress dulu sebelum upload:
- Target: < 500KB per file
- Quality: 80-85%
- Tools: TinyPNG atau Squoosh

---

## 📞 Support

Jika ada masalah, cek:
1. Path file sudah benar?
2. Database sudah diupdate?
3. Cache sudah di-clear?
4. File extension lowercase? (.jpg bukan .JPG)

---

**Happy Uploading! 🎉**
