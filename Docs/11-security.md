# Zytrixon V2 — Security Specification

**Document:** `11-security.md`  
**Project:** Zytrixon Website V2  
**Status:** Production Security Specification  
**Depends on:** `02-product-requirements.md`, `06-architecture.md`, `07-type-system.md`, `08-seo-strategy.md`, `09-accessibility.md`, `10-performance.md`

---

# 1. Security Objective

Zytrixon V2 is primarily a public marketing/business website, but it still handles:

- contact enquiries
- potentially personal information
- third-party integrations
- analytics
- uploaded/application data if careers functionality is enabled
- API requests
- environment secrets
- externally controlled content

Security should therefore be proportionate to the actual threat model.

The objective is:

```text
protect users
+
protect Zytrixon
+
protect integrations
+
minimize exposed attack surface
```

Do not build unnecessary enterprise infrastructure for a website that does not need it.

---

# 2. Security Principles

Follow:

```text
least privilege
secure defaults
defense in depth
server-side validation
minimal data collection
minimal dependencies
minimal exposed endpoints
fail safely
```

---

# 3. Threat Model

Relevant threats include:

```text
spam
bot abuse
credential theft
XSS
CSRF
injection
malicious file uploads
API abuse
secret exposure
dependency vulnerabilities
clickjacking
open redirects
data leakage
supply-chain attacks
```

Not every theoretical attack requires a complex mitigation.

Controls should match the feature actually deployed.

---

# 4. Public vs Private Boundary

The public website should expose only what users need.

Keep server-side:

```text
API secrets
email credentials
CRM credentials
webhook secrets
private integration configuration
internal identifiers
operational logs
```

Never send these to Client Components.

---

# 5. Secret Management

Never commit secrets to Git.

Examples:

```text
API keys
SMTP credentials
OAuth secrets
webhook secrets
database credentials
captcha secrets
analytics write secrets
```

Use environment variables or the deployment platform's secret manager.

---

# 6. Public Environment Variables

Anything prefixed with:

```text
NEXT_PUBLIC_
```

must be assumed public.

Never place secrets in public environment variables.

---

# 7. Repository Secret Scanning

Before release, scan the repository for:

```text
API keys
tokens
passwords
private keys
connection strings
```

Use automated secret scanning where available.

---

# 8. Git Hygiene

Never commit:

```text
.env
.env.local
.env.production
credentials.json
private certificates
deployment secrets
```

Provide a safe example:

```text
.env.example
```

containing names but not actual secrets.

---

# 9. Input Validation

All external input is untrusted.

Validate on the server:

```text
type
length
format
allowed values
size
```

Use Zod or equivalent runtime validation.

---

# 10. Client Validation Is Not Security

Client-side validation improves UX.

It does not protect the server.

Attackers can call:

```text
/api/contact
```

directly.

Therefore server validation is mandatory.

---

# 11. Input Length Limits

Set sensible maximum lengths.

Example categories:

```text
name
email
company
phone
message
```

Do not allow unlimited strings.

This reduces:

- abuse
- memory consumption
- log pollution
- downstream failures

---

# 12. Payload Size Limits

API routes should reject unexpectedly large payloads.

Especially important if file uploads are introduced.

Do not accept multi-megabyte payloads for a simple text contact form.

---

# 13. XSS Prevention

React escapes normal rendered text.

Do not bypass this protection unnecessarily.

Avoid:

```tsx
dangerouslySetInnerHTML
```

unless there is a controlled, reviewed use case.

---

# 14. HTML Sanitization

If trusted/untrusted rich HTML must be rendered:

```text
validate source
+
sanitize
+
render through a controlled boundary
```

Never assume CMS/user content is safe merely because it came from a database.

---

# 15. Markdown Security

If Markdown is supported:

- use a trusted parser
- understand HTML passthrough behaviour
- sanitize where necessary
- prevent script injection
- test malicious input

---

# 16. URL Validation

Any user-controlled or externally supplied URL should be validated before rendering as a link.

Watch for dangerous schemes such as:

```text
javascript:
data:
```

where inappropriate.

---

# 17. Open Redirect Prevention

Do not blindly redirect users to arbitrary query parameters.

Bad concept:

```text
/redirect?url=<attacker-url>
```

unless the destination is validated against an allowlist.

---

# 18. CSRF

Evaluate CSRF protection for any state-changing endpoint.

Especially relevant if authentication/cookies are introduced.

For simple public form endpoints, use an architecture appropriate to the deployment and request model rather than adding unnecessary complexity.

---

# 19. Same-Origin Strategy

Keep website APIs same-origin where possible.

Example:

```text
zytrixontech.com
    ↓
/api/contact
```

This reduces unnecessary cross-origin complexity.

---

# 20. CORS

Do not use:

```text
Access-Control-Allow-Origin: *
```

by default.

Only allow cross-origin requests when an actual external consumer requires them.

---

# 21. Authentication

Do not introduce authentication until a real private feature requires it.

If authentication is later added:

```text
identity provider
+
secure session management
+
server-side authorization
```

must be designed separately.

---

# 22. Authorization

Authentication answers:

> Who are you?

Authorization answers:

> What are you allowed to do?

Never assume that being authenticated grants access to every server action.

---

# 23. Server Actions

Server Actions can be useful for website forms and mutations.

Treat them as server endpoints from a security perspective.

Validate:

```text
input
authorization
origin/request assumptions
```

where relevant.

---

# 24. API Route Security

Every API route should have:

```text
clear purpose
input validation
rate limiting where appropriate
safe errors
appropriate HTTP methods
payload limits
```

Do not create generic endpoints such as:

```text
/api/proxy
/api/fetch
```

without strict controls.

---

# 25. HTTP Methods

Use appropriate methods.

For example:

```text
POST → create/submit
GET → retrieve
```

Do not mutate server state through GET requests.

---

# 26. Rate Limiting

Rate-limit public mutation endpoints.

Especially:

```text
contact
newsletter
career application
authentication
```

if implemented.

---

# 27. Rate Limit Strategy

A practical contact endpoint might use:

```text
IP/request controls
+
time window
+
abuse detection
```

Do not make limits so aggressive that legitimate users are blocked.

---

# 28. Spam Prevention

Contact forms are attractive bot targets.

Use layered controls where necessary:

```text
rate limiting
+
honeypot
+
request validation
+
captcha/challenge only if justified
```

Do not force CAPTCHA on every visitor by default.

---

# 29. Honeypot

A hidden honeypot field can catch simple bots.

It must not interfere with:

- screen readers
- keyboard users
- password managers

Accessibility comes first.

---

# 30. CAPTCHA

Use CAPTCHA only when simpler controls are insufficient.

CAPTCHA introduces:

```text
UX cost
+
accessibility cost
+
third-party dependency
```

It should solve a demonstrated abuse problem.

---

# 31. Email Injection

Never directly concatenate untrusted user input into email headers.

Especially protect:

```text
To
From
Reply-To
Subject
```

Use a trusted email provider/API and structured parameters.

---

# 32. Email Handling

For contact submissions:

```text
user input
 ↓
validated data
 ↓
server-side email service
```

Do not expose SMTP credentials to the browser.

---

# 33. Contact Data

Collect only what is actually needed.

Potentially:

```text
name
email
company
project information
message
```

Avoid unnecessary personal-data collection.

---

# 34. Privacy

The privacy policy should accurately explain:

- what data is collected
- why it is collected
- how it is used
- retention where relevant
- third-party processors
- user choices/rights as applicable

Do not publish a generic copied privacy policy that does not match implementation.

---

# 35. Data Retention

Do not retain contact/application data indefinitely without reason.

Define retention expectations appropriate to:

```text
business need
legal requirements
operational needs
```

---

# 36. Logs

Logs should not contain unnecessary personal data.

Never log:

```text
passwords
tokens
API keys
full sensitive form contents
```

Use identifiers that allow troubleshooting without exposing unnecessary information.

---

# 37. Error Messages

User-facing errors should be useful but safe.

Bad:

```text
MongoDB connection string failed: password=...
```

Better:

```text
Something went wrong. Please try again.
```

Log detailed diagnostics securely on the server.

---

# 38. Production Error Handling

Never expose:

- stack traces
- source paths
- environment variables
- database errors
- internal service names

to public users.

---

# 39. Security Headers

Evaluate and configure appropriate security headers.

Important areas:

```text
Content-Security-Policy
X-Content-Type-Options
Referrer-Policy
Permissions-Policy
frame-ancestors
```

Some protections are implemented through CSP rather than legacy headers.

---

# 40. Content Security Policy

CSP should be restrictive enough to reduce XSS risk.

Typical considerations include:

```text
default-src
script-src
style-src
img-src
font-src
connect-src
frame-src
object-src
base-uri
frame-ancestors
```

Do not blindly copy a CSP from another website.

---

# 41. CSP Rollout

A practical approach:

```text
1. inventory third parties
2. define policy
3. test
4. monitor violations
5. tighten
6. enforce
```

Do not deploy a broken CSP that prevents core functionality.

---

# 42. Third-Party Trust

Every third-party dependency or service expands the trust boundary.

Review:

```text
analytics
fonts
maps
chat
CRM
captcha
email
payment tools
```

Only integrate what is necessary.

---

# 43. Dependency Security

Keep dependencies current within a controlled update strategy.

Monitor for:

```text
known vulnerabilities
malicious packages
abandoned packages
unexpected transitive dependencies
```

---

# 44. Lockfile

Commit the package manager lockfile.

This improves:

- reproducibility
- dependency auditing
- deployment consistency

---

# 45. Dependency Review

Before adding a package:

```text
Does native browser/React/Next.js functionality already solve this?
Is the package maintained?
How many dependencies does it pull?
Does it execute client-side?
Does it process sensitive data?
```

---

# 46. Supply-Chain Risk

Avoid installing packages solely because an AI-generated implementation suggests them.

Every dependency should be reviewed.

This is especially important for:

```text
animation
icons
analytics
form
utility
```

packages.

---

# 47. SVG Security

Do not blindly render arbitrary SVG uploaded or supplied by users.

Untrusted SVG can contain active content.

Prefer controlled/static assets.

---

# 48. File Uploads

If career applications or contact attachments support uploads, implement a separate upload security model.

Controls should include:

```text
allowed file types
maximum size
content validation
safe filenames
storage isolation
malware scanning where appropriate
access control
```

---

# 49. File Names

Never use user-provided filenames directly as filesystem paths.

Generate server-side safe identifiers.

---

# 50. Path Traversal

Never construct filesystem paths directly from untrusted input.

Avoid patterns equivalent to:

```text
/path/" + userInput
```

without strict validation.

---

# 51. SSRF

If the server fetches a URL supplied by users, SSRF becomes a concern.

Avoid generic:

```text
server fetch arbitrary URL
```

features.

If required, use strict allowlists and network controls.

---

# 52. Proxy Endpoints

Do not expose a generic backend proxy to hide API keys.

If an external API must be called server-side:

```text
specific endpoint
+
specific input schema
+
specific upstream
+
controlled response
```

---

# 53. Webhooks

If webhooks are introduced:

- authenticate requests
- validate signatures
- protect replay
- validate payloads
- limit payload size
- log safely

Never trust a webhook merely because it hits a secret-looking URL.

---

# 54. API Keys

Use separate credentials for:

```text
development
staging
production
```

where supported.

Never reuse high-privilege production keys locally.

---

# 55. Least Privilege

Integration credentials should have the minimum permissions required.

Example:

A form email integration should not receive broad administrative access to an entire platform.

---

# 56. Database Security

If a database is introduced later:

- private network access where possible
- strong credentials
- least-privilege accounts
- encrypted connections
- backups
- controlled migrations

Do not expose a database directly to the browser.

---

# 57. CMS Security

If a CMS is added:

- use role-based access
- protect admin routes
- secure API tokens
- validate content
- review preview/draft routes
- prevent accidental publication

---

# 58. Preview Routes

Preview/draft functionality must not accidentally become public indexable content.

Use:

```text
authentication
+
noindex
+
controlled preview tokens
```

where appropriate.

---

# 59. Robots Is Not Security

Never treat:

```text
robots.txt
```

as access control.

A URL disallowed from crawlers is still publicly reachable unless authentication/network controls protect it.

---

# 60. Security and SEO

Security configuration must not accidentally break:

```text
crawler access
images
fonts
structured data
canonical URLs
analytics
```

Test production behaviour after security headers are enabled.

---

# 61. Clickjacking

Pages containing sensitive interactions should not be embeddable by untrusted origins.

Use appropriate CSP:

```text
frame-ancestors
```

according to actual embedding requirements.

---

# 62. Referrer Policy

Use a privacy-conscious referrer policy appropriate to the website.

Do not unnecessarily leak full URLs containing potentially sensitive query data.

---

# 63. Permissions Policy

Restrict browser capabilities that the website does not need.

Examples may include:

```text
camera
microphone
geolocation
```

Do not grant powerful browser APIs without a real feature requirement.

---

# 64. HTTPS

Production must use HTTPS.

All canonical/public URLs should use HTTPS.

HTTP should redirect appropriately to HTTPS where deployment architecture supports it.

---

# 65. Secure Cookies

If cookies are used for authentication/session functionality, evaluate:

```text
Secure
HttpOnly
SameSite
```

attributes according to the authentication model.

Do not store sensitive tokens in insecure browser storage without a deliberate security model.

---

# 66. Browser Storage

Do not put sensitive information into:

```text
localStorage
sessionStorage
```

unless the security implications are explicitly understood.

---

# 67. Authentication Tokens

If authenticated features are introduced, avoid exposing long-lived sensitive tokens to JavaScript where a secure server-side session mechanism is available.

---

# 68. Passwords

If Zytrixon V2 ever manages passwords directly:

- never store plaintext passwords
- use a modern password hashing algorithm
- enforce appropriate password policies
- protect reset flows
- rate-limit authentication

Prefer a reputable identity provider when practical.

---

# 69. Account Recovery

If accounts are introduced, recovery flows become a security-critical feature.

Requirements include:

```text
expiring tokens
single-use reset links
rate limiting
safe responses
no account enumeration
```

---

# 70. Account Enumeration

Avoid responses that reveal whether a private account exists.

Example:

Do not expose:

```text
Email exists.
```

in an unauthenticated password-reset flow.

---

# 71. Session Security

If authenticated sessions exist:

```text
short appropriate lifetime
secure cookie
server-side validation
logout/invalidation
session rotation where appropriate
```

must be considered.

---

# 72. Security Monitoring

Monitor for:

```text
abnormal form submissions
API spikes
repeated failed actions
dependency vulnerabilities
CSP violations
deployment anomalies
```

Monitoring should be proportional to traffic and risk.

---

# 73. Rate-Limit Observability

Rate limiting should produce enough telemetry to understand abuse without logging excessive personal data.

Track:

```text
endpoint
time
outcome
coarse identifier where appropriate
```

---

# 74. Abuse Response

Have a simple response path for obvious abuse:

```text
detect
→ rate limit/block
→ inspect
→ adjust controls
```

Do not over-engineer bot infrastructure before abuse exists.

---

# 75. Production Security Configuration

Security configuration should differ appropriately between:

```text
development
staging
production
```

Production should be the strictest.

---

# 76. Staging Security

Staging should not contain real secrets or unnecessary production data.

Prefer:

```text
test credentials
test integrations
synthetic data
access controls
```

---

# 77. Backup and Recovery

If the website stores persistent business data:

- define backup strategy
- test restoration
- understand recovery time
- understand recovery point

A backup that has never been restored is not a proven backup.

---

# 78. Deployment Security

Production deployment should use:

```text
protected secrets
reviewed changes
locked dependencies
automated checks
restricted deployment permissions
```

Avoid sharing production credentials casually.

---

# 79. CI Security

CI should:

- run lint/typecheck/tests
- audit dependencies where appropriate
- prevent accidental secret exposure
- avoid printing secrets
- use least-privilege tokens

---

# 80. Branch Protection

For a team repository, protect the production branch with appropriate review/check requirements.

Do not allow unreviewed changes to silently reach production.

---

# 81. Security Testing

Before release test:

```text
XSS attempts
invalid input
oversized input
API abuse
rate limiting
open redirect behaviour
security headers
CSP
file upload controls
error leakage
```

where the corresponding feature exists.

---

# 82. Automated Security Checks

Use appropriate tools for:

```text
dependency auditing
secret scanning
static analysis
headers
basic vulnerability checks
```

Automated checks are useful but do not replace threat-aware manual review.

---

# 83. Security QA Matrix

Test at minimum:

```text
Homepage
Services
Work
Insights
Careers
Contact
API endpoints
```

Focus especially on:

```text
forms
uploads
dynamic routes
third-party integrations
```

---

# 84. Security Incident Preparation

Even a small company website should know:

```text
who owns the deployment
where secrets are stored
how to rotate credentials
how to disable a compromised integration
how to restore deployment
```

Document this operationally.

---

# 85. Credential Rotation

Be able to rotate:

```text
API keys
email credentials
webhook secrets
OAuth secrets
deployment tokens
```

without rewriting application architecture.

---

# 86. Secret Rotation Test

At least once during production preparation, verify that a credential can be replaced without downtime or emergency code edits where the platform supports it.

---

# 87. Privacy vs Analytics

Analytics should not become a shadow database of visitor behaviour.

Collect only what supports legitimate measurement.

Avoid:

```text
full form contents
sensitive query parameters
unnecessary personal identifiers
```

---

# 88. Security and Accessibility

Security controls must not create accessibility failures.

Examples:

```text
CAPTCHA
cookie notices
authentication
focus traps
error messages
```

must remain usable by keyboard and assistive technology.

---

# 89. Security and Performance

Security should not automatically mean adding:

```text
five scripts
three middleware layers
large client libraries
```

Prefer server-side, platform-native and lightweight controls where practical.

---

# 90. Security Architecture Anti-Patterns

Never:

- commit secrets
- trust client validation
- expose API keys
- use wildcard CORS by default
- create generic proxy endpoints
- expose stack traces
- trust user HTML
- blindly render SVG uploads
- accept unlimited payloads
- skip rate limiting on abuse-prone endpoints
- use robots.txt as access control
- install dependencies without review
- give integrations excessive permissions
- store sensitive tokens casually in browser storage
- build authentication before there is a real requirement

---

# 91. Security Release Checklist

```text
[ ] Secrets absent from repository
[ ] .env files ignored
[ ] Production secrets configured securely
[ ] Server/client boundaries checked
[ ] External inputs validated
[ ] Payload limits defined
[ ] XSS risks reviewed
[ ] URL validation reviewed
[ ] API methods restricted
[ ] Rate limiting configured where needed
[ ] Spam controls configured
[ ] CORS reviewed
[ ] CSP reviewed
[ ] Security headers reviewed
[ ] HTTPS verified
[ ] Error leakage checked
[ ] Dependency audit performed
[ ] Secret scan performed
[ ] Upload security reviewed if applicable
[ ] Privacy implementation reviewed
[ ] Third-party integrations reviewed
[ ] Least privilege applied
[ ] Credential rotation understood
[ ] Production/staging separation verified
```

---

# 92. Security Definition of Done

Security is ready when:

- no secrets are client-exposed
- all external input has server-side validation
- public mutation endpoints have abuse controls
- errors do not leak internals
- security headers are configured and tested
- CSP is understood and validated
- dependencies are reviewed
- privacy practices match implementation
- file uploads are secured if present
- third-party access is minimized
- deployment secrets are protected
- security checks are part of release
- incident/credential-rotation basics are documented

---

# 93. Proportional Security

Zytrixon V2 does not need a banking-grade security platform if it is only serving public content and a contact form.

It does need:

```text
strong boundaries
+
safe input
+
protected secrets
+
abuse controls
+
secure deployment
```

If the website later evolves into:

```text
SaaS
+
customer dashboard
+
payments
+
accounts
+
business data
```

the security architecture must be revisited.

---

# 94. Final Principle

**The safest feature is often the feature that does not need to exist.**

Every:

```text
endpoint
dependency
integration
stored field
admin route
client-side secret
```

increases attack surface.

Zytrixon V2 should therefore remain deliberately small at the security boundary.

Build strong controls around real risk.

Do not build complexity for imaginary attackers.

---

# 95. Status

**Status:** Production security specification.

**Next document:** `12-testing.md`
