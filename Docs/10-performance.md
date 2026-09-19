# Zytrixon V2 — Performance Engineering Specification

**Document:** `10-performance.md`  
**Project:** Zytrixon Website V2  
**Status:** Production Performance Specification  
**Depends on:** `02-product-requirements.md`, `04-design-system.md`, `05-motion-system.md`, `06-architecture.md`, `08-seo-strategy.md`, `09-accessibility.md`

---

# 1. Performance Objective

Zytrixon V2 must feel fast on:

- modern desktop
- average Android devices
- low/mid-range laptops
- mobile networks
- constrained 4G
- high-latency connections

Performance is part of product quality.

The objective is not:

> "Get 100/100 Lighthouse."

The objective is:

> **Make the real website feel immediate, stable and responsive under realistic conditions.**

---

# 2. Core Performance Principles

Use:

```text
less JavaScript
+
less network work
+
optimized assets
+
server rendering
+
stable layout
+
controlled animation
```

Avoid:

```text
large bundles
+
unnecessary hydration
+
oversized images
+
excessive third-party scripts
+
animation for everything
```

---

# 3. Performance Targets

Target strong Core Web Vitals:

```text
LCP  → good
INP  → good
CLS  → good
```

The exact numeric thresholds should follow the current official Core Web Vitals definitions at implementation/review time.

Do not freeze old thresholds into the architecture document.

---

# 4. Performance Budget Philosophy

A performance budget should exist before visual polish becomes too expensive.

Track:

```text
initial JS
route JS
image weight
font weight
third-party scripts
number of requests
main-thread work
```

If a feature exceeds the budget, its value must justify the cost.

---

# 5.1 Animation Performance Rule

Animation must never become the reason the website feels slow.

For normal UI motion:

- prefer CSS transitions;
- animate `transform` and `opacity`;
- avoid layout-triggering properties during animation;
- avoid continuously running animations;
- avoid large canvas/WebGL effects unless they have a documented product purpose;
- avoid scroll handlers that execute expensive work on every frame;
- use `IntersectionObserver` for reveal triggers;
- lazy-load non-critical interactive modules;
- disable or reduce motion under `prefers-reduced-motion`.

### Initial Load

Do not use a full-screen animated loader to hide the loading process.

The user should receive meaningful HTML immediately.

```text
Request
  ↓
Server-rendered HTML
  ↓
Visible content
  ↓
CSS / lightweight enhancement
```

not:

```text
Request
  ↓
Heavy JS bundle
  ↓
Loading animation
  ↓
Animation completes
  ↓
Page appears
```

# 5. JavaScript Budget

Keep client-side JavaScript deliberately small.

Default rule:

```text
Server Component
```

Only move code to the client when interaction genuinely requires it.

---

# 6. Client Component Budget

Every `"use client"` file should have a reason.

Before creating one, ask:

```text
Does this require browser state?
Does this require event handlers?
Does this require browser APIs?
Does this require client-side animation?
```

If the answer is no, keep it server-side.

---

# 7. Hydration Cost

Hydration should be minimized.

Do not make:

```text
entire homepage
```

a single hydrated React tree merely to support a few animated elements.

Prefer isolated interactive islands.

---

# 8. Bundle Analysis

During development and release, inspect bundle composition.

Look for:

- duplicate dependencies
- unexpectedly large libraries
- server code leaking into client bundles
- animation libraries imported unnecessarily
- icon packages importing more than required

---

# 9. Dependency Cost

Before adding a package, consider:

```text
package size
maintenance
security
browser cost
server cost
native alternative
```

A 2 KB utility does not need a 200 KB dependency.

---

# 10. Tree Shaking

Import libraries in ways that permit effective tree shaking.

Avoid importing entire libraries when a specific module is sufficient.

---

# 11. Dynamic Imports

Use dynamic imports when a feature is:

- large
- non-critical
- rarely used
- below the fold
- interaction-triggered

Examples:

```text
advanced calculator
complex visualization
large animation module
```

Do not dynamically import tiny components just to appear sophisticated.

---

# 12. Above-the-Fold Priority

Prioritize resources required for:

```text
header
hero
primary typography
primary CTA
critical visual
```

Delay non-essential content.

---

# 13. Largest Contentful Paint

Identify the actual LCP element on every major page.

Potential candidates:

```text
hero heading
hero image
large visual
```

Then optimize that exact element.

Do not assume the hero image is always LCP.

---

# 14. LCP Rules

Avoid delaying LCP through:

- unnecessary client rendering
- oversized hero media
- slow external fonts
- large blocking scripts
- artificial page loaders

The primary content should appear as early as practical.

---

# 15. Hero Images

If a hero image is genuinely the LCP resource:

- use correct dimensions
- select an appropriate format
- provide responsive sizes
- preload only when justified
- avoid unnecessarily huge source files

Do not preload every image.

---

# 16. Image Strategy

All content images should be evaluated for:

```text
dimensions
format
compression
crop
quality
loading priority
responsive sizes
```

Use the smallest source that provides the required visual quality.

---

# 17. Image Formats

Prefer modern efficient formats where browser support and tooling make sense.

Possible:

```text
AVIF
WebP
```

Keep original high-quality source files outside the production request path when possible.

---

# 18. Responsive Images

Do not serve a 2400px image to a 390px mobile viewport unless there is a real reason.

Use responsive image sizing.

---

# 19. Image Dimensions

Always provide predictable image dimensions where possible.

This reduces layout shifts.

---

# 20. Lazy Loading

Images below the fold should normally be lazy-loaded.

Do not lazy-load the resource that is essential for initial rendering.

---

# 21. Background Images

Be careful with CSS background images.

They can make:

- responsive sizing
- loading priority
- accessibility
- performance analysis

more difficult.

Use semantic image elements when the image contains meaningful content.

---

# 22. Decorative Visuals

Large decorative visuals should not dominate network cost.

If a decorative element costs more than the content it supports, reconsider it.

---

# 23. Video

Video can be expensive.

If video is used:

- compress aggressively
- use an appropriate poster
- avoid unnecessary autoplay
- avoid huge hero videos on mobile
- load only when valuable

---

# 24. Autoplay Video

Avoid autoplay video unless it adds significant value.

If used:

```text
muted
+
playsinline
+
accessible controls where needed
```

and respect reduced-motion/user preferences.

---

# 25. Fonts

Fonts can become an invisible performance bottleneck.

Use a limited font family/weight set.

Avoid loading:

```text
10 weights
+
4 families
```

when the design needs:

```text
2 families
+
4 weights
```

---

# 26. Font Loading

Use Next.js/font or an equivalent optimized approach.

Prefer self-hosted/optimized font delivery when practical.

Avoid unnecessary runtime requests to external font providers.

---

# 27. Font Display

Prevent invisible text during font loading.

The site should remain readable if the custom font is delayed.

---

# 28. Font Subsetting

If custom fonts are used and tooling supports it, subset to required character sets.

This can significantly reduce transfer size.

---

# 29. Typography and CLS

Typography must not cause large layout changes after loading.

Check:

```text
font metrics
fallback
line height
heading dimensions
```

---

# 30. Cumulative Layout Shift

CLS should be minimized.

Common causes:

- images without dimensions
- fonts changing layout
- injected banners
- late-loaded UI
- dynamic content without reserved space

---

# 31. Reserved Space

If content is loaded asynchronously, reserve appropriate space where practical.

Do not let the page jump when:

```text
images
forms
widgets
```

appear.

---

# 32. Third-Party Scripts

Third-party scripts are performance liabilities.

Possible examples:

```text
analytics
chat
CRM
captcha
maps
social embeds
```

Every script needs justification.

---

# 33. Script Loading

Use appropriate loading strategies.

Non-critical scripts should not block primary content.

Avoid loading marketing/analytics tools before the page can become usable.

---

# 34. Third-Party Failure

The website must remain usable if a third-party service:

```text
fails
times out
blocks
loads slowly
```

Do not make core navigation depend on external scripts.

---

# 35. Analytics Performance

Analytics should be lightweight.

Track meaningful events only.

Do not send dozens of events for every scroll or hover unless there is a genuine measurement reason.

---

# 36. Main Thread Budget

Avoid long JavaScript tasks.

Common sources:

```text
large hydration
heavy animation
large JSON processing
unnecessary state updates
expensive calculations
```

---

# 37. Animation Performance

Animations should primarily use:

```text
transform
opacity
```

where possible.

Avoid repeatedly animating expensive layout properties.

---

# 38. Avoid Layout Thrashing

Do not repeatedly alternate:

```text
read layout
→ write style
→ read layout
→ write style
```

inside animation loops.

Batch measurements and mutations.

---

# 39. Scroll Performance

Avoid heavy scroll listeners.

Prefer:

```text
IntersectionObserver
CSS
Motion/GSAP optimized mechanisms
```

where appropriate.

---

# 40. IntersectionObserver

Use IntersectionObserver for:

- reveal triggers
- lazy behavior
- viewport detection
- analytics visibility events

Avoid custom polling loops.

---

# 41. GSAP Performance

If GSAP is used:

- import only required functionality where practical
- scope animations correctly
- clean up on unmount
- avoid animating hundreds of DOM nodes simultaneously
- respect reduced motion

---

# 42. Motion Library Performance

Motion/Framer Motion should be used for meaningful UI transitions.

Avoid wrapping every element in a motion component.

---

# 43. Animation Density

Zytrixon's visual identity can be sophisticated without every element moving.

Prioritize:

```text
hero
navigation
key interactions
service exploration
case studies
```

Allow secondary content to remain calm.

---

# 44. Mobile Animation

Reduce animation complexity on mobile where needed.

Mobile often has:

```text
less CPU
less GPU headroom
more constrained network
```

Do not assume desktop animation performance transfers to low-end phones.

---

# 45. Reduced Motion

When:

```text
prefers-reduced-motion: reduce
```

is active:

- remove non-essential movement
- reduce transition distance
- disable parallax
- avoid looping decorative motion
- preserve state changes

See `05-motion-system.md` and `09-accessibility.md`.

---

# 46. CSS Performance

Avoid excessive:

- giant box-shadow stacks
- huge blur filters
- backdrop-filter everywhere
- complex clipping
- expensive paint effects

A technically simple effect that paints cheaply is often better than a visually identical expensive one.

---

# 47. Glassmorphism Warning

Do not use:

```text
backdrop-filter
+
large blur
```

as a default design language.

Apart from violating the anti-generic visual direction, it can create unnecessary GPU/paint cost.

---

# 48. Gradients

Gradients are acceptable when part of the brand system.

Do not stack multiple animated gradients across the page.

---

# 49. DOM Size

Avoid unnecessarily large DOM trees.

Repeated decorative wrappers add:

```text
memory
style calculation
layout work
```

without adding content value.

---

# 50. Component Complexity

If a component becomes responsible for:

```text
data fetching
state
animation
layout
analytics
validation
```

split responsibilities.

Complexity is often a performance problem as well as a maintenance problem.

---

# 51. Data Fetching

Prefer server-side data fetching for public content.

Avoid client fetching static content after page load.

Bad:

```text
HTML shell
 ↓
client JS
 ↓
fetch service
 ↓
render service
```

when the content is known at build/request time.

---

# 52. Static Generation

Use static generation for content that changes infrequently:

```text
services
case studies
about
team
insights
```

Revalidate or rebuild when content changes.

---

# 53. Dynamic Rendering

Use dynamic rendering only when the page genuinely depends on:

```text
request-time data
personalization
authenticated state
fresh external information
```

Do not make every route dynamic by default.

---

# 54. Caching

Use framework-native caching and revalidation where appropriate.

Avoid introducing:

```text
Redis
custom cache server
external cache layer
```

until real requirements exist.

---

# 55. API Performance

API endpoints should:

- validate early
- reject oversized input
- avoid unnecessary downstream calls
- return minimal payloads
- handle timeouts

---

# 56. Contact Form Performance

The contact form should not require a huge client-side bundle.

Prefer:

```text
small form component
+
server validation
+
minimal interaction
```

---

# 57. Form Submission UX

Submission should feel immediate without faking completion.

Use:

```text
Submitting...
```

then actual success/error state.

Do not add artificial delays to make an animation look polished.

---

# 58. Navigation Performance

Navigation should feel instant.

Avoid making menu opening depend on:

```text
network request
large JS bundle
external library initialization
```

---

# 59. Mobile Network Strategy

Test under realistic constrained conditions.

At minimum, evaluate:

```text
fast Wi-Fi
normal 4G
slow/high-latency mobile connection
```

The website should still reveal useful content early.

---

# 60. Offline/Failure Resilience

A full offline web app is not required.

But graceful failure matters.

If an optional asset fails:

```text
content remains usable
```

If a non-critical third-party service fails:

```text
core website remains usable
```

---

# 61. Preloading

Preload only resources that are:

- critical
- known
- immediately required

Over-preloading causes competition for bandwidth.

---

# 62. Prefetching

Framework prefetching can improve navigation.

But do not aggressively prefetch huge numbers of pages or resources that users are unlikely to visit.

---

# 63. Link Prefetch Strategy

For high-traffic navigation paths, normal framework behaviour may be sufficient.

Tune or disable prefetching only after measuring actual network impact.

---

# 64. Caching Headers

Production deployment should provide appropriate cache behaviour for:

```text
static assets
images
fonts
immutable hashed files
HTML
API responses
```

Do not cache dynamic/private data publicly.

---

# 65. Asset Fingerprinting

Production assets should use stable cache-busting/hashing mechanisms provided by the build system.

Do not manually append random query strings.

---

# 66. Compression

Production responses should use modern compression where supported.

Verify:

```text
HTML
CSS
JS
JSON
SVG
```

are efficiently transferred.

---

# 67. HTTP Strategy

Deployment should support modern HTTP behaviour where available.

Performance work should focus on:

```text
request count
payload size
latency
render blocking
```

rather than assuming a particular protocol solves everything.

---

# 68. CDN

A CDN is useful for global asset delivery.

Use the deployment platform's CDN where appropriate.

Do not introduce a separate CDN architecture unless there is a real requirement.

---

# 69. Server Location

Choose deployment infrastructure that provides reasonable latency for actual users.

Do not optimize infrastructure for hypothetical global traffic before traffic exists.

---

# 70. Lighthouse

Use Lighthouse as one diagnostic tool.

Measure:

```text
Performance
Accessibility
Best Practices
SEO
```

But do not optimize exclusively for synthetic scores.

---

# 71. Real-Device Testing

Test on representative devices:

```text
modern desktop
mid-range Android
lower-end Android
iPhone/iOS representative device
```

At least one lower-end mobile device should be part of performance QA.

---

# 72. Browser Performance Testing

Test major browsers:

```text
Chrome
Safari
Firefox
Edge
```

Focus on:

- layout
- animation
- fonts
- forms
- navigation
- responsive behaviour

---

# 73. Performance Profiling

Use browser developer tools to inspect:

```text
CPU
network
memory
rendering
paint
layout
JavaScript tasks
```

When a page feels slow, profile before optimizing.

---

# 74. Measure Before Optimizing

Do not blindly:

```text
memoize everything
lazy-load everything
dynamic-import everything
```

First identify the actual bottleneck.

---

# 75. React Optimization

Do not add:

```text
useMemo
useCallback
memo
```

everywhere.

Use them when:

- rendering is demonstrably expensive
- referential stability matters
- profiling shows a benefit

Premature memoization increases complexity.

---

# 76. State Updates

Avoid unnecessary state updates during:

```text
scroll
resize
pointer movement
animation
```

Throttle/debounce only where appropriate, and prefer browser APIs that avoid unnecessary event work.

---

# 77. Resize Handling

Prefer CSS responsive behaviour.

Only use JavaScript resize listeners when the behaviour genuinely cannot be expressed through CSS or media/container queries.

---

# 78. Pointer Tracking

Magnetic cursor effects and pointer interactions must be carefully scoped.

Avoid global pointer listeners that run expensive work on every movement.

---

# 79. Cursor Effects

If custom cursor/magnetic effects are implemented:

- desktop only where appropriate
- disabled on touch
- low DOM overhead
- transform-based
- no essential functionality depends on them

---

# 80. Memory Leaks

All subscriptions and effects must clean up:

```text
event listeners
observers
timers
animation contexts
websocket connections
```

A visually correct page that leaks memory is not production-ready.

---

# 81. Animation Cleanup

Every animation library integration must support lifecycle cleanup.

Especially important for:

```text
route transitions
scroll triggers
component unmount
responsive changes
```

---

# 82. Performance Regression Testing

Performance should be measured during major milestones.

Recommended checkpoints:

```text
foundation
homepage
service system
case-study system
all major routes
pre-release
```

---

# 83. Performance Budgets — Suggested Starting Point

Use budgets as warning thresholds, not arbitrary laws.

Track:

```text
Initial client JS       → keep intentionally small
Critical images         → minimize aggressively
Fonts                   → minimal families/weights
Third-party scripts     → only justified services
Long tasks              → investigate
CLS                     → near-zero target
Core Web Vitals         → target "good"
```

Exact byte budgets should be established after the first production build and then enforced based on measured architecture.

---

# 84. Performance QA Checklist

```text
[ ] Production build tested
[ ] Bundle analyzed
[ ] Client components justified
[ ] LCP identified
[ ] Hero optimized
[ ] Images optimized
[ ] Fonts optimized
[ ] CLS checked
[ ] INP checked
[ ] JS execution profiled
[ ] Animation profiled
[ ] Third-party scripts reviewed
[ ] Mobile tested
[ ] Slow network tested
[ ] Low-end device tested
[ ] Browser coverage tested
[ ] Memory leaks checked
[ ] Lighthouse reviewed
[ ] Real-user monitoring planned
```

---

# 85. Performance Anti-Patterns

Never:

- make the whole site client-side without reason
- preload everything
- lazy-load everything
- ship giant hero videos by default
- load ten font weights
- use huge uncompressed images
- animate layout-heavy properties unnecessarily
- attach expensive global scroll listeners
- add libraries for trivial effects
- use giant blur effects everywhere
- optimize only for Lighthouse
- add infrastructure before measuring need
- sacrifice content to achieve a score

---

# 86. Performance Release Gates

A release should not proceed if it introduces a serious regression in:

```text
LCP
INP
CLS
bundle size
mobile usability
navigation responsiveness
```

unless the regression is intentional, measured, documented and approved.

---

# 87. Production Monitoring

After launch, monitor real-user performance where appropriate.

Track:

```text
Core Web Vitals
device class
browser
route
network-related patterns
```

Synthetic tests show controlled conditions.

Real-user data shows actual experience.

Both are useful.

---

# 88. Performance Ownership

Performance should not belong only to the final QA phase.

Every engineer implementing a feature should ask:

```text
What does this add to:
JS?
network?
DOM?
CPU?
GPU?
memory?
```

---

# 89. Definition of Done

Performance architecture is ready when:

- server/client boundaries are enforced
- performance budgets exist
- image strategy exists
- font strategy exists
- Core Web Vitals are measured
- animation performance rules exist
- third-party scripts are controlled
- mobile network testing exists
- real-device testing exists
- bundle analysis exists
- production monitoring is planned
- performance regressions have release gates

---

# 90. Final Principle

**Performance is not about making the website look simple.**

Zytrixon can remain visually sophisticated.

The engineering goal is:

```text
Sophisticated output
+
simple runtime
+
small client footprint
+
fast content delivery
+
controlled visual effects
```

The user should experience the sophistication.

They should not have to pay for it with a slow page.

---

# 91. Status

**Status:** Production performance specification.

**Next document:** `11-security.md`
