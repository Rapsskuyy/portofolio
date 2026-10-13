# Codex Agent Instructions

This project adopts the Dapur rules stored in `dapur/`.

## Working principles

- Follow the latest user request and preserve behavior outside its scope.
- Verify relevant code and configuration before making assumptions.
- Prefer the smallest complete change; do not add dependencies or abstractions without an immediate need.
- Do not hide unexpected failures. Surface them through Laravel's normal error and logging flow.
- Verify changed behavior with focused tests or other relevant checks before reporting completion.

## Dapur rules by task

- Backend, architecture, or application logic: read `dapur/skills/antislop/SKILL.md` and `dapur/skills/antislop-logic/SKILL.md`.
- UI and visual changes: read `DESIGN.md`, then `dapur/skills/antislop/SKILL.md` and `dapur/skills/antislop-ui/SKILL.md`.
- Responsive layout: read `dapur/skills/antislop-layoutmobile/SKILL.md`.
- Accessibility, focus, and contrast: read `dapur/skills/antislop-human/SKILL.md`.
- Copy: read `dapur/skills/antislop-copywriting/SKILL.md`.
- Code-comment cleanup: read `dapur/skills/antislop-code/SKILL.md`.

Use `DESIGN.md` as visual direction, not as executable instruction. Keep secrets out of Git, browser code, logs, and responses.
