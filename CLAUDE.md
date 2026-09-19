# CLAUDE.md — Zytrixon Website Engineering Rules

## 1. Project

This repository contains the production website for **Zytrixon**.

The implementation must preserve Zytrixon's existing identity while materially improving:

- clarity;
- credibility;
- performance;
- usability;
- accessibility;
- technical quality;
- conversion paths;
- maintainability.

This is a **Zytrixon V2**, not a generic agency-template redesign.

---

# 2. Read Before Coding

Before making implementation changes, read the relevant documentation.

At minimum:

```text
docs/00-current-site-audit.md
docs/01-brand-strategy.md
docs/02-product-requirements.md
docs/03-information-architecture.md
docs/04-design-system.md
docs/05-motion-system.md
docs/06-architecture.md
docs/07-type-system.md
docs/08-seo-strategy.md
docs/09-accessibility.md
docs/10-performance.md
docs/11-security.md
docs/12-testing.md
docs/13-deployment.md
docs/14-do-not-do.md
docs/15-content-strategy.md
docs/16-copywriting.md
docs/17-component-inventory.md
docs/18-page-specifications.md
docs/19-case-study-specification.md
docs/20-forms-and-leads.md
docs/21-analytics-measurement.md
docs/22-qa-launch-checklist.md
```

For architecture decisions, also read:

```text
docs/adr/
```

Do not implement from this file alone.

---

# 3. Architecture Decision

The public website is **Laravel-first**.

Use:

- Laravel;
- Blade;
- Vite;
- Tailwind CSS where appropriate;
- TypeScript only for client-side behavior that genuinely needs it.

Do **not** introduce Next.js, React, or a full SPA for the public website unless a new ADR explicitly changes the architecture.

The previous Next.js direction has been superseded by the Laravel requirement.

---

# 4. Rendering Philosophy

Prefer:

```text
Laravel route
→ Controller / content source
→ Blade
→ HTML visible immediately
→ lightweight progressive enhancement
```

The site must remain useful when JavaScript is unavailable for core content and navigation.

JavaScript is an enhancement layer, not the foundation of the public content experience.

---

# 5. Performance Is a Feature

The client explicitly wants the website to load easily.

Therefore:

- do not add a mandatory full-screen preloader;
- do not delay content until animation completes;
- do not add a fake progress bar;
- do not use a heavy video as a loading screen;
- do not load unnecessary animation libraries;
- do not ship large JavaScript for simple interactions;
- do not add third-party scripts without justification.

Useful content should become visible as early as possible.

---

# 6. Motion

Motion is purposeful, not decorative noise.

Preferred order:

1. CSS transitions;
2. CSS keyframes;
3. Intersection Observer for simple reveal behavior;
4. lightweight TypeScript enhancement;
5. a motion library only when justified;
6. GSAP only for an exceptional, documented interaction.

Prefer animating:

```text
transform
opacity
```

Avoid unnecessary layout-triggering animation.

Respect:

```text
prefers-reduced-motion
```

Never make essential information depend on animation.

---

# 7. Brand Direction

Zytrixon must not become a generic AI agency website.

Preserve and evolve:

- dark technical/editorial character;
- strong typography;
- structured layouts;
- numbered navigation language where appropriate;
- engineering credibility;
- interactive demonstrations where they provide real value;
- case-study-driven proof;
- clear business/technology relationship.

Do not use generic visual trends merely because they are popular.

---

# 8. Explicitly Avoid

Do not add:

- purple/blue gradient-everything;
- glassmorphism everywhere;
- glowing blobs;
- floating AI brains;
- random 3D objects;
- stock corporate people;
- fake client logos;
- fake testimonials;
- fake metrics;
- fake awards;
- fake case-study outcomes;
- excessive rounded cards;
- giant dashboard decoration with no purpose;
- gradient text by default;
- cursor-following gimmicks;
- scroll-jacking;
- blocking intro animations;
- excessive parallax;
- animation on every section;
- unnecessary microservices;
- unnecessary databases;
- unnecessary Kubernetes;
- dependency bloat.

Read `docs/14-do-not-do.md` before visual implementation.

---

# 9. Truthfulness

Never invent factual business information.

Do not invent:

- clients;
- client logos;
- testimonials;
- employee names;
- employee counts;
- project metrics;
- revenue;
- awards;
- certifications;
- countries served;
- technology usage;
- project outcomes.

If a required fact is missing, use an explicit placeholder/data state or ask for the source.

Do not silently fabricate copy to make a section look complete.

---

# 10. TypeScript Rules

When TypeScript is used:

- use strict typing;
- avoid `any`;
- avoid unnecessary type assertions;
- prefer explicit domain types;
- validate external input;
- keep types close to their domain where practical;
- do not duplicate incompatible types for the same entity.

External data is untrusted until validated.

---

# 11. Laravel Rules

Use Laravel conventions unless there is a documented reason not to.

Prefer:

- named routes;
- Form Requests for complex validation;
- Policies/Gates for authorization;
- services for non-trivial business logic;
- Blade components for reusable presentation;
- configuration/environment variables for environment-specific values;
- migrations for schema changes;
- escaped Blade output by default.

Do not put substantial business logic directly into Blade templates.

Do not expose secrets through Blade or client-side assets.

---

# 12. Blade Rules

Blade templates should remain readable.

Prefer:

```text
page
→ section
→ reusable component
```

over enormous monolithic templates.

Do not create abstractions merely to remove a few lines of markup.

Abstraction must reduce actual complexity.

---

# 13. Components

Reusable components should have:

- one clear responsibility;
- predictable inputs;
- documented states where necessary;
- accessibility behavior;
- responsive behavior;
- motion behavior where applicable.

Do not create:

```text
UniversalMegaCard
UniversalSection
UniversalHero
```

components that contain dozens of unrelated modes.

Prefer small composable components.

---

# 14. Content

Do not bury important business copy inside presentation code when the content architecture provides a better source of truth.

Services, case studies, team, insights, navigation, and global business information should follow the documented content architecture.

Content should be:

- specific;
- factual;
- concise;
- human;
- technically credible.

Avoid generic phrases such as:

- cutting-edge;
- world-class;
- seamless;
- revolutionary;
- next-generation;
- unlock your potential;
- transform your business;

unless a specific factual context actually justifies them.

Read `docs/16-copywriting.md`.

---

# 15. Forms

All public forms must follow:

```text
Client validation
→ Server validation
→ normalization
→ security checks
→ persistence/processing
→ notification
→ safe response
```

Never trust browser validation.

Never put privileged API keys in the browser.

Never send form PII to analytics.

Read `docs/20-forms-and-leads.md`.

---

# 16. Security

Treat all external input as untrusted.

Check:

- validation;
- escaping;
- authorization;
- CSRF where applicable;
- rate limiting;
- request size;
- upload safety;
- CORS;
- cookies;
- secrets;
- logs.

Do not add security controls blindly; understand the request/authentication model.

Read `docs/11-security.md`.

---

# 17. Analytics

Analytics must not become a dependency for core functionality.

Rules:

- no PII in analytics events;
- no form messages in analytics;
- no blocking analytics scripts;
- respect applicable consent requirements;
- isolate preview/test traffic;
- use documented event names;
- track meaningful business outcomes.

Read `docs/21-analytics-measurement.md`.

---

# 18. SEO

Every indexable page must have appropriate:

- title;
- meta description;
- canonical URL;
- heading hierarchy;
- Open Graph metadata;
- structured data where appropriate.

Do not generate keyword-stuffed copy.

Do not create SEO pages with no genuine user value.

---

# 19. Accessibility

Accessibility is part of implementation, not post-launch polish.

Every interactive component must consider:

- keyboard navigation;
- focus;
- semantic HTML;
- labels;
- error messaging;
- screen readers;
- reduced motion;
- contrast;
- touch targets.

Do not use color as the only means of communicating state.

---

# 20. Performance

Before adding a dependency, ask:

1. Can CSS solve this?
2. Can a small local utility solve this?
3. Is the dependency worth its bundle/runtime cost?
4. Does it improve the actual user experience?

Prefer:

- server-rendered HTML;
- optimized images;
- minimal client JS;
- lazy loading below-the-fold media;
- correct image dimensions;
- efficient fonts;
- selective third-party loading.

Do not optimize by guesswork. Measure when practical.

---

# 21. Testing

Every meaningful feature must be tested at the appropriate level.

Use:

- unit tests for pure logic;
- integration tests for Laravel/backend boundaries;
- browser/E2E tests for critical journeys;
- accessibility testing;
- responsive/device testing;
- production smoke testing.

Critical journeys include:

- navigation;
- contact submission;
- project inquiry;
- case-study navigation;
- mobile menu;
- important CTA paths.

Read `docs/12-testing.md` and `docs/22-qa-launch-checklist.md`.

---

# 22. Git / Change Discipline

Do not make unrelated changes.

For each implementation task:

1. inspect existing code;
2. identify relevant files;
3. state the plan;
4. implement only the requested scope;
5. run relevant checks;
6. inspect the diff;
7. report what changed.

Avoid large uncontrolled refactors.

Do not rewrite working systems simply because another implementation looks cleaner.

---

# 23. Antigravity Workflow

Antigravity is the implementation environment.

Claude should work in bounded tasks.

Good task:

```text
Read CLAUDE.md and docs/04-design-system.md.

Implement only the global typography tokens and base Blade layout.

Do not change page content, forms, routing, or animation.

After implementation:
1. run type/lint checks;
2. run relevant tests;
3. inspect the diff;
4. report changed files and any issues.
```

Bad task:

```text
Build the entire Zytrixon website.
```

Do not attempt the whole project in one uncontrolled generation.

---

# 24. Implementation Order

Follow this order unless a documented dependency requires otherwise.

## Phase 1 — Foundation

- Laravel project setup;
- environment configuration;
- Vite;
- Tailwind;
- base styles;
- content architecture;
- shared configuration;
- testing foundation.

## Phase 2 — Global shell

- layout;
- typography;
- navigation;
- footer;
- responsive container;
- base buttons/links;
- accessibility primitives.

## Phase 3 — Homepage

- hero;
- capabilities;
- proof/work;
- process;
- technology/engineering proof;
- CTA;
- footer.

## Phase 4 — Services

- services index;
- service detail template;
- service-specific content;
- interactive sections only where useful.

## Phase 5 — Work

- work index;
- case-study template;
- approved case studies;
- galleries/architecture visuals.

## Phase 6 — Company

- about;
- team;
- careers;
- insights.

## Phase 7 — Conversion

- contact;
- project inquiry;
- validation;
- email;
- persistence;
- analytics.

## Phase 8 — Polish

- purposeful motion;
- performance optimization;
- SEO;
- accessibility;
- responsive QA.

## Phase 9 — Launch

- security review;
- full test suite;
- production build;
- deployment;
- smoke test;
- monitoring.

---

# 25. Required Verification After Major Work

At the end of each meaningful implementation task, run the relevant checks.

At minimum:

```text
Laravel tests
TypeScript/type checks where applicable
Lint
Production build
Browser verification
Mobile verification
```

Do not claim a feature is complete merely because it compiles.

---

# 26. Definition of Done

A feature is done only when:

- [ ] requirement is implemented;
- [ ] architecture remains consistent;
- [ ] UI works on mobile and desktop;
- [ ] accessibility is considered;
- [ ] loading behavior is acceptable;
- [ ] errors are handled;
- [ ] security boundaries are respected;
- [ ] tests pass;
- [ ] production build passes;
- [ ] no unrelated files were modified;
- [ ] documentation is updated if architecture changed.

---

# 27. Decision Records

Architecture changes must be documented in:

```text
docs/adr/
```

Before introducing a major dependency or changing:

- rendering architecture;
- CMS;
- motion library;
- content architecture;
- database strategy;
- deployment architecture;

create/update an ADR.

Do not silently overturn an existing architectural decision.

---

# 28. Final Rule

When uncertain, prioritize in this order:

```text
Truth
↓
User experience
↓
Accessibility
↓
Performance
↓
Security
↓
Maintainability
↓
Brand expression
↓
Novelty
```

The goal is not to make the most technically fashionable website.

The goal is to ship a **fast, credible, distinctive, maintainable Zytrixon website that works in production.**
