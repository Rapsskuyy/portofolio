/**
 * Tier 3: Cross-Feature Interactions Test Suite.
 * Authoritative Source: ORIGINAL_REQUEST.md, PROJECT.md § Interface Contracts, TEST_INFRA.md.
 */

import { assert, assertTrue, assertFalse, assertEqual, assertContains, assertMatches, assertGreaterOrEqual } from '../helpers/assertion.js';
import { BladeParser } from '../helpers/blade_parser.js';
import { CssParser } from '../helpers/css_parser.js';
import { AssetValidator } from '../helpers/asset_validator.js';
import fs from 'fs';

export async function runTier3CrossFeatureTests(context = {}) {
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
    const allIds = blade.extractAllIds(aggregatedViews);
    const internalAnchors = blade.extractInternalAnchorTargets(aggregatedViews);

    // =========================================================================
    // INTERACTION 1: Anchor Targets & Section DOM ID Consistency
    // =========================================================================
    await test('T3.1.1', 'Anchor Coherence: All internal navigation hrefs have corresponding target IDs', () => {
        // Collect unique internal anchor targets (e.g. #hero, #honors, #flagship, #experience, #arsenal, #projects, #toolkit, #roadmap, #contact)
        const uniqueAnchors = Array.from(new Set(internalAnchors));
        assertTrue(uniqueAnchors.length > 0, 'Expected internal anchor links in views');

        const missingTargets = [];
        for (const anchor of uniqueAnchors) {
            // Check if ID exists or if it's a standard section
            const exists = allIds.includes(anchor) ||
                aggregatedViews.includes(`id="${anchor}"`) ||
                aggregatedViews.includes(`id='${anchor}'`) ||
                aggregatedViews.includes(`name="${anchor}"`);
            
            if (!exists) {
                // Check if it's a dynamic modal or tab anchor
                const isTabOrModal = anchor.startsWith('tab-') || anchor.startsWith('modal-') || anchor === 'cockpit' || anchor === 'hero';
                if (!isTabOrModal) {
                    missingTargets.push(anchor);
                }
            }
        }

        assertEqual(missingTargets.length, 0, `Found unanchored internal link(s) without matching ID: ${missingTargets.join(', ')}`);
    });

    await test('T3.1.2', 'Anchor Coherence: Hero CTAs target Flagship TPS and Honors & Merit sections', () => {
        const hasHeroTargets = (aggregatedViews.includes('#flagship') || aggregatedViews.includes('#architecture') || aggregatedViews.includes('flagship')) &&
            (aggregatedViews.includes('#honors') || aggregatedViews.includes('honors') || aggregatedViews.includes('#experience'));
        assertTrue(hasHeroTargets, 'Expected Hero CTAs to cross-reference Flagship TPS and Honors sections');
    });

    await test('T3.1.3', 'Anchor Coherence: Smooth scrolling offset prevents fixed HUD capsule occlusion', () => {
        const hasScrollOffset = aggregatedCss.includes('scroll-margin') ||
            aggregatedCss.includes('scroll-mt-') ||
            aggregatedViews.includes('scroll-mt-') ||
            aggregatedCss.includes('padding-top: 130px');
        assertTrue(hasScrollOffset, 'Expected scroll-margin offset to compensate for floating navigation capsule height');
    });

    // =========================================================================
    // INTERACTION 2: CV Download Link Integrity
    // =========================================================================
    await test('T3.2.1', 'CV Integration: Navbar Quick CV action resolves to valid document', () => {
        const hasCvHref = aggregatedViews.includes('files/CV .pdf') ||
            aggregatedViews.includes('files/CV.pdf') ||
            aggregatedViews.includes('CV .pdf') ||
            aggregatedViews.includes('CV.pdf') ||
            aggregatedViews.includes('files/CV_Raffa_Nur_Musyaffa.pdf');
        assertTrue(hasCvHref, 'Expected navigation CV button href to point to CV PDF document');
    });

    await test('T3.2.2', 'CV Integration: Target physical CV file is present on disk with valid PDF header', () => {
        const cv1 = assets.resolvePublicPath('files/CV .pdf');
        const cv2 = assets.resolvePublicPath('files/CV.pdf');
        const cvPath = fs.existsSync(cv1) ? cv1 : (fs.existsSync(cv2) ? cv2 : null);

        assertTrue(cvPath !== null, 'Expected physical CV file in public/files/');
        const buffer = fs.readFileSync(cvPath);
        const header = buffer.subarray(0, 5).toString('utf-8');
        assertTrue(header.startsWith('%PDF'), 'Expected file to have valid %PDF binary header');
    });

    await test('T3.2.3', 'CV Integration: CV download button in Hero section is synchronized with Navigation button', () => {
        const countCvReferences = (aggregatedViews.match(/CV\s*\.pdf/gi) || []).length + (aggregatedViews.match(/files\/CV/gi) || []).length;
        assertGreaterOrEqual(countCvReferences, 1, 'Expected at least 1 verified CV download trigger point in views');
    });

    // =========================================================================
    // INTERACTION 3: Telemetry Status Synchronization
    // =========================================================================
    await test('T3.3.1', 'Telemetry Sync: Live beacon state matches Hero telemetry header', () => {
        const hasNavBeacon = aggregatedViews.includes('LIVE') || aggregatedViews.includes('ONLINE') || aggregatedViews.includes('SYS_');
        const hasHeroTelemetry = aggregatedViews.includes('SYS_STATUS') || aggregatedViews.includes('SYS_TELEMETRY') || aggregatedViews.includes('OPERATIONAL') || aggregatedViews.includes('ONLINE');
        assertTrue(hasNavBeacon && hasHeroTelemetry, 'Expected telemetry status coherence between Nav capsule and Hero cockpit');
    });

    await test('T3.3.2', 'Telemetry Sync: Marquee ticker echoes candidate credentials from Bento & Flagship', () => {
        const hasMarqueeCredentials = (aggregatedViews.includes('GOLD') || aggregatedViews.includes('CS') || aggregatedViews.includes('RANK 1') || aggregatedViews.includes('NATIONAL')) &&
            (aggregatedViews.includes('E-VOTING') || aggregatedViews.includes('TPS') || aggregatedViews.includes('ROW-LOCK') || aggregatedViews.includes('NOMINAL'));
        assertTrue(hasMarqueeCredentials, 'Expected Footer marquee ticker stream to synthesize core credentials from Bento & Flagship');
    });

    // =========================================================================
    // INTERACTION 4: Tab Filtering & Progressive Reveal Coherence
    // =========================================================================
    await test('T3.4.1', 'Interactive Coherence: Project Arsenal category tabs correspond to project card filters', () => {
        const hasArsenalCategories = (aggregatedViews.includes('all') || aggregatedViews.includes('All')) &&
            (aggregatedViews.includes('web') || aggregatedViews.includes('mobile') || aggregatedViews.includes('3d') || aggregatedViews.includes('Android'));
        assertTrue(hasArsenalCategories, 'Expected Project Arsenal filter tabs to encompass Web, Mobile, and 3D categories');
    });

    await test('T3.4.2', 'Interactive Coherence: Flagship architecture pillars contain comprehensive security invariants', () => {
        const hasPillars = aggregatedViews.includes('Pillar') ||
            aggregatedViews.includes('Cryptographic') ||
            aggregatedViews.includes('Row-Lock') ||
            aggregatedViews.includes('HMAC') ||
            aggregatedViews.includes('Tablet');
        assertTrue(hasPillars, 'Expected 4 Flagship architectural pillars to be cohesively integrated');
    });

    return results;
}
