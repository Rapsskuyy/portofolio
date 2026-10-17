# Interactive Sidebar Redesign Plan

## Tujuan

Membuat sidebar terasa lebih hidup dan mudah dipahami tanpa menjadi ramai: label navigasi dapat muncul secara kontekstual, active state lebih jelas, dan interaksi tetap ringan, keyboard-accessible, responsif, serta konsisten dengan identitas navy/indigo portfolio.

## Hasil audit

- Markup sidebar berada di `resources/views/portfolio/index.blade.php:29-51`.
- Desktop saat ini fixed `80px`, full-height, hanya menampilkan titik navigasi; label bergantung pada tooltip `::before` saat hover/focus.
- Sidebar berisi logo, delapan anchor section, dua social link, dan theme toggle.
- Pada mobile <=768px sidebar disembunyikan dan diganti bottom navigation di markup yang sama.
- JavaScript hanya menangani smooth anchor dan active state; tidak ada state expanded khusus sidebar.
- Test sudah mencakup keberadaan nav, anchor coherence, responsive behavior, dan scroll offset.

## Arah desain yang direkomendasikan

Pertahankan sidebar sebagai rail identitas, tetapi ubah dari “kolom titik” menjadi navigation capsule yang bisa melebar sedikit saat pengguna berinteraksi. Default tetap compact supaya homepage tidak kehilangan ruang; saat hover atau `focus-within`, label section tampil di samping icon/marker. Active section memakai rail/marker indigo solid yang halus, bukan dot yang membesar berlebihan.

Keputusan ini menjaga desain tetap personal dan interaktif, tetapi tidak menambah dekorasi yang tidak punya fungsi. Tidak menambah blur/glass layer baru, glow looping, atau animasi dekoratif.

## Rencana implementasi

### 1. Rapikan markup dan aksesibilitas

- File: `resources/views/portfolio/index.blade.php`.
- Pertahankan semua `href` dan section target yang sudah ada.
- Tambahkan label visual yang dapat ditampilkan saat expanded, bukan hanya `data-tooltip` pseudo-element.
- Beri `aria-label` yang tetap lengkap pada setiap link, pertahankan `aria-current="location"` hanya untuk item aktif.
- Tambahkan label/tooltip yang tidak mengganggu screen reader atau menyebabkan duplikasi pembacaan.
- Tambahkan `aria-label`/`aria-pressed` yang tepat pada theme toggle dan title yang konsisten.

### 2. Redesign desktop rail

- File: `public/css/portfolio.css`.
- Default width tetap dekat ukuran sekarang; state expanded melebar secara moderat, misalnya sekitar `80px` ke `116px`, tanpa mendorong konten secara dinamis karena sidebar fixed.
- Tampilkan nama section pada state `:hover` dan `:focus-within` sehingga tidak bergantung pada mouse.
- Active state memakai indicator rail/outline indigo dengan kontras yang jelas; hover cukup mengubah warna/opacity dan posisi kecil.
- Jaga target interaksi minimal `44px`, visible focus, dan `z-index` agar label tidak tertutup hero.
- Gunakan transition pada width/opacity/transform kecil saja; tidak ada animasi looping.
- Sediakan state tema terang tanpa mengubah hierarki visual sidebar.

### 3. Perilaku JavaScript minimal

- File: `public/js/portfolio.js`.
- Reuse active navigation logic yang sudah menghitung section aktif.
- Jika diperlukan, hanya sinkronkan class `is-expanded` berdasarkan `mouseenter`/`mouseleave` dan `focusin`/`focusout`; jangan mengubah layout pada setiap scroll event.
- Pastikan Escape dapat mengembalikan state compact bila state expanded dipakai.
- Hormati `prefers-reduced-motion`; pada mode ini state berubah tanpa transition.
- Jangan menambah dependency baru atau mengganti sistem smooth-scroll yang ada.

### 4. Mobile dan iPad

- Pertahankan mobile bottom navigation sebagai layout khusus mobile; jangan memaksa rail desktop menjadi sidebar mini.
- Pastikan bottom nav tetap aman terhadap `env(safe-area-inset-bottom)`, target tap minimal `44px`, active state jelas, dan tidak menutupi konten.
- Tablet 769–1199px perlu diverifikasi agar rail expanded tidak menabrak konten hero atau floating photo.
- Pastikan tidak muncul horizontal overflow saat label sidebar terbuka.

### 5. Integrasi dengan motion homepage

- Sidebar redesign harus kompatibel dengan splash, scroll reveal, dan section transition pada plan `homepage-motion-plan.md`.
- Sidebar tidak memakai scroll hijacking; anchor tetap memakai native/smooth scroll.
- `scroll-margin-top`/offset section dipertahankan agar heading tidak tertutup navigation.
- Jangan membuat sidebar mengambil fokus otomatis ketika splash selesai.

## Verifikasi

- Render homepage dan cek seluruh delapan anchor menuju target yang benar.
- Desktop: compact default, expanded saat hover/focus, label terbaca, hero tidak bergeser atau tertutup.
- Keyboard: Tab melewati logo, seluruh nav, social link, dan theme toggle; focus terlihat; Escape mengembalikan compact bila berlaku.
- Mobile/iPad: bottom nav tetap bekerja, tidak ada clipping/horizontal overflow, safe-area tetap aman.
- Reduced motion: semua transition sidebar dimatikan atau dibuat instan.
- Tema dark/light: kontras label, marker aktif, dan focus ring tetap memenuhi arah `DESIGN.md`.
- Jalankan focused feature/e2e portfolio navigation tests dan `git diff --check` setelah implementasi.
- Validasi static export setelah backend render selesai; tidak mengubah `static-site/build.mjs` kecuali ada bukti kebutuhan.

## Batasan Dapur yang dipakai

- Setiap elemen interaktif harus fungsional; tidak menambah hiasan tanpa tujuan.
- Tidak menambah glassmorphism/glow/gradient baru sebagai dekorasi default.
- Tidak menambah library atau mengarang route/section baru.
- Perubahan tetap kecil dan terlokalisasi pada template, CSS, JS, dan test yang relevan.
