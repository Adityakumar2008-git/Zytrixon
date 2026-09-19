# Zytrixon V2 — Product Requirements Document

**Document:** `02-product-requirements.md`  
**Project:** Zytrixon Website V2  
**Status:** Working PRD / Pre-Implementation  
**Depends on:** `00-current-site-audit.md`, `01-brand-strategy.md`

---

# 1. Product Definition

## Product Name

**Zytrixon Website V2**

## Product Type

Production-grade corporate website and business lead-generation platform for Zytrixon.

## Primary Purpose

The website must communicate Zytrixon's capabilities, credibility, engineering maturity and business value while converting qualified visitors into business conversations.

The website is not merely a marketing brochure.

It is a digital product responsible for:

- positioning
- education
- proof
- trust
- lead generation
- recruitment support
- discoverability
- company representation

---

# 2. Product Vision

> **Create the most credible digital representation of Zytrixon's engineering, business and automation capabilities — without losing the identity of the existing website.**

The website should feel:

- engineered
- deliberate
- technically capable
- commercially useful
- modern
- distinctive
- fast
- trustworthy

It should not feel like a generic template or AI-generated agency website.

---

# 3. Primary Business Goals

## Goal 01 — Generate Qualified Leads

The primary conversion objective is to make it easy for a potential client to start a meaningful conversation with Zytrixon.

Success signals:

- contact submissions
- project enquiries
- consultation requests
- WhatsApp conversations
- qualified leads

---

## Goal 02 — Improve Brand Positioning

The website should establish Zytrixon as more than a software development vendor.

It should communicate the relationship between:

```text
Strategy
→ Software
→ Integration
→ Automation
→ Growth
```

---

## Goal 03 — Demonstrate Engineering Capability

Visitors should be able to understand that Zytrixon can build real systems.

Evidence should include:

- case studies
- product interfaces
- architecture where useful
- technical capabilities
- development process
- genuine technologies
- real team expertise

---

## Goal 04 — Explain the Expanded Service Portfolio

The new service structure must clearly communicate:

1. Custom Software
2. Web & Mobile Applications
3. Business Strategy
4. Business Consulting
5. Social Media
6. Performance / Digital Marketing
7. AI Automation
8. Chatbot Integration
9. Payment Gateway Integration
10. WhatsApp API

The final service hierarchy is subject to business validation.

---

## Goal 05 — Support Organic Discovery

Important services and case studies should have crawlable, indexable pages with:

- meaningful URLs
- unique titles
- useful content
- internal linking
- structured data
- metadata
- fast rendering

SEO must support the product rather than produce filler content.

---

## Goal 06 — Support Recruitment

The website should communicate enough company identity and technical depth to support hiring.

Potential recruitment visitors should be able to discover:

- company culture
- team
- roles
- technical environment
- careers
- contact/recruitment path

---

# 4. Secondary Goals

The website should also:

- provide company information
- communicate geographic presence where verified
- provide company contact information
- showcase insights
- support future products/SaaS
- provide a credible reference for sales conversations
- allow visitors to understand the delivery process

---

# 5. Non-Goals

V2 should not attempt to become:

- a full CRM
- a marketing automation platform
- a client portal
- a SaaS application
- a complete recruitment platform
- an ecommerce platform
- a social network

Unless explicitly added as a later product requirement.

---

# 6. Target Users

## Persona A — Business Owner / Founder

### Needs

- business clarity
- reliable technology partner
- predictable execution
- operational improvement
- growth

### Website questions

> Can these people understand my problem?

> Can they actually build the solution?

> Can I trust them?

> How do I contact them?

---

## Persona B — Operations / Business Manager

### Needs

- automation
- internal software
- integrations
- reporting
- workflow efficiency

### Website questions

> Can they integrate with our existing systems?

> Can they automate repetitive operations?

---

## Persona C — Marketing Decision Maker

### Needs

- customer acquisition
- social media
- performance marketing
- lead generation
- WhatsApp
- CRM integration

### Website questions

> Can they connect marketing activity to actual business outcomes?

---

## Persona D — Technical Decision Maker

### Needs

- architecture
- scalability
- security
- maintainability
- integrations
- technical competency

### Website questions

> Can their engineering team handle production systems?

> Do they understand architecture rather than just frontend development?

---

## Persona E — Job Candidate

### Needs

- company credibility
- technology environment
- team
- open roles
- culture

### Website questions

> Is Zytrixon a serious technical organization?

---

# 7. Core User Journeys

## Journey 01 — General Client

```text
Landing
 ↓
Understand Zytrixon
 ↓
Explore capabilities
 ↓
View proof / case studies
 ↓
Evaluate process
 ↓
Contact
 ↓
Lead
```

---

## Journey 02 — Service Search

```text
Search Engine
 ↓
Specific Service Page
 ↓
Problem / Solution
 ↓
Capabilities
 ↓
Relevant Work
 ↓
CTA
 ↓
Contact
```

---

## Journey 03 — Portfolio-Driven

```text
Landing
 ↓
Selected Work
 ↓
Case Study
 ↓
Technology / Capability
 ↓
Related Service
 ↓
Contact
```

---

## Journey 04 — Business Problem

A visitor may not know which service they need.

Example:

> "Our sales team gets hundreds of WhatsApp enquiries and manually follows up."

The website should allow them to discover:

```text
Business Problem
 ↓
WhatsApp API
 ↓
Chatbot
 ↓
AI Automation
 ↓
CRM Integration
```

The visitor should not need to understand Zytrixon's internal service taxonomy before getting value.

---

## Journey 05 — Recruitment

```text
Homepage
 ↓
Team / Careers
 ↓
Role
 ↓
Requirements
 ↓
Application / Contact
```

---

# 8. Product Information Architecture

Initial structure:

```text
/
├── Home
│
├── Services
│   ├── Custom Software
│   ├── Web & Mobile Applications
│   ├── Business Strategy
│   ├── Business Consulting
│   ├── Social Media
│   ├── Performance / Digital Marketing
│   ├── AI Automation
│   ├── Chatbot Integration
│   ├── Payment Gateway Integration
│   └── WhatsApp API
│
├── Work
│   ├── Project / Case Study 01
│   ├── Project / Case Study 02
│   └── Project / Case Study 03
│
├── About
├── Team
├── Careers
├── Insights
└── Contact
```

This is a starting architecture.

Final URL structure will be determined in `03-information-architecture.md`.

---

# 9. Homepage Requirements

The homepage must establish the company and guide visitors toward proof and conversion.

## Required information

The homepage should communicate:

- what Zytrixon is
- what problems it solves
- core capabilities
- selected work
- engineering approach
- credibility
- team/company identity
- CTA/contact

---

## Homepage narrative

Working sequence:

```text
01 — Identity
02 — Business Problem / Positioning
03 — Capabilities
04 — Selected Work
05 — Engineering Approach
06 — Business / Technical Credibility
07 — Team / Company
08 — Final Conversion
```

The exact visual composition belongs to the design phase.

---

# 10. Services Requirements

The service system must support:

- service discovery
- category grouping
- individual service pages
- related services
- related case studies
- relevant technologies
- conversion CTA

Every service page should explain:

```text
Problem
 ↓
Who it is for
 ↓
Solution
 ↓
Capabilities
 ↓
Process
 ↓
Technology / Integrations
 ↓
Proof
 ↓
CTA
```

---

# 11. Work / Case Study Requirements

Every case study should support structured content.

Minimum model:

```text
Project
Industry
Client
Summary
Problem
Approach
Solution
Capabilities
Technology
Screenshots
Results
Related Services
```

Optional:

- architecture
- timeline
- team contribution
- integrations
- constraints
- lessons learned

No fabricated metrics.

---

# 12. About Requirements

The About page should explain:

- Zytrixon's identity
- mission
- approach
- capabilities
- company story
- leadership
- operating philosophy

Avoid writing a generic corporate history.

---

# 13. Team Requirements

Team pages should support:

- name
- role
- photo
- short bio
- expertise
- professional links where approved

The system must allow the team to be updated without modifying multiple UI components.

---

# 14. Careers Requirements

Careers should support:

- company introduction
- open roles
- role details
- requirements
- location/work model
- application CTA

The system should allow an individual role to be shared via URL.

---

# 15. Insights Requirements

If the blog/insights section remains active, it should support:

- article listing
- article detail pages
- author
- publication date
- categories/tags
- reading time
- related articles
- SEO metadata

Do not create a blog simply because corporate websites are expected to have one.

If the company does not maintain it, it should not become a neglected section.

---

# 16. Contact Requirements

The contact experience is a core product feature.

## Required fields

Initial proposal:

- Name
- Work email
- Phone / WhatsApp
- Company
- Service / requirement
- Budget range
- Project description
- Preferred contact method

Fields should be reduced if they create unnecessary friction.

---

## Contact paths

Potential paths:

- Form
- Email
- WhatsApp
- Phone

The actual destinations must be supplied by Zytrixon.

---

# 17. Project Qualification

The contact flow should gather enough information to qualify a lead without becoming a 25-question questionnaire.

Potential qualification dimensions:

- requirement type
- business/industry
- estimated budget
- timeline
- current problem
- existing system
- preferred contact method

---

# 18. Form Behaviour

The form must support:

### Loading

Clear submission state.

### Success

Confirmation that explains what happens next.

### Failure

Human-readable error.

### Validation

Inline field-level validation.

### Spam protection

Server-side protection.

### Rate limiting

Prevent abuse.

No sensitive form data should be exposed to client-side logs.

---

# 19. Navigation Requirements

Desktop navigation must:

- expose primary areas
- remain visually consistent with Zytrixon's existing identity
- allow fast access to services/work/contact
- support service grouping
- avoid excessive menu complexity

Mobile navigation must:

- be touch-friendly
- be keyboard accessible
- trap focus when modal/drawer based
- provide clear close behaviour
- not depend on hover

---

# 20. Search

A site-wide search is **not mandatory for V2**.

It should only be added if the amount of content makes it genuinely useful.

If implemented, it should search:

- services
- case studies
- insights

---

# 21. Visual Interaction Requirements

Interactions should be purposeful.

Potential interaction classes:

- text reveals
- section transitions
- hover states
- service exploration
- case-study transitions
- process visualization
- navigation transitions
- subtle scroll choreography

No interaction should make important information inaccessible.

---

# 22. Responsive Requirements

Supported layout categories:

### Mobile

Approx. 320–767px

### Tablet

Approx. 768–1199px

### Desktop

1200px+

### Large Desktop

1600px+

Exact breakpoints should be defined in the design system.

Every major component must have explicit responsive behaviour.

---

# 23. Accessibility Requirements

Minimum:

- semantic HTML
- keyboard navigation
- visible focus
- accessible labels
- logical heading structure
- contrast compliance
- reduced-motion support
- alt text
- accessible error messages
- usable touch targets

Target should be a strong WCAG 2.2 AA implementation where applicable.

---

# 24. SEO Requirements

Each indexable page should have:

- unique title
- unique description
- canonical URL
- Open Graph data
- relevant heading structure
- structured data where applicable
- internal links
- crawlable content

Technical requirements:

- sitemap
- robots
- clean URLs
- redirects
- 404 page
- metadata generation

---

# 25. Performance Requirements

Performance is a product requirement.

The implementation should optimize:

- LCP
- CLS
- INP
- TTFB
- JavaScript
- images
- fonts
- animation
- third-party scripts

The site should remain usable on mid-range mobile hardware and slower network conditions.

---

# 26. Security Requirements

The website must protect:

- form endpoints
- API routes
- environment variables
- webhook endpoints
- user-submitted data

Minimum measures:

- server-side validation
- rate limiting
- spam protection
- secure headers where appropriate
- secret isolation
- output escaping / safe rendering
- dependency updates

---

# 27. Analytics Requirements

Analytics should measure business outcomes rather than vanity metrics.

Potential events:

```text
contact_form_started
contact_form_submitted
whatsapp_clicked
email_clicked
phone_clicked
service_viewed
case_study_viewed
careers_viewed
job_viewed
cta_clicked
```

Analytics provider must be selected before production launch.

---

# 28. Content Management

V2 should separate content from presentation.

Content entities should include:

```text
Services
Projects
Team Members
Testimonials
FAQs
Insights
Jobs
Navigation
Site Settings
```

The first production version may use typed local content if the content volume is manageable.

A CMS should only be introduced when it provides real operational value.

---

# 29. Data Source of Truth

Company statistics must have a single source.

Examples:

```text
projectsCompleted
countriesServed
teamSize
clientsServed
yearsOperating
```

Components must consume these values rather than independently hard-coding numbers.

Before publication, every metric must be verified by the company.

---

# 30. Functional Requirements

## FR-01

Users must be able to navigate all primary website sections.

## FR-02

Users must be able to explore services by category.

## FR-03

Users must be able to open individual service pages.

## FR-04

Users must be able to explore case studies.

## FR-05

Users must be able to contact Zytrixon.

## FR-06

Users must receive clear form success/error states.

## FR-07

Users must be able to access the site on mobile.

## FR-08

Users must be able to navigate the website using a keyboard.

## FR-09

Search engines must be able to crawl intended public pages.

## FR-10

The site must provide a useful 404 page.

## FR-11

Team/careers content must be maintainable without duplicating UI logic.

## FR-12

Analytics must capture defined conversion events.

---

# 31. Non-Functional Requirements

## NFR-01 — Performance

The site must be optimized for fast loading and interaction.

## NFR-02 — Accessibility

The site must meet the defined accessibility baseline.

## NFR-03 — Security

Public endpoints must be protected against common abuse.

## NFR-04 — Maintainability

The codebase must use reusable components and typed content.

## NFR-05 — Scalability

The architecture must allow additional services, projects and pages without major rewrites.

## NFR-06 — SEO

Page metadata and structured data must be generated systematically.

## NFR-07 — Reliability

Production failures must have appropriate monitoring and fallback behaviour.

---

# 32. Content Rules

The production website must never contain:

- placeholder lorem ipsum
- fake metrics
- fake testimonials
- fake client logos
- invented case-study results
- unsupported technology claims
- fabricated employee information

Temporary placeholders may exist during development but must be tracked and removed before release.

---

# 33. Design Constraints

The website must retain Zytrixon's existing identity.

### Avoid

- generic AI agency aesthetics
- excessive glassmorphism
- meaningless 3D objects
- excessive gradients
- stock corporate photography
- over-rounded component libraries
- decorative animation without purpose
- generic SaaS layouts

### Encourage

- strong typography
- technical visual language
- structured layouts
- editorial composition
- meaningful interaction
- real product visuals
- engineering diagrams
- evidence-based storytelling
- restrained but sophisticated motion

---

# 34. Browser Support

Initial support target:

- latest Chrome
- latest Edge
- latest Firefox
- latest Safari
- modern Android browsers
- modern iOS Safari

Graceful degradation is required for unsupported advanced effects.

Core content and functionality must not depend on advanced animation APIs.

---

# 35. Error Handling

Required states:

- 404
- form failure
- API failure
- network failure
- missing image
- missing content
- invalid route
- unavailable service content

Errors should be understandable to users and useful for developers through appropriate logging.

---

# 36. Definition of Done — Feature Level

A feature is not complete until:

- TypeScript passes
- lint passes
- production build passes
- desktop behaviour works
- mobile behaviour works
- keyboard navigation works where relevant
- loading/error states exist where relevant
- accessibility has been considered
- no console errors remain
- visual design matches the design system
- content is verified
- unnecessary dependencies have not been added

---

# 37. Definition of Done — Website Level

The website is production-ready when:

- all approved pages are complete
- all public content is verified
- all company statistics are verified
- all primary forms work
- analytics work
- SEO metadata works
- sitemap/robots work
- 404 works
- responsive QA is complete
- accessibility QA is complete
- performance QA is complete
- security review is complete
- production build is stable
- domain/DNS is configured
- monitoring is configured
- rollback/deployment process is documented

---

# 38. Release Priorities

## P0 — Must Have

- Homepage
- Primary navigation
- Services
- Service detail pages
- Work/case studies
- Contact
- Responsive UI
- SEO foundation
- Accessibility foundation
- Performance foundation
- Production deployment

## P1 — Important

- About
- Team
- Careers
- Insights
- Advanced interactions
- Analytics events
- Enhanced case studies

## P2 — Later

- Site search
- CMS
- advanced personalization
- additional interactive tools
- product/SaaS directory
- advanced lead qualification

---

# 39. MVP Definition

The first release should be considered complete when a visitor can:

```text
Understand Zytrixon
        ↓
Explore what Zytrixon does
        ↓
See credible proof
        ↓
Understand how Zytrixon works
        ↓
Contact Zytrixon
```

The MVP should prioritize **quality and coherence over page count**.

---

# 40. Product Success Metrics

Initial metrics to evaluate after launch:

### Acquisition

- organic traffic
- referral traffic
- direct traffic

### Engagement

- service page engagement
- case-study engagement
- scroll depth where useful

### Conversion

- contact starts
- contact submissions
- WhatsApp clicks
- qualified leads

### Recruitment

- careers visits
- job detail views
- applications

Metrics must be interpreted in business context.

High traffic with zero qualified leads is not necessarily success.

---

# 41. Risks

## Risk 01 — Scope Explosion

Ten services + portfolio + careers + insights + animations can rapidly become a large project.

### Mitigation

Define P0/P1/P2 and build incrementally.

---

## Risk 02 — Over-animation

Advanced motion may damage performance and usability.

### Mitigation

Motion budget + reduced-motion support + performance testing.

---

## Risk 03 — Positioning Confusion

Too many services can make Zytrixon appear unfocused.

### Mitigation

Capability hierarchy and business-problem-driven navigation.

---

## Risk 04 — Fake/Unverified Content

Inconsistent statistics reduce trust.

### Mitigation

Single source of truth + company verification.

---

## Risk 05 — AI-generated Code Sprawl

An AI coding agent may introduce:

- duplicate components
- unnecessary packages
- inconsistent patterns
- dead code
- excessive abstraction

### Mitigation

`CLAUDE.md`, architecture rules, incremental implementation and code review.

---

## Risk 06 — Visual Quality Without Product Quality

A beautiful frontend can still have:

- broken forms
- poor SEO
- slow loading
- accessibility issues
- weak content

### Mitigation

Use the complete Definition of Done.

---

# 42. Dependencies

The following inputs are required before final implementation:

- approved brand strategy
- final service list
- verified company information
- approved statistics
- real team information
- project assets
- project descriptions
- testimonials
- client logo permissions
- contact destinations
- analytics decision
- hosting/deployment decision
- brand assets
- photography
- approved copy

---

# 43. Open Product Decisions

These questions must be resolved before final architecture:

1. What are Zytrixon's top three commercial priorities?
2. Which services are highest revenue?
3. Which services are highest growth priority?
4. Is IoT actively sold?
5. Is digital marketing delivered internally?
6. What is the primary target market?
7. What is the geographic focus?
8. What is the preferred lead/contact channel?
9. Does Zytrixon need a CMS immediately?
10. Is there an active SaaS/product business?
11. Which case studies can be publicly disclosed?
12. Which metrics can be publicly verified?
13. Is the current blog actively maintained?
14. What careers workflow is required?
15. Which analytics platform will be used?

---

# 44. Product Principle

The website must not optimize for:

> **"How many sections can we put on the homepage?"**

It must optimize for:

> **"How quickly can the right visitor understand Zytrixon, trust its capability, and take the next useful action?"**

---

# 45. PRD Status

**Status:** Working product requirements.

This document defines the functional and non-functional requirements for Zytrixon V2.

The next phase is to convert these requirements into a precise information architecture.

**Next document:** `03-information-architecture.md`
