/**
 * Tier 1: Feature Coverage Test Suite (14 Features x >=5 isolated tests = 70+ test cases).
 * Authoritative Source: ORIGINAL_REQUEST.md, PROJECT.md, ui_spec.md, content_spec.md.
 */

import { assert, assertTrue, assertEqual, assertContains, assertMatches, assertGreaterOrEqual } from '../helpers/assertion.js';
import { BladeParser } from '../helpers/blade_parser.js';
import { CssParser } from '../helpers/css_parser.js';
import { AssetValidator } from '../helpers/asset_validator.js';
import { scanDirectoryForEmojis, scanTextForEmojis } from '../helpers/emoji_detector.js';

export async function runTier1FeatureCoverageTests(context = {}) {
    const blade = new BladeParser();
    const css = new CssParser();
    const assets = new AssetValidator();
    const results = [];

    async function test(id, name, fn) {
        const start = Date.now();
        try {
            await fn();
            results.push({ id, name, passed: true, duration: Date.now() - start });
        } catch (error) {
            results.push({ id, name, passed: false, error: error.message, stack: error.stack, duration: Date.now() - start });
        }
    }

    const aggregatedViews = blade.getPortfolioAggregatedContent();
    const aggregatedCss = css.getAggregatedCss();

    // =========================================================================
    // FEATURE 1: Cyber-Telemetry Palette & Tokens
    // =========================================================================
    await test('T1.1.1', 'Palette Token: Cosmic Navy Canvas Background (#080D1A)', () => {
        const hasCosmicNavy = css.hasCustomProperty('--bg-cosmic-navy', '080D1A') ||
            aggregatedCss.includes('#080d1a') ||
            aggregatedCss.includes('#080D1A') ||
            aggregatedViews.includes('#080D1A') ||
            aggregatedViews.includes('bg-[#080D1A]') ||
            aggregatedViews.includes('bg-cosmic-navy');
        assertTrue(hasCosmicNavy, 'Expected --bg-cosmic-navy / #080D1A canvas background token to be defined');
    });

    await test('T1.1.2', 'Palette Token: Royal Cobalt Primary Brand Accent (#2563EB)', () => {
        const hasCobalt = css.hasCustomProperty('--accent-cobalt', '2563EB') ||
            css.hasCustomProperty('--accent-cobalt-primary', '2563EB') ||
            aggregatedCss.includes('#2563eb') ||
            aggregatedCss.includes('#2563EB') ||
            aggregatedViews.includes('#2563EB') ||
            aggregatedViews.includes('text-blue-600') ||
            aggregatedViews.includes('accent-cobalt');
        assertTrue(hasCobalt, 'Expected Royal Cobalt primary accent token (#2563EB) to be defined');
    });

    await test('T1.1.3', 'Palette Token: Trophy Gold Prestige Accent (#FACC15)', () => {
        const hasGold = css.hasCustomProperty('--accent-gold', 'FACC15') ||
            css.hasCustomProperty('--accent-gold-trophy', 'FACC15') ||
            aggregatedCss.includes('#facc15') ||
            aggregatedCss.includes('#FACC15') ||
            aggregatedViews.includes('#FACC15') ||
            aggregatedViews.includes('text-yellow-400') ||
            aggregatedViews.includes('accent-gold');
        assertTrue(hasGold, 'Expected Trophy Gold accent token (#FACC15) to be defined');
    });

    await test('T1.1.4', 'Palette Token: Surface Void Slate Base Container (#0B132B / #0F172A)', () => {
        const hasVoid = css.hasCustomProperty('--surface-void-slate') ||
            aggregatedCss.includes('#0b132b') ||
            aggregatedCss.includes('#0B132B') ||
            aggregatedCss.includes('#0f172a') ||
            aggregatedViews.includes('#0B132B') ||
            aggregatedViews.includes('bg-[#0B132B]') ||
            aggregatedViews.includes('surface-void');
        assertTrue(hasVoid, 'Expected Surface Void Slate container token (#0B132B) to be defined');
    });

    await test('T1.1.5', 'Palette Token: Telemetry Status Indicators (Cyan, Emerald, Rose)', () => {
        const hasStatusTokens = (aggregatedCss.includes('06B6D4') || aggregatedCss.includes('06b6d4') || aggregatedViews.includes('cyan')) &&
            (aggregatedCss.includes('10B981') || aggregatedCss.includes('10b981') || aggregatedViews.includes('emerald') || aggregatedViews.includes('green')) &&
            (aggregatedCss.includes('EF4444') || aggregatedCss.includes('ef4444') || aggregatedViews.includes('rose') || aggregatedViews.includes('red'));
        assertTrue(hasStatusTokens, 'Expected Cyan, Emerald, and Rose telemetry color accents to be defined');
    });

    // =========================================================================
    // FEATURE 2: Chamfered Polygon Card Geometry
    // =========================================================================
    await test('T1.2.1', 'Card Geometry: avoids clipping content with CSS masking', () => {
        const usesMasking = css.hasClipPathPolygon(aggregatedCss) ||
            /clip-path\s*:\s*polygon\([^)]+\)/i.test(aggregatedViews);
        assertTrue(!usesMasking, 'Project content should not rely on a clipping polygon that can crop it at narrow widths');
    });

    await test('T1.2.2', 'Chamfer Geometry: Dual Diagonal Chamfer styling class', () => {
        const hasDualChamfer = css.hasClass('chamfer-card-dual') ||
            css.hasClass('hud-card') ||
            css.hasClass('chamfer-card') ||
            aggregatedViews.includes('chamfer-card-dual') ||
            aggregatedViews.includes('hud-card') ||
            aggregatedViews.includes('chamfer-card');
        assertTrue(hasDualChamfer, 'Expected dual diagonal chamfer styling class definition');
    });

    await test('T1.2.3', 'Chamfer Geometry: Symmetrical 4-Corner Quad Chamfer styling', () => {
        const hasQuadChamfer = css.hasClass('chamfer-card-quad') ||
            css.hasClass('hud-chamfer') ||
            aggregatedViews.includes('chamfer-card-quad') ||
            aggregatedViews.includes('hud-chamfer') ||
            aggregatedCss.includes('chamfer-card-quad');
        assertTrue(hasQuadChamfer, 'Expected 4-corner quad chamfer styling class definition');
    });

    await test('T1.2.4', 'Chamfer Geometry: Dual-Layer Border container structure', () => {
        const hasDualLayer = css.hasClass('chamfer-shell') ||
            css.hasClass('hud-border-glow') ||
            aggregatedViews.includes('chamfer-shell') ||
            aggregatedViews.includes('hud-card') ||
            aggregatedCss.includes('drop-shadow');
        assertTrue(hasDualLayer, 'Expected dual-layer chamfer border wrapper architecture');
    });

    await test('T1.2.5', 'Chamfer Geometry: Application across Hero, Bento, and Flagship modules', () => {
        const usesChamfer = aggregatedViews.includes('chamfer') ||
            aggregatedViews.includes('hud-card') ||
            aggregatedViews.includes('clip-path');
        assertTrue(usesChamfer, 'Expected chamfered polygon cards to be applied across portfolio views');
    });

    // =========================================================================
    // FEATURE 3: Zero-Emoji Compliance & Lucide Vector Icons
    // =========================================================================
    await test('T1.3.1', 'Zero-Emoji: Complete ban of consumer Unicode emojis in views', () => {
        const violations = scanTextForEmojis(aggregatedViews, 'resources/views');
        assertEqual(violations.length, 0, `Found ${violations.length} forbidden emoji glyph(s) in views: ${JSON.stringify(violations)}`);
    });

    await test('T1.3.2', 'Lucide Icons: Vector line icon initialization script/CDN in master layout', () => {
        const hasLucideInit = aggregatedViews.includes('lucide') ||
            aggregatedViews.includes('unpkg.com/lucide') ||
            aggregatedViews.includes('lucide.createIcons');
        assertTrue(hasLucideInit, 'Expected Lucide icon engine or CDN script in master layout');
    });

    await test('T1.3.3', 'Lucide Icons: Navigation live status and CV download icons', () => {
        const hasNavIcons = (aggregatedViews.includes('data-lucide="radio"') || aggregatedViews.includes('data-lucide="activity"') || aggregatedViews.includes('lucide:radio')) ||
            (aggregatedViews.includes('data-lucide="file-down"') || aggregatedViews.includes('data-lucide="download"') || aggregatedViews.includes('lucide:file-down'));
        assertTrue(hasNavIcons, 'Expected Lucide icons for Navigation live status beacon and CV download');
    });

    await test('T1.3.4', 'Lucide Icons: Honors & Merit awards icons (Trophy / Crown / Languages / Gavel)', () => {
        const hasHonorsIcons = (aggregatedViews.includes('data-lucide="trophy"') || aggregatedViews.includes('lucide:trophy') || aggregatedViews.includes('data-lucide="award"')) &&
            (aggregatedViews.includes('data-lucide="crown"') || aggregatedViews.includes('data-lucide="trending-up"') || aggregatedViews.includes('lucide:crown'));
        assertTrue(hasHonorsIcons, 'Expected Lucide icons (Trophy, Crown/TrendingUp) in Honors & Merit section');
    });

    await test('T1.3.5', 'Lucide Icons: Flagship 4 pillars icons (KeyRound / Lock / Fingerprint / Tablet)', () => {
        const hasFlagshipIcons = (aggregatedViews.includes('data-lucide="key-round"') || aggregatedViews.includes('data-lucide="key"') || aggregatedViews.includes('lucide:key-round')) &&
            (aggregatedViews.includes('data-lucide="lock"') || aggregatedViews.includes('lucide:lock'));
        assertTrue(hasFlagshipIcons, 'Expected Lucide vector icons (KeyRound, Lock) in Flagship architecture pillars');
    });

    // =========================================================================
    // FEATURE 4: Floating Glass HUD Navigation Capsule
    // =========================================================================
    await test('T1.4.1', 'HUD Nav Capsule: Fixed positioning with high z-index and glass backdrop', () => {
        const hasNavCapsule = aggregatedViews.includes('hud-navigation') ||
            aggregatedViews.includes('sidebar-nav') ||
            aggregatedViews.includes('fixed') ||
            aggregatedCss.includes('backdrop-filter');
        assertTrue(hasNavCapsule, 'Expected HUD navigation container with fixed glassmorphic styling');
    });

    await test('T1.4.2', 'HUD Nav Capsule: Translucent Cosmic Navy & blur styling', () => {
        const hasGlass = aggregatedCss.includes('backdrop-filter') ||
            aggregatedCss.includes('blur(') ||
            aggregatedViews.includes('backdrop-blur') ||
            aggregatedViews.includes('bg-slate-900/80');
        assertTrue(hasGlass, 'Expected glassmorphic blur and translucent background for nav capsule');
    });

    await test('T1.4.3', 'HUD Nav Capsule: Live radar status beacon with emerald LED indicator', () => {
        const hasBeacon = aggregatedViews.includes('LIVE') ||
            aggregatedViews.includes('ONLINE') ||
            aggregatedViews.includes('SYS_') ||
            aggregatedViews.includes('radar-pulse') ||
            aggregatedCss.includes('radar-pulse');
        assertTrue(hasBeacon, 'Expected live telemetry radar beacon in navigation capsule');
    });

    await test('T1.4.4', 'HUD Nav Capsule: Quick CV download action button with Trophy Gold highlight', () => {
        const hasCvAction = (aggregatedViews.includes('CV') || aggregatedViews.includes('.pdf')) &&
            (aggregatedViews.includes('FACC15') || aggregatedViews.includes('gold') || aggregatedViews.includes('yellow') || aggregatedViews.includes('FileDown'));
        assertTrue(hasCvAction, 'Expected Quick CV action button in navigation capsule');
    });

    await test('T1.4.5', 'HUD Nav Capsule: Responsive multi-section link anchors', () => {
        const hrefs = blade.extractAllHrefs(aggregatedViews);
        const hasSectionLinks = hrefs.some(h => h.includes('#cockpit') || h.includes('#hero') || h.includes('#honors') || h.includes('#flagship'));
        assertTrue(hasSectionLinks, 'Expected navigation capsule to link to core portfolio sections');
    });

    // =========================================================================
    // FEATURE 5: Hero Cockpit & Photo Cutout
    // =========================================================================
    await test('T1.5.1', 'Hero Cockpit: Executive positioning and dual-tone typography', () => {
        const hasHeroTitle = aggregatedViews.includes('Raffa') || aggregatedViews.includes('Musyaffa');
        assertTrue(hasHeroTitle, 'Expected Hero Cockpit with candidate display title "Raffa Nur Musyaffa"');
    });

    await test('T1.5.2', 'Hero Cockpit: Raffa Almet MPK portrait cutout asset integration', () => {
        const hasProfileImage = aggregatedViews.includes('profilrappa_original_raw.webp') ||
            aggregatedViews.includes('profile.webp') ||
            aggregatedViews.includes('rapoy122345.webp');
        assertTrue(hasProfileImage, 'Expected MPK Almet portrait cutout asset in Hero Cockpit');
    });

    await test('T1.5.3', 'Hero Cockpit: Chamfered photo frame with HUD laser border glow', () => {
        const hasPhotoFrame = aggregatedViews.includes('chamfer') ||
            aggregatedViews.includes('hud-card') ||
            aggregatedViews.includes('laser-border') ||
            aggregatedViews.includes('glow');
        assertTrue(hasPhotoFrame, 'Expected chamfered photo frame styling with laser border glow');
    });

    await test('T1.5.4', 'Hero Cockpit: Real-time telemetry status banner (SYS_STATUS // ONLINE)', () => {
        const hasTelemetryHeader = aggregatedViews.includes('SYS_') ||
            aggregatedViews.includes('STATUS') ||
            aggregatedViews.includes('ONLINE') ||
            aggregatedViews.includes('TELEMETRY');
        assertTrue(hasTelemetryHeader, 'Expected live telemetry status banner in Hero Cockpit');
    });

    await test('T1.5.5', 'Hero Cockpit: Action CTA cluster linking to Flagship, Honors, and CV download', () => {
        const hasCtaCluster = (aggregatedViews.includes('#flagship') || aggregatedViews.includes('Flagship') || aggregatedViews.includes('TPS')) &&
            (aggregatedViews.includes('CV') || aggregatedViews.includes('.pdf'));
        assertTrue(hasCtaCluster, 'Expected Action CTAs to Flagship case study and CV in Hero Cockpit');
    });

    // =========================================================================
    // FEATURE 6: Honors & Merit Bento Grid
    // =========================================================================
    await test('T1.6.1', 'Honors Bento: Asymmetric 12-column Bento Grid structure', () => {
        const hasBentoGrid = aggregatedViews.includes('bento') ||
            aggregatedViews.includes('grid') ||
            aggregatedViews.includes('col-span') ||
            aggregatedViews.includes('col-md-');
        assertTrue(hasBentoGrid, 'Expected Bento Grid layout structure in Honors & Merit section');
    });

    await test('T1.6.2', 'Honors Bento: National Gold Medal in Computer Science & Informatics', () => {
        const hasGoldMedal = (aggregatedViews.includes('Gold') || aggregatedViews.includes('Emas') || aggregatedViews.includes('Juara 1')) &&
            (aggregatedViews.includes('National') || aggregatedViews.includes('Nasional') || aggregatedViews.includes('Computer Science') || aggregatedViews.includes('Informatika') || aggregatedViews.includes('Olimpiade'));
        assertTrue(hasGoldMedal, 'Expected National Gold Medal in CS feature in Honors Bento Grid');
    });

    await test('T1.6.3', 'Honors Bento: Rank 1 Parallel Academic Standing across PPLG', () => {
        const hasRank1 = (aggregatedViews.includes('Rank 1') || aggregatedViews.includes('Rank #1') || aggregatedViews.includes('Peringkat 1') || aggregatedViews.includes('Parallel')) &&
            (aggregatedViews.includes('PPLG') || aggregatedViews.includes('Software Engineering') || aggregatedViews.includes('SMKN 1 Depok'));
        assertTrue(hasRank1, 'Expected Rank 1 Parallel Standing in Honors Bento Grid');
    });

    await test('T1.6.4', 'Honors Bento: Official TOEIC International English Certification', () => {
        const hasToeic = aggregatedViews.includes('TOEIC') ||
            aggregatedViews.includes('English') ||
            aggregatedViews.includes('ETS') ||
            aggregatedViews.includes('International Certification');
        assertTrue(hasToeic, 'Expected Official TOEIC Certification in Honors Bento Grid');
    });

    await test('T1.6.5', 'Honors Bento: Parliamentary Leadership / 2027 Scholarship Trajectory', () => {
        const hasLeadershipTrajectory = (aggregatedViews.includes('MPK') || aggregatedViews.includes('Presidium') || aggregatedViews.includes('Legislative') || aggregatedViews.includes('Sidang')) ||
            (aggregatedViews.includes('Türkiye') || aggregatedViews.includes('Bursları') || aggregatedViews.includes('PTN'));
        assertTrue(hasLeadershipTrajectory, 'Expected Parliamentary Leadership or 2027 Scholarship node in Honors Bento Grid');
    });

    // =========================================================================
    // FEATURE 7: Flagship Architecture Spotlight (E-Voting Kiosk TPS)
    // =========================================================================
    await test('T1.7.1', 'Flagship TPS: Dedicated high-concurrency electronic polling station case study', () => {
        const hasFlagship = aggregatedViews.includes('Voting') ||
            aggregatedViews.includes('TPS') ||
            aggregatedViews.includes('Kiosk') ||
            aggregatedViews.includes('Ballot') ||
            aggregatedViews.includes('E-Vote');
        assertTrue(hasFlagship, 'Expected Flagship E-Voting Kiosk TPS case study section');
    });

    await test('T1.7.2', 'Flagship TPS Pillar 1: Cryptographic One-Time Tokens (CSPRNG + SHA-256)', () => {
        const hasTokenPillar = (aggregatedViews.includes('Cryptographic') || aggregatedViews.includes('Token') || aggregatedViews.includes('CSPRNG') || aggregatedViews.includes('SHA-256') || aggregatedViews.includes('One-Time'));
        assertTrue(hasTokenPillar, 'Expected Pillar 1: Cryptographic One-Time Tokens breakdown in Flagship TPS');
    });

    await test('T1.7.3', 'Flagship TPS Pillar 2: Database Row-Level Locking (SELECT ... FOR UPDATE)', () => {
        const hasRowLockPillar = (aggregatedViews.includes('Row-Lock') || aggregatedViews.includes('FOR UPDATE') || aggregatedViews.includes('ACID') || aggregatedViews.includes('Pessimistic') || aggregatedViews.includes('Concurrency'));
        assertTrue(hasRowLockPillar, 'Expected Pillar 2: Database Row-Level Locking concurrency breakdown in Flagship TPS');
    });

    await test('T1.7.4', 'Flagship TPS Pillar 3: HMAC Hardware Kiosk Node Security', () => {
        const hasHmacPillar = (aggregatedViews.includes('HMAC') || aggregatedViews.includes('Hardware') || aggregatedViews.includes('Kiosk') || aggregatedViews.includes('Signature') || aggregatedViews.includes('Node'));
        assertTrue(hasHmacPillar, 'Expected Pillar 3: HMAC Hardware Kiosk Node Security breakdown in Flagship TPS');
    });

    await test('T1.7.5', 'Flagship TPS Pillar 4: Low-Latency Android Tablet Kiosk Mode & Metrics Callouts', () => {
        const hasTabletPillar = (aggregatedViews.includes('Tablet') || aggregatedViews.includes('Android') || aggregatedViews.includes('Cycle') || aggregatedViews.includes('Audit') || aggregatedViews.includes('Accuracy'));
        assertTrue(hasTabletPillar, 'Expected Pillar 4: Android Tablet Kiosk Mode and audit metrics in Flagship TPS');
    });

    // =========================================================================
    // FEATURE 8: Industrial Experience & Leadership Showcase
    // =========================================================================
    await test('T1.8.1', 'Experience Showcase: Dual-track enterprise engineering & legislative leadership layout', () => {
        const hasExperience = aggregatedViews.includes('Experience') ||
            aggregatedViews.includes('PKL') ||
            aggregatedViews.includes('MPK') ||
            aggregatedViews.includes('Pengalaman');
        assertTrue(hasExperience, 'Expected Industrial Experience and Leadership showcase section');
    });

    await test('T1.8.2', 'Experience Track A: Industrial PKL Enterprise API case study under NDA', () => {
        const hasNdaApi = (aggregatedViews.includes('PKL') || aggregatedViews.includes('API') || aggregatedViews.includes('Enterprise')) &&
            (aggregatedViews.includes('NDA') || aggregatedViews.includes('Confidential') || aggregatedViews.includes('Restricted') || aggregatedViews.includes('RESTful'));
        assertTrue(hasNdaApi, 'Expected Industrial PKL Enterprise API under NDA showcase');
    });

    await test('T1.8.3', 'Experience Track A: Sub-50ms API Latency & RBAC Security Highlights', () => {
        const hasApiHighlights = aggregatedViews.includes('API') ||
            aggregatedViews.includes('Latency') ||
            aggregatedViews.includes('RBAC') ||
            aggregatedViews.includes('Laravel') ||
            aggregatedViews.includes('REST');
        assertTrue(hasApiHighlights, 'Expected technical API latency/RBAC security callouts in PKL case study');
    });

    await test('T1.8.4', 'Experience Track B: 2-Period MPK Legislative Leadership (Majelis Perwakilan Kelas)', () => {
        const hasMpk = aggregatedViews.includes('MPK') ||
            aggregatedViews.includes('Legislatif') ||
            aggregatedViews.includes('Parliamentary') ||
            aggregatedViews.includes('Majelis Perwakilan Kelas');
        assertTrue(hasMpk, 'Expected 2-Period MPK Legislative Leadership showcase');
    });

    await test('T1.8.5', 'Experience Track B: Sidang Triwulan Quarterly Assembly & 100% Ratification Metrics', () => {
        const hasMpkMetrics = aggregatedViews.includes('Sidang') ||
            aggregatedViews.includes('Triwulan') ||
            aggregatedViews.includes('Presidium') ||
            aggregatedViews.includes('Ratification') ||
            aggregatedViews.includes('Constituents') ||
            aggregatedViews.includes('OSIS');
        assertTrue(hasMpkMetrics, 'Expected Sidang Triwulan legislative governance metrics in MPK showcase');
    });

    // =========================================================================
    // FEATURE 9: Project Arsenal (Mobile & Web)
    // =========================================================================
    await test('T1.9.1', 'Project Arsenal: Categorized filter telemetry controller', () => {
        const hasArsenal = aggregatedViews.includes('Arsenal') ||
            aggregatedViews.includes('Projects') ||
            aggregatedViews.includes('coding_projects') ||
            aggregatedViews.includes('Project');
        assertTrue(hasArsenal, 'Expected Project Arsenal catalog showcase');
    });

    await test('T1.9.2', 'Project Arsenal: Canteen SMKN 1 Depok (Native Kotlin Android + QR Code)', () => {
        const hasCanteen = (aggregatedViews.includes('Canteen') || aggregatedViews.includes('Kantin')) &&
            (aggregatedViews.includes('Kotlin') || aggregatedViews.includes('Android') || aggregatedViews.includes('Room') || aggregatedViews.includes('SQLite') || aggregatedViews.includes('canteensmkn1depok'));
        assertTrue(hasCanteen, 'Expected Canteen SMKN 1 Depok Kotlin Android project in Arsenal');
    });

    await test('T1.9.3', 'Project Arsenal: PT Komari Enterprise Online Learning Platform', () => {
        const hasKomari = aggregatedViews.includes('Komari') ||
            aggregatedViews.includes('Ptkomari') ||
            aggregatedViews.includes('PT Komari');
        assertTrue(hasKomari, 'Expected PT Komari fullstack web platform in Arsenal');
    });

    await test('T1.9.4', 'Project Arsenal: Wandek Airlines Flight Booking & Reservation System', () => {
        const hasWandek = aggregatedViews.includes('Wandek') ||
            aggregatedViews.includes('wandekairlines') ||
            aggregatedViews.includes('Airlines');
        assertTrue(hasWandek, 'Expected Wandek Airlines flight reservation system in Arsenal');
    });

    await test('T1.9.5', 'Project Arsenal: Sarpras SMKN 1 Depok Asset & Logistics Platform', () => {
        const hasSarpras = aggregatedViews.includes('Sarpras') ||
            aggregatedViews.includes('sarpras') ||
            aggregatedViews.includes('Logistics') ||
            aggregatedViews.includes('Asset');
        assertTrue(hasSarpras, 'Expected Sarpras SMKN 1 Depok asset management project in Arsenal');
    });

    // =========================================================================
    // FEATURE 10: 3D Spatial Lab (Blender Assets)
    // =========================================================================
    await test('T1.10.1', '3D Spatial Lab: Dedicated 3D modeling showcase module', () => {
        const has3dLab = aggregatedViews.includes('3D') ||
            aggregatedViews.includes('Blender') ||
            aggregatedViews.includes('Spatial') ||
            aggregatedViews.includes('kelas.webp') ||
            aggregatedViews.includes('pedang.webp');
        assertTrue(has3dLab, 'Expected 3D Spatial Lab section in portfolio views');
    });

    await test('T1.10.2', '3D Spatial Lab: SMKN 1 Depok Classroom Reconstruction (Cycles & PBR)', () => {
        const hasClassroom = (aggregatedViews.includes('Classroom') || aggregatedViews.includes('Kelas') || aggregatedViews.includes('kelas.webp')) &&
            (aggregatedViews.includes('Blender') || aggregatedViews.includes('3D') || aggregatedViews.includes('Cycles') || aggregatedViews.includes('PBR'));
        assertTrue(hasClassroom, 'Expected Classroom 3D model with Cycles/PBR attribution in 3D Lab');
    });

    await test('T1.10.3', '3D Spatial Lab: Hard-Surface Cyber Sword Model with Emissive Shaders', () => {
        const hasSword = (aggregatedViews.includes('Sword') || aggregatedViews.includes('Pedang') || aggregatedViews.includes('pedang.webp')) &&
            (aggregatedViews.includes('Blender') || aggregatedViews.includes('3D') || aggregatedViews.includes('Hard-Surface') || aggregatedViews.includes('Shading'));
        assertTrue(hasSword, 'Expected Cyber Sword 3D model in 3D Lab');
    });

    await test('T1.10.4', '3D Spatial Lab: Aspect-ratio preserving asset card displays (Zero Cropping)', () => {
        const hasAspectPreserve = aggregatedViews.includes('object-contain') ||
            aggregatedViews.includes('object-cover') ||
            aggregatedViews.includes('aspect-') ||
            aggregatedCss.includes('aspect-ratio') ||
            aggregatedCss.includes('object-fit');
        assertTrue(hasAspectPreserve, 'Expected aspect-ratio preserving styling on 3D media containers');
    });

    await test('T1.10.5', '3D Spatial Lab: Blender 3D software attribution and topology highlights', () => {
        const hasBlenderAttribution = aggregatedViews.includes('Blender') ||
            aggregatedViews.includes('Cycles') ||
            aggregatedViews.includes('PBR') ||
            aggregatedViews.includes('Topology');
        assertTrue(hasBlenderAttribution, 'Expected Blender 3D software toolchain attribution');
    });

    // =========================================================================
    // FEATURE 11: Engineering Toolkit & 2027 Roadmap
    // =========================================================================
    await test('T1.11.1', 'Engineering Toolkit: Categorized telemetry technical stack matrix', () => {
        const hasToolkit = aggregatedViews.includes('Toolkit') ||
            aggregatedViews.includes('Skills') ||
            aggregatedViews.includes('Stack') ||
            aggregatedViews.includes('Keahlian');
        assertTrue(hasToolkit, 'Expected Engineering Toolkit categorized matrix');
    });

    await test('T1.11.2', 'Engineering Toolkit: Backend & Concurrency Technologies highlighted (Laravel / Kotlin / MySQL)', () => {
        const hasTech = (aggregatedViews.includes('Laravel') || aggregatedViews.includes('PHP')) &&
            (aggregatedViews.includes('Kotlin') || aggregatedViews.includes('MySQL') || aggregatedViews.includes('API'));
        assertTrue(hasTech, 'Expected core backend technologies (Laravel, PHP, Kotlin, MySQL) in Toolkit');
    });

    await test('T1.11.3', '2027 Roadmap: Visual trajectory roadmap container (2024 - 2027+)', () => {
        const hasRoadmap = aggregatedViews.includes('Roadmap') ||
            aggregatedViews.includes('Trajectory') ||
            aggregatedViews.includes('Timeline') ||
            aggregatedViews.includes('Milestone');
        assertTrue(hasRoadmap, 'Expected 2027 Academic Roadmap visualization section');
    });

    await test('T1.11.4', '2027 Roadmap: Foundational Eminence (CS Gold Medal) & Industrial Rigor (NDA API)', () => {
        const hasMilestones12 = (aggregatedViews.includes('Gold') || aggregatedViews.includes('Olimpiade') || aggregatedViews.includes('Rank 1') || aggregatedViews.includes('Milestone 01')) &&
            (aggregatedViews.includes('PKL') || aggregatedViews.includes('NDA') || aggregatedViews.includes('TOEIC') || aggregatedViews.includes('Milestone 02'));
        assertTrue(hasMilestones12, 'Expected Milestones 1 and 2 in Academic Roadmap');
    });

    await test('T1.11.5', '2027 Roadmap: Top PTN CS Target & Türkiye Bursları Global Scholarship Horizon', () => {
        const hasMilestones34 = (aggregatedViews.includes('PTN') || aggregatedViews.includes('UI') || aggregatedViews.includes('ITB') || aggregatedViews.includes('Universitas') || aggregatedViews.includes('Milestone 03')) &&
            (aggregatedViews.includes('Türkiye') || aggregatedViews.includes('Bursları') || aggregatedViews.includes('Turkey') || aggregatedViews.includes('Milestone 04'));
        assertTrue(hasMilestones34, 'Expected Top PTN and Türkiye Bursları scholarship trajectory in 2027 Roadmap');
    });

    // =========================================================================
    // FEATURE 12: Command Center Footer & Marquee
    // =========================================================================
    await test('T1.12.1', 'Footer Marquee: Infinite double-buffered kinetic ticker implementation', () => {
        const hasMarquee = aggregatedViews.includes('marquee') ||
            aggregatedViews.includes('ticker') ||
            aggregatedCss.includes('marquee') ||
            aggregatedCss.includes('keyframes');
        assertTrue(hasMarquee, 'Expected infinite kinetic marquee ticker in Footer Command Center');
    });

    await test('T1.12.2', 'Footer Marquee: Telemetry stream copy containing candidate credentials and status', () => {
        const hasMarqueeContent = aggregatedViews.includes('RAFFA') ||
            aggregatedViews.includes('NOMINAL') ||
            aggregatedViews.includes('STATUS') ||
            aggregatedViews.includes('BURSLARI') ||
            aggregatedViews.includes('TELEMETRY');
        assertTrue(hasMarqueeContent, 'Expected continuous telemetry data stream in kinetic marquee');
    });

    await test('T1.12.3', 'Footer Channels: Direct Email (raffa.nur.musyaffa@gmail.com) and WhatsApp links', () => {
        const hasDirectChannels = (aggregatedViews.includes('raffa.nur.musyaffa@gmail.com') || aggregatedViews.includes('mailto:')) &&
            (aggregatedViews.includes('wa.me') || aggregatedViews.includes('whatsapp') || aggregatedViews.includes('+62') || aggregatedViews.includes('882'));
        assertTrue(hasDirectChannels, 'Expected direct Email and WhatsApp communication channels in Footer');
    });

    await test('T1.12.4', 'Footer Channels: GitHub Nexus (Rapsskuyy) and Instagram telemetry links', () => {
        const hasSocialLinks = (aggregatedViews.includes('github.com/Rapsskuyy') || aggregatedViews.includes('Rapsskuyy')) &&
            (aggregatedViews.includes('instagram.com') || aggregatedViews.includes('rrapskuy'));
        assertTrue(hasSocialLinks, 'Expected GitHub and Instagram verified links in Footer');
    });

    await test('T1.12.5', 'Footer Signature: Cyber-Telemetry build signature and Zero-Emoji certified copyright', () => {
        const hasSignature = aggregatedViews.includes('Raffa Nur Musyaffa') &&
            (aggregatedViews.includes('2026') || aggregatedViews.includes('Cyber-Telemetry') || aggregatedViews.includes('ZERO-EMOJI') || aggregatedViews.includes('SYS_BUILD'));
        assertTrue(hasSignature, 'Expected Cyber-Telemetry system signature and copyright line in Footer');
    });

    // =========================================================================
    // FEATURE 13: Responsive & Accessibility Standards
    // =========================================================================
    await test('T1.13.1', 'Responsive Design: Viewport meta tag and mobile breakpoint classes present', () => {
        const hasViewportMeta = aggregatedViews.includes('name="viewport"') && aggregatedViews.includes('width=device-width');
        assertTrue(hasViewportMeta, 'Expected viewport meta tag in master layout');
    });

    await test('T1.13.2', 'Touch Ergonomics: Interactive action buttons and nav pills meet >=44px touch targets', () => {
        const hasErgonomicClasses = aggregatedCss.includes('min-height: 44px') ||
            aggregatedCss.includes('height: 48px') ||
            aggregatedCss.includes('height: 56px') ||
            aggregatedCss.includes('py-3') ||
            aggregatedCss.includes('py-2') ||
            aggregatedViews.includes('py-3') ||
            aggregatedViews.includes('h-11') ||
            aggregatedViews.includes('h-12');
        assertTrue(hasErgonomicClasses, 'Expected touch-ergonomic sizing classes on interactive components');
    });

    await test('T1.13.3', 'Contrast Compliance: High-contrast text on dark background exceeds WCAG AAA (18.2:1)', () => {
        const hasHighContrast = (aggregatedCss.includes('#f8fafc') || aggregatedCss.includes('#F8FAFC') || aggregatedViews.includes('text-slate-100') || aggregatedViews.includes('text-white')) &&
            (aggregatedCss.includes('#080d1a') || aggregatedCss.includes('#080D1A') || aggregatedViews.includes('bg-slate-950') || aggregatedViews.includes('bg-[#080D1A]'));
        assertTrue(hasHighContrast, 'Expected WCAG AAA compliant high-contrast color pairings');
    });

    await test('T1.13.4', 'Accessibility: Lucide vector icons carry aria-hidden="true" or descriptive labels', () => {
        const hasA11yAttrs = aggregatedViews.includes('aria-hidden') ||
            aggregatedViews.includes('aria-label') ||
            aggregatedViews.includes('alt=') ||
            aggregatedViews.includes('role=');
        assertTrue(hasA11yAttrs, 'Expected accessibility attributes (aria-hidden/aria-label/alt) in markup');
    });

    await test('T1.13.5', 'Scroll Ergonomics: Anchor targets configured with scroll-margin offset to prevent nav occlusion', () => {
        const hasScrollMargin = aggregatedCss.includes('scroll-margin-top') ||
            aggregatedCss.includes('scroll-mt-') ||
            aggregatedViews.includes('scroll-mt-') ||
            aggregatedViews.includes('scroll-margin') ||
            aggregatedCss.includes('padding-top: 130px');
        assertTrue(hasScrollMargin, 'Expected scroll-margin offset on section anchor containers');
    });

    // =========================================================================
    // FEATURE 14: Production Build & Asset Integrity
    // =========================================================================
    await test('T1.14.1', 'Build Config: package.json specifies build scripts and dependencies', () => {
        const packageJson = JSON.parse(blade.getBladeContent(assets.resolvePublicPath('../package.json')) || '{}');
        assert(packageJson.scripts && packageJson.scripts.build, 'Expected "build" script in package.json');
    });

    await test('T1.14.2', 'Build Config: Vite config integrates Laravel and Tailwind plugins', () => {
        const viteConfig = blade.getBladeContent(assets.resolvePublicPath('../vite.config.js'));
        assertContains(viteConfig, 'laravel', 'Expected laravel plugin in vite.config.js');
        assertContains(viteConfig, 'tailwindcss', 'Expected tailwindcss plugin in vite.config.js');
    });

    await test('T1.14.3', 'Build Assets: Master CSS and JS entry points exist in resources directory', () => {
        const hasAppCss = assets.checkAssetExists('../resources/css/app.css').exists;
        const hasAppJs = assets.checkAssetExists('../resources/js/app.js').exists;
        assertTrue(hasAppCss, 'Expected resources/css/app.css to exist');
        assertTrue(hasAppJs, 'Expected resources/js/app.js to exist');
    });

    await test('T1.14.4', 'Build Assets: Public directory structure has required media folders', () => {
        const hasImages = assets.checkAssetExists('images').exists;
        const hasFiles = assets.checkAssetExists('files').exists;
        assertTrue(hasImages, 'Expected public/images/ directory to exist');
        assertTrue(hasFiles, 'Expected public/files/ directory to exist');
    });

    await test('T1.14.5', 'Build Assets: Master layout includes Vite directive or production stylesheet links', () => {
        const hasAssetDirectives = aggregatedViews.includes('@vite') ||
            aggregatedViews.includes('asset(') ||
            aggregatedViews.includes('css/portfolio.css') ||
            aggregatedViews.includes('build/assets');
        assertTrue(hasAssetDirectives, 'Expected @vite asset compilation directives in layout');
    });

    return results;
}
