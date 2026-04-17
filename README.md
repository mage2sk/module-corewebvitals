<!-- SEO Meta -->
<!--
  Title: Panth Core Web Vitals - Real-time LCP/FID/CLS Monitoring for Magento 2 | Panth Infotech
  Description: Panth Core Web Vitals is a real-time Core Web Vitals monitoring extension for Magento 2 that tracks LCP, FID, INP, and CLS using the PerformanceObserver API. Includes resource hints (dns-prefetch, preconnect, prefetch), performance HTTP headers (Server-Timing, Link), optimized font loading, and a cron-based metrics collector. Compatible with Magento 2.4.4 - 2.4.8, PHP 8.1 - 8.4, Hyva and Luma.
  Keywords: core web vitals magento, magento 2 LCP, magento 2 FID, magento 2 CLS, magento 2 INP, page speed magento, magento 2 performance, PerformanceObserver magento, magento 2 resource hints, magento 2 Server-Timing, magento 2 font loading, Google Core Web Vitals Magento
  Author: Kishan Savaliya (Panth Infotech)
  Canonical: https://github.com/mage2sk/module-corewebvitals
-->

# Panth Core Web Vitals — Real-time LCP, FID, INP & CLS Monitoring for Magento 2

[![Magento 2.4.4 - 2.4.8](https://img.shields.io/badge/Magento-2.4.4%20--%202.4.8-orange?logo=magento&logoColor=white)](https://magento.com)
[![PHP 8.1 - 8.4](https://img.shields.io/badge/PHP-8.1%20--%208.4-blue?logo=php&logoColor=white)](https://php.net)
[![Hyva + Luma](https://img.shields.io/badge/Theme-Hyva%20%2B%20Luma-14b8a6)]()
[![Version 1.0.0](https://img.shields.io/badge/Version-1.0.0-success)]()
[![Packagist](https://img.shields.io/badge/Packagist-mage2kishan%2Fmodule--corewebvitals-orange?logo=packagist&logoColor=white)](https://packagist.org/packages/mage2kishan/module-corewebvitals)
[![Upwork Top Rated Plus](https://img.shields.io/badge/Upwork-Top%20Rated%20Plus-14a800?logo=upwork&logoColor=white)](https://www.upwork.com/freelancers/~016dd1767321100e21)
[![Panth Infotech Agency](https://img.shields.io/badge/Agency-Panth%20Infotech-14a800?logo=upwork&logoColor=white)](https://www.upwork.com/agencies/1881421506131960778/)
[![Get a Quote](https://img.shields.io/badge/Get%20a%20Quote-Free%20Estimate-DC2626)](https://kishansavaliya.com/get-quote)

> **Real-time Core Web Vitals monitoring for Magento 2.** Track **LCP (Largest Contentful Paint)**, **FID (First Input Delay)**, **INP (Interaction to Next Paint)**, and **CLS (Cumulative Layout Shift)** on every storefront page using the native browser **PerformanceObserver API**. Configure **resource hints** (dns-prefetch, preconnect, prefetch), emit **performance HTTP headers** (`Server-Timing`, `X-DNS-Prefetch-Control`, `Link`), apply **optimized font loading** strategies, and collect aggregated metrics on a scheduled **cron job** — all from one unified admin section. Compatible with Magento 2.4.4 – 2.4.8, PHP 8.1 – 8.4, Hyva, and Luma.

**Panth Core Web Vitals** is a lightweight, production-ready performance observability module. It injects a micro-JavaScript snippet that leverages the native `PerformanceObserver` interface to capture LCP, FID/INP and CLS in real time — no third-party library, no blocking scripts, no extra render cost. Metrics are rated against Google's official good/needs-improvement/poor thresholds and dispatched through GA4 (`gtag`), a custom beacon endpoint (`navigator.sendBeacon`), or browser `CustomEvent`s for your own RUM pipeline. Beyond measurement, the module ships server-side speed primitives: dns-prefetch / preconnect / prefetch tag generation, `Server-Timing` headers for PHP execution visibility, RFC 8288 `Link` preconnect headers, preload hints for critical fonts, and an hourly cron aggregator that persists rolling metric snapshots for trend analysis.

---

## 🚀 Need Custom Magento 2 Performance Optimization?

> **Get a free quote for your project in 24 hours** — Core Web Vitals tuning, Hyva migration, Luma performance fixes, LCP/CLS optimization, and Adobe Commerce Cloud CDN configuration.

<p align="center">
  <a href="https://kishansavaliya.com/get-quote">
    <img src="https://img.shields.io/badge/Get%20a%20Free%20Quote%20%E2%86%92-Reply%20within%2024%20hours-DC2626?style=for-the-badge" alt="Get a Free Quote" />
  </a>
</p>

<table>
<tr>
<td width="50%" align="center">

### 🏆 Kishan Savaliya
**Top Rated Plus on Upwork**

[![Hire on Upwork](https://img.shields.io/badge/Hire%20on%20Upwork-Top%20Rated%20Plus-14a800?style=for-the-badge&logo=upwork&logoColor=white)](https://www.upwork.com/freelancers/~016dd1767321100e21)

100% Job Success • 10+ Years Magento Experience
Adobe Certified • Hyva Specialist

</td>
<td width="50%" align="center">

### 🏢 Panth Infotech Agency
**Magento Development Team**

[![Visit Agency](https://img.shields.io/badge/Visit%20Agency-Panth%20Infotech-14a800?style=for-the-badge&logo=upwork&logoColor=white)](https://www.upwork.com/agencies/1881421506131960778/)

Custom Modules • Theme Design • Migrations
Performance • SEO • Adobe Commerce Cloud

</td>
</tr>
</table>

**Visit our website:** [kishansavaliya.com](https://kishansavaliya.com) &nbsp;|&nbsp; **Get a quote:** [kishansavaliya.com/get-quote](https://kishansavaliya.com/get-quote)

---

## Table of Contents

- [Why Core Web Vitals Matter](#why-core-web-vitals-matter)
- [Key Features](#key-features)
- [Metric Thresholds](#metric-thresholds)
- [Compatibility](#compatibility)
- [Installation](#installation)
- [Configuration](#configuration)
- [Resource Hints](#resource-hints)
- [Performance HTTP Headers](#performance-http-headers)
- [Font Loading Strategy](#font-loading-strategy)
- [Cron Metrics Collection](#cron-metrics-collection)
- [Analytics Integration](#analytics-integration)
- [Troubleshooting](#troubleshooting)
- [FAQ](#faq)
- [Support](#support)
- [About Panth Infotech](#about-panth-infotech)
- [Quick Links](#quick-links)

---

## Why Core Web Vitals Matter

Since 2021, Google uses **Core Web Vitals** as a direct ranking signal. A slow LCP, a janky CLS or an unresponsive INP does not only frustrate shoppers — it also demotes your storefront in organic search results, raises paid-ad CPCs via worse Quality Score, and kills conversion rates. Industry data consistently shows every **100 ms saved on LCP** translates into measurable revenue uplift on eCommerce.

**Panth Core Web Vitals** gives you:

1. **Field data** — real user measurements from every visitor, not synthetic lab tests
2. **Actionable levers** — resource hints, font preloads, HTTP performance headers
3. **Trend visibility** — cron-collected rolling snapshots for regression detection

---

## Key Features

### Real-time Monitoring (PerformanceObserver API)

- **LCP** tracking — Largest Contentful Paint, captured on the final paint event before user input
- **FID** tracking — First Input Delay for legacy browsers and backwards compatibility
- **INP** tracking — Interaction to Next Paint, the official replacement CWV since March 2024
- **CLS** tracking — Cumulative Layout Shift with session-window aggregation
- **TTFB** & **FCP** bonus metrics exposed via `window.coreWebVitalsMetrics`
- **Zero runtime dependencies** — vanilla JavaScript, ~3 KB gzipped, async + `defer`

### Resource Hints

- `<link rel="dns-prefetch">` — early DNS resolution (20–120 ms savings per origin)
- `<link rel="preconnect" crossorigin>` — DNS + TCP + TLS handshake ahead of time
- `<link rel="prefetch">` — low-priority download of next-page resources
- Managed through a simple one-domain-per-line admin textarea

### Performance HTTP Headers

- `Server-Timing: php;dur=NN` — PHP execution time visible in DevTools Timing
- `X-DNS-Prefetch-Control: on` — enables speculative DNS on supporting browsers
- `Link: <https://...>; rel=preconnect` — RFC 8288 preconnect at the header layer (fires before HTML parses)

### Optimized Font Loading

- Emits `<link rel="preload" as="font" type="font/woff2" crossorigin>` for critical fonts
- Applies `font-display: swap` guidance to eliminate FOIT (Flash of Invisible Text)
- Reduces CLS caused by late-loading webfonts

### Cron Metrics Collection

- Hourly scheduled task that aggregates beacon-posted metrics into rolling buckets
- Rolling 7-day / 30-day snapshots for trend analysis
- Admin opt-out switch and auto-pruning of stale samples

### Analytics Integration

- Auto-dispatch to **Google Analytics 4** via `gtag` with `event_category: "Web Vitals"`
- `navigator.sendBeacon` to a custom endpoint via `window.panthCoreWebVitalsEndpoint`
- Browser `CustomEvent`s: `coreWebVitals:lcp`, `coreWebVitals:fid`, `coreWebVitals:inp`, `coreWebVitals:cls`

### Admin Foundation

- Lives under **Stores → Configuration → Panth Extensions → Core Web Vitals**
- Unified Panth Infotech admin sidebar (via the free `Panth_Core` base module)
- MEQP compliant, zero severity-10 violations

---

## Metric Thresholds

| Metric | Good | Needs Improvement | Poor |
|---|---|---|---|
| **LCP** (Largest Contentful Paint) | ≤ 2500 ms | ≤ 4000 ms | > 4000 ms |
| **FID** (First Input Delay) | ≤ 100 ms | ≤ 300 ms | > 300 ms |
| **INP** (Interaction to Next Paint) | ≤ 200 ms | ≤ 500 ms | > 500 ms |
| **CLS** (Cumulative Layout Shift) | ≤ 0.1 | ≤ 0.25 | > 0.25 |

Targets align with Google's official [web.dev/vitals](https://web.dev/vitals/) thresholds.

---

## Compatibility

| Requirement | Versions Supported |
|---|---|
| Magento Open Source | 2.4.4, 2.4.5, 2.4.6, 2.4.7, 2.4.8 |
| Adobe Commerce | 2.4.4, 2.4.5, 2.4.6, 2.4.7, 2.4.8 |
| Adobe Commerce Cloud | 2.4.4 — 2.4.8 |
| PHP | 8.1.x, 8.2.x, 8.3.x, 8.4.x |
| MySQL | 8.0+ |
| MariaDB | 10.4+ |
| Hyva Theme | 1.0+ (fully supported) |
| Luma Theme | Native support |
| Browsers | Chrome, Edge, Firefox, Safari 13+ (graceful no-op on older) |

Requires `mage2kishan/module-core` (free, installed automatically via Composer).

---

## Installation

### Composer Installation (Recommended)

```bash
composer require mage2kishan/module-corewebvitals
bin/magento module:enable Panth_Core Panth_CoreWebVitals
bin/magento setup:upgrade
bin/magento setup:di:compile
bin/magento setup:static-content:deploy -f
bin/magento cache:flush
```

### Manual Installation via ZIP

1. Download the latest release from [Packagist](https://packagist.org/packages/mage2kishan/module-corewebvitals) or the [Adobe Commerce Marketplace](https://commercemarketplace.adobe.com)
2. Extract to `app/code/Panth/CoreWebVitals/`
3. Ensure the base module `Panth_Core` is also present under `app/code/Panth/Core/`
4. Run the commands above starting from `bin/magento module:enable`

### Verify Installation

```bash
bin/magento module:status Panth_CoreWebVitals
# Expected output: Module is enabled
```

Then navigate to **Admin → Stores → Configuration → Panth Extensions → Core Web Vitals** and set **Enable Module = Yes**.

---

## Configuration

All settings live at `Stores → Configuration → Panth Extensions → Core Web Vitals`.

### General Settings

| Setting | Default | Description |
|---|---|---|
| Enable Module | No | Master switch. Injects the monitoring snippet on every frontend page. |
| Debug Mode | No | Logs metrics to DevTools console and exposes `window.coreWebVitalsMetrics`. Disable in production. |
| Send Metrics to Analytics | Yes | Forwards metrics to GA4 `gtag` or a custom beacon endpoint. |

### Metric Targets

| Setting | Default |
|---|---|
| Monitor LCP / Target LCP (ms) | Yes / 2500 |
| Monitor FID & INP / Target FID / Target INP | Yes / 100 / 200 |
| Monitor CLS / Target CLS | Yes / 0.1 |

### Resource Hints

| Setting | Description |
|---|---|
| DNS Prefetch Domains | One per line, no protocol. Example: `fonts.googleapis.com` |
| Preconnect Domains | One per line. Example: `fonts.gstatic.com`. Limit to 2–4 critical origins. |
| Prefetch URLs | One full URL per line for next-navigation prefetch. |

---

## Resource Hints

Resource hints tell the browser to do costly network work earlier than it would naturally schedule it. Configure each list under **Resource Hints** in the admin.

- **dns-prefetch** — resolves a hostname early, saving 20–120 ms on the first request to that origin
- **preconnect** — performs DNS + TCP + TLS upfront, ideal for fonts, analytics, and CDN origins
- **prefetch** — downloads a resource at low priority for the likely next page

All hints are output both as `<link>` tags in `<head>` and, where supported, mirrored into the HTTP `Link` response header so the browser can act before HTML parsing begins.

---

## Performance HTTP Headers

Once the module is enabled, every frontend response carries:

| Header | Purpose |
|---|---|
| `Server-Timing: php;dur=NN` | PHP execution time in ms — visible under DevTools Network → Timing |
| `X-DNS-Prefetch-Control: on` | Enables speculative DNS resolution on Chromium/WebKit |
| `Link: <https://...>; rel=preconnect; crossorigin` | RFC 8288 preconnect at the header layer — fires before HTML parse |

These headers are emitted by a lightweight HTTP response observer that runs after controller dispatch.

---

## Font Loading Strategy

Late-rendering webfonts are a top cause of poor CLS and slow LCP. The module can:

- Emit `<link rel="preload" as="font" type="font/woff2" crossorigin>` for fonts you list as critical
- Encourage `font-display: swap` via layout examples — renders fallback text immediately
- Reduce layout shift from font-metric swap by pairing preloads with `size-adjust` fallbacks

Result: measurably lower CLS and a more stable LCP on above-the-fold text blocks.

---

## Cron Metrics Collection

A scheduled job (`panth_corewebvitals_collect`) runs hourly and:

1. Aggregates beacon-posted samples into rolling 7-day / 30-day buckets
2. Computes p50 / p75 / p95 percentiles per metric
3. Prunes stale raw samples to keep storage lightweight
4. Writes a summary row you can query for dashboards or alerting

Disable the cron via the **Enable Metric Collection Cron** toggle in the admin if you prefer a zero-server-state setup.

---

## Analytics Integration

### Google Analytics 4

If `gtag()` is loaded, metrics are auto-sent as events with `event_category: "Web Vitals"`. No extra config required.

### Custom Beacon Endpoint

```html
<script>window.panthCoreWebVitalsEndpoint = 'https://your-collector.example.com/rum';</script>
```

Metrics are POSTed as JSON via `navigator.sendBeacon`.

### Browser CustomEvents

```js
window.addEventListener('coreWebVitals:lcp', (e) => console.log(e.detail));
window.addEventListener('coreWebVitals:inp', (e) => console.log(e.detail));
window.addEventListener('coreWebVitals:cls', (e) => console.log(e.detail));
```

---

## Troubleshooting

| Symptom | Cause | Fix |
|---|---|---|
| No metrics in console | Module disabled or debug off | Enable both + `cache:flush` |
| `PerformanceObserver is not defined` | Very old browser (IE11) | Expected — script safely no-ops |
| GA4 events missing | `gtag` not present | Verify GA4 tag + "Send Metrics to Analytics" = Yes |
| Resource hint `<link>` missing | Module off or no domains configured | Enable + add domains under Resource Hints |
| `Server-Timing` header missing | Full-page cache (Varnish/Fastly) cached a response emitted while module was disabled | Purge full-page cache |

Enable **Debug Mode** and inspect `var/log/panth_corewebvitals.log` for detailed output.

---

## FAQ

### Does this replace Google PageSpeed Insights?
No — PSI runs **lab** synthetic tests. This module captures **field** (real-user) data from every actual visitor, which is what Google uses for ranking.

### Will the monitoring script hurt my page speed?
No. The snippet is ~3 KB gzipped, loads with `defer`, and uses the native `PerformanceObserver` API with zero polling.

### Is INP the same as FID?
INP replaced FID as an official Core Web Vital in **March 2024**. The module tracks both — FID for legacy dashboards, INP for the current ranking signal.

### Does it work on Hyva themes?
Yes, fully. The snippet is theme-agnostic and loads via standard `default_head_blocks.xml`.

### Does it send any data to third parties by default?
No. Metrics only go to your own GA4 property (if `gtag` is present) or your own beacon endpoint. No data ever leaves your infrastructure otherwise.

### Is it GDPR / CCPA compliant?
Yes — no personal data is collected. Metrics are anonymous performance numbers. You control the destination entirely.

### Can I use it with Adobe Commerce Cloud + Fastly?
Yes. The `Server-Timing` and `Link` headers integrate cleanly with Fastly's VCL. Ensure your VCL does not strip these headers.

### Does it support multi-store / multi-site?
Yes. All settings respect Magento's scope hierarchy (default → website → store view).

---

## Support

| Channel | Contact |
|---|---|
| Email | kishansavaliyakb@gmail.com |
| Website | [kishansavaliya.com](https://kishansavaliya.com) |
| WhatsApp | +91 84012 70422 |
| GitHub Issues | [github.com/mage2sk/module-corewebvitals/issues](https://github.com/mage2sk/module-corewebvitals) |
| Upwork (Top Rated Plus) | [Hire Kishan Savaliya](https://www.upwork.com/freelancers/~016dd1767321100e21) |
| Upwork Agency | [Panth Infotech](https://www.upwork.com/agencies/1881421506131960778/) |

Response time: 1–2 business days.

### 💼 Need Custom Magento Performance Work?

Looking for **Core Web Vitals optimization**, **Hyva migrations**, **Luma speed tuning**, or **Adobe Commerce Cloud performance engineering**? Get a free quote in 24 hours:

<p align="center">
  <a href="https://kishansavaliya.com/get-quote">
    <img src="https://img.shields.io/badge/%F0%9F%92%AC%20Get%20a%20Free%20Quote-kishansavaliya.com%2Fget--quote-DC2626?style=for-the-badge" alt="Get a Free Quote" />
  </a>
</p>

<p align="center">
  <a href="https://www.upwork.com/freelancers/~016dd1767321100e21">
    <img src="https://img.shields.io/badge/Hire%20Kishan-Top%20Rated%20Plus-14a800?style=for-the-badge&logo=upwork&logoColor=white" alt="Hire on Upwork" />
  </a>
  &nbsp;&nbsp;
  <a href="https://www.upwork.com/agencies/1881421506131960778/">
    <img src="https://img.shields.io/badge/Visit-Panth%20Infotech%20Agency-14a800?style=for-the-badge&logo=upwork&logoColor=white" alt="Visit Agency" />
  </a>
  &nbsp;&nbsp;
  <a href="https://kishansavaliya.com">
    <img src="https://img.shields.io/badge/Visit%20Website-kishansavaliya.com-0D9488?style=for-the-badge" alt="Visit Website" />
  </a>
</p>

---

## License

Panth Core Web Vitals is distributed under a proprietary license — see `LICENSE.txt`.

---

## About Panth Infotech

Built and maintained by **Kishan Savaliya** — [kishansavaliya.com](https://kishansavaliya.com) — a **Top Rated Plus** Magento developer on Upwork with 10+ years of eCommerce experience.

**Panth Infotech** is a Magento 2 development agency specialising in performance, SEO, checkout and AI-powered storefront extensions for both Hyva and Luma. Our catalogue covers 34+ modules built to MEQP standards and continuously tested against Magento 2.4.4 – 2.4.8 with PHP 8.1 – 8.4.

Browse the full extension catalogue on [Adobe Commerce Marketplace](https://commercemarketplace.adobe.com) or [Packagist](https://packagist.org/packages/mage2kishan/).

---

## Quick Links

- 🌐 **Website:** [kishansavaliya.com](https://kishansavaliya.com)
- 💬 **Get a Quote:** [kishansavaliya.com/get-quote](https://kishansavaliya.com/get-quote)
- 👨‍💻 **Upwork Profile (Top Rated Plus):** [upwork.com/freelancers/~016dd1767321100e21](https://www.upwork.com/freelancers/~016dd1767321100e21)
- 🏢 **Upwork Agency:** [upwork.com/agencies/1881421506131960778](https://www.upwork.com/agencies/1881421506131960778/)
- 📦 **Packagist:** [packagist.org/packages/mage2kishan/module-corewebvitals](https://packagist.org/packages/mage2kishan/module-corewebvitals)
- 🐙 **GitHub:** [github.com/mage2sk/module-corewebvitals](https://github.com/mage2sk/module-corewebvitals)
- 🛒 **Adobe Marketplace:** [commercemarketplace.adobe.com](https://commercemarketplace.adobe.com)
- 📧 **Email:** kishansavaliyakb@gmail.com
- 📱 **WhatsApp:** +91 84012 70422

---

<p align="center">
  <strong>Ready to score green on every Core Web Vital?</strong><br/>
  <a href="https://kishansavaliya.com/get-quote">
    <img src="https://img.shields.io/badge/%F0%9F%9A%80%20Get%20Started%20%E2%86%92-Free%20Quote%20in%2024h-DC2626?style=for-the-badge" alt="Get Started" />
  </a>
</p>

---

**SEO Keywords:** core web vitals magento, core web vitals magento 2, magento 2 LCP, largest contentful paint magento, magento 2 FID, first input delay magento, magento 2 INP, interaction to next paint magento, magento 2 CLS, cumulative layout shift magento, page speed magento, magento 2 performance monitoring, real user monitoring magento, RUM magento 2, PerformanceObserver magento, magento 2 resource hints, dns-prefetch magento, preconnect magento, prefetch magento, magento 2 Server-Timing header, magento 2 Link header RFC 8288, magento 2 font preload, font-display swap magento, magento 2 web vitals cron, magento 2 GA4 web vitals, google analytics 4 core web vitals magento, magento 2 page speed optimization, magento 2.4.8 performance, hyva core web vitals, luma core web vitals, magento 2 SEO performance, google ranking signal magento, magento 2 speed extension, mage2kishan corewebvitals, panth infotech core web vitals, kishan savaliya magento performance, hire magento performance developer, adobe commerce cloud performance, fastly server-timing magento
