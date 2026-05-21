# 🚀 Cara Cepat Tambah Coding Project

## 📸 Step 1: Upload Gambar
1. Buka folder: `public/images/coding-projects/`
2. Upload screenshot/gambar project kamu (format: .jpg, .png, .gif)
3. Rename file dengan nama yang jelas, contoh: `website-sekolah.png`

---

## ✍️ Step 2: Tambah Data Project

### Cara Termudah - Via Tinker:

1. Buka terminal, jalankan:
```bash
php artisan tinker
```

2. Copy-paste template ini dan edit sesuai project kamu:
```php
App\Models\CodingProject::create([
    'title' => 'Nama Project Kamu',
    'description' => 'Deskripsi lengkap project ini. Jelaskan fitur-fitur utama, tujuan project, dan hal menarik lainnya.',
    'image_url' => 'nama-file-gambar.png',
    'demo_url' => 'https://link-demo.com',  // Kosongkan jika tidak ada: null
    'github_url' => 'https://github.com/username/repo',  // Kosongkan jika tidak ada: null
    'technologies' => json_encode(['HTML', 'CSS', 'JavaScript']),  // Ganti dengan teknologi yang kamu pakai
    'category' => 'web',  // Pilihan: web, mobile, desktop, game
    'year' => 2024,  // Tahun pembuatan
    'order' => 1,  // Urutan tampilan (1 = paling atas)
]);
```

3. Tekan Enter
4. Ketik `exit` untuk keluar dari tinker

---

## 🔄 Step 3: Clear Cache

Jalankan di terminal:
```bash
php artisan cache:clear && php artisan view:clear
```

---

## 🎉 Step 4: Cek Hasilnya!

Buka browser dan refresh halaman portfolio kamu. Scroll ke section "Coding Projects" (Section 05).

---

## 📝 Contoh Lengkap

```php
App\Models\CodingProject::create([
    'title' => 'Website Portfolio Pribadi',
    'description' => 'Website portfolio pribadi dengan desain modern menggunakan Laravel dan Tailwind CSS. Fitur: About Me, Skills, Projects Gallery, Testimonials, dan Guestbook.',
    'image_url' => 'portfolio-website.png',
    'demo_url' => 'https://raffanurmusyaffa.com',
    'github_url' => 'https://github.com/Rapsskuyy/portfolio',
    'technologies' => json_encode(['Laravel', 'PHP', 'MySQL', 'Tailwind CSS', 'JavaScript']),
    'category' => 'web',
    'year' => 2024,
    'order' => 1,
]);
```

---

## 🎯 Tips

- **Deskripsi**: Tulis minimal 2-3 kalimat yang jelas
- **Gambar**: Gunakan screenshot yang menarik dan jelas
- **Teknologi**: Sebutkan semua teknologi utama yang dipakai
- **Urutan**: Project terbaik/terbaru kasih order = 1
- **Demo URL**: Jika tidak ada, tulis `null` (tanpa tanda kutip)
- **GitHub URL**: Jika tidak ada, tulis `null` (tanpa tanda kutip)

---

## ❓ Butuh Bantuan?

Kalau ada error atau bingung, tinggal tanya aja! 🚀
