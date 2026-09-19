# Zytrixon V2 — Do-Not-Do / Anti-AI-Slop Constitution

**Document:** `14-do-not-do.md`  
**Project:** Zytrixon Website V2  
**Purpose:** Protect Zytrixon's identity, credibility, usability, and engineering quality during AI-assisted development.

---

# 1. Core Rule

**Zytrixon V2 must look like Zytrixon evolved — not like an AI generated a random “premium agency website.”**

Every design, copy, component, animation, and implementation decision must reinforce the existing Zytrixon identity.

When in doubt:

```text
existing Zytrixon identity
        >
generic design trend
        >
AI-generated novelty
```

---

# 2. Do Not Replace the Brand Identity

Do not casually replace:

- the established Zytrixon visual language
- the technical/editorial character
- the dark-first identity
- the numbered navigation concept
- the engineering-oriented tone
- the existing “We Engineer Digital Dominance.” positioning

Any major change must be justified by the brand strategy document.

---

# 3. Do Not Build a Generic AI Agency Website

Avoid the standard AI-generated agency formula:

```text
giant gradient hero
+
“Transform Your Business”
+
three glass cards
+
floating dashboard
+
purple/blue gradient
+
AI-generated 3D object
+
logo wall
+
generic testimonials
+
“Let's build the future”
```

This is explicitly prohibited unless a specific element is justified by Zytrixon's actual identity.

---

# 4. No Generic Hero Copy

Avoid phrases such as:

```text
Transform Your Business
Unlock Your Potential
Digital Solutions for a Better Tomorrow
Innovative Solutions for Modern Businesses
We Build the Future
Empowering Businesses Through Innovation
Where Technology Meets Innovation
Your Vision, Our Expertise
```

These phrases are interchangeable with hundreds of agency websites.

Hero copy must communicate something specifically true about Zytrixon.

---

# 5. Do Not Invent Business Claims

Never invent:

```text
clients
projects
revenue
employees
countries
success rates
awards
certifications
testimonials
case-study metrics
partnerships
customer logos
```

If a number cannot be verified, do not publish it as fact.

This is especially important because the current website contains inconsistent statistics.

There must be one verified source of truth.

---

# 5.1 No Heavy Loading Animations

The client has specifically requested a lightweight loading experience.

Do not add:

- full-screen loading animations for ordinary page loads;
- long logo/preloader sequences;
- animated percentage counters before content;
- fake loading progress bars;
- several-second intro animations;
- heavy Lottie/video/canvas loaders;
- JavaScript-controlled page visibility that waits for an animation.

A loading indicator is appropriate only when the application is genuinely waiting for an asynchronous operation.

For ordinary page entry:

> **Show the content first. Animate the interface second.**

Prefer CSS transitions and small progressive enhancements.

# 6. No Fake Testimonials

Do not generate testimonials merely to fill a section.

Never fabricate:

```text
person name
company
job title
quote
photo
rating
```

If real testimonials are unavailable:

```text
omit the section
```

Do not manufacture social proof.

---

# 7. No Fake Case Study Metrics

Never write:

```text
+300% growth
-60% operational cost
98% faster
2.5x conversion
```

unless the figure is backed by real project data.

A case study can explain engineering decisions without fabricated numbers.

---

# 8. No Fake Client Logos

Do not use random company logos as decoration.

Only display an organization when Zytrixon has permission and a real relationship that can be publicly represented.

---

# 9. No Stock-Corporate Photography by Default

Avoid generic imagery such as:

```text
business handshake
team around laptop
smiling office people
random server room
generic programmer
generic businessman
```

Prefer:

```text
real project screenshots
real team photography
real product interfaces
real technical diagrams
real environment photography
```

If no meaningful visual exists, use typography or structured graphic composition instead of filler.

---

# 10. No AI Slop Visual Language

Avoid excessive:

```text
glassmorphism
neon gradients
glowing blobs
3D floating spheres
AI brains
robot heads
holographic dashboards
random particles
purple-blue gradients
chrome objects
abstract liquid shapes
```

These may be fashionable but are not automatically Zytrixon.

---

# 11. No Gradient Everything

Do not apply gradients to:

```text
every heading
every button
every border
every card
every background
```

Color should have hierarchy and purpose.

---

# 12. No Excessive Rounded Cards

Do not turn the entire website into:

```text
rounded card
rounded card
rounded card
rounded card
```

Use geometry intentionally.

The current Zytrixon identity is more editorial and structured than a generic SaaS dashboard.

---

# 13. Do Not Destroy the Editorial Grid

Preserve the sense of:

```text
large typography
strong alignment
numbered systems
structured spacing
technical labels
editorial hierarchy
```

Do not replace everything with centered cards.

---

# 14. Do Not Center Everything

Centered layouts are not inherently premium.

Use:

```text
asymmetry
left alignment
grid alignment
controlled whitespace
```

when they communicate information better.

---

# 15. No Animation for Animation's Sake

Animation must communicate:

```text
hierarchy
state
continuity
interaction
spatial relationship
```

If an animation does none of these, remove it.

---

# 16. No Excessive Scroll Effects

Avoid:

```text
every section parallax
every heading reveal
every card stagger
every image zoom
every cursor effect
```

If everything moves, nothing feels important.

---

# 17. No Scroll-Jacking

Do not hijack normal browser scrolling to create cinematic transitions.

Scrolling must remain predictable.

---

# 18. No Cursor Gimmicks

Do not create elaborate custom cursors unless there is a clear interaction benefit.

Never make basic links or buttons harder to use because of cursor effects.

---

# 19. No Blocking Intro Animation

Do not force users to watch:

```text
logo animation
loading sequence
percentage counter
cinematic intro
```

before accessing the website.

The website should become useful immediately.

---

# 20. Respect Reduced Motion

Animations must degrade gracefully under:

```text
prefers-reduced-motion: reduce
```

No essential content should depend on animation.

---

# 21. No Huge JavaScript Just for Visual Effects

Do not add large libraries merely for:

```text
simple fade
simple slide
simple hover
simple counter
```

Prefer CSS or existing project capabilities when sufficient.

---

# 22. Do Not Overuse GSAP

GSAP is allowed only when its capabilities are actually required.

Do not use GSAP for every transition.

---

# 23. Do Not Create Dependency Bloat

Before adding a dependency, ask:

```text
Can this be implemented cleanly with the existing stack?
```

Avoid installing a package for trivial functionality.

---

# 24. No Unnecessary UI Framework

Do not introduce a huge component library if the design system requires highly custom editorial components.

---

# 25. No Duplicate Component Systems

Do not create:

```text
Button
Button2
PrimaryButton
CTAButton
ActionButton
```

when a coherent primitive system can solve the problem.

---

# 26. No Hardcoded Repetition

Do not duplicate service, case-study, navigation, or metadata structures across pages.

Use typed content models where appropriate.

---

# 27. Do Not Put Business Content Everywhere

Do not scatter service copy through JSX files.

Separate content from presentation where architecture allows.

---

# 28. No Untyped Content Objects

Avoid:

```ts
const services: any[] = [...]
```

Content structures should have explicit types.

---

# 29. No `any` as an Escape Hatch

Do not use:

```ts
any
```

to silence architecture or typing problems.

Fix the underlying type.

---

# 30. No Unjustified TypeScript Suppression

Avoid:

```ts
// @ts-ignore
```

and unjustified:

```ts
// @ts-expect-error
```

Every exception requires a documented reason.

---

# 31. No Client Component by Default

Do not add:

```ts
"use client";
```

to every component.

Prefer server components unless client-side state, effects, browser APIs, or interaction actually require them.

---

# 32. No Unnecessary API Layer

Do not create API endpoints merely to fetch static content that can be handled directly by the application architecture.

---

# 33. No Database by Default

Do not introduce a database because “production websites need databases.”

A marketing site may not need one.

Use persistent storage only when there is a real requirement.

---

# 34. No Kubernetes Theater

Do not introduce:

```text
Kubernetes
Docker Swarm
service mesh
microservices
event bus
```

for prestige.

Infrastructure must follow actual product requirements.

---

# 35. No Microservices for a Website

Do not split the project into multiple services unless independent scaling, ownership, deployment, or security boundaries justify it.

---

# 36. No Fake Enterprise Architecture

Avoid diagrams and code structures that exist only to make the project look sophisticated.

Good architecture reduces complexity.

It does not display complexity.

---

# 37. No Over-Abstraction

Do not create five abstraction layers for a component used twice.

Prefer simple code until repetition or complexity creates a genuine reason to abstract.

---

# 38. No Giant Components

Do not create:

```text
Homepage.tsx
```

containing hundreds or thousands of lines of unrelated logic.

Break meaningful responsibilities into components.

---

# 39. No Random Folder Explosion

Do not create dozens of folders for tiny components.

Architecture should reflect actual domain boundaries.

---

# 40. No Business Logic in Visual Components

Keep:

```text
data fetching
validation
business rules
formatting
```

out of purely presentational components when separation is useful.

---

# 41. No Secret Exposure

Never place secrets in:

```text
client bundles
public/
NEXT_PUBLIC_*
Git
screenshots
logs
analytics payloads
```

---

# 42. No Trusting Client Validation

Client validation improves UX.

It is not a security boundary.

Server-side validation must exist for server-handled input.

---

# 43. No Unsafe HTML

Avoid rendering raw HTML unless absolutely required.

If rich HTML is required, sanitize it appropriately.

---

# 44. No Sensitive Analytics

Do not send unnecessary:

```text
phone numbers
emails
tokens
private messages
payment details
```

to analytics providers.

---

# 45. No Accessibility Afterthought

Do not “add accessibility later.”

Accessibility must be part of component design.

Every interactive component must consider:

```text
keyboard
focus
semantics
screen readers
contrast
motion
```

---

# 46. No Div-as-Button

Do not use:

```html
<div onClick={...}>
```

for an action that should be a button.

Use semantic HTML.

---

# 47. No Invisible Focus

Do not remove browser focus indicators without providing a better accessible focus state.

---

# 48. No Tiny Text for Aesthetic Reasons

Technical/editorial does not mean unreadable.

Body text and labels must remain usable across devices.

---

# 49. No Low-Contrast “Premium” Design

Do not sacrifice readability to make the website look sophisticated.

---

# 50. No Desktop-Only Thinking

Every major design decision must consider:

```text
mobile
tablet
desktop
```

from the beginning.

Do not build desktop first and discover later that the mobile layout is impossible.

---

# 51. No Hover-Only Information

Important information and functionality must not require hover.

Touch devices do not have reliable hover.

---

# 52. No Giant Text That Breaks the Layout

Large typography is part of the brand, but it must remain responsive.

Test:

```text
320px
375px
414px
768px
1024px
1440px+
```

and intermediate widths.

---

# 53. No Layout Shift

Avoid content appearing late without reserved space.

Pay attention to:

```text
fonts
images
navigation
dynamic content
animations
```

---

# 54. No Unoptimized Media

Do not ship:

```text
10MB hero image
uncompressed PNG screenshots
unnecessary video backgrounds
unused font weights
```

Optimize assets before production.

---

# 55. No Autoplay Video With Sound

Never surprise users with audio.

If video is used, default to:

```text
muted
playsInline
appropriate controls
accessible fallback
```

---

# 56. No Background Video by Default

Video must justify its performance and accessibility cost.

---

# 57. No Fake Loading

Do not display a loader just to make the site feel sophisticated.

Show loading UI only when something genuinely takes time.

---

# 58. No Infinite Loading

Every asynchronous operation needs a failure path.

Never leave users staring at:

```text
Loading...
```

forever.

---

# 59. No Broken Error States

Do not expose:

```text
stack traces
database errors
provider errors
internal paths
secret identifiers
```

to users.

---

# 60. No Generic 404

The 404 page should feel like Zytrixon, not the framework default.

But do not turn the 404 into a 20-second animation.

---

# 61. No SEO Theater

Do not stuff pages with:

```text
keyword repetition
hidden text
fake headings
irrelevant schema
```

SEO should describe the actual page.

---

# 62. No Fake Structured Data

Only publish structured data that accurately represents visible, legitimate content.

---

# 63. No Duplicate Metadata

Every important route should have intentional metadata.

Do not copy the homepage title into every page.

---

# 64. No Broken Canonicals

Canonical URLs must match the actual public URL strategy.

---

# 65. No Indexing Staging

Preview/staging environments must not accidentally become search-engine destinations.

---

# 66. No “AI” Everywhere

Do not mention AI merely because it is fashionable.

If a service is not actually AI-driven, do not label it AI.

---

# 67. No AI-Washing

Do not rewrite ordinary:

```text
automation
search
analytics
rules
workflow
```

as “AI” merely to sound advanced.

---

# 68. No Generic “AI Automation” Claims

Explain the actual capability:

```text
workflow automation
LLM integration
document processing
customer support
classification
data extraction
API orchestration
```

when applicable.

Specific beats hype.

---

# 69. No Overclaiming Technology

Do not list technologies just because they appear impressive.

Only claim technologies Zytrixon actually uses or can credibly deliver.

---

# 70. No Technology Logo Wall as the Main Proof

The tech stack is supporting evidence.

The real proof should be:

```text
problems solved
systems built
engineering decisions
results
```

---

# 71. No Portfolio Card Graveyard

Do not create dozens of tiny project cards with:

```text
logo
title
“view project”
```

and little useful information.

Prioritize meaningful case studies.

---

# 72. No Fake Case Study Storytelling

A case study should distinguish:

```text
client problem
constraints
approach
architecture
implementation
outcome
```

Do not invent a narrative.

---

# 73. No Generic Process Icons

Avoid:

```text
Discovery icon
Design icon
Development icon
Launch icon
```

with three words underneath unless the section adds actual information.

Zytrixon's process should communicate how the company thinks.

---

# 74. No Repetitive Service Pages

Every service page should answer:

```text
What problem does this solve?
Who is it for?
What does Zytrixon actually do?
How does it work?
What proof exists?
What is the next step?
```

Do not clone one template and swap the heading.

---

# 75. No Service Explosion

Do not create a separate service for every technology.

Bad:

```text
React Development
Next.js Development
Node.js Development
MongoDB Development
```

Those are technologies, not necessarily business services.

---

# 76. No “Everything Agency” Positioning

Zytrixon should not communicate:

```text
we do websites
apps
marketing
SEO
branding
blockchain
AI
IoT
cybersecurity
cloud
anything
```

without hierarchy.

Capability must be organized around customer problems.

---

# 77. No Strategy Without Substance

If strategy/consulting is positioned as a capability, it must lead to concrete outputs:

```text
problem definition
process mapping
technical roadmap
system architecture
growth plan
automation opportunities
```

Avoid vague consulting language.

---

# 78. No Marketing Claims Without Evidence

Avoid:

```text
industry-leading
world-class
best-in-class
award-winning
#1
trusted by thousands
```

unless verifiable.

---

# 79. No Fake Urgency

Avoid:

```text
Limited slots
Act now
Only 3 spots left
Don't miss out
```

unless genuinely true and appropriate.

---

# 80. No Manipulative UX

Do not use:

```text
dark patterns
forced signup
hidden costs
fake countdowns
preselected consent
confusing cancellation
```

---

# 81. No Overloaded Contact Form

Ask only for information needed to start the conversation.

Do not require:

```text
company revenue
employee count
full address
unnecessary personal data
```

unless there is a genuine business reason.

---

# 82. No Fake Chatbot

Do not add a chatbot just because modern websites have chatbots.

If implemented, it must provide useful functionality.

---

# 83. No Chatbot Blocking

A chatbot must never obscure:

```text
navigation
contact CTA
forms
important content
```

especially on mobile.

---

# 84. No Third-Party Script Explosion

Every external script has costs:

```text
performance
privacy
security
reliability
```

Add only necessary providers.

---

# 85. No “Just One More Library”

Before adding a dependency:

```text
What problem does it solve?
Can existing code solve it?
What is its bundle/runtime cost?
Is it maintained?
Does it introduce security risk?
```

---

# 86. No Unnecessary Rewrites

Do not rewrite stable functionality merely because the V2 code looks cleaner.

Preserve proven behaviour where possible.

---

# 87. No Destructive Migration Without Backup

Never replace existing routes/content/data without knowing:

```text
what exists
what users access
what search engines index
what must redirect
```

---

# 88. No Breaking URLs Casually

Existing useful URLs have SEO and user value.

If a route changes:

```text
document it
redirect it
test it
```

---

# 89. No Blind AI Coding

Claude must not:

```text
rewrite the whole project
change architecture without approval
install random dependencies
delete existing functionality
invent content
```

based on a vague prompt.

---

# 90. AI Coding Rule

Before implementation Claude should:

```text
read CLAUDE.md
read relevant docs
inspect existing code
identify affected files
explain intended change
implement bounded scope
run checks
report results
```

---

# 91. No Giant One-Shot Prompt

Do not tell Claude:

```text
Build the entire Zytrixon website.
```

Instead provide bounded implementation tasks.

---

# 92. No Unrelated Changes

A task to change the navbar should not silently modify:

```text
database
SEO architecture
service content
deployment
unrelated components
```

unless required.

---

# 93. No “Looks Good” Without Testing

Every meaningful feature should be checked with:

```text
typecheck
lint
build
browser
mobile
accessibility where relevant
```

---

# 94. No Ignoring Existing Bugs

If V2 discovers a real existing issue, document it.

Do not hide it because it was present before.

---

# 95. No Regressions for Visual Perfection

A prettier animation is not worth:

```text
slower loading
broken keyboard navigation
mobile bugs
SEO damage
unstable builds
```

---

# 96. No Design Trend Chasing

Do not add a trend because:

```text
“everyone is doing it”
“Claude suggested it”
“it looks premium”
```

Every major visual decision must answer:

```text
Why is this Zytrixon?
```

---

# 97. The Three-Question Filter

Before adding a feature, ask:

### 1. Is it useful?

Does it improve:

```text
understanding
trust
conversion
navigation
accessibility
performance
```

### 2. Is it true?

Can the claim or content be verified?

### 3. Is it Zytrixon?

Would this still make sense if the Zytrixon logo were removed?

If the answer to the third question is no, reconsider it.

---

# 98. Priority Hierarchy

When trade-offs happen:

```text
Truth
 ↓
Usability
 ↓
Accessibility
 ↓
Performance
 ↓
Clarity
 ↓
Brand expression
 ↓
Visual novelty
```

Visual novelty must never outrank product fundamentals.

---

# 99. Final Anti-Slop Rule

If a design could be copied onto:

```text
a random AI startup
a random SaaS company
a random web agency
a random marketing agency
```

without changing much, it is probably not distinctive enough.

---

# 100. Final Principle

**Do not make Zytrixon look impressive. Make Zytrixon look credible, capable, specific, and unmistakably Zytrixon.**

The website should communicate:

```text
We understand the problem.
We simplify the system.
We engineer the solution.
We integrate what matters.
We automate where useful.
We build for the business.
```

No hype is required when the work is real.

---

# 101. Status

**Status:** Anti-AI-Slop constitution.

**Next document:** `15-content-strategy.md`
