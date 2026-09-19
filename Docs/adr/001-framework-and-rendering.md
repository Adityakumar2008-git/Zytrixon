# ADR 001 — Laravel + Blade + Vite as the Web Architecture

- **Status:** Accepted
- **Date:** 2026-09-19
- **Decision type:** Architecture
- **Scope:** Zytrixon public website

## Context

The original architecture discussion considered Next.js App Router. The latest client requirement explicitly asks for the website to be built using **Laravel** and Antigravity.

The website is primarily a content-driven company/agency site with:

- server-rendered marketing pages;
- service pages;
- case studies;
- team/about content;
- insights;
- careers;
- contact/project forms;
- analytics;
- lightweight progressive enhancement.

It does not currently require a large client-side application.

The client also specifically requested that loading remain easy and fast, with no heavy loading animation that delays the website.

## Decision

Use:

- **Laravel** as the application/server framework;
- **Blade** for server-rendered HTML;
- **Vite** for frontend asset bundling;
- **Tailwind CSS** where appropriate for styling;
- **TypeScript** only where client-side behavior genuinely benefits from it;
- small progressive-enhancement scripts rather than a mandatory SPA architecture.

The application remains Laravel-first.

## Rendering model

```text
Browser
  ↓
Laravel route
  ↓
Controller / content source
  ↓
Blade
  ↓
HTML visible immediately
  ↓
Vite assets enhance interaction
```

JavaScript is not required for basic content consumption.

## Why

### Performance

Server-rendered HTML can become visible without waiting for a large client-side application to initialize.

### Simplicity

The website does not need the complexity of a full SPA for its current requirements.

### Forms and backend

Laravel provides a natural home for:

- validation;
- form handling;
- lead persistence;
- email integration;
- security middleware;
- authentication if required later;
- server-side content logic.

### Client requirement

Laravel is an explicit project requirement and therefore takes precedence over the earlier Next.js proposal.

## Rejected alternatives

### Next.js App Router

Rejected for this project because the client specifically requested Laravel and the current site does not require a React-first application architecture.

This does not mean Next.js is technically inferior in general.

### Full React SPA

Rejected because it would add client-side complexity without a demonstrated need.

### Laravel API + separate React frontend

Rejected for the initial public site because it would create two application layers where server-rendered Blade is sufficient.

## Consequences

### Positive

- simpler deployment model;
- strong server-side rendering;
- straightforward forms;
- smaller client-side JavaScript surface;
- easier progressive enhancement;
- good fit for content-heavy pages.

### Negative

- highly interactive application-like features may require additional frontend architecture later;
- some advanced client interactions need carefully isolated TypeScript components;
- the team must avoid gradually rebuilding a SPA inside Blade.

## Guardrails

Do not introduce React/Next merely because a component would be easier to copy from an existing template.

Introduce a larger client-side framework only after documenting a concrete requirement and architecture decision.

## Review trigger

Revisit this ADR if Zytrixon's website evolves into a highly interactive authenticated product with substantial client-side state, offline functionality, or application workflows that clearly justify a different frontend architecture.
