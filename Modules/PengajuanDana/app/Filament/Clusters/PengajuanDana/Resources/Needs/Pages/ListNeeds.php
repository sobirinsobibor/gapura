<?php

namespace Modules\PengajuanDana\Filament\Clusters\PengajuanDana\Resources\Needs\Pages;

use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Modules\PengajuanDana\Filament\Clusters\PengajuanDana\Resources\Needs\NeedResource;

class ListNeeds extends ListRecords
{
    protected static string $resource = NeedResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
