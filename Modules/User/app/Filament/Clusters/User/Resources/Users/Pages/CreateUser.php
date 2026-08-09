<?php

namespace Modules\User\Filament\Clusters\User\Resources\Users\Pages;

use Filament\Resources\Pages\CreateRecord;
use Modules\User\Filament\Clusters\User\Concerns\HasClusterSubNavigation;
use Modules\User\Filament\Clusters\User\Resources\Users\UserResource;

class CreateUser extends CreateRecord
{
    use HasClusterSubNavigation;

    protected static string $resource = UserResource::class;

    protected static bool $canCreateAnother = false;
}
