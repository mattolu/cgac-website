# Design System — Visual Identity (proposed)

This document contains the initial design system tokens and accessible component guidance. These are configurable in the admin settings.

Colour palette (proposed)
- --cgac-primary: #002b36; /* deep forest green / midnight navy */
- --cgac-accent: #b88b2f; /* restrained gold */
- --cgac-bg: #fffef8; /* warm ivory */
- --cgac-surface: #ffffff;
- --cgac-text: #0f1721; /* dark neutral text */
- --cgac-muted: #6b7280;
- --cgac-positive: #166534; /* green */
- --cgac-negative: #b91c1c; /* red */

Typography
- UI font (system stack recommended): Inter, system-ui, -apple-system, 'Segoe UI', Roboto, 'Helvetica Neue', Arial
- Display font (optional configurable): 'Playfair Display' or similar for major headings
- Base sizes: 16px base, 1rem = 16px

Spacing
- scale: 4px baseline, spacing tokens: 4, 8, 12, 16, 24, 32, 48

Components (responsiveness + accessibility notes)
- Announcement bar: dismissible, screen-reader accessible, keyboard focusable, high-contrast text
- Header/nav: mobile-first nav with accessible hamburger, skip-to-content link, ARIA attributes
- Hero: responsive image with fallback poster, no autoplay background video by default
- Cards: consistent shadow, accessible link area, clear headings and metadata
- Media player: responsive container, keyboard accessible controls when using native players
- Forms: labelled inputs, inline validation, aria-live regions for server responses
- Buttons: visible focus ring, sufficient color contrast (AA)

Accessibility
- All interactive controls keyboard reachable
- Colour contrast target WCAG AA; follow AAA where practical for primary actions
- Images include alt text; decorative images marked appropriately

Design tokens file
- See resources/css/design_system.css for a token-based CSS variables file.

Assets and photography
- Use authentic church photography where consent is available
- Provide compressed responsive images (AVIF/WebP fallbacks)

Animation
- Subtle transitions only; reduce-motion media query respected

How to configure
- Brand colours, logo, and fonts are configurable via church_settings in admin
- Provide preview in the admin for brand changes
