<?php

namespace Modules\Ticketing\Filament\Clusters\Ticketing\Resources\TicketingHotels\Pages;

use Filament\Resources\Pages\CreateRecord;
use Modules\Ticketing\Filament\Clusters\Ticketing\Resources\TicketingHotels\TicketingHotelResource;

class CreateTicketingHotel extends CreateRecord
{
    protected static string $resource = TicketingHotelResource::class;
}
