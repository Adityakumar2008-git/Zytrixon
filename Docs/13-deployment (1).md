# Zytrixon V2 — Deployment & DevOps Specification

**Document:** `13-deployment.md`  
**Project:** Zytrixon Website V2  
**Status:** Production Deployment Specification  
**Depends on:** `06-architecture.md`, `10-performance.md`, `11-security.md`, `12-testing.md`

---

# 1. Deployment Objective

Zytrixon V2 must have a deployment process that is:

- repeatable
- observable
- reversible
- secure
- low-maintenance
- suitable for a production business website

Deployment must not depend on manually copying files or making undocumented server changes.

---

# 2. Deployment Principle

The desired flow is:

```text
Developer
   ↓
Git branch
   ↓
Pull Request
   ↓
CI checks
   ↓
Preview deployment
   ↓
Review / QA
   ↓
Production merge
   ↓
Production deployment
   ↓
Smoke tests
   ↓
Monitoring
```

---

# 3. Recommended Hosting Model

Use a managed platform or VPS/container environment that supports the selected Laravel architecture, PHP runtime, database, queue/mail requirements, and the Vite asset build.

Preferred characteristics:

```text
automatic deployments
preview environments
CDN
HTTPS
environment variables
logs
rollback
custom domains
scaling
```

The exact provider should be finalized in an ADR after evaluating cost, project requirements, and existing infrastructure.

---

# 4. Application Architecture

Recommended production topology:

```text
User
 ↓
DNS
 ↓
CDN / Edge
 ↓
Next.js application
 ├── static assets
 ├── server-rendered pages
 ├── route handlers
 └── external services
```

Avoid introducing a separate VPS, reverse proxy, Docker cluster, or Kubernetes deployment unless the actual product requirements justify the operational complexity.

---

# 5. Environments

Maintain at least:

```text
Development
Preview/Staging
Production
```

### Development

For local implementation.

### Preview/Staging

For PR review and release validation.

### Production

For public traffic.

---

# 6. Environment Isolation

Each environment should have separate configuration where appropriate:

```text
API endpoints
analytics
email providers
OAuth credentials
database credentials
webhook secrets
third-party keys
```

Never reuse production secrets in development.

---

# 7. Environment Variables

Environment variables must be documented.

Example categories:

```text
NEXT_PUBLIC_*
SERVER_ONLY_*
DATABASE_*
EMAIL_*
ANALYTICS_*
PAYMENT_*
AUTH_*
```

Only values genuinely required by the browser may use the `NEXT_PUBLIC_` prefix.

Secrets must remain server-side.

---

# 8. Secret Management

Never commit:

```text
.env
.env.local
private keys
API secrets
database passwords
OAuth secrets
webhook secrets
```

to Git.

Use the hosting provider's encrypted environment-variable system or an appropriate secret manager.

---

# 9. Secret Rotation

Document how to rotate:

```text
API keys
OAuth secrets
email credentials
database credentials
webhook secrets
deployment tokens
```

If a secret is accidentally committed, treat it as compromised and rotate it immediately.

Deleting it from Git history alone is not sufficient.

---

# 10. Git Strategy

Recommended branch model:

```text
main
 └── feature/*
 └── fix/*
 └── chore/*
```

`main` should represent deployable code.

Avoid long-lived branches that diverge for weeks.

---

# 11. Pull Requests

Every meaningful change should go through a PR.

PR should include:

```text
what changed
why it changed
screenshots/video where useful
testing performed
known limitations
```

---

# 12. Commit Strategy

Prefer meaningful commits.

Examples:

```text
feat: add service detail layout
fix: correct mobile navigation focus
perf: optimize case study images
refactor: extract service content model
docs: update deployment instructions
```

Avoid commits such as:

```text
changes
final
final2
new
working
```

---

# 13. CI Pipeline

Every PR should run appropriate checks:

```text
install dependencies
↓
lint
↓
typecheck
↓
unit/integration tests
↓
build
↓
E2E tests
```

Accessibility and visual checks can be added according to CI cost.

---

# 14. Dependency Installation

CI must use the repository lockfile.

For pnpm:

```bash
pnpm install --frozen-lockfile
```

Do not allow CI to silently modify dependency versions.

---

# 15. Build

Production build must be reproducible.

Conceptually:

```bash
pnpm build
```

A failed build must block production deployment.

---

# 16. Runtime and Package Versions

Pin the supported runtime versions.

Recommended mechanisms include:

```text
package.json engines
.nvmrc
Volta
mise
Corepack
```

Use one consistent strategy.

---

# 17. Deployment Trigger

Production deployment should happen only from the approved production branch.

Example:

```text
main → production
```

Preview deployments may be generated from PRs.

---

# 18. Preview Deployments

Every meaningful PR should have a preview environment when supported by the hosting provider.

Preview should allow:

```text
visual review
responsive testing
stakeholder review
E2E validation
```

---

# 19. Preview Data Safety

Preview environments must not accidentally:

```text
send real customer emails
charge real payments
modify production data
trigger production webhooks
```

Use sandbox/test integrations.

---

# 20. Database Strategy

The website should avoid adding a database unless a real requirement exists.

If a database becomes necessary:

```text
development database
staging database
production database
```

must be treated separately.

---

# 21. Database Migrations

If database migrations are introduced:

```text
migration files
versioning
rollback strategy
backup strategy
```

must be documented.

Never make undocumented manual schema changes in production.

---

# 22. Content Deployment

If content is stored in code:

```text
content change
 → Git commit
 → CI
 → deployment
```

If a CMS is introduced later, define:

```text
draft
preview
publish
rollback
```

separately.

---

# 23. Static Assets

Large assets should be optimized before deployment.

Verify:

```text
image dimensions
compression
modern formats
cache headers
font files
unused assets
```

See `10-performance.md`.

---

# 24. CDN and Caching

Use CDN caching where appropriate.

Static assets should have long-lived immutable caching when filenames are content-hashed.

Dynamic content must not be cached incorrectly.

---

# 25. Cache Invalidation

Document how deployment affects:

```text
HTML
data
images
fonts
API responses
```

Avoid relying on users manually clearing browser cache.

---

# 26. Domain Configuration

Production should use the official Zytrixon domain.

Verify:

```text
DNS records
HTTPS
www behaviour
apex behaviour
redirect policy
canonical URL
```

The canonical host must be consistent.

---

# 27. HTTPS

Production must use HTTPS.

Verify:

```text
valid certificate
HTTP → HTTPS
no mixed content
secure cookies where applicable
```

---

# 28. DNS Changes

DNS changes should be documented before execution.

Do not modify unrelated records.

Record:

```text
record type
host
target
purpose
TTL
```

---

# 29. Email DNS

If the website sends email, verify appropriate records:

```text
SPF
DKIM
DMARC
```

Use the actual email provider's documented values.

Do not invent DNS records.

---

# 30. Deployment Rollback

Every production deployment must have a rollback path.

Preferred:

```text
current version
↓
new version
↓
smoke test
↓
keep
```

If a critical regression appears:

```text
rollback to previous known-good deployment
```

---

# 31. Rollback Rules

Rollback immediately for issues such as:

```text
site unavailable
critical navigation broken
lead form broken
security vulnerability
severe rendering failure
major SEO indexing problem
```

Minor cosmetic issues can follow the normal hotfix process.

---

# 32. Post-Deployment Smoke Test

Immediately after release verify:

```text
homepage
navigation
services
work/case studies
contact
mobile menu
404
```

Also verify:

```text
robots.txt
sitemap
canonical URLs
critical assets
```

---

# 33. Production Monitoring

Monitor:

```text
uptime
HTTP errors
server errors
deployment failures
form failures
important API failures
performance
```

Use an appropriate monitoring provider rather than building a monitoring system from scratch.

---

# 34. Error Tracking

Use an error-tracking platform if the project has meaningful runtime logic.

Capture:

```text
runtime exceptions
unhandled promise rejections
route errors
server errors
```

Do not send secrets or unnecessary personal information.

---

# 35. Logging

Logs should help diagnose failures.

Good logs identify:

```text
timestamp
environment
request/context identifier
error category
safe diagnostic metadata
```

Never log:

```text
passwords
API secrets
tokens
full payment details
unnecessary personal data
```

---

# 36. Privacy

Deployment configuration must respect privacy requirements.

Analytics, logging, forms, and third-party tools should collect only what is needed.

See `11-security.md`.

---

# 37. Analytics Deployment

Use separate analytics configuration where necessary.

Verify:

```text
production events enabled
preview events excluded or isolated
development events disabled
```

Avoid polluting production analytics with developer traffic.

---

# 38. Robots and Indexing

Production:

```text
indexable
```

Preview/staging:

```text
not indexable
```

Verify this after every infrastructure change.

---

# 39. Sitemap Deployment

After release:

```text
sitemap accessible
valid XML
correct domain
correct canonical URLs
no staging URLs
```

---

# 40. Performance Budget

Deployment should respect budgets defined in `10-performance.md`.

Track regressions in:

```text
JavaScript
images
fonts
CSS
third-party scripts
LCP
INP
CLS
```

A new feature should not silently break the performance budget.

---

# 41. Dependency Updates

Do not automatically merge every dependency update.

For meaningful updates:

```text
update
↓
lint
↓
typecheck
↓
tests
↓
build
↓
E2E
↓
review
```

---

# 42. Security Updates

Critical security updates should receive priority.

After upgrading:

```text
run complete CI
review changelog
check breaking changes
perform smoke test
```

---

# 43. Backup Strategy

If Zytrixon V2 introduces persistent business data, backups must be defined before launch.

Document:

```text
what is backed up
frequency
retention
storage
encryption
restore procedure
restore testing
```

---

# 44. Disaster Recovery

For stateful systems define:

```text
RPO
RTO
backup recovery
service restoration
DNS recovery
credential recovery
```

For a primarily static marketing website, disaster recovery can remain intentionally simple.

---

# 45. Incident Procedure

For production incidents:

```text
Detect
↓
Assess severity
↓
Mitigate
↓
Rollback/hotfix
↓
Verify
↓
Document
↓
Prevent recurrence
```

Do not debug indefinitely while users remain blocked.

---

# 46. Severity Levels

Suggested:

### P0 — Critical

```text
site unavailable
security incident
major data loss
critical lead failure
```

### P1 — High

```text
major feature broken
large-scale rendering failure
important route unavailable
```

### P2 — Normal

```text
non-critical functional issue
```

### P3 — Minor

```text
cosmetic issue
low-impact content problem
```

---

# 47. Hotfix Process

For urgent production issues:

```text
create fix branch
↓
implement minimal fix
↓
run required checks
↓
PR/review
↓
deploy
↓
smoke test
```

Avoid unrelated refactors inside emergency fixes.

---

# 48. Release Notes

Meaningful releases should record:

```text
date
version/commit
features
fixes
performance changes
breaking changes
migration requirements
```

---

# 49. Deployment Ownership

The repository should clearly document who can:

```text
merge production code
change deployment configuration
modify DNS
manage secrets
rollback production
```

Do not rely on one person's memory.

---

# 50. Access Control

Use least privilege.

Separate permissions for:

```text
Git repository
hosting
DNS
analytics
email
databases
third-party services
```

Remove access when team members no longer require it.

---

# 51. Production Access

Avoid sharing:

```text
admin passwords
API tokens
SSH keys
personal accounts
```

Use individual accounts wherever the provider supports them.

---

# 52. Preview URL Policy

Preview URLs must not be presented as official production URLs.

Public-facing content should reference the canonical production domain.

---

# 53. Deployment Documentation

`README.md` should explain:

```text
local setup
environment variables
development
testing
build
deployment
rollback
```

This document contains the deeper operational rules.

---

# 54. Deployment Checklist

Before production:

```text
[ ] CI green
[ ] Typecheck passes
[ ] Lint passes
[ ] Tests pass
[ ] Build succeeds
[ ] E2E passes
[ ] Accessibility checked
[ ] Responsive QA completed
[ ] SEO checked
[ ] Performance checked
[ ] Security checked
[ ] Environment variables verified
[ ] Production analytics verified
[ ] Sitemap verified
[ ] Robots verified
[ ] Rollback available
```

---

# 55. Post-Deployment Checklist

After production deployment:

```text
[ ] Homepage loads
[ ] Navigation works
[ ] Mobile navigation works
[ ] Service routes work
[ ] Case studies work
[ ] Contact form works
[ ] 404 works
[ ] No major console errors
[ ] No broken critical assets
[ ] Sitemap works
[ ] Robots works
[ ] Canonical URLs correct
[ ] Analytics events work
[ ] Monitoring healthy
```

---

# 56. Anti-Patterns

Never:

- deploy directly from an untested local machine
- commit secrets
- use production credentials in preview
- manually change production files without documentation
- rely on a single person's laptop
- skip rollback planning
- expose staging to search engines
- use `latest` runtime versions without control
- introduce Kubernetes for a simple website
- add infrastructure merely because it looks enterprise-grade
- hide deployment failures
- ignore monitoring after launch

---

# 57. Recommended Release Model

For Zytrixon V2:

```text
feature branch
    ↓
PR
    ↓
automated checks
    ↓
preview
    ↓
review
    ↓
merge to main
    ↓
production deployment
    ↓
smoke test
    ↓
monitor
```

Keep the operational system boring.

Boring infrastructure is often a feature.

---

# 58. Definition of Done

Deployment architecture is ready when:

- environments are defined
- production hosting is selected
- secrets are isolated
- CI is configured
- preview deployments work
- production deployment is reproducible
- rollback is documented
- domain/DNS configuration is documented
- monitoring is defined
- error tracking is defined
- production smoke tests exist
- performance budgets are enforced
- indexing rules are verified
- incident procedures are documented

---

# 59. Final Principle

**A production website is not finished when it deploys. It is finished when the team can deploy, observe, diagnose, and safely roll it back.**

For Zytrixon V2, infrastructure should be:

```text
simple
+
secure
+
observable
+
reversible
+
cost-conscious
```

Do not build infrastructure for prestige.

Build only what the product actually needs.

---

# 60. Status

**Status:** Production deployment specification.

**Next document:** `14-do-not-do.md`
