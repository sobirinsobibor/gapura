<?php

namespace Modules\User\Filament\Clusters\User\Concerns;

trait HasClusterSubNavigation
{
    /**
     * Tampilkan sub-navigation cluster juga di halaman Create/Edit/View,
     * tidak hanya di halaman List (perilaku bawaan Filament).
     */
    public function getSubNavigation(): array
    {
        if (filled($cluster = static::getCluster())) {
            return $this->generateNavigationItems($cluster::getClusteredComponents());
        }

        return [];
    }
}
