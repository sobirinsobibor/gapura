<?php

namespace Modules\PengajuanDana\Filament\Clusters\PengajuanDana\Resources\Needs\Pages;

use Filament\Resources\Pages\CreateRecord;
use Modules\PengajuanDana\Filament\Clusters\PengajuanDana\Concerns\HasClusterSubNavigation;
use Modules\PengajuanDana\Filament\Clusters\PengajuanDana\Resources\Needs\NeedResource;

class CreateNeed extends CreateRecord
{
    use HasClusterSubNavigation;

    protected static string $resource = NeedResource::class;

    protected static bool $canCreateAnother = false;
}
