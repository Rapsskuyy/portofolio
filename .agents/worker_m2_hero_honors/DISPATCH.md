## 2026-08-27T08:03:47Z
You are a Worker subagent: Milestone 2 Specialist (Hero Cockpit & Honors Bento Grid).
Your working directory is: c:/laragon/www/test1 - Copy/.agents/worker_m2_hero_honors

MANDATORY: Read the authoritative requirements at: c:/laragon/www/test1 - Copy/.agents/ORIGINAL_REQUEST.md
Also read:
- c:/laragon/www/test1 - Copy/PROJECT.md
- c:/laragon/www/test1 - Copy/.agents/spec_miner_ui_design/ui_spec.md
- c:/laragon/www/test1 - Copy/.agents/explorer_survey_content/content_spec.md

MANDATORY INTEGRITY WARNING:
DO NOT CHEAT. All implementations must be genuine. DO NOT hardcode test results, create dummy/facade implementations, or circumvent the intended task. A auditor will independently verify your work. Integrity violations WILL be detected and your work WILL be rejected.

Scope & Owned Files:
- `resources/views/portfolio/components/hero.blade.php`
- `resources/views/portfolio/components/honors.blade.php`

Task:
1. In `resources/views/portfolio/components/hero.blade.php`:
   - Implement the Hero Cockpit layout with Cyber-Telemetry styling (Cosmic Navy `#080D1A`, Royal Cobalt `#2563EB`, Trophy Gold `#FACC15`).
   - Include telemetry status tracker (`SYS_TELEMETRY // LOC: DEPOK, ID // STATUS: ACTIVE`), dual-line header, executive mission statement, primary CTAs (`[Inspect Flagship Architecture]` -> `#flagship`, `[Review Honors & Merit]` -> `#honors`, `[Executive CV]` -> `/files/CV .pdf`).
   - Include the 4 KPI telemetry cards (`0.000% Double-Vote Hazard`, `Rank #1 Parallel Standing`, `Gold National Olympiad`, `2-Period MPK Mandate`).
   - Frame Raffa's MPK photo cutout (`images/profile/profilrappa.jpeg` with fallback `media_1787815622667.jpg` or `profile.jpeg`) with dual-layer chamfered polygon HUD styling and 3 floating telemetry chips (National Gold Medalist, Rank 1 Parallel, E-Voting Kiosk Architect).
   - Use Lucide icons exclusively (ZERO emojis).
2. In `resources/views/portfolio/components/honors.blade.php`:
   - Implement the 12-Column Responsive Bento Grid with chamfered HUD borders and Trophy Gold / Cobalt accents.
   - Item 1 (Span 8): National Gold Medal in Computer Science & Informatics (Gold badge, competition breakdown, certified winner callout).
   - Item 2 (Span 4): Rank #1 Parallel Academic Standing (PPLG SMKN 1 Depok, consecutive semesters, core disciplines).
   - Item 3 (Span 4): Official TOEIC International Certification (ETS / Kemendikbud, CEFR B2/C1, Türkiye Bursları alignment).
   - Item 4 (Span 8): Parliamentary Leadership & Presidium Officer (Sidang Triwulan MPK/OSIS, 100+ delegates, 100% ratification).
   - Use Lucide icons exclusively (`Trophy`, `TrendingUp`, `Globe`, `Gavel`, etc. - ZERO emojis).
3. Test compilation: run `npm.cmd run build` to verify there are no syntax or asset resolution errors.
4. Write your detailed handoff report to `c:/laragon/www/test1 - Copy/.agents/worker_m2_hero_honors/handoff.md` and notify orchestrator via send_message.
