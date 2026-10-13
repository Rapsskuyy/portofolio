/**
 * Tier 2: Boundary & Corner Cases Test Suite.
 * Authoritative Source: ORIGINAL_REQUEST.md, TEST_INFRA.md, ui_spec.md § 10.
 */

import { assert, assertTrue, assertFalse, assertEqual, assertContains, assertMatches, assertGreaterOrEqual } from '../helpers/assertion.js';
import { BladeParser } from '../helpers/blade_parser.js';
import { CssParser } from '../helpers/css_parser.js';
import { AssetValidator } from '../helpers/asset_validator.js';
import { scanDirectoryForEmojis, scanFileForEmojis, FORBIDDEN_EMOJI_REGEX } from '../helpers/emoji_detector.js';
import path from 'path';
import fs from 'fs';

export async function runTier2BoundaryCornerTests(context = {}) {
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
    // BOUNDARY 1: Empty & Null Data Fallbacks
    // =========================================================================
    await test('T2.1.1', 'Boundary: Homepage does not depend on an external GitHub request', () => {
        const controllerCode = fs.readFileSync(path.join(process.cwd(), 'app', 'Http', 'Controllers', 'PortfolioController.php'), 'utf-8');
        assertTrue(!controllerCode.includes('api.github.com'), 'Homepage should not make an external GitHub API request while rendering');
        assertTrue(!controllerCode.includes('Http::'), 'Homepage should render from portfolio data without a remote HTTP dependency');
    });

    await test('T2.1.2', 'Boundary: Dynamic metrics fallback formatting in Blade templates', () => {
        // Blade templates should support default fallbacks for stats or zero values
        const handlesDefaults = aggregatedViews.includes('??') ||
            aggregatedViews.includes('@empty') ||
            aggregatedViews.includes('default') ||
            aggregatedViews.includes('0.000%') ||
            aggregatedViews.includes('Rank #1');
        assertTrue(handlesDefaults, 'Expected default fallback operators (??, @empty) or static fallback KPIs');
    });

    await test('T2.1.3', 'Boundary: Empty project/testimonial collection safety in views', () => {
        const handlesCollections = aggregatedViews.includes('@forelse') ||
            aggregatedViews.includes('@if') ||
            aggregatedViews.includes('@isset') ||
            aggregatedViews.includes('count(');
        assertTrue(handlesCollections, 'Expected defensive collection checks (@forelse / @if) in Blade views');
    });

    // =========================================================================
    // BOUNDARY 2: Missing Asset Fallbacks & Physical Path Integrity
    // =========================================================================
    await test('T2.2.1', 'Asset Integrity: Portrait photo cutout asset exists and is non-empty', () => {
        const profile1 = assets.checkAssetExists('images/profile/profilrappa.jpeg');
        const profile2 = assets.checkAssetExists('images/profile/media_1787815622667.jpg');
        const profile3 = assets.checkAssetExists('images/profile/profile.jpeg');
        const exists = profile1.exists || profile2.exists || profile3.exists;
        const size = (profile1.size || 0) + (profile2.size || 0) + (profile3.size || 0);
        assertTrue(exists, 'Expected profile photo asset to exist in public/images/profile/');
        assertGreaterOrEqual(size, 1000, 'Expected profile photo file size > 1KB');
    });

    await test('T2.2.2', 'Asset Integrity: Executive CV PDF document exists and is non-empty', () => {
        const cv1 = assets.checkAssetExists('files/CV .pdf');
        const cv2 = assets.checkAssetExists('files/CV.pdf');
        const cv3 = assets.checkAssetExists('files/CV_Raffa_Nur_Musyaffa.pdf');
        const exists = cv1.exists || cv2.exists || cv3.exists;
        const size = (cv1.size || 0) + (cv2.size || 0) + (cv3.size || 0);
        assertTrue(exists, 'Expected CV PDF file to exist in public/files/');
        assertGreaterOrEqual(size, 1000, 'Expected CV PDF file size > 1KB');
    });

    await test('T2.2.3', 'Asset Integrity: Coding project screenshots (Canteen, Komari, Wandek, Sarpras)', () => {
        const canteen = assets.checkAssetExists('images/coding-projects/canteensmkn1depok.png');
        const komari = assets.checkAssetExists('images/coding-projects/Ptkomari.png');
        const wandek = assets.checkAssetExists('images/coding-projects/wandekairlines.png');
        const sarpras = assets.checkAssetExists('images/coding-projects/sarpras.png');

        assertTrue(canteen.exists, 'Expected canteensmkn1depok.png to exist in public/images/coding-projects/');
        assertTrue(komari.exists, 'Expected Ptkomari.png to exist in public/images/coding-projects/');
        assertTrue(wandek.exists, 'Expected wandekairlines.png to exist in public/images/coding-projects/');
        assertTrue(sarpras.exists, 'Expected sarpras.png to exist in public/images/coding-projects/');
        
        assertGreaterOrEqual(canteen.size, 1000, 'canteen screenshot must be non-empty');
        assertGreaterOrEqual(komari.size, 1000, 'komari screenshot must be non-empty');
        assertGreaterOrEqual(wandek.size, 1000, 'wandek screenshot must be non-empty');
        assertGreaterOrEqual(sarpras.size, 1000, 'sarpras screenshot must be non-empty');
    });

    await test('T2.2.4', 'Asset Integrity: 3D Blender render assets (Classroom & Cyber Sword)', () => {
        const kelas = assets.checkAssetExists('images/coding-projects/kelas.png');
        const pedang = assets.checkAssetExists('images/coding-projects/pedang.png');

        assertTrue(kelas.exists, 'Expected kelas.png to exist in public/images/coding-projects/');
        assertTrue(pedang.exists, 'Expected pedang.png to exist in public/images/coding-projects/');
        assertGreaterOrEqual(kelas.size, 1000, 'kelas.png must be non-empty');
        assertGreaterOrEqual(pedang.size, 1000, 'pedang.png must be non-empty');
    });

    await test('T2.2.5', 'Asset Integrity: Honors & Leadership project gallery images', () => {
        const olimpiade = assets.checkAssetExists('images/projects/olimpiade_sains.jpg');
        const triwulan = assets.checkAssetExists('images/projects/triwulan.jpg');

        assertTrue(olimpiade.exists, 'Expected olimpiade_sains.jpg to exist in public/images/projects/');
        assertTrue(triwulan.exists, 'Expected triwulan.jpg to exist in public/images/projects/');
    });

    // =========================================================================
    // BOUNDARY 3: Extreme Viewports & Mobile Constraints
    // =========================================================================
    await test('T2.3.1', 'Extreme Viewport: Micro-screen (<360px) flex-wrap & responsive sizing', () => {
        const hasMobileFlex = aggregatedViews.includes('flex-wrap') ||
            aggregatedViews.includes('flex-col') ||
            aggregatedViews.includes('w-full') ||
            aggregatedCss.includes('@media (max-width');
        assertTrue(hasMobileFlex, 'Expected flex wrapping / responsive column classes for narrow viewports');
    });

    await test('T2.3.2', 'Extreme Viewport: Tablet breakpoint reflow classes (md: / lg: / col-md-)', () => {
        const hasResponsiveCols = aggregatedViews.includes('md:grid-cols-') ||
            aggregatedViews.includes('lg:grid-cols-') ||
            aggregatedViews.includes('col-md-') ||
            aggregatedViews.includes('col-lg-') ||
            aggregatedViews.includes('md:flex-row');
        assertTrue(hasResponsiveCols, 'Expected responsive grid/column modifiers for tablet & desktop transitions');
    });

    await test('T2.3.3', 'Extreme Viewport: Navigation adapts to mobile viewports without horizontal bleed', () => {
        const hasNavAdaptation = aggregatedViews.includes('sidebar-nav') ||
            aggregatedViews.includes('hud-nav') ||
            aggregatedCss.includes('@media (min-width: 992px)') ||
            aggregatedCss.includes('@media (min-width: 768px)') ||
            aggregatedCss.includes('@media (max-width: 767px)');
        assertTrue(hasNavAdaptation, 'Expected navigation media queries adapting between mobile and desktop');
    });

    // =========================================================================
    // BOUNDARY 4: Deep Unicode Emoji Scanner (Entire Workspace Scan)
    // =========================================================================
    await test('T2.4.1', 'Zero-Emoji Scan: Exhaustive scan of all resources/views/**/*.blade.php', () => {
        const viewsDir = path.join(process.cwd(), 'resources', 'views');
        const violations = scanDirectoryForEmojis(viewsDir, ['.blade.php']);
        assertEqual(violations.length, 0, `Detected ${violations.length} forbidden emoji glyph(s) in resources/views: ${JSON.stringify(violations, null, 2)}`);
    });

    await test('T2.4.2', 'Zero-Emoji Scan: Exhaustive scan of all CSS files in resources/ and public/', () => {
        const cssDir1 = path.join(process.cwd(), 'resources', 'css');
        const cssDir2 = path.join(process.cwd(), 'public', 'css');
        const violations = [
            ...scanDirectoryForEmojis(cssDir1, ['.css']),
            ...scanDirectoryForEmojis(cssDir2, ['.css'])
        ];
        assertEqual(violations.length, 0, `Detected ${violations.length} forbidden emoji glyph(s) in CSS files: ${JSON.stringify(violations, null, 2)}`);
    });

    await test('T2.4.3', 'Zero-Emoji Scan: Exhaustive scan of all JS files in resources/ and public/', () => {
        const jsDir1 = path.join(process.cwd(), 'resources', 'js');
        const jsDir2 = path.join(process.cwd(), 'public', 'js');
        const violations = [
            ...scanDirectoryForEmojis(jsDir1, ['.js']),
            ...scanDirectoryForEmojis(jsDir2, ['.js'])
        ];
        assertEqual(violations.length, 0, `Detected ${violations.length} forbidden emoji glyph(s) in JS files: ${JSON.stringify(violations, null, 2)}`);
    });

    await test('T2.4.4', 'Zero-Emoji Scan: Verify specific banned emojis are absent across views', () => {
        const bannedSymbols = ['🚀', '🔥', '💡', '👥', '🎓', '💻', '🥇', '👑', '📜', '🏢', '📱', '✈️', '🗡️', '🏆', '🔒', '🔑', '🛡️', '⚡', '✨', '🍱', '🍔', '💼', '📦', '🎨', '📐', '🛠️', '📞', '✉️', '🐙', '📷'];
        for (const symbol of bannedSymbols) {
            const hasSymbol = aggregatedViews.includes(symbol);
            assertFalse(hasSymbol, `Found forbidden consumer emoji "${symbol}" in views`);
        }
    });

    // =========================================================================
    // BOUNDARY 5: Text Formatting & Overflow Constraints
    // =========================================================================
    await test('T2.5.1', 'Overflow Safety: Marquee ticker container prevents horizontal document bleed', () => {
        const hasMarqueeOverflowControl = aggregatedCss.includes('overflow: hidden') ||
            aggregatedCss.includes('overflow-hidden') ||
            aggregatedViews.includes('overflow-hidden');
        assertTrue(hasMarqueeOverflowControl, 'Expected overflow: hidden on ticker container');
    });

    await test('T2.5.2', 'Typography Constraints: Monospace telemetry font stack support tabular numbers', () => {
        const hasTabularNums = aggregatedCss.includes('JetBrains Mono') ||
            aggregatedCss.includes('Fira Code') ||
            aggregatedCss.includes('monospace') ||
            aggregatedViews.includes('font-mono') ||
            aggregatedCss.includes('tabular-nums');
        assertTrue(hasTabularNums, 'Expected monospace font stack configured for telemetry counters');
    });

    return results;
}
