# Panth Core Web Vitals

[![Magento 2.4.4 - 2.4.8](https://img.shields.io/badge/Magento-2.4.4%20--%202.4.8-orange)]()
[![PHP 8.1 - 8.4](https://img.shields.io/badge/PHP-8.1%20--%208.4-blue)]()
[![Proprietary](https://img.shields.io/badge/License-Proprietary-red)]()

**Real-time Core Web Vitals monitoring** for Magento 2 storefronts.
Injects a lightweight, zero-dependency JavaScript snippet that uses the
browser-native PerformanceObserver API to measure LCP, FID, INP, and
CLS on every page load. Metrics can be logged to the browser console,
sent to Google Analytics 4, or dispatched as custom DOM events for
third-party integrations.

Also provides **resource hints** (dns-prefetch, preconnect, prefetch)
and **performance HTTP headers** (Server-Timing, X-DNS-Prefetch-Control,
Link rel=preconnect) configurable from the admin panel.

---

## Features

- **LCP monitoring** — Largest Contentful Paint tracked via the
  `largest-contentful-paint` PerformanceObserver entry type.
- **FID monitoring** — First Input Delay tracked via the `first-input`
  entry type.
- **INP monitoring** — Interaction to Next Paint tracked via the `event`
  entry type with durationThreshold.
- **CLS monitoring** — Cumulative Layout Shift tracked via the
  `layout-shift` entry type using session windows.
- **Google Analytics 4 integration** — automatically sends metrics via
  `gtag()` when present.
- **Custom beacon endpoint** — set `window.panthCoreWebVitalsEndpoint`
  and metrics are sent via `navigator.sendBeacon`.
- **Debug mode** — logs all metrics to the browser console and exposes
  `window.coreWebVitalsMetrics` for inspection.
- **Resource hints** — configure dns-prefetch, preconnect, and prefetch
  domains/URLs from the admin. Rendered as `<link>` tags in the page
  head.
- **Performance HTTP headers** — Server-Timing (PHP execution time),
  X-DNS-Prefetch-Control, and Link rel=preconnect headers added
  automatically.
- **Per-metric enable/disable** — toggle each metric independently.
- **Configurable thresholds** — set custom target values for LCP, FID,
  INP, and CLS.

---

## Installation

```bash
composer require mage2kishan/module-corewebvitals
bin/magento module:enable Panth_CoreWebVitals
bin/magento setup:upgrade
bin/magento setup:di:compile
bin/magento setup:static-content:deploy -f
bin/magento cache:flush
```

### Verify

```bash
bin/magento module:status Panth_CoreWebVitals
# Module is enabled
```

---

## Requirements

| | Required |
|---|---|
| Magento | 2.4.4 — 2.4.8 (Open Source / Commerce / Cloud) |
| PHP | 8.1 / 8.2 / 8.3 / 8.4 |
| Panth_Core | ^1.0 |

---

## Configuration

Navigate to **Stores > Configuration > Panth Extensions > Core Web Vitals**.

| Group | Setting | Default | Description |
|---|---|---|---|
| General | Enable Module | No | Master switch — injects the monitoring script on every frontend page |
| General | Debug Mode | No | Log metrics to browser console; expose `window.coreWebVitalsMetrics` |
| General | Send Metrics to Analytics | Yes | Send collected metrics to GA4 or custom beacon endpoint |
| LCP | Monitor LCP | Yes | Track Largest Contentful Paint |
| LCP | Target LCP (ms) | 2500 | Your target LCP time for rating |
| FID/INP | Monitor FID and INP | Yes | Track First Input Delay and Interaction to Next Paint |
| FID/INP | Target FID (ms) | 100 | Your target FID time |
| FID/INP | Target INP (ms) | 200 | Your target INP time |
| CLS | Monitor CLS | Yes | Track Cumulative Layout Shift |
| CLS | Target CLS Score | 0.1 | Your target CLS score |
| Resource Hints | DNS Prefetch Domains | — | One domain per line for `<link rel="dns-prefetch">` |
| Resource Hints | Preconnect Domains | — | One domain per line for `<link rel="preconnect" crossorigin>` |
| Resource Hints | Prefetch URLs | — | One URL per line for `<link rel="prefetch">` |

---

## Support

| Channel | Contact |
|---|---|
| Email | kishansavaliyakb@gmail.com |
| Website | https://kishansavaliya.com |
| WhatsApp | +91 84012 70422 |

---

## License

Proprietary — see `LICENSE.txt`. Distribution is restricted to the Adobe
Commerce Marketplace.

---

## About the developer

Built and maintained by **Kishan Savaliya** — https://kishansavaliya.com.
Builds high-quality, security-focused Magento 2 extensions and themes
for both Hyva and Luma storefronts.
