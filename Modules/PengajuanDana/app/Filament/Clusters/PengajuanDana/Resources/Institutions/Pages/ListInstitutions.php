<?php

namespace Modules\PengajuanDana\Filament\Clusters\PengajuanDana\Resources\Institutions\Pages;

use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Modules\PengajuanDana\Filament\Clusters\PengajuanDana\Resources\Institutions\InstitutionResource;

class ListInstitutions extends ListRecords
{
    protected static string $resource = InstitutionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
