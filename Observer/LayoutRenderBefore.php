<?php
/**
 * Copyright © Panth Infotech. All rights reserved.
 *
 * This observer is intentionally empty. It was previously registered on
 * layout_render_before but performed no useful work (only logged a debug
 * message). The event registration has been removed from events.xml.
 *
 * The file is kept so that any serialized DI configuration referencing
 * this class does not cause a fatal error during upgrades. It can be
 * safely deleted after running setup:di:compile.
 */
declare(strict_types=1);

namespace Panth\CoreWebVitals\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

class LayoutRenderBefore implements ObserverInterface
{
    /**
     * No-op. This observer is no longer registered.
     *
     * @param Observer $observer
     * @return void
     */
    public function execute(Observer $observer): void
    {
        // Intentionally empty — kept for backward compatibility only.
    }
}
