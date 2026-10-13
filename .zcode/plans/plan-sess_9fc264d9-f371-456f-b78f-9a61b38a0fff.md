## Implementation Plan — Premium Technical Editorial

### Filosofi
Buang semua noise visual (glowing orbs, CRT scanlines, glassmorphism, backdrop-blur). Ganti dengan **High Signal, Low Noise** — arsitektur tipografi tegas, satu aksen warna (Electric Indigo), border-border tipis 1px, dan whitespace yang lega. Kayak halaman GitHub/Stripe versi gelap, tapi punya karakter.

---

### File yang Diubah

#### 1. `resources/css/app.css` — Total Overhaul
- **Palet baru:** Void Black `#09090b`, Surface `#0f0f12`, satu aksen Electric Indigo `#4f46e5`
- **Hapus:** Semua class `hud-*`, `cobalt-orb`, `gold-orb`, `telemetry-grid`, `telemetry-scanline`, cosmic color tokens
- **Tambah:** Komponen baru — `.panel`, `.data-table`, `.badge-sm`, `.btn-primary`, `.btn-ghost`, `.btn-cv`, `.nav-bar`, `.hero-name`, `.hero-tagline`, `.section-label`, `.marquee-wrap`

#### 2. `resources/views/layouts/portfolio.blade.php` — Nav & Chrome
- **Buang:** Pill nav glass HUD, semua orbs/grid/scanline background divs
- **Nav baru:** Full-width sticky bar tipis 60px, bg `#09090b` + `border-bottom: 1px solid #27272a`, link monospace uppercase kecil
- **Mobile nav:** Bottom bar minimal icon + label, bukan pill transparan

#### 3. `resources/views/portfolio/components/hero.blade.php` — Hero Section
- **Hapus:** 12-col grid text-kiri foto-kanan yang generik, floating chips, KPI cards dengan glow
- **Hero baru:** Full-width asymmetric. Nama super besar `clamp(3rem, 8vw, 6.5rem)` weight 800 di kiri, foto kotak sharp di kanan dalam `border: 1px solid #27272a`
- **Achievements:** Diubah dari floating cards menjadi **Data Grid / Tabel** — 4 row bersih: Hazard Rate, Academic, Competition, Governance
- **CTAs:** 3 tombol flat — Primary (indigo solid), Ghost (border abu), CV (amber border)

#### 4. `resources/views/portfolio/components/footer.blade.php` — Footer
- Marquee ticker tetap tapi disederhanakan (muted, no icons per item, pemisah `·`)
- Layout 3 kolom bersih: Identity, Contact Links, Download CV

---

### Scope Terbatas (sections lain belum disentuh)
`honors`, `flagship`, `projects`, `toolkit`, `experience` tidak diubah dulu — fokus ke hero + nav + footer sebagai proof of concept visual. Setelah lu approve hasilnya, baru kita lanjut ke sections berikutnya.