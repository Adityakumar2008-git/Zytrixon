# ADR 004 — CMS Decision

- **Status:** Accepted — No CMS for initial release
- **Date:** 2026-09-19
- **Decision type:** Content management
- **Scope:** Zytrixon public website

## Context

The website includes substantial content but is not currently proven to require a dedicated editorial CMS.

The initial release needs:

- services;
- case studies;
- insights;
- team;
- careers;
- company information;
- SEO metadata.

The content must be reliable, reviewable, and easy for developers to maintain.

## Decision

**Do not introduce a CMS for the initial release.**

Use the content architecture defined in ADR 002:

- structured content in typed/reviewable project sources;
- controlled long-form content;
- shared global configuration;
- Git-based review and deployment.

## Why

A CMS would introduce:

- another application/service;
- authentication and admin security;
- hosting/vendor dependency;
- content synchronization concerns;
- preview complexity;
- migration considerations;
- additional operational cost.

There is currently no confirmed requirement that outweighs those costs.

## Content workflow

Initial workflow:

```text
Draft
  ↓
Developer/content editor
  ↓
Git review
  ↓
QA
  ↓
Production deployment
```

The exact internal ownership can evolve without changing the public architecture.

## CMS introduction criteria

A CMS should be reconsidered if one or more of the following become real requirements:

- several non-technical editors need independent access;
- content changes happen frequently enough that deployment becomes a bottleneck;
- scheduled publishing is required;
- editorial approval workflows are required;
- localized content becomes substantial;
- content relationships become difficult to manage in files;
- preview workflows become a recurring operational problem.

## CMS evaluation criteria

If a future CMS is evaluated, compare:

- Laravel compatibility;
- API/webhook support;
- structured content;
- preview;
- drafts;
- scheduled publishing;
- roles/permissions;
- audit history;
- media management;
- localization;
- SEO fields;
- backups/export;
- security;
- hosting;
- total cost;
- vendor lock-in.

## Rejected alternatives

### Headless CMS immediately

Rejected because the current editorial requirement does not justify it.

### WordPress as a CMS layer

Rejected for the initial architecture because it would introduce a second application platform unrelated to the Laravel-first decision.

### Custom admin CMS

Rejected because building and securing an internal CMS would create a new product that is outside the website's primary objective.

## Consequences

### Positive

- lower complexity;
- fewer dependencies;
- simpler security surface;
- easier version control;
- no CMS subscription or service dependency.

### Negative

- content edits require the development/content workflow;
- non-technical users do not get a dedicated visual editor initially.

## Migration principle

If a CMS is introduced later, the current structured content model should make migration possible without rewriting the public page components.

## Review trigger

Revisit this ADR when actual editorial workflow data demonstrates that repository-managed content is becoming a business constraint.
