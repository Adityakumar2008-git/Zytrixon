# Zytrixon V2 — Accessibility Specification

**Document:** `09-accessibility.md`  
**Project:** Zytrixon Website V2  
**Status:** Production Accessibility Specification  
**Depends on:** `02-product-requirements.md`, `03-information-architecture.md`, `04-design-system.md`, `05-motion-system.md`, `06-architecture.md`, `07-type-system.md`, `08-seo-strategy.md`

---

# 1. Accessibility Objective

Zytrixon V2 must be usable by people with different:

- visual abilities
- motor abilities
- hearing abilities
- cognitive needs
- input methods
- devices
- browser configurations

Accessibility is not a final QA checkbox.

It must be considered during:

```text
content
+
HTML structure
+
component APIs
+
interaction
+
motion
+
visual design
+
forms
```

---

# 2. Target Standard

The implementation should target:

**WCAG 2.2 Level AA**

The goal is practical conformance for the public website.

Where a design decision conflicts with accessibility, accessibility takes priority.

---

# 3. Accessibility Principle

The site should remain understandable and usable when:

```text
JavaScript is slow
animation is disabled
keyboard is used
screen reader is used
zoom is increased
contrast is increased
pointer input is unavailable
```

The visual experience may be enhanced, but the underlying experience must remain functional.

---

# 4. Semantic HTML First

Use native HTML elements whenever possible.

Prefer:

```html
<button>
<a>
<nav>
<header>
<main>
<section>
<article>
<form>
<label>
```

over generic:

```html
<div>
<span>
```

with manually recreated behaviour.

---

# 5. Buttons vs Links

Use a:

```html
<a>
```

when the action navigates.

Use a:

```html
<button>
```

when the action changes state or performs an action.

Examples:

```text
View Case Study → link
Open Menu → button
Submit Form → button
Toggle FAQ → button
```

Do not use clickable `<div>` elements.

---

# 6. Landmark Structure

Pages should provide clear landmarks:

```text
header
nav
main
footer
```

Where useful:

```text
aside
```

may identify supporting navigation/content.

Avoid multiple unlabeled landmarks that confuse screen-reader navigation.

---

# 7. Main Landmark

Every primary page should have one clear main content region.

Example:

```html
<main id="main-content">
  ...
</main>
```

---

# 8. Skip Navigation

Provide a keyboard-accessible skip link:

```text
Skip to main content
```

It should become visible when focused.

This is particularly important because Zytrixon's navigation may be visually prominent and complex.

---

# 9. Heading Hierarchy

Maintain semantic hierarchy:

```text
H1
 ├── H2
 │    ├── H3
 │    └── H3
 └── H2
```

Do not skip levels purely for visual appearance.

CSS controls visual scale.

HTML controls document hierarchy.

---

# 10. One Primary H1

Each page should have one clear primary heading.

The heading should describe the page purpose.

Avoid using decorative headings as the only semantic identifier.

---

# 11. Navigation Accessibility

Navigation must work with:

```text
keyboard
mouse
touch
screen reader
```

Desktop mega-navigation, if implemented, must not require hover alone.

---

# 12. Keyboard Navigation

Every interactive element must be reachable using the keyboard.

Typical order:

```text
Skip link
→ navigation
→ main content
→ footer
```

No interaction should become inaccessible because a user cannot use a mouse.

---

# 13. Focus Visibility

Focused elements must have a clearly visible focus indicator.

Do not remove browser focus outlines without replacing them with an equally clear accessible state.

Bad:

```css
outline: none;
```

without an alternative.

---

# 14. Focus Contrast

Focus indicators must remain visible against surrounding backgrounds.

This is especially important on:

- dark sections
- image backgrounds
- hover-heavy buttons
- technical visualizations

---

# 15. Focus Order

DOM order should generally match visual reading and interaction order.

Do not use:

```text
positive tabindex values
```

to force arbitrary navigation order.

Avoid:

```html
tabindex="5"
```

and similar patterns.

---

# 16. Tabindex Rule

Use:

```text
tabindex="0"
```

only when a custom interactive element genuinely requires keyboard focus.

Use:

```text
tabindex="-1"
```

for programmatic focus targets that should not enter normal tab order.

Prefer native interactive elements whenever possible.

---

# 17. Mobile Menu

The mobile menu must support:

```text
open
close
keyboard navigation
screen readers
focus management
Escape
```

When opened:

- focus should move into the menu appropriately
- background interaction should not create confusing keyboard paths
- Escape should close it
- focus should return to the trigger when closed

---

# 18. Menu Button Semantics

A menu trigger should communicate state.

Use:

```html
<button
  aria-expanded="false"
  aria-controls="mobile-navigation"
>
```

The values must update correctly.

Do not hardcode `aria-expanded="false"`.

---

# 19. Dialogs / Overlays

If a true modal dialog is used:

```text
open
→ move focus inside
→ trap focus appropriately
→ close with Escape
→ restore focus
```

Do not create fake modals using arbitrary positioned `<div>` elements without proper semantics.

---

# 20. Drawer Accessibility

Mobile navigation drawers and similar overlays should follow dialog/focus-management principles where they behave like modal interfaces.

Background content should not remain accidentally interactive if the drawer is modal.

---

# 21. Accordions

FAQ accordions should use real buttons.

Example structure:

```text
button
  ↓
panel
```

The button should expose expanded/collapsed state.

Keyboard interaction must work naturally.

---

# 22. Tabs

If tabs are used:

- use appropriate ARIA tab semantics only when behaviour truly matches tabs
- support keyboard navigation
- maintain selected state
- expose associated panels
- preserve sensible focus behaviour

Do not use tab semantics for a simple set of links.

---

# 23. Carousels

Avoid unnecessary carousels.

If a carousel exists:

- controls must be keyboard accessible
- slides must have meaningful labels
- autoplay must be controllable
- motion must respect reduced-motion settings
- hidden slides should not create confusing screen-reader output

---

# 24. Auto-Rotating Content

Avoid automatic rotation for critical information.

If rotation is used:

```text
pause
previous
next
```

controls should be available where appropriate.

---

# 25. Hover Dependency

No essential content or interaction may depend solely on hover.

Everything important should have an equivalent:

```text
keyboard
focus
touch
```

interaction.

---

# 26. Pointer Target Size

Interactive controls should provide sufficiently large usable target areas.

Small visual icons should have larger clickable/focusable hit areas.

Do not make a tiny 12px icon the only clickable target for an important action.

---

# 27. Touch Accessibility

Touch interfaces must avoid:

- tiny targets
- accidental adjacent controls
- hover-only states
- gestures with no alternative

Do not require complex gestures for essential functionality.

---

# 28. Color Contrast

Text and controls must meet appropriate WCAG AA contrast requirements.

Pay special attention to:

```text
muted text
metadata
technical labels
placeholder text
text over imagery
thin typography
dark-mode elements
```

---

# 29. Do Not Use Color Alone

Do not communicate state only through color.

Bad:

```text
red = error
green = success
```

without another signal.

Use:

```text
icon
text
status
```

where appropriate.

---

# 30. Link Identification

Links should be identifiable without relying exclusively on hover.

The design system may use other visual treatments, but users must be able to distinguish links from surrounding text.

---

# 31. Disabled Controls

Disabled controls should be visually distinguishable while remaining understandable.

Do not make disabled state so low-contrast that users cannot tell what the control is.

---

# 32. Typography Accessibility

Do not use extremely small body text.

Avoid overly compressed line heights.

Readable text should have:

- appropriate size
- adequate line height
- reasonable line length
- sufficient contrast

---

# 33. Text Resizing

The site should remain usable when text is significantly enlarged.

Layouts must not:

- clip text
- hide buttons
- overlap content
- create inaccessible horizontal scrolling

---

# 34. Browser Zoom

Test at:

```text
100%
200%
```

and where practical higher zoom levels.

Important functionality must remain usable.

---

# 35. Reflow

The site should support narrow viewport/reflow conditions without forcing users to understand a complex desktop layout.

Avoid unnecessary fixed-width content.

---

# 36. Horizontal Scrolling

Avoid page-wide horizontal scrolling.

Exceptions may exist for genuinely two-dimensional content such as:

```text
data tables
technical diagrams
```

Even then, provide usable alternatives.

---

# 37. Images

Every meaningful image needs appropriate alternative text.

Ask:

> What information does this image provide?

Then describe that information.

---

# 38. Decorative Images

Decorative images should not create unnecessary screen-reader noise.

Use empty alt text where appropriate:

```html
alt=""
```

Do not describe purely decorative backgrounds as if they contain information.

---

# 39. Complex Diagrams

Technical architecture diagrams and IoT visualizations may contain significant information.

Provide:

```text
accessible summary
+
text explanation
```

where the visual itself cannot be fully understood non-visually.

---

# 40. Image Text

Avoid placing important information inside images.

If text must appear inside an image, the same information should be available as actual HTML text.

---

# 41. SVG Accessibility

Decorative SVGs should not accidentally become noisy screen-reader content.

Informative SVGs need appropriate accessible naming/description.

Do not make decorative icons focusable.

---

# 42. Icon-Only Buttons

Every icon-only button must have an accessible name.

Example:

```tsx
<IconButton label="Open navigation" />
```

The visual icon alone is not sufficient.

---

# 43. Tooltips

Tooltips should not be the only source of essential information.

Keyboard users must be able to access tooltip content where appropriate.

Do not create inaccessible hover-only tooltips.

---

# 44. Forms

Forms must have:

```text
labels
instructions where necessary
validation
error identification
success feedback
keyboard support
```

---

# 45. Form Labels

Every form control should have an associated label.

Prefer:

```html
<label htmlFor="email">Email</label>
<input id="email" ... />
```

Do not rely on placeholder text as the label.

---

# 46. Placeholder Text

Placeholders should provide examples or hints, not replace labels.

Bad:

```text
placeholder="Email"
```

with no label.

Better:

```text
label="Work email"
placeholder="name@company.com"
```

---

# 47. Required Fields

Required fields must be communicated accessibly.

Visual:

```text
*
```

alone is not enough.

The field semantics should also communicate required status.

---

# 48. Validation

Validation errors should:

- identify the field
- explain the problem
- suggest correction where useful
- remain visible
- be announced appropriately for assistive technology

---

# 49. Error Summary

For complex forms, consider an error summary that helps users understand:

```text
what failed
where it failed
how to fix it
```

The summary should support keyboard navigation to affected fields.

---

# 50. Error Styling

Errors must not rely only on:

```text
red border
```

Use:

```text
text message
+
appropriate semantic state
+
visual indication
```

---

# 51. Form Submission

After successful submission:

- clearly communicate success
- prevent duplicate submissions
- preserve useful user context
- avoid unexpectedly moving focus without reason

If the page changes significantly, focus should move appropriately.

---

# 52. Loading State

Loading state must be communicated in more than purely visual animation.

Example:

```text
Submitting...
```

should be available to assistive technology when appropriate.

---

# 53. Motion and Accessibility

All major motion must respect:

```text
prefers-reduced-motion
```

See `05-motion-system.md`.

---

# 54. Reduced Motion

When reduced motion is requested:

- remove non-essential movement
- reduce parallax
- disable aggressive transitions
- avoid large entrance animations
- avoid auto-moving content where possible

The website should remain visually coherent.

---

# 55. Motion Safety

Avoid:

- rapid flashing
- intense strobing
- repeated large-scale movement
- motion that makes content difficult to read

---

# 56. Scroll Effects

Scroll-driven effects should never determine whether content is accessible.

If JavaScript fails or motion is disabled:

```text
content still exists
content still appears
navigation still works
```

---

# 57. Video

If video is used:

- provide captions when speech exists
- provide controls
- avoid autoplay with sound
- provide meaningful poster imagery
- respect reduced-motion/user preferences where relevant

---

# 58. Audio

Do not autoplay audio.

Users should intentionally start audio.

---

# 59. Language

The document language must be correctly declared.

Example:

```html
<html lang="en">
```

If multilingual content is introduced, individual language changes should be marked appropriately.

---

# 60. Reading Order

The DOM should follow logical reading order.

Do not rely on CSS positioning to make content appear in a different conceptual order from the HTML.

---

# 61. CSS Visual Reordering

Avoid using:

```css
order
```

to radically change the semantic sequence.

If visual and semantic order differ, verify screen-reader and keyboard behaviour.

---

# 62. Tables

If real data tables are used:

- use semantic table markup
- identify headers
- maintain logical associations
- provide accessible captions where useful

Do not build data tables entirely from generic `<div>` elements.

---

# 63. Technical Data Visualizations

If Zytrixon uses:

```text
IoT dashboards
architecture diagrams
charts
estimators
```

provide a text alternative for essential information.

The visual can communicate patterns, but the information must remain accessible.

---

# 64. Dynamic Content

When content updates without navigation, consider whether assistive technology needs to be informed.

Examples:

```text
form success
form errors
calculator result
filter result count
```

Use live regions carefully.

Do not make the entire page a live region.

---

# 65. ARIA Rule

**First rule of ARIA: use native HTML when possible.**

Do not add ARIA attributes simply because they look professional.

Incorrect ARIA can make accessibility worse.

---

# 66. ARIA Validation

Every ARIA attribute should answer:

```text
What user problem does this solve?
```

If the answer is unclear, remove it.

---

# 67. Screen Reader Testing

Test important flows with at least one mainstream screen reader during QA.

Verify:

```text
navigation
headings
links
buttons
forms
errors
dialogs
dynamic content
```

---

# 68. Keyboard Testing

Perform full keyboard-only testing.

Use:

```text
Tab
Shift + Tab
Enter
Space
Escape
Arrow keys
```

where appropriate.

Check that users never become trapped unexpectedly.

---

# 69. Focus Trap Testing

Test:

```text
mobile menu
dialogs
drawers
modals
```

for correct focus trapping/restoration.

---

# 70. Automated Accessibility Testing

Use automated tools during development/QA.

Possible tooling:

```text
axe
Lighthouse accessibility
Playwright accessibility checks
browser accessibility trees
```

Automated tools are useful but cannot prove full accessibility.

---

# 71. Manual Accessibility Testing

Automated testing cannot reliably detect:

- poor copy
- confusing focus order
- misleading labels
- bad interaction models
- inadequate alternatives
- cognitive complexity

Human review remains required.

---

# 72. Accessibility Component Contract

Reusable components should encode accessibility requirements.

Example:

```ts
interface IconButtonProps {
  label: string;
  icon: ReactNode;
  onClick: () => void;
}
```

Do not make accessible names optional for controls that require them.

---

# 73. Accessible Navigation Component Contract

Navigation components should own:

```text
aria-expanded
aria-controls
focus behaviour
Escape handling
```

rather than forcing every page to implement these separately.

---

# 74. Accessible Form Component Contract

Form components should consistently support:

```text
label
description
required
error
id
aria-describedby
aria-invalid
```

where applicable.

---

# 75. Accessibility and Design Tokens

Accessibility-related values should be considered part of the design system:

```text
focus ring
minimum readable text
contrast-safe text colours
interactive target size
motion reduction
```

Do not let each component invent its own accessibility treatment.

---

# 76. Accessibility and Dark Mode

If dark/light themes are supported:

- contrast must be checked in both
- focus indicators must work in both
- disabled states must remain understandable
- imagery must not destroy text readability

Do not assume a palette that looks good is automatically accessible.

---

# 77. Accessibility and Technical Aesthetic

Zytrixon's technical/editorial visual language should remain.

Accessibility does **not** mean making the website visually generic.

The correct goal is:

```text
strong visual identity
+
semantic HTML
+
clear interaction
+
inclusive usability
```

---

# 78. Accessibility and Animation

Animation is enhancement.

Never make:

```text
content visibility
navigation
form feedback
state understanding
```

dependent on animation.

---

# 79. Accessibility and Performance

Accessibility and performance often reinforce each other.

Prefer:

- semantic HTML
- fewer scripts
- fewer client components
- optimized assets
- stable layouts

Avoid large client-side libraries for simple interactions.

---

# 80. Accessibility QA Matrix

Test representative routes:

```text
Homepage
Service page
Case study
About
Team
Careers
Insight
Contact
404
```

Across:

```text
desktop
mobile
keyboard
screen reader
zoom
reduced motion
```

---

# 81. Accessibility Release Checklist

```text
[ ] WCAG 2.2 AA target reviewed
[ ] Semantic HTML
[ ] One main landmark
[ ] Skip link
[ ] Heading hierarchy
[ ] Keyboard navigation
[ ] Visible focus
[ ] Mobile menu accessible
[ ] Dialogs accessible
[ ] No hover-only functionality
[ ] Touch targets checked
[ ] Contrast checked
[ ] Color not used alone
[ ] Images have appropriate alt
[ ] Decorative images hidden appropriately
[ ] Forms have labels
[ ] Required states exposed
[ ] Errors accessible
[ ] Success feedback accessible
[ ] Reduced motion supported
[ ] No problematic flashing
[ ] Screen-reader test
[ ] Keyboard-only test
[ ] Automated accessibility scan
```

---

# 82. Accessibility Anti-Patterns

Never:

- remove focus outlines without replacement
- use clickable divs
- rely on hover
- use placeholder as a label
- communicate errors only with color
- create inaccessible custom controls
- trap keyboard users accidentally
- hide important information inside animation
- autoplay audio
- use ARIA unnecessarily
- make tiny icon buttons
- build navigation that requires a mouse
- ignore reduced motion
- assume automated audits prove accessibility

---

# 83. Definition of Done

Accessibility is ready when:

- core pages work without a mouse
- keyboard focus is visible
- navigation has correct semantics
- mobile navigation is accessible
- forms have proper labels/errors
- interactive controls have accessible names
- reduced motion is supported
- important visuals have text alternatives
- semantic heading hierarchy is correct
- contrast has been checked
- screen-reader testing has occurred
- automated testing has been run
- accessibility issues found during QA are resolved or documented

---

# 84. Final Principle

**Accessibility should disappear into good engineering.**

A user should not need to know that the website was "made accessible."

They should simply be able to:

```text
understand it
navigate it
operate it
read it
submit forms
consume content
```

regardless of how they interact with the web.

---

# 85. Status

**Status:** Production accessibility specification.

**Next document:** `10-performance.md`
