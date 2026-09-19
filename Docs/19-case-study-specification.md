# Zytrixon V2 — Case Study Specification

**Document:** `19-case-study-specification.md`  
**Project:** Zytrixon Website V2  
**Status:** Production Case Study Content & UX Specification  
**Depends on:** `15-content-strategy.md`, `16-copywriting.md`, `17-component-inventory.md`, `18-page-specifications.md`, `12-testing.md`, `14-do-not-do.md`

---

# 1. Purpose

Case studies are Zytrixon's strongest opportunity to prove engineering capability.

They must answer:

```text
What was the problem?
Why was it difficult?
What did Zytrixon actually build?
Why were those technical decisions made?
What changed as a result?
```

A case study is not a portfolio card expanded to 2,000 words.

It is an evidence-backed engineering story.

---

# 2. Case Study Principle

The hierarchy is:

```text
problem
→
constraints
→
reasoning
→
engineering
→
outcome
```

Not:

```text
client logo
→
marketing paragraph
→
technology logo wall
→
generic result
```

---

# 3. Truth Requirement

Every case study statement must be classified as one of:

```text
verified fact
client-provided information
documented technical fact
verified metric
qualitative observation
```

Do not publish assumptions as facts.

---

# 4. No Fabricated Results

Never invent:

```text
revenue increase
conversion rate
performance percentage
cost savings
user count
transaction count
deployment scale
customer satisfaction
```

If a metric is unavailable:

```text
omit it
```

Do not manufacture a number to make the case study impressive.

---

# 5. Confidentiality

Before publishing a case study, verify:

```text
client identity permission
screenshots permission
logo permission
technology disclosure permission
business information permission
metrics permission
architecture disclosure permission
```

Confidential information must not appear accidentally.

---

# 6. Anonymized Case Studies

If client details cannot be disclosed, use an accurate anonymized description.

Example:

```text
A multi-location retail business
```

Do not invent a fake company name.

---

# 7. Case Study Data Model

Conceptual TypeScript model:

```ts
type CaseStudy = {
  slug: string;
  title: string;
  summary: string;
  category: string;
  industry?: string;
  clientName?: string;
  clientVisibility: "public" | "anonymous";
  heroImage: MediaAsset;
  services: string[];
  technologies: string[];
  context: string;
  problem: string;
  constraints: string[];
  approach: string;
  architecture?: ArchitectureSection;
  features: Feature[];
  decisions?: TechnicalDecision[];
  outcome: OutcomeSection;
  metrics?: Metric[];
  gallery?: MediaAsset[];
  testimonial?: Testimonial;
  relatedServices: string[];
  relatedCaseStudies?: string[];
  publishedAt?: string;
  updatedAt?: string;
};
```

The exact type belongs in the project's shared type system.

---

# 8. Required Fields

Minimum viable case study:

```text
slug
title
summary
category
hero image
context
problem
approach
features
outcome
related service
```

---

# 9. Optional Fields

Only include when real information exists:

```text
client
industry
constraints
architecture
technical decisions
metrics
gallery
testimonial
timeline
team
related work
```

Do not create empty sections just because the schema supports them.

---

# 10. Case Study URL

Recommended:

```text
/work/[slug]
```

Slugs should be:

```text
short
stable
lowercase
descriptive
```

Example:

```text
school-management-system
```

---

# 11. Case Study Hero

The hero should contain:

```text
category
project title
short summary
hero visual
optional verified metric
```

If a metric is not verified, do not display one.

---

# 12. Hero Visual

Prefer:

```text
real product screenshot
real dashboard
real interface
real system diagram
real photography
```

over:

```text
stock photo
generic 3D object
AI-generated product UI
```

---

# 13. Project Context

Explain:

```text
what the business/system was
who used it
what environment it operated in
```

Keep it concise.

---

# 14. Problem Section

The problem should be concrete.

Good:

```text
Attendance, fees and examination records were handled across disconnected workflows.
```

Bad:

```text
The client needed digital transformation.
```

---

# 15. Problem Depth

Where information exists, explain:

```text
existing workflow
failure points
manual work
system limitations
user pain
business impact
```

Do not speculate about business impact.

---

# 16. Constraints

Constraints make engineering stories credible.

Possible:

```text
legacy system
budget
timeline
existing APIs
device limitations
offline requirements
security requirements
third-party dependencies
data migration
```

Only include constraints that actually existed.

---

# 17. Approach

Explain how Zytrixon moved from problem to system.

Structure:

```text
understand
→
model
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

Do not turn this into generic process copy.

---

# 18. Architecture

Architecture should explain meaningful system boundaries.

Possible:

```text
frontend
backend
database
authentication
third-party APIs
payments
notifications
devices
cloud infrastructure
```

---

# 19. Architecture Diagram Rules

A useful diagram should answer:

```text
What talks to what?
Where does data live?
Where does authentication happen?
Where are external dependencies?
```

Avoid decorative diagrams with arrows that have no meaning.

---

# 20. Architecture Disclosure

Do not publish:

```text
credentials
private endpoints
secret keys
internal IP addresses
private infrastructure details
customer-sensitive data
```

Sanitize screenshots and diagrams before publication.

---

# 21. Technical Decisions

A strong case study should explain important decisions.

Use this structure:

```text
Decision
Why it mattered
Options considered
Reason for choice
Trade-off
```

---

# 22. Example Technical Decision

```text
Decision:
Use PostgreSQL for transactional business data.

Why:
The system contains strongly related entities and transactional workflows.

Trade-off:
Requires more explicit schema management than a document-first approach.
```

Only use examples that match the real project.

---

# 23. Technology Stack

Technology should be grouped:

```text
Frontend
Backend
Database
Infrastructure
Integrations
```

Do not dump 20 logos without explaining their relevance.

---

# 24. Feature Section

Features should be described by user/business purpose.

Bad:

```text
JWT
REST API
React
MongoDB
```

Better:

```text
Role-based access allowed administrators, staff and users to access different workflows.
```

Technology can support the explanation.

---

# 25. Feature Prioritization

Highlight features that demonstrate meaningful complexity.

Examples:

```text
role-based workflows
real-time communication
payment processing
multi-level commissions
ERP modules
IoT monitoring
automation
data synchronization
```

Do not list every tiny UI feature.

---

# 26. Screenshots

Each screenshot should have:

```text
purpose
caption
context
```

Example:

> Operations dashboard showing attendance, fees and examination workflows.

---

# 27. Screenshot Rules

Screenshots must be:

```text
high resolution
cropped intentionally
free of private information
consistent in presentation
accurately labeled
```

Do not artificially modify the interface to imply functionality that does not exist.

---

# 28. Gallery

Use a gallery only when multiple screenshots communicate different parts of the system.

Avoid:

```text
same dashboard
six slightly different crops
```

---

# 29. Video

Video can be useful for complex workflows.

If used:

```text
short
muted by default
captioned where necessary
optimized
```

Do not make video mandatory to understand the case study.

---

# 30. Outcome

The outcome section should answer:

```text
What changed?
What was delivered?
What became possible?
```

Separate technical outcomes from business outcomes.

---

# 31. Technical Outcome

Examples:

```text
centralized workflow
real-time visibility
automated reporting
integrated payments
role-based access
device monitoring
```

Only claim what the system actually provides.

---

# 32. Business Outcome

Use only verified evidence.

Possible evidence:

```text
documented time reduction
verified adoption
measured revenue impact
customer feedback
operational improvement
```

If no measurement exists, describe the delivered capability instead.

---

# 33. Metrics

Every metric should have:

```text
value
label
period/context
source or verification status
```

Example concept:

```text
42%
reduction in manual processing time
Measured during the first three months after deployment.
```

Only publish if documented.

---

# 34. Metric Display

Do not create giant metric walls.

Use metrics selectively.

Three strong verified metrics are more useful than twelve questionable ones.

---

# 35. Testimonial

A testimonial may appear only when:

```text
real
approved
attributed correctly
```

Required:

```text
quote
name
role
company
```

where permitted.

---

# 36. No Testimonial Fallback

If no real testimonial exists:

```text
do not render testimonial component
```

Use another proof mechanism.

---

# 37. Timeline

Timeline is optional.

Use only if the project duration or milestones provide useful context.

Possible:

```text
Discovery
Prototype
Architecture
Build
Testing
Launch
```

Do not publish exact dates if they are confidential.

---

# 38. Team Contribution

Where useful, describe Zytrixon's role:

```text
product strategy
UX/UI
frontend
backend
infrastructure
QA
deployment
maintenance
```

Do not claim responsibility for work performed by others.

---

# 39. Client Contribution

If relevant, distinguish:

```text
Zytrixon
client
third-party provider
```

This improves credibility.

---

# 40. Project Constraints

A strong case study can explicitly acknowledge trade-offs.

Example:

```text
The system prioritized operational simplicity over building a larger microservice architecture.
```

This can demonstrate engineering judgment without hype.

---

# 41. Performance Evidence

If performance is discussed, include measurable evidence where possible:

```text
load time
Core Web Vitals
API latency
processing time
device response
```

Do not invent benchmarks.

---

# 42. Security Evidence

Security content may include:

```text
authentication
authorization
encryption
validation
auditability
secure deployment
```

Do not disclose exploitable implementation details.

---

# 43. Scalability Evidence

Instead of saying:

> infinitely scalable

describe actual design:

```text
stateless application layer
database indexing
caching
horizontal deployment
queue-based processing
```

only when implemented.

---

# 44. Mobile Case Studies

For mobile products, show:

```text
device screens
navigation
key workflows
responsive states
```

Avoid presenting generated mockups as real product screenshots.

---

# 45. IoT Case Studies

For IoT work, explain:

```text
device
sensor
communication layer
backend
dashboard
alerts
operator workflow
```

Make the data flow understandable.

---

# 46. SaaS / ERP Case Studies

For business software, focus on:

```text
roles
workflows
data relationships
automation
reporting
integrations
```

This is stronger than showing isolated screens.

---

# 47. Real-Time Systems

For real-time projects, explain:

```text
event source
transport
server processing
client updates
failure handling
```

Technology names such as WebSocket/Socket.IO should support the explanation.

---

# 48. Payment Systems

For payment-related case studies, discuss:

```text
payment flow
verification
webhooks
failure states
reconciliation
```

Never expose real transaction information or secrets.

---

# 49. AI Case Studies

For AI-related work, explain:

```text
input
model/processing
validation
human oversight
output
business workflow
```

Do not imply autonomous intelligence where the system is simply an API wrapper.

---

# 50. Case Study Navigation

At the bottom, provide:

```text
related service
related case study
next relevant work
primary CTA
```

Avoid forcing visitors through an arbitrary sequence.

---

# 51. Case Study SEO

Each case study should have:

```text
unique title
unique description
canonical
Open Graph image
structured article/project metadata where appropriate
```

Do not create case studies solely for keyword targeting.

---

# 52. Internal Linking

Case studies should link to:

```text
relevant services
relevant insights
related work
contact
```

This should be based on actual relationships.

---

# 53. Case Study Content Workflow

Recommended:

```text
Project selected
↓
Facts collected
↓
Client permission verified
↓
Technical information documented
↓
Metrics verified
↓
Draft written
↓
Internal review
↓
Design integration
↓
QA
↓
Publish
```

---

# 54. Source of Truth

Each case study should have one canonical content record.

Do not duplicate the same project description in:

```text
homepage
work index
case study
service page
```

Instead, derive summaries where practical.

---

# 55. Summary Generation

A case study can have:

```text
long description
short summary
card summary
SEO description
```

These should be intentional variants, not duplicated paragraphs.

---

# 56. Case Study Status

Useful statuses:

```text
draft
review
approved
published
archived
```

Only approved content should reach production.

---

# 57. Case Study Review Questions

Before publishing:

```text
Is every factual claim verified?
Is client disclosure allowed?
Are screenshots safe?
Are metrics documented?
Is the technical story accurate?
Is the outcome honestly described?
Could another engineer understand the architecture?
Could a buyer understand the business problem?
```

---

# 58. Case Study Anti-Patterns

Never:

- fabricate metrics
- fabricate testimonials
- invent clients
- expose confidential information
- publish fake screenshots
- use AI-generated UI as project evidence
- list technologies without context
- hide constraints
- claim work Zytrixon did not perform
- exaggerate outcomes
- make every case study sound identical

---

# 59. Minimum Quality Standard

A case study should contain enough information for a reader to understand:

```text
what existed
what was wrong
what Zytrixon changed
how it was engineered
what was delivered
what evidence exists
```

If it cannot answer those questions, it is not ready.

---

# 60. Case Study Design Principle

The visual design should support the story.

Use:

```text
large project imagery
technical annotations
clear typography
architecture diagrams
structured metadata
```

Avoid:

```text
decorative 3D
random gradients
excessive animation
fake device mockups
```

---

# 61. Case Study Motion

Motion should be subtle.

Good:

```text
image reveal
diagram progression
section transition
```

Bad:

```text
every screenshot flying in
scroll-jacking
giant parallax
mandatory cinematic intro
```

---

# 62. Responsive Case Study

On mobile:

```text
hero stacks
metadata remains readable
images fit viewport
diagrams become scrollable or simplified
tables remain usable
CTAs remain accessible
```

---

# 63. Case Study Performance

Case studies can contain many images.

Use:

```text
responsive images
lazy loading
appropriate dimensions
modern formats
priority only for above-the-fold media
```

---

# 64. Case Study Accessibility

Images require meaningful alt text when informative.

Decorative images should not create unnecessary screen-reader noise.

Architecture diagrams need an accessible textual explanation.

---

# 65. Case Study Analytics

Useful events may include:

```text
case_study_view
case_study_cta
related_service_click
contact_start
```

Do not track unnecessary personal information.

---

# 66. Example Case Study Skeleton

```text
# Project Name

CATEGORY / INDUSTRY

Short project summary.

[Hero image]

## Context

What was the system/business?

## The problem

What was not working?

## Constraints

What made the problem difficult?

## Our approach

How did Zytrixon approach it?

## Architecture

How does the system work?

## What we built

Key capabilities.

## Technical decisions

Important trade-offs.

## Outcome

What changed?

## Evidence

Verified metrics / screenshots / testimonial.

## Related capability

Service relationship.

## Start a conversation

CTA.
```

---

# 67. Existing Zytrixon Case Study Candidates

Initial candidates from the existing portfolio:

```text
School Management System
Affiliate Marketing Application
IoT Smart Factory Dashboard
```

Before publication, gather and verify:

```text
client/context
scope
features
architecture
technology
timeline
outcomes
screenshots
permissions
```

---

# 68. Case Study Priority

Prioritize case studies that demonstrate different forms of engineering depth:

```text
business systems
complex workflows
real-time systems
IoT
payments
automation
```

Do not publicly rank them as “best” or “number one.”

---

# 69. Case Study Maintenance

Review published case studies periodically for:

```text
broken images
outdated technology claims
old URLs
changed product state
confidentiality changes
outdated metrics
```

---

# 70. Final Principle

**A case study should prove the work, not decorate the portfolio.**

The strongest case study makes a technical buyer understand:

```text
Zytrixon understood the problem.
Zytrixon made deliberate engineering decisions.
Zytrixon actually built the system.
Zytrixon can explain what changed.
```

---

# 71. Status

**Status:** Production case study specification.

**Next document:** `20-forms-and-leads.md`
