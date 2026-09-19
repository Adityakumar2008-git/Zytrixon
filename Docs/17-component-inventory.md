# Zytrixon V2 — Component Inventory

**Document:** `17-component-inventory.md`  
**Project:** Zytrixon Website V2  
**Status:** Production Component Specification  
**Depends on:** `03-information-architecture.md`, `04-design-system.md`, `05-motion-system.md`, `06-architecture.md`, `07-type-system.md`, `09-accessibility.md`, `14-do-not-do.md`

---

# 1. Purpose

This document defines the reusable UI building blocks for Zytrixon V2.

The objective is:

```text
consistency
+
maintainability
+
accessibility
+
controlled visual language
```

without creating an over-engineered component library.

---

# 2. Component Philosophy

Components should exist because they provide one or more of:

```text
reusability
consistent behavior
accessibility
design-system enforcement
meaningful domain abstraction
```

Do not create a component merely because a JSX block is ten lines long.

---

# 3. Component Layers

Use four conceptual layers:

```text
Primitives
   ↓
UI Components
   ↓
Domain Components
   ↓
Page Sections
```

---

# 4. Primitives

Primitives provide foundational behavior.

Examples:

```text
Container
Stack
Grid
VisuallyHidden
Separator
Icon
```

They should remain simple.

---

# 5. UI Components

Reusable interface elements:

```text
Button
Link
Input
Textarea
Select
Checkbox
Dialog
Accordion
Badge
Tooltip
```

These should be accessible and predictable.

---

# 6. Domain Components

Zytrixon-specific reusable units:

```text
ServiceCard
CaseStudyCard
TeamMember
InsightCard
JobCard
TechnologyList
ProcessStep
```

These understand Zytrixon content structures.

---

# 7. Page Sections

Page sections compose domain components.

Examples:

```text
Hero
CapabilitiesSection
SelectedWorkSection
ProcessSection
TeamSection
ContactSection
```

A section should compose components rather than contain an entire page's business logic.

---

# 8. Layout Components

Recommended:

```text
SiteShell
Header
Footer
Main
Container
Section
```

---

# 9. SiteShell

Responsibilities:

```text
global layout
navigation
page structure
global providers where required
```

It should not contain page-specific business logic.

---

# 10. Header

Responsibilities:

```text
brand
primary navigation
mobile navigation trigger
primary CTA
theme control if retained
```

Must support:

```text
keyboard navigation
focus management
responsive behavior
```

---

# 11. Navigation

Navigation should be driven from typed configuration where practical.

Example conceptual model:

```ts
type NavItem = {
  label: string;
  href: string;
  external?: boolean;
};
```

Do not duplicate navigation links across desktop and mobile implementations unnecessarily.

---

# 12. Mobile Navigation

The mobile menu should:

```text
open
close
trap focus when appropriate
close with Escape
restore focus
prevent accidental background interaction
```

Do not create a completely unrelated mobile information architecture unless required.

---

# 13. Footer

Possible responsibilities:

```text
navigation
services
contact
social links
legal links
location
copyright
```

Only include information that is real and current.

---

# 14. Container

Controls global content width.

Responsibilities:

```text
max-width
horizontal padding
responsive gutters
```

Avoid page-specific widths scattered throughout the application.

---

# 15. Section

Provides consistent:

```text
vertical rhythm
section labeling
optional background treatment
```

It should not force every section to look identical.

---

# 16. Typography Components

Prefer semantic HTML with styling rather than creating dozens of typography components.

Potential utility-level concepts:

```text
Eyebrow
DisplayHeading
SectionHeading
BodyText
```

Create dedicated components only if they enforce meaningful behavior or consistency.

---

# 17. Button

Required variants may include:

```text
primary
secondary
text
```

Possible sizes:

```text
small
medium
large
```

Do not create dozens of visual variants.

---

# 18. Button Rules

Button must support:

```text
disabled
loading
keyboard interaction
focus
icon
external action where applicable
```

Use actual `<button>` for actions.

Use `<a>`/framework Link for navigation.

---

# 19. Link

Link component may normalize:

```text
internal navigation
external links
target behavior
accessibility labels
```

Do not obscure normal browser behavior.

---

# 20. Icon

Use a consistent icon system.

Icons should:

```text
have predictable sizing
support accessible labels when meaningful
be decorative when adjacent text already communicates meaning
```

Do not use icons as unexplained decoration everywhere.

---

# 21. Badge / Tag

Use for metadata:

```text
service category
technology
industry
status
```

Do not use badges as decorative noise.

---

# 22. Card

Avoid a universal “Card” component with twenty variants.

Prefer domain-specific components when the content has meaning:

```text
ServiceCard
CaseStudyCard
InsightCard
JobCard
```

---

# 23. ServiceCard

Should communicate:

```text
service name
short problem/value statement
supporting metadata
navigation target
```

Optional:

```text
index
icon
capability label
```

Avoid stuffing full service descriptions into cards.

---

# 24. CaseStudyCard

Should communicate:

```text
project name
problem/category
short description
relevant capability
visual
link
```

Metrics appear only if verified.

---

# 25. InsightCard

Should communicate:

```text
title
date
category
short description
reading context
link
```

Do not make every article card visually identical if content hierarchy requires differences.

---

# 26. TeamMember

Should communicate:

```text
name
role
short bio
photo
optional profile link
```

Only verified team members should appear.

---

# 27. JobCard

Should communicate:

```text
role
location/remote status
employment type
short description
application link
```

Only show currently open roles.

---

# 28. TechnologyList

Should support grouped technologies:

```text
Frontend
Backend
Mobile
Cloud
Data
AI
IoT
DevOps
```

Do not turn this into a decorative logo wall.

---

# 29. ProcessStep

Should communicate:

```text
index
stage
description
key activities
```

Potential stages:

```text
Discovery
Design
Architecture
Development
QA
Deployment
```

---

# 30. Hero

The hero is a high-value composition, not a generic reusable template.

Potential parts:

```text
eyebrow
headline
supporting text
primary CTA
secondary CTA
visual/proof
```

Hero variants should be limited and intentional.

---

# 31. PageHeader

For internal pages:

```text
eyebrow
title
description
optional metadata
```

Do not repeat the exact homepage hero structure everywhere.

---

# 32. ServiceHero

A service-specific hero should communicate:

```text
problem
capability
business relevance
```

It may include:

```text
service metadata
related technologies
CTA
```

---

# 33. CaseStudyHero

Should establish:

```text
project
client/context where publishable
category
short outcome
hero visual
```

Do not reveal confidential client information.

---

# 34. InsightHeader

Should establish:

```text
title
category
date
author
summary
```

Use semantic article metadata.

---

# 35. ContactForm

Responsibilities:

```text
field rendering
validation UI
submission state
success state
error state
accessibility
```

It should not contain provider-specific infrastructure logic.

---

# 36. FormField

Reusable behavior:

```text
label
input
description
error
required state
```

Every field must have a clear accessible association.

---

# 37. TextInput

Must support:

```text
label
placeholder
value
error
disabled
required
autocomplete
```

Do not use placeholders as the only labels.

---

# 38. Textarea

Use for meaningful free-form descriptions.

Provide reasonable guidance without writing overly long helper text.

---

# 39. Select

Use native select where it provides sufficient UX.

Do not build a custom select merely for visual styling.

If custom behavior is required, ensure complete keyboard and screen-reader support.

---

# 40. Dialog

Potential uses:

```text
mobile navigation
image/lightbox
confirmation
contact interaction
```

Must support:

```text
focus management
Escape
focus restoration
accessible name
background interaction prevention
```

---

# 41. Accordion

Potential uses:

```text
FAQ
service details
technical details
```

Use semantic disclosure behavior.

Do not hide essential content in accordions purely to reduce visual density.

---

# 42. Tabs

Use only where multiple related views genuinely benefit from tabbed navigation.

Keyboard behavior must follow accessible tab patterns if implemented as true tabs.

---

# 43. Breadcrumbs

Useful for deep pages:

```text
Home
→ Services
→ Custom Software
```

They should reflect actual route hierarchy.

---

# 44. Pagination

Only introduce pagination when content volume justifies it.

Do not paginate a five-item portfolio.

---

# 45. FilterControls

Use only when the dataset is large enough to benefit.

Potential filters:

```text
industry
service
technology
```

Filtering should be usable on mobile.

---

# 46. Search

Do not add site search by default.

Introduce it only when content volume makes navigation insufficient.

---

# 47. CTASection

A reusable CTA section may support:

```text
headline
supporting copy
primary CTA
secondary CTA
```

But visual treatment should vary according to page context.

---

# 48. ProofSection

Can combine:

```text
verified metrics
case studies
screenshots
technology evidence
client quotes
```

Only render the proof types that actually exist.

---

# 49. Quote / Testimonial

If real testimonials exist, component should support:

```text
quote
person
role
company
```

Never provide fake fallback content.

If no quote exists, render another proof mechanism.

---

# 50. Metric

Use for verified statistics.

Model:

```ts
type Metric = {
  value: string;
  label: string;
  source?: string;
};
```

Do not allow arbitrary pages to invent metric values.

---

# 51. Image / Media

Media component should handle:

```text
responsive image
aspect ratio
loading
priority
alt text
caption
```

Avoid generic `<img>` usage when the application framework provides optimized image handling.

---

# 52. MediaFrame

Useful for consistent presentation of:

```text
screenshots
dashboards
device mockups
photography
diagrams
```

Do not turn every image into a floating rounded rectangle.

---

# 53. CodeBlock

Only required if technical articles include code.

Must support:

```text
syntax highlighting
copy
accessible labeling
horizontal overflow
```

Do not load a large syntax-highlighting system site-wide if articles are rare.

---

# 54. ArchitectureDiagram

A domain component for technical case studies if genuinely useful.

It should explain:

```text
systems
connections
data flow
```

Prefer meaningful diagrams over decorative lines.

---

# 55. Timeline

Useful for:

```text
process
project milestones
company history
```

Do not use it merely because timelines look sophisticated.

---

# 56. Marquee / Ticker

The existing technology ticker may remain if it contributes to the Zytrixon identity.

Rules:

```text
not essential information
pause/reduce under reduced motion
keyboard/accessibility safe
no excessive CPU usage
```

---

# 57. Cursor / Pointer Effects

Not a core component.

Any custom pointer effect must be optional and must never interfere with normal interaction.

---

# 58. Toast / Notification

Use only when transient feedback is genuinely useful.

Must support:

```text
accessible announcement
dismissal
timing
keyboard access
```

Do not use toast notifications for critical information that users might miss.

---

# 59. LoadingIndicator

Keep loading states visually quiet.

Avoid elaborate branded loaders.

---

# 60. EmptyState

Should communicate:

```text
what is empty
why it may be empty
what the user can do next
```

---

# 61. ErrorState

Should communicate:

```text
what happened
whether retry is possible
where the user can go next
```

Do not expose internal technical details.

---

# 62. Skeleton

Use skeletons only when the page genuinely benefits from progressive loading.

Do not create skeletons for content that can be rendered immediately.

---

# 63. Consent / Cookie UI

If required by the project's legal/privacy context, use a clear consent mechanism.

Do not use dark patterns.

---

# 64. Social Links

Use a shared component for:

```text
LinkedIn
GitHub
other verified company channels
```

Only include accounts that actually belong to Zytrixon.

---

# 65. ExternalLinkIndicator

Optional.

Use only where external navigation might otherwise be unclear.

Do not add icons to every external link automatically if the design becomes noisy.

---

# 66. Component API Principles

Component props should be:

```text
small
typed
predictable
semantic
```

Avoid prop APIs with dozens of booleans.

Bad:

```ts
<Card
  dark
  bordered
  rounded
  elevated
  compact
  large
  animated
  glowing
/>
```

Prefer domain-specific composition.

---

# 67. Composition Over Configuration

Prefer:

```tsx
<Section>
  <SectionHeading />
  <ServiceGrid />
</Section>
```

over a universal section component with twenty configuration props.

---

# 68. Controlled vs Uncontrolled

Use controlled state where the parent genuinely needs state ownership.

Do not lift every piece of state unnecessarily.

---

# 69. Server vs Client Boundary

Components should remain server-rendered unless they need:

```text
browser APIs
state
effects
event handlers
interactive third-party libraries
```

Interactive components should be isolated where practical.

---

# 70. Accessibility Contract

Every reusable interactive component must define:

```text
semantic element
keyboard behavior
focus behavior
accessible name
disabled state
error state where relevant
reduced-motion behavior
```

---

# 71. Responsive Contract

Components should specify behavior across:

```text
mobile
tablet
desktop
```

Do not rely solely on a global page layout to make every component responsive.

---

# 72. Motion Contract

Interactive components may define:

```text
initial
hover
focus
active
exit
```

But animation should never be required for understanding or operation.

---

# 73. Content Contract

Domain components should consume typed content.

Example:

```ts
type Service = {
  slug: string;
  title: string;
  description: string;
  category: string;
};
```

Avoid embedding business facts directly inside components.

---

# 74. Component Naming

Use clear names:

```text
ServiceCard
CaseStudyCard
ProcessStep
ContactForm
```

Avoid:

```text
MagicBox
CoolCard
Thing
SectionThing
UniversalComponent
```

---

# 75. File Naming

Prefer predictable naming:

```text
ServiceCard.tsx
CaseStudyCard.tsx
ContactForm.tsx
```

Follow the repository's chosen casing convention consistently.

---

# 76. Component Folder Strategy

A practical structure:

```text
src/components/
├── ui/
├── layout/
├── navigation/
├── forms/
├── domain/
├── sections/
└── media/
```

Do not create a folder for every component unless the component has supporting files.

---

# 77. Testing Requirement

Important reusable components should have tests for meaningful behavior.

Prioritize:

```text
Header
MobileNavigation
Button
Dialog
Accordion
FormField
ContactForm
```

See `12-testing.md`.

---

# 78. Component Documentation

Complex components should document:

```text
purpose
props
states
accessibility behavior
usage constraints
```

Do not document trivial components excessively.

---

# 79. Component Anti-Patterns

Never:

- create universal components with excessive props
- duplicate the same interaction in multiple components
- hide business logic in UI primitives
- use divs for semantic controls
- make every component client-side
- build inaccessible custom controls
- create visual variants without a real use case
- duplicate content structures
- couple components directly to external APIs
- introduce animation into every component

---

# 80. Component Decision Test

Before creating a new component, ask:

```text
Is it reused?
Does it enforce a behavior?
Does it define a design-system primitive?
Does it represent a meaningful Zytrixon domain concept?
```

If all answers are no, a local element may be better.

---

# 81. Final Component Architecture

Conceptually:

```text
Primitives
    ↓
UI
    ↓
Domain
    ↓
Sections
    ↓
Pages
```

Dependencies should generally flow downward.

Pages should compose components.

Components should not import entire pages.

---

# 82. Status

**Status:** Production component inventory.

**Next document:** `18-page-specifications.md`
