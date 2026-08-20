# WordPress Development Standards

## Theme Type

This project uses a classic custom WordPress theme.

Frontend rendering should use native WordPress PHP templates rather than a separate JavaScript application.

## Templates

Follow the WordPress template hierarchy.

Use:

- `front-page.php` for the homepage
- `page.php` for normal WordPress pages
- `archive-property.php` for the Property archive
- `single-property.php` for individual Property pages
- `header.php` and `footer.php` for shared layout
- `template-parts/` for reusable sections

## WordPress APIs

Prefer native functions such as:

- `get_header()`
- `get_footer()`
- `get_template_part()`
- `wp_nav_menu()`
- `WP_Query`
- `get_post_meta()`
- `get_template_directory_uri()`
- `home_url()`
- `get_post_type_archive_link()`

## Security

When receiving input:

- sanitize values
- unslash WordPress request data where appropriate
- verify nonces
- check user capabilities

When rendering output:

- `esc_html()` for text
- `esc_attr()` for attributes
- `esc_url()` for URLs
- use WordPress helper functions where appropriate

## Custom Post Types

The Property CPT should remain lightweight.

Use native WordPress fields for:

- title
- content
- excerpt
- featured image

Custom metadata may include:

- price
- location
- bedrooms
- bathrooms
- property type

Do not introduce ACF unless it clearly improves the assessment result.

## Accessibility

Use semantic elements and:

- logical heading hierarchy
- keyboard-accessible controls
- visible focus states
- useful alt text
- correct `aria-expanded` state
- accessible mobile navigation

## Performance

- Avoid unnecessary plugins and dependencies.
- Correctly enqueue CSS and JavaScript.
- Optimize image loading.
- Lazy-load non-critical imagery where appropriate.
- Avoid duplicate assets and dead code.

## Responsive Testing

Check approximately:

- 1440px desktop
- 1024px
- 768px
- 390–430px mobile

Watch for:

- horizontal overflow
- navigation problems
- hero overlap
- card width
- typography
- footer layout
- CTA layout

## Assessment Priorities

1. Figma fidelity
2. Responsive behavior
3. Clean WordPress architecture
4. Functionality
5. Accessibility
6. Performance
7. Additional functionality only if time remains
