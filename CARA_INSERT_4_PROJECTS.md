# 🚀 Cara Insert 4 Projects Kamu

## Step 1: Buka Terminal
```bash
php artisan tinker
```

## Step 2: Copy-Paste Command Ini (Satu per Satu)

### Project 1: 3D Modeling Ruang Kelas
```php
App\Models\CodingProject::create(['title' => '3D Modeling Ruang Kelas', 'description' => 'Modeling 3D barang-barang yang ada di kelas seperti meja, bangku, papan tulis, lemari, buku, dan vas bunga. Dibuat dengan detail untuk simulasi ruang kelas yang realistis.', 'image_url' => 'kelas.png', 'demo_url' => null, 'github_url' => null, 'technologies' => json_encode(['3D Modeling', 'Blender']), 'category' => 'design', 'year' => 2024, 'order' => 1]);
```

### Project 2: 3D Modeling Pedang
```php
App\Models\CodingProject::create(['title' => '3D Modeling Pedang', 'description' => 'Modeling 3D pedang dengan detail tekstur dan material yang realistis. Project ini menunjukkan kemampuan dalam membuat objek 3D dengan detail yang kompleks.', 'image_url' => 'pedang.png', 'demo_url' => null, 'github_url' => null, 'technologies' => json_encode(['3D Modeling', 'Blender']), 'category' => 'design', 'year' => 2024, 'order' => 2]);
```

### Project 3: UI/UX Design Portfolio Website
```php
App\Models\CodingProject::create(['title' => 'UI/UX Design Portfolio Website', 'description' => 'Design UI/UX untuk website portfolio pribadi pertama saya. Dibuat menggunakan Figma dengan fokus pada user experience dan tampilan yang modern dan menarik.', 'image_url' => 'porto1.png', 'demo_url' => null, 'github_url' => null, 'technologies' => json_encode(['Figma', 'UI/UX Design']), 'category' => 'design', 'year' => 2024, 'order' => 3]);
```

### Project 4: UI/UX Design Web Kursus PT Komari
```php
App\Models\CodingProject::create(['title' => 'UI/UX Design Web Kursus PT Komari', 'description' => 'Design UI/UX untuk website kursus PT Komari. Design ini mencakup halaman landing, katalog kursus, dan sistem pendaftaran dengan interface yang user-friendly.', 'image_url' => 'web1.png', 'demo_url' => null, 'github_url' => null, 'technologies' => json_encode(['Figma', 'UI/UX Design']), 'category' => 'design', 'year' => 2024, 'order' => 4]);
```

## Step 3: Keluar dari Tinker
```bash
exit
```

## Step 4: Clear Cache
```bash
php artisan cache:clear && php artisan view:clear
```

## Step 5: Refresh Browser! 🎉

Scroll ke section "My Projects" (Section 05) dan lihat hasilnya!

---

## ✅ Yang Sudah Aku Update:

1. ✅ Section title diubah dari "Coding Projects" → "My Projects"
2. ✅ Subtitle diubah jadi: "Project 3D Modeling, UI/UX Design, dan Programming dari kelas 10 hingga sekarang"
3. ✅ Cache sudah di-clear
4. ✅ Command insert sudah siap

---

## 📝 Detail 4 Projects:

| No | Gambar | Judul | Kategori | Teknologi |
|----|--------|-------|----------|-----------|
| 1 | kelas.png | 3D Modeling Ruang Kelas | Design | 3D Modeling, Blender |
| 2 | pedang.png | 3D Modeling Pedang | Design | 3D Modeling, Blender |
| 3 | porto1.png | UI/UX Design Portfolio Website | Design | Figma, UI/UX Design |
| 4 | web1.png | UI/UX Design Web Kursus PT Komari | Design | Figma, UI/UX Design |

---

**Tinggal jalanin command di atas, terus refresh browser! 🚀**
