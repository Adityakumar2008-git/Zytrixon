# 21 — Analytics & Measurement

## 1. Purpose

Analytics for Zytrixon should answer business and product questions without turning the website into a surveillance system.

The measurement system must help the team understand:

- how qualified visitors discover Zytrixon;
- which pages and capabilities generate interest;
- where users drop out;
- which content contributes to contact/project inquiries;
- whether campaigns create useful traffic;
- whether technical performance affects engagement;
- whether the website is achieving its actual business goals.

The system must remain privacy-conscious, lightweight, maintainable, and independent from any single analytics vendor.

---

# 2. Measurement Philosophy

## Core principles

1. Measure outcomes, not vanity numbers.
2. Track only events that have a clear question behind them.
3. Never send unnecessary PII to analytics.
4. Do not sacrifice page speed for analytics.
5. Analytics must not block rendering or interaction.
6. Server-rendered Laravel pages remain the primary content delivery mechanism.
7. Marketing analytics must not become a dependency for core functionality.
8. Consent requirements must be respected where applicable.
9. Every tracked event must have an owner and a purpose.
10. Review the event taxonomy before adding new events.

---

# 3. Business Goals

The website's primary measurement goals should map to actual Zytrixon objectives.

## Goal A — Generate qualified conversations

Primary conversion:

```text
contact_form_success
```

Secondary:

```text
project_inquiry_success
```

## Goal B — Demonstrate engineering capability

Measure engagement with:

- case studies;
- service pages;
- technical architecture content;
- portfolio details;
- process content.

## Goal C — Understand acquisition

Measure:

- source;
- medium;
- campaign;
- landing page;
- referral;
- organic search.

## Goal D — Improve usability

Measure:

- form errors;
- navigation behavior;
- broken interactions;
- important page exits;
- Core Web Vitals.

---

# 4. Measurement Hierarchy

Use a simple hierarchy:

```text
Business outcomes
      ↓
Conversions
      ↓
Intent signals
      ↓
Engagement
      ↓
Acquisition
      ↓
Technical health
```

Do not optimize the website around page views alone.

---

# 5. Primary KPIs

The initial dashboard should remain small.

Recommended:

| KPI | Meaning |
|---|---|
| Qualified inquiries | Business conversations generated |
| Contact conversion rate | Visitors who submit contact inquiry |
| Project inquiry conversion rate | Visitors who submit project inquiry |
| Organic landing sessions | Search-driven discovery |
| Case study engagement | Evidence/content consumption |
| Service-page engagement | Capability interest |
| Form abandonment | Friction in lead capture |
| Core Web Vitals | Real-world performance |
| Error rate | Technical reliability |

Do not invent numeric targets until historical baseline data exists.

---

# 6. Event Taxonomy

Events should use consistent naming.

Recommended convention:

```text
object_action
```

Examples:

```text
contact_form_view
contact_form_start
contact_form_submit
contact_form_success
contact_form_failure

project_form_view
project_form_start
project_form_submit
project_form_success
project_form_failure

case_study_view
case_study_cta_click

service_view
service_cta_click

nav_open
nav_item_click

career_job_view
career_application_start
career_application_success
```

Avoid inconsistent names such as:

```text
formSubmitted
form_submit_successful
ContactSuccess
submitLead
```

---

# 7. Event Naming Rules

Every event should be:

- lowercase;
- predictable;
- specific;
- reusable;
- documented.

Do not create an event for every click.

A click should be tracked only if it answers a useful business or UX question.

---

# 8. Event Properties

Useful properties may include:

```ts
type AnalyticsEvent = {
  name: string;
  properties?: Record<string, string | number | boolean>;
};
```

Examples:

```text
service_view
  service: "ai-automation"

case_study_view
  slug: "school-management-system"

cta_click
  location: "hero"
  destination: "contact"
```

Never send:

- name;
- email;
- phone;
- message;
- project requirements;
- uploaded document contents;
- passwords;
- authentication tokens.

---

# 9. PII Rules

Analytics must not contain direct lead information.

Bad:

```text
email: user@example.com
message: "We need an ERP for 200 employees..."
```

Good:

```text
form_type: "project"
inquiry_type: "erp"
source: "organic"
```

If a vendor automatically collects technical metadata, review its privacy settings rather than assuming it is acceptable.

---

# 10. Consent

Analytics implementation must reflect the actual legal/privacy requirements applicable to Zytrixon's users and operations.

Where consent is required:

```text
User
 ↓
Privacy/consent choice
 ↓
Analytics enabled according to choice
```

Do not load non-essential tracking before required consent.

Do not create a dark-pattern consent banner.

The user should be able to understand the choice.

Legal/privacy wording must be reviewed against actual Zytrixon practices.

---

# 11. Analytics Provider Abstraction

Do not scatter vendor-specific calls through Blade templates.

Use a small abstraction:

```ts
interface Analytics {
  track(
    event: string,
    properties?: Record<string, unknown>
  ): void;

  pageView(path: string): void;
}
```

Potential implementation:

```text
Analytics
 ├── ProviderAdapter
 └── NoopAdapter
```

The no-op implementation is useful when:

- consent is not granted;
- analytics is disabled;
- local development is running.

---

# 12. Laravel + Vite Architecture

Because the site is Laravel-first:

```text
Laravel Blade
    ↓
HTML rendered on server
    ↓
Vite-managed frontend assets
    ↓
Small analytics client
```

Analytics must not require a large client-side application.

Core content should work even if JavaScript analytics fails.

---

# 13. Page Views

Track meaningful page views.

For server-rendered Laravel pages, page identity can be derived from:

- route name;
- canonical URL;
- content type.

Avoid double-counting caused by:

- client hydration;
- history manipulation;
- duplicate scripts.

If SPA-like navigation is later introduced, document the additional page-view behavior explicitly.

---

# 14. Acquisition Tracking

Capture campaign information where appropriate.

Recommended:

```text
utm_source
utm_medium
utm_campaign
utm_content
utm_term
```

Also useful:

```text
landing_page
referrer
```

Store attribution separately from lead message content.

Do not claim that UTM data represents complete marketing attribution.

---

# 15. Attribution Model

Start simple.

Recommended initial model:

```text
First-touch attribution
+
Last-touch attribution
```

Do not immediately build a complex multi-touch model.

The website should preserve enough metadata to support better analysis later.

---

# 16. Form Funnel

The contact funnel should be measurable:

```text
form_view
    ↓
form_start
    ↓
validation / editing
    ↓
form_submit
    ↓
form_success
```

This helps distinguish:

- people who never started;
- people who started but abandoned;
- people blocked by validation;
- technical submission failures;
- successful leads.

Do not record the actual field values.

---

# 17. CTA Measurement

Track meaningful CTAs.

Examples:

```text
hero → contact
service → contact
case study → contact
footer → contact
```

Example event:

```text
cta_click
{
  location: "case-study",
  label: "Discuss a similar project",
  destination: "/contact"
}
```

Do not track every decorative link.

---

# 18. Case Study Measurement

Case studies are important proof assets.

Track:

```text
case_study_view
case_study_cta_click
case_study_gallery_interaction
```

Useful properties:

```text
case_study_slug
section
cta_location
```

Do not optimize for raw reading time as a standalone success metric.

---

# 19. Search Measurement

If site search is implemented later:

```text
search_submit
search_result_click
search_no_results
```

Properties:

```text
query_category
result_type
```

Do not send the full search query if it could contain personal or confidential information.

---

# 20. Careers Measurement

If careers is a real active workflow:

```text
job_view
application_start
application_submit
application_success
```

Do not send:

- CV content;
- candidate email;
- phone;
- address;
- personal application answers

to analytics.

---

# 21. Technical Performance Measurement

Measure real-user performance.

Important metrics:

- LCP;
- INP;
- CLS;
- page load behavior;
- JavaScript errors;
- API failures.

Performance monitoring must not itself become a major performance cost.

---

# 22. Animation Measurement

Do not measure animations simply because they exist.

Only measure animation-related behavior when it answers a UX/product question.

For example:

- whether an important interaction is completed;
- whether an animated navigation element causes errors.

Do not add analytics events for:

```text
hero_animation_started
hero_animation_frame_17
scroll_animation_ended
```

unless there is a specific research reason.

---

# 23. Error Monitoring

Analytics and error monitoring serve different purposes.

Analytics:

> What did users do?

Error monitoring:

> What broke?

Use dedicated error monitoring for:

- JavaScript exceptions;
- failed API requests;
- server errors;
- unexpected form failures.

Never rely on analytics as the primary error-reporting system.

---

# 24. Laravel Server-Side Measurement

Server-side logs may record:

- route;
- response status;
- response duration;
- request ID;
- anonymized operational metadata.

Avoid logging:

- form messages;
- authentication credentials;
- secrets;
- unnecessary PII.

Analytics and application logs must remain separate systems with different purposes.

---

# 25. Dashboard Structure

Initial dashboard:

### Acquisition

- organic traffic;
- referral traffic;
- campaign traffic;
- landing pages.

### Engagement

- service views;
- case study views;
- CTA clicks.

### Conversion

- contact submissions;
- project inquiries;
- conversion rate;
- form abandonment.

### Reliability

- error rate;
- API failure rate;
- form failure rate.

### Performance

- Core Web Vitals;
- slow-page distribution.

Keep the dashboard readable.

---

# 26. Data Retention

Retention should follow actual business, legal, and privacy requirements.

Do not retain analytics indefinitely simply because storage is cheap.

Document:

- analytics retention;
- lead retention;
- logs retention;
- error-monitoring retention.

Different data types may require different retention periods.

---

# 27. Internal Access

Analytics should be accessible only to people who need it.

Use:

- role-based access;
- strong authentication;
- limited admin permissions.

Do not publish private dashboards publicly.

---

# 28. Development Environment

Development analytics should normally be disabled or isolated.

Avoid polluting production data with:

```text
localhost
preview
test submissions
automated E2E traffic
```

Use separate properties/projects or a no-op analytics adapter.

---

# 29. Testing

Test:

- event fires once;
- event name is correct;
- properties are correct;
- PII is absent;
- consent behavior works;
- analytics failure does not break page behavior;
- form success event only fires after real success;
- page views are not duplicated;
- UTM capture works;
- production and preview analytics are separated.

E2E tests should verify the critical conversion funnel.

---

# 30. Measurement Governance

Maintain an event dictionary.

Example:

| Event | Purpose | Owner | Properties |
|---|---|---|---|
| contact_form_success | Measure lead conversion | Business | form_type |
| case_study_view | Measure proof engagement | Marketing | slug |
| cta_click | Understand CTA usage | Product | location, destination |

Before adding an event, ask:

1. What decision will this data support?
2. Who will use it?
3. Why can't an existing event answer the question?
4. Does it contain unnecessary personal data?

If there is no useful answer, do not add the event.

---

# 31. Definition of Done

- [ ] KPI definitions documented.
- [ ] Event naming convention documented.
- [ ] Analytics abstraction implemented.
- [ ] Consent behavior implemented where required.
- [ ] PII exclusion verified.
- [ ] Contact funnel measured.
- [ ] Project inquiry funnel measured.
- [ ] CTA measurement implemented selectively.
- [ ] Case study measurement implemented.
- [ ] Acquisition parameters captured.
- [ ] Preview/development data isolated.
- [ ] Error monitoring separated from analytics.
- [ ] Performance monitoring implemented.
- [ ] Event dictionary maintained.
- [ ] Analytics failure cannot break the website.
- [ ] Automated tests cover critical events.
- [ ] Privacy/retention configuration reflects actual practices.

---

# 32. Anti-Patterns

Never:

- add analytics for every click;
- send form contents to analytics;
- block page rendering while analytics loads;
- make the website dependent on an analytics provider;
- use fake conversion numbers;
- optimize around vanity metrics;
- hide analytics consent choices;
- mix production and test data;
- log sensitive lead data;
- build a complicated attribution system before there is enough data to justify it.

---

# 33. Final Principle

> **Measure what helps Zytrixon make better decisions. Do not measure simply because the tool can.**
