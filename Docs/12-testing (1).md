# Zytrixon V2 — Testing Strategy

**Document:** `12-testing.md`  
**Project:** Zytrixon Website V2  
**Status:** Production Testing Specification  
**Depends on:** `02-product-requirements.md`, `06-architecture.md`, `07-type-system.md`, `09-accessibility.md`, `10-performance.md`, `11-security.md`

---

# 1. Testing Objective

Zytrixon V2 must be tested as a real production website, not merely as a React project that compiles.

Testing must verify:

```text
correctness
+
usability
+
responsiveness
+
accessibility
+
SEO
+
performance
+
security
```

The goal is confidence, not maximum test count.

---

# 2. Testing Philosophy

Use the right test at the right level.

```text
Unit
  ↓
Integration
  ↓
Component
  ↓
End-to-End
  ↓
Manual QA
```

Not every line of code needs a test.

Critical user journeys deserve stronger coverage than trivial presentation code.

---

# 3. Testing Pyramid

Recommended emphasis:

```text
        E2E
      /     \
 Integration  Visual/Accessibility
    /             \
 Unit + Component + Type checks
```

Keep E2E tests focused because they are slower and more fragile.

---

# 4. Type Checking

Type checking is a test gate.

Required:

```bash
pnpm typecheck
```

It must pass before production.

TypeScript errors must not be hidden with `any`, `@ts-ignore`, or unjustified `@ts-expect-error`.

---

# 5. Linting

Linting is another release gate.

```bash
pnpm lint
```

The lint configuration should catch unsafe patterns, React mistakes, accessibility issues where supported, unused imports, problematic hooks, and code-quality issues.

---

# 6. Unit Tests

Use unit tests for isolated logic.

Good candidates:

```text
slug utilities
formatters
validators
content helpers
SEO helpers
analytics helpers
data transformations
```

Avoid unit-testing trivial JSX markup.

---

# 7. Component Tests

Component tests should verify meaningful behaviour.

Examples:

```text
mobile menu opens
accordion expands
button invokes action
form displays validation
tabs switch correctly
filter changes result state
```

Do not test internal React implementation details.

---

# 8. Integration Tests

Integration tests verify that multiple parts work together.

Examples:

```text
contact form
+
validation
+
API route
+
success state
```

or:

```text
service content
+
service page
+
related case studies
```

---

# 8.1 Laravel Backend Tests

Because Zytrixon V2 is Laravel-first, backend tests must use the Laravel testing stack.

Cover:

- HTTP route behavior;
- Form Request validation;
- controllers;
- lead persistence;
- notifications/mail;
- rate limiting;
- spam protection;
- file validation;
- authorization where applicable;
- failure and retry behavior.

Use PHPUnit or Pest according to the repository standard.

Do not replace backend tests with browser tests. Browser tests verify user journeys; Laravel tests verify server behavior directly.

# 9. End-to-End Tests

Use Playwright or equivalent for browser-level testing.

E2E tests should represent actual user journeys.

They should run against a production-like build where practical.

---

# 10. Critical E2E Journeys

Minimum:

```text
1. Homepage loads
2. Main navigation works
3. Mobile navigation works
4. Service page opens
5. Case study opens
6. Contact form submits
7. Invalid contact input is handled
8. 404 page works
```

---

# 11. Careers E2E

If careers applications exist:

```text
Careers
 → job listing
 → job detail
 → application
 → validation
 → submission
```

This becomes a critical flow.

---

# 12. Insights E2E

If insights are published:

```text
Insights
 → article
 → related link
 → service/work page
```

Verify internal navigation.

---

# 13. Navigation Testing

Test desktop and mobile navigation separately.

Verify:

```text
links
active states
dropdowns
keyboard navigation
Escape
focus restoration
external links
```

---

# 14. Route Testing

Every public route should be tested for:

```text
HTTP success
correct title
correct H1
basic rendering
navigation
mobile layout
```

Dynamic routes should also test invalid slugs.

---

# 15. 404 Testing

Test:

```text
unknown route
invalid service slug
invalid case-study slug
invalid insight slug
```

Expected:

```text
HTTP 404
+
branded error UI
```

Do not silently redirect invalid pages to the homepage.

---

# 16. Redirect Testing

For migrated routes, verify:

```text
old URL
 → permanent redirect
 → new URL
```

Also check for redirect chains, loops, and incorrect destinations.

---

# 17. Form Testing

Contact forms require both client and server testing.

Test:

```text
valid submission
empty fields
invalid email
too-short message
oversized input
unexpected fields
duplicate submission
rate limiting
server failure
```

---

# 18. API Testing

API routes should be tested directly where practical.

Test:

```text
valid method
invalid method
valid payload
invalid payload
oversized payload
malformed JSON
rate limit
server failure
```

---

# 19. Security Test Inputs

Use malicious test cases where relevant:

```text
<script>alert(1)</script>
HTML injection
unexpected URLs
very long strings
special characters
unicode
invalid JSON
unexpected object fields
```

Expected result:

```text
safe rejection
or safe rendering
```

---

# 20. Form Accessibility Testing

Verify:

```text
label association
required state
error association
aria-invalid
aria-describedby
keyboard navigation
focus behaviour
success feedback
```

See `09-accessibility.md`.

---

# 21. Keyboard E2E Testing

Important flows should work with:

```text
Tab
Shift + Tab
Enter
Space
Escape
Arrow keys
```

Test navigation, menus, accordions, forms, and dialogs.

---

# 22. Screen Reader QA

Automated tests are insufficient.

Manually test representative pages with a mainstream screen reader.

Verify:

```text
page title
headings
landmarks
links
buttons
form labels
errors
dynamic state
```

---

# 23. Automated Accessibility Testing

Integrate automated accessibility checks where practical.

Possible:

```text
axe
Playwright accessibility checks
Lighthouse
```

These catch common issues but do not prove complete accessibility.

---

# 24. Responsive Testing

Test:

```text
small mobile
large mobile
tablet
desktop
large desktop
```

Also test awkward intermediate widths.

---

# 25. Browser Matrix

Minimum validation:

```text
Chrome
Edge
Firefox
Safari
Chrome Android
Safari iOS
```

Support policy should be documented in `README.md`.

---

# 26. Visual Regression

Visual regression is valuable for:

```text
homepage
navigation
hero
service pages
case studies
forms
mobile menu
```

Possible tooling:

```text
Playwright screenshots
Percy
Chromatic
```

Choose only what the project actually benefits from.

---

# 27. Screenshot Testing

If screenshot tests are used:

- keep viewport sizes deterministic
- control animation
- use stable test data
- wait for meaningful UI state
- avoid screenshots during loading

---

# 28. Animation Testing

Animations should not make tests flaky.

In E2E tests, disable/reduce animation where possible.

Test the resulting state rather than exact frame timing.

---

# 29. Reduced Motion Testing

Run a configuration with:

```text
prefers-reduced-motion: reduce
```

Verify:

```text
content remains visible
controls work
no essential motion is required
```

---

# 30. SEO Testing

For important routes verify:

```text
title
description
canonical
robots behaviour
H1
structured data
Open Graph
internal links
```

---

# 31. Sitemap and Robots Testing

Verify:

```text
sitemap exists
valid XML
expected routes included
private routes excluded
robots configuration is correct
production is indexable
staging is not accidentally indexable
```

---

# 32. Performance Testing

Performance testing should include:

```text
Lighthouse
browser performance profile
network throttling
CPU throttling
real device
```

Measure:

```text
LCP
INP
CLS
```

See `10-performance.md`.

---

# 33. Bundle Testing

After major dependency changes:

```text
inspect bundle
identify new dependencies
check client/server boundary
```

Do not allow accidental server-only modules into client bundles.

---

# 34. Security Testing

Security tests should verify where applicable:

```text
input validation
XSS protection
rate limits
security headers
CORS
CSP
error leakage
secret exposure
upload controls
```

---

# 35. Content Testing

Validate:

```text
required fields
duplicate slugs
broken references
missing images
invalid dates
invalid service relationships
```

Examples:

```text
every service slug is unique
every case-study reference exists
every navigation route exists
every insight has metadata
every published job is valid
```

---

# 36. Link and Asset Testing

Production crawling should identify:

```text
broken internal links
broken external links
bad anchors
missing routes
broken images
missing required alt text
oversized assets
```

Distinguish internal correctness from temporary external-site failures.

---

# 37. Error and Loading Testing

Every important interactive feature needs failure-state testing:

```text
network failure
API failure
invalid content
missing resource
third-party failure
```

Loading states must not trap focus, create infinite spinners, or hide useful static content.

---

# 38. Empty States

If a feature can return zero items, test the empty state.

Examples:

```text
work
insights
jobs
search
filters
```

---

# 39. Analytics Testing

Verify events are:

```text
fired
named correctly
payloads correct
not duplicated
not sent with sensitive data
```

Examples:

```text
cta_click
contact_start
contact_submit
contact_success
```

---

# 40. Test Data

Use deterministic synthetic test data.

Do not make E2E tests depend on:

```text
random external API data
live customer data
production personal data
```

Never run destructive automated tests against production data.

---

# 41. Mocking Strategy

Mock external services when:

```text
network reliability is irrelevant
the test would be slow
the service is costly
real integration creates side effects
```

Do not mock the system under test so heavily that the test proves nothing.

---

# 42. Test Environment

Recommended environments:

```text
local
preview/staging
production
```

Each should have appropriate:

```text
environment variables
integrations
analytics settings
robots/indexing settings
```

---

# 43. Staging Rules

Staging should:

```text
not be indexable
use test credentials
use synthetic data
allow E2E testing
```

---

# 44. Production Smoke Tests

After deployment, run a lightweight non-destructive smoke suite:

```text
homepage
navigation
service route
case study
contact page
404
sitemap
robots
```

---

# 45. CI Pipeline

Recommended order:

```text
Install
 ↓
Lint
 ↓
Typecheck
 ↓
Unit tests
 ↓
Integration/component tests
 ↓
Build
 ↓
E2E
 ↓
Accessibility checks
 ↓
Optional performance checks
```

Optimize ordering as CI time grows.

---

# 46. Pull Request Gates

At minimum:

```text
lint
typecheck
tests
build
```

must pass before merge.

E2E may run on important branches or PRs depending on CI cost.

---

# 47. Pre-Production Gate

Before release:

```text
automated checks
+
manual QA
+
responsive QA
+
accessibility QA
+
SEO QA
+
performance QA
+
security QA
```

must be completed.

---

# 48. Test Stability

Avoid arbitrary sleeps such as:

```ts
await page.waitForTimeout(3000);
```

Prefer waiting for actual application state.

A flaky test is a defect in the test suite, not something to ignore.

---

# 49. Coverage Philosophy

Coverage is a signal, not the goal.

Prioritize:

```text
critical paths
business logic
validation
security boundaries
data transformations
```

Do not chase 100% coverage blindly.

---

# 50. Snapshot Testing

Use snapshots sparingly.

Avoid massive component snapshots that fail whenever styling changes.

---

# 51. Production Console and Network QA

Major pages should not generate unexpected:

```text
console errors
unhandled promise rejections
404 assets
500 requests
failed fonts
failed images
unexpected third-party requests
```

---

# 52. Memory and Animation QA

Repeatedly:

```text
navigate
interact
open/close
route change
repeat
```

Then inspect memory and event/observer cleanup.

Pay particular attention to:

```text
GSAP
Motion
IntersectionObserver
event listeners
timers
```

---

# 53. Testing Anti-Patterns

Never:

- test implementation details instead of behaviour
- mock everything
- depend on production data
- use arbitrary sleeps
- ignore flaky tests
- chase 100% coverage blindly
- skip mobile QA
- skip keyboard QA
- treat Lighthouse as the entire QA process
- allow broken CI checks to merge
- test only the happy path

---

# 54. Definition of Done

Testing is ready when:

- TypeScript checks are automated
- linting is automated
- meaningful unit tests exist
- integration tests cover important boundaries
- E2E tests cover critical journeys
- accessibility checks exist
- responsive/browser testing is defined
- visual regression strategy is defined where useful
- security testing is defined
- SEO testing exists
- performance testing exists
- CI gates are documented
- staging smoke testing exists
- production smoke testing exists
- flaky-test handling is defined

---

# 55. Final Principle

**Test what can break the business, not what is easiest to count.**

For Zytrixon V2, the highest-value tests protect:

```text
navigation
+
service discovery
+
case-study discovery
+
lead generation
+
mobile usability
+
accessibility
+
SEO
+
security
```

The test suite should give the team confidence to change the site without fear.

---

# 56. Status

**Status:** Production testing specification.

**Next document:** `13-deployment.md`
