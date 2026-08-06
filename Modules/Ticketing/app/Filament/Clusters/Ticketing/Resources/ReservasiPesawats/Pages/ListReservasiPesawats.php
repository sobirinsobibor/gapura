<?php

namespace Modules\Ticketing\Filament\Clusters\Ticketing\Resources\ReservasiPesawats\Pages;

use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Modules\Ticketing\Filament\Clusters\Ticketing\Resources\ReservasiPesawats\ReservasiPesawatResource;

class ListReservasiPesawats extends ListRecords
{
    protected static string $resource = ReservasiPesawatResource::class;

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