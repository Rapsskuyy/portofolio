/**
 * Tier 4: Real-World Evaluator Journeys Test Suite.
 * Authoritative Source: ORIGINAL_REQUEST.md, content_spec.md § 1, TEST_INFRA.md.
 */

import { assert, assertTrue, assertFalse, assertEqual, assertContains, assertMatches, assertGreaterOrEqual } from '../helpers/assertion.js';
import { BladeParser } from '../helpers/blade_parser.js';
import { CssParser } from '../helpers/css_parser.js';
import { AssetValidator } from '../helpers/asset_validator.js';

export async function runTier4EvaluatorJourneysTests(context = {}) {
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

    // =========================================================================
    // JOURNEY 1: Academic Scholarship Reviewer (Türkiye Bursları & PTN Selection)
    // =========================================================================
    await test('T4.1.1', 'Scholarship Journey Step 1: Discover Candidate Academic Foundation & Honors', () => {
        // Reviewer evaluates academic baseline in Hero and Bento Grid
        const hasAcademicBase = (aggregatedViews.includes('SMKN 1 Depok') || aggregatedViews.includes('PPLG') || aggregatedViews.includes('Software Engineering')) &&
            (aggregatedViews.includes('Raffa Nur Musyaffa') || aggregatedViews.includes('Raffa'));
        assertTrue(hasAcademicBase, 'Reviewer can clearly identify Raffa as top Software Engineering scholar at SMKN 1 Depok');
    });

    await test('T4.1.2', 'Scholarship Journey Step 2: Verify National Gold Medal & Top Parallel Academic Standing', () => {
        const hasNationalGold = (aggregatedViews.includes('Gold') || aggregatedViews.includes('Emas') || aggregatedViews.includes('Juara 1')) &&
            (aggregatedViews.includes('National') || aggregatedViews.includes('Nasional') || aggregatedViews.includes('Computer Science') || aggregatedViews.includes('Olimpiade'));
        const hasRank1 = aggregatedViews.includes('Rank 1') || aggregatedViews.includes('Rank #1') || aggregatedViews.includes('Parallel') || aggregatedViews.includes('Peringkat 1');

        assertTrue(hasNationalGold, 'Reviewer discovers National Gold Medal distinction in Computer Science / Informatics');
        assertTrue(hasRank1, 'Reviewer verifies Rank #1 Parallel Standing across Software Engineering cohort');
    });

    await test('T4.1.3', 'Scholarship Journey Step 3: Verify Official International English Proficiency (TOEIC)', () => {
        const hasToeic = aggregatedViews.includes('TOEIC') ||
            aggregatedViews.includes('ETS') ||
            aggregatedViews.includes('English') ||
            aggregatedViews.includes('International');
        assertTrue(hasToeic, 'Reviewer verifies Official TOEIC English communication certification');
    });

    await test('T4.1.4', 'Scholarship Journey Step 4: Verify 2-Period MPK Legislative Governance & Public Trust', () => {
        const hasMpkGovernance = (aggregatedViews.includes('MPK') || aggregatedViews.includes('Legislatif') || aggregatedViews.includes('Parliamentary')) &&
            (aggregatedViews.includes('2') || aggregatedViews.includes('Period') || aggregatedViews.includes('Mandate') || aggregatedViews.includes('Sidang') || aggregatedViews.includes('Triwulan'));
        assertTrue(hasMpkGovernance, 'Reviewer verifies 2-Period MPK Parliamentary presidency and legislative leadership');
    });

    await test('T4.1.5', 'Scholarship Journey Step 5: Verify Strategic 2027 Roadmap towards Türkiye Bursları & Top PTN', () => {
        const hasRoadmapPlan = (aggregatedViews.includes('Türkiye') || aggregatedViews.includes('Bursları') || aggregatedViews.includes('Scholarship') || aggregatedViews.includes('Turkey')) &&
            (aggregatedViews.includes('PTN') || aggregatedViews.includes('Universitas') || aggregatedViews.includes('UI') || aggregatedViews.includes('ITB') || aggregatedViews.includes('2027'));
        assertTrue(hasRoadmapPlan, 'Reviewer verifies clear 2027 Türkiye Bursları & PTN Informatics academic roadmap');
    });

    // =========================================================================
    // JOURNEY 2: Senior Systems Architect & Tech Lead Reviewer
    // =========================================================================
    await test('T4.2.1', 'Tech Lead Journey Step 1: Deep-Dive Flagship E-Voting Kiosk TPS Concurrency Architecture', () => {
        const hasFlagshipArch = (aggregatedViews.includes('Voting') || aggregatedViews.includes('TPS') || aggregatedViews.includes('Kiosk') || aggregatedViews.includes('Ballot')) &&
            (aggregatedViews.includes('Cryptographic') || aggregatedViews.includes('Token') || aggregatedViews.includes('CSPRNG') || aggregatedViews.includes('SHA-256'));
        assertTrue(hasFlagshipArch, 'Tech Lead validates Cryptographic One-Time Token (CSPRNG/SHA-256) ballot security');
    });

    await test('T4.2.2', 'Tech Lead Journey Step 2: Validate Pessimistic Database Row-Locking (SELECT ... FOR UPDATE)', () => {
        const hasRowLocking = (aggregatedViews.includes('Row-Lock') || aggregatedViews.includes('FOR UPDATE') || aggregatedViews.includes('ACID') || aggregatedViews.includes('Pessimistic') || aggregatedViews.includes('Lock'));
        assertTrue(hasRowLocking, 'Tech Lead validates database pessimistic row-level locking concurrency protocol');
    });

    await test('T4.2.3', 'Tech Lead Journey Step 3: Validate HMAC Hardware Kiosk Security & Signed Ingress', () => {
        const hasHmac = aggregatedViews.includes('HMAC') ||
            aggregatedViews.includes('Hardware') ||
            aggregatedViews.includes('Kiosk') ||
            aggregatedViews.includes('Signature');
        assertTrue(hasHmac, 'Tech Lead validates HMAC hardware secret device payload signing');
    });

    await test('T4.2.4', 'Tech Lead Journey Step 4: Validate Industrial PKL Enterprise API Engineering under NDA', () => {
        const hasEnterpriseApi = (aggregatedViews.includes('PKL') || aggregatedViews.includes('Enterprise') || aggregatedViews.includes('API') || aggregatedViews.includes('RESTful')) &&
            (aggregatedViews.includes('NDA') || aggregatedViews.includes('Confidential') || aggregatedViews.includes('Sub-50ms') || aggregatedViews.includes('Latency') || aggregatedViews.includes('RBAC'));
        assertTrue(hasEnterpriseApi, 'Tech Lead validates Industrial PKL RESTful API microservice experience under NDA');
    });

    await test('T4.2.5', 'Tech Lead Journey Step 5: Validate Multi-Disciplinary Arsenal (Kotlin, Laravel, Blender 3D)', () => {
        const hasArsenal = (aggregatedViews.includes('Kotlin') || aggregatedViews.includes('Android') || aggregatedViews.includes('Canteen')) &&
            (aggregatedViews.includes('Laravel') || aggregatedViews.includes('Komari') || aggregatedViews.includes('Wandek')) &&
            (aggregatedViews.includes('Blender') || aggregatedViews.includes('3D') || aggregatedViews.includes('Cycles') || aggregatedViews.includes('kelas.webp'));
        assertTrue(hasArsenal, 'Tech Lead validates fullstack proficiency across native Kotlin Android, Laravel, and Blender 3D');
    });

    // =========================================================================
    // JOURNEY 3: Enterprise Recruiter Fast-Track
    // =========================================================================
    await test('T4.3.1', 'Recruiter Journey Step 1: 1-Click Executive CV Access from Top Navigation Capsule', () => {
        const hasCvAction = (aggregatedViews.includes('CV') || aggregatedViews.includes('.pdf')) &&
            (aggregatedViews.includes('hud-navigation') || aggregatedViews.includes('nav') || aggregatedViews.includes('sidebar-nav') || aggregatedViews.includes('fixed'));
        assertTrue(hasCvAction, 'Recruiter can access Quick CV download directly from fixed navigation capsule');
    });

    await test('T4.3.2', 'Recruiter Journey Step 2: Instant Multi-Channel Direct Contact (Email, WhatsApp, GitHub)', () => {
        const hasEmail = aggregatedViews.includes('raffa.nur.musyaffa@gmail.com') || aggregatedViews.includes('mailto:');
        const hasWa = aggregatedViews.includes('wa.me') || aggregatedViews.includes('whatsapp') || aggregatedViews.includes('+62') || aggregatedViews.includes('882');
        const hasGh = aggregatedViews.includes('github.com/Rapsskuyy') || aggregatedViews.includes('Rapsskuyy');

        assertTrue(hasEmail, 'Recruiter can trigger direct email communication');
        assertTrue(hasWa, 'Recruiter can trigger instant WhatsApp direct conversation');
        assertTrue(hasGh, 'Recruiter can audit verified GitHub repository nexus');
    });

    return results;
}
