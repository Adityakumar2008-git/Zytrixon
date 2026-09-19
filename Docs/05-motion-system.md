# Zytrixon V2 — Motion System

**Document:** `05-motion-system.md`  
**Project:** Zytrixon Website V2  
**Status:** Working Motion Specification / Pre-Implementation  
**Depends on:** `00-current-site-audit.md`, `01-brand-strategy.md`, `02-product-requirements.md`, `03-information-architecture.md`, `04-design-system.md`

---

# 1. Purpose

## Client Requirement — Lightweight Loading and Motion

The client has explicitly requested that Zytrixon V2 **must not use heavy loading animations**.

The website should load like an easy, fast website first and animate only where the interaction benefits from it.

Non-negotiable rules:

- Do not use a blocking full-screen preloader for normal page loads.
- Do not delay meaningful content until an animation completes.
- Do not create a long logo reveal before the homepage becomes usable.
- Do not animate every section on initial load.
- Prefer CSS `opacity` and `transform` transitions for simple reveals.
- Prefer `IntersectionObserver` plus CSS classes for scroll-triggered reveals.
- Prefer browser-native transitions over a large animation runtime.
- Use GSAP or another advanced animation library only for a specific interaction that genuinely requires it.
- Respect `prefers-reduced-motion`.
- First content must remain visible and usable even if JavaScript fails.

The performance hierarchy is:

```text
FAST CONTENT DELIVERY
        ↓
USABLE HTML
        ↓
LIGHTWEIGHT INTERACTION
        ↓
SELECTIVE MOTION
```

Never reverse this order.


Motion is a major part of the Zytrixon V2 experience.

The objective is not to maximize animation.

The objective is to create an interface where motion:

- explains relationships
- establishes hierarchy
- communicates state
- improves navigation
- makes transitions understandable
- reinforces Zytrixon's engineering identity
- adds personality without becoming distracting

---

# 2. Core Motion Principle

> **Motion must communicate, not decorate.**

Every significant animation should have a reason.

Valid reasons include:

- revealing content
- showing hierarchy
- connecting related elements
- demonstrating a workflow
- indicating state
- guiding attention
- confirming an interaction
- creating continuity between sections

"Because it looks cool" is not sufficient justification.

---

# 3. Motion Personality

Zytrixon's motion language should feel:

- precise
- controlled
- mechanical where appropriate
- fluid where useful
- responsive
- intentional
- slightly experimental
- premium through timing and composition

It should not feel:

- bouncy
- cartoonish
- game-like
- chaotic
- overly elastic
- constantly moving

---

# 4. Motion Hierarchy

Motion should operate at multiple levels.

```text
LEVEL 01 — MICRO
Buttons, links, icons, fields

LEVEL 02 — COMPONENT
Cards, navigation, accordions, service items

LEVEL 03 — SECTION
Hero, service system, process, case studies

LEVEL 04 — PAGE
Page transitions / route transitions

LEVEL 05 — SYSTEM
Global visual behaviours
```

The higher the level, the more restrained the motion should become.

---

# 5. Motion Budget

The site should maintain a limited motion budget.

Do not animate:

- every heading
- every paragraph
- every card
- every icon
- every background
- every scroll position

If everything moves, nothing has hierarchy.

---

# 5.1 Recommended Lightweight Reveal Pattern

For ordinary section reveals, prefer:

```text
initial:
opacity: 0
transform: translateY(12px)

visible:
opacity: 1
transform: translateY(0)

duration:
~300–500ms

trigger:
IntersectionObserver
```

This should be implemented with CSS transitions wherever possible.

Do not create a JavaScript animation timeline for a simple fade/translate effect.

## 5.2 Loading State Rule

Loading indicators are allowed when an actual asynchronous operation is occurring.

Examples:

- form submission;
- search request;
- dynamic data request;
- file upload.

They should communicate state without blocking the whole site.

A normal initial page load should **not** show:

```text
Loading...
```

or an animated screen between the browser and the actual page.

# 6. Motion Tokens

Use shared motion tokens rather than arbitrary values.

Conceptual tokens:

```text
--motion-duration-instant
--motion-duration-fast
--motion-duration-standard
--motion-duration-slow
--motion-duration-emphasis

--motion-ease-standard
--motion-ease-enter
--motion-ease-exit
--motion-ease-emphasis
```

Exact values should be tuned during implementation and visual QA.

---

# 7. Timing Philosophy

### Fast

For:

- hover
- button feedback
- icon transitions
- small UI state changes

### Standard

For:

- menu transitions
- card interactions
- content reveals
- accordion expansion

### Slow

For:

- major section transitions
- large image reveals
- page-level storytelling

Long duration must be justified by the visual scale of the movement.

---

# 8. Easing Philosophy

Avoid defaulting to the same easing curve for everything.

Use:

- responsive easing for micro interactions
- smooth controlled easing for reveals
- stronger easing for major visual transitions
- near-linear movement for technical/data animations where appropriate

Avoid excessive bounce.

Zytrixon should not feel like a toy.

---

# 9. Page Load Motion

The initial page should establish the brand without forcing the visitor to wait through a cinematic intro.

Potential sequence:

```text
Page shell
 ↓
Navigation
 ↓
Hero typography
 ↓
Hero visual
```

The total perceived loading experience must remain fast.

If the browser has usable content immediately, do not hide it behind a loader.

---

# 10. Hero Animation

The hero is the highest-priority motion area.

Possible behaviours:

- typography reveal
- subtle image/system movement
- technical indicators
- controlled background shift
- cursor-responsive detail

The hero should communicate the brand statement.

Avoid:

- giant 3D objects
- spinning planets
- glowing AI brains
- random particle explosions
- long intro animations

---

# 11. Typography Reveal

Typography may use:

- line reveal
- mask reveal
- opacity + translation
- character-level treatment only where genuinely necessary

Preferred principle:

> Animate words/lines as meaningful units rather than mechanically animating every character.

Avoid text animation that makes the content difficult to read.

---

# 12. Section Reveal

Sections can enter progressively as the visitor scrolls.

Possible sequence:

```text
Section label
 ↓
Heading
 ↓
Supporting text
 ↓
Content
```

Not every section needs this sequence.

Some sections should remain static to create rhythm.

---

# 13. Scroll Choreography

Scroll can control storytelling.

Good examples:

### Process

```text
01 Discovery
      ↓
02 Design
      ↓
03 Architecture
      ↓
04 Development
      ↓
05 QA
      ↓
06 Deployment
```

The visual system can evolve as the user moves through each stage.

### Service Flow

```text
Trigger
 ↓
AI
 ↓
Decision
 ↓
Action
```

Scroll can reveal each relationship.

---

# 14. Scroll Pinning

Pinned sections should be used sparingly.

Use pinning when:

- the user is learning a process
- a visual relationship needs to remain visible
- a complex system is being explained

Avoid pinning large sections simply to create cinematic effects.

Pinned content must work on mobile.

---

# 15. Parallax

Parallax is optional.

If used:

- keep movement subtle
- avoid large depth shifts
- disable/reduce under reduced-motion
- test mobile performance

Parallax should never make content harder to read.

---

# 16. Hover Motion

Hover should provide feedback.

Examples:

### Service item

```text
Default
 ↓
Hover
 ↓
Description / visual state changes
```

### Project item

```text
Hover
 ↓
Image shifts subtly
 ↓
Metadata becomes more prominent
```

### Link

```text
Arrow / underline / indicator responds
```

Hover motion should not alter layout unexpectedly.

---

# 17. Button Motion

Buttons may use:

- background transition
- border transition
- icon translation
- subtle scale
- directional arrow movement

Avoid excessive magnetic movement.

Primary CTA should feel responsive without feeling like a toy.

---

# 18. Magnetic Buttons

Magnetic interaction is optional.

Use only for:

- major desktop CTAs
- large visual moments

Never rely on magnetic interaction for usability.

On:

- touch devices
- keyboard navigation
- reduced motion

the button must behave normally.

---

# 19. Cursor Effects

A custom cursor is **not required**.

If implemented, it must:

- provide actual interaction feedback
- remain subtle
- disappear on touch devices
- not interfere with native pointer behaviour
- respect reduced motion
- not hide important cursor states

A custom cursor should never exist merely because modern agency sites have one.

---

# 20. Navigation Animation

Navigation should have clear transitions for:

- opening
- closing
- active state
- services expansion
- mobile menu

Possible pattern:

```text
Menu
 ↓
Structured panel
 ↓
Service groups
 ↓
Items
```

Avoid excessive blur/glass animation.

---

# 21. Services Interaction

The service index is a major opportunity for meaningful motion.

Potential interaction:

```text
SERVICE GROUP
      ↓
Selected Service
      ↓
Visual Explanation
      ↓
Related Capability
```

Example:

```text
AI AUTOMATION

Trigger
   ↓
AI
   ↓
Decision
   ↓
Action
```

Hover/click can highlight the corresponding stage.

This demonstrates the service rather than merely animating a card.

---

# 22. Case Study Motion

Case studies should use motion to create continuity.

Potential sequence:

```text
Project Title
 ↓
Project Visual
 ↓
Problem
 ↓
Approach
 ↓
System
 ↓
Outcome
```

Image transitions may connect one stage to another.

Avoid turning every screenshot into a carousel.

---

# 23. Process Motion

The engineering process should be one of the strongest motion systems.

Possible visual model:

```text
DISCOVERY
   ↓
DESIGN
   ↓
ARCHITECTURE
   ↓
DEVELOPMENT
   ↓
QA
   ↓
DEPLOYMENT
```

A connecting line or system diagram can progress as the user scrolls.

The motion should communicate progression.

---

# 24. Technical/Data Motion

Technical visualizations may use:

- flowing lines
- data pulses
- node activation
- state changes
- progressive diagrams

Use restrained movement.

Example:

```text
CLIENT
  │
  ▼
API
  │
  ▼
SERVICE
  │
  ▼
DATABASE
```

The animation can show data flow without becoming a decorative sci-fi graphic.

---

# 25. Marquee / Ticker

The current site uses technology/capability ticker-like movement.

V2 may retain this visual language.

Rules:

- low visual intensity
- pause where appropriate
- accessible alternative
- no critical information hidden exclusively inside moving text
- avoid excessive speed

If users need to read it, it should not move continuously.

---

# 26. Accordion Motion

Accordion:

```text
Closed
 ↓
Open
```

Use height/opacity transitions carefully.

Content should remain accessible to keyboard and screen readers.

Avoid overly slow expansion.

---

# 27. Image Reveal

Possible reveal styles:

- clip/mask
- subtle translation
- opacity
- scale from slightly reduced size

Use one or two recognizable image-reveal patterns rather than a different effect for every image.

---

# 28. Route/Page Transitions

Page transitions may provide continuity between:

```text
Home
 → Services
 → Service Detail
```

However, route transitions must not delay navigation.

Requirements:

- fast perceived response
- no inaccessible intermediate state
- correct browser back behaviour
- no animation blocking content
- graceful fallback

---

# 29. Service-to-Case-Study Transition

If practical, a service page and its related case study may share visual continuity.

Example:

```text
AI Automation
      ↓
Relevant Case Study
      ↓
Same visual/system language
```

This creates a coherent narrative.

---

# 30. Contact Transition

The final CTA should feel like the natural conclusion of the page.

Possible:

```text
Explore
 ↓
Understand
 ↓
Trust
 ↓
Contact
```

Do not create a dramatic full-screen animation that delays the contact form.

---

# 31. Form Motion

Forms should use subtle motion for:

- focus
- validation
- error
- success
- loading

Example:

```text
Input
 ↓
Focus
 ↓
Submit
 ↓
Loading
 ↓
Success
```

Error animation should not be aggressive.

---

# 32. Success State

On successful contact submission:

- confirm submission
- provide next-step information
- optionally provide alternative contact
- avoid excessive celebration animation

A business lead form is not a game achievement.

---

# 33. Error State

Error feedback may use:

- subtle field highlight
- icon
- message reveal

Do not use shaking inputs aggressively.

Error messaging must remain readable.

---

# 34. Loading States

Loading animations should be proportional to the actual wait.

If content loads instantly:

> Don't create a fake loader.

If a network request takes time:

- show loading state
- disable duplicate submission
- communicate progress where useful

---

# 35. Skeletons

Skeletons are appropriate only when:

- content is asynchronous
- layout is known
- loading time is noticeable

Do not skeletonize static content.

---

# 36. Reduced Motion

The site must respect:

```css
@media (prefers-reduced-motion: reduce)
```

Under reduced motion:

- remove nonessential transforms
- remove parallax
- reduce transition duration
- disable decorative loops
- preserve content order
- preserve functionality

---

# 37. Mobile Motion

Mobile must use a separate motion strategy where required.

Reduce:

- parallax
- pinned scenes
- cursor interactions
- large transforms
- continuous decorative animation

Prefer:

- opacity
- small translations
- simple state changes

Touch interaction must never depend on hover.

---

# 38. Performance Rules

Animation should primarily use compositor-friendly properties:

```text
transform
opacity
```

Avoid animating expensive layout properties unnecessarily.

Be cautious with:

```text
width
height
top
left
box-shadow
filter
```

especially inside scroll loops.

---

# 39. GSAP vs Motion

The project may use both libraries only when there is a clear reason.

## Motion / Framer Motion

Preferred for:

- component transitions
- simple reveals
- hover interactions
- presence transitions
- UI state changes

## GSAP

Use only when genuinely beneficial for:

- complex scroll choreography
- pinned timelines
- coordinated multi-element sequences
- advanced timeline control

Do not install GSAP just because it is powerful.

---

# 40. Dependency Rule

Before introducing a motion dependency, ask:

1. Can CSS solve it?
2. Can the existing motion library solve it?
3. Does the interaction genuinely require another library?
4. What is the bundle/performance cost?
5. Does it complicate maintenance?

Prefer fewer dependencies.

---

# 41. Animation Ownership

Animation logic should live close to the component it controls.

Avoid putting all animations into one giant global animation file.

Global systems should only handle genuinely global behaviour.

---

# 42. Scroll Event Strategy

Avoid manually running expensive JavaScript on every scroll event where a browser-native or library abstraction can solve the problem efficiently.

Prefer:

- Intersection Observer
- optimized scroll abstractions
- requestAnimationFrame when necessary
- CSS where sufficient

---

# 43. Intersection Observer

Use Intersection Observer for:

- reveal-on-enter
- lazy activation
- viewport-triggered state
- analytics visibility where appropriate

Avoid repeatedly calculating element positions unnecessarily.

---

# 44. Animation Cleanup

Every effect must clean up:

- event listeners
- observers
- animation contexts
- timers
- subscriptions

Especially important for:

- route transitions
- client-side navigation
- React strict mode
- dynamic pages

---

# 45. React Animation Rules

Avoid unnecessary client components solely for visual effects.

Prefer server-rendered content whenever possible.

Client-side animation should be isolated to components that actually require it.

This protects:

- performance
- SEO
- hydration cost
- maintainability

---

# 46. Hydration Considerations

Do not make the entire homepage a client component just because a few sections animate.

Prefer:

```text
Server Component
    ↓
Interactive Client Component
```

rather than:

```text
Entire Page = Client Component
```

---

# 47. Motion Accessibility

Motion must never:

- hide essential information
- prevent keyboard access
- trap focus
- block navigation
- cause severe visual distraction
- communicate meaning through motion alone

Any meaningful state must have a non-motion representation.

---

# 48. Motion Consistency

The same interaction should behave consistently.

For example:

If service links use an arrow transition:

```text
→
```

then similar links should use the same interaction language.

Do not use:

- one arrow sliding
- another spinning
- another bouncing
- another exploding

for equivalent actions.

---

# 49. Motion Anti-Patterns

Explicitly avoid:

- perpetual floating cards
- random particle systems
- animated blobs
- excessive 3D
- scroll hijacking
- fake loading screens
- extreme parallax
- shaking elements
- constant text movement
- over-animated cursors
- every card scaling on hover
- every section fading from below

---

# 50. Scroll Hijacking

Do not replace native browser scrolling with custom scroll mechanics unless there is an exceptional product-level reason.

Users should retain:

- natural scroll control
- scrollbar behaviour
- keyboard navigation
- touch scrolling
- expected browser interactions

---

# 51. Motion and SEO

Motion must never prevent important content from being present in the page structure.

Important content must remain available to:

- crawlers
- screen readers
- users with reduced motion
- users with JavaScript limitations where practical

---

# 52. Motion and Conversion

Primary conversion actions must remain obvious.

Animation should guide attention toward:

```text
START A PROJECT
CONTACT
DISCUSS YOUR REQUIREMENT
```

but must not make other content difficult to access.

---

# 53. Motion QA

Every major animated component must be tested for:

### Desktop

- Chrome
- Safari
- Firefox

### Mobile

- iOS Safari
- Android Chrome

### Accessibility

- keyboard
- reduced motion
- screen reader where applicable

### Performance

- mid-range mobile hardware
- slow network
- low-power conditions

---

# 54. Motion Failure Modes

### Failure 01

Animation looks good on desktop but becomes unusable on mobile.

**Fix:** mobile-specific choreography.

### Failure 02

Scroll animation causes jank.

**Fix:** simplify timeline, use compositor properties, reduce JS work.

### Failure 03

Animation blocks navigation.

**Fix:** make transition interruptible.

### Failure 04

Every section animates.

**Fix:** introduce static rhythm.

### Failure 05

User with reduced motion receives broken layout.

**Fix:** treat reduced motion as a complete alternative behaviour.

---

# 55. Motion Priority

## P0

- navigation states
- buttons
- service interaction
- case-study interaction
- essential reveals
- form states

## P1

- process choreography
- page transitions
- advanced case-study transitions
- technical system visualization

## P2

- custom cursor
- advanced parallax
- experimental effects

P2 effects should never delay launch.

---

# 56. Motion Review Checklist

Before approving an animation:

```text
[ ] Does it communicate something?
[ ] Is it necessary?
[ ] Is it consistent?
[ ] Does it work on mobile?
[ ] Does reduced motion work?
[ ] Does keyboard navigation work?
[ ] Does it affect performance?
[ ] Can the user interrupt it?
[ ] Does it preserve content accessibility?
[ ] Does it look like Zytrixon?
```

---

# 57. Motion System Acceptance Criteria

The motion system is ready when:

- motion tokens are defined
- primary interaction patterns are defined
- hero behaviour is defined
- navigation behaviour is defined
- service interaction is defined
- case-study behaviour is defined
- process animation is defined
- reduced-motion behaviour is defined
- mobile strategy is defined
- performance constraints are defined
- library usage rules are defined

---

# 58. Implementation Philosophy

The motion system should make Zytrixon feel alive without making it feel noisy.

The target is:

> **Precision over spectacle.**

The best interaction should make the visitor think:

> "That makes sense."

not:

> "Damn, cool animation."

The latter is acceptable as a side effect.

It should never be the primary objective.

---

# 59. Status

**Status:** Working motion specification.

This document defines how motion should behave across the product.

The next phase moves from design specification into technical architecture.

**Next document:** `06-architecture.md`
