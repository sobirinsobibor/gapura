<?php

namespace Modules\User\Filament\Clusters\User\Resources\Roles\Pages;

use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;
use Modules\User\Filament\Clusters\User\Concerns\HasClusterSubNavigation;
use Modules\User\Filament\Clusters\User\Resources\Roles\RoleResource;

class EditRole extends EditRecord
{
    use HasClusterSubNavigation;

    protected static string $resource = RoleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            // DeleteAction::make(),
        ];
    }

    protected function afterSave(): void
    {
        $permissionIds = collect($this->form->getRawState())
            ->filter(fn ($value, $key) => str_starts_with($key, 'permissions_'))
            ->flatten()
            ->map(fn ($id) => (int) $id)
            ->unique()
            ->values()
            ->all();

        $this->record->permissions()->sync($permissionIds);
        $this->record->users->each->forgetAccessCache();
    }
}
