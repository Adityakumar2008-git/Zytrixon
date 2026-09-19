# Zytrixon V2 — Page-by-Page Specifications

**Document:** `18-page-specifications.md`  
**Project:** Zytrixon Website V2  
**Status:** Production Page Blueprint  
**Depends on:** `03-information-architecture.md`, `04-design-system.md`, `06-architecture.md`, `08-seo-strategy.md`, `09-accessibility.md`, `10-performance.md`, `14-do-not-do.md`, `15-content-strategy.md`, `16-copywriting.md`, `17-component-inventory.md`

---

# 1. Purpose

This document translates the information architecture into implementation-ready page specifications.

Each page should define:

```text
purpose
audience
intent
content hierarchy
components
CTA
SEO intent
responsive behavior
states
```

These are blueprints, not pixel-perfect design mockups.

---

# 2. Global Page Rules

Every public page must have:

```text
unique title
unique metadata
one clear H1
logical heading hierarchy
responsive layout
keyboard accessibility
mobile navigation
footer
canonical URL
```

---

# 3. Global Page Shell

Conceptual structure:

```text
SiteShell
├── Header
├── Main
│   └── Page content
└── Footer
```

Do not duplicate header/footer markup across routes.

---

# 4. Homepage `/`

## Purpose

Introduce Zytrixon and move qualified visitors toward:

```text
service discovery
work discovery
contact
```

## Primary audience

```text
business owners
founders
decision-makers
technology buyers
```

## Primary intent

Understand:

```text
what Zytrixon does
who it helps
why it is credible
what to explore next
```

---

# 5. Homepage Structure

Recommended:

```text
Hero
↓
Problem / positioning
↓
Capabilities
↓
Selected work
↓
Engineering approach
↓
Technology depth
↓
Company/team credibility
↓
Primary CTA
```

Do not turn this into a collection of every available section.

---

# 6. Homepage Hero

Components:

```text
Eyebrow
Display heading
Supporting copy
Primary CTA
Secondary CTA
Optional visual/proof
```

Preserve the existing brand language where appropriate:

> WE ENGINEER DIGITAL DOMINANCE.

The supporting copy should make the statement concrete.

---

# 7. Homepage Problem Section

Purpose:

```text
show that Zytrixon understands business problems before technology
```

Potential themes:

```text
fragmented systems
manual workflows
legacy processes
growth bottlenecks
poor operational visibility
```

Do not make unsupported claims about customer pain.

---

# 8. Homepage Capabilities

Present a clear hierarchy rather than a flat service list.

Possible structure:

```text
Strategy
Build
Integrate
Automate
Grow
```

IoT can appear as a specialist capability where relevant.

Each capability should link to deeper content.

---

# 9. Homepage Selected Work

Feature a small number of strong projects.

Potential initial work:

```text
School Management System
Affiliate Marketing Application
IoT Smart Factory Dashboard
```

Use only verified project details.

---

# 10. Homepage Engineering Approach

Explain how Zytrixon works:

```text
understand
→
design
→
architect
→
build
→
test
→
deploy
```

Make the section demonstrate engineering thinking rather than merely display six icons.

---

# 11. Homepage Technology

Show technology as supporting evidence.

Potential groups:

```text
Frontend
Backend
Data
Cloud
Mobile
AI
IoT
DevOps
```

Do not let technology logos dominate the page.

---

# 12. Homepage Company Credibility

Possible content:

```text
team
experience
selected facts
locations
verified statistics
```

Only publish verified claims.

If no credible statistics exist, use work and team evidence instead.

---

# 13. Homepage Final CTA

The final CTA should be direct.

Possible:

```text
Discuss a project
Start a conversation
Tell us what you're trying to solve
```

Use one primary action.

---

# 14. Services Index `/services`

## Purpose

Help visitors understand Zytrixon's capabilities.

## Primary intent

```text
Which capability fits my problem?
```

---

# 15. Services Index Structure

```text
PageHeader
↓
Capability model
↓
Service groups
↓
Selected proof
↓
Process
↓
CTA
```

Avoid six identical cards followed by generic marketing copy.

---

# 16. Services Capability Model

Recommended conceptual grouping:

```text
STRATEGY
Business Strategy
Business/Technology Consulting

BUILD
Custom Software
Web Applications
Mobile Applications

INTEGRATE
System Integration
Payment/API integrations

AUTOMATE
AI Automation
Workflow Automation
Chatbot/communication integrations

GROW
Digital Marketing
Social Media / Performance
```

IoT remains a specialist capability if active.

Final grouping must be validated against actual business offerings.

---

# 17. Service Detail `/services/[slug]`

## Purpose

Convert service interest into understanding and qualified enquiry.

## Required sections

```text
Service Hero
Problem
Approach
Capabilities / deliverables
Relevant technology
Proof / case studies
Process
FAQ
CTA
```

---

# 18. Service Hero

Must answer:

```text
What is this?
What problem does it solve?
Why does it matter?
```

Avoid generic service definitions.

---

# 19. Service Problem

Describe real problems.

Example:

```text
Multiple systems contain the same customer information.
Teams re-enter data manually.
Reporting requires spreadsheet consolidation.
```

Specificity is preferred.

---

# 20. Service Deliverables

Show tangible outputs.

Example:

```text
discovery
architecture
UX/UI
development
integration
testing
deployment
documentation
support
```

Only include relevant deliverables.

---

# 21. Service Technology

Explain relevant technology choices.

Do not dump the entire company stack on every service page.

---

# 22. Service Proof

Link to relevant case studies.

If no case study exists:

```text
technical examples
workflow diagrams
verified experience
```

Do not invent client outcomes.

---

# 23. Service FAQ

Answer actual objections.

Examples:

```text
Can you work with our existing software?
Can you integrate our current tools?
How does a project begin?
What happens after launch?
```

---

# 24. Work Index `/work`

## Purpose

Demonstrate capability through actual work.

## Primary intent

```text
Can Zytrixon build something like this?
```

---

# 25. Work Index Structure

```text
PageHeader
↓
Featured case studies
↓
Project archive
↓
Optional filters
↓
CTA
```

Do not add filters unless project volume justifies them.

---

# 26. Case Study `/work/[slug]`

## Purpose

Turn portfolio work into engineering proof.

## Structure

```text
CaseStudyHero
↓
Context
↓
Problem
↓
Constraints
↓
Approach
↓
Architecture
↓
Key features
↓
Technical decisions
↓
Outcome
↓
Related capability
↓
Related work
↓
CTA
```

---

# 27. Case Study Hero

Include:

```text
project title
category
short summary
hero visual
```

Client identity appears only when publishable.

---

# 28. Case Study Context

Explain:

```text
business
environment
users
existing workflow
```

Do not expose confidential information.

---

# 29. Case Study Problem

Describe the actual challenge.

Avoid turning every project into:

> The client needed digital transformation.

---

# 30. Case Study Architecture

Use diagrams where they improve understanding.

Possible:

```text
frontend
API
database
third-party services
devices
cloud
```

Do not create architecture diagrams purely as decoration.

---

# 31. Case Study Outcome

Separate:

```text
verified metric
qualitative result
technical result
```

Do not invent numerical outcomes.

---

# 32. About `/about`

## Purpose

Explain the company and its thinking.

## Structure

```text
About Hero
↓
Why Zytrixon exists
↓
How we think
↓
How we work
↓
Team
↓
Capabilities
↓
CTA
```

---

# 33. About Hero

Should establish a company-level idea.

Avoid:

```text
We are a leading global technology company...
```

---

# 34. Why Zytrixon

Potential themes:

```text
technology should solve actual business problems
simplification before unnecessary complexity
engineering around workflows
long-term systems over short-term hacks
```

Only publish philosophies that genuinely represent the company.

---

# 35. Team `/team`

If a dedicated team page exists:

```text
Team Header
↓
Leadership
↓
Core team
↓
Roles/expertise
↓
Culture or working principles
↓
CTA
```

Only verified people should appear.

---

# 36. Team Member Detail

A dedicated profile route is optional.

Use one only if:

```text
profiles are substantial
team size justifies it
public professional information exists
```

Do not create individual pages merely for SEO.

---

# 37. Insights `/insights`

## Purpose

Demonstrate thinking and expertise.

## Structure

```text
PageHeader
↓
Featured insight
↓
Latest insights
↓
Categories
↓
CTA
```

Do not create content volume for its own sake.

---

# 38. Insight Detail `/insights/[slug]`

Structure:

```text
ArticleHeader
↓
Summary
↓
Article content
↓
Related services
↓
Related work
↓
Author/context
↓
CTA
```

---

# 39. Insight Categories

Possible:

```text
Engineering
Business Systems
Automation
AI
Product
Operations
Technology Strategy
Project Lessons
```

Categories should remain limited and useful.

---

# 40. Careers `/careers`

## Purpose

Attract relevant candidates and communicate the type of work Zytrixon does.

Structure:

```text
Careers Hero
↓
Why work here
↓
Working principles
↓
Open roles
↓
Hiring process
↓
CTA
```

Only advertise real openings.

---

# 41. Job Detail `/careers/[slug]`

Structure:

```text
Role Header
↓
About the role
↓
Responsibilities
↓
Requirements
↓
Nice-to-have
↓
Working model
↓
Hiring process
↓
Application
```

Do not add arbitrary requirements to make a role look more senior.

---

# 42. Contact `/contact`

## Purpose

Convert qualified interest into a conversation.

Structure:

```text
Contact Hero
↓
What happens next
↓
Contact Form
↓
Alternative contact methods
↓
Location/company information
```

---

# 43. Contact Form

Keep the form focused.

Potential fields:

```text
name
email
company
problem/project
service
timeline
budget — optional
```

Final field list is defined in `20-forms-and-leads.md`.

---

# 44. Contact Success State

After successful submission:

```text
clear confirmation
next-step information
navigation remains available
```

Do not show a dead-end success screen.

---

# 45. Search

Site search is optional.

Only introduce it if content volume makes normal navigation insufficient.

If implemented:

```text
/search
```

must support:

```text
query
results
empty state
error state
keyboard access
```

---

# 46. 404 `/404`

Structure:

```text
clear message
return home
services
work
```

It should feel like Zytrixon without becoming an animation showcase.

---

# 47. Global Error Page

Must:

```text
explain that something failed
offer recovery
avoid technical details
retain brand identity
```

---

# 48. Legal Pages

If required:

```text
Privacy Policy
Terms
Cookie Policy
```

These should be factual and legally reviewed where necessary.

Do not generate legal guarantees casually.

---

# 49. Sitemap

The sitemap should include only intended indexable routes.

Potential:

```text
/
 /services
 /services/[slug]
 /work
 /work/[slug]
 /about
 /team
 /insights
 /insights/[slug]
 /careers
 /careers/[slug]
 /contact
```

Exact routes depend on final IA.

---

# 50. Global Responsive Behavior

Every page must work at:

```text
320px+
375px+
414px+
768px+
1024px+
1280px+
1440px+
```

Also test intermediate widths.

---

# 51. Mobile Navigation

On mobile:

```text
navigation collapses
CTA remains discoverable
focus is managed
menu can be closed
body interaction is controlled
```

Do not simply shrink desktop navigation.

---

# 52. Mobile Typography

Display typography should scale without:

```text
overflow
unexpected wrapping
horizontal scrolling
overlapping buttons
```

---

# 53. Mobile Tables / Diagrams

Complex content must have a mobile strategy.

Options:

```text
horizontal scroll
stacking
simplified diagram
progressive disclosure
```

Never allow silent clipping.

---

# 54. Page Loading

Every page should provide useful content as early as possible.

Avoid:

```text
blocking intro
giant loader
client-side rendering for content that can be server-rendered
```

---

# 55. Page Error States

Dynamic routes must handle:

```text
missing content
invalid slug
API failure
image failure
```

without exposing internal errors.

---

# 56. SEO Page Requirements

Every indexable page should have:

```text
unique title
unique description
canonical
H1
structured headings
Open Graph metadata
```

where applicable.

---

# 57. Page-Level SEO Intent

Each route should target a distinct search/user intent.

Do not create multiple pages targeting the same concept merely to increase keyword count.

---

# 58. Internal Linking

Each important page should have logical paths to related content.

Example:

```text
Custom Software
→ ERP case study
→ architecture insight
→ contact
```

---

# 59. CTA Mapping

Recommended:

```text
Homepage → Discuss a project
Services → Discuss this problem
Service detail → Start a conversation
Work → Explore a similar capability
Case study → Discuss a similar project
Insights → Related service / Contact
Careers → Apply
Contact → Submit
```

Exact copy follows `16-copywriting.md`.

---

# 60. Page Performance

Every page should avoid unnecessary:

```text
client JavaScript
third-party scripts
large images
fonts
animation libraries
```

The homepage receives the highest performance scrutiny.

---

# 61. Page Accessibility

Every page must support:

```text
keyboard navigation
logical focus order
semantic headings
accessible names
visible focus
sufficient contrast
reduced motion
screen-reader interpretation
```

---

# 62. Page Testing

Minimum per route:

```text
render
navigation
mobile
desktop
404/dynamic invalid state
metadata
accessibility
critical interactions
```

See `12-testing.md`.

---

# 63. Page Implementation Rule

Do not build every page simultaneously.

Recommended order:

```text
1. global shell
2. homepage
3. services index
4. service detail
5. work index
6. case study
7. about/team
8. insights
9. careers
10. contact
11. legal/error/search
```

---

# 64. Page Specification Rule

If a page requires behavior not defined in this document, update the specification before implementing the behavior.

Do not let undocumented product decisions silently enter production code.

---

# 65. Final Page Principle

Every page should have one dominant job.

Ask:

> What should the visitor understand or do after this page?

If the answer is unclear, the page is probably trying to do too much.

---

# 66. Status

**Status:** Production page blueprint.

**Next document:** `19-case-study-specification.md`
