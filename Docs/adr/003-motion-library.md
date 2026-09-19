# ADR 003 — Motion Library and Animation Strategy

- **Status:** Accepted
- **Date:** 2026-09-19
- **Decision type:** Frontend UX / performance
- **Scope:** Zytrixon public website

## Context

The existing Zytrixon identity includes interactive and motion-driven elements.

The client has explicitly requested:

- no heavy loading animation;
- easy/fast website loading;
- animations only where they improve the website experience.

The project must therefore avoid animation becoming a performance dependency.

## Decision

Use a **CSS-first motion strategy** with lightweight TypeScript enhancement.

Preferred order:

1. CSS transitions/animations;
2. Intersection Observer for simple reveal behavior;
3. a lightweight motion library only where interaction complexity justifies it;
4. GSAP only for exceptional, documented sequences where simpler tools are insufficient.

The exact library may be selected during implementation after bundle-size and browser-support verification.

## Loading behavior

The site must not use a mandatory heavy preloader.

Required model:

```text
Request
  ↓
Server-rendered HTML
  ↓
Useful content visible
  ↓
Assets enhance page
  ↓
Optional motion
```

Forbidden model:

```text
Request
  ↓
Full-screen loader
  ↓
Large animation bundle
  ↓
Animation completes
  ↓
Content becomes visible
```

## Why

Motion should communicate hierarchy and interaction, not compensate for slow loading.

CSS transitions are:

- lightweight;
- widely supported;
- easy to maintain;
- less dependent on JavaScript.

## Motion principles

Use motion for:

- entering content;
- hover/focus feedback;
- navigation state;
- expanding/collapsing UI;
- meaningful transitions;
- selective storytelling.

Avoid motion for:

- decorative loops with no purpose;
- every section entering simultaneously;
- blocking page load;
- fake progress indicators;
- excessive parallax;
- scroll-jacking.

## Reduced motion

Respect:

```css
@media (prefers-reduced-motion: reduce)
```

Animations that are not essential should be reduced or removed.

## Performance requirements

Animation must not:

- cause avoidable layout shifts;
- depend on expensive DOM measurements every frame;
- continuously consume CPU on idle pages;
- create large JavaScript bundles;
- delay first content visibility.

Prefer compositor-friendly properties such as:

- `transform`;
- `opacity`.

Avoid animating layout-heavy properties unless there is a clear reason.

## Rejected alternatives

### Heavy animation framework everywhere

Rejected because the site does not require application-level animation complexity.

### Full-screen loading animation

Rejected explicitly by client requirement and performance goals.

### GSAP for every interaction

Rejected because it would add unnecessary dependency and implementation complexity.

### No motion at all

Rejected because motion can improve hierarchy, feedback, and the existing Zytrixon visual identity when used selectively.

## Consequences

### Positive

- fast initial rendering;
- smaller JS dependency surface;
- better low-end device behavior;
- easier reduced-motion support;
- maintainable animation system.

### Negative

- highly complex sequences may require additional implementation;
- designers/developers must resist adding motion merely because a library makes it easy.

## Review trigger

Revisit the library decision only when a concrete interaction cannot be implemented cleanly with the current strategy.
