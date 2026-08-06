<?php

namespace Modules\Ticketing\Filament\Clusters\Ticketing\Resources\ReservasiKeretas\Pages;

use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Modules\Ticketing\Filament\Clusters\Ticketing\Resources\ReservasiKeretas\ReservasiKeretaResource;

class ListReservasiKeretas extends ListRecords
{
    protected static string $resource = ReservasiKeretaResource::class;

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