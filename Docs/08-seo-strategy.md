# Zytrixon V2 — SEO Strategy

**Document:** `08-seo-strategy.md`  
**Project:** Zytrixon Website V2  
**Status:** Production SEO Specification  
**Depends on:** `00-current-site-audit.md`, `01-brand-strategy.md`, `02-product-requirements.md`, `03-information-architecture.md`, `06-architecture.md`, `07-type-system.md`

---

# 1. SEO Objective

Zytrixon V2 should be technically excellent for search engines while still being written primarily for humans.

The SEO strategy must support three goals:

1. **Brand discovery** — people searching for Zytrixon.
2. **Service discovery** — businesses searching for the problems Zytrixon solves.
3. **Proof and authority** — case studies and insights demonstrating real capability.

SEO must not turn the website into a keyword-stuffed agency template.

---

# 2. SEO Positioning

The website should reflect Zytrixon's actual strategic direction:

```text
Business problems
      ↓
Strategy
      ↓
Software
      ↓
Integration
      ↓
Automation
      ↓
Growth
```

Search visibility should therefore target meaningful business and technology intent rather than random high-volume keywords.

---

# 3. Search Intent Model

Primary intent groups:

### Brand

Examples:

```text
Zytrixon
Zytrixon Tech
Zytrixon technology
Zytrixon software
```

### Commercial Service

Examples:

```text
custom software development company
web development company
AI automation services
IoT solutions
mobile app development
business automation
```

### Problem-Oriented

Examples:

```text
automate business operations
custom ERP development
WhatsApp business automation
payment gateway integration
chatbot integration
```

### Informational

Examples:

```text
how business automation works
custom software vs off-the-shelf software
when should a company build an ERP
AI automation use cases
```

Exact target keywords must be validated using current search data before content production.

---

# 4. SEO Hierarchy

The SEO architecture should follow:

```text
Homepage
   ↓
Capability / Service Hubs
   ↓
Individual Services
   ↓
Case Studies
   ↓
Insights
```

Each layer should strengthen the others through internal linking.

---

# 5. Homepage SEO

The homepage should primarily target the brand and broad positioning.

It should clearly communicate:

- Zytrixon
- what the company does
- who it serves
- major capabilities
- geographic/service context where accurate
- evidence of work

Do not attempt to rank the homepage for every individual service keyword.

---

# 6. Homepage Title

The title should prioritize brand + core positioning.

Concept:

```text
Zytrixon — Business Technology, Software & Automation
```

The final title should be selected after keyword research and brand-copy approval.

Avoid:

```text
Best #1 Leading Top Software Company in India | Zytrixon
```

---

# 7. Homepage Meta Description

The description should explain the business clearly.

It should contain:

- brand
- core capabilities
- useful differentiation
- natural search language

Do not write a keyword list.

---

# 8. Service Hub SEO

`/services` should function as a genuine capability hub.

It should explain the overall service architecture and link to individual service pages.

Target broad commercial intent rather than competing with every service page.

---

# 9. Individual Service SEO

Every meaningful service should have its own indexable route.

Example:

```text
/services/web-development
/services/custom-software
/services/ai-automation
/services/iot-solutions
```

Each page must satisfy a distinct search intent.

Do not create pages solely because a keyword exists.

---

# 10. Service Page Search Intent

Each service page should answer:

```text
What is this?
Who needs it?
What problem does it solve?
How does Zytrixon approach it?
What can Zytrixon actually build?
What evidence exists?
What happens next?
```

A visitor should not need to navigate through five pages to understand the service.

---

# 11. Service Page Title Structure

Concept:

```text
[Service] | Zytrixon
```

Where useful:

```text
Custom Software Development for Business Operations | Zytrixon
```

Do not make every title excessively long.

---

# 12. Service Page Headings

Use a logical heading hierarchy:

```text
H1
 ├── H2
 │    ├── H3
 │    └── H3
 └── H2
```

Do not use heading tags purely for visual sizing.

Typography must be separated from semantic hierarchy.

---

# 13. One Primary H1

Each indexable page should have one clear primary H1.

The H1 should describe the actual page topic.

Avoid vague H1s such as:

```text
Build Something Amazing
```

unless the page context makes the subject unmistakable.

---

# 14. Case Study SEO

Case studies are important long-tail and authority assets.

A case study should target the combination of:

```text
problem
+
industry
+
technology
+
solution
```

when those details are real and publishable.

Example structure:

```text
Retail ERP Software
Inventory + Billing + Operations
```

Only claim technologies and outcomes that were actually used.

---

# 15. Case Study Titles

Prefer descriptive titles.

Good:

```text
Building an IoT Smart Factory Monitoring System
```

Weak:

```text
Project Alpha
```

The title should help both humans and search engines understand the work.

---

# 16. Case Study Metadata

Each case study should support:

```text
title
description
canonical
Open Graph image
published/updated information where appropriate
structured data where applicable
```

---

# 17. Insights SEO

Insights should capture informational intent and establish expertise.

Potential themes:

```text
engineering
business systems
automation
AI
software architecture
digital strategy
IoT
product development
```

Articles should answer real questions, not exist only to create URLs.

---

# 18. Content Quality Standard

Every article should have:

- a clear question/problem
- useful original explanation
- logical structure
- examples where appropriate
- accurate technical claims
- meaningful conclusion
- relevant internal links

Avoid thin AI-generated articles.

---

# 19. AI Content Policy

AI may assist with research, outlining, editing, or drafting.

But published content must be:

- fact-checked
- edited
- original
- useful
- aligned with Zytrixon's actual expertise

Do not publish hundreds of generic AI articles simply to create search traffic.

---

# 20. E-E-A-T Direction

The site should demonstrate expertise through evidence rather than empty claims.

Useful proof:

```text
real projects
real architecture
real engineering decisions
real people
real implementation details
real outcomes
```

Avoid unsupported claims such as:

```text
industry-leading
world-class
best-in-class
award-winning
```

unless independently verifiable.

---

# 21. Internal Linking

Internal linking should follow user intent.

Examples:

```text
Service page
 → relevant case study
 → related service
 → relevant insight
 → contact

Case study
 → services used
 → related case studies
 → relevant insight
```

Do not add links merely to increase link count.

---

# 22. Anchor Text

Use descriptive anchors.

Good:

```text
custom software development
```

Weak:

```text
click here
learn more
read more
```

Repeated exact-match anchors should still be avoided when they make copy unnatural.

---

# 23. Breadcrumbs

Breadcrumbs are useful on deeper pages.

Example:

```text
Home
→ Services
→ Custom Software
```

They should be:

- semantically correct
- keyboard accessible
- visually consistent
- reflected in structured data when appropriate

---

# 24. Canonical URLs

Every indexable page should have a clear canonical URL.

Canonical strategy should prevent duplicate URL variants.

Examples of potential duplication:

```text
/travel
/travel/
/travel?source=...
```

Canonicalization must reflect the preferred public URL.

---

# 25. Trailing Slash Policy

Choose one canonical URL style.

For example:

```text
https://zytrixontech.com/services/custom-software
```

Do not allow inconsistent canonical representations.

Redirect non-canonical variants where appropriate.

---

# 26. Redirect Strategy

When routes change:

```text
old URL
   ↓
301 redirect
   ↓
new canonical URL
```

Do not casually remove existing routes without checking search impact.

Create a redirect map before launch.

---

# 27. Existing Site Migration

Because V2 is an upgrade rather than a completely unrelated website, preserve valuable existing URLs where possible.

Before deployment:

```text
crawl current site
 ↓
export URLs
 ↓
map old → new
 ↓
implement redirects
 ↓
verify
```

This is mandatory if the URL structure changes.

---

# 28. 404 Strategy

Unknown pages should return a genuine 404 response.

The visual page can be branded, but the HTTP status must remain:

```text
404
```

Do not redirect every unknown URL to the homepage.

---

# 29. Sitemap Architecture

Generate a sitemap from actual indexable content.

Include:

```text
homepage
service pages
case studies
public insights
about/team/careers/contact where appropriate
```

Exclude:

```text
private pages
internal tools
duplicate routes
parameterized junk URLs
```

---

# 30. Sitemap Freshness

The sitemap should automatically reflect published content.

Do not maintain a giant manually edited XML file if the content is generated from typed data.

---

# 31. Robots Architecture

Robots configuration should:

- permit legitimate public content
- block private/internal areas
- avoid accidental global blocking
- remain compatible with deployment environments

Never ship a staging `Disallow: /` configuration to production.

---

# 32. Staging Protection

Staging environments should not be accidentally indexed.

Possible controls:

```text
authentication
robots noindex
deployment access controls
```

Production should be explicitly verified before launch.

---

# 33. Open Graph

Every important shareable page should have appropriate Open Graph metadata.

At minimum:

```text
og:title
og:description
og:image
og:url
og:type
```

Case studies and insights should have relevant images rather than one generic image for everything.

---

# 34. Social Metadata

Where useful:

```text
Twitter/X card metadata
```

should be generated from the same SEO configuration rather than duplicated manually.

---

# 35. Image SEO

Images should have:

- meaningful filenames where practical
- descriptive alt text
- correct dimensions
- appropriate compression
- responsive sizing

Do not stuff keywords into alt text.

---

# 36. Alt Text Rules

For informative images:

```text
describe the useful information
```

For decorative images:

```text
alt=""
```

Do not write:

```text
"best software company India Zytrixon software development"
```

as alt text.

---

# 37. Technical SEO Performance

SEO and performance are connected.

Prioritize:

```text
fast LCP
low CLS
good INP
minimal blocking JS
optimized fonts
optimized images
```

Refer to `10-performance.md` for implementation requirements.

---

# 38. JavaScript and SEO

Important content must not depend entirely on client-side JavaScript to exist.

Prefer server-rendered/static content for:

- H1
- service descriptions
- case-study content
- navigation
- internal links

Interactive enhancements should sit on top of usable HTML.

---

# 39. Semantic HTML

Use meaningful HTML:

```html
<header>
<nav>
<main>
<section>
<article>
<footer>
```

Semantic structure helps:

- accessibility
- maintainability
- search understanding

Do not build the whole site from `<div>` elements.

---

# 40. Structured Data — Organization

The organization schema can describe Zytrixon when information is accurate and publicly available.

Possible fields:

```text
name
url
logo
sameAs
contact information
```

Do not include unverified legal/business details.

---

# 41. Structured Data — Website

A WebSite schema may describe the main website.

Use only information that accurately reflects the website.

---

# 42. Structured Data — Service

Service schema may be used on genuine service pages.

It should describe the service actually offered.

Do not generate dozens of fake service entities.

---

# 43. Structured Data — Article

Insights should use Article/BlogPosting-style structured data where appropriate.

Include accurate:

```text
headline
author
datePublished
dateModified
image
```

---

# 44. Structured Data — JobPosting

If active careers pages contain actual job postings, JobPosting structured data may be appropriate.

Requirements:

- accurate job title
- employment type
- location
- valid application information
- correct status

Remove or update structured data when a role closes.

---

# 45. Structured Data Validation

Structured data must be tested using appropriate validation tools before production.

Do not assume valid JSON-LD means valid search-engine markup.

---

# 46. Local SEO

If Zytrixon actively serves a geographic market, local signals can be useful.

Potential elements:

```text
accurate business location
service areas
contact information
consistent organization details
relevant local pages
```

Do not create dozens of city pages with identical content.

---

# 47. Location Claims

Only publish locations and service areas that are real.

Avoid creating fake location pages such as:

```text
Software Company in Every City
```

solely for SEO.

---

# 48. International SEO

If Zytrixon genuinely targets multiple countries, international targeting can be expanded later.

Do not introduce:

```text
/en/
/ae/
/uk/
/us/
```

without a genuine localized-content requirement.

A folder structure alone does not create international SEO value.

---

# 49. Keyword Cannibalization

Avoid multiple pages targeting the exact same intent.

Example problem:

```text
/web-development
/website-development
/web-design-development
/web-development-company
```

If they provide essentially the same answer, they may compete with each other.

Consolidate where appropriate.

---

# 50. Service Taxonomy and Cannibalization

The capability architecture should make intent boundaries obvious.

For example:

```text
Custom Software
→ business-specific systems

Web Development
→ websites/web platforms

AI Automation
→ intelligent process automation
```

Each page needs a distinct reason to exist.

---

# 51. URL Design

URLs should be:

- short
- descriptive
- lowercase
- stable
- human-readable

Good:

```text
/services/ai-automation
/work/smart-factory
/insights/custom-erp-vs-saas
```

Avoid:

```text
/services/service?id=392
/work/project-final-v2
```

---

# 52. Slug Stability

Once a public URL gains value, do not change it casually.

If a change is necessary:

```text
new URL
+
301 redirect
+
canonical update
+
internal-link update
+
sitemap update
```

---

# 53. Pagination

If insights/work eventually require pagination:

- use crawlable URLs
- maintain canonical logic
- provide accessible navigation
- avoid infinite-scroll-only discovery

The user should be able to reach content without JavaScript.

---

# 54. Filters

Do not allow every filter combination to become indexable.

Example:

```text
/work?industry=retail&tech=react&year=2025
```

should not automatically create thousands of crawlable URLs.

Control indexing deliberately.

---

# 55. Query Parameters

Trackers such as:

```text
utm_source
utm_medium
utm_campaign
```

should not create duplicate indexable content.

Canonical URLs should point to the clean URL.

---

# 56. Search Engine Discovery

Every important page should be discoverable through:

```text
navigation
internal links
sitemap
```

Do not rely exclusively on sitemap submission.

---

# 57. Orphan Pages

An indexable page with no meaningful internal links is an orphan.

Before launch, identify:

```text
pages with no inbound internal links
```

and decide whether to:

- link them
- consolidate them
- noindex them
- remove them

---

# 58. SEO Content Model

Every major page should have a clear content owner.

Recommended metadata fields:

```text
seoTitle
seoDescription
canonical
ogImage
noIndex
```

Use page-specific overrides when necessary.

---

# 59. SEO Defaults

Define sensible defaults at the site level.

Example:

```text
default title suffix
default description
default OG image
site URL
```

Page-level metadata should override defaults when needed.

---

# 60. Metadata Generation

Use a central metadata helper rather than repeating raw metadata objects everywhere.

Conceptually:

```ts
generateSEO({
  title,
  description,
  canonical,
  image,
});
```

The helper should produce framework-compatible metadata.

---

# 61. SEO and Content Types

SEO metadata should be part of the typed content architecture.

Example:

```ts
interface SEOConfig {
  title: string;
  description: string;
  canonical?: string;
  image?: MediaAsset;
  noIndex?: boolean;
}
```

See `07-type-system.md`.

---

# 62. Search Console

Production should be connected to an appropriate search monitoring system.

Monitor:

```text
indexing
search queries
clicks
impressions
CTR
coverage/errors
Core Web Vitals
```

Do not optimize based solely on impressions.

---

# 63. SEO Measurement

Useful metrics:

```text
organic traffic
qualified organic leads
service-page engagement
case-study discovery
branded search visibility
non-branded impressions
conversion rate
```

Business outcomes matter more than raw traffic.

---

# 64. SEO Conversion Path

A visitor arriving from search should have a natural journey:

```text
Search
 ↓
Relevant page
 ↓
Proof / explanation
 ↓
Related work
 ↓
CTA
 ↓
Contact
```

Do not force every visitor through the homepage.

---

# 65. Search Landing Pages

A service page should function as a landing page independently.

It must provide enough context for someone who has never visited Zytrixon before.

---

# 66. Content Freshness

Update pages when information changes.

Especially:

```text
team
careers
services
technology stack
case studies
company statistics
```

Do not change publication dates merely to appear fresh.

---

# 67. Claims and Statistics

SEO copy must never be used as an excuse to exaggerate company metrics.

All public claims should come from one verified source of truth.

This is especially important because the existing site has inconsistent numbers across pages.

---

# 68. Existing Website Migration Checklist

Before V2 launch:

```text
[ ] Crawl current site
[ ] Export all indexable URLs
[ ] Identify traffic-driving URLs
[ ] Identify backlinks where possible
[ ] Map old → new routes
[ ] Preserve high-value URLs
[ ] Add 301 redirects
[ ] Update internal links
[ ] Generate new sitemap
[ ] Verify robots
[ ] Verify canonical URLs
[ ] Verify metadata
[ ] Check 404s
[ ] Check redirect chains
[ ] Submit sitemap
```

---

# 69. SEO QA — Technical

Check:

```text
[ ] HTTPS
[ ] canonical
[ ] title
[ ] description
[ ] H1
[ ] heading hierarchy
[ ] robots
[ ] sitemap
[ ] status codes
[ ] redirects
[ ] structured data
[ ] Open Graph
[ ] internal links
[ ] image alt text
[ ] mobile rendering
```

---

# 70. SEO QA — Content

Check:

```text
[ ] search intent is clear
[ ] copy is original
[ ] claims are verified
[ ] no keyword stuffing
[ ] no duplicate pages
[ ] service boundaries are clear
[ ] CTAs are relevant
[ ] case-study claims are supported
```

---

# 71. SEO QA — Performance

Check on representative devices and networks:

```text
[ ] LCP
[ ] INP
[ ] CLS
[ ] JS payload
[ ] image payload
[ ] font loading
[ ] third-party scripts
```

---

# 72. Launch Gates

Do not launch until:

```text
SEO metadata
+
sitemap
+
robots
+
canonical
+
redirects
+
structured data
+
internal links
+
mobile rendering
```

have been verified.

---

# 73. Post-Launch Monitoring

After launch, monitor for:

```text
indexing drops
404 increases
redirect failures
canonical issues
coverage problems
ranking changes
organic lead changes
Core Web Vitals regressions
```

The first weeks after migration deserve special attention.

---

# 74. Anti-Patterns

Never:

- stuff keywords into headings
- create fake city pages
- publish thin AI articles
- invent testimonials
- invent statistics
- hide keyword blocks
- create hundreds of near-duplicate service pages
- force exact-match anchor text everywhere
- index every filter combination
- change URLs without redirects
- block production with robots.txt
- use JavaScript-only navigation
- sacrifice UX for SEO

---

# 75. SEO Philosophy

Zytrixon should not try to look like a website that was engineered for Google.

It should look like a company that genuinely understands its work.

The SEO strategy is:

```text
Real expertise
+
clear information architecture
+
useful content
+
technical correctness
+
strong internal linking
+
measurable business outcomes
```

not:

```text
keywords
+
pages
+
AI articles
+
traffic
```

---

# 76. Definition of Done

SEO architecture is ready when:

- every important route has a search intent
- metadata is centralized and typed
- service pages have distinct intent
- case studies are indexable and descriptive
- insights have a controlled content model
- canonical URLs are defined
- sitemap generation exists
- robots configuration exists
- structured data strategy exists
- redirect migration plan exists
- internal linking rules exist
- indexing controls exist
- analytics/search monitoring is planned
- SEO QA is part of release
- no unsupported claims are used

---

# 77. Final Principle

**Do not optimize Zytrixon to attract everyone. Optimize it to be found by the right businesses with the right problems.**

The best SEO outcome is not:

> more visitors.

It is:

> more relevant people understanding Zytrixon's capability and taking the next step.

---

# 78. Status

**Status:** Production SEO specification.

**Next document:** `09-accessibility.md`
