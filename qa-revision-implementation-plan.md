# QA Revision Implementation Plan — Homepage Portfolio

## Tujuan

Menindaklanjuti hasil QA pada mobile, iPad, desktop, sidebar, transisi, footer, project list, dan skills tanpa mengubah identitas utama portfolio. Arah tetap dark navy/indigo dengan foto asli, Poppins, dan motion yang fungsional sesuai `DESIGN.md` serta rules `dapur/`.

## QA tambahan — splash reference dan performa

Referensi `https://jtakizawa.my.id/` memakai splash sebagai lapisan pembuka identitas: greeting singkat, nama/brand, dan kontrol Skip yang jelas sebelum hero terlihat. Pola yang diambil hanya alur orientasinya, bukan menyalin layout, audio, atau aset referensi.

Audit implementasi saat ini menemukan alasan splash bisa tidak terlihat di local:

- `sessionStorage` menyimpan `portfolio-splash-complete`, sehingga reload berikutnya memang melewati splash.
- `prefers-reduced-motion: reduce` sengaja melewati splash agar tidak memaksa motion.
- Jika JavaScript gagal, CSS default membuat overlay hidden supaya konten tetap dapat diakses.
- Preview lokal sebelumnya juga dapat gagal render karena koneksi Supabase environment, bukan karena splash.

Rencana splash revisi:

- Tetap namespace `.portfolio-splash` dan letakkan overlay sebelum `.main-content`.
- Tampilkan hanya pada first visit per session, dengan durasi pendek sekitar 800–1200 ms dan Skip/Escape.
- Tambahkan mekanisme QA-only yang tidak masuk production behavior, misalnya query flag lokal atau tombol reset session yang hanya tersedia saat development; jangan menghapus session guard untuk pengguna biasa.
- Splash harus tetap ringan: tidak memakai video, audio autoplay, font baru, gambar tambahan, library animasi, atau request jaringan baru.
- Gunakan CSS opacity/visibility dan transform sederhana; jangan menahan LCP lebih lama dari durasi splash.
- Cegah FOUC: siapkan bootstrap splash yang sangat kecil sebelum stylesheet/hero paint untuk menentukan apakah splash boleh aktif (session guard, reduced-motion, dan flag QA). Jika bootstrap atau JS gagal, default harus langsung non-blocking; gunakan fallback `<noscript>`/CSS yang tidak menutupi konten.
- Sediakan flag QA lokal yang terdokumentasi, misalnya `?qa_splash=1`, untuk mengabaikan session guard hanya saat pengujian. Flag ini tidak boleh mengubah perilaku production normal atau tersimpan sebagai state pengguna.
- Konten utama tetap tersedia jika JavaScript gagal, storage diblokir, browser reduced-motion, atau asset gagal dimuat.
- Background harus inert selama splash, fokus keyboard tetap di kontrol Skip, lalu state inert dipulihkan setelah dismiss.
- Ukur dampak dengan Lighthouse dan Performance panel; splash tidak boleh menambah request blocking atau menurunkan LCP/CLS secara berarti.

## Temuan QA yang menjadi dasar

- Mobile dan iPad masih memakai pola hero cover/background yang membuat foto terlalu gelap, tools dan badge hilang, serta ruang layar terasa kosong.
- Desktop terasa terlalu renggang: nama kurang dominan, foto terlalu jauh ke kanan, dan tools kurang terlihat.
- Sidebar masih terasa seperti rail titik yang kaku.
- Reveal sudah ada, tetapi belum memberi rasa transisi fade antar-section yang cukup.
- Footer masih terasa seperti grid template tiga kolom.
- My Projects masih menampilkan terlalu banyak kartu sekaligus.
- Soft dan hard skills memakai circular chart besar yang membuat section terasa hampa.

## File yang kemungkinan berubah

- `resources/views/portfolio/index.blade.php`
- `public/css/portfolio.css`
- `public/js/portfolio.js`
- `tests/Feature/PublicPortfolioSafetyTest.php`
- suite e2e portfolio yang relevan bila selector baru memerlukan coverage tambahan

`static-site/build.mjs` hanya disentuh jika verifikasi static export membuktikan kebutuhan nyata.

## Tahap implementasi

### Fase 1 — Hero desktop lebih dekat dan tegas

- Ubah komposisi `.hero-split-container` menjadi rasio sekitar 55% teks dan 45% visual, tanpa absolute positioning kasar.
- Besarkan `.hero-name` secara fluid dengan `clamp`, target sekitar 64–78px di desktop, tetap dua baris dan tidak menabrak role.
- Geser `.hero-image-wrapper` sedikit ke arah tengah menggunakan alignment/margin/transform yang dibatasi.
- Pertahankan ukuran foto sekitar 450–500px agar wajah lebih hadir tetapi tidak mengambil alih hero.
- Tingkatkan keterbacaan `.hero-tech-stack`: label tetap kecil, icon tetap sekitar 48–52px, opacity/mask tidak terlalu redup, dan visual awal dibatasi sekitar 6–7 icon.
- Hindari endless marquee tanpa fungsi; bila marquee dipertahankan, hormati reduced-motion dan jangan membuat tools menjadi pusat perhatian.

### Fase 2 — Hero mobile dan iPad sebagai layout berbeda

#### Mobile

- Ubah hero menjadi alur vertikal: greeting → nama → role → CTA → portrait → tools ringkas.
- Refaktor DOM secara eksplisit: pindahkan `.hero-tech-stack` menjadi anak langsung `.hero-split-container` (selevel dengan `.hero-left` dan `.hero-right`) agar urutan mobile benar-benar dapat diatur dengan CSS grid/flex. Jangan mengandalkan `order` pada elemen yang masih berada di parent berbeda atau `display: contents` yang meratakan seluruh isi `.hero-content`.
- Foto menjadi portrait card yang terlihat jelas dengan `object-position: center`, bukan background full-screen gelap.
- Floating badge berubah menjadi chip/row kecil di sekitar atau di bawah foto agar tidak clipping.
- CTA utama full-width; CTA lain tetap memiliki target minimum 44px dan gap yang aman.
- Tools menjadi horizontal strip yang dapat disentuh/di-scroll, bukan disembunyikan.
- Pertahankan bottom nav dan reserve safe-area agar konten terakhir tidak tertutup.

#### iPad/tablet 769–1199px

- Gunakan split layout yang seimbang sekitar 55% teks dan 45% visual, bukan cover background.
- Tampilkan portrait dengan ukuran proporsional dan tools compact.
- Susun CTA dalam grid 2×2 dengan target minimum 44px.
- Pastikan nama, role, foto, dan tools tidak terpotong pada tinggi viewport yang berbeda.

### Fase 3 — Sidebar lebih natural

- Pertahankan semua anchor dan `aria-current`.
- Ganti ekspansi rail besar sebagai pusat interaksi dengan section index rail yang tenang: marker aktif, label pendek yang muncul kontekstual, dan surface aktif yang tidak dominan.
- State hover dan keyboard focus harus setara; tidak boleh hover-only.
- Sidebar tidak boleh mendorong layout hero dan tidak boleh menutup konten.
- Mobile/iPad tetap memakai bottom navigation dengan label terlihat.
- Pertahankan focus ring, Escape, reduced-motion, dan target minimal 44px.

### Fase 4 — Transisi antar-section dan route

- Pertahankan native scroll dan smooth anchor; tidak ada scroll hijacking atau full-page snap.
- Reuse `IntersectionObserver` dengan state `.is-visible` dan state keluar ringan bila benar-benar diperlukan.
- Gunakan opacity/transform saja agar tidak memicu layout recalculation.
- Splash tetap sekali per session.
- Scope fase ini tetap single-page: jangan membangun arsitektur View Transitions multi-route untuk `/about`, `/skills`, atau `/guestbook`. Fokus pada splash dismissal, native anchor scroll, dan state observer `.is-visible`/exit ringan di homepage.
- Pada `prefers-reduced-motion`, semua fade/transform/marquee menjadi instan atau nonaktif.

### Fase 5 — Footer editorial

- Ubah `.footer-content` dari grid administratif menjadi contact block editorial.
- Kiri: nama, role, dan positioning singkat yang sudah ada.
- Kanan: email/telepon sebagai link asli, social links, dan Download CV.
- Tambahkan hierarchy heading contact yang lebih jelas, divider bawah, dan copyright yang rapi.
- Mobile: nama → contact → social → CV → copyright.
- Jangan menambah empat kolom generik, link palsu, atau copy baru yang tidak bersumber dari project.

### Fase 6 — My Projects tampil tiga kartu dahulu

- Ubah konfigurasi `initExpandableSections()` untuk `projects` menjadi limit 3 pada desktop, 2 pada tablet, dan 2 pada mobile agar grid tablet tidak menghasilkan satu kartu orphan. Desktop tetap menampilkan satu baris tiga kartu.
- Desktop memakai grid satu baris tiga kolom; tablet dua kolom; mobile satu kolom.
- Kartu ke-4 dan seterusnya tersembunyi sampai kontrol “Lihat Selengkapnya” dibuka.
- Reuse kontrol yang ada beserta `aria-expanded`, `aria-controls`, dan jumlah item.
- Pertahankan kondisi Blade kontrol sebagai `@if(count($codingProjects) > 2)`: pada desktop tiga project sudah memenuhi limit sehingga JS membiarkan wrapper tetap `d-none`, tetapi pada tablet/mobile project ke-3 perlu memiliki kontrol untuk dibuka karena limit awalnya 2.
- Pastikan `initExpandableSections()` menghitung limit berdasarkan breakpoint sebelum memutuskan apakah `#projectsExpandControls` ditampilkan; jangan menjadikan jumlah desktop sebagai satu-satunya threshold.
- Jangan mengubah konfigurasi gallery.

### Fase 7 — Redesain skills yang lebih padat

- Ganti circular chart besar menjadi competency list dengan progress bar horizontal.
- Setiap item tetap memakai `$skill->name` dan `$skill->proficiency` dari database.
- Soft skills dan technical skills menjadi dua panel yang berbeda secara hierarki, bukan dua blok identik.
- Desktop dapat memakai dua kolom daftar; mobile satu kolom.
- Progress dianimasikan hanya saat section terlihat; reduced-motion langsung menampilkan nilai.
- Refaktor `progressObserver` di `public/js/portfolio.js`: hapus kalkulasi SVG `circumference/strokeDashoffset` lama dan animasikan `width` atau `transform: scaleX` pada bar baru.
- Setiap bar memakai `role="progressbar"`, `aria-valuenow`, `aria-valuemin="0"`, dan `aria-valuemax="100"`.
- Pertahankan empty state “No soft skills available” dan “No technical skills available”.
- Jangan menciptakan skill atau angka baru.

## Verifikasi wajib

- Render homepage backend dan pastikan tidak ada dead anchor atau selector tanpa target.
- Test pada viewport 320px, 390px, 768px, iPad/tablet, 1280px, dan 1440px.
- Pastikan tidak ada horizontal overflow, foto/badge terpotong, atau bottom nav menutup konten.
- Test splash pada first session, reload session yang sudah selesai, query/reset QA-only bila dibuat, Skip, Escape, Tab focus containment, reduced motion, storage blocked, dan JavaScript fallback.
- Pastikan splash tidak menambah network request blocking, tidak menunda LCP secara signifikan, dan tidak menyebabkan layout shift setelah dismiss.
- Test sidebar hover/focus, keyboard Tab, Escape, anchor navigation, theme toggle, project expand, dan modal project.
- Test `prefers-reduced-motion` serta fallback ketika JavaScript tidak tersedia.
- Jalankan:
  - `php artisan test tests/Feature/PublicPortfolioSafetyTest.php`
  - `node --check public/js/portfolio.js`
  - `git diff --check`
- Tambahkan/ubah focused test untuk memastikan homepage menampilkan tiga project awal, kontrol expand, hook responsive, dan skills tetap mengambil data database.
- Pertahankan hook test sidebar yang sudah ada, termasuk `<span class="nav-dot-label">Home</span>` atau sesuaikan assertion secara sengaja bila markup berubah.
- Tambahkan assertion untuk kondisi project `> 2`, perilaku limit desktop 3 versus tablet/mobile 2, tombol expand saat total project 3, atribut ARIA progressbar, dan tidak adanya kalkulasi circumference SVG setelah skills diubah.
- Jalankan static export dan pastikan Blade, CSS, dan JS terbaru ikut tersalin.
- Jalankan Lighthouse desktop/mobile setelah visual QA lokal selesai.
- Deployment, commit, dan push dilakukan terpisah setelah user menyetujui hasil local QA.

## Rules `dapur` yang wajib dipertahankan

- Tidak menambah dependency atau library animasi.
- Tidak mengarang data, skill, project, statistik, route, atau copy baru.
- Tidak menggunakan hover-only interaction.
- Tidak menambah glow, blur, gradient, atau card hanya sebagai dekorasi.
- Menjaga WCAG focus/contrast dan target interaksi minimal 44px.
- Mobile harus menjadi layout yang benar-benar reflow, bukan desktop yang diperkecil.
- Semua perubahan surgical pada file existing dan perilaku di luar scope tidak diubah.
