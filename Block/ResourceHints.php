<?php
/**
 * Copyright © Panth Infotech. All rights reserved.
 *
 * Block for the resource-hints.phtml template.
 * Provides dns-prefetch, preconnect, and prefetch domain/URL lists
 * read from admin configuration.
 */
declare(strict_types=1);

namespace Panth\CoreWebVitals\Block;

use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Panth\CoreWebVitals\Helper\Data as CoreWebVitalsHelper;

class ResourceHints extends Template
{
    /**
     * @var CoreWebVitalsHelper
     */
    private CoreWebVitalsHelper $helper;

    /**
     * @param Context $context
     * @param CoreWebVitalsHelper $helper
     * @param array $data
     */
    public function __construct(
        Context $context,
        CoreWebVitalsHelper $helper,
        array $data = []
    ) {
        $this->helper = $helper;
        parent::__construct($context, $data);
    }

    /**
     * Check if the module is enabled
     *
     * @return bool
     */
    public function isEnabled(): bool
    {
        return $this->helper->isEnabled();
    }

    /**
     * Get DNS prefetch domains from config
     *
     * @return array
     */
    public function getDnsPrefetchDomains(): array
    {
        return $this->helper->getDnsPrefetchDomains();
    }

    /**
     * Get preconnect domains from config
     *
     * @return array
     */
    public function getPreconnectDomains(): array
    {
        return $this->helper->getPreconnectDomains();
    }

    /**
     * Get prefetch URLs from config
     *
     * @return array
     */
    public function getPrefetchUrls(): array
    {
        return $this->helper->getPrefetchUrls();
    }
}
