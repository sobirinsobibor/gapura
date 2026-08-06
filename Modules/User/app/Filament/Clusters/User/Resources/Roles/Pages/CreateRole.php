<?php

namespace Modules\User\Filament\Clusters\User\Resources\Roles\Pages;

use Filament\Resources\Pages\CreateRecord;
use Modules\User\Filament\Clusters\User\Resources\Roles\RoleResource;

class CreateRole extends CreateRecord
{
    protected static string $resource = RoleResource::class;

    protected static bool $canCreateAnother = false;
}
