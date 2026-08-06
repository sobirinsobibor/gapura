<?php

namespace Modules\Ticketing\Filament\Clusters\Ticketing\Resources\TicketingHotels\Pages;

use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Modules\Ticketing\Filament\Clusters\Ticketing\Resources\TicketingHotels\TicketingHotelResource;

class EditTicketingHotel extends EditRecord
{
    protected static string $resource = TicketingHotelResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
