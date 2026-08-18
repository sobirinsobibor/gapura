<?php

namespace Modules\PengajuanDana\Filament\Clusters\PengajuanDana\Resources\Institutions\Pages;

use Filament\Resources\Pages\CreateRecord;
use Modules\PengajuanDana\Filament\Clusters\PengajuanDana\Concerns\HasClusterSubNavigation;
use Modules\PengajuanDana\Filament\Clusters\PengajuanDana\Resources\Institutions\InstitutionResource;

class CreateInstitution extends CreateRecord
{
    use HasClusterSubNavigation;

    protected static string $resource = InstitutionResource::class;

    protected static bool $canCreateAnother = false;
}
