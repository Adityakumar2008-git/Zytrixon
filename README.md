# Zytrixon Website

Production website rebuild for **Zytrixon**.

The project is a Laravel-first implementation focused on:

- business technology positioning;
- engineering credibility;
- case-study-led proof;
- fast server-rendered pages;
- lightweight progressive enhancement;
- accessible interactions;
- reliable lead capture;
- measurable business outcomes.

## Architecture

```text
Laravel
├── Blade
├── Controllers
├── Form Requests
├── Services
├── Routes
├── Content
└── Vite
    ├── Tailwind CSS
    └── TypeScript for client-side enhancement
```

See:

- `CLAUDE.md`
- `docs/06-architecture.md`
- `docs/adr/`

## Documentation

The `docs/` directory is the project specification and should be treated as the source of implementation requirements.

Important documents:

- `00-current-site-audit.md`
- `01-brand-strategy.md`
- `03-information-architecture.md`
- `04-design-system.md`
- `05-motion-system.md`
- `06-architecture.md`
- `11-security.md`
- `14-do-not-do.md`
- `18-page-specifications.md`
- `19-case-study-specification.md`
- `20-forms-and-leads.md`
- `21-analytics-measurement.md`
- `22-qa-launch-checklist.md`

## ADRs

Architecture decisions are recorded in:

```text
docs/adr/
```

Current decisions include:

- Laravel + Blade + Vite;
- controlled content architecture;
- CSS-first/lightweight motion;
- no CMS for the initial release.

## Development principles

- Do not build a generic agency template.
- Do not invent business claims.
- Do not use heavy blocking loaders.
- Do not add dependencies without justification.
- Do not expose secrets.
- Do not treat accessibility as post-launch polish.
- Do not send PII to analytics.
- Do not make unrelated refactors.
- Keep client-side JavaScript proportional to actual interaction requirements.

## Implementation workflow

1. Read `CLAUDE.md`.
2. Read the relevant docs.
3. Inspect the current repository.
4. Define a bounded implementation task.
5. Implement.
6. Run tests/checks.
7. Inspect the diff.
8. Verify browser behavior.
9. Update documentation/ADR when architectural behavior changes.

## Production principle

> Build technology around the way the business actually works.

The website should feel engineered, not generated.
