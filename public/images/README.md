# 📁 Folder Gambar Portfolio

## Struktur Folder

```
public/images/
├── profile/          # Foto profil Anda
├── projects/         # Gambar project/galeri
└── testimonials/     # Foto testimonial (opsional)
```

## 📸 Cara Upload Gambar

### 1. **Foto Profil**
- Letakkan di: `public/images/profile/`
- Nama file: `raffa.jpg` atau `profile.jpg`
- Ukuran rekomendasi: 500x500px (square)
- Format: JPG, PNG

**Contoh:**
```
public/images/profile/raffa.jpg
```

### 2. **Gambar Project/Galeri**
- Letakkan di: `public/images/projects/`
- Nama file: bebas (sesuai nama project)
- Ukuran rekomendasi: 1200x800px (landscape)
- Format: JPG, PNG

**Contoh:**
```
public/images/projects/project1.jpg
public/images/projects/website-sekolah.jpg
public/images/projects/aplikasi-kasir.png
```

### 3. **Foto Testimonial** (Opsional)
- Letakkan di: `public/images/testimonials/`
- Nama file: bebas
- Ukuran rekomendasi: 200x200px (square)
- Format: JPG, PNG

**Contoh:**
```
public/images/testimonials/client1.jpg
public/images/testimonials/john-doe.jpg
```

## 🔧 Update Path di Database

Setelah upload gambar, update path di database:

### Untuk Profile:
Update di view: `resources/views/portfolio/index.blade.php`
```blade
<img src="{{ asset('images/profile/raffa.jpg') }}" alt="Raffa">
```

### Untuk Projects:
Update di database tabel `projects` kolom `image_url`:
```
images/projects/nama-file.jpg
```

### Untuk Testimonials:
Update di database tabel `testimonials` kolom `image_url`:
```
images/testimonials/nama-file.jpg
```

## 📝 Tips

1. **Compress gambar** sebelum upload untuk performa lebih baik
2. **Gunakan nama file yang jelas** (tanpa spasi, gunakan dash/underscore)
3. **Format JPG** untuk foto, **PNG** untuk gambar dengan transparansi
4. **Backup gambar** di folder lain juga

## 🚀 Alternatif: Gunakan Storage Laravel

Jika ingin menggunakan storage Laravel (lebih aman):

1. Upload ke: `storage/app/public/`
2. Jalankan: `php artisan storage:link`
3. Akses via: `{{ asset('storage/nama-file.jpg') }}`

---

**Note:** Folder `public/images/` bisa diakses langsung via browser:
```
http://localhost:8000/images/profile/raffa.jpg
```
