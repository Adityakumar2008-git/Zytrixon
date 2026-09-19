# 20 — Forms & Leads

## 1. Purpose

Forms are not decorative UI. They are controlled entry points into Zytrixon's business workflow.

The form system must:

- make it easy for a legitimate prospect to explain what they need;
- collect enough information for a useful first response;
- avoid collecting unnecessary personal data;
- resist spam, abuse, and automated submissions;
- provide clear feedback during submission;
- preserve accessibility and keyboard usability;
- support reliable internal notifications;
- remain ready for CRM integration without coupling the website to a specific CRM;
- produce measurable, privacy-conscious analytics;
- fail safely when email, persistence, or downstream services are unavailable.

The goal is **qualified conversation, not maximum form completion at any cost**.

---

# 2. Form Philosophy

## 2.1 Principles

1. Ask only for information that changes the next step.
2. Prefer a small number of useful fields over a long questionnaire.
3. Explain why an unusual field is needed.
4. Never make a user solve unnecessary puzzles to contact Zytrixon.
5. Validate on both client and server.
6. Treat every submission as untrusted input.
7. Never trust hidden fields, client-side validation, or browser-provided metadata.
8. Do not expose internal lead information to the browser.
9. Do not put sensitive personal information into analytics event payloads.
10. Do not promise response times unless Zytrixon has actually committed to them.
11. Keep the website form layer independent from any CRM/provider.
12. Make failure states recoverable.

---

# 3. Form Inventory

The initial system should support these form categories.

| Form | Primary purpose | Priority |
|---|---|---:|
| Contact / Start a conversation | General business inquiry | P0 |
| Project / Quote inquiry | Structured software/project inquiry | P0 |
| Careers application | Job application | P1 |
| Newsletter / Insights signup | Optional content subscription | P2 |
| Service-specific inquiry | Context-aware lead capture | P2 |
| CRM webhook integration | Internal workflow | P2 |

Do not build every form immediately.

Start with the two revenue-relevant flows:

1. **Contact**
2. **Project / Quote**

Careers can follow when the hiring workflow is confirmed.

---

# 4. Primary Contact Form

## 4.1 Purpose

For users who know they want to speak with Zytrixon but are not ready to complete a detailed project brief.

## 4.2 Recommended fields

| Field | Required | Type |
|---|---:|---|
| Name | Yes | Text |
| Work email | Yes | Email |
| Company / organization | No | Text |
| Phone / WhatsApp | No | Tel |
| What can we help with? | Yes | Select / segmented choice |
| Message | Yes | Textarea |
| Preferred contact method | No | Select |
| Consent | Yes where legally required | Checkbox |

Suggested inquiry categories:

- Custom software
- Web development
- Mobile application
- AI / automation
- IoT
- Business systems / ERP
- Integrations
- Digital growth
- Existing system improvement
- Other

Do not force a user to know Zytrixon's internal service taxonomy.

## 4.3 Message guidance

Use useful microcopy rather than generic instructions.

Example:

> Tell us what you are trying to build, fix, automate, or improve.

Optional supporting text:

> A few sentences are enough. Include your current setup, the problem, and what outcome you need if you know them.

Avoid:

> Enter your query here.

---

# 5. Project / Quote Form

## 5.1 Purpose

For users who want a more structured project discussion.

This form should not become an artificial procurement document.

## 5.2 Recommended fields

### Contact

- Name — required
- Work email — required
- Company / organization — required
- Phone / WhatsApp — optional

### Project

- Project type — required
- What are you trying to achieve? — required
- Current system / process — optional
- Main requirements — required
- Target timeline — optional
- Approximate budget range — optional
- Existing website / product URL — optional

### Context

- Industry — optional
- Team size / organization size — optional
- Current technology — optional
- How did you hear about Zytrixon? — optional

### Attachment

Optional.

Only enable attachments when there is a clear business reason.

Examples:

- existing requirement document;
- architecture diagram;
- product brief;
- relevant screenshot;
- proposal/RFP.

Do not request sensitive documents unless necessary.

---

# 6. Required vs Optional Fields

The distinction must be intentional.

## Required

A field should be required only when the absence of that information prevents Zytrixon from reasonably responding.

Good candidates:

- name;
- email;
- inquiry type;
- basic project/problem description;
- legally necessary consent.

## Optional

Use optional fields for information that improves qualification but is not necessary to start the conversation.

Examples:

- phone;
- company;
- budget;
- timeline;
- current technology;
- referral source.

Never make budget mandatory simply because it is useful internally.

---

# 7. Field Design

## 7.1 Labels

Every field must have a visible, persistent label.

Do not rely exclusively on placeholders.

Bad:

```text
[ Your email ]
```

Better:

```text
Work email
[ name@company.com ]
```

## 7.2 Placeholder rules

Placeholders are examples, not labels.

Use them only when they improve comprehension.

## 7.3 Selects

Do not create huge dropdowns.

If there are fewer than roughly 5–7 meaningful choices, consider radio buttons or segmented controls where appropriate.

Always include:

- a meaningful default state;
- a clear way to change the choice;
- keyboard accessibility.

## 7.4 Textareas

Do not impose tiny character limits.

Use reasonable server-side maximums to protect infrastructure.

Example:

```text
Message: 10–5000 characters
Project description: 10–10000 characters
```

These values are implementation examples and should be adjusted to actual product requirements.

---

# 8. Validation Architecture

Validation exists at two layers.

## 8.1 Client-side validation

Purpose:

- immediate feedback;
- reduce avoidable submission errors;
- improve UX.

Client validation must never be treated as a security boundary.

## 8.2 Server-side validation

Purpose:

- enforce the actual contract;
- reject malformed requests;
- protect downstream services;
- normalize accepted data.

The server is authoritative.

---

# 9. Schema Validation

Use a typed schema validation library such as **Zod** unless the project architecture establishes a better equivalent.

Example conceptual schema:

```ts
const contactSchema = z.object({
  name: z.string().trim().min(2).max(100),
  email: z.string().trim().email().max(254),
  company: z.string().trim().max(150).optional(),
  phone: z.string().trim().max(40).optional(),
  inquiryType: z.enum([
    "custom-software",
    "web",
    "mobile",
    "ai-automation",
    "iot",
    "erp",
    "integration",
    "digital-growth",
    "existing-system",
    "other",
  ]),
  message: z.string().trim().min(10).max(5000),
  consent: z.literal(true),
});
```

The exact schema belongs in the implementation layer and must remain aligned with the documented form contract.

---

# 10. Normalization

Before persistence or notification:

- trim surrounding whitespace;
- normalize email casing where appropriate;
- normalize empty optional strings to `undefined`/`null`;
- normalize phone representation without assuming a country;
- preserve user-entered message meaning;
- do not silently rewrite substantive text.

Do not use aggressive normalization that changes names or messages.

---

# 11. Sanitization

All submitted values are untrusted.

The system must protect against:

- HTML injection;
- script injection;
- header injection;
- malformed payloads;
- oversized requests;
- malicious attachment names;
- unexpected Unicode/control characters where relevant.

Never concatenate raw user input into HTML email templates.

Prefer:

- escaped template variables;
- structured email templates;
- plain-text fallback;
- safe rendering components.

If rich text is ever accepted, use an explicit allowlist sanitizer.

Do not accept HTML in normal contact messages.

---

# 12. Spam and Bot Protection

Spam prevention should be layered.

## Layer 1 — Rate limiting

Apply server-side rate limits to submission endpoints.

Limits should consider:

- IP;
- route;
- authenticated state if applicable;
- email address where appropriate;
- time window.

Do not rely exclusively on IP because legitimate users can share addresses.

## Layer 2 — Honeypot

Include a hidden honeypot field that normal users do not interact with.

A filled honeypot should normally cause the submission to be silently rejected or safely discarded.

Do not reveal the exact anti-spam rule to the attacker.

## Layer 3 — Timing heuristic

Extremely fast automated submissions may be suspicious.

Use timing only as a signal, not as the sole rejection criterion.

Do not reject legitimate users simply because they type quickly.

## Layer 4 — CAPTCHA / Turnstile

Use a challenge such as Cloudflare Turnstile only when abuse levels justify it.

Do not put CAPTCHA on every form by default.

The system should allow the protection layer to be enabled without rewriting the form architecture.

---

# 13. Submission API

Forms should submit to a controlled server endpoint.

Conceptual flow:

```text
Browser
  ↓
Client validation
  ↓
POST /api/contact
  ↓
Request size check
  ↓
Rate limit
  ↓
Bot checks
  ↓
Schema validation
  ↓
Normalization
  ↓
Lead persistence
  ↓
Notification
  ↓
Confirmation response
```

The browser must never call a privileged email provider or CRM API directly.

For the Laravel implementation, prefer:

```text
Blade form
  ↓
Laravel web route
  ↓
Controller
  ↓
Form Request validation
  ↓
Lead service
```

Use JSON responses only for genuinely asynchronous interactions.

---

# 14. Response Contract

Use predictable structured responses.

Success:

```json
{
  "success": true,
  "message": "Your message has been received."
}
```

Validation failure:

```json
{
  "success": false,
  "code": "VALIDATION_ERROR",
  "fieldErrors": {}
}
```

Rate limited:

```json
{
  "success": false,
  "code": "RATE_LIMITED",
  "message": "Please try again later."
}
```

Server failure:

```json
{
  "success": false,
  "code": "SUBMISSION_FAILED",
  "message": "We could not submit your message. Please try again."
}
```

Do not expose stack traces, provider errors, database errors, or internal IDs.

---

# 15. Persistence

A production lead system should be designed so persistence can be added without changing the public form contract.

Possible lead record:

```ts
type Lead = {
  id: string;
  type: "contact" | "project";
  name: string;
  email: string;
  company?: string;
  phone?: string;
  inquiryType?: string;
  message: string;
  source?: string;
  campaign?: string;
  createdAt: string;
};
```

The actual production model may include:

- status;
- assignment;
- notes;
- consent timestamp;
- attribution;
- source metadata;
- notification state;
- CRM synchronization state.

Do not expose internal fields to the public client.

---

# 16. Database / CRM Strategy

The website should not be tightly coupled to one CRM.

Use an internal service abstraction:

```text
LeadService
 ├── createLead()
 ├── notifyTeam()
 ├── sendConfirmation()
 └── syncCRM()
```

Possible future adapters:

```text
LeadService
 ├── DatabaseAdapter
 ├── EmailAdapter
 └── CRMAdapter
```

This makes it possible to change:

- CRM;
- email provider;
- database;
- notification system

without rewriting the form UI.

---

# 17. Email Architecture

Use a provider abstraction.

Example:

```ts
interface EmailProvider {
  send(message: EmailMessage): Promise<EmailResult>;
}
```

Do not scatter provider-specific API calls throughout React components or route handlers.

Potential providers can be selected later based on:

- deliverability;
- India/global support;
- pricing;
- API reliability;
- domain authentication;
- operational simplicity.

---

# 18. Internal Lead Notification

When a lead is successfully accepted, internal notification should contain useful context.

Example:

```text
New Zytrixon Website Lead

Type: Project Inquiry
Name: ...
Email: ...
Company: ...
Inquiry: AI / Automation

Message:
...

Timeline: ...
Budget: ...
Source: ...
Landing page: ...
Submitted: ...
```

The notification should make the next human action obvious.

Do not include:

- passwords;
- payment information;
- unnecessary personal data;
- raw technical metadata;
- full cookies;
- authentication tokens.

---

# 19. User Confirmation Email

If an email is supplied and confirmation is appropriate, send a short confirmation.

Example:

> We received your message and have the details you shared.
>
> Zytrixon will review the request and follow up through the contact details you provided.

Do not promise:

> We will reply within 2 hours.

unless Zytrixon actually operates under that response commitment.

Avoid marketing content in a transactional confirmation unless the relevant consent and legal basis exist.

---

# 20. Delivery Failure Handling

Email delivery failure must not automatically mean lead loss.

Recommended sequence:

```text
Validate
  ↓
Persist lead
  ↓
Attempt notification
  ↓
If notification fails:
    retain lead
    record failure
    retry safely
```

A lead should not disappear merely because an email provider is temporarily unavailable.

---

# 21. Idempotency

Submission endpoints should consider duplicate submissions.

Potential mechanism:

- client-generated request ID;
- server-generated idempotency key;
- short-lived duplicate detection.

If a user clicks submit twice, the system should avoid creating two identical leads where reasonably detectable.

Do not silently discard genuinely separate inquiries.

---

# 22. Retry Strategy

Retries should apply to transient downstream failures.

Examples:

- email provider timeout;
- temporary CRM outage;
- temporary network error.

Do not endlessly retry invalid requests.

Use:

- bounded retries;
- exponential backoff;
- provider timeouts;
- failure logging.

If a queue is later introduced, it must solve a demonstrated reliability/scale problem rather than being added for architectural fashion.

---

# 23. CSRF

CSRF protection depends on the authentication/session architecture.

For cookie-based authenticated endpoints:

- use an appropriate CSRF defense;
- validate origin where appropriate;
- use secure cookie configuration.

For stateless public APIs without ambient authentication cookies, traditional CSRF exposure differs, but:

- CORS must still be intentional;
- origin handling must be explicit;
- rate limiting and request validation remain mandatory.

Do not blindly add a CSRF package without understanding the request model.

---

# 24. CORS

Public form APIs should have a deliberately restricted origin policy.

Do not use:

```text
Access-Control-Allow-Origin: *
```

for a privileged or sensitive endpoint without a documented reason.

Production should explicitly recognize the Zytrixon website origin(s).

---

# 25. Request Size Limits

Set limits on:

- request body;
- individual text fields;
- attachment size;
- attachment count;
- attachment type.

Reject oversized requests before expensive processing.

---

# 26. Attachments

If attachments are enabled:

## Allowed types

Prefer a small allowlist.

Examples:

- PDF;
- PNG;
- JPEG;
- WebP;
- DOCX.

Do not allow arbitrary executable formats.

## Security

Never trust:

- file extension;
- MIME type supplied by the browser;
- original filename.

Perform server-side checks.

Recommended protections:

- size limits;
- content-type validation;
- filename normalization;
- malware scanning where infrastructure supports it;
- private object storage;
- signed access URLs where required.

Never execute uploaded files.

---

# 27. Privacy and Data Minimization

The form should collect only data that has a clear purpose.

Avoid asking for:

- government ID;
- passwords;
- payment card details;
- unrelated demographic information;
- sensitive personal information.

The privacy notice should explain:

- what is collected;
- why it is collected;
- how it is used;
- who may receive it;
- retention principles;
- how users can make privacy requests where applicable.

Legal wording should be reviewed against the jurisdictions and actual data practices of Zytrixon.

Do not invent compliance claims.

---

# 28. Consent

Consent must be specific and understandable.

Example:

> I agree that Zytrixon may use the information I provide to respond to this inquiry.

Marketing consent should be separate if needed.

Do not combine:

```text
I agree to be contacted, receive marketing, accept all policies, and share my data with partners.
```

into one mandatory checkbox.

Record:

- consent state;
- timestamp;
- form/context;
- policy version where appropriate.

---

# 29. Analytics

Track form behavior without sending unnecessary PII.

Recommended events:

```text
contact_form_view
contact_form_start
contact_form_field_error
contact_form_submit
contact_form_success
contact_form_failure
project_form_view
project_form_start
project_form_submit
```

Do not send:

- name;
- email;
- phone;
- message;
- project description

as analytics event properties.

---

# 30. Attribution

Capture useful campaign context where technically and legally appropriate.

Potential fields:

- UTM source;
- UTM medium;
- UTM campaign;
- UTM content;
- landing page;
- referrer;
- initial landing page;
- timestamp.

Keep attribution separate from user-entered lead content.

Example:

```ts
type Attribution = {
  source?: string;
  medium?: string;
  campaign?: string;
  content?: string;
  referrer?: string;
  landingPage?: string;
};
```

Do not claim an attribution model is accurate if it only represents last-touch data.

---

# 31. Source of Truth

Form definitions should not be duplicated across:

- JSX;
- validation;
- analytics;
- API;
- email templates.

Where practical, define typed configuration/content that can be reused.

However, do not over-abstract simple forms merely to eliminate a few duplicated lines.

Clarity beats abstraction.

---

# 32. User Experience States

Every form needs explicit states.

## Idle

The user can understand what to enter.

## Editing

Fields provide clear feedback without distracting the user.

## Validation error

Show errors:

- near the relevant field;
- in understandable language;
- without destroying entered data.

Example:

> Enter a valid work email.

Not:

> Invalid input.

## Submitting

The submit control should:

- indicate progress;
- prevent accidental duplicate clicks;
- remain accessible.

Do not disable the entire page.

## Success

Clearly confirm that the submission was accepted.

Example:

> Message received.

Then explain what happens next only if that process is real.

## Failure

Provide a useful recovery path.

Example:

> We couldn't submit your message. Check your connection and try again.

If appropriate, preserve the user's entered data.

---

# 33. Accessibility

Forms must satisfy the accessibility requirements defined in `09-accessibility.md`.

Minimum requirements:

- visible labels;
- correct semantic controls;
- keyboard navigation;
- logical tab order;
- sufficient focus visibility;
- error association using accessible descriptions;
- screen-reader announcements for submission state changes;
- no color-only error indication;
- touch targets appropriate for mobile;
- autocomplete attributes where useful;
- appropriate `inputMode` and `type`.

Example:

```html
<input
  type="email"
  name="email"
  autoComplete="email"
/>
```

---

# 34. Mobile Form UX

The forms must work comfortably on small screens.

Rules:

- use one-column layouts when appropriate;
- avoid tiny controls;
- avoid horizontal scrolling;
- use native mobile input types;
- do not force unnecessary dropdown interactions;
- keep error messages visible;
- preserve entered values after recoverable failures.

Do not make a user repeatedly scroll to find the submit button after an error.

---

# 35. Lead Qualification

Qualification should help humans prioritize work, not manipulate users.

Useful signals can include:

- project type;
- stated timeline;
- stated budget;
- company/project context;
- existing system;
- urgency explicitly provided by the user.

Avoid:

- deceptive urgency;
- artificial scarcity;
- hidden lead scoring;
- discriminatory profiling;
- inferring sensitive characteristics.

If lead scoring is implemented later, document:

- input signals;
- score calculation;
- intended use;
- human review process.

Do not treat a score as an objective measure of a person's or company's value.

---

# 36. CRM Integration

CRM integration should be optional and decoupled.

Possible flow:

```text
Website
  ↓
Lead API
  ↓
Lead Store
  ↓
CRM Adapter
```

CRM failure must not destroy the original submission.

Store synchronization state such as:

```text
pending
synced
failed
```

with safe retry behavior.

Do not block the user's success response on a slow CRM if the lead has already been safely persisted.

---

# 37. Internal Routing

As Zytrixon grows, leads may need routing.

Possible routing dimensions:

- inquiry type;
- geography;
- service;
- business unit;
- hiring vs sales;
- existing client vs new prospect.

Keep routing rules in a maintainable server-side configuration.

Do not expose internal routing logic to the client.

---

# 38. Environment Separation

Development, preview, and production must use separate:

- email destinations;
- API keys;
- CRM credentials;
- databases/storage where applicable;
- CAPTCHA/Turnstile credentials;
- analytics configuration.

A preview deployment must never accidentally notify production sales staff unless explicitly configured.

Use environment variables for secrets.

Never commit:

```text
API_KEY=...
SMTP_PASSWORD=...
CRM_TOKEN=...
```

to Git.

---

# 39. Monitoring

Monitor:

- submission volume;
- validation failures;
- rate-limit events;
- spam rejection volume;
- API latency;
- provider failures;
- email delivery failures;
- CRM synchronization failures;
- attachment failures.

Useful alerts:

- sudden submission spike;
- sudden failure spike;
- email provider outage;
- CRM synchronization backlog.

Do not log full form contents by default.

---

# 40. Logging

Good:

```text
contact_submission_failed
requestId=...
reason=EMAIL_PROVIDER_TIMEOUT
```

Bad:

```text
email=user@example.com
message=full confidential project requirements...
```

Use structured logs and redact sensitive data.

Every request should have a correlation/request ID where practical.

---

# 41. Abuse Prevention

Test against:

- repeated rapid submissions;
- oversized payloads;
- invalid JSON;
- malformed email;
- injected headers;
- HTML/script payloads;
- automated honeypot submissions;
- repeated identical submissions;
- attachment abuse;
- unexpected HTTP methods;
- forged origins;
- rate-limit bypass attempts.

Security controls must be implemented server-side.

---

# 42. Testing Strategy

## Unit tests

Test:

- schema validation;
- normalization;
- field constraints;
- attribution parsing;
- lead routing;
- idempotency logic.

## Integration tests

Test:

- form endpoint;
- database persistence;
- email adapter;
- CRM adapter;
- failure/retry behavior.

## E2E tests

At minimum:

1. valid contact submission;
2. invalid email;
3. missing required field;
4. server validation failure;
5. successful submission;
6. temporary downstream failure;
7. duplicate submit;
8. keyboard-only flow;
9. mobile viewport;
10. spam/honeypot behavior.

---

# 42.1 Laravel-Specific Testing

Because Zytrixon V2 is Laravel-first, backend tests must use the Laravel testing stack.

Test:

- Form Request validation;
- route method handling;
- rate-limit behavior;
- honeypot handling;
- lead persistence;
- notification dispatch;
- mail failure behavior;
- duplicate/idempotency behavior;
- attachment validation if enabled;
- CSRF behavior where applicable.

Use PHPUnit or Pest according to the final Laravel project standard.

Browser tests should verify the actual rendered Blade form rather than assuming a React/SPA architecture.

# 43. Definition of Done

A form is not finished when it visually works.

It is done when:

- [ ] UI matches the approved design;
- [ ] all fields have explicit purpose;
- [ ] labels and instructions are accessible;
- [ ] client validation works;
- [ ] server validation works;
- [ ] request size limits exist;
- [ ] rate limiting exists;
- [ ] spam protection exists;
- [ ] server input is normalized;
- [ ] unsafe input cannot become executable HTML;
- [ ] success state works;
- [ ] validation errors preserve user input;
- [ ] failure recovery works;
- [ ] duplicate submission behavior is defined;
- [ ] internal notification works;
- [ ] user confirmation works where appropriate;
- [ ] downstream failure does not lose persisted leads;
- [ ] secrets are not exposed;
- [ ] PII is excluded from analytics payloads;
- [ ] attribution capture is tested;
- [ ] accessibility tests pass;
- [ ] E2E tests pass;
- [ ] mobile behavior is verified;
- [ ] production and preview destinations are separated;
- [ ] monitoring/logging is implemented;
- [ ] privacy/consent wording reflects actual practices.

---

# 44. Anti-Patterns

Never:

- make every field mandatory;
- use placeholder text as the only label;
- rely only on client validation;
- expose provider API keys in the browser;
- send raw form data to analytics;
- store full messages in logs;
- use CAPTCHA before abuse exists;
- create a 20-field contact form;
- promise response times that do not exist;
- silently lose submissions when email fails;
- couple the UI directly to a CRM;
- accept arbitrary file uploads;
- trust browser MIME types;
- use a giant all-purpose form for every business workflow;
- make marketing consent mandatory for a basic inquiry;
- add lead scoring merely because it sounds sophisticated;
- add a database queue before reliability requirements justify it.

---

# 45. Implementation Order

Implement in this order:

### Phase 1 — Contact form foundation

- field model;
- Zod/schema validation;
- accessible UI;
- API route;
- rate limiting;
- basic spam protection;
- email notification;
- success/error states.

### Phase 2 — Reliability

- persistence;
- idempotency;
- structured logging;
- retry behavior;
- monitoring.

### Phase 3 — Project inquiry

- expanded project fields;
- attribution;
- optional attachment handling;
- richer internal notification.

### Phase 4 — CRM readiness

- LeadService abstraction;
- CRM adapter;
- synchronization state;
- retry/reconciliation.

### Phase 5 — Careers

Only after the actual recruitment workflow and job requirements are confirmed.

---

# 46. Suggested Technical Boundary

Recommended high-level structure:

```text
src/
├── app/
│   └── api/
│       ├── contact/
│       └── project-inquiry/
├── components/
│   └── forms/
│       ├── ContactForm.tsx
│       ├── ProjectInquiryForm.tsx
│       ├── FormField.tsx
│       ├── FormError.tsx
│       └── SubmitButton.tsx
├── lib/
│   ├── forms/
│   │   ├── schemas.ts
│   │   ├── normalize.ts
│   │   └── attribution.ts
│   ├── leads/
│   │   ├── service.ts
│   │   ├── repository.ts
│   │   └── types.ts
│   ├── email/
│   │   ├── provider.ts
│   │   └── templates.ts
│   └── security/
│       ├── rate-limit.ts
│       └── spam.ts
└── types/
    └── forms.ts
```

This is a starting boundary, not a requirement to create every file immediately.

---

# 47. Final Principle

The Zytrixon form system should feel like a continuation of the company's engineering philosophy:

> **Ask clearly. Validate carefully. Store responsibly. Respond reliably.**

A form is successful when it gives the right human enough useful context to start a productive conversation — without making the user fight the interface.
