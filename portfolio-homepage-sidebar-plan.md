# Portfolio Homepage, Motion & Sidebar Plan

## Tujuan

Mempertahankan identitas visual homepage yang sekarang—navy/indigo, split hero, foto profil, floating badges, dan tools—sambil membuat pengalaman awal lebih hidup melalui splash loading, scroll reveal, transisi antar-section, serta sidebar yang interaktif tetapi tetap tenang dan tidak norak.

Paragraf panjang di hero dihapus agar homepage fokus pada identitas dan CTA. Penjelasan personal dipusatkan di About Me.

## Hasil audit

- Homepage aktif berada di `resources/views/portfolio/index.blade.php`, dirender melalui `PortfolioController@index`.
- Hero sudah memiliki anchor identitas yang kuat: greeting, nama, role rotator, CTA, tools, foto profil, dan tiga floating badge.
- `.hero-description` terlalu panjang untuk above-the-fold dan mengulang informasi di About Me.
- Foto profil tidak perlu diganti, tetapi wrapper dan floating badge perlu diverifikasi agar tidak clipping di desktop, iPad, tablet, dan mobile.
- Sidebar desktop berada di `resources/views/portfolio/index.blade.php:29-51`, fixed `80px`, full-height, dan saat ini hanya menampilkan titik dengan label melalui tooltip hover/focus.
- Sidebar berisi delapan anchor section, dua social link, logo, dan theme toggle. Mobile <=768px memakai bottom navigation terpisah.
- `public/js/portfolio.js` sudah memiliki reduced-motion check, smooth anchor scroll, active navigation, role rotator, IntersectionObserver reveal, scroll-indicator fade, dan hero parallax.
- `static-site/build.mjs` menyalin HTML hasil render serta seluruh asset `public`; tidak perlu diubah kecuali verifikasi menemukan kebutuhan nyata.

## Prinsip desain dan batasan

- Visual hero tetap dipertahankan; perubahan hanya pada kepadatan, motion, dan interaksi.
- Sidebar default tetap compact agar tidak mengambil perhatian dari foto dan nama.
- Interaksi sidebar berupa label kontekstual, active indicator, focus state, dan transisi kecil; tidak memakai glow looping, glass layer tambahan, atau scroll hijacking.
- Tidak menambah library animasi, route baru, aset baru, audio/autoplay, atau dekorasi tanpa fungsi.
- Semua perubahan mengikuti `DESIGN.md` dan aturan `dapur/`: fungsional, content-driven, keyboard-accessible, responsive, serta reduced-motion friendly.

## Urutan implementasi

### Fase 1 — Rapikan hero homepage

File: `resources/views/portfolio/index.blade.php`.

- Hapus hanya `.hero-description` dari hero homepage.
- Pertahankan greeting, nama, role rotator, empat CTA, tools, foto, dan floating badges.
- Tambahkan hook motion seperlunya pada hero content/image dan section utama.
- Pertahankan detail biografi di `resources/views/portfolio/about.blade.php`.

### Fase 2 — Redesign sidebar desktop

File: `resources/views/portfolio/index.blade.php`, `public/css/portfolio.css`.

- Pertahankan semua `href`, section target, dan `aria-current` aktif.
- Tambahkan label visual yang tampil saat sidebar berinteraksi, bukan hanya pseudo-element tooltip.
- Default sidebar tetap sekitar `80px`; state expanded melebar secara moderat, sekitar `116px`, tanpa mendorong layout utama karena sidebar fixed.
- Tampilkan label pada `:hover` dan `:focus-within` agar tidak bergantung pada mouse.
- Ganti dot aktif yang membesar dengan indicator rail/outline indigo solid yang lebih tenang dan terbaca.
- Pertahankan target interaksi minimal `44px`, visible focus, z-index aman, dan state tema terang yang tetap konsisten.

### Fase 3 — Perilaku sidebar yang minimal

File: `public/js/portfolio.js`.

- Reuse active navigation logic yang sudah menghitung section aktif.
- Tambahkan state expanded hanya bila diperlukan melalui `focusin`/`focusout` atau pointer interaction.
- Jangan melakukan manipulasi layout pada setiap event scroll.
- Escape dapat mengembalikan sidebar ke state compact bila state expanded digunakan.
- Hormati `prefers-reduced-motion`; state berubah tanpa transition pada mode tersebut.

### Fase 4 — Splash loading screen

File: `resources/views/portfolio/index.blade.php`, `public/css/portfolio.css`, `public/js/portfolio.js`.

- Tambahkan overlay bernamespace `.portfolio-splash` sebelum `.main-content`.
- Gunakan identitas yang sama: “Hello” lalu nama, tanpa audio/autoplay.
- Durasi sekitar 900–1200 ms, dengan tombol Skip yang dapat diklik dan difokuskan keyboard.
- Gunakan `sessionStorage` agar splash hanya mengganggu sekali per sesi.
- Lepaskan body lock setelah selesai; jika JavaScript gagal, splash tidak boleh memblokir konten.
- Untuk reduced motion, tampilkan konten langsung atau fade minimal.

### Fase 5 — Scroll reveal dan transisi antar-section

File: `public/js/portfolio.js`, `public/css/portfolio.css`.

- Reuse IntersectionObserver yang sudah ada.
- Target reveal dibatasi pada hero content/image, judul About, kartu intro, gallery/project cards, dan contact block.
- Gunakan opacity + transform ringan, one-shot observer, dan root margin yang mulai sedikit sebelum viewport.
- Pertahankan native scrolling dan smooth anchor; jangan memakai scroll hijacking atau full-page snap.
- Gunakan overlap/panel/gradient yang sudah ada sebagai transisi visual; hero dapat fade/translate kecil ketika About mulai masuk.
- Pastikan semua target section memiliki `scroll-margin-top` yang cukup agar tidak tertutup navigation.
- Page transition antar-route berbeda tidak termasuk fase ini; jika dibutuhkan, jadikan fase terpisah dengan View Transitions API dan fallback CSS.

### Fase 6 — Responsive mobile dan iPad

File: `public/css/portfolio.css`.

- Pertahankan mobile bottom navigation sebagai layout khusus mobile, bukan sidebar desktop yang dipaksa mengecil.
- Pastikan bottom nav aman terhadap `env(safe-area-inset-bottom)`, target tap minimal `44px`, active state jelas, dan tidak menutupi konten.
- Verifikasi breakpoint mobile <=768px, tablet 769–1199px, dan desktop >=1200px.
- Sesuaikan spacing hero setelah paragraf dihapus.
- Pastikan foto, badge, sidebar label, dan CTA tidak clipping atau menyebabkan horizontal overflow.

## Verifikasi end-to-end

1. Backend render tetap `200`; `.hero-description` tidak ada di homepage, sementara About tetap memuat penjelasan.
2. Splash tampil sesuai aturan session; Skip bekerja dengan mouse, keyboard, dan reduced motion.
3. Sidebar desktop compact secara default, expanded saat hover/focus, label terbaca, active state sinkron dengan section, dan hero tidak bergeser.
4. Keyboard Tab melewati logo, nav, social link, theme toggle, dan splash control dengan focus yang terlihat.
5. Mobile/iPad mempertahankan bottom nav, safe-area, tap target, tanpa clipping atau horizontal overflow.
6. Semua anchor menuju target yang benar dan heading tidak tertutup navigation.
7. Tema dark/light menjaga kontras label, marker aktif, dan focus ring.
8. Jalankan focused Laravel feature/e2e portfolio tests, `git diff --check`, dan Lighthouse desktop/mobile setelah implementasi.
9. Jalankan static export dan pastikan markup, CSS, serta JS baru ikut tercopy. Deployment hanya setelah review lokal; urutan produksi tetap backend ready lalu static redeploy.

## File yang kemungkinan berubah saat eksekusi

- `resources/views/portfolio/index.blade.php`
- `public/css/portfolio.css`
- `public/js/portfolio.js`
- `tests/Feature/PublicPortfolioSafetyTest.php` atau suite e2e portfolio yang relevan

`static-site/build.mjs` hanya disentuh jika verifikasi membuktikan perubahan diperlukan.

## Di luar scope

- Tidak mengubah admin panel, Supabase, DNS, domain, atau deployment production.
- Tidak mengganti foto, palette utama, typography, atau struktur section yang sudah disetujui.
- Tidak menambah paragraf baru di hero atau membuat section generik.
