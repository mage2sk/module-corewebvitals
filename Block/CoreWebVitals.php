<?php
/**
 * Copyright © Panth Infotech. All rights reserved.
 *
 * Block for the core-web-vitals.phtml template.
 * Provides isEnabled() and getConfigJson() to the frontend script.
 */
declare(strict_types=1);

namespace Panth\CoreWebVitals\Block;

use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Panth\CoreWebVitals\Helper\Data as CoreWebVitalsHelper;

class CoreWebVitals extends Template
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
     * Get the full config JSON for the frontend PerformanceObserver script
     *
     * @return string
     */
    public function getConfigJson(): string
    {
        return $this->helper->getConfigJson();
    }
}
