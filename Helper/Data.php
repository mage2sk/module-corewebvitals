<?php
/**
 * Copyright © Panth Infotech. All rights reserved.
 *
 * Configuration helper for the Core Web Vitals module.
 *
 * Reads all values from the panth_corewebvitals/* config paths.
 * Provides a getConfigJson() method that builds the JSON object
 * consumed by the frontend PerformanceObserver script.
 */
declare(strict_types=1);

namespace Panth\CoreWebVitals\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Store\Model\ScopeInterface;

class Data extends AbstractHelper
{
    /**
     * Base config path
     */
    private const XML_PATH = 'panth_corewebvitals/';

    // =========================================================================
    // Private: config reader
    // =========================================================================

    /**
     * Read a single config value
     *
     * @param string $group  Config group (general, lcp, fid, cls, resource_hints)
     * @param string $field  Config field id
     * @param int|null $storeId
     * @return mixed
     */
    private function getConfigValue(string $group, string $field, ?int $storeId = null)
    {
        return $this->scopeConfig->getValue(
            self::XML_PATH . $group . '/' . $field,
            ScopeInterface::SCOPE_STORE,
            $storeId
        );
    }

    // =========================================================================
    // General Settings
    // =========================================================================

    /**
     * Check if the module is enabled (master switch)
     *
     * @param int|null $storeId
     * @return bool
     */
    public function isEnabled(?int $storeId = null): bool
    {
        return (bool) $this->getConfigValue('general', 'enabled', $storeId);
    }

    /**
     * Check if debug mode is enabled (console logging + window.coreWebVitalsMetrics)
     *
     * @param int|null $storeId
     * @return bool
     */
    public function isDebugMode(?int $storeId = null): bool
    {
        return $this->isEnabled($storeId)
            && (bool) $this->getConfigValue('general', 'debug_mode', $storeId);
    }

    /**
     * Check if metrics should be sent to analytics (GA4 / sendBeacon)
     *
     * @param int|null $storeId
     * @return bool
     */
    public function isRealUserMonitoring(?int $storeId = null): bool
    {
        return $this->isEnabled($storeId)
            && (bool) $this->getConfigValue('general', 'real_user_monitoring', $storeId);
    }

    /**
     * Custom beacon endpoint that receives metric POSTs via sendBeacon.
     * Empty string when not configured — the JS treats that as "skip beacon".
     */
    public function getEndpointUrl(?int $storeId = null): string
    {
        return trim((string) $this->getConfigValue('general', 'endpoint_url', $storeId));
    }

    /**
     * GA4 measurement ID (e.g. "G-XXXXXXX"). Empty string when not set.
     */
    public function getGa4MeasurementId(?int $storeId = null): string
    {
        return trim((string) $this->getConfigValue('general', 'ga4_measurement_id', $storeId));
    }

    // =========================================================================
    // LCP Settings
    // =========================================================================

    /**
     * Check if LCP monitoring is enabled
     *
     * @param int|null $storeId
     * @return bool
     */
    public function isLcpEnabled(?int $storeId = null): bool
    {
        return $this->isEnabled($storeId)
            && (bool) $this->getConfigValue('lcp', 'enabled', $storeId);
    }

    /**
     * Get target LCP time in milliseconds
     *
     * @param int|null $storeId
     * @return int
     */
    public function getTargetLcp(?int $storeId = null): int
    {
        return (int) $this->getConfigValue('lcp', 'target_lcp', $storeId) ?: 2500;
    }

    // =========================================================================
    // FID / INP Settings
    // =========================================================================

    /**
     * Check if FID/INP monitoring is enabled
     *
     * @param int|null $storeId
     * @return bool
     */
    public function isFidEnabled(?int $storeId = null): bool
    {
        return $this->isEnabled($storeId)
            && (bool) $this->getConfigValue('fid', 'enabled', $storeId);
    }

    /**
     * Get target FID time in milliseconds
     *
     * @param int|null $storeId
     * @return int
     */
    public function getTargetFid(?int $storeId = null): int
    {
        return (int) $this->getConfigValue('fid', 'target_fid', $storeId) ?: 100;
    }

    /**
     * Get target INP time in milliseconds
     *
     * @param int|null $storeId
     * @return int
     */
    public function getTargetInp(?int $storeId = null): int
    {
        return (int) $this->getConfigValue('fid', 'target_inp', $storeId) ?: 200;
    }

    // =========================================================================
    // CLS Settings
    // =========================================================================

    /**
     * Check if CLS monitoring is enabled
     *
     * @param int|null $storeId
     * @return bool
     */
    public function isClsEnabled(?int $storeId = null): bool
    {
        return $this->isEnabled($storeId)
            && (bool) $this->getConfigValue('cls', 'enabled', $storeId);
    }

    /**
     * Get target CLS score (unitless, e.g. 0.1)
     *
     * @param int|null $storeId
     * @return float
     */
    public function getTargetCls(?int $storeId = null): float
    {
        return (float) $this->getConfigValue('cls', 'target_cls', $storeId) ?: 0.1;
    }

    // =========================================================================
    // Resource Hints
    // =========================================================================

    /**
     * Check if any DNS prefetch domains are configured
     *
     * @param int|null $storeId
     * @return bool
     */
    public function isDnsPrefetchEnabled(?int $storeId = null): bool
    {
        return !empty($this->getDnsPrefetchDomains($storeId));
    }

    /**
     * Get DNS prefetch domains as an array (one domain per line in config)
     *
     * @param int|null $storeId
     * @return array
     */
    public function getDnsPrefetchDomains(?int $storeId = null): array
    {
        $domains = $this->getConfigValue('resource_hints', 'dns_prefetch', $storeId);
        return $this->splitTextareaLines((string) ($domains ?? ''));
    }

    /**
     * Get preconnect domains as an array
     *
     * @param int|null $storeId
     * @return array
     */
    public function getPreconnectDomains(?int $storeId = null): array
    {
        $domains = $this->getConfigValue('resource_hints', 'preconnect', $storeId);
        return $this->splitTextareaLines((string) ($domains ?? ''));
    }

    /**
     * Alias for getPreconnectDomains — used by the Plugin
     *
     * @param int|null $storeId
     * @return array
     */
    public function getPreconnectOrigins(?int $storeId = null): array
    {
        return $this->getPreconnectDomains($storeId);
    }

    /**
     * Get prefetch URLs as an array
     *
     * @param int|null $storeId
     * @return array
     */
    public function getPrefetchUrls(?int $storeId = null): array
    {
        $urls = $this->getConfigValue('resource_hints', 'prefetch', $storeId);
        return $this->splitTextareaLines((string) ($urls ?? ''));
    }

    // =========================================================================
    // Frontend JSON config
    // =========================================================================

    /**
     * Build the JSON configuration object consumed by the frontend script
     *
     * @param int|null $storeId
     * @return string
     */
    public function getConfigJson(?int $storeId = null): string
    {
        return (string) json_encode([
            'enabled'     => $this->isEnabled($storeId),
            'debug'       => $this->isDebugMode($storeId),
            'rum'         => $this->isRealUserMonitoring($storeId),
            'endpointUrl' => $this->getEndpointUrl($storeId),
            'ga4Id'       => $this->getGa4MeasurementId($storeId),
            'lcp'     => [
                'enabled' => $this->isLcpEnabled($storeId),
                'target'  => $this->getTargetLcp($storeId),
            ],
            'fid'     => [
                'enabled'   => $this->isFidEnabled($storeId),
                'targetFid' => $this->getTargetFid($storeId),
                'targetInp' => $this->getTargetInp($storeId),
            ],
            'cls'     => [
                'enabled' => $this->isClsEnabled($storeId),
                'target'  => $this->getTargetCls($storeId),
            ],
        ]);
    }

    // =========================================================================
    // Private helpers
    // =========================================================================

    /**
     * Split a newline-delimited textarea value into a trimmed, filtered array
     *
     * @param string $text
     * @return array
     */
    private function splitTextareaLines(string $text): array
    {
        if ($text === '') {
            return [];
        }
        return array_values(array_filter(array_map('trim', explode("\n", $text))));
    }
}
