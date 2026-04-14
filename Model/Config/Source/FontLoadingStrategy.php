<?php
/**
 * Copyright © Panth Infotech. All rights reserved.
 */
declare(strict_types=1);

namespace Panth\CoreWebVitals\Model\Config\Source;

use Magento\Framework\Data\OptionSourceInterface;

class FontLoadingStrategy implements OptionSourceInterface
{
    /**
     * Options getter
     *
     * @return array
     */
    public function toOptionArray(): array
    {
        return [
            ['value' => 'auto', 'label' => __('Auto (Default browser behavior)')],
            ['value' => 'block', 'label' => __('Block (Hide text until font loads)')],
            ['value' => 'swap', 'label' => __('Swap (Show fallback, swap when ready)')],
            ['value' => 'fallback', 'label' => __('Fallback (Brief block, then fallback)')],
            ['value' => 'optional', 'label' => __('Optional (Use fallback if font not cached)')],
        ];
    }

    /**
     * Get options in "key-value" format
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'auto' => __('Auto (Default browser behavior)'),
            'block' => __('Block (Hide text until font loads)'),
            'swap' => __('Swap (Show fallback, swap when ready)'),
            'fallback' => __('Fallback (Brief block, then fallback)'),
            'optional' => __('Optional (Use fallback if font not cached)'),
        ];
    }
}
