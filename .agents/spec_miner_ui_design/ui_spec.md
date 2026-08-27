# Cyber-Telemetry Design & UI Specification

**Target System**: Raffa Nur Musyaffa — High-Performance Scholarship & Systems Engineering Portfolio  
**Authoritative Source**: `c:/laragon/www/test1 - Copy/.agents/ORIGINAL_REQUEST.md`  
**Specification Version**: 1.0.0 (Authoritative Technical Mining Report)  
**Author Archetype**: Cyber-Telemetry Design & UI Spec Miner  
**Design Aesthetic**: Cyber-Telemetry HUD (Cockpit & Telemetry Mission Control inspired by landonorris.com)  

---

## 1. Executive Summary & Design System Architecture

This specification defines the complete visual language, design token system, layout geometry, component ergonomics, iconography matrix, and motion choreographies for Raffa Nur Musyaffa's scholarship-tailored developer portfolio.

The portfolio is structured to maximize technical credibility for elite scholarship selection committees (e.g. **Türkiye Bursları**, PTN Informatics Engineering) and enterprise software teams. Rather than a standard generic web template, the interface is engineered as an **Avionics / Mission Control Cockpit (Cyber-Telemetry HUD)** featuring high-density telemetry readouts, precision chamfered polygons, high-contrast visual hierarchy, zero consumer emojis, and progressive reveal storytelling.

```
┌─────────────────────────────────────────────────────────────────────────────────────────────┐
│                               CYBER-TELEMETRY HUD ARCHITECTURE                              │
├─────────────────────────────────────────────────────────────────────────────────────────────┤
│  Top Floating Glass HUD Navigation Capsule [Live Status • Section Matrix • Quick CV Access] │
├─────────────────────────────────────────────────────────────────────────────────────────────┤
│  [01] HERO COCKPIT                 - Executive Hook, Cutout Frame, Real-time Telemetry      │
│  [02] HONORS & MERIT SPOTLIGHT     - Asymmetric Bento Grid (Gold Medal CS, Rank 1, TOEIC)   │
│  [03] FLAGSHIP ARCHITECTURE        - Interactive E-Voting TPS Console (4 Hardcore Pillars)  │
│  [04] EXPERIENCE & LEADERSHIP      - Industrial PKL API (NDA) & MPK 2-Period Legislative    │
│  [05] PROJECT ARSENAL & 3D LAB     - Kotlin Android, Fullstack Web, Blender 3D Shaders      │
│  [06] TOOLKIT & 2027 ROADMAP       - Grouped Systems Matrix, Türkiye Bursları / PTN Target  │
│  [07] COMMAND CENTER FOOTER        - Double-Buffered Kinetic Marquee & Direct Channels      │
└─────────────────────────────────────────────────────────────────────────────────────────────┘
```

---

## 2. Design Tokens & Color Palette Specification

### 2.1 Core Color Tokens

The visual foundation is anchored by a deep obsidian cosmic navy background, punctuated by piercing Royal Cobalt Blue brand elements and prestige Trophy Gold award accents.

| Token Name | Hex Code | RGB / OKLCH Value | Hierarchy & Application Purpose |
|---|---|---|---|
| `--bg-cosmic-navy` | `#080D1A` | `rgb(8, 13, 26)` | **Primary Canvas**: Glare-free cosmic dark canvas. Prevents eye strain while providing high contrast for HUD overlays. |
| `--surface-void-slate` | `#0B132B` | `rgb(11, 19, 43)` | **Card Base Surface**: Chamfered cards, modal viewports, bento cells, telemetry containers. |
| `--surface-hud-glass` | `rgba(15, 23, 42, 0.75)` | `rgba(15, 23, 42, 0.75)` | **HUD Frosted Overlays**: Top/bottom floating navigation capsules, sticky telemetry ribbons. |
| `--accent-cobalt-primary` | `#2563EB` | `rgb(37, 99, 235)` | **Primary Brand Accent**: Interactive buttons, glowing laser borders, active navigation pills, primary focus states. |
| `--accent-cobalt-glow` | `#3B82F6` | `rgb(59, 130, 246)` | **Secondary Glow**: Subtle radial background ambient orbs, active icon fills, hover lighting. |
| `--accent-gold-trophy` | `#FACC15` | `rgb(250, 204, 21)` | **Prestige Highlights**: National Gold Medal in CS, Class Rank 1, scholarship trajectories, CV action highlight. |
| `--accent-gold-glow` | `rgba(250, 204, 21, 0.25)` | `rgba(250, 204, 21, 0.25)` | **Honor Shimmer**: Outer glow on award borders and milestone badges. |
| `--telemetry-cyan` | `#06B6D4` | `rgb(6, 182, 212)` | **Telemetry & Cryptography**: Monospace readouts, cryptographic token labels, terminal code highlights, sub-pixel grid lines. |
| `--telemetry-emerald` | `#10B981` | `rgb(16, 185, 129)` | **Operational Beacon**: Live system status (`24/7 ONLINE`, `SYS_NOMINAL`), healthy throughput metrics. |
| `--telemetry-rose` | `#EF4444` | `rgb(239, 68, 68)` | **Security & Concurrency**: Row-locking alerts, NDA confidentiality flags, critical security callouts. |
| `--border-dim` | `rgba(255, 255, 255, 0.08)` | `rgba(255, 255, 255, 0.08)` | **Default HUD Border**: Unselected cards, inactive section dividers, structural lines. |
| `--border-cobalt-active` | `rgba(37, 99, 235, 0.45)` | `rgba(37, 99, 235, 0.45)` | **Active Border Highlight**: Selected cards, focused inputs, active bento spotlights. |
| `--text-primary` | `#F8FAFC` | `rgb(248, 250, 252)` | **Primary Headings & Copy**: 18.2:1 contrast ratio against `#080D1A` (exceeds WCAG AAA). |
| `--text-secondary` | `#94A3B8` | `rgb(148, 163, 184)` | **Technical Prose & Descriptions**: Readable slate tone for technical documentation. |
| `--text-muted-telemetry` | `#64748B` | `rgb(100, 116, 139)` | **HUD Coordinates & Metadata**: Monospace system coordinates, timestamps, micro-tags. |

### 2.2 Telemetry Gradients & Background Meshes

- **Cockpit Cobalt Beam**: `linear-gradient(135deg, #2563EB 0%, #06B6D4 100%)`
- **Prestige Trophy Shimmer**: `linear-gradient(135deg, #FACC15 0%, #CA8A04 100%)`
- **Cosmic Depth Card Surface**: `linear-gradient(180deg, rgba(30, 41, 59, 0.5) 0%, rgba(11, 19, 43, 0.85) 100%)`
- **Sub-Pixel Grid Mesh**: `radial-gradient(circle at 1px 1px, rgba(37, 99, 235, 0.15) 1px, transparent 0)` with `background-size: 24px 24px`
- **Telemetry Scanline Texture**: `linear-gradient(to bottom, rgba(255,255,255,0) 50%, rgba(37, 99, 235, 0.03) 50%)` with `background-size: 100% 4px`

---

## 3. Typography & Micro-Telemetry Readouts

### 3.1 Font Stacks
1. **Cockpit Headings & Display**: `'Plus Jakarta Sans', 'Inter', -apple-system, sans-serif`
   - *Weights*: 700 (Bold), 800 (ExtraBold), 900 (Black)
   - *Tracking*: `-0.03em` for high-impact industrial punch.
2. **Body & Architecture Prose**: `'Inter', 'Instrument Sans', system-ui, sans-serif`
   - *Weights*: 400 (Regular), 500 (Medium), 600 (SemiBold)
   - *Line Height*: `1.65`–`1.8` for dense architectural case studies.
3. **HUD Telemetry, Coordinates & Code**: `'JetBrains Mono', 'Fira Code', 'SF Mono', Consolas, monospace`
   - *Weights*: 400 (Regular), 500 (Medium), 700 (Bold)
   - *Features*: `font-variant-numeric: tabular-nums`, all-caps telemetry headers, micro-labels (9px–12px).

### 3.2 Authoritative Micro-Telemetry Formats
- **Status Readout**: `SYS_STATUS // ONLINE [24/7]`
- **Coordinate Tags**: `LOC: 01_HERO_COCKPIT`, `LOC: 03_FLAGSHIP_TPS`
- **Hardware/Security Telemetry**: `ENCR: SHA-256 HMAC // LATENCY: 18ms`
- **Metric Verification Tags**: `[VERIFIED // KEMENDIKBUD]`, `[ACID ROW-LOCK]`

---

## 4. Chamfered Polygon Card System & HUD Geometry

### 4.1 CSS Polygon Math (`clip-path`)

Generic consumer rounded corners are replaced by high-precision chamfered cuts (12px–16px).

#### Pattern A: Dual Diagonal Chamfer (Top-Right & Bottom-Left)
Used for standard cards, bento cells, project tiles, and skill modules:
```css
.chamfer-card-dual {
    clip-path: polygon(
        0px 0px,
        calc(100% - 14px) 0px,
        100% 14px,
        100% 100%,
        14px 100%,
        0px calc(100% - 14px)
    );
}
```

#### Pattern B: Symmetrical 4-Corner Cockpit Chamfer
Used for Hero Profile Cutout frame, Flagship E-Vote Interactive Console, and Modal shells:
```css
.chamfer-card-quad {
    clip-path: polygon(
        12px 0px,
        calc(100% - 12px) 0px,
        100% 12px,
        100% calc(100% - 12px),
        calc(100% - 12px) 100%,
        12px 100%,
        0px calc(100% - 12px),
        0px 12px
    );
}
```

### 4.2 Dual-Layer Chamfered Border Technique
Because standard CSS `border` fails to stroke inner chamfer cuts in some browser rendering engines, the specification utilizes a **dual-layer container architecture**:
1. **Outer Ring Wrapper (`.chamfer-shell`)**: Chamfered `clip-path` with `background: linear-gradient(135deg, rgba(37,99,235,0.4), rgba(255,255,255,0.05))`, with `1px` padding.
2. **Inner Content Body (`.chamfer-body`)**: Nested inside with matching chamfer `clip-path`, with `background: #080D1A` or `#0B132B`.
3. **Active/Hover Glow**: Outer wrapper transitions to solid `#2563EB` with `filter: drop-shadow(0 0 14px rgba(37,99,235,0.4))`.

### 4.3 Corner HUD Reticles & Brackets
- **L-Shaped Corner Brackets**: 8px × 8px absolute pseudo-elements at top-left (`border-top: 2px solid #2563EB; border-left: 2px solid #2563EB;`) and bottom-right (`border-bottom: 2px solid #2563EB; border-right: 2px solid #2563EB;`).
- **Telemetry Crosshairs (`+`)**: Micro `+` reticles placed at `top: 10px; right: 10px;` in `#06B6D4`.

---

## 5. Floating Glass HUD Navigation Capsule

### 5.1 Anatomical Layout
```
┌──────────────────────────────────────────────────────────────────────────────────────────────────┐
│  [RNM.SYS] 🟢 LIVE  │  [01. Cockpit]  [02. Honors]  [03. E-Vote]  [04. Arsenal]  │  ⚡ CV.PDF 📥 │
└──────────────────────────────────────────────────────────────────────────────────────────────────┘
```

### 5.2 Responsive Layout Breakdown

| Screen Width | Placement & Geometry | Component Composition & Behavior |
|---|---|---|
| **Desktop (`>= 1024px`)** | Centered floating capsule: `position: fixed; top: 24px; left: 50%; transform: translateX(-50%); height: 56px; max-width: 960px; z-index: 1000;` | `backdrop-filter: blur(20px); background: rgba(8, 13, 26, 0.85); border: 1px solid rgba(255, 255, 255, 0.1); border-radius: 9999px;`<br>Left: Brand Monogram `RNM [SYS.01]` + Live Green radar beacon.<br>Center: 6 Navigation Links (`Cockpit`, `Honors`, `Architecture`, `Experience`, `Arsenal`, `Toolkit`).<br>Right: Trophy Gold Quick CV Download action button. |
| **Tablet (`768px – 1023px`)** | Centered floating capsule: `top: 16px; width: calc(100% - 48px); height: 50px;` | Condensed navigation pills (icon + short label), status pill, and CV icon action. |
| **Mobile (`< 768px`)** | **Dual-Tier HUD Architecture**: Top Telemetry Bar (`top: 0; height: 48px;`) + Bottom Floating Action Capsule (`bottom: 16px; height: 58px; width: calc(100% - 32px);`) | **Top Bar**: Monogram + Live Ping Beacon + Direct CV Button.<br>**Bottom HUD Bar**: 5 Quick-Touch Icon Tabs with active Cobalt glow indicator and haptic-feel micro-interactions. |

### 5.3 Interaction & ScrollSpy Mechanics
- **IntersectionObserver ScrollSpy**: Actively tracks section visibility with `rootMargin: "-20% 0px -60% 0px"`.
- **Sliding Pill Indicator**: Smooth CSS `cubic-bezier(0.16, 1, 0.3, 1)` transition sliding behind active nav item with Royal Cobalt glow.
- **Scroll Offset**: All anchor links trigger smooth scrolling with an explicit `scroll-margin-top: 90px` to prevent HUD capsule occlusion.
- **Quick CV Download**: Direct access trigger for `files/CV .pdf` styled with Trophy Gold accent border (`#FACC15`).

---

## 6. Strict Zero-Emoji Policy & Lucide Icon Mapping

**MANDATORY RULE**: No consumer emoji glyphs (`🚀`, `🔥`, `💡`, `👥`, `🎓`, `💻`, etc.) may exist anywhere in the application. All icons are strictly rendered as clean, high-precision SVG vector line icons using the **Lucide Icon System**.

### 6.1 Exhaustive Component & Section Mapping Table

| Section / Component | Purpose / Concept | Forbidden Emoji | Authoritative Lucide Icon | Component Key | Accent Token |
|---|---|---|---|---|---|
| **HUD Navigation** | Live Telemetry Status | 🟢 | `<Radio />` / `<Activity />` | `lucide:radio` | `--telemetry-emerald` |
| **HUD Navigation** | CV Download Action | 📄 / 📥 | `<FileDown />` | `lucide:file-down` | `--accent-gold-trophy` |
| **Hero Cockpit** | Terminal / Developer Greeting | 💻 / 👨‍💻 | `<Terminal />` | `lucide:terminal` | `--accent-cobalt-primary` |
| **Hero Cockpit** | Launch Project Button | 🚀 | `<Rocket />` | `lucide:rocket` | `--accent-cobalt-glow` |
| **Hero Cockpit** | Say Hello / Message | ✉️ | `<Send />` | `lucide:send` | `--telemetry-cyan` |
| **Hero Cockpit** | Backend Architect Role Badge | ⚙️ | `<Code2 />` / `<Cpu />` | `lucide:code-2` | `--accent-cobalt-primary` |
| **Hero Cockpit** | MPK Leadership Role Badge | 🏛️ | `<Gavel />` | `lucide:gavel` | `--accent-gold-trophy` |
| **Honors & Merit** | National Gold Medal in CS | 🥇 / 🏆 | `<Trophy />` | `lucide:trophy` | `--accent-gold-trophy` |
| **Honors & Merit** | Rank 1 Parallel Standing | 👑 / ⭐ | `<Crown />` | `lucide:crown` | `--accent-gold-trophy` |
| **Honors & Merit** | Official TOEIC Certification | 📜 / 🎓 | `<Languages />` | `lucide:languages` | `--accent-cobalt-primary` |
| **Honors & Merit** | English Proficiency Score | 🔤 | `<FileCheck2 />` | `lucide:file-check-2` | `--telemetry-cyan` |
| **Honors & Merit** | Türkiye Bursları Trajectory | 🇹🇷 / 🎯 | `<Milestone />` | `lucide:milestone` | `--accent-gold-trophy` |
| **Honors & Merit** | PTN CS Target | 🏫 | `<Target />` | `lucide:target` | `--accent-cobalt-primary` |
| **Flagship TPS** | Cryptographic One-Time Tokens | 🔑 / 🎟️ | `<KeyRound />` | `lucide:key-round` | `--telemetry-cyan` |
| **Flagship TPS** | Database Row-Locking Concurrency | 🔒 / 🗄️ | `<Lock />` | `lucide:lock` | `--telemetry-rose` |
| **Flagship TPS** | HMAC Hardware Kiosk Security | 🛡️ | `<Fingerprint />` | `lucide:fingerprint` | `--accent-cobalt-primary` |
| **Flagship TPS** | Android Tablet TPS Ergonomics | 📱 | `<TabletSmartphone />` | `lucide:tablet-smartphone` | `--telemetry-cyan` |
| **Flagship TPS** | Live TPS Workflow Verification | ⚡ | `<CheckCircle2 />` | `lucide:check-circle-2` | `--telemetry-emerald` |
| **Experience** | Industrial PKL Enterprise API | 🏢 | `<Building2 />` | `lucide:building-2` | `--accent-cobalt-primary` |
| **Experience** | Confidential NDA Protection | 🛑 / 🤫 | `<ShieldAlert />` | `lucide:shield-alert` | `--telemetry-rose` |
| **Experience** | MPK School Legislative Assembly | 🏛️ / 👥 | `<Users2 />` | `lucide:users-2` | `--accent-gold-trophy` |
| **Project Arsenal**| Kotlin Android Canteen App | 🍱 / 🍔 | `<Smartphone />` | `lucide:smartphone` | `--accent-cobalt-primary` |
| **Project Arsenal**| QR Code Scanning Module | 📲 | `<QrCode />` | `lucide:qr-code` | `--telemetry-cyan` |
| **Project Arsenal**| PT Komari Enterprise Web | 💼 / 🌐 | `<Globe />` | `lucide:globe` | `--telemetry-cyan` |
| **Project Arsenal**| Wandek Airlines Flight System | ✈️ | `<Plane />` | `lucide:plane` | `--accent-cobalt-primary` |
| **Project Arsenal**| Sarpras Asset Management | 📦 | `<Boxes />` | `lucide:boxes` | `--accent-cobalt-glow` |
| **3D Lab** | Blender 3D Classroom & Models | 🎨 / 📐 | `<Box />` | `lucide:box` | `--telemetry-cyan` |
| **3D Lab** | Cyber Sword 3D Asset | 🗡️ | `<Sword />` | `lucide:sword` | `--accent-gold-trophy` |
| **Toolkit Matrix** | Backend & Database Systems | 🗄️ | `<Database />` / `<Server />`| `lucide:database` | `--accent-cobalt-primary` |
| **Toolkit Matrix** | Frontend & UI HUD Systems | 💻 | `<Layout />` | `lucide:layout` | `--telemetry-cyan` |
| **Toolkit Matrix** | DevOps & Security Architecture | 🛠️ | `<ShieldCheck />` | `lucide:shield-check` | `--telemetry-emerald` |
| **Footer & Channels**| Live Marquee Ticker Glyph | ✨ / ⚡ | `<Zap />` | `lucide:zap` | `--accent-gold-trophy` |
| **Footer & Channels**| WhatsApp Channel | 📞 | `<MessageSquare />` | `lucide:message-square` | `--telemetry-emerald` |
| **Footer & Channels**| Email Channel | ✉️ | `<Mail />` | `lucide:mail` | `--telemetry-cyan` |
| **Footer & Channels**| GitHub Channel | 🐙 | `<Github />` | `lucide:github` | `--text-primary` |
| **Footer & Channels**| Instagram Channel | 📷 | `<Instagram />` | `lucide:instagram` | `--accent-cobalt-glow` |

---

## 7. Kinetic Footer Marquee & Telemetry Animation Engine

### 7.1 Infinite Double-Buffered Marquee Ticker

The footer incorporates an infinite horizontal telemetry marquee with seamless double-buffering.

```css
@keyframes marquee-crawl {
    0% { transform: translateX(0%); }
    100% { transform: translateX(-50%); }
}

.telemetry-marquee-container {
    overflow: hidden;
    white-space: nowrap;
    position: relative;
    border-top: 1px solid rgba(37, 99, 235, 0.3);
    border-bottom: 1px solid rgba(37, 99, 235, 0.3);
    background: rgba(11, 19, 43, 0.6);
    padding: 12px 0;
}

.telemetry-marquee-track {
    display: inline-flex;
    width: max-content;
    animation: marquee-crawl 28s linear infinite;
}

.telemetry-marquee-track:hover {
    animation-play-state: paused;
}
```

#### Marquee Data Stream Content:
`[SYS_STATUS: 100% NOMINAL] ◈ RAFFA NUR MUSYAFFA ◈ BACKEND ARCHITECT & SYSTEMS ENGINEER ◈ NATIONAL GOLD MEDAL IN COMPUTER SCIENCE ◈ CLASS RANK 1 PARALLEL (PPLG) ◈ OFFICIAL TOEIC CERTIFIED ◈ FLAGSHIP COMMERCIAL E-VOTING KIOSK TPS ◈ ACID ROW-LOCKING CONCURRENCY ◈ TÜRKİYE BURSLARI 2027 CANDIDATE ◈ LATENCY < 20MS ◈ ZERO-EMOJI RIGOR ◈`

### 7.2 Core Telemetry Micro-Animations

1. **Radar Pulse Beacon (`radar-pulse`)**:
   - 6px inner solid emerald dot (`#10B981`) with drop shadow.
   - Dual outer expanding rings (`scale: 1.0 -> 2.4`, `opacity: 0.8 -> 0`) executing over a 2000ms staggered cycle.
2. **Scanline Cathode Sweep (`scanline-sweep`)**:
   - Sub-pixel horizontal laser line sweeping vertically across chamfered cards every 8s.
3. **Numeric Telemetry Rollup**:
   - High-speed number counter on scroll entry (`0 -> 100%`, `0 -> 1`, `0 -> 15+`).
4. **Chamfer 3D Parallax Tilt**:
   - Interactive 3D perspective tilt (max 4.5° along X and Y axes) calculated from cursor offset, returning smoothly to 0° on mouse leave.

---

## 8. Progressive Storytelling & Section-by-Section Specifications

### Section 1: Hero Cockpit
- **Visual Structure**: 12-column responsive cockpit layout.
- **Left Column (7 cols)**:
  - System Header Badge: Monospace `SYS_STATUS: OPERATIONAL // [24/7 ONLINE]` with `<Radio />` beacon.
  - Display Title: Dual-tone typography ("Raffa Nur" in white-slate gradient, "Musyaffa" in Royal Cobalt-to-Cyan gradient).
  - Subtitle: Clear positioning statement targeting high-concurrency systems, database architecture, and scholarship ambition.
  - Action Cluster:
    - Primary: Chamfered Royal Cobalt CTA "Explore Flagship TPS" with `<Rocket />`.
    - Secondary: Gold-accented "Download CV (PDF)" with `<FileDown />`.
    - Tertiary: "Guestbook & Connect" with `<Send />`.
  - Metrics Ribbon: Chamfered telemetry stat cards (`[1st] Parallel Rank`, `[Gold] National CS Medal`, `[15+] Repositories`).
- **Right Column (5 cols)**:
  - Photo Frame Cutout: Symmetrical 4-corner chamfered frame featuring Raffa's portrait (`media_1787815622667.jpg` / `profilrappa.jpeg`).
  - Overlay Accents: Royal Cobalt laser border glow, ambient radial depth orb, HUD corner bracket crosshairs.
  - Floating Telemetry Badges:
    - Top-Left: `[ROLE] Backend Architect` with `<Terminal />`.
    - Bottom-Right: `[LEAD] MPK 2-Period Leader` with `<Gavel />`.

### Section 2: Honors & Merit Spotlight (Bento Grid)
- **Visual Structure**: Asymmetric 12-column Bento Grid.
- **Hero Bento Tile (8 cols, Trophy Spotlight)**:
  - Feature: **National Gold Medal in Computer Science (Olimpiade Sains / IT)**.
  - Styling: Trophy Gold (`#FACC15`) shimmering border, golden watermark reticle, badge `[PRESTIGE: NATIONAL]`, `<Trophy />` icon.
  - Copy: Rigorous problem-solving, algorithms, computational efficiency.
- **Rank 1 Parallel Standing (4 cols)**:
  - Feature: **Rank 1 Parallel Standing across Software Engineering (PPLG) Cohort**.
  - Metric: `1 / 400+` students.
  - Styling: Chamfered card with `<Crown />` in Trophy Gold.
- **TOEIC Certification (6 cols)**:
  - Feature: **Official TOEIC International Certification**.
  - Metric: Verified Advanced Professional Working English.
  - Styling: Chamfered card with `<Languages />` and `<FileCheck2 />`.
- **Scholarship & Academic Trajectory (6 cols)**:
  - Feature: **Türkiye Bursları 2027 & Top PTN Target**.
  - Styling: Timeline node card with `<Milestone />` and `<Target />`.

### Section 3: Flagship Architecture Spotlight (E-Voting Kiosk TPS)
- **Interactive Deep-Dive Architecture Console**:
  - Live technical breakdown of the commercial E-Voting Kiosk TPS deployed for high-stakes institutional elections.
  - **4 Hardcore Architectural Pillars**:
    1. **Cryptographic One-Time Tokens**: Unique sha256 token hashing preventing duplicate voting and enabling blind audit verification (`<KeyRound />`).
    2. **Database Row-Locking Concurrency**: ACID-compliant pessimistic locking (`SELECT ... FOR UPDATE`) eliminating race conditions during peak ballot rushes (`<Lock />`).
    3. **HMAC Hardware Kiosk Security**: Secret-key kiosk signing ensuring hardware terminal integrity against packet injection (`<Fingerprint />`).
    4. **Android Tablet Ergonomics**: High-touch, lag-free UI ensuring zero voter confusion across tablet kiosks (`<TabletSmartphone />`).
  - **Metrics HUD**: `100% AUDIT ACCURACY`, `0.00ms RACE CONFLICTS`, `COMMERCIAL TPS PROVEN`.
  - **Interactive Workflow HUD**: Interactive 4-step execution flow (Token Verification -> Pessimistic Lock -> Cast Ballot -> Cryptographic Hash Seal).

### Section 4: Experience & Leadership
- **Dual-Track Layout**:
  - **Track A: Industrial PKL Enterprise API (Confidential NDA)**:
    - Chamfered stealth card with dark obsidian background and red/cobalt telemetry accents.
    - Security Badge: `[RESTRICTED // NDA PROTECTED]` with `<ShieldAlert />`.
    - Key Technical Highlights: RESTful enterprise microservices, high-throughput database queries, JWT authentication, and automated error handling.
  - **Track B: MPK School Legislative Leadership (2 Consecutive Periods)**:
    - Chamfered card with Trophy Gold accent border and `<Gavel />` icon.
    - Key Impact: Chaired parliamentary student sessions, drafted institutional bylaws, and coordinated across 1,500+ student body.

### Section 5: Project Arsenal & 3D Lab
- **Segmented Telemetry Controller**: Tab switchers (`All Projects`, `Kotlin Android`, `Fullstack Web`, `Blender 3D Lab`).
- **Aspect-Preserving Masonry Grid (Zero Cropping)**:
  1. **Canteen Management System** (Kotlin Android + QR Barcode Integration) — `<Smartphone />`.
  2. **PT Komari Indonesia** (Fullstack Web Architecture) — `<Globe />`.
  3. **Wandek Airlines** (Commercial Airline Booking Engine) — `<Plane />`.
  4. **Sarpras Management System** (School Logistics Platform) — `<Boxes />`.
  5. **Blender 3D Lab**: Interactive showcase of 3D low-poly classroom and cyber sword models (`<Box />`, `<Sword />`).

### Section 6: Engineering Toolkit & 2027 Roadmap
- **Categorized HUD Matrix**:
  - **Backend Core**: PHP (Laravel), Kotlin, Node.js, REST APIs, MySQL, PostgreSQL.
  - **Frontend & Visual HUD**: Tailwind CSS v4, Blade, React/Vite, Modern JS, CSS Clip-Path.
  - **DevOps & Architecture**: Git/GitHub, Docker, Linux CLI, Postman, HMAC Security, ACID Row-Locking.
  - **3D & Prototyping**: Blender 3D, UI/UX Wireframing.
- **2027 Scholarship Roadmap**:
  - Visual trajectory node pointing directly to **Türkiye Bursları** application and PTN Informatics Engineering admissions.

### Section 7: Command Center Footer
- **Infinite Marquee Ticker**: Continuous telemetry stream at footer header.
- **Direct Telemetry Matrix**:
  - WhatsApp Direct (`<MessageSquare />`)
  - Official Email (`<Mail />`)
  - GitHub (`<Github />`)
  - Instagram (`<Instagram />`)
- **System Telemetry Signature**:
  - `SYS_BUILD: v2026.08 // ARCHITECT: RAFFA NUR MUSYAFFA // ZERO-EMOJI CERTIFIED`

---

## 9. Discovered Features Matrix

| # | Category | Feature | Description | Inputs | Outputs | Error Behavior | Discovered Via |
|---|---|---|---|---|---|---|---|
| 1 | Navigation | Floating Glass HUD Capsule | Fixed top/bottom telemetry navigation bar with live status beacon and quick CV access | User scroll, click on section pills | Smooth scroll to anchor with 80px offset, active tab glow | Fallback to standard top bar on legacy browsers | ORIGINAL_REQUEST.md & Layout Spec |
| 2 | Styling | Deep Cosmic Navy Background | Base canvas color (#080D1A) with subtle radial cobalt orbs and scanlines | Viewport render | Glare-free dark aesthetic canvas | Graceful fallback to dark gray (#0A0A0A) | ORIGINAL_REQUEST.md R1 |
| 3 | Styling | Chamfered Polygon Card System | 12px–16px angled cut corners via CSS clip-path with dual-layer border glow | CSS class `chamfer-card` | High-tech angled HUD container styling | Standard rounded corners if clip-path unsupported | ORIGINAL_REQUEST.md R1 |
| 4 | Iconography | Strict Zero-Emoji Vector Policy | Complete ban of emojis, replacement with crisp Lucide SVG vector icons | UI elements requiring visual badges | Scalable, clean line icons (Trophy, Gavel, Lock, Terminal) | Missing icon fallback to generic dot indicator | ORIGINAL_REQUEST.md R1 & AC |
| 5 | Storytelling | Hero Cockpit & Photo Cutout | Executive introductory view with photo frame cutout and live telemetry badges | Asset `profilrappa.jpeg` | Cockpit view with live radar pulse and status readouts | Fallback to placeholder avatar if image fails | ORIGINAL_REQUEST.md R2 |
| 6 | Storytelling | Honors & Merit Bento Grid | Asymmetric bento grid spotlighting National Gold Medal, Rank 1, and TOEIC | Academic achievement metadata | Golden shimmer spotlight cards with metric counters | Grid collapses to single column on mobile | ORIGINAL_REQUEST.md R2 |
| 7 | Architecture | Flagship E-Voting Kiosk Deep Dive | Interactive case study showcasing Cryptographic Tokens, DB Row-Locking, HMAC, and Tablet UI | User clicks on architecture pillars | Interactive diagram and metric callouts | Accessible static textual breakdown on screen readers | ORIGINAL_REQUEST.md R2 |
| 8 | Architecture | Industrial PKL Enterprise API Card | Stealth case study of enterprise microservice architecture under NDA protection | Enterprise experience metadata | Restricted-access HUD card with security lock icons | Redacted parameters indicated by monospace hash | ORIGINAL_REQUEST.md R2 |
| 9 | Leadership | MPK 2-Period Legislative Showcase | Highlighting student council legislative leadership, assemblies, and bylaws | Leadership timeline data | Gold-accented leadership bento card with gavel icon | Standard timeline list on small screens | ORIGINAL_REQUEST.md R2 |
| 10 | Showcase | Project Arsenal & 3D Blender Lab | Multi-tab portfolio showcase including Kotlin Android, Web, and Blender models | Category filter selection | Filtered masonry grid preserving aspect ratios without cropping | Empty state display if category contains no items | ORIGINAL_REQUEST.md R2 |
| 11 | Roadmap | Technical Toolkit & 2027 Milestone | Grouped tech matrix and Türkiye Bursları / PTN trajectory roadmap | Technical skill sets and goals | Interactive skill pills and glowing trajectory timeline | Static matrix on mobile viewports | ORIGINAL_REQUEST.md R2 |
| 12 | Animation | Kinetic Footer Telemetry Marquee | Double-buffered infinite horizontal ticker displaying continuous telemetry stream | Continuous time loop | Seamless crawling ticker, pause on hover | Graceful static text wrapping if CSS animation disabled | ORIGINAL_REQUEST.md R2 |

---

## 10. Edge Cases & Boundary Matrix

| # | Feature | Input / Boundary Condition | Observed & Specified Behavior |
|---|---|---|---|
| 1 | Chamfered Cards | Very small screen width (< 360px) | Chamfer radius reduces from 14px to 8px to prevent clip-path from cutting into inner card padding or content text. |
| 2 | Navigation Capsule | Fast erratic page scrolling | ScrollSpy debounces scroll event listener (50ms interval) to prevent jittery tab indicator sliding. |
| 3 | Telemetry Marquee | User prefers reduced motion (`prefers-reduced-motion: reduce`) | Marquee animation stops auto-scrolling; becomes a horizontally scrollable container with custom micro-scrollbar. |
| 4 | Hero Profile Image | Image fails to load or network disconnect | `onerror` fallback triggers embedded inline SVG HUD silhouette with glowing monogram to prevent layout collapse. |
| 5 | Bento Grid | Tablet portrait viewport (768px - 899px) | 12-column grid reflows to 6-column grid; 8-col hero card spans full 6 columns to maintain readability. |
| 6 | Lucide Icons | High-DPI / Retina Displays | Icons rendered as sharp vector SVGs with `stroke-width: 1.75px` to ensure crispness without raster fuzziness. |
| 7 | E-Vote Simulator | Mobile touch interaction | Touch tap initiates simulator sequence with smooth visual highlight and auto-scroll to active node. |
| 8 | CV Download Button | PDF file missing or offline | Button opens modal with direct contact channel and fallback email trigger rather than failing silently. |

---

## 11. Accessibility, Contrast & Performance Standards

1. **WCAG AAA Contrast Compliance**:
   - Primary text (`#F8FAFC`) on Deep Cosmic Navy (`#080D1A`): **18.2:1** (WCAG AAA requires 7:1).
   - Trophy Gold (`#FACC15`) on Deep Cosmic Navy (`#080D1A`): **13.5:1** (WCAG AAA compliant).
   - Telemetry Cyan (`#06B6D4`) on Deep Cosmic Navy: **8.9:1** (WCAG AAA compliant).
2. **Keyboard Navigation & Accessibility**:
   - Navigation links and interactive cards feature visible focus indicators (`outline: 2px solid #2563EB`, `outline-offset: 3px`).
   - All Lucide vector icons carry `aria-hidden="true"` when paired with text, or descriptive `aria-label` when standalone.
3. **Performance Optimization**:
   - Zero heavyweight external icon font libraries (FontAwesome fully replaced by inline/tree-shaken Lucide vector SVGs).
   - CSS `will-change: transform` and `contain: layout` applied strictly to animated marquee tracks and radar beacons to prevent layout repaints.
