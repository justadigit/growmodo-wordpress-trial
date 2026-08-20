# Estatien WordPress Trial — Codex Instructions

This repository contains a classic custom WordPress theme for the Growmodo assessment.

## Core Rules

- Use WordPress, PHP, HTML5, CSS, and minimal vanilla JavaScript only.
- Do not introduce React, Next.js, Vue, Laravel, Elementor, Divi, WPBakery, Tailwind, or page builders.
- Preserve the current architecture unless there is a clear technical problem.
- Prefer native WordPress APIs and template hierarchy.
- Keep the implementation simple and appropriate for a time-boxed assessment.
- Preserve Figma design fidelity.
- Prioritize quality over quantity.

## WordPress Development

- Use `wp_enqueue_style()` and `wp_enqueue_script()`.
- Never hardcode theme asset paths when WordPress helpers are available.
- Use reusable template parts.
- Escape output.
- Sanitize input.
- Verify nonces for form/meta writes.
- Check capabilities before modifying content.
- Prefer WordPress-native functionality over unnecessary plugins.
- Avoid fake/dead links and fake functionality.
- Use semantic and accessible HTML.

## Theme Architecture

The custom theme lives at:

`theme/estatien/`

Important files include:

- `functions.php`
- `front-page.php`
- `header.php`
- `footer.php`
- `page.php`
- `single-property.php`
- `archive-property.php`
- `template-parts/`
- `assets/css/main.css`
- `assets/js/main.js`

Do not turn `functions.php` into a dumping ground.

## CSS

- Preserve existing CSS variables and design system.
- Use Grid/Flexbox and responsive media queries.
- Do not introduce a CSS framework.
- Avoid unnecessary magic-value rewrites when the existing Figma-matched value is intentional.
- Check desktop, tablet, and mobile behavior after styling changes.

## JavaScript

- Vanilla JavaScript only unless there is a strong existing project reason otherwise.
- Keep interactions accessible.
- Do not add large libraries for simple interactions.

## Before Finishing Work

- Review the existing implementation before editing.
- Run PHP syntax checks when available.
- Check browser console for JavaScript errors.
- Search for dead `href="#"` links.
- Review `git diff`.
- Do not modify unrelated files.
- Report what changed and anything intentionally left unfinished.

For detailed conventions, read:

`docs/WORDPRESS-STANDARDS.md`
