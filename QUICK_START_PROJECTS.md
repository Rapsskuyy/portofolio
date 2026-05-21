# ⚡ Quick Start: Tambah Coding Project (5 Menit!)

## 🎯 3 Langkah Mudah

### 1️⃣ Upload Gambar (1 menit)
```
📁 Buka folder: public/images/coding-projects/
📸 Upload screenshot project kamu
✏️ Rename: website-sekolah.png (contoh)
```

### 2️⃣ Tambah Data (2 menit)
```bash
# Buka terminal, ketik:
php artisan tinker
```

```php
# Copy-paste ini, edit yang di dalam 'tanda petik':
App\Models\CodingProject::create([
    'title' => 'Website Sekolah',
    'description' => 'Website profil sekolah dengan fitur berita dan galeri foto.',
    'image_url' => 'website-sekolah.png',
    'demo_url' => 'https://smkn1depok.sch.id',
    'github_url' => 'https://github.com/username/repo',
    'technologies' => json_encode(['HTML', 'CSS', 'JavaScript', 'PHP']),
    'category' => 'web',
    'year' => 2024,
    'order' => 1,
]);
```

```bash
# Ketik exit untuk keluar
exit
```

### 3️⃣ Clear Cache & Cek (1 menit)
```bash
php artisan cache:clear && php artisan view:clear
```

Buka browser → Refresh → Scroll ke "Coding Projects" → DONE! 🎉

---

## 📝 Field Explanation

| Field | Isi Apa? | Wajib? | Contoh |
|-------|----------|--------|--------|
| **title** | Nama project | ✅ Ya | `'Website Sekolah'` |
| **description** | Deskripsi singkat | ✅ Ya | `'Website profil sekolah...'` |
| **image_url** | Nama file gambar | ✅ Ya | `'website-sekolah.png'` |
| **demo_url** | Link demo online | ❌ Tidak | `'https://...'` atau `null` |
| **github_url** | Link GitHub repo | ❌ Tidak | `'https://github.com/...'` atau `null` |
| **technologies** | Array teknologi | ❌ Tidak | `json_encode(['PHP', 'JS'])` |
| **category** | Jenis project | ❌ Tidak | `'web'`, `'mobile'`, `'game'` |
| **year** | Tahun buat | ❌ Tidak | `2024` |
| **order** | Urutan tampil | ❌ Tidak | `1` (paling atas) |

---

## 💡 Tips Cepat

### Kalau Tidak Ada Demo/GitHub:
```php
'demo_url' => null,      // Tulis null (tanpa petik)
'github_url' => null,    // Tulis null (tanpa petik)
```

### Kalau Tidak Tahu Teknologi:
```php
'technologies' => json_encode(['HTML', 'CSS', 'JavaScript']),  // Default web
```

### Kalau Tidak Tahu Category:
```php
'category' => 'web',  // Default web
```

---

## 🔥 Contoh Super Cepat (Copy-Paste Ready!)

### Project 1: Website Sederhana
```php
App\Models\CodingProject::create(['title' => 'Website Profil', 'description' => 'Website profil pribadi dengan HTML dan CSS.', 'image_url' => 'website-profil.png', 'demo_url' => null, 'github_url' => null, 'technologies' => json_encode(['HTML', 'CSS', 'JavaScript']), 'category' => 'web', 'year' => 2024, 'order' => 1]);
```

### Project 2: Aplikasi Kasir
```php
App\Models\CodingProject::create(['title' => 'Aplikasi Kasir', 'description' => 'Aplikasi kasir sederhana untuk toko dengan PHP dan MySQL.', 'image_url' => 'aplikasi-kasir.png', 'demo_url' => null, 'github_url' => null, 'technologies' => json_encode(['PHP', 'MySQL', 'Bootstrap']), 'category' => 'web', 'year' => 2024, 'order' => 2]);
```

### Project 3: Game Sederhana
```php
App\Models\CodingProject::create(['title' => 'Game Tebak Angka', 'description' => 'Game tebak angka menggunakan JavaScript.', 'image_url' => 'game-tebak.png', 'demo_url' => null, 'github_url' => null, 'technologies' => json_encode(['HTML', 'CSS', 'JavaScript']), 'category' => 'game', 'year' => 2023, 'order' => 3]);
```

---

## ❓ Troubleshooting

### Error: "Class 'App\Models\CodingProject' not found"
```bash
composer dump-autoload
php artisan cache:clear
```

### Gambar Tidak Muncul?
- Cek nama file di `image_url` sama dengan file di folder
- Cek file ada di: `public/images/coding-projects/`
- Clear cache: `php artisan cache:clear`

### Data Tidak Muncul?
```bash
# Clear cache dulu
php artisan cache:clear && php artisan view:clear

# Refresh browser (Ctrl + F5)
```

---

## 🎯 Checklist

- [ ] Upload gambar ke `public/images/coding-projects/`
- [ ] Buka terminal: `php artisan tinker`
- [ ] Copy-paste template, edit data
- [ ] Tekan Enter
- [ ] Ketik `exit`
- [ ] Clear cache: `php artisan cache:clear && php artisan view:clear`
- [ ] Refresh browser
- [ ] Cek section "Coding Projects"
- [ ] DONE! 🎉

---

## 📚 Butuh Panduan Lengkap?

- **Quick Start**: File ini (QUICK_START_PROJECTS.md)
- **Detail Lengkap**: PANDUAN_CODING_PROJECTS.md
- **Step by Step**: CARA_TAMBAH_PROJECT.md
- **Status & Info**: STATUS_CODING_PROJECTS.md

---

**Selamat mencoba! 🚀**
