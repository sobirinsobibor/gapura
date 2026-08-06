<?php

namespace Modules\Ticketing\Filament\Clusters\Ticketing\Resources\ReservasiDokumens\Pages;

use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Modules\Ticketing\Filament\Clusters\Ticketing\Resources\ReservasiDokumens\ReservasiDokumenResource;

class ListReservasiDokumens extends ListRecords
{
    protected static string $resource = ReservasiDokumenResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->label('+ Tambah')
                ->button()
                ->createAnother(false),
        ];
    }
}