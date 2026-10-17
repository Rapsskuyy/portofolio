# Responsive Hero Recovery Plan

## Objective

Repair the hero at phone and tablet widths without changing the approved desktop composition. The result must present one coherent sequence: copy, actions, portrait, and tools—without clipped controls, watermark-only photography, hidden tools, or fixed-navigation overlap.

## Scope and constraints

- Keep the current desktop layout at `min-width: 1200px`, photo rotation, and moving tools marquee.
- Do not add packages, assets, backend changes, database changes, commits, or deployment work.
- Follow `DESIGN.md` and the Dapur anti-slop UI/mobile rules: distinct responsive states, no hidden content used as a layout fix, no horizontal page overflow, and safe fixed navigation.

## Root causes

1. `public/css/portfolio.css` contains two conflicting phone/tablet hero systems. The older blocks turn the photo into an absolute, low-opacity watermark and hide `.hero-tech-stack`; newer blocks try to restore a real portrait/tools layout but do not reset every inherited property.
2. On tablet, the old `display: none !important` for tools wins, while absolute positioning, `inset`, opacity, and the gradient overlay remain active for the portrait.
3. On mobile, several legacy button and image rules still participate in the cascade. The fixed bottom navigation can cover the lower portrait, and the exact CTA clipping must be checked from computed layout rather than hidden with `overflow`.
4. The portfolio CSS and JS use a fixed cache query value in `resources/views/portfolio/index.blade.php`, so normal reloads may serve an older stylesheet.
5. `public/js/portfolio.js` applies hero parallax at every width; narrow layouts must explicitly own their transform state.

## Implementation phases

### 1. Establish canonical responsive ownership

Files: `public/css/portfolio.css`

- Preserve the existing `min-width: 1200px` hero rules.
- Remove or relocate only the superseded **hero-specific** declarations from the older `max-width` and watermark blocks; leave unrelated About, modal, footer, and navigation rules in those blocks intact.
- Define one canonical tablet range (`769px–1199px`) and one canonical phone range (`<=768px`) placed after base hero styles.
- Each range explicitly defines hero container display, grid areas, dimensions, padding, overflow, positioning/insets, opacity, transforms, and alignment so legacy values cannot leak through.

Acceptance: at 768/769px and 1199/1200px, exactly the intended responsive state wins in computed styles.

### 2. Rebuild the phone hero as natural document flow

Files: `public/css/portfolio.css`

- Use a single-column order: copy → portrait → tools.
- Keep hero height content-led; do not force it into one viewport or create a blank row.
- Keep the two primary CTAs full-row and GitHub/Say Hello as a two-column row. All grid children use `min-width: 0`; every control remains at least 44px high.
- Make the portrait a centred in-flow card, constrained to available width (target cap around 260–280px), with consistent aspect ratio and safe crop for every rotating image.
- Explicitly reset old image `right`, `bottom`, `inset`, opacity, and background-overlay behavior. Keep floating badges hidden only on phone.
- Keep tools visible and horizontally scrollable if needed; preserve motion except for reduced-motion users.

Acceptance: at 320, 375, 390, and 430px, no CTA, photo, or text is clipped and no page-level horizontal scrolling occurs.

### 3. Rebuild the tablet hero as a real two-column composition

Files: `public/css/portfolio.css`

- Use fluid `minmax(0, …)` tracks for copy and portrait, with tools on a dedicated second row.
- Make the portrait an in-flow, visible element by clearing legacy absolute positioning, opacity, overlay, pointer-event, and transform values.
- Explicitly restore tools to `display: flex` after removing the old hiding declaration.
- Use balanced, content-led vertical padding rather than the legacy 650px/820px cover treatment; keep the compact two-by-two CTA grid.
- At the narrow tablet boundary, allow a deliberate stack if two columns no longer hold without squeezing content.

Acceptance: at 769, 820, 1024, and 1199px, the user sees normal text, a full portrait, and tools—never a faint background photo with a large empty hero.

### 4. Make motion and fixed navigation responsive-safe

Files: `public/css/portfolio.css`, `public/js/portfolio.js`

- Limit hero parallax to desktop (`>=1200px`) and clear any inline transform when crossing into tablet/phone ranges.
- Preserve existing six-second local-photo rotation, hidden-tab pause, and `prefers-reduced-motion` support.
- Preserve the two duplicated marquee groups for the continuous logo loop. Reduced motion must present reachable static logos instead.
- Consolidate bottom-nav height and `env(safe-area-inset-bottom)` reservation into one source of truth. Confirm the footer and all hero content can scroll above the fixed nav without adding artificial hero padding.

Acceptance: photo rotation does not move or cover phone/tablet content; tools keep moving on normal motion settings; bottom nav never blocks reachable content.

### 5. Prevent stale asset delivery

Files: `resources/views/portfolio/index.blade.php`

- Replace the fixed cache query values for portfolio CSS/JS with values derived from the respective local file modification time, using the existing direct asset approach.
- Keep all current preload and defer behavior unchanged.

Acceptance: a normal browser reload requests the latest CSS/JS without requiring `Ctrl + F5`.

### 6. Verify before handoff

Files: existing test suite; no production changes

- Run `php artisan test tests/Feature/PublicPortfolioSafetyTest.php`, `node --check public/js/portfolio.js`, and `git diff --check`.
- Test in a real browser with cache enabled at phone widths 320/375/390/430px, tablet widths 768/769/820/1024/1199px in both orientations where practical, and desktop widths 1200/1366/1440/1920px.
- Inspect computed styles and assert `document.documentElement.scrollWidth <= document.documentElement.clientWidth` at each narrow viewport.
- Confirm all four CTAs stay inside the content rectangle, all three rotating images retain their card crop, tools are present, marquee transform advances over time, and reduced motion gives an accessible static state.
- Check theme toggle, keyboard focus, anchor navigation, and a full scroll through the footer with the bottom nav active.

## Expected files to change

- `public/css/portfolio.css`
- `public/js/portfolio.js`
- `resources/views/portfolio/index.blade.php`

## Risks

- Deleting an entire legacy media block could regress unrelated sections. The implementation must extract only hero declarations and keep non-hero rules untouched.
- The visual regression needs browser evidence; passing PHP tests alone cannot prove layout correctness.
