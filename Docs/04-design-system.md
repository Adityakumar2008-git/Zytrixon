# Zytrixon V2 — Design System

**Document:** `04-design-system.md`  
**Project:** Zytrixon Website V2  
**Status:** Working Design System / Pre-Implementation  
**Depends on:** `00-current-site-audit.md`, `01-brand-strategy.md`, `02-product-requirements.md`, `03-information-architecture.md`

---

# 1. Purpose

This document defines the visual and interaction foundations for Zytrixon V2.

The purpose is to prevent visual decisions from being invented independently during implementation.

The design system must preserve the existing Zytrixon identity while making the experience more mature, coherent and production-ready.

This is not a generic "premium agency" design system.

---

# 2. Design Philosophy

## Core principle

> **Engineer the interface; do not decorate the interface.**

Every visual decision should support one or more of:

- brand recognition
- information hierarchy
- comprehension
- navigation
- credibility
- conversion
- product storytelling

Visual complexity must be earned.

---

# 3. Existing DNA

The following characteristics from the current website should influence V2:

- dark technical foundation
- high-contrast presentation
- large editorial typography
- structured layouts
- numbered navigation language
- thin borders / technical framing
- controlled motion
- interactive content
- engineering-oriented visual vocabulary

V2 should evolve these characteristics rather than replace them with unrelated trends.

---

# 4. Visual Direction

## Desired qualities

The interface should feel:

- technical
- precise
- confident
- editorial
- modern
- slightly experimental
- controlled
- premium through execution, not decoration

## Undesired qualities

The interface should not feel:

- template-generated
- overly corporate
- overly playful
- cyberpunk
- crypto/Web3
- generic SaaS
- AI-demo themed
- excessively glassy
- visually noisy

---

# 5. Colour System

The final brand palette must be confirmed against official Zytrixon brand assets.

Until then, use semantic tokens rather than hard-coded colours.

Example token model:

```css
--color-bg
--color-bg-elevated
--color-surface
--color-surface-hover
--color-text
--color-text-muted
--color-text-subtle
--color-border
--color-border-strong
--color-accent
--color-accent-contrast
--color-success
--color-warning
--color-error
```

---

# 6. Base Theme

The primary experience should remain dark unless the company explicitly changes the brand direction.

Working conceptual hierarchy:

```text
Background
    ↓
Elevated Background
    ↓
Surface
    ↓
Border
    ↓
Primary Text
    ↓
Secondary Text
    ↓
Accent
```

Contrast should remain strong enough for accessibility.

---

# 7. Accent Colour

One primary accent should dominate the interface.

Do not create five competing accent colours.

Accent usage should be reserved for:

- primary CTA
- active navigation
- important system states
- key visual highlights
- interactive indicators

Accent should not cover every heading.

---

# 8. Light Mode

If light mode is retained from the current website, it should be treated as a real theme rather than a simple inversion.

Both themes must define:

- background
- surface
- border
- text
- muted text
- accent
- interaction states
- form states

Light mode must receive the same design attention as dark mode.

---

# 9. Typography

Typography is one of the primary components of Zytrixon's identity.

The system should use a limited font family set.

Recommended roles:

```text
Display
Heading
Body
UI
Monospace / Technical
```

The final font family must be selected during visual design validation.

Do not load unnecessary font families.

---

# 10. Typography Scale

Working scale:

```text
Display XL
Display L
Display M

H1
H2
H3
H4

Body L
Body M
Body S

Label
Caption
Technical / Mono
```

Exact sizes must be defined in implementation tokens after visual testing.

Typography must use fluid sizing where useful.

Example concept:

```css
font-size: clamp(...)
```

Do not define dozens of arbitrary font sizes.

---

# 11. Display Typography

Display typography is intended for:

- homepage hero
- major section statements
- case-study titles
- high-level brand statements

Rules:

- strong hierarchy
- controlled line length
- intentional wrapping
- responsive scaling
- avoid unreadable oversized text

Large type must improve hierarchy rather than simply fill the viewport.

---

# 12. Body Typography

Body text should prioritize readability.

Rules:

- comfortable line height
- controlled paragraph width
- adequate contrast
- clear hierarchy
- no excessively narrow text columns

Long-form content should generally use a readable maximum line length.

---

# 13. Monospace / Technical Typography

A monospace face may be used for:

- navigation numbering
- labels
- metadata
- technical tags
- system diagrams
- project information
- small utility text

It should remain a supporting visual language, not become the entire website's typography.

---

# 14. Spacing System

Use a consistent spacing scale.

Working base:

```text
4
8
12
16
24
32
48
64
80
96
128
160
192
```

Components should use tokens rather than arbitrary spacing values.

Exceptions are allowed when required by composition, but should be intentional.

---

# 15. Layout Grid

The website should use a consistent responsive grid.

Working model:

### Desktop

12-column grid.

### Tablet

8-column grid.

### Mobile

4-column grid or equivalent flexible layout.

The exact grid gutters and max-widths must be tested visually.

---

# 16. Container System

Define shared containers:

```text
Container / Wide
Container / Default
Container / Narrow
Container / Reading
```

Use consistent page margins.

Avoid every section inventing its own max-width.

---

# 17. Section System

All major page sections should share a base structural model:

```text
Section
├── Section Label
├── Heading
├── Supporting Content
├── Main Content
└── Optional CTA
```

Sections may deliberately break the grid for editorial composition.

Breaking the grid must be intentional.

---

# 18. Borders

Borders should contribute to Zytrixon's technical language.

Preferred characteristics:

- thin
- subtle
- consistent
- low visual noise

Borders can be used for:

- cards
- navigation separators
- grids
- data tables
- process diagrams
- form fields

Do not border every element.

---

# 19. Border Radius

Avoid excessive rounded-card aesthetics.

Working principle:

- small radius for functional controls where appropriate
- moderate radius only where it improves usability
- square/near-square framing for technical/editorial components
- pill shapes reserved for tags/statuses/specific controls

Do not use large rounded corners as the default for everything.

---

# 20. Buttons

Define a small button family.

## Primary

For major conversion actions.

Example:

```text
START A PROJECT →
```

## Secondary

For supporting actions.

Example:

```text
EXPLORE WORK →
```

## Text / Inline

For low-emphasis navigation.

Example:

```text
View case study →
```

Every button needs:

- default
- hover
- focus
- active
- disabled
- loading where relevant

---

# 21. Links

Links should be visibly identifiable without relying only on colour.

Interactive states:

```text
Default
Hover
Focus
Active
Visited where relevant
```

Avoid excessive underlines if the surrounding design clearly establishes link affordance, but maintain accessibility.

---

# 22. Navigation

Navigation is a core brand component.

Working structure:

```text
01 / HOME
02 / SERVICES
03 / WORK
04 / ABOUT
05 / TEAM
06 / INSIGHTS
07 / CONTACT
```

Potential primary CTA:

```text
START A PROJECT
```

The exact labels are governed by the IA document.

---

# 23. Navigation Visual Language

Navigation should feel:

- structured
- technical
- lightweight
- persistent where useful
- spatially clear

Potential details:

- numbered items
- active-state indicator
- subtle separators
- controlled hover motion
- compact utility information

Avoid oversized floating glass navbars.

---

# 24. Services Component System

Services should be represented using a flexible system.

Possible component types:

```text
ServiceIndex
ServiceGroup
ServiceItem
ServiceFeature
ServiceFlow
ServiceProof
RelatedServices
```

Service cards should not all look identical if the content hierarchy requires different presentation.

---

# 25. Service Interaction

A service interaction should ideally reveal useful information.

Example:

```text
AI AUTOMATION
─────────────
Automate repetitive business workflows.

Trigger
→ AI
→ Decision
→ Action
→ System
```

The interface should demonstrate the service rather than only decorate its title.

---

# 26. Case Study Components

Possible components:

```text
ProjectHero
ProjectMeta
ProjectProblem
ProjectApproach
ProjectSystem
ProjectFeatureGrid
ProjectGallery
ProjectTechnology
ProjectOutcome
RelatedProjects
```

Case studies should be visual and narrative.

---

# 27. Image System

Images should be categorized:

```text
Hero
Project
Team
Editorial
Diagram
UI Screenshot
Decorative
```

Every image should have a purpose.

Prefer authentic:

- product screenshots
- project interfaces
- team photography
- system diagrams
- actual work

over generic stock imagery.

---

# 28. Image Treatment

The visual system may use:

- controlled cropping
- editorial aspect ratios
- technical framing
- subtle borders
- masked reveals
- consistent object positioning

Avoid applying the same filter to every image.

---

# 29. Iconography

Use one coherent icon family.

Icons should be:

- simple
- technical
- legible
- consistent in stroke/weight

Do not mix:

- random Lucide icons
- custom SVGs
- emoji
- unrelated icon packs

without a defined rule.

---

# 30. Status / Tag Components

Tags may be used for:

- industry
- technology
- project type
- service category
- job type

Example:

```text
EDUCATION
NEXT.JS
ERP
WEB APPLICATION
```

Tags should remain visually secondary.

---

# 31. Form System

Form components:

```text
Input
Textarea
Select
Radio
Checkbox
FieldGroup
FieldError
FormMessage
SubmitButton
```

Every field must define:

- label
- description where needed
- default
- focus
- error
- disabled
- loading behaviour

---

# 32. Form Visual Language

Forms should feel like part of the Zytrixon interface, not a third-party embedded widget.

Avoid:

- generic rounded white forms
- oversized floating labels without purpose
- excessive shadows

Use the same:

- typography
- spacing
- borders
- focus states
- accent behaviour

as the rest of the site.

---

# 33. Cards

Cards are not the default container for everything.

Use cards when the content represents an independent entity:

- project
- service
- team member
- article
- job

Do not wrap every paragraph in a card.

---

# 34. Data / Technical Components

Potential components:

```text
Metric
Stat
TechList
ArchitectureDiagram
ProcessStep
SystemFlow
Timeline
SpecificationList
```

These components can reinforce Zytrixon's engineering identity.

---

# 35. Metrics

Metrics should be:

- verified
- meaningful
- consistently formatted

Example:

```text
50+
PROJECTS
```

Only use actual approved numbers.

No placeholder zeros.

---

# 36. Motion Tokens

Motion should be tokenized.

Conceptual tokens:

```text
duration-fast
duration-standard
duration-slow

ease-standard
ease-emphasis
ease-enter
ease-exit
```

Avoid each component defining unrelated timing values.

---

# 37. Interaction States

Every interactive component should consider:

```text
Default
Hover
Focus
Active
Disabled
Loading
Success
Error
```

Not every state must be visually elaborate.

---

# 38. Shadows

Shadows should be restrained.

The design should rely primarily on:

- contrast
- borders
- spacing
- typography
- surface hierarchy

rather than large soft shadows.

---

# 39. Depth

Depth can be created using:

- surface changes
- border intensity
- scale
- overlap
- typography
- motion

rather than constant glassmorphism.

---

# 40. Background Treatment

The background may use subtle texture or noise if it improves the visual system.

Rules:

- extremely subtle
- low performance cost
- no distraction
- no dependency on raster-heavy effects

Do not use animated noise simply for aesthetic novelty.

---

# 41. Decorative Elements

Possible visual vocabulary:

- grid lines
- coordinates
- system labels
- numbering
- technical markers
- fine rules
- data-style annotations

These should reinforce Zytrixon's engineering identity.

Avoid decorative elements that have no relationship to the content.

---

# 42. Responsive Typography

Display text must adapt to viewport width.

Rules:

- prevent accidental overflow
- preserve intentional line breaks only where appropriate
- test long titles
- test translations if multilingual support is introduced
- maintain readable body text

---

# 43. Responsive Layout

Desktop compositions may use:

- asymmetric grids
- overlapping elements
- large visual fields

Mobile should transform them into:

- stacked sections
- simplified relationships
- reduced overlap
- touch-friendly interactions

Do not simply scale desktop down.

---

# 44. Mobile Navigation

Mobile navigation should provide:

- clear open/close
- service groups
- primary CTA
- keyboard/focus support
- scroll locking when necessary
- accessible labels

Advanced desktop navigation effects should not compromise mobile usability.

---

# 45. Reduced Motion

The system must respect:

```css
@media (prefers-reduced-motion: reduce)
```

Reduced motion should:

- disable unnecessary transitions
- reduce parallax
- remove nonessential movement
- preserve content and functionality

---

# 46. Accessibility Tokens

Design tokens must maintain:

- sufficient contrast
- visible focus
- readable text
- usable controls
- error differentiation beyond colour alone

---

# 47. Z-Index System

Avoid random values such as:

```text
z-index: 999999
```

Define semantic layers.

Example:

```text
base
content
sticky
navigation
dropdown
modal
toast
```

Exact numeric values belong in implementation tokens.

---

# 48. Component Naming

Component names should describe responsibility.

Good:

```text
ServiceCard
CaseStudyHero
MobileNavigation
ProjectMeta
ContactForm
```

Bad:

```text
CoolCard
MagicSection
Thing
NewHero2
FinalCard
```

Names must remain stable as the product evolves.

---

# 49. Component Composition

Prefer composition over giant components.

Avoid:

```text
HomePage.tsx
```

containing thousands of lines.

Instead:

```text
HomePage
├── Hero
├── CapabilityOverview
├── FeaturedWork
├── Process
├── CompanyProof
├── TeamPreview
└── ContactCTA
```

---

# 50. Design Tokens vs Component Styles

Global tokens should define:

- colour
- typography
- spacing
- radius
- borders
- motion

Components should define:

- component-specific structure
- component-specific state
- layout behaviour

Do not hard-code brand values repeatedly inside components.

---

# 51. Dark/Light Theme Architecture

Theme switching should be token-based.

Conceptually:

```text
Theme
├── Color Tokens
├── Surface Tokens
├── Border Tokens
└── Text Tokens
```

Components should consume semantic tokens rather than directly referencing a specific colour.

---

# 52. Content Density

The site should use deliberate density variation.

Examples:

### Hero

Low density / high impact.

### Engineering sections

Higher information density.

### Case studies

Medium-high density.

### Contact

Focused / low distraction.

This creates rhythm.

---

# 53. Visual Rhythm

Pages should alternate between:

- large statements
- detailed information
- visual proof
- whitespace
- system diagrams
- interaction

Avoid a monotonous sequence of identical cards.

---

# 54. Editorial Composition

Zytrixon can use editorial techniques such as:

- oversized headings
- asymmetric alignment
- edge-to-edge media
- narrow text columns
- technical annotations
- intentional whitespace

These should remain aligned to the grid.

---

# 55. Technical Visual Language

The interface may reference concepts such as:

```text
systems
networks
flows
architecture
data
interfaces
operations
automation
```

The visual language should communicate these concepts without resorting to cliché cyberpunk graphics.

---

# 56. Photography

Use real photography whenever possible.

Priority:

1. real team
2. real office/work environment
3. real projects
4. authentic client/project context
5. stock only when necessary

AI-generated people should not be used to represent real employees or clients.

---

# 57. Logo Usage

The Zytrixon logo must have:

- clear space
- minimum size
- light/dark variants if needed
- favicon/mark
- appropriate contrast

Official brand assets take precedence over any reconstructed logo.

---

# 58. Favicon / Brand Assets

Required:

```text
favicon
apple-touch-icon
OG image
logo variants
wordmark
brand mark
```

Asset formats and dimensions should be finalized during implementation.

---

# 59. Empty States

If content is unavailable:

- explain the state
- provide a useful next action
- preserve brand language

Do not expose raw errors or blank sections.

---

# 60. Loading States

Loading should preserve layout stability.

Prefer:

- reserved media dimensions
- lightweight skeletons where useful
- progressive image loading
- content placeholders only when actual latency exists

Do not create elaborate loading animations for instant content.

---

# 61. Error States

Error messages should be:

- concise
- actionable
- human-readable

Example:

> Something went wrong while sending your enquiry. Please try again or contact us directly.

Do not expose internal stack traces.

---

# 62. Design System Anti-Patterns

The following are explicitly discouraged:

- giant gradient text everywhere
- purple/blue AI aesthetic
- excessive glass panels
- giant glowing spheres
- random 3D models
- animated blobs
- excessive pill-shaped cards
- excessive drop shadows
- every section using a card grid
- generic dashboard screenshots
- stock business people
- decorative cursor for no reason

---

# 63. Design Quality Test

For every major component ask:

### Does it look like Zytrixon?

### Does it improve understanding?

### Does it support the hierarchy?

### Does it work on mobile?

### Does it remain usable without animation?

### Does it justify its complexity?

If the answer to multiple questions is "no", simplify it.

---

# 64. Design System Acceptance Criteria

The design system is ready for implementation when:

- typography is selected
- colour tokens are approved
- spacing scale is defined
- grid is defined
- containers are defined
- buttons are defined
- navigation is defined
- form states are defined
- cards are defined
- responsive rules are defined
- motion principles are documented
- accessibility constraints are documented
- anti-patterns are documented

---

# 65. Implementation Principle

The design system should be implemented as reusable tokens and components.

The goal is:

```text
One decision
        ↓
Reusable everywhere
        ↓
Consistent product
```

Not:

```text
Every page
        ↓
New CSS
        ↓
New spacing
        ↓
New button
        ↓
New colour
        ↓
CSS nightmare
```

---

# 66. Status

**Status:** Working design system specification.

The next document defines the motion system separately because Zytrixon's interaction design is a major part of the product identity.

**Next document:** `05-motion-system.md`
