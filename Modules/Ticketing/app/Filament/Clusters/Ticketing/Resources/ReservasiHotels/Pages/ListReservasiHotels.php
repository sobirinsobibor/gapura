<?php

namespace Modules\Ticketing\Filament\Clusters\Ticketing\Resources\ReservasiHotels\Pages;

use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Modules\Ticketing\Filament\Clusters\Ticketing\Resources\ReservasiHotels\ReservasiHotelResource;

class ListReservasiHotels extends ListRecords
{
    protected static string $resource = ReservasiHotelResource::class;

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