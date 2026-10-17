# Implementation Plan & Milestones

This is a phased plan with deliverables and acceptance criteria.

Phase 1: Discovery & Foundation (1-2 weeks)
- Confirm routes, roles, and data model. (Deliverable: docs/ARCHITECTURE.md, docs/DB_SCHEMA.md)
- Create project scaffolding, composer.json, initial migrations. (Done: initial scaffolding created)
- Acceptance: repo has documentation, .env.example, and working front controller.

Phase 2: Public Website (2-3 sprints)
- Build homepage, About, Contact, Plan Your Visit, announcements, hero, and footer.
- Acceptance: public pages render server-side, pass basic accessibility checks, mobile-first layout.

Phase 3: Historical Content (3-4 sprints)
- Implement programmes repository, watchwords, conventions, sessions, and related models.
- Admin CRUD with validation, previews, and CSV import/export.
- Acceptance: programmes searchable by year, category; watchwords browseable and linkable.

Phase 4: Media & Livestream (2-3 sprints)
- Implement sermon/media library, video validation, watch-live page, and responsive players.
- Acceptance: embed validated provider video, offline state and next service info.

Phase 5: Administration & RBAC (2 sprints)
- Authentication, roles, permissions, dashboard UI, media manager, audit logs.
- Acceptance: protected routes, role-based access enforced server-side, admin can manage core content.

Phase 6: Giving & Payments (2-3 sprints)
- Payment provider adapter, secure checkout flow, webhooks, reconciliation dashboard.
- Acceptance: server-side verification of transactions, secure webhook processing, CSV export.

Phase 7: QA, Performance & Deployment (2 sprints)
- Automated tests, accessibility audits, performance tuning for Nigerian mobile networks.
- Acceptance: test coverage for critical rules, documented deployment and backup procedures.

Ongoing
- Content migration of verified historical records
- Monitoring, backups, and security reviews

Sprint cadence & responsibilities
- Two-week sprints recommended. Early sprints focus on core data models and auth.
- I will provide PR-ready changes in small increments for review.

Milestone: Minimum Acceptable Product (MAP)
- Public homepage, programmes repository with CRUD, watchwords archive, admin sign-in, and media library browsing.

