# Zytrixon V2 — Antigravity Engineering Workflow

> **Document:** `ANTIGRAVITY.md`  
> **Purpose:** Document the architectural standards, verification pipeline, and implementation workflow established by Antigravity for the Zytrixon Web Platform rebuild.  
> **Reference:** `docs/22-qa-launch-checklist.md` §4.

---

## 1. Architectural Principles

1. **Strict Business Truth First**:
   - `docs/23-business-data.md` serves as the sole source of truth for all public facts, team identities, services, and contact channels.
   - Zero invented metrics, testimonials, or certifications (`docs/14-do-not-do.md`).
2. **Server-Rendered Performance with Progressive Enhancement**:
   - Modern **Laravel 13** with Blade component composition.
   - Zero heavy loaders or artificial render delays. Content is immediately visible on first paint.
   - Minimalist vanilla TypeScript/JavaScript (`resources/js/app.js`) enhancing navigation, focus management, and subtle reveals.
3. **Defense-in-Depth Security**:
   - Automated HTTP security headers (`Content-Security-Policy`, `X-Frame-Options`, `X-Content-Type-Options`, `Referrer-Policy`, `Permissions-Policy`).
   - Anti-bot honeypot trapping (`hp_company`) and IP rate limiting on lead ingestion endpoints.
4. **Comprehensive SEO & Structured Data**:
   - Schema.org JSON-LD structured data (`Organization`, `Service`, `BreadcrumbList`).
   - Automated dynamic XML sitemap (`/sitemap.xml`) and crawler configuration (`robots.txt`).

---

## 2. Development & Quality Gate Pipeline

### Step 1: Asset Compilation & CSS Optimization
```sh
npm run build
```
Builds production frontend assets with Vite and Tailwind CSS v4, validating clean output without unoptimized CSS rules or bloated chunks.

### Step 2: Automated Test Suite Execution
```sh
php artisan test
```
Executes complete PHPUnit / Pest test suites validating:
- 200 OK responses on all public hubs and detail routes
- 404 handling on invalid slugs
- Lead database persistence via `LeadService`
- Honeypot spam defense and mandatory field validations
- XML sitemap generation and header verification
- Security header attachment

### Step 3: Database & Migration Verification
```sh
php artisan migrate:status
```
Confirms all table structures (`leads`, `cache`, `sessions`, `jobs`) are in sync with production schema specifications.

---

## 3. Production Deployment Gates

Before promoting to production:
1. Ensure `.env` specifies:
   ```ini
   APP_ENV=production
   APP_DEBUG=false
   APP_URL=https://zytrixontech.com
   ```
2. Execute optimization commands:
   ```sh
   php artisan config:cache
   php artisan route:cache
   php artisan view:cache
   ```
3. Run post-deploy smoke tests per `docs/22-qa-launch-checklist.md` §29.

---

## 4. Rollback Runbook

If a critical failure occurs during deployment:
1. **Application Rollback**: Restore the prior git commit release tag or docker container hash.
2. **Database Rollback**: Revert specific migrations if applicable (`php artisan migrate:rollback --step=1`).
3. **Cache Purge**: Flush runtime application cache (`php artisan optimize:clear`).
