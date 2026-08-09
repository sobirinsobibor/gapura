<?php

namespace Modules\User\Filament\Clusters\User\Resources\Roles\Pages;

use Filament\Resources\Pages\CreateRecord;
use Modules\User\Filament\Clusters\User\Concerns\HasClusterSubNavigation;
use Modules\User\Filament\Clusters\User\Resources\Roles\RoleResource;

class CreateRole extends CreateRecord
{
    use HasClusterSubNavigation;

    protected static string $resource = RoleResource::class;

    protected static bool $canCreateAnother = false;

    protected function afterCreate(): void
    {
        $permissionIds = collect($this->form->getRawState())
            ->filter(fn ($value, $key) => str_starts_with($key, 'permissions_'))
            ->flatten()
            ->map(fn ($id) => (int) $id)
            ->unique()
            ->values()
            ->all();

        $this->record->permissions()->sync($permissionIds);
    }
}
