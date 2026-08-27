#!/usr/bin/env node

/**
 * CYBER-TELEMETRY E2E TEST RUNNER
 * Raffa Nur Musyaffa Developer Portfolio
 * 
 * Execution: node tests/e2e/test_runner.js [--tier=1|2|3|4] [--json] [--verbose]
 */

import path from 'path';
import fs from 'fs';
import { runTier1FeatureCoverageTests } from './suites/tier1_feature_coverage.test.js';
import { runTier2BoundaryCornerTests } from './suites/tier2_boundary_corner.test.js';
import { runTier3CrossFeatureTests } from './suites/tier3_cross_feature.test.js';
import { runTier4EvaluatorJourneysTests } from './suites/tier4_evaluator_journeys.test.js';

// ANSI color codes for high-tech telemetry terminal
const colors = {
    reset: '\x1b[0m',
    bold: '\x1b[1m',
    dim: '\x1b[2m',
    cobalt: '\x1b[38;2;37;99;235m',
    cyan: '\x1b[38;2;6;182;212m',
    gold: '\x1b[38;2;250;204;21m',
    emerald: '\x1b[38;2;16;185;129m',
    rose: '\x1b[38;2;239;68;68m',
    slate: '\x1b[38;2;148;163;184m',
    bgNavy: '\x1b[48;2;8;13;26m',
};

async function main() {
    const args = process.argv.slice(2);
    const tierArg = args.find(a => a.startsWith('--tier='));
    const targetTier = tierArg ? tierArg.split('=')[1] : null;
    const jsonOutput = args.includes('--json');
    const verbose = args.includes('--verbose') || args.includes('-v');

    const startTime = Date.now();

    console.log(`\n${colors.cobalt}${colors.bold}================================================================================${colors.reset}`);
    console.log(`${colors.cyan}${colors.bold}   CYBER-TELEMETRY E2E TEST RUNNER // RAFFA NUR MUSYAFFA PORTFOLIO${colors.reset}`);
    console.log(`${colors.slate}   Specification: ORIGINAL_REQUEST.md | PROJECT.md | TEST_INFRA.md${colors.reset}`);
    console.log(`${colors.cobalt}${colors.bold}================================================================================${colors.reset}\n`);

    const allResults = {
        tier1: [],
        tier2: [],
        tier3: [],
        tier4: []
    };

    // Tier 1
    if (!targetTier || targetTier === '1') {
        console.log(`${colors.gold}${colors.bold}◈ RUNNING TIER 1: FEATURE COVERAGE (14 Features x 5 Tests)${colors.reset}`);
        allResults.tier1 = await runTier1FeatureCoverageTests();
        printTierResults(allResults.tier1, verbose);
    }

    // Tier 2
    if (!targetTier || targetTier === '2') {
        console.log(`\n${colors.gold}${colors.bold}◈ RUNNING TIER 2: BOUNDARY & CORNER CASES (Zero-Emoji, Assets, Viewports)${colors.reset}`);
        allResults.tier2 = await runTier2BoundaryCornerTests();
        printTierResults(allResults.tier2, verbose);
    }

    // Tier 3
    if (!targetTier || targetTier === '3') {
        console.log(`\n${colors.gold}${colors.bold}◈ RUNNING TIER 3: CROSS-FEATURE INTERACTIONS (Anchors, CV, Telemetry Sync)${colors.reset}`);
        allResults.tier3 = await runTier3CrossFeatureTests();
        printTierResults(allResults.tier3, verbose);
    }

    // Tier 4
    if (!targetTier || targetTier === '4') {
        console.log(`\n${colors.gold}${colors.bold}◈ RUNNING TIER 4: REAL-WORLD EVALUATOR JOURNEYS (Scholarship, Tech Lead, Recruiter)${colors.reset}`);
        allResults.tier4 = await runTier4EvaluatorJourneysTests();
        printTierResults(allResults.tier4, verbose);
    }

    const flatResults = [
        ...allResults.tier1,
        ...allResults.tier2,
        ...allResults.tier3,
        ...allResults.tier4
    ];

    const passedCount = flatResults.filter(r => r.passed).length;
    const failedCount = flatResults.filter(r => !r.passed).length;
    const totalCount = flatResults.length;
    const totalDuration = Date.now() - startTime;
    const passRate = totalCount > 0 ? ((passedCount / totalCount) * 100).toFixed(1) : '0.0';

    // Summary Report
    console.log(`\n${colors.cobalt}${colors.bold}================================================================================${colors.reset}`);
    console.log(`${colors.cyan}${colors.bold}                         E2E TEST EXECUTION SUMMARY                             ${colors.reset}`);
    console.log(`${colors.cobalt}${colors.bold}================================================================================${colors.reset}`);
    console.log(`  ${colors.slate}Total Test Cases   :${colors.reset} ${colors.bold}${totalCount}${colors.reset}`);
    console.log(`  ${colors.emerald}Passed Test Cases  :${colors.reset} ${colors.bold}${passedCount}${colors.reset}`);
    console.log(`  ${failedCount > 0 ? colors.rose : colors.slate}Failed Test Cases  :${colors.reset} ${colors.bold}${failedCount}${colors.reset}`);
    console.log(`  ${colors.gold}Success Rate       :${colors.reset} ${colors.bold}${passRate}%${colors.reset}`);
    console.log(`  ${colors.cyan}Total Elapsed Time :${colors.reset} ${colors.bold}${totalDuration}ms${colors.reset}`);
    console.log(`${colors.cobalt}${colors.bold}================================================================================${colors.reset}`);

    // Generate JSON report
    const reportsDir = path.join(process.cwd(), 'tests', 'e2e', 'reports');
    if (!fs.existsSync(reportsDir)) {
        fs.mkdirSync(reportsDir, { recursive: true });
    }
    const reportFile = path.join(reportsDir, 'test_report.json');
    const reportPayload = {
        timestamp: new Date().toISOString(),
        summary: {
            total: totalCount,
            passed: passedCount,
            failed: failedCount,
            passRate: `${passRate}%`,
            durationMs: totalDuration
        },
        tiers: {
            tier1_feature_coverage: {
                total: allResults.tier1.length,
                passed: allResults.tier1.filter(r => r.passed).length,
                failed: allResults.tier1.filter(r => !r.passed).length,
                results: allResults.tier1
            },
            tier2_boundary_corner: {
                total: allResults.tier2.length,
                passed: allResults.tier2.filter(r => r.passed).length,
                failed: allResults.tier2.filter(r => !r.passed).length,
                results: allResults.tier2
            },
            tier3_cross_feature: {
                total: allResults.tier3.length,
                passed: allResults.tier3.filter(r => r.passed).length,
                failed: allResults.tier3.filter(r => !r.passed).length,
                results: allResults.tier3
            },
            tier4_evaluator_journeys: {
                total: allResults.tier4.length,
                passed: allResults.tier4.filter(r => r.passed).length,
                failed: allResults.tier4.filter(r => !r.passed).length,
                results: allResults.tier4
            }
        }
    };
    fs.writeFileSync(reportFile, JSON.stringify(reportPayload, null, 2), 'utf-8');
    console.log(`\n${colors.slate}Structured test report generated at:${colors.reset} ${colors.dim}${reportFile}${colors.reset}\n`);

    if (jsonOutput) {
        console.log(JSON.stringify(reportPayload, null, 2));
    }

    if (failedCount > 0) {
        console.log(`${colors.rose}${colors.bold}[FAIL] TEST SUITE FAILED WITH ${failedCount} FAILING TEST(S).${colors.reset}\n`);
        process.exit(1);
    } else {
        console.log(`${colors.emerald}${colors.bold}[SYS_NOMINAL // 100% PASS] ALL E2E TEST TIERS CERTIFIED OPERATIONAL.${colors.reset}\n`);
        process.exit(0);
    }
}

function printTierResults(results, verbose) {
    for (const r of results) {
        if (r.passed) {
            console.log(`  ${colors.emerald}[PASS // ${r.id}]${colors.reset} ${r.name} ${colors.dim}(${r.duration}ms)${colors.reset}`);
        } else {
            console.log(`  ${colors.rose}[FAIL // ${r.id}]${colors.reset} ${r.name} ${colors.dim}(${r.duration}ms)${colors.reset}`);
            console.log(`     ${colors.rose}${colors.dim}Error: ${r.error}${colors.reset}`);
            if (verbose && r.stack) {
                console.log(`     ${colors.dim}${r.stack}${colors.reset}`);
            }
        }
    }
}

main().catch(err => {
    console.error('Fatal error executing test runner:', err);
    process.exit(1);
});
