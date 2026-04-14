<?php
/**
 * Copyright © Panth Infotech. All rights reserved.
 *
 * This backend model is intentionally empty. It previously existed as a
 * placeholder for license validation but adds no behavior beyond the
 * default Magento\Framework\App\Config\Value. The backend_model reference
 * has been removed from system.xml.
 *
 * The file is kept so that any serialized DI or config data referencing
 * this class does not cause a fatal error during upgrades. It can be
 * safely deleted after running setup:di:compile.
 */
declare(strict_types=1);

namespace Panth\CoreWebVitals\Model\Config\Backend;

use Magento\Framework\App\Config\Value;

class Enabled extends Value
{
}
