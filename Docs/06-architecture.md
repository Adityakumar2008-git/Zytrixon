# Zytrixon V2 — Technical Architecture

**Document:** `06-architecture.md`  
**Project:** Zytrixon Website V2  
**Status:** Production Architecture Specification  
**Depends on:** `00-current-site-audit.md` through `05-motion-system.md`

---

# 1. Architecture Objective

Zytrixon V2 must be built as a production website, not as a large collection of visually impressive pages.

The architecture must support:

- maintainability
- strong SEO
- high performance
- accessibility
- typed content
- reusable UI
- service expansion
- case-study expansion
- future SaaS/product pages
- secure lead submission
- analytics
- independent content updates
- controlled animation
- predictable deployment

The architecture should remain understandable to another engineer joining the project later.

---

# 2. Recommended Stack

Primary stack:

```text
Framework:       Laravel
Rendering:        Blade
Language:         PHP + TypeScript where browser-side code is required
Styling:         Tailwind CSS + CSS where appropriate
Interaction:      Alpine.js / vanilla TypeScript only where justified
Motion:           CSS transitions + lightweight browser APIs
Advanced Motion:  GSAP only for a documented, high-value interaction
Validation:       Laravel Form Requests + shared client validation where useful
Forms:            Native HTML + Blade; Alpine only where interaction requires it
Package Manager:  Composer + npm
Linting:          Laravel Pint + ESLint where TypeScript is used
Formatting:       Prettier where frontend assets require it
Testing:          PHPUnit/Pest + Playwright
```

The exact versions should be selected during project initialization based on current stable releases.

---

# 3. Architectural Principle

The application should follow this conceptual structure:

```text
CONTENT
   ↓
DOMAIN / DATA
   ↓
PAGE COMPOSITION
   ↓
UI COMPONENTS
   ↓
INTERACTION
   ↓
STYLING / MOTION
```

Do not mix all of these responsibilities inside individual page files.

---

# 4. Laravel Strategy

The client has explicitly requested a Laravel implementation.

Laravel is therefore the primary application framework for Zytrixon V2.

Recommended structure:

```text
Laravel
├── Blade views
├── Controllers
├── Form Requests
├── Services
├── Models / persistence where required
├── Routes
└── Vite-managed frontend assets
     ├── TypeScript only where browser logic is necessary
     ├── Tailwind CSS
     └── lightweight interaction layer
```

Use Laravel for:

- routing;
- server-rendered pages;
- form handling;
- validation;
- lead processing;
- email notifications;
- persistence;
- authentication if later required;
- server-side SEO metadata;
- security boundaries.

Use Blade for content-heavy pages and normal page rendering.

Do **not** introduce React/Next.js merely because it is familiar. The website should remain Laravel-first unless a later requirement demonstrates a real need for a separate frontend application.

---

# 4.1 Laravel Rendering Principle

Prefer server-rendered HTML.

```text
Request
  ↓
Laravel route
  ↓
Controller
  ↓
Blade view
  ↓
HTML delivered quickly
  ↓
Small optional JS enhancement
```

Avoid turning the entire website into a client-rendered application.

---

# 4.2 Frontend JavaScript Rule

Browser JavaScript must be treated as an enhancement layer.

Use JavaScript only for:

- meaningful interaction;
- form enhancement;
- lightweight motion;
- navigation behavior;
- interactive demos;
- progressive enhancement.

Do not require a large JavaScript runtime before the core page becomes usable.

---

# 4.3 Vite

Use Vite for frontend asset bundling where needed.

Keep the asset pipeline small.

Only ship JavaScript to a page when that page actually requires it.

---

# 4.4 Laravel API / Endpoint Strategy

Do not create an API layer for every website interaction.

For ordinary website forms and server-rendered flows, prefer Laravel web routes and controllers.

Use JSON/API endpoints only when a real asynchronous interaction requires them.

Examples:

```text
POST /contact
POST /project-inquiry
POST /careers/application
```

For interactive UI that genuinely requires asynchronous data:

```text
GET /api/...
POST /api/...
```

Keep the API surface intentionally small.

---

# 5. Server Rendering vs Browser Enhancement

Default:

```text
Server-rendered Blade
```

Use browser-side TypeScript/Alpine only when the component requires:

- browser APIs;
- local interaction state;
- event handlers;
- interactive animation;
- real-time UI;
- enhanced form behavior;
- client-only libraries.

Example:

```text
Blade Page
 ├── Server-rendered
 │    ├── Hero
 │    ├── Content
 │    └── CaseStudies
 │
 └── Lightweight enhancement
      ├── Navigation interaction
      ├── ServiceExplorer
      └── ContactForm validation/UX
```

Do not create a client-side application merely to animate a page.

---

# 6. Client Boundary Rule

Keep the client boundary as small as practical.

Bad:

```tsx
"use client";

export default function HomePage() {
  // entire page becomes client-side
}
```

Better:

```text
Server Page
    ↓
Interactive Section
    ↓
Small Client Component
```

This reduces:

- JavaScript
- hydration
- bundle size
- complexity

---

# 7. Route Architecture

Recommended route structure:

```text
/
├── /services
│   ├── /web-development
│   ├── /app-development
│   ├── /custom-software
│   ├── /ai-automation
│   ├── /iot-solutions
│   ├── /digital-marketing
│   ├── /business-consulting
│   ├── /business-strategy
│   ├── /chatbot-integration
│   ├── /whatsapp-api
│   └── /payment-gateway-integration
│
├── /work
│   └── /[slug]
│
├── /about
├── /team
├── /careers
├── /insights
│   └── /[slug]
│
└── /contact
```

Final routes must be validated against the approved IA document before implementation.

---

# 8. Route Group Strategy

Use route groups where they improve organization without changing public URLs.

Possible:

```text
src/app/
├── (marketing)/
│   ├── page.tsx
│   ├── services/
│   ├── work/
│   ├── about/
│   ├── team/
│   ├── careers/
│   ├── insights/
│   └── contact/
│
└── api/
```

Do not introduce route groups merely for abstraction.

---

# 9. Layout Architecture

Global layout should contain only genuinely global concerns.

```text
RootLayout
 ├── Global metadata
 ├── Font loading
 ├── Theme / visual foundation
 ├── Header
 ├── Main
 └── Footer
```

Do not place page-specific content in the root layout.

---

# 10. Page Composition

A page should primarily compose sections.

Example:

```tsx
export default function HomePage() {
  return (
    <>
      <Hero />
      <CapabilityExplorer />
      <SelectedWork />
      <Process />
      <AboutPreview />
      <FinalCTA />
    </>
  );
}
```

The page should not contain hundreds of lines of styling and interaction logic.

---

# 11. Component Architecture

Recommended layers:

```text
components/
├── ui/
├── navigation/
├── sections/
├── services/
├── work/
├── forms/
├── motion/
└── layout/
```

---

# 12. UI Components

`components/ui` contains low-level reusable components.

Examples:

```text
Button
Link
Container
SectionLabel
Input
Textarea
Badge
Divider
IconButton
```

These components should remain domain-agnostic.

---

# 13. Domain Components

Domain components belong to specific product concepts.

Examples:

```text
ServiceList
ServiceExplorer
CaseStudyCard
CaseStudyHero
ProcessTimeline
TeamMember
JobCard
InsightCard
```

Do not put service-specific logic into generic UI primitives.

---

# 14. Section Components

Section components represent meaningful page sections.

Examples:

```text
Hero
ServicesOverview
SelectedWork
ProcessSection
TechnologySection
GlobalReach
FinalCTA
```

A section may compose several domain and UI components.

---

# 15. Component Composition Rule

Prefer composition over huge configurable components.

Bad:

```tsx
<Card
  type="service"
  variant="dark"
  interactive
  animated
  compact
  showIcon
  showArrow
  ...
/>
```

Better:

```tsx
<ServiceCard>
  <ServiceIcon />
  <ServiceContent />
  <ServiceArrow />
</ServiceCard>
```

---

# 16. Content Architecture

Content must be separated from presentation where practical.

Recommended:

```text
src/content/
├── services.ts
├── case-studies.ts
├── team.ts
├── careers.ts
├── insights.ts
├── navigation.ts
└── site.ts
```

This makes repeated content structures easier to maintain.

---

# 17. Typed Content

Content must have explicit TypeScript types.

Example:

```ts
export interface Service {
  slug: string;
  title: string;
  category: ServiceCategory;
  summary: string;
  description: string;
  capabilities: string[];
}
```

Avoid untyped object collections.

---

# 18. Domain Types

Recommended:

```text
src/types/
├── service.ts
├── case-study.ts
├── team.ts
├── career.ts
├── insight.ts
├── form.ts
└── common.ts
```

Do not create a type file for every trivial interface.

---

# 19. Data Validation

External data must not be trusted merely because TypeScript types exist.

TypeScript provides compile-time guarantees.

Runtime input requires validation.

Use Zod for:

- contact form input
- API payloads
- environment variables where useful
- external integrations

---

# 20. Environment Variables

Never hardcode:

- API keys
- secret tokens
- database credentials
- webhook secrets
- email credentials

Use environment variables.

Categorize them:

```text
NEXT_PUBLIC_*
```

for browser-safe values.

Everything else should remain server-side.

---

# 21. Environment Validation

Create a typed environment configuration.

Conceptually:

```text
Server Environment
 ├── required secrets
 ├── optional integrations
 └── deployment configuration
```

Fail clearly when required production variables are missing.

---

# 22. API Architecture

Use Next.js Route Handlers for lightweight website-specific backend functionality.

Example:

```text
/api/contact
/api/newsletter
```

Only create APIs required by the website.

Do not build a full backend prematurely.

---

# 23. Contact Form Flow

Recommended:

```text
Client Form
    ↓
Client validation
    ↓
POST /api/contact
    ↓
Server validation
    ↓
Rate limit / abuse checks
    ↓
Lead handling
    ↓
Email / CRM / notification
    ↓
Success response
```

Validation must occur on the server even if client validation exists.

---

# 24. Contact Security

Contact endpoints must consider:

- rate limiting
- spam protection
- payload limits
- origin/CSRF considerations
- input sanitization
- email header injection
- abuse monitoring

Never trust form data.

---

# 25. Analytics Architecture

Analytics should be centralized.

Track meaningful events such as:

```text
page_view
service_view
case_study_view
cta_click
contact_start
contact_submit
contact_success
career_view
job_apply
```

Do not track everything merely because it can be tracked.

---

# 26. Analytics Privacy

Avoid collecting unnecessary personal data.

Do not send:

- raw form contents
- passwords
- secrets
- unnecessary identifiers

into analytics platforms.

---

# 27. SEO Architecture

Each indexable route should have:

- title
- description
- canonical URL
- Open Graph metadata
- social image where appropriate
- structured data where appropriate

Metadata should be generated from typed page content where practical.

---

# 28. Structured Data

Use schema markup where genuinely applicable.

Possible types:

```text
Organization
WebSite
BreadcrumbList
Article
JobPosting
Service
```

Do not add irrelevant schema simply to increase markup volume.

---

# 29. Sitemap

Generate a sitemap from known public routes/content.

Dynamic content such as:

```text
/work/[slug]
/insights/[slug]
```

must be included if indexable.

---

# 30. Robots

Robots configuration should:

- allow legitimate public pages
- block private/internal routes
- avoid accidental noindex behaviour

Verify production output.

---

# 31. Error Architecture

Provide:

```text
not-found.tsx
error.tsx
global-error.tsx
loading.tsx
```

where appropriate.

Errors should preserve Zytrixon visual identity.

Do not expose stack traces or sensitive server information.

---

# 32. Loading Architecture

Loading states should be used only where actual asynchronous work exists.

Do not create artificial loading delays.

---

# 33. Image Architecture

Use Next.js image optimization.

Rules:

- define meaningful dimensions
- provide appropriate alt text
- use responsive sizing
- avoid oversized source images
- use modern formats where appropriate
- lazy-load below-the-fold imagery

Hero/LCP imagery requires special handling.

---

# 34. Font Architecture

Fonts should be loaded through an optimized mechanism.

Avoid:

- excessive font families
- unnecessary weights
- blocking external font requests

The typography system must match `04-design-system.md`.

---

# 35. Styling Architecture

Use Tailwind for:

- layout
- spacing
- responsive behaviour
- common utilities

Use CSS/modules/global styles where they provide clearer control for:

- complex visual effects
- custom properties
- advanced animations
- unusual layout primitives

Do not create giant utility strings that become unreadable.

---

# 36. Design Tokens

Centralize core values:

```text
colors
spacing
typography
radius
borders
shadows
motion
breakpoints
z-index
```

Avoid arbitrary values repeated throughout the codebase.

---

# 37. CSS Custom Properties

Use CSS variables for values that need runtime consistency.

Examples:

```css
--color-background
--color-foreground
--color-muted
--border-subtle
--space-section
--container-max
```

Do not create variables for every single CSS property.

---

# 38. Responsive Architecture

Design from content constraints, not device names alone.

Primary considerations:

```text
small mobile
large mobile
tablet
desktop
large desktop
```

Breakpoints should be based on layout failure points.

---

# 39. Mobile-First Rule

Base styles should work on small screens first.

Then enhance for larger screens.

Avoid building desktop first and attempting to compress it into mobile.

---

# 40. Navigation Architecture

Navigation should be data-driven.

Example:

```ts
const navigation = [
  {
    label: "Services",
    href: "/services",
    children: [...]
  },
  ...
];
```

The same source should support:

- desktop navigation
- mobile navigation
- breadcrumbs where appropriate

Avoid maintaining separate manually duplicated nav definitions.

---

# 41. Service Architecture

Services should be represented as structured content.

Example:

```text
Service
 ├── identity
 ├── positioning
 ├── problem
 ├── capabilities
 ├── process
 ├── deliverables
 ├── related work
 ├── FAQs
 └── CTA
```

This supports consistent but not identical service pages.

---

# 42. Avoid Service Template Monotony

A common component architecture does not mean every service page must look identical.

Use:

```text
Shared foundation
+
Service-specific modules
```

For example:

```text
IoT
 → architecture diagrams
 → device/data workflow

AI Automation
 → trigger/action workflow
 → automation estimator

Custom Software
 → system architecture
 → ERP/product workflow
```

---

# 43. Case Study Architecture

Case studies should be structured as engineering narratives.

Recommended model:

```text
CaseStudy
 ├── client/project
 ├── summary
 ├── challenge
 ├── approach
 ├── architecture
 ├── implementation
 ├── technology
 ├── outcomes
 ├── media
 └── related services
```

Do not invent metrics.

---

# 44. Case Study Data Integrity

Metrics must have a source.

Acceptable:

```text
Client-provided
Internal measurement
Production analytics
Documented project result
```

If a metric cannot be verified, omit it.

---

# 45. Insights Architecture

Insights should support:

- articles
- engineering notes
- business/technology analysis
- company updates where appropriate

Use structured metadata:

```text
slug
title
description
author
publishedAt
updatedAt
category
tags
coverImage
content
```

---

# 46. Careers Architecture

Job postings should be structured.

Example:

```text
Job
 ├── title
 ├── location
 ├── type
 ├── department
 ├── summary
 ├── responsibilities
 ├── requirements
 └── application
```

Do not show expired positions as active.

---

# 47. Search

Site search is not automatically required.

Implement only if the amount of content justifies it.

If implemented:

```text
Search input
 ↓
Query normalization
 ↓
Search index
 ↓
Ranked results
```

Do not add a heavy search system for a small marketing site.

---

# 48. State Management

Global state should be avoided unless genuinely necessary.

Prefer:

- server data
- URL state
- local component state
- form state

Do not install Redux/Zustand/etc. by default.

---

# 49. URL State

Use URL parameters when state should be:

- shareable
- bookmarkable
- navigable

Examples:

```text
/services?category=automation
/work?industry=retail
```

Only implement filtering if the content volume warrants it.

---

# 50. Caching

Prefer Next.js caching and static generation where appropriate.

Do not add Redis or external caching merely because it sounds production-grade.

The current website is primarily content-driven.

Architecture should scale when actual demand requires it.

---

# 51. Database

A database is not required for the first website release unless a real feature needs one.

Possible database-backed features later:

- CMS
- lead management
- careers applications
- authenticated product areas

Do not introduce database infrastructure just to store static marketing content.

---

# 52. CMS Decision

A CMS should be introduced only if non-developers need regular content updates.

Until that requirement is confirmed, typed repository content is acceptable.

If a CMS is later selected:

```text
CMS
 ↓
Typed transformation
 ↓
Page components
```

Do not couple UI components directly to raw CMS response shapes.

---

# 53. Third-Party Integrations

Integrations should live behind small adapters.

Example:

```text
lib/integrations/
├── email.ts
├── analytics.ts
├── crm.ts
└── captcha.ts
```

The rest of the application should not depend directly on vendor-specific APIs.

---

# 54. Integration Interface

Example concept:

```ts
interface LeadService {
  createLead(input: LeadInput): Promise<LeadResult>;
}
```

Vendor implementation can change without rewriting the contact page.

---

# 55. Dependency Management

Every dependency must answer:

> Why does the project need this?

Prefer:

```text
fewer dependencies
+
well-understood libraries
+
native platform features
```

Avoid dependency accumulation.

---

# 56. TypeScript Rules

The project should use:

```json
{
  "compilerOptions": {
    "strict": true
  }
}
```

Avoid:

```ts
any
```

unless there is a documented exceptional reason.

Prefer:

- unknown
- discriminated unions
- explicit interfaces/types
- type guards
- generics where useful

---

# 57. Type Safety Boundary

Do not use TypeScript as a replacement for validation.

```text
TypeScript
→ compile-time safety

Zod/runtime validation
→ runtime safety
```

Both are required where external input exists.

---

# 58. Error Handling

Errors should be explicit and contextual.

Bad:

```ts
catch {
  return null;
}
```

if the error matters.

Prefer:

```text
log internally
+
return safe user-facing state
+
avoid leaking sensitive details
```

---

# 59. Logging

Production logs should contain useful operational information.

Do not log:

- secrets
- passwords
- full form submissions
- tokens
- unnecessary personal information

Use structured logging if the backend complexity grows.

---

# 60. Security Headers

Production deployment should evaluate:

- Content-Security-Policy
- Referrer-Policy
- X-Content-Type-Options
- Permissions-Policy
- frame-ancestors / clickjacking protection

Configuration should be tested rather than copied blindly.

---

# 61. Content Security Policy

CSP should be introduced carefully.

Third-party services such as:

- analytics
- fonts
- maps
- forms
- video

may require explicit allowances.

Do not use an unnecessarily permissive policy such as:

```text
*
```

for everything.

---

# 62. Accessibility Architecture

Components must support:

- semantic HTML
- keyboard interaction
- visible focus
- screen readers
- reduced motion
- appropriate contrast

Do not rely on visual animation to communicate state.

---

# 63. Testing Architecture

Tests should exist at multiple levels:

```text
Unit
 ↓
Integration
 ↓
End-to-End
```

Not every visual component needs a huge test suite.

Prioritize critical business flows.

---

# 64. Critical E2E Flows

At minimum:

```text
Homepage navigation
Service navigation
Case study navigation
Contact form
Mobile menu
404 page
```

If careers applications are implemented:

```text
Career page
 → Job detail
 → Application
```

---

# 65. Component Testing

Test behaviour rather than implementation details.

Good:

```text
Button invokes action
Accordion opens
Form rejects invalid data
Navigation works
```

Avoid brittle tests tied to internal component structure.

---

# 66. Visual QA

Use screenshots during development to compare:

- desktop
- tablet
- mobile
- key routes
- dark/light states if applicable

Visual regression tooling may be introduced if the project grows.

---

# 67. Performance Architecture

Primary goals:

- fast first render
- minimal client JavaScript
- optimized images
- stable layout
- efficient fonts
- limited third-party scripts

Track:

```text
LCP
INP
CLS
```

alongside real-world device performance.

---

# 68. Core Web Vitals

Do not optimize only Lighthouse scores.

Evaluate:

```text
Real devices
+
Real network conditions
+
Real interaction
```

A 95 Lighthouse score is not proof of a good website.

---

# 69. Third-Party Script Rule

Every third-party script should have a documented reason.

Examples:

```text
Analytics
CRM
Captcha
Chat
```

Load them only when needed.

---

# 70. Animation Architecture

Animation should remain isolated from core content rendering.

Conceptual:

```text
content
   ↓
component
   ↓
motion wrapper
```

Avoid putting animation calculations directly into content models.

See `05-motion-system.md`.

---

# 71. Motion Library Rule

Use CSS first.

Then Motion.

Then GSAP only when necessary.

Architecture should not depend on a large animation library for simple opacity/transform transitions.

---

# 72. File Structure

Recommended foundation:

```text
src/
├── app/
│   ├── (marketing)/
│   ├── api/
│   ├── error.tsx
│   ├── not-found.tsx
│   └── layout.tsx
│
├── components/
│   ├── ui/
│   ├── layout/
│   ├── navigation/
│   ├── sections/
│   ├── services/
│   ├── work/
│   ├── forms/
│   └── motion/
│
├── content/
│   ├── services.ts
│   ├── case-studies.ts
│   ├── team.ts
│   ├── careers.ts
│   ├── insights.ts
│   ├── navigation.ts
│   └── site.ts
│
├── hooks/
├── lib/
│   ├── analytics/
│   ├── integrations/
│   ├── seo/
│   ├── validation/
│   └── utils/
│
├── types/
└── styles/
```

---

# 73. Naming Conventions

Use clear names.

Components:

```text
PascalCase
```

Functions/variables:

```text
camelCase
```

Routes:

```text
kebab-case
```

Types:

```text
PascalCase
```

Constants:

```text
UPPER_SNAKE_CASE
```

Do not use unclear abbreviations.

---

# 74. Import Boundaries

Avoid deep relative imports such as:

```text
../../../../components/...
```

Configure aliases such as:

```text
@/components
@/content
@/lib
@/types
```

Keep imports predictable.

---

# 75. Circular Dependency Prevention

Domain layers should not depend on each other randomly.

Prefer:

```text
types
 ↓
content
 ↓
components
 ↓
pages
```

Shared utilities should remain genuinely shared.

---

# 76. Architecture Decision Records

Important decisions should be documented under:

```text
docs/adr/
```

Examples:

```text
001-nextjs-app-router.md
002-content-architecture.md
003-cms-decision.md
004-animation-library.md
005-form-backend.md
```

Use ADRs when a decision has meaningful long-term consequences.

---

# 77. Documentation Rule

Code should explain itself where possible.

Comments should explain:

- why
- constraints
- non-obvious decisions

Avoid comments that simply restate code.

Bad:

```ts
// Set loading to true
setLoading(true);
```

Good:

```ts
// Prevent duplicate submissions while the server processes the lead.
setLoading(true);
```

---

# 78. Architecture Smells

Stop and reconsider if implementation begins producing:

- giant page components
- giant `utils.ts`
- giant `components.tsx`
- duplicated service data
- duplicated navigation
- excessive context providers
- global client state
- dozens of animation hooks
- uncontrolled third-party scripts
- API calls directly inside random UI components

---

# 79. Production Build Requirements

Before release:

```text
pnpm lint
pnpm typecheck
pnpm test
pnpm build
```

All must pass.

Add E2E/browser checks before production deployment.

---

# 80. Development Workflow

For every feature:

```text
1. Read relevant docs
2. Inspect existing code
3. Define scope
4. Implement smallest correct solution
5. Typecheck
6. Lint
7. Test
8. Browser test
9. Mobile test
10. Review diff
```

Do not implement unrelated cleanup in the same task.

---

# 81. Claude Implementation Boundary

Claude Opus should not receive:

> "Build the entire Zytrixon website."

Instead:

```text
Read CLAUDE.md and the relevant architecture/design docs.

Inspect the current repository.

Implement only the requested bounded feature.

Do not modify unrelated files.

Explain architectural decisions before implementation when ambiguity exists.

Run typecheck, lint and relevant tests after implementation.
```

This reduces uncontrolled code generation.

---

# 82. Architecture Definition of Done

The architecture is ready when:

- App Router structure is established
- Server/client boundaries are defined
- content architecture exists
- domain types exist
- API boundaries are defined
- environment strategy exists
- integration adapters are defined
- SEO architecture exists
- analytics architecture exists
- error/loading strategy exists
- testing strategy exists
- security boundaries exist
- performance rules exist
- dependency rules exist
- repository structure is documented

---

# 83. Final Architectural Principle

Zytrixon V2 should be engineered with the same philosophy the brand communicates to clients:

> **Understand the problem. Simplify the system. Build only what is needed.**

Do not create infrastructure for imaginary scale.

Do not add libraries for imaginary requirements.

Do not create abstractions before repetition exists.

Do not sacrifice maintainability for visual novelty.

The architecture should be sophisticated where complexity is real and deliberately simple everywhere else.

---

# 84. Status

**Status:** Production architecture specification.

This document defines the technical foundation for implementation.

**Next document:** `07-type-system.md`
