# Estatien - Growmodo WordPress Trial

## Overview

This project was developed as a time-boxed WordPress technical assessment for Growmodo. The goal was to translate the provided Estatien dark real-estate Figma design into a responsive, maintainable custom WordPress theme while balancing design fidelity, native WordPress functionality, code quality, and the four-hour assessment constraint.

The implementation focuses on a polished homepage, the main supporting routes, and CMS-managed property content. It intentionally avoids a page builder or separate frontend application so the result stays close to WordPress theme development expectations.

Direct automated Figma access was unavailable during parts of the build, so the local screenshots in `reference/` were used as the visual source of truth for final page-by-page refinement.

## Live Demo

Live site:

```text
https://growmodo-trial.pyllord.com
```

GitHub repository:

```text
https://github.com/justadigit/growmodo-wordpress-trial
```

## Project Goals

1. Match the Estatien Figma/reference design as closely as practical.
2. Preserve responsive behavior across desktop, tablet, and mobile.
3. Build a native custom WordPress theme.
4. Keep the theme architecture maintainable.
5. Manage property listings through the WordPress CMS.
6. Use semantic and accessible frontend markup.
7. Avoid unnecessary dependencies for performance.
8. Prioritize finished, stable work over unfinished breadth.

## Technology Stack

- WordPress
- PHP
- HTML5
- CSS
- Vanilla JavaScript
- MariaDB
- Docker and Docker Compose for local development

No React, Vue, Next.js, Tailwind, Elementor, Divi, WPBakery, page builder, or custom plugin dependency is used.

## Theme Architecture

The custom classic theme lives in `theme/estatien/`.

Important files:

- `style.css` - WordPress theme metadata.
- `functions.php` - theme setup, asset enqueueing, menus, Property CPT, property metadata, and route helpers.
- `front-page.php` - homepage composition.
- `page-about-us.php` - About Us route template.
- `page-services.php` - Services route template.
- `page-contact-us.php` - Contact Us route template.
- `archive-property.php` - Property archive route.
- `single-property.php` - reusable Property detail template.
- `header.php` - shared header, branding, navigation, and mobile menu button.
- `footer.php` - shared footer layout.
- `template-parts/` - reusable homepage sections such as hero, features, featured properties, testimonials, FAQ, and CTA.
- `assets/css/main.css` - responsive design system, layout, and component styles.
- `assets/js/main.js` - mobile navigation and FAQ behavior.

Reusable template parts were used where sections repeat or benefit from isolation. This keeps `front-page.php` readable and makes future refinements safer than placing the entire homepage in one large template.

## WordPress Functionality

Implemented WordPress features include:

- Classic custom theme structure.
- `add_theme_support( 'title-tag' )`.
- `add_theme_support( 'post-thumbnails' )`.
- HTML5 theme support.
- Primary and footer menu registration.
- Fallback navigation with meaningful route URLs.
- `property` custom post type.
- Native WordPress title, editor, excerpt, and featured image support for properties.
- Lightweight native property metadata.
- Homepage Featured Properties section powered by `WP_Query`.
- Property archive powered by real `property` posts.
- Reusable single property template for all property detail pages.
- Slug-specific templates for About Us, Services, and Contact Us.
- Development seed script for demo pages, property posts, featured images, and permalinks.

Property content is CMS-managed. New property listings can be added through WordPress without editing PHP templates.

## Property Data Model

The current `property` post type uses:

- Title
- Description/content
- Excerpt
- Featured image
- Price
- Location
- Bedrooms
- Bathrooms
- Property type

These fields were kept intentionally small and native to WordPress. ACF was not introduced because the implemented data model did not justify a plugin dependency for this assessment.

## Design Implementation

The design translation uses:

- Urbanist typography from Google Fonts.
- Dark background surfaces.
- Purple accent color.
- CSS custom properties for core design tokens.
- Reusable card, button, form, and section patterns.
- Grid and Flexbox layouts.
- Shared spacing and container rules.
- Page-specific layouts where the Figma/reference pages required different structures.

The local `reference/` screenshots were used for final visual QA across the homepage, About Us, Properties, Property Details, Services, and Contact Us pages.

## Responsive Approach

The stylesheet uses a desktop-first layout with responsive adjustments at:

- `1200px`
- `768px`
- `430px`

At narrower widths, multi-column grids collapse, the navigation becomes a keyboard-accessible mobile menu, large hero/media areas stack, forms reduce to fewer columns, and card layouts are constrained to avoid horizontal overflow. Mobile behavior was adapted from the supplied references and the existing design system rather than forcing desktop-only dimensions onto small screens.

## Accessibility

Accessibility practices implemented include:

- Semantic landmarks: `header`, `nav`, `main`, `section`, `article`, and `footer`.
- Skip link to main content.
- Visible `:focus-visible` styles.
- Keyboard-accessible buttons and links.
- Mobile menu `aria-expanded` state management.
- Escape key and link-click menu closing behavior.
- FAQ buttons with synchronized `aria-expanded` and answer visibility.
- Useful alt text for meaningful images.
- Decorative images/icons marked appropriately.
- Logical heading hierarchy within page sections.

## Performance and SEO

Practical performance and SEO choices:

- WordPress `title-tag` support.
- Correct `wp_enqueue_style()` and `wp_enqueue_script()` usage.
- JavaScript loaded in the footer.
- Minimal vanilla JavaScript.
- No heavy frontend framework.
- No page builder.
- Lazy loading for non-critical images.
- Semantic markup for page structure.
- Limited external dependency usage.

No Lighthouse score is claimed because a formal Lighthouse audit was not part of the final verification.

## AI-Assisted Development

AI-assisted tools such as Codex and ChatGPT were used to accelerate scaffolding, repetitive template implementation, code review, responsive refinement, and documentation. Generated output was reviewed, adjusted, tested, and owned by the developer. Architecture decisions were made in the context of the assessment requirements and the existing WordPress implementation; AI output was not treated as automatically correct.

## Development Process

1. Reviewed the Growmodo assessment requirements.
2. Studied the Estatien Figma/reference designs.
3. Prepared an isolated Docker-based WordPress and MariaDB environment.
4. Built a classic custom WordPress theme foundation.
5. Implemented the homepage first using reusable template parts.
6. Added the `property` CPT and CMS-managed property metadata.
7. Implemented the main supporting routes: About Us, Services, Contact Us, Properties archive, and Property detail pages.
8. Performed responsive and visual refinement against local references.
9. Deployed the theme to a live WordPress environment.
10. Performed final QA and documentation cleanup.

## Decisions and Trade-offs

### Custom Theme Instead of a Page Builder

The assessment required custom WordPress theme development. A classic theme gives direct control over templates, markup, asset loading, accessibility, and performance, which is more appropriate for evaluating WordPress development skill than using a visual builder.

### Native WordPress Metadata Instead of ACF

The property model only needed a handful of fields. Native meta boxes avoided adding ACF as a dependency while still giving the admin editable property data.

### Vanilla JavaScript

The required interactions are small: mobile navigation and FAQ expansion. Vanilla JavaScript keeps the theme lightweight and avoids introducing a frontend framework for behavior that WordPress and the browser can handle directly.

### Homepage-First Strategy

The assessment prioritized finished quality over unfinished scope. The homepage and core listing flow were implemented first, then supporting routes were added using the same design system.

### Reusable Templates

Shared template parts and page templates reduce duplication. This makes changes to repeated sections, such as the CTA or property cards, easier to maintain.

## Four-Hour Time-box and Prioritization

The assessment was treated as a strict time-boxed exercise. The implementation priority was:

1. Theme foundation.
2. Homepage fidelity.
3. Responsive structure.
4. WordPress and CMS functionality.
5. Important supporting routes.
6. QA and deployment.

The assessment emphasized quality over quantity, so complete, stable, reusable sections were prioritized over partially implemented advanced features.

## Known Limitations

- Advanced property filters are presentation-only; the keyword search form is functional, but filter dropdown behavior was not implemented.
- Contact and inquiry forms are accessible UI only. They are not connected to email delivery or stored submissions.
- Carousel/pager controls are intentionally decorative or simplified; no slider dependency was added.
- Property detail galleries currently use available featured/demo imagery rather than a full CMS-managed gallery model.
- Some small decorative Figma details were simplified to keep the theme maintainable within the time-box.

## What I Would Improve Next

- Add richer property metadata, such as area, amenities, gallery images, and fee details.
- Implement real property filtering with sanitized query parameters.
- Add native contact form handling with nonce validation, spam protection, and email delivery.
- Add an image optimization workflow.
- Add caching and production asset minification.
- Add automated smoke tests for critical routes.
- Perform deeper cross-browser and Lighthouse QA.
- Continue fine-grained visual refinement against the original Figma file.

## Local Development

Start the local environment:

```bash
cp .env.example .env
docker compose up -d
```

Local site:

```text
http://localhost:8080
```

WordPress admin:

```text
http://localhost:8080/wp-admin
```

The Compose file mounts the custom theme directly:

```text
./theme/estatien:/var/www/html/wp-content/themes/estatien
```

Activate **Estatien Trial** from Appearance -> Themes.

Optional demo content:

```bash
docker compose exec -T wordpress php /var/www/html/wp-content/themes/estatien/tools/seed-demo-content.php
```

Stop the environment:

```bash
docker compose down
```

## Installation / Deployment

To install the theme on a normal WordPress instance:

1. Zip the `theme/estatien` directory as `estatien.zip`.
2. In WordPress Admin, go to Appearance -> Themes.
3. Choose Add New -> Upload Theme.
4. Upload and activate **Estatien Trial**.
5. Go to Settings -> Permalinks and save changes if the `/properties/` routes need refreshing.
6. Create or configure the primary navigation menu.
7. Add Property posts with title, excerpt/content, featured image, and property metadata.

Do not commit database data, uploads, secrets, or WordPress core files.

## Repository Structure

```text
growmodo-wordpress-trial/
├── docker-compose.yml
├── .env.example
├── .gitignore
├── .htaccess
├── README.md
├── TASK.md
├── AGENTS.md
├── docs/
│   ├── ASSESSMENT-NOTES.md
│   └── WORDPRESS-STANDARDS.md
├── reference/
│   ├── About Us Page - Desktop.png
│   ├── About Us Page - Mobile.png
│   ├── Contact Page - Desktop.png
│   ├── Contact Page - Mobile.png
│   ├── Home Page - Mobile.png
│   ├── Properties Page - Desktop.png
│   ├── Properties Page - Mobile.png
│   ├── Property Details Page - Desktop.png
│   ├── Property Details Page - Mobile.png
│   ├── Services Page - Desktop.png
│   └── Services Page - Mobile.png
└── theme/
    └── estatien/
        ├── functions.php
        ├── front-page.php
        ├── header.php
        ├── footer.php
        ├── page-about-us.php
        ├── page-services.php
        ├── page-contact-us.php
        ├── archive-property.php
        ├── single-property.php
        ├── template-parts/
        └── assets/
```

## Final Notes

This submission focuses on clean WordPress architecture, faithful UI implementation, practical CMS functionality, maintainability, and quality under a time-boxed assessment.
