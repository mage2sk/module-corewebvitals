<?php
/**
 * Copyright © Panth Infotech. All rights reserved.
 */
declare(strict_types=1);

namespace Panth\CoreWebVitals\Test\Unit\Observer;

use Panth\CoreWebVitals\Observer\LayoutRenderBefore;
use Magento\Framework\Event\Observer;
use PHPUnit\Framework\TestCase;

/**
 * Unit tests for LayoutRenderBefore Observer (no-op stub)
 *
 * @covers \Panth\CoreWebVitals\Observer\LayoutRenderBefore
 */
class LayoutRenderBeforeTest extends TestCase
{
    /**
     * @covers \Panth\CoreWebVitals\Observer\LayoutRenderBefore::execute
     */
    public function testExecuteDoesNothing(): void
    {
        $observer = new LayoutRenderBefore();
        $observerMock = $this->createMock(Observer::class);

        // Should not throw — it is intentionally empty
        $observer->execute($observerMock);
        $this->assertTrue(true);
    }
}
