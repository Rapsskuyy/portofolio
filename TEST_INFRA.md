# E2E Test Infra: Raffa Nur Musyaffa Portfolio (Cyber-Telemetry)

## Test Philosophy
- Opaque-box, requirement-driven. Derives from `ORIGINAL_REQUEST.md`.
- Methodology: Category-Partition + Boundary Value Analysis + Pairwise Combinatorial Testing + Real-World Workload Testing.
- 5-Tier Coverage Strategy:
  - **Tier 1: Feature Coverage** (>=5 test cases per feature covering isolated happy paths).
  - **Tier 2: Boundary & Corner Cases** (Extreme viewport widths, missing asset fallbacks, rapid tab switching, network lag simulation).
  - **Tier 3: Cross-Feature Combinations** (Nav capsule smooth scroll + section telemetry triggers + modal popups + CV download).
  - **Tier 4: Real-World Application Scenarios** (Full evaluator journey: Academic Scholarship Reviewer, Senior Tech Lead Evaluator, Recruiter Fast-Track).
  - **Tier 5: Adversarial Coverage Hardening** (White-box static analysis, zero-emoji regex linting, DOM contrast validation, production asset build integrity).

## Feature Inventory Test Matrix
| # | Feature | Source | Tier 1 | Tier 2 | Tier 3 | Tier 4 |
|---|---------|--------|:------:|:------:|:------:|:------:|
| 1 | Cyber-Telemetry Palette & Tokens | R1 (Lines 11-14) | 5 | 5 | ✓ | ✓ |
| 2 | Chamfered Polygon Card Geometry | R1 (Line 13) | 5 | 5 | ✓ | ✓ |
| 3 | Zero-Emoji Compliance (Lucide) | R1 (Line 13, 33) | 5 | 5 | ✓ | ✓ |
| 4 | Floating Glass HUD Nav Capsule | R1 (Line 12) | 5 | 5 | ✓ | ✓ |
| 5 | Hero Cockpit & Photo Cutout | R2.1 (Line 17) | 5 | 5 | ✓ | ✓ |
| 6 | Honors & Merit Bento Grid | R2.2 (Line 18) | 5 | 5 | ✓ | ✓ |
| 7 | Flagship E-Voting Kiosk TPS Deep-Dive | R2.3 (Line 19) | 5 | 5 | ✓ | ✓ |
| 8 | Experience & Leadership Showcase | R2.4 (Line 20) | 5 | 5 | ✓ | ✓ |
| 9 | Project Arsenal (Kotlin, Laravel) | R2.5 (Line 21) | 5 | 5 | ✓ | ✓ |
| 10 | 3D Blender Lab (Classroom & Sword) | R2.5 (Line 21) | 5 | 5 | ✓ | ✓ |
| 11 | Engineering Toolkit & 2027 Roadmap | R2.6 (Line 22) | 5 | 5 | ✓ | ✓ |
| 12 | Command Center Footer & Marquee | R2.7 (Line 23) | 5 | 5 | ✓ | ✓ |
| 13 | Responsive & Accessibility Standards | R3 (Lines 25-28) | 5 | 5 | ✓ | ✓ |
| 14 | Production Build Execution | R3 (Line 27, 42) | 5 | 5 | ✓ | ✓ |

## Test Runner Architecture
- Runner: Node.js / PHP / Playwright / Jest / custom verification harness.
- Verification command: `node tests/e2e/test_runner.js` and `npm.cmd run build`.
- Pass criterion: 100% test cases pass with exit code 0.
