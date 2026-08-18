<?php

namespace Modules\PengajuanDana\Filament\Clusters\PengajuanDana\Concerns;

trait HasClusterSubNavigation
{
    public function getSubNavigation(): array
    {
        if (filled($cluster = static::getCluster())) {
            return $this->generateNavigationItems($cluster::getClusteredComponents());
        }

        return [];
    }
}
