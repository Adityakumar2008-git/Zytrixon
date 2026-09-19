# Zytrixon V2 — Information Architecture

**Document:** `03-information-architecture.md`  
**Project:** Zytrixon Website V2  
**Status:** Working IA / Pre-Design  
**Depends on:** `00-current-site-audit.md`, `01-brand-strategy.md`, `02-product-requirements.md`

---

# 1. Purpose

This document defines how information is organized across the Zytrixon V2 website.

The goal is not to maximize the number of pages.

The goal is to make the right information discoverable through the shortest sensible path while preserving Zytrixon's existing technical/editorial identity.

The architecture must support:

- business visitors
- technical buyers
- potential clients
- recruitment visitors
- search engines
- future services
- future products/SaaS
- future case studies
- future insights

---

# 2. IA Principles

## Principle 01 — Business Problems Before Service Names

A visitor may know:

> "I need to automate WhatsApp enquiries."

They may not know whether they need:

- WhatsApp API
- chatbot
- AI automation
- CRM integration

The IA must allow discovery from the problem as well as from the service.

---

## Principle 02 — Services Must Have Hierarchy

The ten services must not appear as ten unrelated offerings.

They should be organized into meaningful capability groups.

---

## Principle 03 — Proof Must Be Close to Claims

A service claim should be supported by:

- case studies
- demonstrations
- technical information
- testimonials
- verified results

where available.

---

## Principle 04 — Keep Primary Navigation Small

The navigation should expose the most important destinations.

Secondary information should not overload the primary navigation.

---

## Principle 05 — URLs Must Be Predictable

A user should be able to understand a URL without seeing the page.

Examples:

```text
/services/custom-software
/services/ai-automation
/work/school-management-system
```

---

## Principle 06 — Future Expansion Must Not Require a Rewrite

The architecture must support:

- additional services
- additional case studies
- additional products
- additional insights
- additional job openings

through reusable content models.

---

# 3. Proposed Top-Level Sitemap

```text
/
├── services/
├── work/
├── about/
├── team/
├── careers/
├── insights/
└── contact/
```

Potential future area:

```text
/products/
```

This should remain outside the primary navigation until Zytrixon has public-facing products that justify it.

---

# 4. Primary Navigation

Working navigation:

```text
01 / HOME
02 / SERVICES
03 / WORK
04 / ABOUT
05 / TEAM
06 / INSIGHTS
07 / CONTACT
```

### Careers

Careers may either:

1. remain a top-level navigation item, or
2. appear under About / Company, or
3. receive a prominent footer and contextual CTA.

Final choice should depend on recruitment priority.

The existing numbered-navigation character is intentionally retained as a candidate design pattern.

---

# 5. Desktop Navigation Model

Recommended structure:

```text
ZYTRIXON

01 HOME
02 SERVICES
03 WORK
04 ABOUT
05 TEAM
06 INSIGHTS
07 CONTACT

[START A PROJECT]
```

Services should open a structured mega-menu or expandable panel.

The menu should group capabilities rather than list ten unrelated links.

---

# 6. Services Information Architecture

Working hierarchy:

```text
SERVICES
│
├── STRATEGY
│   ├── Business Strategy
│   └── Business Consulting
│
├── BUILD
│   ├── Custom Software
│   └── Web & Mobile Applications
│
├── AUTOMATE
│   ├── AI Automation
│   ├── Chatbot Integration
│   └── WhatsApp API
│
├── GROW
│   ├── Social Media
│   └── Performance / Digital Marketing
│
└── INTEGRATE
    └── Payment Gateway Integration
```

This is a **working taxonomy**.

It must be validated against Zytrixon's actual commercial priorities before final launch.

---

# 7. Service URLs

Recommended URL structure:

```text
/services/business-strategy
/services/business-consulting
/services/custom-software
/services/web-mobile-applications
/services/social-media
/services/performance-digital-marketing
/services/ai-automation
/services/chatbot-integration
/services/payment-gateway-integration
/services/whatsapp-api
```

Alternative shorter slugs may be selected if SEO research supports them.

Avoid changing URLs after launch without a redirect strategy.

---

# 8. Service Landing Page

URL:

```text
/services
```

Purpose:

Provide an overview of Zytrixon's capabilities and help visitors identify the right direction.

Recommended structure:

```text
Service positioning
        ↓
Capability groups
        ↓
Individual services
        ↓
Business problems
        ↓
Selected proof
        ↓
How Zytrixon works
        ↓
CTA
```

The page should not simply repeat the content of every individual service page.

---

# 9. Individual Service Page Architecture

Every service page should follow a consistent information model while allowing service-specific experiences.

Base structure:

```text
01 / HERO
02 / PROBLEM
03 / SOLUTION
04 / CAPABILITIES
05 / HOW IT WORKS
06 / TECHNOLOGY / INTEGRATIONS
07 / PROOF / CASE STUDIES
08 / FAQ
09 / CTA
```

Not every service needs every section.

The content model should remain flexible.

---

# 10. Service Page: Custom Software

Recommended route:

```text
/services/custom-software
```

Information:

```text
Hero
Business problems
Types of systems
Capabilities
Architecture
Security / scalability
Technology
Relevant work
Process
FAQ
CTA
```

Potential system categories:

- ERP
- CRM
- internal tools
- dashboards
- workflow systems
- industry-specific software

Only categories genuinely delivered by Zytrixon should be published.

---

# 11. Service Page: Web & Mobile Applications

Recommended route:

```text
/services/web-mobile-applications
```

Possible architecture:

```text
Web Applications
Mobile Applications
Product Engineering
MVP Development
API / Backend Integration
Deployment
Relevant Work
CTA
```

Avoid splitting web and mobile into unnecessary separate pages unless search/business requirements justify it.

---

# 12. Service Page: Business Strategy

Recommended route:

```text
/services/business-strategy
```

The page should answer:

- What business problem exists?
- When is strategy needed?
- What does Zytrixon analyze?
- What does the client receive?
- How does strategy connect to implementation?

Potential flow:

```text
Business Context
 ↓
Problem Definition
 ↓
Opportunity
 ↓
Technology Strategy
 ↓
Execution Roadmap
```

---

# 13. Service Page: Business Consulting

Recommended route:

```text
/services/business-consulting
```

This page should distinguish consulting from strategy.

Potential focus:

- operational improvement
- technology decisions
- digital transformation
- process optimization
- system evaluation
- implementation planning

Exact scope must be defined by Zytrixon.

---

# 14. Service Page: Social Media

Recommended route:

```text
/services/social-media
```

Possible content:

- content strategy
- platform management
- creative production
- publishing
- community engagement
- reporting

Do not let this page visually dominate the site if software/engineering remains Zytrixon's primary differentiator.

---

# 15. Service Page: Performance / Digital Marketing

Recommended route:

```text
/services/performance-digital-marketing
```

Possible structure:

```text
Acquisition
 ↓
Campaign
 ↓
Landing / Conversion
 ↓
Tracking
 ↓
Optimization
 ↓
Reporting
```

Where applicable, connect marketing to:

- CRM
- WhatsApp
- lead management
- analytics
- automation

This supports the broader Zytrixon ecosystem positioning.

---

# 16. Service Page: AI Automation

Recommended route:

```text
/services/ai-automation
```

This page should be highly demonstrative.

Potential visual:

```text
TRIGGER
   ↓
DATA
   ↓
AI PROCESSING
   ↓
DECISION
   ↓
ACTION
   ↓
BUSINESS SYSTEM
```

Possible use cases:

- lead qualification
- customer support
- document processing
- internal workflows
- reporting
- content operations

Only publish use cases Zytrixon can actually deliver.

---

# 17. Service Page: Chatbot Integration

Recommended route:

```text
/services/chatbot-integration
```

Potential architecture:

```text
Customer
   ↓
Conversation
   ↓
Bot
   ↓
Knowledge / AI
   ↓
Human Escalation
   ↓
CRM / Business System
```

The page should explain integration rather than merely claiming "AI chatbot development."

---

# 18. Service Page: WhatsApp API

Recommended route:

```text
/services/whatsapp-api
```

Potential flow:

```text
Customer
   ↓
WhatsApp
   ↓
Automation / Human
   ↓
CRM
   ↓
Payment
   ↓
Order / Support
```

This page can be highly conversion-oriented because WhatsApp is a concrete business problem for many Indian businesses.

---

# 19. Service Page: Payment Gateway Integration

Recommended route:

```text
/services/payment-gateway-integration
```

Potential information:

```text
Checkout
 ↓
Payment Gateway
 ↓
Verification
 ↓
Webhook
 ↓
Business Logic
 ↓
Order / Subscription
 ↓
Reconciliation
```

Security and reliability should be explained where appropriate.

---

# 20. IoT Information Architecture

IoT is currently treated as a specialist capability because it appears in the existing Zytrixon positioning and portfolio.

If confirmed as an active commercial offering, possible route:

```text
/services/iot
```

Alternative:

```text
/solutions/iot
```

This decision must be made after business validation.

---

# 21. Work / Portfolio Architecture

Top-level:

```text
/work
```

Individual case studies:

```text
/work/[project-slug]
```

Example:

```text
/work/school-management-system
/work/affiliate-platform
/work/smart-factory
```

Project slugs should be based on approved public project names.

---

# 22. Work Landing Page

Recommended structure:

```text
WORK
 ↓
Selected projects
 ↓
Filter / category
 ↓
Case studies
 ↓
Engineering capability
 ↓
CTA
```

Filtering should only be added if the number of projects justifies it.

Do not add a filter UI for three projects just because filters look sophisticated.

---

# 23. Case Study Architecture

Each case study should have:

```text
01 / PROJECT INTRO
02 / CONTEXT
03 / PROBLEM
04 / APPROACH
05 / SYSTEM / PRODUCT
06 / KEY FEATURES
07 / TECHNOLOGY
08 / VISUAL PROOF
09 / OUTCOME
10 / RELATED SERVICES
11 / NEXT PROJECT
12 / CTA
```

This creates a narrative rather than a portfolio gallery.

---

# 24. Case Study Relationships

Each project should reference:

```text
Project
 ├── Services
 ├── Technologies
 ├── Industry
 └── Related Projects
```

Example:

```text
Smart Factory
│
├── IoT
├── AI / ML
├── Real-time Systems
└── Custom Software
```

This improves both navigation and SEO.

---

# 25. About Architecture

Route:

```text
/about
```

Recommended sections:

```text
Company positioning
Mission
Story
Operating philosophy
Capabilities
Engineering approach
Global presence
Leadership
CTA
```

Do not duplicate the entire homepage.

---

# 26. Team Architecture

Route:

```text
/team
```

Individual team pages are optional.

If individual pages are required:

```text
/team/[member-slug]
```

Only create individual pages if there is sufficient useful content.

Three people do not automatically require three SEO pages.

---

# 27. Careers Architecture

Route:

```text
/careers
```

Individual roles:

```text
/careers/[job-slug]
```

Example:

```text
/careers/senior-react-engineer
/careers/backend-engineer
```

Role pages should contain:

- role
- location
- work model
- responsibilities
- requirements
- technology
- application method

---

# 28. Insights Architecture

Top-level:

```text
/insights
```

Article:

```text
/insights/[article-slug]
```

Optional category:

```text
/insights/category/[category-slug]
```

Categories should only exist if there is enough content.

Potential categories:

- Engineering
- AI & Automation
- Business Technology
- Digital Growth
- Company

Final taxonomy requires editorial validation.

---

# 29. Contact Architecture

Route:

```text
/contact
```

The page should provide:

```text
Project qualification
 ↓
Contact form
 ↓
Alternative channels
 ↓
Location / company information
```

The form should not force visitors to identify a technical service if they only know their business problem.

Potential option:

> **I know what I need**

or

> **I need help defining the solution**

---

# 30. CTA Hierarchy

The website should have one primary CTA.

Working primary CTA:

> **Start a Project**

Secondary actions:

- Explore Work
- View Services
- Talk to Us
- Contact
- View Careers

Avoid using five different CTA phrases that all mean the same thing.

---

# 31. Contextual CTA Rules

CTA should adapt to the current page.

### Homepage

**Start a Project**

### Service page

**Discuss Your Requirement**

### Case study

**Build Something Similar**

### Careers

**View Open Roles / Apply**

### Insights

**Explore More Insights**

These are working labels.

---

# 32. Footer Architecture

Footer should contain:

```text
ZYTRIXON

Capabilities
Services
Work
Company
Careers
Insights
Contact

Social / Professional Links

Email
Phone
Location

Legal
Privacy
Terms
```

The footer should be functional rather than a giant repeated sitemap.

---

# 33. Internal Linking Strategy

Important relationships:

```text
Service
 ↕
Case Study

Service
 ↕
Related Service

Case Study
 ↕
Technology / Capability

Insight
 ↕
Service

Insight
 ↕
Case Study
```

Every major page should have a meaningful next step.

---

# 34. Breadcrumb Strategy

Breadcrumbs should be used on deeper pages where they improve orientation.

Example:

```text
Home
/
Services
/
AI Automation
```

For case studies:

```text
Home
/
Work
/
School Management System
```

They should not be visually dominant.

---

# 35. Navigation States

Navigation must define:

- default
- hover
- focus
- active
- expanded
- mobile-open
- scrolling
- reduced-motion

The exact visual implementation belongs in the design system.

---

# 36. Mobile Information Architecture

Mobile should preserve the same information hierarchy without simply shrinking desktop navigation.

Recommended:

```text
MENU
│
├── Services
│   ├── Strategy
│   ├── Build
│   ├── Automate
│   ├── Grow
│   └── Integrate
│
├── Work
├── About
├── Team
├── Insights
├── Careers
└── Contact

[Start a Project]
```

Service categories should be expandable.

---

# 37. Search Engine Architecture

Indexable pages should include:

```text
/
 /services
 /services/*
 /work
 /work/*
 /about
 /team
 /careers
 /careers/*
 /insights
 /insights/*
 /contact
```

Noindex candidates may include:

- internal utility routes
- preview routes
- development-only pages
- temporary campaign routes
- duplicate query parameter pages

Final robots policy will be defined in the SEO document.

---

# 38. URL Naming Rules

Use:

- lowercase
- hyphen-separated slugs
- readable terms
- stable URLs
- no unnecessary IDs
- no dates unless editorial strategy requires them

Good:

```text
/services/ai-automation
```

Bad:

```text
/services?id=7
```

Bad:

```text
/serviceAIautomationFinal2
```

---

# 39. 404 Architecture

The 404 page should:

- preserve Zytrixon identity
- explain that the page was not found
- provide Home
- provide Services
- provide Work
- provide Contact

It should not be a dead end.

Potential concept:

```text
404

SYSTEM NOT FOUND.

The requested route does not exist.

[Back to Index]
```

This is a design direction, not final copy.

---

# 40. Future Products Architecture

When Zytrixon has public products:

```text
/products
/products/[product-slug]
```

Product pages can later contain:

- product overview
- problem
- capabilities
- screenshots
- pricing
- demo
- documentation
- CTA

Do not build this entire section into V2 unless required.

---

# 41. Future Expansion

The IA must accommodate:

```text
More services
More projects
More articles
More team members
More job openings
Products
Industries
Solutions
```

without creating route or component duplication.

---

# 42. Recommended Content Relationships

Conceptually:

```text
                 ZYTRIXON
                    │
             ┌──────┴──────┐
             │             │
          SERVICES        WORK
             │             │
      ┌──────┼──────┐      │
      │      │      │      │
   Strategy Build Automate Projects
      │      │      │      │
      └──────┴──────┴──────┘
                 │
               PROOF
                 │
               CTA
```

This should be reflected in content models as well as navigation.

---

# 43. Homepage-to-Deep-Page Depth

A visitor should ideally reach any primary commercial page within:

**2–3 meaningful navigation actions.**

Examples:

```text
Homepage
 → Services
 → AI Automation
```

or:

```text
Homepage
 → Work
 → Smart Factory
```

Do not create unnecessary hierarchy.

---

# 44. IA Anti-Patterns

Do not create:

- duplicate service pages
- thin SEO pages
- unnecessary industry pages
- unnecessary technology pages
- tag pages with no useful content
- filter pages that add no value
- individual pages for every tiny entity
- separate pages merely to increase page count

The site should be deep where useful, not deep for its own sake.

---

# 45. Accessibility Implications

IA must support:

- logical heading hierarchy
- logical DOM order
- keyboard navigation
- understandable link labels
- accessible menus
- breadcrumbs where useful
- meaningful page titles

Visual hierarchy must not contradict semantic hierarchy.

---

# 46. Analytics Implications

Important IA events:

```text
navigation_services
navigation_work
service_opened
case_study_opened
contact_cta_clicked
contact_form_started
contact_form_submitted
whatsapp_clicked
career_opened
job_opened
insight_opened
```

Event naming will be finalized in the analytics implementation.

---

# 47. Proposed Final Sitemap — V2 Baseline

```text
/
│
├── /services
│   ├── /business-strategy
│   ├── /business-consulting
│   ├── /custom-software
│   ├── /web-mobile-applications
│   ├── /social-media
│   ├── /performance-digital-marketing
│   ├── /ai-automation
│   ├── /chatbot-integration
│   ├── /payment-gateway-integration
│   └── /whatsapp-api
│
├── /work
│   ├── /[project]
│   └── ...
│
├── /about
├── /team
├── /careers
│   └── /[job]
├── /insights
│   └── /[article]
└── /contact
```

Potential future:

```text
└── /products
    └── /[product]
```

---

# 48. IA Decision Summary

### Preserve

- structured navigation
- Work / portfolio
- Services
- About
- Team
- Careers
- Insights
- Contact
- deep service pages

### Change

- service grouping
- service hierarchy
- case-study depth
- contextual CTAs
- internal linking
- business-problem discovery
- future product readiness

### Avoid

- page-count inflation
- generic SEO pages
- duplicate content
- unnecessary filters
- confusing service taxonomy

---

# 49. Final IA Principle

The visitor should never need to understand Zytrixon's internal organization before they can understand how Zytrixon can help them.

The architecture should guide them from:

```text
Problem
 ↓
Capability
 ↓
Proof
 ↓
Trust
 ↓
Conversation
```

rather than:

```text
Page
 ↓
Page
 ↓
Page
 ↓
Another page
 ↓
Contact
```

---

# 50. Status

**Status:** Working information architecture.

This document is the structural bridge between product requirements and visual/design engineering.

Before implementation, validate:

- service taxonomy
- priority pages
- careers priority
- insights strategy
- IoT placement
- future products
- final navigation labels
- approved URLs

**Next document:** `04-design-system.md`
