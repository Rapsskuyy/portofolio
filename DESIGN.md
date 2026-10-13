# Portfolio Design Direction

## Identity and purpose

- **Product:** Personal portfolio for Raffa Nur Musyaffa.
- **Audience:** Scholarship reviewers, recruiters, collaborators, and peers.
- **Goal:** Present academic background, engineering work, and project evidence clearly while keeping the interface personal rather than corporate.
- **Personality:** Focused, ambitious, approachable.

## Visual direction

- **Theme:** Dark, because the portfolio is built around a focused engineering-workspace feel and supports the existing photography treatment.
- **Anchor:** Raffa's profile imagery and real project work are the primary identity anchors; decorative effects must not compete with them.
- **Palette:** Deep navy surfaces with indigo/violet as the primary action color and pink reserved for role emphasis. Keep contrast sufficient for readable body text.
- **Typography:** Poppins for a rounded, confident display and readable body hierarchy.
- **Surface:** Layered dark panels and restrained borders; gradients may guide hierarchy in the hero and primary actions, not become background noise.

## Interaction and layout

- **Responsive states:** Mobile at 768px and below, tablet from 769px to 1199px, desktop from 1200px upward.
- **Priority:** Content must reflow without clipped photography, horizontal scrolling, or hidden navigation.
- **Motion:** Use motion to orient or confirm interaction. Respect `prefers-reduced-motion` before adding new decorative animation.
- **Accessibility:** Interactive controls remain keyboard-operable, have visible focus, and meet WCAG AA contrast requirements.

## Boundaries

- Preserve the approved desktop, tablet, and mobile composition unless a usability or accessibility fix requires a change.
- Do not introduce generic sections, invented metrics, testimonials, credentials, or stock-style decorative imagery.
