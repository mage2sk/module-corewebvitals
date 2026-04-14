<?php
/**
 * Copyright © Panth Infotech. All rights reserved.
 *
 * Adds performance-related HTTP headers to every frontend response:
 * - Server-Timing: reports PHP execution time so it shows in DevTools
 * - X-DNS-Prefetch-Control: enables speculative DNS resolution
 * - Link rel=preconnect: early connection setup for critical origins
 */
declare(strict_types=1);

namespace Panth\CoreWebVitals\Plugin;

use Magento\Framework\App\Response\Http;
use Panth\CoreWebVitals\Helper\Data as ConfigHelper;

class AddPerformanceHeaders
{
    /**
     * @var ConfigHelper
     */
    private ConfigHelper $configHelper;

    /**
     * @param ConfigHelper $configHelper
     */
    public function __construct(ConfigHelper $configHelper)
    {
        $this->configHelper = $configHelper;
    }

    /**
     * Add performance-related HTTP headers before response is sent
     *
     * @param Http $subject
     * @return void
     */
    public function beforeSendResponse(Http $subject): void
    {
        if (!$this->configHelper->isEnabled()) {
            return;
        }

        // Server-Timing header — shows PHP execution time in browser DevTools
        $subject->setHeader(
            'Server-Timing',
            'app;desc="PHP Execution";dur=' . $this->getExecutionTime(),
            true
        );

        // Enable speculative DNS resolution when dns-prefetch domains are configured
        if ($this->configHelper->isDnsPrefetchEnabled()) {
            $subject->setHeader('X-DNS-Prefetch-Control', 'on', true);
        }

        // Link rel=preconnect headers for critical third-party origins
        $preconnectDomains = $this->configHelper->getPreconnectDomains();
        if (!empty($preconnectDomains)) {
            $linkValues = [];
            foreach ($preconnectDomains as $domain) {
                $origin = $this->normalizeOrigin($domain);
                $linkValues[] = '<' . $origin . '>; rel=preconnect; crossorigin';
            }
            // Combine all preconnect hints into a single Link header (RFC 8288)
            $subject->setHeader('Link', implode(', ', $linkValues), true);
        }
    }

    /**
     * Get PHP execution time in milliseconds
     *
     * @return float
     */
    private function getExecutionTime(): float
    {
        $requestTime = $_SERVER['REQUEST_TIME_FLOAT'] ?? microtime(true);
        return round((microtime(true) - $requestTime) * 1000, 2);
    }

    /**
     * Ensure domain has a protocol prefix for valid Link header
     *
     * @param string $domain
     * @return string
     */
    private function normalizeOrigin(string $domain): string
    {
        $domain = trim($domain);
        if (strpos($domain, '//') === 0 || strpos($domain, 'http') === 0) {
            return $domain;
        }
        return 'https://' . $domain;
    }
}
