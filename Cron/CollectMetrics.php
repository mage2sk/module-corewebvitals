<?php
/**
 * Copyright © Panth Infotech. All rights reserved.
 *
 * This cron job is intentionally empty. It was a placeholder for future
 * server-side metrics aggregation but performed no useful work. The cron
 * schedule has been removed from crontab.xml.
 *
 * The file is kept so that any serialized DI configuration referencing
 * this class does not cause a fatal error during upgrades. It can be
 * safely deleted after running setup:di:compile.
 */
declare(strict_types=1);

namespace Panth\CoreWebVitals\Cron;

class CollectMetrics
{
    /**
     * No-op. This cron job is no longer scheduled.
     *
     * @return void
     */
    public function execute(): void
    {
        // Intentionally empty — kept for backward compatibility only.
    }
}
