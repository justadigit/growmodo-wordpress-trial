# Development Approach

This project was built as a time-boxed Growmodo WordPress developer assessment based on the Estatien real-estate design. I started by reviewing the task requirements and available visual references, then built the theme as a classic WordPress implementation rather than a separate frontend app.

The homepage was prioritized first because the assessment emphasized design fidelity and complete sections over unfinished breadth. After the homepage foundation was stable, I added the main supporting routes: About Us, Services, Contact Us, Properties archive, and reusable Property detail pages.

# Architecture Decisions

The site is a custom classic WordPress theme in `theme/estatien/`. Shared layout lives in `header.php` and `footer.php`, the homepage is composed through `front-page.php`, and larger repeated sections are split into `template-parts/`.

Slug-specific page templates are used for the main static routes, while `archive-property.php` and `single-property.php` follow WordPress template hierarchy for the Property CPT. This keeps the project easy to inspect and avoids hiding page rendering inside JavaScript or a page builder.

# WordPress / CMS Implementation

The theme registers a lightweight `property` custom post type. Properties use native WordPress fields for title, content, excerpt, and featured image, plus native metadata for price, location, bedrooms, bathrooms, and property type.

The homepage Featured Properties section and `/properties/` archive use WordPress queries instead of hard-coded cards. Individual property URLs use one reusable `single-property.php` template. The theme also registers navigation menus, supports title tags, featured images, and HTML5 markup.

# Design and Responsive Implementation

The Estatien design was translated with a dark visual system, Urbanist typography, purple accents, reusable card styles, and CSS variables for core spacing and colors. Final visual refinement used the local `reference/` screenshots because direct automated Figma access was unavailable during parts of the build.

CSS Grid and Flexbox handle the primary layouts. The stylesheet includes responsive breakpoints at `1200px`, `768px`, and `430px` to adapt navigation, heroes, cards, forms, property layouts, and footer columns across desktop, tablet, and mobile widths.

# AI / Tools Used

AI-assisted tooling, including Codex and ChatGPT, was used to accelerate scaffolding, repetitive template work, visual QA, code review, and documentation. The generated output was reviewed, adjusted, and tested. Architecture and implementation choices were made against the Growmodo requirements and WordPress best practices, not accepted blindly.

Local tooling used:

- Docker Compose for WordPress and MariaDB.
- PHP syntax checks for theme files.
- Node syntax check for the vanilla JavaScript file.
- Ripgrep for dead-link and placeholder scans.
- SSH/Docker commands for live deployment verification.

# Time-box and Prioritization

The work was treated as a strict assessment time-box. I prioritized:

1. Theme foundation.
2. Homepage fidelity.
3. Responsive structure.
4. CMS-managed property listings.
5. Supporting routes.
6. Final QA and deployment.

This meant avoiding large dependencies, advanced search behavior, and over-engineered abstractions so the submitted work remained stable and maintainable.

# Known Limitations

- Property filter pills are visual only; advanced filtering was deferred.
- Contact and inquiry forms are accessible UI only and are not connected to email delivery or stored submissions.
- Pager/carousel controls are simplified and do not run a full carousel.
- Property detail galleries use available imagery rather than a full CMS-managed gallery field.
- Some decorative Figma details were simplified to preserve quality within the time-box.

# Next Steps

With more time, I would add real property filters, contact form processing with nonce/spam protection, a richer property gallery and metadata model, image optimization, caching, automated route tests, and deeper cross-browser/Lighthouse QA.
