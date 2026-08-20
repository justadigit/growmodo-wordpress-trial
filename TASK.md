# Growmodo WordPress Developer Trial Task

## Context

This is a time-boxed WordPress Developer assessment for Growmodo GmbH.

The goal is to build a fully functional WordPress website based on the provided Figma design while demonstrating strong WordPress theme development, responsive frontend implementation, clean code, and practical prioritization under a strict 4-hour limit.

## Figma Reference

Community file:
https://www.figma.com/community/file/1314076616839640516

Design reference:
Estatien — Real Estate Business Website UI Template, Dark Theme

Primary focus:
- Homepage first
- High design fidelity
- Fully responsive implementation
- Clean custom WordPress theme architecture

## Time Limit

Maximum implementation time: 4 hours.

This is intentionally a stress test. Completing the entire website is not expected if doing so would reduce quality.

Priority:
1. Quality over quantity
2. Finish a smaller number of sections completely rather than many sections partially
3. Do not submit incomplete or visibly broken sections
4. Prioritize a polished homepage before additional pages

## Main Objective

Convert the provided Figma design into a custom WordPress website.

The implementation should:
- closely match the Figma design
- be responsive on desktop, tablet, and mobile
- include basic website functionality
- follow WordPress best practices
- be easy to maintain
- be publicly accessible via a live URL

## Technical Requirements

### WordPress Theme Development

Build a custom WordPress theme using:

- WordPress
- PHP
- HTML5
- CSS
- vanilla JavaScript where necessary

Do not use:
- React
- Next.js
- Vue
- Laravel
- Elementor
- Divi
- WPBakery
- page builders
- a separate frontend application
- headless WordPress unless explicitly required

The theme should use proper WordPress theme files and APIs.

Expected core files may include:

- `style.css`
- `functions.php`
- `index.php`
- `front-page.php`
- `header.php`
- `footer.php`
- `page.php`
- reusable template parts
- CSS, JavaScript, and image assets

Use WordPress-specific functionality such as:
- theme support registration
- menus
- featured images
- WordPress Loop where applicable
- `WP_Query`
- proper asset enqueueing
- WordPress template functions
- escaping and sanitization where appropriate

## Homepage Scope

The homepage shown in the supplied reference contains the following major sections:

### 1. Header / Navigation

Include:
- Estatien branding/logo
- Home
- About Us
- Properties
- Services
- Contact Us CTA
- responsive mobile navigation

### 2. Hero Section

Include:
- main headline
- supporting description
- Learn More CTA
- Browse Properties CTA
- real-estate statistics
- architectural/building visual
- dark theme styling
- purple accent styling

### 3. Feature Cards

Implement the four visible feature cards:

- Find Your Dream Home
- Unlock Property Value
- Effortless Property Management
- Smart Investments, Informed Decisions

### 4. Featured Properties

Implement the visible property listing section.

Each property card should support:
- image
- property title
- short description or location
- bedroom information
- bathroom information
- property type or area where appropriate
- price
- View Property Details CTA

Where practical, implement properties as actual WordPress-managed content instead of static HTML.

### 5. Testimonials

Implement visible testimonial cards with:
- rating
- title
- testimonial text
- avatar
- customer name
- location

### 6. FAQ

Implement the visible FAQ section.

If time allows, add accessible interactive behavior using minimal vanilla JavaScript.

### 7. Final CTA

Implement:
- “Start Your Real Estate Journey Today”
- supporting text
- Explore Properties CTA

### 8. Footer

Implement:
- branding
- email/newsletter area if present
- navigation columns
- contact/navigation links
- copyright
- social links/icons where practical

## Reusable Theme Architecture

Use reusable WordPress template parts instead of placing the entire homepage in one file.

Suggested structure:

```text
theme/
└── estatien/
    ├── style.css
    ├── functions.php
    ├── header.php
    ├── footer.php
    ├── front-page.php
    ├── index.php
    ├── page.php
    ├── template-parts/
    │   ├── hero.php
    │   ├── features.php
    │   ├── featured-properties.php
    │   ├── testimonials.php
    │   ├── faq.php
    │   └── cta.php
    └── assets/
        ├── css/
        ├── js/
        └── images/
```

## Content Management

Use WordPress CMS functionality where it adds value.

Recommended:
- create a `property` Custom Post Type
- use native WordPress title, excerpt/content, and featured image
- add lightweight property metadata if practical

Possible metadata:
- price
- location
- bedrooms
- bathrooms
- property type

Use ACF only if it provides clear value and does not slow down implementation.

Do not make the theme unnecessarily dependent on ACF.

## Responsive Requirements

The site must work well across multiple screen sizes.

Target approximately:
- 1440px desktop
- 1024px
- 768px tablet
- 390px mobile

Pay attention to:
- header/navigation
- hero layout
- typography
- property cards
- feature cards
- testimonials
- FAQ
- CTA
- footer
- spacing
- image scaling
- horizontal overflow

## Design Fidelity

Match the Figma design as closely as practical.

Pay particular attention to:
- dark background tones
- purple accent color
- typography hierarchy
- layout proportions
- card borders
- spacing
- container width
- image ratios
- buttons
- hover states
- border radius
- section rhythm

Do not redesign the Figma unnecessarily.

## Accessibility

Use semantic HTML where appropriate.

Examples:
- `header`
- `nav`
- `main`
- `section`
- `article`
- `footer`

Ensure:
- meaningful image alt text
- keyboard accessible controls
- visible focus states
- correct button/link semantics
- logical heading hierarchy
- accessible mobile navigation

## SEO

Implement basic SEO-friendly practices such as:
- WordPress title-tag support
- semantic heading structure
- alt attributes
- clean markup
- proper page titles
- accessible link text

Do not install a heavy SEO plugin only for the assessment.

## Performance

Optimize for reasonable performance.

Prefer:
- minimal dependencies
- correctly enqueued CSS and JavaScript
- scripts loaded in the footer where appropriate
- optimized images
- lazy loading where appropriate
- no unnecessary JavaScript libraries
- no unnecessary plugins

## Plugin Usage

Plugins are optional.

Only use plugins when they provide clear value.

If plugins are used:
- keep the number small
- use reputable and current plugins
- avoid performance-heavy solutions
- document what was used and why

## Testing

Check the implementation in:
- Chrome
- Safari
- Firefox if practical
- responsive/mobile view

Verify:
- navigation
- buttons
- links
- forms if included
- mobile menu
- layout
- images
- responsive behavior
- no obvious console errors
- no broken sections

## Hosting

The final website must be hosted on a publicly accessible URL.

Local-only submissions are not accepted.

A personal VPS is acceptable as long as:
- the site is publicly accessible
- HTTPS works
- the URL can be opened directly by the evaluator

Possible example:
`https://growmodo-trial.example.com`

## Source Code

Upload the custom WordPress theme source code to GitHub or another version control platform.

Do not commit:
- passwords
- database credentials
- `.env` secrets
- WordPress database files
- unnecessary WordPress core files
- local uploads
- private keys

## Documentation

Provide brief documentation, approximately 1–2 pages.

Include:
- project overview
- development approach
- theme architecture
- WordPress functionality implemented
- plugins/tools used
- responsive strategy
- performance considerations
- accessibility considerations
- AI usage
- known limitations
- what would be implemented next with more time

## AI Usage

AI-assisted development tools are explicitly allowed.

Examples:
- Codex
- ChatGPT
- Claude
- Cursor
- GitHub Copilot

AI may be used to:
- scaffold repetitive code
- accelerate implementation
- suggest refactors
- help debug
- generate boilerplate
- assist with documentation

However:
- all generated code must be reviewed
- the developer must understand the code
- generated code must fit the project architecture
- obvious AI-generated clutter should be removed
- security and correctness remain the developer’s responsibility

## Evaluation Criteria

The submission will be evaluated based on:

1. Design fidelity
2. Functionality
3. Code quality
4. Performance
5. SEO
6. User experience
7. Responsiveness
8. Accessibility
9. WordPress best practices
10. Creativity where useful

## Recommended Priority Order

Because of the 4-hour limit:

1. Inspect the Figma carefully
2. Build the custom theme foundation
3. Complete header and hero
4. Complete homepage main sections
5. Complete footer
6. Make the homepage responsive
7. Add useful WordPress CMS functionality
8. Test and polish
9. Deploy
10. Finish documentation

Do not start secondary pages until the homepage is already polished and stable.

## Deliverables

Submit:

1. Live WordPress website URL
2. GitHub/source-code repository
3. Brief documentation
4. Any relevant implementation notes

## Final Reminder

The assessment explicitly prioritizes finished, high-quality work over incomplete breadth.

A polished homepage with:
- strong design fidelity
- responsive behavior
- clean custom WordPress architecture
- basic CMS functionality
- professional code quality

is preferable to many partially implemented pages.
