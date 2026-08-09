<?php

namespace Modules\User\Filament\Clusters\User\Resources\Roles\Pages;

use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;
use Modules\User\Filament\Clusters\User\Concerns\HasClusterSubNavigation;
use Modules\User\Filament\Clusters\User\Resources\Roles\RoleResource;

class ViewRole extends ViewRecord
{
    use HasClusterSubNavigation;

    protected static string $resource = RoleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
