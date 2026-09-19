# 22 — QA / Launch Checklist

## 1. Purpose

This document is the final release gate for the Zytrixon website.

The site is ready to launch only when:

- the actual requested features work;
- content is accurate;
- forms work;
- Laravel production behavior is verified;
- the site is responsive;
- accessibility requirements are met;
- performance is acceptable;
- security controls are in place;
- SEO is correct;
- analytics is correctly configured;
- deployment and rollback are understood.

A polished visual result is not sufficient.

---

# 2. Release Philosophy

Use this sequence:

```text
Build
  ↓
Verify
  ↓
Test
  ↓
Fix
  ↓
Re-test
  ↓
Production deploy
  ↓
Smoke test
  ↓
Monitor
```

Never treat deployment as the end of QA.

---

# 3. Pre-Launch Blockers

The following are release blockers:

- broken primary navigation;
- broken mobile navigation;
- broken contact/project form;
- incorrect production environment;
- exposed secrets;
- broken HTTPS;
- major accessibility failure;
- serious console/runtime errors;
- missing production database migration;
- broken canonical URLs;
- broken critical images;
- accidental test content;
- incorrect company claims;
- fake metrics/testimonials;
- severe performance regression;
- broken Laravel routes;
- broken Vite asset loading.

---

# 4. Requirements Verification

Before testing implementation, verify the approved requirements.

### Client requirements

- [ ] Laravel is the primary web architecture.
- [ ] Antigravity implementation workflow is documented.
- [ ] Website loads without a blocking heavy loader.
- [ ] Loading animation is lightweight and optional.
- [ ] Animation does not delay content visibility.
- [ ] Existing Zytrixon identity is preserved.
- [ ] No unnecessary redesign unrelated to the brief.

Every requirement should map to a test or inspection method.

---

# 5. Repository / Code Quality

- [ ] Repository structure matches architecture documentation.
- [ ] Laravel configuration is production-safe.
- [ ] TypeScript is strict where TypeScript is used.
- [ ] No unexplained `any`.
- [ ] No dead code in critical paths.
- [ ] No unused production dependencies.
- [ ] No unnecessary JavaScript framework.
- [ ] No duplicated business logic.
- [ ] No hard-coded secrets.
- [ ] Environment variables are documented.
- [ ] Error handling exists at system boundaries.
- [ ] Formatting/linting passes.
- [ ] Static analysis passes where configured.

---

# 6. Laravel Verification

## Application

- [ ] Production environment is configured correctly.
- [ ] `APP_ENV` is production.
- [ ] `APP_DEBUG` is disabled.
- [ ] Application key exists and is secure.
- [ ] Production URL is correct.
- [ ] Trusted proxy configuration is correct where required.
- [ ] Session configuration is production-safe.
- [ ] Cache configuration is correct.
- [ ] Queue configuration is correct if queues are used.

## Routes

- [ ] All public routes resolve.
- [ ] No accidental development routes are exposed.
- [ ] HTTP methods are correct.
- [ ] Route names are consistent.
- [ ] 404 behavior works.
- [ ] 500 behavior works.

## Blade

- [ ] Shared layout works.
- [ ] Navigation works.
- [ ] Footer works.
- [ ] CSRF tokens exist on applicable forms.
- [ ] Validation errors render correctly.
- [ ] Escaped output is used for untrusted data.
- [ ] No unsafe raw HTML is rendered unnecessarily.

---

# 7. Database

If the website uses a database:

- [ ] Production database exists.
- [ ] Credentials are stored securely.
- [ ] Migrations are committed.
- [ ] Migrations have been tested.
- [ ] Database indexes are appropriate.
- [ ] Required seed/reference data exists.
- [ ] No development/test records remain.
- [ ] Backup strategy exists.
- [ ] Rollback/migration recovery procedure is understood.

Never run an untested destructive migration directly against production.

---

# 8. Forms

## Contact

- [ ] Required fields work.
- [ ] Optional fields work.
- [ ] Client validation works.
- [ ] Server validation works.
- [ ] Invalid email is rejected.
- [ ] Empty required fields are rejected.
- [ ] Oversized input is rejected.
- [ ] Honeypot works.
- [ ] Rate limiting works.
- [ ] Duplicate submission behavior is defined.
- [ ] Success state works.
- [ ] Failure state works.
- [ ] User-entered data is preserved on recoverable failure.
- [ ] Internal notification works.
- [ ] Confirmation email works if configured.

## Project inquiry

Repeat the same checks plus:

- [ ] project fields validate;
- [ ] attribution is captured correctly;
- [ ] attachment handling is secure if enabled;
- [ ] large/malicious attachments are rejected;
- [ ] CRM sync does not lose the lead.

---

# 9. Security

## Secrets

Search the repository for accidental secrets.

Check:

- API keys;
- database passwords;
- SMTP credentials;
- CRM tokens;
- analytics secrets;
- private keys.

Nothing sensitive belongs in Git.

## HTTP

- [ ] HTTPS works.
- [ ] HTTP redirects to HTTPS where appropriate.
- [ ] HSTS strategy is understood.
- [ ] Secure cookies are enabled where appropriate.
- [ ] HttpOnly cookies are enabled where appropriate.
- [ ] SameSite policy is intentional.
- [ ] Security headers are configured.
- [ ] CORS is restricted.
- [ ] Request size limits exist.

## Input security

- [ ] Server-side validation exists.
- [ ] User input is escaped.
- [ ] No unsafe HTML injection.
- [ ] File uploads are restricted.
- [ ] Path traversal is prevented.
- [ ] Header injection is prevented.
- [ ] Rate limiting exists on abuse-prone endpoints.

---

# 10. Authentication

If authentication exists:

- [ ] Login works.
- [ ] Logout works.
- [ ] Password reset works.
- [ ] Session invalidation works.
- [ ] Authorization rules are tested.
- [ ] Users cannot access another user's private data.
- [ ] CSRF protection is correct for cookie-authenticated flows.
- [ ] Brute-force protection exists.

Do not launch authentication merely because a UI exists.

---

# 11. Navigation

Test every primary route.

### Primary navigation

- [ ] Home
- [ ] Services
- [ ] Work
- [ ] About
- [ ] Team
- [ ] Insights
- [ ] Careers
- [ ] Contact

Only include items that actually exist in the final IA.

### Navigation behavior

- [ ] Desktop navigation works.
- [ ] Mobile navigation works.
- [ ] Keyboard navigation works.
- [ ] Active/current state is understandable.
- [ ] Escape closes overlays where applicable.
- [ ] Focus returns correctly after dialogs/mobile menu close.

---

# 12. Responsive QA

Test at minimum:

### Mobile

- 320px
- 375px
- 390px
- 430px

### Tablet

- 768px
- 820px
- 1024px

### Desktop

- 1280px
- 1440px
- 1920px

Look for:

- overflow;
- clipped text;
- broken grids;
- oversized headings;
- unusable forms;
- incorrect sticky elements;
- animation glitches;
- horizontal scrolling.

Do not optimize only for one desktop resolution.

---

# 13. Browser QA

At minimum verify current versions of:

- Chrome
- Edge
- Firefox
- Safari

Also test an actual Android device and an actual iPhone/iOS device where available.

Do not assume browser emulation catches every mobile issue.

---

# 14. Accessibility

## Semantic structure

- [ ] One appropriate primary page heading.
- [ ] Logical heading hierarchy.
- [ ] Landmarks exist.
- [ ] Buttons are buttons.
- [ ] Links are links.
- [ ] Images have appropriate alt behavior.
- [ ] Decorative images are not announced unnecessarily.

## Keyboard

- [ ] Entire site is navigable with keyboard.
- [ ] No keyboard traps.
- [ ] Focus is visible.
- [ ] Modal focus behavior works.
- [ ] Mobile menu is keyboard-accessible where relevant.

## Forms

- [ ] Labels are associated.
- [ ] Errors are associated.
- [ ] Required state is communicated.
- [ ] Error messages are understandable.
- [ ] Screen-reader announcements work.

## Motion

- [ ] `prefers-reduced-motion` is respected.
- [ ] No essential information depends on animation.
- [ ] No rapid flashing.
- [ ] No scroll-jacking.

---

# 15. Animation QA

This is a specific client requirement.

The site must **not** wait for a heavy animation before showing useful content.

Verify:

```text
Request
 ↓
HTML/content visible
 ↓
Assets progressively load
 ↓
Lightweight animation enhances the experience
```

Not:

```text
Request
 ↓
Full-screen loader
 ↓
Heavy animation
 ↓
Large JavaScript bundle
 ↓
Finally show content
```

Check:

- [ ] No mandatory long preloader.
- [ ] No fake progress bar.
- [ ] No large video used as a loading screen.
- [ ] No unnecessary Lottie animation.
- [ ] No animation blocking interaction.
- [ ] Reduced-motion behavior works.
- [ ] Animations remain smooth on lower-end devices.
- [ ] Animation does not create layout shift.

---

# 16. Performance

## Build

- [ ] Production build succeeds.
- [ ] No build warnings that indicate real problems.
- [ ] Assets are optimized.
- [ ] Images use appropriate dimensions/formats.
- [ ] Fonts are minimized.
- [ ] Unused JavaScript is removed.
- [ ] Third-party scripts are minimized.

## Runtime

Measure:

- LCP;
- INP;
- CLS;
- server response time;
- JavaScript errors;
- slow API requests.

Do not use arbitrary performance scores as the only release criterion.

---

# 17. Image QA

For every important image:

- [ ] correct source;
- [ ] correct aspect ratio;
- [ ] no broken URL;
- [ ] appropriate resolution;
- [ ] compressed;
- [ ] meaningful alt text where needed;
- [ ] decorative images handled appropriately.

Do not upscale low-quality images unnecessarily.

---

# 18. Typography

- [ ] Fonts load correctly.
- [ ] Fallback fonts work.
- [ ] No invisible text caused by font loading.
- [ ] Headings do not overflow.
- [ ] Body text remains readable.
- [ ] Line lengths are comfortable.
- [ ] Mobile type scale is correct.

---

# 19. Content Accuracy

This is a major launch gate.

Verify:

- company name;
- tagline;
- services;
- technology claims;
- team members;
- case-study details;
- client names/logos;
- metrics;
- project outcomes;
- contact details;
- locations;
- social links;
- careers;
- legal/privacy wording.

Every factual claim must have a source or internal approval.

Do not publish placeholder claims.

Never invent:

- clients;
- testimonials;
- awards;
- project metrics;
- employee counts;
- countries served;
- revenue;
- certifications.

---

# 20. Case Study QA

For every case study:

- [ ] title is correct;
- [ ] client/project attribution is approved;
- [ ] problem is accurate;
- [ ] constraints are accurate;
- [ ] technical decisions are accurate;
- [ ] architecture is accurate;
- [ ] screenshots are approved;
- [ ] metrics are sourced;
- [ ] confidential information is removed;
- [ ] CTA works;
- [ ] metadata is correct.

Case studies must represent evidence, not marketing fiction.

---

# 21. SEO

## Technical

- [ ] unique title per page;
- [ ] unique meta description;
- [ ] canonical URL;
- [ ] correct robots behavior;
- [ ] sitemap generated;
- [ ] robots.txt correct;
- [ ] Open Graph metadata;
- [ ] social preview image;
- [ ] structured data where appropriate.

## Content

- [ ] headings are meaningful;
- [ ] URLs are readable;
- [ ] internal links work;
- [ ] no accidental duplicate pages;
- [ ] no indexable preview/staging pages.

---

# 22. 404 / Error Pages

Test:

```text
/random-nonexistent-url
```

Verify:

- [ ] useful 404 page;
- [ ] navigation remains available;
- [ ] no stack trace;
- [ ] correct HTTP 404 status;
- [ ] analytics behavior is intentional.

Test server errors separately in a safe environment.

---

# 23. Analytics

- [ ] production analytics configuration is correct;
- [ ] preview analytics is isolated;
- [ ] page views are not duplicated;
- [ ] contact success event fires only after successful submission;
- [ ] project inquiry success event works;
- [ ] CTA events use correct properties;
- [ ] PII is not sent;
- [ ] consent behavior works where required;
- [ ] analytics failure does not break the website.

---

# 24. Third-Party Services

Create an inventory:

| Service | Purpose | Required for core site? |
|---|---|---|
| Analytics | Measurement | No |
| Email provider | Lead notifications | Business-critical |
| Maps | Location information | Maybe |
| CAPTCHA/Turnstile | Abuse prevention | Conditional |
| CRM | Lead workflow | Optional |
| CDN | Asset delivery | Infrastructure |

For every third-party service:

- [ ] credentials configured;
- [ ] failure behavior tested;
- [ ] privacy impact understood;
- [ ] loading impact understood;
- [ ] vendor dependency documented.

---

# 25. Email

Verify:

- [ ] sender domain is configured;
- [ ] SPF is configured where applicable;
- [ ] DKIM is configured where applicable;
- [ ] DMARC strategy exists;
- [ ] internal notification arrives;
- [ ] confirmation email arrives;
- [ ] reply-to behavior is correct;
- [ ] templates render correctly;
- [ ] failed delivery is observable.

Never use a random personal email account as the production sender without understanding deliverability implications.

---

# 26. Domain / DNS / HTTPS

Before launch:

- [ ] production domain points to correct infrastructure;
- [ ] `www` behavior is intentional;
- [ ] HTTP redirects correctly;
- [ ] HTTPS certificate is valid;
- [ ] DNS records are documented;
- [ ] staging/preview domain is not accidentally canonical;
- [ ] email DNS records are correct.

---

# 27. Deployment

## CI/CD

- [ ] production build passes;
- [ ] tests pass;
- [ ] lint/static checks pass;
- [ ] deployment is reproducible;
- [ ] migrations are controlled;
- [ ] environment variables exist.

## Rollback

Document:

- previous deploy identifier;
- rollback command/process;
- database rollback limitations;
- asset/cache invalidation process.

A rollback plan that depends on guessing during an outage is not a rollback plan.

---

# 28. Cache / CDN

After deployment:

- [ ] new CSS loads;
- [ ] new JS loads;
- [ ] images are current;
- [ ] cached HTML does not serve obsolete content;
- [ ] CDN cache behavior is understood;
- [ ] cache invalidation works where required.

---

# 29. Smoke Test After Production Deploy

Immediately verify:

1. Homepage loads.
2. Navigation works.
3. Services page loads.
4. Work/case study page loads.
5. Contact page loads.
6. Contact form submits.
7. Internal notification arrives.
8. Analytics receives the intended event.
9. Mobile navigation works.
10. 404 works.
11. HTTPS works.
12. No critical browser console errors.

---

# 30. Production Monitoring

For the first launch period, watch:

- HTTP 5xx rate;
- form failures;
- email failures;
- JavaScript errors;
- slow responses;
- unusual traffic spikes;
- spam volume;
- analytics anomalies.

Do not continuously watch manually when reliable alerting can handle it.

---

# 31. Rollback Criteria

Consider rollback when there is:

- broken primary conversion path;
- widespread rendering failure;
- serious security exposure;
- major data-loss risk;
- severe performance regression;
- incorrect production configuration;
- broken routing across important pages.

Minor cosmetic issues should normally be fixed forward unless they materially affect users.

---

# 32. Launch Sign-Off

Required sign-offs should cover:

### Product / Business

- [ ] approved content;
- [ ] approved service structure;
- [ ] approved case studies;
- [ ] approved CTAs.

### Design

- [ ] visual QA;
- [ ] responsive QA;
- [ ] motion QA.

### Engineering

- [ ] build;
- [ ] security;
- [ ] forms;
- [ ] performance;
- [ ] deployment.

### Content / SEO

- [ ] metadata;
- [ ] links;
- [ ] indexing;
- [ ] structured data.

Do not create fake approval names. Record the actual responsible person when the project team is established.

---

# 33. Final Launch Checklist

```text
[ ] Requirements verified
[ ] Laravel production configuration verified
[ ] Database verified
[ ] Forms verified
[ ] Security verified
[ ] Accessibility verified
[ ] Responsive verified
[ ] Browser/device verified
[ ] Animation/lightweight loading verified
[ ] Performance verified
[ ] Content verified
[ ] Case studies verified
[ ] SEO verified
[ ] Analytics verified
[ ] Email verified
[ ] DNS/HTTPS verified
[ ] CI/CD verified
[ ] Rollback plan verified
[ ] Production smoke test passed
[ ] Monitoring active
[ ] Launch approved
```

---

# 34. Post-Launch Review

Within the initial post-launch period, review:

- real user errors;
- form completion;
- unexpected mobile issues;
- performance data;
- broken links;
- search indexing;
- email delivery;
- spam;
- analytics quality.

Do not immediately redesign based on a handful of observations.

Collect evidence, identify patterns, then prioritize fixes.

---

# 35. Final Principle

> **Launch when the system is verified, not when the homepage looks finished.**

The final Zytrixon release should be fast, truthful, accessible, secure, measurable, maintainable, and reliable under real use.
