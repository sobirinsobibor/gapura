<?php

namespace Modules\PengajuanDana\Filament\Clusters\PengajuanDana\Resources\Divisions\Pages;

use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Modules\PengajuanDana\Filament\Clusters\PengajuanDana\Resources\Divisions\DivisionResource;

class ListDivisions extends ListRecords
{
    protected static string $resource = DivisionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
