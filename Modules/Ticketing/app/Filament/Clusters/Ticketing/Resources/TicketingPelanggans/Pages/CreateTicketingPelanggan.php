<?php

namespace Modules\Ticketing\Filament\Clusters\Ticketing\Resources\TicketingPelanggans\Pages;

use Filament\Resources\Pages\CreateRecord;
use Modules\Ticketing\Filament\Clusters\Ticketing\Resources\TicketingPelanggans\TicketingPelangganResource;

class CreateTicketingPelanggan extends CreateRecord
{
    protected static string $resource = TicketingPelangganResource::class;
}
