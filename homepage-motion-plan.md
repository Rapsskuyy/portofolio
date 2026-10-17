# Homepage Motion & Hero Refinement Plan

## Tujuan

Mempertahankan identitas visual homepage yang sekarang (navy/indigo, split hero, foto profil, floating badges, tools), lalu menambahkan splash loading yang ringan, scroll reveal yang terarah, dan transisi visual antar-section. Paragraf panjang di hero dihapus karena penjelasan personal dipusatkan di About Me.

## Hasil audit saat ini

- Homepage aktif berada di `resources/views/portfolio/index.blade.php`, dirender melalui `PortfolioController@index`.
- Hero saat ini sudah punya struktur identitas yang kuat: greeting, nama, role rotator, CTA, tools di kiri; foto profil dan tiga badge di kanan.
- `.hero-description` terlalu panjang untuk above-the-fold dan mengulang informasi yang lebih tepat berada di `resources/views/portfolio/about.blade.php`.
- Setelah paragraf dihapus, spacing antara role, CTA, dan tools perlu dirapatkan agar hero tidak terasa kosong.
- Foto profil adalah anchor utama dan tidak perlu diganti. Audit implementasi harus memastikan wrapper/badge tidak clipping di desktop, tablet, dan mobile.
- `public/js/portfolio.js` sudah memiliki reduced-motion check, smooth anchor scroll, active navigation, role rotator, IntersectionObserver reveal, scroll-indicator fade, dan hero parallax. Motion baru harus memperluas pola ini, bukan menambah library.
- `static-site/build.mjs` menyalin `public` dan HTML hasil render; tidak perlu diubah untuk fitur ini, tetapi hasil static export harus diverifikasi.

## Rencana implementasi

### 1. Rapikan hero homepage

- File: `resources/views/portfolio/index.blade.php`.
- Hapus hanya elemen `.hero-description` dari hero homepage.
- Pertahankan greeting, nama, role rotator, empat CTA, tools, foto, dan floating badges.
- Tambahkan hook motion seperlunya pada hero content/image dan section utama tanpa mengganti komposisi visual.
- Detail biografi tetap dipertahankan di About Me.

### 2. Tambahkan splash loading screen

- File: `resources/views/portfolio/index.blade.php`, `public/css/portfolio.css`, `public/js/portfolio.js`.
- Tambahkan overlay bernamespace `.portfolio-splash` sebelum `.main-content`, memakai identitas yang sama: “Hello” lalu nama, tanpa audio/autoplay.
- Tampilkan sekitar 900–1200 ms dan sediakan tombol Skip yang dapat diklik atau difokuskan dengan keyboard.
- Simpan status selesai di `sessionStorage` agar tidak mengganggu setiap reload/navigasi dalam satu sesi.
- Lepaskan body lock setelah selesai; jika JavaScript gagal, konten tetap dapat terlihat dan splash tidak boleh menjadi blocker.
- Saat `prefers-reduced-motion: reduce`, tampilkan konten langsung atau gunakan fade minimal.

### 3. Perkuat scroll reveal secara hemat

- File: `public/js/portfolio.js` dan `public/css/portfolio.css`.
- Reuse IntersectionObserver yang sudah ada; tambahkan target terbatas: hero content/image, judul About, kartu intro, gallery/project cards, dan contact block.
- Gunakan opacity + `transform` ringan (`translateY`/scale kecil), one-shot observer, dan root margin yang mulai sedikit sebelum viewport.
- Jangan menganimasikan setiap child atau mengubah layout saat scroll.
- Sediakan CSS fallback/reduced-motion agar semua konten langsung terlihat.

### 4. Buat transisi antar-section yang tetap native

- Pertahankan native scrolling dan smooth anchor yang sudah ada; jangan memakai scroll hijacking atau full-page snap.
- Gunakan overlap/panel/gradient yang sudah sesuai visual sebagai transisi, ditambah fade/translate kecil ketika hero keluar dan About masuk.
- Pastikan semua target section memiliki `scroll-margin-top` yang cukup agar tidak tertutup sidebar/mobile navigation.
- Page transition antar-route berbeda tidak dimasukkan ke fase ini; bila dibutuhkan, buat fase terpisah dengan View Transitions API dan fallback CSS.

### 5. Audit responsive foto dan spacing

- File: `public/css/portfolio.css`.
- Sesuaikan spacing setelah paragraf dihapus pada desktop, tablet, dan mobile.
- Verifikasi hero image wrapper, aspect ratio, opacity mobile, dan posisi badge agar tidak terpotong atau menabrak CTA.
- Pertahankan breakpoint yang sudah menjadi standar proyek: mobile <=768px, tablet 769–1199px, desktop >=1200px.

### 6. Uji dan validasi

- Backend render: homepage tetap `200`, `.hero-description` tidak lagi dirender di homepage, About tetap memuat penjelasan.
- Interaksi: splash muncul sesuai aturan session, Skip bekerja dengan mouse dan keyboard, anchor scroll tetap benar, role rotator tidak mengganggu layout.
- Accessibility: focus terlihat, tombol splash memiliki label, reduced-motion menonaktifkan animasi dekoratif, konten tidak terkunci saat JS gagal.
- Responsive: cek desktop, tablet/iPad, dan mobile; pastikan foto tidak clipping dan tidak ada horizontal overflow.
- Static export: jalankan build yang ada, pastikan markup splash, CSS, dan JS ikut tercopy; jangan mengubah `static-site/build.mjs` kecuali verifikasi menemukan kebutuhan nyata.
- Quality gate: `git diff --check`, focused Laravel feature test/e2e terkait portfolio, dan Lighthouse desktop/mobile setelah implementasi.
- Deployment dilakukan hanya setelah review hasil lokal; urutan produksi tetap backend ready lalu static redeploy agar snapshot tidak tertinggal.

## Batasan yang dipertahankan

- Tidak menambah dependency animasi.
- Tidak mengganti foto atau identitas visual utama.
- Tidak menambah paragraf baru di hero.
- Tidak mengubah route admin, Supabase, DNS, atau deployment pada fase implementasi ini.
