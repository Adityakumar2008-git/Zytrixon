# ADR 002 — Content Architecture

- **Status:** Accepted
- **Date:** 2026-09-19
- **Decision type:** Content architecture
- **Scope:** Zytrixon public website

## Context

Zytrixon contains multiple content types:

- services;
- case studies;
- team members;
- careers;
- insights;
- company information;
- FAQs;
- navigation;
- contact/project information.

Content must remain easy to maintain without scattering copy across Blade templates.

At the same time, introducing a CMS too early would add infrastructure, authentication, editorial complexity, and another dependency.

## Decision

Use a **typed, repository-controlled content architecture for the initial release**.

Content will be separated from presentation where practical.

Conceptually:

```text
Content
  ↓
Typed data / content files / repositories
  ↓
Laravel controllers / view models
  ↓
Blade components
  ↓
Rendered page
```

Critical business/content structures should have explicit types or validation.

## Content categories

### Structured content

Examples:

- services;
- case studies;
- team;
- careers;
- navigation;
- FAQs.

These should use predictable schemas.

### Long-form content

Examples:

- insights;
- detailed case-study sections.

Markdown or another controlled authoring format may be used where appropriate.

### Global content

Examples:

- company name;
- tagline;
- contact details;
- social links;
- footer information.

These must have a single source of truth.

## Source of truth

Do not duplicate the same factual information across multiple Blade files.

For example, the company contact details should not independently exist in:

- footer;
- contact page;
- schema markup;
- email templates.

Use shared configuration/content where practical.

## Why

This architecture:

- keeps the initial system simple;
- supports Git-based review;
- works naturally with Laravel;
- avoids CMS dependency before it is justified;
- makes content changes traceable;
- reduces accidental inconsistency.

## CMS decision boundary

A CMS should be introduced only when there is a demonstrated editorial need, such as:

- multiple non-technical editors;
- frequent publishing;
- approval workflows;
- scheduled publishing;
- content localization at scale;
- structured editorial relationships that become difficult to maintain in code.

## Rejected alternatives

### CMS from day one

Rejected because it would add operational complexity before the need is established.

### Copy directly inside Blade templates

Rejected because it causes duplication and makes content governance difficult.

### Database for every piece of marketing copy

Rejected because not all content requires database-backed editing.

## Consequences

### Positive

- simple deployment;
- version-controlled content;
- easy review;
- low infrastructure overhead;
- strong consistency.

### Negative

- non-technical editors cannot freely change all content without development workflow;
- publishing content requires repository/deployment workflow unless a CMS is added later.

## Guardrails

Do not create a CMS merely to make the architecture look more sophisticated.

If a CMS becomes necessary, create a new ADR evaluating:

- editorial workflow;
- security;
- hosting;
- API/rendering model;
- content migration;
- preview;
- rollback;
- cost;
- vendor lock-in.

## Review trigger

Revisit when Zytrixon has a real editorial team or publishing workflow that is materially constrained by repository-controlled content.
