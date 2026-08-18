<?php

namespace Modules\PengajuanDana\Filament\Clusters\PengajuanDana\Resources\Institutions\Pages;

use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Modules\PengajuanDana\Filament\Clusters\PengajuanDana\Concerns\HasClusterSubNavigation;
use Modules\PengajuanDana\Filament\Clusters\PengajuanDana\Resources\Institutions\InstitutionResource;

class EditInstitution extends EditRecord
{
    use HasClusterSubNavigation;

    protected static string $resource = InstitutionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
