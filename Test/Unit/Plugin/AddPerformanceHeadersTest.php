<?php
/**
 * Copyright © Panth Infotech. All rights reserved.
 */
declare(strict_types=1);

namespace Panth\CoreWebVitals\Test\Unit\Plugin;

use Panth\CoreWebVitals\Plugin\AddPerformanceHeaders;
use Panth\CoreWebVitals\Helper\Data as ConfigHelper;
use Magento\Framework\App\Response\Http;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\MockObject\MockObject;

/**
 * Unit tests for AddPerformanceHeaders Plugin
 *
 * @covers \Panth\CoreWebVitals\Plugin\AddPerformanceHeaders
 */
class AddPerformanceHeadersTest extends TestCase
{
    /**
     * @var AddPerformanceHeaders
     */
    private AddPerformanceHeaders $plugin;

    /**
     * @var ConfigHelper|MockObject
     */
    private $configHelperMock;

    /**
     * @var Http|MockObject
     */
    private $responseMock;

    protected function setUp(): void
    {
        $this->configHelperMock = $this->createMock(ConfigHelper::class);
        $this->responseMock = $this->createMock(Http::class);

        $this->plugin = new AddPerformanceHeaders($this->configHelperMock);
    }

    /**
     * @covers \Panth\CoreWebVitals\Plugin\AddPerformanceHeaders::beforeSendResponse
     */
    public function testSkipsEverythingWhenModuleDisabled(): void
    {
        $this->configHelperMock->expects($this->once())
            ->method('isEnabled')
            ->willReturn(false);

        $this->responseMock->expects($this->never())
            ->method('setHeader');

        $this->plugin->beforeSendResponse($this->responseMock);
    }

    /**
     * @covers \Panth\CoreWebVitals\Plugin\AddPerformanceHeaders::beforeSendResponse
     */
    public function testAddsServerTimingHeaderWhenEnabled(): void
    {
        $this->configHelperMock->method('isEnabled')->willReturn(true);
        $this->configHelperMock->method('isDnsPrefetchEnabled')->willReturn(false);
        $this->configHelperMock->method('getPreconnectDomains')->willReturn([]);

        $this->responseMock->expects($this->once())
            ->method('setHeader')
            ->with(
                'Server-Timing',
                $this->stringContains('app;desc="PHP Execution";dur='),
                true
            );

        $this->plugin->beforeSendResponse($this->responseMock);
    }

    /**
     * @covers \Panth\CoreWebVitals\Plugin\AddPerformanceHeaders::beforeSendResponse
     */
    public function testAddsDnsPrefetchControlHeader(): void
    {
        $this->configHelperMock->method('isEnabled')->willReturn(true);
        $this->configHelperMock->method('isDnsPrefetchEnabled')->willReturn(true);
        $this->configHelperMock->method('getPreconnectDomains')->willReturn([]);

        // Expects Server-Timing + X-DNS-Prefetch-Control = 2 calls
        $this->responseMock->expects($this->exactly(2))
            ->method('setHeader');

        $this->plugin->beforeSendResponse($this->responseMock);
    }

    /**
     * @covers \Panth\CoreWebVitals\Plugin\AddPerformanceHeaders::beforeSendResponse
     */
    public function testAddsPreconnectLinkHeaders(): void
    {
        $domains = ['fonts.googleapis.com', 'cdn.example.com'];

        $this->configHelperMock->method('isEnabled')->willReturn(true);
        $this->configHelperMock->method('isDnsPrefetchEnabled')->willReturn(false);
        $this->configHelperMock->method('getPreconnectDomains')->willReturn($domains);

        // Server-Timing + Link (combined) = 2 calls
        $this->responseMock->expects($this->exactly(2))
            ->method('setHeader');

        $this->plugin->beforeSendResponse($this->responseMock);
    }

    /**
     * @covers \Panth\CoreWebVitals\Plugin\AddPerformanceHeaders::beforeSendResponse
     */
    public function testAllHeadersTogetherWhenFullyConfigured(): void
    {
        $domains = ['fonts.googleapis.com', 'cdn.example.com'];

        $this->configHelperMock->method('isEnabled')->willReturn(true);
        $this->configHelperMock->method('isDnsPrefetchEnabled')->willReturn(true);
        $this->configHelperMock->method('getPreconnectDomains')->willReturn($domains);

        // Server-Timing + X-DNS-Prefetch-Control + Link = 3 calls
        $this->responseMock->expects($this->exactly(3))
            ->method('setHeader');

        $this->plugin->beforeSendResponse($this->responseMock);
    }
}
