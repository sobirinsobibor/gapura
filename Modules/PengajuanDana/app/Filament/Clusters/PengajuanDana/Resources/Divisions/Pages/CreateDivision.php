<?php

namespace Modules\PengajuanDana\Filament\Clusters\PengajuanDana\Resources\Divisions\Pages;

use Filament\Resources\Pages\CreateRecord;
use Modules\PengajuanDana\Filament\Clusters\PengajuanDana\Concerns\HasClusterSubNavigation;
use Modules\PengajuanDana\Filament\Clusters\PengajuanDana\Resources\Divisions\DivisionResource;

class CreateDivision extends CreateRecord
{
    use HasClusterSubNavigation;

    protected static string $resource = DivisionResource::class;

    protected static bool $canCreateAnother = false;
}
