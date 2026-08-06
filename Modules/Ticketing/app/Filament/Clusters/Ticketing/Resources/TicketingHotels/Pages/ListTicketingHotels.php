<?php

namespace Modules\Ticketing\Filament\Clusters\Ticketing\Resources\TicketingHotels\Pages;

use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Modules\Ticketing\Filament\Clusters\Ticketing\Resources\TicketingHotels\TicketingHotelResource;

class ListTicketingHotels extends ListRecords
{
    protected static string $resource = TicketingHotelResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->label('+ Tambah')
                ->modalHeading('Tambah Hotel')
                ->createAnother(false),
        ];
    }
}
