# Architecture Overview

This document summarises the proposed architecture for the CGAC digital ministry platform.

Goals
- Modular, maintainable MVC structure
- Secure server-side logic in PHP with PDO prepared statements
- Responsive, accessible front-end with server-side rendering for public pages
- Role-based access control and auditable administrative actions

High-level components

1. Public Website (server-rendered PHP):
   - Routes serve SEO-friendly HTML for public pages (home, about, programmes, watchwords, sermons, watch-live, give)
   - Minimal JS for progressive enhancement; Bootstrap 5 for layout and components
   - Fast initial render, responsive images, lazy-loading, and careful asset optimisation

2. Admin Dashboard (authenticated, RBAC-protected):
   - CRUD interfaces for programmes, watchwords, conventions, sermons, media, announcements, testimonies, prayer requests, and giving configuration
   - Editorial workflows: draft, pending review, scheduled, published, archived
   - Media manager with upload progress and validation

3. API / Integration Layer:
   - Payment provider adapters (Paystack, Flutterwave) with server-side verification and webhook handlers
   - Video provider integration layer (YouTube, Vimeo) for validating and embedding approved URLs
   - Optional JSON API endpoints for selected read-only public content, served with authentication for private data

4. Data Layer (MySQL):
   - Normalised schema with junction tables for many-to-many relationships
   - Transactions for multi-step financial operations
   - Indexes supporting year/category/speaker/scripture search filters

5. Infrastructure & Deployment:
   - Deploy on Linux PHP-hosting with HTTPS
   - Environment configuration via .env files (secrets kept out of source control)
   - Backups, logging, and audit retention policies

Security
- Secure password hashing (password_hash())
- CSRF protection for state-changing requests
- Strict upload validation and storage separation
- Role and permission checks enforced server-side
- Webhook signature verification and idempotency for payments

Development practices
- Composer for dependencies
- Migrations for schema changes and documented seeds for demo data
- Tests for critical business logic (auth, payments, imports)

Suggested repo structure

    app/
      Controllers/
      Services/
      Models/
      Repositories/
      Middleware/
      Policies/
      Validation/
      Support/
    config/
    database/
      migrations/
      seeders/
      imports/
    public/
      assets/
      uploads/
      index.php
    resources/
      views/
      components/
      css/
    routes/
    storage/
      logs/
      private/
      temporary/
    tests/
    docs/
    .env.example
    composer.json

What's included in this commit
- Top-level documentation and initial scaffolding files
- A minimal public/index.php front controller placeholder

What's next
- Create migrations for core tables
- Implement authentication and RBAC
- Build the programmes/watchword/convention models and admin CRUD
