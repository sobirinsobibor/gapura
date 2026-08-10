<?php

namespace Modules\Ticketing\Filament\Clusters\Ticketing\Resources\TicketingActivityLogs\Pages;

use Filament\Resources\Pages\ListRecords;
use Modules\Ticketing\Filament\Clusters\Ticketing\Resources\TicketingActivityLogs\TicketingActivityLogResource;

class ListTicketingActivityLogs extends ListRecords
{
    protected static string $resource = TicketingActivityLogResource::class;

    protected function getHeaderActions(): array
    {
        return [
            //
        ];
    }
}
