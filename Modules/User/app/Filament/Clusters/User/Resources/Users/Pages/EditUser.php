<?php

namespace Modules\User\Filament\Clusters\User\Resources\Users\Pages;

use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;
use Modules\User\Filament\Clusters\User\Concerns\HasClusterSubNavigation;
use Modules\User\Filament\Clusters\User\Resources\Users\UserResource;

class EditUser extends EditRecord
{
    use HasClusterSubNavigation;

    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            // DeleteAction::make(),
        ];
    }
}
