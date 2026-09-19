# Zytrixon V2 — Type System & Domain Models

**Document:** `07-type-system.md`  
**Project:** Zytrixon Website V2  
**Status:** Production TypeScript Specification  
**Depends on:** `01-brand-strategy.md`, `02-product-requirements.md`, `03-information-architecture.md`, `06-architecture.md`

---

# 1. Purpose

Zytrixon V2 must use TypeScript as an architectural safety layer, not merely as a syntax preference.

The type system should make it difficult to:

- pass invalid content into components
- confuse routes with labels
- publish incomplete case studies
- misuse service categories
- mix internal and public data
- accidentally expose sensitive fields
- create inconsistent navigation structures
- introduce untyped API payloads

The goal is **strict, useful typing without type-system theatre**.

---

# 2. Core Principle

Use types to represent real domain concepts.

Prefer:

```ts
type ServiceSlug = ...
```

over:

```ts
string
```

when a value has meaningful domain constraints.

But do not create a custom type for every string in the application.

---

# 3. TypeScript Configuration

The project should use strict TypeScript.

Required baseline:

```json
{
  "compilerOptions": {
    "strict": true
  }
}
```

Recommended additional checks should be enabled where compatible with the selected Next.js configuration.

Avoid weakening compiler settings merely to make generated code compile.

---

# 4. No `any` Policy

`any` should be treated as a code smell.

Do not use:

```ts
const data: any = ...
```

Prefer:

```ts
const data: unknown = ...
```

followed by validation or narrowing.

An exception should require a clear reason and ideally a local type boundary.

---

# 5. Unknown Over Any

External values should enter the application as `unknown`.

Examples:

- API responses
- webhook payloads
- CMS data
- URL-derived data
- browser storage
- third-party SDK responses

Then validate or narrow them before use.

---

# 6. Type Layer Architecture

Recommended:

```text
src/types/
├── common.ts
├── service.ts
├── case-study.ts
├── team.ts
├── career.ts
├── insight.ts
├── navigation.ts
├── form.ts
└── seo.ts
```

Do not split types into dozens of tiny files without a domain reason.

---

# 7. Common Primitive Types

Examples:

```ts
export type ID = string;
export type Slug = string;
export type ISODateString = string;
export type URLString = string;
```

These should only be used where they improve semantic clarity.

Do not pretend TypeScript can validate an ISO date or URL at compile time.

Runtime validation is still required for external data.

---

# 8. Service Domain

Services are central to Zytrixon's information architecture.

Define an explicit service category.

Example:

```ts
export type ServiceCategory =
  | "strategy"
  | "build"
  | "automate"
  | "grow"
  | "integrate"
  | "iot";
```

The final values must match the approved service architecture.

---

# 9. Service Slugs

Use a controlled union for known first-party service routes where practical.

Example:

```ts
export type ServiceSlug =
  | "web-development"
  | "app-development"
  | "custom-software"
  | "ai-automation"
  | "iot-solutions"
  | "digital-marketing"
  | "business-consulting"
  | "business-strategy"
  | "chatbot-integration"
  | "whatsapp-api"
  | "payment-gateway-integration";
```

If services become externally managed, use validated strings instead of forcing compile-time enumeration.

---

# 10. Service Model

Recommended conceptual model:

```ts
export interface Service {
  slug: ServiceSlug;
  title: string;
  category: ServiceCategory;
  shortDescription: string;
  description: string;
  capabilities: ServiceCapability[];
  relatedWorkSlugs: string[];
  featured: boolean;
}
```

The exact model should evolve with the actual content requirements.

---

# 11. Service Capability

Capabilities should not be arbitrary UI strings when they represent structured information.

Example:

```ts
export interface ServiceCapability {
  title: string;
  description: string;
}
```

If capabilities later need icons or links, extend the model rather than duplicating data in components.

---

# 12. Service Page Content

A service page may require richer content than the listing card.

Separate summary data from detailed page data if necessary.

Conceptually:

```text
ServiceSummary
ServiceDetail
```

Do not force every service card to carry the complete service page payload.

---

# 13. Service-Specific Content

Some services require unique modules.

Example:

```ts
type ServiceModule =
  | { type: "capabilities"; items: ServiceCapability[] }
  | { type: "workflow"; steps: WorkflowStep[] }
  | { type: "architecture"; diagram: MediaAsset }
  | { type: "calculator"; calculatorId: string }
  | { type: "case-studies"; slugs: string[] };
```

This allows structured variation without turning the page into an untyped CMS blob.

---

# 14. Discriminated Unions

Use discriminated unions for heterogeneous content.

Good:

```ts
type ContentBlock =
  | { type: "heading"; text: string }
  | { type: "paragraph"; text: string }
  | { type: "image"; asset: MediaAsset }
  | { type: "quote"; text: string; attribution?: string };
```

This is preferable to:

```ts
interface ContentBlock {
  type: string;
  [key: string]: unknown;
}
```

---

# 15. Case Study Domain

Case studies are a major proof layer for Zytrixon.

Recommended:

```ts
export interface CaseStudy {
  slug: string;
  title: string;
  client?: string;
  industry?: string;
  summary: string;
  challenge: string;
  approach: string;
  services: ServiceSlug[];
  technologies: Technology[];
  outcomes?: Outcome[];
  media: MediaAsset[];
  featured: boolean;
}
```

Do not add client names if publication permission is unavailable.

---

# 16. Outcome Model

Outcomes should support factual evidence.

Example:

```ts
export interface Outcome {
  metric?: string;
  label: string;
  description?: string;
  source?: OutcomeSource;
}
```

---

# 17. Outcome Source

Use an explicit source classification where metrics are shown.

```ts
export type OutcomeSource =
  | "client-provided"
  | "internal-measurement"
  | "production-analytics"
  | "documented-project-result";
```

If an outcome cannot be supported, do not publish it.

---

# 18. Technology Model

Technology should be represented consistently.

Example:

```ts
export interface Technology {
  name: string;
  category: TechnologyCategory;
}
```

Possible categories:

```ts
export type TechnologyCategory =
  | "frontend"
  | "backend"
  | "mobile"
  | "database"
  | "cloud"
  | "devops"
  | "ai"
  | "iot"
  | "tools";
```

---

# 19. Media Model

Do not pass raw image URLs throughout components.

Use a structured media type.

```ts
export interface MediaAsset {
  src: string;
  alt: string;
  width: number;
  height: number;
  priority?: boolean;
}
```

If a future CMS requires more metadata, extend this model.

---

# 20. Decorative Media

Decorative imagery should be explicitly distinguishable.

Possible:

```ts
export interface DecorativeMedia {
  src: string;
  width: number;
  height: number;
}
```

Decorative images should not accidentally receive misleading alt text.

---

# 21. Team Domain

Recommended:

```ts
export interface TeamMember {
  slug: string;
  name: string;
  role: string;
  bio: string;
  image?: MediaAsset;
  expertise: string[];
  socialLinks?: SocialLink[];
  featured: boolean;
}
```

Only publish information approved for public use.

---

# 22. Social Links

Use controlled platform values.

```ts
export type SocialPlatform =
  | "linkedin"
  | "github"
  | "x"
  | "instagram"
  | "dribbble";
```

Then:

```ts
export interface SocialLink {
  platform: SocialPlatform;
  url: string;
  label: string;
}
```

URLs still require runtime validation where externally supplied.

---

# 23. Career Domain

Recommended:

```ts
export interface JobPosting {
  slug: string;
  title: string;
  department: string;
  location: string;
  employmentType: EmploymentType;
  summary: string;
  responsibilities: string[];
  requirements: string[];
  status: JobStatus;
}
```

---

# 24. Employment Type

```ts
export type EmploymentType =
  | "full-time"
  | "part-time"
  | "contract"
  | "internship";
```

---

# 25. Job Status

```ts
export type JobStatus =
  | "open"
  | "paused"
  | "closed";
```

Closed jobs should not accidentally appear in active listings.

---

# 26. Insight Domain

Recommended:

```ts
export interface Insight {
  slug: string;
  title: string;
  description: string;
  author: string;
  publishedAt: ISODateString;
  updatedAt?: ISODateString;
  category: InsightCategory;
  tags: string[];
  coverImage?: MediaAsset;
}
```

---

# 27. Insight Categories

Keep the taxonomy intentionally small.

Example:

```ts
export type InsightCategory =
  | "engineering"
  | "business"
  | "automation"
  | "strategy"
  | "company";
```

Do not create dozens of categories with little content behind them.

---

# 28. Navigation Types

Navigation should be structured.

```ts
export interface NavItem {
  label: string;
  href: string;
  children?: NavItem[];
}
```

If external links are supported:

```ts
type NavItem =
  | {
      kind: "internal";
      label: string;
      href: string;
    }
  | {
      kind: "external";
      label: string;
      href: string;
      external: true;
    };
```

Use the simpler model if external navigation is rare.

---

# 29. CTA Types

Calls-to-action should remain typed enough to prevent invalid destinations.

Conceptually:

```ts
export interface CTA {
  label: string;
  href: string;
  intent?: CTAIntent;
}
```

Possible intent:

```ts
export type CTAIntent =
  | "primary"
  | "secondary"
  | "contact"
  | "explore"
  | "apply";
```

Do not let visual variant and business intent become conflated.

---

# 30. Form Types

Separate form input types from internal lead models.

Example:

```ts
export interface ContactFormInput {
  name: string;
  email: string;
  company?: string;
  phone?: string;
  projectType?: string;
  message: string;
}
```

This is the public input boundary.

---

# 31. Form Validation

The TypeScript interface does not validate form input.

Use a runtime schema:

```ts
const contactSchema = z.object({
  name: z.string().min(2),
  email: z.string().email(),
  message: z.string().min(10),
});
```

The schema should be the actual security boundary.

---

# 32. Form Result Types

Avoid ambiguous API responses such as:

```ts
{ success: true }
```

for every possible condition.

Use explicit result types.

Example:

```ts
type ContactResult =
  | { success: true }
  | { success: false; code: "validation" }
  | { success: false; code: "rate-limited" }
  | { success: false; code: "server-error" };
```

The UI can then respond appropriately.

---

# 33. API Response Types

API responses should have predictable structures.

Example:

```ts
interface ApiSuccess<T> {
  success: true;
  data: T;
}

interface ApiFailure {
  success: false;
  error: {
    code: string;
    message: string;
  };
}
```

Use this pattern only where it actually improves consistency.

---

# 34. Error Codes

Use machine-readable codes.

Example:

```ts
type ContactErrorCode =
  | "INVALID_INPUT"
  | "RATE_LIMITED"
  | "SPAM_DETECTED"
  | "SERVICE_UNAVAILABLE";
```

Do not expose internal infrastructure details to users.

---

# 35. SEO Types

SEO metadata can use a structured model.

```ts
export interface SEOConfig {
  title: string;
  description: string;
  canonical?: string;
  image?: MediaAsset;
  noIndex?: boolean;
}
```

Next.js metadata generation should transform this model into framework metadata.

---

# 36. Breadcrumb Types

```ts
export interface BreadcrumbItem {
  label: string;
  href?: string;
}
```

The current page normally does not need a link.

---

# 37. Site Configuration

Global site information should have one source of truth.

Possible:

```ts
export interface SiteConfig {
  name: string;
  tagline: string;
  description: string;
  url: string;
  email: string;
  location?: string;
  socialLinks: SocialLink[];
}
```

Avoid repeating company information across components.

---

# 38. Company Claims

Public numerical claims should be typed and centralized.

Example:

```ts
interface CompanyStat {
  value: string;
  label: string;
  source?: string;
}
```

Do not hardcode:

```tsx
<div>50+ Projects</div>
```

in five different places.

More importantly, do not publish an unverified statistic simply because it looks impressive.

---

# 39. Technology Stack Data

The technology ticker and stack sections should consume the same source of truth.

Example:

```ts
const technologies: Technology[] = [...]
```

Different UI sections may filter or group this data.

---

# 40. Content Ownership

Every piece of content should have an obvious owner.

```text
Brand copy
→ site.ts / brand content

Services
→ services.ts

Work
→ case-studies.ts

People
→ team.ts

Jobs
→ careers.ts

Insights
→ insights.ts
```

Avoid anonymous content scattered across JSX.

---

# 41. Content vs UI Strings

Not every UI string needs a content model.

UI-level strings such as:

```text
Open menu
Close
Loading
Previous
Next
```

may remain close to the component.

Business content should be centralized.

---

# 42. Route Parameters

Route parameters enter the system as strings.

Example:

```ts
params: Promise<{ slug: string }>
```

Do not assume a route parameter is a valid domain object.

Resolve:

```text
slug
 ↓
lookup
 ↓
notFound()
```

---

# 43. Safe Content Lookup

Prefer a typed helper.

Conceptually:

```ts
function getServiceBySlug(slug: string): Service | undefined
```

Then:

```ts
const service = getServiceBySlug(slug);

if (!service) {
  notFound();
}
```

This keeps route logic clean.

---

# 44. Exhaustive Switches

For discriminated unions, use exhaustive handling.

Example:

```ts
switch (block.type) {
  case "heading":
    ...
    break;
  case "paragraph":
    ...
    break;
  case "image":
    ...
    break;
  default:
    assertNever(block);
}
```

This helps catch missing UI implementations when the model changes.

---

# 45. Branded Types

Branded types may be used when confusing values would create real bugs.

Example:

```ts
type EmailAddress = string & {
  readonly __brand: "EmailAddress";
};
```

Do not overuse branded types.

Runtime validation should create the branded value.

---

# 46. Discriminated Domain States

Use unions when a feature has distinct states.

Example:

```ts
type SubmissionState =
  | { status: "idle" }
  | { status: "submitting" }
  | { status: "success" }
  | { status: "error"; message: string };
```

This is safer than several independent booleans:

```ts
isLoading
isSuccess
hasError
```

which can accidentally become contradictory.

---

# 47. Optional vs Nullable

Use optional properties when a value may be absent.

```ts
image?: MediaAsset;
```

Use `null` only when the distinction between:

```text
missing
```

and:

```text
explicitly empty
```

matters.

Do not use `null` everywhere by convention.

---

# 48. Readonly Data

Static content should preferably be immutable.

Possible:

```ts
export const services = [
  ...
] as const;
```

Use `readonly` where it protects data from accidental mutation.

Do not make every object deeply readonly if it harms usability.

---

# 49. Literal Preservation

Use `as const` selectively for configuration and controlled data.

It is useful for:

- route maps
- animation tokens
- fixed navigation
- supported categories

Do not sprinkle it everywhere without understanding the resulting types.

---

# 50. Generic Utility Types

Generics are appropriate for reusable infrastructure.

Example:

```ts
interface Result<T> {
  success: boolean;
  data?: T;
}
```

But do not create generic abstractions when a concrete type is clearer.

---

# 51. Avoid Type Gymnastics

Do not create extremely complex conditional/mapped types merely to avoid writing a few lines of code.

The project should remain understandable to normal TypeScript developers.

---

# 52. Runtime Validation Boundary

Any value crossing this boundary:

```text
outside world → application
```

should be considered untrusted.

Examples:

```text
HTTP request
CMS
URL
localStorage
third-party API
webhook
```

Validate before business logic consumes it.

---

# 53. Type Transformation

External models should not necessarily become internal models directly.

Example:

```text
CMSResponse
    ↓ transform
CaseStudy
    ↓
UI
```

This prevents vendor-specific schemas from infecting the entire application.

---

# 54. Internal vs Public Types

Do not expose internal infrastructure types to browser code.

For example:

```text
ServerLeadRecord
```

may contain:

- internal IDs
- timestamps
- provider metadata
- operational fields

The browser only needs:

```text
ContactFormInput
```

---

# 55. Secrets and Types

Never create public types that accidentally contain secrets.

Avoid passing:

```ts
{
  apiKey,
  token,
  secret,
  ...
}
```

through client component props.

Server-only data should stay on the server.

---

# 56. Component Props

Props should represent what the component actually needs.

Bad:

```ts
interface ServiceCardProps {
  service: Service;
}
```

if the card only uses:

```text
title
summary
href
```

A smaller view model may be cleaner.

---

# 57. View Models

Use view models when transformation genuinely improves separation.

Example:

```ts
interface ServiceCardModel {
  title: string;
  summary: string;
  href: string;
}
```

Transform domain content into the view model before rendering if necessary.

Do not create view models for every component automatically.

---

# 58. Avoid Prop Drilling by Default

If data must pass through several components without being used, reconsider composition.

Possible solutions:

- composition
- local data lookup
- server component boundaries
- context only for genuinely global state

Do not introduce global state just to eliminate two levels of props.

---

# 59. Context Types

If React Context is used, type both value and provider contract.

Do not create:

```ts
createContext<any>(...)
```

Context should have a narrow responsibility.

---

# 60. Hooks

Custom hooks should have explicit return contracts when inference becomes unclear.

Example:

```ts
interface UseMenuReturn {
  isOpen: boolean;
  open: () => void;
  close: () => void;
}
```

Avoid hooks that return large anonymous objects with unclear semantics.

---

# 61. Motion Types

Motion configuration should be typed.

For example:

```ts
type MotionIntensity = "subtle" | "standard" | "expressive";
```

Motion components should not accept arbitrary string configuration.

---

# 62. Breakpoint Types

Do not spread breakpoint strings throughout components.

If JavaScript needs responsive logic, centralize the relevant configuration.

Prefer CSS media queries for layout whenever possible.

---

# 63. Analytics Event Types

Analytics events should be controlled.

Example:

```ts
type AnalyticsEvent =
  | {
      name: "cta_click";
      properties: {
        label: string;
        location: string;
      };
    }
  | {
      name: "contact_submit";
      properties: {
        projectType?: string;
      };
    };
```

This prevents random event names and inconsistent payloads.

---

# 64. Analytics Privacy Types

Event properties should be explicitly defined.

Do not allow:

```ts
Record<string, unknown>
```

for every analytics event unless there is a strong reason.

Controlled events improve data quality.

---

# 65. Feature Flags

If feature flags are needed later, type them.

Example:

```ts
type FeatureFlag =
  | "new-case-study-layout"
  | "insights-search";
```

Do not introduce a feature-flag platform before there are actual feature rollout requirements.

---

# 66. Configuration Types

Configuration objects should be typed and centralized.

Examples:

```text
site configuration
navigation
SEO defaults
analytics
motion tokens
feature flags
```

Avoid configuration scattered through component files.

---

# 67. Type Naming Rules

Prefer domain-specific names:

```text
CaseStudy
JobPosting
Service
TeamMember
ContactFormInput
```

Avoid generic names:

```text
Data
Item
Object
Thing
Info
ResponseData
```

unless their scope is truly generic.

---

# 68. Enum vs Union

Prefer string unions for simple fixed application concepts:

```ts
type JobStatus = "open" | "closed";
```

Use TypeScript `enum` only when a concrete runtime enum object provides a meaningful benefit.

Do not use enums automatically.

---

# 69. Dates

Represent dates consistently.

For static content:

```ts
type ISODateString = string;
```

Use ISO-compatible strings in content.

Convert to `Date` only when date operations are actually required.

---

# 70. URLs

URLs remain strings at the TypeScript level.

Validate external/user-provided URLs at runtime.

Do not assume:

```ts
url: string
```

means the value is safe to render.

---

# 71. Type Tests

Important type-level assumptions may be tested where useful.

Examples:

- route maps
- content unions
- analytics events
- public API contracts

Do not build a huge type-test framework for trivial interfaces.

---

# 72. Content Validation

Static content should be checked before deployment.

Possible checks:

```text
missing required fields
duplicate slugs
invalid related-work references
invalid service references
invalid dates
broken media paths
```

A content validation script can catch these before production.

---

# 73. Referential Integrity

If:

```ts
relatedWorkSlugs: string[]
```

references case studies, validation should confirm those slugs exist.

Likewise:

```text
service → related work
case study → service
navigation → route
```

should be checked where practical.

---

# 74. Duplicate Slug Prevention

Slugs must be unique within their domain.

Never allow:

```text
services/web-development
services/web-development
```

or duplicate case-study slugs.

Automated validation should catch duplicates.

---

# 75. Content Schema Evolution

When a content model changes:

```text
1. Update type
2. Update content
3. Update consumers
4. Run typecheck
5. Run content validation
6. Test affected routes
```

Do not modify types without checking every consumer.

---

# 76. Public API Stability

If the website exposes an API endpoint used by external clients, treat its response shape as a contract.

Do not casually rename fields.

For internal-only route handlers, changes can be made more freely.

---

# 77. Type Ownership

The type should live near the domain that owns it.

Examples:

```text
Service → service.ts
CaseStudy → case-study.ts
Contact → form.ts
Navigation → navigation.ts
```

Shared types belong in `common.ts` only when genuinely shared.

---

# 78. Avoid `common.ts` Becoming a Junk Drawer

Do not put unrelated interfaces into:

```text
common.ts
```

just because multiple files import them.

If a type has a clear domain, keep it there.

---

# 79. Import Type

Use type-only imports where appropriate:

```ts
import type { Service } from "@/types/service";
```

This makes type/value boundaries clearer.

---

# 80. TypeScript and React Server Components

Types should not be used to accidentally pass server-only objects into client components.

Client props should be serializable according to the framework boundary.

Avoid passing:

- functions
- class instances
- database clients
- server-only objects

into Client Components.

---

# 81. Serialization Boundary

Anything crossing:

```text
Server Component → Client Component
```

should be treated as serialized data.

Prefer plain:

```text
string
number
boolean
null
arrays
plain objects
```

where supported by the framework.

---

# 82. Content Rendering Safety

Do not render arbitrary HTML strings unless absolutely necessary.

Prefer structured content.

If HTML must be rendered:

```text
trusted source
+
sanitization where required
+
strict boundary
```

Never trust user-generated HTML.

---

# 83. Markdown Content

If Markdown is introduced for insights:

```text
Markdown source
 ↓
trusted parser
 ↓
sanitized/controlled output
 ↓
rendered content
```

Do not dangerously inject raw Markdown output without understanding the parser/security model.

---

# 84. Accessibility Types

Interactive components should have prop contracts that support accessibility.

For example, icon-only controls should require accessible naming.

Avoid a generic:

```ts
IconButtonProps
```

that permits an unlabeled button.

---

# 85. Required Accessibility Props

Where appropriate, component APIs should make accessibility difficult to forget.

Example:

```ts
interface IconButtonProps {
  label: string;
  icon: ReactNode;
}
```

The accessible label becomes required.

---

# 86. Content Quality Types

Do not try to encode editorial quality entirely in TypeScript.

Types can require:

```text
title
description
slug
```

but cannot guarantee that the copy is good.

Human review remains necessary.

---

# 87. Type System Anti-Patterns

Do not:

- use `any` to silence errors
- duplicate the same interface in multiple files
- create massive generic abstractions
- type every CSS value
- create enums for everything
- put all types in one giant file
- expose server-only types to client code
- use TypeScript instead of runtime validation
- make every property optional
- hide invalid states behind nullable fields
- use `Record<string, any>`
- create types nobody understands

---

# 88. Definition of Done

The type system is ready when:

- strict TypeScript is enabled
- `any` usage is controlled
- core domains have explicit types
- service data is typed
- case studies are typed
- careers/team/insights are typed
- navigation is typed
- forms have input/result types
- runtime validation exists at external boundaries
- analytics events are controlled
- server/client boundaries are respected
- content references can be validated
- duplicate slugs can be detected
- no giant catch-all type file exists

---

# 89. Implementation Sequence

Implement the type foundation in this order:

```text
1. common primitives
2. site configuration
3. navigation
4. services
5. case studies
6. team
7. careers
8. insights
9. forms
10. SEO
11. analytics
12. validation schemas
13. content integrity checks
```

Do not build types for future features that do not yet exist.

---

# 90. Final Principle

The type system should make Zytrixon V2:

**harder to break, easier to extend, and easier to understand.**

The objective is not maximum TypeScript cleverness.

The objective is:

```text
Clear domain
+
strict contracts
+
runtime validation
+
safe boundaries
+
simple implementation
```

That is the standard for production Zytrixon code.

---

# 91. Status

**Status:** Production TypeScript/type-system specification.

**Next document:** `08-seo-strategy.md`
