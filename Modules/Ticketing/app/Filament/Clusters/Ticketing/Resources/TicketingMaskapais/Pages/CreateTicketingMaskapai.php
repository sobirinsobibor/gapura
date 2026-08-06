<?php

namespace Modules\Ticketing\Filament\Clusters\Ticketing\Resources\TicketingMaskapais\Pages;

use Filament\Resources\Pages\CreateRecord;
use Modules\Ticketing\Filament\Clusters\Ticketing\Resources\TicketingMaskapais\TicketingMaskapaiResource;

class CreateTicketingMaskapai extends CreateRecord
{
    protected static string $resource = TicketingMaskapaiResource::class;
}
